<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>退换货</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/refstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('asset_index/file/control/css/zyUpload.css')}}" type="text/css">
	<script src="{{asset('asset_index/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('asset_index/js/amazeui.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<!-- 引用核心层插件 -->
	<script type="text/javascript" src="{{asset('asset_index/layer/layer.js')}}"></script>
	<!-- 引用控制层插件 -->
	<script src="{{asset('asset_index/file/control/js/zyUpload.js')}}"></script>
	<!-- 引用初始化JS -->
	<script src="{{asset('asset_index/file/core/jq22.js')}}"></script>
	<script src="{{asset('asset_index/file/core/zyFile.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.form.js')}}"></script>
</head>
<script>
    $(function(){
        $("#form1").submit(function(){
            $("#form1").ajaxSubmit(function(res){
                if(res.status){
                    layer.msg(res.info,{icon:6,time:800},function(){location="{:U('Refund/index')}"});
                }else{
                    layer.msg(res.info,{icon:2,time:800});
                }
            });
            return false;
        })
    })
</script>
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
			<!--标题 -->
			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退款/退货申请</strong> / <small>Apply&nbsp;for&nbsp;returns</small></div>
			</div>
			<hr/>
			<div class="comment-list">
				<div class="emp">
					<div class="refund-aside">
						<div class="item-pic">
							<a href="{{url('goods/index',['gid'=>$info['gid'],'status'=>3])}}" class="J_MakePoint">
								<img src="{{url('uploads')}}/{{$info['pic']}}" class="itempic">
							</a>
						</div>
						<div class="item-title">
							<div class="item-name">
								<a href="{{url('goods/index',['gid'=>$info['gid'],'status'=>3])}}">
									<p class="item-basic-info">{{$info['goodsname']}}</p>
								</a>
							</div>
							<div class="info-little">
								<span>颜色：随机</span>
								<span>包装：裸装</span>
							</div>
						</div>
						<div class="item-info">
							<div class="item-ordernumber">
								<span class="info-title">订单编号：</span><a>{{$info['ordersyn']}}</a>
							</div>
							<div class="item-price">
								<span class="info-title">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><span class="price">{{$info['price']}}元</span>
								<span class="number">×{{$info['buynum']}}</span><span class="item-title">(数量)</span>
							</div>
							<div class="item-amount">
								<span class="info-title">小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amount">{{$info['money']}}元</span>
							</div>
							<div class="item-pay-logis">
								<span class="info-title">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</span><span class="price">0.00元</span>
							</div>
							<div class="item-amountall">
								<span class="info-title">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amountall">{{$info['money']}}元</span>
							</div>
							<div class="item-time">
								<span class="info-title">成交时间：</span><span class="time">{{date('Y-m-d H:i:s',$info['addtime'])}}</span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<form action="{{url('order/refund')}}" method="post" enctype="multipart/form-data" id="form1">
						<div class="refund-main" style="height:580px">
							<div class="item-comment">
								<div class="am-form-group">
									<label for="refund-type" class="am-form-label">退款类型</label>
									<div class="am-form-content">
										<select data-am-selected="" name="money">
											<option value="仅退款" selected>仅退款</option>
											<option value="退款/退货">退款/退货</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label for="refund-reason" class="am-form-label">退款原因</label>
									<div class="am-form-content">
										<select data-am-selected="" name="reason">
											<option value="请选择退款原因" selected>请选择退款原因</option>
											<option value="不想要了">不想要了</option>
											<option value="买错了">买错了</option>
											<option value="没收到货">没收到货</option>
											<option value="与说明不符">与说明不符</option>
										</select>
									</div>
								</div>
								<div class="am-form-group">
									<label for="refund-money" class="am-form-label">退款金额<span>（不可修改）</span></label>
									<div class="am-form-content">
										<input type="text"  value="{{$info['money']}}" name="orderprice" disabled>
										<input type="hidden"  value="{{$info['ordersyn']}}" name="oid">
										<input type="hidden"  value="{{$info['gid']}}" name="gid">
										<input type="hidden"  value="{{$info['scid']}}" name="scid">
									</div>
								</div>
								<div class="am-form-group">
									<label for="refund-info" class="am-form-label">退款说明<span>（可不填）</span></label>
									<div class="am-form-content">
										<textarea placeholder="请输入退款说明" name="mess"></textarea>
									</div>
								</div>
							</div>
							<span style="font-weight: bolder"> 图片最多上传三张,类型只支持JPEG,JPG,PNG</span>
							<div id="demo" class="demo"></div>
							<div class="info-btn">
								<input type="submit" value=" 提交申请" style="margin-top:-330px;background-color:#D7342E;border: 0;width:90px;height:40px;color:white;border-radius:10px;font-size: 16px ">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!--底部-->
	</div>
	@include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>