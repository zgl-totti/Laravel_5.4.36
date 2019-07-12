<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Alidayu
{
    const LOG_TPL = 'alidayu:';

    private static $_instance = null;

    private function __construct(){}

    //静态方法，单例模式统一入口
    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance= new self();
        }

        return self::$_instance;
    }

    public function setSmsIdentify($phone)
    {
        $code=rand(100000,999999);

        try{
            $c = new TopClient();
            $c->appKey=config('ali.appKey');
            $c->secretKey=config('ali.secretKey');
            $req= new AlibabaAliqinFcSmsNumSendRequest();
            $req->setExtend('123456');
            $req->setSmsType('normal');
            $req->setSmsFreeSignName(config('ali.signName'));
            $req->setSmsParam("{\"code\":\"".$code."\"}");
            $req->setRecNum($phone);
            $req->setSmsTmplateCode(config('ali.templateCode'));
            $resp=$c->execute($req);

        }catch (\Exception $e){
            //记录日志
            Log::warning(self::LOG_TPL.'set--'.$e->getMessage());
            return false;
        }

        if($resp->result->success == 'true'){
            //设置验证码失效时间
            Cache::get($phone,$code,config('ali.identify_time'));

            return true;
        }
        Log::warning(self::LOG_TPL.'set--'.json_encode($resp));

        return false;
    }

    //根据手机号码查验验证码
    public function checkSmsIdentify($phone)
    {
        if(!$phone){
            return false;
        }

        return Cache::get($phone);
    }
}