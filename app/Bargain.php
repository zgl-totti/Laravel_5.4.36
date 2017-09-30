<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bargain extends Model{
    protected $table='bargain';

    public function getGoods(){
        return $this->hasOne('App\Goods','id','gid');
    }
}
