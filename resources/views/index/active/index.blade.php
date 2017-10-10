<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>活动详情页</title>
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('asset_index/css/iconfont/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript " src="{{asset('asset_index/js/quick_links.js')}}"></script>
    <style>
        .banner img{
            width: 100%;
        }
        .banner{
            position: relative;
            top:-36px;
        }
        .content{
            background: rgb(6,26,63);
            overflow: hidden;
        }
        .goodsC{
            width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        .dat{
            height: 25px;
            line-height: 25px;
            background: rgb(200,200,200);
        }
        .goods img{
            width: 280px;
        }
        .goodsC .goods{
            width: 280px;
            float: left;
            margin: 8px 5px;
            background: #fff;
            position: relative;
            top:0;
            transition: top 0.6s;
        }
        .gn{
            padding: 0 10px;
            height: 57px;
            text-align: left;
        }
        .price{
            padding: 0 10px 10px 10px;
            text-align: left;
        }
        .price span{
            color: red;
        }
        .goods .collec{
            float: right;
            color: red;
            cursor: pointer;
        }
        .goodsC .goods:hover{
            top:-6px;
        }
    </style>
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
<b class="line"></b>
<div class="content">
    <div class="banner">
        <img src="{$pic[0]['pic']}" alt=""/>
    </div>
    <div class="banner">
        <img src="{$pic[1]['pic']}" alt=""/>
    </div>
    <div class="goodsC">
        @foreach($info['goods'] as $val)
            <div class="goods">
                <div class="dat">
                    <span>距离活动结束还有</span>
                    <i class="d"></i>
                    <span>天</span>
                    <i class="h"></i>
                    <span>时</span>
                    <i class="i"></i>
                    <span>分</span>
                    <i class="s"></i>
                    <span>秒</span>
                </div>
                <a href="{{url('goods/index',['gid'=>$val['id'],'status'=>3])}}">
                    <img src="{{url('uploads')}}/{{mb_substr($val['pic'],0,11)}}thumb350_{{mb_substr($val['pic'],11)}}" alt="{{$val['goodsname']}}"/>
                </a>
                <div class="gn"><a href="{{url('goods/index',['gid'=>$val['id'],'status'=>3])}}">{{$val['goodsname']}}</a></div>
                <div class="price">活动价<span>￥{{$val['price']}}</span>
                    <span class="collec" gid="{{$val['id']}}">收藏宝贝</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('index.public.tip')
@include('index.public.footer')
</body>
<script>
    $(function(){
        var y;
        var m;
        var d;
        var h;
        var i;
        var s;
        var timer;
        var a="{{$d}}";
        function daoJiShi(){
            var dateObj=new Date();
            y=dateObj.getDate();
            m=dateObj.getDate();
            d=dateObj.getDate();
            h=dateObj.getHours();
            i=dateObj.getMinutes();
            s=dateObj.getSeconds();
            if(a<d){
                var temp = new Date(y,m,0);
                temp=temp.getDate();
                $('.goodsC .d').text(parseInt(a)+temp-d).css('color','red');
            }else{
                $('.goodsC .d').text(a-d).css('color','red');
            }
            $('.goodsC .h').text(24-h).css('color','red');
            $('.goodsC .i').text(60-i).css('color','red');
            $('.goodsC .s').text(60-s).css('color','red');
        }
        daoJiShi();
        timer=setInterval(function(){
            daoJiShi();
        },1000);
        $('.collec').click(function(){
            if('{:I("session.mid")}') {
                gid = $(this).attr('gid');
                $.post('{:U("Collection/add")}', {gid: gid}, function (res) {
                    if (res.status) {
                        layer.msg(res.info, {time: 600})
                    } else {
                        layer.msg(res.info, {time: 600})
                    }
                })
            }else{
                layer.alert('亲，请登录后再来收藏！',function(){
                    location='{:U("Login/login")}';
                })
            }
        })
    })
</script>
</html>