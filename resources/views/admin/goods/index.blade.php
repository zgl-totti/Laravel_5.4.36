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
    <script type="text/javascript" src="{{asset('asset_admin/js/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                filterMode:true,
                afterBlur:function(){
                    this.sync('#content7');
                }
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
            $(".tablelink1").click(function(){
                var gid=$(this).attr('gid');
                var token="{{csrf_token()}}";
                $.post("{{url('admin/goods_operate')}}",{gid:gid,_token:token},function (res) {
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:1200},function(){
                            location="{{url('admin/goods_index')}}";
                        });
                    }else{
                        layer.msg(res.info,{icon:5,time:1200});
                    }
                },'json')
            })
            $(".tablelink2").click(function(){
                var gid=$(this).attr('gid');
                var token="{{csrf_token()}}";
                layer.confirm("你确定要删除吗？",function(){
                    $.post("{{url('admin/goods_del')}}",{gid:gid,_token:token},function (res) {
                        if(res.code==1){
                            layer.msg(res.info,{icon:6,time:1200},function(){
                                location="{{url('admin/goods_index')}}";
                            });
                        }else{
                            layer.msg(res.info,{icon:5,time:1200});
                        }
                    },'json')
                })
            })
            $(".oo").click(function(){
                location="{{url('admin/goods_goodsOut')}}";
            })
        });
    </script>
    <style type="text/css">
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
        <li><a href="#">商品管理</a></li>
        <li><a href="#">商品列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/goods_index')}}" id="form2" method="get">
                <ul class="seachform">
                    <li><label>商品名称</label><input name="keywords" value="{{$keywords}}" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询商品"/></li>
                    <li><label>&nbsp;</label><input type="button" class="scbtn oo" value="商品导出"/></li>
                </ul>
            </form>
            @if($list)
                <table class="tablelist">
                    <thead>
                    <tr>
                        <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                        <th>商品名称</th>
                        <th>商品分类</th>
                        <th>市场价格</th>
                        <th>商城价格</th>
                        <th>库存数量</th>
                        <th>商品图片</th>
                        <th>发布时间</th>
                        <th>销售数量</th>
                        <th>是否展示</th>
                        <th>品牌id</th>
                        <th>属性</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr>
                            <td>{{$k+1+$firstRow}}</td>
                            <td>{{$val['goodsname']}}</td>
                            <td>{{$val['getCategory']['categoryname']}}</td>
                            <td>{{$val['markeprice']}}</td>
                            <td>{{$val['price']}}</td>
                            <td>{{$val['num']}}</td>
                            <td>
                                <img src="{{url('uploads')}}/{{$val['pic']}}" width="50" height="50" />
                            </td>
                            <td>{{date('Y-m-d H:i:s',$val['addtime'])}}</td>
                            <td>{{$val['salenum']}}</td>
                            <td>
                                <span style="color: green">{{$val['active']==1?'展示':'下架'}}</span>
                            </td>
                            <td>{{$val['getBrand']['brandname']}}</td>
                            <td>属性</td>
                            <td>
                                <a href="{{url('admin/goods_edit',['gid'=>$val['id']])}}" class="tablelink">编辑</a>&nbsp;&nbsp;&nbsp;
                                <a style="cursor: pointer;color: #056DAE" gid="{{$val['id']}}" class="tablelink2">删除</a>&nbsp;&nbsp;&nbsp;
                                <a style="cursor: pointer;color: #056DAE" gid="{{$val['id']}}" class="tablelink1">{{$val['active']==1?"下架":"上架"}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagin">
                    <div class="message">共<i class="blue">{{$list->total()}}</i>条记录</div>
                    <div id="page">{{$list->appends(['keywords'=>$keywords])->links()}}</div>
                </div>
                @else
                <div style="color: red;font-size: 25px;">没有找到相应的商品</div>
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
