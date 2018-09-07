<?php /* vpcvcms compiled created on 2018-07-30 16:13:22
         compiled from index/star.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/star.tpl', 49, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>达人邦_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
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
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="main">
			<?php $_from = C::T('ad')->getList(array('tagname' => 'starlide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
			<div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
			<?php endforeach; endif; unset($_from); ?>
			<div class="cur">
				<div class="wp">
					<a href="/">首页</a> &gt; <span>达人邦<?php if ($this->_tpl_vars['keyword']): ?>【<?php echo $this->_tpl_vars['keyword']; ?>
】<?php endif; ?></span>
				</div>
			</div>
			<div class="wp">
				<div class="m-master-qm">
					<div class="col-l">
						<div class="con">
							<ul class="ul-imgtxt2-qm list_v">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
								<li>
									<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank"><i class="icon1" style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);border-radius: 50%;background-size: 100%;"></i></a>
									<div class="txt p_btn">
										<div class="tit">
											<span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
											<h3><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</a></h3>
										</div>
										<p data-src="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
										<dl>
											<?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
											<dd <?php if ($this->_tpl_vars['vo']['picnum'] == 4 || $this->_tpl_vars['vo']['picnum'] == 2 || $this->_tpl_vars['vo']['picnum'] == 6): ?>style="width: 50%;" <?php endif; ?>>
												<a class="lightbox" href="<?php echo $this->_tpl_vars['v']; ?>
" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
">
													<div class="pic" <?php if ($this->_tpl_vars['vo']['picnum'] == 1): ?>style="width: 100%;height: 100%;" <?php endif; ?><?php if ($this->_tpl_vars['vo']['picnum'] == 4 || $this->_tpl_vars['vo']['picnum'] == 2 || $this->_tpl_vars['vo']['picnum'] == 6): ?>style="width: 100%;height: 150px;" <?php endif; ?>><img src="<?php echo $this->_tpl_vars['v']; ?>
" alt=""></div>
												</a>
											</dd>
											<?php endforeach; endif; unset($_from); ?>
										</dl>
										<div class="g-operation-qm">
											<a href="javascript:;" class="look"><i></i><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</a>
											<a href="javascript:;" class="zan" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
"><i></i><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</a>
										</div>
									</div>
								</li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
							<!-- 页码 -->
							<?php if ($this->_tpl_vars['multipage']): ?>
							<div class="pages">
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
					</div>
					<div class="col-r">
						<?php if ($this->_tpl_vars['tjstar']['0']['username']): ?>
						<h3 class="g-tit1-qm">本周推荐达人</h3>
						<div class="m-pic1-qm">
							<div class="pic">
								<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tjstar']['0']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><img src="<?php echo $this->_tpl_vars['tjstar']['0']['avatar']; ?>
" alt=""></a>
							</div>
							<span><?php echo $this->_tpl_vars['tjstar']['0']['username']; ?>
</span>
							<p><?php echo $this->_tpl_vars['tjstar']['0']['autograph']; ?>
</p>
						</div>
						<?php endif; ?>
						<h3 class="g-tit1-qm">热门旅游地</h3>
						<ul class="ul-imgtxt1-qm">
							<?php $_from = $this->_tpl_vars['tourismlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
							<li>
								<a href="/index.php?m=index&c=index&v=star&keyword=<?php echo $this->_tpl_vars['vo']['keyword']; ?>
">
									<div class="pic">
										<img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="">
										<span><?php echo $this->_tpl_vars['vo']['title']; ?>
</span>
									</div>
								</a>
							</li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="h81"></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
					window.location.href = "/index.php?m=index&c=index&v=star&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=" + page;
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