<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 17:45
 */
namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{
    public function index(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $validator=Validator::make($data,Admin::$rules,Admin::$messages,Admin::$attributeNames);
            if($validator->passes()){
                $check_captcha=$this->checkCaptcha($data['verify']);
                if(empty($check_captcha)){
                    return response(['code'=>2,'info'=>'验证码错误！']);
                }
                $where['username']=$data['username'];
                $where['password']=md5($data['password']);
                $info=Admin::where($where)->first();
                if(empty($info)){
                    return response(['code'=>2,'info'=>'用户名或密码错误！']);
                }
                if($info['status'] != 1){
                    return response(['code'=>2,'info'=>'用户被停权！']);
                }
                $request->session()->put('aid',$info['id']);
                $info->lasttime=time();
                $info->ip=$request->getClientIp();
                $info->save();
                return response(['code'=>1,'info'=>'登录成功！']);
            }else{
                $error=$validator->messages()->toArray();
                if(! empty($error['username'])){
                    return response(['code'=>2,'info'=>$error['username'][0]]);
                }elseif(! empty($error['password'])){
                    return response(['code'=>2,'info'=>$error['password'][0]]);
                }else{
                    return response(['code'=>2,'info'=>$error['verify'][0]]);
                }
            }
        }else {
            return view('admin.login.index');
        }
    }

    public function captcha(){
        $captcha= new CaptchaBuilder();
        $captcha->build(148,51);
        $verify=$captcha->getPhrase();
        Session::put('verify',$verify);
        ob_clean();
        return response($captcha->output())->header('Content-type','image/jpeg');
    }

    private function checkCaptcha($data){
        $captcha=Session::get('verify');
        if($captcha==$data){
            return true;
        }else{
            return false;
        }
    }

    public function logout(Request $request){
        $request->session()->forget('aid');
        return redirect('admin/login');
    }

    /*public function index(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $rules=['username'=>'required', 'password'=>'required'];
            $validator=Validator::make($data,$rules);
            if($validator->passes()){
                $where['username']=$data['username'];
                $where['password']=md5($data['password']);
                $info=Admin::where($where)->first();
                if(empty($info)){
                    return response(['code'=>2,'info'=>'用户名或密码错误！']);
                }
                if($info['status'] != 1){
                    return response(['code'=>2,'info'=>'用户被停权！']);
                }
                $request->session()->put('aid',$info['id']);
                $info->lasttime=time();
                $info->ip=$request->getClientIp();
                $info->save();
                return response(['code'=>1,'info'=>'登录成功！']);
            }else{
                return response(['code'=>2,'info'=>$validator->messages()]);
            }
        }else {
            return view('admin.login.index');
        }
    }*/
}