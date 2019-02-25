<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model{
    protected $table='goods';

    public $timestamps=false;

    //应该被转换成原⽣类型的属性(options字段自动转换为array)
    /*protected $casts = [
        'options' => 'array',
    ];*/

    public function getPic(){
        return $this->hasMany('App\Models\GoodsPic','gid','id');
    }

    public function getComment(){
        return $this->hasMany('App\Models\Comment','gid','id');
    }

    public function getBrand(){
        return $this->hasOne('App\Models\Brand','id','bid');
    }

    public function getCategory(){
        return $this->hasOne('App\Models\Category','id','cid');
    }

    public function getIntegral(){
        return $this->hasOne('App\Models\Integral','gid','id');
    }

    public function getBargain(){
        return $this->hasOne('App\Models\Bargain','gid','id');
    }
}
