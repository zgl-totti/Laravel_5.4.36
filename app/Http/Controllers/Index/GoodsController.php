<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 15:27
 */

namespace App\Http\Controllers\Index;

use App\Models\Comment;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GoodsController extends BaseController{
    public function index(Request $request,$gid,$status){
        $id=intval($gid);
        if($status==1){
            $info=Goods::where('id',$id)->with('getPic')
                ->with(['getComment'=>function($query){
                    $query->join('member','member.id','=','comment.mid');
                }])->with('getCategory')->with('getIntegral')
                ->first();
        }elseif($status==2){
            $info=Goods::where('id',$id)->with('getBargain')
                ->with('getPic')
                ->first();
        }elseif($status==3){
            $info=Goods::where('id',$id)->with('getPic')
                ->with(['getComment'=>function($query){
                    $query->join('member','member.id','=','comment.mid');
                }])->with('getCategory')
                ->first();
        }
        $similar=Goods::where('bid',$info['bid'])->limit(5)->get();
        preg_match('/\d+/',$info['getCategory']['path'],$cid);
        $like=Goods::with(['getCategory'=>function($query) use($cid){
            $query->where('path','like',$cid[0].'%');
        }])->paginate(8);
        $num['num1']=Comment::where('gid',$gid)->where('sid',1)->count();
        $num['num2']=Comment::where('gid',$gid)->where('sid',2)->count();
        $num['num3']=Comment::where('gid',$gid)->where('sid',3)->count();

        return view('index.goods.index',[
            'info'=>$info,
            'status'=>$status,'similar'=>$similar,
            'like'=>$like,'num'=>$num
        ]);
    }
}