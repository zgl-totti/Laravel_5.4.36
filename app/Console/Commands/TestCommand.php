<?php

namespace App\Console\Commands;

use App\Models\Goods;
use App\Models\Order;
use App\Models\OrderGoods;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
            $where['orderstatus']=1;
            $condition['addtime']=['<',time() - 72 * 3600];

            $order_ids = Order::where($where)->where('addtime','<',time() - 72 * 3600)->select('id')->get();

            $list = OrderGoods::when($order_ids, function ($query) use ($order_ids) {
                $query->whereIn('oid', $order_ids);
            })
                ->select('gid', 'buynum')
                ->get();

            if ($list) {
                foreach ($list as $v) {
                    Goods::where('id', $v['gid'])->increment('num', $v['buynum']);

                    $goods = Goods::find($v['gid']);
                    if ($goods['salenum'] >= $v['buynum']) {
                        Goods::where('id', $v['gid'])->decrement('salenum', $v['buynum']);
                    } else {
                        Goods::where('id', $v['gid'])->update(['salenum' => 0]);
                    }
                }
            }

            $row=Order::where($where)->where('addtime','<',time() - 72 * 3600)->update(['orderstatus' => 9]);
        }catch (\Exception $e){
            Log::info('command:'.$e->getMessage());
        }

        Log::info('command:success'.$row);
    }
}
