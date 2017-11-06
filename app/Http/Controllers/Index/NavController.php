<?php
namespace App\Http\Controllers\Index;

use App\Models\Advertise;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NavController extends BaseController{
    public function recommend(Request $request){
        $advertise=Advertise::where('location',1)->get();
        foreach($advertise as $v){
            $str[]=$v['content'];
        }
        $list=Goods::with(['getcategory'=>function($query) use ($str){
            $query->whereIn('categoryname',$str);
        }])->paginate(9);
        return view('index.nav.tj',['list'=>$list]);
    }
}