<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integral extends Model{
    protected $table='jshop';

    public function getGoods(){
        return $this->hasOne('App\Models\Goods','id','gid');
    }

}
