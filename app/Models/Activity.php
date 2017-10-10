<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model{
    /*与模型关联的数据表*/
    protected $table='activity';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getBrand(){
        return $this->hasOne('App\Models\Brand','brandname','brand');
    }
}
