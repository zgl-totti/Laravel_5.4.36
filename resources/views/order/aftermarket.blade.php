<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset_admin/css/select.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/jquery.idTabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_admin/js/select-ui.min.js')}}"></script>
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
    <style>
        .message{float:left;}
        #page{float: right;}
        #page a,#page span{display: inline-block;width: 30px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ccc;}
        .current{background: #3EAFE0;color: #fff;  }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">订单管理</a></li>
        <li><a href="#">售后管理</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="{{url('admin/order_aftermarket')}}" method="get">
                <ul class="seachform">
                    <li><label>收货人查询</label><input name="username" type="text" class="scinput" value="{{$username}}" /></li>
                    <li><label>售后单号查询</label><input name="aftersyn" type="text" class="scinput" value="{{$aftersyn}}" /></li>
                    <li><label>手机号查询</label><input name="phone" type="text" class="scinput" value="{{$phone}}" /></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
                <table class="tablelist">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>售后单号</th>
                        <th>订单号</th>
                        <th>收货人</th>
                        <th>手机号</th>
                        <th>商品</th>
                        <th>总价</th>
                        <th>退款金额</th>
                        <th>退款类型</th>
                        <th>退款原因</th>
                        <th>退款说明</th>
                        <th>售后图片</th>
                        <th>售后状态</th>
                        <th>订单状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $k=>$v)
                        <tr>
                            <td>{{$firstRow+$k+1}}</td>
                            <td>{{$v['aftersyn']}}</td>
                            <td>{{$v['oid']}}</td>
                            <td>{{$v['getSite']['username']}}</td>
                            <td>{{$v['getSite']['phone']}}</td>
                            <td>{{mb_substr($v['getGoods']['goodsname'],0,10,'utf-8')}}</td>
                            <td>{{$v['orderprice']}}</td>
                            <td>{{$v['orderprice']}}</td>
                            <td>{{$v['money']}}</td>
                            <td>{{$v['reason']}}</td>
                            <td>{{$v['mess']}}</td>
                            <td>
                                @foreach($v['getPic'] as $val)
                                    <img src="{{url('uploads/after')}}/{{$val['pic']}}" style="display: block" alt=""/>
                                @endforeach
                            </td>
                            <td>{{$v['getAfterStatus']['statusname']}}</td>
                            <td>{{$v['getOrder']['statusname']}}</td>
                            <td>
                                @if($v['afterstatus']==1)
                                    <a style="color: #0077cc;cursor:pointer" class="agree" name="{{$v['id']}}">同意</a> | <a style="color: #0077cc;cursor:pointer" class="disagree" name="{{$v['id']}}">不同意</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
            <div class="pagin">
                <div class="message">共<i class="blue">{{$list->total()}}</i>条记录</div>
                <div id="page">
                    {{$list->appends(['aftersyn'=>$aftersyn,'username'=>$username,'phone'=>$phone])->links()}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');

        $(function(){
            $('.agree').click(function(){
                var id=$(this).attr('name');
                var token="{{csrf_token()}}";
                var status=1;
                $.post("{{url('admin/order_agree')}}",{id:id,_token:token,status:status},function(res){
                    if(res.code==1){
                        layer.msg(res.info,{time:1600,icon:6},function(){
                            location="{{url('admin/order_aftermarket')}}";
                        })
                    }else{
                        layer.msg(res.info,{time:1600,icon:2})
                    }
                },'json')
            })
            $('.disagree').click(function(){
                var id=$(this).attr('name');
                var token="{{csrf_token()}}";
                var status=2;
                $.post("{{url('admin/order_agree')}}",{id:id,_token:token,status:status},function(res){
                    if(res.status){
                        layer.msg(res.info,{time:1600,icon:6},function(){
                            location="{{url('admin/order_aftermarket')}}";
                        })
                    }else{
                        layer.msg(res.info,{time:1600,icon:2})
                    }
                },'json')
            })
        })
    </script>
</div>
</body>
</html>
