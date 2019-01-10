<?php /* vpcvcms compiled created on 2018-12-29 14:11:03
         compiled from index/new_star.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/new_star.tpl', 35, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人邦_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/new_star.css" />
</head>
<body onkeydown="on_return();">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="main">
        <?php $_from = C::T('ad')->getList(array('tagname' => 'starlide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
      	<?php endforeach; endif; unset($_from); ?>

		<p class="totalTitle">已有 <span class="amount"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</span> 人跻身达人邦</p>
		<input type="hidden" name="cur_page" id="cur_page" value="<?php echo $this->_tpl_vars['page_info']['cur_page']; ?>
">
		
        <!--达人列表-->
        <div class="list fix">
        	<div class="box fix" data-nowpage="1">
        		<div class="boxxxxxx fix">
        			<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="modules">
						<a class="figure headPortrait borderRadius50" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
)
								;" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" title="头像" target="_blank"></a>
						<p class="name"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><?php echo $this->_tpl_vars['item']['username']; ?>
</a></p>
						<p class="synopsis omit lineNumber4 whiteSpace"><?php echo $this->_tpl_vars['item']['autograph']; ?>
</p>
					</div>
					<?php endforeach; endif; unset($_from); ?>
        		</div>
				<p class="tips"></p>
        	</div>
			
	        <!-- 页码 -->
			<div class="pagination">
				<?php if ($this->_tpl_vars['multipage']): ?>
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
					<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page('pre')" data-val="上一页"></a></li>

						<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
						<li class="<?php if ($this->_tpl_vars['page']['2']): ?><?php echo $this->_tpl_vars['page']['2']; ?>
 <?php endif; ?>li_<?php echo $this->_tpl_vars['page']['0']; ?>
 li">
							<a href="javascript:;" onclick="turn_page('<?php echo $this->_tpl_vars['page']['0']; ?>
')" data-val="<?php echo $this->_tpl_vars['page']['0']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a>
						</li>
						<?php endforeach; endif; unset($_from); ?>

						<li class="pages-next">
							<a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a>
						</li>

						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<!-- 页码 end-->
        </div>

		<!--达人聚集地-->
		<div class="gatheringPlace">
			<div class="box">
				<p class="title">
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
					达人<i class="Iclass">聚集地</i>
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
				</p>
				<p class="secondTitle"><span>我们正在寻找这样的你</span></p>
				<div class="card swiper-container" id="cardSwiper">
					<div class="swiper-wrapper ">
						<?php $_from = $this->_tpl_vars['looking_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<div class="swiper-slide modules">
							<p class="cardTitle apostrophe"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
							<div class="describe omit whiteSpace"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
							<div class="figure ico" style="background-image: url(<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
);"></div>
						</div>
						<?php endforeach; endif; unset($_from); ?>
					</div>
				</div>
			</div>
		</div>

		<!--达人权益-->
		<div class="equities">
			<div class="box">
				<p class="title">
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
					达人<i class="Iclass">权益</i>
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
				</p>
				<div class="card">
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/1.png);"></div>
						<p class="cardTitle">加冕达人标识</p>
						<p class="cardTitle">令你与众不同</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/2.png);"></div>
						<p class="cardTitle">尊享独家旅行</p>
						<p class="cardTitle">折扣优惠体验</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/3.png);"></div>
						<p class="cardTitle">享受中国演艺联盟</p>
						<p class="cardTitle">门票折扣优惠体验</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/4.png);"></div>
						<p class="cardTitle">享受人物专访</p>
						<p class="cardTitle">连续报道机会</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/5.png);"></div>
						<p class="cardTitle">享受摄影画册出版</p>
						<p class="cardTitle">旅行游记出版机会</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/6.png);"></div>
						<p class="cardTitle">更多机会</p>
						<p class="cardTitle">敬请期待</p>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/newstar.js"></script>
</body>
</html>