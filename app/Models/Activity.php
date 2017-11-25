<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model{
    /*与模型关联的数据表*/
    protected $table='activity';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public static $rules=[
        'activityname'=>'required',
        'brand'=>'required',
        'starttime'=>'required',
        'stoptime'=>'required',
        'content'=>'required',
        'img'=>'required'
    ];

    public static $messages=[
        'required'=>':attribute不能为空！',
    ];

    public static $attributeNames=[
        'activityname'=>'活动',
        'brand'=>'品牌',
        'starttime'=>'开始时间',
        'stoptime'=>'结束时间',
        'content'=>'内容',
        'img'=>'主图'
    ];

    public function getBrand(){
        return $this->hasOne('App\Models\Brand','brandname','brand');
    }

    public function pic(){
        return $this->hasMany(ActivityPic::class,'aid','id');
    }

}
