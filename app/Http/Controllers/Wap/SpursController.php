<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/19
 * Time: 10:59
 */

namespace App\Http\Controllers\Wap;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class SpursController extends Controller{
    public function index(){
        $hello=$this->hello();
        $status=$this::$statusMap;
        print_r($hello);
        print_r($status);
    }

    public function nba(){
        Redis::set('roma.totti','托蒂是罗马的国王，666！');
        echo 'Redis 已经启动并存储！';
    }

    public function nba_ball(){
        $keywords=Redis::get('roma.totti');
        print_r($keywords);
    }
}