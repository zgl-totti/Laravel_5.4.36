<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /*与模型关联的数据表*/
    protected $table = 'admin';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    /*//可以批量赋值的属性
    protected $fillable=[];

    //不能被批量赋值的属性
    protected $guarded=[];*/

    public static $rules = [
        'username' => 'required',
        'password' => 'required',
        'verify' => 'required'
    ];

    public static $messages = [
        'required' => ':attribute不能为空！',
    ];

    public static $attributeNames = [
        'username' => '用户名',
        'password' => '密码',
        'verify' => '验证码'
    ];

    public function access()
    {
        return $this->hasMany('App\Models\Access', 'uid', 'id');
    }
}