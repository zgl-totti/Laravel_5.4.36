<?php
namespace App\Http\Controllers\Admin;


use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController{
    public function index(Request $request){
        $keywords=$request->get('keywords');
        $list=Category::where(function($query) use($keywords){
            $keywords && $query->where('categoryname','like',$keywords.'%');
        })->orderBy('path')->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.category.index',['list'=>$list,'keywords'=>$keywords,'firstRow'=>$firstRow]);
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Category::find($id);
            $arr['status']=$info['status']==0?1:0;
            $row=Category::where('path','like',$info['path'].'%')->update($arr);
            if($row){
                return response(['code'=>1,'body'=>'更改状态成功']);
            }else{
                return response(['code'=>2,'body'=>'更改状态失败']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Category::find($id);
            $row=Category::where('path','like',$info['path'].'%')->delete();
            if($row){
                unlink('uploads/logo/'.$info['logo']);
                return response(['code'=>1,'body'=>'删除分类成功']);
            }else{
                return response(['code'=>2,'body'=>'删除分类失败']);
            }
        }
    }

    public function add(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $rules=['categoryname'=>'required', 'pid'=>'required'];
            $validator=Validator::make($data,$rules);
            if($validator->passes()){
                $where['categoryname']=$data['categoryname'];
                $info=Category::where($where)->first();
                if($info){
                    return response(['code'=>5,'info'=>'分类名称已存在']);
                }
                $model= new Category();
                $model->categoryname=$data['categoryname'];
                $model->pid=$data['pid'];
                if($model->save()){
                    $id=$model->id;
                    $arr=Category::find($id);
                    $arr->path=$arr['path'].$id;
                    $arr->save();
                    return response(['code'=>1,'info'=>'分类添成功']);
                }else{
                    return response(['code'=>5,'info'=>'分类添加失败']);
                }
            }else{
                return response(['code'=>5,'info'=>$validator->messages()]);
            }
        }else{
            $category=Category::where('pid',0)->where('status',1)->get();
            return view('admin.category.add',['category'=>$category]);
        }
    }

    public function edit(Request $request,$id){
        if($request->ajax()){
            if($id != 500){
                return response(['code'=>5,'info'=>'非法操作']);
            }
            $c_id=$request->get('c_id');
            $categoryname=trim($request->get('categoryname'));
            $pid=trim($request->get('pid'));
            $info=Category::find($c_id);
            if(empty($categoryname)){
                return response(['code'=>5,'info'=>'分类名称不能为空']);
            }
            if($categoryname != $info['categoryname']){
                $arr=Category::where('categoryname',$categoryname)->first();
                if($arr){
                    return response(['code'=>5,'info'=>'分类名称已存在']);
                }
                $info->categoryname=$categoryname;
            }
            if($pid>0){
                $info->pid=$pid;
            }
            if($info->save()){
                return response(['code'=>1,'info'=>'编辑成功']);
            }else{
                return response(['code'=>5,'info'=>'编辑失败']);
            }
        }else{
            $id=intval($id);
            $info=Category::find($id);
            $category=Category::where('pid',0)->where('status',1)->get();
            return view('admin.category.edit',['info'=>$info,'category'=>$category]);
        }
    }

    public function cate(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $category=Category::where('pid',$id)->where('status',1)->get();
            if($category){
                $res['code']=1;
                $res['info']=$category;
                return response($res);
            }else{
                return response(['code'=>5]);
            }
        }
    }





    /*public function index1(){
        $cate=M("Category");
        if(I("get.categoryname")){
            $w['categoryname']=I("get.categoryname");
            $p=$cate->where($w)->field('path')->find();
            if(!$p){
                $where1['path']="";
            }else{
                $path=$p["path"];
                $where1['path']=array("like","$path%");
            }
        }else{
            $where1="";
        }
        $count = $cate->where($where1)->count();// 查询满足要求的总记录数
        $page = new Page($count,16);// 实例化分页类 传入总记录数和每页显示的记录数()
        $show = $page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $categoryList = $cate->where($where1)->limit($page->firstRow.','.$page->listRows)->order("path")->select();
        $this->assign("count",$count);//赋值总记录数
        $this->assign('firstRow',$page->firstRow);//赋值每页的第一条开始数
        $this->assign("categoryList",$categoryList);// 赋值数据集
        $this->assign("page",$show);// 赋值分页输出
        //新建一个数组，对应分类列表里的上级分类
        $categoryList=$cate->where($where1)->order("path")->select();
        $pathname2=array();
        foreach($categoryList as $v1){
            $where['id']=array('in',$v1['path']);
            $pathname[]=$cate->where($where)->select();
        }
        foreach($pathname as $k=>$v2){
            foreach($v2 as $v3){
                $pathname2[$k]['path'].=$v3['categoryname']." > ";
            }
        }
        $this->assign("pathname2",$pathname2);
        $this->display();
    }*/
}