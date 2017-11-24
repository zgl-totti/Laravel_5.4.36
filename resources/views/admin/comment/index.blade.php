<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <!--分页样式-->
    <style type="text/css">
        .paginList a, .paginList span{display: inline-block;width:18px;height:18px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 18px;background: #cccccc;  color:#000000;  border: 1px solid #c2d2d7;border-radius: 5px  }
        .paginList a:hover{background: #666666;color:#fff;  }
        .paginList span{background: #666666;color: #fff;font-weight: bold;}
        #ordersyn_num,#goodsname_num:focus{
            outline: none;
        }
    </style>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
            $('#Warncomment').click(function(){
                $.post("{:U('index')}",function(res){
                    if(res){
                        layer.msg(res,{
                            time:1000
                        });
                    }
                })

            })
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="{{url('admin/comment_index')}}">评价管理</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/comment_index')}}" method="get" id="CommentForm">
                <ul class="seachform">
                    <li><label>订单号</label><input id="ordersyn_num" name="ordersyn" value="{{$ordersyn}}" type="text" class="scinput" placeholder="请输入商品订单号！！" /></li>
                    <li><label>商品名称</label>
                        <input id="goodsname_num" type="text" name="goodsname" value="{{$goodsname}}" class="scinput" placeholder="请输入商品名"/>
                    </li>
                    <li><label>评价状态</label>
                        <div class="vocation">
                            <select class="select3" name="status">
                                <option value="0">请选择</option>
                                <option value="1" {{$status==1?'selected':''}}>好评</option>
                                <option value="2" {{$status==2?'selected':''}}>中评</option>
                                <option value="3" {{$status==3?'selected':''}}>差评</option>
                            </select>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <!--<th><input name="" type="checkbox" value=""/></th>-->
                    <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>商品图片</th>
                    <th>商品名称</th>
                    <th>订单号</th>
                    <th>会 员</th>
                    <th>评论状态</th>
                    <th>评价时间</th>
                    <th>操 作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$v)
                    <tr style="height:80px;">
                        <!--<td><input name="" type="checkbox" value="" /></td>-->
                        <td>{{$k+1+$firstRow}}</td>
                        <td><img src="{{url('uploads')}}/{{mb_substr($v['goods']['pic'],0,11)}}thumb100_{{mb_substr($v['goods']['pic'],11)}}" style="width: 80px;height: 80px;"/></td>
                        <td>{{$v['goods']['goodsname']}}</td>
                        <td>{{$v['order']['ordersyn']}}</td>
                        <td>{{$v['member']['username']}}</td>
                        <td>{{$v['status']['statusname']}}</td>
                        <td>{{date('Y-m-d H:i:s',$v['edittime'])}}</td>
                        <td>
                            @if(!empty($v['response']))
                                <a href="{{url('admin/comment_comment',['id'=>$v['id']])}}" class="tablelink">查看评价</a>
                            @elseif(empty($v['response']) && $v['sid']!=0)
                                <a href="{{url('admin/comment_response',['id'=>$v['id']])}}" class="tablelink">去回复</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                <div class="paginList">{{$list->appends(['ordersyn'=>$ordersyn,'goodsname'=>$goodsname,'status'=>$status])->links()}}</div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</div>
</body>
</html>
