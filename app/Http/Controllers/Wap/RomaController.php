<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 15:33
 */

namespace App\Http\Controllers\Wap;


use App\Http\Controllers\SportsTrait;
use Illuminate\Routing\Controller;

class RomaController extends Controller{
    public function index(){
        SportsTrait::hello();
    }

    public function add(){
        $status=SportsTrait::$statusMap;
        $app_name=config('app.name');
        print_r($status);
        print_r($app_name);
    }
}