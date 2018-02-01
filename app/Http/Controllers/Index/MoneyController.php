<?php
namespace App\Http\Controllers\Index;


use App\Models\Account;
use App\Models\Letter;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $ub=$request->input('Ub');
            if(!is_numeric($ub) || $ub<=0){
                $res['status']=5;
                $res['info']='充值金额有误！';
                return response()->json($res);
            }
            $paypwd=md5(trim($request->input('paypwd')));
            $mid=$request->session()->get('mid');
            $info=Member::where('id',$mid)->where('paypwd',$paypwd)->first();
            if(empty($info)){
                $res['status']=5;
                $res['info']='支付密码错误！';
                return response()->json($res);
            }
            $transaction=DB::beginTransaction();
            try{
                $row1=Member::where('id',$mid)->increment('balance',$ub);
                $account= new Account();
                $account->money=$ub;
                $account->action=2;
                $account->addtime=time();
                $account->mid=$mid;
                $row2=$account->save();
                $letter= new Letter();
                $letter->addtime=time();
                $letter->mid=$mid;
                $letter->title='充值U币';
                $letter->content='充值'.$ub.'U币';
                $row3=$letter->save();
                if(empty($row1) || empty($row2) || empty($row3)){
                    throw new QueryException('充值失败！');
                }
                $transaction->commit();
                $res['status']=1;
                $res['info']='充值成功！';
                return response()->json($res);
            }catch (QueryException $e){
                $transaction->rollBack();
                $res['status']=5;
                $res['info']=$e->getMessage();
                return response()->json($res);
            }
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
}