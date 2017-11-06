<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>今日推荐</title>
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script src="{{asset('asset_index/layer/lazyload.js')}}"></script>
    <style>
        .tj{background: orange}
        .imgaa {
            margin: 50px 10px;
            width: 340px;
            cursor: pointer;
            text-align: center;
            float: left;
            border: 2px solid sandybrown;
        }
        .content{
            background-image: url("{{asset('asset_index/images/jrtjbj.png')}}");
            overflow: hidden;
        }
        .immm{
            margin: 0 auto;
            width: 852px;
        }
        .lazy{
            width: 300px;
            text-align: center;
            border: 1px solid;
        }
        .lazy span{
            width: 300px;
            text-align: center;
            float: left;
        }
        .lazy:hover{
            color: transparent;
        }
    </style>
</head>
<body >
<header>
    <article>
        <!--<div class="mt-logo">-->
        <!--顶部导航条 -->
        @include('index.public.header')
        <!-- </div>-->
    </article>
</header>
@include('index.public.nav')
<b class="line" ></b>
<div class="content" >
    <!--广告-->
    <div class="gg" >
        <div style="float: left;position: fixed;top:200px;left: 0px;z-index: 100">
            <a href="javascript:;" ><img width="250" src="{{asset('asset_index/images/ggl.png')}}" alt=""/>关闭</a>

        </div>
        <div  style="float: right;position: fixed;top:200px;right: 0px;z-index: 100">
            <a href="javascript:;" >关闭<img width="250" src="{{asset('asset_index/images/ggr.png')}}" alt=""/></a>
        </div>
    </div>
    <!--推荐-->
    <div class="immm"><img src="{{asset('asset_index/images/jrtj.png')}}"></div>
    <div style="width: 1080px;margin: 0 auto">
        @foreach($list as $v)
            <div class="imgaa">
                <a href="{{url('goods/index',['gid'=>$v['id'],'status'=>3])}}">
                    <img class="lazy" data-original="{{asset('asset_index/images/lazy.png')}}" style="width: 250px;height: 250px;" src="{{asset('uploads')}}/{{$v['pic']}}" alt=""/>
                    <div class="img">
                        <p><span>{{mb_substr($v["goodsname"],0,26,'utf-8')}}</span></p>
                        <p><span style="color: #0000ff"><del>原价:￥{{$v["price"]}}元</del></span></p>
                        <p><span style="color: #0000ff">今日特别推荐价:￥{{$v["price"]-500}}元</span></p>
                        <img src="{{asset('asset_index/images/ggn.png')}}">
                    </div>
                </a>
                <span><i class="am-icon-heart am-icon-fw sc" gid="{{$v['id']}}"></i></span>
            </div>
        @endforeach
        {{$list->links()}}
    </div>
</div>
@include('index.public.tip')
@include('index.public.footer')
</body>
<script type="text/javascript">
    $('.gg a').click(function(){
        $(this).hide();
    });
    $(function(){
        $('img.lazy').lazyload(function(){
            // placeholder:"loading.gif";
            effect:"fadein";
        })
    })
    //收藏宝贝
    $('.sc').click(function(){
        //if('{:I("session.mid")}') {
        var mid=$('#mid').val();
        var token="{{csrf_token()}}";
        if(mid) {
            var gid = $(this).attr('gid');
            $.post("{{url('collect/add')}}", {gid: gid,_token:token}, function (res) {
                if (res.status==1) {
                    layer.msg("收藏成功", {time: 600});
                } else {
                    layer.msg("亲，您已经收藏过了!", {time: 600})
                }
            })
        }else{
            layer.alert('亲，请登录后再来收藏！',function(){
                location="{{url('login/index')}}"
            })
        }
    })
</script>
</html>