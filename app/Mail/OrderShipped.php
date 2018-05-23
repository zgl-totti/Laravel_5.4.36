<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 公共属性实例（视图中可直接使用）
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderName='';

        //return $this->view('view.name')->with(compact('orderName'));


        return $this->view('view.name')

            //原始数据附件
            ->attachData($this->pdf, 'name.pdf', [
                'mime' => 'application/pdf',
            ])

            //邮件中加入附件
            ->attach('/path/to/file',[
                'as' => 'name.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
