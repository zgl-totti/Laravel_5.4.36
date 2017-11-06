<?php
namespace App\Http\Controllers\Index;

use App\Models\Collect;
use App\Models\Comment;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CollectController extends BaseController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $where['mid']=$mid;
        $list=Collect::with('goodses')->paginate(10);
        foreach($list as $k=>$v){
            //计算好评率
            $totalNum=Comment::where('gid',$v['id'])->count();
            $goodNum=Comment::where('gid',$v['id'])->where('sid',1)->count();
            $hpl=$goodNum/$totalNum*100;
            $list[$k]['hpl']=round($hpl,2);
        }
        return view('index.collect.index',['list'=>$list]);
    }

    public function add(Request $request){
        if($request->ajax()){
            $gid=$request->input('gid');
            $mid=$request->session()->get('mid');
            $info=Collect::where('gid',$gid)->where('mid',$mid)->first();
            if(empty($info)){
                return response(['code'=>5,'info'=>'亲，你已经收藏过了！']);
            }
            $collect= new Collect();
            $collect->mid=$mid;
            $collect->gid=$gid;
            $collect->addtime=time();
            if($collect->save()){
                return response(['code'=>1,'body'=>'收藏成功！']);
            }else{
                return response(['code'=>5,'info'=>'收藏失败,请稍后再试！']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $gid=$request->input('gid');
            $where['mid']=$mid;
            $where['gid']=$gid;
            $row=Collect::where($where)->delete();
            if($row){
                return response(['code'=>1,'info'=>'删除成功！']);
            }else{
                return response(['code'=>5,'info'=>'删除失败！']);
            }
        }
    }














    public function index1(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        $where['c.mid']=session('mid');
        $where['_string']='g.id=c.gid';
        $count=M()->table('yhyg_goods g,yhyg_collect c')->where($where)->count();
        //实例化分页类
        $page=new Page($count,10);
        $show=$page->show();
        $list=M()->table('yhyg_goods g,yhyg_collect c')->field('g.active,g.goodsname,g.price,g.pic,g.markeprice,g.salenum,g.id')->where($where)->order('c.addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $k=>$v){
            //计算好评率
            $totalNum=M('Comment')->where(array('gid'=>$v['id']))->count();
            $hpNum=M('Comment')->where(array('gid'=>$v['id'],'sid'=>1))->count();
            $hpl=$hpNum/$totalNum*100;
            $list[$k]['hpl']=round($hpl,2);
        }
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->assign('empty',"<h2>收藏夹是空的，赶紧去收藏商品吧！</h2>");
        $this->display();
    }

    public function add1(){
        $gid=I('post.gid');
        if($msg=D('Collect')->addC($gid)){
            if($msg==1){
                $this->success('收藏成功');
            }else{
                $this->error('亲，你已经收藏过了');
            }
        }else{
            $this->error('服务器开了个小差，请稍后再试!');
        }
    }

    public function del1(){
        $where['gid']=I('post.gid');
        $where['mid']=session('mid');
        if(M('Collect')->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('服务器开了个小差，请稍后再试!');
        }
    }

    //侧边栏获取列表
    public function getList1(){
        $where['mid']=session('mid');
        $where['_string']='c.gid=g.id';
            if($list=D('Collect')->getList($where)){
            $this->success($list);
            }else{
                $this->error('<h3>你还没有收藏任何宝贝</h3>');
            }
    }
}