<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>名师带你去写生_游行迹</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" href="/resource/css/lib/tab.css" />
    <link rel="stylesheet" href="/resource/css/lib/tab_list.css" />
    <link rel="stylesheet" type="text/css" href="/resource/css/media1280.css"  media="screen and (min-width: 1200px) and (max-width: 1299px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css"  media="screen and (min-width: 1300px) and (max-width: 1399px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css"  media="screen and (min-width: 1400px) and (max-width: 1499px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css"  media="screen and (min-width: 1500px) and (max-width: 1699px)">
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
        .mask {
            display: none;
            width: 100vw;
            height: 100vh;
            position: fixed;
            z-index: 999;
        }
        .mask_layer {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: rgb(0, 0, 0);
            z-index: 99;
            opacity: 0.5;
        }
        .mask_box {
            background: #FFFFFF;
            width: 600px;
            position: fixed;
            top: 100px;
            left: 30%;
            z-index: 1000;
            height: 400px;
            padding-top: 50px;
        }
        .mask_box .ul_box li {
            width: 100%;
            margin: .5rem auto;
        }
        .mask_box .ul_box li input {
            width: 300px;
            height: 40px;
        }
        .mask_box .close {
            position: absolute;
            right: 10px;
            top: 10px;
        }
    </style>
</head>

