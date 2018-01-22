<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的评价</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/orstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('asset_index/js/jquery-1.9.min.js')}}"></script>
    <script src="{{asset('asset_index/js/amazeui.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
</head>
<style type="text/css">
    .waitcomment_list{width: 1018px;height:auto;background: #fff;}
    .waitcomment_list ul{display: block;height: 140px;width: 1018px;margin-top: 15px;}
    .waitcomment_list ul{border:1px dashed #fff;}
    .waitcomment_list ul:hover{border:1px dashed #c7c7c7;}
    .waitcomment_list ul li{display: block;text-align: center;text-decoration: none;width: 125px;height:120px;float: left;  }
    .comment_list_first{margin-top: 20px;}
    .comment_list_li{line-height: 120px;}
    .gotocom{margin-top: 45px;margin-left: 40px;text-align: center;line-height: 35px;display: block;width: 55px;height:35px;background: #e1e1e1;border:1px solid #9C9C9C;border-radius: 4px;}
    .gotocom:hover{background: #c7c7c7;}
    .gotocom:focus{outline: none;}
    .sousuo_div{width: 1018px;height:120px;background:#f1f2ee;text-align: center;margin:200px 0;}
    .sousuo_div img{display: block;width: 78px;height: 120px;float: left;margin-left: 400px;}
    .sousuo_div span.sousuo_span{display: block;width: 260px;height: 120px;line-height: 120px;float: left}
    .pagin{margin-top: 15px;}
    .paginList{display:block;float: right}
    .paginList a,.paginList span{display: inline-block;width:30px;height:30px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 30px;background: #f43838;  color:#fff;  border: 1px solid #c2d2d7;border-radius: 3px  }
    .paginList a:hover{background: #666666;}
    .paginList span{background: #c0c0c0;color: #fff;font-weight: bold;}
    .footpage{width: 250px;float: left;height:25px;font-size: 16px;}
</style>
<body>
<!--头 -->
@include('index.public.header')
@include('index.public.nav')
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div class="user-order">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">已评价商品</strong></div>
                </div>
                <hr/>
                <div class="am-tabs-bd">
                    <div class="order-top" style=" background: #c2ccd1;padding-top: 10px;">
                        <div class="th th-item" style="width:130px;">
                            <td class="td-inner">商品图片</td>
                        </div>
                        <div class="th th-item" style="width:200px;">
                            <td class="td-inner">商品名称</td>
                        </div>
                        <div class="th th-price">
                            <td class="td-inner" style="width:130px;">单价</td>
                        </div>
                        <div class="th th-number" style="width:130px;">
                            <td class="td-inner">数量</td>
                        </div>
                        <div class="th th-amount" style="width:130px;">
                            <td class="td-inner">时间</td>
                        </div>
                        <div class="th th-status" style="width:130px;">
                            <td class="td-inner">内容</td>
                        </div>
                        <div class="th th-change" style="width:130px;">
                            <td class="td-inner">回复</td>
                        </div>
                    </div>
                    <div class="waitcomment_list">
                        @foreach($list as $val)
                            <ul class="comment_list_ul">
                                <li class="comment_list_first"><img src="{{url('uploads')}}/{{mb_substr($val['goods']['pic'],0,11)}}thumb100_{{mb_substr($val['goods']['pic'],11)}}" style="width: 80px;height:80px;" alt=""/></li>
                                <li class="comment_list_first" style="width:200px;">{{$val['goods']['goodsname']}}</li>
                                <li class="comment_list_li">{{$val['goods']['price']}}</li>
                                <li class="comment_list_li">{{$val['buynum']}}</li>
                                <li class="comment_list_li">{{date('Y-m-d',$val['edittime'])}}</li>
                                <li class="comment_list_li">{{$val['content']}}</li>
                                <li class="comment_list_li">{{$val['response']}}</li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="pagin">
                        <div class="footpage">共<i class="blue" style="color: #0077cc;font-size: 14px;">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue" style="color: #0077cc;font-size: 14px;">{{$list->currentPage()}}&nbsp;</i>页</div>
                        <ul class="paginList">
                            {{$list->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('index.public.list')
</div>
<script>
    $(function(){
        $('.person li').removeClass('active');
        $(".person li a:contains('评价')").parent().addClass('active');
    })
</script>
@include('index.public.footer')
</body>
</html>
