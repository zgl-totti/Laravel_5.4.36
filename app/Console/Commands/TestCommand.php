<?php

namespace App\Console\Commands;

use App\Models\Goods;
use App\Models\Order;
use App\Models\OrderGoods;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


//sh -c "cd /www/wwwroot/laravel_5.4.36;php artisan command:test;"
//0 */1 * * * /home/crontab/laravel_5.4.36.sh


class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //执行的逻辑
        try {

            $where=[
                ['orderstatus',1],
                ['addtime','<',time()-72*3600]
            ];

            $order_ids = Order::where($where)->select('id')->get();

            //$order_ids = Order::where($where)->where('addtime','<',time() - 72 * 3600)->select('id')->get();

            $list = OrderGoods::when($order_ids, function ($query) use ($order_ids) {
                $query->whereIn('oid', $order_ids);
            })
                ->select('gid', 'buynum')
                ->get();

            if ($list) {
                foreach ($list as $v) {
                    Goods::where('id', $v['gid'])->increment('num', $v['buynum']);

                    $goods = Goods::find($v['gid']);
                    if (intval($goods['salenum']) >= intval($v['buynum'])) {
                        Goods::where('id', $v['gid'])->decrement('salenum', $v['buynum']);
                    } else {
                        Goods::where('id', $v['gid'])->update(['salenum' => 0]);
                    }
                }
            }

            $row=Order::where($where)->update(['orderstatus' => 9]);
            if ($row) {
                Log::info('command:success_' . time() . '_条数：' . $row);
            } else {
                Log::info('command:error_' . time());
            }
        }catch (\Exception $e){
            Log::info('command:warning_'.time().'_'.$e->getMessage());
        }
    }
}
