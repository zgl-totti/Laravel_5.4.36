<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/editor/kindeditor.js')}}"></script>

    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width: 345
            });
            $(".select2").uedSelect({
                width: 167
            });
            $(".select3").uedSelect({
                width: 100
            });
            $(".one").click(function () {
                var id = $(this).attr("i");
                var token="{{csrf_token()}}";
                layer.confirm("确定要执行该操作吗",function(){
                    $.post("{{url('admin/category_operate')}}",{id:id,_token:token},function (res) {
                        if(res.code==1){
                            layer.msg(res.body,{icon:6,time:1200},function(){
                                location="{{url('admin/category_index')}}";
                            });
                        }else{
                            layer.msg(res.body,{icon:5});
                        }
                    },'json')
                });
            });
            $(".two").click(function(){
                var id = $(this).attr("i");
                var token="{{csrf_token()}}";
                layer.confirm("确定要删除吗",function(){
                    $.post("{{url('admin/category_del')}}",{id:id,_token:token},function(res){
                        if(res.code==1){
                            layer.msg(res.body,{icon:6,time:1200},function(){
                                location="{{url('admin/category_index')}}";
                            })
                        }else{
                            layer.msg(res.body,{icon:5});
                        }
                    },'json')
                });
            });
        })
    </script>
    <style>
        .message{float:left;}
        #page{float: right;}
        #page a,#page span{display: inline-block;width: 30px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ccc;}
        .current{background: #808080;color: #fff;  }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">分类管理</a></li>
        <li><a href="#">分类列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/category_index')}}" id="form2" method="get">
                <ul class="seachform">
                    <li><label>分类名称</label><input name="keywords" value="{{$keywords}}" placeholder="请输入分类名称" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询分类"/></li>
                </ul>
            </form>
            @if($list)
                <table class="tablelist">
                    <thead>
                    <tr>
                        <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                        <th>分类名称</th>
                        <th>分类id</th>
                        <th>分类父id</th>
                        <th>上级分类</th>
                        <th>是否展示</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr>
                            <td>{{$k+1+$firstRow}}</td>
                            <td>{{$val['categoryname']}}</td>
                            <td>{{$val->id}}</td>
                            <td>{{$val->pid}}</td>
                            <td>{{substr($val->path,0,-1)}}{{--{substr($pathname2[$k+$firstRow-1]['path'],0,-2)}--}}</td>
                            <td>
                                @if($val['status']==1)
                                    <span style="color: green">展示</span>
                                @else
                                    <span style="color: red">下架</span>
                                @endif
                            </td>
                            <td>
                                <a style="cursor: pointer" i="{{$val['id']}}" class="tablelink one">{{$val['status']==1?"下架":"上架"}}</a>&nbsp;&nbsp;&nbsp;
                                <a style="cursor: pointer" i="{{$val['id']}}" class="tablelink two">删除</a>&nbsp;&nbsp;&nbsp;
                                <a href="{{url('admin/category_edit',['id'=>$val['id']])}}" class="tablelink">编辑</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagin">
                    <div id="page">{{$list->appends(['keywords'=>$keywords])->links()}}</div>
                </div>
                @else
                <div style="color: red;font-size: 25px;font-weight: bolder">没有查到相应的数据</div>
            @endif
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
