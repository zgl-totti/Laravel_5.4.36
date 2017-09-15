<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('/asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('/asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script language="JavaScript" src="{{asset('/asset_admin/js/layer/layer.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            //顶部导航切换
            $(".nav li a").click(function(){
                $(".nav li a.selected").removeClass("selected");
                $(this).addClass("selected");
            })
        })

    </script>
</head>
<body style="background:url({{asset('/asset_admin/images/topbg.gif')}}) repeat-x;">
    <div class="topleft">
        <a href="#" target="_parent"><img src="{{asset('/asset_admin/images/afterlogo.png')}}" title="系统首页" /></a>
    </div>
    <div class="topright">
        <ul>
            <li><span><img src="{{asset('/asset_admin/images/help.png')}}" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
            <li><a href="#">关于</a></li>
            <li><a href="{{url('admin/logout')}}" onclick="co()" target="_parent" id="logout">退出</a></li>
        </ul>
        <div class="user">
            <span>{{$info['username']}}</span>
            <i>消息</i>
            <b>5</b>
        </div>
    </div>
    <script type="text/javascript">
        function co() {
            if (confirm('确认退出')) {

            }else {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>
