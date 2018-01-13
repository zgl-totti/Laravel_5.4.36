<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>支出详情</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/footstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/bilstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <style>
        #page div{
            float: right;
        }
        #page span,#page a{
            display: inline-block;
            width: 30px;
            height: 30px;
            text-decoration: none;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
        }
        #page span.current{
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
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单明细</strong> / <small>Electronic&nbsp;bill</small></div>
            </div>
            <hr>
            <!--交易时间	-->
            <div class="order-time">
                <label class="form-label">交易时间：</label>
                <div class="show-input">
                    <select class="am-selected" data-am-selected>
                        <option id="one" value="0">请选择日期</option>
                        <option id="two" value="1">今天</option>
                        <option id="three" value="2">最近一周</option>
                        <option id="four" value="3">最近一个月</option>
                        <option id="five" value="4">最近三个月</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>
            <table width="100%">
                <thead>
                <tr>
                    <th class="memo"></th>
                    <th class="time">创建时间</th>
                    <th class="name">名称</th>
                    <th class="amount">金额(元)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $val)
                    @foreach($val['getOrderGoods'] as $v)
                    <tr>
                        <td class="img">
                            <i><img src="{{url('uploads')}}/{{mb_substr($v['pic'],0,10)}}/thumb100_{{mb_substr($v['pic'],11)}}"></i>
                        </td>
                        <td class="time">
                            <p> {{date('Y-m-d H:i:s',$val['addtime'])}}
                            </p>
                        </td>
                        <td class="title name">
                            <p class="content">
                                {{$v['goodsname']}}
                            </p>
                        </td>

                        <td class="amount">
                            <span class="amount-pay">- {{$v['price']}}</span>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            <div id="page">{{$list->appends(['time'=>$time])}}</div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".date-trigger").click(function() {
                        $(".show-input").css("display", "none");
                    });
                })
            </script>
        </div>
        <!--底部-->
    </div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
<script>
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('账单明细')").parent().addClass('active');
        $('.am-selected').change(function(){
            var time=$(this).val();
            location="{{url('money/disburse')}}"+'/'+time;
        });
        var w="{{$time}}";
        switch (w){
            case '1':
                $('#two').attr('selected','selected').siblings().removeAttr('selected');
                break;
            case '2':
                $('#three').attr('selected','selected').siblings().removeAttr('selected');
                break;
            case '3':
                $('#four').attr('selected','selected').siblings().removeAttr('selected');
                break;
            case '4':
                $('#five').attr('selected','selected').siblings().removeAttr('selected');
                break;
            default:
                $('#one').attr('selected','selected').siblings().removeAttr('selected');
        }
    })
</script>
</html>