<?php /* vpcvcms compiled created on 2018-07-05 11:43:01
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/index.tpl', 124, false),)), $this); ?>
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
		<link rel="stylesheet" href="/resource/css/style.css" />
		<!--<link rel="stylesheet" href="/resource/css/swim_index.css">-->
		<!--百度统计-->
		<style type="text/css">
			.item_test p span {
				color: #999999 !important;
			}
			
			.title {
				width: 100%;
				display: -webkit-flex;
				/* Safari */
				display: flex;
				color: #000000 !important;
				font-weight: bold;
			}
			
			.tit_left {
				flex-grow: 3;
				font-size: 18px !important;
			}
			
			.tit_right {
				text-align: right;
				flex-grow: .5;
			}
		</style>
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?0154d439703cde1da00f954c61ca8b64";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>

		<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<!--lightbox开始-->
		<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
		<!--[if IE 6]>
 	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
		<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
		<!--<script src="/resource/js/template-simple.js" type="text/javascript" charset="utf-8"></script>-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.lightbox').lightbox();
			});
		</script>
	</head>

	<body>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="main">
			<div class="banner">
				<div class="slider">
					<?php $_from = C::T('ad')->getList(array('tagname' => 'homeslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
					<div class="item" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<div class="con">
					<div class="wp">
						<img class="img" src="/resource/images/pic01.png" alt="">
						<h2><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_add_homebannertxt','group' => 'site','default' => ""), $this);?>
</h2>
						<!--<div class="m-so">
							<form action="index.php">
								<input type="hidden" name="m" value="index">
								<input type="hidden" name="c" value="index">
								<input type="hidden" name="v" value="search">
								<input class="inp" type="text" name="keyword" placeholder="请输入关键字">
								<input class="sub" type="submit" value="搜 索">
							</form>
						</div>-->
						<p></p>
					</div>
				</div>
			</div>
			<div class="row-a1" style="padding-bottom: 15px;">
				<div class="wp">
					<h3 class="m-tit1">游主张<i></i></h3>
					<div class="m-pic1">
						<!--<ul id="demo">
						</ul>-->
						<a href="index.php?m=index&c=swim&v=index"><img src="/resource/images/swim_bg.jpg"/></a>
					</div>
				</div>
			</div>
			<div class="row-a1">
				<div class="wp">
					<h3 class="m-tit1">甄选之旅<i></i></h3> <?php $_from = C::T('ad')->getList(array('tagname' => 'homeo1'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
					<div class="m-pic1" onclick="href('<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
')">
						<a href="javascript::"><img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt=""></a>
						<h4><?php echo $this->_tpl_vars['adlist']['adname']; ?>
</h4>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>

			<div class="row-a2">
				<div class="wp">
					<h3 class="m-tit1">达人邦<i></i></h3>
					<ul class="ul-txt1">
						<?php $_from = $this->_tpl_vars['starlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
						<li>
							<div class="con">
								<div class="user">
									<div class="pic">
										<div class="user-info">
											<div class="txt-l">
												<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</h4>
												<a class="btn-follow" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
												<p><span><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</p>
											</div>
											<div class="txt-r">
												<i class="icon1"></i>
												<i class="icon2"></i>
												<p><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'autograph') : smarty_modifier_helper($_tmp, 'autograph')); ?>
...</p>
											</div>
										</div>
										<div class="img">
											<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
" alt=""></a>
										</div>
									</div>
									<div class="txt">
										<span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
										<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</h4>
									</div>
								</div>
								<div class="det" onclick="href('<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
')">
									<p><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
								</div>
								<dl class="dl-pic1">
									<?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
									<dd>
										<a class="lightbox" href="<?php echo $this->_tpl_vars['v']; ?>
" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['v']; ?>
" alt=""></a>
									</dd>
									<?php endforeach; endif; unset($_from); ?>
								</dl>
								<div class="num">
									<span><img src="/resource/images/pic023.png" alt=""><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</span>
									<span><img src="/resource/images/pic024.png" alt="" class="zan" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
"><a id="zan<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</a></span>
								</div>
							</div>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<a href="/index.php?m=index&c=index&v=star" class="m-btn1">查看更多</a>
				</div>
			</div>
			<div class="yhslider">
				<?php $_from = C::T('ad')->getList(array('tagname' => 'homeo2'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
				<div class="row-a3 item" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);">
					<a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
" target="_blank"></a>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="row-a4">
				<div class="wp">
					<h3 class="m-tit1">游画<i></i></h3>
					<ul class="ul-txt2">
						<?php $_from = $this->_tpl_vars['scenery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<li>
							<a href="javascript:;">
								<div class="pic"><img class="youhua" data-title="<?php echo $this->_tpl_vars['v']['title']; ?>
" data-name="<?php echo $this->_tpl_vars['v']['name']; ?>
" data-size="<?php echo $this->_tpl_vars['v']['size']; ?>
" data-place="<?php echo $this->_tpl_vars['v']['place']; ?>
" data-src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" alt=""></div>
								<div class="txt">
									<p><span>作品：</span> <?php echo $this->_tpl_vars['v']['title']; ?>
</p>
									<p onclick="href('/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['v']['wid']; ?>
')"><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p>
									<p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p>
									<p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>
								</div>
							</a>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<a href="/index.php?m=index&c=index&v=scenery" class="m-btn1">查看更多</a>
				</div>
			</div>
			<div class="row-a5" style="background-image:url(/resource/images/bg03.jpg);">
				<div class="wp">
					<h3 class="m-tit1">旅拍TV<i></i></h3>
					<ul class="ul-pic1">
						<?php $_from = $this->_tpl_vars['tv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<li>
							<a class="js-video" href="#m-pop1-hlg" data-src="<?php echo $this->_tpl_vars['v']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
">
								<img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
								<div class="txt">
									<h4><?php echo $this->_tpl_vars['v']['title']; ?>
</h4>
									<i></i>
								</div>
							</a>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<a href="/index.php?m=index&c=index&v=tv" class="m-btn1">查看更多</a>
				</div>
			</div>
			<div class="row-a6" style="background-image:url(/resource/images/bg04.png);">
				<div class="wp">
					<h3 class="m-tit1">日阅潭<i></i></h3>
					<div class="con" style="margin: 0px 0 20px;">
						<h4><img src="/resource/images/pic012.png" alt=""></h4>
						<div class="col-l">
							<div id="currentDate"></div>
							<!-- 月份页码 -->
							<div class="page">
								<a class="a-prev" onClick="cale.PreMonth();"></a>
								<div class="date-tit">
									<span id="idCalendarYear"></span> 年
									<span id="idCalendarMonth"></span> 月
								</div>
								<a class="a-next" onClick="cale.NextMonth();"></a>
							</div>
							<!-- 月份页码 end -->
							<div class="Calendar">
								<!-- 日历 -->
								<table cellspacing="0">
									<thead>
										<tr>
											<td>日</td>
											<td>一</td>
											<td>二</td>
											<td>三</td>
											<td>四</td>
											<td>五</td>
											<td>六</td>
										</tr>
									</thead>
									<tbody id="idCalendar">
									</tbody>
								</table>
								<!-- 日历 end -->
							</div>
						</div>
						<div class="col-r" id="getryt">
						</div>
					</div>
					<a href="/index.php?m=index&c=index&v=ryt" class="m-btn1">查看更多</a>
				</div>
			</div>
			<!-- 视频弹窗 -->
			<div class="m-pop1-hlg" id="m-pop1-hlg">
				<div class="con1">
					<iframe src='' frameborder=0 'allowfullscreen'></iframe>
					<div class="close js-close"></div>
				</div>
			</div>
			<!-- end -->
			<!-- 游画弹窗 -->
			<div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
				<div class="con">
					<div class="pic">
						<img id="wpics" src="" alt="" />
					</div>
					<div class="txt">
						<p id="wtitle"></p>
						<p id="wuser"></p>
						<p id="wsize"></p>
						<p id="wplace"></p>
					</div>
				</div>
				<div class="close"></div>
			</div>
			<!-- end -->
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
		<script type="text/javascript">
			$(document).ready(function() {
				//获取当前日期.
				var host = window.location.host;
				var mydate = new Date();
				var _y = mydate.getFullYear();
				var _m = mydate.getMonth() + 1;
				var _d = mydate.getDate();
				$("#currentDate").text(_y + "年" + _m + "月" + _d + "日");
				getryt(_y + '-' + _m + '-' + _d, _y);
				var src = "//" + host + '/' + 'index.php?m=api&c=index&v=getyzz';
				//var src = "http://test.youxingji.cn/index.php?m=api&c=index&v=getyzz";
				var data = {
					type: "pc"
				}

				$.ajax({
					url: src,
					data: data,
					type: "GET",
					success: function(data) {
						var sdata = JSON.parse(data);
						var html='';
						for(i in sdata) {
							html += "<li class="+ sdata[i].class +" data-id=" + sdata[i].id + "><a  href=" + sdata[i].linkurl + "><img src=" + sdata[i].url + "></a><div><a></a></div></li>"
						}
						$("#demo").append(html);
						star();
					}
				});

			});

			function bind_td() {
				$("#idCalendar td").on('click', function(e) {

					if($(this).attr('isclick') == 1) {
						return false;
					}
					day = $(this).text();
					if(day.length == 1) day = '0' + day;
					das = cale.Year + "-" + cale.Month + "-" + day; // 带-日期
					$("#currentDate").text(cale.Year + "年" + cale.Month + "月" + day + "日");
					getryt(das, cale.Year);
					w = china_week[$(this).index()];
					day > 0 && loadinfo(day, w);
					$(this).parents('.Calendar').find('td').removeClass('onToday');
					day > 0 && $(this).addClass('onToday');
				});
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
							$('#getryt').html('<div class="item_test" style="height: 460px; width: 623px; overflow: hidden;"><img src=' + data['img_url'] + '><div class="title"><div class="tit_left">' + data['title'] + '</div><div class="tit_right date">' + time + '</div></div>' + data['homecontent'] + '</div><a href="/index.php?m=index&c=index&v=rytdetai&id=' + data['id'] + '" class="more" target="_blank">阅读全文</a>');
						} else {
							$('#getryt').html("无内容");
						}
					}
				});
			}
		</script>

		<script type="text/javascript">
			$('.youhua').click(function(event) {
				/* Act on the event */
				var src = $(this).attr('data-src');
				var title = $(this).attr('data-title');
				var name = $(this).attr('data-name');
				var size = $(this).attr('data-size');
				var place = $(this).attr('data-place');
				$('#wpics').attr('src', src);
				$('#wtitle').html("<span>作品：</span> " + title);
				$('#wuser').html("<span>作者：</span> " + name);
				$('#wsize').html("<span>尺寸：</span> " + size);
				$('#wplace').html("<span>写生地点：</span> " + place);
				$('#m-pop1-hlg2').fadeIn();
			});
			$('#m-pop1-hlg2 .close').click(function(event) {
				/* Act on the event */
				$(this).parent('.m-pop1-hlg').fadeOut();
			});
		</script>
		<link rel="stylesheet" href="/resource/css/slick.css">
		<script src="/resource/js/slick.min.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
		<script>
			$(document).ready(function() {
				$('.banner .slider').slick({
					dots: true,
					arrows: false,
					autoplay: true,
					fade: true,
					slidesToShow: 1,
					autoplaySpeed: 3000,
					pauseOnHover: false,
					cssEase: 'linear',
					lazyLoad: 'ondemand'
				});
				$('.yhslider').slick({
					dots: true,
					arrows: false,
					autoplay: true,
					fade: true,
					slidesToShow: 1,
					autoplaySpeed: 3000,
					pauseOnHover: false,
					cssEase: 'linear',
					lazyLoad: 'ondemand'
				});
			});

			function follows(bid, obj) {
				$.post("/index.php?m=api&c=index&v=follow", {
					'bid': bid
				}, function(data) {
					if(data.status == 0) {
						layer.msg(data.tips);
					} else if(data.status == 1) {
						$(obj).html('已关注');
					} else if(data.status == 2) {
						$(obj).html('<b>+</b> 关注');
					}
				}, "JSON");
			}
			$('.zan').click(function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zan", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('#zan' + id).html((num + 1));
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");

			});
		</script>
		<!-- 弹窗 -->
		<link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox-effects-a").fancybox({
					helpers: {
						title: {
							type: 'outside'
						},
						overlay: {
							speedOut: 0
						}
					}
				});
			});
		</script>
		<!-- 弹窗 end-->
		<!-- 日历 -->
		<script type="text/javascript" src="/resource/js/date.js"></script>
		<!--游主张手风琴-->
		<!--<script type="text/javascript" src="/resource/js/jquery.indexSlidePattern.js"></script>
		<script>
			function star() {
				var opt = {
					"speed": "slow", //变换速度,三速度可选 slow,normal,fast;
					"by": "click", //触发事件,click或者mouseover;
					"auto": true, //是否自动播放;
					"sec": 2000 //自动播放间隔;
				};
				$("#demo").IMGDEMO(opt);
			}
		</script>-->

	</body>

</html>