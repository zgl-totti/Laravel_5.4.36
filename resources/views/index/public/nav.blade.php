<div class="nav-table">
    <div style="" class="long-title"><span class="all-goods">全部分类</span>
    </div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="{{url('index/index')}}">首页</a></li>
            <li class="qc tj"><a href="{:U('Nav/tj')}">推荐</a></li>
            <li class="qc newperson"><a href="{:U('Newperson/index')}" style="width: 120px;height: 36px;">新人专享<img style="position: absolute;" src="__STATIC__/images/hot.gif"/></a></li>
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b><a style="color:#fcff00" href="{:U('Jshop/index')}">积分商城</a>
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<!--侧边导航 -->
<div style="width: 1200px;position: relative;margin: 0 auto">
<div id="nav" class="navfull" style="display: none">
    <div class="area clearfix">
        <div class="category-content" id="guide_2">

            <div class="category">
                <ul class="category-list" id="js_climit_li">
                    <volist name="categoryListOne" id="val1">
                        <li class="appliance js_toggle relative first">
                            <div class="category-info">
                                <h3 class="category-name b-category-name"><i><img style="width: 25px" src="__STATIC__/images/cake.png"></i><a class="ml-22" title="">{$val1.categoryname}</a></h3>
                                <em>&gt;</em></div>
                            <div class="menu-item menu-in top">
                                <div class="area-in">
                                    <div class="area-bg">
                                        <div class="menu-srot">
                                            <div class="sort-side">
                                                <dl class="dl-sort">
                                                    <dt><a title="" href="{:U('Search/category',array('keyword'=>$val1['categoryname']))}"><span title="">{$val1.categoryname}</span></a></dt>
                                                    <volist name="val1.child" id="v">
                                                        <dd><a title="" href="{:U('Search/category',array('keyword'=>$v['categoryname']))}"><span>{$v.categoryname}</span></a></dd>
                                                    </volist>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <b class="arrow"></b>
                        </li>
                    </volist>
                </ul>
            </div>
        </div>

    </div>
</div>
</div>
<script>
    $(function(){
        $('.long-title,#nav').mouseenter(function(){
            $('#nav').show();
        })
        .mouseleave(function(){
            $('#nav').hide();
        });
        $('#js_climit_li li').mouseover(function(){
            $(this).css({background:'#fff',cursor:'pointer'});
            $(this).children('.menu-item').show();
            $(this).find('.ml-22').css('color','#000');
        })
        .mouseleave(function(){
            $(this).children('.menu-item').hide();
            $(this).css({background:'rgb(43,43,43)'});
            $(this).find('.ml-22').css('color','#fff');
        })
    })
</script>