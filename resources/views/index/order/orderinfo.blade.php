<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>订单详情</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/orstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('asset_index/js/jquery.min.js')}}"></script>
	<script src="{{asset('asset_index/js/amazeui.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<script type="text/javascript">
        $(function(){
            $('.pay').click(function(){
                var oid=$(this).attr('id');
                var token="{{csrf_token()}}";
                var status=1;
                layer.prompt({
                    title: '输入支付密码，并确定',
                    formType: 1 //prompt风格，支持0-2
                }, function(pass){
                    $.post("{{url('order/pay')}}",{oid:oid,paypwd:pass,_token:token,status:status},function(res){
                        if(res.status==1){
                            layer.msg(res.info,{icon:6,time:800},function(){
                                location="{{url('order/order',['status'=>0])}}";
                            })
                        }else{
                            layer.msg(res.info,{icon:2,time:1600})
                        }
                    },'json')
                })
            });

            $('.del').click(function(){
                var oid=$(this).attr('id');
                var token="{{csrf_token()}}";
                $.post("{{url('order/del')}}",{oid:oid,_token:token},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{icon:6,time:1200});
                        location="{{url('order/order',['status'=>0])}}";
                    }else{
                        layer.msg(res.info,{icon:2,time:1600})
                    }
                },'json')
            });

            $('.shl').click(function(){
                var oid=$(this).attr('id');
                var token="{{csrf_token()}}";
                $.post("{{url('order/receiving')}}",{oid:oid,_token:token},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location="{{url('order/order',['status'=>0])}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:2,time:2000})
                    }
                },'json')
            })
        })
	</script>
</head>
<body>
<!--头 -->
<header>
	<article>
		<!--顶部导航条 -->
        @include('index.public.header')
	</article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<div class="user-orderinfo">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
				</div>
				<hr/>
				{{--<span style="color: red;font-size:30px">{$list}</span>--}}
				<!--进度条-->
				<div>
                    <div class="order-infoaside">
                        <div class="order-addresslist">
                            <div class="order-address">
                                <div class="icon-add">
                                </div>
                                <p class="new-tit new-p-re">
                                    <span class="new-txt">{{$info['getSite']['username']}}</span>
                                    <span class="new-txt-rd2">{{$info['getSite']['phone']}}</span>
                                </p>
                                <div class="new-mu_l2a new-p-re">
                                    <p class="new-mu_l2cw">
                                        <span class="title">收货地址：</span>
                                        <span class="province">{{$info['getSite']['ps']}}</span>
                                        <span class="city">{{$info['getSite']['qs']}}</span>
                                        <span class="dist">{{$info['getSite']['ws']}}</span>
                                        <span class="street">{{$info['getSite']['xyd']}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-infomain">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">单价</td>
                            </div>
                            <div class="th th-number">
                                <td class="td-inner">数量</td>
                            </div>
                            <div class="th th-operation">
                                <td class="td-inner">商品操作</td>
                            </div>
                            <div class="th th-amount">
                                <td class="td-inner">合计</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                            <div class="th th-change">
                                <td class="td-inner">交易操作</td>
                            </div>
                        </div>
                        <div class="order-main">
                            <div class="order-status3">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$info->ordersyn}}</a></div>
                                    <span>成交时间：{{date('Y-m-d H:i:s',$info['addtime'])}}</span>
                                    <!--    <em>店铺：小桔灯</em>-->
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        @foreach($info['getOrderGoods'] as $val)
                                            <ul class="item-list">
                                                <li class="td td-item">
                                                    <div class="item-pic">
                                                        <a href="{{url('goods/index',['gid'=>$val['gid'],'status'=>3])}}" class="J_MakePoint">
                                                            <img src="{{url('uploads')}}/{{$val->pic}}" class="itempic J_ItemImg">
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-basic-info">
                                                            <a href="{{url('goods/index',['gid'=>$val['gid'],'status'=>3])}}">
                                                                <p>{{$val->goodsname}}</p>
                                                                <p class="info-little">颜色：随机
                                                                    <br/>包装：裸装
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="td td-price">
                                                    <div class="item-price">
                                                        {{$val->gidprice}}
                                                    </div>
                                                </li>
                                                <li class="td td-number">
                                                    <div class="item-number">
                                                        <span>×</span>{{$val->buynum}}
                                                    </div>
                                                </li>
                                                <li class="td td-operation">
                                                    <div class="item-operation">
                                                        @if($info['orderstatus']==2)
                                                            <a href="{{url('order/refund',['oid'=>$info['id'],'gid'=>$val['gid']])}}">退款</a>
                                                        @elseif($info['orderstatus']==3)
                                                            <a href="{{url('order/refund',['oid'=>$info['id'],'gid'=>$val['gid']])}}">退款/退货</a>
                                                        @elseif($info['orderstatus']==4)
                                                            <a href="{{url('order/refund',['oid'=>$info['id'],'gid'=>$val['gid']])}}">退款/退货</a><br>
                                                            <a href="{{url('comment/index',['oid'=>$info['id'],'gid'=>$val['gid']])}}" >评价</a>
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    <div class="order-right">
                                        <li class="td td-amount">
                                            <div class="item-amount">
                                                合计：{{$info->orderprice}}
                                                <p>含运费：<span>0.00</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status">
                                                    <p class="Mystatus">
                                                        @if($info['orderstatus']==1)
                                                            {{$info['getStatus']->statusname}}
                                                        @elseif($info['orderstatus']==2)
                                                            {{$info['getStatus']->adminopt}}
                                                        @elseif($info['orderstatus']==3)
                                                            {{$info['getStatus']->memberopt}}
                                                        @elseif($info['orderstatus']==4)
                                                            {{$info['getStatus']->statusname}}
                                                        @elseif($info['orderstatus']==5)
                                                            {{$info['getStatus']->statusname}}
                                                        @endif
                                                    </p>
                                                    <!--<p class="order-info"><a href="logistics.html">查看物流</a></p>-->
                                                    @if($info['orderstatus']==3)
                                                        <p class="order-info"><a href="#">延长收货</a></p>
                                                    @endif
                                                </div>
                                            </li>
                                            <li class="td td-change">
                                                @if($info['orderstatus']==1)
                                                    <div class="am-btn am-btn-danger anniu" >
                                                        <span class="pay" id="{{$info['id']}}">去支付</span>
                                                    </div>
                                                @elseif($info['orderstatus']==3)
                                                    <div class="am-btn am-btn-danger anniu">
                                                        <span class="shl" id="{{$info['id']}}">确认收货</span>
                                                    </div>
                                                @else
                                                    <div class="am-btn am-btn-danger anniu">
                                                        <span class="del" id="{{$info['id']}}">删除订单</span>
                                                    </div>
                                                @endif
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!--底部-->
	</div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>