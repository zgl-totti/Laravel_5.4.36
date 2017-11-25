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
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
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
        h1{
            position: absolute;
            top:200px;
            left: 500px;
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
            <form action="{{url('admin/active_index')}}" id="form1" method="get">
                <ul class="seachform">
                    <li><label>活动名称</label><input name="activityname" value="{{$activityname}}" type="text" class="scinput" /></li>
                    <li><label>品牌</label>
                        <div class="vocation">
                            <select name="brand" class="select3">
                                <option>全部</option>
                                @foreach($brand as $val)
                                    <option value="{{$val->brandname}}" {{$val['brandname']==$brandname?'selected':''}}>{{$val->brandname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li><label>活动时间</label>
                        <input class="Wdate" name="time" type="text" id="d1" value="{{$time?date('Y-m-d',$time):''}}" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>
                    </li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>活动名称</th>
                    <th>活动内容</th>
                    <th>活动logo</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$val)
                    <tr>
                        <td>{{$k+1+$firstRow}}</td>
                        <td class="aname">{{$val['activityname']}}</td>
                        <td>{{$val['content']}}</td>
                        <td><img width="70" src="{{url('uploads')}}/{{$val['img']}}" alt=""/></td>
                        <td>{{date('Y-m-d',$val['starttime'])}}</td>
                        <td>{{date('Y-m-d',$val['stoptime'])}}</td>
                        <td><a href="{{url('admin/active_edit',['id'=>$val['id']])}}" class="tablelink1">编辑</a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" id="{{$val['id']}}" class="tablelink2">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页
                </div>
                <div class="page">{{$list->links()}}</div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        $('.tablelink2').click(function(){
            //data='activityname='+$(this).parent().siblings('.aname').text();
            var id=$(this).attr('id');
            var token="{{csrf_token()}}";
            layer.confirm('确定删除?',{btn:['确定','取消'],title:'提示'},function(){
                $.post("{{url('admin/active_del')}}",{id:id,_token:token},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6},function(){
                            location='{:U("ActiveList")}';
                        });
                    }else{
                        layer.msg(res.info);
                    }
                },'json')
            })
        })
    </script>
</div>
</body>
</html>
