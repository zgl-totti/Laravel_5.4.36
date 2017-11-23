<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.form.js')}}"></script>
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
            $("#form1").submit(function(){
                $("#form1").ajaxSubmit(function(res){
                    if(res.status){
                        layer.alert(res.info,function(){location="{:U('index')}"});
                    }else{
                        layer.alert(res.info);
                    }
                });
                return false;
            });
            //商品分类三级联动菜单
            var getCate=function(pid,name,id){
                $.post('{:U("getCateByPid")}',{pid:pid},function(res){
                    if(res.status){
                        var str='';

                        for(var i in res.info){
                            var selected=res.info[i].id==id?'selected ':' ';
                            str+='<option '+ selected +' value="' + res.info[i].id + '">' + res.info[i].categoryname + '</option>';
                        }
                        $('select[name="'+name+'"]').html(str);
                        $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
                    };
                })
            }
            getCate(0,'firstCate',{$cate[0]['id']});
            getCate({$cate[0]['id']},'secondCate',{$cate[1]['id']});
            getCate({$cate[1]['id']},'thirdCate',{$cate[2]['id']});
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
            <form action="{{url('admin/goods_edit',['gid'=>0])}}" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <ul class="forminfo">
                    <li><label>商品名称<b>*</b></label><input name="goodsname" type="text" class="dfinput" value="{{$info['goodsname']}}"  style="width:345px;"/></li>
                    <li><label>商品分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select2" name="firstCate">
                            </select>
                        </div>
                        <div class="vocation">
                            <select class="select2" name="secondCate"  >
                            </select>
                        </div>
                        <div class="vocation" >
                            <select class="select2" name="thirdCate" >
                            </select>
                        </div>
                    </li>
                    <!--<li><label>上级分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select1" name="cid">
                                <option value="">一级分类</option>
                                &lt;!&ndash;这里是最顶级分类的数组&ndash;&gt;
                                <volist name="categoryList1" id="val">
                                    <option value="{$val.id}">{$val.categoryname}</option>
                                </volist>
                            </select>
                        </div>
                    </li>-->
                    <li><label>所属品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="bid" style="border: 1px solid #c0c0c0;height: 30px;opacity: 1;width: 100px">
                                <option value="">请选择品牌</option>
                                <!--这里是最顶级分类的数组-->
                                <volist name="brandList" id="val">
                                    <option class="One{$val.id}" value="{$val.id}">{$val.brandname}</option>
                                </volist>
                            </select>
                        </div>
                        <input type="hidden" class="One" name="{{$info['bid']}}"/>
                        <input type="hidden" class="Two" name="{{$info['hot']}}"/>
                    </li>
                    <li><label>选购热点<b>*</b></label>
                        <div class="vocation">
                            <select name="hot" class="" style="border: 1px solid #c0c0c0;height: 30px;opacity: 1;width: 100px">
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
                        <input name="markeprice" type="text" value="{{$info['markeprice']}}" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li>
                        <label>商城价格<b>*</b></label>
                        <input name="price" type="text" value="{{$info['price']}}" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li>
                        <label>商品数量<b>*</b></label>
                        <input name="num" type="text" value="{{$info['num']}}" class="dfinput"  style="width:345px;"/>
                    </li>
                    <li><label>商品主图<b>*</b></label>
                        <input name="pic[]" type="file" class="dfinput"  style="width:345px;"/><span style=" display: inline-block;font-size: 14px;color: red;font-weight: bolder;">（若不需要更新图片，请忽略该项）</span>
                    </li>
                    <li><label>商品配图<b>*</b></label>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/>
                        <input name="pic[]" type="file" class="dfinput"  style="width:115px;margin-top: 10px"/><span style="display: inline-block;font-size: 14px;color: red;font-weight: bolder;">（若不需要更新图片，请忽略该项）</span>
                    </li>
                    <li><label>商品详情<b>*</b></label>
                        <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;">{{$info['detail']}}</textarea>
                    </li>
                    <input type="hidden" name="id" value="{{$info['id']}}"/>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        var i=$(".One").attr("name");
        var hot=$(".Two").attr("name");
        $(".One"+i).attr("selected",'selected');
        $("option[value='"+hot+"']").attr("selected",'selected');
    })
</script>
<!--<script>
    $('select[class*="select"]').live('change',function(){
        var id=$(this).val();
        var rr=$(this);
        rr.attr('name','cid');
        if(rr.prev().length!=0){
            rr.prev().removeAttr('name');
        }
        $.get("/Admin/Category/add?id="+id,function(res){
            if(res!=false){
                rr.nextAll().remove();
                var num=rr.prevAll().length+1;
                rr.after('<select class=select'+num+'></select>');
//                }
                var str="<option selected>请选择分类</option>";
                for(var i in res){
                    str+='<option value="'+res[i]['id']+'">'+res[i]['categoryname']+'</option>';
                }
                rr.next().html(str);
                var left=$('.select1').nextAll().length*100;
                rr.next().css({opacity:1,position:'relation',top:'0',width:'100px',height:'34px',left:left+'px',border:"1px #ccc solid"})
            }
        },'json')
    })
</script>-->
</html>