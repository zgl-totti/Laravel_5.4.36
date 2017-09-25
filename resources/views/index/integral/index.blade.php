<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>{{--{$title}--}}积分商城</title>
    <link href="{{asset('asset_index/css/demo.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/a.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset_index/css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{asset('asset_index/js/jQuery-1.8.2.min.js')}}"></script>
    <script src="{{asset('asset_index/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset_index/js/quick_links.js')}}"></script>
    <style>
        .Jmain{
            width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }
        .cj{
            width: 1180px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }
        #lottery{width:674px;height:684px;margin:20px auto;background:url("{{asset('asset_index/images/cjbg.jpg')}}") no-repeat;padding:50px 55px;}
        #lottery table td{width:142px;height:142px;text-align:center;vertical-align:middle;color:black;font-size: 20px}
        #lottery table td a{width:284px;height:284px;line-height:150px;display:block;text-decoration:none;}
        #lottery table td.active{background-color:#ea0000;}
        .jf{
            display: inline-block;
            width: 100%;
            height: 50px;
            background: rgb(240,0,1);
            font-size: 25px;
            color: rgb(255,252,9);
            line-height: 50px;
            font-style: italic;
        }
        /*热销*/
        .zd{
            font-size: 25px;
            padding-left: 10px;
        }
        .hotL{
            width: 1200px;
            margin: 0 auto;
        }
        .hotUl{
            width: 1200px;
        }
        .hotUl li,.lp li{
            position: relative;
            width: 280px;
            height: 350px;
            border: 2px solid rgb(255,68,0);
            border-radius: 5px;
            float: left;
            margin: 10px 7px;
        }
        .hotUl li .xuni,.lp li .xuni{
            background: url("{{asset('asset_index/images/Ubackground.png')}}") no-repeat;
            background-size:210px 210px;
        }
        .hotUl li .xuni .ubb,.lp li .xuni .ubb{
            /*position: absolute;*/
            display: inline-block;
            width: 100px;
            margin: 70px 55px;
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            color:orangered;
        }
        .hotUl li .xuni .ub,.lp li .xuni .ub{
            position: absolute;
            top:190px;
            left:107px;
            font-size: 40px;
            font-weight: bold;
            color:black;
        }
        .hotUl li .jf,.lp li .jf{
            width: 100%;
            height: 50px;
            background: rgb(240,0,1);
            font-size: 25px;
            color: rgb(255,252,9);
            line-height: 50px;
            font-style: italic;
            text-align: center;
        }
        .hotUl li .hotUl_main,.lp li .hotUl_main{
            margin: 20px auto;
            width: 210px;
            height: 210px;
        }
        .hotUl li .duihuan,.lp li .duihuan{
            text-align: center;
        }
        .hotUl li .duihuan h2,.lp li .duihuan h2{
            font-size: 20px;
            cursor: pointer;
        }
        /*礼品列表*/
        .lUL{
            padding-left: 10px;
        }
        .lUL li{
            display: inline-block;
            width: 100px;
            height: 30px;
            text-align: center;
            position: relative;
            z-index: 10;
            background: rgb(255,253,204);
            border: 2px solid rgb(255,68,0);
            cursor: pointer;
            color: #000;
        }
        .lUL li.active{
            border-bottom: none;
        }
        .lUL li>span{
            font-size: 16px;
            line-height: 30px;
        }
        .lp{
            width: 1180px;
            margin: 0 auto;
            border: 2px solid rgb(255,68,0);
            position: relative;
            z-index: 2;
            top:-2px;
            overflow: hidden;
        }
        .listpage{
            width: auto;
            float: right;
        }
        .listpage span,.listpage a{
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background: #fff;
        }
        .listpage .current{
            background: red;
            color:#fff;
        }
        .detail{
            width: 336px;
            height: 270px;
            background: #fff;
            float: left;
        }
        .d_title{
            font-size: 20px;
            color: red;
            background: rgb(254,206,70);

            height: 30px;line-height: 30px;
            text-align: center;
        }
        .detail p{
            color: #fff;
        }
        .wdjf{
            font-size: 25px;
            margin-left: 10px;
        }
        .wdjf span{
            font-size: 25px;
            margin-right: 20px;
        }
        .ls:hover,.zjjl:hover{
            cursor: pointer;
        }
        .lsxq{
            display: none;
        }
        .lsxq a{
            font-size: 25px;
            color: rgb(51,51,51);
        }
        .listpage span{
            margin: 0;
        }
        .zjlsxq{
            display: none;
        }
    </style>
