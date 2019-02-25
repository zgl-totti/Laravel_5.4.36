<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11
 * Time: 16:25
 */

namespace App\Http\Middleware;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminMiddleware {
    public function handle(Request $request,\Closure $next){
        $aid=$request->session()->get('aid');

        //从redis中取缓存
        //$user_id=intval(Cache::store('redis')->get('aid'));


        if(is_int($aid) && $aid>0){
            //把登录信息传到后面的操作中;
            $info=Admin::find($aid);
            view()->share('info', $info);
            return $next($request);
        }else{
            return redirect('admin/login');
        }
    }
}