<?php

namespace App\Http\Controllers\Index;

use App\Models\Member;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends BaseController{
    public function index(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $validator=Validator::make($data,Member::$rules,Member::$messages,Member::$attributeNames);
            if($validator->passes()){
                $captcha=$data['verify'];
                $row1=$this->checkCaptcha($captcha);
                if(empty($row1)){
                    $result['code']=5;
                    $result['info']='验证码错误！';
                    return response()->json($result);
                }
                $username=$data['username'];
                //$where['password']=bcrypt($data['password']);
                $where['password']=md5($data['password']);
                $info=Member::where($where)
                    ->where(function($query) use ($username){
                        $query->where('username',$username)->orWhere('mobile',$username);
                    })->first();
                if(empty($info)){
                    $result['code']=5;
                    $result['info']='账号或密码错误！';
                    return response()->json($result);
                }
                Session::put('mid',$info->id);
                $result['code']=1;
                $result['info']='登录成功！';
                return response()->json($result);
            }else{
                $result['code']=5;
                $result['info']='必填项不能为空！';
                return response()->json($result);
            }
        }else{
            return view('index.login.index');
        }
    }

    public function register(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $validator=Validator::make($data,Member::$rules,Member::$messages,Member::$attributeNames);
            if($validator->passes()){






            }else{
                $res['code']=5;
                return response()->json($res);
            }
        }else{
            return view('index.login.register');
        }
    }

    public function captcha(){
        $captcha= new CaptchaBuilder();
        $captcha->build(150,32);
        $verify=$captcha->getPhrase();
        Session::put('index_verify',$verify);
        ob_clean();
        return response($captcha->output())->header('Content-type','image/jpeg');
    }

    protected function checkCaptcha($data){
        $captcha=Session::get('index_verify');
        if($captcha==$data){
            return true;
        }else{
            return false;
        }
    }
}
