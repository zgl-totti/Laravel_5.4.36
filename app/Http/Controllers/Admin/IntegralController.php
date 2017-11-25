<?php
namespace App\Http\Controllers\Admin;

class IntegralController extends BaseController{
    public function index(){
        return view('admin.integral.index');
    }


























    public function add_(){
        if(IS_POST){
            $Jshop=M('Jshop');
            //判断要添加的礼品类型
            if(I('post.status')==0){
                //判断该礼品是否已经存在
                $had=$Jshop->where(array('getUB'=>I('post.getUB')))->find();
                if($had){
                    $this->error('该礼品已经存在！');
                }else{
                    $data['getUB']=I('post.getUB');
                }
            }else{
                //判断该礼品是否已经存在
                $had=$Jshop->where(array('gid'=>I('post.gid')))->find();
                if($had){
                    $this->error('该礼品已经存在！');
                }else{
                    $data['gid']=I('post.gid');
                }
            }
            $data['needJF']=I('post.needJF');
            $data['status']=I('post.status');
            $data['addtime']=time();
            if($Jshop->add($data)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            //获取商品
            $goods=M('Goods')->select();
            $this->assign('goods',$goods);
            $this->display();
        }
    }
    public function gifList_(){
        $count=M('Jshop')->count();
        //分页
        $page=new Page($count,10);
        $show=$page->show();
        $list=M('Jshop')->limit($page->firstRow.','.$page->listRows)->order('zd desc')->select();
        foreach($list as $k=>$v){
            if($v['status']==1){
                $info=M('Goods')->where(array('id'=>$v['gid']))->find();
                $list[$k]['info']=$info;
            }
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('empty',"<h1>没有找到相关数据！</h1>");
        $this->display();
    }
    public function edit_(){
        if(IS_POST){
            $Jshop=M('Jshop');
            //判断礼品类型
            if(I('post.getUB')){
                $data['getUB']=I('post.getUB');
            }
            $data['needJF']=I('post.needJF');
            $where['id']=I('post.id');
            if($Jshop->where($where)->save($data)){
                $this->success('编辑成功');
            }else{
                $this->error('编辑失败');
            }
        }else{
            $where['id']=I('get.id');
            $info=M('Jshop')->where($where)->find();
            //判断礼品类型
            if($info['status']==1){
                $ginfo=M('Goods')->where(array('id'=>$info['gid']))->find();
                $info['ginfo']=$ginfo;
            }
            $this->assign('info',$info);
            $this->display();
        }
    }
    public function del_(){
        $where['id']=I('post.id');
        if(M('Jshop')->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败，请稍后再试');
        }
    }
    public function getGoodsInfo(){
        $where['id']=I('post.id');
        $info=M('Goods')->where($where)->find();
        $this->success($info);
    }
    public function cj_(){
            $list=M('Cj')->select();
            $count=M('Cj')->Sum('v');
            $this->assign('list',$list);
            $this->assign('count',$count);
            $this->assign('empty','<h1>没有找到相关数据</h1>');
            $this->display('cj');
    }
    public function editJ_(){
        if(IS_POST){
            $data['num']=I('post.num');
            $data['lx']=I('post.lx');
            $data['v']=I('post.v');
            $data['prize']=I('post.prize');
            $status=M('Cj')->where(array('id'=>I('post.id')))->save($data);
            if($status){
                $this->success('编辑成功');
            }else{
                $this->error('编辑失败');
            }
        }else{
            $info=M('Cj')->where(array('id'=>I('get.id')))->find();
            $this->assign('info',$info);
            $count=M('Cj')->Sum('v');
            $this->assign('count',$count);
            $this->display('editJ');
        }
    }
    public function zd_(){
        $Jshop=M('Jshop');
        //查询置顶数量
        $num=$Jshop->where(array('zd'=>1))->count();
            $info=$Jshop->where(array('id'=>I('post.id')))->find();
            if($info['zd']==0){
                if($num<4){
                    $data['zd']=1;
                    $msg='置顶成功';
                    $err='置顶失败';
                }else{
                    $this->error('最多只能置顶4件商品');
                }
            }else{
                if($num==1){
                    $this->error('最少要留一件置顶商品');
                }else{
                    $data['zd']=0;
                    $msg='取消置顶成功';
                    $err='取消置顶失败';
                }
            }
            if(M('Jshop')->where(array('id'=>I('post.id')))->save($data)){
                $this->success($msg);
            }else{
                $this->error($err);
            }
    }
}