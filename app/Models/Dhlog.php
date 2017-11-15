<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dhlog extends Model{
    /*与模型关联的数据表*/
    protected $table='dhlog';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getJshop(){
        return $this->hasOne(Jshop::class,'id','jid');
    }
}
