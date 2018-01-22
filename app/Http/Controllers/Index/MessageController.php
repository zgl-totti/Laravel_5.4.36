<?php
namespace App\Http\Controllers\Index;


class MessageController extends BaseController{
    public function index(){

    }





    public function index_(){
        //获取消息
        $where['mid']=array('in','0,'.I('session.mid'));
        $count=M('letter')->where($where)->count();
        $page=new Page($count,6);
        $show=$page->show();
        $msgList=M('Letter')->where($where)->limit($page->firstRow.','.$page->listRows)->order('status,addtime desc')->select();
        $this->assign('msgList',$msgList);
        $this->assign('page',$show);
        $this->assign('empty','<h1>你还没有任何消息</h1>');
        $this->display();
    }

    public function detail_(){
        $where['id']=I('get.id');
        //获取信息
        $info=M('letter')->where($where)->find();
        //更新信息状态
        M('Letter')->where($where)->save(array('status'=>1));
        $this->assign('info',$info);
        $this->display();
    }

    public function del_(){
        $where['id']=I('post.id');
        if(M('Letter')->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function change(){
        $where['id']=I('post.id');
        if(M('Letter')->where($where)->save(array('status'=>1))){
            $this->success('设置成功');
        }else{
            $this->error('设置失败');
        }
    }
}