<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11
 * Time: 16:25
 */

namespace App\Http\Middleware;


use App\Models\Category;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MemberMiddleware {
    public function handle(Request $request,\Closure $next){
        $mid=$request->session()->get('mid');
        if(empty($mid)){
            return redirect('login/index');
        }
        $member=Member::find($mid);
        $cache=Cache::get('category');
        if(empty($cache)){
            $category=$this->cate();
            Cache::put('category',$category,15);
        }else{
            $category=$cache;
        }
        view()->share('member',$member);
        view()->share('info',$member);
        view()->share('category',$category);
        return $next($request);
    }

    protected function cate(){
        $list=Category::where('status',1)->where('pid',0)->limit(10)->get();
        foreach($list as $k=>$v){
            $list[$k]['child']=Category::where('pid',$v['id'])->get();
            $info=Category::find($v['id']);
            $arr=Category::where('path','like',$info['path'].'%')->get();
            $path='';
            foreach($arr as $val){
                $path.=$val['path'];
            }
            $factor=array_unique(explode(',',substr($path,0,-1)));
            $list[$k]['goodslist']=Goods::whereIn('cid',$factor)->where('active',1)->limit(6)->get();
        }
        return $list;
    }
}