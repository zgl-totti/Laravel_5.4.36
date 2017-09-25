<!--顶部导航条 -->
<div class="am-container header">
    <ul class="message-l">
        <div class="topMessage">
            <div class="menu-hd">
                @if($member['mid']>0)
                    <li>
                        亲爱的{{$member['username']}}，欢迎光临优惠易购
                        <a id="out" class="red" style="cursor: pointer">，退出</a></li>
                    </li>
                @else
                    亲，请<a href="{:U('Login/login')}" target="_top" class="h">登录</a>
                    免费<a href="{:U('Login/register')}" target="_top">注册</a>
                @endif
            </div>
        </div>
    </ul>
    <ul class="message-r">
        <div class="topMessage home">
            <div class="menu-hd"><a href="{{url('index/index')}}" target="_top" class="h">商城首页</a></div>
        </div>
        <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng"><a href="{:U('MemberCenter/index')}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd"><a id="mc-menu-hd" href="{:U('Cart/index')}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h" style="color:red;">({$cartnum?$cartnum:0})</strong></a></div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd"><a href="{:U('Collection/index')}" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
    </div>
        <div class="topMessage favorite">
            <div class="menu-hd"><a href="{:U('Location/index')}" target="_top"><i class=""></i><span>联系我们</span></a></div>

        </div>
    </ul>
</div>
<!--悬浮搜索框-->
<div class="nav white">
    <div class="logoBig">
        <li><a href="{:U('Index/index')}"><img src="{{asset('asset_index/images/logo3.png')}}" /></a></li>
    </div>
    <div class="search-bar pr">
        <a name="index_none_header_sysc" href="#"></a>
        <form action="{:U('Search/name')}" method="get" id="sForm">
            <span class="gn">宝贝</span>
            <span class="bn">品牌</span>
            <!--<input type="hidden" name="actS"/>-->
            <input id="searchInput" name="keyword" type="text" value="{$keyword}" placeholder="请输入商品名称" autocomplete="off">
            <input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
        </form>
    </div>
</div>
<div class="clear"></div>
<script>
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
    })
</script>
<script>
    $(function(){
        $('#out').click(function(){
            layer.confirm('您确定退出吗？',
                    {btn:['确定','取消'],title:'提示'},
                    function(){
                        $.get("{:U('Login/logout')}",'',function(res){
                            if(res.status==1){
                                layer.msg(res.info, {icon : 1,time:500}, function(){
                                    location.href="{:U('Index/index')}";    //   "/"引号代表网站根目录，注册成功后返回
                                })
                            }
                        })
                    })
        })
    })
</script>