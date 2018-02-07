<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/6
 * Time: 9:53
 */

namespace App\Http\Controllers\Wap;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class IndexController extends Controller{
    public function __construct(){
        if(Auth::check()==false){
            return Redirect::guest('roma');
        }
    }

    public function index(){
        return view('wap.login.index');
    }

    public function login(Request $request){
        $data['username']=$request->input('username');
        $data['password']=md5($request->input('password'));
        if (Auth::attempt($data)) {
            //return Redirect::intended('/');
            echo 888;
        }/*else{
            return \redirect('wap/index');
        }*/
    }

    public function roma(){
        echo 666;
    }

    protected function setupLayout(){
        if(!is_null($this->layout)){
            $this->layout=View::make($this->layout);
        }
    }

}