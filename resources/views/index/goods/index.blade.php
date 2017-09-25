<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>商品详情页</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link type="text/css" href="{{asset('asset_index/css/optstyle.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset_index/css/style.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" />
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/quick_links.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.imagezoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/list.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/linkage.js')}}"></script>
    <style type="text/css">
        .pagin{margin-top: 15px;}
        .paginList{display:block;float: right}
        .paginList a,.paginList span{display: inline-block;width:30px;height:30px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 30px;background: #f43838;  color:#fff;  border: 1px solid #c2d2d7;border-radius: 3px  }
        .paginList a:hover{background: #666666;}
        .paginList span{background: #c0c0c0;color: #fff;font-weight: bold;}
        .footpage{width: 250px;float: left;height:25px;font-size: 16px;}
    </style>
    <script type="text/javascript">
        $(function(){
            //省市级三级联动
            setup();
            preselect('河南省');
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".jqzoom").imagezoom();
            $("#thumblist li a").click(function() {
                $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
            });
            //购买数量限制
            //获得文本框对象
            var t = $("#text_box");
            //初始化数量为1,并失效减
            $('#min').attr('disabled', true);
            //数量增加操作
            if($('input[name="cut"]').val()){
                $('#add').attr('disabled',true);
            }else{
                $("#add").click(function() {
                    if(parseInt(t.val())<parseInt($('.stock').text())){
                        t.val(parseInt(t.val()) + 1)
                    }else{
                        $(this).attr('disabled', false);
                        layer.msg('购买量达到上限!',{time:800})
                    }
                    if (parseInt(t.val()) != 1) {
                        $('#min').attr('disabled', false);
                    }
                })
            }
            //数量减少操作
            $("#min").click(function() {
                t.val(parseInt(t.val()) - 1);
                if (parseInt(t.val()) == 1) {
                    $('#min').attr('disabled', true);
                }
            });
        });
    </script>
</head>
<body>
<!--顶部导航条 -->
@include('index.public.header')
<b class="line"></b>
<div class="listMain">
    <!--分类-->
    <div class="nav-table">
        <div class="long-title"><span class="all-goods">全部分类</span></div>
        <div class="nav-cont">
            <ul>
                <li class="index"><a href="{{url('index/index')}}">首页</a></li>
                <li class="qc"><a href="{:U('Nav/tj')}">推荐</a></li>
                <li class="qc"><a href="{:U('Newperson/index')}" style="width: 120px;height: 36px;">新人专享<img style="position: absolute;" src="{{url('asset_index/images/hot.gif')}}"/></a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b><a style="color:#fcff00" href="{{url('integral/index')}}">积分商城</a>
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <ol class="am-breadcrumb am-breadcrumb-slash">
        <li><a href="{{url('index/index')}}">首页</a></li>
        <li class="am-active">内容</li>
    </ol>
    <script type="text/javascript">
        $(function() {});
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <div class="scoll">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="{{asset('asset_index/images/01.jpg')}}" title="pic" />
                    </li>
                    <li>
                        <img src="{{asset('asset_index/images/02.jpg')}}" />
                    </li>
                    <li>
                        <img src="{{asset('asset_index/images/03.jpg')}}" />
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <!--放大镜-->
    <div class="item-inform">
        <div class="clearfixLeft" id="clearcontent">
            <div class="box">
                <div class="tb-booth tb-pic tb-s310">
                    <a href="{{asset('asset_index/images/01.jpg')}}">
                        <img src="{{url('uploads')}}/{{mb_substr($info['pic'],0,11)}}thumb800_{{mb_substr($info['pic'],11)}}" alt="细节展示放大镜特效" rel="{{url('uploads')}}/{{mb_substr($info['pic'],0,11)}}thumb350_{{mb_substr($info['pic'],11)}}" class="jqzoom" />
                    </a>
                </div>
                <ul class="tb-thumb" id="thumblist">
                    @foreach($info['getPic'] as $k=>$v)
                        @if($k==0)
                            <li class="tb-selected">
                        @else
                            <li class="">
                        @endif
                            <div class="tb-pic tb-s40">
                                <a href="javascript:;"><img src="{{url('uploads')}}/{{mb_substr($v['picname'],0,11)}}thumb100_{{mb_substr($info['pic'],11)}}" mid="{{url('uploads')}}/{{mb_substr($v['picname'],0,11)}}thumb350_{{mb_substr($v['picname'],11)}}" big="{{url('uploads')}}/{{mb_substr($v['picname'],0,11)}}thumb800_{{mb_substr($v['picname'],11)}}"></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <form action="{:U('Order/index')}" class="theme-signin" id="loginForm" name="loginform" method="get">
            <input type="hidden" name="gid" value="{:I('get.gid')}"/>
            <input type="hidden" name="cut" value="{:I('get.cut')}"/>
            <div class="clearfixRight">
                <!--规格属性-->
                <!--名称-->
                <div class="tb-detail-hd">
                    <h1>{{$info['goodsname']}}</h1>
                </div>
                <div class="tb-detail-list">
                    <!--价格-->
                    <div class="tb-detail-price">
                        @if($status==1)
                            <li class="price iteminfo_price">
                                <dt>所需积分</dt>
                                <dd><em></em><b class="sys_item_price">{{$info['getIntegral']['needJF']}}</b></dd>
                            </li>
                        @elseif($status==2)
                            <li class="price iteminfo_price">
                                <dt>首单专享价 </dt>
                                <dd><em>￥</em><b class="sys_item_price">{$cutprice}</b></dd>
                                <dd>&nbsp;&nbsp;<b style="font-size:18px;position: relative;color: #005EA7">超优惠!<i style="color: red;position:absolute;top:-9px;font-size: 15px;">hot</i></b></dd>
                            </li>
                            <li class="price iteminfo_mktprice">
                                <dt>促销价</dt>
                                <dd><em>￥</em><b class="sys_item_mktprice">{{$info['price']}}</b></dd>
                            </li>
                        @else($status==3)
                            <li class="price iteminfo_price">
                                <dt>促销价</dt>
                                <dd><em>￥</em><b class="sys_item_price">{{$info['price']}}</b></dd>
                            </li>
                            <li class="price iteminfo_mktprice">
                                <dt>原价</dt>
                                <dd><em>￥</em><b class="sys_item_mktprice">{{$info['markeprice']}}</b></dd>
                            </li>
                        @endif
                        <div class="clear"></div>
                    </div>
                    <!--地址-->
                    <dl class="iteminfo_parameter freight">
                        <dt>配送至</dt>
                        <select class="select" name="province" id="s1" style="width: 80px;">
                            <option></option>
                        </select>
                        <select class="select" name="city" id="s2" style="width:80px;">
                            <option></option>
                        </select>
                        <select class="select" name="town" id="s3" style="width:80px;">
                            <option></option>
                        </select>
                        <!--<input id="address" name="address" type="hidden" value="" />
                        <input onclick="alert(document.getElementById('address').value); return false;" type="submit" value="确定" />-->
                    </dl>
                    <div class="clear"></div>
                    <!--销量-->
                    <ul class="tm-ind-panel">
                        <li class="tm-ind-item tm-ind-sellCount canClick">
                            <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{$info['salenum']}}</span></div>
                        </li>
                        <li class="tm-ind-item tm-ind-sumCount canClick">
                            <div class="tm-indcon"><span class="tm-label"></span><span class="tm-count"></span></div>
                        </li>
                        <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                            <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">{{count($info['getComment'])}}</span></div>
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <!--各种规格-->
                    <dl class="iteminfo_parameter sys_item_specpara">
                        <dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
                        <dd>
                            <!--操作页面-->
                            <div class="theme-popover-mask"></div>
                            <div class="theme-popover">
                                <div class="theme-span"></div>
                                <div class="theme-poptit">
                                    <a href="javascript:;" title="关闭" class="close">×</a>
                                </div>
                                <div class="theme-popbod dform">
                                    <div class="theme-signin-left">
                                        <div class="theme-options">
                                            <div class="cart-title">颜色</div>
                                            <ul>
                                                <li class="sku-line selected">白色<i></i></li>
                                                <li class="sku-line">黑色<i></i></li>
                                                <li class="sku-line">红色<i></i></li>
                                                <li class="sku-line">灰色<i></i></li>
                                                <input type="hidden" name="color" value="白色"/>
                                            </ul>
                                        </div>
                                        <div class="theme-options">
                                            <div class="cart-title">型号</div>
                                            <ul>
                                                <li class="sku-line selected">XL01<i></i></li>
                                                <li class="sku-line">XL02<i></i></li>
                                                <li class="sku-line">XL03<i></i></li>
                                                <input type="hidden" name="model" value="XL01"/>
                                            </ul>
                                        </div>
                                        <div class="theme-options">
                                            <div class="cart-title number">数量</div>
                                            <dd>
                                                @if($status==1)
                                                    <input id="text_box" name="buynum" type="text" readonly value="1" style="width:30px;text-align: center" />
                                                @else
                                                    <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
                                                    <input readonly id="text_box" name="buynum" type="text" value="1" style="width:30px;text-align: center" />
                                                    <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
                                                @endif
                                                    <span id="stock" class="tb-hidden">库存<span class="stock">{{$info['num']}}</span>件</span>
                                                    <a href="javascript:;" class="collBtn">收藏宝贝</a>
                                            </dd>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </dl>
                </div>
                <input type="hidden" name="jf" value="{:I('get.jf')}"/>
                <div class="pay">
                    <li>
                        <div class="clearfix tb-btn tb-btn-buy theme-login">
                            @if($status==1)
                                <a id="LikBuy" href="javascript:;" onclick="layerUser()">立即兑换</a>
                            @else
                                <a id="LikBuy" href="javascript:;" onclick="layerUser()">立即购买</a>
                            @endif
                        </div>
                    </li>
                    @if($status != 1)
                        <li>
                            <div class="clearfix tb-btn tb-btn-basket theme-login">
                                <a id="LikBasket" href="javascript:;" onclick="AddCart()"><i></i>加入购物车</a>
                            </div>
                        </li>
                    @endif
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div style="width: 1200px;margin: 10px auto;">
        <div class="bdsharebuttonbox" style="float: left;width: 150px">
            <a href="#" class="bds_more" data-cmd="more"></a>
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
        </div>
    </div>
    <!-- introduce-->
    <hr/>
    <div class="introduce" style="margin-top: 50px;">
        <div class="browse">
            <div class="mc">
                <ul>
                    <div class="mt">
                        <h2>同类电器</h2>
                    </div>
                    @foreach($similar as $v)
                        <li class="first">
                            <div class="p-img">
                                <a  href="#"> <img class="" src="{{url('uploads')}}/{{mb_substr($v['pic'],0,11)}}thumb350_{{mb_substr($v['pic'],11)}}" style="width: 194px;height:194px;"> </a>
                            </div>
                            <div class="p-name"><a href="{:U('Index/index')}">
                                    {{$v['goodsname']}}
                                </a>
                            </div>
                            <div class="p-price"><strong>￥{{$v['price']}}</strong></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="introduceMain">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">
                        <a href="#"><span class="index-needs-dt-txt">宝贝详情</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="index-needs-dt-txt">全部评价</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="index-needs-dt-txt">猜你喜欢</span></a>
                    </li>
                </ul>
                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active">
                        <div class="J_Brand">
                            <div class="attr-list-hd tm-clear">
                                <h4>商品参数：</h4></div>
                            <div class="clear"></div>
                            <ul id="J_AttrUL">
                                <li title="">颜色:&nbsp;银色</li>
                                <li title="">制冷方式:&nbsp;直冷</li>
                                <li title="">日耗电量:&nbsp;0.69</li>
                                <li title="">日冷冻能力:&nbsp;5.5千克</li>
                                <li title="">总有效容积:&nbsp;330升</li>
                                <li title="">面板类型:&nbsp;不锈钢拉丝</li>
                                <li title="">产品标准号:&nbsp;GB/T 22165</li>
                                <li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
                                <li title="">控温方式:&nbsp;机械控温</li>
                                <li title="">国家能效等级：&nbsp;1级</li>
                                <li title="">除霜模式：&nbsp;自动</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="details">
                            <div class="attr-list-hd after-market-hd">
                                <h4>商品细节</h4>
                            </div>
                            <div class="twlistNews">
                                @foreach($info['getPic'] as $v)
                                    <img src="{{url('uploads')}}/{{mb_substr($v['picname'],0,11)}}thumb800_{{mb_substr($v['picname'],11)}}"/>
                                @endforeach
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="am-tab-panel am-fade">
                        <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="175" class="jud_per">
                                    <p name="good">{{round($num['num1'],2)}}%</p>好评度
                                </td>
                                <td width="300">
                                    <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="90" name="good">好评<font color="#999999">（{{round($num['num1'],2)}}%）</font></td>
                                            <td><div style="height: 13px;background: red;float: left;width: {{$num['num1']*3/2}}px;"></div>
                                                <div style="height: 13px;background: #DADADA;float: left;width: {{-$num['num1']*3/2+150}}px;"></div>
                                            </td>
                                            <td>{{round($num['num1'],2)}}%</td>
                                        </tr>
                                        <tr>
                                            <td>中评<font color="#999999" name="normal">（{{round($num['num2'],2)}}%）</font></td>
                                            <td><div style="width: {{$num['num2']*3/2}}px;height: 13px;background: red;float: left"></div>
                                                <div style="width: {{-$num['num2']*3/2+150}}px;height: 13px;background: #DADADA;float: left"></div>
                                            </td>
                                            <td>{{round($num['num2'],2)}}%</td>
                                        </tr>
                                        <tr>
                                            <td>差评<font color="#999999" name="bad">（{{round($num['num3'],2)}}%）</font></td>
                                            <td><div style="width: {{$num['num3']*3/2}}px;height: 13px;background: red;float: left"></div>
                                                <div style="width: {{-$num['num3']*3/2+150}}px;height: 13px;background: #DADADA;float: left"></div>
                                            </td>
                                            <td>{{round($num['num3'],2)}}%</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="200" class="jud_bg">
                                    亲，好评度是衡量一件商品的质量是否可靠,其也是在购买商品时的一种参考!
                                </td>
                            </tr>
                        </table>
                        <!-- <div class="actor-new">
                             <div class="rate">
                                 <strong>100<span>%</span></strong><br> <span>好评度</span>
                             </div>
                             <dl>
                                 <dt>买家印象</dt>
                                 <dd class="p-bfc">
                                             <q class="comm-tags"><span>颜色不错</span><em>(217)</em></q>
                                             <q class="comm-tags"><span>降温快</span><em>(186)</em></q>
                                             <q class="comm-tags"><span>很省电</span><em>(189)</em></q>
                                             <q class="comm-tags"><span>商品很棒</span><em>(189)</em></q>
                                             <q class="comm-tags"><span>节能</span><em>(488)</em></q>
                                             <q class="comm-tags"><span>绿色环保</span><em>(192)</em></q>
                                             <q class="comm-tags"><span>价格优惠</span><em>(119)</em></q>
                                             <q class="comm-tags"><span>特价买的</span><em>(65)</em></q>
                                             <q class="comm-tags"><span>质量很ok</span><em>(31)</em></q>
                                 </dd>
                              </dl>
                         </div>	-->
                        <div class="clear"></div>
                        <div class="tb-r-filter-bar">
                            <ul class=" tb-taglist am-avg-sm-4">
                                <li class="tb-taglist-li tb-taglist-li-current">
                                    <div class="comment-info">
                                        <span>全部评价</span>
                                        <span class="tb-tbcr-num">({{count($info['getComment'])}})</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-1">
                                    <div class="comment-info">
                                        <span>好评</span>
                                        <span class="tb-tbcr-num">({{$num['num1']}})</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-0">
                                    <div class="comment-info">
                                        <span>中评</span>
                                        <span class="tb-tbcr-num">({{$num['num2']}})</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li--1">
                                    <div class="comment-info">
                                        <span>差评</span>
                                        <span class="tb-tbcr-num">({{$num['num3']}})</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <ul class="am-comments-list am-comments-list-flip">
                            @foreach($info['getComment'] as $v)
                                <li class="am-comment">
                                    <!-- 评论容器 -->
                                    <a href="">
                                        @if($v['touxiang'] && file_exists('uploads/'.$v['touxiang']))
                                            <img class="am-comment-avatar" src="{{url('uploads')}}/{{$v['touxiang']}}" />
                                        @else
                                            <img class="am-comment-avatar" src="{{url('asset_index/images/hwbn40x40.jpg')}}" />
                                        @endif
                                        <!-- 评论者头像 -->
                                    </a>
                                    <div class="am-comment-main">
                                        <!-- 评论内容容器 -->
                                        <header class="am-comment-hd">
                                            <!--<h3 class="am-comment-title">评论标题</h3>-->
                                            <div class="am-comment-meta">
                                                <!-- 评论元数据 -->
                                                <a href="#link-to-user" class="am-comment-author">{{$v['username']}}</a>
                                                <!-- 评论者 -->
                                                评论于
                                                <time datetime="">{{date('Y-m-d H:i:s',$v['edittime'])}}</time>
                                            </div>
                                        </header>
                                        <div style="padding:0 13px;">
                                            <img style="width: 60px;height: 60px;margin:0 5px;border:1px solid #ccc;" src="{{url('uploads')}}/{{mb_substr($info['pic'],0,11)}}thumb100_{{mb_substr($info['pic'],11)}}"/>
                                            <span style="display: inline-block;height: 45px;font-size: 18px;width: 500px;">{{$info['goodsname']}}</span>
                                        </div>
                                        <div class="am-comment-bd">
                                            <div class="tb-rev-item " data-id="255776406962">
                                                <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                    {{$v['content']}}
                                                </div>
                                                @if($v['responst'])
                                                    <div class="J_TbcRate_ReviewContent tb-tbcr-content " style="color: #c2c2c2">回复:
                                                        {{$v['response']}}
                                                    </div>
                                                @endif
                                                <div class="tb-r-act-bar" style="font-size: 12px;color:#999;">
                                                    {{$v['status']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="clear"></div>
                        <!--分页 -->
                        {{--<div class="pagin">
                            <div class="footpage">共<i class="blue" style="color: #0077cc;font-size: 14px;">{{count($info['getComment'])}}</i>条记录，当前显示第&nbsp;<i class="blue" style="color: #0077cc;font-size: 14px;">{{$info['getComment']->currentPage()}}&nbsp;</i>页</div>
                            <ul class="paginList">
                                {{$info->getComment->links()}}
                            </ul>
                        </div>--}}
                        <div class="clear"></div>
                        <div class="tb-reviewsft">
                            <div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
                        </div>
                    </div>
                    <div class="am-tab-panel am-fade">
                        <div class="like">
                            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                @foreach($like as $v)
                                    <li>
                                        <a href="{{url('goods/index',['gid'=>$v['id'],'status'=>3])}}">
                                            <div class="i-pic limit">
                                                <img style="width: 215px;cursor: pointer" src="{{url('uploads')}}/{{mb_substr($v['pic'],0,11)}}thumb350_{{mb_substr($v['pic'],11)}}"/>
                                                <p>{{$v['goodsname']}}
                                                    <span>{{$v['hot']}}</span></p>
                                                <p class="price fl">
                                                    <b>¥</b>
                                                    <strong>{{$v['price']}}</strong>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <!--分页 -->
                        <div class="pagin">
                            <div class="footpage" style="float: left">共<i class="blue" style="color: #0077cc;font-size: 14px;">{{$like->total()}}</i>条记录，当前显示第&nbsp;<i class="blue" style="color: #0077cc;font-size: 14px;">{{$like->currentPage()}}&nbsp;</i>页</div>
                            <ul class="paginList">
                                {{$like->links()}}
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@include('index.public.tip')
@include('index.public.footer')
</body>
</html>
<script type="text/javascript">
    flag=true;
    $('.layui-layer-ico').live('click',function(){
        flag=true;
    });
    function layerUser() {
        if ("{:I('session.mid')}") {
            $('#loginForm').submit();
        } else {
            if (flag) {
                flag = false;
                layer.open({
                    type: 1,
                    shade: false,
                    title: '您尚未登录',
                    content: "<div id='layerform' style='width: 360px;height:180px;'>" +
                    "<form action='#?act=layeruser' method='post' id='layerForm'>" +
                    "<dl>" +
                    "<dd><div style=''><span style='font-size: 20px'>优汇会员</span><span style='float: right;margin-right: 50px;'><a href='{:U('Login/register')}' style='font-size: 18px;color:#b61d1d;'>立即注册</a></span></div>" +
                    "<dd><div id='public_null' style='width: 2px;height:20px;'></div></dd>" +
                    "<dd><div id='public_pwd' style='width:210px;height:20px;line-height: 20px;background:#ffe57d;text-align:center;margin-left: 48px;margin-bottom: 4px;display: none'>公共场所不建议自动登录!</div></dd>" +
                    "<dd><span style='font-size: 16px;'>用户名</span><input style='width: 210px;height:40px;padding: 0 8px;' type='text' name='username' placeholder='邮箱/用户名/已验证手机'/></dd>" +
                    "<dd><br></dd>" +
                    "<dd><span style='font-size: 16px;display: inline-block;width: 48px;'>密&nbsp;&nbsp;&nbsp;码</span><input style='width: 210px;height:40px;padding: 0 8px;' type='text' name='password' placeholder='密码'/><span style='display:none;position: absolute;top:165px;left:95px;height:25px; width:140px;line-height: 25px;font-size: 14px;color:red;'>输入的密码不正确</span></dd>" +
                    "<dd><br></dd>" +
                    "<dd><div style='line-height: 21px;'><input class='auto_login' type='checkbox' style='height:16px'/><span style='font-size: 14px;cursor: pointer;'>&nbsp;自动登录</span><span class='forgetpass' style='float: right;margin-right: 50px;'><a href='{:U('Login/forgetPwd')}' style='font-size: 14px;'>忘记密码?</a></span></div>" +
                    "<dd style='position:relative;top:-25px;'><button class='qwer' style='display: block;border:0;width: 262px;height:40px;margin-top:30px; color: #fff;font-size: 20px; background: #F00;cursor: pointer'>登 录</button></dd>" +
                    "</dl>" +
                    "</form>" +
                    "<div style='margin-left:92px;color:#9C9C9C'>使用合作网站账号登录汇购</div>" +
                    "<div style='margin-left:130px;'><a>QQ</a>|<a>微信</a>|<a>支付宝</a></div>" +
                    "</div>"
                });
                $('.layui-layer-content').attr('style', 'height:360px')

                $('#layerForm').validate({
                    rules: {
                        username: {
                            required: true,
                            remote: {
                                url: "{:U('LoginCheck?check=user')}",
                                type: 'post'
                            }
                        },
                        pwd: {
                            required: true
                        }
                    },
                    messages: {
                        username: {
                            required: '用户名不能为空',
                            remote: '该用户不存在'
                        },
                        pwd: {
                            required: '密码不能为空'
                        }
                    },
                    success: function (lable) {
                        var result = lable.parent().children(1).text() + '正确';
                        result = result.substr(0, result.length);
                        lable.addClass('ok').text(result)
                    },
                    validClass: "ok"
                });

                $('#layerForm').submit(function () {
                    var data = $('#layerForm').serialize();
                    $.post("{:U('LoginCheck')}", data, function (response) {
                        if (response.status) {
                            $('#loginForm').submit();
                        } else {
                            $('input[name="password"]').next().css('display', 'block');
                        }
                    }, 'json');
                    return false;
                })
            }
        }
        //layer弹框自动登录
        $('.auto_login').toggle(
                function () {
                    $('#public_pwd').css('display', 'block');
                    $('#public_null').css('display', 'none');
                },
                function () {
                    $('#public_pwd').css('display', 'none');
                    $('#public_null').css('display', 'block');
                })
    }
    //加入购物车
    function AddCart(){
        var data=$('#loginForm').serialize();
        $.post("{:U('AddCart')}",data,function(res){
            layer.confirm(
                    res.info,{
                        btn:['继续买买买','去购物车']
                    },function(){
                        location="{:U('Index/index')}";
                    },
                    function(){
                        location="{:U('Cart/index')}";
                    })
        });
    }
    //收藏宝贝
    $('.collBtn').click(function(){
        if(!"{:I('session.mid')}"){
            layer.msg('亲，请登陆后再来收藏',{time:1000},function(){
                location="{:U('Login/login')}"
            });
        }else{
            $.post("{:U('Collection/add')}",{gid:'{:I("get.gid")}'},function(res){
                if(res.status){
                    layer.msg(res.info)
                }else{
                    layer.msg(res.info);
                }
            })
        }
    });
    //添加足迹
    var fgid='{:I("get.gid")}';
    if('{:I("session.mid")}') {
        $.post('{:U("Foot/add")}', {gid: fgid}, function (res) {

        })
    }
</script>
<script type="text/javascript">
    window._bd_share_config={
        "common":{
            "bdPopTitle":"您的自定义pop窗口标题",
            "bdSnsKey":{},
            "bdText":"此处填写自定义的分享内容",
            "bdMini":"2",
            "bdMiniList":false,
            "bdPic":"http://localhost/centlight/public/attachment/201410/24/14/5449ef39574f5_282x220.jpg", /* 此处填写要分享图片地址 */
            "bdStyle":"0",
            "bdSize":"16"
        },
        "share":{}
    };
    with(document)0[
            (getElementsByTagName('head')[0]||body).
                    appendChild(createElement('script')).
                    src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)
            ];
</script>
