<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <style type="text/css">
        #d1,#d2{
            width: 165px;
            height: 30px;
            padding-left: 30px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 200
            });
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
            <form action="#" id="form1" method="post">
                <input name="id" value="{{$info['id']}}" type="hidden"/>
                <input name="_token" value="{{csrf_token()}}" type="hidden"/>
                <ul class="forminfo">
                    <li><label>所需积分<b>*</b></label><input value="{{$info['needJF']}}" name="needJF" type="text" class="dfinput" style="width:200px;"/></li>
                    @if($info['status']==0)
                        <li><label>U币数量<b>*</b></label><input value="{{$info['getUB']}}" name="getUB" type="text" class="dfinput" style="width:200px;"/></li>
                    @else
                        <li style="position: relative"><label>商品<b>*</b></label><input style="width: 200px;height: 30px;opacity: 1;border: 1px solid #ccc" type="text" value="{{$info['getGoods']['goodsname']}}" readonly/>&nbsp;&nbsp;价格：￥<span style="display: inline-block">{{$info['getGoods']['price']}}</span>
                            <img width="200" style="position: absolute;bottom: -100px" src="{{url('uploads')}}/{{$info['getGoods']['pic']}}" alt=""/>
                        </li>
                    @endif
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上编辑"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('.btn').click(function () {
            $.post("{{url('admin/integral_edit',['id'=>0])}}",$('#form1').serialize(),function (res) {
                if(res.code==1){
                    layer.msg(res.info,{icon:6},function () {
                        location="{{url('admin/integral_index')}}";
                    })
                }else {
                    layer.msg(res.info,{icon:5});
                }
            },'json')
        })
    })
</script>
</html>
