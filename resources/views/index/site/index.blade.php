<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>地址管理</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/addstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('asset_index/js/linkage.js')}}"></script>
    <script src="{{asset('asset_index/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script>
        $(function(){
            //省市级三级联动
            setup();
            preselect('河南省');
        })
    </script>
    <script>
        $(function(){
            $('#add1').click(function(){
                $.post("{:U('Site/index')}",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time: 800, icon:6}, function(){
                            location.href="";})
                    }else{
                        layer.msg(res.info,{time: 1000, icon:2})
                    }
                },'json')
            })
            $(".new-option-r").click(function(){
                //alert($(this).attr("name"))
                i=$(this).attr("name")
                $.get("{:U('Site/def')}",{active:i},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time: 800, icon:6}, function(){
                            location.href="";
                        })
                    }else{
                        layer.msg(res.info,{time: 1000, icon:6})
                    }
                },'json')
            })
            $(".del").click(function(){
                var j=$(this).attr("name");
                del=$(this);
                layer.confirm('您要删除地址吗？', {btn: ['确定','取消'],title:'提示'},function(){
                    $.get("{:U('Site/del')}",{id:j},function(res){
                        if(res.status==1){
                            del.parents('.user-addresslist').hide();
                            layer.msg(res.info,{time: 800, icon:6})
                        }else{
                            layer.msg(res.info,{time: 1000, icon:2})
                        }
                    },'json')
                })
            })
            $('.person li').removeClass('active');
            $(".person li a:contains('收货地址')").parent().addClass('active');
        })
    </script>
</head>
<body>
<!--头 -->
<header>
    <article>
        <!--<div class="mt-logo">-->
        <!--顶部导航条 -->
        @include('index.public.header')
        <!-- </div>-->
    </article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div class="user-address">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
                </div>
                <hr/>
                <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
                    <volist name="data" id="val">
                        <if condition="$val.active eq 1">
                            <li class="user-addresslist defaultAddr">
                                <span class="new-option-r" name="{$val.id}"><i class="am-icon-check-circle"></i>默认地址</span>
                                <else/>
                            <li class="user-addresslist aaa">
                                <span class="new-option-r" name="{$val.id}"><i class="am-icon-check-circle"></i>设为默认</span>
                        </if>
                        <p class="new-tit new-p-re">
                            <span class="new-txt">{$val.username}</span>
                            <span class="new-txt-rd2">{$val.phone}</span>
                        </p>
                        <div class="new-mu_l2a new-p-re">
                            <p class="new-mu_l2cw">
                                <span class="title">地址：</span>
                                <span class="province">{$val.ps}</span>
                                <span class="city">{$val.qs}</span>
                                <span class="dist">{$val.ws}</span>
                                <span class="street">{$val.xyd}</span>
                            </p>
                        </div>
                        <div class="new-addr-btn">
                            <a href="{:U('Site/alte?id='.$val['id'])}" style="cursor: pointer;"><i class="am-icon-edit"></i>编辑</a>
                            <span class="new-addr-bar">|</span>
                            <a class="del" style="cursor: pointer;" name="{$val.id}"><i class="am-icon-trash"></i>删除</a>
                        </div>
                    </volist>
                </ul>
                <div class="clear"></div>
                <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
                <!--例子-->
                <div class="am-modal am-modal-no-btn" id="doc-modal-1">
                    <div class="add-dress">
                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small>&nbsp;&nbsp;
                                最多保存10个地址
                            </div>
                        </div>
                        <hr/>
                        <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                            <form class="am-form am-form-horizontal" action="{:U('Site/index')}" method="post" id="form1">
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
                                    <label for="user-address" class="am-form-label">所在地</label>
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
                                        <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="xyd"></textarea>
                                        <small>100字以内写出你的详细地址...</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <a class="am-btn am-btn-danger" id="add1">保存</a>
                                        <a href="{:U('Site/index')}" class="am-close am-btn am-btn-danger" style="margin-left:70px" data-am-modal-close>取消</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".new-option-r").click(function() {
                        $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                    });
                    var $ww = $(window).width();
                    if($ww>640) {
                        $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
                    }
                })
            </script>
            <div class="clear"></div>
        </div>
        <!--底部-->
    </div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>