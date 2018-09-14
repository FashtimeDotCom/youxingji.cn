<?php /* vpcvcms compiled created on 2018-09-13 20:01:18
         compiled from user/travel_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>个人中心-我的游记</title>
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/travel_list.css" />
		<script src="/resource/js/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/pc_rem.js"></script>
	</head>

	<body>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="main">
			<div class="ban s1" style="background-image: url(<?php echo $this->_tpl_vars['user']['cover']; ?>
);"></div>
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
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'user/left.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="col-r">
						<div class="m-mytv-sz">
							<?php if ($this->_tpl_vars['list']): ?> <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

							<div class="item">
								<div class="user-in">
									<div class="user-head">
										<div class="Head_portrait ">
											<a href=""><img src="<?php echo $this->_tpl_vars['item']['headpic']; ?>
"></a>
											<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>

										</div>
										<div class="user-info-box">
											<div class="user_title lib">
												<div class="title"><a href="index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></div>
												<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
												<i></i>
												<ul class="i_ul">
													<li>
														<a href="index.php?m=index&c=user&v=edit_travel_note&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">编辑</a>
													</li>
													<li class="delete" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
">删除</li>
												</ul>
											</div>
											<div class="user-text"><?php echo $this->_tpl_vars['item']['desc']; ?>
</div>
										</div>
									</div>
									<div class="img_item">
										<a href="index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
											<img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
">
										</a>
									</div>
									<div class="clear">
									</div>

								</div>
								<div class="num">
									<div class="hideed "><i></i>收藏</div>
									<div class="theory "><i></i>评论</div>
									<div class="spot zan" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['item']['top_num']; ?>
" id="zan<?php echo $this->_tpl_vars['item']['id']; ?>
"><i></i><span class="top_num"><?php echo $this->_tpl_vars['item']['top_num']; ?>
</span></div>
									<div class="Read one"><i></i><?php echo $this->_tpl_vars['item']['show_num']; ?>
</div>
								</div>
							</div>

							<?php endforeach; endif; unset($_from); ?> <?php endif; ?>

						</div>
						<!-- 页码 -->
						<?php if ($this->_tpl_vars['multipage']): ?>
						<div class="pages" style="margin-top: 10px;">
							<ul>
								<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
								<li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
" <?php endif; ?>>
									<a href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a>
								</li>
								<?php endforeach; endif; unset($_from); ?>
								<li class="pages-form">
									到<input class="inp" type="text" id="pages">页
									<input class="btn" type="button" id="pageqr" value="确定">
								</li>
							</ul>
						</div>
						<?php endif; ?>
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
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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