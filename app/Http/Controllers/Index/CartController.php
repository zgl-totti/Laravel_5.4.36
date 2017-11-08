<?php
namespace App\Http\Controllers\Index;


use App\Models\Bargain;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;

class CartController extends BaseController{
    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $new=$request->session()->get('isnew');
        if(empty($mid)){
            $shop_cart=$request->session()->get('shop_cart');
        }else{
            $shop_cart='';
        }
        $list=$this->showCart($mid,$shop_cart);
        return view('index.cart.index',['list'=>$list,'isnew'=>$new]);
    }

    public function myCart(Request $request){
        $mid=$request->session()->get('mid');
        if(empty($mid)){
            $shop_cart=$request->session()->get('shop_cart');
        }else{
            $shop_cart='';
        }
        $list=$this->showCart($mid,$shop_cart);
        return view('index.cart.cart',['list'=>$list]);
    }

    public function showCart($mid,$shop_cart){
        if(empty($mid)){
            foreach ($shop_cart as $k=>$v){
                $list[$k]=Goods::where('id',$k)->first();
                $list[$k]['buynum']=$v['buynum'];
                if($list){
                    $list[$k]['color']=session('shop_cart'.$k)['color'];
                    $list[$k]['model']=session('shop_cart'.$k)['model'];
                }
            }
        }else{
            $list=Cart::with('getGoods')->where('mid',$mid)->get();
            foreach ($list as $k=>$v){
                $info=Member::where('isnew',0)->where('id',$mid)->first();
                if($info){
                    $arr=Bargain::where('gid',$v['id'])->first();
                    if($arr){
                        $list[$k]['cut']=$arr['cut'];
                        $list[$k]['status']=1;
                    }
                }
            }
        }
        return $list;
    }

    public function bargain(Request $request){
        if($request->ajax()){
            $gid=$request->input('singlecheckbox');
            foreach ($gid as $v){
                $id[]=$v;
            }
            $new=$request->session()->get('isnew');
            if(empty($new)){
                $gidInfo=Bargain::whereIn('gid',$id)->count();
                if($gidInfo>1){
                    return response(['code'=>5,'info'=>'订单中只能有一件为首单专享商品哦!']);
                }else{
                    return response(['code'=>1,'info'=>'ok!']);
                }
            }else{
                return response(['code'=>1,'info'=>'ok!']);
            }
        }
    }

    public function delGoodsByCart(Request $request){
        if($request->ajax()){
            $gid=$request->input('gid');
            $mid=$request->session()->get('mid');
            if(! empty($mid) && $mid>0){
                $where['gid']=$gid;
                $where['mid']=$mid;
                $row=Cart::where($where)->first()->delete();
                if($row){
                    return response(['code'=>1,'info'=>'删除成功']);
                }else{
                    return response(['code'=>5,'info'=>'删除失败']);
                }
            }else{
                $request->session()->remove('shop_cart'.$gid);
                return response(['code'=>1,'info'=>'删除成功']);
            }
        }
    }
}
