<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('webupload/webuploader.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript">
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
                width : 100
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
            var validate=$("#form1").validate({
                rules:{
                    goodsname:{
                        required:true
                    },
                    markeprice:{
                        required:true,
                        number:true
                    },
                    price:{
                        required:true,
                        number:true
                    },
                    num:{
                        required:true,
                        number:true
                    }
                },
                messages:{
                    goodsname:{
                        required:"商品名不能为空"
                    },
                    markeprice:{
                        required:"市场价格不能为空",
                        number:"市场价格必须是数字"
                    },
                    price:{
                        required:"商城价格不能为空",
                        number:"商城价格必须是数字"
                    },
                    num:{
                        required:"商品数量不能为空",
                        number:"商品数量必须为数字"
                    }
                },
                errorElement:"b"
            })
            $("#form1").submit(function(){
                if(validate.form()){
                    $("#form1").ajaxSubmit(function(res){
                        if(res.code==1){
                            layer.alert(res.info,{icon:6},function(){
                                location="{{url('admin/goods_add')}}";
                            });
                        }else{
                            layer.alert(res.info,{icon:5});
                        }
                    });
                }
                return false;
            });
            //商品分类三级联动菜单
            var getCate=function(pid,name){
                var token="{{csrf_token()}}";
                $.post("{{url('admin/goods_getCate')}}",{pid:pid,_token:token},function(res){
                    if(res.code==1){
                        var str='<option value="0" selected>请选择</option>';
                        for(var i in res.info){
                            str+='"<option value="' + res.info[i].id + '">' + res.info[i].categoryname + '</option>"';
                        }
                        $('select[name="'+name+'"]').html(str);
                        $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
                    };
                })
            }
            getCate(0,'firstCate');
            $('select[name="firstCate"]').change(function(){
                getCate($(this).val(),'secondCate');
                $(this).parents('.vocation').next('.vocation').show();
                $('select[name="thirdCate"]').html('<option value="0" selected>请选择</option>').parent().find(".uew-select-text").text('请选择');
            })

            $('select[name="secondCate"]').change(function(){
                getCate($(this).val(),'thirdCate');
                $(this).parents('.vocation').next('.vocation').show();
            })
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">商品管理</a></li>
        <li><a href="#">添加商品</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="{{url('admin/goods_add')}}" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <ul class="forminfo">
                    <li>
                        <label>商品名称<b>*</b></label>
                        <input name="goodsname" type="text" class="dfinput" placeholder="请填写商品名称"  style="width:345px;"/>
                    </li>

                    <li><label>商品分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select2" name="firstCate">
                            </select>
                        </div>
                        <div class="vocation" style="display: none" >
                            <select class="select2" name="secondCate"  >
                                <option value="0" >请选择</option>
                            </select>
                        </div>
                        <div class="vocation" style="display: none">
                            <select class="select2" name="thirdCate" >
                                <option value="0" >请选择</option>
                            </select>
                        </div>
                    </li>
                    <li><label>所属品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="bid" class="select2">
                                <option value="">请选择品牌</option>
                                <!--这里是最顶级分类的数组-->
                                @foreach($brand as $val)
                                    <option value="{{$val['id']}}">{{$val['brandname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li><label>选购热点<b>*</b></label>
                        <div class="vocation">
                            <select name="hot" class="select2">
                                <option value="">请选择热点</option>
                                <option value="绿色节能">绿色节能</option>
                                <option value="新品上市">新品上市</option>
                                <option value="外形精美">外形精美</option>
                                <option value="高端智能">高端智能</option>
                                <option value="经济实惠">经济实惠</option>
                                <option value="底噪产品">底噪产品</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>市场价格<b>*</b></label>
                        <input name="markeprice" type="text" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li>
                        <label>商城价格<b>*</b></label>
                        <input name="price" type="text" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li>
                        <label>商品数量<b>*</b></label>
                        <input name="num" type="text" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li><label>商品主图<b>*</b></label>
                        <input name="pic[]" type="file" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li><label>商品配图<b>*</b></label>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/>
                    </li>
                    <li><label>商品详情<b>*</b></label>
                        <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;"></textarea>
                    </li>
                    <li>
                        <label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>