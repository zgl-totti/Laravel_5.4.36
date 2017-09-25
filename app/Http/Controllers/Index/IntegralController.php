<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 11:21
 */

namespace App\Http\Controllers\Index;


use App\Draw;
use App\DrawLog;
use App\Integral;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IntegralController extends Controller{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $member=Member::find($mid);
        $integral=Integral::with('getGoods')->where('zd',1)->limit(4)->get();
        $list=Integral::with('getGoods')->paginate(16);
        $list1=Integral::with('getGoods')->where('status',0)->paginate(8);
        $list2=Integral::with('getGoods')->where('status',1)->paginate(8);
        $draw=Draw::all();
        $drawLog=DrawLog::with('getMember')->orderBy('id','desc')->limit(6)->get();




        return view('index.integral.index',[
            'member'=>$member,'integral'=>$integral,
            'draw'=>$draw,'drawLog'=>$drawLog,
            'list'=>$list,'list1'=>$list1,
            'list2'=>$list2
        ]);
    }



}