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
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/m/css/m.css" />
	<script src="/resource/js/move_rem.js"></script>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/m/js/lib.js"></script>
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
	<link rel="stylesheet" href="/resource/m/css/new_index.css" />
</head>
<body class="index">
	<div class="header">
		<div class="logo"><a href=""><img src="/resource/m/images/logo.png" alt="" /></a></div>
		{{if !$user}}
		<a href="/index.php?m=wap&c=index&v=login" class="sign">登录</a>
		{{else}}
		<a href="/index.php?m=wap&c=user&v=index" class="sign">会员</a>
		{{/if}}
		<div class="so">
			<form action="/index.php">
				<input type="hidden" name="m" value="wap" />
				<input type="hidden" name="c" value="index" />
				<input type="hidden" name="v" value="search" />
				<input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
				<input type="submit" value="" class="sub" />
			</form>
		</div>
	</div>
	<div class="mian" style="margin-top: 0px;">
		<!--顶部轮播图-->
		<div class="banner swiper-container" id="bannerSwiper1">
			<div class="swiper-wrapper">
				{{vplist from='ad' item='adlist' tagname='waphomeslide'}}
				<div class="swiper-slide">
					<a href="{{$adlist.linkurl}}">
						<div class="pic"><img src="{{$adlist.imgurl}}" alt="" /></div>
					</a>
				</div>
				{{/vplist}}
			</div>
			<div class="swiper-pagination" id="pagination1"></div>
			<div class="wp"><div class="txt"></div></div>
		</div>
		
		<!--菜单-->
		<ul class="ul-imgtxt1" style="padding-top: 27px;">
			<li><a href="index.php?m=wap&c=swim&v=index">
					<i style="background-image: url(/resource/m/images/q-icon01.png);"></i>
					<span>免费游</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=master_list">
					<i style="background-image: url(/resource/m/images/q-icon15.png);"></i>
					<span>达人邦</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=star">
					<i style="background-image: url(/resource/m/images/q-icon20.png);"></i>
					<span>达人日志</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=tv">
					<i style="background-image: url(/resource/m/images/q-icon17.png);"></i>
					<span>达人视频</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=ryt">
					<i style="background-image: url(/resource/m/images/q-icon18.png);"></i>
					<span>达人游记</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=faq&v=index">
					<i style="background-image: url(/resource/m/images/q-icon54.jpg);"></i>
					<span>达人问答</span>
				</a>
			</li>
			<li><a href="javascript:;">
					<i style="background-image: url(/resource/m/images/q-icon53.jpg);"></i>
					<span>成为达人</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=journey&v=index">
					<i style="background-image: url(/resource/m/images/q-icon14.png);"></i>
					<span>独家旅行</span>
				</a>
			</li>
		</ul>
		
		<!--达人邦-->
		<article class="article">
			<h3 class="title">达人邦 <a class="dis_block fix" style="float: right;" href="/index.php?m=wap&c=index&v=master_list"><span>更多<i></i></span></a></h3>
			<div class="m_item_a1 swiper-container" id="bannerSwiper2">
				<div class="swiper-wrapper" id="drb">
					{{if $tjstar}}
					{{foreach from=$tjstar key=key item=item}}
					<div class="swiper-slide">
						<a class="dis_block fix" href="index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
							<div class="pic figure" style="background-image: url(http://www.youxingji.cn/{{$item.avatar}});border-radius: 0;">
								<div class="txt">{{$item.username}}</div>
							</div>
							<address class="address">{{$item.city}}</address>
							<div class="text">{{$item.autograph}}</div>
						</a>
					</div>
					{{/foreach}}
					{{/if}}
				</div>
			</div>
		</article>
		
		<!--达人日志-->
		<article class="article">
			<h3 class="title">达人日志 </h3>
			{{if $travel_list}}
			{{foreach from=$travel_list key=key item=item}}
			<div class="d_item">
				<section class="other">
					<article class="user">
						<a class="headPortrait figure" style="background-image: url({{$item.user_info.headpic}});" href="index.php?m=wap&c=muser&v=index&id={{$item.uid}}"></a>
						<aside>
							<h4>{{$item.user_info.username}}</h4>
							<time class="logTime">{{$item.addtime}}</time>
						</aside>
					</article>
				</section>
				<div class="txt">{{$item.describes}}</div>
				<dl class="list-img list_img">
					{{foreach from=$item.content item=v}}
					<dd><a href="{{$v}}" class="lightbox figure" rel="list{{$item.id}}" style="background-image: url({{$v}});"></a></dd>
					{{/foreach}}
				</dl>
				<section class="other fix">
					<div class="interact log fix">
						<span class="Read"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><b>{{$item.shownum}}</b></span>
						<span class="spot zan" onclick="zan(this,{{$item.id}})" data-classes="travel_num" data-nature="list">
							<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><b>{{$item.topnum}}</b>
						</span>
						<span class="theory"><img class="icon_review" src="/resource/m/images/common/icon_review.png" /><b></b>评论</span>
					</div>
				</section>
			</div>
			{{/foreach}}
			{{/if}}
			<div class="box_btn">
				<input type="button" class="btn" id="" value="查看更多" onclick="location.href='{{$_pathroot}}/index.php?m=wap&c=index&v=star'" />
			</div>
		</article>
		
		<!--中部导航-->
		<div class="m-imgtxt1 swiper-container" id="bannerSwiper3">
			<div class="swiper-wrapper" id="swim">
				{{vplist from='ad' item='adlist' tagname='waphomeo2'}}
				<div class='swiper-slide' data-id="">
					<a class="dis_block fix" href="{{$adlist.linkurl}}">
						<div class='pic'>
							<img src="{{$adlist.imgurl}}" alt=''>
							<div class='txt'></div>
						</div>
					</a>
				</div>
				{{/vplist}}
			</div>
			<div class="swiper-pagination" id="pagination3"></div>
		</div>
		
		<!--达人视频-->
		<article class="article">
			<h3 class="title">达人视频 <a class="dis_block fix" style="float: right;" href="index.php?m=wap&c=index&v=tv"><span>更多<i></i></span></a></h3>
			<div class="flex-video" style="width: 100%;">
				{{if $tv_list}}
				{{foreach from=$tv_list key=key item=item}}
				<div class="video">
					<a href="javascript:;" class="js-video" data-src="{{$item.url}}" data-id="{{$item.id}}">
						<div class="pic figure" style="background-image: url(http://www.youxingji.cn{{$item.pics}});"></div>
						<div class="txt">{{$item.title}}</div>
					</a>
				</div>
				{{/foreach}}
				{{/if}}
			</div>
		</article>
		
		<!--达人游记-->
		<article class="article fix note">
			<h3 class="title">达人游记 <a class="dis_block fix" style="float: right;" href="index.php?m=wap&c=index&v=ryt"><span>更多<i></i></span></a></h3>
			<section class="y_item">
				<a href="index.php?m=wap&c=index&v=rytdetai&id={{$info.id}}">
					<div><img src="{{$info.img_url}}"></div>
					<h4>{{$info.title}}</h4>
					<p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;">{{$info.desc}}</span></p>
				</a>
			</section>
			<section class="other" style="padding: 0 0.5rem;">
				<article class="user" style="float: left;">
					<a class="headPortrait figure" style="background-image: url({{$info.user_info.headpic}});" href="index.php?m=wap&c=muser&v=index&id={{$info.id}}"></a>
					<aside>
						<h4>{{$info.user_info.username}}</h4>
						<time>{{$info.time.hour}}点{{$info.time.min}}分</time>
					</aside>
				</article>
				<article class="interact travels">
					<span class="Read"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><b>{{$info.show_num}}</b></span>
					<span class="spot zan" onclick="zan(this,{{$info.id}})" data-classes="note_num" data-nature="list">
						<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><b>{{$info.top_num}}</b>
					</span>
					<span class="theory "><img class="icon_review" src="/resource/m/images/common/icon_review.png" /><b></b>评论</span>
				</article>
			</section>
		</article>

		<!--独家旅行-->
		<article class="article">
			<h3 class="title">独家旅行
				<ul class="tab_list">
					<li class="onn">独家路线</li>
					<li>私人订制</li>
				</ul>
			</h3>
			<div class="tab_con">
				<div class="tab_box">
					<ul class="exclusive box_list fix">
						<li class="on">达人带你去旅行</li>
						<li>名师带你去写生</li>
						<li>佛系旅行</li>
						<li>其他路线</li>
					</ul>
					<div class="con_list">
						<div class="con_list_box ">
							{{if $travel}}
							{{foreach from=$travel item=item key=key}}
							<div class="">
								<a href="index.php?m=wap&c=index&v=travel_detail&id={{$item.id}}">
									<img src="{{$item.thumbfile}}">
									<p>{{$item.title}}<span>￥{{$item.price}}</span></p>
								</a>
							</div>
							{{/foreach}}
							{{/if}}
						</div>
	
						<div class="con_list_box " style="display: none;">
							{{if $sketch}}
							{{foreach from=$sketch key=key item=item}}
							<div class="">
								<a href="index.php?m=wap&c=index&v=sketch_detail&id={{$item.id}}">
									<img src="{{$item.thumbfile}}">
									<p>{{$item.title}}<span>￥{{$item.price}}</span></p>
								</a>
							</div>
							{{/foreach}}
							{{/if}}
						</div>
	
						<div class="con_list_box " style="display: none;">
							{{if $sketch}}
							{{foreach from=$sketch key=key item=item}}
							<div class="">
								<a href="index.php?m=wap&c=index&v=sketch_detail&id={{$item.id}}">
									<img src="{{$item.thumbfile}}">
									<p>333{{$item.title}}<span>￥{{$item.price}}</span></p>
								</a>
							</div>
							{{/foreach}}
							{{/if}}
						</div>
	
						<div class="con_list_box " style="display: none;">
							{{if $sketch}}
							{{foreach from=$sketch key=key item=item}}
							<div class="">
								<a href="index.php?m=wap&c=index&v=sketch_detail&id={{$item.id}}">
									<img src="{{$item.thumbfile}}">
									<p>444{{$item.title}}<span>￥{{$item.price}}</span></p>
								</a>
							</div>
							{{/foreach}}
							{{/if}}
						</div>
					</div>
				</div>
	
				<div class="tab_box" style="padding-bottom: 10px;display: none;">
					<div class="con_list">
						<div class="con_list_box">
							<img src="/resource/m/images/homepage_private.png">
							<input class="matter destination" type="text" name="" id="destination" maxlength="300" value="" placeholder="目的地" />
							<input class="matter name" type="text" name="" id="name" maxlength="20" value="" placeholder="姓名" />
							<input class="matter PhoneNum" type="number" name="" id="PhoneNum" value="" placeholder="电话号码" onkeyup="judgeIsNonNull1(event)" />
							<button class="submitInfo">提交信息</button>
						</div>
					</div>
				</div>
			</div>
		</article>
		
		<!--关于我们-->
		<article class="article asFor dis_none">
			<h3 class="title">关于我们 <a class="dis_block fix" style="float: right;" href="/index.php?m=wap&c=aboutus&v=index"><span>更多<i></i></span></a></h3>
			<div class="flex-video" style="width: 100%;">
				<div class="left">
					<a class="dis_block diamonds figure" href="/index.php?m=wap&c=aboutus&v=detail" style="background-image: url(/resource/m/images/bg-register.jpg);">
						<div class="txt">标题标题标题</div>
					</a>
				</div>
				<div class="right">
					<a class="dis_block diamonds figure" href="/index.php?m=wap&c=aboutus&v=detail" style="background-image: url(/resource/m/images/pic-yz5.jpg);">
						<div class="txt">标题标题标题</div>
					</a>
					<a class="dis_block diamonds figure" href="/index.php?m=wap&c=aboutus&v=detail" style="background-image: url(/resource/m/images/q-pic13.jpg);">
						<div class="txt">标题标题标题</div>
					</a>
				</div>
			</div>
		</article>
		
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz"><div class="con"><div class="close js-close"><span></span></div></div></div>
        <!-- end -->
        
		<a href="http://p.qiao.baidu.com/cps/chat?siteId=11959315&userId=25533377" class="g-consultation"><i></i>免费咨询</a>
	</div>
	
	{{include file='wap/footer.tpl'}}
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		var swiper1 = new Swiper('#bannerSwiper1', {
				slidesPerView: 1,
				loop: true,
				pagination: {
					el: '#pagination1',
					clickable: true
				}
			});

		var swiper2 = new Swiper('#bannerSwiper2', {
				slidesPerView: 1.6,
				initialSlide: 1,
				//loop: true,
				spaceBetween: 15,
			});
		
		var swiper3 = new Swiper('#bannerSwiper3', {
				pagination: {
					el: '#pagination3',
					clickable: true
				},
			});
	</script>

	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript">
		//控制  私人订制 电话号码的长度
		function judgeIsNonNull1(event){
			var value=$("#PhoneNum").val();
			var x = event.which || event.keyCode;
			if( value.length <= 50 ){
				//console.log("符合80位数以内");
			} else{
				return $("#PhoneNum").val(value.substr(0, 50));
			}
		}
		
		//实时监听输入框值的改动
		$("#PhoneNum").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
		
		$(document).ready(function() {
			//提交 私人订制
			$(".submitInfo").on("click",function(){
				var destination = $("#destination").val();
				var name = $("#name").val();
				var PhoneNum = $("#PhoneNum").val();
				if( destination == "" ){
					layer.msg('请输入目的地！');
					return false;
				}else if(destination.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('目的地不能只输入空格！');
					return false;
				}
				
				if( name == "" ){
					layer.msg('请输入姓名！');
					return false;
				}else if(name.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('目的地不能只输入空格！');
					return false;
				}
				if( PhoneNum == "" ){
					layer.msg('请输入电话号码！');
					return false;
				}else if(PhoneNum.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('目的地不能只输入空格！');
					return false;
				}
				
				$.post("", {
					'destination':destination,
					'name':name,
					'PhoneNum':PhoneNum,
				}, function(data){
					layer.msg(data.tips);
					layer.msg("测试提交成功！");
				},"JSON");
			});

			$(".other .theory,.other .hideed,.num .hideed").on("click",function() {
				layer.msg('功能正在开发，敬请期待');
			});
			
			//独家旅行
			var cut1 = $(".tab_list li");
			cut1.click(function() {
				$(this).addClass("onn").siblings().removeClass("onn");
				var $index = $(this).index();
				var $content = $(".tab_con .tab_box");
				$content.eq($index).show().siblings().hide();
			});
			var cut2 = $(".box_list li");
			cut2.click(function(e) {
				$(this).addClass("on").siblings().removeClass("on");
				var $index = $(this).index();
				var $content=$(this).parent().next().find('.con_list_box');
				$content.eq($index).show().siblings().hide();
			});
			
			bind_td();
			var host = window.location.host;
			//var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';
		});
	</script>
</body>
</html>