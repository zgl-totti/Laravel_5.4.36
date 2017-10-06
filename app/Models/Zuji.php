<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zuji extends Model{
    protected $table='zuji';

    public function goodses(){
        return $this->hasOne('App\Models\Goods','id','gid');
    }
}
