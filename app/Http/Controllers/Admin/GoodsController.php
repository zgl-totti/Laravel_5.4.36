<?php
namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends BaseController{
    public function index(Request $request){
        $keywords=$request->input('keywords');
        $list=Goods::with('getCategory')
            ->with('getBrand')
            ->where(function ($query) use($keywords){
                $keywords && $query->where('goodsname','like','%'.$keywords.'%');
            })->paginate(10);

        /*$list=Goods::with('getCategory')
            ->with('getBrand')
            ->where('id','<',0)
            ->where(function ($query) use($keywords){
            $keywords && $query->where('goodsname','like','%'.$keywords.'%');
            })
            ->get()
            ->toArray();
        print_r($list);die;*/

        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.goods.index',compact('list','firstRow','keywords'));
    }

    public function operate(Request $request){
        if ($request->ajax()){
            $gid=$request->input('gid');
            $info=Goods::find($gid);
            if (empty($info)){
                return response(['code'=>5,'info'=>'商品不存在！']);
            }
            $info->active=($info['active']==0)?1:0;
            $row=$info->save();
            if(empty($row)){
                return response(['code'=>5,'info'=>'状态更新失败！']);
            }else{
                return response(['code'=>1,'info'=>'状态更新成功！']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $gid=$request->input('gid');
            $row=Goods::find($gid)->delete();
            if(empty($row)){
                return response(['code'=>5,'info'=>'删除失败！']);
            }else{
                return response(['code'=>1,'info'=>'删除成功！']);
            }
        }
    }

    public function add(Request $request){
        if($request->isMethod('post')){


        }else{
            $brand=Brand::where('hidden',1)->get();
            return view('admin.goods.add',compact('brand'));
        }
    }

    public function edit(Request $request,$id){
        if($request->isMethod('post')){



        }else{
            $id=intval($id);
            $info=Goods::find($id);
            $brand=Brand::where('hidden',1)->get();
            return view('admin.goods.edit',compact('info','brand'));
        }
    }

    public function getCateByPid(Request $request){
        if($request->ajax()){
            $pid=$request->input('pid',0);
            $list=Category::where('pid',$pid)->get();
            if(empty($list)){
                return response(['code'=>5,'info'=>'查询失败']);
            }else{
                return response(['code'=>1,'info'=>$list]);
            }
        }
    }

    public function analyze(Request $request){
        if($request->ajax()){
            $info=Goods::orderBy('salenum','desc')->limit(10)->offset(0)->get();
            $list=[];
            foreach ($info as $k=>$v){
                $list['x'][$k]=mb_substr($v['goodsname'],0,7,'utf-8');
                $list['y'][$k]=$v['salenum'];
            }
            return response(['code'=>1,'info'=>$list]);
        }else{
            return view('admin.goods.analyze');
        }
    }



































    //根据父ID查询分类列表
    public function getCateByPid_(){
        $pid=I('post.pid')?I('post.pid'):0;
        $where['pid']=$pid;
        $cateList=M('Category')->where($where)->select();
        if($cateList){
            $this->success($cateList);
        }else{
            $this->error('查询失败');
        }
    }

    public function index_(){
        $g=M("Goods");
        $g->execute("set names utf8");
        if($goodsname=I("get.goodsname")){
            $this->assign("name",$goodsname);
            $where['goodsname']=array("like","%$goodsname%");

        }else{
            $where="";
        }
        $count=$g->where($where)->count();// 查询满足要求的总记录数
        $page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数()
        $show = $page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $goodsList = $g->where($where)->limit($page->firstRow.','.$page->listRows)->order("addtime desc")->select();
        $this->assign("count",$count);//赋值总记录数
        $this->assign('firstRow',$page->firstRow);//赋值每页的第一条开始数
        $this->assign("goodsList",$goodsList);// 赋值数据集
        $this->assign("page",$show);// 赋值分页输出
        $this->display();
    }

    public function add_(){
        $category=M("Category");
        $brand=M("Brand");
        $brandList=$brand->where("hidden=1")->select();
        if(IS_AJAX){
            $where['pid']=I("get.id");
            $where['status']=1;
            $categoryList2=$category->where($where)->select();
            $this->ajaxReturn($categoryList2);
        }else{
            $where['pid']=0;
            $where['status']=1;
            $categoryList=$category->where($where)->select();
            $this->assign("categoryList1",$categoryList);
        }
        $this->assign("brandList",$brandList);
        $this->display();
    }

    public function addgoods(){
        $g=M("Goods");
        $list=$g->create();
        $list['cid']=I('post.thirdCate');
        $c=M("Category");
        $where["id"]=$list["cid"];
        $pathname=$c->where($where)->field("categoryname")->find();
        if(!$list["goodsname"]){
            $this->error("商品名不能为空");
        }elseif($g->where("goodsname='{$list['goodsname']}'")->select()){
            $this->error("商品名已存在，请重新添加商品");
        }elseif(!$list['cid']){
            $this->error("请选择三级分类");
        } elseif(!$list['bid']){
            $this->error("请选择品牌");
        }elseif(!$list['hot']){
            $this->error("请选择选购热点");
        }elseif(!$list["markeprice"]){
            $this->error("市场价格不能为空");
        }elseif(!$list["price"]){
            $this->error("商城价格不能为空");
        }elseif(!$list["num"]){
            $this->error("商品数量不能为空");
        }
        if($list){
            //上传商品图片
            $upload=new Upload();
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            if(!file_exists($upload->rootPath)){
                mkdir($upload->rootPath);
            }
            $info = $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                //将商品信息插入到商品表中
                $list['addtime']=time();
                $list["cname"]=$pathname["categoryname"];
                if(!$id=$g->field("goodsname,cid,markeprice,price,num,detail,addtime,cname,bid,hot")->add($list)){
                    $this->error("添加失败");
                }
                //将商品图片插入商品图片表中
                $pic=M("goods_pic");
                foreach($info as $v){
                    $data["gid"]=$id;
                    $data['picname']=$v['savepath'].$v['savename'];
                    $pic->add($data);
                    //生成缩略图
                    $image=new Image();
                    $filename="./Uploads/".$v['savepath'].$v['savename'];
                    $thumb100="./Uploads/".$v['savepath']."thumb100_".$v['savename'];
                    $thumb350="./Uploads/".$v['savepath']."thumb350_".$v['savename'];
                    $thumb800="./Uploads/".$v['savepath']."thumb800_".$v['savename'];
                    $image->open($filename)->thumb(100,100)->save($thumb100);
                    $image->open($filename)->thumb(350,350)->save($thumb350);
                    $image->open($filename)->thumb(800,800)->save($thumb800);
                }
                //将商品主图路径更新至商品表
                $where['id']=$id;
                $g->pic=$info[0]['savepath'].$info[0]['savename'];
                if($g->where($where)->save()){
                    $this->success("添加成功");
                }else{
                    $this->error("添加失败");
                }
            }
        }
    }

    public function active(){
        $goods=M("Goods");
        $goods->execute("set names utf8");
        $where['id']=I("get.id");
        if(I("get.active")==0){
            $goods->active=1;
            if($goods->where($where)->save()){
                $this->success("上架成功");
            }else{
                $this->error("上架失败");
            }
        }else{
            $goods->active=0;
            if($goods->where($where)->save()){
                $this->success("下架成功");
            }else{
                $this->error("下架失败");
            }
        }
    }

    public function delGoods(){
        $id= I("get.id");
        $del=D("Goods");
        if($del->del($id)){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function edit_(){
        $gid = trim(I('get.id'));
        session('xxx',I("get.id"));
        $brand=M("Brand");
        $brandList=$brand->where("hidden=1")->select();
        $goods = M('goods')->alias('g')->join('yhyg_category c ON g.cid=c.id')->where(array('g.id' => $gid))->field('g.*,categoryname,path')->order(array('g.id' => 'desc'))->limit('2,2')->find();
        $goods['detail'] = html_entity_decode($goods['detail']);
        $where['id'] = array('in', $goods['path']);
        $cate = M('category')->where($where)->field('id,categoryname')->select();
        $this->assign('goods', $goods);
        $this->assign('cate', $cate);
        $this->assign("brandList",$brandList);
        $this->display();
    }

    public function editGoods(){
        $goods=D("Goods");
        $goods->execute("set names utf8");
        $goodsInfo=$goods->create();
        if($goodsInfo){
            session('xxx',null);
            $c=M("Category");
            $c->execute("set names utf8");
            $where1['id']=$goodsInfo['cid'];
            $pathname=$c->where($where1)->field("categoryname")->find();
            $goodsInfo['addtime']=time();
            $goodsInfo['cname']=$pathname['categoryname'];
            //设置上传条件
            $editupload=new Upload();
            $editupload->maxSize = 3145728 ;// 设置附件上传大小
            $editupload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $editupload->rootPath = './Uploads/'; // 设置附件上传根目录
            if(!file_exists($editupload->rootPath)){
                mkdir($editupload->rootPath);
            }
            //开始上传
            $info=$editupload->upload();
            if($info){// 上传成功
                //更新商品表里面的数据
                $goods->save($goodsInfo);
                $pic=M("goods_pic");
                $w['gid']=$goodsInfo['id'];
                //删除图片文件
                $picname=$pic->where($w)->field("picname")->select();
                foreach($picname as $val){
                    unlink("./Uploads/$val[picname]");
                    $arr=explode("/",$val[picname]);
                    $thumb100="./Uploads/".$arr[0]."/thumb100_".$arr[1];
                    $thumb350="./Uploads/".$arr[0]."/thumb350_".$arr[1];
                    $thumb800="./Uploads/".$arr[0]."/thumb800_".$arr[1];
                    unlink($thumb100);
                    unlink($thumb350);
                    unlink($thumb800);
                }
                //将原来的商品图片信息从图片表中删除
                $pic->where($w)->delete();
                //重新插入新的商品图片
                foreach($info as $v){
                    $data["gid"]=$goodsInfo['id'];
                    $data['picname']=$v['savepath'].$v['savename'];
                    $pic->add($data);
                    //生成缩略图
                    $image=new Image();
                    $filename="./Uploads/".$v['savepath'].$v['savename'];
                    $thumb100="./Uploads/".$v['savepath']."thumb100_".$v['savename'];
                    $thumb350="./Uploads/".$v['savepath']."thumb350_".$v['savename'];
                    $thumb800="./Uploads/".$v['savepath']."thumb800_".$v['savename'];
                    $image->open($filename)->thumb(100,100)->save($thumb100);
                    $image->open($filename)->thumb(350,350)->save($thumb350);
                    $image->open($filename)->thumb(800,800)->save($thumb800);
                }
                //将商品主图路径更新至商品表
                $abc['pic']=$info[0]['savepath'].$info[0]['savename'];
                $where['id']=$goodsInfo['id'];
                $goods->where($where)->field('pic')->save($abc);
                $this->success("更新成功");
            }else{//上传失败
                if($goods->save($goodsInfo)){
                    $this->success("更新成功");
                }else{
                    $this->error("更新失败");
                }
            }
        }else{
             $this->error($goods->getError());
        }
    }

    public function goodsOut(){
        include_once "/yhyg/Common/PHPExcel/PHPExcel.php";
        $objPHPExcel=new \PHPExcel();
        $dir="./GoodsOut";
        if(!file_exists($dir)){
            mkdir($dir);
        }
        $filename=date("Y-m-d-H-i-s").".xlsx";
        $objSheet=$objPHPExcel->getActiveSheet();
        $objSheet->setTitle("demo");
        $objSheet->getStyle('A:F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objSheet->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objSheet->getColumnDimension('B')->setWidth(25);
        $objSheet->getColumnDimension('F')->setWidth(25);
        $objSheet->getColumnDimension('A')->setWidth(110);
        $objSheet->getStyle('A1:F1')->getFont()->setBold(true);
        $objSheet->setCellValue("A1","商品名称")->setCellValue("B1","上级分类")->setCellValue("C1","品牌")->setCellValue("D1","价格")->setCellValue("E1","库存量")->setCellValue("F1","销售数量");
        $goods=M("Goods");
        $goodsInfo=$goods->join("yhyg_brand ON yhyg_goods.bid=yhyg_brand.id")->field("goodsname,cname,brandname,price,num,salenum")->order("num")->select();
        $j=2;
        foreach($goodsInfo as $k=>$v){
            $objSheet->setCellValue("A".$j,$v['goodsname'])->setCellValue("B".$j,$v['cname'])->setCellValue("C".$j,$v['brandname'])->setCellValue("D".$j,$v['price'])->setCellValue("E".$j,$v['num'])->setCellValue("F".$j,$v['salenum']);
            $j++;
        }

        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        /* $objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
         $objWriter->save($dir."/".$filename."goods.xlsx");
         $this->success("商品导出成功");*/
    }
}
