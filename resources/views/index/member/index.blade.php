<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>个人中心</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/systyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<script>
        $(function(){
            $('#out').click(function(){
                layer.confirm( '您确定退出吗？',{btn:['确定','取消'],title:'退出提示'},
                    function(){
                        $.get("{:U('Login/logout')}",'',function(res){
                            if(res.status==1){
                                layer.msg(res.info, {icon : 1,time:500}, function(){
                                    location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，退出成功后返回
                                })
                            }
                        })
                    })
            })
        })
	</script>
	<style>
		.m-userinfo{
			overflow: hidden;
		}
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
			<div class="wrap-left">
				<div class="wrap-list">
					<div class="m-user">
						<!--个人信息 -->
						<div class="m-bg"></div>
						<div class="m-userinfo">
							<div class="m-baseinfo" style="width:250px">
								<a href="information.html">
									<img src="{{url($info->touxiang)}}">
								</a>
								<em style="float:left;">用户名：{{$info->username}}</em><br><br>
								<div class="s-prestige am-btn am-round">
									会员积分：{{$info->integral}}</div>
							</div>
							<div class="m-right">
								<div class="m-new">
									<a href="{:U('Msg/index')}"><i class="am-icon-bell-o"></i>消息({{$letter}})</a>
								</div>
								<div class="m-address">
									<a href="{:U('Site/index')}" class="i-trigger">我的收货地址</a>
								</div>
							</div>
						</div>

						<!--个人资产-->
						<div class="m-userproperty">
							<div class="s-bar">
								<i class="s-icon"></i>个人资产
							</div>
							<p class="m-bonus">
								<a href="{:U('Money/bill')}">
									<i><img src="{{asset('asset_index/images/yue.png')}}"/></i>
									<span class="m-title">我的余额</span>
								</a>
							</p>
							<p class="m-big">
								<a href="{:U('Qd/index')}">
									<i><img src="{{asset('asset_index/images/day-to.png')}}"/></i>
									<span class="m-title">签到有礼</span>
								</a>
							</p>
						</div>
					</div>
					<div class="box-container-bottom"></div>

					<!--订单 -->
					<div class="m-order">
						<div class="s-bar">
							<i class="s-icon"></i>我的订单
							<a class="i-load-more-item-shadow" href="{:U('Order/order')}">全部订单</a>
						</div>
						<ul>
							<li style="margin-left:80px"><a href="{:U('Home/Order/order/orderstatus/1')}" target="_blank"><i><img src="{{asset('asset_index/images/pay.png')}}"/></i><span>待付款<em class="m-num">{{$num1}}</em></span></a></li>
							<li><a href="{:U('Home/Order/order/orderstatus/2')}" target="_blank"><i><img src="{{asset('asset_index/images/send.png')}}"/></i><span>待发货<em class="m-num">{{$num2}}</em></span></a></li>
							<li><a href="{:U('Home/Order/order/orderstatus/3')}" target="_blank"><i><img src="{{asset('asset_index/images/receive.png')}}"/></i><span>待收货<em class="m-num">{{$num3}}</em></span></a></li>
							<li><a href="{:U('Comment/wait')}"><i><img src="{{asset('asset_index/images/comment.png')}}"/></i><span>待评价<em class="m-num">{{$num4}}</em></span></a></li>
						</ul>
					</div>
					<!--九宫格-->
					<div class="user-patternIcon">
						<div class="s-bar">
							<i class="s-icon"></i>我的常用
						</div>
						<ul>
							<a href="{:U('Cart/index')}"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="{{asset('asset_index/images/iconbig.png')}}"/><p>购物车</p></li></a>
							<a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="{{asset('asset_index/images/iconsmall1.png')}}"/><p>我的收藏</p></li></a>
							<a href="home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="{{asset('asset_index/images/iconsmall0.png')}}"/><p>为你推荐</p></li></a>
							<a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="{{asset('asset_index/images/iconsmall3.png')}}"/><p>好评宝贝</p></li></a>
							<a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="{{asset('asset_index/images/iconsmall2.png')}}"/><p>我的足迹</p></li></a>
						</ul>
					</div>
				</div>
			</div>
			<div class="wrap-right">
				<!-- 日历-->
				<div class="day-list">
					<div class="s-bar">
						我的日历
					</div>
					<div class="s-care s-care-noweather">
						<div class="s-date">
							<em>21</em>
							<span class="mon">星期一</span>
							<span class="dat">2015.12</span>
						</div>
					</div>
				</div>
				<!--新品 -->
				<div class="new-goods">
					<div class="s-bar">
						<i class="s-icon"></i>新品推荐
					</div>
					<volist name="goods" id="val">
						<div class="new-goods-info">
							<a class="shop-info" href="{:U('Goods/goodsDetail',array('gid'=>$val['id']))}" target="_blank">
								<div class="face-img-panel">
									<img src="__UPLOADS__/{:mb_substr($val['pic'],0,11)}thumb350_{:mb_substr($val['pic'],11)}" alt="">
								</div>
								<span class="shop-title">{:mb_substr($val['goodsname'],0,5,'utf-8')}</span>
							</a>
							<a gid="{$val['id']}" class="follow ">收藏</a>
						</div>
					</volist>
				</div>
			</div>
		</div>
	</div>
    @include('index.public.list')
</div>
<!--引导 -->
<div class="navCir">
	<li><a href="home/home.html"><i class="am-icon-home "></i>首页</a></li>
	<li><a href="home/sort.html"><i class="am-icon-list"></i>分类</a></li>
	<li><a href="{:U('Cart/index')}"><i class="am-icon-shopping-basket"></i>购物车</a></li>
	<li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
@include('index.public.footer')
</body>
<script>
    $(function(){
        $('.person li').removeClass('active');
        $(".person a:contains('个人中心')").css('color','#F69');
        var d = new Date();
        var mon='';
        today=d.getDay();
        switch (today)
        {
            case 0:
                mon="星期日";
                break;
            case 1:
                mon="星期一";
                break;
            case 2:
                mon="星期二";
                break;
            case 3:
                mon="星期三";
                break;
            case 4:
                mon="星期四";
                break;
            case 5:
                mon="星期五";
                break;
            case 6:
                mon="星期六";
                break;
        }
        var y=d.getFullYear();
        var m=d.getMonth()+1;
        var day=d.getDate();
        $('.s-date').children('em').text(day);
        $('.s-date').children('.mon').text(mon);
        $('.s-date').children('.dat').text(y+'.'+m);
        $('.follow').click(function(){
            gid=$(this).attr('gid');
            $.post("{:U('Collection/add')}",{gid:gid},function(res){
                if(res.status){
                    layer.msg(res.info)
                }else{
                    layer.msg(res.info);
                }
            })
        })
    })
</script>
</html>