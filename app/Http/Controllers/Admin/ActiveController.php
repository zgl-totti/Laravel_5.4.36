<?php
namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActiveController extends BaseController{
    public function index(Request $request){
        $activityname=trim($request->input('activityname'));
        $brandname=trim($request->input('brand'));
        $time=strtotime(trim($request->input('time')));
        $list=Activity::where(function ($query) use ($activityname,$brandname,$time){
            $activityname && $query->where('activityname','like',$activityname.'%');
            $brandname && $query->where('brand',$brandname);
            $time && $query->where('starttime','<=',$time);
        })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        $brand=Brand::where('hidden',1)->get();
        return view('admin.active.index',compact('list','firstRow','activityname','brand','brandname','time'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $post=$request->all();
            $res=$this->post($post);
            return response()->json($res);
        }else{
            $brand=Brand::where('hidden',1)->get();
            return view('admin.active.add',compact('brand'));
        }
    }

    public function edit($id){
        $id=intval($id);
        $info=Activity::where('id',$id)->with('pic')->first();
        $brand=Brand::where('hidden',1)->get();
        return view('admin.active.edit',compact('info','brand'));
    }

    public function del(){
        if(\request()->ajax()){
            $id=intval(\request()->input('id'));
            $row=Activity::find($id)->delete();
            if(empty($row)){
                $result['code']=5;
                $result['info']='删除失败！';
                return response()->json($result);
            }else{
                $result['code']=1;
                $result['info']='删除成功！';
                return response()->json($result);
            }
        }
    }

    private function post($data){
        $validator=Validator::make($data,Activity::$rules,Activity::$messages,Activity::$attributeNames);
        if($validator->passes()){





        }else{
            $result['code']=500;
            $result['info']='必填项不能为空！';
            return $result;
        }
    }




























    public function ActiveList(){
            $brand=M('Brand');
            $brandlist=$brand->field('brandname')->select();
            if(I('get.activityname')){
                $where['activityname']=array('like',"%".I('get.activityname')."%");
            }
            if(I('get.time')){
                $where['starttime']=array('elt',strtotime(I('get.time')));
                $where['stoptime']=array('egt',strtotime(I('get.time')));
            }
            if(I('get.brand')&&I('get.brand')!='全部'){
                $where['brand']=I('get.brand');
            }
            $count=M('activity')->where($where)->count();// 查询满足要求的总记录数
            $Page= new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show= $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $activitylist = M('activity')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('brandlist',$brandlist);
            $this->assign('activitylist',$activitylist);
            $this->assign('count',$count);
            $this->assign('page',$show);
            $this->assign('firstRow',$Page->firstRow);
            $this->assign('empty',"<h1 style='height: 30px;margin-bottom: 30px'>没有找到相关活动！</h1>");
            $this->display();
    }

    public function add_(){
        $active=D('Activity');
        if(IS_AJAX){
            if($date=$active->create()){
                $date['starttime']=strtotime("{$date['starttime']}");
                $date['stoptime']=strtotime("{$date['stoptime']}");
                $date['addtime']=time();
                $upload=$this->upload();
                    if($upload){
                        $date['img']='/Public/Uploads/'.$upload['image']['savepath'].$upload['image']['savename'];
                        $id=$active->addactivity($date);
                        if($id){
                            session('lastAid',$id);
                            $this->success('添加成功');
                        }else{
                            $this->error('添加失败');
                        }
                }else{
                    $this->error('添加失败1');
                }
            }else{
                $this->error($active->getError());
            }

        }else{
            $brand=M('Brand');
            $list=$brand->field('brandname')->select();
            $this->assign('list',$list);
            $this->display();
        }
    }

    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     99999999 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      'Public/Uploads/'; // 设置附件上传根目录
        if(!file_exists('Public/Uploads/')){
            mkdir('Public/Uploads/');
        }
        // 上传单个文件
        $info   =   $upload->upload();
        if($info){
            return $info;
        }else{
            return $upload->geterror();
        }

    }

    public function del_(){
        $where['activityname']=$_POST['activityname'];
        $status=M('Activity')->where($where)->delete();
        if($status){
            $this->success('删除成功');
        }
        else{
            $this->error('删除失败');
        }
    }

    public function edit_()
    {
        $active = M('Activity');
        if (IS_AJAX) {
            if ($data = $active->create()) {
                $data['starttime'] = strtotime("{$data['starttime']}");
                $data['stoptime'] = strtotime("{$data['stoptime']}");
                $data['addtime']=time();
                //更新活动信息
//                print_r($data);
//                exit;
                if ($active->field('activityname,brand,starttime,stoptime,content')->where(array('id'=>I('post.iid')))->save($data)) {
                    //更新图片
//                    print_r($a);
//                    exit;
                    if ($_FILES) {
                        $upload = $this->upload();
                        foreach ($upload as $key => $v) {
                            if ($key == 0) {
                                //更新主图
                                $data['img']='/Public/Uploads/'.$v['savepath'].$v['savename'];
                                if ($active->where(array('id'=>I('post.iid')))->field('img')->save($data)) {

                                } else {
                                    $this->error('主图更新失败');
                                }
                            } else {
                                //更新副图
                                $data1['pic'] = '/Public/Uploads/'.$v['savepath'].$v['savename'];
                                M('Activity_pic')->where(array('id'=>$key))->save($data1);
                            }
                        }
                    }
                    $this->success('活动更新成功');
                } else {
                    $this->error($active->getError());
                }
            }else{
                $this->error($active->getError());
            }
        } else {
            $brand = M('Brand');
            $list = $brand->field('brandname')->select();
            $where['id'] = I('get.id');
            $info = M('Activity')->where($where)->find();
            $info['content'] = html_entity_decode($info['content']);
            //获取活动副图信息
            $pic = M('Activity_pic')->where(array('aid' => $info['id']))->select();
            $this->assign('list', $list);
            $this->assign('info', $info);
            $this->assign('pic', $pic);
            $this->display();
        }
    }

    //上传副图
    public function uploadActivityPic(){
        $info=$this->upload();
        if(is_array($info)){
            //获取图片文件路径
            $filename='./Uploads/'.$info['file']['savepath'].$info['file']['savename'];
            $data['aid']=session('lastAid');
            $data['pic']='/Public/Uploads/'.$info['file']['savepath'].$info['file']['savename'];

            M('Activity_pic')->add($data);
        }else{
            $this->error($info);
        }
    }
}