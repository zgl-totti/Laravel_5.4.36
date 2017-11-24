<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bargain extends Model{
    protected $table='bargain';

    public $timestamps = false;

    public function getGoods(){
        return $this->hasOne('App\Models\Goods','id','gid');
    }
}
