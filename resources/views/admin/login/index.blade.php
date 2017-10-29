<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎登录后台管理系统</title>
    {{--<style>
        ul li{
            width: 1300px;height: 50px;
        }
        ul li.input{ position: relative;}
        div.error{font-weight:bold;color:red;top:15px;background:url(__STATIC__/images/error.png) no-repeat 2px 3px; margin-left: 5px; padding-left: 20px;}
        div.ok{color:green;top:15px;background:url(__STATIC__/images/ok.png) no-repeat 2px 3px;margin-left: 5px; padding-left: 20px;}
    </style>--}}
    <link href="{{asset('/asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="{{asset('/asset_admin/js/jquery.js')}}"></script>
    <script src="{{asset('/asset_admin/js/cloud.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('/asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/asset_admin/js/jquery.validate.js')}}"></script>
    <script src="{{asset('/asset_admin/js/jquery.form.js')}}"></script>
    <script src="{{asset('/asset_admin/js/layer/layer.js')}}"></script>

    <script language="javascript">
        $(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            $(window).resize(function(){
                $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            })
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.loginbtn').click(function(){
                $.post("{{url('admin/create')}}",$('#form1').serialize(),function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location="{{url('admin/index')}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:2,time:2000})
                    }
                },'json')
            })
        })
    </script>
</head>

<body style="background-color:#1c77ac; background-image:url({{asset('/asset_admin/images/light.png')}}); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>
<div class="logintop"></div>
<div class="loginbody">
    <span class="systemlogo"></span>
    <div class="loginbox loginbox1">
        <form action="#" method="post" id="form1">
            <input name="_token" type="hidden" value="{{csrf_token()}}" />
            <ul>
                <li><input name="username" type="text" class="loginuser" /></li>
                <li><input name="password" type="password" class="loginpwd" /></li>
                <li class="yzm">
                    <span><input name="verify" type="text" /></span>
                    <cite><img src="{{url('admin/captcha',rand())}}" width="118" height="46" style="cursor:pointer" onclick="this.src='{{url('admin/captcha',rand())}}'" /> </cite>
                </li>
                <li>
                    <input name="" type="button" class="loginbtn" value="登录"    />
                    <label><input name="remember" type="checkbox" value="0" id="check"/>记住密码</label>
                </li>
            </ul>
        </form>
    </div>
</div>
</body>
</html>
