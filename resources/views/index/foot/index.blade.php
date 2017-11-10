<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>我的足迹</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/footstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<style type="text/css">
		.ng-ser-box-con{
			height: 300px;
		}
		.more{
			float: right;
		}
		.am-icon-trash:hover,.more:hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
<!--头 -->
<!--头 -->
<header>
	<article>
		<div class="mt-logo">
			@include('index.public.header')
		</div>
	</article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<div class="user-foot">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
				</div>
				<hr/>
				<!--足迹列表 -->
				<!--最近一天-->
				@if(! empty($last))
					@foreach($last as $k=>$v)
						<div class="goods">
							<div class="goods-date">
								@if($k==1)
									<span><i class="month-lite">{{$str}}</i></span>
									<del class="am-icon-trash delA"></del>
								@endif
								@if($k==5)
									<span class="more"><i class="month-lite"><a href="{{url('foot/detail',['date'=>'last'])}}">更多</a></i></span>
								@endif
								<s class="line"></s>
							</div>
							<div class="goods-box first-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" href="{{url('goods/index',['gid'=>$v['gid'],'status'=>3])}}" title="{{$v['goodses']['goodsname']}}">
											<img src="{{url('uploads')}}/{{mb_substr($v['goodses']['pic'],0,10)}}/thumb350_{{mb_substr($v['goodses']['pic'],11)}}" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i gid="{{$v['id']}}" class="am-icon-trash delO"></i></a>
									@if($v['goodses']['active']==0)
										<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
									@endif
								</div>
								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="{{url('goods/index',['gid'=>$v['gid'],'status'=>3])}}">{{$v['goodses']['goodsname']}}</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>{{$v['goodses']['price']}}</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>{{$v['goodses']['markeprice']}}</strong>
										</span>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					@endforeach
					<div class="clear"></div>
					<!--更早-->
					@if(! empty($early))
						@foreach($early as $k=>$v)
							<div class="goods">
								<div class="goods-date">
									@if($k==1)
										<span><i class="month-lite">更早</i></span>
										<del class="am-icon-trash delA"></del>
									@endif
									@if($k==5)
										<span class="more"><i class="month-lite"><a href="{{url('foot/detail',['date'=>'early'])}}">更多</a></i></span>
									@endif
									<s class="line"></s>
								</div>
								<div class="goods-box first-box">
									<div class="goods-pic">
										<div class="goods-pic-box">
											<a class="goods-pic-link" href="{{url('goods/index',['gid'=>$v['gid'],'status'=>3])}}" title="{{$v['goodses']['goodsname']}}">
												<img src="{{url('uploads')}}/{{mb_substr($v['goodses']['pic'],0,10)}}/thumb350_{{mb_substr($v['goodses']['pic'],11)}}" class="goods-img"></a>
										</div>
										<a class="goods-delete" href="javascript:void(0);"><i gid="{{$v['id']}}" class="am-icon-trash delO"></i></a>
										@if($v['goodses']['active']==0)
											<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
										@endif
									</div>
									<div class="goods-attr">
										<div class="good-title">
											<a class="title" href="{:U('Goods/goodsDetail',array('gid'=>$val2['id']))}" >{$val2['goodsname']}</a>
										</div>
										<div class="goods-price">
										<span class="g_price">
                                        <span>¥</span><strong>{{$v['goodses']['price']}}</strong>
										</span>
											<span class="g_price g_price-original">
                                        <span>¥</span><strong>{{$v['goodes']['markeprice']}}</strong>
										</span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				@else
					<h1>你还没有浏览任何商品，赶快去首页挑选吧！</h1>
				@endif
			</div>
		</div>
		<!--底部-->
	</div>
	@include('index.public.list')
</div>
@include('index.public.footer')
</body>
<script type="text/javascript">
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('足迹')").parent().addClass('active');
        $('.delA').click(function(){
            var t=$(this).prev().text();
            var token="{{csrf_token()}}";
            layer.confirm('确认删除吗？', {
                btn: ['确认删除','点错了'] //按钮
            }, function(index){
                $.post("{{url('foot/del')}}",{t:t,_token:token},function(res){
                    if(res.code==1){
                        layer.close(index);
                        location.reload();
                    }
                },'json');
            })
        });
        $('.delO').click(function(){
            var gid=$(this).attr('gid');
            var token="{{csrf_token()}}";
            $.post('{:U("Foot/del")}',{gid:gid,_token:token},function(res){
                if(res.code==1){
                    layer.msg(res.info,{time:600});
                    $(this).parents('.goods').hide();
                }
            },'json')
        });
    })
</script>
</html>