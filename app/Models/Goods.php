<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model{
    protected $table='goods';

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
