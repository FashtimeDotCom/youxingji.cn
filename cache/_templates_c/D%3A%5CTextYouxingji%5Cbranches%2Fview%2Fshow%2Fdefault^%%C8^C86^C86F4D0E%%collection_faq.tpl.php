<?php /* vpcvcms compiled created on 2019-01-02 19:00:08
         compiled from user/collection/collection_faq.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的收藏问答</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/centershare.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/collection.css" />
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
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的旅行日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="javascript:;">我的订单</a></li>
						<li class="on"><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
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
					<!--二级导航-->
					<div class="m_mine_sz">
						<p class="title">我的收藏（<span>共<i class="Iclass"><?php echo $this->_tpl_vars['total']['travel_num']+$this->_tpl_vars['total']['tv_num']+$this->_tpl_vars['total']['note_num']+$this->_tpl_vars['total']['faq_num']; ?>
</i>条</span>）</p>
						<div class="secondaryMenu fix">
							<a class="option" href="/index.php?m=index&c=collection&v=collection_travel">日志收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_tv">视频收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_note">游记收藏</a>
							<a class="option on" href="javascript:;">问答收藏</a>
							<div class="hunt">
								<input type="text" name="" id="" value="" placeholder="查看我的收藏" />
								<a class="verify" href="javascript:;"></a>
							</div>
						</div>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="collect" value="faq_num" data-type="4" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="faq_num" title="总数" value="<?php echo $this->_tpl_vars['total']['faq_num']; ?>
"/>
					<div class="content">
						<?php if ($this->_tpl_vars['list']): ?>
						<div class="commonality issue">
							<ul class="ul_box">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
								<li class="item_<?php echo $this->_tpl_vars['vo']['t_id']; ?>
">
									<?php if ($this->_tpl_vars['vo']['is_delete'] && $this->_tpl_vars['vo']['is_delete'] == 1): ?>
									<div class="con fix">
										<div class="IMGbox fix">
											<div class="pullDownButton"></div>
											<div class="menuOption fix dis_none">
												<a class="select handle deleteInfo" data-id="<?php echo $this->_tpl_vars['vo']['t_id']; ?>
" href="javascript:;">删除</a>
												<a class="select cancel" href="javascript:;">取消</a>
											</div>
										</div>
										<p class="nullTitle">温馨提示</p>
										<p class="nullDetails">抱歉，此内容已被原作者删除!</p>
									</div>
									
									<?php else: ?>
									<div class="con fix">
										<div class="txt">
											<div class="IMGbox fix">
												<div class="pullDownButton"></div>
												<div class="menuOption fix dis_none">
													<a class="select handle deleteInfo" data-id="<?php echo $this->_tpl_vars['vo']['t_id']; ?>
" href="javascript:;">删除</a>
													<a class="select cancel" href="javascript:;">取消</a>
												</div>
											</div>
											<p class="videoTitle width94"><span class="view"></span><span class="title apostrophe"><?php echo $this->_tpl_vars['vo']['title']; ?>
</span></p>
											<a class="dis_block" href="/index.php?m=index&c=faq&v=res_list&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<div class="box">
													<?php if ($this->_tpl_vars['vo']['thumbfile']): ?>
													<div class="figure thumbnail borderRadius" style="background-image: url(<?php echo $this->_tpl_vars['vo']['thumbfile']; ?>
);"></div>
													<?php endif; ?>
													<p class="videoDetails omit lineNumber4<?php if ($this->_tpl_vars['vo']['thumbfile']): ?> Width<?php endif; ?> whiteSpace"><?php echo $this->_tpl_vars['vo']['desc']; ?>
</p>
												</div>
												<div class="bottomToolbars fix">
													<?php if ($this->_tpl_vars['vo']['address']): ?>
													<div class="location">
														<img class="smallIcon" src="/resource/m/images/common/icon_location1.png"/>
														<i class="Iclass"><?php echo $this->_tpl_vars['vo']['address']; ?>
</i>
													</div>
													<?php endif; ?>
													<p class="exhibition">
														<span class="check">
															<img class="icon_check" src="/resource/images/common/preview1.png" />
															<i class="Iclass"><?php echo $this->_tpl_vars['vo']['show_num']; ?>
</i>
														</span>&nbsp;&nbsp;
														<span class="like">
															<img class="icon_like" src="/resource/m/images/user/icon_faq_detail3.png" />
															<i class="Iclass" title="收藏数"><?php echo $this->_tpl_vars['vo']['collection_num']; ?>
</i>
														</span>&nbsp;&nbsp;
														<span class="review" title="评论">
															<img class="icon_review" src="/resource/images/common/icon_review1.png" />
															<i class="Iclass"><?php echo $this->_tpl_vars['vo']['response_num']; ?>
</i>
														</span>
													</p>
												</div>
											</a>
										</div>
									</div>
									<?php endif; ?>
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
							<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_bg.png);" title="海报/封面"></div>
							<div class="tip"><p class="title">你还未收藏任何日志哦！<br />快增加收藏吧！</p></div>
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