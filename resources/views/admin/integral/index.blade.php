<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <style type="text/css">
        #d1{
            width: 165px;
            height: 30px;
            padding-left: 30px;
        }
        .message{
            float: left;
        }
        .page{
            float: right;
        }
        .page span,.page a{
            display: inline-block;
            width: 30px;
            height: 30px;
            color: #c00;
            text-decoration: none;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
        }
        .page span.current{
            background: blue;
            color: #fff;
        }
        .tablelink1,.tablelink2,.tablelink3{
            color: #056dae;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">活动列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="{{asset('asset_admin/images/px.gif')}}" /></i></th>
                    <th>所需积分</th>
                    <th>兑换U币/商品</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list" id="val"  empty="$empty">
                    <tr>
                        <td>{$i+$firstRow}</td>
                        <td class="aname">{$val.needjf}</td>
                        <if condition="$val['status'] eq 0">
                            <td class="aname">{$val.getub}</td>
                            <else/>
                            <td style="position: relative;height: 100px;" class="aname">{$val['info']['goodsname']}<img style="position: absolute;bottom: 0" width="100" src="/Uploads/{$val['info']['pic']}" alt=""/></td>
                        </if>
                        <td><a href="{:U('edit',array('id'=>$val['id']))}" class="tablelink1">编辑</a>
                            <a jid="{$val['id']}" href="javascript:;" class="tablelink3">{$val['zd']?'取消置顶':'置顶'}</a>
                            <a jid="{$val['id']}" href="javascript:;" class="tablelink2">删除</a>
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue">{$count}</i>条记录
                    <if condition="$count gt 2">
                        ，当前显示第&nbsp;<i class="blue">{:I('get.p',1)}&nbsp;</i>页
                    </if>
                </div>
                <div class="page">{$page}</div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $(function(){
            $('.tablelink2').click(function(){
                var id=$(this).attr('jid');
                var a=$(this);
                layer.confirm('确定删除?',{btn:['确定','取消'],title:'提示'},function(){
                    $.post("{:U('del')}",{id:id},function(res){
                        layer.msg(res.info);
                        a.parents('tr').hide();
                    })
                })
            });
            $('.tablelink3').click(function(){
                var id=$(this).attr('jid');
                var a=$(this);
                $.post("{:U('zd')}",{id:id},function(res){
                    layer.alert(res.info,function(){
                        location.reload();
                    });
                })
            })
        })
    </script>
</div>
</body>
</html>
