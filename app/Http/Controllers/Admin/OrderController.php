<?php
namespace App\Http\Controllers\Admin;

use App\Models\After;
use App\Models\Order;
use App\Models\OrderIntegral;
use App\Models\OrderSite;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends BaseController
{
    public function index(Request $request, $orderstatus)
    {
        $username = $request->get('username');
        $ordersyn = $request->get('ordersyn');
        $phone = $request->get('phone');
        if ($username && $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
        } elseif ($username && !$phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->select('id')->get()->toArray();
        } elseif ($phone && !$username) {
            $site = OrderSite::where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
        } else {
            $site = '';
        }
        if ($site) {
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        } else {
            $arr = [];
        }

        $list = Order::with('getStatus')->with('getSite')
            ->with(['getOrderGoods' => function ($query) {
                $query->join('goods as g', 'g.id', '=', 'order_goods.gid');
            }])
            ->where(function ($query) use ($ordersyn, $orderstatus, $username, $phone, $arr) {
                $ordersyn && $query->where('ordersyn', 'like', $ordersyn . '%');
                $orderstatus && $query->where('orderstatus', $orderstatus);
                ($username || $phone) && $query->whereIn('scid', $arr);
            })->paginate(10);


        /*$list=Order::with('getStatus')->with('getSite')
            ->with(['getOrderGoods'=>function($query){
                $query->join('goods as g','g.id','=','order_goods.gid')->select('order_goods.oid','g.goodsname');
            }])
            ->where(function($query) use($ordersyn,$orderstatus,$username,$phone,$arr){
                $ordersyn && $query->where('ordersyn','like',$ordersyn.'%');
                $orderstatus && $query->where('orderstatus',$orderstatus);
                ($username || $phone) && $query->whereIn('scid',$arr);
            })->paginate(10);*/

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

        $firstRow = ($list->currentPage() - 1) * $list->perPage();
        return view('admin.order.index', [
            'list' => $list, 'firstRow' => $firstRow,
            'username' => $username, 'phone' => $phone,
            'ordersyn' => $ordersyn, 'orderstatus' => $orderstatus
        ]);
    }

    //积分订单
    public function integral(Request $request)
    {
        $username = $request->get('username');
        $ordersyn = $request->get('ordersyn');
        $phone = $request->get('phone');
        if ($username || $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        } else {
            $arr = '';
        }
        $list = OrderIntegral::with('getGoods')->with('getSite')->with('getStatus')
            ->where(function ($query) use ($ordersyn, $arr) {
                $ordersyn && $query->where('ordersyn', 'like', $ordersyn . '%');
                $arr && $query->whereIn('scid', $arr);
            })->paginate(10);
        $firstRow = ($list->currentPage() - 1) * $list->perPage();
        return view('admin.order.integral', ['list' => $list, 'username' => $username, 'phone' => $phone, 'ordersyn' => $ordersyn, 'firstRow' => $firstRow]);
    }

    //售后管理
    public function aftermarket(Request $request)
    {
        $username = $request->get('username');
        $aftersyn = $request->get('aftersyn');
        $phone = $request->get('phone');
        if ($username || $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
            foreach ($site as $v) {
                $arr[] = $v['id'];
            }
        } else {
            $arr = '';
        }
        $list = After::with('getGoods')->with('getSite')
            ->with('getAfterStatus')->with('getPic')
            ->with(['getOrder' => function ($query) {
                $query->join('order_status as os', 'order.orderstatus', '=', 'os.id');
            }])
            ->where(function ($query) use ($aftersyn, $arr) {
                $aftersyn && $query->where('aftersyn', 'like', $aftersyn . '%');
                $arr && $query->whereIn('scid', $arr);
            })->paginate(10);
        $firstRow = ($list->currentPage() - 1) * $list->perPage();
        return view('admin.order.aftermarket', ['list' => $list, 'username' => $username, 'phone' => $phone, 'aftersyn' => $aftersyn, 'firstRow' => $firstRow]);
    }

    //发货
    public function shipments(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->get('status');
            if ($status == 1) {
                $oid = $request->get('oid');
                $info = Order::find($oid);
                $info->orderstatus = 3;
                $row = $info->save();
            } elseif ($status == 2) {
                $arr = $request->get('oid');
                if (empty($arr)) {
                    return response(['code' => 5, 'info' => '发货订单不能为空']);
                } else {
                    $data['orderstatus'] = 3;
                    $row = Order::whereIn('id', $arr)->update($data);
                }
            } elseif ($status == 3) {
                $oid = $request->get('oid');
                $info = OrderIntegral::find($oid);
                $info->orderstatus = 3;
                $row = $info->save();
            }
            if ($row) {
                return response(['code' => 1, 'info' => '发货成功']);
            } else {
                return response(['code' => 2, 'info' => '发货失败']);
            }
        }
    }

    //是否同意退货
    public function agree(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->get('status');
            $id = intval($request->get('id'));
            $info = After::find($id);
            if ($status == 1) {
                $info->afterstatus = 2;
            } elseif ($status == 2) {
                $info->afterstatus = 3;
            }
            if ($info->save()) {
                return response(['code' => 1, 'info' => '操作成功']);
            } else {
                return response(['code' => 2, 'info' => '操作失败']);
            }
        }
    }


    /**
     * Excel导出
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @author totti_zgl
     * @date 2018/5/14 10:57
     */
    public function out($a, $b, $c, $d)
    {
        //处理大数据量的导出
        set_time_limit(0);                                  #设置超时时间
        ini_set('max_execution_time', '0');       #设置执行时间
        ini_set("memory_limit", "1024M");         #设置内存,防止内存溢出
        \PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;  #单元格缓存为MemoryGZip

        $username = $a;
        $ordersyn = $b;
        $phone = $c;
        $orderstatus = $d;
        if ($username && $phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
        } elseif ($username && !$phone) {
            $site = OrderSite::where('username', 'like', $username . '%')->select('id')->get()->toArray();
        } elseif ($phone && !$username) {
            $site = OrderSite::where('phone', 'like', $phone . '%')->select('id')->get()->toArray();
        } else {
            $site = '';
        }
        if ($site) {
            foreach ($site as $v) {
                $model[] = $v['id'];
            }
        } else {
            $model = [];
        }
        $list = Order::with('getStatus')->with('getSite')
            ->with(['getOrderGoods' => function ($query) {
                $query->join('goods as g', 'g.id', '=', 'order_goods.gid');
            }])
            ->where(function ($query) use ($ordersyn, $orderstatus, $username, $phone, $model) {
                $ordersyn && $query->where('ordersyn', 'like', $ordersyn . '%');
                $orderstatus && $query->where('orderstatus', $orderstatus);
                ($username || $phone) && $query->whereIn('scid', $model);
            })->get();
        foreach ($list as $k => $v) {
            $arr[$k]['id'] = $k + 1;
            $arr[$k]['oid'] = $v['id'];
            $arr[$k]['ordersyn'] = $v['ordersyn'];
            $arr[$k]['orderprice'] = $v['orderprice'];
            $arr[$k]['username'] = $v['getSite']['username'];
            $arr[$k]['phone'] = $v['getSite']['phone'];
            $arr[$k]['address'] = $v['getSite']['ps'] . $v['getSite']['qs'] . $v['getSite']['ws'] . $v['getSite']['xyd'];
            $arr[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
            if ($v['orderstatus'] == 1) {
                $arr[$k]['status'] = $v['getStatus']['statusname'];
            } elseif ($v['orderstatus'] == 2) {
                $arr[$k]['status'] = $v['getStatus']['adminopt'];
            } elseif ($v['orderstatus'] == 3) {
                $arr[$k]['status'] = $v['getStatus']['memberopt'];
            } else {
                $arr[$k]['status'] = $v['getStatus']['statusname'];
            }
        }

        $filename = '订单列表_' . date('Y/m/d');
        $line = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
        $header = ['编号', 'ID', '订单号', '订单总价', '收货人', '手机号', '收货地址', '订单时间', '订单状态'];

        Excel::create($filename, function ($excel) use ($arr, $line, $header) {
            $excel->sheet('Excel sheet', function ($sheet) use ($arr, $line, $header) {

                $sheet->setOrientation('landscape');
                $sheet->fromArray($arr);

                for ($i = 0; $i < count($line); $i++) {
                    $sheet->cell($line[$i] . '1', $header[$i]);
                }

                //设置单元格大小
                $sheet->setSize('G1', 50);

            });
        })->export('xls');


        /*$time=date('Y/m/d/H/i',time());
        Excel::create('订单列表_'.$time, function($excel) use($arr) {
            $excel->sheet('Excel sheet', function($sheet) use($arr) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($arr);
                $sheet->cell('A1','编号')->cell('B1','ID')->cell('C1','订单号')
                    ->cell('D1','订单总价')->cell('E1','收货人')->cell('F1','手机号')
                    ->cell('G1','收货地址')->cell('H1','订单时间')->cell('I1','订单状态');
                //设置单元格大小
                $sheet->setSize('G1', 50);
            });
        })->export('xls');*/


        /*->store($ext, $path = false, $returnInfo = false)或->save();
        ->store('xls', storage_path('excel/exports'));
        默认情况下，该文件将存储在storage/exports文件夹中，该文件夹已在export.php配置文件中定义
        如果要返回存储信息，请将第三个参数设置为true或更改其中的配置设置export.php*/
    }

    public function checkExcel(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                if (in_array(strtolower($file->extension()), ['xls'])) {
                    $file_name = $file->store('public', 'excel');
                    $this->excel_input($file_name);
                }
            }
        }
    }

    /**
     * Excel导入
     * @param $file_name
     * @author totti_zgl
     * @date 2018/5/14 11:48
     */
    protected function excel_input($file_name)
    {
        Excel::load($file_name, function ($reader) {

            $list = [];
            foreach ($reader as $sheet) {
                $arr = [];
                $sheet->each(function ($row) {

                    $created_at = $row->created_at->format('Y-m-d');
                    $order_sn = $row->order_sn;
                    $arr['created_at'] = $created_at;
                    $arr['order_sn'] = $order_sn;

                });
                $list[] = $arr;
            }

            return $list;

        })->get();
    }
}