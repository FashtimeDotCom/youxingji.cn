<?php /* vpcvcms compiled created on 2018-12-29 15:11:21
         compiled from index/tv_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index/tv_detail.tpl', 32, false),array('modifier', 'helper', 'index/tv_detail.tpl', 45, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<title>视频详情页_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/tv_detail.css" />
    <link rel="stylesheet" href="/resource/css/comment.css" />
</head>
<body onkeydown="on_return();">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
		<div class="wp">
			<div class="m-master-qm">
				<!--左侧列表-->
				<input type="hidden" name="uid" id="uid" data-type="2" value="" />
				<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['info']['id']; ?>
" data-length="38" value="tv_num" data-uid="<?php echo $this->_tpl_vars['info']['uid']; ?>
" data-type="2" title="共用JS区分的唯一必须值"/>
				<div class=" col_l">
					<iframe class="iframe" src="<?php echo $this->_tpl_vars['info']['url']; ?>
" frameborder=0 'allowfullscreen'></iframe>
					
					<!--视频信息-->
					<div class="messageBox fix">
						<p class="title"><span class="titleDetails whiteSpace"><?php echo $this->_tpl_vars['info']['title']; ?>
</span></p>
						<span class="right">
							<i class="Iclass"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</i>&nbsp;&nbsp;|&nbsp;&nbsp;
							<div class="rightBox">
								<a class="share" href="javascript:;">分享</a>
								<div class="bs_pop clearfix" id="bs_pop">
							        <a title="分享到微信" href="javascript:;" role="button" class="weixin" onclick="weixin()"></a>
							    </div>
							</div>
						</span>
						
						<p class="details whiteSpace"><?php echo $this->_tpl_vars['info']['describes']; ?>
</p>
						<a class="headPortrait figure borderRadius" style="background-image: url(<?php echo $this->_tpl_vars['info']['headpic']; ?>
);"></a>
						<div class="box">
							<p class="name"><?php echo $this->_tpl_vars['info']['username']; ?>
</p>
							<a class="botton dis_block" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['info']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
							<span class="playNum"><i class="Iclass"><?php echo $this->_tpl_vars['info']['shownum']; ?>
</i>次播放</span>
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
			            <input type="hidden" id="multipage" value="<?php echo $this->_tpl_vars['multipage']['page']; ?>
" title="评论的总页数" />
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
			            <input type="hidden" name="cur_page" id="cur_page" value="<?php echo $this->_tpl_vars['page_info']['cur_page']; ?>
">
			            <?php if ($this->_tpl_vars['multipage']): ?>
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
									到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull3(event)">页
									<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
								</li>
							</ul>
						</div>
				        <?php endif; ?>
			            <!-- 页码 end-->
			       </div>
				</div>
				
				<!--右侧内容-->
				<div class="col_r">
					<p class="title">专题选集</p>
					<div class="videoList">
						<?php $_from = $this->_tpl_vars['tv_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<div class="box fix">
							<a class="dis_block fix" href="/index.php?m=index&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
								<div class="preview figure borderRadius" style="background-image: url(<?php echo $this->_tpl_vars['item']['pics']; ?>
);"></div>
								<p class="describe omit lineNumber2"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								<p class="time"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</p>
							</a>
						</div>
						<?php endforeach; endif; unset($_from); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="h81"></div>
	</div>
	
	<div class="_j_layer" id="_j_layer" data-switch="0">
		<div class="_j_mask"></div>
		<div class="_j_content">
			<div class="popup_box">
				<div class="_j_content">
					<div class="wx-mfw-pop"><p>使用微信“扫一扫”</p>
						<p>打开网页后点击右上角“分享按钮”</p>
						<p class="_j_qrimg" id="qrcode"></p>
					</div>
				</div>
				<a id="popup_close" class="close_btn" href="javascript:;" onclick="close1(this)"></a>
			</div>
		</div>
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
    <script type="text/javascript" src="/resource/js/qrcode.min.js"></script>
	<script type="text/javascript">
		//微信分享  鼠标悬停
		var D;
		$("body").delegate(".rightBox", "mouseenter", function(E) {
			E.preventDefault();
			if(D) {
				clearTimeout(D);
			}
			$(this).find(".bs_pop").show();
		});
		//微信分享  鼠标离开
		$("body").delegate(".rightBox", "mouseleave", function(E) {
			E.preventDefault();
			var F = $(this);
			D = setTimeout(function(){
				F.find(".bs_pop").hide();
			}, 500);
		});
		//生成二维码  开始
		var qrcode = new QRCode(document.getElementById("qrcode"),{
			width : 150,
			height : 150
		});

		function makeCode(){
			var rid = $("#UniqueValue").attr("data-rid");
			var val = 'http://m.youxingji.cn/index.php?m=wap&c=index&v=tv_detail&id='+rid;
			if (!val){
				alert("Input a text");
				elText.focus();
				return;
			}
			qrcode.makeCode(val);
		}
		makeCode();

		function weixin(){
			var dataSwitch = $("#_j_layer").attr("data-switch");
			if( dataSwitch == 0 ){
				$("#_j_layer").css({"display":"block"});
				$("#_j_layer").attr("data-switch",1);
				makeCode();
			}
		}

		function close1(e){
			var dataSwitch = $("#_j_layer").attr("data-switch");
			if( dataSwitch == 1 ){
				$("#_j_layer").css({"display":"none"});
				$("#_j_layer").attr("data-switch",0);
			}
		}
		//生成二维码  结束
	</script>
</body>
</html>