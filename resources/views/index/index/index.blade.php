<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>首页</title>
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('asset_index/css/skin.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/amazeui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.lazyload.js')}}"></script>
    <style type="text/css">
        /*搜索框*/
        #sForm{
            position: relative;
        }
        #sForm .bn,#sForm .gn{
            display: inline-block;
            position: absolute;
            top:-30px;
            height: 30px;
            line-height: 30px;
            font-size: 16px;
            text-align: center;
            width: 60px;
            border-radius: 1px;
        }
        #sForm .bn{
            left: 58px;
            background: orange;
            color: #fff;
        }
        #sForm .gn{
            left: -2px;
            background: #F03726;
            color: #fff;
        }
        /*品牌*/
        table td a img{width: 66px;height: 23px}
        .activityMain img{
            width: 296px;
            height: 418px;
        }
        .fixL{
            position: fixed;
            top:40%;
            left: 1%;
            width: 50px;
            border-radius: 3px;
            display: none;
        }
        .fixL li{
            height: 50px;
            line-height: 50px;
            font-size: 15px;
            color: #fff;
            margin: 0;
            border-radius: 50%;
            text-align: center;
            background: #b1aaaa;
        }
        .fixL li:hover{
            background: #d70b1c;
            cursor: pointer;
        }
        .fixL li.actF{
            background: #d70b1c;
            color: #fff;
        }
        /*新人专享*/
        .new_user{
            font: 12px/1.5 arial,tahoma,宋体;
        }
        .new_user {
            display: none;
            left: 40%;
            margin-left: -180px;
            margin-top: -100px;
            position: fixed;
            top: 30%;
            z-index: 1000097;
        }
        .new_user .new_pic {
            height: 455px;
            overflow: hidden;
            width: 600px;
        }
        .new_user img {
            display: block;
            height: 455px;
            width: 600px;
        }
        .new_user .new_close {
            background: url("{{url('asset_index/images/close2.png')}}") no-repeat scroll 0 0;
            cursor: pointer;
            height: 32px;
            overflow: hidden;
            position: absolute;
            right: 0;
            top: 0;
            width: 32px;
        }
        .overlay{
            background-color: #000000;
            left: 0;
            min-width: 990px;
            opacity: 0.5;
            filter:alpha(opacity=50);
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 1000096;
            height:100%;
        }
        #en:hover {
            color: red;
        }
        #re:hover {
            color: red;
        }
        #out:hover {
            color: red;
        }
    </style>
    <!--滚动新闻-->
    <style type="text/css">
        #div1 a{display:block;line-height:10px;text-decoration:none;color:#ab1e1e;font-family:Arial;font-size:10px;}
        .shell{
            width:200px;
        }
        #div1{
            height:20px;
            overflow:hidden;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            $('#out').click(function(){
                layer.confirm( '您确定退出吗？',{btn:['确定','取消'],title:'提示'},
                        function(){
                            $.get("{:U('Login/logout')}",'',function(res){
                                if(res.status==1){
                                    layer.msg(res.info, {icon : 1,time:500}, function(){
                                        location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，注册成功后返回
                                    })
                                }
                            })
                        });
            });
            //楼层导航
            $(window).scroll(function(){
                if($(document).scrollTop()>200) {
                    $('.fixL').fadeIn(600);
                }
                else{
                    $('.fixL').fadeOut(600);
                }
                if (1500>$(document).scrollTop()&&$(document).scrollTop()>1000) {
                    $('.floor1').addClass('actF').siblings().removeClass('actF');
                }
                else if (2000>$(document).scrollTop()&&$(document).scrollTop()>1500) {
                    $('.floor2').addClass('actF').siblings().removeClass('actF');
                }
                else if (2575>$(document).scrollTop()&&$(document).scrollTop()>2050) {
                    $('.floor3').addClass('actF').siblings().removeClass('actF');
                }
                else if ($(document).scrollTop()>2575) {
                    $('.floor4').addClass('actF').siblings().removeClass('actF');
                }
            });
            $('.floor1').click(function(){
                $(this).addClass('actF').siblings().removeClass('actF');
                $(document).scrollTop(1000)
            });
            $('.floor2').click(function(){
                $(this).addClass('actF').siblings().removeClass('actF');
                $(document).scrollTop(1500)
            });
            $('.floor3').click(function(){
                $(this).addClass('actF').siblings().removeClass('actF');
                $(document).scrollTop(2050)
            });
            $('.floor4').click(function(){
                $(this).addClass('actF').siblings().removeClass('actF');
                $(document).scrollTop(2575)
            });
            $('img.lazy').lazyload();
        })
    </script>
