<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Order;
use App\Models\OrderGoods;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Jobs\SendPostEmail;
use App\Post;

class IndexController extends Controller
{
    /*
     * 推送任务到队列
     */
    public function queue()
    {
        $data=[];
        dispatch(new SendPostEmail($data));
    }

    /**
     * 发送邮件(走队列)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:6',
            'body'=> 'required|min:6',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        dispatch(new SendPostEmail($post)); // 队列
        return redirect()->back()->with('status', 'Your post has been submitted successfully');
    }

    /**
     * 创建订单
     */
    public function createOrder(Request $request)
    {
        $user_id=$request->input('user_id');
        $goods_id=$request->input('goods_id');
        $goods_number=$request->input('goods_number');
        $goods=Goods::find($goods_id);

        $redis_num=Redis::get('goods_'.$goods_id);

        if($goods['goods_number']<$redis_num+$goods_number){
            $res=[
                'status'=>0,
                'info'=>'库存不足'
            ];

            return response()->json($res);
        }

        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id = $user_id;

            $row1=$order->save();

            $orderGoods= new OrderGoods();
            $orderGoods->order_id=$order->id;
            $orderGoods->goods_id=$goods_id;
            $orderGoods->goods_number=$goods_number;
            $orderGoods->goods_price='';

            $row2=$orderGoods->save();

            if(empty($row1) || empty($row2)){
                throw new \Exception('5555555555');
            }

            DB::commit();

            Redis::incrby('goods_'.$goods_id,$goods_number);

            $res=[
                'status'=>1,
                'info'=>''
            ];

            return response()->json($res);

        }catch (\Exception $e){
            DB::rollBack();
            $res=[
                'status'=>0,
                'info'=>$e->getMessage()
            ];

            return response()->json($res);
        }
    }


    /**
     * 秒杀
     */
    public function skill($skill_id,$user_id)
    {
        $redis= new Redis();
        $redis_name='skill_'.$skill_id;

        //获取redis中已有的数量
        $redis_num=$redis->llen($redis_name);

        if($redis_num<100){
            //下单操作

            $redis->lpush($redis_name,$user_id.'_'.time());

            echo $user_id.'恭喜秒杀成功！';

        }else{

            echo '大于100人,秒杀失败！';

        }

        $redis->close();
    }


    /**
     * 秒杀成功下单(定时任务去执行)
     */
    public function skillSuccess($skill_id)
    {
        $redis= new Redis();
        $redis_name='skill_'.$skill_id;

        $skill=Skill::find($skill_id);

        while (true){
            //从队列左侧取数据
            $arr=$redis->rpop($redis_name);
            if(empty($arr)){
                continue;
            }

            $data=join('_',$arr);
            $user_id=$data[0];
            $created_time=date('Y-m-d H:i:s',$data[1]);

            $order= new Order();
            $order->order_sn='';
            $order->user_id=$user_id;
            $order->order_type=2;
            $order->order_price=$skill->price;
            $order->created_time=$created_time;

            $row=$order->save();

            if(empty($row)){
                //入库失败，从队列取出的值再压回去
                $redis->rpush($redis_name,$arr);
            }
        }

        $redis->close();
    }
}