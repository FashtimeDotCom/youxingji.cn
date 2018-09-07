<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>个人中心-发布</title>
		<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
		<script src="/resource/js/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<style type="text/css">
			.subbtn {
				display: inline-block;
				width: 112px;
				height: 38px;
				line-height: 38px;
				text-align: center;
				font-size: 16px;
				border: none;
				border-radius: 5px;
				margin-right: 9px;
				background: rgba(248, 89, 89, 1);
				color: rgba(254, 254, 254, 1);
			}
			
			.sub {
				background: rgba(249, 249, 249, 1) !important;
				color: rgba(102, 102, 102, 1) !important;
			}
		</style>
	</head>

	<body>
		{{include file='public/header.tpl'}}
		<div class="main">
			<div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);">
			</div>
			<div class="wp">
				<ul class="ul-tab-lb1">
					<li>
						<a href="/index.php?m=index&c=user&v=addtravel">
							<h4>发表旅行日志</h4>
							<p>用九宫格定格您的每一个动人时刻</p>
						</a>
					</li>
					<li>
						<a href="/index.php?m=index&c=user&v=addtv">
							<h4>发表旅拍TV</h4>
							<p>最原创的旅拍，最独特的旅行视角</p>
						</a>
					</li>
					<li class="on">
						<a href="/index.php?m=index&c=user&v=travel_note">
							<h4>发表游记</h4>
							<p>用”长篇大论“记录您的美好旅程</p>
						</a>
					</li>
				</ul>
				<style type="text/css">
					.upic {
						max-width: 300px;
						margin-top: 20px;
					}
					
					.num_text {
						font-size: 12px;
						color: #868686;
						line-height: 20px;
					}
					
					.num_f {
						color: #d71618;
					}
				</style>
				<div class="m-con-lb1">
					<div class="col-l">
						<div class="m-edit-lb">
							<div class="tit">
								<input type="text" class="inp" value="{{$info.title}}" id="title" placeholder="请在这里输入标题">
							</div>
							<div class="tit">
								<textarea class="layui-textarea" id="LAY_demo1" style="display: none" placeholder="请发表你的游记">{{$info.content}}</textarea>
							</div>
							<div class="tit">
								<input type="text" class="inp" value="{{$info.desc}}" id="describe" placeholder="请在这里输入封面描述">
							</div>
							<div class="layui-upload">
								<label>
                            <input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
                        </label>
								<div class="layui-upload-list" id="piclist">
									{{if $info.thumbfile != ''}}
									<div class="upic"><img src="{{$info.thumbfile}}" class="layui-upload-img"></div>
									{{else}}
									<div class="upic"><img src="" class="layui-upload-img"></div style="display: none">
									{{/if}}
								</div>
							</div>
							<div class="fabu">
								<input type="hidden" name="did" value="{{$did}}" id="did">
								<input type="hidden" name="id" value="{{$info.id}}" id="id">
								<input type="submit" class="subbtn layui-btn site-demo-layedit" id="btnAdd" data-type="content" value="编辑">
								<input type="button" class="sub" onclick="javascript:window.history.back(-1);" value="取消" />
								<div class="xieyi">
									<label>
                                <input type="checkbox" checked>我已阅读并同意<a href="/article/hyzn">《游行迹协议》</a>
                            </label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-r">
						<div class="m-list-lb1">
							<div class="tit">热门推荐</div>
							<div class="m-pic2-qm">
								<div class="slider">
									{{vplist from='ad' item='adlist' tagname='addtv'}}
									<div class="item">
										<a href="{{$adlist.linkurl}}" target="_blank">
											<div class="pic">
												<img src="{{$adlist.imgurl}}" alt="">
												<span>{{$adlist.adname}}</span>
											</div>
										</a>
									</div>
									{{/vplist}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{include file='public/footer.tpl'}}
		<link rel="stylesheet" href="/resource/css/slick.css">
		<script src="/resource/js/slick.min.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
		<script>
			$(document).ready(function() {
				$('.m-pic2-qm .slider').slick({
					dots: false,
					arrows: true,
					autoplay: true,
					slidesToShow: 1,
					autoplaySpeed: 5000,
					pauseOnHover: false,
					lazyLoad: 'ondemand'
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {

			});

			layui.upload({
				url: "/index.php?m=api&c=index&v=uploadpic",
				type: 'image',
				ext: 'jpg|png|jpeg|bmp',
				before: function(obj) {
					$('#picslist').before('<span style="color: #d71618;" class="tips">上传中...</span>');
				},
				success: function(data) {
					var msg = data.msg;
					if(msg !== undefined) {
						layer.msg(msg);
					}
					$('#piclist').html('<div class="upic"><img src="' + data.url + '" class="layui-upload-img"></div>');

				}
			});
			layui.use('layedit', function() {
				var layedit = layui.layedit,
					$ = layui.jquery;
				layedit.set({
					uploadImage: {
						url: '/index.php?m=api&c=index&v=lay_uploadpic', //接口url
						type: 'post' //默认post
					}
				});
				//构建一个默认的编辑器
				var index = layedit.build('LAY_demo1');

				//编辑器外部操作
				var active = {
					content: function() {
						var content = layedit.getContent(index);
						add(content);
					},
					text: function() {
						var content = layedit.getContent(index);
						draft(content); //获取编辑器纯文本内容
					},
					selection: function() {
						alert(layedit.getSelection(index));
					}
				};

				$('.site-demo-layedit').on('click', function() {
					var type = $(this).data('type');
					active[type] ? active[type].call(this) : '';
				});
			});

			function add(con) {
				var title = $('#title').val();
				var desc = $('#describe').val();
				var did = $('#did').val();
				var id = $('#id').val();
				var imgUrl = $('.layui-upload-img').attr('src');
				if(!title) {
					layer.msg('请输入标题');
					return false;
				}
				if(!con) {
					layer.msg('请输入正文');
					return false;
				}
				if(!desc) {
					layer.msg('请输入描述');
					return false;
				}

				if(!imgUrl) {
					layer.msg('请上传图片');
					return false;
				}
				if(!$("input[type='checkbox']").is(':checked')) {
					layer.msg('请选择服务协议');
					return false;
				}
				$.post("index.php?m=api&c=TravelNote&v=save_travel_note", {
					'title': title,
					'content': con,
					id: id,
					did: did,
					action:  'edit',
					'imgUrl': imgUrl,
					'desc': desc
				}, function(data) {
					layer.msg(data.tips);
					if(data.status == 1) {
						window.location.href = "index.php?m=index&c=user&v=travel";
					}
				}, "JSON");
			}
		</script>
	</body>

</html>