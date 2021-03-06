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
        .bargain{
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
        .bargain:hover{
            background: #999;
            color: #5c5c5c;
        }
        .cutprice,#brand:focus{
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
        #begin,#end,#brand{border-radius: 3px;font-size: 14px;}
        #setup,#addgoods{
            display: block;
            width: 80px;
            height: 32px;
            background:#0099CC;
            text-align: center;
            line-height: 32px;
            border-radius: 3px;
            font-size: 16px;
            color:#fff;
        }
        #brand{border-radius: 3px;}
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

            $('#Warncomment').click(function(){
                $.post("{:U('index')}",function(res){
                    if(res){
                        layer.msg(res,{
                            time:1000
                        });
                    }
                })
            })
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
            <form action="{{url('admin/newperson_index')}}" method="get" id="queryform">
                <ul class="seachform" style="height:60px;">
                    <li style="margin-right: 5px;"><label style="font-size: 16px;">请输入区间:</label>
                        <input id="begin" name="startprice" type="text" value="{{$startprice}}" class="scinput" placeholder="起始价格" />
                    </li>
                    <li style="width: 34px;height: 34px;font-size: 16px;margin: 0;line-height: 34px;">至</li>
                    <li style="margin-left: -8px;"><input id="end" name="endprice" value="{{$endprice}}" type="text" class="scinput" placeholder="结束价格" /></li>
                    <li style="width: 50px;height: 34px;font-size: 16px;margin-right:5px;line-height: 34px;">品牌:</li>
                    <li style="margin-left: -8px;"><input id="brand" name="brand" value="{{$brand}}" type="text" class="scinput" placeholder="品牌名" /></li>
                    <li style="height: 34px;"><input style="display: block;width: 65px;height: 32px;margin-top: 0;font-size: 16px;" name="query" type="submit" class="scbtn" value="查&nbsp;询"/></li>
                    <li style="height: 34px;"><a href="javascript:;" id="setup">批量砍价</a></li>
                    <li style="height: 34px;float: right;margin-right: 30px;"><a href="javascript:;" id="addgoods">添加商品</a></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th style="width: 50px;text-align: center">编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>商品图片</th>
                    <th style="width: 450px;">商品名称</th>
                    <th>品牌</th>
                    <th>商城价格</th>
                    <th>商品库存</th>
                    <th>销售数量</th>
                    <th width="120px;">设置优惠</th>
                </tr>
                </thead>
                <form action="" method="post" id="setupform">
                    <tbody>
                    @foreach($list as $k=>$val)
                        <tr style="height:80px;">
                            <td>{{$k+1+$firstRow}}</td>
                            <td><img src="{{url('uploads')}}/{{mb_substr($val['getGoods']['pic'],0,11)}}thumb100_{{mb_substr($val['getGoods']['pic'],11)}}" style="width: 80px;height: 80px;"/></td>
                            <td style="width: 450px;">{{str_limit($val['getGoods']['goodsname'],50)}}</td>
                            <td>{{$val['bname']}}</td>
                            <td>{{$val['price']}}</td>
                            <td>{{$val['getGoods']['num']}}</td>
                            <td>{{$val['getGoods']['salenum']}}</td>
                            <td><a href="javascript:;" id="{{$val['id']}}" class="bargain">砍 价</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </form>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录，当前显示第&nbsp;<i class="blue">{{$list->currentPage()}}&nbsp;</i>页</div>
                <ul class="paginList">
                    {{$list->appends(['startprice'=>$startprice,'endprice'=>$endprice,'brand'=>$brand])->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#usual1 ul").idTabs();
    flag=true;
    $('.layui-layer-ico').live('click',function(){
        flag=true;
    });

    $(function(){
        $('.bargain').click(function(){
            del=$(this);
            if(flag) {
                flag = false;
                layer.open({
                    type: 1,
                    shade: false,
                    title: '请设置优惠',
                    content: "<div style='width:200px;height:140px;'>" +
                    "<form action='#' method='post' id='layerform'>" +
                    "<dl>" +
                    "<dd style='width:180px;height:40px;margin:20px 0 20px 20px;'><label style='font-size: 16px;'>降价:</label><input type='text' name='cutprice' value='' class='cutprice'/></dd>" +
                    "<dd style='display: block;width:80px;height:40px;margin-left: 80px;'><button class='tijiao' type='submit'>提交</button></dd>" +
                    "</dl>" +
                    "</form>" +
                    "</div>"
                });


                $('#layerform').submit(function () {
                    var cutprice = $('input[name="cutprice"]').val();
                    var id=del.attr('id');
                    var token="{{csrf_token()}}";
                    $.post("{{url('admin/newperson_bargain')}}", {id:id,cutprice:cutprice,_token:token}, function (res) {
                        if (res.code==1) {
                            layer.msg(res.info, {
                                    time: 500
                                },
                                function(){
                                    del.parents('tr').hide();
                                    $('div[id^="layui-layer"]').remove();
                                    flag=true
                                }
                            );
                        }else{
                            layer.msg(res.info, {
                                time: 600
                            })
                        }
                    },'json');
                    return false;
                });
            }
        });

        $('#setup').click(function(){
            up=$(this);
            if($('#begin').val()&&$('#end').val()||$('#brand').val()){
                if (flag) {
                    flag = false;
                    layer.open({
                        type: 1,
                        shade: false,
                        title: '请设置优惠',
                        content: "<div style='width:200px;height:140px;'>" +
                        "<form action='#' method='post' id='layerform1'>" +
                        "<dl>" +
                        "<dd style='width:180px;height:40px;margin:20px 0 20px 20px;'><label style='font-size: 16px;'>降价:</label><input type='text' name='jianprice' value='' class='cutprice'/></dd>" +
                        "<dd style='display: block;width:80px;height:40px;margin-left: 80px;'><button id='setreduce' class='tijiao' type='submit'>设置</button></dd>" +
                        "</dl>" +
                        "</form>" +
                        "</div>"
                    });

                    $('#layerform1').submit(function () {
                        var startprice = $('input[name="startprice"]').val();
                        var endprice = $('input[name="endprice"]').val();
                        var cutprice = $('input[name="jianprice"]').val();
                        var brand = $('input[name="brand"]').val();
                        var token="{{csrf_token()}}";
                        $.post("{{url('admin/newperson_batch')}}",{startprice:startprice,endprice:endprice,cutprice:cutprice,brand:brand,_token:token},function (res) {
                            if (res.code==1) {
                                layer.msg(res.info,{time:500,icon:6}, function () {
                                    $('#layui-layer1').hide();
                                    flag=true;
                                })
                            }else{
                                layer.msg(res.info);
                            }
                        },'json');
                        return false;
                    })
                }
            }else{
                layer.tips('请先填写价格区间或品牌名哦？',$(this),{tips:[2,'red']});
            }
        });

        $('#addgoods').click(function(){
            layer.open({
                type: 2,
                shade: false,
                title: '请选择商品',
                area:['750px','450px'],
                content: "{{url('admin/newperson_add')}}"
            });
        })
    })
</script>
</body>
</html>

