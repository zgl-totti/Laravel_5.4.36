<?php
namespace App\Http\Controllers\Admin;

class NewpersonController extends BaseController{


























    public function index(){
        //查询
        $begin=I('get.startprice');
        $end=I('get.endprice');
        $where=array();
        if($begin && $end){
            $where['bar.price']=array('between',"$begin,$end");
        }
        if(I('get.brand')){
            $where['bar.bname']=I('get.brand');
        }
        $where['_string']="g.id=bar.gid";
        $where['bar.cut']=array('eq',0);
        $count=M()->table('yhyg_goods g,yhyg_bargain bar')->field('bar.gid,g.goodsname,bar.price,g.num,g.pic,g.salenum,bar.bname')->where($where)->count();
        $page=new Page($count,8);
        $show=$page->show();
        $goods=M()->table('yhyg_goods g,yhyg_bargain bar')->field('bar.gid,g.goodsname,bar.price,g.num,g.pic,g.salenum,bar.bname')->where($where)->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('empty','<div style="font-size: 18px;;height: 60px;width: 400px;margin:0 auto;text-align: center;line-height:60px;position: fixed;top:180px;left:400px;">没有查询到相应的数据,换个方式试试！</div>');
        $this->assign('goods',$goods);
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('first',$page->firstRow);

        if(IS_AJAX){
            /*print_r(I('post.'));
            exit;*/
            $start=I('post.kaishi');
            $over=I('post.jieshu');
            $markdown=I('post.reduce');
            if(I('post.kaishi')&&I('post.jieshu')){
                $where1['price']=array('between',"$start,$over");
            }
            if(I('post.brand')){
                $where1['bname']=I('post.brand');
            }
            M('bargain')->field('cut')->where($where1)->save(array('cut'=>$markdown));
            $price=M('bargain')->field('price,cut,gid')->where($where1)->select();

            foreach($price as $key=>$val){
                if($val['cut']){
                    $cutprice=$val['price']-$val['cut'];
                    M('bargain')->where(array('gid'=>$val['gid']))->save(array('cutprice'=>$cutprice,'status'=>1));
                }
            }
            $this->success('成功砍价');
        }
        $this->display();
    }

    public function add(){
        $list=M('brand')->field('id,brandname')->select();
        $this->assign('list',$list);
        if(IS_AJAX){
            if(I('get.check')=='add'){
                $where['bid']=I('post.bid');
                $goods=M('goods')->where($where)->field('id,goodsname,price,num,pic,cname')->select();
                $this->success($goods);
            }
            if(I('get.check')=='sub'){
                /*print_r(I('post.'));
                exit;*/
                 if(M('bargain')->where(array('gid'=>I('post.gid')))->find()){
                     $this->error('此商品已添加!');
                 }else{
                     $goodsinfo=M('goods')->field('id,price,cname,bid')->where(array('id'=>I('post.gid')))->find();

                     $bname=M('brand')->field('brandname')->where(array('id'=>$goodsinfo['bid']))->find();
                     $info['bname']=$bname['brandname'];
                     $info['gid']=$goodsinfo['id'];
                     $info['price']=$goodsinfo['price'];
                     $info['cname']=$goodsinfo['cname'];
                     if(M('bargain')->add($info)){
                         $this->success('成功添加');
                     }else{
                         $this->error('添加失败');
                     }
                 }
            }
        }else{
            $this->display('add');
        }
    }
    //砍价
    public function kanjia(){
        if(IS_AJAX){
            $price=M('bargain')->field('price')->where(array('gid'=>I('post.gid')))->find();
            $data['cutprice']=$price['price']-I('post.cutprice');
            $data['cut']=I('post.cutprice');
            $data['status']=1;
            if(M('bargain')->where(array('gid'=>I('post.gid')))->save($data)){
                $this->success('成功设置');
            }else{
                $this->error('设置失败');
            }
        }
    }
    //已砍列表
    public function barlist(){
        //查询
        if(I('get.bname')){
            $where['bar.bname']=I('get.bname');
        }
        $where['bar.cut']=array('gt',0);
        $where['_string']="g.id=bar.gid";
        $count=M()->table('yhyg_goods g,yhyg_bargain bar')->where($where)->count();
        $page=new Page($count,8);
        $show=$page->show();
        $goods=M()->table('yhyg_goods g,yhyg_bargain bar')->field('bar.gid,g.goodsname,g.pic,bar.price,bar.cut,g.num,g.salenum,bar.cutprice,bar.bname')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('goods',$goods);
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('first',$page->firstRow);

        if(IS_AJAX){
            if(I('get.query')=='set'){
                $bname=I('post.bname');
                if(M('bargain')->where(array('bname'=>$bname))->save(array('cutprice'=>0,'cut'=>0,'status'=>0))){
                    $this->success('批量重置成功!');
                }else{
                    $this->error('批量重置失败!');
                }
            }else{
                $gid=I('post.gid');
                if(M('bargain')->where(array('gid'=>$gid))->save(array('cutprice'=>0,'cut'=>0,'status'=>0))){
                    $this->success('重置成功!');
                }else{
                    $this->error('重置失败!');
                }
            }

        }
        $this->assign('empty','<div style="font-size: 18px;;height: 60px;width: 400px;margin:0 auto;text-align: center;line-height:60px;position: fixed;top:180px;left:600px;">专享列表空空如也！</div>');
        $this->display('list');
    }

}