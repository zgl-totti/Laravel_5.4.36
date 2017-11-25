<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('webupload/webuploader.css')}}" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('webupload/webuploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('webupload/upload.js')}}"></script>
    <style type="text/css">
        #d1,#d2{
            width: 165px;
            height: 30px;
            padding-left: 30px;
        }
    </style>
    <script type="text/javascript">
        var uploadUrl = '{:U("uploadActivityPic")}';
        var listUrl = '{:U("ActiveList")}';
        var alertMsg = '活动发布成功';
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                filterMode: true,
                afterBlur: function(){  //利用该方法处理当富文本编辑框失焦之后，立即同步数据
                    this.sync("#content7") ;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 200
            });
            $('#form1').submit(function(){
                $(this).ajaxSubmit(function(res){
                    if(res.status==1){
                        $('.uploadBtn').click();
//                layer.confirm(res.info, {
//                    btn: ['继续添加','查看活动列表'] //按钮
//                }, function(){
//                    location='{:U("add")}';
//                }, function(){
//                    location='{:U("ActiveList")}';
//                });
                    }else{
                        layer.alert(res.info);
                    }
                });
                return false;
            })
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">添加活动</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="{:U('add')}" id="form1" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>活动名称<b>*</b></label><input name="activityname" type="text" class="dfinput" placeholder="请填写活动名称"  style="width:200px;"/></li>
                    <li><label>活动时间<b>*</b></label><input class="Wdate" name="starttime" type="text" id="d1" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/><input class="Wdate" type="text" name="stoptime" id="d2" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/></li>
                    <li><label>活动品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="brand" class="select1">
                                <option>品牌名称</option>
                                @foreach($brand as $val)
                                    <option value="{{$val['brandname']}}">{{$val['brandname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>活动主图<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                            <input type="file" id="image1" name="image" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                            <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择主图</label>
                        </div>
                    </li>
                    <li >
                        <label>活动副图<b>*</b></label>
                        <div class="uploader-list-container vocation" style="width: 525px;border:0px;">
                            <div class="queueList">
                                <div id="dndArea" class="placeholder">
                                    <div id="filePicker-2"></div>
                                    <p>或将照片拖到这里，单次最多可选10张</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
                                <div class="info"></div>
                                <div class="btns">
                                    <div id="filePicker2"></div>
                                    <div class="uploadBtn" style="display: none">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><label>活动内容<b>*</b></label>
                        <textarea id="content7" name="content" style="width:700px;height:250px;visibility:hidden;"></textarea>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/></li>
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
