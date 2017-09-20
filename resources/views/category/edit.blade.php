<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 100
            });
            $(".btn").click(function(){
                $.post("{{url('admin/category_edit',['status'=>500])}}",$("#form1").serialize(),function(res){
                    if(res.code==1){
                        layer.msg(res.info,{icon:6,time:1200},function(){
                            location="{{url('admin/category_index')}}";
                        })
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                },'json');
            })
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
            <ul class="forminfo">
                <form action="#" method="post" id="form1">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <li><label>分类名称<b>*</b></label><input name="categoryname" type="text" class="dfinput" value="{{$info['categoryname']}}"  style="width:200px;"/></li>
                    <li><label>上级分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select1" name="pid">
                                <option value="0">一级分类</option>
                                <!--这里是最顶级分类的数组-->
                                @foreach($category as $val)
                                    <option class="One{{$val['id']}}" value="{{$val['id']}}">{{$val['categoryname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li><input type="hidden" name="c_id" value="{{$info['id']}}"/></li>
                    <li><label>&nbsp;</label><input type="submit" class="btn" value="确认修改"/></li>
                </form>
            </ul>
        </div>
    </div>
</div>
</body>
<script>
    $('select[class*="select"]').live('change',function(){
        var id=$(this).val();
        var rr=$(this);
        var token="{{csrf_token()}}";
        rr.attr('name','pid');
        if(rr.prev().length!=0){
            rr.prev().removeAttr('name');
        }
        $.post("{{url('admin/category_cate')}}",{id:id,_token:token},function(res){
            if(res.code==1){
                rr.nextAll().remove();
                var num=rr.prevAll().length+1;
                rr.after('<select class=select'+num+'></select>');
                var str="<option selected>请选择分类</option>";
                for(var i in res.info){
                    str+='<option value="'+res.info[i]['id']+'">'+res.info[i]['categoryname']+'</option>';
                }
                rr.next().html(str);
                var left=$('.select1').nextAll().length*100;
                rr.next().css({opacity:1,position:'relation',top:'0',width:'100px',height:'34px',left:left+'px',border:"1px #ccc solid"})
            }
        },'json')
    })
</script>
</html>
