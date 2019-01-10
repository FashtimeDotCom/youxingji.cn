<?php /* vpcvcms compiled created on 2018-12-29 20:39:13
         compiled from wap/user/my_faq.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/user/my_faq.tpl', 65, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的问答</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/personalcenter.css" />
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>我的问答</h3>
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
	    
	    <div class="ban figure fix">
	    	<div class="imgBg figure borderRadius bg_blur" style="background-image: url(<?php echo $this->_tpl_vars['user']['cover']; ?>
)"></div>
	        <div class="message fix">
	        	<a class="dis_block gaine figure" href="/index.php?m=wap&c=user&v=index" style="background-image: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
);"></a>
	        	<div class="rightBox<?php if ($this->_tpl_vars['user']['tag']): ?><?php else: ?> MarginBottom<?php endif; ?>">
	        		<div class="wx_name fix">
	        			<span class="username"><?php echo $this->_tpl_vars['user']['username']; ?>
</span>
	        			<p class="location fix" title="定位"><img class="icon_location2" src="/resource/m/images/common/icon_location1.png" /><i><?php echo $this->_tpl_vars['user']['city']; ?>
</i></p>
	        		</div>
        			<?php if ($this->_tpl_vars['user']['tag']): ?>
        			<p class="labelList">
						<?php $_from = $this->_tpl_vars['user']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
							<?php if ($this->_tpl_vars['k'] < 2): ?>
						<span class="tag"><?php echo $this->_tpl_vars['vo']; ?>
</span>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						</p>
					<?php endif; ?>
	        	</div>
	        	
	        	<input type="hidden" name="synopsis" id="synopsis" value="<?php echo $this->_tpl_vars['user']['autograph']; ?>
" />
	        	<p class="intro fix" title="简介">
	        		<span class="autograph"></span>
	        		<span class="viewMore dis_none" data-open="0">查看全文</span>
	        	</p>
	        	<div class="statistics fix">
	        		<div class="left">
	        			<div class="boxes">
	        				<b class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</b>
	        				<b>关注</b>
	        			</div>
	        			<div class="boxes">
	        				<b class="fans"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</b>
	        				<b>粉丝</b>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    
	    <!--正文-->
	    <input type="hidden" id="UniqueValue" data-sign="my" data-length="38" value="faq_num" title="共用JS区分的唯一必须值"/>
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=user&v=travel">日志&nbsp;<i class="Iclass" id="travel_num"><?php echo $this->_tpl_vars['total']['travel_num']; ?>
</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=tv">视频&nbsp;<i class="Iclass" id="tv_num"><?php echo $this->_tpl_vars['total']['tv_num']; ?>
</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=travel_note">游记&nbsp;<i class="Iclass" id="note_num"><?php echo $this->_tpl_vars['total']['note_num']; ?>
</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=user&v=my_faq">问答&nbsp;<i class="Iclass" id="faq_num"><?php echo $this->_tpl_vars['total']['faq_num']; ?>
</i></a></li>
	                </ul>
	            </div>
	        </div>
	        <div class="row-yz" style="margin-bottom: 11px;">
	            <ul class="ul-txtlist-yz borderNone" style="border: none;">
	                <li><a href="/index.php?m=wap&c=user&v=addtravel">
	    					<i style="background-image: url(/resource/m/images/s-i5.png);"></i>
	    					<div class="txt">发布日志</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=user&v=addtv">
	    					<i style="background-image: url(/resource/m/images/s-i2.png);"></i>
	    					<div class="txt">发布视频</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=user&v=add_note">
	    					<i style="background-image: url(/resource/m/images/s-i1.png);"></i>
	    					<div class="txt">发布游记</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=faq&v=set_faq">
	    					<i style="background-image: url(/resource/m/images/s-i4.png);"></i>
	    					<div class="txt">发布提问</div>
	    				</a>
	                </li>
	            </ul>
	        </div>
	        
	        <?php if ($this->_tpl_vars['list']): ?>
	        <div class="m-mytv-yz issue" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item fix item_<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="wp fix">
							<p class="headline"><img class="view" src="/resource/m/images/user/icon_faq_detail1.png"><span class="substance"><?php echo $this->_tpl_vars['item']['title']; ?>
</span></p>
							<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
								<p class="videoDetails omit lineNumber4"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
								<div class="videoBottom fix">
									<?php if ($this->_tpl_vars['item']['address']): ?>
									<span class="left"><img src="/resource/m/images/common/icon_location1.png" /><h4><?php echo $this->_tpl_vars['item']['address']; ?>
</h4></span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['item']['label']): ?>
										<?php $_from = $this->_tpl_vars['item']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
											<?php if ($this->_tpl_vars['k'] < 1): ?>
									<span class="left tag"><?php echo $this->_tpl_vars['vo']; ?>
</span>
											<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
									<div class="divRight">
										<span class="check"><?php echo $this->_tpl_vars['muser']['username']; ?>
问于</span>
										<span class="check"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</span>
									</div>
								</div>
							</a>
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
	                        <div class="text">最原创的旅拍视频，最暖心的旅行推荐，由你打造</div>
	                    </div>
	                    <div class="top">
	                        <a href="/index.php?m=wap&c=faq&v=set_faq" class="shoot">发布问答</a>
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
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>