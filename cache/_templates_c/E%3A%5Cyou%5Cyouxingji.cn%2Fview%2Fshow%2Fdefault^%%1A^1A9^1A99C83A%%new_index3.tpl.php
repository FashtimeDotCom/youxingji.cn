<?php /* vpcvcms compiled created on 2018-11-02 14:20:38
         compiled from wap/new_index3.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title><?php echo Core_Config::get('index_seotitle', 'site', '首页');?>_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/m/css/m.css" />
	<script src="/resource/js/move_rem.js"></script>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
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
	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "https://hm.baidu.com/hm.js?0154d439703cde1da00f954c61ca8b64";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>
	<link rel="stylesheet" href="/resource/m/css/new_index.css" />
</head>
<body class="index">
	<div class="header">
		<div class="logo"><a href=""><img src="/resource/m/images/logo.png" alt="" /></a></div>
		<?php if (! $this->_tpl_vars['user']): ?>
		<a href="/index.php?m=wap&c=index&v=login" class="sign">登录</a>
		<?php else: ?>
		<a href="/index.php?m=wap&c=user&v=index" class="sign">会员</a>
		<?php endif; ?>
		<div class="so">
			<form action="/index.php">
				<input type="hidden" name="m" value="wap" />
				<input type="hidden" name="c" value="index" />
				<input type="hidden" name="v" value="search" />
				<input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
				<input type="submit" value="" class="sub" />
			</form>
		</div>
	</div>
	<div class="mian" style="margin-top: 0px;">
		<!--顶部轮播图-->
		<div class="banner swiper-container" id="bannerSwiper1">
			<div class="swiper-wrapper">
				<?php $_from = C::T('ad')->getList(array('tagname' => 'waphomeslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
				<div class="swiper-slide">
					<a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
"><div class="pic"><img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" /></div></a>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="swiper-pagination" id="pagination1"></div>
			<div class="wp"><div class="txt"></div></div>
		</div>
		
		<!--菜单-->
		<ul class="ul-imgtxt1" style="padding-top: 27px;">
			<li><a href="index.php?m=wap&c=swim&v=index">
					<i style="background-image: url(/resource/m/images/q-icon01.png);"></i>
					<span>免费游</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=master_list">
					<i style="background-image: url(/resource/m/images/q-icon15.png);"></i>
					<span>达人邦</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=star">
					<i style="background-image: url(/resource/m/images/q-icon20.png);"></i>
					<span>达人日志</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=tv">
					<i style="background-image: url(/resource/m/images/q-icon17.png);"></i>
					<span>达人视频</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=index&v=ryt">
					<i style="background-image: url(/resource/m/images/q-icon18.png);"></i>
					<span>达人游记</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=faq&v=index">
					<i style="background-image: url(/resource/m/images/q-icon54.jpg);"></i>
					<span>达人问答</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=rights&v=index">
					<i style="background-image: url(/resource/m/images/q-icon53.jpg);"></i>
					<span>成为达人</span>
				</a>
			</li>
			<li><a href="/index.php?m=wap&c=journey&v=index">
					<i style="background-image: url(/resource/m/images/q-icon14.png);"></i>
					<span>独家旅行</span>
				</a>
			</li>
		</ul>
		
		<!--达人邦-->
		<article class="article">
			<h3 class="title">达人邦 <a class="dis_block fix" style="float: right;" href="/index.php?m=wap&c=index&v=master_list"><span>更多<i></i></span></a></h3>
			<div class="m_item_a1 swiper-container" id="bannerSwiper2">
				<div class="swiper-wrapper" id="drb">
					<?php if ($this->_tpl_vars['tjstar']): ?>
					<?php $_from = $this->_tpl_vars['tjstar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="swiper-slide">
						<a class="dis_block fix" href="index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
							<div class="pic figure" style="background-image: url(http://www.youxingji.cn/<?php echo $this->_tpl_vars['item']['avatar']; ?>
);border-radius: 0;">
								<div class="txt"><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
							</div>
							<address class="address"><?php echo $this->_tpl_vars['item']['city']; ?>
</address>
							<div class="text"><?php echo $this->_tpl_vars['item']['autograph']; ?>
</div>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</div>
			</div>
		</article>
		
		<!--达人日志-->
		<input type="hidden" name="" id="UniqueValue" value="homePage" />
		<article class="article log">
			<h3 class="title">达人日志 </h3>
			<?php if ($this->_tpl_vars['travel_list']): ?>
			<?php $_from = $this->_tpl_vars['travel_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<div class="d_item fix">
				<div class="txt">
					<a class="dis_block" href="/index.php?m=wap&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['describes']; ?>
</a>
				</div>
				<dl class="list-img list_img">
					<?php $_from = $this->_tpl_vars['item']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<dd><a href="<?php echo $this->_tpl_vars['v']; ?>
" class="lightbox figure" rel="list<?php echo $this->_tpl_vars['item']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['v']; ?>
);"></a></dd>
					<?php endforeach; endif; unset($_from); ?>
				</dl>
				
				<article class="user">
					<a class="headPortrait figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['user_info']['headpic']; ?>
);" href="index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
"></a>
					<aside style="float: left;">
						<h4 class="nickname apostrophe"><?php echo $this->_tpl_vars['item']['user_info']['username']; ?>
</h4>
						<time class="logTime"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</time>
					</aside>
				</article>
				<div class="interact gaine fix">
					<span class="Read"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</i></span>
					<span class="spot zan" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-sign="his" data-nature="list" data-val="travel_num">
						<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['topnum']; ?>
</i>
					</span>
					<span>
						<a class="widthHeight" href="/index.php?m=wap&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
						</a>
					</span>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			<div class="box_btn">
				<input type="button" class="btn" id="" value="查看更多" onclick="location.href='<?php echo $this->_tpl_vars['_pathroot']; ?>
/index.php?m=wap&c=index&v=star'" />
			</div>
		</article>
		
		<!--中部轮播-->
		<div class="m-imgtxt1 swiper-container" id="bannerSwiper3">
			<div class="swiper-wrapper" id="swim">
				<?php $_from = C::T('ad')->getList(array('tagname' => 'waphomeo2'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
				<div class='swiper-slide' data-id="">
					<a class="dis_block fix" href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
">
						<div class='pic'>
							<img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt=''>
							<div class='txt'></div>
						</div>
					</a>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="swiper-pagination" id="pagination3"></div>
		</div>
		
		<!--达人视频-->
		<article class="article video_">
			<h3 class="title">达人视频 <a class="dis_block fix" style="float: right;" href="index.php?m=wap&c=index&v=tv"><span>更多<i></i></span></a></h3>
			<div class="flex-video" style="width: 100%;">
				<?php if ($this->_tpl_vars['tv_list']): ?>
				<?php $_from = $this->_tpl_vars['tv_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<div class="video">
					<div class="pic figure" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
" onclick="js_video(this)" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" style="background-image: url(http://www.youxingji.cn<?php echo $this->_tpl_vars['item']['pics']; ?>
);"></div>
					<div class="txt"><a href="/index.php?m=wap&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></div>
				</div>
				<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
			</div>
		</article>
		
		<!--达人游记-->
		<article class="article fix note">
			<h3 class="title">达人游记 <a class="dis_block fix" style="float: right;" href="index.php?m=wap&c=index&v=ryt"><span>更多<i></i></span></a></h3>
			<section class="y_item fix">
				<a class="dis_block fix" href="/index.php?m=wap&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['info']['id']; ?>
">
					<div><img src="<?php echo $this->_tpl_vars['info']['img_url']; ?>
"></div>
					<article class="user">
						<span class="headPortrait figure" style="background-image: url(<?php echo $this->_tpl_vars['info']['user_info']['headpic']; ?>
);"></span>
						<aside>
							<h4><?php echo $this->_tpl_vars['info']['user_info']['username']; ?>
</h4>
							<time class="logTime"><?php echo $this->_tpl_vars['info']['time']['hour']; ?>
点<?php echo $this->_tpl_vars['info']['time']['min']; ?>
分</time>
						</aside>
					</article>
					<h4 class="omit lineNumber2"><?php echo $this->_tpl_vars['info']['title']; ?>
</h4>
					<p><span><?php echo $this->_tpl_vars['info']['desc']; ?>
</span></p>
				</a>
			</section>
			<section class="fix" style="padding: 0 0.5rem;float: right;">
				<article class="interact travels">
					<span class="Read"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass"><?php echo $this->_tpl_vars['info']['show_num']; ?>
</i></span>
					<span class="spot zan" onclick="zan(this,<?php echo $this->_tpl_vars['info']['id']; ?>
)" data-sign="his" data-nature="list" data-val="note_num">
						<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass"><?php echo $this->_tpl_vars['info']['top_num']; ?>
</i>
					</span>
					<span>
						<a class="widthHeight" href="/index.php?m=wap&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['info']['id']; ?>
">
							<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
						</a>
					</span>
				</article>
			</section>
		</article>
		
		<!--独家旅行-->
		<article class="article">
			<div class="TitleBox">
				<h3 class="title">独家旅行</h3>
				<ul class="tab_list"><li class="onn">独家项目</li><li>独家资源</li></ul>
				<!--<h3 class="title">独家旅行</h3>
				<ul class="nav_list fix"><li class="onn">独家线路</li><li>私人订制</li></ul>-->
			</div>
			<div class="tab_con">
				<div class="tab_box">
					<ul class="box_list">
						<li class="on">达人带你去旅行</li>
						<li>名师带你去写生</li>
					</ul>
					<div class="con_list">
						<div class="con_list_box ">
							<?php if ($this->_tpl_vars['travel']): ?>
							<?php $_from = $this->_tpl_vars['travel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="">
								<a href="index.php?m=wap&c=index&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
">
									<p><?php echo $this->_tpl_vars['item']['title']; ?>
<span>￥<?php echo $this->_tpl_vars['item']['price']; ?>
</span></p>
								</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</div>
	
						<div class="con_list_box " style="display: none;">
							<?php if ($this->_tpl_vars['sketch']): ?>
							<?php $_from = $this->_tpl_vars['sketch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="">
								<a href="index.php?m=wap&c=index&v=sketch_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
									<img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
">
									<p><?php echo $this->_tpl_vars['item']['title']; ?>
<span>￥<?php echo $this->_tpl_vars['item']['price']; ?>
</span></p>
								</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</div>
	
					</div>
				</div>
	
				<div class="tab_box " style="display: none;">
					<ul class="box_list">
						<?php if ($this->_tpl_vars['label_list']): ?>
						<?php $_from = $this->_tpl_vars['label_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li class="<?php if ($this->_tpl_vars['key'] == 0): ?>on<?php endif; ?>"><?php echo $this->_tpl_vars['item']['name']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
					</ul>
					<div class="con_list">
						<?php if ($this->_tpl_vars['label_info']): ?>
						<?php $_from = $this->_tpl_vars['label_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<div class="con_list_box " <?php if ($this->_tpl_vars['key'] != 0): ?>style="display: none;"<?php endif; ?>>
							<?php $_from = $this->_tpl_vars['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
							<div class="">
								<a href="index.php?m=wap&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
									<img src="<?php echo $this->_tpl_vars['vo']['articlethumb']; ?>
">
									<p><?php echo $this->_tpl_vars['vo']['title']; ?>
 <span>￥<?php echo $this->_tpl_vars['vo']['price']; ?>
</span></p>
								</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
	
					</div>
				</div>
			
				<!--<div class="tab_box exclusive">
					<div class="con_list">
						<div class="con_list_box">
							<div class="swiper-container" id="bannerSwiper4">
								<div class="swiper-wrapper">
									<?php if ($this->_tpl_vars['travel']): ?>
									<?php $_from = $this->_tpl_vars['travel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
									<div class="swiper-slide boxes">
										<a class="dis_block fix" href="index.php?m=wap&c=index&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
											<img class="fix" src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
" />
											<div class="con">
												<p class="headline"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
												<p class="price"><span>￥<?php echo $this->_tpl_vars['item']['price']; ?>
<i class="Iclass"> 起</i></span></p>
											</div>
										</a>
									</div>
									<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="box_btn widtH">
						<a type="button" class="btn SeeMoreLines" href="/index.php?m=wap&c=journey&v=index">查看更多线路</a>
					</div>
				</div>
	
				<div class="tab_box" style="padding-bottom: 10px;display: none;">
					<div class="con_list">
						<div class="con_list_box list_box">
							<img src="/resource/m/images/homepage_private.png">
							<input class="matter destination" type="text" name="" id="destination" maxlength="300" value="" placeholder="目的地" />
							<input class="matter name" type="text" name="" id="name" maxlength="20" value="" placeholder="姓名" />
							<input class="matter PhoneNum" type="number" name="" id="PhoneNum" value="" placeholder="手机号码" onkeyup="judgeIsNonNull1(event)" />
							<button class="submitInfo">提交信息</button>
						</div>
					</div>
				</div>-->
			</div>
		</article>

		<!-- 视频弹窗 -->
        <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz">
        	<div class="con"><div class="close js-close" onclick="js_close()"><span></span></div><div class="VideoArea"></div></div>
        </div>
        <!-- end -->

		<a href="http://p.qiao.baidu.com/cps/chat?siteId=11959315&userId=25533377" class="g-consultation"><i></i>免费咨询</a>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		var swiper1 = new Swiper('#bannerSwiper1', {
				slidesPerView: 1,
				loop: true,
				pagination: {
					el: '#pagination1',
					clickable: true
				},
			});

		var swiper2 = new Swiper('#bannerSwiper2', {
				slidesPerView: 1.6,
				initialSlide: 1,
				//loop: true,
				spaceBetween: 15,
			});
		
		var swiper3 = new Swiper('#bannerSwiper3', {
				pagination: {
					el: '#pagination2',
					clickable: true
				},
			});
		
		//独家旅行
		var swiper4 = new Swiper('#bannerSwiper4', {
				speed:300,
				autoplay : {
				    delay:3000
				},
			});
	</script>
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			var $asd = $(".tab_list li");
			$asd.click(function() {
				$(this).addClass("onn").siblings().removeClass("onn");
				var $index = $(this).index();
				var $content = $(".tab_con .tab_box");
				$content.eq($index).show().siblings().hide();
			});
			var $asd = $(".box_list li");
			$asd.click(function(e) {
				$(this).addClass("on").siblings().removeClass("on");
				var $index = $(this).index();
				var $content=$(this).parent().next().find('.con_list_box');
				$content.eq($index).show().siblings().hide();
			});
		});
		
		//控制  私人订制 电话号码的长度
		function judgeIsNonNull1(event){
			var value=$("#PhoneNum").val();
			var x = event.which || event.keyCode;
			if( value.length <= 50 ){
				//console.log("符合50位数以内");
			} else{
				return $("#PhoneNum").val(value.substr(0, 50));
			}
		}
		
		//实时监听输入框值的改动
		$("#PhoneNum").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
		
		$(document).ready(function() {
			//提交 私人订制
			$(".submitInfo").on("click",function(){
				var destination = $("#destination").val();
				var name = $("#name").val();
				var PhoneNum = $("#PhoneNum").val();
				if( destination == "" ){
					layer.msg('请输入目的地！');
					return false;
				}else if(destination.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('目的地不能只输入空格！');
					return false;
				}
				
				if( name == "" ){
					layer.msg('请输入姓名！');
					return false;
				}else if(name.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('姓名框不能只输入空格！');
					return false;
				}
				
				var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
				if( PhoneNum == "" ){
					layer.msg('请输入电话号码！');
					return false;
				}else if(PhoneNum.replace(/(^\s*)|(\s*$)/g, "")==""){
					layer.msg('手机号码框不能只输入空格！');
					return false;
				}else if (!reg.test(PhoneNum)) {
                	layer.msg('请输入正确的手机号码！');
                	return false;
            	}
				
				$.post("/index.php?m=api&c=index&v=private_custom", {
					'address':destination,
					'username':name,
					'mobile':PhoneNum,
				}, function(data){
					layer.msg(data.tips);
				},"JSON");
			});
			
			//独家旅行
			var cut1 = $(".nav_list li");
			cut1.click(function() { //一级菜单切换
				$(this).addClass("onn").siblings().removeClass("onn");
				var $index = $(this).index();
				var $content = $(".tab_con .tab_box");
				$content.eq($index).show().siblings().hide();
			});
			
			var cut2 = $(".box_list li");
			cut2.click(function(e) { //二级菜单切换
				$(this).addClass("on").siblings().removeClass("on");
				var $index = $(this).index();
				var $content=$(this).parent().next().find('.con_list_box');
				$content.eq($index).show().siblings().hide();
			});
		});
	</script>
</body>
</html>