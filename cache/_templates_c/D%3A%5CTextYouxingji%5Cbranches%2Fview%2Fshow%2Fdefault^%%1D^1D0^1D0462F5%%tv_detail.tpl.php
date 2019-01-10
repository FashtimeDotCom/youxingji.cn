<?php /* vpcvcms compiled created on 2018-12-27 19:39:36
         compiled from wap/tv_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'wap/tv_detail.tpl', 99, false),array('modifier', 'helper', 'wap/tv_detail.tpl', 129, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->_tpl_vars['info']['title']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "达人视频"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['info']['title']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['info']['title']; ?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
    <style type="text/css">
    	.BigBox{overflow: hidden;background-color: #fff;}
		.BigBox .Video{display: block;width: 100%;height: 20rem;}
		.BigBox .main{position: relative;}
		.BigBox .main .boxTop{position: relative;z-index: 2;padding: 10px 10px;border-bottom: 1.5px rgba(99, 92, 78, 0.6) solid;}
		.BigBox .main .boxTop p{color: #fff;text-align: justify;}
		.BigBox .main .boxTop .title{font-size: 1.3rem;margin-top: 10px}
		.BigBox .main .boxTop .describe{font-size: 1.2rem;margin-top: 10px}
		.BigBox .main .boxTop .boxs{margin-top: 10px;}
		.BigBox .main .boxTop .boxs .profile{width: 16%;padding-bottom: 15.24%;float: left;border: 1.5px #fff solid;margin-right: -16%;}
		.BigBox .main .boxTop .boxs .module{padding-left: 20%;width: 100%;float: left;}
		.BigBox .main .boxTop .boxs .module span{margin-right: 10px;color: #fff;}
		.BigBox .main .boxTop .boxs .module .name{font-size: 1.3rem;line-height: 30px;}
		.BigBox .main .boxTop .boxs .module .tag{font-size: 1.2rem;}
		.BigBox .main .botton{padding: 0 10px 15px;}
		.BigBox .main .botton p{color: #fff;position: relative;}
		.BigBox .main .botton .title{font-size: 1.3rem;line-height: 34px;margin-top: 8px;}
		.BigBox .main .botton .title .back{display: block; font-size: 1.3rem;float: right;}
		.BigBox .main .botton .slideshow .pic{padding-bottom: 55%;position: relative;border-radius: 3px;}
		.BigBox .main .botton .slideshow .pic .addtime{position: absolute;right: 0;bottom: 1rem;background: #111111;color: #bababa;}
		.BigBox .main .botton .slideshow .little_title{font-size: 0.9rem;text-align: justify;color: #fff;}
		.BigBox .main .botton .slideshow .little_title a{width: 100%;height: 100%;}

		.bg_blur{-webkit-filter: blur(5px) contrast(.8) brightness(.8);
	            -moz-filter: blur(5px);
	            -o-filter: blur(5px);
	            -ms-filter: blur(5px);
	            filter: blur(5px) contrast(.8) brightness(.8);}
    </style>
</head>
<body>
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>达人视频</h3>
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
" data-length="38" value="tv_num" data-uid="<?php echo $this->_tpl_vars['info']['uid']; ?>
" data-type="2" title="共用JS区分的唯一必须值"/>
        <div class="BigBox">
        	<iframe class="Video" title="<?php echo $this->_tpl_vars['info']['title']; ?>
" src="<?php echo $this->_tpl_vars['info']['url']; ?>
"></iframe>
        	<div class="main fix">
            	<div class="imgBg bg_blur" style="background: url(<?php echo $this->_tpl_vars['info']['pics']; ?>
) no-repeat top center / 200%;"></div>
            	<div class="boxTop fix">
            		<p class="title whiteSpace"><?php echo $this->_tpl_vars['info']['title']; ?>
</p>
	            	<p class="describe whiteSpace"><?php echo $this->_tpl_vars['info']['describes']; ?>
</p>
	            	<div class="boxs fix">
	            		<div class="profile figure borderRadius50" style="background-image: url(<?php echo $this->_tpl_vars['info']['headpic']; ?>
);"></div>
	            		<div class="module fix">
	            			<p class="name"><?php echo $this->_tpl_vars['info']['username']; ?>
</p>
	            			<input type="hidden" name="synopsis" id="synopsis" value="<?php echo $this->_tpl_vars['info']['autograph']; ?>
" />
	            			<p class="tag">
								<span class="autograph whiteSpace"></span>
								<span class="viewMore dis_none" data-open="0">查看全文</span>
							</p>
	            		</div>
	            	</div>
            	</div>
            	<div class="botton fix">
            		<p class="title">选集 <span class="back" onClick="javascript:history.back()">返回上页</span></p>
            		<div class="slideshow swiper-container" id="bannerSwiper">
						<div class="swiper-wrapper">
						<?php if ($this->_tpl_vars['tv_list']): ?>
							<?php $_from = $this->_tpl_vars['tv_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="swiper-slide">
								<a class="dis_block" href="/index.php?m=wap&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<div class="pic figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['pics']; ?>
);">
										<span class="bo"></span>
										<span class="addtime"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
									</div>
									<p class="little_title whiteSpace"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						</div>
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
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		var swiper = new Swiper('#bannerSwiper', {
				slidesPerView: 2.5,//设置slider容器能够同时显示的slides数量(carousel模式)
				//loop: true,
				initialSlide: 0,//设定初始化时slide的索引
				spaceBetween: 8, //在slide之间设置距离（单位px）
			});
	</script>
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
</body>
</html>