<?php /* vpcvcms compiled created on 2019-01-03 17:24:55
         compiled from swim/index.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
	<title>免费游</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
  	<link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/resource/css/swim/main.css"/>
    <link rel="stylesheet" type="text/css" href="/resource/css/media1280.css"  media="screen and (min-width: 1200px) and (max-width: 1299px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css"  media="screen and (min-width: 1300px) and (max-width: 1399px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css"  media="screen and (min-width: 1400px) and (max-width: 1499px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css"  media="screen and (min-width: 1500px) and (max-width: 1699px)">
    <script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
    	.whiteSpace{white-space: pre-wrap!important;word-wrap: break-word!important;*white-space:normal!important;}
    	/*模仿朋友圈   九宫格显示    防止图片变形*/
		.figure{padding-bottom: ; /* 关键就在这里 */
			  	background-position: center;
			  	background-repeat: no-repeat;
			  	background-size: cover;}
		.user-head .Head_portrait{width: 3.6rem;height: 2.275rem;display: block;}
    </style>
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
	<?php if ($this->_tpl_vars['info']): ?>
		<?php $_from = $this->_tpl_vars['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<div class="item" style="background: url(<?php echo $this->_tpl_vars['item']['img_url']; ?>
) no-repeat center center;background-size:100% 100%;">
			<div class="box">
				<div class="box-text">
					<div class="box-title"><?php echo $this->_tpl_vars['item']['name']; ?>
</div>
					<div class="txt whiteSpace"><?php echo $this->_tpl_vars['item']['desc']; ?>
</div>
					<div class="btn">
						<input type="button" data-url="index.php?m=index&c=index&v=recruiting&id=<?php echo $this->_tpl_vars['item']['view_more']; ?>
" class="see" id="" value="查看更多" <?php if ($this->_tpl_vars['item']['status'] == 0): ?>disabled<?php endif; ?> /><!--http://www.youxingji.cn/index.php?m=index&c=index&v=recruiting&id=1-->
						<input type="button" data-url="<?php echo $this->_tpl_vars['item']['sign_in_url']; ?>
" class="signup" id="" value="我要报名" <?php if ($this->_tpl_vars['item']['status'] == 0): ?>disabled<?php endif; ?> />
					</div>
				</div>

				<div class="box-user">
					<div class="user-bg"></div>
					<?php if ($this->_tpl_vars['item']['info']): ?> <!--有设置-->
					<div class="user-info">
						<div class="user-head">
							<a class="Head_portrait figure" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['info']['uid']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']['info']['headpic']; ?>
);"></a>
							<div class="user_name">
								<h1>种子选手</h1><!--暂时写死-->
								<h1><?php echo $this->_tpl_vars['item']['info']['username']; ?>
</h1>
							</div>
						</div>
						<div class="user-text whiteSpace"><?php echo $this->_tpl_vars['item']['info']['describes']; ?>
</div>
						<ul class="row">
							<?php $_from = $this->_tpl_vars['item']['info']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
?>
							<li><a><img src="<?php echo $this->_tpl_vars['val']; ?>
"/></a></li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>

					<?php else: ?>
					<div class="user-info">
						<div class="user-head">
							<a class="Head_portrait figure" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['info']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']['info']['headpic']; ?>
);"></a>
							<div class="user_name">
								<h1>种子选手</h1><!--暂时写死-->
								<h1>柬埔寨</h1><!--暂时写死-->
							</div>
						</div>
						<div class="user-text whiteSpace">
							大概每个自由的人，血液里都带着风。自18岁第一次离开家乡，到现在几乎把全中国都走遍；近十年更走出国门深度探索，至今在60多个国家留下美丽的足迹。
						</div>
						<ul class="row">
							<li><img src="/resource/images/swim/exploded view1.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view2.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view3.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view4.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view5.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view6.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view7.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view8.jpg"/></li><!--暂时写死-->
							<li><img src="/resource/images/swim/exploded view9.jpg"/></li><!--暂时写死-->
						</ul>
					</div>
					<?php endif; ?>
					<!--没有设置推荐，或者活动还没有开始-->
					<input type="button" name="live" data-url="<?php if ($this->_tpl_vars['item']['living']): ?>/index.php?m=index&c=swimdetail&v=detail&act_id=<?php echo $this->_tpl_vars['item']['living']['activity_id']; ?>
&tar_id=<?php echo $this->_tpl_vars['item']['living']['target_id']; ?>
&u=<?php echo $this->_tpl_vars['item']['user_id']; ?>
<?php else: ?>javascript:void(0)<?php endif; ?>" class="live" id="live" value="更多直播" style="background-image: url('/resource/images/swim/icon_xm.png');" />
					<!--渲染三级页面后改-->
				</div>
			</div>
			<div class="nav_item">
				<div class="swiper-container swimswiper">
				  <ul class="swiper-wrapper ">
	    			<?php if ($this->_tpl_vars['item']['son']): ?>
						<?php $_from = $this->_tpl_vars['item']['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
		    			<li class="swiper-slide">
							<h1><?php echo $this->_tpl_vars['vo']['name']; ?>
</h1>
							<div class="img">
	                            <a  href="<?php if ($this->_tpl_vars['vo']['status'] == 0): ?>javascript:void(0)<?php else: ?>/index.php?m=index&c=swimdetail&v=detail&act_id=<?php echo $this->_tpl_vars['vo']['id']; ?>
&tar_id=<?php echo $this->_tpl_vars['vo']['target_id']; ?>
&u=<?php echo $this->_tpl_vars['vo']['user_id']; ?>
<?php endif; ?>" target="_blank" disabled="">
	                                <img src="<?php echo $this->_tpl_vars['vo']['small_img_url']; ?>
"/>
	                                <!--/index.php?m=index&c=swimdetail&v=detail&act_id=<?php echo $this->_tpl_vars['vo']['id']; ?>
&tar_id=<?php echo $this->_tpl_vars['vo']['target_id']; ?>
-->
	                            </a>
							</div>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
		    		</ul>
		    		 <div class="swiper-pagination"></div>
				    <!-- Add Arrows -->
				    <div class="swiper-button-next"></div>
				    <div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	</div>
	<script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		$(".btn input").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		});
		$(".live").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		});
		
		var swiper1 = new Swiper('.swimswiper', {
	      	slidesPerView: 4,
	      	initialSlide :0,
	      	spaceBetween: 30,
	      	slidesPerGroup: 1,
	      	loopFillGroupWithBlank: true,
	      	loop: true,
		    pagination: {
		       el: '.swiper-pagination',
		       clickable: true,
		    },
	      	navigation: {
	        	nextEl: '.swiper-button-next',
	        	prevEl: '.swiper-button-prev',
	      	},
	    });
	</script>
</body>
</html>