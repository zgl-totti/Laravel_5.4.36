<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的消息</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/footstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/address.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.js')}}"></script>
</head>
<body>
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
            <div class="letter" style="padding: 50px 50px;">
                <h2 style="font-size: 16px;width: 200px;text-align: center;margin: 0 auto">{{$info['title']}}</h2>
                <h2 style="font-size: 16px;">亲爱的{{$member->username}}：</h2>
                @if($info['mid']==0)
                    <p style="font-size: 13px;margin-top: 5%;">感谢你光临优汇易购电器商城,{{$info['content']}},祝您身体健康，事业顺利！</p>
                @else
                    <p style="font-size: 13px;margin-top: 5%;">感谢你光临优汇易购电器商城，你在{{date('Y-m-d H:i:s',$info['addtime'])}}{{$info['content']}},祝您身体健康，事业顺利！</p>
                @endif
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!--底部-->
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
<script>
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('消息')").parent().addClass('active');
    })
</script>
</html>