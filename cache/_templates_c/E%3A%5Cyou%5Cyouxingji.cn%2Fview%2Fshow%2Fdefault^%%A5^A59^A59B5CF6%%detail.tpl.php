<?php /* vpcvcms compiled created on 2018-07-31 15:27:21
         compiled from swim/detail.tpl */ ?>
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
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<input type="hidden" name="activity_id" id="activity_id" value="<?php echo $this->_tpl_vars['activity_id']; ?>
">
		<input type="hidden" name="page" id="page" value="2" />
		<div class="main">
			<div class="banner">
				<img src="<?php echo $this->_tpl_vars['detail_info']['ad_img_url']; ?>
" />
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
							<img src="<?php echo $this->_tpl_vars['target_info'][0]['img_url']; ?>
" id="img-src" />
							<!--<div class="posi" alt="">
								<?php echo $this->_tpl_vars['detail_info']['name']; ?>
<em id="City"><?php echo $this->_tpl_vars['target_info'][0]['city']; ?>
</em>
							</div>
							<div class="posi_text">
								<?php echo $this->_tpl_vars['target_info'][0]['desc']; ?>

							</div>-->
						</div>
						<div class="list">
							<?php if ($this->_tpl_vars['target_info']): ?> <?php $_from = $this->_tpl_vars['target_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kk'] => $this->_tpl_vars['items']):
?>
							<div class="list-box">
								<img src="<?php echo $this->_tpl_vars['items']['img_url']; ?>
" alt="<?php echo $this->_tpl_vars['items']['city']; ?>
" data-desc="<?php echo $this->_tpl_vars['items']['desc']; ?>
" />
							</div>
							<?php endforeach; endif; unset($_from); ?> <?php endif; ?>

						</div>
					</div>
					<div class="user-info">
						<div class="info-left">
							<h1>国家介绍</h1>
							<div class="txt">
								<?php echo $this->_tpl_vars['detail_info']['desc']; ?>

							</div>
						</div>
						<div class="info-right">
							<div class="user-logo">
								<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
"><img src="<?php echo $this->_tpl_vars['detail_info']['avatar']; ?>
" /></a>
							</div>
							<div class="txt">
								<p><?php echo $this->_tpl_vars['detail_info']['university']; ?>
 <?php echo $this->_tpl_vars['detail_info']['username']; ?>
</p>
								<?php echo $this->_tpl_vars['detail_info']['desccibes']; ?>

							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if ($this->_tpl_vars['travel_info']): ?>
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

						<?php if ($this->_tpl_vars['travel_info']): ?> <?php $_from = $this->_tpl_vars['travel_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<div class="item">
							<div class="user-in">
								<div class="user-head">
									<div class="Head_portrait">
										<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
"><img src="http://www.youxingji.cn/<?php echo $this->_tpl_vars['item']['avatar']; ?>
" /></a>
									</div>
									<div class="user-info-box">
										<div class="user_name">
											<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
											<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
										</div>
										<div class="user-text"><?php echo $this->_tpl_vars['item']['describes']; ?>
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
"><img src="http://www.youxingji.cn/<?php echo $this->_tpl_vars['vo']; ?>
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
						</div>
						<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
						<div class="Load">
							<div class="load-tips">
								加载更多
							</div>

						</div>
					</div>
				</div>
			</div>

			<?php endif; ?> <?php if ($this->_tpl_vars['travel_log']): ?>
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

			<?php endif; ?> <?php if ($this->_tpl_vars['tv_info']): ?>
			<div class="items">
				<div class="line">
					<div class="line_title">
						达人视频
					</div>
				</div>
				<div class="video-box">
					<ul class="ul-pic1">

						<?php if ($this->_tpl_vars['tv_info']): ?> <?php $_from = $this->_tpl_vars['tv_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li>
							<a class="js-video" href="#m-pop1-hlg" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
" data-id="41">
								<img src="<?php echo $this->_tpl_vars['item']['pics']; ?>
" alt="">
								<div class="txt">
									<h4><?php echo $this->_tpl_vars['item']['title']; ?>
</h4>
									<i></i>
								</div>
							</a>
						</li>
						<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
					</ul>
				</div>
			</div>

			<?php endif; ?>

			<div class="m-pop1-hlg" id="m-pop1-hlg">
				<div class="con1">
					<iframe src='' frameborder=0 'allowfullscreen'></iframe>
					<div class="close js-close"></div>
				</div>
			</div>
		</div>
		<script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		
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
								var Html ="<div class='item'><div class='user-in'><div class='user-head'><div class='Head_portrait'><a href='index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
'><img src="+
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