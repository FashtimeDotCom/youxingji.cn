<?php /* vpcvcms compiled created on 2019-01-02 18:58:01
         compiled from index/travel_note_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/travel_note_detail.tpl', 130, false),array('modifier', 'date_format', 'index/travel_note_detail.tpl', 179, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <!--私人游记详情页-->
    <title><?php echo $this->_tpl_vars['article']['title']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/css/comment.css" />
    <style>
    	.Iclass{font-style: normal;}
    	.dis_none{display: none;}
    	.location{display: inline-block;color: #666;margin-right:20px;}
		.location img{display: inline-block;width: 11px;float: left;margin-top: 4px;margin-right:6px;}
		.look{line-height:20px;font-size:14px;margin:0 10px;color:#999;}
		.look i{display:inline-block;vertical-align:middle;margin-top:-3px;width:20px;height:20px;background-repeat:no-repeat;background-position:center center;margin-right:5px}
    	.g-operation-qm a{line-height:20px;font-size:14px;margin:0 10px;color:#999;}
		.g-operation-qm a:hover{color:#d71618}
    	.g-operation-qm a em{display:inline-block;vertical-align:middle;margin-top:-3px;width:20px;height:20px;
    						background-repeat:no-repeat;
    						background-position:center center;
    						background-image: url(../resource/images/icon12-qm.png);
    						margin-right:5px}
		.tips{text-align: center;color: #ccc;margin: 0px auto 10px;}
		.loading{margin: 0 auto;display: block;width: 5%;}
		.one i{color:#d71618}
		.one em{background-image: url(../resource/images/icon12-1-qm.png)!important;}
		.whiteSpace{white-space: pre-wrap!important;
					word-wrap: break-word!important;
					*white-space:normal!important;}
		/* 去除ios input框点击时的灰色背景 */
		input{-webkit-tap-highlight-color:rgba(0,0,0,0);}
		/* 去掉input 的上下箭头 开始*/
		.pageJump_text::-webkit-outer-spin-button,
		.pageJump_text::-webkit-inner-spin-button { -webkit-appearance: none!important; ; }
		.pageJump_text{ -moz-appearance: textfield; }
				/*页码*/
		.pagination{width: 1200px;margin: 16px  auto 0;}
		.pages .amount{display: inline-block;color: #999;margin-right: 10px;}
		.pages li a{width: auto;padding: 0 9px;}
		.pages li a:hover,.pages li.on a{background-color:#d71618!important;}
		
		.pages .pages-form .btn{background: -webkit-linear-gradient(#fefffe, #f0f1f0); /* Safari 5.1 - 6.0 */
								background: -o-linear-gradient(#fefffe, #f0f1f0); /* Opera 11.1 - 12.0 */
								background: -moz-linear-gradient(#fefffe, #f0f1f0); /* Firefox 3.6 - 15 */
								background: linear-gradient(#fefffe, #f0f1f0); /* æ ‡å‡†çš„è¯­æ³• */}
		.pages .pages-form .btn:hover{background:#d71618;}
    </style>
</head>
<body onkeydown="on_return();">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
	    <?php $_from = C::T('ad')->getList(array('tagname' => 'rytdetailslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
	    <div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
	    <?php endforeach; endif; unset($_from); ?>
	    <div class="cur">
	        <div class="wp">
	            <a href="">首页</a> &gt; <a href="/index.php?m=index&c=travelnote&v=note_list">达人游记</a> &gt; <span class="whiteSpace"><?php echo $this->_tpl_vars['article']['title']; ?>
</span>
	        </div>
	    </div>
	    <div class="wp">
	        <div class="m-master-qm">
	        	<!--左侧正文-->
	        	<input type="hidden" name="uid" id="uid" data-type="3" value="<?php echo $this->_tpl_vars['info']['uid']; ?>
" />
        		<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['article']['id']; ?>
" value="note_num" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-type="3" title="共用JS区分的唯一必须值"/>
	            <div class="col-l">
	                <div class="m-text1-qm">
	                    <h1 class="whiteSpace"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
	                    <div class="info">
	                        <span>By <em><?php echo $this->_tpl_vars['article']['username']; ?>
</em></span>
	                        <?php if ($this->_tpl_vars['article']['address']): ?>
	                        <div class="location">
								<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
								<i class="Iclass"><?php echo $this->_tpl_vars['article']['address']; ?>
</i>
							</div>
							<?php endif; ?>
	                        <span><?php echo $this->_tpl_vars['article']['addtime']; ?>
</span>
	                        <div class="g-operation-qm">
	                            <span class="look"><i></i><?php echo $this->_tpl_vars['article']['show_num']; ?>
</span>|
	                            <a href="javascript:;" onclick="zan(this,<?php echo $this->_tpl_vars['article']['id']; ?>
)" data-nature="subject" data-discern="2">
	                            	<em></em><i class="Iclass"><?php echo $this->_tpl_vars['article']['top_num']; ?>
</i>
	                            </a>
	                        </div>
	                    </div>
	                    <div class="txt whiteSpace"><?php echo $this->_tpl_vars['article']['content']; ?>
</div>
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
				        <div class="pages">
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
')" data-val="<?php echo $this->_tpl_vars['page']['0']; ?>
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
	            <div class="col-r">
	                <h3 class="g-tit1-qm">游记推荐</h3>
	                <div class="m-pic2-qm">
	                    <div class="slider">
	                        <?php $_from = $this->_tpl_vars['tjryt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
	                        <div class="item">
	                            <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
	                                <div class="pic">
	                                    <img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="">
	                                    <span><?php echo $this->_tpl_vars['vo']['title']; ?>
</span>
	                                </div>
	                            </a>
	                        </div>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </div>
	                </div>
	                <h3 class="g-tit1-qm">相关目录</h3>
	                <ul class="ul-txt2-qm">
	                    <?php $_from = $this->_tpl_vars['tjlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
	                    <li><span><?php echo $this->_tpl_vars['k']+1; ?>
/</span>
	                        <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
	                    </li>
	                    <?php endforeach; endif; unset($_from); ?>
	                </ul>
	            </div>
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
	<!--右侧 文章  轮播图  开始-->
	<link rel="stylesheet" href="/resource/css/slick.css">
	<script src="/resource/js/slick.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('.m-pic2-qm .slider').slick({
	            dots: false,
	            arrows: true,
	            autoplay: true,
	            slidesToShow: 1,
	            autoplaySpeed: 5000,
	            pauseOnHover: false,
	            lazyLoad: 'ondemand'
	        });
	    });
	</script>
	<!--右侧 文章  轮播图  结束-->
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>