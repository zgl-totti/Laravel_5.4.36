<?php
namespace App\Http\Controllers\Index;

use App\Models\Bargain;
use App\Models\Goods;
use App\Models\Integral;
use App\Models\Jorder;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

    public function order(Request $request){
        $goodsname=trim($request->input('goodsname'));
        $mid=$request->session()->get('mid');
        $status=$request->input('orderstatus');
        if(! empty($status)){
            $where['status']=$status;
        }
        if($status==1){
            $od1='待付款';
        }elseif ($status==2){
            $od1='待发货';
        }elseif ($status==3){
            $od1='待收货';
        }elseif ($status==4){
            $od1='待评价';
        }else{
            $od1='全部订单';
        }
        $where['mid']=$mid;
        if($goodsname){
            $goods=Goods::where('goodsname','like',$goodsname.'%')->get();
            foreach ($goods as $k=>$v){
                $condition['gid']=$v['id'];
                $oid[]=OrderGoods::where($condition)->get(['oid']);
            }
        }else{
            $oid=[];
        }
        $list=Order::with('getOrderGoods')
            ->with('getStatus')
            ->where($where)
            ->where(function($query) use($goodsname,$oid){
                $goodsname && $query->whereIn('id',$oid);
            })->orderBy('addtime desc')->paginate(10);
        return view('index.order.order',['list'=>$list,'od1'=>$od1]);
    }

    public function del(Request $request){
        if($request->ajax()){
            $mid=$request->session()->get('mid');
            $ordersyn=$request->input('ordersyn');
            $where['mid']=$mid;
            $where['ordersyn']=$ordersyn;
            $info=Order::where($where)->first();
            if (empty($info)){
                $row=Jorder::where($where)->delete();
                if($row){
                    return response(['code'=>1,'info'=>'删除成功！']);
                }else{
                    return response(['code'=>5,'info'=>'删除失败！']);
                }
            }else{
                $condition['oid']=$info['id'];
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
    public function pay(){
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
