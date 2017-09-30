<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('asset_index/css/iconfont/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <style>
        .content{width: 100%;height:auto;background:#ed2437}
        .content .header1{width: 100%;height:500px;overflow: hidden;margin: 0;padding: 0}
        .hotsale{width: 1149px;height:100px;margin:0 auto;overflow: hidden}
        .hotsale img{width: 1149px;height: 100px;}
        .content .content_list{width: 1149px;margin:0 auto;overflow: hidden;padding-bottom: 100px;}
        .content .content_ul{width: 1200px;display: block;list-style: none;margin-left: -20px;}
        .content .content_ul li a{text-decoration: none;}
        .content .content_ul li{width:220px;height:348px;display: block;text-align: center;float: left;background: #fff;border:none;margin: 14px 0 0 14px;position: relative;transition: top 0.6s}
        .content .content_ul li p.comm_name{width: 210px;height: 36px;text-align: center;margin:0 auto;font-size:14px;overflow: hidden;color:#333}
        .content .content_ul li p.comm_name:hover{color:#f43838;text-decoration: underline;}
        .content .content_ul li p.comm_p1{font-size: 16px;color:#e02128;font-weight: bold;margin:10px;padding: 0}
        .content .content_ul li p.comm_p2{text-align: center;font-size: 15px;color:#999;margin:0;padding: 0}
        .content .content_ul li p.comm_p3{text-align: center;font-size: 16px;color:#e02128;height:20px;font-weight:bolder;margin:5px;padding: 0}
        .content_ul li a img{width: 210px;height:220px;}

        .newperson{background: orange}
    </style>
    <script>
        $(function (){
            $('.content_ul li').mouseenter(function(){
                $(this).css('top','-8px');
            });
            $('.content_ul li').mouseleave(function(){
                $(this).css('top','0px');
            })
        })
    </script>
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
<div class="content">
    <div class="header1">
        <img src="{{asset('asset_index/images/header.jpg')}}" alt=""/>
    </div>
    <div class="hotsale">
        <img src=" {{asset('asset_index/images/hotsale.jpg')}}" alt=""/>
    </div>
    <div class="content_list">
        <ul class="content_ul">
            @foreach($list as $v)
                <li>
                    <a class="cut_{{$v['gid']}}" href="{{url('goods/index',['gid'=>$v['gid'],'status'=>2])}}">
                        <img src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" alt=""/>
                        <p class="comm_name">{{$v['getGoods']['goodsname']}}</p>
                    </a>
                    <p class="comm_p1">新人专享价:¥ {{$v['cutprice']}}</p>
                    <p class="comm_p3">已砍:¥{{$v['cut']}}</p>
                    <p class="comm_p2">汇购价:¥{{$v['price']}}</p>
                    <script>
                        var gid="{$list['gid']}";
                        $('a[class="cut_'+gid+'"]').attr('href',"{:U('Goods/goodsDetail?gid='.$list['gid'].'&cut='.$list['cut'])}")
                    </script>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@include('index.public.footer')
</body>
</html>