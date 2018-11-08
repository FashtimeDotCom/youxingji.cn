<?php /* vpcvcms compiled created on 2018-11-07 16:05:57
         compiled from public/footer.tpl */ ?>
<style>
	.footer {
		position: relative;
	}
	.wechat {
		width: 150px !important;
		height: 150px;
		display: inline-block;
		position: absolute;
		bottom: 250px;
		display: none;
	}
	
	.footer .swiper-button-prev,
	.footer  .swiper-button-next {
		width: 27px !important;
		background: rgba(31, 31, 31, .4);
		border-radius: 0px  !important;
	}
	.footer .swiper-container {
		padding-left: 55px !important;
	}
	.footer .swiper-button-prev {
		background-position: 5px -35px !important;
	} 
	.footer .swiper-button-next {
		background-position:8px -89px !important;
		    background: rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;
	}
</style>
<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
<div class="footer">
	<div class="fd-top">
		<div class="wp">
			<div class="top">
				<div class="tel">
					<h3>客服热线</h3>
					<span><i style="background-image: url(/resource/images/tel-qm.png);"></i>4009-657-018</span>
				</div>
				<div class="fd-nav">
					<dl>
						<dt>关于游行迹</dt>
						<dd>
							<a href="/article/gywm">关于我们</a>
						</dd>
						<dd>
							<a href="/article/jrwm">加入我们</a>
						</dd>
						<dd>
							<a href="/article/yszc">隐私政策</a>
						</dd>
					</dl>
					<dl>
						<dt>关注我们</dt>
						<dd>
							<a href="https://weibo.com/u/5994217808?topnav=1&wvr=6&topsug=1"><i style="background-image: url(/resource/images/icon5-qm.png);"></i>微博</a>
						</dd>
						<dd>
							<a id="wechat_a" href="javascript:;"><i style="background-image: url(/resource/images/icon6-qm.png);"></i>微信
								<br>
								<img src="http://www.youxingji.cn/uploadfile/image/20180425/152461868538049.jpg" alt="" class="wechat">
							</a>
						</dd>
					</dl>
					<dl>
						<dt>实用信息 </dt>
						<dd>
							<a href="/article/hyzn">服务协议</a>
						</dd>
						<dd>
							<a href="/article/lxgl">旅行攻略</a>
						</dd>
						<dd>
							<a href="/article/lyxl">旅游路线</a>
						</dd>
					</dl>
				</div>
				<div class="fd-ma">
					<?php $_from = C::T('ad')->getList(array('tagname' => 'footerewm'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
					<div class="ma">
						<div class="pic"><img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt=""></div>
						<span><?php echo $this->_tpl_vars['adlist']['adname']; ?>
</span>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			<!--<div class="bot">
                    <span>合作伙伴：</span>
                    <?php $_from = C::T('link')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
                        <a href="<?php echo $this->_tpl_vars['link']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['link']['name']; ?>
</a>
                    <?php endforeach; endif; unset($_from); ?>
                </div>-->

		</div>
		<div class="wp">
			<div class="swiper-container footerswiper">
				<div class="swiper-wrapper ">
					<?php $_from = C::T('link')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
					
						<div class="swiper-slide">
                          <a href="<?php echo $this->_tpl_vars['link']['link']; ?>
">
							<img src="<?php echo $this->_tpl_vars['link']['linkpic']; ?>
" />
                            </a>
						</div>
					
					<?php endforeach; endif; unset($_from); ?>
					
				</div>
				<!--<div class="swiper-pagination"></div>-->
				<!-- Add Arrows -->
				<div class="swiper-button-next" style="background: rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
				<div class="swiper-button-prev" style="background: rgba(31,31,31,.4) url(/resource/icon/icon_index.png) no-repeat;"></div>
			</div>

		</div>
	</div>
	<div class="fd-bot">
		<div class="wp">
			<div class="fd-logo">
				<a href=""><img src="/resource/images/fd-logo.png" alt=""></a>
			</div>
			<div class="addr">
				<p>广州游行迹新媒体科技有限公司
					<a href="http://www.miitbeian.gov.cn">&copy;粤ICP备16091699号-1</a>
				</p>
				<p>地址：广州市越秀区东风东路754号侨房大厦7楼702</p>
				<p><em>*</em>本网站部分图片来自网络，若作者看到，请尽快与游行迹联系</p>
			</div>
		</div>
	</div>
</div>
<!-- 返回顶部 -->
<div class="m-float-qm">
	<a href="javascript:;" class="tel">
		<img src="/resource/images/icon24-qm.png" alt="">
		<div class="boximg">
			<img src="/resource/images/tel.png" alt="">
		</div>
	</a>
	<a href="javascript:;" class="ma">
		<img src="/resource/images/icon25-qm.png" alt="">
		<div class="boximg">
			<img src="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_weixin','group' => 'site ','default' => ' '), $this);?>
" alt="">
		</div>
	</a>
	<a href="javascript:;" class="return g-top"><img src="/resource/images/icon26-qm.png" alt=""></a>
</div>
<!-- 返回顶部 end-->
<script>
	//tz
	function href(url) {
		window.open(url);
	}

	$(function() {
		$("#wechat_a").hover(function() {
			$(".wechat").show();
		}, function() {
			$(".wechat").hide();
		});
		var swiper = new Swiper('.footerswiper', {
			slidesPerView: 5,
			spaceBetween: 1,
			speed: 3000,
			autoplay: {
				delay: 3000
			},
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	})
</script>