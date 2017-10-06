<?php
namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\Request;

class BrandController extends BaseController{
    public function index(Request $request){
        $keywords=$request->get('brandname');
        $list=Brand::where(function($query) use($keywords){
            $keywords && $query->where('brandname','like',$keywords.'%');
        })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        return view('admin.brand.index',['keywords'=>$keywords,'list'=>$list,'firstRow'=>$firstRow]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $brandname=$request->get('brandname');
            if(empty($brandname)){
                return response(['code'=>2,'info'=>'品牌名称不能为空']);
            }
            if(!$request->hasFile('logo')) {
                return response(['code'=>2,'info'=>'品牌图片不能为空']);
            }
            $where['brandname']=$brandname;
            $info=Brand::where($where)->first();
            if($info){
                return response(['code'=>2,'info'=>'品牌名称已存在']);
            }
            $brand= new Brand();
            $brand->brandname=$brandname;
            if($brand->save()){
                $file=$request->file('logo');
                if($file->isValid()){
                    if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','gpeg','png'])){
                        $path = $file->store('uploads/brand/');
                        $brand->pic=$path;
                        if($brand->save()){
                            return response(['code'=>2,'info'=>'品牌添加成功']);
                        }else{
                            return response(['code'=>2,'info'=>'品牌添加失败']);
                        }
                    }else{
                        return response(['code'=>2,'info'=>'图片不合法']);
                    }
                }else{
                    return response(['code'=>2,'info'=>$file->getErrorMessage()]);
                }
            }else{
                return response(['code'=>2,'info'=>'添加品牌失败']);
            }
        }else{
            return view('admin.brand.add');
        }
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Brand::find($id);
            $info->hidden=($info['hidden']==0)?1:0;
            $row=$info->save();
            if($row){
                $arr['active']=($info['hidden']==0)?1:0;
                Goods::where('bid',$id)->update($arr);
                return response(['code'=>1,'body'=>'更改状态成功']);
            }else{
                return response(['code'=>2,'body'=>'更改状态失败']);
            }
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Brand::find($id);
            $row=$info->delete();
            if($row){
                unlink('uploads/logo/'.$info['logo']);
                return response(['code'=>1,'body'=>'删除品牌成功']);
            }else{
                return response(['code'=>2,'body'=>'删除品牌失败']);
            }
        }
    }

    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            if($id != 500){
                return response(['code'=>5,'body'=>'非法操作']);
            }
            $bname=trim($request->get('brandname'));
            if(empty($bname)){
                return response(['code'=>5,'body'=>'品牌名称不能为空']);
            }
            $bid=intval($request->get('bid'));
            $info=Brand::find($bid);
            if($bname != $info['brandname']){
                $arr=Brand::where('brandname',$bname)->first();
                if($arr){
                    return response(['code'=>5,'body'=>'品牌名称已存在']);
                }
                $info->brandname=$bname;
            }
            if($request->hasFile('logo')){
                $file=$request->file('logo');
                if($file->isValid()){
                    if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','gpeg','png'])){
                        $path = $file->store('uploads/brand/');
                        $info->pic=$path;
                        unlink('uploads/logo/'.$info['logo']);
                    }else{
                        return response(['code'=>2,'body'=>'图片不合法']);
                    }
                }else{
                    return response(['code'=>2,'body'=>$file->getErrorMessage()]);
                }
            }
            if($info->save()){
                return response(['code'=>2,'body'=>'编辑成功']);
            }else{
                return response(['code'=>2,'body'=>'编辑失败']);
            }
        }else{
            $brand_id=intval($id);
            $info=Brand::find($brand_id);
            return view('admin.brand.edit',['info'=>$info]);
        }
    }
}