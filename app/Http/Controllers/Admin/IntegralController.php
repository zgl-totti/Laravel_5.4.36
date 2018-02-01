<?php
namespace App\Http\Controllers\Admin;


use App\Models\Draw;
use App\Models\Goods;
use App\Models\Integral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegralController extends BaseController{
    public function index(){
        $list=Integral::with('getGoods')->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.integral.index',compact('list','firstRow'));
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=intval($request->input('id'));
            $count=Integral::count('zd');
            if($count>=4){
                return response(['code'=>2,'info'=>'最多只能置顶4件商品！']);
            }
            $info=Integral::find($id);
            $info->zd=$info['zd']==0?1:0;
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
            $id=intval($request->input('id'));
            $row=Integral::find($id)->delete();
            if(empty($row)){
                return response(['code'=>2,'info'=>'删除失败！']);
            }else{
                return response(['code'=>1,'info'=>'删除成功！']);
            }
        }
    }

    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            $id=intval($request->input('id'));
            $needJF=$request->input('needJF');
            $getUB=$request->input('getUB');
            if(empty($needJF)){
                return response(['code'=>5,'info'=>'所需积分不能为空！']);
            }
            if($getUB==0){
                return response(['code'=>5,'info'=>'兑换U币值不能为空！']);
            }
            $info=Integral::find($id);
            $info->needJF=$needJF;
            if(!empty($getUB)){
                $info->getUB=$getUB;
            }
            $row=$info->save();
            if(empty($row)){
                return response(['code'=>2,'info'=>'编辑失败！']);
            }else{
                return response(['code'=>1,'info'=>'编辑成功！']);
            }
        }else {
            $id = intval($id);
            $info=Integral::find($id);
            return view('admin.integral.edit',compact('info'));
        }
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $needJF=$request->input('needJF');
            $status=$request->input('status');
            $gid=$request->input('gid');
            $getUB=$request->input('getUB');
            $integral= new Integral();
            if($status==0){
                $info=Integral::where('getUB',$getUB)->first();
                if(!empty($info)){
                    return response(['code'=>5,'info'=>'该礼品已存在！']);
                }
                $validator=Validator::make(Integral::$rules2,Integral::$messages,Integral::$attributeNames);
                if($validator->passes()){
                    $integral->needJF=$needJF;
                    $integral->status=$status;
                    $integral->getUB=$getUB;
                }else{
                    return response(['code'=>5,'info'=>'必填项不符合规则！']);
                }
            }elseif ($status==1){
                $info=Integral::where('gid',$gid)->first();
                if(!empty($info)){
                    return response(['code'=>5,'info'=>'该礼品已存在！']);
                }
                $validator=Validator::make(Integral::$rules1,Integral::$messages,Integral::$attributeNames);
                if($validator->passes()){
                    $integral->needJF=$needJF;
                    $integral->status=$status;
                    $integral->gid=$gid;
                }else{
                    return response(['code'=>5,'info'=>'必填项不符合规则！']);
                }
            }
            $row=$integral->save();
            if(empty($row)){
                return response(['code'=>5,'info'=>'添加礼品失败！']);
            }else{
                return response(['code'=>1,'info'=>'添加礼品成功！']);
            }
        }else{
            $goods=Goods::all();
            return view('admin.integral.add',compact('goods'));
        }
    }

    public function getGoodsInfo(Request $request){
        if($request->ajax()) {
            $id=intval($request->input('id'));
            $info=Goods::find($id);
            return response(['code'=>1,'info'=>$info]);
        }
    }

    //奖品设置
    public function trophy(){
        $list=Draw::paginate(10);
        $count=Draw::sum('v');
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.integral.trophy',compact('list','firstRow','count'));
    }

    public function del_trophy(Request $request){
        if($request->ajax()){
            $id=intval($request->input('id'));
            $row=Draw::find($id)->delete();
            if(empty($row)){
                return response(['code'=>2,'info'=>'删除失败！']);
            }else{
                return response(['code'=>1,'info'=>'删除成功！']);
            }
        }
    }

    public function edit_trophy(Request $request,$id){
        if($request->ajax()){
            $id=intval($request->input('id'));
            $prize=$request->input('prize');
            $num=$request->input('num');
            $lx=$request->input('lx');
            $v=$request->input('v');
            $info=Draw::find($id);
            $info->prize=$prize;
            $info->num=$num;
            $info->lx=$lx;
            $info->v=$v;
            $row=$info->save();
            if(empty($row)){
                return response(['code'=>2,'info'=>'编辑失败！']);
            }else{
                return response(['code'=>1,'info'=>'编辑成功！']);
            }
        }else{
            $id=intval($id);
            $info=Draw::find($id);
            $count=Draw::sum('v');
            $condition=round($info['v']/$count*100,2);
            return view('admin.integral.edit_trophy',compact('info','condition'));
        }
    }
}