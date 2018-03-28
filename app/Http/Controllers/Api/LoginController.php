<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 17:03
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {
    public $successStatus=200;

    public function index(Request $request){
        $data=$request->all();
        $validator=Validator::make($data,[
            'name'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            $res['status']=500;
            $res['info']=$validator->errors();
            return response()->json($res,401);
        }
        if(Auth::attempt($data)){
            $res['token']=Auth::user()->createToken('MyApp')->accessToken;
            $res['status']=200;
            $res['info']='登录成功';
            $status=$this->successStatus;
        }else{
            $res['status']=400;
            $res['info']='登录失败';
            $status=401;
        }
        return response()->json($res,$status);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function getDetails(){
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}