<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <style>
        .forminfo li label.error{background: #885621;position: relative;left: 10px;float: none;display: inline-block;background: none}
        .forminfo li label { width: 86px; line-height: 34px}
        .error{font-weight:bold;color:red;width: 100px;}
        .ok{color:green}
    </style>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.validate.js')}}"></script>
    <script src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
    <script src="{{asset('asset_admin/js/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/timer/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/webuploader/0.1.5/webuploader.js')}}"></script>

    <script type="text/javascript">
        /* var uploadUrl = '{:U("uploadAdminPic")}';
         var listUrl = '{:U("adminList")}';*/
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
        });
    </script>
    {{--<script>
        $(function(){
            var validate=$('#form1').validate({
                rules:{
                    username:{
                        required:true,
                        minlength:3,
                        maxlength:10,
                        remote:{
                            url:'{:U("checkUsername")}',
                            type:'post'
                        }
                    },
                    password:{
                        required:true,
                        minlength:6,
                        maxlength:10
                    },
                    pwd:{
                        required:true,
                        equalTo:'#password'
                    },
                    role:{
                        required:true
                    }

                },
                messages:{
                    username:{
                        required:'必填',
                        minlength:'至少3个字符',
                        maxlength:'最多10个字符',
                        remote:'用户名已被占用'
                    },
                    password:{
                        required:'必填',
                        minlength:'至少6个字符',
                        maxlength:'最多10个字符'
                    },
                    pwd:{
                        required:'必填',
                        equalTo:'两次密码不匹配'
                    },
                    addtime:{
                        required:'必填'
                    },
                    role:{
                        required:'必填'
                    }

                },
                success:function(label){
                    label.addClass('ok').text('验证通过');
                },
                validClass: "ok",
                errorPlacement: function(error, element) {
                    error.appendTo( element.parent());
                }
            });
            $('#form1').submit(function(){
                if(validate.form()){
                    $('#form1').ajaxSubmit(function(res){
                        if(res.status==1){
                            layer.confirm(res.info, {
                                btn: ['继续添加','查看列表'] //按钮
                            }, function(){
                                location='{:U("add")}';
                            }, function(){
                                location='{:U("AdminList")}';
                            });
                        }else{
                            layer.alert(res.info);
                        }
                    });
                }
                return false;
            });
        })
    </script>--}}
    <script type="text/javascript">
        $(function(){
            $('.btn').click(function() {
                $('#form1').ajaxSubmit(function (res) {
                    /*if (res.status == 1) {
                        layer.confirm(res.info, {
                            btn: ['继续添加', '查看列表'] //按钮
                        }, function () {
                            location = "{{url('admin/admin_add')}}";
                        }, function () {
                            location = "{{url('admin/admin_index')}}";
                        });
                    } else {
                        layer.alert(res.info);
                    }*/
                });
            })
        })
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
            <form action="{{url('admin/admin_add')}}" method="post" id="form1">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <ul class="forminfo">
                    <li>
                        <label>所属组<b>*</b></label>
                        @foreach($group as $v)
                            <span style="float:left;margin-right: 10px;">
                                <label for="{{$v['title']}}" style="width: 70px">{{$v['title']}}</label>
                                <input name="group_id[]" id="{{$v['title']}}" type="checkbox" value="{{$v['id']}}" class="dfinput"  style="width:18px;"/>
                            </span>
                        @endforeach
                    </li>
                    <li><label>用户名<b>*</b></label>
                        <input name="username"  type="text" class="dfinput" placeholder="请填写用户名" maxlength="10" style="width:345px;"/></li>
                    <li><label>密 &nbsp;&nbsp; 码<b>*</b></label>
                        <input name="password"  id="password" type="password" class="dfinput" placeholder="请输入6-10位密码" maxlength="6" style="width:345px;"/></li>
                    <li><label>确认密码<b>*</b></label>
                        <input name="pwd" type="password" class="dfinput" placeholder="请再次输入6-10位密码" maxlength="6" style="width:345px;"/></li>
                    <li><label >头像图片<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:150px;height:150px;position: relative">
                            <p id="preview0" ><img id="imghead0"  border=0 src=''></p><span></span>
                            <input type="file" id="image0" name="pic" onchange="previewImage(this,'preview0','imghead0',300,300)" style="display:none;" >
                            <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改主图</label>
                        </div>
                    </li>
                    <li><label>密保邮箱</label><input name="mail"  type="text" class="dfinput" placeholder="@qq.com"/></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认添加"/></li>
                </ul>
            </form>

        </div>
    </div>
</div>
</body>
<script>
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
                //img.style.marginLeft = rect.left+'px';
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
