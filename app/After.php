<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class After extends Model{
    /*与模型关联的数据表*/
    protected $table='after';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getGoods(){
        return $this->hasOne('App\Goods','id','gid');
    }

    public function getAfterStatus(){
        return $this->hasOne('App\AfterStatus','id','afterstatus');
    }

    public function getSite(){
        return $this->hasOne('App\OrderSite','id','scid');
    }

    public function getPic(){
        return $this->hasMany('App\AfterPics','afid','id');
    }

    public function getOrder(){
        return $this->hasOne('App\Order','ordersyn','oid');
    }
}
