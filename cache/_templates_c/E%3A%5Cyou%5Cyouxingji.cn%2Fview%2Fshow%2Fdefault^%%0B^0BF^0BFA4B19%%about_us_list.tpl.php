<?php /* vpcvcms compiled created on 2018-10-19 16:45:30
         compiled from wap/about_us/about_us_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>关于我们</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <style type="text/css">
    	/*2018-09-20
		 HQS
		 
		 移动端  关于我们
		
		 * */
		
		.backdrop{overflow: hidden;}
		/*5.5英寸   414*736尺寸的屏幕  如iPhone6 Plus、iPhone6s Plus、iPhone7 Plus、魅族MX5    1920x1080  /3★*/
		@media only screen and (max-width: 414px) {
			.backdrop{max-height: 193.88px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.backdrop{max-height: 192.75px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.backdrop{max-height: 192.38px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.backdrop{max-height: 175.5px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.backdrop{max-height: 168.38px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.backdrop{max-height: 149.63px;}
		}
		
		.tips{text-align: center;color: #ccc;margin: 0px auto 10px;}
		.loading{margin: 0 auto;display: block;width: 5%;}
		
		.marginBotom{margin-bottom: 0.8rem;}
		
		.ban .head{background: #fff;padding: 10px 0px 10px 10px;}
		.ban .title{color: #d71618;font-size: 0.8rem;line-height: 24px;font-weight: 600;}
		.ban .describe{color: #666;}
		.ban .SubTitle{font-weight: 600;color: #505050;}
		.common{font-size: 0.75rem;line-height: 16px;}

		.modules .item{background: #fff;}
		.modules .item a{display: block;width: 100%;}
		.modules .item a .title{font-size: 0.9rem;-webkit-line-clamp: 3;line-height: 16px;text-align: justify;font-weight: 600;color: #333;}
		.modules .item a .time{color: #666;margin-bottom: 4px;}
		.modules .item a .headPortrait img{display: block;width: 100%;margin: 0 auto 10px;}
		.modules .item a .details{padding: 0 10px;}
		
		.modules .item a .details .description{text-align: justify;color: #666;margin: 0rem auto 0.8rem;-webkit-line-clamp: 5;/*三列*/}
		.modules .item a .details button{display: block;color: #d71618;font-size: 0.7rem;
										background: #fff;border-radius: 10px;line-height: 18px;margin: 0px auto 20px;
										border: 1px #d71618 solid;padding: 0px 20px;font-weight: 600;}
		
    </style>
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>关于我们</h3>
	</div>
	<div class="mian">
	    <div class="g-top">
	        <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="logo" /></a></div>
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
	    <div class="ban marginBotom">
	        <div class="backdrop fix"><img src="<?php echo $this->_tpl_vars['ad']['imgurl']; ?>
" title="海报/封面"></div>
	        <div class="head fix">
	        	<p class="title">达人带你旅行，让你的旅行更好玩更省心</p>
	        	<p class="describe common SubTitle">推出了新主张：</p>
	        	<p class="describe common">我负责出钱，你负责出发；</p>
	        	<p class="describe common SubTitle">创造了新模式：</p>
	        	<p class="describe common">公益＋社会实践＋旅行；</p>
	        	<p class="describe common SubTitle">探索了新融合：</p>
	        	<p class="describe common">首推绘画与旅行融合的O2O模。</p>
	        	<p class="describe common SubTitle">注重表现形式有创意：</p>
	        	<p class="describe common">在互联网平台率先推出用九宫格的形式直播旅行；</p>
	        	<p class="describe common SubTitle">追求主题定为有新意：</p>
	        	<p class="describe common">着力展现旅行达人的旅行轨迹和人生感悟，塑造具有新兴价值观的旅行到适合人生达人。</p>
	        	<p class="describe common SubTitle">这就是我们——一个有态度的旅行平台。</p>
	        </div>
	    </div>
		
	    <input type="hidden" id="about_us" title="总数" value="<?php echo $this->_tpl_vars['total']; ?>
" />
	    <input type="hidden" id="UniqueValue" data-sign="about_us" value="about_us" title="共用JS区分的唯一必须值"/>
    	<div class="modules fix" id="pageCount" data-index="1" data-page="" data-nowPage="1">
    		<div class="content">
				<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<div class="item fix item_<?php echo $this->_tpl_vars['item']['id']; ?>
">
					<div class="wp">
						<a class="fix" href="/index.php?m=wap&c=aboutus&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<div class="headPortrait fix"><img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
" title="海报/封面"/></div>
							<div class="details fix">
								<p class="title fix omit"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								<p class="time common"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</span></p>
								<p class="description common omit"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
								<button>查看更多</button>
							</div>
						</a>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?>
    		</div>
    		<p class="tips tips1"></p>
    	</div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉到底部触发更新增加信息JS函数集合"></script>
</body>
</html>