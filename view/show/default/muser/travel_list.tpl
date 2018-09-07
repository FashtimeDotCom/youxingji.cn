<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>TA的游记_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
		<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		
		<link rel="stylesheet" type="text/css" href="/resource/css/travel_list.css" />
		<!--lightbox开始-->
		<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
		<!--[if IE 6]>
 	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
		<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
		<script src="/resource/js/pc_rem.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.lightbox').lightbox();
			});
		</script>
		<style type="text/css">
			.m-nv-sz ul {
				display: flex;
			}
			
			.m-nv-sz ul li {
				flex-grow: 1;
				text-align: center;
			}
			
			.m-nv-sz .on:before {
				width: 100%;
			}
		</style>
	</head>

	<body>
		{{include file='public/header.tpl'}}
		<div class="main">
			<div class="ban s1" style="background-image: url({{$muser.cover}});"></div>
			<div class="row-sz pb30">
				<div class="m-nv-sz">
					<div class="wp">
						<ul>
							<li>
								<a href="/index.php?m=index&c=muser&v=index&id={{$muser.uid}}">TA的旅行日志</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=muser&v=album&id={{$muser.uid}}">TA的相册</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=muser&v=tv&id={{$muser.uid}}">TA的旅拍TV</a>
							</li>
							<li class="on">
								<a href="/index.php?m=index&c=muser&v=travel_note&id={{$muser.uid}}">TA的游记</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="wp">
					{{include file='user/left.tpl'}}
					<div class="col-r">
						<div class="m-mytv-sz">
							{{if $list}} {{foreach from=$list item=item key=key}}

							<div class="item">
								<div class="user-in">
									<div class="user-head">
										<div class="Head_portrait ">
											<a href=""><img src="{{$item.headpic}}"></a>
											<div>{{$item.username}}</div>

										</div>
										<div class="user-info-box">
											<div class="user_title lib">
												<div class="title">
													<a href="index.php?m=index&c=index&v=traveldetai&id={{$item.id}}">{{$item.title}}</a>
												</div>
												<div class="time">{{$item.addtime}}</div>
												<!--<i></i>
												<ul class="i_ul">
													<li>
														<a href="index.php?m=index&c=user&v=edit_travel_note&id={{$item.id}}">编辑</a>
													</li>
													<li class="delete" data-id="{{$item.id}}">删除</li>
												</ul>-->
											</div>
											<div class="user-text">{{$item.desc}}</div>
										</div>
									</div>
									<div class="img_item">
										<a href="index.php?m=index&c=index&v=traveldetai&id={{$item.id}}">
											<img src="{{$item.thumbfile}}">
										</a>
									</div>
									<div class="clear">
									</div>

								</div>
								<div class="num">
									<div class="hideed "><i></i>收藏</div>
									<div class="theory "><i></i>评论</div>
									<div class="spot zan" data-id="{{$item.id}}" data-num="{{$item.top_num}}" id="zan{{$item.id}}"><i></i><span class="top_num">{{$item.top_num}}</span></div>
									<div class="Read one"><i></i>{{$item.show_num}}</div>
								</div>
							</div>

							{{/foreach}} {{/if}}

						</div>
						<!-- 页码 -->
						{{if $multipage}}
						<div class="pages" style="margin-top: 10px;">
							<ul>
								{{foreach from=$multipage item=page}}
								<li {{if $page.2}}class="{{$page.2}}" {{/if}}>
									<a href="{{$page.1}}">{{$page.0}}</a>
								</li>
								{{/foreach}}
								<li class="pages-form">
									到<input class="inp" type="text" id="pages">页
									<input class="btn" type="button" id="pageqr" value="确定">
								</li>
							</ul>
						</div>
						{{/if}}
						<!-- 页码 end-->
					</div>
					<div class="clear">

					</div>
				</div>
			</div>
		</div>
		{{include file='public/footer.tpl'}}
		<link rel="stylesheet" href="/resource/css/slick.css">
		<script src="/resource/js/slick.min.js"></script>
		<script>
			$('.pic-sz').slick({ //自定导航条
				slidesToShow: 4, //个数
				slidesToScroll: 1,
				arrows: true,
				prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
				nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
				dots: false

			});
		</script>
		<!-- 弹窗 -->
		<link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
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
			$('.zan').click(function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zantravel", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('#zan' + id).find('.top_num').html((num + 1));
						$('#zan' + id).addClass("one");
						layer.msg(data.tips);
					} else if(data.status == 2) {
						$('#zan' + id).addClass("one");
						layer.msg(data.tips);
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");

			});
		</script>
		<!-- 弹窗 end-->
	</body>

</html>