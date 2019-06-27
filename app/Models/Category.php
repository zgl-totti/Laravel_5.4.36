<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function getGoods()
    {
        return $this->hasMany('App\Models\Goods', 'cid', 'id');
    }

    /*
     * 无限极分类
     */
    public function cateTree($data,$parent_id=0,$level=0)
    {
        $arr=[];
        foreach ($data as $val){
            if($val->parent_id=$parent_id){
                $val->level=$level;
                $arr[]=$val;
                $arr_tmp=self::cateTree($data,$val->id,$level+1);
                $arr=array_merge($arr,$arr_tmp);
            }
        }
        return $arr;
    }

    /*
     * 生成无限极分类树
     */
    public function makeTree($arr)
    {
        $refer = array();
        $tree = array();
        foreach ($arr as $k => $v) {
            $refer[$v['id']] = &$arr[$k];  //创建主键的数组引用
        }
        foreach ($arr as $k => $v) {
            $parent_id = $v['parent_id'];   //获取当前分类的父级id
            if ($parent_id == 0) {
                $tree[] = &$arr[$k];    //顶级栏目
            } else {
                if (isset($refer[$parent_id])) {
                    $refer[$parent_id]['data'][] = &$arr[$k];    //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }
}
