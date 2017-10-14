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
    }
}