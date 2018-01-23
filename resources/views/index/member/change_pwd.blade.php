<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>修改登录密码</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
    <style type="text/css">
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
            });

            $('.am-btn').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate.form()){      //第28行，validate函数
                    $.post("{{url('member/changePwd')}}",$('#form1').serialize(),function(res){
                        //异步提交，提交到LoginController控制器“login”方法中    串行化数据，到控制器       function(res)来接收数据      （上行解释）
                        if(res.status==1){
                            layer.msg(res.info,{icon : 6,time:500}, function(){
                                location.href="{{url('member/safety')}}";
                            })
                        } else{
                            layer.msg(res.info,{icon:7});
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
                        <strong class="am-text-danger am-text-lg">登录密码</strong> / <small>Change&nbsp;Password</small>
                    </div>
                </div>
                <form action="#" method="post" id="form1">
                    <div  style="margin:60px 0 0 220px">
                        <div class="am-form-group">
                            <label class="am-form-label" style="text-align: left;font-size: 14px;">原&nbsp;&nbsp;密&nbsp;码：</label>
                            <div class="pass">
                                <input type="password" name="password"  style="padding-left: 0.5em;height: 35px;width: 300px;border: 1px solid #E4EAEE;"/>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-form-label">修改密码：</label>
                            <div class="rePass">
                                <input id="password" type="password" name="pwd"  style="padding-left: 0.5em;height: 35px;width: 300px;border: 1px solid #E4EAEE;">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-form-label">确认密码：</label>
                            <div class="confirmPwd">
                                <input id="user-email" type="password" name="repwd" style="padding-left: 0.5em;height: 35px;width: 300px;border: 1px solid #E4EAEE;">
                            </div>
                        </div>
                    </div>
                </form>
                <div style="margin:20px 0 0 340px;">
                    <input type="button" value="确认修改" class="am-btn am-btn-primary am-btn-sm" style="width: 150px;background-color: #dd514c;border-color: #dd514c">
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