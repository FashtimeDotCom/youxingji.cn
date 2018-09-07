<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>个人中心-我的游记</title>
		<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
		<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/pc_rem.js"></script>
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
			<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
			<div class="row-sz pb30">
				<div class="m-nv-sz">
					<div class="wp">
						<ul>
							<li class="on">
								<a href="/index.php?m=index&c=user&v=index">我的旅行日志</a>
							</li>
							
							<li>
								<a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=travel">我的游记</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=album">我的相册</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=draft">草稿箱</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="wp">
					{{include file='user/left.tpl'}}
					<div class="col-r">
						<div class="m-txtlist-sz">
							<ul class="ul_list">
								<li class="addtravel">
									<a href="/index.php?m=index&c=user&v=addtravel">
										<i ></i>
										<div class="txt">发布旅行日志</div>
									</a>
								</li>
								<li class="addtv">
									<a href="/index.php?m=index&c=user&v=addtv">
										<i ></i>
										<div class="txt">发布旅拍TV</div>
									</a>
								</li>
								<li class="travel_note">
									<a href="/index.php?m=index&c=user&v=travel_note">
										<i ></i>
										<div class="txt">发布游记</div>
									</a>
								</li>
								<li class="follow">
									<a href="/index.php?m=index&c=user&v=follow">
										<i ></i>
										<div class="txt">我的关注</div>
									</a>
								</li>
								<li class="fans">
									<a href="/index.php?m=index&c=user&v=fans">
										<i ></i>
										<div class="txt">我的粉丝</div>
									</a>
								</li>
							</ul>
						</div>
						{{if $user.city == '' || $user.autograph == '' || $user.city == ''}}
						<div class="m-mine-sz">
							<div class="txt">
								<span class="name">{{$user.username}}</span>，这里是你的游行迹！<br>是记录你的旅行记忆，结交各路豪杰的地盘儿。现在开启游行迹旅程！
							</div>
							<a href="/index.php?m=index&c=user&v=setting" class="btn">完善个人资料</a>
						</div>
						{{/if}} {{if $list}}
						<div class="m-myday-sz s1 sz">
							<ul class="ul-imgtxt2-qm sz">
								{{foreach from=$list item=vo}}
								<li class="travel_t{{$vo.id}}">
									<div class="txt">
										<div class="title">
											<a href="javascript:;" class="del" onclick="deleteTravel({{$vo.id}})"></a>
											<a class="tit" href="javascript:;">{{$vo.title}}</a>
											<span class="date">{{$vo.addtime}}【<a href="/index.php?m=index&c=user&v=edittravel&id={{$vo.id}}" target="_blank">编辑</a>】</span>
										</div>
										<p>{{$vo.describes}}</p>
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
											<a href="" class="look"><i></i>{{$vo.shownum}}</a>
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
						{{else}}
						<div class="m-myday-sz">
							<div class="top">
								<a href="/index.php?m=index&c=user&v=addtravel" class="write"><i></i>写游记</a>
								<h3>我的游记</h3>
							</div>
							<div class="bg">
								此处还差一篇游记哦~
							</div>
						</div>
						<div class="m-myday-sz">
							<div class="top">
								<a href="/index.php?m=index&c=user&v=addtv" class="write"><i></i>发布旅拍TV</a>
								<h3>我的旅拍TV</h3>
							</div>
							<div class="bg2">
								<div class="text">
									留下你最原创旅拍 <br>这里有最原创的旅游推荐<br> 也有最温馨的旅行小贴士<br>
								</div>
							</div>
						</div>
						{{/if}}
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

			function deleteTravel(id) {
				$.post("/index.php?m=api&c=index&v=deletetravel", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('.travel_t' + id).remove();
					}
				}, "JSON");
			}
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