<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    protected $table='comment';

    public $timestamps = false;

    public function member(){
        return $this->hasOne(Member::class,'id','mid');
    }

    public function goods(){
        return $this->hasOne(Goods::class,'id','gid');
    }

    public function order(){
        return $this->hasOne(Order::class,'id','oid');
    }

    public function status(){
        return $this->hasOne(CommentStatus::class,'id','sid');
    }

}
