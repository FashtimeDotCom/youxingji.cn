<?php /* vpcvcms compiled created on 2019-01-09 16:20:11
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
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/centershare.css" />
</head>
<body onkeydown="on_return();">
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
					<ul><li class="on"><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
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
					<!--发布 菜单-->
					<div class="m-txtlist-sz">
						<ul class="ul_list">
							<li class="addtravel">
								<a class="dis_block" href="/index.php?m=index&c=user&v=addtravel">
									<i ></i><div class="txt">发布旅行日志</div>
								</a>
							</li>
							<li class="addtv">
								<a class="dis_block" href="/index.php?m=index&c=user&v=addtv">
									<i ></i><div class="txt">发布视频</div>
								</a>
							</li>
							<li class="travel_note">
								<a class="dis_block" href="/index.php?m=index&c=user&v=travel_note">
									<i ></i><div class="txt">发布游记</div>
								</a>
							</li>
							<li class="follow">
								<a class="dis_block" href="/index.php?m=index&c=user&v=set_question">
									<i ></i><div class="txt">发布提问</div>
								</a>
							</li>
						</ul>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="my" value="travel_num" data-type="1" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="travel_num" title="总数" value="<?php echo $this->_tpl_vars['total']['travel_num']; ?>
"/>
					<div class="content">
						<?php if ($this->_tpl_vars['list']): ?>
						<div class="commonality">
							<ul class="ul_box">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
								<li class="item_<?php echo $this->_tpl_vars['vo']['id']; ?>
">
									<div class="con fix">
										<div class="left">
											<a class="dis_block figure borderRadius50 headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
);"></a>
											<p class="title"><?php echo $this->_tpl_vars['user']['username']; ?>
</p>
										</div>
										<div class="right txt">
											<div class="title">
												<div class="IMGbox fix">
													<div class="pullDownButton"></div>
													<div class="menuOption fix dis_none">
														<a class="select compile" href="/index.php?m=index&c=user&v=edittravel&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">编辑</a>
														<a class="select handle deleteInfo" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" href="javascript:;">删除</a>
														<a class="select cancel" href="javascript:;">取消</a>
													</div>
												</div>
												<p class="tit"><?php echo $this->_tpl_vars['vo']['title']; ?>
</p>
												<span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
											</div>
											<?php if ($this->_tpl_vars['vo']['status'] == 1): ?>
											<a class="dis_block describe omit lineNumber2" href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</a>
											<?php else: ?>
											<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
											<?php endif; ?>
											<dl class="fix">
												<?php if ($this->_tpl_vars['vo']['picnum'] == 2 || $this->_tpl_vars['vo']['picnum'] == 4 || $this->_tpl_vars['vo']['picnum'] == 6): ?>
												<style type="text/css">
													<?php if ($this->_tpl_vars['vo']['picnum'] == 2): ?>
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
 a{height: 205.5px!important;}
													<?php endif; ?>
													<?php if ($this->_tpl_vars['vo']['picnum'] == 4): ?>
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
 a{height: 199.5px!important;}
													<?php endif; ?>
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
{width: 49.375%;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(2){margin-right: 0!important;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(4){margin-right: 0!important;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
												</style>
												<?php else: ?>
												<style type="text/css">
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
{width: 32.5%;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(3){margin-right: 0!important;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
													.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(9){margin-right: 0!important;}
												</style>
												<?php endif; ?>
												<?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
												<dd class="ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
">
													<a class="lightbox figure" href="<?php echo $this->_tpl_vars['v']; ?>
" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['v']; ?>
);"></a>
												</dd>
												<?php endforeach; endif; unset($_from); ?>
											</dl>
											<div class="bottomToolbars fix">
												<?php if ($this->_tpl_vars['vo']['address']): ?>
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
													<i class="Iclass"><?php echo $this->_tpl_vars['vo']['address']; ?>
</i>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="bottom">
										<?php if ($this->_tpl_vars['vo']['status'] == 1): ?>
										<div class="theory WidtH">
											<a href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										<?php else: ?>
										<div class="Areview theory WidtH">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										<?php endif; ?>
										</div>
										<div class="zan WidtH" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-sign="my" data-nature="list" data-val="travel_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</i></a>
										</div>
										<div class="look WidtH"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</i></div>
									</div>
								</li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
							<!-- 页码 -->
							<?php if ($this->_tpl_vars['multipage']): ?>
							<div class="pages">
								<div class="amount">共<i class="Iclass" id="total_page"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
								<ul><?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
										到<input class="inp" type="text" id="pages" onkeyup="judgeIsNonNull2(event)" />页
										<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
									</li>
								</ul>
							</div>
							<?php endif; ?>
							<!-- 页码 end-->
						</div>
						<?php else: ?>
						<!--无信息-->
						<div class="mainTips fix">
							<div class="preview" style="background: url(/resource/m/images/user/defaul_travel_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">你还没有发布过任何日志哦！<br />快增加发布一个吧！</p></div>
						</div>
						<?php endif; ?>
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
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<script src="/resource/js/skip.js" title="页码跳转"></script>
    <script src="/resource/js/pulldownscroll.js" title="右侧下拉菜单"></script>
</body>
</html>