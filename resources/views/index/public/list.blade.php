<aside class="menu">
    <ul>
        <li class="person">
            <a href="{{url('member/index')}}">个人中心</a>
        </li>
        <li class="person">
            <a href="javascript:;">个人资料</a>
            <ul>
                <li> <a href="{{url('member/show')}}">个人信息</a></li>
                <li> <a href="{{url('member/safety')}}">安全设置</a></li>
                <li> <a href="{{url('site/index')}}">收货地址</a></li>
            </ul>
        </li>
        <li class="person">
            <a href="javascript:;">我的交易</a>
            <ul>
                <li><a href="{{url('order/order',['status'=>0])}}">全部订单</a></li>
                <li><a href="{{url('order/order',['status'=>1])}}" target="_blank">待付款</a></li>
                <li><a href="{{url('order/order',['status'=>2])}}">待发货</a></li>
                <li><a href="{{url('order/order',['status'=>3])}}" target="_blank">待收货</a></li>
                <li><a href="{{url('order/order',['status'=>4])}}">待评价</a></li>
                <li><a href="{{url('order/order',['status'=>5])}}" target="_blank">积分订单</a></li>
                <li><a href="{{url('order/refund_order')}}" target="_blank">退款售后</a></li>
            </ul>
        </li>
        <li class="person">
            <a href="javascript:;">我的购物车</a>
            <ul>
                <li><a href="{:U('Cart/mycart')}">购物车</a></li>
            </ul>
        </li>
        <li class="person">
            <a href="javascript:;">我的资产</a>
            <ul>
                <li> <a href="{{url('money/index')}}">我的余额</a></li>
            </ul>
        </li>
        <li class="person">
            <a href="javascript:;">我的小窝</a>
            <ul>
                <li class="active"> <a href="{:U('Collection/index')}">收藏</a></li>
                <li> <a href="{:U('Foot/index')}">足迹</a></li>
                <li> <a href="{{url('comment/reviews')}}">评价</a></li>
                <li> <a href="{:U('Msg/index')}">消息</a></li>
            </ul>
        </li>
    </ul>
</aside>
