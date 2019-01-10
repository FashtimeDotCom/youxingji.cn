<?php /* vpcvcms compiled created on 2019-01-08 10:45:12
         compiled from index/article/list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>独家旅行_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/journeylist.css" />
</head>
<body onkeydown="on_return();">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="main fix">
        <?php $_from = C::T('ad')->getList(array('tagname' => 'pc_journey_list'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
      	<?php endforeach; endif; unset($_from); ?>
        <div class="cur"><div class="wp"><a href="">首页</a> &gt; <span>独家旅行</span></div></div>
        
		<!--正文-->
        <div class="content fix">
        	<!--左侧菜单-->
        	<div class="left">
        		<p class="title">主题选择</p>
        		
        		<input type="hidden" name="" id="itemType" value="<?php echo $this->_tpl_vars['type']; ?>
" />
        		<div class="theme">
        			<p class="secondTitle">主题</p>
        			<div class="list">
						<a href="/index.php?m=index&c=article&v=new_list">
							<span class="sample <?php if ($this->_tpl_vars['type'] == ''): ?>one<?php endif; ?>">全部</span>
						</a>
						<?php $_from = $this->_tpl_vars['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<a href="/index.php?m=index&c=article&v=new_list&type=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<span class="sample <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['type']): ?>one<?php endif; ?>"><?php echo $this->_tpl_vars['item']['type_name']; ?>
</span>
						</a>
						<?php endforeach; endif; unset($_from); ?>
        			</div>
        		</div>
        		
        		<input type="hidden" name="" id="itemDay" value="<?php echo $this->_tpl_vars['day']; ?>
" />
        		<div class="numberDays">
        			<p class="secondTitle">旅行天数</p>
        			<div class="list">
						<a href="/index.php?m=index&c=article&v=new_list">
							<span class="sample <?php if ($this->_tpl_vars['day'] == ''): ?>one<?php endif; ?>">全部</span>
						</a>
						<?php $_from = $this->_tpl_vars['travel_days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<a href="/index.php?m=index&c=article&v=new_list&days=<?php echo $this->_tpl_vars['item']; ?>
">
							<span class="sample <?php if ($this->_tpl_vars['item'] == $this->_tpl_vars['day']): ?>one<?php endif; ?>"><?php echo $this->_tpl_vars['item']; ?>
日</span>
						</a>
						<?php endforeach; endif; unset($_from); ?>
        			</div>
        		</div>
        	</div>
        	
        	<!--右侧内容列表-->
        	<div class="right">
	            <div class="box fix">
	            	<?php if ($this->_tpl_vars['list']): ?>
					<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="module fix">
						<a class="dis_block" href="/index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<div class="figure poster borderRadius" style="background-image: url(<?php echo $this->_tpl_vars['item']['articlethumb']; ?>
);" title="海报/封面"></div>
							<div class="right">
								<p class="title apostrophe"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								<div class="location">
									<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
									<i class="Iclass apostrophe"><?php echo $this->_tpl_vars['item']['address']; ?>
</i>
								</div>
								<p class="describe omit lineNumber2 whiteSpace"><?php echo $this->_tpl_vars['item']['cutstr']; ?>
</p>

								<p class="diamonds"><span>￥<i class="Iclass"><?php echo $this->_tpl_vars['item']['price']; ?>
</i></span>元/位</p>
							</div>
							<span class="seeMore">查看行程</span>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<!--无信息-->
					<div class="mainTips fix">
						<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_bg.png);" title="海报/封面"></div>
						<div class="tip"><p class="title">暂无该主题信息哦！</p></div>
					</div>
					<?php endif; ?>
	        	</div>
	
				<!-- 页码 -->
				<?php if ($this->_tpl_vars['multipage']): ?>
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
					<ul><?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
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
		
		//跳转
		var total_page = parseInt($("#total_page").text());                       //总页数
		function check(){
			var page = $('#pages').val();//跳转
			var cur_page = $(".on a").text();   //当前页
			var itemType= $("#itemType").val(); //主题
			var itemDay = $("#itemDay").val();  //天数
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
					if( itemType == "" && itemDay == "" ){ //没选择  主题、旅行天数  状态
						window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type=";
					}
					else{
						if( itemType != "" && itemDay == "" ){   //已选择 主体
							window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type="+ itemType;
						}
						else{                                    //已选择 旅行天数
							window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type="+ itemDay;
						}
					}
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
</body>
</html>