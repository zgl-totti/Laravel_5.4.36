<?php

namespace App\Models;

use App\Events\BrandDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model{
    /*与模型关联的数据表*/
    protected $table='brand';

    protected $dispatchesEvent=[
        'deleting'=>BrandDeleteEvent::class
    ];

    /*指定是否模型应该被戳记时间*/
    public $timestamps = false;

    public function access(){
        return $this->hasMany('App\Models\Access','uid','id');
    }
}