</head>
<body>
<div class="new_user"  id="new_user">
    <div class="new_pic">
        <a target="_blank" href="{{url('newperson/index')}}">
            <img alt="" src="{{url('asset_index/images/bgk1.png')}}">
        </a>
    </div>
    <span class="new_close" onclick="hideNewUser()"></span>
</div>
<div class="overlay" id="overlay"></div>
<div class="hmtop">
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd">
                    @if($info['mid']>0)
                        <li>
                            亲爱的{{$info['username']}}，欢迎光临优惠易购，
                            <a id="out" class="red" style=" cursor: pointer">退出</a>
                        </li>
                    @else
                        亲，请<a id="en" href="{:U('Login/login')}" target="_blank" class="h">登录</a>
                        免费<a id="re" href="{:U('Login/register')}" target="_blank">注册</a>
                    @endif
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage home">
                <div class="menu-hd"><a href="{{url('index/index')}}" target="_blank" class="h">商城首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                @if($info['mid']>0)
                    <div class="menu-hd MyShangcheng"><a href="{:U('MemberCenter/index')}" target="_blank"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                @else
                    <div class="menu-hd MyShangcheng"><a href="{:U('Login/login')}" target="_blank"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                @endif
            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="{:U('Cart/index')}" target="_blank"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
            </div>
            <div class="topMessage favorite">
                <div class="menu-hd"><a href="{:U('Collection/index')}" target="_blank"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>

            </div>
            <div class="topMessage dz">
                <div class="menu-hd"><a href="{:U('Location/index')}" target="_blank"><i class=""></i><span>联系我们</span></a></div>
            </div>
        </ul>
    </div>

    <!--悬浮搜索框-->
    <div class="nav white">
        <div class="logoBig">
            <li><img src="{{asset('asset_index/images/logo3.png')}}" /></li>
        </div>
        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="#"></a>
            <form action="{:U('Search/name')}" method="get" id="sForm">
                <span class="gn">宝贝</span>
                <span class="bn">品牌</span>
                <input id="searchInput" name="keyword" type="text" value="" placeholder="请输入商品名称" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="banner">
    <!--轮播 -->
    <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
        <ul class="am-slides">
            @foreach($advertise as $k=>$v)
                @if($v['location']==0)
                    <li class="banner{{$k+1}}"><a href="{:U('bannerGg',array('cname'=>$vol['content']))}"><img src="{{url('uploads')}}/{{$v['images']}}" /></a></li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="shopNav">
    <div class="slideall">
        <div class="long-title"><span class="all-goods">全部分类</span></div>
        <div class="nav-cont">
            <ul>
                <li class="index"><a href="{{url('index/index')}}">首页</a></li>
                <li class="qc"><a href="{:U('Nav/tj')}">推荐</a></li>
                <li class="qc" ><a href="{{url('newperson/index')}}" target="_blank" style="width: 120px;height: 36px;">新人专享<img style="position: absolute;" src="{{asset('asset_index/images/hot.gif')}}"/></a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b><a style="color:#fcff00" href="{{url('integral/index')}}">积分商城</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>

        <!--侧边导航 -->
        <div id="nav" class="navfull">
            <div class="area clearfix">
                <div class="category-content" id="guide_2">
                    <div class="category">
                        <ul class="category-list" id="js_climit_li">
                            @foreach($category as $v)
                                <li class="appliance js_toggle relative first">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="{{asset('asset_index/images/cake.png')}}"></i><a class="ml-22" title="" href="{{url('search/category',['id'=>$v['id']])}}">{{$v['categoryname']}}</a></h3>
                                        <em>&gt;</em>
                                    </div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><a title="" href="{{url('search/category',['id'=>$v['id']])}}"><span title="">{{$v['categoryname']}}</span></a></dt>
                                                            @foreach($v['child'] as $v1)
                                                                <dd><a title="" href="{{url('search/category',['id'=>$v1['id']])}}"><span>{{$v1['categoryname']}}</span></a></dd>
                                                            @endforeach
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--轮播-->
        <script type="text/javascript">
            $(function() {
                $('.am-slider').flexslider();
            });
            $(document).ready(function() {
                $("li").hover(function() {
                    $(".category-content .category-list li.first .menu-in").css("display", "none");
                    $(".category-content .category-list li.first").removeClass("hover");
                    $(this).addClass("hover");
                    $(this).children("div.menu-in").css("display", "block")
                }, function() {
                    $(this).removeClass("hover")
                    $(this).children("div.menu-in").css("display", "none")
                });
            })
        </script>
        <!--小导航 -->
        <div class="am-g am-g-fixed smallnav">
            <div class="am-u-sm-3">
                <a href="sort.html"><img src="{{url('asset_index/images/navsmall.jpg')}}" />
                    <div class="title">商品分类</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('asset_index/images/huismall.jpg')}}" />
                    <div class="title">大聚惠</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('asset_index/images/mansmall.jpg')}}" />
                    <div class="title">个人中心</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('asset_index/images/moneysmall.jpg')}}" />
                    <div class="title">投资理财</div>
                </a>
            </div>
        </div>

        <!--走马灯 -->
        <div class="marqueen" >
            <span class="marqueen-title">商城头条</span>
            <div class="demo" >
                <div class="shell">
                    <div id="div1">
                        @foreach($advertise as $v)
                            @if($v['location']==2)
                                <li class="title-first">
                                    <a target="_blank" href="{:U('gg',array('cname'=>$v['content']))}">
                                        <span>[特惠]</span>{{$v['title']}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!--品牌开始-->
                <div id=link_logo style="OVERFLOW: hidden; WIDTH: 175px; HEIGHT: 275px;margin-top: 10px;">
                    <div id=link_logo1 style="OVERFLOW: hidden">
                        <table cellspacing=0 cellpadding=0 width=175  border=1>
                            <tbody>
                            @foreach($brand as $v)
                                <tr>
                                    <td valign=top align=middle height=33>
                                        <table cellspacing=0 cellpadding=0 border=0>
                                            <tbody>
                                            <tr>
                                                <td align=middle><a href="{:U('Search/brand')}?keyword={$valB['brandname']}" target=_blank><img class="img" alt="" src="{{url('uploads/logo')}}/{{$v['logo']}}" border=0></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id=link_logo2></div>
                </div>
                <!--品牌结束-->
                <div style="margin-left: 10px"><img style=" " src="{{asset('asset_index/images/tt.png')}}" alt=""></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
        if ($(window).width() < 640) {
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-39px"
                }, 500, function() {
                    $(this).css({
                        marginTop: "0px"
                    }).find("li:first").appendTo(this);
                })
            }
            $(function() {
                setInterval('autoScroll(".demo")', 3000);
            })
        }
    </script>
