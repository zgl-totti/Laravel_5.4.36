<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}'" rel="stylesheet" type="text/css" />
    <link href="{{asset('webupload/webuploader.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('webupload/upload.js')}}"></script>
    <script type="text/javascript" src="{{asset('webupload/webuploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/editor/kindeditor.js')}}"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
            $("#form1").submit(function(){
                $("#form1").ajaxSubmit(function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6},function(){
                            location="{{url('admin/brand_add')}}";
                        });
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                },'json');
                return false;
            })
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">品牌管理</a></li>
        <li><a href="#">添加品牌</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <ul class="forminfo">
                <form action="{{url('admin/brand_add')}}" method="post" id="form1" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <li><label>品牌名称<b>*</b></label><input name="brandname" type="text" class="dfinput" placeholder="请填写品牌名称"  style="width:200px;"/></li>
                    <li>
                        <label>品牌logo<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative;">
                            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                            <input type="file" id="image1" name="logo" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                            <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:150px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择品牌图片</label>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input style="background:#00b7ee;border-radius:4px;color:#fff;font-size:18px;" type="submit" class="btn" value="确认添加品牌"/></li>
                </form>
            </ul>
        </div>
    </div>
</div>
</body>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 300;
        var MAXHEIGHT = 300;
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
