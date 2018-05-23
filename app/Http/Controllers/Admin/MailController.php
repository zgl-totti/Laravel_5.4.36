<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23
 * Time: 15:36
 */

namespace App\Http\Controllers\Admin;


use App\Mail\OrderShipped;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{
    public function ship(Request $request,$orderID)
    {
        $order=Order::findOrFail($orderID);

        $moreUsers='';
        $evenMoreUsers='';

        //发送邮件
        Mail::to($request->user())->send(new OrderShipped($order));

        //发送队列邮件
        Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->queue(new OrderShipped($order));

        //延迟邮件消息队列
        $when=Carbon::now()->addMinute(10);
        Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->later($when, new OrderShipped($order));


        //推送到特定队列
        $message = (new OrderShipped($order))
            ->onConnection('sqs')
            ->onQueue('emails');

        Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->queue($message);
    }
}