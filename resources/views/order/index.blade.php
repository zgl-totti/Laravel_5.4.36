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
        <li><a href="#">
                @if($orderstatus==0)
                    全部订单列表
                @elseif($orderstatus==1)
                    待付款订单列表
                @elseif($orderstatus==2)
                    待发货订单列表
                @elseif($orderstatus==3)
                    已发货订单列表
                @elseif($orderstatus==4)
                    已完成订单列表
                @endif
            </a>
        </li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/order_index',['orderstatus'=>$orderstatus])}}" method="get">
                <ul class="seachform">
                    <li><label>收货人查询</label><input name="username" type="text" class="scinput" value="{{$username}}" /></li>
                    <li><label>订单号查询</label><input name="ordersyn" type="text" class="scinput" value="{{$ordersyn}}" /></li>
                    <li><label>手机号查询</label><input name="phone" type="text" class="scinput" value="{{$phone}}" /></li>
                    <li><input name="orderstatus" type="hidden" id="orderstatus" class="scinput" value="{{$orderstatus}}"/></li>

                    <!-- <li><label>订单状态</label>
                         <div class="vocation">
                             <select name="orderstatus"  class="select3">
                                 <option value="0">全部订单</option>
                                 <option value="1">待付款订单</option>
                                 <option value="2">待发货订单</option>
                                 <option value="3">待收货订单</option>
                                 <option value="4">订单完成</option>
                             </select>
                         </div>
                     </li>-->
                    
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                    @if($orderstatus==2)
                        <li><label>&nbsp;</label><input type="button" class="scbtn plfh" value="批量发货"/></li>
                    @endif
                    <li><label>&nbsp;</label><input type="button" class="scbtn plfh dcdd" value="订单导出"/></li>
                </ul>

                <table class="tablelist">
                    <thead>
                    <tr>
                        @if($orderstatus==2)
                            <th><input type="checkbox" name="chk" onclick="show(this)"/></th>
                        @endif
                        <th>编号</th>
                        <th>订单号</th>
                        <th>收货人</th>
                        <th>手机号</th>
                        <th>商品</th>
                        <th>总价</th>
                        <th>收货地址</th>
                        <th>订单提交时间</th>
                        <th>订单状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr>
                            @if($orderstatus==2)
                                <td name="{{$val['id']}}"><input type="checkbox" name="chk1[]" class="lid{{$k}}"/></td>
                            @endif
                            <td>{{$firstRow+$k+1}}</td>
                            <td>{{$val['ordersyn']}}</td>
                            <td>{{$val['getSite']['username']}}</td>
                            <td>{{$val['getSite']['phone']}}</td>
                            <td>
                                @foreach($val['getOrderGoods'] as $v)
                                    {{--{{mb_substr($v['goods']['goodsname'],0,12,'utf-8')}}--}}
                                    {{mb_substr($v['goodsname'],0,12,'utf-8')}}
                                    <b>:(￥{{$v['gidprice']}} X {{$v['buynum']}})</b>
                                    <br>&nbsp;&nbsp;&nbsp;
                                @endforeach
                            </td>
                            <td>￥{{$val['orderprice']}}</td>
                            <td>{{$val['getSite']['ps']}}{{$val['getSite']['qs']}}{{$val['getSite']['ws']}}{{$val['getSite']['xyd']}}</td>
                            <td>{{date('Y-m-d H:i:s',$val['addtime'])}}</td>
                            <td>
                                @if($orderstatus==2)
                                    <a style="text-decoration: none;color: #002DFF;cursor:pointer" class="fh" name="{{$val['id']}}">
                                        发货
                                    </a>
                                @else
                                    @if($val['orderstatus']==1)
                                        {{$val['getStatus']['statusname']}}
                                    @elseif($val['orderstatus']==2)
                                        {{$val['getStatus']['adminopt']}}
                                    @elseif($val['orderstatus']==3)
                                        {{$val['getStatus']['memberopt']}}
                                    @else
                                        {{$val['getStatus']['statusname']}}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
            <div class="pagin">
                <div id="page">
                    {{$list->appends(['ordersyn'=>$ordersyn,'orderstatus'=>$orderstatus,'username'=>$username,'phone'=>$phone])->links()}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        $('.dcdd').click(function(){
            location="{:U('Order/out')}"
        })
    </script>
</div>
</body>
    <script type="text/javascript">
        $(function(){
            $('.fh').click(function(){
                var oid=$(this).attr("name");
                var token="{{csrf_token()}}";
                var status=1;
                var orderstatus=$('#orderstatus').val();
                $.post("{{url('admin/order_shipments')}}",{oid:oid,_token:token,status:status},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:1600},function(){
                            location="{{url('admin/order_index')}}?status="+orderstatus;
                        });
                    }else{
                        layer.msg(res.info,{icon:6,time:1600});
                    }
                })
            })
            $('.plfh').click(function(){
                var xz=document.getElementsByName("chk1[]");
                S= new Array();
                for (var i = 0; i < xz.length; i++) {
                    if(xz[i].checked) {
                        id = $(xz[i]).parent().attr('name');
                        S[i]=parseInt(id);
                    }
                }
                var token="{{csrf_token()}}";
                var status=2;
                var orderstatus=$('#orderstatus').val();
                $.post("{{url('admin/order_shipments')}}",{oid:S,_token:token,status:status},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:1600},function(){
                            location="{{url('admin/order_index')}}?status="+orderstatus;
                        });
                    }else{
                        layer.msg(res.info,{icon:2,time:1600});
                    }
                },'json')
            })
        })
    </script>
</html>
