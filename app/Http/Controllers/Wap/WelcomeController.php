<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 9:53
 */

namespace App\Http\Controllers\Wap;


use App\Http\Controllers\Controller;
use App\Jobs\QueuedTest;
use Illuminate\Contracts\Queue\Queue;

class WelcomeController extends Controller {
    public function index(){
        //消息的生成与发送
        $this->dispatchNow(new QueuedTest());
        //消息的获取与处理
        $queue=app(Queue::class);
        $queue->pop();
        return view('welcome');
    }
}