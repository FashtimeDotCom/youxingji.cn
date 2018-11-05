<?php /* vpcvcms compiled created on 2018-10-19 09:02:24
         compiled from index/new_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/new_index.tpl', 134, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title><?php echo Core_Config::get('index_seotitle', 'site', '首页');?>_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/resource/css/style.css?v1" />
	<link rel="stylesheet" href="/resource/css/home.css?v1.2" />
	<link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">

	<!--<link rel="stylesheet" href="/resource/css/swim_index.css">-->
	<!--百度统计-->
	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "https://hm.baidu.com/hm.js?0154d439703cde1da00f954c61ca8b64";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>

	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<!--lightbox开始-->
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
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
		<div class="banner swiper-container">
			<div class="swiper-wrapper">
				<?php $_from = C::T('ad')->getList(array('tagname' => 'homeslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
				<div class="swiper-slide"><img src=" <?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" /></div>
				<?php endforeach; endif; unset($_from); ?>

			</div>
			<div class="swiper-button-next" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
			<div class="swiper-button-prev" style="background:rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
		</div>
		<div class="index_warp">
			<div class="index_box">
				<?php if ($this->_tpl_vars['traffic']['customer_head']): ?>
				<div class="user_img">
					<?php $_from = $this->_tpl_vars['traffic']['customer_head']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
						<img src=" <?php if ($this->_tpl_vars['item']['headpic']): ?><?php echo $this->_tpl_vars['item']['headpic']; ?>
<?php else: ?>resource/images/img-lb2.png<?php endif; ?>" />
					</a>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<?php endif; ?>

				<div class="text-center">
					平台注册用户共有<span id="user"></span>名,超<span id="Tourist"></span>名游客浏览过<span id="dynamic"></span>条平台动态
				</div>
				<?php if ($this->_tpl_vars['traffic']['star_head']): ?>
				<div class="user_img">
					<?php $_from = $this->_tpl_vars['traffic']['star_head']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
					<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
						<img src=" <?php if ($this->_tpl_vars['vo']['headpic']): ?><?php echo $this->_tpl_vars['vo']['headpic']; ?>
<?php else: ?>resource/images/img-lb2.png<?php endif; ?>" />
					</a>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row-a1">
			<div class="">
				<h3 class="index_title">免费游<span>Unique  Tours</span></h3>
				<div class="index_text">
					<div class="index_img_box">
						<img src="/resource/images/1.png"/>
					</div>
					
					<a href="index.php?m=index&c=swim&v=index">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<div class="m-pic1 swiper-container" style="padding-top: 1rem;">
					<div class="swiper-wrapper" id="swim">
				
					</div>
				</div>

			</div>
		</div>
		

		<div class="row-a1">
			<div class="wp">
				<h3 class="index_title">达人邦<span>Exciting  Experiences</span></h3>
				<div class="index_text">
					<div class="index_img_box">
						<img src="/resource/images/2.png"/>
					</div>
					
					<a href="/index.php?m=index&c=index&v=star">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<ul class="ul-txt1 ">
					<?php $_from = $this->_tpl_vars['starlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
					<li >
						<div class="con">
							<div class="user">
								<div class="pic">
									<div class="user-info">
										<div class="txt-l">
											<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</h4>
											<a class="btn-follow" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
											<p><span><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</p>
										</div>
										<div class="txt-r">
											<i class="icon1"></i>
											<i class="icon2"></i>
											<p><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'autograph') : smarty_modifier_helper($_tmp, 'autograph')); ?>
...</p>
										</div>
									</div>
									<div class="img">
										<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><img src=" <?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
" alt=""></a>
									</div>
								</div>
								<div class="txt">
									<span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
									<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</h4>
								</div>
							</div>
							<div class="det" >
								<p data-src="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
							</div>
							<dl class="dl-pic1">
								<?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
								<dd>
									<a class="lightbox" href="<?php echo $this->_tpl_vars['v']; ?>
" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
"><img src=" <?php echo $this->_tpl_vars['v']; ?>
" alt=""></a>
								</dd>
								<?php endforeach; endif; unset($_from); ?>
							</dl>
							<div class="num">
								<div class="hideed ">收藏</div>
								<div class="theory ">评论</div>
								<div class="spot zan" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
" id="zan<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</div>
								<div class="Read one"><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</div>
							</div>
						</div>
					</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>

				<?php if ($this->_tpl_vars['travel_info']): ?> <?php $_from = $this->_tpl_vars['travel_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

				<div class="item">
					<a target="_blank" href="index.php?m=index&c=index&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="item_left">
							<div class="The_label">
								达人带你去旅行
							</div>
							<img src=" <?php echo $this->_tpl_vars['item']['thumbfile']; ?>
" class=" img">
						</div>
						<div class="item_right">
							<div class="content">
								<div class="product_name">
									<h3><?php echo $this->_tpl_vars['item']['title']; ?>
</h3>
									<span><?php echo $this->_tpl_vars['item']['desc']; ?>
</span>
									<div class="Country"></div>
								</div>
								<div class="masterinfo">
									<div class="headpic">
										<img src=" <?php echo $this->_tpl_vars['item']['headpic']; ?>
">
									</div>
									<div class="mastertag">
										<div class="mastername">
											达人—<?php echo $this->_tpl_vars['item']['username']; ?>

										</div>
										<ul class="tag">
											<?php $_from = $this->_tpl_vars['item']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
											<li><?php echo $this->_tpl_vars['v']; ?>
</li>
											<?php endforeach; endif; unset($_from); ?>
										</ul>
									</div>
								</div>
								<p class="explain"><?php echo $this->_tpl_vars['item']['autograph']; ?>
</p>
							</div>
						</div>
					</a>
				</div>

				<?php endforeach; endif; unset($_from); ?> <?php endif; ?>

				<div class="yhslider">
					<?php $_from = C::T('ad')->getList(array('tagname' => 'homeo2'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
					<div class="row-a3 item">
						<a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
"/></a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
		</div>

		<!--<div class="row-a2">
			<div class="wp">
				<h3 class="index_title">游画<span>Colorful  Snapshots</span></h3>
				<div class="index_text">
					<div class="index_img_box">
						<img src="/resource/images/4.png"/>
					</div>
					
					<a href="/index.php?m=index&c=index&v=scenery">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<ul class="ul-txt2">
					<?php $_from = $this->_tpl_vars['scenery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li>
						<a href="javascript:;">
							<div class="pic"><img class="youhua" data-title="<?php echo $this->_tpl_vars['v']['title']; ?>
" data-price="<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?>" data-name="<?php echo $this->_tpl_vars['v']['name']; ?>
" data-size="<?php echo $this->_tpl_vars['v']['size']; ?>
" data-place="<?php echo $this->_tpl_vars['v']['place']; ?>
" data-src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" src=" <?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" data-from="<?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?>"></div>
							<div class="txt">
								<p><span>作品：</span> <?php echo $this->_tpl_vars['v']['title']; ?>
<span class="red">价格：￥<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?></span></p>
								<p onclick="href('/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['v']['wid']; ?>
')"><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p>
								<p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p>
								<p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>
								<p><span>来源：</span> <?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?></p>
								<div class="num">
									<div class="hideed ">收藏</div>
									<div class="spot dian" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['v']['top_num']; ?>
" id="zan<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['top_num']; ?>
</div>
									<div class="Read two"><?php echo $this->_tpl_vars['v']['show_num']; ?>
</div>
								</div>
							</div>
						</a>
					</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>

				<?php if ($this->_tpl_vars['sketch_list']): ?> <?php $_from = $this->_tpl_vars['sketch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

				<div class="item">
					<a target="_blank" href="index.php?m=index&c=index&v=sketch_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="item_left">
							<div class="The_label">
								名师带你去写生
							</div>
							<img src=" <?php echo $this->_tpl_vars['item']['thumbfile']; ?>
" class=" img">
						</div>
						<div class="item_right">
							<div class="content">
								<div class="product_name">
									<h3><?php echo $this->_tpl_vars['item']['title']; ?>
</h3>
									<span><?php echo $this->_tpl_vars['item']['desc']; ?>
</span>
									<div class="Country"></div>
								</div>
								<div class="masterinfo">
									<div class="headpic">
										<img src="<?php echo $this->_tpl_vars['item']['pics']; ?>
">
									</div>
									<div class="mastertag">
										<div class="mastername">
											名师—<?php echo $this->_tpl_vars['item']['name']; ?>

										</div>
										<ul class="tag">
											<?php $_from = $this->_tpl_vars['item']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
											<li><?php echo $this->_tpl_vars['v']; ?>
</li>
											<?php endforeach; endif; unset($_from); ?>
										</ul>
									</div>
								</div>
								<p class="explain"><?php echo $this->_tpl_vars['item']['introduction']; ?>
</p>
							</div>
						</div>
					</a>
				</div>

				<?php endforeach; endif; unset($_from); ?> <?php endif; ?>

			</div>
		</div>-->
		<div class="row-a5" style="background-image:url(/resource/images/bg03.jpg);">
			<div class="wp">
				<h3 class="index_title">达人视频<span>Impressed  Video</span></h3>
				<div class="index_text">
					<div class="index_img_box">
						<img src="/resource/images/5.png"/>
					</div>
					
					<a href="/index.php?m=index&c=index&v=tv">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<ul class="ul-pic1">
					<?php $_from = $this->_tpl_vars['tv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li>
						<a class="js-video" href="#m-pop1-hlg" data-src="<?php echo $this->_tpl_vars['v']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
">
							<img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
							<div class="txt">
								<h4><?php echo $this->_tpl_vars['v']['title']; ?>
</h4>
								<i></i>
							</div>
						</a>
					</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
		<div class="row-a6">
			<div class="wp">
				<h3 class="index_title">达人游记<span>Nostalgic  Profiles</span></h3>
				<div class="index_text" style="margin-bottom: 0px;">
					<div class="index_img_box">
						<img src="/resource/images/6.png"/>
					</div>
					
					<div class="y">
						<?php echo $this->_tpl_vars['y']; ?>

					</div>
					<a href="/index.php?m=index&c=index&v=ryt">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<div class="m-read-qm" style="background-image:url(/resource/images/index2.0/ri_bg.png); margin-top: 0px;">
					<!--<div class="tit">
						<div class="wp">
							<div class="con">
								<h3><span><?php echo $this->_tpl_vars['y']; ?>
</span><i></i></h3>
								<dl>
									<dd>
										<a href="/index.php?m=index&c=index&v=ryt&y=2018">2018</a>
									</dd>
								</dl>
							</div>
							<span class="data"></span>
						</div>
					</div>-->
					<div class="wp">
						<ul class="ul-txt1-qm TAB_CLICK" id="tabcon">
							<?php $_from = $this->_tpl_vars['month_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?> <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['y']): ?> <?php if ($this->_tpl_vars['month'] >= $this->_tpl_vars['k']): ?>
							<li class="ls <?php if ($this->_tpl_vars['month'] == $this->_tpl_vars['k']): ?>on<?php endif; ?>">
								<a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a>
							</li>
							<?php else: ?>
							<li class="no">
								<a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a>
							</li>
							<?php endif; ?> <?php else: ?>
							<li class="ls <?php if ($this->_tpl_vars['k'] == 1): ?>on<?php endif; ?>">
								<a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a>
							</li>
							<?php endif; ?> <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
					<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?> <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['y']): ?>
					<div class="tabcon <?php if ($this->_tpl_vars['month'] != $this->_tpl_vars['k']): ?>dn<?php endif; ?>">
						<?php else: ?>
						<div class="tabcon <?php if ($this->_tpl_vars['k'] != 1): ?>dn<?php endif; ?>">
							<?php endif; ?>

							<div class="wp">
								<ul class="ul-imgtxt3-qm" id="rytlist">
									<?php $_from = $this->_tpl_vars['vo']['table']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
									<li>
										<div class="pic"></div>
									</li>
									<?php endforeach; endif; unset($_from); ?> <?php $_from = $this->_tpl_vars['vo']['time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?> <?php if ($this->_tpl_vars['v']['status'] == 0): ?>
									<li>
										<div class="pic">
											<i class="icon1"><?php echo $this->_tpl_vars['v']['days']; ?>
</i>
										</div>
									</li>
									<?php else: ?>
									<li>
										<div class="pic">
											<a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">
												<img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
												<i><?php echo $this->_tpl_vars['v']['days']; ?>
</i>
												<div class="txt">
													<span><?php echo $this->_tpl_vars['v']['keyword']; ?>
</span>
												</div>
											</a>
										</div>
									</li>
									<?php endif; ?> <?php endforeach; endif; unset($_from); ?> <?php $_from = $this->_tpl_vars['vo']['other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
									<li>
										<div class="pic"></div>
									</li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
							</div>
						</div>
						<?php endforeach; endif; unset($_from); ?>
					</div>
					<div class="h81"></div>
				</div>
			</div>
		</div>
		<div class="row-a2">
			<div class="wp">
				<h3 class="index_title">独家旅行<span>Tailored  Planet</span></h3>
				<div class="index_text">
					<div class="index_img_box">
						<img src="/resource/images/3.png"/>
					</div>
					
					<a href="javascript:void(0)">
						<span>更多</span>
					</a>
					<div class="clear">
						
					</div>
				</div>
				<div class="index_pic">
					<div class="tab">
						<ul class="tab_list">
							<?php if ($this->_tpl_vars['label_list']): ?> <?php $_from = $this->_tpl_vars['label_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<li class="<?php if ($this->_tpl_vars['key'] == 0): ?>onn<?php endif; ?>"><?php echo $this->_tpl_vars['item']['name']; ?>
</li>
							<?php endforeach; endif; unset($_from); ?> <?php endif; ?>

						</ul>
					</div>
					<div class="tab_con">
						<?php if ($this->_tpl_vars['journey_info']): ?> <?php $_from = $this->_tpl_vars['journey_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

						<div class="tab_box <?php if ($this->_tpl_vars['key'] != 0): ?>hide<?php endif; ?>">
							<div class="tab_box_left">
								<img src=" <?php echo $this->_tpl_vars['item']['pics']; ?>
" />
							</div>
							<div class="tab_box_right">
								<h3><?php echo $this->_tpl_vars['item']['title']; ?>
</h3>
								<span><?php echo $this->_tpl_vars['item']['desc']; ?>
</span> <?php if ($this->_tpl_vars['item']['info']): ?>

								<div class="right_box">
									<?php if ($this->_tpl_vars['item']['info'][0]): ?>
									<a href="index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['item']['info'][0]['id']; ?>
">
									<div class="right_box_img one">
										<img src=" <?php echo $this->_tpl_vars['item']['info'][0]['tjpic']; ?>
" />
										<div class="right_box_text one_text">
											<p><?php echo $this->_tpl_vars['item']['info'][0]['title']; ?>
</p>
											<p><?php echo $this->_tpl_vars['item']['info'][0]['description']; ?>
</p>
										</div>
									</div>
									</a>
									<?php endif; ?>

									<?php if ($this->_tpl_vars['item']['info'][1]): ?>
									<a href="index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['item']['info'][1]['id']; ?>
">
									<div class="right_box_img two">
										<img src=" <?php echo $this->_tpl_vars['item']['info'][1]['tjpic']; ?>
" />
										<div class="right_box_text two_text">
											<p><?php echo $this->_tpl_vars['item']['info'][1]['title']; ?>
</p>
											<p><?php echo $this->_tpl_vars['item']['info'][1]['description']; ?>
</p>
										</div>
									</div>
									</a>
									<?php endif; ?>

								</div>

								<?php endif; ?>

							</div>
						</div>

						<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
					</div>

				</div>

			</div>
		</div>
		<!--<div class="row-a7">
			<div class="wp">
				<h3 class="index_title">玩转明信片<span>Postcards  for  Fun</span></h3>
				<div class="index_text">
					<div  class="index_img_box">
						<img src="/resource/images/7.png"/>
					</div>
					<div class="clear">
						
					</div>
					
				</div>
				<div class="a6_box">
					<a href="index.php?m=index&c=index&v=mxp"><img src="/resource/images/index2.0/wan_banner.png" /></a>
				</div>
			</div>
		</div>-->
		<!-- 视频弹窗 -->
		<div class="m-pop1-hlg" id="m-pop1-hlg">
			<div class="con1">
				<iframe src='' frameborder=0 'allowfullscreen'></iframe>
				<div class="close js-close"></div>
			</div>
		</div>
		<!-- end -->
		<!-- 游画弹窗 -->
		<div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
			<div class="con">
				<div class="pic">
					<img id="wpics" src="" alt="" />
				</div>
				<div class="txt">
					<p id="wtitle"></p>
					<p id="wuser"></p>
					<p id="wsize"></p>
					<p id="wplace"></p>
					<p id="price"></p>
					<p><span>购买热线：</span>4009-657-018</p>
					<p id="from"></p>
					<p class="ccc">购买画作，暂不提供在线支付，如有需要请拔打购买热线。</p>
				</div>
			</div>
			<div class="close"></div>
		</div>
		<!-- end -->
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<script type="text/javascript">
		$(".det p").click(function() {
			var str=$(this).data("src");
			window.location.href=str;
		})
		var host = window.location.host;
		$(document).ready(function() {

			//获取当前日期.
			//				var mydate = new Date();
			//				var _y = mydate.getFullYear();
			//				var _m = mydate.getMonth() + 1;
			//				var _d = mydate.getDate();
			//				$("#currentDate").text(_y + "年" + _m + "月" + _d + "日");
			//				getryt(_y + '-' + _m + '-' + _d, _y);
			var $asd = $(".tab_list li");
			$asd.click(function() {
				$(this).addClass("onn").siblings().removeClass("onn");
				var $index = $asd.index(this);
				var $content = $(".tab_con .tab_box");
				$content.eq($index).show().siblings().hide();
			});
		});
		$(".num .theory,.num .hideed").click(function() {
			layer.msg('功能正在开发，敬请期待');

		})
		
		$("#tabcon li ").click(function() {
			var day = $(this).text();
			var url = "//" + host + '/' + 'index.php?m=api&c=index&v=getryt_list&month=' + day;
			$.ajax({
				url: url,
				type: "GET",
				success: function(res) {
					var data = JSON.parse(res);
					$("#rytlist").html('');
					var html = '';
					for(i in data) {
						html += "<li><div class='pic' data-status=" + data[i].status + "><a href=/index.php?m=index&c=index&v=rytdetai&id=" + data[i].id + "><img src=" + data[i].pics + "><i>" + data[i].days + "</i><div class='txt'><span>" + data[i].keyword + "</span></div></a></div></li>"
					}
					$("#rytlist").append(html);
					changes();
				}
			})

		});

		function changes() {
			$("#rytlist li").each(function() {
				var statu = $(this).find(".pic").data('status');
				if(statu == 0) {
					$(this).find(".pic").html('');
				}
			});

		}
		//			function bind_td() {
		//				$("#tabcon li a").on('click', function(e) {
		//
		//					if($(this).attr('isclick') == 1) {
		//						return false;
		//					}
		//					var day = $(this).text();

		//					if(day.length == 1) day = '0' + day;
		//					das = cale.Year + "-" + cale.Month + "-" + day; // 带-日期
		//					$("#currentDate").text(cale.Year + "年" + cale.Month + "月" + day + "日");
		//					getryt(das, cale.Year);
		//					w = china_week[$(this).index()];
		//					day > 0 && loadinfo(day, w);
		//					$(this).parents('.Calendar').find('td').removeClass('onToday');
		//					day > 0 && $(this).addClass('onToday');
		//				});
		//			}

		var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';
		//var src = "http://test.youxingji.cn/index.php?m=api&c=index&v=getyzz";
		var data = {
			type: "pc"
		}
		$.ajax({
			url: src,
			data: data,
			type: "GET",
			success: function(data) {
				var sdata = JSON.parse(data);
				var html = '';
				for(i in sdata) {
					html += "<div class='swiper-slide'data-id=" + sdata[i].id + "><a href=" + sdata[i].linkurl + "><img src=" + sdata[i].url + " /></a></div>"
				}
				$("#swim").append(html);
				var swiper1 = new Swiper('.m-pic1', {
					slidesPerView: 'auto',
					centeredSlides: true,
					initialSlide: 1,
					loop: true,
					spaceBetween: 30,

				});
			}
		});
	</script>
	<script type="text/javascript">
		$('.youhua').click(function(event) {
			/* Act on the event */
			var src = $(this).attr('data-src');
			var title = $(this).attr('data-title');
			var name = $(this).attr('data-name');
			var size = $(this).attr('data-size');
			var place = $(this).attr('data-place');
			var price = $(this).data('price');
			var from = $(this).data("from");
			$('#price').html("<span>价格：</span> " + price);
			$('#from').html("<span>来源：</span> " + from);
			$('#wpics').attr('src', src);
			$('#wtitle').html("<span>作品：</span> " + title);
			$('#wuser').html("<span>作者：</span> " + name);
			$('#wsize').html("<span>尺寸：</span> " + size);
			$('#wplace').html("<span>写生地点：</span> " + place);
			$('#m-pop1-hlg2').fadeIn();
		});
		$('#m-pop1-hlg2 .close').click(function(event) {
			/* Act on the event */
			$(this).parent('.m-pop1-hlg').fadeOut();
		});
	</script>
	<link rel="stylesheet" href="/resource/css/slick.css">
	<script src="/resource/js/slick.min.js"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/js/lib/countUp.min.js" type="text/javascript" charset="utf-8"></script>
	<script>
		$(document).ready(function() {
			//      $('.banner .slider').slick({
			//          dots: true,
			//          arrows: false,
			//          autoplay: true,
			//          fade: true,
			//          slidesToShow: 1,
			//          autoplaySpeed: 3000,
			//          pauseOnHover: false,
			//          cssEase: 'linear',
			//          lazyLoad: 'ondemand'
			//      });
			$('.yhslider').slick({
				dots: true,
				arrows: false,
				autoplay: true,
				fade: true,
				slidesToShow: 1,
				autoplaySpeed: 3000,
				pauseOnHover: false,
				cssEase: 'linear',
				lazyLoad: 'ondemand'
			});
			var options = {
				useEasing: true,
				useGrouping: true,
				separator: ',',
				decimal: '.',
				prefix: '',
				suffix: ''
			};
			var src = "//" + host + '/' + 'index.php?m=api&c=traffic&v=get_traffic';
			$.ajax({
				url: src,
				type: "GET",
				dataType: "json",
				success: function(res) {
					//var sdata = JSON.parse(data);
					var data = res.data;
					var userval = data.customer_num;
					var Touristval = data.visit_num;
					var dynamicval = data.platform_num;
					var user = new CountUp("user", 0, userval, 0, 2.5, options);
					var Tourist = new CountUp("Tourist", 0, Touristval, 0, 2.5, options);
					var dynamic = new CountUp("dynamic", 0, dynamicval, 0, 2.5, options);
					user.start();
					Tourist.start();
					dynamic.start();
				}
			});
		});

		function follows(bid, obj) {
			$.post("/index.php?m=api&c=index&v=follow", {
				'bid': bid
			}, function(data) {
				if(data.status == 0) {
					layer.msg(data.tips);
				} else if(data.status == 1) {
					$(obj).html('已关注');
				} else if(data.status == 2) {
					$(obj).html('<b>+</b> 关注');
				}
			}, "JSON");
		}
		$('.zan').click(function(event) {
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

		});
		$('.dian').click(function(event) {
			var id = $(this).attr('data-id');
			var num = parseInt($(this).attr('data-num'));
			var obj = $(this);
			$.post("/index.php?m=api&c=index&v=zan_scenery", {
				'id': id
			}, function(data) {
				if(data.status == 1) {
					$('#zan' + id).html((num + 1));
					$('#zan' + id).addClass("two");
					layer.msg(data.tips);
				} else if(data.status == 2) {
					$('#zan' + id).addClass("two");
					layer.msg(data.tips);
				} else {
					layer.msg(data.tips);
				}
			}, "JSON");

		});
	</script>
	<!-- 弹窗 -->
	<link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>

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
		var swiper2 = new Swiper('.banner', {
			speed: 3000,
			autoplay: {
				delay: 3000
			},
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
		var swiper3 = new Swiper('.m-pic1', {
			slidesPerView: 'auto',
			centeredSlides: true,
			initialSlide: 1,
			loop: true,
			spaceBetween: 30,
			//				speed: 3500,
			//				autoplay: {
			//					delay: 3500
			//				},
			//				pagination: {
			//					el: '.swiper-pagination',
			//					clickable: true,
			//				},
		});
	</script>
	<!-- 弹窗 end-->
	<!-- 日历 -->
	<script type="text/javascript" src="/resource/js/date.js"></script>
</body>
</html>