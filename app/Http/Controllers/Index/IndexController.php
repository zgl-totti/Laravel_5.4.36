<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 17:45
 */
namespace App\Http\Controllers\Index;


use App\Admin;
use Illuminate\Routing\Controller;

class IndexController extends Controller{
    public function index(){
        //$list=Admin::all();
        print_r($list);
        //echo 888;
    }
}