<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model{
    protected $table='goods';

    public function getPic(){
        return $this->hasMany('App\GoodsPic','gid','id');
    }

    public function getComment(){
        return $this->hasMany('App\Comment','gid','id');
    }

    public function getBrand(){
        return $this->hasOne('App\Brand','id','bid');
    }

    public function getCategory(){
        return $this->hasOne('App\Category','id','cid');
    }

    public function getIntegral(){
        return $this->hasOne('App\Integral','gid','id');
    }
}
