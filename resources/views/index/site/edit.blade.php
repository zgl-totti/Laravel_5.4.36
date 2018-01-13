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
    <script src="{{asset('asset_index/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script src="{{asset('asset_index/js/sjld.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/linkage.js')}}"></script>
    <script>
        $(function(){
            //省市级三级联动
            setup();
            preselect('{$show.ps}');
        })
    </script>
    <script>
        $(function(){
            $('#save1').click(function(){
                $.post("{:U('Site/index1')}",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg( res.info,{icon : 1,time:800},
                            function(){
                                location.href="{:U('Site/index')}";
                            })
                    }else{
                        layer.msg( res.info,{icon:2,time: 1000});
                    }
                },'json')
            })
        })
    </script>
</head>
<body>
<!--头 -->
<header>
    <article>
        <!--顶部导航条 -->
        @include('index.public.header')
    </article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div class="user-address">
                <!--标题 -->
                <!--例子-->
                <div class="am-modal am-modal-no-btn" id="doc-modal-1">
                    <div class="add-dress">
                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Add&nbsp;address</small></div>
                        </div>
                        <hr/>
                        <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                            <form class="am-form am-form-horizontal" action="{:U('Site/index')}" method="post" id="form1">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-form-label">收货人</label>
                                    <div class="am-form-content">
                                        <input type="text" id="user-name" value="{$show.username}" name="username">
                                        <input type="hidden" value="{$show.id}" name="mmid">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-form-label">手机号码</label>
                                    <div class="am-form-content">
                                        <input id="user-phone" value="{$show.phone}" type="text" name="phone">
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
                                            <option>{$show.ws}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-intro" class="am-form-label">详细地址</label>
                                    <div class="am-form-content">
                                        <textarea class="" rows="3" id="user-intro"  name="xyd">{$show.xyd}</textarea>
                                        <small>100字以内写出你的详细地址...</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <a class="am-btn am-btn-danger" id="save1">修改</a>
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