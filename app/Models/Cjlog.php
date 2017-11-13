<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/8
 * Time: 10:59
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cjlog extends Model {
    protected $table='cart';
    public $timestamps = false;
    public function getMember(){
        return $this->hasOne(Member::class,'id','mid');
    }
}