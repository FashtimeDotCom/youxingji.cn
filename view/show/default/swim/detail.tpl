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
		<link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">
		<script src="resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>

	</head>

	<body>
		{{include file='public/header.tpl'}}
		<input type="hidden" name="activity_id" id="activity_id" value="{{$activity_id}}">
		<input type="hidden" name="page" id="page" value="2" />
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
						行程路线
					</div>
				</div>
				<div class="box">
					<div class="img-info">
						<div class="content">
							<img src="{{$target_info[0].img_url}}" id="img-src" />
							<!--<div class="posi" alt="">
								{{$detail_info.name}}<em id="City">{{$target_info[0].city}}</em>
							</div>
							<div class="posi_text">
								{{$target_info[0].desc}}
							</div>-->
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
							<h1>目的地介绍</h1>
							<div class="txt">
								{{$detail_info.desc}}
							</div>
						</div>
						<div class="info-right">
							<div class="user-logo">
								<a href="index.php?m=index&c=muser&v=index&id={{$detail_info.user_id}}"><img src="{{$detail_info.avatar}}" /></a>
							</div>
							<div class="txt">
								<p>{{$detail_info.university}} {{$detail_info.username}}</p>
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
										<a href="index.php?m=index&c=muser&v=index&id={{$detail_info.user_id}}"><img src="http://www.youxingji.cn/{{$item.avatar}}" /></a>
									</div>
									<div class="user-info-box">
										<div class="user_name">
											<div>{{$item.username}}</div>
											<div class="time">{{$item.addtime}}</div>
										</div>
										<div class="user-text">{{$item.describes}}</div>
									</div>
								</div>
								<ul class="row">
									{{if $item.content}} {{foreach from=$item.content item=vo key=k}}
									<li>
										<a class="lightbox" href="{{$vo}}" rel="list{{$item.id}}"><img src="http://www.youxingji.cn/{{$vo}}" /></a>
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

			{{/if}} {{if $travel_log}}
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
								<input type="button" data-url="" id="" value="查看详情" />
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

			{{/if}} {{if $tv_info}}
			<div class="items">
				<div class="line">
					<div class="line_title">
						达人视频
					</div>
				</div>
				<div class="video-box">
					<ul class="ul-pic1">

						{{if $tv_info }} {{foreach from=$tv_info item=item key=key}}
						<li>
							<a class="js-video" href="#m-pop1-hlg" data-src="{{$item.url}}" data-id="41">
								<img src="{{$item.pics}}" alt="">
								<div class="txt">
									<h4>{{$item.title}}</h4>
									<i></i>
								</div>
							</a>
						</li>
						{{/foreach}} {{/if}}
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
		<script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		{{include file='public/footer.tpl'}}

		
		<!-- 弹窗 end-->

	</body>
	<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>

		<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
		<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
<![endif]-->
		<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
		<!--<script src="/resource/js/template-simple.js" type="text/javascript" charset="utf-8"></script>-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.lightbox').lightbox();
			});
		</script>

		<!-- 弹窗 -->
		<link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
		<script src="/resource/js/template/template-simple.js" type="text/javascript" charset="utf-8"></script>
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
	
	<script type="text/javascript">
		$(function() {
			
			var host = window.location.host;
			var id = $("#activity_id").val();
			$(".cont").click(function() {
				$(this).parent().parent().parent().find(".foot").toggle();
			})
			$(".load-tips").click(function() {
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
							for (i  in sdata) {
								var Html ="<div class='item'><div class='user-in'><div class='user-head'><div class='Head_portrait'><a href='index.php?m=index&c=muser&v=index&id={{$detail_info.user_id}}'><img src="+
								sdata[i].avatar+" /></a></div><div class='user-info-box'><div class='user_name'><div>"+
								sdata[i].username+"</div><div class='time'>"+
								sdata[i].addtime+"</div></div><div class='user-text'>"+
								sdata[i].describes+"</div></div></div><ul class='row' id='rowid"+
								sdata[i].id+"'></ul><div class='clear'></div><div class='num'><div class='hideed'>收藏</div><div class='theory'>评论</div><div class='spot zan' data-id="+
								sdata[i].id+" data-num="+sdata[i].topnum+" id='zan"+sdata[i].id+"'>"+sdata[i].topnum+"</div><div class='Read one'>"+sdata[i].shownum+"</div></div></div></div>";
								$('.waterfall').append(Html);
								console.log(sdata[i].content)
								for(x in sdata[i].content){
									var li ="<li><a class='lightbox' href="+sdata[i].content[x]+" rel='list"+sdata.id+"'><img src="+sdata[i].content[x]+" /></a></li>";
									$('#rowid'+sdata[i].id).append(li);
								}
								
							}
							page = data.page;
							$("#page").val(page);
						}else	{
							layer.msg(data.tips);
						}
					}
				});
			}
			
			$(".list-box").click(function() {
				$(this).each(function() {
					var src = $(this).children("img").attr("src");
					var City = $(this).children("img").attr("alt");
					var desc = $(this).children("img").data("desc");
					$("#img-src").attr('src', src);
					$("#City").text(City);
					$(".posi_text").text(desc);
				});
			});
			$(document).on('click','.num .theory,.num .hideed',function(){
				layer.msg('功能正在开发，敬请期待');
			})
			$(document).on('click','.zan',function(event){
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
			
			$(document).on('click','.list-left input',function(){
				var src = $(this).data("url");
				window.location.href = src;
			})
			
		})
	</script>

</html>