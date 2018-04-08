<?php

namespace App\Http\Controllers\Wap;


use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

/**
 * 社会化登录
 * Class LoginController
 * @package App\Http\Controllers\Wap
 */
class LoginController extends Controller {

    /**
     * 重定向用户到OAuth提供商
     * @return mixed
     * @author totti_zgl
     * @date 2018/4/8 16:07
     */
    public function redirectToProvider(){
        //return Socialite::driver('github')->redirect();

        //部分OAuth 提供商在重定向请求中支持携带可选参数
        //return Socialite::driver('google')->with(['hd' => 'example.com'])->redirect();

        return Socialite::driver('github')->scopes(['scope1','scope2'])->redirect();
    }

    /**
     * 在提供商验证之后接收回调
     * @author totti_zgl
     * @date 2018/4/8 16:07
     */
    public function handleProviderCallback(){
        //stateless方法可以用于禁用session状态的验证
        $user_1=Socialite::driver('github')->statusless()->user();

        $user=Socialite::driver('github')->user();

        // OAuth Two Providers
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();

        //有访问令牌，可以使用userFromToken方法检索用户的详细信息
        Socialite::driver('github')->userFromToken($token);
    }
}