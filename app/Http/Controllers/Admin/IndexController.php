<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:26
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use App\Models\Collect;
use App\Models\Goods;
use Illuminate\Http\Request;

class IndexController extends BaseController{
    public function index(){
        return view('admin.index.index');
    }

    public function top(){
        return view('admin.public.top');
    }

    public function left(){
        return view('admin.public.left');
    }

    public function footer(){
        return view('admin.public.footer');
    }

    public function main(){
        /*$aid=$request->session()->get('aid');
        if(empty($aid)){
            return redirect('admin/login');
        }
        $info=Admin::find($aid);
        return view('admin.index.main')->with('info',$info);*/

        return view('admin.index.main');
    }

    public function paiHang(Request $request,$id){
        if($request->ajax()){
            $status=$id;
            if($status==1){
                $list=$this->getGoods();
            }elseif($status==2){
                $list=$this->getCollect();
            }elseif($status==3){
                $list=$this->getLiuLan();
            }
            foreach($list as $k=>$v){
                $paiList['x'][$k]=mb_substr($v['goodsname'],0,10,'utf-8');
                $paiList['y'][$k]['value']=$v['num'];
                $paiList['y'][$k]['name']=mb_substr($v['goodsname'],0,10,'utf-8');
            }
            return response(['info'=>$paiList]);
        }
    }

    public function getGoods(){
        $list=Goods::orderBy('salenum','desc')->limit(5)->get(['goodsname','salenum as num'])->toArray();
        return $list;
    }

    public function getCollect(){
        $list=Collect::with('goodses')->groupBy('gid')->limit(5)->get(['gid'])->toArray();
        foreach($list as $k=>$v){
            $list[$k]['goodsname']=$v['goodses']['goodsname'];
            $list[$k]['num']=10;
        }
        return $list;
    }

    public function getLiuLan(){
        $list=Collect::with('goodses')->groupBy('gid')->limit(5)->get(['gid'])->toArray();
        foreach($list as $k=>$v){
            $list[$k]['goodsname']=$v['goodses']['goodsname'];
            $list[$k]['num']=10;
        }
        return $list;
    }

    /*public function getGoods($num=5){
        $list=M('Goods')->field('goodsname,salenum as num')->order('salenum desc')->limit("0,$num")->select();
        return $list;
    }
    public function getCollect($num=5){
        $list=M()->table('yhyg_goods g,yhyg_collect c')->where('g.id=c.gid')->field('g.goodsname,COUNT(c.id) as num')->group('gid')->order('num desc')->limit("0,$num")->select();
        return $list;
    }
    public function getLiuLan($num=5){
        $list=M()->table('yhyg_goods g,yhyg_zuji z')->where('g.id=z.gid')->field('g.goodsname,COUNT(z.id) as num')->group('gid')->order('num desc')->limit("0,$num")->select();
        return $list;
    }*/
}