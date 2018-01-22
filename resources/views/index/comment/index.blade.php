<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>发表评论</title>
    <link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/star/css/dafei.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('webupload/webuploader.css')}}" />
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/appstyle.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/star/js/comment.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/jquery.form.js')}}"></script>
    <style type="text/css">
        .sousuo_div{width: 1018px;height:120px;background:#f1f2ee;text-align: center;margin:60px 0 0 0;}
        .sousuo_div img{display: block;width: 78px;height: 120px;float: left;margin-left: 400px;}
        .sousuo_div span.sousuo_span{display: block;width: 260px;height: 120px;line-height: 120px;float: left}
        .pagin{margin-top: 15px;}
        .paginList{display:block;float: right}
        .paginList a,.paginList span{display: inline-block;width:30px;height:30px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 30px;background: #f43838;  color:#fff;  border: 1px solid #c2d2d7;border-radius: 3px  }
        .paginList a:hover{background: #666666;}
        .paginList span{background: #c0c0c0;color: #fff;font-weight: bold;}
        .footpage{width: 250px;float: left;height:25px;font-size: 16px;}
        .xianzhi{width: 75px;height:17px;float: right;color:#ccc;margin-top: -21px;}
    </style>
    {{--<script type="text/javascript">
        var uploadUrl = '{:U("uploadActivityPic")}';
        var listUrl = '{:U("ActiveList")}';
    </script>--}}
</head>
<body>
<!--头 -->
@include('index.public.header')
@include('index.public.nav')
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div class="user-comment">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
                </div>
                <hr/>
                <div class="comment_top" style="width: 1000px;height:50px;">
                    <h2>亲，其他买家需要你的评价哦，赶快评价吧！</h2>
                </div>
                <div class="comment-main">
                    <div class="sousuo_div" style="display: none;"><img src="{{asset('asset_index/suntu/images/sousuo.png')}}" alt=""/><span class="sousuo_span">恭喜你已完成评价！！</span></div>
                    {{--<empty name="commentinfo">
                        <div class="sousuo_div"><img src="{{asset('asset_index/suntu/images/sousuo.png')}}" alt=""/><span class="sousuo_span">没有要评价的商品，赶紧去买买买！</span></div>
                        <else/>--}}
                        <div class="comment-list">
                            <form action="{{url('comment/comment')}}" method="post" id="commentForm" enctype="multipart/form-data">
                                <div class="yinchang" style="width: 1000px;height: 316px;border:1px solid #ccc;display:block;float: left;">
                                    <!--星星打分-->
                                    <div class="quiz">
                                        <div class="quiz_content">
                                            <div class="goods-comm">
                                                <div class="goods-comm-stars">
                                                    <span class="star_l"><b style="color: red;">*</b> 描述相符：</span>
                                                    <div id="rate-comm-1" class="rate-comm"></div>
                                                </div>
                                            </div>
                                            <div class="goods-comm">
                                                <div class="goods-comm-stars">
                                                    <span class="star_l"><b style="color: red;">*</b> 卖家服务：</span>
                                                    <div id="rate-comm-2" class="rate-comm"></div>
                                                </div>
                                            </div>
                                            <div class="goods-comm">
                                                <div class="goods-comm-stars">
                                                    <span class="star_l"><b style="color: red;">*</b> 物流服务：</span>
                                                    <div id="rate-comm-3" class="rate-comm"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-opinion">
                                        <li class="option_g1"><i class="op1"></i>好评</li>
                                        <li class="option_g2"><i class="op2"></i>中评</li>
                                        <li class="option_g3"><i class="op3"></i>差评</li>
                                    </div>
                                    <input type="hidden" name="oid" value="{{$oid}}"/>
                                    <input type="hidden" name="gid" value="{{$gid}}"/>
                                    <input type="hidden" id="sunphoto" name="sunphoto" value="default"/>
                                    <div class="comment_detail">
                                        <ul class="comment_ul1">
                                            <li>商品图片</li>
                                            <li>商品名称</li>
                                            <li>选购热点</li>
                                            <li>商品单价</li>
                                        </ul>
                                        <ul class="comment_ul2">
                                            <li class="comment_first" style="display: block;margin-top: -5px;height: 80px"><img src="{{url('uploads')}}/{{mb_substr($info['pic'],0,11)}}thumb100_{{mb_substr($info['pic'],11)}}" alt="" style="width: 78px;height:78px;"/></li>
                                            <li class="comment_li" style="margin-top: 15px;">{{$info['goodsname']}}</li>
                                            <li class="comment_li" style="margin-top: 15px;">{{$info['hot']}}</li>
                                            <li class="comment_li" style="margin-top: 15px;">{{$info['price']}}</li>
                                        </ul>
                                        <div class="comment_cont">
                                            <textarea name="content" id="content" placeholder="主人说,给个好评会有意想不到的收获哦!"></textarea>
                                            <div class="xianzhi">(10-100字)</div>
                                        </div>
                                        <li>
                                            <div class="usercity" style="border:1px solid #e6e6e6;width:75px;height:75px;position: relative;float: left;">
                                                <p style="height:74px;width: 74px;" id="preview1" ><img style="width: 0px;" id="imghead1"  border=0 src=''></p><span></span>
                                                <input type="file" id="image1" name="image" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                                                <label for="image1"  style="margin:0;color:#fff;text-align:center;border-radius:4px;width:65px;height:26px;line-height:26px;font-size:14px;background:#0099CC;padding:0;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">晒图片</label>
                                            </div>
                                        </li>
                                        <div class="fabiao"><a href="javascript:;" id="submitForm">提交评价</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="clear"></div>
                    <div class="comment_listall">
                        <ul class="comment_list_ul">
                            <li>
                                <span>全部评价({{$list->total()}})</span>
                            </li>
                            <li class="">
                                <span>好评({{$num['num1']}})</span>
                            </li>
                            <li class="">
                                <span>中评({{$num['num2']}})</span>
                            </li>
                            <li class="">
                                <span>差评({{$num['num3']}})</span>
                            </li>
                        </ul>
                        <ul class="comment_list_num">
                            @foreach($list as $val)
                                <li class="am-comment">
                                    <!-- 评论容器 -->
                                    <a href="">
                                        @if(empty($val['member']['touxiang']))
                                            <img class="am-comment-avatar" src="{{asset('asset_index/images/hwbn40x40.jpg')}}" />
                                        @else
                                            <img class="am-comment-avatar" src="{{url($val['member']['touxiang'])}}" />
                                        @endif
                                        <!-- 评论者头像 -->
                                    </a>
                                    <div class="am-comment-main">
                                        <!-- 评论内容容器 -->
                                        <header class="am-comment-hd">
                                            <!--<h3 class="am-comment-title">评论标题</h3>-->
                                            <div class="am-comment-meta">
                                                <!-- 评论元数据 -->
                                                <a href="#" class="am-comment-author">{{$val['member']['username']}}</a>
                                                <!-- 评论者 -->
                                                评论于
                                                <time datetime="">{{date('Y-m-d H:i:s',$val['edittime'])}}</time>
                                            </div>
                                        </header>
                                        <div style="padding:0 13px;"><img style="width: 60px;height: 60px;margin:0 5px;border:1px solid #ccc;" src="{{url('uploads')}}/{{mb_substr($val['goods']['pic'],0,11)}}thumb100_{{mb_substr($val['goods']['pic'],11)}}"/><span style="display: inline-block;height: 45px;font-size: 18px;width: 500px;">{{$val['goods']['goodsname']}}</span></div>
                                        <div class="am-comment-bd">
                                            <div class="tb-rev-item " data-id="255776406962">
                                                <div class="J_TbcRate_ReviewContent tb-tbcr-content " style="color:#999;width: 400px;word-break: break-all">
                                                    评价内容：{{$val['content']}}
                                                </div>
                                                @if(!empty($val['response']))
                                                    <div class="J_TbcRate_ReviewContent tb-tbcr-content " style="color: #999">回复:
                                                        {{$val['response']}}
                                                    </div>
                                                @endif
                                                <div class="tb-r-act-bar">
                                                    <div style="margin-top: 5px;color: #999">{{$val['status']['status']}}</div>
                                                    @if(!empty($val['photo']))
                                                        <img src="{{url($val['photo'])}}" style="display: block;width:60px;height:60px;border: 1px solid #ccc" alt=""/>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <div class="pagin">
                                <div class="footpage">共<i class="blue" style="color: #0077cc;font-size: 14px;">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue" style="color: #0077cc;font-size: 14px;">{{$list->currentPage()}}&nbsp;</i>页</div>
                                <ul class="paginList">
                                    {{$list->links()}}
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $(".item-opinion li").click(function() {
            $(this).prevAll().children('i').removeClass("active");
            $(this).nextAll().children('i').removeClass("active");
            $(this).children('i').addClass("active");
            $('input[name="sunphoto"]').val($(this).text())

        });

        //提交评价
        $('#submitForm').click(function(){
            if($('input[name="sunphoto"]').val()!='default' && $('#content').val().length>10){
                $('#commentForm').ajaxSubmit(function(res){
                    dir="/Uploads/"+res.info['pic'].slice(0,10);
                    name='/thumb100_'+res.info['pic'].slice(11);
                    str='<li class="am-comment">'
                    str+='<a href="">'
                    if(res.info['touxiang']){
                        str+='<img class="am-comment-avatar" src="'+res.info['touxiang']+'"/>'
                    }else{
                        str+='<img class="am-comment-avatar" src="{{asset('asset_index/images/hwbn40x40.jpg')}}" />'
                    }
                    str+='</a>'
                    str+='<div class="am-comment-main">'
                    str+='<header class="am-comment-hd">'
                    str+='<div class="am-comment-meta">'
                    str+='<a href="#" class="am-comment-author">{:I("session.username")}</a>'
                    str+='评论于'
                    str+='<time datetime="">'+res.info['edittime']+'</time>'
                    str+='</div>'
                    str+='</header>'
                    str+='<div style="padding:0 13px;"><img style="width: 60px;height:60px;margin:0 5px;border:1px solid #ccc;" src="'+dir+name+'"/><span style="display: inline-block;height: 45px;font-size: 18px;width: 500px;">'+res.info['goodsname']+'</span></div>'
                    str+='<div class="am-comment-bd">'
                    str+='<div class="tb-rev-item " data-id="255776406962">'
                    str+='<div class="J_TbcRate_ReviewContent tb-tbcr-content" style="color:#999;width: 400px;word-break: break-all">'+res.info['content']+'</div>'
                    str+='<div class="tb-r-act-bar">'
                    str+='<div style="margin-top: 5px">'+res['info']['status']+'</div>'
                    if(res.info['photo']){
                        str+='<img src="'+res.info['photo']+'" style="display: block;width:60px;height:60px;" alt=""/>'
                    }
                    str+='</div>'
                    str+='</div>'
                    str+='</div>'
                    str+='</li>'
                    $('.comment_list_num').prepend(str);
                    if(res.status){
                        layer.msg('评价成功',{
                            icon:1,
                            time:1200
                        });
                    }else{
                        layer.msg(res.info)
                    }
                });
                $('.yinchang').hide();
                $('.sousuo_div').show();
            }else{
                layer.msg('亲,评价内容忒少啦或未勾选好中差哦！',{icon:2, time:1200})
            }
            return false;
        });

        $(function(){
            $('.person li').removeClass('active');
            $(".person li a:contains('评价')").parent().addClass('active');
        })

        $('li[class="option_g1"]').click(function(){
            layer.tips('信用+1',$(this),{tips:[3,'red']});
        })
        $('li[class="option_g2"]').click(function(){
            layer.tips('信用+0',$(this),{tips:[3,'pink']});
        })
        $('li[class="option_g3"]').click(function(){
            layer.tips('信用-1',$(this),{tips:[3,'gray']});
        })
    })
</script>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 80;
        var MAXHEIGHT = 80;
        var div = document.getElementById(pre);
        if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
            //$(this).prev('span').text('图片格式无效！');
            $('#'+pre).next('span').css({"color":"red","font-weight":"bold"}).text('图片类型无效！');
            return false;
        }else{
            $('#'+pre).next('span').css({"color":"green","font-weight":"bold"}).text('');
        }
        if (file.files && file.files[0])
        {
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
            };
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;}
            reader.readAsDataURL(file.files[0]);
        }
        else //兼容IE
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            file.blur();
            var src = document.selection.createRange().text;
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        }

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新');
    }
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;

            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }

        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
</script>

