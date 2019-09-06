<?php

namespace App\Console\Commands;

use App\Handle\SwooleHandle;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

// php /www/wwwroot/laravel_5.4.36/artisan swoole {action}

class RunSwooleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Swoole';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arg=$this->argument('action');

        switch ($arg){
            case 'start':
                $this->info('swoole observer started');
                $this->start();
                break;
            case 'stop':
                $this->info('stoped');
                break;
            case 'restart':
                $this->info('restarted');
                break;
        }
    }

    /*
     * swoole启动
     */
    private function start()
    {
        $server = new \swoole_server('0.0.0.0',9510);
        $server->set([
            'worker_num'=>8,
            'daemonize'=>false,
            'max_request'=>10000,
            'dispatch_mode'=>2,
            'debug_mode'=>1
        ]);
        $handle=\App::make(SwooleHandle::class);

        //监听连接开启事件
        $server->on('start',[$handle,'onStart']);
        //监听连接
        $server->on('connect',[$handle,'onConnect']);
        //监听数据接收事件
        $server->on('receive',[$handle,'onReceive']);
        //监听连接关闭事件
        $server->on('close',[$handle,'onClose']);

        //启动服务器
        $server->start();
    }

    protected function getArguments()
    {
        return [
            ['action',InputArgument::REQUIRED,'start|stop|restart']
        ];
    }
}
