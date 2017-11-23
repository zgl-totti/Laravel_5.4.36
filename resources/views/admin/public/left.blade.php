<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>左侧菜单页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="{{asset('asset_admin/js/jquery.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            //导航切换
            $(".menuson .header").click(function(){
                var $parent = $(this).parent();
                $(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
                $parent.addClass("active");
                if(!!$(this).next('.sub-menus').size()){
                    if($parent.hasClass("open")){
                        $parent.removeClass("open").find('.sub-menus').hide();
                    }else{
                        $parent.addClass("open").find('.sub-menus').show();
                    }
                }
            });
            // 三级菜单点击
            $('.sub-menus li').click(function(e) {
                $(".sub-menus li.active").removeClass("active")
                $(this).addClass("active");
            });
            $('.title').click(function(){
                var $ul = $(this).next('ul');
                $('dd').find('.menuson').slideUp();
                if($ul.is(':visible')){
                    $(this).next('.menuson').slideUp();
                }else{
                    $(this).next('.menuson').slideDown();
                }
            });
        })
    </script>
</head>
<body style="background:#f0f9fd;">
    <div class="lefttop"><span></span>后台管理</div>
    <dl class="leftmenu">
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>系统管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/main')}}" target="rightFrame">后台首页</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AdminNav/index')}}" target="rightFrame">菜单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AdminNav/add')}}" target="rightFrame">添加菜单</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>权限管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AuthGroup/index')}}" target="rightFrame">管理组列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AuthGroup/add')}}" target="rightFrame">添加管理组</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/admin_index')}}" target="rightFrame">管理员列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/admin_add')}}" target="rightFrame">添加管理员</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AuthRule/index')}}" target="rightFrame">权限列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('AuthRule/add')}}" target="rightFrame">添加权限</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>品牌管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/brand_index')}}" target="rightFrame">品牌列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/brand_add')}}" target="rightFrame">添加品牌</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>分类管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/category_index')}}" target="rightFrame">分类列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/category_add')}}" target="rightFrame">添加分类</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>商品管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/goods_index')}}" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/goods_add')}}" target="rightFrame">添加商品</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/goods_analyze')}}" target="rightFrame">销量分析</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>会员管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/member_index')}}" target="rightFrame">会员列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>订单管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_index',['orderstatus'=>0])}}" target="rightFrame">全部订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_index',['orderstatus'=>1])}}" target="rightFrame">待付款订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_index',['orderstatus'=>2])}}" target="rightFrame">待发货订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_index',['orderstatus'=>3])}}" target="rightFrame">已发货订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_index',['orderstatus'=>4])}}" target="rightFrame">订单完成列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_integral')}}" target="rightFrame">积分订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/order_aftermarket')}}" target="rightFrame">售后管理</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>评价管理
            </div>
            <ul class="menuson">
                <li class="">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('admin/comment_index')}}" target="rightFrame">评价列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>首单专享
            </div>
            <ul class="menuson">
                <li class="">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Newperson/index')}}" target="rightFrame">设置专享</a>
                        <i></i>
                    </div>
                </li>
                <li class="">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Newperson/barlist')}}" target="rightFrame">专享列表</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>活动管理
            </div>
            <ul class="menuson">
                <li class="">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Active/ActiveList')}}" target="rightFrame">活动列表</a>
                        <i></i>
                    </div>
                </li>
                <li class="">
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Active/add')}}" target="rightFrame">添加活动</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>广告管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Ad/AdminList')}}" target="rightFrame">广告列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Ad/add')}}" target="rightFrame">添加广告</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>积分商城
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Jshop/gifList')}}" target="rightFrame">礼品列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Jshop/add')}}" target="rightFrame">添加礼品</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Jshop/cj')}}" target="rightFrame">奖品设置</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>清除缓存
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('Admin/Cache/clearCache')}}" target="rightFrame">清除缓存</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="{{asset('asset_admin/images/leftico01.png')}}" /></span>微信管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('WX/createMenu')}}" target="rightFrame">创建菜单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="{{url('WX/delMenu')}}" target="rightFrame">删除菜单</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
    </dl>
</body>
</html>
