<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:27
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;

class BaseController extends Controller{
    public function __construct(){
        //启动中间件
        $this->middleware('admin');


        //添加auth中间件到路由后,还需要指定哪个guard 来实现认证,指定的guard对应auth.php中guards数组的某个键
        //$this->middleware('auth:admin');
    }
}