<?php /* vpcvcms compiled created on 2019-01-07 15:04:18
         compiled from muser/tv.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>TA的视频_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
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
		<div class="ban s1" style="background-image: url(<?php echo $this->_tpl_vars['muser']['cover']; ?>
);"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz meneTA">
				<div class="wp">
					<ul><li><a href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的日志</a></li>
						<li class="on"><a href="/index.php?m=index&c=muser&v=tv&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的视频</a></li>
						<li><a href="/index.php?m=index&c=muser&v=travel_note&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的游记</a></li>
						<li><a href="/index.php?m=index&c=muser&v=ta_faq&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的问答</a></li>
					</ul>
				</div>
			</div>
			<div class="wp">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'muser/left.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="col-r">
					<!--正文列表-->
					<input type="hidden" name="uid" id="uid" data-type="2" value="<?php echo $this->_tpl_vars['muser']['uid']; ?>
" />
					<input type="hidden" id="UniqueValue" data-sign="his" value="tv_num" data-type="2" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="tv_num" title="总数" value="<?php echo $this->_tpl_vars['total']['tv_num']; ?>
"/>
					<div class="content">
						<?php if ($this->_tpl_vars['list']): ?>
						<div class="commonality tv">
							<ul class="ul_box">
								<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
								<li class="item_<?php echo $this->_tpl_vars['vo']['id']; ?>
">
									<div class="con fix">
										<div class="left">
											<div class="figure borderRadius50 headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['muser']['avatar']; ?>
);"></div>
											<p class="title"><?php echo $this->_tpl_vars['muser']['username']; ?>
</p>
										</div>
										<div class="right txt">
											<div class="title">
												<p class="tit"><?php echo $this->_tpl_vars['vo']['title']; ?>
</p>
												<span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
											</div>
											<?php if ($this->_tpl_vars['vo']['status'] == 1): ?>
											<a class="dis_block describe omit lineNumber2" href="/index.php?m=index&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</a>
											<?php else: ?>
											<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
											<?php endif; ?>
											<a class="figure borderRadius cover" href="javascript:;" onclick="js_video(this)" data-src="<?php echo $this->_tpl_vars['vo']['url']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['vo']['pics']; ?>
);">
		        								<span class="boo"><i class="playButton"></i></span>
		        							</a>
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
										<div class="hideed" onclick="collect(<?php echo $this->_tpl_vars['vo']['id']; ?>
)">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
										</div>
										<div class="theory">
											<a href="/index.php?m=index&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										</div>
										<div class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-sign="my" data-nature="list" data-val="tv_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</i></a>
										</div>
										<div class="look"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['shownum']; ?>
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
							<div class="preview" style="background: url(/resource/m/images/user/defaul_tv_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">TA还没有发布过任何视频哦！</p></div>
						</div>
						<?php endif; ?>
					</div>
	            </div>
            </div>
        </div>
        <!-- 视频弹窗 -->
        <div class="m-pop1-hlg m_pop1_yz" id="m-pop1-hlg">
        	<div class="con1">
        		<div class="close js-close" onclick="js_close()"><span></span></div>
        		<div class="VideoArea"></div>
        	</div>
        </div>
        <!-- end -->
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script type="text/javascript" src="/resource/js/collect.js" title="收藏"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<script src="/resource/js/skip.js" title="页码跳转"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="打开、关闭视频"></script>
</body>
</html>