<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$journey.seotitle}}_甄选之旅_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{$journey.keywords}}" />
    <meta name="keywords" content="{{$journey.description}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="">
        	<img src="{{$journey.articlepic}}"/>
        </div>
        <div class="cur">
            <div class="wp">
                <a href="">首页</a> &gt; <a href="/index.php?m=index&c=index&v=journey">甄选之旅</a> &gt; <span>{{$journey.title}}</span>
            </div>
        </div>
        <div class="wp">
            <div class="box-prod">
                <div class="col-l">
                    <div class="m-pic2">
                        <div class="slider-for">
                            {{foreach from=$galleries item=vo key=k}}
                            <div class="item"><img src="{{$vo.imgurl}}" alt=""></div>
                            {{/foreach}}
                        </div>
                        <div class="slider-nav">
                            {{foreach from=$galleries item=vo key=k}}
                            <div class="item"><img src="{{$vo.imgurl}}" alt=""></div>
                            {{/foreach}}
                        </div>
                    </div>
                </div>
                <div class="col-r">
                    <div class="m-txt1">
                        <h4>{{$journey.title}}</h4>
                        <div class="info">
                            <div class="price">￥{{$journey.extend.price}}
                          		<button type="button" class="calendar book_btn" id="btnBook" style="display: block;margin-top: 14px;width: 80px; margin-left: 35px;">预定</button>
                          	</div>
                            <div class="txt">
                                <p>
                                    <span class="s1"><img src="/resource/images/pic030.png" alt="">旅行天数：{{$journey.extend.lxts}}天</span>
                                    <span class="s2"><img src="/resource/images/pic031.png" alt="">出发城市：{{$journey.extend.cfcs}}</span>
                                </p>
                                <p>
                                    <span class="s1"><img src="/resource/images/pic032.png" alt="">最佳季节：{{$journey.extend.zjjj}}</span>
                                    <span class="s2"><img src="/resource/images/pic033.png" alt="">旅行主题：{{$journey.extend.lxzt}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="det">
                            <h5>线路亮点</h5>
                            {{$journey.content}}
                        </div>
                    </div>
                </div>
            </div>
            <ul class="ul-txt3">
                <li class="on">特色体验</li>
            </ul>
            <ul class="ul-txt4">
                {{foreach from=$features item=vo key=k}}
                <li>
                    <div class="pic"><img src="{{$vo.pics}}" alt=""></div>
                    <div class="txt">
                        <h4>{{$vo.title}}：</h4>
                        <p>{{$vo.introduction}}</p>
                    </div>
                </li>
                {{/foreach}}
            </ul>
            <ul class="ul-txt3">
                <li class="on">详细行程</li>
            </ul>
            <ul class="ul-txt5">
                {{foreach from=$trip item=vo key=k}}
                <li class="{{if $k == 0}}on{{/if}} {{if $count - $k == 1}}last{{/if}}">
                    <h4><span>D{{$vo.days}}</span>{{$vo.title}}</h4>
                    {{$vo.introduction}}
                    <dl class="dl-pic2">
                        {{foreach from=$vo.pics item=v}}
                        <dd>
                            <div class="con">
                                <div class="pic">
                                    <img src="{{$v.imgurl}}" alt="">
                                </div>
                                <div class="bg"></div>
                                <p>{{$v.title}}</p>
                            </div>
                        </dd>
                        {{/foreach}}
                    </dl>
                </li>
                {{/foreach}}
            </ul>
            <ul class="ul-txt3 TAB_CLICK" id=".tabshow1">
                <li class="on">费用包含</li>
                <li>费用不包含</li>
                <li>温馨提示</li>
                <li>签证说明</li>
              	<li>签约方式</li>
            </ul>
            <div class="tabshow1">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">费用包含</h3>
                {{$journey.extend.fybh}}
            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">费用不包含</h3>
                {{$journey.extend.fybbh}}
            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">温馨提示</h3>
                {{$journey.extend.htsm}}
            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">签证说明</h3>
                {{$journey.extend.qzsm}}
            </div>
          	<div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">签约方式</h3>
                {{$journey.extend.qyfs}}
            </div>
        </div>
        <div class="m-reserve" style="background-image:url(/resource/images/bg07.jpg);">
            <div class="wp">
                <div class="col-l">
                    <h4>咨询热线</h4>
                    <div class="tel"><img src="/resource/images/pic050.png" alt="">4009-657-018</div>
                </div>
                <div class="col-r">
                    <h4>预约报名</h4>
                    <div class="form-group">
                      <input class="inp inp1" type="text" id="realname" placeholder="姓名">
                      <input class="inp inp2" type="text" id="telephone" placeholder="手机号码">
                      <input class="inp inp3" type="text" id="email" placeholder="出发点">
                    </div>
                    <div class="form-group">
                      <textarea id="messages"></textarea>
                    </div>
                    <input class="sub postLeave" type="submit" value="提交">
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
  	<div class="mask_layer" id="mask_wrap" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; background: rgb(0, 0, 0); z-index: 999; opacity: 0.5; display: none;">
    </div>
  	<div id="all-date" class="pop_box pop_box_self popBoxOrderContain" style="display: none;z-index: 9999">
        <a id="dateClose" class="close" href="javascript:;">×</a>
        <div class="headline">
            选择出发日期与人数
        </div>
        <div id="pop-cal" class="calendar_box">
            <table>
            <caption>
            <a href="javascript:;" class="pre">&lt;</a><a href="javascript:;" class="next">&gt;</a><span class="cal-title">2013年7月</span>
            </caption>
            <thead>
            <tr>
                <th class="weekend">
                            日
                </th>
                <th>
                            一
                </th>
                <th>
                            二
                </th>
                <th>
                            三
                </th>
                <th>
                            四
                </th>
                <th>
                            五
                </th>
                <th class="weekend">
                            六
                </th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        <div class="detailPopOrderSection">
            <div class="detailPopOrderRow" id="detailPop">
                <span class="detailPopOrderRowTitle">出行人数</span>
                <div id="detail_adultNum" style="display:inline">
                    成人：
                    <div class="cm-num-adjust" style="margin-right: 25px;">
                        <span class="cm-adjust-minus js_num_minus1">-</span>
                        <span class="cm-adjust-view js_cur_num1">2</span>
                        <span class="cm-adjust-plus js_num_plus1">+</span>
                    </div>
                </div>
                <div id="detail_childNum" style="display:inline;position:relative;">
                    儿童：
                    <div class="cm-num-adjust">
                        <span class="cm-adjust-minus js_num_minus2">-</span>
                        <span class="cm-adjust-view js_cur_num2">0</span>
                        <span class="cm-adjust-plus js_num_plus2">+</span>
                    </div>
                    （2-12周岁）
                  	<span class="detailChildNumExceedWarning" style="display: none;">航空公司规定一个成人最多只可携带2名儿童.</span>
                </div>
            </div>
          	<div class="detailPopOrderRow service_book" style="text-align: center;">
          		<li style="position: relative">
                	<span>您的姓名：</span><input type="text" value="" id="ContactName">
             	</li>
              	<li style="position: relative">
                	<span>手机号码：</span><input type="text" value="" id="ContactPhone">
             	</li>
              	<li style="position: relative">
                	<span>出发地点：</span><input type="text" value="" id="ContactEmail">
             	</li>
              	<div style="text-align: center;">
                  	<button type="button" class="calendar book_btn" id="btnSubPre">上一步</button>
                  	<button type="button" class="calendar book_btn" id="btnSubBook">提交</button>
                </div>
          	</div>
            <div class="detailPopOrderRow" style="text-align: center;" id="nexts">
              	<input type="hidden" name="year" value="{{$year}}" id="yearDate">
              	<input type="hidden" name="month" value="{{$month}}" id="monthDate">
              	<input type="hidden" name="year" value="{{$journey.id}}" id="jid">
              	<input type="hidden" name="year" value="{{$journey.title}}" id="jtitle">
                <button type="button" class="calendar book_btn" id="btnNext">下一步</button>
            </div>
        </div>
    </div>
  	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
  	<script src="/resource/js/detailbm.js"></script>
    <script>
        $(document).ready(function() {
          	$('.postLeave').click(function(){
            	var realname = $('#realname').val();
              	var telephone = $('#telephone').val();
              	var email = $('#email').val();
              	var messages = $('#messages').val();
              	if(!realname){
                    layer.msg('请输入您的姓名');
                    return false;
                }
              	if(!telephone){
                    layer.msg('请输入您的手机号码');
                    return false;
                }
              	if(!email){
                    layer.msg('请输入出发点');
                    return false;
                }
              	if(!messages){
                    layer.msg('请输入内容');
                    return false;
                }
              	$.post("/index.php?m=api&c=index&v=postleave", {
                    'realname':realname,
                    'telephone':telephone,
                    'email':email,
                    'messages':messages
                }, function(data){
                     layer.msg(data.tips);
                    if(data.status == 1){
                        $('#realname').val('');
                        $('#telephone').val('');
                        $('#email').val('');
                        $('#messages').val('');
                    }
                },"JSON");
            });
            $(".TAB_CLICK li").click(function() {
                var tab = $(this).parent(".TAB_CLICK");
                var con = tab.attr("id");
                var on = tab.find("li").index(this);
                $(this).addClass('on').siblings(tab.find("li")).removeClass('on');
                $(con).eq(on).show().siblings(con).hide();
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
			$('.price').mouseover(function(){
            	$('.priced').show();
            });
			$('.price').mouseout(function(){
            	$('.priced').hide();
            });
        });
    </script>
  	
</body>

</html>