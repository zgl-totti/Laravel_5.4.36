<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>登录</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="{{asset('asset_index/css/amazeui.css')}}" />
	<link href="{{asset('asset_index/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
	<style type="text/css">
		input.error { border: 1px solid #EA5200;background: #ffdbb3;}
		div.error{color: #ff0300;font-weight: bold;font-size: 14px;position: absolute;}
		div.ok {color: green;}
	</style>
	<script type="text/javascript">
        /*$(function(){
            //validate表单验证
            var validate=$('#form1').validate({
                rules:{             //设置验证规则
                    username:{
                        required:true
                    },
                    password:{
                        required:true,
                        minlength:5,
                        maxlength:20
                    },
                    verify:{
                        required:true,
                        remote:{
                            url:'{:U("Login/chkVerify")}',
                            type:'post'
                        }
                    }
                },
                messages:{    //提示信息
                    username:{
                        required:'用户名不能为空'
                    },
                    password:{
                        required:'密码不能为空',
                        minlength:'密码长度至少5个字符',
                        maxlength:'密码长度最多20个字符'
                    },
                    verify:{
                        required:'请输入验证码',
                        remote:'验证码不正确'
                    }
                },
                /!*success: function(div) {
                    div.addClass("ok").text('通过验证');
                },*!/
                validClass:'ok',
                errorElement:'div'
            })

            $('.am-cf').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate.form()){
                    //第28行，validate函数
                    $.post("{:U('Login/login')}",$('#form1').serialize(),function(res){
                        //异步提交，提交到LoginController控制器“login”方法中    串行化数据，到控制器       function(res)来接收数据      （上行解释）
                        if(res.status==1){
                            layer.msg(res.info,{
                                icon : 6,time:500}, function(){
                                if("{:I('session.url')}"){
                                    location="{:I('session.url')}";
                                }else{
                                    location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，登录成功后返回
                                }
                            })
                        } else{
                            layer.msg(res.info,{
                                icon:7
                            },function(){
                                location="{:U('Login/login')}";
                            });
                        }
                    },'json')
                }
            })
        })*/
        $(function () {
            $('.am-cf').click(function(){
                $.post("{{url('login/index')}}",$('#form1').serialize(),function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon : 6,time:500}, function(){
							location.href="{{url('index/index')}}";
                        })
                    } else{
                        layer.msg(res.info,{icon:7});
                    }
                },'json')
            })
        })
	</script>
</head>
<body>
<div class="login-boxtitle">
	<a href="{{url('index/index')}}"><img alt="logo" src="{{asset('asset_index/images/logo3.png')}}" /></a>
</div>
<div class="login-banner">
	<div class="login-main">
		<div style="margin-top: 100px" class="login-banner-bg"><span></span><img src="{{asset('asset_index/images/tutu.jpg')}}" /></div>
		<div class="login-box">
			<h3 class="title">登录商城</h3>
			<div class="clear"></div>
			<div class="login-form">
				<form action="#" method="post" id="form1">
					<input name="_token" value="{{csrf_token()}}" type="hidden">
					<div class="user-pass">
						<input type="text" name="username" id="user" placeholder="手机 / 用户名">
						<input type="password" style="margin-top: 20px;" name="password" id="password" placeholder="请输入密码">
						<input type="text" name="verify" style="margin-top: 20px;" id="verify" placeholder="请输入验证码">
						<img class="verify" style="margin-top: 20px; width:330px;height: 80px" src="{{url('login/captcha/1')}}" alt="验证码" onclick="this.src='{{url('admin/captcha',rand())}}'"/>
					</div>
				</form>
			</div>
			<br><br><br><br><br><br><br><br><br><br><br>
			<div class="login-links">
				<!--<a href="{:U('Login/register')}" class="zcnext am-fr am-btn-default">注册</a>-->
				<!--<label for="remember-me"><input type="checkbox" id="remember-me" name="remember">记住用户名</label>-->
				<a href="{:U('Login/forgetPwd')}" class="am-fr">忘记密码?</a>
				<a href="{{url('login/register')}}">免费注册</a>
				<br/>
			</div>
			<div class="am-cf">
				<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
			</div>
		</div>
	</div>
</div>
<div class="footer ">
	<div class="footer-hd ">
		<p>
			<a href="# ">恒望科技</a>
			<b>|</b>
			<a href="# ">商城首页</a>
			<b>|</b>
			<a href="# ">支付宝</a>
			<b>|</b>
			<a href="# ">物流</a>
		</p>
	</div>
	<div class="footer-bd ">
		<p>
			<a href="# ">关于恒望</a>
			<a href="# ">合作伙伴</a>
			<a href="# ">联系我们</a>
			<a href="# ">网站地图</a>
			<em>© 2015-2025 Hengwang.com 版权所有</em>
		</p>
	</div>
</div>
</body>
</html>