<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
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
    <style>
        .message{float:left;}
        #page{float: right;}
        #page a,#page span{display: inline-block;width: 30px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ccc;}
        .current{background: #3EAFE0;color: #fff;  }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">订单管理</a></li>
        <li><a href="#">积分订单列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/order_integral')}}" method="get">
                <ul class="seachform">
                    <li><label>收货人查询</label><input name="username" type="text" class="scinput" value="{{$username}}" /></li>
                    <li><label>订单号查询</label><input name="ordersyn" type="text" class="scinput" value="{{$ordersyn}}" /></li>
                    <li><label>手机号查询</label><input name="phone" type="text" class="scinput" value="{{$phone}}" /></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>

                <table class="tablelist">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>订单号</th>
                        <th>收货人</th>
                        <th>手机号</th>
                        <th>商品</th>
                        <th>收货地址</th>
                        <th>订单提交时间</th>
                        <th>订单状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr>
                            <td>{{$firstRow+$k+1}}</td>
                            <td>{{$val['ordersyn']}}</td>
                            <td>{{$val['getSite']['username']}}</td>
                            <td>{{$val['getSite']['phone']}}</td>
                            <td>
                                {{mb_substr($val['getGoods']['goodsname'],0,10,'utf-8')}}
                                <b>:(￥{{$val['orderprice']}} X 1)</b>
                            </td>
                            <td>{{$val['getSite']['ps']}}{{$val['getSite']['qs']}}{{$val['getSite']['ws']}}{{$val['getSite']['xyd']}}</td>
                            <td>{{date('Y-m-d H:i:s',$val['addtime'])}}</td>
                            <td>
                                @if($val['orderstatus']==1)
                                    {{$val['getStatus']['statusname']}}
                                @elseif($val['orderstatus']==2)
                                    {{$val['getStatus']['adminopt']}}
                                @elseif($val['orderstatus']==3)
                                    {{$val['getStatus']['memberopt']}}
                                @else
                                    {{$val['getStatus']['statusname']}}
                                @endif
                            </td>
                            <td>
                                <a style="text-decoration: none;color: #002DFF;cursor:pointer" class="fh" name="{{$val['id']}}">
                                    @if($val['orderstatus']==2)
                                        发货
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
            <div class="pagin">
                <div id="page">
                    {{$list->appends(['ordersyn'=>$ordersyn,'username'=>$username,'phone'=>$phone])->links()}}
                </div>
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
<script>
    $(function(){
        $('.fh').click(function(){
            var oid=$(this).attr("name");
            var token="{{csrf_token()}}";
            var status=3;
            $.post("{{url('admin/order_shipments')}}",{oid:oid,_token:token,status:status},function(res){
                if(res.code==1){
                    layer.msg(res.info,{icon:6,time:1600},function(){
                        location="{{url('admin/order_integral')}}";
                    });
                }else{
                    layer.msg(res.info,{icon:5,time:1600});
                }
            },'json')
        })
    })
</script>
</html>
