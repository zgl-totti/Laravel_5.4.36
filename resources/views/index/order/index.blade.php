<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>结算页面</title>
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/address.js')}}"></script>
    <script src="{{asset('asset_index/js/sjld.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/linkage.js')}}"></script>
    <script>
        $(function(){
            //省市级三级联动
            setup();
            preselect('河南省');
        })
    </script>
    <script>
        $(function(){
            $('#add2').click(function(){
                $.post("{:U('Order/add')}",$('#form5').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time: 800, icon:6}, function(){
                            location.href=''
                        })
                    } else{
                        layer.msg(res.info,{time: 1000, icon:2})
                    }
                },'json')
            })
            $(".user-addresslist").click(function(){
                i=$(this).attr("name")
                $.post("{:U('Order/def')}",{id:i},function(res){
                    $('.province1').text(res.ps);
                    $('.city1').text(res.qs);
                    $(".dist1").text(res.ws);
                    $(".street1").text(res.xyd);
                    $(".buy-user1").text(res.username);
                    $(".buy-phone1").text(res.phone);
                    $(".sid").val(res.id);
                },'json')
            })
        })
    </script>
</head>
<body>
<!--顶部导航条 -->
@include('index.public.header')
@include('index.public.nav')
<div class="clear"></div>
<form action="{:U('Pay/index')}" method="post" id="form1">
    <div class="concent">
        <!--地址 -->
        <div class="paycont">
            <div class="address">
                <h3>确认收货地址 </h3>
                <div class="control">
                    <div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
                </div>
                <div class="clear"></div>
                <ul>
                    <!--<div class="per-border"></div>-->
                    <volist name="data" id="v">
                        <if condition="$v.active eq 1">
                            <li class="user-addresslist defaultAddr" name="{$v.id}">
                                <ins class="deftip" style="margin:8px 10px 0 0">默认地址</ins>
                                <else/>
                            <li class="user-addresslist"  style="cursor: pointer" name="{$v.id}">
                        </if>
                        <div class="address-left">
                            <div class="user DefaultAddr">
                                <span class="buy-address-detail">
                                    <span class="buy-user">{$v.username}</span>
									<span class="buy-phone">{$v.phone}</span>
                                </span>
                            </div>
                            <div class="default-address DefaultAddr">
                                <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                <span class="buy--address-detail">
                                    <span class="province">{$v.ps}</span>
									<span class="city">{$v.qs}</span>
									<span class="dist">{$v.ws}</span>
									<span class="street">{$v.xyd}</span>
                                </span>
                            </div>
                        </div>
                        </li>
                    </volist>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <!--订单 -->
            <div class="concent">
                <div id="payTable">
                    <h3>确认订单信息</h3>
                    <div class="cart-table-th">
                        <div class="wp">
                            <div class="th th-item">
                                <div class="td-inner">商品信息</div>
                            </div>
                            <div class="th th-price">
                                <div class="td-inner">单价</div>
                            </div>
                            <div class="th th-amount">
                                <div class="td-inner">数量</div>
                            </div>
                            <div class="th th-sum">
                                <div class="td-inner">金额</div>
                            </div>
                            <div class="th th-oplist">
                                <div class="td-inner">快递费用</div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <tr class="item-list">
                        <div class="bundle  bundle-last">
                            <input type="hidden" name="gid[]" value="{$data2.id}"/>
                            <div class="bundle-main">
                                <ul class="item-content clearfix">
                                    <div class="pay-phone">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a href="{{url('goods/index',['gid'=>$data['id'],'status'=>$data['status']])}}" class="J_MakePoint">
                                                    <img src="{{url('uploads')}}/{{$data['pic']}}" class="itempic J_ItemImg" height="78" width="78"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="{{url('goods/index',['gid'=>$data['id'],'status'=>$data['status']])}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$data['goodsname']}}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-info">
                                            <div class="item-props">
                                                <span class="sku-line">颜色：随机</span>
                                                <span class="sku-line">包装：裸装</span>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price price-promo-promo">
                                                <div class="price-content">
                                                    <input type="hidden" value="{{$data['price']}}" name="gidprice{{$data['id']}}"/>
                                                    <em class="J_Price price-now">{{$data['price']}}</em>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                    <li class="td td-amount">
                                        <div class="amount-wrapper ">
                                            <div class="item-amount ">
                                                <span class="phone-title">购买数量</span>
                                                <div class="sl">
                                                    <input class="min am-btn" name="" type="button" value="-" />
                                                    <input class="text_box" name="buynum{{$data['id']}}" type="text" value="{{$data['buynum']}}" style="width:30px;" readonly="readonly"/>
                                                    <input class="add am-btn" name="{{$data['id']?$data['id']:0}}" type="button" value="+" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-sum">
                                        <div class="td-inner">
                                            <em tabindex="0" class="J_ItemSum number">{{$data['orderprice']}}</em>
                                        </div>
                                    </li>
                                    <li class="td td-oplist">
                                        <div class="td-inner">
                                            <div class="pay-logis">
                                                <b class="sys_item_freprice">0</b>元
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </tr>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="pay-total">
                <!--留言-->
                <div class="order-extra">
                    <div class="order-user-info">
                        <div id="holyshit257" class="memo">
                            <label>买家留言：</label>
                            <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" name="msg" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
                            <div class="msg hidden J-msg">
                                <p class="error">最多输入500个字符</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!--信息 -->
            <div class="order-go clearfix">
                <div class="pay-confirm clearfix">
                    <div class="box">
                        <div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
                            <span class="price g_price ">
                                <input type="hidden" name="orderprice" value="{$data2['price']*$data2['buynum']}" class="orderprice"/>
                                <em class="style-large-bold-red " id="J_ActualFee">
                                    @if($data['status']==1)
                                        <input type="hidden" name="jf" value="{{$data['id']}}"/>
                                        {{$data['price']*$data['buynum']}}积分
                                    @else
                                        {{$data['price']*$data['buynum']}}元
                                    @endif
                                </em>
                            </span>
                        </div>
                        <div id="holyshit268" class="pay-address">
                            <volist name="data" id="v1">
                                <if condition="$v1.active eq 1">
                                    <input type="hidden" name="sid" value="{$v1.id}" class="sid"/>
                                    <p class="buy-footer-address">
                                        <span class="buy-line-title buy-line-title-type">寄送至：</span>
                                        <span class="buy--address-detail">
                                            <span class="province1">{$v1.ps}</span>
											<span class="city1">{$v1.qs}</span>
											<span class="dist1">{$v1.ws}</span>
											<span class="street1">{$v1.xyd}</span>
                                        </span>
                                    </p>
                                    <p class="buy-footer-address">
                                        <span class="buy-line-title">收货人：</span>
                                        <span class="buy-address-detail">
                                            <span class="buy-user1">{$v1.username}</span>
											<span class="buy-phone1">{$v1.phone}</span>
                                        </span>
                                    </p>
                                </if>
                            </volist>
                        </div>
                    </div>
                    <div id="holyshit269" class="submitOrder">
                        <div class="go-btn-wrap">
                            <a id="J_Go" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</form>
