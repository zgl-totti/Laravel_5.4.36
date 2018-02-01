<?php
namespace App\Http\Controllers\Index;


use App\Models\Comment;
use App\Models\Goods;
use Illuminate\Http\Request;

class CommentController extends BaseController{
    public function __construct(){
        $this->middleware('member');
    }

    public function index($oid,$gid){
        $oid=intval($oid);
        $gid=intval($gid);
        $info=Goods::find($gid);
        $list=Comment::where('gid',$gid)
            ->with(['member','goods','order','status'])
            ->paginate(5);
        $num['num1']=Comment::where('sid',1)->where('gid',$gid)->count();
        $num['num2']=Comment::where('sid',2)->where('gid',$gid)->count();
        $num['num3']=Comment::where('sid',3)->where('gid',$gid)->count();
        return view('index.comment.index',compact('info','list','num','oid','gid'));
    }

    public function comment(Request $request){
        $mid=$request->session()->get('mid');
        $oid=intval($request->input('oid'));
        $gid=intval($request->input('gid'));
        $content=$request->input('content');
        $sunphoto=$request->input('sunphoto');
        if($sunphoto=='好评'){
            $sid=1;
        }elseif ($sunphoto=='中评'){
            $sid=2;
        }elseif ($sunphoto=='差评'){
            $sid=3;
        }else{
            $sid=0;
        }
        if(empty($oid) || empty($gid)){
            $res['status']=5;
            $res['info']='无效操作！';
            return response()->json($res);
        }
        if(empty($content)){
            $res['status']=5;
            $res['info']='评论内容不能为空！';
            return response()->json($res);
        }
        $comment= new Comment();
        $comment->mid=$mid;
        $comment->content=$content;
        $comment->edittime=time();
        $comment->gid=$gid;
        $comment->sid=$sid;
        $comment->oid=$oid;
        if($comment->save()){
            if($request->hasFile('image')){
                $file=$request->file('image');
                if($file->isValid()){
                    if(in_array( strtolower($file->extension()),['jpeg','jpg','gif','jpeg','png'])){
                        $path = $file->store('uploads/comment/');
                        $comment->photo=$path;
                        if($comment->save()){
                            $res['status']=5;
                            $res['info']='提交评价失败！';
                            return response()->json($res);
                        }else{
                            $res['status'] = 1;
                            $res['info'] = '评价成功！';
                            return response()->json($res);
                        }
                    }else{
                        return response(['code'=>2,'body'=>'图片不合法']);
                    }
                }else{
                    $res['status'] = 1;
                    $res['info'] = $file->getErrorMessage();
                    return response()->json($res);
                }
            }else {
                $res['status'] = 1;
                $res['info'] = '评论成功！';
                return response()->json($res);
            }
        }else{
            $res['status']=5;
            $res['info']='提交评价失败！';
            return response()->json($res);
        }
    }

    public function reviews(Request $request){
        $mid=$request->session()->get('mid');
        $list=Comment::where('mid',$mid)
            ->with(['goods','status'])
            ->join('order_goods as og','og.oid','=','comment.oid')
            ->paginate(10);
        return view('index.comment.reviews',compact('list'));
    }
}