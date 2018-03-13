<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 14:32
 */

namespace App\Http\Controllers\Api;


use App\Models\Goods;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;

class GoodsController{
    public function index($id){
        $id=intval($id);
        $info=Goods::find($id);
        if(empty($info)){
            $res['code']=500;
            $res['body']='没有数据';
        }else{
            $res['code']=100;
            $res['body']=$info;
        }
        return response()->json($res);
    }

    public function all(Request $request){
        $keywords=$request->input('keywords');
        $list=Goods::when($keywords,function ($query) use ($keywords){
            return $query->where('goodsname','like',$keywords.'%');
        })->get();
        if(empty($list)){
            $res['code']=500;
            $res['body']='没有数据';
        }else{
            $res['code']=100;
            $res['body']=$list;
        }
        return response()->json($res);
    }

    public function order(){
        $keywords=\request()->input('keywords');
        $username=\request()->input('username');
        $status=\request()->input('orderstatus');
        $price=\request()->input('price');
        $time=\request()->input('addtime');
        if($username){
            $mid=Member::where('username','like',$username.'%')->select('id')->get();
        }else{
            $mid=[];
        }
        $list=Order::when($keywords,function ($query) use ($keywords){
            return $query->where('ordersyn','like',$keywords.'%');
        })->when($mid,function ($query) use($mid){
            return $query->whereIn('mid',$mid);
        })->when($status,function ($query) use ($status){
            return $query->where('orderstatus',$status);
        })->when($price,function ($query) use ($price){
            return $query->where('price','>',$price);
        })->when($time,function ($query) use ($time){
            return $query->where('addtime','>',$time);
        })
            ->orderBy('addtime','desc')
            ->paginate(10);
        if(empty($list)){
            $res['code']=500;
            $res['body']='没有数据';
        }else{
            $res['code']=100;
            $res['body']=$list;
        }
        return $res;
    }
}