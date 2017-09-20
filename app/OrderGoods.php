<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model{
    /*与模型关联的数据表*/
    protected $table='order_goods';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;
}
