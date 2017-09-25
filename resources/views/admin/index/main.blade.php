<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台首页</title>
    <link href="{{asset('asset_admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
</head>
<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
        </ul>
    </div>
    <div class="mainindex">
        <div class="welinfo">
            <span><img src="{{asset('asset_admin/images/sun.png')}}" alt="天气" /></span>
            <b>{{$info->username}}早上好，欢迎使用后台管理系统</b>
        </div>
        <div class="welinfo">
            <span><img src="{{asset('asset_admin/images/time.png')}}" alt="时间" /></span>
            <i>您上次登录的时间：{{date("Y-m-d H:i:s",$info['lasttime'])}}</i> <i>您上次登录IP：{{$info->ip}}</i> 如非本人操作，请及时更改密码
        </div>
        <div id="main" style="width: 900px;height:400px;"></div>
        <div id="main1" style="width: 900px;height:400px;"></div>
        <div id="main2" style="width: 900px;height:400px;"></div>
        <div class="xline"></div>
        <div class="box"></div>
        <div class="welinfo">
            <span><img src="{{asset('asset_admin/images/dp.png')}}" alt="提醒" /></span>
            <b>服务器信息</b>
        </div>
        <ul class="infolist">
            <li><span>服务器软件：{{$_SERVER['SERVER_SOFTWARE']}}</span></li>
            <li><span>开发语言PHP：{{phpversion()}}</span></li>
            <li><span>数据库mysql: {$version[0]['version']}</span></li>
        </ul>
        <div class="xline"></div>
        <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egoods.com" target="_blank">www.egoods.com</a>)</div
    </div>
</body>
    <script type="text/javascript" src="{{asset('asset_admin/js/echarts.min.js')}}"></script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
        // 指定图表的配置项和数据
        var option = {
            title : {
                text: '商品销量',
                subtext: '销量占有率',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient : 'vertical',
                x : 'left',
                data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType : {
                        show: true,
                        type: ['pie', 'funnel'],
                        option: {
                            funnel: {
                                x: '25%',
                                width: '50%',
                                funnelAlign: 'left',
                                max: 1548
                            }
                        }
                    },
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            series : [
                {
                    name:'访问来源',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:335, name:'直接访问'},
                        {value:310, name:'邮件营销'},
                        {value:234, name:'联盟广告'},
                        {value:135, name:'视频广告'},
                        {value:1548, name:'搜索引擎'}
                    ]
                }
            ]
        };

        // 异步加载数据
        $.get("{{url('admin/abc',['status'=>1])}}").done(function (data) {
            // 填入数据
            myChart.setOption({
                legend: {
                    orient : 'vertical',
                    x : 'left',
                    data:data.info.x
                },
                series : [
                    {
                        name:'访问来源',
                        type:'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:data.info.y
                    }
                ]
            });
        });

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
        // 基于准备好的dom，初始化echarts实例
        var myChart1 = echarts.init(document.getElementById('main1'));

        // 指定图表的配置项和数据
        var option1 = {
            title: {
                text: '商品收藏TOP5'
            },
            tooltip: {},
            legend: {
                data:['收藏']
            },
            xAxis: {
                data: []
            },
            yAxis: {},
            series: [{
                name: '浏览',
                type: 'bar',
                data: []
            }]
        };
        // 异步加载数据
        $.get("{{url('admin/abc',['status'=>2])}}").done(function (data) {
            // 填入数据
            myChart1.setOption({
                xAxis: {
                    data: data.info.x
                },
                series: [{
                    // 根据名字对应到相应的系列
                    name: '收藏',
                    data: data.info.y
                }]
            });
        });
        // 使用刚指定的配置项和数据显示图表。
        myChart1.setOption(option1);
        // 基于准备好的dom，初始化echarts实例
        var myChart2 = echarts.init(document.getElementById('main2'));

        // 指定图表的配置项和数据
        var option2 = {
            title: {
                text: '商品浏览TOP5'
            },
            tooltip: {},
            legend: {
                data:['浏览']
            },
            xAxis: {
                data: []
            },
            yAxis: {},
            series: [{
                name: '浏览',
                type: 'bar',
                data: []
            }]
        };
        // 异步加载数据
        $.get("{{url('admin/abc',['status'=>3])}}").done(function (data) {
            // 填入数据
            myChart2.setOption({
                xAxis: {
                    data: data.info.x
                },
                series: [{
                    // 根据名字对应到相应的系列
                    name: '浏览',
                    data: data.info.y
                }]
            });
        },'json');
        // 使用刚指定的配置项和数据显示图表。
        myChart2.setOption(option2);
    </script>
</html>
