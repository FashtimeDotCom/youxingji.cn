<?php /* vpcvcms compiled created on 2018-12-28 14:23:51
         compiled from index/new_travel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/new_travel.tpl', 55, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>达人日志_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/css/module.css" />
	<link rel="stylesheet" href="/resource/css/module-less.css" />
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
	<link rel="stylesheet" href="/resource/css/new_travel.css" />
</head>
<body onkeydown="on_return();">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="main">
		<?php $_from = C::T('ad')->getList(array('tagname' => 'pc_new_star'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
		<div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
		<?php endforeach; endif; unset($_from); ?>
		<div class="cur"><div class="wp"><a href="/">首页</a> &gt; <span>达人日志<?php if ($this->_tpl_vars['keyword']): ?>【<?php echo $this->_tpl_vars['keyword']; ?>
】<?php endif; ?></span></div></div>
		<div class="wp">
			<div class="m-master-qm">
				<!--左侧列表-->
				<div class="col-l col_l">
					<div class="menu fix">
						<a class="button <?php if ($this->_tpl_vars['type'] == 1): ?>onn<?php endif; ?>" href="/index.php?m=index&c=travel&v=travel_list&type=1">最新旅行日志</a>
						<a class="button <?php if ($this->_tpl_vars['type'] == 2): ?>onn<?php endif; ?>" href="/index.php?m=index&c=travel&v=travel_list&type=2">热门旅行日志</a>
						<a class="ReleaseLog" href="/index.php?m=index&c=user&v=addtravel">发布旅行日志</a>
					</div>
					
					<input type="hidden" name="uid" id="uid" data-type="1" value="" />
					<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="travel_num" title="共用JS区分的唯一必须值" />
					<div class="con">
						<ul class="ul-imgtxt2-qm list_v">
							<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
							<li><div class="top">
									<div class="left">
										<a class="profilePhoto figure borderRadius50" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank" style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);"></a>
										<a class="botton dis_block" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
									</div>
										
									<div class="txt p_btn">
										<div class="tit">
											<span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
											<h3><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</a></h3>
										</div>
										<p><a class="dis_block omit lineNumber3 whiteSpace" href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['describes']; ?>
</a></p>
										<?php if ($this->_tpl_vars['vo']['picnum'] == 2 || $this->_tpl_vars['vo']['picnum'] == 4 || $this->_tpl_vars['vo']['picnum'] == 6): ?>
										<style type="text/css">
											<?php if ($this->_tpl_vars['vo']['picnum'] == 2): ?>
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
 a{height: 205.5px!important;}
											<?php endif; ?>
											<?php if ($this->_tpl_vars['vo']['picnum'] == 4): ?>
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
 a{height: 199.5px!important;}
											<?php endif; ?>
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
{width: 49.375%;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(2){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(4){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
										</style>
										<?php else: ?>
										<style type="text/css">
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
{width: 32.5%;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(3){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(6){margin-right: 0!important;}
											.ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
:nth-of-type(9){margin-right: 0!important;}
										<?php endif; ?>
										</style>
										<dl><?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
											<dd class="ddClass<?php echo $this->_tpl_vars['vo']['id']; ?>
">
												<a class="lightbox figure" href="<?php echo $this->_tpl_vars['v']; ?>
" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['v']; ?>
);"></a>
											</dd>
											<?php endforeach; endif; unset($_from); ?>
										</dl>
										<div class="location">
											<?php if ($this->_tpl_vars['vo']['address']): ?>
											<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
											<i class="Iclass"><?php echo $this->_tpl_vars['vo']['address']; ?>
</i>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="bottom">
									<div class="hideed" onclick="collect(<?php echo $this->_tpl_vars['vo']['id']; ?>
)">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
									</div>
									<div class="theory">
										<a href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										</a>
									</div>
									<div class="zan" onclick="zan(this,<?php echo $this->_tpl_vars['vo']['id']; ?>
)" data-sign="his" data-nature="list" data-val="travel_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</i></a>
									</div>
									<div class="look"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</i></div>
								</div>
							</li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>

						<!-- 页码 -->
						<?php if ($this->_tpl_vars['multipage']): ?>
						<div class="pages">
							<div class="amount">共<i class="Iclass" id="total_page"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
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
						<!-- 页码 end-->
					</div>
				</div>
				
				<!--右侧内容-->
				<div class="col-r col_r">
					<?php if ($this->_tpl_vars['tjstar']['0']['username']): ?>
					<h3 class="g-tit1-qm">本周推荐达人</h3>
					<div class="m-pic1-qm">
						<div class="pic">
							<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tjstar']['0']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><img src="<?php echo $this->_tpl_vars['tjstar']['0']['avatar']; ?>
" alt=""></a>
						</div>
						<span><?php echo $this->_tpl_vars['tjstar']['0']['username']; ?>
</span>
						<p class="whiteSpace" style="text-align: justify;"><?php echo $this->_tpl_vars['tjstar']['0']['autograph']; ?>
</p>
					</div>
					<?php endif; ?>
					
					<!--广告-->
					<div class="box figure borderRadius" style="background-image: url(/uploadfile/image/20181023/154028012224029.jpg);"></div>
					
					<h3 class="g-tit1-qm">热门旅游地</h3>
					<ul class="ul-imgtxt1-qm">
						<?php $_from = $this->_tpl_vars['tourismlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
						<li>
							<a href="/index.php?m=index&c=index&v=star&keyword=<?php echo $this->_tpl_vars['vo']['keyword']; ?>
">
								<div class="pic">
									<img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="">
									<span><?php echo $this->_tpl_vars['vo']['title']; ?>
</span>
								</div>
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
	<script type="text/javascript">
		var total_page = parseInt($("#total_page").text());                       //总页数
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
            var cur_page = $(".pages .on a").text();   //当前页
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
					window.location.href="/index.php?m=index&c=travel&v=travel_list&type=<?php echo $this->_tpl_vars['type']; ?>
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
	</script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>