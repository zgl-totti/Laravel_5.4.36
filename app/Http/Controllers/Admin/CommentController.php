<?php
namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Goods;
use App\Models\Order;
use Illuminate\Http\Request;

class CommentController extends BaseController{
    public function index(Request $request){
        $ordersyn=trim($request->input('ordersyn'));
        $goodsname=trim($request->input('goodsname'));
        $status=trim($request->input('status'));
        if($ordersyn){
            $order=Order::where('ordersyn','like',$ordersyn.'%')->get(['id']);
        }else{
            $order=[];
        }
        if($goodsname){
            $goods=Goods::where('goodsname','like',$goodsname.'%')->get(['id']);
        }else{
            $goods=[];
        }
        $list=Comment::with(['member','status','order','goods'])
            ->where(function ($query) use($ordersyn,$order,$goodsname,$goods,$status){
                $ordersyn && $query->whereIn('sid',$order);
                $goodsname && $query->whereIn('gid',$goods);
                $status && $query->where('sid',$status);
            })->orderBy('edittime','desc')
            ->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.comment.index',compact('list','firstRow','ordersyn','goodsname','status'));
    }

    public function comment(){
        return view('admin.comment.comment');
    }

    public function response(){
        return view('admin.comment.response');
    }


















    public function index_(){
        //评价列表
        if(I('get.ordersyn')||I('get.id')||I('get.goodsname')){
            //查询
            if(I('get.ordersyn')){
                $where['o.ordersyn']=array('like',"%{$_GET['ordersyn']}%");
            }
            if(I('get.id')){
                $where['s.id']=array('eq',I('get.id'));
            }
            if(I('get.goodsname')){
                $where['g.goodsname']=array('like',"%{$_GET['goodsname']}%");
            }
        }
        $where['_string']='s.id=c.sid and c.oid=o.id and m.id=c.mid and c.gid=g.id';
        $where['c.sid']=array('gt',0);
        //分页
        $count=M()->table('yhyg_coment_status s,yhyg_comment c,yhyg_order o,yhyg_member m,yhyg_goods g')
            ->field('m.username,o.ordersyn,g.goodsname,g.pic,s.status,c.edittime,c.response,c.gid,m.id,c.sid,c.response')
            ->where($where)->count();
        $page=new Page($count,5);
        $show=$page->show();

        $comList=M()->table('yhyg_coment_status s,yhyg_comment c,yhyg_order o,yhyg_member m,yhyg_goods g')
            ->field('m.username,o.ordersyn,g.goodsname,g.pic,s.status,c.edittime,c.response,c.gid,m.id,c.sid,c.response')
            ->where($where)
            ->limit($page->firstRow.','.$page->listRows)->order('edittime desc')->select();
        $this->assign('comList',$comList);
        $this->assign('count',$count);
        $this->assign('first',$page->firstRow);
        $this->assign('show',$show);

        if(empty($comList)){
            $this->assign('empty','<div style="font-size: 18px;;height: 60px;width: 400px;margin:0 auto;text-align: center;line-height:60px;position: fixed;top:180px;left:400px;">没有查询到相应的数据,换个方式试试！</div>');
        }
        $this->display('index');
    }
    //查看评价
    public function LookOver_(){
        //处理回复内容
        if(IS_POST){
            $response['response']=I('post.response');
            $response['restime']=time();
            //将回复内容写入comment表中
            $oid=M('order')->where(array('ordersyn'=>I('post.ordersyn')))->find();

            if(M('comment')->field('response,restime')->where(array('oid'=>$oid['id']))->save($response)){
                $this->success('ok！');
            }else{
                $this->error('no！');
            }
        }else{

            $where['_string']="c.gid=g.id and c.oid=o.id and c.mid=m.id";
            $users=M()->table('yhyg_comment c,yhyg_order o,yhyg_goods g,yhyg_member m')
                ->field('c.content,m.username,o.ordersyn,g.goodsname,g.id,c.edittime')
                ->where($where)
                ->where(array('m.id'=>I('get.id'),'g.id'=>I('get.gid')))->select();
            $username=$users[0]['username'];
            $goodsname=$users[0]['goodsname'];
            $gid=$users[0]['id'];
            $edittime=$users[0]['edittime'];
            $content=$users[0]['content'];
            $ordersyn=$users[0]['ordersyn'];

            $this->assign('username',$username);
            $this->assign('goodsname',$goodsname);
            $this->assign('gid',$gid);
            $this->assign('edittime',$edittime);
            $this->assign('content',$content);
            $this->assign('ordersyn',$ordersyn);

            $this->display('lookover');
        }

    }
    public function comlist_(){
            $where['_string']="c.gid=g.id and c.oid=o.id and c.mid=m.id";
            $users=M()->table('yhyg_comment c,yhyg_order o,yhyg_goods g,yhyg_member m')
                ->field('c.content,m.username,o.ordersyn,g.goodsname,g.id,c.edittime,c.response')
                ->where($where)
                ->where(array('m.id'=>I('get.id'),'g.id'=>I('get.gid')))->select();
            $username=$users[0]['username'];
            $goodsname=$users[0]['goodsname'];
            $gid=$users[0]['id'];
            $edittime=$users[0]['edittime'];
            $content=$users[0]['content'];
            $ordersyn=$users[0]['ordersyn'];
            $response=$users[0]['response'];

            $this->assign('username',$username);
            $this->assign('goodsname',$goodsname);
            $this->assign('gid',$gid);
            $this->assign('edittime',$edittime);
            $this->assign('content',$content);
            $this->assign('ordersyn',$ordersyn);
            $this->assign('response',$response);
        $this->display('comlist');
    }
}