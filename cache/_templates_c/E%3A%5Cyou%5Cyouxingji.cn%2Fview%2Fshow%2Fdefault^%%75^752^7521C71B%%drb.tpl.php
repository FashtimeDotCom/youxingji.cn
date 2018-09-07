<?php /* vpcvcms compiled created on 2018-08-15 16:01:38
         compiled from swim/mobile/drb.tpl */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="renderer" content="webkit" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	    <meta name="format-detection" content="telephone=no" />
		<title>游主张</title>

		<link rel="stylesheet" type="text/css" href="/resource/m/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/resource/css/swim/m.css"/>
		<script src="/resource/js/move_rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
	<div class="header">
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        	<h3>游主张</h3>
	        <div class="g-top">
	            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
	            <div class="so">
	                <form action="/index.php">
	                    <input type="hidden" name="m" value="wap"/>
	                    <input type="hidden" name="c" value="index"/>
	                    <input type="hidden" name="v" value="search"/>
	                    <input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
	                    <input type="submit" value="" class="sub" />
	                </form>
	            </div>
	        </div>
        </div>
        <div class="main">
		<?php if ($this->_tpl_vars['info']): ?>
			<?php $_from = $this->_tpl_vars['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<div class="item">
				<div class="banner">
					<a href="<?php if ($this->_tpl_vars['item']['status'] == 0): ?>javascript:void(0)<?php else: ?><?php echo $this->_tpl_vars['item']['link_url']; ?>
<?php endif; ?>">
					<img src="<?php echo $this->_tpl_vars['item']['img_url']; ?>
"/>
					<div class="img_name">
						<?php echo $this->_tpl_vars['item']['name']; ?>

					</div>
					</a>
				</div>
				<div class="d-nav">
					<div data-url="<?php if ($this->_tpl_vars['item']['status'] == 0): ?>javascript:void(0)<?php else: ?><?php echo $this->_tpl_vars['item']['sign_in_url']; ?>
<?php endif; ?>">
						<div class="nav-img-box"><img src="/resource/images/swim/mobile/y_06.jpg"/></div>
							<div>我要报名</div>
					</div>
					<div data-url = "<?php if ($this->_tpl_vars['item']['living']): ?>/index.php?m=wap&c=swim&v=roster_list&activity_id=<?php echo $this->_tpl_vars['item']['living']['activity_id']; ?>
<?php else: ?>javascript:void(0)<?php endif; ?>">
						<a><div class="nav-img-box"><img src="/resource/images/swim/mobile/y_08.jpg"/></div>
							<div>名单公布</div></a>
					</div>
					<div data-url="<?php if ($this->_tpl_vars['item']['living']): ?>/index.php?m=wap&c=swimdetail&v=detail&act_id=<?php echo $this->_tpl_vars['item']['living']['activity_id']; ?>
&tar_id=<?php echo $this->_tpl_vars['item']['living']['target_id']; ?>
&u=<?php echo $this->_tpl_vars['item']['user_id']; ?>
<?php else: ?>javascript:void(0)<?php endif; ?>">
						<a><div class="nav-img-box"><img src="/resource/images/swim/mobile/y_10.jpg"/></div>
							<div>行程直播</div></a>
					</div>
				</div>
				<div class="title-nav">
					<div class="title">
						更多精彩活动
					</div>
					
					<div class="swiper-container">
						<ul id="list" class="swiper-wrapper">
							<?php if ($this->_tpl_vars['item']['son']): ?>
								<?php $_from = $this->_tpl_vars['item']['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
									<li class="swiper-slide " data-url ="<?php if ($this->_tpl_vars['vo']['status'] == 0): ?>javacript:void(0)<?php else: ?>/index.php?m=wap&c=swimdetail&v=detail&act_id=<?php echo $this->_tpl_vars['vo']['id']; ?>
&tar_id=<?php echo $this->_tpl_vars['vo']['target_id']; ?>
&u=<?php echo $this->_tpl_vars['vo']['user_id']; ?>
<?php endif; ?>">
										<div class="list-img-box"><img src="<?php echo $this->_tpl_vars['vo']['small_img_url']; ?>
"/></div>
										<span class="txt-next <?php if ($this->_tpl_vars['vo']['status'] == 0): ?> list-img-box-bg<?php endif; ?>" ><?php echo $this->_tpl_vars['vo']['name']; ?>
</span>
									</li>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
        </div>
   		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script type="text/javascript">
    	$("#list li").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		})
    	$(".d-nav div").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		})
    	var swiper = new Swiper('.swiper-container', {
	      	slidesPerView: 5,
	      	initialSlide :0,
	      	spaceBetween: 30,
	      	slidesPerGroup: 1,
	      	loopFillGroupWithBlank: true,
	      	loop: true,
	    });
    </script>
	</body>
</html>