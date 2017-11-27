<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('asset_admin/js/webuploader/0.1.5/webuploader.css')}}" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <style type="text/css">
        .forminfo li label.error{background: #885621;position: relative;left: 10px;float: none;display: inline-block;background: none}
        .forminfo li label { width: 100px; line-height: 30px}
        .error{font-weight:bold;color:red;width: 100px;}
        .ok{color:green}
        div input{margin: 0px;padding: 0px;}
        #d1 ,#d2 {
            width: 150px;
            height: 22px;
            padding-right: 30px;
        }
        .filelist:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            overflow: hidden;
            clear: both;
        }
        input.btn{margin-left: 280px}
    </style>
    <script type="text/javascript">
        var listUrl = '{:U("AdminList")}';
        $(document).ready(function(e) {
            KindEditor.ready(function (K) {
                K.create('#content7', {
                    allowFileManager: true,
                    filterMode: true,
                    afterBlur: function () {
                        this.sync('#content7');
                    }
                });
            });
            $(".select1").uedSelect({
                width: 345
            });
            $(".select2").uedSelect({
                width: 167
            });
            $(".select3").uedSelect({
                width: 100
            });
            $('.btn').click(function(){
                $('#form1').ajaxSubmit(function(res){
                    if(res.code==1){
                        layer.msg(res.info, {icon:1}, function(){
                            location.href="{{url('admin/advertise_index')}}"
                        });
                    }else{
                        layer.msg(res.info);
                    }
                });
                return false;
            });
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="{{url('admin/advertise_edit',['id'=>0])}}" method="post" id="form1" enctype="multipart/form-data">
                <input type="hidden" value="{{$info['id']}}" name="id"/>
                <ul class="forminfo">
                    <li><label>时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间<b>*</b></label>
                        <input name="addtime" id="d1" class="Wdate scinput" placeholder="请选择开始时间" value="{{date('Y-m-d',$info['addtime'])}}" type="text" onFocus="WdatePicker({isShowClear:false,readOnly:true})" />
                        <input name="overtime" id="d2" class="Wdate scinput " placeholder="请选择结束时间" value="{{date('Y-m-d',$info['overtime'])}}" type="text"  onFocus="WdatePicker({isShowClear:false,readOnly:true})" />
                    </li>
                    <li>
                        <label>图片<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                            <p id="preview0" ><img width="300" height="300" id="imghead0"  border=0 src="{{url('uploads')}}/{{$info['images']}}"></p><span></span>
                            <input type="file" id="image0" name="0" onchange="previewImage(this,'preview0','imghead0',300,300)" style="display:none;" >
                            <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改主图</label>
                        </div>
                    </li>
                    @if($info['location']==2 || $info['location']==3)
                        <li><label >商城头条标题<b>*</b></label>
                            <input type="text" id='title' name="title" value="{$info['title']}" class="dfinput" placeholder="请输入商城头条标题">
                        </li>
                    @endif
                    <li><label>广告位置<b>*</b></label>
                        <div class="vocation">
                            <select name="location" class="select1">
                                <option value="0" {{$info['location']==0?'selected':''}}>轮播图</option>
                                <option value="1" {{$info['location']==1?'selected':''}}>活动图</option>
                                <option value="2" {{$info['location']==2?'selected':''}}>商城头条图</option>
                                <option value="3" {{$info['location']==3?'selected':''}}>轮播内容图</option>
                            </select>
                        </div>
                    </li>
                    <li><label >广告内容<b>*</b></label>
                        <input type="text" name="content"  value="{{$info['content']}}" class="dfinput" placeholder="请输入相关商品分类名称">
                        <!--<textarea id="content7"   name="content" style="width:700px;height:250px;visibility:hidden;">{$info['content']}</textarea>-->
                    </li>
                    <li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="马上发布"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 150;
        var MAXHEIGHT = 150;
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新选择主图');
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
