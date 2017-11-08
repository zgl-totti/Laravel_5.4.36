<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>购物车列表</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/orstyle.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('asset_index/js/jquery-1.9.min.js')}}"></script>
	<script src="{{asset('asset_index/js/amazeui.js')}}"></script>
	<script src="{{asset('asset_index/layer/layer.js')}}"></script>
	<style type="text/css">
		.sousuo_div{width: 1178px;height:120px;background:#f1f2ee;text-align: center;margin:60px 0 0 0;}
		.sousuo_div img{display: block;width: 78px;height: 120px;float: left;margin-left: 400px;}
		.sousuo_div span.sousuo_span{display: block;width: 260px;height: 120px;line-height: 120px;float: left}
		.newperson{width: 150px;height:38px;display: block;float: left;line-height: 38px;color:#f43838;font-size: 16px;}
	</style>
	<script type="text/javascript">
        $(function(){
            $('input[name="morecheckbox"]').click(function(){
                if(!$(this).attr('checked')){
                    $('input[name="singlecheckbox[]"]').prop('checked','checked');
                    $('input[name="singlecheckbox[]"]').attr('checked','checked');
                    $('input[name="morecheckbox"]').attr('checked','checked');
                    tnum=$('input[name="singlecheckbox[]"]').length;
                    $('#boxspan').text(tnum);
                    //计算总价
                    var a=0;
                    var zj=0;
                    $('input[name="singlecheckbox[]"]').each(function(){
                        zj+=parseFloat($('.total1').eq(a).text());
                        a++;
                    });
                    $('.total').text('总计￥：'+zj)
                }else{
                    //alert(111)
                    $('input[name="singlecheckbox[]"]').removeAttr('checked');
                    $('input[name="morecheckbox"]').removeAttr('checked');
                    $('#boxspan').text(0);
                    $('.total').text('总计￥：0')
                }
            });
            //加减
            $('.jia').click(function(){
                var index=$(this).index('.jia');
                var num=parseInt($(this).prev().val());
                var price=parseFloat($('.item-price').eq(index).text());
                if(num<100){
                    $(this).prev().val(num+1);
                    $('.total1').eq(index).text((num+1)*price);
                    if($('input[name="singlecheckbox[]"]').eq(index).attr('checked')){
                        var totalPrice1=parseInt($('.total').text().slice(4));
                        $('.total').text('总计￥：'+(price+totalPrice1))
                    }
                }
            });
            $('.jian').click(function(){
                var index=$(this).index('.jian');
                var num=parseInt($(this).next().val());
                var price=parseFloat($('.item-price').eq(index).text());
                if(num>1){
                    $(this).next().val(num-1);
                    $('.total1').eq(index).text((num-1)*price);
                    if($('input[name="singlecheckbox[]"]').eq(index).attr('checked')){
                        var totalPrice1=parseInt($('.total').text().slice(4));
                        $('.total').text('总计￥：'+(totalPrice1-price))
                    }
                }
            });
            //选择单个商品
            $('input[name="singlecheckbox[]"]').click(function(){
                index1=$(this).index('input[name="singlecheckbox[]"]');
                if(!$(this).attr('checked')){
                    $(this).attr('checked','checked');
                    num2=parseInt($('#boxspan').text());
                    $('#boxspan').text(num2+1);
                    //计算总价
                    var totalPrice=parseInt($('.total').text().slice(4));
                    totalPrice=totalPrice+parseFloat($('.total1').eq(index1).text());
                    $('.total').text('总计￥：'+totalPrice)
                }else{
                    $(this).attr('checked',false);
                    $('input[name="morecheckbox"]').removeAttr('checked');
                    num2=parseInt($('#boxspan').text());
                    $('#boxspan').text(num2-1);
                    //计算总价
                    var totalPrice=parseInt($('.total').text().slice(4));
                    totalPrice=totalPrice-parseFloat($('.total1').eq(index1).text());
                    $('.total').text('总计￥：'+totalPrice)
                }
            })
        })
	</script>
</head>
<body>
<!--头 -->
@include('index.public.header')
<div class="nav-table">
	<div class="long-title"><span class="all-goods">全部分类</span></div>
	<div class="nav-cont">
		<ul>
			<li class="index"><a href="{{url('index/index')}}">首页</a></li>
			<li class="qc"><a href="{{url('nav/recommend')}}">推荐</a></li>
			<li class="qc"><a href="{{url('newperson/index')}}" target="_blank" style="width: 120px;height: 36px;">新人专享<img style="position: absolute;width:19px;height:23px;" src="{{asset('asset_index/images/hot.gif')}}"/></a></li>
		</ul>
		<div class="nav-extra">
			<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b><a style="color:#fcff00" href="{{url('integral/index')}}">积分商城</a>
			<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
		</div>
	</div>
</div>
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="user-order">
			<!--标题 -->
			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">全部商品</strong></div>
			</div>
			<hr/>
			<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
				<div class="am-tabs-bd">
					<form action="#" method="get" id="tocountForm">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="am-tab-panel am-fade am-in am-active" id="tab1">
							<div class="order-top" style=" background: #c2ccd1;padding-top: 10px;">
								<div class="th th-item" style="width:30px;">
									<td class="td-inner"><input type="checkbox" name="morecheckbox"/></td>
								</div>
								<div class="th th-item" style="width:100px;">
									<td class="td-inner">商品图片</td>
								</div>
								<div class="th th-item" style="width:300px;">
									<td class="td-inner">商品名称</td>
								</div>
								<div class="th th-price" style="margin-left: 70px">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-number" style="margin-left: 40px">
									<td class="td-inner">数量</td>
								</div>
								<div class="th th-price" style="width: 100px;height:30px;"></div>
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-change" style="margin-left: 40px">
									<td class="td-inner">交易操作</td>
								</div>
							</div>
							<div class="order-main">
								<div class="order-list" >
									<!--交易成功-->
									<div class="order-status5">
										@foreach($list as $v)
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<div style="width:30px;float: left;line-height: 100px;">
															<input type="checkbox" value="{{$v['id']}}" name="singlecheckbox[]"/>
														</div>
														<li class="td td-item">
															<div class="item-pic">
																<a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>3])}}" class="J_MakePoint">
																	<img src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" width="78px;" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info" style="padding-top: 30px;">
																	<a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>3])}}">
																		<p>{{$v['goodsname']}}</p>
																		<p style="display:block;width: 100px;height:38px;float: left" class="info-little">颜色：{{$v['color']}}
																			<br/>型号：{{$v['model']}}</p>
																		@if($isnew==1 && $v['cut'] != 0)
																			<span class="newperson">新人专享优惠:<b style="color:#f43838;font-size: 18px;">{{$v['cut']}}</b></span>
																		@endif
																	</a>
																</div>
															</div>
														</li>
														<li class="td td-price" style="padding-top: 25px;">
															<div class="item-price">
																{{$v['price']}}
															</div>
														</li>
														<li class="td td-number" style="padding-top: 25px;margin-left: 40px">
															<div class="item-number" style="width: 70px">
																@if($isnew==1 && $v['cut'] != '')
																	<input readonly value="{{$v['buynum']}}" name="num{{$v['id']}}" style="text-align:center;outline: none;width: 25px;height: 15px;border: 0"/>
																@else
																	<a class="jian" style="display:inline-block;width:20px;border:1px solid #ccc" href="javascript:;">-</a>
																	<input readonly value="{{$v['buynum']}}" name="num{{$v['id']}}" style="text-align:center;outline: none;width: 25px;height: 15px;border: 0"/>
																	<a class="jia" style="display:inline-block;width:20px;border:1px solid #ccc" href="javascript:;">+</a>
																@endif
															</div>
														</li>
													</ul>
												</div>
												<div class="order-right">
													<li class="td td-amount">
														<div class="item-amount">
															合计：<span class="total1">{{$v['buynum']}}*{{$v['price']}}</span>
														</div>
													</li>
													<div class="move-right" >
														<li class="td td-change" style="margin-left:40px">
															<a href="javascript:;" class="delgoodsBycart" gid="{{$v['id']}}"><div class="am-btn am-btn-danger anniu">删除商品</div></a>
														</li>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="cart-count">
								<div class="cart-list-foot" style="width: 1178px;">
									<div class="cart-list-l">&nbsp;共计<span id="boxspan" style="width: 10px;height:10px;display: inline-block;color:#ff0000">0</span>件商品</div>
									<div class="cart-list-r"><span class="total" style="margin-left:100px">共计￥:0</span><a href="javascript:;" id="tocount">去结算>></a></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('购物车')").parent().addClass('active');
        //购物车中去结算
        $('#tocount').click(function(){
            checknum=0;
            $('input[name="singlecheckbox[]"]').each(function(){
                //复选框 选中的个数
                checknum+=$(this).is(':checked');
            });
            if(checknum >0){
                cartinfo=$('#tocountForm').serialize();
                $.post("{{url('cart/bargain')}}",cartinfo,function(res){
                    if(res.code==1){
                        $('#totalPrice').val($('.total').text().slice(4));
                        if(parseInt($('.total').text().slice(4))!=0){
                            $('#tocountForm').submit();
                        }
                    }else{
                        layer.msg(res.info,{
                            time:1000
                        })
                    }
                },'json')
            }else{
                layer.msg('亲,你还未选择商品呢?',{
                    time:1000
                })
            }
        });
        //从购物车中删除商品
        $('.delgoodsBycart').click(function(){
            del=$(this);
            var gid=$(this).attr('gid');
            var token="{{csrf_token()}}";
            $.post("{{url('cart/del')}}",{gid:gid,_token:token},function(res){
                if(res.code==1){
                    del.parents('.order-content').hide();
                    layer.msg(res.info,{
                        icon:1,
                        time:800
                    })
                }
            },'json')
        })
    })
</script>
@include('index.public.footer')
</body>
</html>
