<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    /*与模型关联的数据表*/
    protected $table='member';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public static $rules=[
        'username'=>'required',
        'password'=>'required'
    ];

    public static $messages=[
        'required'=>':attribute不能为空！'
    ];

    public static $attributeNames=[
        'username'=>'用户名或手机',
        'password'=>'密码'
    ];


}
