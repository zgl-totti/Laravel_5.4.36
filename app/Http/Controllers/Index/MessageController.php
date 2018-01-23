<?php
namespace App\Http\Controllers\Index;


use App\Models\Letter;
use App\Models\Member;
use Illuminate\Http\Request;

class MessageController extends MemberController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $mid_=[0,$mid];
        $list=Letter::whereIn('mid',$mid_)->orderBy('addtime','desc')->paginate(9);
        return view('index.message.index',compact('list'));
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=$request->input('id');
            $info=Letter::find($id);
            $info->status=1;
            $row=$info->save();
            if(empty($row)){
                $res['status']=5;
                $res['info']='设置失败！';
                return response()->json($res);
            }else{
                $res['status']=1;
                $res['info']='设置成功！';
                return response()->json($res);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $id=$request->input('id');
            $row=Letter::find($id)->delete();
            if(empty($row)){
                $res['status']=5;
                $res['info']='设置失败！';
                return response()->json($res);
            }else{
                $res['status']=1;
                $res['info']='设置成功！';
                return response()->json($res);
            }
        }
    }

    public function detail(Request $request,$id){
        $mid=$request->session()->get('mid');
        $member=Member::find($mid);
        $id=intval($id);
        $info=Letter::find($id);
        $info->status=1;
        $info->save();
        return view('index.message.detail',compact('info','member'));
    }
}