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
    <script type="text/javascript" src="{{asset('asset_admin/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <style type="text/css">
        #d15 ,#d16 {
            width: 100px;
            height: 30px;
            padding-right: 30px;
        }
        .tablelist tr{position: relative}
        .pagin{ width: 100%}
        .pagin a,.pagin span{display:inline-block;width: 30px;height:30px;text-decoration: none;text-align: center;line-height: 30px;border: 1px solid #005500 }
        .pagin span{ background: #333; color: #fff; font-weight: bold;}
        .page a:hover{ background: #333;  color:#fff;  }
        .message{
            float: left;
        }
        #page{
            float: right;
        }
        .pagin a.prev,.pagin a.next{
            width: 70px;
        }
        #big{
            width: 40px;
        }
        span.current{
            width: 40px;
        }
    </style>
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
        });
    </script>
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
            <form action="{{url('admin/advertise_index')}}" method="get">
                <ul class="seachform">
                    <li><label>搜索</label>
                        <input name="content" value="{{$content}}" placeholder="请输入有广告内容的关键字" id="d14" type="text" class="scinput" /></li>
                    <li><label>时间</label> <input name="time" value="{{$time?date('Y-m-d',$time):''}}" id="d15" class="Wdate scinput " placeholder="请选择时间范围" type="text"   onFocus="WdatePicker({isShowClear:false,readOnly:true})" />
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                    <li><label>&nbsp;</label><input type="button" class="scbtn oo" value="导出列表"/></li>
                </ul>
            </form>
            <div class="ybfy">
                @if(empty($list))
                    <h1 style="color: red">没有找到相应的数据</h1>
                @else
                    <table class="tablelist">
                        <thead>
                        <tr>
                            <th>序列号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            <th>广告内容</th>
                            <th>图片</th>
                            <th>商城头条标题</th>
                            <th>广告位置</th>
                            <th>广告状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $k=>$vo)
                            <tr>
                                <td >{{$k+1+$firstRow}}</td>
                                <td>{{date('Y-m-d',$vo['addtime'])}}</td>
                                <td >{{date('Y-m-d',$vo['overtime'])}}</td>
                                <td>{{$vo['content']}}</td>
                                <td><img width="100" height="80" src="{{url('uploads')}}/{{$vo['images']}}"></td>
                                <td>{{$vo['title']}}</td>
                                @if($vo['location']==0)
                                    <td>轮播图</td>
                                @elseif($vo['location']==1)
                                    <td>活动图</td>
                                @elseif($vo['location']==2)
                                    <td>商城头条图</td>
                                @else
                                    <td>轮播内容图</td>
                                @endif
                                <td>{{$vo['status']==1?'展示':'下架'}}</td>
                                <td><a href="{{url('admin/advertise_edit',['id'=>$vo['id']])}}" class="tablelink edit">编辑</a>&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:;" id="{{$vo['id']}}" class="tablelink del"> 删除</a>&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:;" id="{{$vo['id']}}" class="tablelink show">{{$vo['status']==1?'下架':'展示'}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                <div class="pagin">
                    <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                    <div id="page">{{$list->appends(['content'=>$content,'time'=>$time])->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        $('.del').live('click',function(){
            var id=$(this).attr('id');
            var token="{{csrf_token()}}";
            layer.confirm('确定删除?',{btn:['确定','取消'],title:'提示'},function(){
                $.post("{{url('admin/advertise_del')}}",{id:id,_token:token},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:5},function(){
                            location="{{url('admin/advertise_index')}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                },'json')
            })
        });
        $('.show').live('click',function(){
            var id=$(this).attr('id');
            var token="{{csrf_token()}}";
            $.post("{{url('admin/advertise_operate')}}",{id:id,_token:token},function(res){
                if(res.code==1){
                    layer.msg(res.info,{icon:6},function(){
                        location="{{url('admin/advertise_index')}}";
                    })
                }else{
                    layer.msg(res.info,{icon:5});
                }
            },'json')
        });
        function search(id) {
            var keywords = $("input[name='content']").val();
            var id = id ? id : 1;
            $.get("{:U('AdminList')}", {"p": id, "keywords": keywords}, function (res) {
                $('.ybfy').html(res);
            })
        }
        $(".oo").click(function(){
            var a=$('#d14').val();
            var b=$('#d15').val();
            if(!a){a='';}
            if(!b){b='';}
            location="{{url('admin/advertise_out')}}/"+a+'/'+b;
        })
    </script>
</div>
</body>
</html>
