<?php
namespace App\Services;


class Spider
{
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

    /*
     * 数据存入
     */
    public function store()
    {
        $spider= new Spider();

        $spider->name=$this->checkSpider();
        $spider->save();
    }

    /*
     * 判断蜘蛛
     */
    private function checkSpider()
    {
        $http_user=$_SERVER['HTTP_USER_AGENT'];
        if(stripos($http_user,'Baiduspider')){
            return 'Baiduspider';
        }
        if(stripos($http_user,'Googlebot')){
            return 'Googlebot';
        }
        if(stripos($http_user,'Sougou')){
            return 'Sougou';
        }
        if(stripos($http_user,'360spider')){
            return '360spider';
        }
    }
}