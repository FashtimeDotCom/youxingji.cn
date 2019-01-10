<?php /* vpcvcms compiled created on 2019-01-02 18:59:21
         compiled from user/collection/collection_note.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的收藏游记</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
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
							<a class="option on" href="javascript:;">游记收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_faq">问答收藏</a>
							<div class="hunt">
								<input type="text" name="" id="" value="" placeholder="查看我的收藏" />
								<a class="verify" href="javascript:;"></a>
							</div>
						</div>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="collect" value="note_num" data-type="3" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="note_num" title="总数" value="<?php echo $this->_tpl_vars['total']['note_num']; ?>
"/>
					<div class="content">
						<?php if ($this->_tpl_vars['list']): ?>
						<div class="commonality">
							<ul class="ul_box">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['vo']):
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
										<p class="nullTitle paddingLeft">温馨提示</p>
										<p class="nullDetails paddingLeft">抱歉，此内容已被原作者删除!</p>
									</div>
									<?php else: ?>
									<div class="con fix">
										<div class="left">
											<a class="dis_block figure borderRadius50 headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['vo']['headpic']; ?>
);" href="/index.php?m=index&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
"></a>
											<a class="title" href="/index.php?m=index&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
"><?php echo $this->_tpl_vars['vo']['username']; ?>
</a>
										</div>
										<div class="right txt">
											<div class="title">
												<div class="IMGbox fix">
													<div class="pullDownButton"></div>
													<div class="menuOption fix dis_none">
														<a class="select handle deleteInfo" data-id="<?php echo $this->_tpl_vars['vo']['t_id']; ?>
" href="javascript:;">删除</a>
														<a class="select cancel" href="javascript:;">取消</a>
													</div>
												</div>
												<p class="tit"><?php echo $this->_tpl_vars['vo']['title']; ?>
</p>
												<span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
											</div>
											<a class="dis_block" href="/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['vo']['desc']; ?>
</p>
												<div class="figure borderRadius cover" style="background-image: url(<?php echo $this->_tpl_vars['vo']['thumbfile']; ?>
);"></div>
											</a>
											<div class="bottomToolbars fix">
												<?php if ($this->_tpl_vars['vo']['address']): ?>
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
													<i class="Iclass"><?php echo $this->_tpl_vars['vo']['address']; ?>
</i>
												</div>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['vo']['tag']): ?>
													<?php $_from = $this->_tpl_vars['item']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
														<?php if ($this->_tpl_vars['k'] < 1): ?>
												<span class="tag"><?php echo $this->_tpl_vars['vo']; ?>
收藏于</span>
														<?php endif; ?>
													<?php endforeach; endif; unset($_from); ?>
												<?php endif; ?>
												<span class="collectTime">收藏于 <i class="Iclass"><?php echo $this->_tpl_vars['vo']['collect_time']; ?>
</i></span>
											</div>
										</div>
									</div>
									<div class="bottom">
										<div class="hideed1"><em class="smallIcon"></em><i class="Iclass">已收藏</i></div>
										<div class="theory">
											<a href="/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										</div>
										<div class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-sign="my" data-nature="list" data-val="note_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['top_num']; ?>
</i></a>
										</div>
										<div class="look"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['show_num']; ?>
</i></div>
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
										到<input class="inp" type="text" id="pages" onkeyup="judgeIsNonNull2(event)">页
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
							<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_note_bg.png);" title="海报/封面"></div>
							<div class="tip"><p class="title">你还未收藏任何游记哦！<br />快增加收藏吧！</p></div>
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