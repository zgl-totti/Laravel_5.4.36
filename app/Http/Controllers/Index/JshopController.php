<?php
namespace App\Http\Controllers\Index;


class JshopController extends BaseController {
    public function index_(){
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        $Jshop=M('Jshop');
        //获取置顶礼品
        $where['zd']=1;
        $listZd=$Jshop->where($where)->limit(0,4)->select();
        //获取商品信息
        foreach($listZd as $k=>$v){
            if($v['status']==1){
                $listZd[$k]['ginfo']=M('Goods')->where(array('id'=>$v['gid']))->find();
            }
        }
        $this->assign('listZd',$listZd);
        //获取虚拟礼品
        $where1['status']=0;
        $count1 = $Jshop->where($where1)->count(); //计算记录数
        $limitRows = 8; // 设置每页记录数
        $p1 = new \Org\Yh\AjaxPage($count1, $limitRows,"search1"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p1->firstRow . "," . $p1->listRows;
        $data1 = $Jshop->where($where1)->limit($limit_value)->select(); // 查询数据
        $page1 = $p1->show(); // 产生分页信息，AJAX的连接在此处生成
        //获取商品信息
        foreach($data1 as $k=>$v){
            if($v['status']==1){
                $data1[$k]['ginfo']=M('Goods')->where(array('id'=>$v['gid']))->find();
            }
        }
        $this->assign('list1',$data1);
        $this->assign('page1',$page1);
        //获取实物礼品
        $where2['status']=1;
        $count2 = $Jshop->where($where2)->count(); //计算记录数
        $limitRows = 8; // 设置每页记录数
        $p2 = new \Org\Yh\AjaxPage($count2, $limitRows,"search2"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p2->firstRow . "," . $p2->listRows;
        $data2 = $Jshop->where($where2)->limit($limit_value)->select(); // 查询数据
        $page2 = $p2->show(); // 产生分页信息，AJAX的连接在此处生成
        //获取商品信息
        foreach($data2 as $k=>$v){
            if($v['status']==1){
                $data2[$k]['ginfo']=M('Goods')->where(array('id'=>$v['gid']))->find();
            }
        }
        $this->assign('list2',$data2);
        $this->assign('page2',$page2);
        //获取我能兑换
        //查询用户积分
        $jf=M('member')->where(array('id'=>session('mid')))->getField('integral');
        $where3['needJF']=array('lt',$jf);
        $count3 = $Jshop->where($where3)->count(); //计算记录数
        $limitRows = 8; // 设置每页记录数
        $p3 = new \Org\Yh\AjaxPage($count3, $limitRows,"search3"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p3->firstRow . "," . $p3->listRows;
        $data3 = $Jshop->where($where3)->limit($limit_value)->select(); // 查询数据
        $page3 = $p3->show(); // 产生分页信息，AJAX的连接在此处生成
        //获取商品信息
        foreach($data3 as $k=>$v){
            if($v['status']==1){
                $data3[$k]['ginfo']=M('Goods')->where(array('id'=>$v['gid']))->find();
            }
        }
        $this->assign('list3',$data3);
        $this->assign('page3',$page3);
        //获取全部礼品
        $count4 = $Jshop->count(); //计算记录数
        $limitRows = 8; // 设置每页记录数
        $p4 = new \Org\Yh\AjaxPage($count4, $limitRows,"search4"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p4->firstRow . "," . $p4->listRows;
        $data4 = $Jshop->limit($limit_value)->select(); // 查询数据
        $page4 = $p4->show(); // 产生分页信息，AJAX的连接在此处生成
        //获取商品信息
        foreach($data4 as $k=>$v){
            if($v['status']==1){
                $data4[$k]['ginfo']=M('Goods')->where(array('id'=>$v['gid']))->find();
            }
        }
        $this->assign('list4',$data4);
        $this->assign('page4',$page4);
        //获取奖项信息
        $jinfo=M('Cj')->limit(0,11)->select();
        $this->assign('jinfo',$jinfo);
        //获取抽奖记录
        $log=M('Cjlog')->order('addtime desc')->limit(0,6)->select();
        foreach($log as $k=>$vlog){
            $loginfo=M('Member')->where(array('id'=>$vlog['mid']))->find();
            $loginfo['username']=mb_substr($loginfo['username'],0,2,'utf-8').'***'.mb_substr($loginfo['username'],-2,2,'utf-8');
            $log[$k]['minfo']=$loginfo;
        }
        $this->assign('log',$log);
        //获取用户兑换记录
        if(session('mid')){
            $count5=M('Dhlog')->where(array('mid'=>session('mid')))->count();
            $limitRows=5;
            $p5 = new \Org\Yh\AjaxPage($count5, $limitRows,"search5"); //第三个参数是你需要调用换页的ajax函数名
            $limit_value = $p5->firstRow . "," . $p5->listRows;
            $page5=$p5->show();
            $dhls=M('Dhlog')->where(array('mid'=>session('mid')))->order('addtime desc')->limit($limit_value)->select();
            foreach($dhls as $k=>$v){
                $info=M('Jshop')->where(array('id'=>$v['jid']))->find();
                $dhls[$k]['jinfo']=$info;
                if($info['status']==1){
                    //查询商品信息
                    $dhls[$k]['ginfo']=M('Goods')->where(array('id'=>$info['gid']))->find();
                }
            }
            $this->assign('dhls',$dhls);
            $this->assign('page5',$page5);
            $this->assign('emptyls','<div style="width: 100%;height: 50px;padding: 10px;"><h1>亲，你还没有任何兑换记录！</h1></div>');
            //查询用户抽奖记录
            $count6=M('Cjlog')->where(array('mid'=>session('mid')))->count();
            $limitRows=5;
            $p6 = new \Org\Yh\AjaxPage($count6, $limitRows,"search6"); //第三个参数是你需要调用换页的ajax函数名
            $limit_value = $p6->firstRow . "," . $p6->listRows;
            $page6=$p6->show();
            $cjls=M('Cjlog')->where(array('mid'=>session('mid')))->order('addtime desc')->limit($limit_value)->select();
            $this->assign('cjls',$cjls);
            $this->assign('page6',$page6);
            $this->assign('emptylc','<div style="width: 100%;height: 50px;padding: 10px;"><h1>亲，你还没有任何抽奖记录！</h1></div>');

        }
        if(IS_AJAX){
            switch (I('get.i')){
                case '1':
                    $this->display('result1');
                break;
                case '2':
                    $this->display('result2');
                    break;
                case '3':
                    $this->display('result3');
                    break;
                case '4':
                    $this->display('result4');
                    break;
                case '5':
                    $this->display('result5');
                    break;
                case '6':
                    $this->display('result6');
                    break;
            }
        }else{
            //获取用户积分
            $wdjf=M('Member')->where(array('id'=>session('mid')))->getField('integral');
            $this->assign('wdjf',$wdjf);
            $this->assign('empty','<div style="width: 100%;height: 50px;padding: 10px;"><h1>很抱歉，没有找到相关内容</h1></div>');
            $this->display();
        }
    }
    public function buy_(){
        //更新用户表
        $jf=mb_substr(I('post.jf'),0,-2,'utf-8');
        $where['id']=session('mid');
        //判断用户积分是否能够兑换
        $info=M('Member')->where($where)->getField('integral');
        if($info>$jf) {
            $UB = I('post.UB');
            $member = M('Member');
            $member->startTrans();
            $status1 = $member->where($where)->setDec('integral', $jf);
            $status2 = $member->where($where)->setInc('balance', $UB);
            if ($status1 && $status2) {
                $member->commit();
                //更新account表
                $data['action']=3;
                $data['money']=$UB;
                $data['addtime']=time();
                $data['mid']=session('mid');
                M('Account')->add($data);
                //更新兑换记录表
                $dataD['addtime']=time();
                $dataD['mid']=session('mid');
                $dataD['Jid']=M('Jshop')->where(array('needJF'=>$jf))->getField('id');
                M('Dhlog')->add($dataD);
                //写信
                $dataL['addtime']=time();
                $dataL['mid']=session('mid');
                $dataL['content']='在积分商城中使用'.$jf.'积分兑换了'.$UB.'U币';
                M('Letter')->add($dataL);
                $this->success('恭喜你，兑换成功！');
            }else{
                $member->rollback();
                $this->error('服务器繁忙，请稍后再试！');
            }
        }else{
            $this->error('积分不足！赶紧去赚积分吧！');
        }
    }
    public function cj_(){
        //判断用户的积分是否够抽奖
        $jf=M('Member')->where(array('id'=>session('mid')))->getField('integral');
        if($jf<50){
            $this->error('积分不足');
        }else{
        //prize表示奖项内容，v表示中奖几率(若数组中七个奖项的v的总和为100，如果v的值为1，则代表中奖几率为1%，依此类推)
        $prize_arr = array(
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
        );
        $arr=array();
        foreach ($prize_arr as $k=>$v) {
            $arr[$v['id']] = $v['v'];

        }

        $prize_id = $this->getRand($arr); //根据概率获取奖项id
        foreach($prize_arr as $k=>$v){ //获取前端奖项位置
            if($v['id'] == $prize_id){
                $prize_site = $k;
                break;
            }
        }
        $res = $prize_arr[$prize_id - 1]; //中奖项

        $data['prize_name'] = $res['prize'];
        $data['prize_site'] = $prize_site;//前端奖项从-1开始
        $data['prize_id'] = $prize_id;
        //更新用户信息
        //查询奖项信息
        $info=M('Cj')->where(array('id'=>$prize_id))->find();
            $member=M('Member');
            $member->startTrans();
        if($info['lx']==1){
            $data['prize']=$info['num'].'积分';
            $dataL['content']='在积分抽奖活动抽中了'.$info['prize'].'获得'.$info['num'].'积分';
            $status1=$member->where(array('id'=>session('mid')))->setInc('integral',$info['num']);
        }elseif($info['lx']==2){
            $data['prize']=$info['num'].'U币';
            $dataL['content']='在积分抽奖活动抽中了'.$info['prize'].'获得'.$info['num'].'U币';
            $status1=$member->where(array('id'=>session('mid')))->setInc('balance',$info['num']);
        }
            //更新抽奖记录表
            $data['addtime']=time();
            $data['mid']=session('mid');
            M('Cjlog')->add($data);
            $status2=$member->where(array('id'=>session('mid')))->setDec('integral',50);
            if($status1&&$status2){
                //写信
                $dataL['addtime']=time();
                $dataL['mid']=session('mid');
                $dataL['title']='积分抽奖';
                M('Letter')->add($dataL);
                $member->commit();
                $this->success($data);
            }else{
                $member->rollback();
                $this->error('服务器繁忙！请稍后再试！');
            }

        }
    }
    public function getRand_($proArr) {
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
    public function refreshLog_(){
        $log=M('Cjlog')->order('addtime desc')->limit(0,6)->select();
        foreach($log as $k=>$vlog){
            $loginfo=M('Member')->where(array('id'=>$vlog['mid']))->find();
            $loginfo['username']=mb_substr($loginfo['username'],0,2,'utf-8').'***'.mb_substr($loginfo['username'],-2,2,'utf-8');
            $log[$k]['minfo']=$loginfo;
        }
        $this->assign('log',$log);
        $this->display('refresh');
    }
}