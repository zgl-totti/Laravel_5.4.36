<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 14:32
 */

namespace App\Http\Controllers\Api;


use App\Models\Goods;
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
}