<?php
namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends BaseController{
    /**
     * 品牌列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     * @author totti_zgl
     * @date 2018/3/30 16:57
     */
    public function index(Request $request){
        $keywords=$request->get('brandname');

        /*$list=Brand::where(function($query) use($keywords){
            $keywords && $query->where('brandname','like',$keywords.'%');
        })->paginate(10);*/

        $list=Brand::when($keywords,function ($query) use ($keywords){
            return $query->where('brandname','like',$keywords.'%');
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
            $file=$request->file('logo');
            if($file->isValid()){
                if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','png'])){
                    $path = $file->store('brand','public');
                    $brand->logo=$path;
                    if($brand->save()){
                        return response()->json(['code'=>1,'info'=>'品牌添加成功']);
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
            return view('admin.brand.add');
        }
    }

    /**
     * 更改状态
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response|\think\Response
     * @author totti_zgl
     * @date 2018/3/30 16:31
     */
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

    /**
     * 删除图片
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response|\think\Response
     * @author totti_zgl
     * @date 2018/3/30 11:01
     */
    public function del(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Brand::find($id);
            $row=$info->delete();
            if($row){

                //删除图片：Storage:delete()方法也是走的unlink();
                Storage::disk('public')->delete($info['logo']);
                //unlink('storage/'.$info['logo']);

                return response(['code'=>1,'body'=>'删除品牌成功']);
            }else{
                return response(['code'=>2,'body'=>'删除品牌失败']);
            }
        }
    }

    /**
     * 编辑品牌
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response|\think\Response|\think\response\View
     * @author totti_zgl
     * @date 2018/3/30 11:06
     */
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
            $logo=$info->logo;
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
                    if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','jpeg','png'])){

                        /*$path = $file->store('uploads/brand/');
                        $info->pic=$path;
                        unlink('uploads/logo/'.$info['logo']);*/

                        $path=$file->store('brand','public');
                        $info->logo=$path;

                    }else{
                        return response(['code'=>2,'body'=>'图片不合法']);
                    }
                }else{
                    return response(['code'=>2,'body'=>$file->getErrorMessage()]);
                }
            }
            if($info->save()){
                //删除原图
                if(file_exists(storage_path('app/public/'.$logo))) {
                    Storage::disk('public')->delete($logo);
                }

                return response()->json(['code'=>2,'body'=>'编辑成功']);
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