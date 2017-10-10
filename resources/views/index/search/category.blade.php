<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>搜索页面</title>
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/iconfont/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/seastyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/layer/layer.js')}}"></script>
    <style type="text/css">
        .sort i{
            color:red;
        }
        .page{
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
        .i-pic:hover{
            border:1px solid red;
        }
        .cartNav_top img{
            width: 25px;
        }
        .search-content{
            width: 100%;
        }
    </style>
</head>
<body>
@include('index.public.header')
<b class="line"></b>
<div class="search">
    <div class="search-list">
        @include('index.public.nav')
        <div class="am-g am-g-fixed">
            <div class="am-u-sm-12 am-u-md-12">
                <div class="theme-popover">
                    <!--<div class="searchAbout">-->
                    <!--<span class="font-pale">相关搜索：</span>-->
                    <!--<a title="坚果" href="#">坚果</a>-->
                    <!--<a title="瓜子" href="#">瓜子</a>-->
                    <!--<a title="鸡腿" href="#">豆干</a>-->
                    <!--</div>-->
                    <ul class="select">
                        <p class="title font-normal">
                            <span class="fl">{$keyword1}</span>
                            <span class="total fl">搜索到<strong class="num">{$num}</strong>件相关商品</span>
                        </p>
                        <div class="clear"></div>
                        <if condition="(I('get.brandname',0) neq '0') AND (I('get.brandname',0) neq '全部') OR (I('get.price','0') neq '0') AND (I('get.price','0') neq '全部') OR (I('get.hot',0) neq '0') AND (I('get.hot',0) neq '全部')">
                            <li class="select-result">
                                <dl>
                                    <dt>已选</dt>
                                    <dd class="select-no"></dd>
                                    <if condition="(I('get.brandname',0) neq '0') AND (I('get.brandname','0') neq '全部')">
                                        <dd class="selected" id="selectA"><a href="{:U('category')}?keyword={:I('get.keyword')}&&price={:I('get.price',0)}&&hot={:I('get.hot',0)}">{:I('get.brandname')}</a></dd>
                                    </if>
                                    <if condition="(I('get.price',0) neq '0') AND (I('get.price','0') neq '全部')">
                                        <dd class="selected" id="selectB"><a href="{:U('category')}?keyword={:I('get.keyword')}&&brandname={:I('get.brandname',0)}&&hot={:I('get.hot',0)}">{:I('get.price')}</a></dd>
                                    </if>
                                    <if condition="(I('get.hot',0) neq '0') AND (I('get.hot','0') neq '全部')">
                                        <dd class="selected" id="selectC"><a href="{:U('category')}?keyword={:I('get.keyword')}&&price={:I('get.price',0)}&&brandname={:I('get.brandname',0)}">{:I('get.hot')}</a></dd>
                                    </if>
                                    <p class="eliminateCriteria"><a href="{:U('category')}?keyword={:I('get.keyword')}">清除</a></p>
                                </dl>
                            </li>
                        </if>
                        <div class="clear"></div>
                        <li class="select-list">
                            <dl id="select1">
                                <dt class="am-badge am-round">品牌</dt>
                                <div class="dd-conent brand">
                                    <dd class="select-all {{$info['id']?'':'selected'}}"><a href="#">全部</a></dd>
                                    @foreach($brand as $v)
                                        <dd {{$info['id']==$v['cid']?'selected':''}}><a href="">{{$v['brandname']}}</a></dd>
                                    @endforeach
                                </div>
                            </dl>
                        </li>
                        <li class="select-list">
                            <dl id="select2">
                                <dt class="am-badge am-round">价格</dt>
                                <div class="dd-conent prices">
                                    <dd class="select-all {:I('get.price',0)?'':'selected'}"><a href="#">全部</a></dd>
                                    <dd><a href="">0-500</a></dd>
                                    <dd><a href="#">500-1000</a></dd>
                                    <dd><a href="#">1000-1500</a></dd>
                                    <dd><a href="#">1500-2000</a></dd>
                                    <dd><a href="#">2000-3000</a></dd>
                                    <dd><a href="#">3000-5000</a></dd>
                                    <dd><a href="#">5000-10000</a></dd>
                                </div>
                            </dl>
                        </li>
                        <li class="select-list">
                            <dl id="select3">
                                <dt class="am-badge am-round">选购热点</dt>
                                <div class="dd-conent hot">
                                    <dd class="select-all {:I('get.hot',0)?'':'selected'}"><a href="#">全部</a></dd>
                                    <dd><a href="">绿色节能</a></dd>
                                    <dd><a href="#">新品上市</a></dd>
                                    <dd><a href="#">外形精美</a></dd>
                                    <dd><a href="#">高端智能</a></dd>
                                    <dd><a href="#">经济实惠</a></dd>
                                    <dd><a href="#">底噪产品</a></dd>
                                </div>
                            </dl>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="search-content">
                    <div class="sort">
                        <li id="oZ" class="first"><a href="{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'zh','order'=>'asc'))}" title="综合">综合排序</a><i class="iconfont desc">&#xe60a;</i><i style="display: none" class="iconfont asc">&#xe60b;</i></li>
                        <li id="oSale"><a href="{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'osalenum','order'=>'desc'))}" title="销量">销量排序</a><i style="display: none" class="iconfont desc">&#xe60a;</i><i style="display: none" class="iconfont asc">&#xe60b;</i></li>
                        <li id="oPrice"><a href="{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'oprice','order'=>'desc'))}" title="价格">价格优先</a><i style="display: none" class="iconfont desc">&#xe60a;</i><i style="display: none" class="iconfont asc">&#xe60b;</i></li>
                        <li id="oComment"><a href="{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'ocredit','order'=>'desc'))}" title="评价">评价为主</a><i style="display: none" class="iconfont desc">&#xe60a;</i><i style="display: none" class="iconfont asc">&#xe60b;</i></li>
                    </div>
                    <div class="clear"></div>
                    <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                        @foreach($list as $v)
                            <li>
                                <a href="{{url('goods/index',['gid'=>$v['id'],'status'=>3])}}">
                                    <div class="i-pic check">
                                        <img src="{{url('uploads')}}/{{mb_substr($v['pic'],0,11)}}thumb350_{{mb_substr($v['pic'],11)}}" />
                                        <p class="check-title">{{mb_substr($v['goodsname'],0,10,'utf-8')}}</p>
                                        <p class="price fl">
                                            <b>¥</b>
                                            <strong>{{$v['price']}}</strong>
                                        </p>
                                        <p class="number fl">
                                            销量<span>{{$v['salenum']}}</span>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                <!--分页 -->
                <ul class="am-pagination am-pagination-right">
                    <div id="pagge">{{$list->links()}}</div>
                </ul>
            </div>
        </div>
    </div>
</div>
@include('index.public.footer')
<!--引导 -->
<div class="navCir">
    <li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
    <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
<!--菜单 -->
@include('index.public.tip')
<script type="text/javascript">
    window.jQuery || document.write('<script src="basic/{{asset('asset_index/js/jquery-1.9.min.js')}}"><\/script>')
    $(function(){
        for(i in $('.brand').find('a')){
            var ub="{:U('category',array('keyword'=>I('get.keyword')))}"+"&&price={:I('get.price',0)}&&hot={:I('get.hot',0)}"+'&&brandname='+$('.brand').find('a').eq(i).text();
            $('.brand').find('a').eq(i).attr('href',ub);
        }
        for(i in $('.prices').find('a')){
            var up="{:U('category',array('keyword'=>I('get.keyword')))}"+"&&brandname={:I('get.brandname',0)}&&hot={:I('get.hot',0)}"+'&&price='+$('.prices').find('a').eq(i).text();
            $('.prices').find('a').eq(i).attr('href',up);
        }
        for(i in $('.hot').find('a')){
            var uh="{:U('category',array('keyword'=>I('get.keyword')))}"+"&&price={:I('get.price',0)}&&brandname={:I('get.brandname',0)}"+'&&hot='+$('.hot').find('a').eq(i).text();
            $('.hot').find('a').eq(i).attr('href',uh);
        }
        text1='{:I("get.brandname",0)}';
        text2='{:I("get.price",0)}';
        text3='{:I("get.hot",0)}';
        //console.log($(".dd-conent dd a:contains('{:I("get.hot")}')").parents('dd')[0]);
        if(text1!=0){
            $(".brand dd a:contains('{:I("get.brandname")}')").parents('dd').addClass('selected').siblings().removeClass('selected');
        }
        if(text2!=0){
            $(".prices dd a:contains('{:I("get.price")}')").parents('dd').addClass('selected').siblings().removeClass('selected');
        }
        if(text3!=0){
            $(".hot dd a:contains('{:I("get.hot")}')").parents('dd').addClass('selected').siblings().removeClass('selected');
        }
        if('{:I("get.field")}'=='zh'&&'{:I("get.order")}'=='desc'){
            $('#oZ').children('.asc').hide();
            $('#oZ').children('.desc').show();
            $('#oZ').siblings().children('.asc,.desc').hide();
            $('#oZ').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'zh','order'=>'asc'))}")
        }
        if('{:I("get.field")}'=='zh'&&'{:I("get.order")}'=='asc'){
            $('#oZ').children('.desc').hide();
            $('#oZ').children('.asc').show();
            $('#oZ').siblings().children('.asc,.desc').hide();
            $('#oZ').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'zh','order'=>'desc'))}")
        }

        if('{:I("get.field")}'=='osalenum'&&'{:I("get.order")}'=='desc'){
            $('#oSale').children('.asc').hide();
            $('#oSale').children('.desc').show();
            $('#oSale').siblings().children('.asc,.desc').hide();
            $('#oSale').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'osalenum','order'=>'asc'))}")
        }
        if('{:I("get.field")}'=='osalenum'&&'{:I("get.order")}'=='asc'){
            $('#oSale').children('.desc').hide();
            $('#oSale').children('.asc').show();
            $('#oSale').siblings().children('.asc,.desc').hide();
            $('#oSale').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'osalenum','order'=>'desc'))}")
        }
        if('{:I("get.field")}'=='oprice'&&'{:I("get.order")}'=='desc'){
            $('#oPrice').children('.asc').hide();
            $('#oPrice').children('.desc').show();
            $('#oPrice').siblings().children('.asc,.desc').hide();
            $('#oPrice').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'oprice','order'=>'asc'))}")
        }
        if('{:I("get.field")}'=='oprice'&&'{:I("get.order")}'=='asc'){
            $('#oPrice').children('.desc').hide();
            $('#oPrice').children('.asc').show();
            $('#oPrice').siblings().children('.asc,.desc').hide();
            $('#oPrice').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'oprice','order'=>'desc'))}")
        }
        if('{:I("get.field")}'=='ocredit'&&'{:I("get.order")}'=='desc'){
            $('#oComment').children('.asc').hide();
            $('#oComment').children('.desc').show();
            $('#oComment').siblings().children('.asc,.desc').hide();
            $('#oComment').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'ocredit','order'=>'asc'))}")
        }
        if('{:I("get.field")}'=='ocredit'&&'{:I("get.order")}'=='asc'){
            $('#oComment').children('.desc').hide();
            $('#oComment').children('.asc').show();
            $('#oComment').siblings().children('.asc,.desc').hide();
            $('#oComment').children('a').attr('href',"{:U('Search/category',array('keyword'=>I('get.keyword'),'brandname'=>I('get.brandname',0),'hot'=>I('get.hot',0),'price'=>I('get.price',0),'field'=>'ocredit','order'=>'desc'))}")
        }
    })
</script>
<script type="text/javascript" src="{{asset('asset_index/js/quick_links.js')}}"></script>
<div class="theme-popover-mask"></div>
</body>
</html>