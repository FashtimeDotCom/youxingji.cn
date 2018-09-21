<?php /* vpcvcms compiled created on 2018-09-21 18:17:08
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
	<!--<link rel="stylesheet" href="/resource/m/css/index.css" />-->
	<link rel="stylesheet" href="/resource/m/css/m.css" />
	<script src="/resource/js/move_rem.js"></script>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/m/js/lib.js"></script>
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
</head>

<body class="index">
<div class="header">
	<div class="logo">
		<a href=""><img src="/resource/m/images/logo.png" alt="" /></a>
	</div>
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
	<div class="banner swiper-container">
		<div class="swiper-wrapper">
			<?php $_from = C::T('ad')->getList(array('tagname' => 'waphomeslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
			<div class="swiper-slide">
				<a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
">
					<div class="pic">
						<img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" />
					</div>
				</a>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="swiper-pagination"></div>
		<div class="wp">
			<div class="txt">
				
			</div>
		</div>
	</div>
	<ul class="ul-imgtxt1" style="padding-top: 27px;">
		<li>
			<a href="index.php?m=wap&c=swim&v=index">
				<i style="background-image: url(/resource/m/images/q-icon01.png);"></i>
				<span>免费游</span>
			</a>
		</li>

		<li>
			<a href="/index.php?m=wap&c=index&v=star">
				<i style="background-image: url(/resource/m/images/q-icon15.png);"></i>
				<span>达人邦</span>
			</a>
		</li>
		<li>
			<a href="/index.php?m=wap&c=index&v=tv">
				<i style="background-image: url(/resource/m/images/q-icon17.png);"></i>
				<span>达人视频</span>
			</a>
		</li>
		<li>
			<a href="/index.php?m=wap&c=index&v=ryt">
				<i style="background-image: url(/resource/m/images/q-icon18.png);"></i>
				<span>达人游记</span>
			</a>
		</li>
		<li>
			<a href="">
				<i style="background-image: url(/resource/m/images/q-icon54.jpg);"></i>
				<span>达人问答</span>
			</a>
		</li>
		<li>
			<a href="">
				<i style="background-image: url(/resource/m/images/q-icon53.jpg);"></i>
				<span>成为达人</span>
			</a>
		</li>
		<li>
			<a href="/index.php?m=wap&c=user&v=index">
				<i style="background-image: url(/resource/m/images/q-icon20.png);"></i>
				<span>个人中心</span>
			</a>
		</li>
		<li>
			<a href="/index.php?m=wap&c=journey&v=index">
				<i style="background-image: url(/resource/m/images/q-icon14.png);"></i>
				<span>独家旅行</span>
			</a>
		</li>
		<!--<li>
            <a href="/index.php?m=wap&c=index&v=ryt">
                <i style="background-image: url(/resource/m/images/q-icon18.png);"></i>
                <span>日阅潭</span>
            </a>
        </li>
        <li>
            <a href="/index.php?m=wap&c=index&v=mxp">
                <i style="background-image: url(/resource/m/images/q-icon19.png);"></i>
                <span>玩转明信片</span>
            </a>
        </li>-->

	</ul>
	<article class="article">
		<h3 class="title">达人邦 <a href="/index.php?m=wap&c=index&v=master_list"><span>更多<i></i></span></a></h3>
		<div class="m_item_a1 swiper-container">
			<div class="swiper-wrapper" id="drb">
				<?php if ($this->_tpl_vars['tjstar']): ?>
				<?php $_from = $this->_tpl_vars['tjstar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

				<div class="swiper-slide">
					<a href="index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
						<div class="pic"><img src="http://www.youxingji.cn/<?php echo $this->_tpl_vars['item']['avatar']; ?>
" alt="">
							<div class="txt"><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
						</div>
						<address class="address"><?php echo $this->_tpl_vars['item']['city']; ?>
</address>
						<div class="text">
							<?php echo $this->_tpl_vars['item']['autograph']; ?>

						</div>
					</a>
				</div>

				<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>

			</div>
		</div>
	</article>
	<article class="article">
		<h3 class="title">达人日志 </h3>

		<?php if ($this->_tpl_vars['travel_list']): ?>
		<?php $_from = $this->_tpl_vars['travel_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<div class="d_item">
			<div class="txt">
				<?php echo $this->_tpl_vars['item']['describes']; ?>

			</div>
			<dl class="list-img list_img">
				<?php $_from = $this->_tpl_vars['item']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<dd>
					<a href="<?php echo $this->_tpl_vars['v']; ?>
" class="lightbox" rel="list<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<img src="<?php echo $this->_tpl_vars['v']; ?>
" alt="">
					</a>
				</dd>
				<?php endforeach; endif; unset($_from); ?>

			</dl>
			<section class="other">
				<article class="user">
					<span><img src="http://www.youxingji.cn<?php echo $this->_tpl_vars['item']['user_info']['headpic']; ?>
"/></span>
					<aside>
						<h4><?php echo $this->_tpl_vars['item']['user_info']['username']; ?>
</h4>
						<time><?php echo $this->_tpl_vars['item']['addtime']; ?>
</time>
					</aside>
				</article>
				<article class="interact">
					<span class="Read "><i></i><?php echo $this->_tpl_vars['item']['shownum']; ?>
</span>
					<span class="spot zan" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['item']['topnum']; ?>
" id="zan<?php echo $this->_tpl_vars['item']['id']; ?>
"><i></i><?php echo $this->_tpl_vars['item']['topnum']; ?>
</span>
					<span class="theory "><i></i>评论</span>
				</article>

			</section>
		</div>

		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		<div class="box_btn">
			<input type="button" class="btn" id="" value="查看更多" onclick="location.href='<?php echo $this->_tpl_vars['_pathroot']; ?>
/index.php?m=wap&c=index&v=star'" />
		</div>

	</article>

	<div class="m-imgtxt1 swiper-container">
		<div class="swiper-wrapper" id="swim">
			<?php $_from = C::T('ad')->getList(array('tagname' => 'waphomeo2'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
			<div class='swiper-slide' data-id="">
				<a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
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
	</div>

	<article class="article">
		<h3 class="title">达人视频 <a href="index.php?m=wap&c=index&v=tv"><span>更多<i></i></span></a></h3>
		<div class="flex-video">
			<?php if ($this->_tpl_vars['tv_list']): ?>
			<?php $_from = $this->_tpl_vars['tv_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<div class="video">
				<a href="#m-pop1-yz" class="js-video" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
">
					<div class="pic">
						<img src="http://www.youxingji.cn<?php echo $this->_tpl_vars['item']['pics']; ?>
" alt="">
					</div>
					<div class="txt">
						<?php echo $this->_tpl_vars['item']['title']; ?>

					</div>
				</a>
			</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		</div>
	</article>

	<article class="article">
		<h3 class="title"><div class="time">
				<?php echo $this->_tpl_vars['info']['time']['day']; ?>
<span><?php echo $this->_tpl_vars['info']['time']['month']; ?>
<br /><?php echo $this->_tpl_vars['info']['time']['year']; ?>
</span>
			</div>达人游记 <a href="index.php?m=wap&c=index&v=ryt"><span>更多<i></i></span></a></h3>
		<section class="y_item">
			<a href="index.php?m=wap&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['info']['id']; ?>
">
				<div class="">
					<img src="<?php echo $this->_tpl_vars['info']['img_url']; ?>
">
				</div>
				<h4><?php echo $this->_tpl_vars['info']['title']; ?>
</h4>
				<p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;"><?php echo $this->_tpl_vars['info']['desc']; ?>
</span></p>
			</a>

		</section>
		<section class="other">
			<article class="user">
				<span><img src="<?php echo $this->_tpl_vars['info']['user_info']['headpic']; ?>
"></span>
				<aside>
					<h4><?php echo $this->_tpl_vars['info']['user_info']['username']; ?>
</h4>
					<time><?php echo $this->_tpl_vars['info']['time']['hour']; ?>
点<?php echo $this->_tpl_vars['info']['time']['min']; ?>
分</time>
				</aside>
			</article>
			<article class="interact">
				<span class="Read "><i></i><?php echo $this->_tpl_vars['info']['show_num']; ?>
</span>
				<span class="spot zan" data-type="<?php echo $this->_tpl_vars['info']['type']; ?>
" data-id="<?php echo $this->_tpl_vars['info']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['info']['top_num']; ?>
" id="zan<?php echo $this->_tpl_vars['info']['id']; ?>
"><i></i><?php echo $this->_tpl_vars['info']['top_num']; ?>
</span>
				<span class="theory "><i></i>评论</span>
			</article>
		</section>
	</article>

	<article class="article">
		<h3 class="title">独家旅行
			<ul class="tab_list">
				<li class="onn">独家项目</li>
				<li>独家资源</li>
			</ul>
		</h3>
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
		</div>
	</article>
	<div class="m-pop1-yz" id="m-pop1-yz">
		<div class="con">
			<iframe src='' frameborder=0 'allowfullscreen'></iframe>
			<div class="close js-close"><span></span></div>
		</div>
	</div>
	<a href="http://p.qiao.baidu.com/cps/chat?siteId=11959315&userId=25533377" class="g-consultation"><i></i>免费咨询</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
<script>
	var swiper = new Swiper('.banner', {
		slidesPerView: 1,
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
		autoplay: {
			delay: 3000,
			stopOnLastSlide: false,
			disableOnInteraction: true,
		}
	});
	var swiper = new Swiper('.m-imgtxt1', {

	});
	var swiper = new Swiper('.m_item_a1', {
		slidesPerView: 1.6,
		initialSlide: 1,
		loop: true,
		spaceBetween: 15,
	});
	var swiper = new Swiper('.m-imgtxt2', {
		slidesPerView: 1.5
	});
</script>
<!-- 弹窗 -->
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox-effects-a").fancybox({
			showCloseButton: false,
			helpers: {
				title: {
					type: 'outside'
				},
				overlay: {
					speedOut: 0
				}
			}
		});
		$(".fancybox").fancybox({
			wrapCSS: 'fancybox-custom',
			closeClick: false,
			openEffect: 'none',
			helpers: {
				title: {
					type: 'inside'
				}
			},
			beforeLoad: function() {
				this.title = $(this.element).data('title');
			}
		});

		$(".other .theory,.other .hideed,.num .hideed").click(function() {
			layer.msg('功能正在开发，敬请期待');

		})
		$('.zan').click(function(event) {
			var id = $(this).attr('data-id');
			var num = parseInt($(this).attr('data-num'));
			var obj = $(this);
			$.post("/index.php?m=api&c=index&v=zan", {
				'id': id
			}, function(data) {
				if(data.status == 1) {
					$('#zan' + id).html((num + 1));
					$('#zan' + id).addClass("one");
					layer.msg(data.tips);
				} else if(data.status == 2) {
					$('#zan' + id).addClass("one");
					layer.msg(data.tips);
				} else {
					layer.msg(data.tips);
				}
			}, "JSON");

		});
		$('.dian').click(function(event) {
			var id = $(this).attr('data-id');
			var num = parseInt($(this).attr('data-num'));
			var obj = $(this);
			$.post("/index.php?m=api&c=index&v=zan_scenery", {
				'id': id
			}, function(data) {
				if(data.status == 1) {
					$('#zan' + id).html((num + 1));
					$('#zan' + id).addClass("two");
					layer.msg(data.tips);
				} else if(data.status == 2) {
					$('#zan' + id).addClass("two");
					layer.msg(data.tips);
				} else {
					layer.msg(data.tips);
				}
			}, "JSON");

		});
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
		$('.js-video').click(function(event) {
			var _id = $(this).attr("href");
			var tid = $(this).attr("data-id");
			var _src = $(this).attr("data-src");
			$.post("/index.php?m=api&c=index&v=showtv", {
				'id': tid
			}, function(data) {

			}, "JSON");
			$(_id).find("iframe").attr("src", _src);
			$(_id).fadeIn();
		});
		$('.js-close').click(function(event) {
			$(this).parents('.m-pop1-yz').fadeOut();
			$(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
			event.stopPropagation();
		});

		bind_td();
		var host = window.location.host;
		//var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';


	});
</script>
<!-- 弹窗 end-->
<!-- 日历 -->
<script>
	$(document).ready(function() {
		//获取当前日期
		var mydate = new Date();
		var _y = mydate.getFullYear();
		var _m = mydate.getMonth() + 1;
		var _d = mydate.getDate();
		$("#currentDate").text(_y + "年" + _m + "月" + _d + "日");
		getryt(_y + '-' + _m + '-' + _d, _y);

	});

	function bind_td() {
		$("#idCalendar td").on('click', function(e) {
			if($(this).attr('isclick') == 1) {
				return false;
			}
			var china_week = ["日", "一", "二", "三", "四", "五", "六"];
			day = $(this).text();
			var time = $(this).data("time");
			var Year = time.substring(0, 4);
			var Month = time.substring(5, 7);

			if(day.length == 1) day = '0' + day;
			das = Year + "-" + Month + "-" + day; // 带-日期
			$("#currentDate").text(Year + "年" + Month + "月" + day + "日");
			getryt(das, Year);
			w = china_week[$(this).index()];
			day > 0 && loadinfo(day, w);
			$(this).parents('.Calendar').find('td').removeClass('onToday');
			day > 0 && $(this).addClass('onToday');
		});
	}

	function loadinfo(d, w) {
		$('.today').html("<span>" + d + "</span>周" + w);
	}

	function getryt(time, t) {
		$.ajax({
			type: "GET",
			url: "/index.php?m=api&c=index&v=getryt",
			data: {
				time: time
			},
			dataType: "json",
			success: function(data) {
				if(data['id']) {
					$('#getryt').html('<div onclick=href("' + '/index.php?m=wap&c=index&v=rytdetai&id=' + data['id'] + '")><img src=' + data['img_url'] + '><div class="title">' + data['title'] + '</div>' + data['homecontent'] + '</div>');
				} else {
					//                  	<h5 onclick=href("'+'/index.php?m=wap&c=index&v=rytdetai&id='+data['id']+'")>'+data['title']+'</h5>
					$('#getryt').html("无内容");
				}
			}
		});
	}
</script>
<!--<script type="text/javascript" src="/resource/js/date.js"></script>-->
</body>

</html>