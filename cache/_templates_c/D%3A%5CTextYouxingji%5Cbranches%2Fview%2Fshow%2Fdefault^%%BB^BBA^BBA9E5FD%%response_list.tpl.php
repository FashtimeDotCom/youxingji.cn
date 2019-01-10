<?php /* vpcvcms compiled created on 2019-01-07 12:01:35
         compiled from index/faq/response_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/faq/response_list.tpl', 107, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>问题详情_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/response_list.css" />
</head>
<body onkeydown="on_return();">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main">
    <div class="wp fix" style="padding-top: 34px;">
    	<!--左侧正文-->
    	<div class="col_l">
        	<div class="issueSearch fix">
        		<input type="text" class="searchVal" id="search" maxlength="250" value="" onkeyup="judgeIsNonNull1(event)" placeholder="提问前请先搜索，看看你的问题其他用户是否已经提问" />
        		<input type="button" name="确认按钮" class="searchAffirm" id="searchAffirm" onclick="searchAffirm()" />
        	</div>

        	<!--问题-->
    		<div class="trouble fix">
    			<div class="labelList">
					<?php $_from = $this->_tpl_vars['faq_detail']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<em class="label"><?php echo $this->_tpl_vars['item']; ?>
</em>
					<?php endforeach; endif; unset($_from); ?>
    				<p class="right"><span><i class="Iclass"><?php echo $this->_tpl_vars['faq_detail']['show_num']; ?>
</i>浏览</span>&nbsp;|&nbsp;<span><i class="Iclass"><?php echo $this->_tpl_vars['faq_detail']['response_num']; ?>
</i>回答</span></p>
    			</div>
        		<p class="issue whiteSpace"><?php echo $this->_tpl_vars['faq_detail']['title']; ?>
</p>
            	<div class="box fix">
                	<p class="describe whiteSpace"><?php echo $this->_tpl_vars['faq_detail']['desc']; ?>
</p>
            		<img class="illustration" src="<?php echo $this->_tpl_vars['faq_detail']['thumbfile']; ?>
" />
            	</div>
                <div class="bottom">
                	<div class="left">
                		<a href="javascript:;" class="button respond">回答问题</a>
                		<a href="javascript:;" class="button collect" onclick="collect(<?php echo $this->_tpl_vars['faq_detail']['id']; ?>
)">收藏问题</a>
                	</div>
                	<div class="right">
                		<span class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['faq_detail']['headpic']; ?>
);"></span>&nbsp;&nbsp;
                		<span class="name"><?php echo $this->_tpl_vars['faq_detail']['username']; ?>
</span>&nbsp;提问于·<?php echo $this->_tpl_vars['faq_detail']['addtime']; ?>

                	</div>
                </div>
            </div>

			<!--回答 列表-->
            <div class="bigBox" data-index="1">
				<!--有回答-->
				<input type="hidden" name="uid" id="uid" data-type="4" value="" />
				<input type="hidden" name="faq_num" id="faq_num" title="回答的总数" value="<?php echo $this->_tpl_vars['total']; ?>
" />
				<input type="hidden" id="from_url" value="<?php echo $this->_tpl_vars['from_url']; ?>
" title="登录完之后跳转回这个本来的问题" />
				<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['faq_detail']['id']; ?>
" data-length="38" value="faq_num" data-uid="<?php echo $this->_tpl_vars['faq_detail']['uid']; ?>
" data-type="4" title="共用JS区分的唯一必须值"/>
				<?php if (! $this->_tpl_vars['user']): ?>
				<input type="hidden" name="用户是否登陆" id="userRegister" value="0" />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['response_list']): ?>
				<div class="box boxList" id="boxList">
					<?php $_from = $this->_tpl_vars['response_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
					<div class="modules fix" id="modules<?php echo $this->_tpl_vars['vo']['id']; ?>
">
						<div class="writer">
							<div class="left">
								<div class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['vo']['headpic']; ?>
);"></div>
								<span class="name"><?php echo $this->_tpl_vars['vo']['realname']; ?>
</span>
								<span class="time"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
							</div>
							<a href="javascript:;" class="dianzan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-nature="subject">
								<em></em>&nbsp;<i class="Iclass"><?php echo $this->_tpl_vars['vo']['top_num']; ?>
</i>
							</a>
						</div>
						<div class="detailss whiteSpace" title="回答的内容"><?php echo $this->_tpl_vars['vo']['content']; ?>
</div>
						<p class="readSwitch dis_none">
							<a href="javascript:;" data-switch="0">
								<i class="Iclass">展开全文阅读</i><img class="icon icon1" src="/resource/m/images/user/8.png" />
							</a>
						</p>
						<!--展开评论列表-->
						<p class="OpenCommentList fix OpenCommentList<?php echo $this->_tpl_vars['vo']['id']; ?>
">
							<a href="javascript:;" data-switch="0">
								<?php if ($this->_tpl_vars['vo']['sub']): ?><!--有评论-->
								<img class="icon_1" src="/resource/images/common/icon_review1.png"/><i class="Iclass" ><?php echo $this->_tpl_vars['vo']['count']; ?>
</i>条评论
								<?php else: ?><!--无评论-->
								<img class="icon_1" src="/resource/images/common/icon_review1.png"/><i class="Iclass" ></i>添加评论<img class="icon_2" src="/resource/images/icon15-qm.png" />
								<?php endif; ?>
							</a>
						</p>

                        <?php if ($this->_tpl_vars['vo']['sub']): ?>
                        <!--有评论或者  生成新评论-->
                        <div class="m_comment">
                            <em class="location"></em>
                            <!--评论列表-->
                            <input type="hidden" id="" value="<?php echo $this->_tpl_vars['multipage']['page']; ?>
" title="评论的总页数" />
                            <div class="box fix">
                                <ul class="ul_imgtxt4 fix" id="receptacle<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-page="1">
                                    <?php $_from = $this->_tpl_vars['vo']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                                    <li <?php if ($this->_tpl_vars['k'] < 3): ?>class="module fix" <?php else: ?> class="module fix dis_none"<?php endif; ?>>
                                        <div class="details">
                                            <a class="headPortrait" href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['v']['uid']; ?>
" style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);" target="_blank"></a>
                                            <h3><a class="username_" href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['v']['uid']; ?>
"><?php echo $this->_tpl_vars['v']['realname']; ?>
</a>
                                            	 <?php if ($this->_tpl_vars['v']['touid']): ?>
												对 <span class="username_" href="javascipt:;"><?php echo $this->_tpl_vars['v']['to_realname']; ?>
</span> 说：
                                            	 <?php endif; ?>
                                                <a class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['v']['id']; ?>
)" data-nature="review" href="javascript:;">
													<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>
													<i><?php echo $this->_tpl_vars['v']['top_num']; ?>
</i>
												</a>
                                                <em class="addtime"><?php echo $this->_tpl_vars['v']['addtime']; ?>
</em>
                                            </h3>
                                        </div>
                                        <div class="substance">
                                            <div class="description whiteSpace"><?php echo $this->_tpl_vars['v']['content']; ?>
</div>
                                            <div class="BarSubmenu">
                                                <a class="reply replyReview" onclick="replyFunction(this)" href="javascript:;" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
" data-open="0">回复</a>
                                            </div>
                                            <!--回复【评论】框-->
						                    <div class="m-publish details_stair" data-tid="<?php echo $this->_tpl_vars['vo']['id']; ?>
">
								                <div class="wp">
								                    <div class="content">
								                        <textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>
								                        <?php if (! $this->_tpl_vars['user']): ?>
								                        <div class="nologin">
								                            <div class="nologinbtn">
								                                <a class="from_url" href="javascript:;">登录</a>
								                                <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
								                            </div>
								                        </div>
								                        <?php endif; ?>
								                    </div>
								                    <div class="bottomArea fix">
									                    <a class="btn ReviewComment" data-touid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-name="<?php echo $this->_tpl_vars['v']['username']; ?>
" href="javascript:;">回复评论</a>
									                    <span class="wordLimit"><i class="Iclass">0</i> /255字</span>
								                    </div>
								                </div>
								            </div>
										</div>
									</li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
								<?php if ($this->_tpl_vars['vo']['count'] > 3): ?>
								<a class="seeMore hint" href="javascript:;" data-list="1" data-count="<?php echo $this->_tpl_vars['vo']['count']; ?>
" onclick="seeMore(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)">
									还有<span class="colorTips name"><?php echo $this->_tpl_vars['v']['realname']; ?>
</span> 等人 <span class="colorTips name">共<i class="Iclass" id="return<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['count']-3; ?>
</i>条回复</span>
								</a>
								<?php endif; ?>
								<p class="tips"></p>
							</div>

							<!--评论框-->
							<div class="m_publish original">
								<div class="wp">
									<div class="content">
										<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>
										<?php if (! $this->_tpl_vars['user']): ?>
										<div class="nologin">
											<div class="nologinbtn">
												<a class="from_url" href="javascript:;">登录</a>
												<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<div class="bottomArea fix">
										<a class="btn addComment" href="javascript:;" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
">发表评论</a>
										<span class="wordLimit"><i class="Iclass">0</i> /255字</span>
									</div>
								</div>
							</div>
						</div>
						<?php else: ?>
						<!--无评论-->
						<div class="m_comment">
							<em class="location"></em>
							<!--评论列表-->
							<div class="box fix">
								<ul class="ul_imgtxt4 fix" id="receptacle<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-page="1"></ul>
								<p class="tips"></p>
							</div>

							<!--评论框-->
							<div class="m_publish original">
								<div class="wp">
									<div class="content">
										<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>
										<?php if (! $this->_tpl_vars['user']): ?>
										<div class="nologin">
											<div class="nologinbtn">
												<a class="from_url" href="javascript:;">登录</a>
												<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<div class="bottomArea fix">
										<a class="btn addComment" href="javascript:;" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
">发表评论</a>
										<span class="wordLimit"><i class="Iclass">0</i> /255字</span>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<?php else: ?>
				<!--暂无回答-->
				<div class="NoAnswer">
					<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
					<p class="tipsButtom">暂无信息</p>
				</div>
				<?php endif; ?>

            	<!-- 页码 -->
				<?php if ($this->_tpl_vars['multipage']): ?>
				<div class="pages">
					<div class="amount">共<i class="Iclass"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
					<ul><?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
						<li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				<?php endif; ?>
				<!-- 页码 end-->

				<!--我要回答-->
				<input type="hidden" name="当前问题的ID" id="faq_id" value="<?php echo $this->_tpl_vars['faq_id']; ?>
" />
				<div class="IWillAnswer fix" id="IWillAnswer">
					<div class="roof fix">
						<div class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['user']['headpic']; ?>
);"></div>
			            <span class="name"><?php echo $this->_tpl_vars['user']['realname']; ?>
</span>
					</div>

		            <p style="margin: 20px 0;">
		            	<textarea id="demo" style="display: none;"></textarea>
		            	<?php if (! $this->_tpl_vars['user']): ?>
						<div class="nologin">
							<div class="nologinbtn">
								<a class="from_url" href="javascript:;">登录</a>
								<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
							</div>
						</div>
						<?php endif; ?>
		            </p>
					<div class="buttonVessel fix"><a class="response" id="response" data-type="content" href="javascript:;">回答</a></div>
				</div>
           </div>
        </div>

        <!--右侧推荐-->
        <div class="col_r">
			<a href="index.php?m=index&c=user&v=set_question">
				<p class="quizButton" id="skip" data-id="<?php echo $this->_tpl_vars['faq_info']['id']; ?>
"><iclass="Iclass">+</i>&nbsp;我要提问</p>
			</a>

            <!--广告位-->
			<?php $_from = C::T('ad')->getList(array('tagname' => 'pc_question_side'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
			<div class="figure borderRadius playbill" style="background-image: url(/uploadfile/image/20180629/153026548528241.jpg);"></div>
			<?php endforeach; endif; unset($_from); ?>

            <!--热门标签-->
            <div class="HotTags">
            	<p class="title">相关问题</p>
            	<div class="labelList fix">
					<?php $_from = $this->_tpl_vars['arr_similar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
						<a href="index.php?m=index&c=faq&v=res_list&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" class="issue omit lineNumber3 whiteSpace"><?php echo $this->_tpl_vars['vo']['title']; ?>
<i class="Iclass"> <?php echo $this->_tpl_vars['vo']['response_num']; ?>
回答</i></a>
					<?php endforeach; endif; unset($_from); ?>
            	</div>
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
<script src="/resource/js/layui/layui.js"></script>
<script src="/resource/js/response_list.js"></script>
<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
<script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
<script type="text/javascript">
    function searchAffirm(){
        var searchVal = $("#search").val();
        if( searchVal == "" ){
            layer.msg('请输入要搜索的内容！');
            return false;
        }
        else if(searchVal.replace(/(^\s*)|(\s*$)/g, "")==""){
            layer.msg('搜索栏不能只输入空格！');
            return false;
        }
		window.location = "index.php?m=index&c=faq&v=index&search="+searchVal;
    }
</script>
</body>
</html>