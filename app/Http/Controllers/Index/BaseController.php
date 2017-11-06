<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6
 * Time: 16:22
 */

namespace App\Http\Controllers\Index;


use Illuminate\Routing\Controller;

class BaseController extends Controller{
    public function __construct(){
        $this->middleware('index');
    }
}