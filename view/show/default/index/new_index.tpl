<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>{{vpconfig key="index_seotitle" group="site" default="首页"}}_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
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
	<link rel="stylesheet" href="/resource/css/new_index.css" />
</head>
<body>
	{{include file='public/header.tpl'}}
	<div class="main">
		<!--首页顶部轮播图-->
		<div class="banner swiper-container" id="bannerSwiper1">
			<div class="swiper-wrapper">
				{{vplist from='ad' item='adlist' tagname='homeslide'}}
				<div class="swiper-slide"><img src=" {{$adlist.imgurl}}" /></div>
				{{/vplist}}
			</div>
			<div class="swiper-button-next" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
			<div class="swiper-button-prev" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
		</div>
		
		<!--轮播图 下的 平台注册用户-->
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

				<div class="text-center">
					平台注册用户共有<span id="user"></span>名,超<span id="Tourist"></span>名游客浏览过<span id="dynamic"></span>条平台动态
				</div>
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

		<!--达人邦-->
		<div class="row-a1 TalentState" style="padding: 25px 0px;">
			<div class="wp">
				<div class="divtitle fix">
					<h3 class="index_title">达人邦</h3>
					<a class="andMore" href="/index.php?m=index&c=index&v=new_star">
						<span>更多</span>
						<img class="icon" src="/resource/images/common/right1.png"/>
					</a>
				</div>
				
				<div class="s2 fix">
					<div class="s2_content ParentElement">
						{{foreach from=$tj_star item=item key=key}}
						<a class="dis_block item{{$key+1}} fix" href="/index.php?m=index&c=muser&v=index&id={{$item.uid}}">
							<div class="picture figure" style="background-image: url({{$item.tjpic}});"></div>
							<div class="message">
								<p class="name"><span>{{$item.username}}</span></p>
								<input type="hidden" class="value{{$key+1}}" value="{{$item.autograph}}" />
								<p class="text"></p>
							</div>
						</a>
						{{/foreach}}
					</div>
				</div>
			</div>
		</div>

		<!--达人日志-->
		<input type="hidden" name="uid" id="uid" data-type="1" value="" />
		<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="travel_num" title="共用JS区分的唯一必须值" />
		<div class="row-a1 TalentShowLog" style="padding: 16px 0px;">
			<div class="wp">
				<div class="divtitle fix">
					<h3 class="index_title">达人日志</h3>
					<a class="andMore" href="/index.php?m=index&c=index&v=star">
						<span>更多</span>
						<img class="icon" src="/resource/images/common/right1.png"/>
					</a>
				</div>
				<ul class="ul-txt1 divClear" style="margin: 0px 0px 50px;">
					{{foreach from=$starlist item=vo}}
					<li><div class="con" style="padding: 10px 29px 0px;">
							<div class="user fix">
								<div class="pic" style="margin-top: 0px;">
									<div class="user-info" style="top: 60px;">
										<div class="txt-l">
											<h4>{{$vo.uid|helper:'username'}}</h4>
											<a class="btn-follow" href="javascript:;" onclick="follows({{$vo.uid}},this)" data-val="homePage">{{$vo.uid|helper:'isfollows'}}</a>
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
								<div class="txt" style="margin-top: 50px;">
									<span>{{$vo.addtime}}</span>
									<h4>{{$vo.uid|helper:'username'}}</h4>
								</div>
							</div>
							<div class="det" >
								<p data-src="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</p>
							</div>
							<dl class="dl-pic1">
								{{foreach from=$vo.content item=v}}
								<dd><a class="lightbox" href="{{$v}}" rel="list{{$vo.id}}"><img src=" {{$v}}" alt=""></a></dd>
								{{/foreach}}
							</dl>
							<div class="bottom">
								<div class="collect" onclick="collect({{$vo.id}})"><em class="smallIcon"></em>收藏</div>
								<div class="review"><a href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}"><em class="smallIcon"></em>评论</a></div>
								<div class="zan" onclick="zan(this,{{$vo.id}})" data-sign="his" data-nature="list" data-val="travel_num">
									<a href="javascript:;">
										<em class="smallIcon"></em><i class="Iclass">{{$vo.topnum}}</i>
									</a>
								</div>
								<div class="check"><em class="smallIcon"></em>{{$vo.shownum}}</div>
							</div>
						</div>
					</li>
					{{/foreach}}
				</ul>

				<div class="yhslider">
					{{vplist from='ad' item='adlist' tagname='homeo2'}}
					<div class="row-a3 item" style="max-width: none;margin-bottom: 0.35rem;height:auto;">
						<a href="{{$adlist.linkurl}}" target="_blank"><img style="width: 100%;" src="{{$adlist.imgurl}}"/></a>
					</div>
					{{/vplist}}
				</div>
			</div>
		</div>

		<!--达人视频-->
		<div class="row-a5 TalentVideo">
			<div class="wp">
				<div class="divtitle fix">
					<h3 class="index_title">达人视频</h3>
					<a class="andMore" href="/index.php?m=index&c=index&v=tv">
						<span>更多</span>
						<img class="icon" src="/resource/images/common/right1.png"/>
					</a>
				</div>
				<ul class="ul-pic1" style="margin: 25px 0 33px;">
					{{foreach from=$tv item=v}}
					<li><a href="/index.php?m=index&c=index&v=tv_detail&id={{$v.id}}">
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
				<div class="divtitle fix">
					<h3 class="index_title">达人游记</h3>
					<div class="y">{{$y}}</div>
					<a class="andMore" href="/index.php?m=index&c=travelnote&v=note_list">
						<span>更多</span><img class="icon" src="/resource/images/common/right1.png"/>
					</a>
				</div>
				<div class="m-read-qm">
					<div class="wp">
						<ul class="ul-txt1-qm TAB_CLICK" id="tabcon">
							{{foreach from=$month_arr item=vo key=k}}
								{{if $year == $y}}
									{{if $month >= $k}}
							<li class="ls {{if $month == $k}}on{{/if}}"><a href="javascript:;">{{$k}}</a></li>
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
					{{/foreach}}
					</div>
				</div>
			</div>
		</div>
		
		<!--独家旅行-->
		<div class="row-a2 fix ExclusiveTravel">
			<div class="wp">
				<div class="divtitle fix">
					<h3 class="index_title">独家旅行</h3>
					<div class="tab_list" style="float: left;">
						<span class="button path onn">独家路线</span>
						<span class="button">私人订制</span>
					</div>
					<a class="andMore" href="/index.php?m=index&c=article&v=new_list">
						<span>更多</span><img class="icon" src="/resource/images/common/right1.png"/>
					</a>
				</div>
				<div class="index_pic">
					<!--独家路线-->
					<div class="tab_box">
						{{foreach from=$journey_info key=key item=item}}
							{{if $key==0}}
						<a class="box1 figure borderRadius" style="background-image: url({{$item.articlethumb}});" href="/index.php?m=index&c=index&v=journeydetail&id={{$item.id}}">
							<div class="details">
								<p class="matter apostrophe">{{$item.title}}</p>
								<p class="price"><i class="Iclass">{{$item.price}}</i>元/位</p>
							</div>
						</a>
							{{else}}
						<a class="box2" href="/index.php?m=index&c=index&v=journeydetail&id={{$item.id}}">
							<div class="cove figure borderRadius" style="background-image: url({{$item.articlethumb}});"></div>
							<div class="details">
								<p class="matter omit lineNumber2">{{$item.title}}</p>
								<p class="price"><i class="Iclass">{{$item.price}}</i>元/位</p>
							</div>
						</a>
							{{/if}}
						{{/foreach}}
					</div>
					
					<!--私人订制-->
					<div class="tab_box dis_none">
						<div class="left">
							<div class="banner swiper-container" id="bannerSwiper2">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="playbill figure borderRadius" style="background-image: url(http://p4-q.mafengwo.net/s12/M00/C1/67/wKgED1vkrlWAB8EuAAfUY7hzkbk11.jpeg?imageMogr2%2Fstrip);"></div>
									</div>
									<div class="swiper-slide">
										<div class="playbill figure borderRadius" style="background-image: url(http://p1-q.mafengwo.net/s12/M00/C1/36/wKgED1vkrUCACJPHAAXCyjIgN0Q03.jpeg?imageMogr2%2Fstrip);"></div>
									</div>
									<div class="swiper-slide">
										<div class="playbill figure borderRadius" style="background-image: url(http://n3-q.mafengwo.net/s12/M00/59/E5/wKgED1vkGrGAXmzRABqE1hx-wk423.jpeg?imageMogr2%2Fstrip);"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="right">
							<h3 class="caption"><span>开启定制之旅</span></h3>
							<div class="box">
								<input class="matter destination" type="text" name="" id="destination" maxlength="300" value="" placeholder="目的地" />
								<input class="matter name" type="text" name="" id="name" maxlength="20" value="" placeholder="姓名" />
								<input class="matter PhoneNum" type="number" name="" id="PhoneNum" value="" placeholder="手机号码" onkeyup="judgeIsNonNull1(event)" />
								<input class="matter destination" type="text" name="remark" id="remark" maxlength="300" value="" placeholder="备注(可选填)" />
								<a class="submitInfo" href="javascript:;">提交信息</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{include file='public/footer.tpl'}}

	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		//首页轮播图
		var swiper1 = new Swiper('#bannerSwiper1', {
				autoplay: true,//可选选项，自动滑动
				speed: 3000,
				loop: true,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			});
		
		//独家旅行-私人订制
		var swiper2 = new Swiper('#bannerSwiper2', {
				observer:true,
				observeParents:true,
				autoplay: true,//可选选项，自动滑动
				speed: 3000,
				loop: true,
			});

		//达人日志跳转日志详情页
		$(".det p").click(function() {
			var str=$(this).data("src");
			window.location.href=str;
		});
		
		$(".num .theory").click(function() {
			layer.msg('功能正在开发，敬请期待');
		});

		//独家旅行-菜单切换
		$(".button").on("click",function(){
			var index = $(this).index();
			$(this).addClass("onn").siblings().removeClass("onn");
			$(".index_pic .tab_box").eq(index).removeClass("dis_none").siblings().addClass("dis_none");
		});
		
		
		//控制  私人订制 电话号码的长度
		function judgeIsNonNull1(event){
			var value=$("#PhoneNum").val();
			var x = event.which || event.keyCode;
			if( value.length <= 50 ){
				//console.log("符合50位数以内");
			}
			else{
				return $("#PhoneNum").val(value.substr(0, 50));
			}
		}
		
		//实时监听输入框值的改动
		$("#PhoneNum").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
		
		//提交 私人订制
		$(".submitInfo").on("click",function(){
			var destination = $("#destination").val();
			var name = $("#name").val();
			var PhoneNum = $("#PhoneNum").val();
			var remark = $("#remark").val();
			if( destination == "" ){
				layer.msg('请输入目的地！');
				return false;
			}else if(destination.replace(/(^\s*)|(\s*$)/g, "")==""){
				layer.msg('目的地栏不能只输入空格！');
				return false;
			}
			
			if( name == "" ){
				layer.msg('请输入姓名！');
				return false;
			}else if(name.replace(/(^\s*)|(\s*$)/g, "")==""){
				layer.msg('姓名栏不能只输入空格！');
				return false;
			}
			
			var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
			if( PhoneNum == "" ){
				layer.msg('请输入电话号码！');
				return false;
			}else if(PhoneNum.replace(/(^\s*)|(\s*$)/g, "")==""){
				layer.msg('手机号码框不能只输入空格！');
				return false;
			}else if (!reg.test(PhoneNum)) {
            	layer.msg('请输入正确的手机号码！');
            	return false;
        	}
			
			if( remark != "" ){
				if(remark.replace(/(^\s*)|(\s*$)/g, "")==""){
					remark="";
				}
			}
			
			$.post("/index.php?m=api&c=index&v=private_custom", {
				'address':destination,
				'username':name,
				'mobile':PhoneNum,
				'remark':remark,
			}, function(data){
				layer.msg(data.tips);
			},"JSON");
		});
	</script>
	<script type="text/javascript" src="/resource/js/jianjie.js" title="简介"></script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
	<script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<!-- 日历 -->
	<script type="text/javascript">
		//达人游记  日历
		var host = window.location.host;
		$("#tabcon li ").click(function() {
			var day = $(this).text();
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
			});
		});

		function changes(){
			$("#rytlist li").each(function() {
				var statu = $(this).find(".pic").data('status');
				if(statu == 0) {
					$(this).find(".pic").html('');
				}
			});
		}

		var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';
		var data = {
			type: "pc"
		}
		$.ajax({
			url: src,
			data: data,
			type: "GET",
			success: function(data){
				var sdata = JSON.parse(data);
				var html = '';
				for(i in sdata) {
					html += "<div class='swiper-slide'data-id=" + sdata[i].id + "><a href=" + sdata[i].linkurl + "><img src=" + sdata[i].url + " /></a></div>"
				}
				$("#swim").append(html);
				var swiper1 = new Swiper('.m-pic1', {
					slidesPerView: 'auto',
					centeredSlides: true,
					initialSlide: 1,
					loop: true,
					spaceBetween: 30,
				});
			}
		});
	</script>
	
	<!--以下为首页 顶部轮播图 的数字  动态自增效果-->
	<script src="/resource/js/lib/countUp.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function() {
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