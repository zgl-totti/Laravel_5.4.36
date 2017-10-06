<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{
    /*与模型关联的数据表*/
    protected $table='admin';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function access(){
        return $this->hasMany('App\Models\Access','uid','id');
    }
}
