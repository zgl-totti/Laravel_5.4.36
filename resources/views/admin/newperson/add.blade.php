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
        .btn{width: 120px;margin-top: 20px;}
    </style>
    <style type="text/css">
        .select1{
            position: relative;
        }
        .uew-select select.select{
            position: absolute;
            top:0;
            height: 34px;
            border:1px solid #ccc;
            width: 120px;
            opacity: 1;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 120
            });
            $('.select1').live('change',function(){
                var res=$(this);
                var val='bid='+res.val();
                //alert(res.length);
                if(res.length>0){
                    res.prev().attr('name','');
                    res.attr('name','bid');
                }
                var bid=res.val();
                var token="{{csrf_token()}}";
                res.nextAll().remove();
                $.post("{{url('admin/newperson_addGoods')}}",{bid:bid,_token:token},function(response){
                    if(response.code) {
                        if(response.info){
                            var str = "<select class='select' name='gid' id='goods'><option value='0'>请选择商品</option>";
                            for (var i in response.info) {
                                str += "<option value=" + response.info[i].id + ">" + response.info[i].goodsname + "</option>"
                            }
                            str += "</select>"
                            res.after(str);
                            res.next().css('left', res.prevAll().length * 120 + 'px');
                        }
                    }
                },'json');
            });

            $('#form1').submit(function(){
                if($('#goods').val()!=0 && $('#brand').val()!=0){
                    $.post("{{url('admin/newperson_add')}}", $('#form1').serialize(), function (res) {
                        if (res.code==1) {
                            layer.confirm(res.info,{
                                    btn: ['继续添加', '设置专享']
                                },
                                function () {
                                    location = "{{url('admin/newperson_add')}}"
                                },
                                function () {
                                    parent.window.location.href="{{url('admin/newperson_index')}}";
                                    var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                                    parent.layer.close(index);
                                });
                        }else{
                            layer.msg(res.info);
                        }
                    },'json');
                }else{
                    layer.tips('你还没有选择商品呢?',$('#goods'),{tips:[2,'red']});
                }
                return false;
            })
        });
    </script>
</head>
<body style="min-width:750px;">
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="#" method="post" id="form1">
                <input name="_token" value="{{csrf_token()}}" type="hidden"/>
                <ul class="forminfo">
                    <li><label style="width: 58px;margin: 0;padding: 0">商品名称<b>*</b></label>
                        <div class="vocation">
                            <select class="select1" name="bid" id="brand">
                                <option value="0">请选择品牌</option>
                                @foreach($brand as $val)
                                    <option value="{{$val['id']}}">{{$val['brandname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加专享商品"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>

