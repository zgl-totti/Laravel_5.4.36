<?php
namespace App\Http\Controllers\Index;


use App\Models\Account;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;

class MoneyController extends BaseController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $info=Member::find($mid);
        $income=Account::where('mid',$mid)->whereIn('action',[2,3])->sum('money');
        $list_disburse=Order::where('mid',$mid)
            ->where('orderstatus','>',2)
            ->with(['getOrderGoods'=>function($query){
                $query->join('goods','goods.id','=','order_goods.gid');
            }])->limit(5)
            ->orderBy('id','desc')
            ->get();
        $list_income=Account::where('mid',$mid)
            ->whereIn('action',[2,3])
            ->orderBy('id','desc')
            ->limit(5)
            ->get();
        return view('index.money.bill',compact('info','income','list_disburse','list_income'));
    }

    //充值
    public function recharge(Request $request){
        if($request->ajax()){
            $ub=intval($request->input('Ub'));
            $paypwd=md5(trim($request->input('paypwd')));





        }else {
            $mid = $request->session()->get('mid');
            $info = Member::find($mid);
            return view('index.money.recharge', compact('info'));
        }
    }

    //支出
    public function disburse(Request $request,$time){
        $mid = $request->session()->get('mid');
        $info = Member::find($mid);
        $time=intval($time);
        if ($time==1){
            $day=strtotime(date('Y-m-d',time()));
            $where['addtime']=['>',$day];
        }elseif ($time==2){
            $day=time()-7*24*60*60;
            $where['addtime']=['>',$day];
        }elseif ($time==3){
            $day=time()-30*7*24*60*60;
            $where['addtime']=['>',$day];
        }elseif ($time==4){
            $day=time()-90*7*24*60*60;
            $where['addtime']=['>',$day];
        }else{
            $where='';
        }
        $list=Order::where('mid',$mid)
            ->where('orderstatus','>',2)
            ->where(function ($query) use ($time,$where){
                $time && $query->where($where);
            })
            ->with(['getOrderGoods'=>function($query){
                $query->join('goods','goods.id','=','order_goods.gid');
            }])->paginate(10);
        return view('index.money.disburse',compact('info','time','list'));
    }

    //收入
    public function income(Request $request,$time){
        $mid = $request->session()->get('mid');
        $info = Member::find($mid);
        $time=intval($time);
        if ($time==1){
            $day=strtotime(date('Y-m-d',time()));
            $where['addtime']=['>',$day];
        }elseif ($time==2){
            $day=time()-7*24*60*60;
            $where['addtime']=['>',$day];
        }elseif ($time==3){
            $day=time()-30*7*24*60*60;
            $where['addtime']=['>',$day];
        }elseif ($time==4){
            $day=time()-90*7*24*60*60;
            $where['addtime']=['>',$day];
        }else{
            $where='';
        }
        $list=Account::where('mid',$mid)
            ->whereIn('action',[2,3])
            ->where(function ($query) use ($time,$where){
                $time && $query->where($where);
            })
            ->paginate(10);
        return view('index.money.income',compact('info','list','time'));
    }






























    public function bill_(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //查询该用户的订单ID
        $id=M('Order')->where(array('mid'=>session('mid')))->order('addtime desc')->select();
        $idStr='';
        foreach($id as $v){
            $idStr.=$v['id'].',';
        }
        $idStr=substr($idStr,0,-1);
        //获取商品列表
        if($idStr) {
            $where['oid'] = array('in', $idStr);
            $gList = M('Order_goods')->where($where)->limit(0, 6)->select();
            $goodsList = array();
            foreach ($gList as $k => $v1) {
                $goodsInfo = M('Goods')->where(array('id' => $v1['gid']))->find();
                //获取时间
                $info = M('Order')->where(array('id' => $v1['oid']))->find();
                $goodsInfo['Otime'] = $info['addtime'];
                $goodsList[$k] = $goodsInfo;
            }
        }else{
            $goodsList='';
        }
        //获取用户充值记录
        $cList=M('Account')->where(array('mid'=>session('mid'),'action'=>array('in','2,3')))->limit(0,6)->order('addtime desc')->select();
        //获取用户充值金额
        $cMoney=M('Account')->where(array('mid'=>session('mid'),'action'=>array('in','2,3')))->Sum('money');
        //查询用户消费金额
        $expense=M('Member')->field('expense')->where(array('id'=>session('mid')))->find();
        //查询用户余额
        $balance=M('Member')->field('balance')->where(array('id'=>session('mid')))->find();
        $this->assign('goodsList',$goodsList);
        $this->assign('cList',$cList);
        $this->assign('expense',$expense['expense']);
        $this->assign('balance',$balance['balance']);
        $this->assign('cMoney',$cMoney);
        $this->assign('empty',"<h1>你还没有任何消费记录！赶紧去购物吧！</h1>");
        $this->assign('empty1',"<h1>你还没有任何充值记录！赶紧去充值吧！</h1>");
        $this->display();
    }
    public function billList_(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //查询该用户的订单ID
        switch(I('get.where')){
            case 1:
                $where1['addtime']=array('between',array(strtotime('today'),strtotime('today')+86400));
                break;
            case 2:
                $where1['addtime']=array('between',array(strtotime('-1 week',strtotime('today')),time()));
                break;
            case 3:
                $where1['addtime']=array('between',array(strtotime('-1 month',strtotime('today')),time()));
                break;
            case 4:
                $where1['addtime']=array('between',array(strtotime('-3 months',strtotime('today')),time()));
                break;
            default :
                $w='';
        }
        $where1['mid']=session('mid');
        $id=M('Order')->where($where1)->order('addtime desc')->select();
        if($id) {
            $idStr = '';
            foreach ($id as $v) {
                $idStr .= $v['id'] . ',';
            }
            $idStr = substr($idStr, 0, -1);
            //获取商品列表
            $where['oid'] = array('in', $idStr);
            $count = M('Order_goods')->where($where)->count();
            //分页
            $page = new Page($count, 6);
            $show = $page->show();
            $gList = M('Order_goods')->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
            $goodsList = array();
            foreach ($gList as $k => $v1) {
                $goodsInfo = M('Goods')->where(array('id' => $v1['gid']))->find();
                //获取时间
                $info = M('Order')->where(array('id' => $v1['oid']))->find();
                $goodsInfo['Otime'] = $info['addtime'];
                $goodsList[$k] = $goodsInfo;
            }
            $this->assign('goodsList', $goodsList);
            $this->assign('page', $show);
        }else{
            $this->assign('goodsList',false);
        }
            $this->assign('empty', "<h1>没有找到相关信息！</h1>");
            $this->display();

    }
    public function recharge_(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $member=M('Member');
        $this->assign('cartnum',$nums);
        if(IS_POST){
            $where['paypwd']=md5(I('post.paypwd'));
            $where['id']=session('mid');
            $where['username']=I('post.username');
//            print_r($where);
            if($member->where($where)->find()){
                //更新用户余额
                $status=$member->where($where)->setInc('balance',I('post.Ub'));
                if($status){
                    //更新账单表
                    $data['money']=I('post.Ub');
                    $data['action']=2;
                    $data['addtime']=time();
                    $data['mid']=session('mid');
                    M('Account')->add($data);
                    //写信
                    $dataL['addtime']=time();
                    $dataL['mid']=session('mid');
                    $dataL['title']='充值U币';
                    $dataL['content']='充值'.I('post.Ub').'U币';
                    M('letter')->add($dataL);
                    $this->success('充值成功');
                }else{
                    $this->error('充值失败');
                }
            }else{
                $this->error('支付密码错误！');
            }

        }else {
            $this->display();
        }
    }
    public function cList_(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        switch(I('get.where')){
            case 1:
                $where1['addtime']=array('between',array(strtotime('today'),strtotime('today')+86400));
                break;
            case 2:
                $where1['addtime']=array('between',array(strtotime('-1 week',strtotime('today')),time()));
                break;
            case 3:
                $where1['addtime']=array('between',array(strtotime('-1 month',strtotime('today')),time()));
                break;
            case 4:
                $where1['addtime']=array('between',array(strtotime('-3 months',strtotime('today')),time()));
                break;
            default :
                $w='';
        }
        $where1['mid']=session('mid');
        $where1['action']=array('in','2,3');
        $count=M('Account')->where($where1)->count();
        //分页
        $page = new Page($count,8);
        $show = $page->show();
        $cList = M('Account')->where($where1)->limit($page->firstRow . ',' . $page->listRows)->order('addtime desc')->select();
        $this->assign('cList',$cList);
        $this->assign('page', $show);
        $this->assign('empty', "<h1>没有找到相关信息！</h1>");
        $this->display();
    }
}