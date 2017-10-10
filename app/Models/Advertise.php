<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model{
    /*与模型关联的数据表*/
    protected $table='ad';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getCategory(){
        return $this->hasOne('App\Models\Category','categoryname','content');
    }
}
