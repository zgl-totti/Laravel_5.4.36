<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的账单</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/footstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/blstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <style>
        .yue p span{
            font-size: 16px;
        }
        .ccc p a{
            margin-left: 30px;
            color:red;
        }
        .m{
            color: red;
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
            <div class="user-bill">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的财富</strong></div>
                </div>
                <hr/>
                <div class="ccc">
                    <div class="yue">
                        <p>&nbsp;&nbsp;&nbsp;账户余额:<span class="m">{{$info->balance}}</span>&nbsp;U币<a href="{{url('money/recharge')}}">充值</a></p>
                    </div>
                </div>
                <div class="ebill-section">
                    <div class="ebill-title-section">
                        <h2 class="trade-title section-title">
                            交易
                            <span class="desc">（金额单位：元）</span>
                        </h2>
                    </div>
                    <div class="module-income ng-scope">
                        <div class="income-slider ">
                            <div class="block-income block  fn-left">
                                <h3 class="income-title block-title">
                                    支出
                                    <span class="num ng-binding">{{$info->expense}}</span>
                                    <span class="desc ng-binding">
                                        <a href="{{url('money/disburse',['time'=>0])}}">查看支出明细</a>
                                    </span>
                                </h3>
                                <div ng-class="shoppingChart" class="catatory-details  fn-hide shopping">
                                    <div class="catatory-chart fn-left fn-hide">
                                        <div class="title">时间</div>
                                        <ul>
                                            @foreach($list_disburse as $val)
                                                <li class="ng-scope  delete-false">
                                                    <div class="  ng-scope">
                                                        <span class="emoji-span ng-binding">{{date('Y-m-d H:i:s',$val['addtime'])}}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="catatory-detail fn-left">
                                        <div class="title ng-binding">
                                            购买商品
                                        </div>
                                        <ul>
                                            @foreach($list_disburse as $val)
                                                @foreach($val['getOrderGoods'] as $v)
                                                <li class="ng-scope  delete-false">
                                                    <div class="  ng-scope">
                                                        <span class="emoji-span ng-binding">{{$v['goodsname']}}</span>
                                                        <span class="amount fn-right ng-binding">{{$v['price']}}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-expense block  fn-left">
                                <div class="slide-button right"></div>
                                <div style="margin: 130px 0" class="more">详情</div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <script>
                            $(document).ready(function (ev) {
                                $('.cards-carousel .details').on('click', function (ev) {
                                    $('.cards-details').css("display","block");
                                    $('.cards-carousel').css("display","none");
                                });
                                $('.cards-details .close').on('click', function (ev) {
                                    $('.cards-details').css("display","none");
                                    $('.cards-carousel').css("display","block");
                                });
                            });
                        </script>
                    </div>
                    <div class="module-income ng-scope">
                        <div class="income-slider ">
                            <div class="block-income block  fn-left">
                                <h3 class="income-title block-title">
                                    收入
                                    <span class="num ng-binding">{{$income}}</span>
                                    <span class="desc ng-binding">
                                        <a href="{{url('money/income',['time'=>0])}}">查看收入明细</a>
                                    </span>
                                </h3>
                                <div ng-class="shoppingChart" class="catatory-details  fn-hide shopping">
                                    <div class="catatory-chart fn-left fn-hide">
                                        <div class="title">时间</div>
                                        <ul>
                                            @foreach($list_income as $val)
                                                <li class="ng-scope  delete-false">
                                                    <div class="  ng-scope">
                                                        <span class="emoji-span ng-binding">{{date('Y-m-d H:i:s',$val['addtime'])}}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="catatory-detail fn-left">
                                        <div class="title ng-binding">
                                            充值金额(元)
                                        </div>
                                        <ul>
                                            @foreach($list_income as $val)
                                                <li class="ng-scope  delete-false">
                                                    <div class="  ng-scope">
                                                        <span class="emoji-span ng-binding">{{$val['money']}}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-expense block  fn-left">
                                <div class="slide-button right"></div>
                                <div style="margin: 130px 0" class="more">详情</div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <script>
                            $(document).ready(function (ev) {
                                $('.cards-carousel .details').on('click', function (ev) {
                                    $('.cards-details').css("display","block");
                                    $('.cards-carousel').css("display","none");
                                });
                                $('.cards-details .close').on('click', function (ev) {
                                    $('.cards-details').css("display","none");
                                    $('.cards-carousel').css("display","block");
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--底部-->
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
<script>
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('我的余额')").parent().addClass('active');
    })
</script>
</html>