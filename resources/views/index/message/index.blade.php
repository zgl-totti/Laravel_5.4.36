<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>我的消息</title>
	<link href="__STATIC__/css/admin.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/amazeui.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/a.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/demo.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/personal.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/newstyle.css" rel="stylesheet" type="text/css">
	<link href="__STATIC__/css/hmstyle.css" rel="stylesheet" type="text/css"/>
	<script src="__STATIC__/js/jquery.min.js"></script>
	<script src="__STATIC__/js/amazeui.js"></script>
	<script src="__STATIC__/js/jQuery-1.8.2.min.js"></script>
	<script src="__STATIC__/layer/layer.js"></script>
	<style type="text/css">
		.yidu{
			color: #ccc;
		}
		#pagge div{
			float: right;
		}
		#pagge span,#pagge a{
			display: inline-block;
			width: 30px;
			height: 30px;
			/*color: #c00;*/
			text-decoration: none;
			border: 1px solid #ccc;
			text-align: center;
			line-height: 30px;
			font-size: 16px;
		}
		#pagge span.current{
			background: rgb(255,68,0);
			color: #fff;
		}
		.weidu{
			cursor: pointer;
		}
	</style>
</head>
<body>
<!--头 -->
@include('index.public.header')
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<div class="user-news">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的消息</strong> / <small>News</small></div>
				</div>
				<hr/>
				<div class="am-tabs am-tabs-d2" data-am-tabs>
					<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
						<li><a href="#tab3">个人信息</a></li>
					</ul>
					<div class="am-tabs-bd">
						<div class="am-tab-panel am-fade" id="tab3">
							<!--消息 -->
							<volist name="msgList" id="val" empty="$empty">
								<div class="s-msg-item s-msg-temp i-msg-downup">
									<h6 class="s-msg-bar"><span class="s-name {$val['status']?'yidu':'weidu'}">{$val['status']?'已读':'设为已读'}</span><span lid="{$val['id']}" style="float: right;display: inline-block;margin: 6px 5px;cursor: pointer;" class="del">删除</span></h6>
									<div class="s-msg-content i-msg-downup-wrap">
										<div class="i-msg-downup-con">
											<a class="i-markRead" target="_blank" href="{:U('detail',array('id'=>$val['id']))}">
												<div class="m-item">
													<div class="item-pic">
														<img src="__STATIC__/images/xinfeng3.jpg" class="itempic J_ItemImg">
													</div>
													<div class="item-info">
														<p class="item-comment">{$val['title']}</p>
														<p class="item-time">{:date('Y-m-d   H:i:s',$val['addtime'])}</p>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</volist>
							<div id="pagge">{$page}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>
<script type="text/javascript">
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('消息')").parent().addClass('active');
        $('.del').click(function(){
            var a=$(this);
            var id=$(this).attr('lid');
            $.post("{:U('del')}",{id:id},function(res){
                if(res.status){
                    layer.msg(res.info);
                    a.parents('.i-msg-downup').hide();
                }else{
                    layer.msg(res.info)
                }
            })
        });
        $('.weidu').click(function(){
            var a=$(this);
            var lid=$(this).next().attr('lid');
            $.post("{:U('change')}",{id:lid},function(res){
                if(res.status){
                    layer.msg(res.info);
                    a.text('已读').addClass('yidu').removeClass('weidu');
                }else{
                    layer.msg(res.info)
                }
            })
        })
    })
</script>