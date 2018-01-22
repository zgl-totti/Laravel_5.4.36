<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>{{$title}}</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/orstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('asset_index/js/jQuery.min.js')}}"></script>
	<script src="{{asset('asset_index/js/amazeui.js')}}"></script>
	<script src="{{asset('asset_index/js/jQuery.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<script>
        $(function(){
            $('.person li').removeClass('active');
            $(".person li a:contains('积分订单')").parent().addClass('active');
            $('.pay').click(function(){
                var oid=$(this).attr('id');
                var token="{{csrf_token()}}";
                var status=2;
                layer.prompt({
                    title: '输入支付密码，并确定',
                    formType: 1 //prompt风格，支持0-2
                }, function(pass){
                    $.post("{{url('order/pay')}}",{oid:oid,paypwd:pass,_token:token,status:status},function(res){
                        if(res.status==1){
                            layer.msg(res.info,{icon:6,time:800},function(){
                                location="{{url('order/order',['status'=>5])}}";
                            })
                        }else{
                            layer.msg(res.info,{icon:2,time:1600})
                        }
                    },'json')
                });
            });

            $('.del').click(function(){
                var oid=$(this).attr('id');
                var token="{{csrf_token()}}";
                $.post("{{url('order/del')}}",{oid:oid,_token:token},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{icon:6,time:1200});
                        $(this).parents('.order-main').hide();
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
                            location="{{url('order/order',['status'=>5])}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:2,time:2000})
                    }
                },'json')
            })
        })
	</script>
	<style>
		.message{float:left;}
		#page{float: right;}
		#page a,#page span{display: inline-block;width: 30px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ccc;}
		.current{background: #DD514C;color: #fff;  }
	</style>
</head>
<body>
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
			<div class="user-order">
				<form action="{{url('order/order',['status'=>5])}}" method="get">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">积分订单</strong> / <small>Order</small></div>
						<input type="submit" value="查询" class="btn" style="height:40px;width:70px;float: right;color:white;background-color:#DD514C;
                            border: 0;font-size: 16px;"/>
						<input type="text" name="goodsname"
                               @if($goodsname)
                                   value="{{$goodsname}}"
                               @else
                                   placeholder="请输入商品名称查询"
                               @endif
							   style="height:40px;width: 200px;float: right;border: 1px solid red;border-right:0"/>
					</div>
					<hr/>
					<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
						<div class="am-tabs-bd">
							<div class="am-tab-panel am-fade am-in am-active" id="tab1">
								<div class="order-top">
									<div class="th th-item">
										<td class="td-inner">商品</td>
									</div>
									<div class="th th-price">
										<td class="td-inner">积分</td>
									</div>
									<div class="th th-number">
										<td class="td-inner">数量</td>
									</div>
									<div class="th th-amount" style="margin-left: 70px">
										<td class="td-inner">合计</td>
									</div>
									<div class="th th-status" style="margin-left: 30px">
										<td class="td-inner">交易状态</td>
									</div>
									<div class="th th-change" style="margin-left: 30px">
										<td class="td-inner">交易操作</td>
									</div>
								</div>
								{{--<span style="font-size:30px;color: red">{$cxbu}</span>--}}
								@foreach($list as $v)
									<div class="order-main">
										<div class="order-list">
											<!--交易失败-->
											<div class="order-status0">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ordersyn']}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i:s',$v['addtime'])}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>1])}}" class="J_MakePoint">
																		<img src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>1])}}">
																			<p>{{$v['getGoods']['goodsname']}}</p>
																			<p class="info-little">颜色：随机
																				<br/>包装：裸装 
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
                                                                    {{$v->orderprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>1
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation"></div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount"  style="margin-left: -80px">
															<div class="item-amount">
																合计：{{$v->orderprice}}
																<p>含运费：<span>0.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status" style="margin-left: 26px">
																<div class="item-status">
																	<p class="Mystatus" style="margin-top: -14px">
                                                                        @if($v['orderstatus']==1)
                                                                            {{$v['getStatus']['statusname']}}
                                                                            <br><span class="del" id="{{$v['id']}}" style="cursor: pointer">删除订单</span>
                                                                        @elseif($v['orderstatus']==2)
                                                                            {{$v['getStatus']['adminopt']}}
                                                                        @elseif($v['orderstatus']==3)
                                                                            {{$v['getStatus']['memberopt']}}
                                                                        @elseif($v['orderstatus']==4)
                                                                            {{$v['getStatus']['statusname']}}
                                                                            <br> <a href="{{url('comment/index',['oid'=>$v['id'],'gid'=>$v['gid']])}}" >评价</a>
                                                                        @elseif($v['orderstatus']==5)
                                                                            {{$v['getStatus']['statusname']}}
                                                                        @endif
																	</p>
																</div>
															</li>
															<li class="td td-change" style="margin-left: 40px">
                                                                @if($v['orderstatus']==1)
                                                                    <div class="am-btn am-btn-danger anniu" >
                                                                        <span class="pay" id="{{$v['id']}}">去支付</span>
                                                                    </div>
                                                                @elseif($v['orderstatus']==3)
                                                                    <div class="am-btn am-btn-danger anniu">
                                                                        <span class="shl" id="{{$v['id']}}">确认收货</span>
                                                                    </div>
                                                                @else
                                                                    <div class="am-btn am-btn-danger anniu">
                                                                        <span class="del" id="{{$v['id']}}">删除订单</span>
                                                                    </div>
                                                                @endif
															</li>
														</div>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								<div class="pagin" style="margin-top:16px">
									<div class="message">共<i class="blue">{{$list->total()}}</i>条记录</div>
									<div id="page">{{$list->appends(['goodsname'=>$goodsname])->links()}}</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--底部-->
	</div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>