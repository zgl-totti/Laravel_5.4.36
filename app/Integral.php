<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integral extends Model{
    protected $table='jshop';

    public function getGoods(){
        return $this->hasOne('App\Goods','id','gid');
    }

}
