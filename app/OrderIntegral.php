<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderIntegral extends Model{
    /*与模型关联的数据表*/
    protected $table='jorder';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getGoods(){
        return $this->hasOne('App\Goods','id','gid');
    }

    public function getStatus(){
        return $this->hasOne('App\OrderStatus','id','orderstatus');
    }

    public function getSite(){
        return $this->hasOne('App\OrderSite','id','scid');
    }
}
