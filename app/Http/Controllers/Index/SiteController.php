<?php
namespace App\Http\Controllers\Index;

use App\Models\Member;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends BaseController{
    public function index(Request $request){
        if ($request->ajax()) {


        } else {
            $mid=$request->session()->get('mid');
            $info=Member::find($mid);
            return view('index.site.index',compact('info'));
        }
    }

    public function edit(Request $request){
        if($request->ajax()){




        }else{
            $mid=$request->session()->get('mid');
            $info=Member::find($mid);
            $id=$request->input('id');
            $site=Site::find($id);
            return view('index.site.edit',compact('info','site'));
        }
    }
















































    public function index_(){
        if (IS_AJAX) {
            $site1 = M('Site');
            $mid['mid'] = session('mid');
            $count = $site1->where($mid)->count();
            if ($count > 10) {
                $this->error('最多保存10个地址');
            }
            $site = D('Site');
            $site_copy = D('Site_copy');
            $data = $site->create();
            if ($data) {
                $data['username'] = trim($data['username']);
                $data['phone'] = trim($data['phone']);
                $data['addtime'] = time();
                $data['mid'] = session('mid');
                $data0['mid'] = session('mid');
                $a = $site->where($data0)->select();
                if ($a) {
                    $data['active'] = 0;
                } else {
                    $data['active'] = 1;
                }
                $sid = $site->site($data);
                if ($sid) {
                    $site_copy->field('username,phone,ps,qs,ws,xyd,mid,addtime,active')->add($data);
                    $this->success('地址保存成功');
                } else {
                    $this->error('地址保存失败');
                }
            } else {
                $this->error($site->getError());
            }
        } else {
            $site1 = M('Site');
            $site1->execute('set names utf8');
            $data['mid'] = session('mid');
            $data = $site1->where($data)->order('active desc,addtime desc')->select();
            if ($data) {
                $this->assign('data', $data);
                $this->display('Site/site');
            } else {
                $this->display('Site/site');
            }

        }
    }

    public function def_()
    {
        if (IS_AJAX) {
            $uplode = M('Site');
            $data['id'] = I('get.active');
            $data1['mid'] = session('mid');
            $data1['active'] = 1;
            $uplode->where($data1)->setField('active', "0");
            $suc = $uplode->where($data)->setField('active', "1");
            if ($suc) {
                $this->success('设置成功');

            } else {
                $this->error('设置失败');
            }
        } else {
            $this->display('Site/site');
        }
    }

    public function del_()
    {
        // dump(I('get.name'));
        if (IS_AJAX) {
            $del = M('Site');
            $where['id'] = I('get.id');
            $active = $del->where($where)->getField('active');
            if ($active == 1) {
                $de = $del->where($where)->delete();
                $mid['mid'] = session('mid');
                $del->where($mid)->order('addtime')->limit(1)->setField('active', '1');
            } else {
                $de = $del->where($where)->delete();
            }
            if ($de) {
                $this->success('地址删除成功');
            } else {
                $this->error('地址删除失败');
            }
        } else {
            $this->display('Site/site');
        }
    }

    public function alte_()
    {
        $uplode = M('Site');
        $data['id'] = I('get.id');
        $show = $uplode->where($data)->find();
        $this->assign('show', $show);
        $this->display('Site/alter');
    }

    public function index1_(){
        if(IS_AJAX){
            $data1['id']=I('post.mmid');
            $site=D('Site');
            $data=$site->create();
            if($data){
                $data['username']=trim($data['username']);
                $data['phone']=trim($data['phone']);
                $data['addtime']=time();
                $data['mid']=session('mid');
                $sid=$site->site1($data1,$data);
                if($sid){
                    $this->success('地址修改成功');
                }else{
                    $this->error('地址修改失败');
                }
            }else{
                $this->error($site->getError());
            }
        }else {
            $this->display('Site/site');
        }
    }
}

