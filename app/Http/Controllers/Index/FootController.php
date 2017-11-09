<?php
namespace App\Http\Controllers\Index;


use App\Models\Zuji;
use Illuminate\Http\Request;

class FootController extends BaseController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $info=Zuji::where('mid',$mid)->orderBy('addtime desc')->first();
        $str=date('Y-m-d',$info['addtime']);
        $last=Zuji::with('goodses')->whereBetween(strtotime($str),strtotime($str)+86400)->orderBy('addtime desc')->limit(5)->offset(0)->get();
        $early=Zuji::with('goodses')->whereBetween(strtotime($str)-86400*30,strtotime($str))->orderBy('addtime desc')->limit(5)->offset(0)->get();
        $empty='<h1>你还没有任何浏览记录，赶紧去首页挑选宝贝吧！</h1>';
        return view('index.foot.index',['str'=>$str,'last'=>$last,'early'=>$early,'empty'=>$empty]);
    }

    public function add(Request $request){
        if($request->ajax()){
            $gid=$request->input('gid');
            $mid=$request->session()->get('mid');
            $info=Zuji::where('mid',$mid)->where('gid',$gid)->first();
            if(empty($info)){
                $zuji= new Zuji();
                $zuji->mid=$mid;
                $zuji->gid=$gid;
                $zuji->addtime=time();
                if($zuji->save()){
                    return response(['code'=>1,'info'=>'添加成功！']);
                }else{
                    return response(['code'=>5,'info'=>'添加失败！']);
                }
            }else{
                return response(['code'=>5,'info'=>'已收藏,请不要重复添加！']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $t=$request->input('t');
            $gid=$request->input('gid');
            $mid=$request->session()->get('mid');
            if(! empty($t)){
                if($t=='更早' || $t=='全部'){
                    $row=Zuji::where('addtime','>',0)->delete();
                }else{
                    $row=Zuji::whereBetween(strtotime($t),strtotime($t)+86400)->delete();
                }
            }
            if(! empty($gid)){
                $row=Zuji::where('mid',$mid)->where('gid',$gid)->delete();
            }
            if($row){
                return response(['code'=>1,'info'=>'删除成功！']);
            }else{
                return response(['code'=>5,'info'=>'删除失败！']);
            }
        }
    }

    public function detail(Request $request){
        $mid=$request->session()->get('mid');
        $date=$request->input('date');
        if($date != 'early'){
            $list=Zuji::with('goodses')
                ->where('mid',$mid)
                ->whereBetween(strtotime($date),strtotime($date)+86400*30)
                ->orderBy('addtime desc')
                ->paginate(10);
        }else{
            $list=Zuji::with('goodses')
                ->where('mid',$mid)
                ->whereBetween(strtotime($date)-86400*30,strtotime($date))
                ->orderBy('addtime desc')
                ->paginate(10);
        }
        $empty='<h1>你还没有任何浏览记录，赶紧去首页挑选宝贝吧！</h1>';
        return view('index.zuji.detail',['str'=>$date,'list'=>$list,'empty'=>$empty]);
    }

    public function getList(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $list=Zuji::with('goodses')->where('mid',$mid)
                ->orderBy('addtime desc')
                ->limit(5)->offset(0)
                ->get();
            if(empty($list)){
                return response(['code'=>5,'info'=>'<h3>你还没有浏览任何宝贝</h3>']);
            }else{
                return response(['code'=>1,'info'=>$list]);
            }
        }
    }
}