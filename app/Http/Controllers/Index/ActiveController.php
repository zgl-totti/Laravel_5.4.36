<?php
namespace App\Http\Controllers\Index;


use App\Models\Activity;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ActiveController extends BaseController{
    public function index(Request $request,$id){
        $id=intval($id);
        $info=Activity::where('id',$id)->with('getBrand')->first();
        $day=date('j', $info['stoptime']);
        if(time()>$info['stoptime']){
            $info['goods']=Goods::where('bid',$info['getBrand']['id'])->get();
            return view('index.active.index',[
                'd'=>$day,
                'info'=>$info
            ]);
        }else{
            echo "<h1>活动已经结束了，请等待活动再次开启！</h1>";
        }
    }




    /*public function index1(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        $Info = D('Activity')->getInfo(I('get.aid'));
        //先判断是否在活动时间
        if (!time() > $Info[0]['stoptime']) {
            echo "<h1>活动已经结束了，请等待活动再次开启！</h1>";
        } else {
            //获取活动商品
            //查询活动品牌
            $goodsList = D('Activity')->getGoodsList($Info[0]['brand']);
            $this->assign('goodsList', $goodsList);
            //分配活动时间
            $day = date('j', $Info[0]['stoptime']);
            $this->assign('d', $day);
            $this->assign('aid', $Info[0]['id']);
            $this->assign('title', $Info[0]['activityname']);
            $this->assign('pic', $Info[1]);
            //获取nav
            //$categoryListOne=A('Common')->getNav();
            //$this->assign('categoryListOne',$categoryListOne);
            $this->display();
        }
    }*/
}