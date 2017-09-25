<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 17:45
 */
namespace App\Http\Controllers\Index;


use App\Activity;
use App\Advertise;
use App\Brand;
use App\Category;
use App\Goods;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $info=Member::find($mid);
        $advertise=Advertise::where('status',1)->get();
        $cache=Cache::get('category');
        if(empty($cache)){
            $category=$this->cate();
            Cache::put('category',$category,15);
        }else{
            $category=$cache;
        }
        $activity=Activity::limit(4)->get();
        $brand=Brand::where('hidden',1)->limit(10)->get();
        return view('index.index.index',[
            'info'=>$info,
            'advertise'=>$advertise,
            'category'=>$category,
            'activity'=>$activity,
            'brand'=>$brand
        ]);
    }

    protected function cate(){
        $list=Category::where('status',1)->where('pid',0)->limit(10)->get();
        foreach($list as $k=>$v){
            $list[$k]['child']=Category::where('pid',$v['id'])->get();
            $info=Category::find($v['id']);
            $arr=Category::where('path','like',$info['path'].'%')->get();
            $path='';
            foreach($arr as $val){
                $path.=$val['path'];
            }
            $factor=array_unique(explode(',',substr($path,0,-1)));
            $list[$k]['goodslist']=Goods::whereIn('cid',$factor)->where('active',1)->limit(6)->get();
        }
        return $list;
    }
}