<body style="background: #f6f6f6;">
{{include file='public/header.tpl'}}
<div class="main">
    <div class="ban s3">
    	<img src="{{$detail.pics}}"/>
    </div>
    <div class="cur">
        <div class="wp">
            <a href="">首页</a> &gt;
            <a href="/index.php?m=index&c=index&v=scenery">油画</a> &gt; <span>大师带你去写生</span>
        </div>
    </div>
    <div class="wp">
        <div class="box-prod">
            <div class="row-l">
                <div class="tab-title">
                    {{$detail.title}}
                </div>
                {{$detail.content}}
            </div>
            <div class="row-r">
                <div class="time">
                    <div class="time-l row-title" style="padding-top: 0;">
                        出行时间
                    </div>
                    <div class="time-r">
                        {{$detail.depature_time}}
                    </div>
                </div>
                <div class="row-title">
                    出行人数
                </div>
                <div class="number">
                    <div class="number-l">
                        ￥<span class="money">{{$detail.price}}</span>/人
                    </div>
                    <div class="cm-num-adjust">
                        <span class="cm-adjust-minus js_num_minus1">-</span>
                        <span class="cm-adjust-view js_cur_num1">1</span>
                        <span class="cm-adjust-plus js_num_plus1">+</span>
                    </div>
                </div>
                <div class="row-title">
                    出发城市
                </div>
                <div class="City" style="padding-bottom: 1rem;">
                    <input type="radio" name="radio" value="广州">广州
                    <input type="radio" name="radio" value="深圳">深圳
                    <input type="radio" name="radio" value="上海">上海
                    <input  type="radio" name="radio" value="北京">北京
                    <!--<input type="text" id="City" value="" placeholder="自定义城市" />-->
                </div>
                <div class="Price">
                    总价<span class="pri">{{$detail.price}}</span>元
                </div>
                <input type="button" id="btn" class="btn" value="立即预定" />
            </div>
        </div>
        <div class="tabmain">
            <div id="outerWrap" class="outerWrap">
                <div id="sliderParent" class="sliderParent"></div>
                <ul class="tabGroup">
                    <li class="tabOption selectedTab">跟谁去</li>
                    <li class="tabOption">特色体验</li>
                    <li class="tabOption">行程介绍</li>
                    <li class="tabOption">费用说明</li>
                    <li class="tabOption">签证方式</li>
                    <li class="tabOption">温馨提示</li>

                </ul>
                <div id="container" class="container">
                    <div id="content" class="content">
                        <!--跟谁去-->
                        <div class="tabContent  selectedContent">
                            <div class="item">
                                <div class="item-img">
                                   {{$detail.with_one}}
                                </div>

                            </div>

                        </div>


                        <!--特色体验-->
                        <div class="tabContent">
                            <div class="item">
                                <div class="item-img">
                                    {{$detail.feture}}
                                </div>

                            </div>
                        </div>

                        <div class="tabContent">
                            <div class="tab-title">
                                行程介绍
                            </div>

                            <div id="tabWrap" class="tabWrap">
                                <ul class="listGroup">
                                    {{foreach from=$detail.nums key=key item=item }}
                                        <li class="listOption {{if $key==0}}selectedTab{{/if}}">第{{$item}}天</li>
                                    {{/foreach}}

                                </ul>
                                <ul id="cont" class="cont ul-txt5 item-ul">
                                {{foreach from=$detail.every_day item=item key=key}}
                                    <li class="on textContent active">
                                        <h4><span>D{{$item.sort}}</span>{{$item.title}}</h4>
                                        <div class="flight">
                                            <i></i> {{$item.airport}}
                                        </div>
                                        <div class="diet">
                                            <i></i> {{$item.breakfast}}
                                        </div>
                                        <div class="sleep">
                                            <i></i> {{$item.accommodation}}
                                        </div>
                                        <div class="Trip">
                                            <i></i>
                                            {{$item.desc}}
                                        </div>

                                    </li>
                                  {{/foreach}}
                                </ul>
                            </div>
                        </div>
                        <div class="tabContent">
                            <div class="tab-title">
                                费用说明
                            </div>
                            <div class="content-text">
                                {{$detail.cost_explain}}
                            </div>

                        </div>
                        <div class="tabContent">
                            <div class="tab-title">
                                签证说明
                            </div>
                            <div class="content-text">
                                {{$detail.visa_explain}}
                            </div>
                        </div>
                        <div class="tabContent">
                            <div class="tab-title">
                                温馨提示
                            </div>
                            <div class="content-text">
                                {{$detail.tips}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--尾部去掉-->
<div class="mask">
    <div class="mask_layer" id="mask_wrap" style="">
    </div>
    <div id="mask_box" class="mask_box">
        <a id="dateClose" class="close" href="javascript:;">×</a>
        <ul class="ul_box" style="text-align: center;">
            <li style="position: relative">
                <span>您的姓名：</span><input type="text" value="" id="realname">
            </li>
            <li style="position: relative">
                <span>手机号码：</span><input type="text" value="" id="phone">
            </li>
            <li style="position: relative">
                <span>出发地点：</span><input type="text" value="" id="place">
            </li>
            <div style="text-align: center;">
            	<input type="hidden" id="sketch_id" name="sketch_id" value="{{$detail.id}}">
                <button type="button" class="calendar book_btn" id="mask_btn">提交</button>
            </div>
        </ul>
    </div>
</div>
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script src="/resource/js/detailbm.js"></script>
<script>
	function checkMobile(v){
	    if( /^(1[3-9]{1}[0-9]{1})\d{8}$/.test(v) ){
	        return true;
	    } else {
	        return false;
	    }
	}
    $(document).ready(function() {
        tab('outerWrap', 'container', 'content', 'tabOption', 'slid');
        
        $('#mask_btn').click(function() {
            var realname = $('#realname').val();
            var phone = $('#phone').val();
            var place = $('#place').val();
            var id = $('#sketch_id').val();
            if(!realname) {
                layer.msg('请输入您的姓名');
                return false;
            }
            if(!phone) {
                layer.msg('请输入您的手机号码');
                return false;
            }
            if(!place) {
                layer.msg('请输入出发点');
                return false;
            }
            if(!id) {
                layer.msg('请输入内容');
                return false;
            }
            $.post("index.php?m=api&c=index&v=sketch_apply", {
                'realname': realname,
                'phone': phone,
                'place': place,
                'sketch_id': id
            }, function(data) {
                layer.msg(data.tips);
                if(data.status == 1) {
                    $('#realname').val('');
                    $('#phone').val('');
                    $('#place').val('');
                    $('#sketch_id').val('');
                }
            }, "JSON");
        });
        var hei = $(window).height() / 1.05;
        $('.tabmain').height(hei);
        $(".TAB_CLICK li").click(function() {
            var tab = $(this).parent(".TAB_CLICK");
            var con = tab.attr("id");
            var on = tab.find("li").index(this);
            $(this).addClass('on').siblings(tab.find("li")).removeClass('on');
            $(con).eq(on).show().siblings(con).hide();
        });
        $(".js_cur_num1").bind('DOMNodeInserted', function(e) {
			var money=$('.money').text();
		    var num=$(e.target).html();
		    $('.pri').text(money*num);
		}); 
        $('.banner .slider').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            fade: true,
            slidesToShow: 1,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            cssEase: 'linear',
            lazyLoad: 'ondemand'
        });

        $('.m-pic2 .slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            fade: false,
            asNavFor: '.m-pic2 .slider-nav'
        });
        $('.m-pic2 .slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.m-pic2 .slider-for',
            dots: false,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            focusOnSelect: true
        });
        $('#btn').click(function() {
            $('.mask').show(1000);
            $('.mask_layer').show(1000);
            $('.mask_box').show(1000);
            var val = $('input[name="radio"]:checked').val();
            $('#ContactEmail').val(val);
        });
        $('.close').click(function() {
            $('.mask').hide();
        });
        $('.mask_btn').click(function() {
            $('#ContactEmail').val();
        });
    });
    $(function() {
        $(".tabWrap").find("ul li:first").show();
        $(".listGroup li").on("mouseover", function() {
            var index = $(this).index();
            $(this).parent().next().find(".textContent").hide().eq(index).show();
            $(this).addClass("selectedTab").siblings().removeClass("selectedTab");
        })
    })
</script>
<script src="/resource/js/lib/event.js"></script>
<script src="/resource/js/lib/tab.js"></script>
<script src="/resource/js/lib/tween.js"></script>
</body>

</html>