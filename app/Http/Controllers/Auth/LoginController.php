<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'auth/index';

    /*// 认证失败后跳转地址
    protected $redirectAfter = 'login';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    //自定义实现用户认证的「guard」
    protected function guard()
    {
        return Auth::guard('admin');
    }

    //Laravel默认使用email字段来认证,可以定义username进行其他字段认证
    public function username()
    {
        return 'username';
    }


    protected function login(Request $request)
    {
        $data=$request->all();
        $validator=Validator::make($data,User::$rules,User::$messages,User::$attributeNames);
        if($validator->fails()){
            //$error=$validator->messages();
            return redirect()->back()->withErrors($validator);
        }
        $info=Auth::attempt(['name'=>$data['username'],'password'=>$data['password']]);
        if(empty($info)){
            //return redirect()->intended($this->redirectAfter);
            return redirect()->back();
        }

        //return redirect()->intended($this->redirectTo);
        return redirect($this->redirectTo);
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login');
    }
}
