<?php
namespace App\Http\Controllers\Index;


use App\Models\Account;
use App\Models\Dhlog;
use App\Models\Draw;
use App\Models\DrawLog;
use App\Models\Jshop;
use App\Models\Letter;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class JshopController extends BaseController {
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $list_zd=Jshop::with('getGoods')->where('zd',1)->limit(4)->get();
        $list_xn=Jshop::with('getGoods')->where('status',0)->paginate(8);
        $list_sw=Jshop::with('getGoods')->where('status',1)->paginate(8);
        $info=Member::find($mid);
        $list_integral=Jshop::with('getGoods')->where('needJF','lt',intval($info['jf']))->paginate(8);
        $list_all=Jshop::with('getGoods')->paginate(8);
        //获取奖项信息
        $jinfo=Draw::limit(11)->get();
        //获取抽奖记录
        $log=DrawLog::with('getMember')->orderBy('addtime desc')->limit(6)->get();
        foreach($log as $k=>$v){
            $log[$k]['username']=mb_substr($v['username'],0,2,'utf-8').'***'.mb_substr($v['username'],-2,2,'utf-8');
        }
        //获取用户兑换记录
        if(!empty($mid)){
            $dhls=Dhlog::with(['getJshop'=>function($query){
                $query->join('goods as g','g.id','=','jshop.gid');
                }])->where('mid',$mid)
                ->orderBy('addtime desc')
                ->paginate(5);
            //查询用户抽奖记录
            $cjls=DrawLog::where('mid',$mid)->orderBy('addtime desc')->paginate(5);
        }else{
            $dhls=[];
            $cjls=[];
        }
        //获取用户积分
        $wdjf=Member::where('id',$mid)->first(['integral']);
        return view('index.jshop.index',[
           'list_zd'=>$list_zd,'list_xn'=>$list_xn,
           'list_sw'=>$list_sw,'list_integral'=>$list_integral,
           'list_all'=>$list_all,'jinfo'=>$jinfo,
           'log'=>$log,'dhls'=>$dhls,
           'cjls'=>$cjls,'info'=>$info
        ]);
    }

    public function buy(Request $request){
        if($request->ajax()){
            $jf_=$request->input('jf');
            $ub=$request->input('UB');
            $jf=mb_substr($jf_,0,-2,'utf-8');
            $mid=$request->session()->get('mid');
            $where['mid']=$mid;
            $info=Member::where($where)->first();
            if(intval($info['intrgral'])>intval($jf)){
                $transaciton=DB::beginTransaction();
                try{
                    $row1=Member::where($where)->decrement('integral',$jf);
                    $row2=Member::where($where)->increment('integral',$ub);
                    $account=new Account();
                    $account->action=3;
                    $account->money=$ub;
                    $account->mid=$mid;
                    $account->addtime=time();
                    $row3=$account->save();
                    $jid=Jshop::where('needJF',$jf)->first();
                    $dhlog= new Dhlog();
                    $dhlog->mid=$mid;
                    $dhlog->addtime=time();
                    $dhlog->Jid=$jid['id'];
                    $row4=$dhlog->save();
                    $letter= new Letter();
                    $letter->addtime=time();
                    $letter->mid=$mid;
                    $letter->content='在积分商城中使用'.$jf.'积分兑换了'.$ub.'U币';
                    $row5=$letter->save();
                    if(empty($row1) || empty($row2) || empty($row3) || empty($row4) || empty($row5)){
                        throw new Exception('更新失败！');
                    }
                    $transaciton->commit();
                    return response(['code'=>1,'info'=>'恭喜你，兑换成功！']);
                }catch (Exception $e){
                    $transaciton->rollBack();
                    return response(['code'=>1,'info'=>$e->getMessage()]);
                }
            }else{
                return response(['code'=>5,'info'=>'积分不足！赶紧去赚积分吧！']);
            }
        }
    }

    public function cj(Request $request){
        if($request->ajax()) {
            $mid = $request->session()->get('mid');
            $info = Member::where('mid',$mid)->first();
            if(intval($info['jf'])<50){
                return response(['code'=>5,'info'=>'积分不足！']);
            }
            $prize_arr = [
                '0' => array('id' => 1, 'prize' => '一等奖', 'v' => 1),
                '1' => array('id' => 2, 'prize' => '二等奖', 'v' => 2),
                '2' => array('id' => 3, 'prize' => '三等奖', 'v' => 4),
                '3' => array('id' => 4, 'prize' => '四等奖', 'v' => 6),
                '4' => array('id' => 5, 'prize' => '五等奖', 'v' => 7),
                '5' => array('id' => 6, 'prize' => '六等奖', 'v' => 8),
                '6' => array('id' => 7, 'prize' => '七等奖', 'v' => 9),
                '7' => array('id' => 8, 'prize' => '八等奖', 'v' => 10),
                '8' => array('id' => 9, 'prize' => '九等奖', 'v' => 11),
                '9' => array('id' => 10, 'prize' => '十等奖', 'v' => 12),
                '10' => array('id' => 11, 'prize' => '十一等奖', 'v' => 13),
                '11' => array('id' => 12, 'prize' => '谢谢参与', 'v' => 14),
            ];
            $arr=[];
            foreach ($prize_arr as $k=>$v) {
                $arr[$v['id']] = $v['v'];
            }
            $prize_id = $this->getRand($arr);   //根据概率获取奖项id
            foreach($prize_arr as $k=>$v){      //获取前端奖项位置
                if($v['id'] == $prize_id){
                    $prize_site = $k;
                    break;
                }
            }
            $res = $prize_arr[$prize_id - 1];   //中奖项
            $data['prize_name'] = $res['prize'];
            $data['prize_site'] = $prize_site;  //前端奖项从-1开始
            $data['prize_id'] = $prize_id;
            //更新用户信息,查询奖项信息
            $info=Draw::where('id',$prize_id)->first();
            $transaction=DB::beginTransaction();
            try {
                if ($info['lx'] == 1) {
                    $data['prize'] = $info['num'] . '积分';
                    $dataL['content'] = '在积分抽奖活动抽中了' . $info['prize'] . '获得' . $info['num'] . '积分';
                    $row1 = Member::where('id', $mid)->increment('integral', intval($info['num']));
                } elseif ($info['lx'] == 2) {
                    $data['prize'] = $info['num'] . 'U币';
                    $dataL['content'] = '在积分抽奖活动抽中了' . $info['prize'] . '获得' . $info['num'] . 'U币';
                    $row1 = Member::where('id', $mid)->increment('balance', intval($info['num']));
                }
                //更新抽奖记录表
                $cjlog = new DrawLog();
                $cjlog->price = $data['prize'];
                $cjlog->mid = $mid;
                $cjlog->addtime = time();
                $cjlog->save();
                $row2 = Member::where('id', $mid)->increment('integral', 50);
                $letter = new Letter();
                $letter->mid = $mid;
                $letter->addtime = time();
                $letter->title = '积分抽奖';
                $row3 = $letter->save();
                if(empty($row1) || empty($row2) || empty($row3)){
                    throw new Exception('错误');
                }
                $transaction->commit();
                return response(['code'=>1,'info'=>$data]);
            }catch (Exception $e){
                $transaction->rollBack();
                return response(['code'=>5,'info'=>'服务器繁忙！请稍后再试！']);
            }
        }
    }

    public function getRand($proArr) {
        $data = '';
        $proSum = array_sum($proArr); //概率数组的总概率精度
        foreach ($proArr as $k => $v) { //概率数组循环
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $v) {
                $data = $k;
                break;
            } else {
                $proSum -= $v;
            }
        }
        unset($proArr);
        return $data;
    }

    public function refreshLog(){
        $list=DrawLog::orderBy('addtime desc')->limit(6)->offset(0)->get();
        foreach ($list as $k=>$v){
            $info=Member::where('id',$v['mid'])->first();
            $info['username']=mb_substr($info['username'],0,2,'utf-8').'***'.mb_substr($info['username'],-2,2,'utf-8');
            $list[$k]['minfo']=$info;
        }
        return view('index.jshop.refresh',['list'=>$list]);
    }
}