<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看评价</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/kindeditor/kindeditor-all-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <style type="text/css">
        label{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                afterBlur: function(){  //利用该方法处理当富文本编辑框失焦之后，立即同步数据
                    this.sync("#content") ;
                }
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
            $('#lookForm').submit(function(){
                $.post("{:U('LookOver')}",$('#lookForm').serialize(),function(response){
                    if(response.status){
                        layer.msg('回复成功',{
                                icon:1,
                                time:600
                            },
                            function (){
                                location="{:U('index')}";
                            }
                        )
                    }
                },'json');
                return false;
            });
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="{:U('Comment/index')}">评价管理</a></li>
        <li><a href="{:U('Comment/LookOver')}">去回复</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="{:U('lookver')}" method="post" id="lookForm" >
                <ul class="forminfo">
                    <li><label>会员名称:</label><input name="" type="text" class="dfinput" value="{{$info['member']['username']}}"  style="width:150px;"/></li>
                    <input name="gid" type="hidden" class="dfinput" value="{{$info['gid']}}"  style="width:150px;"/></li>
                    <li><label>商品名称:</label><input name="goodsname" type="text" class="dfinput" value="{{$info['goods']['goodsname']}}"  style="width:150px;"/></li>
                    <li><label>评价时间:</label><input name="edittime" type="text" class="dfinput" value="{{date('Y-m-d H:i:s',$info['edittime'])}}"  style="width:150px;"/></li>
                    <li><label>订&nbsp;单&nbsp;号:</label><input id="ordersyn" name="ordersyn" type="text" class="dfinput" value="{{$info['order']['ordersyn']}}"  style="width:258px;"/></li>
                    <li><label>评价内容:</label>
                        <textarea name="content" id="" cols="113" rows="7" style="border:2px solid #ccc;border-radius: 5px">{{str_limit($info['content'],50)}}</textarea>
                    </li>
                    <li><label>回复内容:</label>
                        <textarea id="content7" name="response" style="width:700px;height:250px;visibility:hidden;"></textarea>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="立即回复"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>
