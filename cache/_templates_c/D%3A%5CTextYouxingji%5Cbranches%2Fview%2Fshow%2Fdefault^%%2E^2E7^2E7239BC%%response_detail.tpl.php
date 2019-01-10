<?php /* vpcvcms compiled created on 2019-01-04 11:07:52
         compiled from wap/faq/response_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/faq/response_detail.tpl', 124, false),array('modifier', 'date_format', 'wap/faq/response_detail.tpl', 213, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>回答详情</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    
    <script src="/resource/lightbox/jquery.min.js"></script>
	<!--lightbox开始-->
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			//这个for循环的作用：回答问题者的图片可以点击放大查看
			for(var i=0;i<$("#answerContent p img").length;i++){
				$("#answerContent p img").eq(i).before("<a class='lightbox' rel='list' href='"+"//"+window.location.host+$("#answerContent p img").eq(i).attr("src")+"'></a>");
			}
			$('.lightbox').lightbox();
		});
	</script>
    
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/faq_detail.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
    <style type="text/css">
    	.question{position: relative;padding: 3% 3% 0.5rem 3%;background: #fff;margin-bottom: 1.2rem;}
    	.question h3{width: 90%;line-height: 20px;color: #333;font-size: 1.4rem;}
    	.question .browseNum{width: 90%;font-size: 1.25rem;color: #898989;line-height: 24px;}
		.question .browseNum i{font-style: normal;font-weight: 600;color: #666;font-size: 1.25rem;padding: 0 2px;}
    	
    	.question .skip{position: absolute;top: 1.2rem;right: 0.5rem;display: block; width: 1.5rem;height: 3.5rem;}
    	.question .skip img{display: block;width: 110%;margin: 36% auto;
							transform:rotate(-90deg);
							-o-transform:rotate(-90deg); 	/* Opera */
							-ms-transform:rotate(-90deg); 	/* IE 9 */
							-moz-transform:rotate(-90deg); 	/* Firefox */
							-webkit-transform:rotate(-90deg); /* Safari 和 Chrome */}
		.answer{ margin-bottom: 1.8rem;}
		.answer .hunk .bottom{border-bottom: 1px #f2eeee solid;}
		.answer .hunk .bottom .left{line-height: 30px;margin-top: 5px;}
		.answer .hunk .bottom .left .boxes{margin-top: 6px;}
		.answer .hunk .bottom .left .grade{color: #d71618;font-weight: 600;}
		.answer .hunk .bottom .right{margin-bottom: 5px;}

		.answer .hunk .substanc{padding: 10px 0;}
		.answer .hunk .substanc p{line-height: 24px;font-size: 14px;text-align: justify;position: relative;}
		.answer .hunk .substanc p a{position: absolute;z-index: 1;display: block;width: 100%;height: 100%;}
		.answer .hunk .substanc img{padding: 10px 0;}
		
		.botton{border: 1px #f33b3b solid;padding: 0px 4px;font-style: initial;line-height: 20px; margin-top: 12px;font-size: 0.75rem;color: #fff;background: #f33b3b;}
		.botton b{display: inline-block;line-height: 20px;}

		.videoBottom div span{display: inline-block;font-size: 1.3rem;color: #666;line-height: 34px;}
		
		.videoBottom .left{float: left;}
		.videoBottom .left img{display: inline-block;margin-right: 0.2rem;vertical-align: middle;width: 1.5rem;}
		.videoBottom .left i{width: 10px;line-height: 34px;font-size: 1.3rem;}
		
		.videoBottom .right{float: right;}
		
		.maskLayer{background: rgba(0,0,0,0.5);z-index: 1000;opacity: 1;}
		.maskLayer .shade{position: fixed;top: 0;right: 0;left: 0;bottom: 0;background: transparent;opacity: 0;z-index: 1003;}
		
		.shareGuidance{position: absolute;right: 1rem;top: 2rem;border-radius: 0.3rem;z-index: 1002;border-top-right-radius: 0px;}
    	.shareGuidance .icon_share{display: block;position: absolute;top: -27px;right: 0px;width: 90px;}
    	
    	.shareGuidance .box{width: 100%;height: 100%;background: rgba(0,0,0,0.8);border-radius: 0.3rem;padding: 12px 24px;border-top-right-radius: 0px;}
    	.shareGuidance .box p{color: #fff;font-size: 0.7rem;line-height: 1.1rem;}
    	.shareGuidance .box p img{display: inline-block;}
    </style>
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>回答详情</h3>
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

	    <div class=" fix">
	    	<!--问题-->
			<div class="hunk question fix" data-id="<?php echo $this->_tpl_vars['info']['id']; ?>
">
				<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id=<?php echo $this->_tpl_vars['info']['faq_id']; ?>
">
					<h3 class="name omit lineNumber2"><?php echo $this->_tpl_vars['info']['title']; ?>
</h3>
					<div class="browseNum fix">查看其他<i><?php echo $this->_tpl_vars['info']['res_account']; ?>
</i>条回答</div>
					<div class="skip"><img src="/resource/m/images/common/icon_pullDown.png"/></div>
				</a>
			</div>
	    	
	    	<!--答-->
	    	<input type="hidden" name="uid" id="uid" data-type="4" value="<?php echo $this->_tpl_vars['info']['uid']; ?>
" />
	    	<input type="hidden" name="" id="answerNum" title="回答的总数" value="" />
	    	<input type="hidden" id="UniqueValue" data-sign="detail" value="faq_num" data-rid="<?php echo $this->_tpl_vars['info']['id']; ?>
" data-type="4" title="共用JS区分的唯一必须值"/>

	    	<div class="modules answer fix" id="answer">
				<div class="hunk fix">
					<div class="bottom fix">
						<div class="left answerLef fix">
							<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['info']['headpic']; ?>
);"></span></span>&nbsp;
							<span class="name"><?php echo $this->_tpl_vars['info']['username']; ?>
</span>
							<span class="grade"><?php echo $this->_tpl_vars['info']['lv']; ?>
</span>
							<span class="botton" onclick="follows(<?php echo $this->_tpl_vars['info']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</span>
						</div>
						<div class="right transform fix"><span><?php echo $this->_tpl_vars['info']['addtime']; ?>
</span></div>
					</div>
					<div class="substanc fix" id="answerContent"><?php echo $this->_tpl_vars['info']['content']; ?>
</div>
					
					<div class="videoBottom fix">
						<div class="left">
							<span class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['info']['id']; ?>
)" data-nature="subject">
								<img src="/resource/m/images/common/icon_like.png"><i class="Iclass"><?php echo $this->_tpl_vars['info']['top_num']; ?>
</i>
							</span>&nbsp;&nbsp;
						</div>
						
						<div class="right">
							<span class="share" onclick="shareGuidance()">分享</span>&nbsp;&nbsp;
						</div>
					</div>
	    		</div>
	    	</div>
	    	
	        <!--评论区-->
	        <div class="m-comment">
	        	<div class="navigation" id="navigation" data-type="1">
	        		<span class="titleTWO">评论</span>
	        		<p class="Button fix">
	        			<span class="press pressTime onn">按时间</span>&nbsp;|&nbsp;
	        			<span class="press pressHeat">按热度</span>
	        		</p>
	        	</div>
	            
	            <!--每页-->
	            <input type="hidden" name="" id="multipage" value="<?php echo $this->_tpl_vars['multipage']['page']; ?>
" title="评论的总页数" />
	            <input type="hidden" name="" id="from_url" value="<?php echo $this->_tpl_vars['from_url']; ?>
" title="登录完之后跳转回这个本来的游记" />
	            <div class="box fix" data-page="1">
		        	<ul class="ul-imgtxt4 fix" id="receptacle">
		            	<?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
		                <li><div class="tit">
		                        <a class="dis_block fix" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
">
				                    <i style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);"></i>
				                    <h3><b class="username_<?php echo $this->_tpl_vars['vo']['uid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</b></h3>
				                    <span class="addtime"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
				                </a>
		                    </div>
		                    <div class="substance" data-replyNum="<?php echo $this->_tpl_vars['vo']['count']; ?>
">
		                    	<div class="txtt"><?php echo $this->_tpl_vars['vo']['content']; ?>
</div>
			                    <div class="BarSubmenu">
			                    	<span class="reply replyReview" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-open="0" data-class="1">回复</span>
			                    	<div class="leftSubmenu">
				                    	<span class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-nature="review">
				                    		<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>
				                    		<i><?php echo $this->_tpl_vars['vo']['top_num']; ?>
</i>
				                    	</span>
			                    	</div>
			                    </div>
			
			                    <!--回复【评论】的文本框-->
			                    <div class="m-publish details_stair" data-tid="<?php echo $this->_tpl_vars['vo']['id']; ?>
">
					                <div class="wp">
					                    <div class="content">
					                        <div class="top"><span class="emotion<?php echo $this->_tpl_vars['vo']['id']; ?>
" onclick="emotion(<?php echo $this->_tpl_vars['vo']['id']; ?>
)"></span></div>
					                        <textarea id="comment<?php echo $this->_tpl_vars['vo']['id']; ?>
" placeholder="写下您的感受......."></textarea>
					                        <?php if (! $this->_tpl_vars['user']): ?> 
					                        <div class="nologin">
					                            <div class="nologinbtn">
					                                <a class="from_url" href="javascript:;">登录</a>
			                                        <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
					                            </div>
					                        </div>
					                        <?php endif; ?>
					                    </div>
					                    <span class="btn btnComment_Review" data-touid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-class="1" data-name="">发表回复</span>
					                </div>
					            </div>
					            
					            <!--对应评论的所有回复-->
					            <div class="blockquote_wrap" data-i="<?php echo $this->_tpl_vars['k']+1; ?>
" data-count="<?php echo $this->_tpl_vars['vo']['count']; ?>
">
		                            <?php $_from = $this->_tpl_vars['vo']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		                            <div class="module fix">
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
						                    	<span class="reply reply_reply" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-open="0" data-class="2">回复</span>
						                    	<div class="leftSubmenu">
						                    		<span class="addtime"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
							                    	<span class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-nature="review">
							                    		<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>
							                    		<i><?php echo $this->_tpl_vars['item']['top_num']; ?>
</i>
							                    	</span>
						                    	</div>
						                    </div>
		
			                                <!--回复的弹出框-->
			                                <div class="m-publish details_">
			                                    <div class="wp">
			                                        <div class="content">
			                                            <div class="top"><span class="emotion<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="emotion(<?php echo $this->_tpl_vars['item']['id']; ?>
)"></span></div>
			                                            <textarea id="comment<?php echo $this->_tpl_vars['item']['id']; ?>
" placeholder="写下您的感受......."></textarea>
			                                            <?php if (! $this->_tpl_vars['user']): ?>
			                                            <div class="nologin">
			                                                <div class="nologinbtn">
			                                                    <a class="from_url" href="javascript:;">登录</a>
			                                                    <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
			                                                </div>
			                                            </div>
			                                            <?php endif; ?>
			                                        </div>
			                                        <span data-touid="<?php echo $this->_tpl_vars['item']['uid']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-pid_sub="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-class="2" class="btn btnComment_">发表回复</span>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
		                            <?php endforeach; endif; unset($_from); ?>
					            </div>
		                    </div>
		                </li>
		                <?php endforeach; endif; unset($_from); ?>
		           	</ul>
					<p class="tips"></p>
		       	</div>
	
	            <!-- 页码 -->
	            <?php if ($this->_tpl_vars['multipage']): ?>
		        <div class="pages" data-nowPage="1">
		            <ul id="pageComposer">
		            	<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
		                <li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a class="pageTurning" href="javascript:;" data-href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
		                <?php endforeach; endif; unset($_from); ?>
		            </ul>
		        </div>
		        <?php endif; ?>
	            <!-- 页码 end-->
	            
	            <!--评论-->
	            <div class="m-publish original">
	                <div class="wp">
	                    <div class="content">
	                        <div class="top"><span class="emotion"></span></div>
	                        <textarea id="comment" placeholder="写下您的感受......."></textarea>
	                        <?php if (! $this->_tpl_vars['user']): ?> 
	                        <div class="nologin">
	                            <div class="nologinbtn">
	                                <a class="from_url" href="javascript:;">登录</a>
	                                <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
	                            </div>
	                        </div>
	                        <?php endif; ?>
	                    </div>
	                    <span class="btn btnComment">发表评论</span>
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <!--分享引导弹窗-->
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失">
	    	<div class="shareGuidance fix">
	    		<div class="box fix">
	    			<img class="icon_share" src="/resource/m/images/user/icon_share.png"/>
	    			<p class="">1.点击右上角“...”</p>
					<p class="">2.选择“<img class="" src="/resource/m/images/user/icon_share2.png" />”分享给朋友</p>
	    		</div>
			</div>
    		<div class="shade" onclick="shade()"></div>
		</div>
	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>

	
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
    <script type="text/javascript">
		//分享
		function shareGuidance(){
			$(".maskLayer").removeClass("dis_none");
		}
		function shade(){
			$(".maskLayer").addClass("dis_none");
		}
	</script>
</body>
</html>