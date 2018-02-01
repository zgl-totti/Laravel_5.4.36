<?php
namespace App\Http\Controllers\Index;

use App\Models\Letter;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MemberController extends BaseController {
    public function __construct(){
        $this->middleware('member');
    }

    public function index(Request $request){
        $mid=$request->session()->get('mid');
        $letter=Letter::where('mid',$mid)->where('status',0)->count();
        $num1=Order::where('id',$mid)->where('orderstatus',1)->count();
        $num2=Order::where('id',$mid)->where('orderstatus',2)->count();
        $num3=Order::where('id',$mid)->where('orderstatus',3)->count();
        $num4=Order::where('id',$mid)->where('orderstatus',4)->count();
        return view('index.member.index',compact('letter','num1','num2','num3','num4'));
    }

    public function show(){
        return view('index.member.information');
    }

    public function changeInfo(Request $request){
        if($request->isMethod('post')){
            $mid=$request->input('mid');
            $info=Member::find($mid);
            $avator=$info->touxiang;
            $data['name']=trim($request->input('name'));
            $data['sex']=trim($request->input('sex'));
            $data['birthday']=$request->input('birthday');
            $data['mobile']=$request->input('mobile');
            $data['email']=$request->input('email');
            $rules=[
                'name'=>'required',
                'sex'=>'required',
                'birthday'=>'required',
                'mobile'=>'required',
                'email'=>'required|email',
            ];
            $messages=[
                'required'=>':attribute不能为空！',
                'email'=>'邮箱格式不正确！',
            ];
            $attributeNames=[
                'name'=>'用户名',
                'sex'=>'性别',
                'birthday'=>'生日',
                'mobile'=>'手机号',
                'email'=>'邮箱'
            ];
            $validator=Validator::make($data,$rules,$messages,$attributeNames);
            if($validator->passes()){
                $info->name=$data['name'];
                $info->sex=$data['sex'];
                $info->birthday=$data['birthday'];
                $info->mobile=$data['mobile'];
                $info->email=$data['email'];
                if($info->save()){
                    if($request->hasFile('file')){
                        $file=$request->file('file');
                        if($file->isValid()){
                            if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','jpeg','png'])){
                                $path = $file->store('uploads/member/');
                                $info->touxiang=$path;
                                if($info->save()){
                                    unlink('uploads/member/'.$avator);
                                    $res['status']=1;
                                    $res['info']='修改成功！';
                                    return response()->json($res);
                                }else{
                                    $res['status']=2;
                                    $res['info']='修改失败！';
                                    return response()->json($res);
                                }
                            }else{
                                return response(['status'=>2,'info'=>'图片不合法']);
                            }
                        }else{
                            return response(['status'=>2,'info'=>$file->getErrorMessage()]);
                        }
                    }else{
                        $res['status']=1;
                        $res['info']='修改成功！';
                        return response()->json($res);
                    }
                }else{
                    $res['status']=5;
                    $res['info']='修改失败！';
                    return response()->json($res);
                }
            }else{
                $res['status']=5;
                $res['info']=$validator->getMessage();
                return response()->json($res);
            }
        }else{
            return view('index.member.addinfo');
        }
    }

    public function safety(Request $request){
        $mid=$request->session()->get('mid');
        $info=Member::find($mid);
        return view('index.member.safety',compact('info'));
    }

    public function setPay(Request $request){
        if($request->ajax()){




        }else {
            return view('index.member.set_pay');
        }
    }

    public function changePay(Request $request){
        if($request->ajax()){



        }else{
            return view('index.member.change_pay');
        }
    }

    public function changePwd(Request $request){
        if($request->ajax()){
            $password=$request->input('password');
            $pwd=$request->input('pwd');
            $repwd=$request->input('repwd');
            if(empty($password) || empty($pwd) || empty($repwd)){
                $res['status']=5;
                $res['info']='必填项不能为空！';
                return response()->json($res);
            }
            if($pwd != $repwd){
                $res['status']=5;
                $res['info']='两次密码输入不一致！';
                return response()->json($res);
            }
            $mid=$request->session()->get('mid');
            $info=Member::find($mid);
            if(md5($password) != $info['password']){
                $res['status']=5;
                $res['info']='原始密码错误！';
                return response()->json($res);
            }
            $info->password=md5($pwd);
            if($info->save()){
                $res['status']=1;
                $res['info']='修改成功！';
                return response()->json($res);
            }else{
                $res['status']=5;
                $res['info']='修改失败！';
                return response()->json($res);
            }
        }else{
            return view('index.member.change_pwd');
        }
    }




































































    public function index_(){
        $nums=A('Common')->getcartnum();
        $this->assign('cartnum',$nums);
        //获取头像信息
        $img=A('Common')->showImg();
        $this->assign('img',$img);
        $goods=M('Goods')->order('addtime desc')->limit(0,2)->select();
        $this->assign('goods',$goods);
        //获取用户信息
        $info=M('Member')->where(array('id'=>session('mid')))->find();
//        {$info?$info['touxiang']:$info['__STATIC__/images/for.jpg']};
        $this->assign('info',$info);
        //待付款
        $order=M('Order');
        $data['mid']=session('mid');
        $data['orderstatus']=1;
        $count1=$order->where($data)->field('orderstatus')->count();
        $this->assign('count1',$count1);
        //待发货
        $data2['mid']=session('mid');
        $data2['orderstatus']=2;
        $count2=$order->where($data2)->field('orderstatus')->count();
        $this->assign('count2',$count2);
        //待收货
        $data3['mid']=session('mid');
        $data3['orderstatus']=3;
        $count3=$order->where($data3)->field('orderstatus')->count();
        $this->assign('count3',$count3);

        //待评价数量
        $where['_string']="o.id=og.oid and o.orderstatus=os.id";
        $where['o.mid']=session('mid');
        $where['o.orderstatus']=4;
        $count=M()->table('yhyg_order o,yhyg_order_goods og,yhyg_order_status os')->field('gid,buynum')->where($where)->count();
        $this->assign('count',$count);
        //获取未读消息数
        $whereL['mid']=array('in','0,'.I('session.mid'));
        $whereL['status']=0;
        $noSee=M('Letter')->where($whereL)->count();
        $this->assign('noSee',$noSee);
        $this->display();
    }

}
