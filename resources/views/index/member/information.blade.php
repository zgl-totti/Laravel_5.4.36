<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人资料</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/common.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/date.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/iscroll.js')}}"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            $('.person li').removeClass('active');
            $(".person li a:contains('个人信息')").parent().addClass('active');
            $('#beginTime').date();
            $('#yearwrapper').scroll(function(){
                event.stopPropagation()
            })
            $('#monthwrapper').scroll(function(){
                event.stopPropagation()
            })
            $('#daywrapper').scroll(function(){
                event.stopPropagation()
            })
        });
    </script>
    <style type="text/css">
        .demo{width:300px;margin:40px auto 0 auto;}
        .demo .lie{margin:0 0 20px 0;}
    </style>
</head>
<body>
<header>    <!--头 -->
    <article>   <!--顶部导航条 -->
        @include('index.public.header')
    </article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div >  <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                </div>
                <hr/>
                <!--头像 -->
                <div class="user-infoPic" style="margin-top: 0">
                    <div class="filePic">
                        <img class="am-circle am-img-thumbnail" src="{{url($info->touxiang)}}" alt="" />
                    </div>
                    <p class="am-form-help">头像</p>
                    <div class="info-m" style="margin-top: 10px">
                        <div><b>用&nbsp;&nbsp;户&nbsp;&nbsp;名&nbsp;&nbsp;<i>{{$info->username}}</i></b></div>
                        <div class="u-safety" style="margin-top: 10px">
                            <a style="color:black">
                                用户积分
                                <span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">&nbsp;{{$info->integral}}分</i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--个人信息 -->
                <div class="info-main">
                    @if($info->name=='' || $info->name=null)
                        <div>
                            <div style="font-size: 20px;margin: 50px 0 0 120px">
                                空空如也呢，亲！快去添加个人信息吧！！！
                            </div>
                            <div style="margin: 30px 0 0 250px;">
                                <a href="{:U('addinfo')}"><input type="button" style="width: 100px;margin-bottom: 20px" value="添加直达车" class="am-btn am-btn-primary am-btn-sm am-f"></a>
                            </div>
                        </div>
                    @else
                        <div>
                            <div style="margin-left: 110px">
                                <div>姓&nbsp;&nbsp;名：&nbsp;&nbsp;{{$info->name}}</div><br/>
                                <div>性&nbsp;&nbsp;别：&nbsp;&nbsp;{{$info->sex}}</div><br/>
                                <div>生&nbsp;&nbsp;日：&nbsp;&nbsp;{{$info->birthday}}</div><br/>
                                <div>电&nbsp;&nbsp;话：&nbsp;&nbsp;{{$info->mobile}}</div><br/>
                                <div>Email：&nbsp;&nbsp;{{$info->email}}</div>
                            </div>
                            <div style="margin-left: 110px">
                                <a href="{{url('member/changeInfo')}}"><input type="button" style="width: 100px;margin: 20px 0 20px 0;" value="修改" class="am-btn am-btn-primary am-btn-sm am-f"></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--底部-->
    </div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>