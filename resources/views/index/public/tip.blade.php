<!--菜单 -->
<div class=tip>
    <!--购物车弹框-->
    <div class="cartNav">
        <div class="cartNav_top"><img src="{{asset('asset_index/images/cart.png')}}" width="25px" alt=""/>&nbsp;我的购物车<a>关闭</a></div>
        <div class="cartNav_include"></div>
        <div class="login"><span>你还未登录呢,去登录吧&nbsp;<a href="{:U('Login/login')}">登录</a></span></div>

        <div class="cartNav_foot">
            <div class="cartNav_l">
                <span class="totalnums"></span><br/>
                <span class="totalprices"></span>
            </div>
            <div class="cartNav_r">
                <a target="_blank" href="{:U('Cart/index')}">去购物车>></a>
            </div>
        </div>
    </div>
    <!--购物车弹框结束-->
    <!--收藏弹框-->
    <div id="collect" class="tipC">
        <div class="tipC_nav">
            <h3>我的收藏<span>关闭</span></h3>
        </div>
        <div class="tipC_con">
            <ul>

            </ul>
            <a class="tipC_more" href="{:U('Collection/index')}">更多</a>
        </div>
    </div>
    <!--收藏弹框-->
    <!--足迹弹窗-->
    <div id="zj" class="tipC">
        <div class="tipC_nav">
            <h3>我的足迹<span>关闭</span></h3>
        </div>
        <div class="tipC_con">
            <ul>

            </ul>
            <a class="tipC_more" href="{:U('Foot/index')}">更多</a>
        </div>
    </div>
    <!--足迹弹窗-->
    <div id="sidebar">
        <div id="wrap">
            <div id="prof" class="item">
                <a href="#">
                    <span class="setting"></span>
                </a>
                <div class="ibar_login_box status_login">
                    <if condition="I('session.mid') egt 1">
                    <div class="avatar_box">
                            <img style="border-radius:50%;width: 50px;margin-top: 28px" src="{$img}" alt="" />
                        <ul class="user_info" style="float: right;margin-right: 20px;">
                            <li>用户名：{:I('session.username')}</li>
                            <!--<li style="margin-left: 7px">级&nbsp;&nbsp;&nbsp;别：普通会员</li>-->
                        </ul>
                    </div>
                    <div class="login_btnbox" style="margin-top: 30px">
                        <a href="{:U('Cart/mycart')}" class="login_order">我的购物车</a>
                        <a href="{:U('Collection/index')}" class="login_favorite">我的收藏</a>
                    </div>
                        <else/>
                        <a style="margin-left: 20px;width: 200px" href="{:U('Login/login')}">亲，你还没有登录呢！</a>
                    </if>
                    <!--<i class="icon_arrow_white"></i>-->
                </div>

            </div>
            <div id="shopCart" class="item">
                <!--购物车箭头-->
                <div class="cart_forwardleft"></div>
                <!--购物车箭头结束-->
                <a href="#">
                    <span class="message"></span>
                </a>
                <p>
                    购物车
                </p>
                <p class="cart_num">0</p>
            </div>
            <div id="asset" class="item">
                <a href="javascript:;">
                    <span class="view"></span>
                </a>
                <div class="mp_tooltip">
                    我的资产
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>

            <div id="foot" class="item">
                <a href="#">
                    <span class="zuji"></span>
                </a>
                <div class="mp_tooltip">
                    我的足迹
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>

            <div id="brand" class="item">
                <a href="#">
                    <span class="wdsc"><img src="{{asset('asset_index/images/wdsc.png')}}" /></span>
                </a>
                <div class="mp_tooltip">
                    我的收藏
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>

            <div id="broadcast" class="item">
                <a href="javascript:;">
                    <span class="chongzhi"><img src="{{asset('asset_index/images/chongzhi.png')}}" /></span>
                </a>
                <div class="mp_tooltip">
                    我要充值
                    <i class="icon_arrow_right_black"></i>
                </div>
            </div>

            <div class="quick_toggle">
                <li class="qtitem">
                        <!-- 客服中心开始-->
                    <a href="#"><span class="kfzx"></span></a>
                    <div class="mp_tooltip">
                        <div style="float: left"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1182728515&site=qq&menu=yes"><img style="padding-top:5px;" border="0" src="http://wpa.qq.com/pa?p=2:1182728515:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></div>
                        <div style="float: left"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=343748438&site=qq&menu=yes"><img style="padding-top:5px;" border="0" src="http://wpa.qq.com/pa?p=2:343748438:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></div>
                        <i class="icon_arrow_right_black"></i>
                    </div>
                        <!-- 客服中心结束-->
                </li>
                <!--二维码 -->
                <li class="qtitem">
                    <a href="#none"><span class="mpbtn_qrcode"></span></a>
                    <div class="mp_qrcode" style="display:none;"><img src="{{asset('asset_index/images/weixin_code_145.png')}}" /><i class="icon_arrow_white"></i></div>
                </li>
                <li class="qtitem">
                    <a href="#top" class="return_top"><span class="top"></span></a>
                </li>
            </div>
            <!--回到顶部 -->
            <div id="quick_links_pop" class="quick_links_pop hide"></div>
        </div>

    </div>
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

