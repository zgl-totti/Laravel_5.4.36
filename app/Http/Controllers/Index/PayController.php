<?php
namespace App\Http\Controllers\Index;


use App\Models\Goods;
use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\OrderIntegral;
use App\Models\Site;
use Illuminate\Http\Request;

class PayController extends BaseController {
    public function index(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $str=str_shuffle('0123456789');
            $data['addtime']=time();
            $data['orderstatus']=1;
            $data['ordersyn']=date('Ymd').$str;
            $jf=$request->input('jf');
            if(empty($jf)){
                $order=Order::created($data);
                for($i=0;$i<count($data['gid']);$i++){
                    $cz=Goods::where('id',$data['gid'][$i])->first(['price','num','salenum']);
                    $order_goods= new OrderGoods();
                    $order_goods->gid=$data['gid'][$i];
                    $order_goods->buynum=$data['buynum'];
                    $order_goods->oid=$order['id'];
                    $order_goods->gidprice=$data['price'];
                    $order_goods->save();
                    $goods=Goods::find($data['gid'][$i]);
                    $goods->num=$cz['num']- $data['buynum'];
                    $goods->salenum=$cz['salenum']+$data['buynum'];
                    $goods->save();
                }
            }else{
                OrderIntegral::created($data);
            }
            $info=Site::find($data['sid']);
            return view('index.pay.index',[
                'info'=>$info,'gid'=>$jf,
                'orderprice'=>$data['orderprice'],
                'ordersyn'=>$data['ordersyn']
            ]);
        }
    }
}