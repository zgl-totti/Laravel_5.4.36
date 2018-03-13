<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 11:32
 */

namespace App\Http\Controllers\Api;


use App\Models\Category;

class CategoryController{
    public function cates(){
        $keywords=request()->input('keywords');
        $list=Category::where('status',1)
            ->when($keywords,function ($query) use ($keywords){
                return $query->where('categoryname','like',$keywords.'%');
            })->orderBy('path')
            ->paginate(10);
        if(empty($list)){
            $res['code']=400;
            $res['body']='没有数据';
        }else{
            $res['code']=200;
            $res['body']=$list;
        }
        return $res;
    }

    public function cateByPid($pid){
        $pid=intval($pid);
        $info=Category::where('pid',$pid)->get();
        if(empty($info)){
            $res['code']=400;
            $res['body']='没有数据';
        }else{
            $res['code']=200;
            $res['body']=$info;
        }
        return $res;
    }
}