<script>
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
    });
    flag2 = true;
    $('#brand').click(
            function () {
                //判断用户是否登陆
                if(!'{:I("session.mid")}'){
                    location='{:U("Login/login")}'
                }else {
                    if (flag2) {
                        flag2 = false;
                        flag1 = true;
                        flag3 = true;
                        str = '';
                        $.post('{:U("Collection/getList")}', function (res) {
                            if(res.status) {
                                for (var i in res.info) {
                                    res.info[i]['goodsname']=res.info[i]['goodsname'].slice(0,20);
                                    dir = "/Uploads/" + res.info[i]['pic'].slice(0, 10);
                                    name = '/thumb100_' + res.info[i]['pic'].slice(11);
                                    str += '<li><a href="'+'{:U("Goods/goodsDetail")}?gid='+res.info[i]['id']+'"><img src="' + dir + name + '" alt=""/></a>';
                                    str += '<div><dl>';
                                    str += '<dd><a href="'+'{:U("Goods/goodsDetail")}?gid='+res.info[i]['id']+'">' + res.info[i]['goodsname'] + '</a></dd>';
                                    str += "<dt>￥：" + res.info[i]['price'] + "<a gid="+res.info[i]['id']+" href='javascript:;'class='tipC_del'>删除</a></dt>"
                                    str += '</dl> </div> </li>'
                                }
                                $('#collect .tipC_more').show();
                                $('#collect ul').html(str);
                            }else{
                                $('#collect ul').html(res.info);
                                $('#collect .tipC_more').hide();
                                $('#collect ul h3').css('text-align','center');
                            }
                        });
                        $('#zj,.cartNav').css({opacity: 0, right: '-265px'});
                        $('#collect').css({opacity: 1, right: '35px'});
                        $('.cart_forwardleft').hide()
                    } else {
                        flag2 = true;
                        $('#collect').css('right', '-265px')
                    }
                }
            });
    flag3 = true;
    $('#foot').click(
            function () {
                //判断用户是否登陆
                if(!'{:I("session.mid")}'){
                    location='{:U("Login/login")}'
                }else {
                    if (flag3) {
                        flag3 = false;
                        flag1 = true;
                        flag2 = true;
                        str = '';
                        $.post('{:U("Foot/getList")}', function (res) {
                            if(res.status){
                            for (var i in res.info) {
                                res.info[i]['goodsname']=res.info[i]['goodsname'].slice(0,20);
                                dir="/Uploads/"+res.info[i]['pic'].slice(0,10);
                                name='/thumb100_'+res.info[i]['pic'].slice(11);
                                str += '<li><a href="'+'{:U("Goods/goodsDetail")}?gid='+res.info[i]['id']+'"><img src="'+dir+name+'" alt=""/></a>';
                                str += '<div><dl>';
                                str += '<dd><a href="'+'{:U("Goods/goodsDetail")}?gid='+res.info[i]['id']+'">' + res.info[i]['goodsname'] + '</a></dd>';
                                str += "<dt>￥：" + res.info[i]['price'] + "<a gid="+res.info[i]['id']+" href='javascript:;'class='tipC_del1'>删除</a></dt>"
                                str += '</dl> </div> </li>'
                            }
                            $('#zj ul').html(str);
                                $('#zj .tipC_more').show();
                            }else{
                                $('#zj ul').html(res.info);
                                $('#zj .tipC_more').hide();
                                $('#zj ul h3').css('text-align','center');
                            }
                        });
                        $('#collect,.cartNav').css({opacity: 0, right: '-265px'});
                        $('#zj').css({opacity: 1, right: '35px'});
                        $('.cart_forwardleft').hide()
                    }
                    else {
                        flag3 = true;
                        $('#zj').css('right', '-265px')
                    }
                }
            })
    $('#zj .tipC_nav span').click(function(){
        flag3=true;
        $('#zj').css('right', '-265px')
    })
    $('#collect .tipC_nav span').click(function(){
        flag2=true;
        $('#collect').css('right', '-265px')
    })

    //侧边栏购物车弹框
    flag1=true;
    $('#shopCart').click(function(){
        $(".cartNav_top").click(function(){
            $('.cartNav').css('right', '-265px')
            $('.cart_forwardleft').css('display','none');
            flag1=true;
        })
        if(flag1) {
            flag1 = false;
            flag2 = true;
            flag3 = true;
            $('.cartNav').css({opacity: 1, right: '35px'})
            $('#collect,#zj').css({opacity: 0, right: '-265px'});
            $('.cart_forwardleft').css('display','block');
            if(!'{:I("session.mid")}'){
                $('.login').show();
            }
            $.post("{:U('Cart/showcart')}",function (res) {
                        if (res.status) {

                            str = '';
                            totalnum = 0;
                            totalprice = 0;
                            goodsnum = 0;
                            for (var i in res.info) {
                                goodsnum++;
                                totalnum += parseInt(res.info[i]['buynum']);
                                totalprice += parseInt(res.info[i]['price']) * totalnum;
                                dir = "/Uploads/" + res.info[i]['pic'].slice(0, 10);
                                name = '/thumb100_' + res.info[i]['pic'].slice(11);

                                str += '<div class="cartNav_list" style="height:95px;border-bottom: 2px dashed #ccc;">';
                                str += '<span class="cartNav_img">'
                                str += '<a href=' + "{:U('Goods/goodsDetail')}?gid=" + res.info[i]['gid'] + '><img src="' + dir + name + '" width="60px" alt=""/></a>';
                                str += '</span>'
                                str += '<div class="cartNav_name">'
                                str += '<a href=' + "{:U('Goods/goodsDetail')}?gid=" + res.info[i]['gid'] + '>' + res.info[i]['goodsname'] + '</a></div>';
                                str += '<div class="cartNav_num">'
                                str += '<strong>￥:' + res.info[i]['price'] + '</strong><i>&nbsp;x' + res.info[i]['buynum'] + '</i>';
                                str += '&nbsp;颜色:' + res.info[i]['color'] + '&nbsp;型号:' + res.info[i]['model'];
                                if (res.info[i]['status'] == 1) {
                                    str += '<br/>新人专享优惠：￥' + res.info[i]['cut'] + '<a id="cartNav_del" href="javascript:;" gid=' + res.info[i]['id'] + '>删除</a></div>';
                                } else {
                                    str += '<a id="cartNav_del" href="javascript:;" gid=' + res.info[i]['id'] + '>删除</a></div>';
                                }
                                str += '</div>'
                                str += '</div>'
                            }
                            $('.cartNav_include').html(str)
                            $('.totalnums').html('共计:' + totalnum + '件商品');
                            $('.totalprices').html('共￥:' + totalprice);

                            $('.cart_num').html(goodsnum);
                            $('#J_MiniCartNum').html('(' + goodsnum + ')');
                        }else{
                            $('.cartNav_include').html(res.info)
                            $('.totalnums').html('共计:0件商品');
                            $('.totalprices').html('共￥:'+0);

                            $('.cart_num').html(0);
                            $('#J_MiniCartNum').html(0);
                        }
                    });
            }else{
            flag1= true;
            $('.cartNav').css('right', '-265px')
            $('.cart_forwardleft').css('display','none');
        }
    });

    $('#cartNav_del').live('click',function(){
        del=$(this);
        $.post("{:U('Goods/DelgoodsBycart')}",{gid:del.attr('gid')},function(res){
            if(res.status){
                del.parents('.cartNav_list').hide();
            }
        })
    });

    $('.tipC_del').live('click',function(){
        a=$(this);
        gid=$(this).attr('gid');
        $.post('{:U("Collection/del")}',{gid:gid},function(res){
            if(res.status){
                a.parents('li').hide();
            }else{
                layer.alert(res.info)
            }
        })
    });
    $('.tipC_del1').live('click',function(){
        a=$(this);
        gid=$(this).attr('gid');
        $.post('{:U("Foot/del")}',{gid:gid},function(res){
            if(res.status){
                a.parents('li').hide();
            }else{
                layer.alert(res.info)
            }
        })
    });
    $('#broadcast').click(function(){
        if("{:I('session.mid')}"){
            location="{:U('Money/recharge')}"
        }else{
            layer.msg('请登录后再来充值！')
        }
    });
    $('#asset').click(function(){
        if("{:I('session.mid')}"){
            location="{:U('Money/bill')}"
        }else{
            layer.msg('请登录后再来查看！')
        }
    })
</script>
<!--客服中心-->
