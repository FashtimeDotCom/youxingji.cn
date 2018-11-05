<?php /* vpcvcms compiled created on 2018-11-01 22:30:52
         compiled from wap/star_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/star_detail.tpl', 57, false),array('modifier', 'date_format', 'wap/star_detail.tpl', 59, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>日志详情_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "日志详情"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <!--lightbox开始-->
    <link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
    <![endif]-->
    <script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.lightbox').lightbox();
        });
    </script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/star.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>日志详情</h3>
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
    	<input type="hidden" name="uid" id="uid" data-type="1" value="<?php echo $this->_tpl_vars['info']['uid']; ?>
" />
		<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['info']['id']; ?>
" data-length="38" value="travel_num" data-uid="<?php echo $this->_tpl_vars['info']['uid']; ?>
" data-type="1" title="共用JS区分的唯一必须值"/>
        <div class="wp row_list">
            <ul class="ul-list-talent">
                <div class="item fix">
                    <div class="info">
                    	<div class="tx">
                            <a class="pic figure borderRadius50" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
" style="background-image: url(<?php echo $this->_tpl_vars['info']['headpic']; ?>
);"></a>
                            <h5><span><?php echo $this->_tpl_vars['info']['username']; ?>
</span></h5>
                            <span class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span>
                            <span class="botton" onclick="follows(<?php echo $this->_tpl_vars['info']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</span>
                       	</div>
                        <div class="txt"><p><?php echo $this->_tpl_vars['info']['describes']; ?>
</p></div>
                    </div>
                    <dl class="list-img list_img">
						<?php $_from = $this->_tpl_vars['info']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<dd><a href="<?php echo $this->_tpl_vars['item']; ?>
" class="lightbox figure borderRadius" rel="list<?php echo $this->_tpl_vars['info']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']; ?>
);"></a></dd>
						<?php endforeach; endif; unset($_from); ?>
					</dl>
                    <div class="videoBottom fix">
                    	<?php if ($this->_tpl_vars['info']['address']): ?>
						<span class="left" title="标签"><img src="/resource/m/images/common/icon_location2.png" /><?php echo $this->_tpl_vars['info']['address']; ?>
</span>
						<?php endif; ?>

						<div class="right">
							<span><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i><?php echo $this->_tpl_vars['info']['shownum']; ?>
</i></span>&nbsp;&nbsp;
							<span class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['info']['id']; ?>
)" data-nature="subject">
								<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i><?php echo $this->_tpl_vars['info']['topnum']; ?>
</i>
							</span>&nbsp;&nbsp;
						</div>
						
						<div class="IMGbox fix">
							<div class="pullDownButton" onclick="pullDownButton(this)"></div>
							<div class="menuOption fix dis_none">
								<span class="collect" onclick="collect(<?php echo $this->_tpl_vars['info']['id']; ?>
)">收藏</span>
								<span class="cancel">取消</span>
							</div>
						</div>
					</div>
               	</div>
            </ul>
       	</div>
	
		<!--评论区-->
        <div class="m-comment">
        	<div class="navigation" id="navigation" data-type="1">
        		<span class="title">评论</span>
        		<p class="Button fix">
        			<span class="press pressTime onn">按时间</span>
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
	                    	<div class="txtt"><p><?php echo $this->_tpl_vars['vo']['content']; ?>
</p></div>
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
	<div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】">

	</script><script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
	<script type="text/javascript">
		//点击下拉
		function pullDownButton(obj){
			if( $(obj).next(".menuOption").attr("class")=="menuOption fix dis_none" ){
				$(".menuOption").addClass("dis_none");
				$(obj).next(".menuOption").removeClass("dis_none");
				$(".maskLayer").removeClass("dis_none");
			}else{
				$(".maskLayer,.menuOption").addClass("dis_none");
			}
		}
		
	    //点击遮罩层显示
	    $('.maskLayer,.cancel').on("click",function() {
	    	$(".maskLayer,.menuOption").addClass("dis_none");
	    });
	</script>
</body>
</html>