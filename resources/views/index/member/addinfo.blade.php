<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<title>个人资料</title>
	<link href="{{asset('asset_index/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/infstyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/common.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('asset_index/css/webuploader.css')}}" rel="stylesheet" type="text/css">   <!----上传图像---->
	<script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/layer/layer.js')}}"></script>
	<script type="text/javascript" src="{{asset('asset_index/js/date.js')}}" ></script>
	<script type="text/javascript" src="{{asset('asset_index/js/jquery.form.js')}}" ></script>
	<script type="text/javascript" src="{{asset('asset_index/js/iscroll.js')}}" ></script>
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
	<script>
        $(function() {
            //提交商品发布表单
            $('#yt').click(function () {
                $('#form1').ajaxSubmit(function (res) {
                    if (res.status == 1) {
                        layer.msg(res.info, {icon: 6, time: 800},
                            function () {
                                location.href = "{:U('Login/showInfo')}";
                            })
                    } else {
                        layer.msg(res.info);
                    }
                });
                return false;
            })
        })
	</script>
	<style type="text/css">
		.demo{width:300px;margin:40px auto 0 auto;}
		.demo .lie{margin:0 0 20px 0;}
	</style>
</head>
<body>
<header>            <!----头---->
	<article>
		@include('index.public.header')
	</article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="center">
	<div class="col-main">
		<div class="main-wrap">
			<div class="user-info">
				<!--标题 -->
				<form action="{{url('member/changeInfo')}}" class="am-form am-form-horizontal" enctype="multipart/form-data" method="post" id="form1">
					<input type="hidden" name="mid" value="{{$info->id}}">
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">完善信息</strong> / <small>Complete&nbsp;information</small></div>
					</div>
					<hr/>
					<!--头像 -->
					<div class="user-infoPic">
						<div style="float:left;margin-left: 50px;font-size: 14px;font-weight: 600">选择图像：
						</div>
						<div class="usercity" style="margin-left: 142px;border:3px dashed #e6e6e6;width:120px;height:120px;">
							<p id="preview1" ><img style="position: absolute;" width="96" height="80" id="imghead1"  border=0 src='{{url($info->touxiang)}}'></p><span></span>
							<input type="file" id="image1" name="image[]" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
							<label for="image1"  style="margin:77px 7px;color:#fff;text-align:center;border-radius:4px;width:100px;height:26px;line-height:20px;font-size:14px;background:#00b7ee;padding:3px 9px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">选择图片</label>
						</div>
					</div>
					<!--个人信息 -->
					<div class="info-main">
						<div class="am-form-group">
							<label for="user-name" class="am-form-label">真实姓名：</label>
							<div class="am-form-content">
								<input type="text" value="{{$info->name}}" name="name" id="user-name2" placeholder="name">
							</div>
						</div>
						<div class="am-form-group">
							<label class="am-form-label">性别：</label>
							<div class="am-form-content sex">
								<label class="am-radio-inline">
									<input type="radio" name="sex" value="男" data-am-ucheck {{$info->sex=='男'?'checked':''}}> 男
								</label>
								<label class="am-radio-inline">
									<input type="radio" name="sex" value="女" data-am-ucheck {{$info->sex=='女'?'checked':''}}> 女
								</label>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-birth" class="am-form-label">生日：</label>
							<div style="margin: -37px 0 0 -224px">
								<div class="demo">
									<div class="lie"><input value="{{$info->birthday}}" name="birthday" id="beginTime" placeholder="例：1995-04-12" class="kbtn" style="padding-left: 0.5em;height: 32px;width: 615px;border: 1px solid #E4EAEE;"/></div>
								</div>
								<div id="datePlugin"></div>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号：</label>
							<div class="am-form-content">
								<input name="mobile" value="{{$info->mobile}}" id="user-phone" placeholder="mobile" type="tel">
							</div>
						</div>
						<div class="am-form-group" style="margin-bottom: 15px">
							<label for="user-email" class="am-form-label">Email：</label>
							<div class="am-form-content">
								<input type="email" required name="email" value="{{$info->email}}" id="user-email" placeholder="Email">
							</div>
						</div>
						<div class="info-btn">
							<input type="button" style="width: 100px;margin-bottom: 10px" value="保存" class="am-btn am-btn-primary am-btn-sm am-f" id="yt">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--底部-->
	</div>
    @include('index.public.list')
</div>
@include('index.public.footer')
</body>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 120;
        var MAXHEIGHT = 100;
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
            }
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px',width:'80px',padding:'3px'}).html('重新选择');
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
</html>