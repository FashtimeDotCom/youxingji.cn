<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>达人种子招募令</title>
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/swim/aman.css" />
	<script src="resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
	
</head>

<body>
{{include file='public/header.tpl'}}
<div class="main">
	<div class="banner">
		<img src="{{$detail_info.ad_img_url}}" />
	</div>
	<div>
		<div class="title">
			达人种子招募令
		</div>
	</div>
	<div class="items">
		<div class="line">
			<div class="line_title">
				国家信息
			</div>
		</div>
		<div class="box">
			<div class="img-info">
				<div class="content">
					<img src="{{$target_info[0].img_url}}" id="img-src" />
					<div class="posi" alt="">
						{{$detail_info.name}}<em id="City">{{$target_info[0].city}}</em>
					</div>
					<div class="posi_text">
						{{$target_info[0].desc}}
					</div>
				</div>
				<div class="list">
					{{if $target_info}} {{foreach from=$target_info item=items key=kk }}
					<div class="list-box">
						<img src="{{$items.img_url}}" alt="{{$items.city}}" data-desc="{{$items.desc}}" />
					</div>
					{{/foreach}} {{/if}}

				</div>
			</div>
			<div class="user-info">
				<div class="info-left">
					<h1>国家介绍</h1>
					<div class="txt">
						{{$detail_info.desc}}
					</div>
				</div>
				<div class="info-right">
					<div class="user-logo">
						<img src="resource/images/swim/Profile Picture.jpg" />
					</div>
					<div class="txt">
						{{$detail_info.desccibes}}
					</div>
				</div>
			</div>
		</div>
	</div>


{{if $travel_info}}
	<div class="items">
		<div class="line">
			<div class="line_title">
				行程直播
			</div>
		</div>
		<div class="container">
			<div class="waterfall">
				<div class="tip">
					<div class="tips">
						最新动态
					</div>
					<div class="clear">

					</div>
				</div>
				<div class="blank"></div>

				{{if $travel_info}} {{foreach from=$travel_info item=item key=key}}
				<div class="item">
					<div class="user-in">
						<div class="user-head">
							<div class="Head_portrait">
								<img src="{{$item.avatar}}" />
							</div>
							<div class="user-info-box">
								<div class="user_name">
									<div>{{$item.username}}</div>
									<div class="time">2018-5-31</div>
								</div>
								<div class="user-text">{{$item.describes}}</div>
							</div>
						</div>
						<ul class="row">
							{{if $item.content}} {{foreach from=$item.content item=vo key=k}}
							<li><img src="{{$vo}}" /></li>
							{{/foreach}} {{/if}}

						</ul>
						<div class="user-foot">
							<div class="Collection">
								收藏
							</div>
							<div class="cont">
								评论
							</div>
							<div class="share">
								分享
							</div>
						</div>
					</div>

					<!--<div class="foot">
						<div class="form-group1">
							<div class="foot-img">
								<img src="resource/images/swim/Profile Picture.jpg" />
							</div>
							<div class="input">
								<input type="text" name="" id="" value="" />
							</div>
						</div>
						<div class="form-group">
							<div class="btn">
								<input type="button" id="btn" value="评论" />
							</div>
							<div class="clear">

							</div>

						</div>
						<div class="content">
							<div class="face">
								<img src="resource/images/swim/Profile Picture.jpg" />
							</div>
							<div class="list_con">
								<div class="form-text">
									<a target="_blank">用户名：</a>
									一二三四那次一二三四那次一二三四那次一二三四那次一二三四那次一二三四那次一二三四那次一二三四那次
								</div>
								<div class="form-text">
									<div class="WB_from S_txt2">1小时前</div>
								</div>
							</div>

						</div>
						<div class="content">
							<div class="face">
								<a target="_blank"><img alt="扑哧扑哧君" src="//tvax4.sinaimg.cn/crop.0.0.750.750.50/d3c16c9ely8fquoepsxj8j20ku0ku74y.jpg"></a>
							</div>
							<div class="list_con">
								<div class="form-text">
									<a target="_blank">扑哧扑哧君</a>
									<a target="_blank"></a>：这个压缩 有丶猛
								</div>
								<div class="form-text">
									<div class="WB_from S_txt2">2分钟前</div>
								</div>
							</div>
						</div>
						<div class="btn-See">
							<input type="button" id="btn-see" value="查看更多" />
						</div>
					</div> -->

				</div>
				{{/foreach}} {{/if}}

				<div class="Load">
					<div class="load-tips">
						加载更多
					</div>

				</div>
			</div>
		</div>
	</div>