<div class="theme-popover-mask"></div>
<div class="theme-popover">
    <!--标题 -->
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
    </div>
    <hr/>
    <div class="am-u-md-12">
        <form class="am-form am-form-horizontal" id="form5">
            <div class="am-form-group">
                <label for="user-name" class="am-form-label">收货人</label>
                <div class="am-form-content">
                    <input type="text" id="user-name" placeholder="收货人" name="username">
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-phone" class="am-form-label">手机号码</label>
                <div class="am-form-content">
                    <input id="user-phone" placeholder="手机号必填" type="text" name="phone">
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-phone" class="am-form-label">所在地</label>
                <div class="am-form-content address">
                    <select class="select" name="ps" id="s1">
                        <option></option>
                    </select>
                    <select class="select" name="qs" id="s2">
                        <option></option>
                    </select>
                    <select class="select" name="ws" id="s3">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-intro" class="am-form-label">详细地址</label>
                <div class="am-form-content">
                    <textarea class="" rows="3" id="user-intro" name="xyd"></textarea>
                    <small>100字以内写出你的详细地址...</small>
                </div>
            </div>
            <div class="am-form-group theme-poptit">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <div class="am-btn am-btn-danger" id="add2">保存</div>
                    <div class="am-btn am-btn-danger close" style="margin-left: 30px">取消</div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="clear"></div>
@include('index.public.footer')
</body>
<script>
    $(function(){
        $(".add").click(function(){
            var add=$(this).attr('name');
            //  alert(add);
            if(parseInt(add)){
                $(this).attr(readonly);
            }
            var t=$(this).parent().find('input[class*=text_box]');
            if(parseInt(t.val())>9) {
                t.val(9);
                return false;
            }
            var g=$('.J_Price').text();
            $.post("{:U('Order/price')}",{buy:parseInt(t.val())+1,price:g},function(res){
                $('.J_ItemSum').text(res.orderprice);
                $('#J_ActualFee').text(res.orderprice+"元");
                $('.orderprice').val(res.orderprice);
            })
        })
        $(".min").click(function(){
            var t=$(this).parent().find('input[class*=text_box]');
            if(2>parseInt(t.val())){
                t.val(2);
                return false;
            }else{
                var j=$('.J_Price').text();
                $.post("{:U('Order/price')}",{buy:parseInt(t.val())-1,price:j},function(res){
                    $('.J_ItemSum').text(res.orderprice);
                    $('#J_ActualFee').text(res.orderprice+"元");
                    $('.orderprice').val(res.orderprice);
                })
            }


        })
        $('.btn-go').click(function(){
            var p=$('.province1').text();
            var b=$('.buy-user1').text();
            var p1=$('.buy-phone1').text();
            var d1=$('.dist1').text();
            //alert(String(r));
            if(String(p)=="" && String(b)=="" && String(p1)=="" && String(d1)==""){
                layer.msg('收货人不能为空');
                return false;
            }else{
                $('#form1').submit();
            }
        });
    })
</script>
</html>