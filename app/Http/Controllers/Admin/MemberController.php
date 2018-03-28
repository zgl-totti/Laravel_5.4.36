<?php
namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends BaseController{
    public function index(Request $request){
        $username=$request->input('username');
        $list=Member::where(function ($query) use($username){
           $username && $query->where('username','like',$username.'%');
        })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.member.index',compact('list','firstRow','username'));
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=$request->input('id');
            $info=Member::find($id);
            $info->active=$info['active']==0?1:0;
            $row=$info->save();
            if(empty($row)){
                return response(['code'=>2,'info'=>'操作失败！']);
            }else{
                return response(['code'=>1,'info'=>'操作成功！']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $id=$request->input('id');
            $row=Member::find($id)->delete();
            if(empty($row)){
                return response(['code'=>2,'info'=>'删除失败！']);
            }else{
                return response(['code'=>1,'info'=>'删除成功！']);
            }
        }
    }
}