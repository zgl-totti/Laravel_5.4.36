<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11
 * Time: 16:36
 */

namespace App\Http\Controllers\Wap;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

Class BaseController extends Controller{
    public function index(){
        $message='555555';
        //Mail::to(['724249769@qq.com'])->send($message);
        echo 666;
    }

}