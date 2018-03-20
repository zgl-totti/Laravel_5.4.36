<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 15:41
 */

namespace App\Http\Controllers;


trait SportsTrait{
    public static function hello(){
        echo 666;
    }

    public static $statusMap=[
        '足球','篮球','橄榄球'
    ];
}