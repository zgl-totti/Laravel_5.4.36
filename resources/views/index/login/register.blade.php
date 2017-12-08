<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>注册</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="{{asset('asset_index/css/amazeui.min.css')}}" />
	<link href="{{asset('asset_index/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('asset_index/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
	<!--用户名注册，表单验证，包含的jquery，validate，layer写在上面-->
	<style type="text/css">
		input.error { border: 1px solid #EA5200;background: #ffdbb3;}
		div.error{color: #ff0300;font-weight: bold;font-size: 14px;position: absolute}
		div.ok {color: green;}
		/* .mobileR:hover{
             border-bottom: 1px solid #0e90d2;
         }*/
		#zphone{text-align: center}
	</style>
	<script type="text/javascript">
        $(function(){
            //validate表单验证
            var validate=$('#form1').validate({
                //设置验证规则
                rules:{
                    username:{
                        required:true,
                        minlength:2,
                        maxlength:15,
                        remote:{
                            url:'{:U("Login/chkUserName")}',
                            type:'post'
                        }
                    },
                    pwd:{
                        required:true,
                        minlength:5,
                        maxlength:20
                    },
                    repwd:{
                        required:true,
                        equalTo:"#password"

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
                        required:'用户名不能为空',
                        minlength:'用户名至少需要2个字符',
                        maxlength:'用户名最多15个字符',
                        remote:'用户名已被占用'
                    },
                    pwd:{
                        required:'密码不能为空',
                        minlength:'密码长度至少5个字符',
                        maxlength:'密码长度最多20个字符'
                    },
                    repwd:{
                        required:'重复密码不能为空',
                        equalTo:'两次密码输入不一致'
                    },
                    verify:{
                        required:'请输入验证码',
                        remote:'验证码不正确'
                    }
                },
                success: function(div) {
                    div.addClass("ok").text('通过验证');
                },
                validClass:'ok',
                errorElement:'div'
            })
            $('.am-btn').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate.form()){      //第28行，validate函数
                    $.post("{:U('register')}",$('#form1').serialize(),function(res){
                        //异步提交，提交到LoginController控制器“register”方法中    串行化数据，到控制器       function(res)来接受数据      （上行解释）
                        if(res.status==1){
                            layer.open({
                                content : res.info,
                                icon : 1,
                                yes : function(){
                                    location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，注册成功后返回
                                }
                            });
                        }else{
                            layer.open({
                                content:res.info,
                                icon:2,
                                title : '错误提示'
                            });
                        };
                    },'json')
                }
            })
            $('.mobileR').click(function(){
                $('.am-tab-panel').eq(1).addClass('am-active');
                $('.am-tab-panel').eq(0).removeClass('am-active');
            })
            $('.am-active').click(function(){
                $('.am-tab-panel').eq(0).addClass('am-active');
                $('.am-tab-panel').eq(1).removeClass('am-active');
            })
        })
	</script>
	<!--手机号注册-->
	<script type="text/javascript">
        $(function(){
            //validate表单验证
            var validate2=$('#form2').validate({
                //设置验证规则
                rules:{
                    username:{
                        required:true,
                        minlength:11,
                        maxlength:11,
                        mobile:/^1[34578]{1}[0-9]{9}$/,
                        remote:{
                            url:'{:U("Login/chkMobile")}',
                            type:'post'
                        }
                    },
                    pwd:{
                        required:true,
                        minlength:5,
                        maxlength:20
                    },
                    repwd:{
                        required:true,
                        equalTo:"#password2"

                    }
                },
                messages:{    //提示信息
                    username:{
                        required:'手机号不能为空',
                        minlength:'手机号码格式错误',
                        maxlength:'手机号码格式错误',
                        mobile:'手机号码格式错误',
                        remote:'用户名已被占用'
                    },
                    pwd:{
                        required:'密码不能为空',
                        minlength:'密码长度至少5个字符',
                        maxlength:'密码长度最多20个字符'
                    },
                    repwd:{
                        required:'重复密码不能为空',
                        equalTo:'两次密码输入不一致'
                    }
                },
                success: function(div) {
                    div.addClass("ok").text('通过验证');
                },
                validClass:'ok',
                errorElement:'div'
            })
            jQuery.validator.addMethod("mobile",function(value,element){
                var mobileReg=/^1[34578]{1}[0-9]{9}$/;
                return this.optional(element)||(mobileReg.test(value));
            },'手机号码格式错误');
            $('.mobile').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate2.form()){      //第28行，validate函数
                    $.post("{:U('chkMobileCode')}",$('#form2').serialize(),function(res){
                        //异步提交，提交到LoginController控制器“chkmobileCode”方法中    串行化数据，到控制器       function(res)来接受数据      （对上行的解释）
                        if(res.status==1){
                            layer.open({content : res.info, icon : 1, yes : function(){
								location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，注册成功后返回
							}});
                        }else{
                            layer.open({content:res.info, icon:2, title : '错误提示'});
                        }
                    },'json')
                }
            })
        })
	</script>
