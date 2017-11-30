<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 15:14
 */

namespace App\Http\Controllers\Api;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller {
    public function index(Request $request){
        $result['code']=500;
        $result['body']='非法操作！';
        return response()->json($result);

        //if($request->isMethod('post')){
            $token=trim($request->input('token'));
            $username=trim($request->input('username'));
            $password=trim($request->input('password'));
            if(empty($token)){
                $result['code']=500;
                $result['body']='非法操作！';
                return response()->json($result);
            }
            if(empty($username)){
                $result['code']=500;
                $result['body']='用户名不能为空！';
                return response()->json($result);
            }
            if(empty($password)){
                $result['code']=500;
                $result['body']='用户名不能为空！';
                return response()->json($result);
            }
            $where['username']=$username;
            $where['password']=md5($password);
            $info=Admin::where($where)->first();
            if(empty($info)){
                $result['code']=500;
                $result['body']='账号或密码错误！';
                return response()->json($result);
            }
            if($info->status!=1){
                $result['code']=500;
                $result['body']='账号被停权！';
                return response()->json($result);
            }
            $result['code']=100;
            $result['body']='登录成功！';
            $result['info']=$info->id;
            return response()->json($result);
        }
    //}
}