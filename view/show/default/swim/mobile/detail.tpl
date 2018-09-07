<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>行程直播</title>
		<link rel="stylesheet" type="text/css" href="/resource/m/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/swim/swim.css" />

		<script src="/resource/js/move_rem.js" type="text/javascript" charset="utf-8"></script>
		<script src="/resource/lightbox/jquery.min.js"></script>
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
	</head>

	<body>
		<input type="hidden" name="activity_id" id="activity_id" value="{{$activity_id}}">
		<input type="hidden" name="page" id="page" value="2" />
		<div class="header">
			{{include file='wap/header.tpl'}}
			<h3>行程直播</h3>
			<div class="g-top">
				<div class="logo">
					<a href="/"><img src="/resource/m/images/logo.png" alt="" /></a>
				</div>
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
		</div>
		<div class="main">
			<div class="item">
				<div class="banna">
					<img src="{{$detail_info.ad_img_url}}" />
				</div>
				<div class="Country-info">
					<div class="title" style="margin-left: 0;">
						目的地介绍
					</div>
					<div class="info-text">
						{{$detail_info.desc}}
					</div>
					<div class="user-info">
						<div class="info-img-box">
							<a href="index.php?m=wap&c=muser&v=index&id={{$detail_info.user_id}}"><img src="http://m.youxingji.cn{{$detail_info.avatar}}" /></a>
						</div>
						<div class="info-text">
							<p>{{$detail_info.university}} {{$detail_info.username}}</p>
							{{$detail_info.desccibes}}
						</div>
					</div>
				</div>
			</div>

			<div class="item p30">
				<div class="title">
					行程直播
				</div>
				{{if $travel_info}}
				<div class="waterfall">
					{{foreach from=$travel_info item=item key=key}}
					<div class="user-in">
						<div class="user-head">
							<div class="Head_portrait">
								<img src="{{$item.avatar}}" />
							</div>
							<div class="user-info-box">
								<div class="user_name">
									<div>{{$item.username}}</div>
									<div class="time">{{$item.addtime}}</div>
								</div>
								<div class="user-text">
									{{$item.describes}}
								</div>
							</div>
						</div>
						<ul class="row">
							{{if $item.content}} {{foreach from=$item.content item=vo key=k}}
							<li>
								<a class="lightbox" href="{{$vo}}" rel="list{{$item.id}}"><img src="{{$vo}}" /></a>
							</li>
							{{/foreach}} {{/if}}
						</ul>
						<div class="clear">
						</div>
						<div class="num">
							<div class="hideed ">收藏</div>
							<div class="theory ">评论</div>
							<div class="spot zan" data-id="{{$item.id}}" data-num="{{$item.topnum}}" id="zan{{$item.id}}">{{$item.topnum}}</div>
							<div class="Read one">{{$item.shownum}}</div>
						</div>
					</div>
					{{/foreach}}
				</div>
				<div class="btn-dt">
					<input type="button" id="btn_dt" value="更多动态" />
				</div>
			</div>
			{{/if}} {{if $travel_log}}
			<div class="item p30">
				<div class="title">
					达人游记 <span id="">更多</span>
				</div>
				<div class="list">
					<div class="list-item">
						<div class="list-right">
							<img src="image/images/yhzbg1.jpg" />
						</div>
						<div class="list-left">
							<div>金边 </div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" id="" value="查看详情" />
						</div>
					</div>
					<div class="list-item">
						<div class="list-right">
							<img src="image/images/yhzbg1.jpg" />
						</div>
						<div class="list-left">
							<div>金边 </div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" id="" value="查看详情" />
						</div>
					</div>
					<div class="list-item">
						<div class="list-right">
							<img src="image/images/yhzbg1.jpg" />
						</div>
						<div class="list-left">
							<div>金边 </div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" id="" value="查看详情" />
						</div>
					</div>
				</div>
			</div>
			{{/if}} {{if $tv_info}}
			<div class="item p30">
				<div class="title">
					达人视频 <span id="">更多</span>
				</div>
				<div class="m-imgtxt3 swiper-container swiper-container-horizontal">
					<div class="swiper-wrapper">
						{{foreach from=$tv_info item=v}}
						<div class="swiper-slide">
							<!--<video width="98%" src="{{$v.url}}" controls="controls">
	                    		
	                    	</video>-->
							<a href="#m-pop1-yz" class="js-video" data-src="{{$v.url}}" data-id="{{$v.id}}">
								<div class="pic">
									<img src="{{$v.pics}}" alt="">
									<div class="txt">
										<h4>{{$v.title}}</h4>
										<i></i>
									</div>
								</div>
							</a>
						</div>
						{{/foreach}}
						<div class="swiper-slide">
							<a href="/index.php?m=wap&c=index&v=tv">
								<div class="g-more2">
									<span>查看更多达人视频<i></i></span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="m-pop1-yz" id="m-pop1-yz">
				<div class="con">
					<iframe src='' frameborder=0 'allowfullscreen'></iframe>
					<div class="close js-close"><span></span></div>
				</div>
			</div>

			{{/if}}
		</div>
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		{{include file='wap/footer.tpl'}}

		<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
		<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	</body>
	<script>
		var swiper = new Swiper('.banner', {
			slidesPerView: 1,
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			},
			autoplay: {
				delay: 3000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			}
		});
		var swiper = new Swiper('.m-imgtxt1', {
			slidesPerView: 1,
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			autoplay: {
				delay: 3000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			}
		});
		var swiper = new Swiper('.m-imgtxt2', {
			slidesPerView: 1.5
		});
		var swiper = new Swiper('.m-imgtxt3', {
			slidesPerView: 1.5
		});
	</script>
	<script type="text/javascript">
		$(".cont").click(function() {
			$(this).parent().parent().parent().find(".foot").toggle();
		})
	</script>
	<!-- 弹窗 -->
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var host = window.location.host;
			var id = $("#activity_id").val();

			$("#btn_dt").click(function() {
				var page = $("#page").val();
				Load(page, id);

			})

			function Load(page, id) {
				var src = "//" + host + '/' + 'index.php?m=api&c=swim&v=get_more';
				$.ajax({
					type: "post",
					url: src,
					data: {
						page: page,
						activity_id: id
					},
					dataType: 'json',
					async: false,
					success: function(data) {
						var sdata = data.data;
						if(data.status == 1) {
							for(i in sdata) {
								var html = "<div class='user-in'><div class='user-head'><div class='Head_portrait'><img src=" +
									sdata[i].avatar + " /></div><div class='user-info-box'><div class='user_name'><div>" +
									sdata[i].username + "</div><div class='time'>" +
									sdata[i].addtime + "</div></div><div class='user-text'>" +
									sdata[i].describes + "</div></div></div><ul class='row'id='rowid" +
									sdata[i].id + "'></ul><div class='clear'></div><div class='num'><div class='hideed'>收藏</div><div class='theory'>评论</div><div class='spot zan' data-id=" +
									sdata[i].id + " data-num=" + sdata[i].topnum + " id='zan" + sdata[i].id + "'>" + sdata[i].topnum + "</div><div class='Read one'>" + sdata[i].shownum + "</div></div></div></div>";
								$('.waterfall').append(html);
								for(x in sdata[i].content) {
									var li = "<li><a class='lightbox' href=" + sdata[i].content[x] + " rel='list" + sdata.id + "'><img src=" + sdata[i].content[x] + " /></a></li>";
									$('#rowid' + sdata[i].id).append(li);
								}
							}
							page = data.page;
							$("#page").val(page);
						} else {
							layer.msg(data.tips);
						}
					}
				});
			}
			$(".fancybox-effects-a").fancybox({
				showCloseButton: false,
				helpers: {
					title: {
						type: 'outside'
					},
					overlay: {
						speedOut: 0
					}
				}
			});
			$(".fancybox").fancybox({
				wrapCSS: 'fancybox-custom',
				closeClick: false,
				openEffect: 'none',
				helpers: {
					title: {
						type: 'inside'
					}
				},
				beforeLoad: function() {
					this.title = $(this.element).data('title');
				}
			});
			$('.js-video').click(function(event) {
				var _id = $(this).attr("href");
				var tid = $(this).attr("data-id");
				var _src = $(this).attr("data-src");
				$.post("/index.php?m=api&c=index&v=showtv", {
					'id': tid
				}, function(data) {

				}, "JSON");
				$(_id).find("iframe").attr("src", _src);
				$(_id).fadeIn();
			});

			$('.js-close').click(function(event) {
				$(this).parents('.m-pop1-yz').fadeOut();
				$(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
				event.stopPropagation();
			});
			$(document).on('click', '.num .theory,.num .hideed', function() {
				layer.msg('功能正在开发，敬请期待');
			})
			$(document).on('click', '.zan', function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zan", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('#zan' + id).html((num + 1));
						$('#zan' + id).addClass("one");
						layer.msg(data.tips);
					} else if(data.status == 2) {
						$('#zan' + id).addClass("one");
						layer.msg(data.tips);
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");
			})

			$(document).on('click', '.list-left input', function() {
				var src = $(this).data("url");
				window.location.href = src;
			})
		});
	</script>
	<!-- 弹窗 end-->

</html>