</head>

<body>
<header>
    <article>
        <!--<div class="mt-logo">-->
        <!--顶部导航条 -->
        @include('index.public.header')
        <!-- </div>-->
    </article>
</header>
@include('index.public.nav')
<b class="line"></b>
<div class="content" style="background: rgb(255,253,204)">
    <img style="width: 100%;height: 40px;" src="{{asset('asset_index/images/jjb1.png')}}" alt=""/>
    <div style="margin: 0 auto;width: 850px"><img src="{{asset('asset_index/images/jf22.png')}}" alt=""/></div>
    <div style="width: 100%;border-bottom: 3px solid red;height: 1px"></div>
    <div class="Jmain">
        <div class="wdjf">
            <span class="wd1">我的积分：{$wdjf}</span>
            <span class="ls">兑换历史</span>
            <div class="lsxq">
                <volist name="dhls" id="valls" empty="$emptyls">
                    <div class="jl">
                        <span style="margin: 0">您在{:date('Y-m-d H:i:s',$valls['addtime'])}消耗了{$valls['jinfo']['needjf']}积分,兑换了</span>
                        <if condition="$valls['jinfo']['status'] eq 0">
                            <span>{$valls['jinfo']['getub']}U币</span>
                            <else/>
                            <a href="{:U('Goods/goodsDetail',array('gid'=>$valls['ginfo']['id']))}">{$valls['ginfo']['goodsname']}</a>
                        </if>
                    </div>
                </volist>
                <div class="listpage">
                    {$page5}
                </div>
            </div>
        </div>
        <div class="hotL">
            <h1 class="zd">热销</h1>
            <ul class="hotUl">
                @foreach($integral as $v)
                    @if($v['status']==0)
                        <li>
                            <img style="position: absolute;width: 100px;top:50px" src="{{asset('asset_index/images/tjl.gif')}}" alt=""/>
                            <div class="jf">{{$v['needjf']}}积分</div>
                            <div class="hotUl_main xuni">
                                <span class="ubb">{{$v['getub']}}</span>
                                <br/><span class="ub">U币</span>
                            </div>
                            <div class="duihuan"><h2>立即兑换</h2></div>
                        </li>
                    @else
                        <li>
                            <img style="position: absolute;width: 100px;top:50px" src="{{asset('asset_index/images/tjl.gif')}}" alt=""/>
                            <div class="jf">{{$v['needjf']}}积分</div>
                            <div class="hotUl_main shiwu">
                                <img width="210" src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" alt=""/>
                            </div>
                            <div class="duihuan">
                                <a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>1])}}">
                                    <h2>{{mb_substr($v['getGoods']['goodsname'],0,15,'utf-8')}}</h2>
                                </a>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
        <div class="list">
            <ul class="lUL">
                <li class="active">
                    <span>虚拟礼品</span>
                </li>
                <li>
                    <span>实物礼品</span>
                </li>
                <li>
                    <span>我能兑换</span>
                </li>
                <li>
                    <span>所有礼品</span>
                </li>
            </ul>
            <div class="lp">
            <ul>
                @foreach($list1 as $v)
                    <li>
                        <div class="jf">{{$v['needJF']}}积分</div>
                        <div class="hotUl_main xuni">
                            <span class="ubb">{{$v['getUB']}}</span>
                            <br/><span class="ub">U币</span>
                        </div>
                        <div class="duihuan"><h2>立即兑换</h2></div>
                    </li>
                @endforeach
            </ul>
                <div class="clear"></div>
                <div class="listpage">
                    {{$list1->links()}}
                </div>
            </div>
            <div class="lp" style="display:none">
                <ul>
                    @foreach($list2 as $v)
                        <li>
                            <div class="jf">{{$v['needJF']}}积分</div>
                            <div class="hotUl_main shiwu">
                                <img width="210" src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" alt=""/>
                            </div>
                            <div class="duihuan">
                                <a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>1])}}">
                                    <h2>{{mb_substr($v['getGoods']['goodsname'],0,15,'utf-8')}}</h2>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="clear"></div>
                <div class="listpage">
                    {{$list2->links()}}
                </div>
            </div>
            <div class="lp" style="display:none">
                <ul>
                    <volist name="list3" id="val3"  empty="$empty">
                        <if condition="$val3['status'] eq 0">
                            <li>
                                <div class="jf">{$val3.needjf}积分</div>
                                <div class="hotUl_main xuni">
                                    <span class="ubb">{$val3.getub}</span>
                                    <br/><span class="ub">U币</span>
                                </div>
                                <div class="duihuan"><h2>立即兑换</h2></div>
                            </li>
                            <else/>
                            <li>
                                <div class="jf">{$val3.needjf}积分</div>
                                <div class="hotUl_main shiwu">
                                    <img width="210" src="/Uploads/{$val3['ginfo']['pic']}" alt=""/>
                                </div>
                                <div class="duihuan"><a href="{:U('Goods/goodsDetail',array('gid'=>$val3['ginfo']['id'],'jf'=>$val3['needjf']))}"><h2>{:mb_substr($val3['ginfo']['goodsname'],0,15,'utf-8')}</h2></a></div>
                            </li>
                        </if>
                    </volist>
                </ul>
                <div class="clear"></div>
                <div class="listpage">
                    {$page3}
                </div>
            </div>
            <div class="lp" style="display:none">
                <ul>
                    @foreach($list as $v)
                        @if($v['status']==0)
                            <li>
                                <div class="jf">{{$v['needJF']}}积分</div>
                                <div class="hotUl_main xuni">
                                    <span class="ubb">{{$v['getUB']}}</span>
                                    <br/><span class="ub">U币</span>
                                </div>
                                <div class="duihuan"><h2>立即兑换</h2></div>
                            </li>
                        @else
                            <li>
                                <div class="jf">{{$v['needJF']}}积分</div>
                                <div class="hotUl_main shiwu">
                                    <img width="210" src="{{url('uploads')}}/{{$v['getGoods']['pic']}}" alt=""/>
                                </div>
                                <div class="duihuan">
                                    <a href="{{url('goods/index',['gid'=>$v['gid'],'status'=>1])}}">
                                        <h2>{{mb_substr($v['getGoods']['goodsname'],0,15,'utf-8')}}</h2>
                                    </a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clear"></div>
                <div class="listpage">
                    {{$list->links()}}
                </div>
            </div>
        </div>
            <div class="clear"></div>
            <div class="cj">

                <h1 style="padding-left: 10px;font-size: 20px;">积分抽奖 | <span class="zjjl" style="font-size: 20px">中奖纪录</span>  <span>提示：每次抽奖需要消耗50积分</span></h1>
                <div class="zjlsxq">
                    <volist name="cjls" id="valzj" empty="$emptylc">
                        <div class="jl">
                            <span style="margin: 0;font-size: 20px">您在{:date('Y-m-d H:i:s',$valzj['addtime'])}抽中了{$valzj['prize']}</span>
                        </div>
                    </volist>
                    <div class="listpage">
                        {$page6}
                    </div>
                </div>
                <div style="width: 674px;margin: 0 auto"><img width="674" src="{{asset('asset_index/images/xjf.png')}}" alt=""/></div>
                <div id="lottery">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="" class="lottery-unit lottery-unit-0">一等奖</td>
                            <td class="lottery-unit lottery-unit-1">二等奖</td>
                            <td class="lottery-unit lottery-unit-2">三等奖</td>
                            <td class="lottery-unit lottery-unit-3">四等奖</td>
                        </tr>
                        <tr>
                            <td class="lottery-unit lottery-unit-11">谢谢参与</td>
                            <td colspan="2" rowspan="2"><a href="javascript:void(0);"></a></td>
                            <td class="lottery-unit lottery-unit-4">五等奖</td>
                        </tr>
                        <tr>
                            <td class="lottery-unit lottery-unit-10">十一等奖</td>
                            <td class="lottery-unit lottery-unit-5">六等奖</td>
                        </tr>
                        <tr>
                            <td class="lottery-unit lottery-unit-9">十等奖</td>
                            <td class="lottery-unit lottery-unit-8">九等奖</td>
                            <td class="lottery-unit lottery-unit-7">八等奖</td>
                            <td class="lottery-unit lottery-unit-6">七等奖</td>
                        </tr>
                    </table>
                </div>
            </div>
        <div class="cfoot" style="width: 674px;margin: 0 auto">
        <div class="detail">
            <h1 class="d_title">抽奖规则</h1>
            <div style="padding: 10px;background: orangered">
            @foreach($draw as $k=>$v)
                @if($v['lx']==2)
                    <p style="margin-left: 100px"><span style="color:#000;line-height:20px;margin-right: 10px;display: inline-block;width: 20px;height: 20px;border-radius: 50%;background:rgb(254,206,70);text-align: center ">{{$k+1}}</span>{{$v['prize']}}：{{$v['num']}}U币</p>
                @else
                    <p style="margin-left: 100px"><span style="color:#000;line-height:20px;margin-right: 10px;display: inline-block;width: 20px;height: 20px;border-radius: 50%;background:rgb(254,206,70);text-align: center ">{{$k+1}}</span>{{$v['prize']}}：{{$v['num']}}积分</p>
                @endif
            @endforeach
            </div>
        </div>
            <div style="width: 336px;background: #fff;float: left" class="cj_log">
                <h1 style="color: red;font-size:20px;text-align: center;height: 30px;line-height: 30px;" class="L_title">最新中奖</h1>
                <ul id="logUUL" style="width: 300px;height: 240px;margin: 0 auto;background: rgb(205,39,60);padding: 10px 0">
                    @foreach($drawLog as $v)
                    <li style="padding:0 5px;background: rgb(217,64,82);margin: 10px 20px;width: 260px;color: #fff;height: 25px;line-height: 25px;text-align: center"><span style="float: left;">{{$v['getMember']['username']}}</span><span>{{$v['prize']}}</span><span style="float: right;">{{date('Y-m-d H:i:s',$v['addtime'])}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@include('index.public.tip')
@include('index.public.footer')
</body>
<script>
    $(function(){
        //选项卡
        $('.lUL li').click(function(){
            var i=$(this).index();
            if(i==2&&!"{:I('session.mid')}"){
                layer.alert('请登录后再来查看');
            }else{
                $('.lUL li').removeClass('active').eq(i).addClass('active');
                $('.lUL li').css('color','#000').eq(i).css('color','red');
                $('.lp').hide().eq(i).show();
            }
        });
        $('.duihuan>h2').click(function(){
            //判断用户是否登陆
            if("{:I('session.mid')}"){
                var jf=$(this).parents('li').find('.jf').text();
                var UB=$(this).parents('li').find('.ubb').text();
                $.post("{:U('buy')}",{jf:jf,UB:UB},function(res){
                    if(res.status){
                        layer.msg(res.info);
                    }else{
                        layer.msg(res.info);
                    }
                })
            }else{
                layer.msg('请登陆后再来兑换！')
            }
        });
    })
</script>
<script type="text/javascript">
    //异步分页
        function search1(id){
            var id1=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':1},function(res){
                $('.lp').eq(0).html(res);
            })
        }
        function search2(id){
            var id2=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':2},function(res){
                $('.lp').eq(1).html(res);
            })
        }
        function search3(id){
            var id3=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':3},function(res){
                $('.lp').eq(2).html(res);
            })
        }
        function search4(id){
            var id4=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':4},function(res){
                $('.lp').eq(3).html(res);
            })
        }
        function search5(id){
            var id4=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':5},function(res){
                $('.lsxq').html(res);
            })
        };
        function search6(id){
            var id4=id?id:1;
            $.get("{:U('index')}",{"p":id,'i':6},function(res){
                $('.zjlsxq').html(res);
            })
        }
    var lottery = {
        index: 0, //当前转动到哪个位置，起点位置
        count: 0, //总共有多少个位置
        timer: 0, //setTimeout的ID，用clearTimeout清除
        speed: 20, //初始转动速度
        times: 0, //转动次数
        cycle: 50, //转动基本次数：即至少需要转动多少次再进入抽奖环节
        prize: 0, //中奖位置
        init: function(id) {
            if ($("#" + id).find(".lottery-unit").length > 0) {
                $lottery = $("#" + id);
                $units = $lottery.find(".lottery-unit");
                this.obj = $lottery;
                this.count = $units.length;
                $lottery.find(".lottery-unit-" + this.index).addClass("active");
            }
        },
        roll: function() {
            var index = this.index;
            var count = this.count;
            var lottery = this.obj;
            $(lottery).find(".lottery-unit-" + index).removeClass("active");
            index += 1;
            if (index > count - 1) {
                index = 0;
            }
            $(lottery).find(".lottery-unit-" + index).addClass("active");
            this.index = index;
            return false;
        },
        stop: function(index) {
            this.prize = index;
            return false;
        }
    };

    function roll() {
        lottery.times += 1;
        lottery.roll();
        var prize_site = $("#lottery").attr("prize_site");
        if (lottery.times > lottery.cycle + 10 && lottery.index == prize_site) {
            var prize_id = $("#lottery").attr("prize_id");
            var prize_name = $("#lottery").attr("prize_name");
            layer.alert("恭喜你抽中了："+prize_name,function(index){
                $.post("{:U('refreshLog')}",function(res){
                    $('#logUUL').html(res);
                    layer.close(index);
                })
            });
            clearTimeout(lottery.timer);
            lottery.prize = -1;
            lottery.times = 0;
            click = false;

        } else {
            if (lottery.times < lottery.cycle) {
                lottery.speed -= 10;
            } else if (lottery.times == lottery.cycle) {
                var index = Math.random() * (lottery.count) | 0;
                lottery.prize = index;
            } else {
                if (lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 7) || lottery.prize == lottery.index + 1)) {
                    lottery.speed += 110;
                } else {
                    lottery.speed += 20;
                }
            }
            if (lottery.speed < 40) {
                lottery.speed = 40;
            }
            lottery.timer = setTimeout(roll, lottery.speed);
        }
        return false;
    }

    var click = false;

    $(function() {
        lottery.init('lottery');
        $("#lottery a").click(function() {
            if("{:I('session.mid')}"){
            if (click) {
                return false;
            } else {
                lottery.speed = 100;
                $.post("{:U('cj')}", {uid: 1}, function(res) { //获取奖品，也可以在这里判断是否登陆状态
                    if(res.status==0){
                        layer.msg(res.info);
                    }else{
                        $("#lottery").attr("prize_site", res.info['prize_site']);
                        $("#lottery").attr("prize_id", res.info['prize_id']);
                        $("#lottery").attr("prize_name", res.info['prize_name']);
                        roll();
                        click = true;
                        return false;
                    }
                }, "json")
                }
            }else{
                layer.msg('请登录后再来抽奖！');
            }
        });
        flag1=true;
        flag2=true;
        $('.ls').click(function() {
            if("{:I('session.mid')}"){
                if(flag1){
                    $('.lsxq').slideDown(600);
                    flag1=false;
                }else{
                    $('.lsxq').slideUp(600);
                    flag1=true;
                }
            }else{
            layer.msg('请登录后再来查看')
        }
            });
        $('.zjjl').click(function() {
            if("{:I('session.mid')}"){
                if(flag2){
                    $('.zjlsxq').slideDown(600);
                    flag2=false;
                }else{
                    $('.zjlsxq').slideUp(600);
                    flag2=true;
                }
            }else{
                layer.msg('请登录后再来查看')
            }
        });

    })
</script>
</html>