</div>
<div class="shopMainbg">
    <div class="shopMain" id="shopmain">
        <!--今日推荐 -->
        <div class="am-g am-g-fixed recommendation">
            <div class="clock am-u-sm-3" >
                <img src="{{asset('asset_index/images/2016.png')}}">
                <p>今日<br>促销</p>
            </div>
            @foreach($advertise as $v)
                @if($v['location']==1)
                    <div class="am-u-sm-4 am-u-lg-3 ">
                        <div class="info ">
                            <h3>{{$v['content']}}</h3>
                        </div>
                        <div class="recommendationMain one">
                            <a href="{{url('index/promotion',['id'=>$v['id']])}}"><img src="{{url('uploads')}}/{{$v['images']}}"></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="clear "></div>
        <!--热门活动 -->
        <div class="am-container activity">
            <div class="shopTitle ">
                <h4>活动</h4>
                <h3>每期活动 优惠享不停 </h3>
            </div>
            <div class="am-g am-g-fixed ">
                @foreach($activity as $v)
                    <a href="{{url('active/index',['id'=>$v['id']])}}">
                        <div class="am-u-sm-3 ">
                            <div class="icon-sale one "></div>
                            <h4>{{$v['activityname']}}</h4>
                            <div class="activityMain ">
                                <img src="{{url('uploads')}}/{{$v['img']}}">
                            </div>
                            <div class="info ">
                                <h3>{{$v['content']}}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="clear "></div>
        @foreach($category as $k=>$v)
            @if($k==4)
                @break
            @endif
            <div id="f{{$k+1}}">
                <!--甜点-->
                <div class="am-container ">
                    <div class="shopTitle ">
                        <h4>{{$v['categoryname']}}</h4>
                        <span class="more ">
                            <a href="{:U('Search/category',array('keyword'=>$v['categoryname']))}">更多产品<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                    </div>
                </div>

                <div class="am-g am-g-fixed floodFour">
                    <div class="am-u-sm-5 am-u-md-4 text-one list ">
                        <div class="word" style="">
                            @foreach($v['child'] as $k1=>$v1)
                                <a class="outer" href=""><span class="inner"><b class="text">{{$v1['categoryname']}}</b></span></a>
                            @endforeach
                        </div>
                        <a href="# ">
                            <div class="outer-con ">
                                <div class="title ">
                                    超优汇
                                </div>
                                <div class="sub-title ">
                                    品质生活
                                </div>
                            </div>
                            <img src="{{asset('asset_index/images')}}/wu{{$k+1}}.png"/>
                        </a>
                        <div class="triangle-topright"></div>
                    </div>
                    @foreach($v['goodslist'] as $val)
                        <div class="am-u-sm-7 am-u-md-4 text-two" >
                            <a href="{{url('goods/index',['gid'=>$val['id'],'status'=>3])}}"><img class="lazy" data-original="{{url('uploads')}}/{{$val['pic']}}" src="{{asset('asset_index/images/loading.gif')}}" width="180" height="180"/></a>
                            <div class="outer-con ">
                                <div class="title ">
                                    {{mb_substr($val['goodsname'],0,20,'utf-8')}}
                                </div>
                                <div class="sub-title ">
                                    ¥{{$val['price']}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clear "></div>
            </div>
        @endforeach
        @include('index.public.footer')
    </div>
</div>
@include('index.public.tip')
<div class="fixL">
    <ul>
        <li class="floor1">1F</li>
        <li class="floor2">2F</li>
        <li class="floor3">3F</li>
        <li class="floor4">4F</li>
    </ul>
</div>
<!--悬浮搜索框-->
<div id="xuanfu">
    <div class="xfC">
        <div class="xfLogo">
            <img height="50" src="{{asset('asset_index/images/logo3.png')}}" alt="优汇易购"/>
        </div>
        <div class="xfSearch">
            <form action="{:U('Search/name')}" method="get" id="xfForm">
            <span class="xfactive"><span class="activv">宝贝</span>
            <span class="xfbn">宝贝</span>
            <span class="xfpp">品牌</span>
            </span>
                <!--<input type="hidden" name="actS"/>-->
                <input id="xfsearchInput" name="keyword" type="text" value="{$keyword}" placeholder="请输入商品名称" autocomplete="off">
                <input id="xfai-topsearch" class="submit am-btn"  value="搜索"  type="submit">
            </form>
        </div>
    </div>
</div>
<!--<script>-->
<!--window.jQuery || document.write('<script src="basic/{{asset('asset_index/js/jquery.min.js')}}"></script>');-->
<!--</script>-->
<script type="text/javascript " src="{{asset('asset_index/js/quick_links.js')}}"></script>
<!--品牌滚动-->
<script type="text/javascript">
    var speed=65;
    link_logo2.innerHTML=link_logo1.innerHTML;
    function Marquee2(){
        if(link_logo2.offsetTop-link_logo.scrollTop<=0)
            link_logo.scrollTop-=link_logo1.offsetHeight;
        else{
            link_logo.scrollTop++;
        }
    }
    var MyMar2=setInterval(Marquee2,speed);
    link_logo.onmouseover=function() {clearInterval(MyMar2)}
    link_logo.onmouseout=function() {MyMar2=setInterval(Marquee2,speed)}
</script>
<script type="text/javascript ">
    $(function(){
        $('#sForm').submit(function(){
            if($('#searchInput').val()==''){
                $('#searchInput').val('电视');
                $('#sForm').submit();
            }else{
                $('#sForm').submit();
            }
        });
        $('#sForm .gn').click(function(){
            $('#ai-topsearch').css('background','#F03726');
            $('.search-bar form').css('border','2px solid #F03726');
            $('#sForm').attr('action','{:U("Search/name")}');
            $('#searchInput').attr('placeholder','请输入商品名称')
        });
        $('#sForm .bn').click(function(){
            $('#ai-topsearch').css('background','orange');
            $('.search-bar form').css('border','2px solid orange');
            $('#sForm').attr('action','{:U("Search/brand")}');
            $('#searchInput').attr('placeholder','请输入品牌名称')
        });
        //悬浮
        $('#xfForm').submit(function(){
            if($('#xfsearchInput').val()==''){
                $('#xfsearchInput').val('电视');
                $('#xfForm').submit();
            }else{
                $('#xfForm').submit();
            }
        });
        $('.xfbn').click(function(){
            $('#xfai-topsearch').css('background','#F03726');
            $('.xfSearch').css('border','2px solid #F03726');
            $('#xfForm').attr('action','{:U("Search/name")}');
            $('#xfsearchInput').attr('placeholder','请输入商品名称');
            $('.activv').text('宝贝');
        });
        $('.xfpp').click(function(){
            $('#xfai-topsearch').css('background','orange');
            $('.xfSearch').css('border','2px solid orange');
            $('#xfForm').attr('action','{:U("Search/brand")}');
            $('#xfsearchInput').attr('placeholder','请输入品牌名称');
            $('.activv').text('品牌');
        });
        $(window).scroll(function(){
            if($(window).scrollTop()>300){
                $('#xuanfu').show();
            }else{
                $('#xuanfu').hide();
            }
        })
    })
</script>
<!-- 滚动新闻-->
<script type="text/javascript">
    var gf=true;
    $('#div1').mouseenter(function(){
        gf=false;
    }).mouseleave(function(){
        gf=true;
    });
    var i=1;
    function a(){
        if(gf){
            if($('#div1').scrollTop()>120){
                $('#div1').scrollTop(1);
                i=1;
            }else{
                i++;
                $('#div1').scrollTop(i);
            }
        }
    }
    setInterval(a,60)
</script>
</body>
</html>
<script  type="text/javascript">
    $(function() {
        var is_first = getCookie("is_first");
        if (is_first != 1) {
            showNewUser();
            var time = getTodayOtherTime(); //每天一次
            //alert(time);
            setCookie("is_first", 1, time);//3600 * 24 有效期一天
        } else {
            hideNewUser();
        }
    })
    function showNewUser() {
        var document_height = $(document).height();
        var window_height = $(window).height();
        var height = document_height > window_height ? document_height : window_height;
        $("#overlay").css({"height": height, "display": "block"})
        $("#new_user").show();
    }
    function hideNewUser() {
        $("#new_user").hide();
        $("#overlay").css({"display": "none"})
    }
    //设置cookies函数
    function setCookie(name, value, time) { //name:cookie键名，value:cookie键值,和时间S
        var exp = new Date();
        exp.setTime(exp.getTime() + time * 1000);//有效期1小时
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    }

    //取cookies函数
    function getCookie(name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null)
            return unescape(arr[2]);
        return null;
    }

    //删除cookies
    function delCookie(name) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval = getCookie(name);
        if (cval != null)
            document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
    }

    //从当前时间到明日0点的时间戳
    function getTodayOtherTime() {
        var today = new Date();
        today.setHours(0);
        today.setMinutes(0);
        today.setSeconds(0);
        today.setMilliseconds(0);
        //明日0点时间戳
        var tomorrow_0 = today.getTime() / 1000 + (1 * 3600);
        var current_time = Math.round(new Date().getTime() / 1000);
        var expire = tomorrow_0 - current_time;
        return expire;
    }
</script>