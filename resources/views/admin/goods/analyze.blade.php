<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script src="{{asset('asset_admin/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_admin/js/echarts.min.js')}}"></script>
    <title></title>
</head>
<body>
<div id="main" style="width: 1200px;height:400px;"></div>
<div id="main2" style="width: 1200px;height:400px;"></div>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '销量前十榜单'
        },
        tooltip: {},
        legend: {
            data:['销量']
        },
        xAxis: {
            data: []
        },
        yAxis: {},
        series: [{
            name: '销量',
            type: 'bar',
            data: []
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
    var token="{{csrf_token()}}";
    // 异步加载数据
    $.post("{{url('admin/goods_analyze')}}",{_token:token}).done(function (data) {
        // 填入数据
        myChart.setOption({
            xAxis: {
                data: data.info.x
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '销量',
                data: data.info.y
            }]
        });
    });
</script>
</body>
</html>