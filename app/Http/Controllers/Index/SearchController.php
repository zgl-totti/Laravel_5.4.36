<?php
namespace App\Http\Controllers\Index;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller{
    public function category(Request $request,$id){
        $mid=$request->session()->get('mid');
        $member=Member::find($mid);
        $id=intval($id);
        $info=Category::find($id);
        $category=Category::where('path','like',$info['path'].'%')->get(['id']);
        $list=Goods::whereIn('cid',$category)->paginate(8);
        $brand=Brand::where('hidden',1)->get();
        //print_r($list);
        return view('index.search.category',[
            'member'=>$member,
            'list'=>$list,
            'brand'=>$brand,
            'info'=>$info
        ]);
    }

    public function brand(Request $request,$id){
        $mid=$request->session()->get('mid');
        $member=Member::find($mid);
        $id=intval($id);
        $info=Brand::find($id);
        $list=Goods::where('bid',$id)->paginate(8);
        return view('index.search.brand',[
            'member'=>$member,
            'list'=>$list,
            'info'=>$info
        ]);
    }








    //通过商品名称搜索
    public function name1(){
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $goods=M('Goods');
        $brand=M('Brand');
        $keyword=I('get.keyword');
        $where['goodsname']=array('like',"%$keyword%");
        $where1['g.goodsname']=array('like',"%$keyword%");
        $where['active']=1;
        $where1['g.active']=1;
        $order='price desc,salenum desc, credit desc ';
        $act=I('get.act');
        if(I('get.order')){
            //商品排序
            //desc asc
            $field=I('get.field');
            $order=I('get.order');
            if($field=='zh'){
                $order='price'.' '.$order.','.'credit'.' '.$order.','.'salenum'.' '.$order;

            }else{
                $field=substr(I('get.field'),1);
                $order=$field.' '.$order;
            }
        }
            if(I('get.brandname')){
                if(I('get.brandname')!='全部'){
                    $condition['brandname']=I('get.brandname');
                    $bid=$brand->field('id')->where($condition)->find();
                    $where['bid']=$bid['id'];
                    $where1['g.bid']=$bid['id'];
                }
            }
            if(I('get.price')){
                if(I('get.price')!='全部'){
                    //处理价格区间数据
                    $price=explode('-',I('get.price'));
                    $low=$price[0];
                    $high=$price[1];
                    $where['price']=array('between',array($low,$high));
                    $where1['g.price']=array('between',array($low,$high));
                }

            }
            if(I('get.hot')){
                if(I('get.hot')!='全部'){
                    $where['hot']=I('get.hot');
                    $where1['g.hot']=I('get.hot');
                }
            }
        $count=$goods->where($where)->count();
        //分页
        $page=new page($count,8);
        $show=$page->show();
        $goodsList=$goods->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        //品牌列表的获取
        $where1['_string']='bid=b.id';
        $brandList=$goods->table('yhyg_brand b,yhyg_goods g')->field('b.brandname')->where($where1)->group('bid')->select();
        $this->assign('brandList',$brandList);
        $this->assign('goodsList',$goodsList);
        $this->assign('num',$count);
        $this->assign('keyword',$keyword);
        $this->assign('page',$show);
        $this->assign('empty',"<h1>没有找到相应的商品！</h1>");
        $this->display('index');
    }
    //通过品牌搜索
    public function brand1(){
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        $goods=M('Goods');
        $brand=M('Brand');
        $keyword=I('get.keyword');
        $where['brandname']=$keyword;
        $where['active']=1;
        //获取品牌列表
        $brandInfo=$brand->where($where)->find();
        $where['bid']=$brandInfo['id'];
        $order='price desc,salenum desc, credit desc ';
        $act=I('get.act');
        if(I('get.order')){
            //商品排序
            //desc asc
            $field=I('get.field');
            $order=I('get.order');
            if($field=='zh'){
                $order='price'.' '.$order.','.'credit'.' '.$order.','.'salenum'.' '.$order;

            }else{
                $field=substr(I('get.field'),1);
                $order=$field.' '.$order;
            }
        }
        if(I('get.price')){
            if(I('get.price')!='全部'){
                //处理价格区间数据
                $price=explode('-',I('get.price'));
                $low=$price[0];
                $high=$price[1];
                $where['price']=array('between',array($low,$high));
            }

        }
        if(I('get.hot')){
            if(I('get.hot')!='全部'){
                $where['hot']=I('get.hot');
            }
        }
        $count=$goods->where($where)->count();
        //分页
        $page=new page($count,8);
        $show=$page->show();
        $goodsList=$goods->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('brandname',$brandInfo['brandname']);
        $this->assign('goodsList',$goodsList);
        $this->assign('num',$count);
        $this->assign('keyword',$keyword);
        $this->assign('page',$show);
        $this->assign('empty',"<h1>没有找到相应的商品！</h1>");
        $this->display('brand');
    }
    //首页通过分类进入搜索页
    public function category1(){
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        //获取导航信息
        $categoryListOne=A('Common')->getNav();
        $this->assign('categoryListOne',$categoryListOne);
        //获取该分类下的所有子分类的id
        $catename=I('get.keyword');
        $where3['categoryname']=$catename;
        $id=M('Category')->where($where3)->find();
        $where1['path']=array('like',"{$id['path']}%");
        $cateInfo=M('Category')->field('id')->where($where1)->select();

        $cateStr='';
        foreach($cateInfo as $v){
            $cateStr.=$v['id'].',';
        }
        $cateStr=substr($cateStr,0,-1);
//        echo $cateStr;
//        exit;
        $goods=M('Goods');
        $brand=M('Brand');
        $keyword=I('get.keyword');
        $where['g.cid']=array('in',$cateStr);
        $where['g.active']=1;
        $order='price desc,salenum desc, credit desc ';
        $act=I('get.act');
        if(I('get.order')){
            //商品排序
            //desc asc
            $field=I('get.field');
            $order=I('get.order');
            if($field=='zh'){
                $order='price'.' '.$order.','.'credit'.' '.$order.','.'salenum'.' '.$order;

            }else{
                $field=substr(I('get.field'),1);
                $order=$field.' '.$order;
            }
        }
        if(I('get.brandname')){
            if(I('get.brandname')!='全部'){
                $condition['brandname']=I('get.brandname');
                $bid=$brand->field('id')->where($condition)->find();
                $where['g.bid']=$bid['id'];
            }
        }
        if(I('get.price')){
            if(I('get.price')!='全部'){
                //处理价格区间数据
                $price=explode('-',I('get.price'));
                $low=$price[0];
                $high=$price[1];
                $where['g.price']=array('between',array($low,$high));
            }

        }
        if(I('get.hot')){
            if(I('get.hot')!='全部'){
                $where['g.hot']=I('get.hot');
            }
        }
        $where['_string']='g.cid=c.id';
        $count=$goods->table('yhyg_goods g,yhyg_category c')->where($where)->count();
        //分页
        $page=new page($count,8);
        $show=$page->show();
        $goodsList=$goods->table('yhyg_goods g,yhyg_category c')->field('g.goodsname,g.id,g.price,g.pic,g.salenum')->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        //品牌列表的获取
        $where['_string']='bid=b.id';
        $brandList=$goods->table('yhyg_brand b,yhyg_goods g')->field('b.brandname')->where($where)->group('bid')->select();
        $this->assign('brandList',$brandList);
        $this->assign('goodsList',$goodsList);
        $this->assign('num',$count);
        $this->assign('keyword1',$keyword);
        $this->assign('page',$show);
        $this->assign('empty',"<h1>没有找到相应的商品！</h1>");
        $this->display('category');
    }
}