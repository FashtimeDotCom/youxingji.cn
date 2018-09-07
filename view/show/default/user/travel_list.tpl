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
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/travel_list.css" />
		<script src="/resource/js/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/pc_rem.js"></script>
	</head>

	<body>
		{{include file='public/header.tpl'}}
		<div class="main">
			<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
			<div class="row-sz pb30">
				<div class="m-nv-sz">
					<div class="wp">
						<ul>
							<li>
								<a href="/index.php?m=index&c=user&v=index">我的旅行日志</a>
							</li>

							<li>
								<a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a>
							</li>
							<li class="on">
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
												<div class="title"><a href="index.php?m=index&c=index&v=traveldetai&id={{$item.id}}">{{$item.title}}</a></div>
												<div class="time">{{$item.addtime}}</div>
												<i></i>
												<ul class="i_ul">
													<li>
														<a href="index.php?m=index&c=user&v=edit_travel_note&id={{$item.id}}">编辑</a>
													</li>
													<li class="delete" data-id="{{$item.id}}">删除</li>
												</ul>
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
		<link rel="stylesheet" href="/resource/css/slick.css">
		<script src="/resource/js/slick.min.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
		<script>
			$('.pic-sz').slick({ //自定导航条
				slidesToShow: 4, //个数
				slidesToScroll: 1,
				arrows: true,
				prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
				nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
				dots: false

			});
			$('#pageqr').click(function() {
				var page = $('#pages').val();
				if(page) {
					window.location.href = "/index.php?m=index&c=user&v=tv&page=" + page;
				}
			})
			$('.delete').click(function(event) {
				var id = $(this).data('id');
				layer.open({
					title: ['温馨提示'],
					content: '<div style="color:#767676">确认要删除吗，删除后不能恢复</div>',
					btn: ['确认', '取消'],
					shadeClose: true,
					//回调函数
					yes: function(index, layero) {
						$.post("/index.php?m=api&c=TravelNote&v=del_travel_note", {
							'id': id
						}, function(data) {
							layer.msg(data.tips);
							if(data.status == 1) {
								self.location=window.location.href;
								layer.msg(data.tips);
							} else {
								layer.msg(data.tips);
							}
						}, "JSON");
					},
					btn2: function(index, layero) {},
					cancel: function(index, layero) {},

				});

			})
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

			function deleteTv(id) {
				$.post("/index.php?m=api&c=index&v=deletetv", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('.tv_t' + id).remove();
					}
				}, "JSON");
			}
		</script>
	</body>

</html>