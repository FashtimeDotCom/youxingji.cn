<?php /* vpcvcms compiled created on 2019-01-03 11:36:02
         compiled from index/faq/index.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人问答_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/faq.css" />
</head>
<body onkeydown="on_return();">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
		<?php $_from = C::T('ad')->getList(array('tagname' => 'pc_question_list'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
		<div class="ban" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
		<?php endforeach; endif; unset($_from); ?>

		<div class="wp fix">
			<!--左侧正文-->
			<input type="hidden" name="uid" id="uid" data-type="3" value="<?php echo $this->_tpl_vars['info']['uid']; ?>
" />
			<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="<?php echo $this->_tpl_vars['article']['id']; ?>
" value="note_num" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-type="3" title="共用JS区分的唯一必须值"/>
			<div class="col_l">
				<div class="issueSearch fix">
					<input type="text" class="searchVal" id="search" maxlength="250" value="<?php echo $this->_tpl_vars['search']; ?>
"
					placeholder="提问前请先搜索，看看你的问题其他用户是否已经提问" />
					<input type="button" name="确认按钮" class="searchAffirm" id="searchAffirm" onclick="searchAffirm()" />
				</div>

				<div class="navMeun fix">
					<a class="navLi <?php if ($this->_tpl_vars['type'] == 1): ?>on<?php endif; ?>" href="index.php?m=index&c=faq&v=index&type=1">热门问答</a>
					<a class="navLi <?php if ($this->_tpl_vars['type'] == 2): ?>on<?php endif; ?>" href="ndex.php?m=index&c=faq&v=index&type=2">最新问答<a>
							<a class="navLi <?php if ($this->_tpl_vars['type'] == 3): ?>on<?php endif; ?>" href="ndex.php?m=index&c=faq&v=index&type=3">待回答问题</a>

							<div class="navLi">共 <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i> 条搜索结果</div>
				</div>

				<div class="content" data-index="1">
					<!--热门问答  列表-->
					<div class="modules fix" id="modules1" data-nowPage="1">
						<?php if ($this->_tpl_vars['type'] == 1 && $this->_tpl_vars['list']): ?>
						<div class="matter fix">
							<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="module fix">
								<a class="dis_block fix" href="/index.php?m=index&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<p class="issue"><span><?php echo $this->_tpl_vars['item']['title']; ?>
</span>
										<?php $_from = $this->_tpl_vars['item']['label_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
										&nbsp;<em class="label"><?php echo $this->_tpl_vars['v']; ?>
</em>
										<?php endforeach; endif; unset($_from); ?>
									</p>
									<div class="box fix">
										<div class="figure borderRadius illustration" style="background-image: url(<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
);"></div>
										<p class="describe omit lineNumber4"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
									</div>
								</a>
								<div class="bottom">
									<a class="answerer" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
										<span class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span>&nbsp;&nbsp;
										<span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>&nbsp;
									</a>
									<p class="RightHandSide">
										<span class="preview"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['item']['show_num']; ?>
</i>浏览次数</span>&nbsp;&nbsp;|&nbsp;&nbsp;
										<span class="dianzan"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['item']['top_num']; ?>
</i>个赞</span>
									</p>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>

						<?php elseif ($this->_tpl_vars['type'] == 2 && $this->_tpl_vars['list']): ?>
						<div class="matter fix">
							<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="module fix">
								<a class="dis_block fix" href="/index.php?m=index&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<p class="issue"><span><?php echo $this->_tpl_vars['item']['title']; ?>
</span>&nbsp;</p>
									<div class="box fix">
										<div class="figure borderRadius illustration" style="background-image: url(<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
);"></div>
										<p class="describe omit lineNumber4"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
									</div>
								</a>
								<div class="bottom">
									<a class="answerer" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
										<span class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span>&nbsp;&nbsp;
										<span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>
									</a>
									<p class="RightHandSide">
										<span class="replyNum"><i class="Iclass"><?php echo $this->_tpl_vars['item']['response_num']; ?>
</i>个回答</span>
									</p>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>

						<?php elseif ($this->_tpl_vars['type'] == 3 && $this->_tpl_vars['list']): ?>

						<div class="matter fix">
							<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="module fix">
								<a class="dis_block fix" href="/index.php?m=index&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<p class="issue"><span><?php echo $this->_tpl_vars['item']['title']; ?>
</span>&nbsp;</p>
									<div class="box fix">
										<div class="figure borderRadius illustration" style="background-image: url(<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
);"></div>
										<p class="describe omit lineNumber4"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
									</div>
								</a>
								<div class="bottom">
									<a class="answerer" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
										<span class="figure headPortrait" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span>&nbsp;&nbsp;
										<span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>&nbsp;提了一个问题
									</a>
									<p class="RightHandSide">
										<span class="replyNum"><i class="Iclass"><?php echo $this->_tpl_vars['item']['response_num']; ?>
</i>个回答</span>
									</p>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>

						<?php else: ?>

						<div class="empty4 fix dis_none">
							<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
							<p class="tipsButtom">暂无信息</p>
						</div>

						<?php endif; ?>
					</div>
				</div>

				<!-- 页码 -->
				<div class="pagination">
					<?php if ($this->_tpl_vars['multipage']): ?>
					<div class="pages">
						<div class="amount">共<i class="Iclass"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
						<ul>
							<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
							<li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['page']['1']; ?>
&type=<?php echo $this->_tpl_vars['type']; ?>
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
				</div>
				<!-- 页码 end-->
			</div>


			<!--右侧推荐-->
			<div class="col_r">
				<a href="index.php?m=index&c=user&v=set_question"><p class="quizButton" id="skip" data-id="<?php echo $this->_tpl_vars['faq_info']['id']; ?>
"><i class="Iclass">+</i>&nbsp;我要提问</p></a>

				<!--广告位-->
				<?php $_from = C::T('ad')->getList(array('tagname' => 'pc_question_side'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
				<div class="figure borderRadius playbill" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
				<?php endforeach; endif; unset($_from); ?>

				<!--热门标签-->
				<div class="HotTags">
					<p class="title">热门标签</p>
					<div class="labelList fix">
						<?php $_from = $this->_tpl_vars['label_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<?php if ($this->_tpl_vars['key'] <= 6): ?>
						<a class="label" href="index.php?m=index&c=faq&v=index&type=<?php echo $this->_tpl_vars['type']; ?>
&keyword=<?php echo $this->_tpl_vars['item']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a>
						<?php elseif ($this->_tpl_vars['key'] == 7): ?>
						<a class="evenMore" href="javascript:;">更多<img src="/resource/images/icon15-qm.png" /></a>
						<a class="label dis_none" href="index.php?m=index&c=faq&v=index&type=<?php echo $this->_tpl_vars['type']; ?>
&keyword=<?php echo $this->_tpl_vars['item']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a>
						<?php else: ?>
						<a class="label dis_none" href="index.php?m=index&c=faq&v=index&type=<?php echo $this->_tpl_vars['type']; ?>
&keyword=<?php echo $this->_tpl_vars['item']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a>
						<?php endif; ?>
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
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		//2018-11-23  09:38:59
		//HQS
		
		//达人问答   列表
		
		//确认按钮搜索
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
			var type = <?php echo $this->_tpl_vars['type']; ?>

			window.location = "index.php?m=index&c=faq&v=index&type="+type+"&search="+searchVal;
			/*$.ajax({
		        url:'index.php?m=index&c=faq&v=index',
		        data:{search:searchVal,type:type},
		        method:'post',
		        dataType:'json',
		        success:function( data ){
		            if(data.status == 1){
		            	window.location="/index.php?m=index&c=index&v=login&from=";
		            }
		            else{
		                layer.msg(data.tips);
		            }
		        },
		        complete:function(){ }
		    });*/
		}
		
		
		//监控 页面内容输入框 ，包括粘贴板
		function judgeIsNonNull2(event){
			var value=$("#pages").val();
			$("#pages").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)

			if(value !== ""){
				var res = /[\、\…\.\．\·\•\'\,\，\。\×\_\＿\-\−\－\—\ˉ\ˇ\々\＇\｀\‘\’\“\”\〃\¨\"\＂\｜\|\‖\(\)\（\）\〔\〕\<\>\〈\〉\《\》\「\」\『\』\〖\〗\【\】\［\］\[\]\{\}\｛\｝\/\*\＊\?\？\^\＾\+\＋\=\＝\÷\¥\￥\#\＃\@\＠\!\！\`\~\～\%\％\∶\:\：\;\；\&\＆\$\＄\£\￡\€\°\°C\°F\←\↑\→\↓\／\＼\\]/g;
				if( res.test(value) ){
					$("#pages").val(value.replace(res,""));
					return false;
				}
		   	}
		}
		
		//监控 页面内容输入框 ，包括粘贴板
		$("#pages").bind('input propertychange', function(){
			judgeIsNonNull2(event);
		});
    	
    	//确定   跳转页面
        function check(){
            var page = $('#pages').val();
            var cur_page = $(".on a").text();   //当前页
            if(page){
            	if (page>total_page || page<1) {
					layer.msg("不在页数范围内!");
					return false;
				}
				if( cur_page == page ){
					layer.msg("该页码已经是当前页!");
					return false;
				}
				else{
					window.location.href="/index.php?m=index&c=index&v=tv&type=<?php echo $this->_tpl_vars['type']; ?>
&page=" + page + "#tags";
				}
            }
        }
        
        //敲回车 跳转页面
		function on_return(){
			if(window.event.keyCode == 13){
				if(document.all('pageqr') != null) {
					document.all('pageqr').click();
				}
			}
		}
		
		
		/*//我要提问
		$("#skip").on("click",function(){
            alert(1)
            var id = $(this).attr("data-id");
		    $.post("index.php?m=index&c=user&v=is_login", {
		    }, function(data){
		        if(data.status == 1){ //登录了，直接跳转
		        	window.location="/index.php?m=index&c=faq&v=set_faq";
		        }else{ //没有登录，带参数跳转到登录页
		        	layer.msg(data.tips);
		        	setInterval(function(){
						window.location="/index.php?m=index&c=index&v=login&from="+"<?php echo $this->_tpl_vars['from_url']; ?>
";
					},1000);
		        }
		    },"JSON");
		});*/
		
		
		//标签 更多
		$(".evenMore").on("click",function(){
			var obj = $(this);
			obj.addClass("dis_none");
			obj.siblings(".label").removeClass("dis_none");
		});
	</script>
</body>
</html>