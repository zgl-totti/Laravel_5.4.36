<?php

namespace App\Handle;

/*
 * swoole调度
 */
class SwooleHandle
{
    /*
     * 监听连接
     */
    public function onConnect($server,$fd){}

    /*
     * 监听事件
     */
    public function onReceive($server,$fd,$from_id,$data){}

    /*
     * 关闭连接
     */
    public function onClose($server,$fd){}
}