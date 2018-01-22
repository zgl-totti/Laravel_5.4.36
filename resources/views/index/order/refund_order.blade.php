<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>退换货管理</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/orstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('asset_index/js/jquery.min.js')}}"></script>
	<script src="{{asset('asset_index/js/amazeui.js')}}"></script>
	<script src="{{asset('asset_index/js/jQuery.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<script>
        $(function(){
            $('.person li').removeClass('active');
            $(".person li a:contains('退款售后')").parent().addClass('active');
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
		<!--<div class="mt-logo">-->
		<!--顶部导航条 -->
        @include('index.public.header')
		<!-- </div>-->
	</article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<div class="user-order">
				<form action="{{url('order/refund_order')}}" method="get">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退款售后管理</strong> / <small>Change</small></div>
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
									<div class="th th-orderprice th-price">
										<td class="td-inner">交易金额</td>
									</div>
									<div class="th th-changeprice th-price">
										<td class="td-inner">退款金额</td>
									</div>
									<div class="th th-status th-moneystatus">
										<td class="td-inner">售后状态</td>
									</div>
									<div class="th th-change th-changebuttom">
										<td class="td-inner">售后操作状态</td>
									</div>
								</div>
								{{--<span style="font-size:30px;color: red">{$cxbu}</span>--}}
								<div class="order-main">
									@foreach($list as $val)
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;">{{$val['aftersyn']}}</a></div>
												<span>申请时间：{{date('Y-m-d H:i:s',$val['addtime'])}}</span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="#" class="J_MakePoint">
																	<img src="{{url('uploads')}}/{{$val['getGoods']['pic']}}" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="#">
																		<p>{{$val['getGoods']['goodsname']}}</p>
																		<p class="info-little">颜色：随机
																			<br/>包装：裸装 
																		</p>
																	</a>
																</div>
															</div>
														</li>
														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span>{{$val->orderprice}}
																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span>{{$val->orderprice}}
																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>
													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
																<p class="Mystatus">
                                                                    {{$val['getAfterStatus']['memberopt']}}
																</p>
															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
														<div class="am-btn am-btn-danger anniu">
                                                            {{$val['getAfterStatus']['statusname']}}
														</div>
													</li>
												</div>
											</div>
										</div>
									@endforeach
									<div class="pagin" style="margin-top:16px">
										<div class="message">共<i class="blue">{{$list->total()}}</i>条记录</div>
										<div id="page">{{$list->links()}}</div>
									</div>
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