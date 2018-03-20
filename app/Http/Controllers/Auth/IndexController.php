<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 10:58
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller{
    public function index(){
        $user=Auth::user()->toArray();
        $user_id=Auth::user()->id;
        $id=Auth::id();
        print_r($user);
        print_r($user_id);
        print_r($id);
    }
}