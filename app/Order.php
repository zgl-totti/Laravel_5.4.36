<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    /*与模型关联的数据表*/
    protected $table='order';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getOrderGoods(){
        return $this->hasMany('App\OrderGoods','oid','id');
    }

    public function getStatus(){
        return $this->hasOne('App\OrderStatus','id','orderstatus');
    }

    public function getSite(){
        return $this->hasOne('App\OrderSite','id','scid');
    }
}
