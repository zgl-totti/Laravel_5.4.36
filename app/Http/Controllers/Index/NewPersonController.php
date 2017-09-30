<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 17:26
 */

namespace App\Http\Controllers\Index;


use App\Bargain;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewPersonController extends Controller{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $member=Member::find($mid);
        $list=Bargain::with('getGoods')->where('status',1)->limit(40)->get();
        return view('index.newperson.index',['member'=>$member,'list'=>$list]);
    }

}