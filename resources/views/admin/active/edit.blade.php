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
    <style type="text/css">
        #d1,#d2{
            width: 165px;
            height: 30px;
            padding-left: 30px;
        }
    </style>
    <script type="text/javascript">
        //        var uploadUrl = '{:U("updateActivityPic")}';
        var listUrl = '{:U("ActiveList")}';
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
                        layer.msg(res.info, {icon:1}, function(){
                            location.href=listUrl
                        });
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
            <form action="{:U('edit')}" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{:I('get.id')}" name="iid"/>
                <ul class="forminfo">
                    <li><label>活动名称<b>*</b></label><input name="activityname" type="text" class="dfinput" value="{{$info['activityname']}}"  style="width:200px;"/></li>
                    <li><label>活动时间<b>*</b></label><input class="Wdate" name="starttime" value="{{date('Y-m-d',$info['starttime'])}}" type="text" id="d1" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/><input class="Wdate" type="text" value="{{date('Y-m-d',$info['stoptime'])}}" name="stoptime" id="d2" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/></li>
                    <li><label>活动品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="brand" class="select1">
                                <option>品牌名称</option>
                                @foreach($brand as $val)
                                    <option {{$info['brand']==$val['brandname']?'selected':''}}>{{$val['brandname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>活动主图<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                            <p id="preview0" ><img width="150" height="300" id="imghead0"  border=0 src="{{url('uploads')}}/{{$info['img']}}"></p><span></span>
                            <input type="file" id="image0" name="0" onchange="previewImage(this,'preview0','imghead0',300,300)" style="display:none;" >
                            <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改主图</label>
                        </div>
                    </li>
                    <li>
                        <label>活动图片<b>*</b></label>
                        @foreach($info['pic'] as $v)
                            <div class="usercity" style="border:3px dashed #e6e6e6;width:170px;height:155px;margin:5px 0px;position: relative">
                                <p id="preview{{$v['id']}}" ><img width="150" height="150" id="imghead{{$v['id']}}"  border=0 src="{{url('uploads')}}/{{$v['pic']}}"></p><span></span>
                                <input type="file" id="image{{$v['id']}}" name="{{$v['id']}}" onchange="previewImage(this,'preview{{$v["id"]}}','imghead{{$v["id"]}}',150,150)" style="display:none;" >
                                <label for="image{{$v['id']}}"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改图片</label>
                            </div>
                        @endforeach
                    </li>
                    <li><label>活动内容<b>*</b></label>
                        <textarea id="content7" name="content" style="width:700px;height:250px;visibility:hidden;">{{$info['content']}}</textarea>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上编辑"/></li>
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
