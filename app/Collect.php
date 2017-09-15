<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model{
    protected $table='collect';

    public function goodses(){
        return $this->hasOne('App\Goods','id','gid');
    }
}
