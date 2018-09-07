<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>达人邦_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
		<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
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
	</head>

	<body>
		{{include file='public/header.tpl'}}
		<div class="main">
			{{vplist from='ad' item='adlist' tagname='starlide'}}
			<div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
			{{/vplist}}
			<div class="cur">
				<div class="wp">
					<a href="/">首页</a> &gt; <span>达人邦{{if $keyword}}【{{$keyword}}】{{/if}}</span>
				</div>
			</div>
			<div class="wp">
				<div class="m-master-qm">
					<div class="col-l">
						<div class="con">
							<ul class="ul-imgtxt2-qm list_v">
								{{foreach from=$list item=vo}}
								<li>
									<a href="{{$vo.uid|helper:'href'}}" target="_blank"><i class="icon1" style="background-image: url({{$vo.uid|helper:'avatar'}});border-radius: 50%;background-size: 100%;"></i></a>
									<div class="txt p_btn">
										<div class="tit">
											<span>{{$vo.addtime}}</span>
											<h3><a href="{{$vo.uid|helper:'href'}}"target="_blank">{{$vo.uid|helper:'username'}}</a></h3>
										</div>
										<p data-src="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</p>
										<dl>
											{{foreach from=$vo.content item=v}}
											<dd {{if $vo.picnum==4 || $vo.picnum==2 || $vo.picnum==6 }}style="width: 50%;" {{/if}}>
												<a class="lightbox" href="{{$v}}" rel="list{{$vo.id}}">
													<div class="pic" {{if $vo.picnum==1 }}style="width: 100%;height: 100%;" {{/if}}{{if $vo.picnum==4 || $vo.picnum==2 || $vo.picnum==6 }}style="width: 100%;height: 150px;" {{/if}}><img src="{{$v}}" alt=""></div>
												</a>
											</dd>
											{{/foreach}}
										</dl>
										<div class="g-operation-qm">
											<a href="javascript:;" class="look"><i></i>{{$vo.shownum}}</a>
											<a href="javascript:;" class="zan" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}"><i></i>{{$vo.topnum}}</a>
										</div>
									</div>
								</li>
								{{/foreach}}
							</ul>
							<!-- 页码 -->
							{{if $multipage}}
							<div class="pages">
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
					</div>
					<div class="col-r">
						{{if $tjstar.0.username}}
						<h3 class="g-tit1-qm">本周推荐达人</h3>
						<div class="m-pic1-qm">
							<div class="pic">
								<a href="{{$tjstar.0.uid|helper:'href'}}"><img src="{{$tjstar.0.avatar}}" alt=""></a>
							</div>
							<span>{{$tjstar.0.username}}</span>
							<p>{{$tjstar.0.autograph}}</p>
						</div>
						{{/if}}
						<h3 class="g-tit1-qm">热门旅游地</h3>
						<ul class="ul-imgtxt1-qm">
							{{foreach from=$tourismlist item=vo}}
							<li>
								<a href="/index.php?m=index&c=index&v=star&keyword={{$vo.keyword}}">
									<div class="pic">
										<img src="{{$vo.pics}}" alt="">
										<span>{{$vo.title}}</span>
									</div>
								</a>
							</li>
							{{/foreach}}
						</ul>
					</div>
				</div>
			</div>
			<div class="h81"></div>
		</div>
		{{include file='public/footer.tpl'}}
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
			$('#pageqr').click(function() {
				var page = $('#pages').val();
				if(page) {
					window.location.href = "/index.php?m=index&c=index&v=star&keyword={{$keyword}}&page=" + page;
				}
			})
			$(".p_btn p").click(function(e) {
				var str = $(this).attr('data-src');;
				window.location.href = str;

			})
			$('.zan').click(function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zan", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$(obj).toggleClass('on');
						$(obj).html("<i></i>" + (num + 1));
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");

			});
		</script>
		<!-- 弹窗 end-->
	</body>

</html>