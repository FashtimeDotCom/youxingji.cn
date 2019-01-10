<?php /* vpcvcms compiled created on 2019-01-09 16:20:05
         compiled from user/travel_list.tpl */ ?>
<!DOCTYPE html>
<html>
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
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
	<script src="/resource/js/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
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
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li class="on"><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
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
					<input type="hidden" id="UniqueValue" data-sign="my" value="note_num" data-type="3" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="note_num" title="总数" value="<?php echo $this->_tpl_vars['total']['note_num']; ?>
"/>
					<div class="content">
						<?php if ($this->_tpl_vars['list']): ?>
						<div class="commonality note">
							<ul class="ul_box">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['vo']):
?>
								<li class="item_<?php echo $this->_tpl_vars['vo']['id']; ?>
">
									<div class="con fix">
										<div class="left">
											<div class="figure borderRadius50 headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
);"></div>
											<p class="title"><?php echo $this->_tpl_vars['user']['username']; ?>
</p>
										</div>
										<div class="right txt">
											<div class="title">
												<div class="IMGbox fix">
													<div class="pullDownButton"></div>
													<div class="menuOption fix dis_none">
														<a class="select compile" href="/index.php?m=index&c=user&v=edit_travel_note&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
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
											<a class="dis_block" href="/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['vo']['desc']; ?>
</p>
												<div class="figure borderRadius cover" style="background-image: url(<?php echo $this->_tpl_vars['vo']['thumbfile']; ?>
);"></div>
											</a>
											<?php else: ?>
											<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['vo']['desc']; ?>
</p>
											<div class="figure borderRadius cover" style="background-image: url(<?php echo $this->_tpl_vars['vo']['thumbfile']; ?>
);"></div>
											<?php endif; ?>
											<div class="bottomToolbars fix">
												<?php if ($this->_tpl_vars['vo']['address']): ?>
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
													<i class="Iclass"><?php echo $this->_tpl_vars['vo']['address']; ?>
</i>
												</div>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['vo']['tag']): ?>
													<?php $_from = $this->_tpl_vars['vo']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['tag']):
?>
														<?php if ($this->_tpl_vars['k'] < 1): ?>
												<span class="tag"><?php echo $this->_tpl_vars['tag']; ?>
</span>
														<?php endif; ?>
													<?php endforeach; endif; unset($_from); ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="bottom">
										<?php if ($this->_tpl_vars['vo']['status'] == 1): ?>
										<div class="theory WidtH">
											<a href="/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										<?php else: ?>
										<div class="Areview theory WidtH">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										<?php endif; ?>
										</div>
										<div class="zan WidtH" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-sign="my" data-nature="list" data-val="note_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['top_num']; ?>
</i></a>
										</div>
										<div class="look WidtH"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['show_num']; ?>
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
							<div class="preview" style="background: url(/resource/m/images/user/defaul_travel_note_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">你还没有发布过任何游记哦！<br />快增加发布一个吧！</p></div>
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