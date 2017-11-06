<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的收藏</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/colstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/js/layer/layer.js')}}"></script>
    <style type="text/css">
        #pagge div{
            float: right;
        }
        #pagge span,#pagge a{
            display: inline-block;
            width: 30px;
            height: 30px;
            /*color: #c00;*/
            text-decoration: none;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
        }
        #pagge span.current{
            background: rgb(255,68,0);
            color: #fff;
        }
    </style>
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
            <div class="user-collection">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>{$count}</small></div>
                </div>
                <hr/>
                <div class="you-like">
                    <div class="s-bar">
                        我的收藏
                    </div>
                    <div class="s-content">
                        @foreach($list as $val)
                            <div class="s-item-wrap">
                                <div class="s-item">
                                    <div class="s-pic">
                                        <a href="{{url('goods/index',['gid'=>$val['gid'],'status'=>2])}}" class="s-pic-link">
                                            <img src="{{asset('uploads')}}/{{mb_substr($val['pic'],0,10)}}/thumb350_{{mb_substr($val['pic'],11)}}" alt="{{$val['goodses']['goodsname']}}" title="{{$val['goodses']['goodsname']}}" class="s-pic-img s-guess-item-img">
                                            @if($val['goodses']['active'] != 1)
                                                <span class="tip-title">已下架</span>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="s-info">
                                        <div class="s-title"><a href="{{url('goods/index',['gid'=>$val['gid'],'status'=>2])}}" title="{{$val['goodses']['goodsname']}}">{{$val['goodses']['goodsname']}}</a></div>
                                        <div class="s-price-box">
                                            <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$val['goodes']['price']}}</em></span>
                                            <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$val['goodses']['markeprice']}}</em></span>
                                        </div>
                                        <div class="s-extra-box">
                                            <span class="s-comment">好评: {{$val['hpl']}}%</span>
                                            <span class="s-sales">月销: {{$val['goodses']['salenum']}}</span>
                                        </div>
                                    </div>
                                    <div class="s-tp">
                                        <span gid="{{$val['id']}}"  class="ui-btn-loading-before del">取消收藏</span>
                                        <i class="am-icon-shopping-cart"></i>
                                        <span gid="{{$val['id']}}" class="ui-btn-loading-before buy">加入购物车</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clear"></div>
                        <div id="pagge">{{$list->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('index.public.list')
</div>
<!--底部-->
@include('index.public.footer')
</body>
<script type="text/javascript">
    $(function(){
        $('.del').live('click',function(){
            var b=$(this);
            var gid= b.attr('gid');
            var token="{{csrf_token()}}";
            $.post("{{url('collect/del')}}}",{gid:gid,_token:token},function(res){
                if(res.code==1){
                    layer.msg(res.info,{time:1000});
                    b.parents('.s-item-wrap').hide();
                }else{
                    layer.msg(res.info,{time:1000})
                }
            })
        });
        $('.buy').live('click',function(){
            var c=$(this);
            var gid= c.attr('gid');
            $.post('{:U("Goods/AddCart")}',{gid:gid,buynum:1},function(res){
                if(res.status){
                    layer.msg('加入成功');
                }else{
                    layer.msg('服务器繁忙，请稍后再试！');
                }
            })
        })
    })
</script>
</html>