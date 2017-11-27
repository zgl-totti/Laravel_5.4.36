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
                    <li><label>奖项名称<b>*</b></label><input value="{{$info['prize']}}" name="prize" type="text" class="dfinput" style="width:200px;"/></li>
                    <li><label>奖品类型<b>*</b></label>
                        <select style="padding-left:10px;width: 100px;height: 30px;opacity: 1;border: 1px solid #ccc" name="lx">
                            @if($info['lx']==1)
                                <option value="1" selected>积分</option>
                                <option value="2" >U币</option>
                            @else
                                <option value="1">积分</option>
                                <option value="2" selected>U币</option>
                            @endif
                        </select>
                    </li>
                    <li><label>数量<b>*</b></label><input style="padding-left:10px;width: 100px;height: 25px;border: 1px solid #ccc " type="text" name="num" value="{{$info['num']}}"/></li>
                    <li><label>中奖率{{$condition}}%<b>*</b></label><input style="padding-left:10px;width: 100px;height: 25px;border: 1px solid #ccc " type="text" name="v" value="{{$info['v']}}"/></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上编辑"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('.btn').click(function(){
            $.post("{{url('admin/integral_trophy_edit',['id'=>0])}}",$('#form1').serialize(),function(res){
                if(res.code==1){
                    layer.msg(rs.info,{icon:6},function () {
                        location="{{url('admin/integral_trophy')}}";
                    })
                }else {
                    layer.msg(res.info);
                }
            },'json');
        })
    })
</script>
</html>
