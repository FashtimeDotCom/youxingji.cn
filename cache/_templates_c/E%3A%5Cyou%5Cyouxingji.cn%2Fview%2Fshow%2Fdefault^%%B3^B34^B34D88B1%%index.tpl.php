<?php /* vpcvcms compiled created on 2018-11-07 10:08:13
         compiled from user/index.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的日志</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
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
					<ul><li class="on"><a href="/index.php?m=index&c=user&v=index">我的旅行日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=album">我的相册</a></li>
						<li><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
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
					<?php if ($this->_tpl_vars['user']['city'] == '' || $this->_tpl_vars['user']['autograph'] == '' || $this->_tpl_vars['user']['city'] == ''): ?>
					<div class="m-mine-sz">
						<div class="txt">
							<span class="name"><?php echo $this->_tpl_vars['user']['username']; ?>
</span>，这里是你的游行迹！<br>是记录你的旅行记忆，结交各路豪杰的地盘儿。现在开启游行迹旅程！
						</div>
						<a href="/index.php?m=index&c=user&v=setting" class="btn">完善个人资料</a>
					</div>
					<?php endif; ?> <?php if ($this->_tpl_vars['list']): ?>
					<div class="m-myday-sz s1 sz">
						<ul class="ul-imgtxt2-qm sz">
							<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
							<li class="travel_t<?php echo $this->_tpl_vars['vo']['id']; ?>
">
								<div class="txt">
									<div class="title">
										<a href="javascript:;" class="del" onclick="deleteTravel(<?php echo $this->_tpl_vars['vo']['id']; ?>
)"></a>
										<a class="tit" href="javascript:;"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
										<span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
【<a href="/index.php?m=index&c=user&v=edittravel&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank">编辑</a>】</span>
									</div>
									<p><?php echo $this->_tpl_vars['vo']['describes']; ?>
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
										<a href="" class="look"><i></i><?php echo $this->_tpl_vars['vo']['shownum']; ?>
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
					<?php else: ?>
					<div class="m-myday-sz">
						<div class="top">
							<a href="/index.php?m=index&c=user&v=addtravel" class="write"><i></i>写游记</a>
							<h3>我的游记</h3>
						</div>
						<div class="bg">此处还差一篇游记哦~</div>
					</div>
					<div class="m-myday-sz">
						<div class="top">
							<a href="/index.php?m=index&c=user&v=addtv" class="write"><i></i>发布旅拍TV</a>
							<h3>我的旅拍TV</h3>
						</div>
						<div class="bg2">
							<div class="text">留下你最原创旅拍 <br>这里有最原创的旅游推荐<br> 也有最温馨的旅行小贴士<br></div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
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
</body>
</html>