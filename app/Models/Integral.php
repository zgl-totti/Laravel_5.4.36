<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integral extends Model{
    protected $table='jshop';

    public $timestamps = false;

    public static $rules1=[
        'needJF'=>'required|numeric|min:0',
        'gid'=>'required|min:0',
    ];

    public static $rules2=[
        'needJF'=>'required|numeric|min:0',
        'getUB'=>'required|numeric|min:0'
    ];

    public static $messages=[
        'required'=>':attribute不能为空！',
        'numeric'=>':attribute必须为数字',
        'min:0'=>':attribute必须大于0',
    ];

    public static $attributeNames=[
        'needJF'=>'用户名',
        'gid'=>'实物礼品',
        'getUB'=>'U币'
    ];

    public function getGoods(){
        return $this->hasOne('App\Models\Goods','id','gid');
    }

}
