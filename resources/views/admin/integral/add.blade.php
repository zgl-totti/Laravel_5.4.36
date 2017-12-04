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
            $('#form1').submit(function(){
                $.post("{{url('admin/integral_add')}}",$('#form1').serialize(),function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6},function () {
                            location="{{url('admin/integral_index')}}";
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
        <li><a href="#">首页</a></li>
        <li><a href="#">添加活动</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="#" id="form1" method="post">
                <input name="_token" value="{{csrf_token()}}" type="hidden"/>
                <ul class="forminfo">
                    <li><label>所需积分<b>*</b></label><input name="needJF" type="text" class="dfinput" style="width:200px;"/></li>
                    <li><label>礼品类型<b>*</b></label>
                        <select style="width: 100px;height: 30px;opacity: 1;border: 1px solid #ccc" name="status" id="xuan">
                            <option value="0">虚拟礼品</option>
                            <option value="1">实物礼品</option>
                        </select>
                    </li>
                    <li style="position: relative;display: none" class="shiwu"><label>实物礼品<b>*</b></label>
                        <select style="width: 200px;height: 30px;opacity: 1;border: 1px solid #ccc" name="gid" id="goods">
                            <option value="">请选择商品</option>
                            @foreach($goods as $val)
                                <option value="{{$val['id']}}">{{$val['goodsname']}}</option>
                            @endforeach
                        </select>
                        <span class="info" style="display: none">商品售价：￥<span class="price" style="display:inline-block"></span>&nbsp;预览图：<img class="gimg" width="200" style="position: absolute;bottom: -100px" src="" alt=""/></span>
                    </li>
                    <li class="xuni"><label>U币数量<b>*</b></label><input name="getUB" type="text" class="dfinput" style="width:200px;"/></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上添加"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('#xuan').change(function(){
            if($(this).val()==1){
                $('.shiwu').show();
                $('.xuni').hide();
            }else{
                $('.shiwu').hide();
                $('.xuni').show();
            }
        });
        $('#goods').change(function(){
            var id=$(this).val();
            var token="{{csrf_token()}}";
            if(id){
                $.post("{{url('admin/integral_getGoodsInfo')}}",{id:id,_token:token},function(res){
                    if(res.code==1){
                        $('.info').css('display','inline-block');
                        $('.price').text(res.info['price']);
                        $('.gimg').attr('src',"{{url('uploads')}}/"+res.info.pic);
                    }
                },'json')
            }else{
                $('.info').hide();
            }
        })
    })
</script>
</html>
