<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSite extends Model{
    /*与模型关联的数据表*/
    protected $table='site';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;
}
