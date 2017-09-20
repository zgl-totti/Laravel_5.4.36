<?php
namespace App\Http\Controllers\Admin;

use App\After;
use App\Goods;
use App\Order;
use App\OrderIntegral;
use App\OrderSite;
use Illuminate\Http\Request;

class OrderController extends BaseController{
    public function index(Request $request,$orderstatus){
        $username=trim($request->get('username'));
        $ordersyn=trim($request->get('ordersyn'));
        $phone=trim($request->get('phone'));
        if($username || $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        }else{
            $arr='';
        }
        $list=Order::with('getStatus')->with('getSite')
            ->with(['getOrderGoods'=>function($query){
                $query->join('goods as g','g.id','=','order_goods.gid');
            }])
            ->where(function($query) use($ordersyn,$orderstatus,$arr){
                $ordersyn && $query->where('ordersyn','like',$ordersyn.'%');
                $orderstatus && $query->where('orderstatus',$orderstatus);
                $arr && $query->whereIn('scid',$arr);
            })->paginate(10);

        /*$list=Order::with('getStatus')->with('getSite')->with('getOrderGoods')
            ->where(function($query) use($ordersyn,$orderstatus,$arr){
                $ordersyn && $query->where('ordersyn','like',$ordersyn.'%');
                $orderstatus && $query->where('orderstatus',$orderstatus);
                $arr && $query->whereIn('scid',$arr);
            })->paginate(10);
        foreach($list as $k=>$v){
            foreach($v['getOrderGoods'] as $k1=>$v1){
                $list[$k]['getOrderGoods'][$k1]['goods']=Goods::where('id',$v1['gid'])->first(['goodsname']);
            }
        }*/

        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('order.index',[
            'list'=>$list,'firstRow'=>$firstRow,
            'username'=>$username,'phone'=>$phone,
            'ordersyn'=>$ordersyn,'orderstatus'=>$orderstatus
        ]);
    }

    //积分订单
    public function integral(Request $request){
        $username=trim($request->get('username'));
        $ordersyn=trim($request->get('ordersyn'));
        $phone=trim($request->get('phone'));
        if($username || $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        }else{
            $arr='';
        }
        $list=OrderIntegral::with('getGoods')->with('getSite')->with('getStatus')
            ->where(function($query) use($ordersyn,$arr){
                $ordersyn && $query->where('ordersyn','like',$ordersyn.'%');
                $arr && $query->whereIn('scid',$arr);
            })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('order.integral',['list'=>$list,'username'=>$username,'phone'=>$phone,'ordersyn'=>$ordersyn,'firstRow'=>$firstRow]);
    }

    //售后管理
    public function aftermarket(Request $request){
        $username=trim($request->get('username'));
        $aftersyn=trim($request->get('aftersyn'));
        $phone=trim($request->get('phone'));
        if($username || $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        }else{
            $arr='';
        }
        $list=After::with('getGoods')->with('getSite')
            ->with('getAfterStatus')->with('getPic')
            ->with(['getOrder'=>function($query){
                $query->join('order_status as os','order.orderstatus','=','os.id');
            }])
            ->where(function($query) use($aftersyn,$arr){
                $aftersyn && $query->where('aftersyn','like',$aftersyn.'%');
                $arr && $query->whereIn('scid',$arr);
            })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('order.aftermarket',['list'=>$list,'username'=>$username,'phone'=>$phone,'aftersyn'=>$aftersyn,'firstRow'=>$firstRow]);
    }

    //发货
    public function shipments(Request $request){
        if($request->ajax()){
            $status=$request->get('status');
            if($status==1){
                $oid=$request->get('oid');
                $info=Order::find($oid);
                $info->orderstatus=3;
                $row=$info->save();
            }elseif($status==2){
                $arr=$request->get('oid');
                if(empty($arr)){
                    return response(['code'=>5,'info'=>'发货订单不能为空']);
                }else {
                    $data['orderstatus']=3;
                    $row=Order::whereIn('id',$arr)->update($data);
                }
            }elseif($status==3){
                $oid=$request->get('oid');
                $info=OrderIntegral::find($oid);
                $info->orderstatus=3;
                $row=$info->save();
            }
            if($row){
                return response(['code'=>1,'info'=>'发货成功']);
            }else{
                return response(['code'=>2,'info'=>'发货失败']);
            }
        }
    }

    //是否同意退货
    public function agree(Request $request){
        if($request->ajax()){
            $status=$request->get('status');
            $id=intval($request->get('id'));
            $info=After::find($id);
            if($status==1){
                $info->afterstatus=2;
            }elseif($status==2){
                $info->afterstatus=3;
            }
            if($info->save()){
                return response(['code'=>1,'info'=>'操作成功']);
            }else{
                return response(['code'=>2,'info'=>'操作失败']);
            }
        }
    }








    public function out(){
        vendor('PHPExcel.PHPExcel');
        $objPHPExcel=new \PHPExcel();
        $objSheet=$objPHPExcel->getActiveSheet();
       /* $objSheet()->getStyle('A1:D4')
            ->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);*/
        if(!file_exists("./File")){
            mkdir("./File");
        }
        $filename='./File/'.date("Y-m-d-H-i-s").".xlsx";
        $data=M('Order');
        $sel=$data->field('id,ordersyn,orderprice')->select();
        foreach($sel as $k=>$v){
            // echo $v['id']."<br/>";
            $data1=M('Order_goods');
            $data2['oid']=$v['id'];
            $sel2=$data1->join('yhyg_goods ON yhyg_order_goods.gid=yhyg_goods.id')
                ->where($data2)->field('goodsname,buynum,gidprice')->select();
            // print_r($sel2);
            $sel[$k]['cate']=$sel2;
        }
        $objSheet->setCellValue("A1","订单号")->setCellValue("B1","总价")
            ->setCellValue("C1","商品名")
            ->setCellValue("D1","商品单价")
            ->setCellValue("E1","购买数量");
        $objSheet->getColumnDimension("A")->setWidth(20);
        $objSheet->getColumnDimension("C")->setWidth(100);
        $i=2;
        foreach($sel as $v){
            $objSheet->setCellValue("A".$i,$v['ordersyn']." ")->setCellValue("B".$i,$v['orderprice']);
            foreach($v['cate'] as $v2){
                $objSheet->setCellValue("C".$i,$v2['goodsname'])->setCellValue("D".$i,$v2['gidprice'])
                    ->setCellValue("E".$i,$v2['buynum']);
                $i++;
            }
        }
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
       /* $objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        $objWriter->save($filename);*/
     /*   if(file_exists($filename)){
            $this->success('订单导出成功');
        }else{
            $this->error('订单导出失败');
        }*/
    }
}