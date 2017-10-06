<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawLog extends Model{
    /*与模型关联的数据表*/
    protected $table='cjlog';

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function getMember(){
        return $this->hasOne('App\Models\Member','id','mid');
    }
}
