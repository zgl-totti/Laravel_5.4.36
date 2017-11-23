<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/layer/layer.js')}}"></script>
    <style type="text/css">
        .message{float:left;}
        #page{float: right;}
        #page a,#page span{display: inline-block;width: 30px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ccc;}
        .current{background: #808080;color: #fff;}
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/member_index')}}" id="form2" method="get">
                <ul class="seachform">
                    <li><label>用户名</label><input name="username" type="text" class="scinput" value="{{$username}}"/></li>
                    <li><input type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <!--<th><input name="" type="checkbox" value="" checked="checked"/></th>-->
                    <th>id<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>用户名</th>
                    <th>图像</th>
                    <th>注册时间</th>
                    <th>手机号</th>
                    <th>消费金额</th>
                    <th>会员状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$vo)
                    <tr>
                        <!--<td><input name="" type="checkbox" value="" /></td>-->
                        <td>{{$k+1+$firstRow}}</td>
                        <td class="username">{{$vo->username}}</td>
                        <td>
                            @if($vo['touxiang'] && file_exists($vo['touxiang']))
                                <img src="{{$vo['touxiang']}}" style="border-radius: 999px;width: 60px"/>
                            @else
                                <img src="{{asset('asset_index/images/get.jpg')}}" style="border-radius: 999px;width: 60px"/>
                            @endif
                        </td>
                        <td>{{date('Y-m-d H:i:s',$vo['addtime'])}}</td>
                        <td>{{$vo->mobile}}</td>
                        <td>{{$vo->expense}}</td>
                        <td>{{$vo['active']?'正常':'禁用'}}</td>
                        <td><a href="javascript:;" class="tablelink dj" id="{{$vo['id']}}">{{$vo['active']?'禁用':'恢复'}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" class="tablelink del" id="{{$vo['id']}}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                <div id="page">{{$list->appends(['username'=>$username])->links()}}</div>
            </div>
        </div>
    </div>

    <!--------------禁用激活--------------->
    <script type="text/javascript">
        $(function(){
            $('.tablelist tbody tr:odd').addClass('odd');
            $('.dj').click(function(){
                //data =$(this).parent().siblings('.username').text();
                var id=$(this).attr('id');
                var token="{{csrf_token()}}";
                $.post("{{url('admin/member_operate')}}",{id:id,_token:token},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:500},function(){
                            location="{{url('admin/member_index')}}";
                        })
                    }else{
                        layer.alert(res.info,{icon:5});
                    }
                },'json')
            })
            
            $('.del').click(function() {
                //data =$(this).parent().siblings('.username').text();
                var id=$(this).attr('id');
                var token="{{csrf_token()}}";
                layer.confirm('您确定删除吗？',{icon: 1,btn: ['确定', '取消'], title: '提示'}, function(){
                    $.post("{{url('admin/member_del')}}",{id:id,_token:token}, function (res) {
                        if (res.code == 1) {
                            layer.msg(res.info, {icon: 1, time: 500}, function () {
                                location="{{url('admin/member_index')}}";
                            })
                        }else{
                            layer.alert(res.info,{icon:5});
                        }
                    },'json')
                })
            })
        })
    </script>
</div>
</body>
</html>
