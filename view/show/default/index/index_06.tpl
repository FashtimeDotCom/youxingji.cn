<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{vpconfig key="index_seotitle" group="site" default="首页"}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
  		<!--百度统计-->
  	<style type="text/css">
  		.item_test p span{
  			color: #999999 !important; 
  		}
  		.title {
  			width: 100%;
  			display: -webkit-flex; /* Safari */
			display: flex;
			color: #000000 !important;
			font-weight: bold;
  		}
  		.tit_left {
  			flex-grow: 3;
  			font-size: 18px !important;
  		}
  		.tit_right {
  			text-align: right;
  			flex-grow: .5;
  		}
  		
  	</style>
	<script>
		var _hmt = _hmt || [];
		(function() {
  			var hm = document.createElement("script");
  			hm.src = "https://hm.baidu.com/hm.js?0154d439703cde1da00f954c61ca8b64";
  			var s = document.getElementsByTagName("script")[0]; 
  			s.parentNode.insertBefore(hm, s);
		})();
	</script>
  
    <script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
  	<!--lightbox开始-->
  	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
  	<!--[if IE 6]>
 	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
  	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
  	<script type="text/javascript">
    	jQuery(document).ready(function($){
      		$('.lightbox').lightbox();
    	});
  	</script>
</head>
<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        <div class="banner"> 
            <div class="slider">
                {{vplist from='ad' item='adlist' tagname='homeslide'}}
                <div class="item" style="background-image: url({{$adlist.imgurl}});"></div>
                {{/vplist}}
            </div>
            <div class="con">
                <div class="wp">
                    <img class="img" src="/resource/images/pic01.png" alt="">
                    <h2>{{TO->cfg key="site_add_homebannertxt" group="site" default=""}}</h2>
                    <div class="m-so">
                        <form action="index.php">
                          	<input type="hidden" name="m" value="index">
                          	<input type="hidden" name="c" value="index">
                          	<input type="hidden" name="v" value="search">
                            <input class="inp" type="text" name="keyword" placeholder="请输入关键字">
                            <input class="sub" type="submit" value="搜 索">
                        </form>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row-a1">
            <div class="wp">
                <h3 class="m-tit1">甄选之旅<i></i></h3>
                {{vplist from='ad' item='adlist' tagname='homeo1'}}
                <div class="m-pic1" onclick="href('{{$adlist.linkurl}}')">
                  	<a href="javascript::"><img src="{{$adlist.imgurl}}" alt=""></a>
                    <h4>{{$adlist.adname}}</h4>
                </div>
                {{/vplist}}
            </div>
        </div>
        <div class="row-a2">
            <div class="wp">
                <h3 class="m-tit1">达人邦<i></i></h3>
                <ul class="ul-txt1">
                    {{foreach from=$starlist item=vo}}
                    <li>
                        <div class="con">
                            <div class="user">
                                <div class="pic">
                                    <div class="user-info">
                                        <div class="txt-l">
                                            <h4>{{$vo.uid|helper:'username'}}</h4>
                                            <a class="btn-follow" href="javascript:;" onclick="follows({{$vo.uid}},this)">{{$vo.uid|helper:'isfollows'}}</a>
                                            <p><span>{{$vo.uid|helper:'fansnum'}}</span>粉丝</p>
                                        </div>
                                        <div class="txt-r">
                                            <i class="icon1"></i>
                                            <i class="icon2"></i>
                                            <p>{{$vo.uid|helper:'autograph'}}...</p>
                                        </div>
                                    </div>
                                    <div class="img">
                                        <a href="{{$vo.uid|helper:'href'}}"><img src="{{$vo.uid|helper:'avatar'}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="txt">
                                    <span>{{$vo.addtime}}</span>
                                    <h4>{{$vo.uid|helper:'username'}}</h4>
                                </div>
                            </div>
                            <div class="det" onclick="href('{{$vo.uid|helper:'href'}}')">
                                <p>{{$vo.describes}}</p>
                            </div>
                            <dl class="dl-pic1">
                                {{foreach from=$vo.content item=v}}
                                <dd><a class="lightbox" href="{{$v}}" rel="list{{$vo.id}}"><img src="{{$v}}" alt=""></a></dd>
                                {{/foreach}}
                            </dl>
                            <div class="num">
                                <span><img src="/resource/images/pic023.png" alt="">{{$vo.shownum}}</span>
                                <span><img src="/resource/images/pic024.png" alt="" class="zan" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}"><a id="zan{{$vo.id}}">{{$vo.topnum}}</a></span>
                            </div>
                        </div>
                    </li>
                    {{/foreach}}
                </ul>
                <a href="/index.php?m=index&c=index&v=star" class="m-btn1">查看更多</a>
            </div>
        </div>
      	<div class="yhslider">
            {{vplist from='ad' item='adlist' tagname='homeo2'}}
            <div class="row-a3 item" style="background-image: url({{$adlist.imgurl}});">
                <a href="{{$adlist.linkurl}}" target="_blank"></a>
            </div>
            {{/vplist}}
      	</div>
        <div class="row-a4">
            <div class="wp">
                <h3 class="m-tit1">游画<i></i></h3>
                <ul class="ul-txt2">
                    {{foreach from=$scenery item=v}}
                    <li>
                        <a href="javascript:;">
                            <div class="pic"><img class="youhua" data-title="{{$v.title}}" data-name="{{$v.name}}" data-size="{{$v.size}}" data-place="{{$v.place}}" data-src="{{$v.pics}}" src="{{$v.thumbpic}}" alt=""></div>
                            <div class="txt">
                                <p><span>作品：</span> {{$v.title}}</p>
                                <p onclick="href('/index.php?m=index&c=index&v=writer&id={{$v.wid}}')"><span>作者：</span> {{$v.name}}</p>
                                <p><span>尺寸：</span> {{$v.size}}</p>
                                <p><span>写生地点：</span> {{$v.place}}</p>
                            </div>
                        </a>
                    </li>
                    {{/foreach}}
                </ul>
                <a href="/index.php?m=index&c=index&v=scenery" class="m-btn1">查看更多</a>
            </div>
        </div>
        <div class="row-a5" style="background-image:url(/resource/images/bg03.jpg);">
            <div class="wp">
                <h3 class="m-tit1">旅拍TV<i></i></h3>
                <ul class="ul-pic1">
                    {{foreach from=$tv item=v}}
                    <li>
                        <a class="js-video" href="#m-pop1-hlg" data-src="{{$v.url}}" data-id="{{$v.id}}">
                            <img src="{{$v.pics}}" alt="">
                            <div class="txt">
                                <h4>{{$v.title}}</h4>
                                <i></i>
                            </div>
                        </a>
                    </li>
                    {{/foreach}}
                </ul>
                <a href="/index.php?m=index&c=index&v=tv" class="m-btn1">查看更多</a>
            </div>
        </div>
        <div class="row-a6" style="background-image:url(/resource/images/bg04.png);">
            <div class="wp">
                <h3 class="m-tit1">日阅潭<i></i></h3>
                <div class="con" style="margin: 0px 0 20px;">
                    <h4><img src="/resource/images/pic012.png" alt=""></h4>
                    <div class="col-l">
                        <div id="currentDate"></div>
                        <!-- 月份页码 -->
                        <div class="page">
                            <a class="a-prev" onClick="cale.PreMonth();"></a>
                            <div class="date-tit">
                                <span id="idCalendarYear"></span> 年
                                <span id="idCalendarMonth"></span> 月
                            </div>
                            <a class="a-next" onClick="cale.NextMonth();"></a>
                        </div>
                        <!-- 月份页码 end -->
                        <div class="Calendar">
                            <!-- 日历 -->
                            <table cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>日</td>
                                        <td>一</td>
                                        <td>二</td>
                                        <td>三</td>
                                        <td>四</td>
                                        <td>五</td>
                                        <td>六</td>
                                    </tr>
                                </thead>
                                <tbody id="idCalendar">
                                </tbody>
                            </table>
                            <!-- 日历 end -->
                        </div>
                    </div>
                    <div class="col-r" id="getryt">
                    </div>
                </div>
              	<a href="/index.php?m=index&c=index&v=ryt" class="m-btn1">查看更多</a>
            </div>
        </div>
        <!-- 视频弹窗 -->
        <div class="m-pop1-hlg" id="m-pop1-hlg">
            <div class="con1">
                <iframe src='' frameborder=0 'allowfullscreen'></iframe>
                <div class="close js-close"></div>
            </div>
        </div>
        <!-- end -->
        <!-- 游画弹窗 -->
        <div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
            <div class="con">
                <div class="pic">
                    <img id="wpics" src="" alt="" />
                </div>
                <div class="txt">
                    <p id="wtitle"></p>
                    <p id="wuser"></p>
                    <p id="wsize"></p>
                    <p id="wplace"></p>
                </div>
            </div>
            <div class="close"></div>
        </div>
        <!-- end -->
    </div>
    {{include file='public/footer.tpl'}}
    <script type="text/javascript">
        $(document).ready(function() {
            //获取当前日期
            var mydate = new Date();
            var _y = mydate.getFullYear();
            var _m = mydate.getMonth() + 1;
            var _d = mydate.getDate();
            $("#currentDate").text(_y + "年" + _m + "月" + _d + "日");
            getryt(_y + '-' + _m + '-' + _d, _y);
          
          	
        });
        function bind_td() {
            $("#idCalendar td").on('click', function(e) {
              
              	if($(this).attr('isclick') == 1){
                	return false;
                }
                day = $(this).text();
                if (day.length == 1) day = '0' + day;
                das = cale.Year + "-" + cale.Month + "-" + day; // 带-日期
                $("#currentDate").text(cale.Year + "年" + cale.Month + "月" + day + "日");
                getryt(das,cale.Year);
                w = china_week[$(this).index()];
                day > 0 && loadinfo(day, w);
                $(this).parents('.Calendar').find('td').removeClass('onToday');
                day > 0 && $(this).addClass('onToday');
            });
        }
        function getryt(time,t) {
            $.ajax({
                type: "GET",
                url: "/index.php?m=api&c=index&v=getryt",
                data: {time:time},
                dataType: "json",
                success: function(data){
                    if(data['id']){
                        $('#getryt').html('<div class="item_test" style="height: 460px; width: 623px; overflow: hidden;"><img src='+data['img_url']+'><div class="title"><div class="tit_left">'+data['title']+'</div><div class="tit_right date">'+time+'</div></div>'+data['homecontent']+'</div><a href="/index.php?m=index&c=index&v=rytdetai&id='+data['id']+'" class="more" target="_blank">阅读全文</a>');
                    }else{
                        $('#getryt').html("无内容");
                    }
                }
            });
        }
    </script>
    
    <script type="text/javascript">
        $('.youhua').click(function(event) {
            /* Act on the event */
            var src = $(this).attr('data-src');
            var title = $(this).attr('data-title');
            var name = $(this).attr('data-name');
            var size = $(this).attr('data-size');
            var place = $(this).attr('data-place');
            $('#wpics').attr('src', src);
            $('#wtitle').html("<span>作品：</span> " + title);
            $('#wuser').html("<span>作者：</span> " + name);
            $('#wsize').html("<span>尺寸：</span> " + size);
            $('#wplace').html("<span>写生地点：</span> " + place);
            $('#m-pop1-hlg2').fadeIn();
        });
        $('#m-pop1-hlg2 .close').click(function(event) {
            /* Act on the event */
            $(this).parent('.m-pop1-hlg').fadeOut();
        });
    </script>
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script>
        $(document).ready(function() {
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
          	$('.yhslider').slick({
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
        });
        function follows(bid, obj)
        {
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    $(obj).html('已关注');
                }else if(data.status == 2){
                    $(obj).html('<b>+</b> 关注');
                }
            },"JSON");
        }
      	$('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zan", {
                'id':id
            }, function(data){
                if(data.status == 1){ 
                    $('#zan'+id).html((num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
    </script>
    <!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });
        });
    </script>
    <!-- 弹窗 end-->
    <!-- 日历 -->
    <script type="text/javascript" src="/resource/js/date.js"></script>
</body>
</html>