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
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <style type="text/css">
        #d1{
            width: 165px;
            height: 30px;
            padding-left: 30px;
        }
        .message{
            float: left;
        }
        .page{
            float: right;
        }
        .page span,.page a{
            display: inline-block;
            width: 30px;
            height: 30px;
            color: #c00;
            text-decoration: none;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
        }
        .page span.current{
            background: blue;
            color: #fff;
        }
        .tablelink1,.tablelink2,.tablelink3{
            color: #056dae;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">活动列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>所需积分</th>
                    <th>兑换U币/商品</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$val)
                    <tr>
                        <td>{{$k+1+$firstRow}}</td>
                        <td class="aname">{{$val['needJF']}}</td>
                        @if($val['status']==0)
                            <td class="aname">{{$val['getUB']}}</td>
                        @else
                            <td style="position: relative;height: 100px;" class="aname">{{$val['getGoods']['goodsname']}}<img style="position: absolute;bottom: 0" width="100" src="{{url('uploads')}}/{{$val['getGoods']['pic']}}" alt=""/></td>
                        @endif
                        <td><a href="{{url('admin/integral_edit',['id'=>$val['id']])}}" class="tablelink1">编辑</a>&nbsp;&nbsp;&nbsp;
                            <a id="{{$val['id']}}" href="javascript:;" class="tablelink2">删除</a>&nbsp;&nbsp;&nbsp;
                            <a id="{{$val['id']}}" href="javascript:;" class="tablelink3">{{$val['zd']?'取消置顶':'置顶'}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                <div class="page">{{$list->links()}}</div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $(function(){
            $('.tablelink2').click(function(){
                var id=$(this).attr('id');
                var a=$(this);
                var token="{{csrf_token()}}";
                layer.confirm('确定删除?',{btn:['确定','取消'],title:'提示'},function(){
                    $.post("{{url('admin/integral_del')}}",{id:id,_token:token},function(res){
                        layer.msg(res.info);
                        a.parents('tr').hide();
                    },'json')
                })
            });
            $('.tablelink3').click(function(){
                var id=$(this).attr('id');
                var a=$(this);
                var token="{{csrf_token()}}";
                $.post("{{url('admin/integral_operate')}}",{id:id,_token:token},function(res){
                    layer.msg(res.info,{icon:6},function(){
                        location.reload();
                    });
                },'json')
            })
        })
    </script>
</div>
</body>
</html>
