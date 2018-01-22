<?php
namespace App\Http\Controllers\Index;

use App\Models\Account;
use App\Models\After;
use App\Models\AfterPics;
use App\Models\Bargain;
use App\Models\Dhlog;
use App\Models\Goods;
use App\Models\Integral;
use App\Models\Jshop;
use App\Models\Letter;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\OrderIntegral;
use App\Models\Site;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController{
    public function index(Request $request){
        $status=$request->input('status');
        $gid=$request->input('gid');
        $data['id']=$gid;
        $data['status']=$status;
        if($status==1){
            $info=Integral::with('getGoods')->where('gid',$gid)->first();
            $data['goodsname']=$info['getGoods']['goodsname'];
            $data['pic']=$info['getGoods']['pic'];
            $data['buynum']=1;
            $data['price']=$info['needJF'];
            $data['orderprice']=$info['needJF'];
        }elseif($status==2){
            $info=Bargain::with('getGoods')->where('gid',$gid)->first();
            $data['goodsname']=$info['getGoods']['goodsname'];
            $data['pic']=$info['getGoods']['pic'];
            $data['buynum']=1;
            $data['price']=$info['cutprice'];
            $data['orderprice']=$info['cutprice'];
        }else{
            $info=Goods::find($gid);
            $data['goodsname']=$info['goodsname'];
            $data['pic']=$info['pic'];
            $data['buynum']=$request->input('buynum');
            $data['price']=$info['price'];
            $data['orderprice']=$info['price']*$info['buynum'];
        }
        return view('index.order.index',['data'=>$data]);
    }

    public function add(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $count=Site::where('mid',$mid)->count();
            if($count>10){
                return response(['code'=>5,'info'=>'最多保存10个地址']);
            }
            $data=$request->all();
            $rules=['username'=>'required', 'phone'=>'required','ps'=>'required','qs'=>'required','ws'=>'required','xyd'=>'required'];
            $validator=Validator::make($data,$rules);
            if($validator->passes()){
                $site= new Site();
                $site->username=trim($data['username']);
                $site->phone=trim($data['phone']);
                $site->ps=trim($data['ps']);
                $site->qs=trim($data['qs']);
                $site->ws=trim($data['ws']);
                $site->xyd=trim($data['xyd']);
                $arr=Site::where('mid',$mid)->first();
                if($arr){
                    $site->active=0;
                }else{
                    $site->active=1;
                }
                $row=$site->save();
                if($row){
                    return response(['code'=>1,'info'=>'地址添加成功']);
                }else{
                    return response(['code'=>5,'info'=>'地址添加失败']);
                }
            }else {
                return response(['code' => 2, 'info' => $validator->messages()]);
            }
        }
    }

    public function order(Request $request,$status){
        $goodsname=trim($request->input('goodsname'));
        $mid=$request->session()->get('mid');
        if(!empty($status)){
            $where['orderstatus']=$status;
        }
        if($status==1){
            $title='待付款';
        }elseif ($status==2){
            $title='待发货';
        }elseif ($status==3){
            $title='待收货';
        }elseif ($status==4){
            $title='待评价';
        }elseif ($status==5){
            $title='积分订单';
        }else{
            $title='全部订单';
        }
        $where['mid']=$mid;
        if($status==5){
            if($goodsname){
                $goods=Goods::where('goodsname','like',$goodsname.'%')->get();
                foreach ($goods as $v){
                    $order[]=OrderIntegral::where('gid',$v['id'])->pluck('id');
                }
                if(!empty($order)){
                    foreach ($order as $v1){
                        foreach ($v1 as $v2) {
                            $oid[] = $v2;
                        }
                    }
                }else{
                    $oid=[];
                }
            }else{
                $oid=[];
            }
            $list=OrderIntegral::where('mid',$mid)
                ->where(function($query) use ($goodsname,$oid){
                    $goodsname && $oid && $query->whereIn('id',$oid);
                })
                ->with('getGoods')
                ->with('getStatus')
                ->orderBy('addtime','desc')
                ->paginate(10);
            return view('index.order.integral',compact('title','list','goodsname','status'));
        }else{
            if($goodsname){
                $goods=Goods::where('goodsname','like',$goodsname.'%')->get();
                foreach ($goods as $v){
                    $order_goods[]=OrderGoods::where('gid',$v['id'])->pluck('oid');
                }
                if(!empty($order_goods)) {
                    foreach ($order_goods as $v1) {
                        foreach ($v1 as $v2) {
                            $oid[] = $v2;
                        }
                    }
                }else{
                    $oid=[];
                }
            }else{
                $oid=[];
            }
            $list=Order::with(['getOrderGoods'=>function($query){
                $query->join('goods','goods.id','=','order_goods.gid');
            }])->with('getStatus')
                ->where($where)
                ->where(function($query) use($goodsname,$oid){
                    $goodsname && $oid && $query->whereIn('id',$oid);
                })->orderBy('addtime','desc')->paginate(10);
            return view('index.order.order',compact('title','list','status','goodsname'));
        }
    }

    //退款订单
    public function refund_order(Request $request){
        $mid=$request->session()->get('mid');
        $goodsname=trim($request->input('goodsname'));
        if($goodsname){
            $goods=Goods::where('goodsname','like',$goodsname.'%')->get();
            foreach ($goods as $v){
                $order[]=After::where('gid',$v['id'])->pluck('id');
            }
            if(!empty($order)){
                foreach ($order as $v1){
                    foreach ($v1 as $v2) {
                        $oid[] = $v2;
                    }
                }
            }else{
                $oid=[];
            }
        }else{
            $oid=[];
        }
        $list=After::where('mid',$mid)
            ->where(function($query) use ($goodsname,$oid){
                $goodsname && $oid && $query->whereIn('id',$oid);
            })->with('getGoods')
            ->with('getAfterStatus')
            ->orderBy('addtime','desc')
            ->paginate(5);
        return view('index.order.refund_order',compact('list','goodsname'));
    }

    //删除订单
    public function del(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $oid=intval($request->input('oid'));
            $where['mid']=$mid;
            $where['id']=$oid;
            $info=Order::where($where)->first();
            if (empty($info)){
                $row=OrderIntegral::where($where)->delete();
                if($row){
                    return response(['code'=>1,'info'=>'删除成功！']);
                }else{
                    return response(['code'=>5,'info'=>'删除失败！']);
                }
            }else{
                $condition['oid']=$oid;
                $row1=OrderGoods::where($condition)->delete();
                $row2=Order::where($where)->delete();
                if($row1 && $row2){
                    return response(['code'=>1,'info'=>'删除成功！']);
                }else{
                    return response(['code'=>5,'info'=>'删除失败！']);
                }
            }
        }
    }

    //确认收货
    public function receiving(Request $request){
        if($request->ajax()) {
            $mid = $request->session()->get('mid');
            $oid = intval($request->input('oid'));
            $info = Order::find($oid);
            $after = After::where('mid', $mid)->where('oid', $info->ordersyn)->first();
            if (empty($after)) {
                if ($info) {
                    $info->orderstatus = 4;
                    $row = $info->save();
                    if ($row) {
                        $member = Member::find($mid);
                        $member->expense = $info->orderprice + $member['expense'];
                        $member->integral = $info->orderprice + $member['expense'];
                        $member->save();
                    }
                } else {
                    $row = OrderIntegral::where('mid', $mid)->where('ordersyn', $info->ordesyn)->update(['orderstatus' => 4]);
                }
                if ($row) {
                    $res['status'] = 1;
                    $res['info'] = '确认收货成功！';
                    return response()->json($res);
                } else {
                    $res['status'] = 5;
                    $res['info'] = '确认收货失败！';
                    return response()->json($res);
                }
            } else {
                $res['status'] = 5;
                $res['info'] = '该订单中有商品申请售后,正在处理中！';
                return response()->json($res);
            }
        }
    }

    //支付
    public function pay(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $paypwd=md5(trim($request->input('paypwd')));
            $status=intval($request->input('status'));
            $oid=intval($request->input('oid'));
            $info=Member::find($mid);
            if(empty($info->paypwd)){
                $res['status']=5;
                $res['info']='支付密码不存在，请到个人中心-安全设置中设置！';
                return response()->json($res);
            }
            if($paypwd!=$info['paypwd']){
                $res['status']=5;
                $res['info']='支付密码错误！';
                return response()->json($res);
            }
            if($status==1){
                $order=Order::find($oid);
                $money=$info->blance-$order->orderprice;
                if($money>=0){
                    $transaction=DB::beginTransaction();
                    try{
                        $account= new Account();
                        $account->mid=$mid;
                        $account->money=$order->orderprice;
                        $account->addtime=time();
                        $row1=$account->save();
                        $info->blance=$money;
                        if($request->session()->get('isnew')){
                            $info->isnew=1;
                        }
                        $row2=$info->save();
                        $order->orderstatus=2;
                        $row3=$order->save();
                        if(empty($row1) || empty($row2) || empty($row3)){
                            throw new QueryException('支付失败！');
                        }
                        $transaction->commit();
                        $res['status']=1;
                        $res['info']='支付成功！';
                        return response()->json($res);
                    }catch (QueryException $e){
                        $transaction->rollBack();
                        $res['status']=5;
                        $res['info']=$e->getMessage();
                        return response()->json($res);
                    }
                }else{
                    $res['status']=5;
                    $res['info']='余额不足,请充值！';
                    return response()->json($res);
                }
            }else{
                $order=OrderIntegral::where('id',$oid)->with('getGoods')->first();
                $money=$info->integral-$order->orderprice;
                if($money>=0){
                    $transaction=DB::beginTransaction();
                    try{
                        //更新兑换记录表
                        $jid=Jshop::where('needJF',$order->orderprice)->first();
                        $dhlog= new Dhlog();
                        $dhlog->mid=$mid;
                        $dhlog->Jid=$jid['id'];
                        $dhlog->addtime=time();
                        $row1=$dhlog->save();
                        //写信
                        $letter= new Letter();
                        $letter->mid=$mid;
                        $letter->addtime=time();
                        $letter->content='在积分商城中使用'.$order->orderprice.'积分兑换了'.$order['getGoods']['goodsname'];
                        $row2=$letter->save();
                        $info->integral=$money;
                        $row3=$info->save();
                        $order->orderstatus=2;
                        $row4=$order->save();
                        if(empty($row1) || empty($row2) || empty($row3) || empty($row4)){
                            throw new QueryException('支付失败！');
                        }
                        $transaction->commit();
                        $res['status']=1;
                        $res['info']='支付成功！';
                        return response()->json($res);
                    }catch (QueryException $exception){
                        $transaction->rollBack();
                        $res['status']=5;
                        $res['info']=$exception->getMessage();
                        return response()->json($res);
                    }
                }else{
                    $res['status']=5;
                    $res['info']='积分不足,支付失败！';
                    return response()->json($res);
                }
            }
        }
    }

    //订单详情
    public function info(Request $request,$oid){
        $oid=intval($oid);
        $info=Order::where('id',$oid)
            ->with(['getOrderGoods'=>function($query){
                $query->join('goods','goods.id','=','order_goods.gid');
            }])->with('getStatus')
            ->with('getSite')
            ->first();
        return view('index.order.orderinfo',compact('info'));
    }

    //退款申请
    public function refund(Request $request,$oid,$gid){
        if($request->isMethod('post')){
            $mid=$request->session()->get('mid');
            $orderprice=intval($request->input('orderprice'));
            $o_id=intval($request->input('oid'));
            $g_id=intval($request->input('gid'));
            $scid=intval($request->input('scid'));
            $money=trim($request->input('money'));
            $reason=trim($request->input('reason'));
            $mess=trim($request->input('mess'));
            if(empty($money) || empty($reason) || empty($mess)){
                $res['status']=5;
                $res['info']='必填项不能为空！';
                return response()->json($res);
            }
            $after= new After();
            $after->mid=$mid;
            $after->gid=$g_id;
            $after->oid=$o_id;
            $after->money=$money;
            $after->orderprice=$orderprice;
            $after->reason=$reason;
            $after->mess=$mess;
            $after->scid=$scid;
            $after->afterstatus=1;
            $after->aftersyn=substr(str_shuffle(time()),0);
            $after->addtime=time();
            if($after->save()){
                $afid=$after->id;
                if($request->hasFile('pic')){
                    $files=$request->file('pic');
                    foreach ($files as $file){
                        if($file->isValid()){
                            if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','jpeg','png'])){
                                $path = $file->store('uploads/refund/');
                                $after_pic= new AfterPics();
                                $after_pic->afid=$afid;
                                $after_pic->pic=$path;
                                if($after_pic->save()){
                                    return response(['code'=>2,'info'=>'提交申请成功']);
                                }else{
                                    return response(['code'=>2,'info'=>'提交申请失败']);
                                }
                            }else{
                                return response(['code'=>2,'info'=>'图片不合法']);
                            }
                        }else{
                            return response(['code'=>2,'info'=>$file->getErrorMessage()]);
                        }
                    }
                }else{
                    $res['status']=1;
                    $res['info']='提交申请失败！';
                    return response()->json($res);
                }
            }else{
                $res['status']=5;
                $res['info']='提交申请失败！';
                return response()->json($res);
            }
        }else{
            $oid=intval($oid);
            $gid=intval($gid);
            $info=Order::find($oid);
            $goods=Goods::find($gid);
            $order_goods=OrderGoods::where('oid',$oid)->where('gid',$gid)->first();
            $info['gid']=$gid;
            $info['goodsname']=$goods['goodsname'];
            $info['pic']=$goods['pic'];
            $info['buynum']=$order_goods['buynum'];
            $info['price']=$order_goods['gidprice'];
            $info['money']=$order_goods['buynum']*$order_goods['gidprice'];
            return view('index.order.refund',compact('info'));
        }
    }















































































    public function index_(){
        session('url',null);
        $jf=I('get.jf');
        if($jf){
            $jshop=M('Jshop');
            $js['gid']=I('get.gid');
            $data1=$jshop->join('yhyg_goods ON yhyg_jshop.gid=yhyg_goods.id')->where($js)->field('yhyg_goods.id,needJF,gid,goodsname,pic')->find();
            $data1['buynum']=1;
            $data1['price']=$data1['needjf'];
            $data1['orderprice']=$data1['needjf'];
        }else{
            $data=M('Goods');
            $order_copy=M('Order_copy');
            $mid['mid']=session('mid');
            $m=$order_copy->where($mid)->select();
            if($m){
                $id['id']=I('get.gid');
                $data1=$data->where($id)->find();
                $data1['buynum']=I('get.buynum');
                $data1['orderprice']=$data1['price']*$data1['buynum'];
            }else{
                $bargain=M('Bargain');
                $gid['gid']=I('get.gid');
                $g=$bargain->where($gid)->find();
                if($g){
                    $data1=$bargain->join('yhyg_goods ON yhyg_bargain.gid=yhyg_goods.id')->where($gid)->field('yhyg_goods.id,gid,goodsname,pic,cutprice')->find();
                    $data1['buynum']=1;
                    $data1['price']=$data1['cutprice'];
                    $data1['orderprice']=$data1['cutprice'];
                }else{
                    $id['id']=$gid['gid'];
                    $data1=$data->where($id)->find();
                    $data1['buynum']=I('get.buynum');
                    $data1['orderprice']=$data1['price']*$data1['buynum'];
                }
            }
        }
        $this->assign('data2',$data1);
        $this->xs();
        $this->display();
    }
    public function xs(){
        $site1=M('Site');
        $data['mid']=session('mid');
        $data=$site1->where($data)->order('active desc,addtime desc')->select();
        if($data){
            $this->assign('data',$data);
        }
    }
    public function add1(){
        if(IS_AJAX){
            $site1=M('Site');
            $mid['mid']=session('mid');
            $count=$site1->where($mid)->count();
            if($count>10){
                $this->error('最多保存10个地址');
            }
            $site=D('Site');
            $site_copy=M('Site_copy');
            $data=$site->create();
           if($data){
                $data['username']=trim($data['username']);
                $data['phone']=trim($data['phone']);
                $data['addtime']=time();
                $data['mid']=session('mid');
                $data0['mid']=session('mid');
               $a=$site->where($data0)->select();
               if($a){
                   $data['active']=0;
               }else{
                   $data['active']=1;
               }
                $sid=$site->site($data);
                if($sid){
                    $site_copy->field('username,phone,ps,qs,ws,xyd,mid,addtime,active')->add($data);
                    $this->success("地址保存成功");
                }else{
                    $this->error('地址保存失败');
                }
            }else{
                $this->error($site->getError());
            }
        }
     }
    public function def(){
        if(IS_AJAX){
            $uplode=M('Site');
            $data['id']=I('post.id');
            $data['mid']=session('mid');
            $as=$uplode->where($data)->find();
            $this->ajaxReturn($as);

        }
    }
    public function price(){
        if(IS_AJAX){
            $data['buy']=I('post.buy');
            $data4['price']=I('post.price');
            $data4['orderprice']=$data['buy']*$data4['price'];
            $this->ajaxReturn($data4);
        }
    }
    public function index1(){
        $order_copy=M('Order_copy');
        $mid['mid']=session('mid');
        $m=$order_copy->where($mid)->select();
        if($m){
            $data1=I('get.');
            $data3=array();
            $data4="";
            for($i=0;$i<count($data1['singlecheckbox']);$i++){
                $data=M('Goods');
                $id['id']=$data1['singlecheckbox'][$i];
                $data2=$data->where($id)->find();
                $data2['buynum']=$data1['num'.$id['id']];
                $data2['orderprice']=$data2['price']*$data2['buynum'];
                $data4+= $data2['orderprice'];
                $data3[$i]=$data2;
            }
        }else{
            $data1=I('get.');
            $data3=array();
            $data4="";
            for($i=0;$i<count($data1['singlecheckbox']);$i++){
                $bargain=M('Bargain');
                $gid['gid']=$data1['singlecheckbox'][$i];
                $g=$bargain->where($gid)->find();
                    if($g){
                        $data2=$bargain->join('yhyg_goods ON yhyg_bargain.gid=yhyg_goods.id')->where($gid)->field('yhyg_goods.id,gid,goodsname,pic,cutprice')->find();
                        $data2['buynum']=1;
                        $data2['price']=$data2['cutprice'];
                        $data2['orderprice']=$data2['cutprice'];
                    }else{
                        $data=M('Goods');
                        $id['id']=$gid['gid'];
                        $data2=$data->where($id)->find();
                        $data2['buynum']=$data1['num'.$id['id']];
                        $data2['orderprice']=$data2['price']*$data2['buynum'];
                    }
                    $data4+= $data2['orderprice'];
                    $data3[$i]=$data2;
            }
        }
       /* print_r($data3);
        die;*/
        $this->assign('data2',$data3);
        $this->assign('data3',$data4);
        $this->xs();
        $this->display('index1');
    }
    public function order1(){
        $sel5=trim(I('get.goodsname'));
        $order_goods=M('Order_goods');
        $data4['mid']=session('mid');
        $data=M('Order');
        $c=I('get.orderstatus');
        if($c){
            $this->assign('od',$c);
            $data4['orderstatus']=$c;
        }
        if($c==1){
            $this->assign('od1',"待付款");
        }
        if($c==2){
            $this->assign('od1',"待发货");
        }
        if($c==3){
            $this->assign('od1',"待收货");
        }
        if($c==4){
            $this->assign('od1',"待评价");
        }
        if($c==""){
            $this->assign('od1',"全部订单");
        }
        if($sel5){
            $data8['goodsname']=array('like',"%$sel5%");
            $goods=M('Goods');
            $selid=$goods->where($data8)->field('id')->select();
           /*print_r($selid);
            die;*/
            if($selid){
                $sw="";
                $w=array();
                foreach($selid as $k=>$v){
                    $selgid['gid']=$v['id'];
                    $seloid=$order_goods->where($selgid)->field('oid')->select();
                    if($seloid){
                        $w[$k]=$seloid;
                   }
                }
                if($w){
                    foreach($w as $a){
                        foreach($a as $v2){
                            $sw.=$v2['oid'].",";
                        }
                        $data4['yhyg_order.id']=array('in',substr($sw,0,-1));
                }
               $b=$data->where($data4)->select();
                    if(!$b){
                        $this->assign('count',0);
                        $this->assign("cxbu"," 没有查询到订单");
                        $this->display('Order/order');
                   // print_r($w);
                  // die;
               }}else{
                    $this->assign('count',0);
                    $this->assign("cxbu"," 没有查询到订单");
                    $this->display('Order/order');
                }

            }else{
                $this->assign('count',0);
                $this->assign("cxbu"," 没有查询到订单");
                $this->display('Order/order');
            }
      }
        //  die;
       // 查询满足要求的总记录数
        $count =$data->where($data4)->count();
        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $sel=$data->join('yhyg_order_status ON yhyg_order.orderstatus=yhyg_order_status.id')
            ->field('yhyg_order.id,ordersyn,yhyg_order.scid,orderstatus,orderprice,yhyg_order.addtime,
                statusname,memberopt,adminopt')->where($data4)->limit($Page->firstRow.','.$Page->listRows)->order('addtime desc')->select();

        foreach($sel as $k=>$v){
            // echo $v['id']."<br/>";
            $data2['oid']=$v['id'];
            $sel2=$order_goods->join('yhyg_goods ON yhyg_order_goods.gid=yhyg_goods.id')
                ->where($data2)->field('goodsname,oid,gid,buynum,pic,gidprice')->select();
            // print_r($sel2);
            $sel[$k]['cate']=$sel2;
        }
        $this->assign('od2',$sel5);
        $this->assign('count',$count);
        $this->assign('sele',$sel);
        $this->assign('page',$show);// 赋值分页输出*/
        $this->display('Order/order');
    }
    public function pay_(){
        if(IS_AJAX){
            $member=M('Member');
            $data['mid']=session('mid');
            /*print_r(I('post.paypwd'));
            die;*/
            $m['id']=session('mid');
            $pay=$member->where($m)->getField('paypwd');
            if(!$pay){
                $this->error('支付密码不存在，请到个人中心-安全设置中设置');
            }
            if($pay==md5(I('post.paypwd'))){
                $data['ordersyn']=I('post.ordersyn');
                $order=M('Order');
                $syn=$order->where($data)->getField('ordersyn');
                if($syn){
                    $sel=$order->where($data)->getField('orderprice');
                    $balance=$member->where($m)->getField('balance');
                    /* $this->ajaxReturn($sel);
                     die;*/
                    $t=$balance-$sel;
                    if($t>=0){
                        $member->where($m)->setField('balance',$t);
                        $account=M('Account');
                        $data1['mid']=session('mid');
                        $data1['money']=$sel;
                        $data1['addtime']=time();
                        $account->add($data1);
                        $order->where($data)->setField('orderstatus','2');
                        if(session('isnew')){
                            M('Member')->where(array('id'=>session('mid')))->save(array('isnew'=>1));
                        }
                        $this->success('支付成功');
                    }else{
                        $this->error('支付失败,余额不足,请充值');
                    }
                }else{
                     $jorder=M('Jorder');
                     $sel=$jorder->where($data)->getField('orderprice');
                     $integral=$member->where($m)->getField('integral');
                     $t=$integral-$sel;
                    if($t>=0){
                        $member->where($m)->setField('integral',$t);
                        $jorder->where($data)->setField('orderstatus','2');
                        //更新兑换记录表
                        $dataD['addtime']=time();
                        $dataD['mid']=session('mid');
                        $dataD['Jid']=M('Jshop')->where(array('needJF'=>$sel))->getField('id');
                        M('Dhlog')->add($dataD);
                        //写信
                        $dataL['addtime']=time();
                        $dataL['mid']=session('mid');
                        $gid=$jorder->where($data)->getField('gid');
                        $goodsName=M('Goods')->where(array('id'=>$gid))->getField('goodsname');
                        $dataL['content']='在积分商城中使用'.$sel.'积分兑换了'.$goodsName;
                        M('Letter')->add($dataL);
                        $this->success('支付成功');
                    }else{
                        $this->error('支付失败,积分不足');
                    }
                }
            }else{
                $this->error('支付密码错误');
            }
        }
    }
    public function del1(){
        if(IS_AJAX){
            $data['mid']=session('mid');
            $data['ordersyn']=I('post.ordersyn');
            $order=M('Order');
            $syn=$order->where($data)->getField('ordersyn');
            if($syn){
                $order_goods=M('Order_goods');
                $sel=$order->where($data)->getField('id');
                $sel2['oid']=$sel;
                $order_goods->where($sel2)->delete();
                $t=$order->where($data)->delete();
                if($t){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }else{
                $jorder=M('Jorder');
                $t=$jorder->where($data)->delete();
                if($t){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }

        }
    }
    public function shl(){
        if(IS_AJAX){
            $data['mid']=session('mid');
            $data1['id']=session('mid');
            $data['ordersyn']=I('post.ordersyn');
            $after=M('After');
            $a=$after->where($data)->field('afterstatus')->find();
           if($a['afterstatus']==1){
                    $this->success('确认收货失败,该订单中有商品申请售后,正在处理中');
                }else{
                    $order=M('Order');
                    $syn=$order->where($data)->getField('ordersyn');
               if($syn){
                   $member=M('Member');
                   $sel=$order->where($data)->getField('orderprice');
                   $mem=$member->where($data1)->field('expense,integral')->find();
                   $updata['expense']=$sel+$mem['expense'];
                   $updata['integral']=$sel+$mem['integral'];
                   $member->where($data1)->save($updata);
                   $t=$order->where($data)->setField('orderstatus','4');
               }else{
                   $jorder=M('Jorder');
                   $t=$jorder->where($data)->setField('orderstatus','4');
               }
               if($t){
                   $this->success('确认收货成功');
               }else{
                   $this->error('确认收货失败');
               }
           }
        }
    }
    public function jfdd(){
        $sel5=trim(I('get.goodsname'));
        $jorder=M('Jorder');
        $data4['mid']=session('mid');
        if($sel5){
            $data8['goodsname']=array('like',"%$sel5%");
            $goods=M('Goods');
            $selid=$goods->where($data8)->field('id')->select();
           /* print_r($selid);
             die;*/
            if($selid){
                $sw="";
                $w=array();
                foreach($selid as $k=>$v){
                    $selgid['gid']=$v['id'];
                    $seloid=$jorder->where($selgid)->field('gid')->select();
                    if($seloid){
                        $w[$k]=$seloid;
                    }
                }
                if($w){
                    foreach($w as $a){
                        foreach($a as $v2){
                            $sw.=$v2['gid'].",";
                        }
                        $data4['yhyg_jorder.gid']=array('in',substr($sw,0,-1));
                    }
                    $b=$jorder->where($data4)->select();
                    if(!$b){
                        $this->assign('count',0);
                        $this->assign("cxbu"," 没有查询到订单");
                        $this->display('Order/jfdd');
                    }
                }else{
                    $this->assign('count',0);
                    $this->assign("cxbu"," 没有查询到订单");
                    $this->display('Order/jfdd');
                }

            }else{
                $this->assign('count',0);
                $this->assign("cxbu"," 没有查询到订单");
                $this->display('Order/jfdd');
            }
        }
        // 查询满足要求的总记录数
        $count =$jorder->where($data4)->count();
        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $sel=$jorder->join('yhyg_order_status ON yhyg_jorder.orderstatus=yhyg_order_status.id')
                   ->join('yhyg_goods ON yhyg_jorder.gid=yhyg_goods.id')
            ->field('yhyg_jorder.id,ordersyn,gid,orderstatus,orderprice,yhyg_jorder.addtime,
                statusname,memberopt,adminopt,goodsname,pic')->where($data4)->limit($Page->firstRow.','.$Page->listRows)
            ->order('addtime desc')->select();
        $this->assign('count',$count);
        $this->assign('od2',$sel5);
        $this->assign('sele',$sel);
        $this->assign('page',$show);// 赋值分页输出*/
        $this->display('Order/jfdd');
    }
}
