<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderIntegral extends Model{
    /*与模型关联的数据表*/
    protected $table='jorder';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    /*可以被批量赋值的属性*/
    protected $fillable=['ordersyn','mid','scid','orderprice','orderstatus','addtime','gid','msg'];

    public function getGoods(){
        return $this->hasOne('App\Models\Goods','id','gid');
    }

    public function getStatus(){
        return $this->hasOne('App\Models\OrderStatus','id','orderstatus');
    }

    public function getSite(){
        return $this->hasOne('App\Models\OrderSite','id','scid');
    }
}
