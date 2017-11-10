<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <meta name="keywords"  />
    <meta name="description"  />
    <title>联系我们</title>
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('asset_index/css/iconfont/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <!--引用百度地图API-->
    <style type="text/css">
        html,body{margin:0;padding:0;}
        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
        .content{
            width: 700px;
            margin: 0 auto;
        }
        .nr{
            height: 150px;
            font-weight: 300 ;
            line-height:20px;
            margin-top: 20px;
        }
        .nr ul li{
            color: #B5621B;
        }
        form{
            width: 700px;
            color: #B5621B;
            font-weight: 300 ;
        }
        #ibangkf{
            width: 100px;
            color: #000000;
            background-color: #B5621B;
        }
    </style>
</head>
<body >
<header>
    <article>
        @include('index.public.header')
    </article>
</header>
@include('index.public.nav')
<b class="line" ></b>
<div class="content" >
    <div style="text-align: center;color: orangered;font-size: 20px;margin-top: 10px">联系我们</div>
    <div class="nr" >
        <ul>
            <li>商城地址：河南省郑州高新技术开发区冬青街与长椿路交叉口电子商务产业园3号楼1层云和数据</li>
            <li>联系电话：0371-000000</li>
            <li>邮箱：111@qq.com</li>
            <li>客服qq：123456</li>
            <li>网址：www.yhyg.com</li>
        </ul>
    </div>
    <!--公交搜索框开始-->
    <div style="text-align: center;color: orangered;font-size: 20px;">公交搜索</div>
    <form action="http://zhengzhou.8684.cn/so.php"  target="_blank" class="form">
        <p id= "bus_act">公交换乘输入格式为：起点+空格+终点(例如:高新区郑州大学 高新区电子商务产业园云和数据)</p>
        <input type="hidden" value=河南 name="p" />
        <input name="cid" value=zhengzhou type="hidden"/>
        <input name="q"><input type="hidden" name="q1" >
        <input value="公交查询" type="submit"><div>
        <input type="radio" name="k" value="p2p" onclick="fbuschange(0)" checked = checked >
        公交换乘查询<input type="radio" name="k" value="pp" onclick="fbuschange(1)">公交路线查询
        <input type="radio" name="k" value="p" onclick="fbuschange(2)">公交站点查询</div></form>
    <!--公交搜索框结束-->
    <!--百度地图容器-->
    <div style="text-align: center;color: orangered;font-size: 20px;">地图展示</div>
    <div style="width:697px;height:300px;border:2px solid#B5621B;margin-top: 20px" id="dituContent"></div>
</div>
@include('index.public.tip')
@include('index.public.footer')
<a id="ibangkf" href="http://www.ibangkf.com">在线客服系统</a>
<script language="javascript" src="http://c.ibangkf.com/i/c-cpp123.js"></script>
</body>
<script>
    var fbuschange = function(n) {
        var a = ["起点+空格+终点(例如:高新区郑州大学 高新区电子商务产业园云和数据)","路线名称(例如:1路)","站点名称(例如:高新区电子商务产业园云和数据)"];
        document.getElementById("bus_act").innerHTML="公交站点输入格式为："+a[n];
    }
</script>
<script type="text/javascript">

    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.549498,34.807649);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }

    //标注点数组
    var markerArr = [{title:"商城位置",content:"超优汇商城",point:"113.549471|34.807634",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
    ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor:"#808080",
                color:"#333",
                cursor:"pointer"
            });

            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("/Public/Home/images/dtu0.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    initMap();//创建和初始化地图
    type="text/javascript"
</script>
</html>









