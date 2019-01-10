<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{vpconfig key="index_seotitle" group="site" default="首页"}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
    <meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
    <meta name="baidu-site-verification" content="ld0Ehp0HHE" />

    <script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/resource/css/style.css?v1" />
    <link rel="stylesheet" href="/resource/css/home.css?v1.2" />
    <link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
    <link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">

    <!--百度统计-->
    <script type="text/javascript">
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
        jQuery(document).ready(function($) {
            $('.lightbox').lightbox();
        });
    </script>
    <link rel="stylesheet" href="/resource/css/public.css" />
    <style type="text/css">
    	.main .banner img{width: 100%;}
    	.index_warp{max-width: 1200px!important;}
    	
    	
    	.index_title{max-width: 1200px!important;}
    	.index_text{max-width: 1200px!important;}
    	.index_text span{background: url(/resource/images/common/right1.png) no-repeat 0.8rem center / 24%!important;}
    	
    	.marginIntial{margin: ;}
    	.evenMore{display: inline-block;width: auto;float: right;}
    	
    	.FreeTour .m_pic1{margin: 0 auto;}
    	
    	/*达人日志*/
    	.ul_txt1{margin: 90px 0px 50px;}
    	.item_left img{margin-bottom: 1rem;}
    	.ul_txt1 .btn_follow{display: block;width: 80px;height: 28px;
						    margin: 0 auto 7px;
						    background: #040000;
						    border-radius: 5px;
						    font-size: 14px;
						    color: #fff;
						    line-height: 28px;
						    text-align: center;
						    -o-transition: .3s;
						    -ms-transition: .3s;
						    -moz-transition: .3s;
						    -webkit-transition: .3s;
						    transition: .3s;}
    	.TalentShowLog .num a{flex-grow: 1;text-align: center;padding-left: .8rem;}
    	.TalentShowLog .num a:nth-child(1) {border-right: 1px solid #E5E5E5;}
		.TalentShowLog .num a:nth-child(2){border-right: 1px solid #E5E5E5;}
		.TalentShowLog .num a:nth-child(3) {border-right: 1px solid #E5E5E5;}
    	
    	/*独家旅行*/
    	.ExclusiveTravel .index_pic{padding-top: .8rem;}
    	.ExclusiveTravel .index_pic .tab{width:8.3%;min-height: auto;}
    	.ExclusiveTravel .index_pic .tab_con{width: 91.7%;}
    	.ExclusiveTravel .index_pic .tab_con .tab_box>div{width: 45.85%;height: auto;}
    	
    	.right_box a:first-child{margin-bottom: 0.65rem;}
    	.right_box_img:first-child{margin-bottom: 0;}
    </style>
</head>
<body>
	{{include file='public/header.tpl'}}
	<div class="main">
		<!--轮播图-->
	    <div class="banner swiper-container">
	        <div class="swiper-wrapper">
	            {{vplist from='ad' item='adlist' tagname='homeslide'}}
	            <div class="swiper-slide"><img src=" {{$adlist.imgurl}}" /></div>
	            {{/vplist}}
	        </div>
	        <div class="swiper-button-next" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
	        <div class="swiper-button-prev" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
	    </div>
	    
	    <!--平台注册数-->
	    <div class="index_warp">
	        <div class="index_box">
	            {{if $traffic.customer_head}}
	            <div class="user_img">
	                {{foreach from=$traffic.customer_head key=key item=item}}
	                <a href="index.php?m=index&c=muser&v=index&id={{$item.uid}}">
	                    <img src=" {{if $item.headpic}}{{$item.headpic}}{{else}}resource/images/img-lb2.png{{/if}}" />
	                </a>
	                {{/foreach}}
	            </div>
	            {{/if}}
	
	            <div class="text-center">平台注册用户共有<span id="user"></span>名,超<span id="Tourist"></span>名游客浏览过<span id="dynamic"></span>条平台动态</div>
	            {{if $traffic.star_head}}
	            <div class="user_img">
	                {{foreach from=$traffic.star_head item=vo key=k}}
	                <a href="index.php?m=index&c=muser&v=index&id={{$vo.uid}}">
	                    <img src=" {{if $vo.headpic}}{{$vo.headpic}}{{else}}resource/images/img-lb2.png{{/if}}" />
	                </a>
	                {{/foreach}}
	            </div>
	            {{/if}}
	        </div>
	    </div>
	    
	    <!--免费游-->
	    <div class="row-a1 FreeTour">
	        <div>
	            <h3 class="index_title">免费游<span>Unique  Tours</span></h3>
	            <div class="index_text">
	                <div class="index_img_box"><img src="/resource/images/1.png"/></div>
	                <a class="evenMore" href="index.php?m=index&c=swim&v=index"><span>更多</span></a>
	                <div class="clear"></div>
	            </div>
	            <div class="m_pic1 swiper-container" id="FreeTour" style="padding-top: 1rem;">
	                <div class="swiper-wrapper"></div>
	            </div>
	        </div>
	    </div>

		<!--达人日志-->
		<input type="hidden" name="uid" id="uid" data-type="1" value="" />
		<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="travel_num" title="共用JS区分的唯一必须值" />
	    <div class="row-a1 TalentShowLog">
	        <div class="wp">
	            <h3 class="index_title marginIntial">达人邦<span>Exciting  Experiences</span></h3>
	            <div class="index_text marginIntial">
	                <div class="index_img_box"><img src="/resource/images/2.png"/></div>
	                <a class="evenMore" href="/index.php?m=index&c=index&v=star"><span>更多</span></a>
	                <div class="clear"></div>
	            </div>
	            <ul class="ul-txt1 ul_txt1 wp">
	                {{foreach from=$starlist item=vo}}
	                <li><div class="con">
	                        <div class="user">
	                            <div class="pic">
	                                <div class="user-info">
	                                    <div class="txt-l">
	                                        <h4>{{$vo.uid|helper:'username'}}</h4>
	                                        <a class="btn_follow" href="javascript:;" onclick="follows({{$vo.uid}},this)" data-val="homePage">{{$vo.uid|helper:'isfollows'}}</a>
	                                        <p><span class="fans">{{$vo.uid|helper:'fansnum'}}</span>粉丝</p>
	                                    </div>
	                                    <div class="txt-r">
	                                        <i class="icon1"></i>
	                                        <i class="icon2"></i>
	                                        <p>{{$vo.uid|helper:'autograph'}}...</p>
	                                    </div>
	                                </div>
	                                <div class="img">
	                                    <a href="{{$vo.uid|helper:'href'}}"><img src=" {{$vo.uid|helper:'avatar'}}" alt=""></a>
	                                </div>
	                            </div>
	                            <div class="txt">
	                                <span>{{$vo.addtime}}</span>
	                                <h4>{{$vo.uid|helper:'username'}}</h4>
	                            </div>
	                        </div>
	                        <div class="det" >
	                            <a class="dis_block" href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</a>
	                        </div>
	                        <dl class="dl-pic1">
	                            {{foreach from=$vo.content item=v}}
	                            <dd><a class="lightbox" href="{{$v}}" rel="list{{$vo.id}}"><img src=" {{$v}}" alt=""></a></dd>
	                            {{/foreach}}
	                        </dl>
	                        <div class="num">
	                            <a class="hideed" href="javascript:;" onclick="collect({{$vo.id}})">收藏</a>
	                            <a class="theory" href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">评论</a>
	                            <a class="spot zan" href="javascript:;" onclick="zan(this,{{$vo.id}})" data-sign="his" data-nature="list" data-val="travel_num">
	                            	<i class="Iclass">{{$vo.topnum}}</i>
	                            </a>
	                            <div class="Read one">{{$vo.shownum}}</div>
	                        </div>
	                    </div>
	                </li>
	                {{/foreach}}
	            </ul>
	
	            {{if $travel_info}}
	            	{{foreach from=$travel_info item=item key=key}}
	            <div class="item" style="height: auto;margin-bottom:0;">
	                <a class="dis_block fix" target="_blank" href="index.php?m=index&c=index&v=travel_detail&id={{$item.id}}">
	                    <div class="item_left" style="width: 65.8%;height: auto;">
	                        <div class="The_label">达人带你去旅行</div>
	                        <img class="img" src="{{$item.thumbfile}}">
	                    </div>
	                    <div class="item_right" style="width: 34.2%;height: auto;">
	                        <div class="content">
	                            <div class="product_name">
	                                <h3>{{$item.title}}</h3>
	                                <span>{{$item.desc}}</span>
	                                <div class="Country"></div>
	                            </div>
	                            <div class="masterinfo">
	                                <div class="headpic"><img src=" {{$item.headpic}}"></div>
	                                <div class="mastertag">
	                                    <div class="mastername">达人—{{$item.username}}</div>
	                                    <ul class="tag">
	                                        {{foreach from=$item.label key=k item=v}}
	                                        <li>{{$v}}</li>
	                                        {{/foreach}}
	                                    </ul>
	                                </div>
	                            </div>
	                            <p class="explain">{{$item.autograph}}</p>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            	{{/foreach}}
	            {{/if}}
	
	            <div class="yhslider">
	                {{vplist from='ad' item='adlist' tagname='homeo2'}}
	                <div class="row-a3 item">
	                    <a href="{{$adlist.linkurl}}" target="_blank"><img style="width: 100%;" src="{{$adlist.imgurl}}"/></a>
	                </div>
	                {{/vplist}}
	            </div>
	        </div>
	    </div>
		
		<!--达人视频-->
	    <div class="row-a5 TalentVideo" style="background-image:url(/resource/images/bg03.jpg);background-size: 100%;">
	        <div class="wp">
	            <h3 class="index_title marginIntial">达人视频<span>Impressed  Video</span></h3>
	            <div class="index_text marginIntial">
	                <div class="index_img_box"><img src="/resource/images/5.png"/></div>
	                <a class="evenMore" href="/index.php?m=index&c=index&v=tv"><span>更多</span></a>
	                <div class="clear"></div>
	            </div>
	            <ul class="ul-pic1">
	                {{foreach from=$tv item=v}}
	                <li><a class="js-video" href="#m-pop1-hlg" data-src="{{$v.url}}" data-id="{{$v.id}}">
	                        <img src="{{$v.pics}}" alt="">
	                        <div class="txt">
	                            <h4>{{$v.title}}</h4>
	                            <i></i>
	                        </div>
	                    </a>
	                </li>
	                {{/foreach}}
	            </ul>
	        </div>
	    </div>
	    
	    <!--达人游记-->
	    <div class="row-a6 TalentTravels">
	        <div class="wp">
	            <h3 class="index_title marginIntial">达人游记<span>Nostalgic  Profiles</span></h3>
	            <div class="index_text marginIntial" style="margin-bottom: 0.3rem;">
	                <div class="index_img_box"><img src="/resource/images/6.png"/></div>
	                <div class="y" style="left: 50%;line-height: 1.1rem;">{{$y}}</div>
	                <a class="evenMore" href="/index.php?m=index&c=index&v=ryt"><span>更多</span></a>
	                <div class="clear"></div>
	            </div>
	            <div class="m-read-qm figure" style="background-image:url(/resource/images/index2.0/ri_bg.png); margin-top: 0px;">
	                <div class="wp">
	                    <ul class="ul-txt1-qm TAB_CLICK" id="tabcon">
	                        {{foreach from=$month_arr item=vo key=k}}
		                        {{if $year == $y}}
		                        	{{if $month >= $k}}
	                        <li class="ls {{if $month == $k}}on{{/if}}" data-month="{{$k}}"><a href="javascript:;">{{$k}}</a></li>
	                        		{{else}}
	                        <li class="no"><a href="javascript:;">{{$k}}</a></li>
	                        		{{/if}}
	                        	{{else}}
	                        <li class="ls {{if $k == 1}}on{{/if}}"><a href="javascript:;">{{$k}}</a></li>
	                        	{{/if}}
	                        {{/foreach}}
	                    </ul>
	                </div>
	                
	                {{foreach from=$list item=vo key=k}}
	                	{{if $year == $y}}
	                <div class="tabcon {{if $month != $k}}dn{{/if}}">
	                    {{else}}
	                <div class="tabcon {{if $k != 1}}dn{{/if}}">
	                	{{/if}}
                        <div class="wp">
                            <ul class="ul-imgtxt3-qm" id="rytlist">
                                {{foreach from=$vo.table item=v key=k}}
                                <li><div class="pic"></div></li>
                                {{/foreach}}
                                
                                {{foreach from=$vo.time item=v key=k}}
                                	{{if $v.status == 0}}
                                <li><div class="pic"><i class="icon1">{{$v.days}}</i></div></li>
                                	{{else}}
                                <li><div class="pic">
                                        <a href="/index.php?m=index&c=index&v=rytdetai&id={{$v.id}}">
                                            <img src="{{$v.pics}}" alt="">
                                            <i>{{$v.days}}</i>
                                            <div class="txt"><span>{{$v.keyword}}</span></div>
                                        </a>
                                    </div>
                                </li>
                                	{{/if}}
                                {{/foreach}}
                                
                                {{foreach from=$vo.other item=v key=k}}
                                <li><div class="pic"></div></li>
                                {{/foreach}}
                            </ul>
                        </div>
                    </div>
                    {{/foreach}}
	            </div>
                    
	            <div class="h81"></div>
	        </div>
	    </div>
	    
	    <!--独家旅行-->
	    <div class="row-a2 ExclusiveTravel">
	        <div class="wp">
	            <h3 class="index_title marginIntial">独家旅行<span>Tailored  Planet</span></h3>
	            <div class="index_text marginIntial">
	                <div class="index_img_box"><img src="/resource/images/3.png"/></div>
	                <a class="evenMore" href="javascript:void(0)"><span>更多</span></a>
	                <div class="clear"></div>
	            </div>
	            <div class="index_pic">
	                <div class="tab" id="tab">
	                    <ul class="tab_list">
	                        {{if $label_list}}
	                        	{{foreach from=$label_list item=item key=key}}
	                        <li class="{{if $key==0}}onn{{/if}}">{{$item.name}}</li>
	                        	{{/foreach}}
	                        {{/if}}
	                    </ul>
	                </div>
	                <div class="tab_con">
	                    {{if $journey_info }}
	                    	{{foreach from=$journey_info item=item key=key}}
	                    <div class="tab_box {{if $key !=0}}hide{{/if}}">
	                        <div class="tab_box_left"><img src="{{$item.pics}}" /></div>
	                        <div class="tab_box_right">
	                            <h3>{{$item.title}}</h3>
	                            <span class="apostrophe" style="display: block;margin-bottom: 0.3rem;">{{$item.desc}}</span> {{if $item.info}}
	
	                            <div class="right_box" style="width: 100%;">
	                                {{if $item.info[0]}}
	                                <a class="dis_block" href="index.php?m=index&c=index&v=journeydetail&id={{$item.info[0].id}}">
	                                    <div class="right_box_img one">
	                                        <img src=" {{$item.info[0].tjpic}}" />
	                                        <div class="right_box_text one_text">
	                                            <p>{{$item.info[0].title}}</p>
	                                            <p>{{$item.info[0].description}}</p>
	                                        </div>
	                                    </div>
	                                </a>
	                                {{/if}}
	
	                                {{if $item.info[1]}}
	                                <a href="index.php?m=index&c=index&v=journeydetail&id={{$item.info[1].id}}">
	                                    <div class="right_box_img two">
	                                        <img src=" {{$item.info[1].tjpic}}" />
	                                        <div class="right_box_text two_text">
	                                            <p>{{$item.info[1].title}}</p>
	                                            <p>{{$item.info[1].description}}</p>
	                                        </div>
	                                    </div>
	                                </a>
	                                {{/if}}
	                            </div>
	                            {{/if}}
	                        </div>
	                    </div>
	                    	{{/foreach}}
	                    {{/if}}
	                </div>
	            </div>
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
	</div>
	
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
	    var swiper1 = new Swiper('.banner', {
	        speed: 3000,
	        autoplay: {
	            delay: 3000
	        },
	        loop: true,
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        },
	   	});

		var host = window.location.host;

		//免费游 加载
	    var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';
	    var data = {
	        type: "pc"
	    }
	    $.ajax({
	        url: src,
	        data: data,
	        type: "GET",
	        success: function(data) {
	            var sdata = JSON.parse(data);
	            var html = '';
	            for(i in sdata) {
	                html += "<div class='swiper-slide'data-id=" + sdata[i].id + "><a class='dis_block' href=" + sdata[i].linkurl + "><img src=" + sdata[i].url + " /></a></div>"
	            }
	            $("#FreeTour .swiper-wrapper").append(html);
	            $(".item_right").css({"height":$(".item_left img").height()});
	            var swiper2 = new Swiper('#FreeTour', {
			    		observer:true,
		    			observeParents:true,
			            slidesPerView: 2,
			            centeredSlides: true,
			            spaceBetween: 30,
			            loop: true,
			        });
	        }
	    });

		$(document).ready(function(){
	        var $asd = $(".tab_list li");
	        $asd.click(function() {
	            $(this).addClass("onn").siblings().removeClass("onn");
	            var $index = $asd.index(this);
	            var $content = $(".tab_con .tab_box");
	            $content.eq($index).show().siblings().hide();
	        });
	    
		    $(".num .theory").click(function() {
		        layer.msg('功能正在开发，敬请期待');
		    });
	
			//独家旅行  切换
			var overallHeight=0;
			var length = $(".tab_list li").length;
			var imgHeight = $(".tab_box_left").height();
			
			for(var i=0;i<=length;i++){
				var Height = $(".tab_list").children("li").eq(i).height();
				overallHeight=overallHeight+Height;
			}
			$("#tab").css({ "height":imgHeight });
			
			//达人游记  月份切换
		    $("#tabcon li").click(function() {
		        var day = $(this).attr('data-month');
		        var url = "//" + host + '/' + 'index.php?m=api&c=index&v=getryt_list&month=' + day;
		        $.ajax({
		            url: url,
		            type: "GET",
		            success: function(res) {
		                var data = JSON.parse(res);
		                $("#rytlist").html('');
		                var html = '';
		                for(i in data) {
		                    html += "<li><div class='pic' data-status=" + data[i].status + "><a href=/index.php?m=index&c=index&v=rytdetai&id=" + data[i].id + "><img src=" + data[i].pics + "><i>" + data[i].days + "</i><div class='txt'><span>" + data[i].keyword + "</span></div></a></div></li>"
		                }
		                $("#rytlist").append(html);
		                changes();
		            }
		        })
		    });
		    function changes(){
		        $("#rytlist li").each(function() {
		            var statu = $(this).find(".pic").data('status');
		            if(statu == 0) {
		                $(this).find(".pic").html('');
		            }
		        });
		    }
	   	});
	</script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
	<script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	
	<!--以下为首页 顶部轮播图 的数字  动态自增效果-->
	<script src="/resource/js/lib/countUp.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	        var options = {
	            useEasing: true,
	            useGrouping: true,
	            separator: ',',
	            decimal: '.',
	            prefix: '',
	            suffix: ''
	        };
	        var src = "//" + host + '/' + 'index.php?m=api&c=traffic&v=get_traffic';
	        $.ajax({
	            url: src,
	            type: "GET",
	            dataType: "json",
	            success: function(res) {
	                var data = res.data;
	                var userval = data.customer_num;
	                var Touristval = data.visit_num;
	                var dynamicval = data.platform_num;
	                var user = new CountUp("user", 0, userval, 0, 2.5, options);
	                var Tourist = new CountUp("Tourist", 0, Touristval, 0, 2.5, options);
	                var dynamic = new CountUp("dynamic", 0, dynamicval, 0, 2.5, options);
	                user.start();
	                Tourist.start();
	                dynamic.start();
	            }
	        });
	   	});
	</script>
</body>
</html>