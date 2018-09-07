<?php /* vpcvcms compiled created on 2018-07-12 16:14:06
         compiled from swim/mobile/detail.tpl */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>游主张</title>
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
		<input type="hidden" name="activity_id" id="activity_id" value="<?php echo $this->_tpl_vars['activity_id']; ?>
">
		<input type="hidden" name="page" id="page" value="2" />
		<div class="header">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<h3>游主张</h3>
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
					<img src="<?php echo $this->_tpl_vars['detail_info']['ad_img_url']; ?>
" />
				</div>
				<div class="Country-info">
					<div class="title" style="margin-left: 0;">
						国家信息
					</div>
					<div class="info-text">
						<?php echo $this->_tpl_vars['detail_info']['desc']; ?>

					</div>
					<div class="user-info">
						<div class="info-img-box">
							<a href="index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
"><img src="http://m.youxingji.cn<?php echo $this->_tpl_vars['detail_info']['avatar']; ?>
" /></a>
						</div>
						<div class="info-text">
							<p><?php echo $this->_tpl_vars['detail_info']['university']; ?>
 <?php echo $this->_tpl_vars['detail_info']['username']; ?>
</p>
							<?php echo $this->_tpl_vars['detail_info']['desccibes']; ?>

						</div>
					</div>
				</div>
			</div>

			<div class="item p30">
				<div class="title">
					行程直播
				</div>
				<?php if ($this->_tpl_vars['travel_info']): ?>
				<div class="waterfall">
					<?php $_from = $this->_tpl_vars['travel_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="user-in">
						<div class="user-head">
							<div class="Head_portrait">
								<img src="<?php echo $this->_tpl_vars['item']['avatar']; ?>
" />
							</div>
							<div class="user-info-box">
								<div class="user_name">
									<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
									<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
								</div>
								<div class="user-text">
									<?php echo $this->_tpl_vars['item']['describes']; ?>

								</div>
							</div>
						</div>
						<ul class="row">
							<?php if ($this->_tpl_vars['item']['content']): ?> <?php $_from = $this->_tpl_vars['item']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
							<li>
								<a class="lightbox" href="<?php echo $this->_tpl_vars['vo']; ?>
" rel="list<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['vo']; ?>
" /></a>
							</li>
							<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
						</ul>
						<div class="clear">
						</div>
						<div class="num">
							<div class="hideed ">收藏</div>
							<div class="theory ">评论</div>
							<div class="spot zan" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['item']['topnum']; ?>
" id="zan<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['topnum']; ?>
</div>
							<div class="Read one"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</div>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<div class="btn-dt">
					<input type="button" id="btn_dt" value="更多动态" />
				</div>
			</div>
			<?php endif; ?> <?php if ($this->_tpl_vars['travel_log']): ?>
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
			<?php endif; ?> <?php if ($this->_tpl_vars['tv_info']): ?>
			<div class="item p30">
				<div class="title">
					达人视频 <span id="">更多</span>
				</div>
				<div class="m-imgtxt3 swiper-container swiper-container-horizontal">
					<div class="swiper-wrapper">
						<?php $_from = $this->_tpl_vars['tv_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<div class="swiper-slide">
							<!--<video width="98%" src="<?php echo $this->_tpl_vars['v']['url']; ?>
" controls="controls">
	                    		
	                    	</video>-->
							<a href="#m-pop1-yz" class="js-video" data-src="<?php echo $this->_tpl_vars['v']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
">
								<div class="pic">
									<img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
									<div class="txt">
										<h4><?php echo $this->_tpl_vars['v']['title']; ?>
</h4>
										<i></i>
									</div>
								</div>
							</a>
						</div>
						<?php endforeach; endif; unset($_from); ?>
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

			<?php endif; ?>
		</div>
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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