<?php
namespace App\Http\Controllers\Admin;

use App\Models\Bargain;
use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\Request;

class NewpersonController extends BaseController{
    public function index(Request $request){
        $startprice=trim($request->input('startprice'));
        $endprice=trim($request->input('endprice'));
        $brand=trim($request->input('brand'));
        $list=Bargain::with('getGoods')
            ->where(function ($query) use($startprice,$endprice,$brand){
                $startprice && $endprice && $query->whereBetween('price',[$startprice,$endprice]);
                $startprice && empty($endprice) && $query->where('price','>=',$startprice);
                $endprice && empty($startprice) && $query->where('price','<=',$endprice);
                $brand && $query->where('bname','like',$brand.'%');
            })->orderBy('price','desc')->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.newperson.index',compact('list','firstRow','startprice','endprice','brand'));
    }

    public function add(Request $request){
        if($request->ajax()){
            $bid=intval($request->input('bid'));
            $gid=intval($request->input('gid'));
            $info=Bargain::where('gid',$gid)->first();
            if($info){
                return response(['code'=>500,'info'=>'此商品已添加！']);
            }
            $brand=Brand::find($bid);
            $goods=Goods::with('getCategory')->where('id',$gid)->first();
            $bargain= new Bargain();
            $bargain->gid=$gid;
            $bargain->bname=$brand['brandname'];
            $bargain->price=$goods['price'];
            $bargain->bname=$goods['getCategory']['cname'];
            $row=$bargain->save();
            if(empty($row)){
                return response(['code'=>5,'info'=>'添加失败！']);
            }else{
                return response(['code'=>1,'info'=>'添加成功！']);
            }
        }else{
            $brand=Brand::where('hidden',1)->get();
            return view('admin.newperson.add',compact('brand'));
        }
    }

    public function addGoods(Request $request){
        if($request->ajax()){
            $bid=intval($request->input('bid'));
            $goods=Goods::where('bid',$bid)->get();
            return response(['code'=>1,'info'=>$goods]);
        }
    }

    public function bargain(Request $request){
        if($request->ajax()){
            $id=intval($request->input('id'));
            $cutprice=trim($request->input('cutprice'));
            if(is_numeric($cutprice) && $cutprice>0){
                $info=Bargain::find($id);
                if(empty($info)){
                    return response(['code'=>5,'info'=>'降价商品不存在！']);
                }
                $info->cutprice=$info['cutprice']-$cutprice;
                $info->cut=$cutprice;
                $info->status=1;
                $row=$info->save();
                if(empty($row)){
                    return response(['code'=>5,'info'=>'设置失败！']);
                }else{
                    return response(['code'=>1,'info'=>'设置成功！']);
                }
            }else{
                return response(['code'=>5,'info'=>'降价金额错误！']);
            }
        }
    }

    public function batch(Request $request){
        if($request->ajax()){
            $startprice=trim($request->input('startprice'));
            $endprice=trim($request->input('endprice'));
            $brand=trim($request->input('brand'));
            $cutprice=trim($request->input('cutprice'));
            if(is_numeric($cutprice) && $cutprice>0) {
                $list = Bargain::where(function ($query) use ($startprice, $endprice, $brand) {
                    $startprice && $endprice && $query->whereBetween('price', [$startprice, $endprice]);
                    $startprice && empty($endprice) && $query->where('price', '>=', $startprice);
                    $endprice && empty($startprice) && $query->where('price', '<=', $endprice);
                    $brand && $query->where('bname', 'like', $brand . '%');
                })->decrement('cutprice',$cutprice,['cut'=>$cutprice]);
                if(empty($list)){
                    return response(['code'=>5,'info'=>'设置失败！']);
                }else{
                    return response(['code'=>1,'info'=>'设置成功！']);
                }
            }else{
                return response(['code'=>5,'info'=>'降价金额错误！']);
            }
        }
    }

    public function exclusive(Request $request){
        $bname=trim($request->input('bname'));
        $list=Bargain::with('getGoods')
            ->where('cut','>',0)
            ->where('bname','like',$bname.'%')
            ->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.newperson.exclusive',compact('list','firstRow','bname'));
    }

    public function reset(Request $request){
        if($request->ajax()){
            $id=intval($request->input('id'));
            $info=Bargain::find($id);
            if(empty($info)){
                return response(['code'=>5,'info'=>'商品不存在！']);
            }
            $info->status=0;
            $info->cut=0;
            $info->cutprice=0;
            $row=$info->save();
            if(empty($row)){
                return response(['code'=>5,'info'=>'重置失败！']);
            }else{
                return response(['code'=>1,'info'=>'重置成功！']);
            }
        }
    }

    public function resetAll(Request $request){
        if($request->ajax()){
            $bname=trim($request->input('bname'));
            $row=Bargain::where('cut','>',0)
                ->where('bname','like',$bname.'%')
                ->update(['status'=>0,'cut'=>0,'cutprice'=>0]);
            if(empty($row)){
                return response(['code'=>5,'info'=>'重置失败！']);
            }else{
                return response(['code'=>1,'info'=>'重置成功！']);
            }
        }
    }
}