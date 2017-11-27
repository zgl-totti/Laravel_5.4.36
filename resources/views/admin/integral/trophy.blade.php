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
        .tablelink1,.tablelink2{
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
                    <th>奖项名称</th>
                    <th>奖品</th>
                    <th>中奖率</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$val)
                    <tr>
                        <td>{{$k+1+$firstRow}}</td>
                        <td>{{$val['prize']}}</td>
                        @if($val['lx']==2)
                            <td>{{$val['num']}}U币</td>
                        @elseif($val['lx']==1)
                            <td>{{$val['num']}}积分</td>
                        @else
                            <td>无</td>
                        @endif
                        <td>{{round($val['v']/$count*100,2)}}%</td>
                        <td>
                            <a href="{{url('admin/integral_trophy_edit',['id'=>$val['id']])}}" class="tablelink1">编辑</a>&nbsp;&nbsp;&nbsp;
                            <a class="tablelink1 del" id="{{$val['id']}}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $(function(){
            $('.del').click(function(){
                var id=$(this).attr('id');
                var token="{{csrf_token()}}";
                $.post("{{url('admin/integral_trophy_del')}}",{id:id,_token:token},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6},function () {
                            location="{{url('admin/integral_trophy')}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                },'json')
            })
        })
    </script>
</div>
</body>
</html>