</head>
<body>
<div class="login-boxtitle">
	<a href="{:U('Index/index')}"><img alt="" src="{{asset('asset_index/images/logo3.png')}}" /></a>
</div>
<div class="res-banner">
	<div class="res-main">
		<div style="margin-top: 100px" class="login-banner-bg"><span></span><img src="{{asset('asset_index/images/tutu.jpg')}}" /></div>
		<div class="login-box">
			<div class="am-tabs" id="doc-my-tabs">
				<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
					<li class="am-active"><a href="">用户名注册</a></li>
					<li><a class="mobileR" href="JavaScript:;">手机号注册</a></li>
				</ul>
				<div class="am-tabs-bd">
					<div class="am-tab-panel am-active">
						<form action="{:U('register')}" method="post" id="form1">
							<div class="user-email">
								<input type="text" name="username" id="email" placeholder="请输入用户名">
							</div>
							<div class="user-pass">
								<input type="password" style="margin-top: 15px;" name="pwd" id="password" placeholder="设置密码">    <!--name属性和数据库不一致，是为了做字段映射-->
							</div>
							<div class="user-pass">
								<input type="password" style="margin-top: 30px;" name="repwd" id="passwordRepeat" placeholder="确认密码">
							</div>
							<div>
								<input type="text" style="margin-top: 45px" name="verify" style="margin-top:21px" id="verify" placeholder="请输入验证码">
								<img class="verify" style="margin-top: 15px;width:310px;height: 50px" src="{:U(verify)}"  alt="验证码" onClick="this.src=this.src+'?'+Math.random()" />
							</div>
						</form>
						<div style="margin-top: 0" class="login-links">
							<label for="reader-me">
								<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
							</label>
						</div>
						<div class="am-cf">
							<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-f">
						</div>
					</div>
					<!---------------------------手机号注册------------------------------>
					<div class="am-tab-panel">
						<form  action="{:U('register')}" method="post" id="form2">
							<div class="user-phone">
								<!--<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>-->
								<input type="tel" name="username" id="phone" placeholder="请输入手机号">
							</div>
							<div style="margin-top: 20px" class="verification">
								<!--<label for="code"><i class="am-icon-code-fork"></i></label>-->
								<input type="tel" style="width: 150px" name="verify" id="code" placeholder="请输入验证码">
								<input id="zphone" onclick="get_username_code()" style="width: 148px;height: 42px;" type="button" value="获取验证码"/>
							</div>
							<div class="user-pass">
								<!--<label for="password"><i class="am-icon-lock"></i></label>-->
								<input style="margin-top: 15px" type="password" name="pwd" id="password2" placeholder="设置密码">
							</div>
							<div class="user-pass">
								<!--<label for="passwordRepeat"><i class="am-icon-lock"></i></label>-->
								<input style="margin-top: 30px" type="password" name="repwd" id="repwd2" placeholder="确认密码">
							</div>
						</form>
						<br>
						<div class="login-links">
							<label for="reader">
								<input id="reader" type="checkbox"> 点击表示您同意商城《服务协议》
							</label>
						</div>
						<div class="am-cf">
							<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl mobile">
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
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
</div>
</body>
<script language="javascript">
    function get_username_code(){
        $.post('{:U("Login/codeVerify")}', {username:jQuery.trim($('#phone').val())},function(msg){
            layer.msg(jQuery.trim(unescape(msg)));
            if(msg=='提交成功'){
                RemainTime();
            }
        });
    }
    var iTime = 59;
    var Account;
    function RemainTime(){
        document.getElementById('zphone').disabled = true;
        var iSecond,sSecond="",sTime="";
        if (iTime >= 0){
            iSecond = parseInt(iTime%60);
            iMinute = parseInt(iTime/60);
            if (iSecond >= 0){
                if(iMinute>0){
                    sSecond = iMinute + "分" + iSecond + "秒";
                }else{
                    sSecond = iSecond + "秒";
                }
            }
            sTime=sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='获取手机验证码';
                iTime = 59;
                document.getElementById('zphone').disabled = false;
            }else{
                Account = setTimeout("RemainTime()",1000);
                iTime=iTime-1;
            }
        }else{
            sTime='没有倒计时';
        }
        document.getElementById('zphone').value ='重新获取(' +sTime+')';
    }
</script>
</html>