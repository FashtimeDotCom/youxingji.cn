<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人带你去旅行_游行迹</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" href="/resource/css/lib/sketch_detail.css" />
    <!--<link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">-->
    <script src="/resource/js/jquery.min.js"></script>
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

<body>
{{include file='public/header.tpl'}}
<div class="main">
    <div class="ban s3">
        <img src="{{$detail.pics}}" />
    </div>
    <div class="cur">
        <div class="wp">
            <a href="">首页</a> &gt;
            <a href="/index.php?m=index&c=index&v=star">达人邦</a> &gt; <span>达人带你去旅行</span>
        </div>
    </div>
    <div class="instr clearfix">
        <div class="instr_cont fl">
            <div>
                <div class="tour_day" style="display: none;">
                    <ul class="clearfix" id="tour_day">
                        {{foreach from=$detail.nums key=key item=v}}
                        <li class="{{if $key==0}}tour_day_active{{/if}}">
                            <span>Day{{$key+1}}</span>
                        </li>
                        {{/foreach}}

                    </ul>
                </div>
                <div class="iCont_title location">
                    <h4>{{$detail.title}}</h4>

                    <p>{{$detail.content}}</p>
                </div>
                <div class="solumn_tour">
                    <div class="column" style="display: none;">
                        <ul class="clearfix">
                            <li class="column_select"><span>跟谁去</span></li>
                            <li><span>特色体验</span></li>
                            <li><span>行程介绍</span></li>
                            <li><span>费用说明</span></li>
                            <li><span>签证信息</span></li>
                        </ul>
                    </div>

                    <div class="player_star">
                        {{$detail.with_one}}
                    </div>
                    <div class="life_line"></div>
                    <div class="bright" id="bright">
                        {{$detail.feture}}
                    </div>
                    <div class="life_line"></div>

                    <div class="tour_cont location">
                        <ul class="tour_list">
                            {{foreach from=$detail.every_day item=item key=key}}
                            <li >
                                <div class="day_num">
                                    <i>D{{$item.sort}}</i><span>{{$item.title}}</span> </div>
                                <ul class="introduce">
                                    <li class="flight"><i></i><span>{{$item.airport}}</span></li>
                                    <li class="diet"><i></i><span>{{$item.breakfast}}</span></li>
                                    <li class="sleep"><i></i><span>{{$item.accommodation}}</span></li>
                                    <li class="Trip"><i></i><span>{{$item.desc}}</span></li>
                                </ul>
                                <div class="day_cont">
                                </div>
                            </li>
                            {{/foreach}}

                        </ul>
                    </div>
                </div>
                <div class="group pb30" id="group_date">
                    <h4 class="title_show_active" id="cost_title">费用说明<span></span></h4>
                    <div class="cost">
                        {{$detail.cost_explain}}
                    </div>
                </div>

                <div class="group pb30" id="cost">
                    <h4 class=" title_show_active">签证信息<span></span></h4>

                    <div class="visa_infor" style="display: block;">
                        {{$detail.visa_explain}}
                    </div>
                </div>


                <div class="group" style="margin-bottom: 1rem;">
                    <h4 class="title_show" id="travel">温馨提示<span></span><i></i></h4>

                    <div class="visa_infor">
                        {{$detail.tips}}
                    </div>
                </div>

            </div>

            <div class="search_footer">
                <a href="javascript:void(0)" class="custom_index">
                    <img initsrc="http://www.bugentuan.com//static/images/Customized-travel880.jpg">
                </a>
            </div>
            <div class="instr_cont_bottom"></div>
        </div>
        <div class="instr_sider fl" style="position: absolute; top: 0px; right: 0px;">
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
                <input type="radio" name="radio" value="北京">北京
                <!--<input type="text" id="City" value="" placeholder="自定义城市" />-->
            </div>
            <div class="Price">
                总价<span class="pri">{{$detail.price}}</span>元
            </div>
            <input type="button" id="btn" class="btn" value="立即预定" />
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
<div class="column_hide" style="left: 352.5px; display: block;">
    <ul class="clearfix">
        <li class="column_select_hide"><span>跟谁去</span></li>
        <li class=""><span>特色体验</span></li>
        <li><span>行程介绍</span></li>
        <li><span>费用说明</span></li>
        <li><span>签证方式</span></li>
    </ul>
</div>
<div class="top_line" style="display: block;"></div>
{{include file='public/footer.tpl'}}
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<script src="/resource/js/detailbm.js"></script>


<script>
    function checkMobile(v) {
        if(/^(1[3-9]{1}[0-9]{1})\d{8}$/.test(v)) {
            return true;
        } else {
            return false;
        }
    }
    $(document).ready(function() {

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
            $.post("index.php?m=api&c=index&v=star_apply", {
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


        $(".js_cur_num1").bind('DOMNodeInserted', function(e) {
            var money = $('.money').text();
            var num = $(e.target).html();
            $('.pri').text(money * num);
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

</script>
<script src="/resource/js/lib/sketch_detail.js"></script>

</body>

</html>