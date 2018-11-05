<?php /* vpcvcms compiled created on 2018-11-02 15:02:35
         compiled from wap/user/new_tv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/user/new_tv.tpl', 52, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的视频</title>
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
<body >
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>我的视频</h3>
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
	        	<div class="gaine figure" style="background-image: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
);"></div>
	        	<div class="rightBox">
		        	<p class="wx_name"><?php echo $this->_tpl_vars['user']['username']; ?>
</p>
		        	<p class="location fix" title="定位"><img class="icon_location2" src="/resource/m/images/common/icon_location1.png" /><i><?php echo $this->_tpl_vars['user']['city']; ?>
</i></p>
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
	    
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=user&v=travel">日志&nbsp;<i class="Iclass" id="travel_num"><?php echo $this->_tpl_vars['total']['travel_num']; ?>
</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=user&v=tv">视频&nbsp;<i class="Iclass" id="tv_num"><?php echo $this->_tpl_vars['total']['tv_num']; ?>
</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=travel_note">游记&nbsp;<i class="Iclass" id="note_num"><?php echo $this->_tpl_vars['total']['note_num']; ?>
</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=my_faq">问答&nbsp;<i class="Iclass" id="faq_num"><?php echo $this->_tpl_vars['total']['faq_num']; ?>
</i></a></li>
	                </ul>
	            </div>
	        </div>
	        
	        <input type="hidden" id="UniqueValue" data-sign="my" data-length="38" value="tv_num" title="共用JS区分的唯一必须值"/>
	        <?php if ($this->_tpl_vars['list']): ?>
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item fix item_<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="wp fix">
							<?php if ($this->_tpl_vars['item']['status'] == 1): ?>
							<a class="dis_block fix" href="/index.php?m=wap&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
								<p class="videoTitle"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								<div class="date"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
								<p class="videoDetails"><?php echo $this->_tpl_vars['item']['describes']; ?>
</p>
							</a>
							<?php else: ?>
							<p class="videoTitle"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
							<div class="date"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
							<p class="videoDetails"><?php echo $this->_tpl_vars['item']['describes']; ?>
</p>
							<?php endif; ?>
							<div class="preview fix">
								<span class="pic figure vessel borderRadius js-video fix" onclick="js_video(this)" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']['pics']; ?>
);">
									<span class="bo"></span>
								</span>
							</div>
							<div class="videoBottom fix">
								<?php if ($this->_tpl_vars['item']['address']): ?>
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><?php echo $this->_tpl_vars['item']['address']; ?>
</span>
								<?php endif; ?>
								<p class="right">
									<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</i></span>&nbsp;&nbsp;
									<span class="like zan" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-nature="list">
										<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['topnum']; ?>
</i>
									</span>&nbsp;&nbsp;
									<?php if ($this->_tpl_vars['item']['status'] == 1): ?>
									<span class="review">
										<a class="widthHeight" href="/index.php?m=wap&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
											<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
										</a>
									<?php else: ?>
									<span class="Areview review"><img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
									<?php endif; ?>
									</span>
								</p>
							</div>
							<div class="IMGbox fix">
								<div class="pullDownButton" onclick="pullDownButton(this)"></div>
								<div class="menuOption fix dis_none">
									<a class="collect" href="/index.php?m=wap&c=user&v=edittv&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><span>编辑</span></a>
									<span class="deleteInfo" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
">删除</span>
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
	                <div class="wp fix">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_tv_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">最原创的旅拍视频，最暖心的旅行推荐，由你打造</div>
	                    </div>
	                    <div class="top">
	                        <a href="/index.php?m=wap&c=user&v=addtv" class="shoot">发布视频</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	    
	    <!-- 视频弹窗 -->
	    <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz">
        	<div class="con"><div class="close js-close" onclick="js_close()"><span></span></div><div class="VideoArea"></div></div>
        </div>
	    <!-- end -->
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>