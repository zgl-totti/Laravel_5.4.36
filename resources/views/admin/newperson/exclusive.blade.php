<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首单专享</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <!--分页样式-->
    <style type="text/css">
        .paginList a, .paginList span{display: inline-block;width:18px;height:18px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 18px;background: #cccccc;  color:#000000;  border: 1px solid #c2d2d7;border-radius: 5px  }
        .paginList a:hover{background: #666666;color:#fff;  }
        .paginList span{background: #666666;color: #fff;font-weight: bold;}
        #cutprice:focus{
            outline: none;
        }
        .scbtn{margin-top: 20px;}
        .label{font-size: 18px;}
        .reset{
            display: block;
            width: 60px;
            height: 35px;
            background: #c2c2c2;
            border:2px solid #999;
            text-align: center;
            margin-left: 15px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            padding-right: 6px;
            color: #4C4C4C;
        }
        .reset:hover{
            background: #999;
            color: #5c5c5c;
        }
        .cutprice:focus{
            outline: none;
        }
        .cutprice{
            width: 120px;
            height:35px;
            border:1px solid #9C9C9C;
            border-radius: 3px;
        }
        .tijiao{
            display: block;
            width: 50px;
            height:28px;
            font-size: 16px;
            border: 1px solid #9C9C9C;
            background: #9C9C9C;
            border-radius: 3px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
        label.goto{
            position: absolute;
            left:300px;
        }
        #begin,#end:focus{
            outline: none;
        }
        #begin,#end{border-radius: 3px;font-size: 14px;}
        #resets,#output{
            display: block;
            width: 75px;
            height: 32px;
            background:#0099CC;
            text-align: center;
            line-height: 32px;
            border-radius: 3px;
            font-size: 16px;
            color:#fff;
        }
    </style>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">新人专享</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/newperson_exclusive')}}" method="get" id="queryform">
                <ul class="seachform" style="height:60px;">
                    <li style="width: 70px;height: 34px;font-size: 16px;margin: 0;line-height: 34px;">品牌名:</li>
                    <li style="margin-left: -8px;"><input id="bname" name="bname" value="{{$bname}}" type="text" class="scinput" placeholder="请输入品牌名" /></li>
                    <li style="height: 34px;"><input style="display: block;width: 65px;height: 32px;margin-top: 0;font-size: 16px;" name="query" type="submit" class="scbtn" value="查&nbsp;询"/></li>
                    <li style="height: 34px;"><a href="javascript:;" id="resets">批量重置</a></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th style="width: 50px;text-align: center">编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>商品图片</th>
                    <th style="width: 450px;">商品名称</th>
                    <th>品牌名称</th>
                    <th>商城价格</th>
                    <th>商品专享价</th>
                    <th>已砍</th>
                    <th>商品库存</th>
                    <th>销售数量</th>
                    <th width="120px;">操作</th>
                </tr>
                </thead>
                <form action="" method="post" id="searchform">
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr style="height:80px;">
                            <td>{{$k+1+$firstRow}}</td>
                            <td><img src="{{url('uploads')}}/{{mb_substr($val['getGoods']['pic'],0,11)}}thumb100_{{mb_substr($val['getGoods']['pic'],11)}}" style="width: 80px;height: 80px;"/></td>
                            <td style="width: 450px;">{{str_limit($val['getGoods']['goodsname'],50)}}</td>
                            <td>{{$val['bname']}}</td>
                            <td>{{$val['price']}}</td>
                            <td>{{$val['cutprice']}}</td>
                            <td>{{$val['cut']}}</td>
                            <td>{{$val['getGoods']['num']}}</td>
                            <td>{{$val['getGoods']['salenum']}}</td>
                            <td><a href="javascript:;" id="{{$val['id']}}" class="reset">重置</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </form>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                <ul class="paginList">
                    {{$list->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(function() {
        $('.reset').click(function () {
            re = $(this);
            var id=re.attr('id');
            var token="{{csrf_token()}}";
            $.post("{{url('admin/newperson_reset')}}", {id:id,_token:token}, function (res) {
                if (res.code==1) {
                    layer.msg(res.info, {time: 800, icon: 1}, function () {
                        re.parents('tr').hide();
                    });
                } else {
                    layer.msg(res.info, {time: 800, icon: 2});
                }
            },'json')
        });
        //批量重置
        $('#resets').click(function () {
            var bname = $('input[name="bname"]').val();
            var token="{{csrf_token()}}";
            $.post("{{url('admin/newperson_resetAll')}}", {bname: bname,_token:token}, function (res) {
                if (res.code==1) {
                    layer.msg(res.info, {time: 600})
                } else {
                    layer.msg(res.info, {time: 600})
                }
            },'json');
            return false;
        })
    })
</script>

