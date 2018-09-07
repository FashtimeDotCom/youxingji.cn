<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>达人邦_{{TO->cfg key="site_name" group="site" default=""}}</title>
		<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/travel_detail.css" />
		<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
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
			<div class="wp">
				<div class="col-l">
					<div class="con">
						<div class="item">
							<div class="user-in">
								<div class="user-head">
									<div class="Head_portrait">
										<a href="index.php?m=index&c=muser&v=index&id={{$info.uid}}">
											<img src="{{$info.headpic}}"></a>
									</div>
									<div class="user-info-box">
										<div class="user_name">
											<div>{{$info.username}}</div>
											<div class="time">{{$info.addtime}}</div>
										</div>
										<div class="user-text">{{$info.describes}}</div>
									</div>
								</div>
								<ul class="row">
									{{if $info.content}}
									{{foreach from=$info.content key=key item=item}}
									<li>
										<a class="lightbox" href="{{$item}}" rel="list{{$id}}">
											<img src="{{$item}}">
										</a>
									</li>
									{{/foreach}}
									{{/if}}



								</ul>
								<div class="clear">
								</div>

							</div>
							<div class="num">
								<div class="hideed "><i></i>收藏</div>
								<div class="theory one"> <i></i>评论</div>
								<div class="spot zan" data-id="{{$id}}" data-num="{{$info.topnum}}" id="zan{{$id}}"><i></i>{{$info.topnum}}</div>
								<div class="Read one"><i></i>{{$info.shownum}}</div>
							</div>
						</div>
						<div class="" style="width: 20rem;">
							<!--评论div-->
							<div class="m-comment-qm">
								<!--PC版-->
								<div id="SOHUCS" sid="{{$source_id}}"></div>
								<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
								<script type="text/javascript">
									window.changyan.api.config({
										appid: 'cytIKVFKm',
										conf: 'prod_84acd83354d56f4258f7a43b366bb19d'
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="col-r">
					<div class="r_box">
						<div class="r_box_title">
							相关动态推荐
							<span><a href="index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank">更多</a></span>
						</div>
						<ul class="r_box_con">
							{{if $ano_info}}
							{{foreach from=$ano_info item=item key=key}}

							<li>
								<div class="user_head">
									<div class="Head_portrait">
										<a href="index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank">
											<img src="{{$item.headpic}}">
										</a>
									</div>
									<div class="user_info_box">
										<div>{{$item.username}}</div>
										<div class="time">{{$item.addtime}}</div>
									</div>

								</div>
								<div class="user_text"><a href="index.php?m=index&c=travel&v=travel_detail&id={{$item.id}}" target="_blank">{{$item.describes}}</a></div>
								<div class="pic">
									<img src="{{$item.content}}"/>
								</div>
							</li>

							{{/foreach}}
							{{/if}}

						</ul>
					</div>
					
					<div class="r_box">
						<a href="">
							<img src="http://www.youxingji.cn/uploadfile/image/20180413/152358134768728.jpg" alt="">
						</a>
					</div>
					<div class="r_box">
						<div class="r_box_title">
							热门旅游地
						</div>
						<ul class="r_box_con">
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
				<div class="clear">

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

			//登录控制
			function cyLogin()
			{
				layer.confirm('请您先登录再进行评论!', {
					btn: ['登录','取消'] //按钮
				}, function(){
					window.open("http://www.youxingji.cn/index.php?m=index&c=index&v=login");
					setIntervalDemo();
				}, function(){

				});

			}

			function setIntervalDemo() {
				setTimeoutName = setInterval(function() {
					//查看是否登录
					$.ajax({
						type: "GET",
						url: "http://www.youxingji.cn/index.php?m=api&c=comment&v=get_userinfo&flag=true",
						success: function(res) {
							var data=JSON.parse(res);
							if( data.is_login==1 ){
								window.location.reload();
							}else{
							}
						}
					});

				}, 5000);
			}
		</script>
		<!-- 弹窗 end-->
	</body>

</html>