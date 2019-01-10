<?php /* vpcvcms compiled created on 2018-12-29 22:11:06
         compiled from wap/user/collection_faq.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的问答</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/personalcenter.css" />
    <style type="text/css">
    	.m-mytv-yz .item .videoBottom .left{margin-top:0!important;}
    </style>
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>我收藏的问答</h3>
	</div>
	<div class="mian">
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
	    
	    <!--正文-->
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=Collection&v=collection_travel">日志</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_tv">视频</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_faq">问答</a></li>
	                </ul>
	            </div>
	        </div>
	        
	        <input type="hidden" name="type" id="faq_num" title="总数" value="<?php echo $this->_tpl_vars['total']['faq_num']; ?>
"/>
	        <input type="hidden" id="UniqueValue" data-sign="collect" value="faq_num" data-type="4" title="共用JS区分的唯一必须值"/>
	        <?php if ($this->_tpl_vars['list']): ?>
	        <div class="m-mytv-yz issue" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item fix item_<?php echo $this->_tpl_vars['item']['t_id']; ?>
">
						<div class="wp">
							<?php if ($this->_tpl_vars['item']['is_delete'] && $this->_tpl_vars['item']['is_delete'] == 1): ?>
							<p class="nullTitle">null</p>
							<p class="nullDetails" style="color: red;">:)抱歉，此内容已被原作者删除!</p>
							<?php else: ?>
							<p class="headline"><img class="view" src="/resource/m/images/user/icon_faq_detail1.png"><span class="substance"><?php echo $this->_tpl_vars['item']['title']; ?>
</span></p>
							<!--<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span><?php echo $this->_tpl_vars['item']['title']; ?>
</p>-->
							<div class="date"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
							<a href="/index.php?m=wap&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="dis_block fix">
								<p class="videoDetails omit lineNumber4"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
								<div class="videoBottom fix">
									<?php if ($this->_tpl_vars['item']['address']): ?>
									<span class="left"><img src="/resource/m/images/common/icon_location1.png" /><h4><?php echo $this->_tpl_vars['item']['address']; ?>
</h4></span>
									<?php endif; ?>
									<p class="right">
										<span class="check">
											<img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['show_num']; ?>
</i>
										</span>&nbsp;&nbsp;
										<span class="like">
											<img class="icon_like" src="/resource/m/images/user/icon_faq_detail3.png" /><i class="Iclass" title="收藏数"><?php echo $this->_tpl_vars['item']['collection_num']; ?>
</i>
										</span>&nbsp;&nbsp;
										<span class="review" title="评论">
											<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['response_num']; ?>
</i>
										</span>
									</p>
								</div>
							</a>
							<?php endif; ?>
							<div class="IMGbox fix">
								<div class="pullDownButton" onclick="pullDownButton(this)"></div>
								<div class="menuOption fix dis_none">
									<span class="collect deleteInfo" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
">删除</span>
									<span class="cancel">取消</span>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
	        	</div>
				<p class="tips"></p>
	       	</div>
	        <?php else: ?>
	        <div class="m-mytv-yz">
	            <div class="m-myday-yz">
	                <div class="wp">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快去增加收藏吧！</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>