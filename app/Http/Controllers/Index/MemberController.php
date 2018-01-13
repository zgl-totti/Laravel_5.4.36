<?php
namespace App\Http\Controllers\Index;


use App\Models\Letter;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;
use phpspider\core\requests;

class MemberController extends BaseController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $info=Member::find($mid);
        $letter=Letter::where('mid',$mid)->where('status',0)->count();
        $num1=Order::where('id',$mid)->where('orderstatus',1)->count();
        $num2=Order::where('id',$mid)->where('orderstatus',2)->count();
        $num3=Order::where('id',$mid)->where('orderstatus',3)->count();
        $num4=Order::where('id',$mid)->where('orderstatus',4)->count();
        return view('index.member.index',compact('info','letter','num1','num2','num3','num4'));
    }

    public function show(Request $request){
        $mid=$request->session()->get('mid');
        $info=Member::find($mid);
        return view('index.member.information',compact('info'));
    }

    public function changeInfo(Request $request){
        if($request->ajax()){





        }else{
            $mid=$request->session()->get('mid');
            $info=Member::find($mid);
            return view('index.member.addinfo',compact('info'));
        }
    }

    public function safety(Request $request){
        if($request->ajax()){

        }else{
            $mid=$request->session()->get('mid');
            $info=Member::find($mid);
            return view('index.member.safety',compact('info'));
        }
    }













































    public function index_(){
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        $goods=M('Goods')->order('addtime desc')->limit(0,2)->select();
        $this->assign('goods',$goods);
        //获取用户信息
        $info=M('Member')->where(array('id'=>session('mid')))->find();
//        {$info?$info['touxiang']:$info['__STATIC__/images/for.jpg']};
        $this->assign('info',$info);
        //待付款
        $order=M('Order');
        $data['mid']=session('mid');
        $data['orderstatus']=1;
        $count1=$order->where($data)->field('orderstatus')->count();
        $this->assign('count1',$count1);
        //待发货
        $data2['mid']=session('mid');
        $data2['orderstatus']=2;
        $count2=$order->where($data2)->field('orderstatus')->count();
        $this->assign('count2',$count2);
        //待收货
        $data3['mid']=session('mid');
        $data3['orderstatus']=3;
        $count3=$order->where($data3)->field('orderstatus')->count();
        $this->assign('count3',$count3);

        //待评价数量
        $where['_string']="o.id=og.oid and o.orderstatus=os.id";
        $where['o.mid']=session('mid');
        $where['o.orderstatus']=4;
        $count=M()->table('yhyg_order o,yhyg_order_goods og,yhyg_order_status os')->field('gid,buynum')->where($where)->count();
        $this->assign('count',$count);
        //获取未读消息数
        $whereL['mid']=array('in','0,'.I('session.mid'));
        $whereL['status']=0;
        $noSee=M('Letter')->where($whereL)->count();
        $this->assign('noSee',$noSee);
        $this->display();
    }

}