{{/if}}

{{if $travel_log}}
	<div class="items" style="height: 23.875rem;">
		<div class="line">
			<div class="line_title">
				达人游记
			</div>
		</div>
		<div class="warp">
			<div class="warp-img">
				<img src="resource/images/swim/bg1.png" />
			</div>
			<div class="list">
				<div class="list-item">
					<div class="list-left">
						<div>金边 <span>Phnom Penh</span></div>
						<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button" data-url= "" id="" value="查看详情" />
					</div>
					<div class="list-right">
						<img src="resource/images/swim/exploded view1.jpg" />
					</div>
					<div class="clear">

					</div>
				</div>
				<div class="list-item">
					<div class="list-left">
						<div>金边 <span>Phnom Penh</span></div>
						<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button"  id="" value="查看详情" />
					</div>
					<div class="list-right">
						<img src="resource/images/swim/exploded view1.jpg" />
					</div>
					<div class="clear">

					</div>
				</div>
				<div class="list-item">
					<div class="list-left">
						<div>金边 <span>Phnom Penh</span></div>
						<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button" id="" value="查看详情" />
					</div>
					<div class="list-right">
						<img src="http://www.youxingji.cn/uploadfile/image/20180605/152818640766573.jpg" />
					</div>
					<div class="clear">

					</div>
				</div>
			</div>
			<div class="clear">

			</div>
		</div>
		<div class="warp-bg">

		</div>
		<div class="clear">

		</div>
	</div>

{{/if}}


{{if $tv_info}}
	<div class="items">
		<div class="line">
			<div class="line_title">
				达人视频
			</div>
		</div>
		<div class="video-box">
			<ul class="ul-pic1">

			{{if $tv_info }}
			{{foreach from=$tv_info item=item key=key}}
				<li>
					<a class="js-video" href="#m-pop1-hlg" data-src="{{$item.url}}" data-id="41">
						<img src="{{$item.pics}}" alt="">
						<div class="txt">
							<h4>{{$item.title}}</h4>
							<i></i>
						</div>
					</a>
				</li>
			{{/foreach}}
			{{/if}}
			</ul>
		</div>
	</div>


{{/if}}


	<div class="m-pop1-hlg" id="m-pop1-hlg">
		<div class="con1">
			<iframe src='' frameborder=0 'allowfullscreen'></iframe>
			<div class="close js-close"></div>
		</div>
	</div>
</div>

{{include file='public/footer.tpl'}}

<script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/resource/lightbox/jquery.min.js"></script>
<script src="/resource/js/lib.js"></script>
<!--lightbox开始-->
<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
<![endif]-->
<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>

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



<script type="text/javascript">
	$(".cont").click(function() {
		$(this).parent().parent().parent().find(".foot").toggle();
	})
	$(".list-box").click(function(){
	  	$(this).each(function(){
	   		var src=$(this).children("img").attr("src");
	   		var City=$(this).children("img").attr("alt");
	   		var desc=$(this).children("img").data("desc");
	   		$("#img-src").attr('src',src); 
	   		$("#City").text(City);
	   		$(".posi_text").text(desc); 
	  	});
	});
	$(".list-left input").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		})
</script>
</body>

</html>