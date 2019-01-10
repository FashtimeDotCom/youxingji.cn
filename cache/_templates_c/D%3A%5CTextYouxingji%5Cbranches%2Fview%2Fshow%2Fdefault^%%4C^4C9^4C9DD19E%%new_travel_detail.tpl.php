<?php /* vpcvcms compiled created on 2019-01-07 14:05:55
         compiled from index/new_travel_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/new_travel_detail.tpl', 46, false),array('modifier', 'date_format', 'index/new_travel_detail.tpl', 50, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<title>日志详情_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/css/style.css" />
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
	<link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/new_travel_detail.css" />
    <link rel="stylesheet" href="/resource/css/comment.css" />
</head>
<body onkeydown="on_return();">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
		<div class="wpwp">
			<div class="m_master_qm">
				<!--左侧-->
				<input type="hidden" name="uid" id="uid" data-type="1" value="" />
				<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['info']['id']; ?>
" data-length="38" value="travel_num" data-uid="<?php echo $this->_tpl_vars['info']['uid']; ?>
" data-type="1" title="共用JS区分的唯一必须值"/>
				<?php if (! $this->_tpl_vars['user']): ?>
				<input type="hidden" name="用户是否登陆" id="userRegister" value="0" />
				<?php endif; ?>
				<div class="col_l">
					<div class="con">
						<ul class="ul_imgtxt2_qm list_v">
							<li><div class="top">
									<div class="left">
										<a class="profilePhoto figure borderRadius50" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank" style="background-image: url(<?php echo $this->_tpl_vars['info']['headpic']; ?>
);"></a>
										<a class="botton dis_block" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['info']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
									</div>
									<div class="txt p_btn">
										<div class="tit">
											<span><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
											<h3><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"target="_blank"><?php echo $this->_tpl_vars['info']['username']; ?>
</a></h3>
										</div>
										<p class="whiteSpace"><?php echo $this->_tpl_vars['info']['describes']; ?>
</p>
										<?php if ($this->_tpl_vars['info']['picnum'] == 2 || $this->_tpl_vars['info']['picnum'] == 4 || $this->_tpl_vars['info']['picnum'] == 6): ?>
										<style type="text/css">
											<?php if ($this->_tpl_vars['info']['picnum'] == 2): ?>
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
 a{height: 205.5px!important;}
											<?php endif; ?>
											<?php if ($this->_tpl_vars['info']['picnum'] == 4): ?>
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
 a{height: 199.5px!important;}
											<?php endif; ?>
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
{width: 49.375%;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(2){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(4){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
										</style>
										<?php else: ?>
										<style type="text/css">
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
{width: 32.5%;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(3){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
:nth-of-type(9){margin-right: 0!important;}
										</style>
										<?php endif; ?>
										<dl class="fix">
											<?php if ($this->_tpl_vars['info']['content']): ?>
											<?php $_from = $this->_tpl_vars['info']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
											<dd class="ddClass<?php echo $this->_tpl_vars['info']['id']; ?>
">
												<a class="lightbox figure" href="<?php echo $this->_tpl_vars['item']; ?>
" rel="list<?php echo $this->_tpl_vars['info']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']; ?>
);"></a>
											</dd>
											<?php endforeach; endif; unset($_from); ?>
											<?php endif; ?>
										</dl>
										<?php if ($this->_tpl_vars['info']['address']): ?>
										<div class="location">
											<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
											<i class="Iclass"><?php echo $this->_tpl_vars['info']['address']; ?>
</i>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="bottom">
									<div class="hideed" onclick="collect(<?php echo $this->_tpl_vars['info']['id']; ?>
)">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
									</div>
									<div class="theory"><a href="#navigation"><em class="smallIcon"></em><i class="Iclass">评论</i></a></div>
									<div class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['info']['id']; ?>
)" data-nature="subject" data-val="travel_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['info']['topnum']; ?>
</i></a>
									</div>
									<div class="look"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['info']['shownum']; ?>
</i></div>
								</div>
							</li>
						</ul>
					</div>
					
					<!--评论区-->
			        <div class="m-comment">
			        	<div class="navigation" id="navigation" data-type="1">
			        		<span class="title">点评列表</span>
			        		<p class="Button fix">
			        			<a href="javascript:;" class="press pressTime onn">按时间</a>
			        			<a href="javascript:;" class="press pressHeat">按热度</a>
			        		</p>
			        	</div>
			            
			            <!--评论框-->
			            <div class="m-publish original">
			                <div class="wp">
			                    <div class="content">
			                        <textarea class="inputBox" id="comment" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
			                        <?php if (! $this->_tpl_vars['user']): ?> 
			                        <div class="nologin">
			                            <div class="nologinbtn">
			                                <a class="from_url" href="javascript:;">登录</a>
			                                <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
			                            </div>
			                        </div>
			                        <?php endif; ?>
			                    </div>
			                    <a href="javascript:;" class="btn addComment">发表评论</a>
			                    <span class="numberWords commentNumWords">还可输入 <i class="Iclass" id="contentwordage">255</i> 个字</span>
			                </div>
			            </div>
			            
			            <!--评论列表-->
			            <input type="hidden" id="from_url" value="<?php echo $this->_tpl_vars['from_url']; ?>
" title="登录完之后跳转回这个本来的游记" />
			            <div class="box fix" data-page="1">
			            	<ul class="ul_imgtxt4 fix" id="receptacle">
				            	<?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
				                <li><div class="details">
				                        <a class="headPortrait" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);" target="_blank"></a>
					                    <h3><a class="username_" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</a>
					                    	<em class="addtime"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</em>
					                    	<a class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-nature="review" href="javascript:;">
					                    		<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>
					                    		<i><?php echo $this->_tpl_vars['vo']['top_num']; ?>
</i>
					                    	</a>
					                    </h3>
				                    </div>
				                    <div class="substance" data-replyNum="<?php echo $this->_tpl_vars['vo']['count']; ?>
">
				                    	<div class="description whiteSpace"><?php echo $this->_tpl_vars['vo']['content']; ?>
</div>
					                    <div class="BarSubmenu">
					                    	<a class="reply replyReview" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-open="0" data-class="1" href="javascript:;">回复</a>
					                    </div>
					
					                    <!--回复【评论】框-->
					                    <div class="m-publish details_stair" data-tid="<?php echo $this->_tpl_vars['vo']['id']; ?>
">
							                <div class="wp">
							                    <div class="content">
							                        <textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
							                        <?php if (! $this->_tpl_vars['user']): ?> 
							                        <div class="nologin">
							                            <div class="nologinbtn">
							                                <a class="from_url" href="javascript:;">登录</a>
							                                <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
							                            </div>
							                        </div>
							                        <?php endif; ?>
							                    </div>
							                    <a class="btn ReviewComment" data-touid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-class="1" data-name="" href="javascript:;">发表回复</a>
							                    <span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>
							                </div>
							            </div>

							            <!--所有回复-->
							            <div class="blockquote_wrap" data-i="<?php echo $this->_tpl_vars['k']+1; ?>
" data-count="<?php echo $this->_tpl_vars['vo']['count']; ?>
" <?php if ($this->_tpl_vars['vo']['count'] > 3): ?> style="padding-bottom: 26px;" <?php endif; ?>>
				                            <?php $_from = $this->_tpl_vars['vo']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				                            <div <?php if ($this->_tpl_vars['key'] < 3): ?>class="module fix" <?php else: ?> class="module fix dis_none"<?php endif; ?>>
					                            <div class="comment_blockquote">
					                                <div class="comment_floor"><?php echo $this->_tpl_vars['key']+1; ?>
楼</div>
					                                <div class="comment_conWrap">
					                                    <div class="comment_con">
					                                        <span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
 </span><span class="name"><i>回复</i> <?php echo $this->_tpl_vars['item']['to_username']; ?>
：</span>
					                                        <span class="matter"><?php echo $this->_tpl_vars['item']['content']; ?>
</span>
					                                    </div>
					                                </div>
					                                <div class="BarSubmenu">
								                    	<a class="reply reply_reply" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-open="0" data-class="2" href="javascript:;">回复</a>
								                    	<div class="leftSubmenu">
								                    		<span class="addtime"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
									                    	<a class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-nature="review" href="javascript:;">
									                    		<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>
									                    		<i><?php echo $this->_tpl_vars['item']['top_num']; ?>
</i>
									                    	</a>
								                    	</div>
								                    </div>
				
					                                <!--回复【回复】框-->
					                                <div class="m-publish details_">
					                                    <div class="wp">
					                                        <div class="content">
					                                            <textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
					                                            <?php if (! $this->_tpl_vars['user']): ?>
					                                            <div class="nologin">
					                                                <div class="nologinbtn">
					                                                    <a class="from_url" href="javascript:;">登录</a>
					                                                    <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
					                                                </div>
					                                            </div>
					                                            <?php endif; ?>
					                                        </div>
					                                        <a class="btn ReviewReview" data-touid="<?php echo $this->_tpl_vars['item']['uid']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-pid_sub="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-class="2" href="javascript:;">发表回复</a>
					                                        <span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
				                            <?php endforeach; endif; unset($_from); ?>
				                            <?php if ($this->_tpl_vars['vo']['count'] > 3): ?>
				                            <p class="hint">还有<i class="Iclass"><?php echo $this->_tpl_vars['vo']['count']-3; ?>
</i>条回复，<a class="seeMore" href="javascript:;" onclick="seeMore(this)">查看更多</a></p>
				                            <?php endif; ?>
							            </div>
				                    </div>
				                </li>
				                <?php endforeach; endif; unset($_from); ?>
				           	</ul>
							<p class="tips"></p>
			            </div>

			            <!-- 页码 -->
			            <?php if ($this->_tpl_vars['multipage']): ?>
			            <input type="hidden" name="cur_page" id="cur_page" value="<?php echo $this->_tpl_vars['page_info']['cur_page']; ?>
">
			            <div class="pages ">
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
')" data-href="<?php echo $this->_tpl_vars['page']['1']; ?>
" data-val="<?php echo $this->_tpl_vars['page']['0']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a>
								</li>
								<?php endforeach; endif; unset($_from); ?>
								<li class="pages-next">
									<a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a>
								</li>
								<li class="pages-form">
									到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull3(this)">页
									<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
								</li>
							</ul>
						</div>
				        <?php endif; ?>
			            <!-- 页码 end-->
			       </div>
				</div>
				
				<!--右侧-->
				<div class="col_r">
					<div class="r_box">
						<div class="r_box_title">相关动态推荐
							<span><a href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank">更多</a></span>
						</div>
						<ul class="r_box_con">
							<?php if ($this->_tpl_vars['ano_info']): ?>
							<?php $_from = $this->_tpl_vars['ano_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<li><div class="user_head">
									<a class="figure Head_portrait" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></a>
									<div class="user_info_box">
										<div class="username"><a href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['username']; ?>
</a></div>
										<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
									</div>
								</div>
								<a class="dis_block" href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_blank">
									<div class="user_text omit lineNumber3 whiteSpace"><?php echo $this->_tpl_vars['item']['describes']; ?>
</div>
									<div class="figure pic" style="background-image: url(<?php echo $this->_tpl_vars['item']['content']; ?>
);"></div>
								</a>
							</li>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</ul>
					</div>
					
					<!--广告-->
					<div class="box figure borderRadius" style="background-image: url(/uploadfile/image/20181023/154028012224029.jpg);"></div>
					
					<!--热门旅游地-->
					<div class="Popular">
						<h3 class="PopularTitle">热门旅游地</h3>
						<?php $_from = $this->_tpl_vars['tourismlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
						<a class="dis_block figure pic" href="/index.php?m=index&c=index&v=star&keyword=<?php echo $this->_tpl_vars['vo']['keyword']; ?>
" target="_blank" style="background-image: url(<?php echo $this->_tpl_vars['vo']['pics']; ?>
);">
							<span><?php echo $this->_tpl_vars['vo']['title']; ?>
</span>
						</a>
						<?php endforeach; endif; unset($_from); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="h81"></div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>