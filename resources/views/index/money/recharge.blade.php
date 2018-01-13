<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>充值</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/footstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/address.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.js')}}"></script>
    <style>
        .pay-list img{
            width: 54px;
            height: 36px;
        }
        .pay-list li{
            line-height: 10px;
            height: 48px;
        }
        .pay-list a{
            position: relative;
            bottom: 18px;
        }
        #recharge{
            width: 615px;
            margin: 0 auto;
            padding: 10px 20px;
        }
        #recharge li{
            height: 50px;
            line-height: 50px;
            font-size: 16px;
        }
        #recharge li input{
            width: 200px;
            height: 45px;
            border: 1px solid #ccc;
            padding: 0 5px;
            margin: 0 5px;
        }
        .shifu{
            position: relative;
            left: 2px;
            display: inline-block;
            margin-right: 5px;
            color: red;
            font-size: 18px;
        }
        .tishi{
            border: 1px solid #ffcc81;
            background: rgb(255,255,225);
            margin: 10px 40px;
        }
        .tishi p{
            height: 25px;
            line-height: 25px;
            color: red;
        }
        .tishi p span{
            font-weight: bold;
        }
        #recharge .btn{
            display: inline-block;
            width: 70px;
            height: 35px;
            margin: 0 0 0 100px;
            background: rgb(0,183,238);
            color: #fff;
            border-radius: 5px;
            line-height: 35px;
            text-align: center;
        }
        label.error{
            color: red;
        }
        label.ok{
            color: green;
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
            <div class="tishi">
                <p>充值提示：<span>1</span>元等于<span>1</span>U币</p>
                <p>1：一次性充值满1000元减50元</p>
                <p>2：一次性充值满2000元减100元</p>
                <p>3：以此类推上不封顶</p>
            </div>
            <form action="{:U(Money/recharge)}" id="recharge" method="post">
                <ul>
                    {{--<li><label>充值账号：</label><input name="username" type="text"/></li>--}}
                    <li><label>充值金额：</label><input class="Ub" name="Ub" style="width: 100px;" type="text"/>U币</li>
                    <li><label>应付金额：</label><span class="shifu">0.00</span>元</li>
                </ul>
                <!--支付方式-->
                <div class="logistics">
                    <h3>选择支付方式:</h3>
                    <ul class="pay-list">
                        <li class="pay card"><img src="{{asset('asset_index/images/wangyin.jpg')}}" /><a href="javascript:;">银联</a><span></span></li>
                        <li class="pay qq"><img src="{{asset('asset_index/images/weizhifu.jpg')}}" /><a href="javascript:;">微信</a><span></span></li>
                        <li class="pay taobao"><img src="{{asset('asset_index/images/zhifubao.jpg')}}" /><a href="javascript:;">支付宝</a><span></span></li>
                    </ul>
                </div>
                <ul style="margin-top:50px ">
                    <li><label>支付密码：</label><input name="paypwd" type="password"/></li>
                    <li><a class="btn" href="javascript:;">确认支付</a></li>
                </ul>
            </form>
            <div class="clear"></div>
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
        $('.Ub').change(function(){
            var m=parseInt($(this).val());
            var money=m-Math.floor(m/1000)*50;
            $('.shifu').text(money)
        });
        //验证
        var validate=$('#recharge').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:15,
                    remote:{
                        url:'{:U("Goods/LoginCheck")}?check=user',
                        type:'post'
                    }
                },
                Ub:{
                    required:true,
                    number:true
                },
                paypwd:{
                    required:true
                }
            },
            messages:{    //提示信息
                username:{
                    required:'用户名不能为空',
                    minlength:'用户名至少需要2个字符',
                    maxlength:'用户名最多15个字符',
                    remote:'该账号不存在'
                },
                Ub:{
                    required:'充值金额不能为空',
                    number:'充值金额必须填数字'
                },
                paypwd:{
                    required:'密码不能为空',
                    minlength:'密码长度至少5个字符',
                    maxlength:'密码长度最多20个字符'
                }
            },
            success: function(label) {
                label.addClass("ok").text('通过验证');
            },
            validClass:'ok',
            errorElement:'label'
        });
        
        $('.btn').click(function(){
            if(validate.form()){
                $.post("{:U('Money/recharge')}",$('#recharge').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(
                            res.info,
                            {icon:1}
                        );
                    }else{
                        layer.msg(res.info);
                    }
                },'json')
            }
        })
    })
</script>
</html>