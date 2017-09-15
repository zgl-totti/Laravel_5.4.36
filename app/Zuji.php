<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zuji extends Model{
    protected $table='zuji';

    public function goodses(){
        return $this->hasOne('App\Goods','id','gid');
    }
}
