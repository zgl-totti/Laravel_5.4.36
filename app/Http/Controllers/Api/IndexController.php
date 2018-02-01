<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 15:14
 */

namespace App\Http\Controllers\Api;


use App\Models\Admin;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller {
    public function index(Request $request){
        if($request->isMethod('post')){
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
    }

    public function roma($user_id,$news_id){
        $user_id=intval($user_id);
        $news_id=intval($news_id);
        if(empty($user_id) || empty($news_id)){
            $res['code']=1;
            $res['info']='非法操作';
            return response()->json($res);
        }
        $where['user_id']=$user_id;
        $where['news_id']=$news_id;
        $info=Admin::where($where)->first();
        if(empty($info)){
            $admin = new Admin();
            $admin->user_id = $user_id;
            $admin->news_id = $news_id;
            $admin->num = 0;
            $admin->addtime = time();
            $admin->save();
        }else {
            Admin::where($where)->increment('num',1);
        }
        $count1=Admin::where('news_id',$news_id)->count();
        $count2=Admin::where('user_id',$user_id)->count();
        $news_info=News::find($news_id);
        $data['info']=$news_info;
        $data['count1']=$count1;
        $data['count2']=$count2;
        $res['code']=1;
        $res['info']=$data;
        return response()->json($res);
    }

    public function totti(){
        $res['status']=1;
        //return response()->json($res);
        return $res;
    }
}