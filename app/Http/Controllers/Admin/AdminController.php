<?php
namespace App\Http\Controllers\Admin;

use App\Models\Access;
use App\Models\Admin;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController{
    public function index(Request $request){
        $keywords=$request->input('keywords');
        /*$list=Admin::with('access')->where(function($query) use($keywords){
            $keywords && $query->where('username','like','%'.$keywords.'%');
        })->paginate(10);*/
        $list=Admin::with('access')
            ->when($keywords,function ($query) use ($keywords){
                return $query->where('username','like','%'.$keywords.'%');
            })->paginate(10);
        $firstRow=($list->currentPage()-1)*$list->perPage();
        //return view('admin.admin.index',['list'=>$list,'firstRow'=>$firstRow,'keywords'=>$request->input('keywords')]);
        return view('admin.admin.index',compact('list','firstRow','keywords'));
    }

    public function del(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $row=Admin::find($id)->delete();
            if($row){
                return response(['code'=>1,'body'=>'删除成功']);
            }else{
                return response(['code'=>2,'body'=>'删除失败']);
            }
        }
    }

    public function operate(Request $request){
        if($request->ajax()){
            $id=intval($request->get('id'));
            $info=Admin::find($id);
            $info->status=($info['status']==0)?1:0;
            $row=$info->save();
            if($row){
                return response(['code'=>1,'body'=>'状态更改成功']);
            }else{
                return response(['code'=>2,'body'=>'状态更改失败']);
            }
        }
    }

    public function add(Request $request){
        if($request->isMethod('post')) {
            $data=$request->all();
            $status=1;
            $this->post($data,$status);
        }else{
            $group=Group::where('status',1)->get()->toArray();
            return view('admin.admin.add',['group'=>$group]);
        }
    }

    public function edit(Request $request,$id){
        if ($request->isMethod('post')) {
            if(empty($id)){
                return response(['code'=>2,'info'=>'非法操作']);
            }
            $data=$request->all();
            $file=$data['pic'];
            $status=2;
            $this->post($data,$status);
        } else {
            $info = Admin::where('id', $id)->with('access')->first()->toArray();
            foreach ($info['access'] as $k => $v) {
                $arr[] = $v['group_id'];
            }
            $info['group'] = $arr;
            $group = Group::where('status', 1)->get()->toArray();
            return view('admin.admin.edit', ['info' => $info, 'group' => $group]);
        }
    }

    public function post($data,$status){
        $rules1=['username'=>'required', 'password'=>'required','mail'=>'required'];
        $rules2=['username'=>'required', 'mail'=>'required'];
        if($status==1){
            $validator=Validator::make($data,$rules1);
            if($validator->passes()){
                $info=Admin::where('username',$data['username'])->first();
                if($info){
                    return response(['code'=>2,'info'=>'用户名已存在']);
                }
                $arr['username']=$data['username'];
                $arr['password']=md5($data['password']);
                $arr['mail']=$data['mail'];
                $arr['addtime']=time();
                $admin= new Admin();
                $admin->username=$data['username'];
                $admin->password=md5($data['password']);
                $admin->mail=$data['mail'];
                $admin->addtime=time();
                $row=$admin->save();
                if($row){
                    $id=$admin->id;
                    if(!emptyArray($data['group_id'])){
                        Access::destroy(['uid'=>$id]);
                        foreach($data['group_id'] as $v){
                            $access['group_id']=$v;
                            $access['uid']=$id;
                            $model= new Access();
                            $model->save($access);
                        }
                    }
                    $file=$data['pic'];
                    if($file){
                        $path=$this->uploadPic($file);
                        if($path){
                            $info->pic=$path;
                            $info->save();
                        }else{
                            return response(['code'=>5,'info'=>'图片不合法']);
                        }
                    }
                    return response(['code'=>1,'info'=>'添加成功']);
                }else{
                    return response(['code'=>2,'info'=>'添加失败']);
                }
            }else{
                return response(['code'=>2,'info'=>$validator->messages()]);
            }
        }elseif($status==2){
            $id=$data['id'];
            $validator=Validator::make($data,$rules2);
            if($validator->passes()){
                $info=Admin::find($id);
                if($info['username'] != $data['username']){
                    $user=Admin::where('username',$data['username'])->first();
                    if($user){
                        return response(['code'=>2,'info'=>'用户名已存在']);
                    }
                }
                $info->username=$data['username'];
                if(!empty($data['password'])){
                    if($data['password'] != $data['pwd']){
                        return response(['code'=>2,'info'=>'两次密码输入不一致']);
                    }
                    $info->password=md5($data['password']);
                }
                $info->mail=$data['mail'];
                $row=$info->save();
                if($row){
                    if(!emptyArray($data['group_id'])){
                        Access::destroy(['uid'=>$id]);
                        foreach($data['group_id'] as $v){
                            $access['group_id']=$v;
                            $access['uid']=$id;
                            $model= new Access();
                            $model->save($access);
                        }
                    }
                    $file=$data['pic'];
                    if($file){
                        $path=$this->uploadPic($file);
                        if($path){
                            $info->pic=$path;
                            $info->save();
                        }else{
                            return response(['code'=>5,'info'=>'图片不合法']);
                        }
                    }
                    return response(['code'=>1,'info'=>'编辑成功']);
                }else{
                    return response(['code'=>2,'info'=>'编辑失败']);
                }
            }else{
                return response(['code'=>2,'info'=>$validator->messages()]);
            }
        }
    }

    public function uploadPic($file){
        if($file->isValid()){
            if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','gpeg','png'])){
                $path = $file->store('admin','public');
                return $path;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*public function uploadpic( $filename, $filepath){
        //1.首先检查文件是否存在
        if ($request::hasFile($filename)){
            //2.获取文件
            $file = $request::file($filename);
            //3.其次检查图片手否合法
            if ($file->isValid()){
                //先得到文件后缀,然后将后缀转换成小写,然后看是否在否和图片的数组内
                if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','gpeg','png'])){
                    //4.将文件取一个新的名字
                    $newName = 'img'.time().rand(100000, 999999).$file->getClientOriginalName();
                    //5.移动文件,并修改名字
                    if($file->move($filepath,$newName)){
                        return $filepath.'/'.$newName;   //返回一个地址
                    }else{
                        return 4;
                    }
                }else{
                    return 3;
                }

            }else{
                return 2;
            }
        }else{
            return 1;
        }
    }*/


    /*public function index(){
        $where['id']=session('aid');
        $admin=M('Admin');
        $info=$admin->where($where)->find();
        $version=M()->query("select version() as version");
        $this->assign('info',$info);
        $this->assign('version',$version);
        $this->display('main');
    }
    public function checkUsername(){
        $admin = D('Admin');
        if(IS_AJAX){
            $where['username']=I('post.username');
            if($admin->where($where)->find()){
                echo'false';
            }else{
                echo'true';
            }
        }
    }

    public function add()
    {
        if(IS_AJAX) {
            $admin = M('Admin');
            if ($data=$admin->create()) {
                $data['username'] = trim($data['username']);
                $data['addtime']=time();
                $data['lasttime']=time();
                $data['password']=md5(trim(I('post.password')));
                $data['ip'] = $_SERVER['REMOTE_ADDR'];
                $data['mail']=$_POST['mail'];
                if($_FILES){
                    $upload=A('Common')->uploadPic();
                    $data['pic']=$upload[0]['savepath'].$upload[0]['savename'];
                }
                $aid=$admin->add($data);
                if($aid){
                    session('lastAid', $aid);
                    //插入AuthGroup表
                    $data1['uid']=$aid;
                    foreach(I('post.group_id') as $v){
                        $data1['group_id']=$v;
                        M('AuthGroupAccess')->add($data1);
                    }
                    $this->success('管理员添加成功');
                }else{
                    $this->error('管理员添加失败');
                }
            } else {
                $this->error($admin->getError());
            }
        }else{
            //查询组列表
            $group=M('Auth_group')->select();
            $this->assign('groupList',$group);
            $this->display('add');
        }
    }
    public function uploadAdminPic(){
        $common=A('Common');
        $info=$common->uploadPic();

        if(is_array($info)){
            $where['id']=session('lastAid');
            $data['pic']=$info['file']['savepath'].$info['file']['savename'];
            M('Admin')->where($where)->save($data);
        }else{
            $this->error($info);
        }
    }

    public function adminlist()
    {
        $where=array();
        //搜索框
        if(I('get.username')){
            $where['username']=array('like',"%".I('get.username')."%");
        }
        $admin = M('Admin');
        $count = $admin->where($where)->count();
        $limitRows=5;
        $page = new \Org\Yh\AjaxPage($count, $limitRows,"search");
        $page->setConfig('prev', '上页');
        $page->setConfig('next', '下页');
        $show = $page->show();
        $list = $admin->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($list as $k=>$v){
            $groupStr='';
            //获取所在组信息
            $where['_string']='g.id=c.group_id';
            $where['c.uid']=$v['id'];
            $group=M()->table('yhyg_auth_group g,yhyg_auth_group_access c')->where($where)->select();
            foreach($group as $v1){
                $groupStr.=$v1['title'].',';
            }
            $list[$k]['group']=substr($groupStr,0,-1);
        }
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->assign('list', $list);
        $this->assign('count', $count);
        $this->assign('firstRow', $page->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('AdminList');
        }

    }

    public function edit()
    {
        $where['username'] = $_POST['username'];
        $admin = D('Admin');
        $status=$admin->field('status')->where($where)->find();
        if($status['status']=='0'){
            $data['status']='1';
        }else{
            $data['status']='0';
        }
        if ($admin->where($where)->save($data)) {
            if($status['status']=='0'){
                $this->success('恢复成功');
            }else{
                $this->success('冻结成功');
            }
        }else{
            $this->error('操作失败');
        }

    }
    public function change(){
        $admin=M('Admin');
        if(IS_AJAX){
            if($data=$admin->create()){
                $data['username']=I('post.username');
                $data['password']=md5(I('post.password'));
                $data['mail']=I('post.mail');
                if($admin->field('username,password,mail')->where(array('id'=>I('post.iid')))->save($data)){
                    if($_FILES){
                        $upload=A('Common')->uploadPic();
                        $data['pic']=$upload[0]['savepath'].$upload[0]['savename'];
                        if ($admin->where(array('id'=>I('post.iid')))->field('pic')->save($data)) {
                        } else {
                            $this->error('头像更新失败');
                        }
                    }
                    //插入AuthGroup表
                    $data1['uid']=I('post.iid');
                    //删除原来的
                    M('AuthGroupAccess')->where(array('uid'=>I('post.iid')))->delete();
                    foreach(I('post.group_id') as $v){
                        $data1['group_id']=$v;
                        M('AuthGroupAccess')->add($data1);
                    }
                    $this->success('修改成功');
                }else{
                    $this->error($admin->getError());
                }
            }else{
                $this->error($admin->getError());
            }
        }else{
            $aid=I('get.id');
            $info=M('Admin')->where(array('id'=>$aid))->find();
            //查询组列表
            $where['_string']='g.id=c.group_id';
            $where['c.uid']=$aid;
            $group=M()->table('yhyg_auth_group g,yhyg_auth_group_access c')->field('g.title,g.id')->where($where)->select();
            $this->assign('groupList',$group);
            $this->assign('info',$info);
            $this->display();
        }
    }
    public  function del(){
        $where['username']=$_POST['username'];
        $admin=M('Admin');
        $num=$admin->where($where)->delete();
        if($num>0){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function chekforgetPassword()
    {
        $username = I('post.username');
        if (M('Admin')->where(array('username' => $username))->find()) {
            if (IS_POST) {
                $admin = M('Admin');
                $where['id'] = session('aid');
                $where['password'] = md5(I('post.password'));
                $info = $admin->where($where)->select();
                if ($info) {
                    $data = md5(I('post.password'));
                    $status = $admin->where($where)->setField('password', $data);
                    if ($status) {
                        //清除缓存
                        S('adminCount',null);
                        S('adminList',null);
                        echo "修改密码成功！";
                    } else {
                        echo '修改密码失败';
                    }
                } else {
                    echo '原密码没通过验证！';
                }
            } else {
                $this->display('forgetPassword');
            }
        } else {
            echo 'false';
        }
    }*/
}