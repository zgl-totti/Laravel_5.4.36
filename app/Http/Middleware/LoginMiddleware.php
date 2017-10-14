<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11
 * Time: 16:25
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class LoginMiddleware {
    public function handle(Request $request,\Closure $next){
        $aid=$request->session()->get('aid');
        if(is_int($aid) && $aid>0){
            return $next($request);
        }else{
            return redirect('https://www.baidu.com');
        }
    }
}