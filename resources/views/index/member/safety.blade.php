<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>安全设置</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/infstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
	<style>
		input.error { border: 1px solid #EA5200;background: #ffdbb3;}
		div.error{color: #ff0300;font-weight: bold;font-size: 14px;position: absolute}
		div.ok {color: green;}
	</style>
	<script type="text/javascript">
        $(function(){
            $('.person li').removeClass('active');
            $(".person li a:contains('安全设置')").parent().addClass('active');
            var validate=$('#form1').validate({
                rules: {       //设置验证规则
                    pwd: {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },
                    repwd: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {    //提示信息
                    pwd: {
                        required: '密码不能为空',
                        minlength: '密码长度至少5个字符',
                        maxlength: '密码长度最多20个字符'
                    },
                    repwd: {
                        required: '重复密码不能为空',
                        equalTo: '两次密码输入不一致'
                    }
                },
                success: function (div) {
                    div.addClass("ok").text('通过验证');
                },
                validClass: 'ok',
                errorElement: 'div'
            })

            $('.am-btn').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate.form()){      //第28行，validate函数
                    $.post("{{url('member/changePwd')}}",$('#form1').serialize(),function(res){
                        //异步提交，提交到LoginController控制器“login”方法中    串行化数据，到控制器       function(res)来接收数据      （上行解释）
                        if(res.status==1){
                            layer.msg(res.info,{
                                icon : 6,time:500}, function(){
                                location.href='';
                            })
                        } else{
                            layer.msg(res.info,{
                                icon:7
                            },function(){
                                location='';
                            });
                        }
                    },'json')
                }
            })
        })
	</script>
</head>
<body>
<header>    <!----头 ----->
	<article>   <!--顶部导航条 -->
		@include('index.public.header')
	</article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<!--标题 -->
			<div class="user-safety">
				<div class="am-cf am-padding">
					<div class="am-fl am-cf">
						<strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set up Safety</small>
					</div>
				</div>
				<div style="margin-top: 80px;margin-bottom: 100px" class="check">
					<ul>
						<li>
							<i class="i-safety-lock"></i>
							<div class="m-left">
								<div class="fore1">登录密码</div>
								<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
							</div>
							<div class="fore3">
								<a href="{{url('member/changePwd')}}">
									<div class="am-btn am-btn-secondary">修改</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-wallet"></i>
							<div class="m-left">
								<div class="fore1">支付密码</div>
								<div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>
							</div>
							<div class="fore3">
								@if(empty($info['paypwd']))
									<div>
										<a href="{{url('member/setPay')}}">
											<div class="am-btn am-btn-secondary">立即启用</div>
										</a>
									</div>
								@else
									<div>
										<a href="{{url('member/changePay')}}">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								@endif
							</div>
						</li>
						<li>
							<i class="i-safety-iphone"></i>
							<div class="m-left">
								<div class="fore1">手机验证</div>
								@if(empty($info['mobile']))
									<div class="fore2"><small>您还没验证手机，快去验证吧</small></div>
								@else
									<div class="fore2"><small>您验证的手机：{{$info['mobile']}} 可用于找回登录密码</small></div>
								@endif
							</div>
							@if(empty($info['mobile']))
								<div class="fore3">
									<a href="{{url('member/changeInfo')}}">
										<div class="am-btn am-btn-secondary">验证</div>
									</a>
								</div>
							@endif
						</li>
						<!--<li>
                            <i class="i-safety-mail"></i>
                            <div class="m-left">
                                <div class="fore1">邮箱验证</div>
                                <if condition="$list['email'] eq ''">
                                    <div class="fore2"><small>您还没验证邮箱，快去验证吧</small></div>
                                <else/>
                                <div class="fore2"><small>您验证的邮箱：{$list['email']} 可用于快速找回登录密码</small></div>
                                </if>
                            </div>
                            <if condition="$list['email'] eq ''">
                                <div class="fore3">
                                    <a href="{:U('Login/addinfo')}">
                                        <div class="am-btn am-btn-secondary">验证</div>
                                    </a>
                                </div>
                            <else/>
                                <div class="fore3">
                                    <a href="email.html">
                                        <div class="am-btn am-btn-secondary">换绑</div>
                                    </a>
                                </div>
                            </if>
                        </li>-->
						<!--<li>
                            <i class="i-safety-idcard"></i>
                            <div class="m-left">
                                <div class="fore1">实名认证</div>
                                <div class="fore2"><small>用于提升账号的安全性和信任级别，认证后不能修改认证信息。</small></div>
                            </div>
                            <div class="fore3">
                                <a href="idcard.html">
                                    <div class="am-btn am-btn-secondary">认证</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="i-safety-security"></i>
                            <div class="m-left">
                                <div class="fore1">安全问题</div>
                                <div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>
                            </div>
                            <div class="fore3">
                                <a href="question.html">
                                    <div class="am-btn am-btn-secondary">认证</div>
                                </a>
                            </div>
                        </li>-->
					</ul>
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