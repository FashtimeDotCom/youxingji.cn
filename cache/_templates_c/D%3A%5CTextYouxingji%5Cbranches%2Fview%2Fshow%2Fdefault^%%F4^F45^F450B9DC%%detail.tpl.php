<?php /* vpcvcms compiled created on 2019-01-02 17:15:45
         compiled from swim/mobile/detail.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>行程直播</title>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/swim/swim.css" />

	<script src="/resource/js/move_rem.js" type="text/javascript" charset="utf-8"></script>
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
	<style type="text/css">
		.whiteSpace{white-space: pre-wrap!important;
					word-wrap: break-word!important;
					*white-space:normal!important;}
		.user-head{display: block;height: auto;margin-bottom: 30px;}
		.user-head .Head_portrait{float: left;margin-right: 4px;}
		.fix{*zoom:1;}
		.fix:after{display:block; content:"clear"; height:0; clear:both; overflow:hidden; visibility:hidden;}
		.dis_block{display: block!important;}
		
		.figure{padding-bottom: ; /* 关键就在这里 */
			  	background-position: center;
			  	background-repeat: no-repeat;
			  	background-size: cover;border-radius: 5px;}
		
		.omit{display: -webkit-box!important;-webkit-box-orient: vertical;overflow: hidden;}
		.lineNumber4{-webkit-line-clamp: 4;}
		
		.profilePhoto{ padding-bottom: 100%;border-radius: 50%;}
		
		.user-text{text-align: justify;}
		
		.m_pop1_yz .con{overflow: inherit;}
		.m_pop1_yz .con .close{top: -44px;}
		.m_pop1_yz .con .close span{background: #221414 url(/resource/m/images/icon-close2.png) no-repeat center center / 68%;}
		.user-info .info-text{text-align: justify;}
		.num .zan i{font-style: normal;}
		
		.viewMore{display: inline-block;color: #0000FF;}
		.widthHeight{display: inline-block;width: 100%;height: 100%;}
		.TalentVideo .headline h4{white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
	</style>
</head>
<body>
	<input type="hidden" name="activity_id" id="activity_id" value="<?php echo $this->_tpl_vars['activity_id']; ?>
">
	<input type="hidden" name="page" id="page" value="2" />
	<div class="header">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<h3>行程直播</h3>
		<div class="g-top">
			<div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
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
	</div>
	<div class="main">
		<div class="item">
			<div class="banna"><img src="<?php echo $this->_tpl_vars['detail_info']['ad_img_url']; ?>
" /></div>
			<div class="Country-info">
				<div class="title" style="margin-left: 0;">目的地介绍</div>
				<div class="info-text whiteSpace"><?php echo $this->_tpl_vars['detail_info']['desc']; ?>
</div>
				<div class="user-info">
					<div class="info-img-box">
						<a class="dis_block profilePhoto figure fix" style="background-image: url(http://m.youxingji.cn<?php echo $this->_tpl_vars['detail_info']['avatar']; ?>
);" href="index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
"></a>
					</div>
					<div class="info-text">
						<p><?php echo $this->_tpl_vars['detail_info']['university']; ?>
 <?php echo $this->_tpl_vars['detail_info']['username']; ?>
</p>
						<input type="hidden" name="synopsis" id="synopsis" value="<?php echo $this->_tpl_vars['detail_info']['desccibes']; ?>
" />
						<p><span class="autograph whiteSpace"></span><span class="viewMore dis_none" data-open="0">查看全文</span></p>
					</div>
				</div>
			</div>
		</div>
		
		<?php if ($this->_tpl_vars['travel_info']): ?>
		<input type="hidden" name="uid" id="uid" data-type="1" value="<?php echo $this->_tpl_vars['item']['uid']; ?>
" />
        <input type="hidden" name="type" id="travel_num" title="总数" value="<?php echo $this->_tpl_vars['total']['travel_num']; ?>
"/>
		<input type="hidden" id="UniqueValue" data-sign="his" value="travel_num" data-length="68" data-type="3" title="共用JS区分的唯一必须值"/>
	        
		<style type="text/css">
			.jquery-lightbox-mode-image{height: auto!important;}
		</style>
		<div class="item p30">
			<div class="title">行程直播</div>
			<div class="waterfall">
				<?php $_from = $this->_tpl_vars['travel_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<div class="user-in">
					<a class="widthHeight user-head fix" href="/index.php?m=wap&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="Head_portrait figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['avatar']; ?>
);border-radius: 50%;"></div>
						<div class="user-info-box">
							<div class="user_name">
								<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
								<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
							</div>
							<div class="user-text whiteSpace"><?php echo $this->_tpl_vars['item']['describes']; ?>
</div>
						</div>
					</a>
					<ul class="row">
						<?php if ($this->_tpl_vars['item']['content']): ?>
						<?php $_from = $this->_tpl_vars['item']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
						<li><a class="lightbox figure" href="<?php echo $this->_tpl_vars['vo']; ?>
" rel="list<?php echo $this->_tpl_vars['item']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['vo']; ?>
);"></a></li>
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
					</ul>
					<div class="clear"></div>
					<div class="num">
						<div class="hideed" onclick="collect(<?php echo $this->_tpl_vars['item']['id']; ?>
)">收藏</div>
						<div class="theory">
							<a class="widthHeight" href="/index.php?m=wap&c=index&v=star_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">评论</a>
						</div>
						<div class="spot zan" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-nature="Live"><i><?php echo $this->_tpl_vars['item']['topnum']; ?>
</i></div>
						<div class="Read one"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</div>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="btn-dt"><input type="button" id="btn_dt" value="更多动态" /></div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['travel_log']): ?>
		<div class="item p30">
			<div class="title">达人游记 <span id="">更多</span></div>
			<div class="list">
				<div class="list-item">
					<div class="list-right"><img src="image/images/yhzbg1.jpg" /></div>
					<div class="list-left">
						<div>金边 </div>
						<p class="whiteSpace">金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button" id="" value="查看详情" />
					</div>
				</div>
				<div class="list-item">
					<div class="list-right"><img src="image/images/yhzbg1.jpg" /></div>
					<div class="list-left">
						<div>金边 </div>
						<p class="whiteSpace">金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button" id="" value="查看详情" />
					</div>
				</div>
				<div class="list-item">
					<div class="list-right"><img src="image/images/yhzbg1.jpg" /></div>
					<div class="list-left">
						<div>金边 </div>
						<p class="whiteSpace">金边，柬埔寨王国的首都，柬埔寨最大城市</p>
						<input type="button" id="" value="查看详情" />
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['tv_info']): ?>
		<div class="item p30 TalentVideo">
			<div class="title">达人视频 <span id="">更多</span></div>
			<div class="m-imgtxt3 swiper-container swiper-container-horizontal">
				<div class="swiper-wrapper">
					<?php $_from = $this->_tpl_vars['tv_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<div class="swiper-slide">
						<div class="pic figure" onclick="js_video(this)" data-src="<?php echo $this->_tpl_vars['v']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['v']['pics']; ?>
);">
							<div class="txt">
								<i></i>
							</div>
						</div>
						<div class="headline"><a href="/index.php?m=wap&c=index&v=tv_detail&id=<?php echo $this->_tpl_vars['v']['id']; ?>
"><h4><?php echo $this->_tpl_vars['v']['title']; ?>
</h4></a></div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<div class="swiper-slide">
						<a href="/index.php?m=wap&c=index&v=tv">
							<div class="g-more2"><span>查看更多达人视频<i></i></span></div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz">
        	<div class="con"><div class="close js-close" onclick="js_close()"><span></span></div><div class="VideoArea"></div></div>
       </div>
		<?php endif; ?>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		var swiper1 = new Swiper('.banner', {
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
		var swiper2 = new Swiper('.m-imgtxt1', {
			slidesPerView: 1,
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			autoplay: {
				delay: 3000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			}
		});
		var swiper3 = new Swiper('.m-imgtxt2', {
			slidesPerView: 1.5
		});
		var swiper4 = new Swiper('.m-imgtxt3', {
			slidesPerView: 1.5
		});
	</script>
	<script type="text/javascript">
		$(".cont").click(function(){
			$(this).parent().parent().parent().find(".foot").toggle();
		});
	</script>

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
		});
	</script>
	
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
	<script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
	<script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏】"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var host = window.location.host;
			var id = $("#activity_id").val();
			
			//更多动态
			$("#btn_dt").click(function() {
				var page = $("#page").val();
				var src = "//" + host + '/' + 'index.php?m=api&c=swim&v=get_more';
				$.ajax({
					type: "post",
					url: src,
					data: {
						page: page,
						activity_id: id
					},
					dataType: 'json',
					async: false,
					success: function(data) {
						var sdata = data.data;
						if(data.status == 1) {
							for(i in sdata) {
								var html =  "<div class='user-in'>"+
												"<div class='user-head fix'>"+
													"<div class='Head_portrait figure' style='background-image: url(" +sdata[i].avatar + ");border-radius: 50%;'></div>"+
													"<div class='user-info-box'>"+
														"<div class='user_name'>"+
															"<div>" +sdata[i].username + "</div>"+
															"<div class='time'>" +sdata[i].addtime + "</div>"+
														"</div>"+
														"<div class='user-text whiteSpace'>" +sdata[i].describes + "</div>"+
													"</div>"+
												"</div>"+
												"<ul class='row'id='rowid" +sdata[i].id + "'></ul>"+
												"<div class='clear'></div>"+
												"<div class='num'>"+
													"<div class='hideed' onclick='collect(" +sdata[i].id + ")'>收藏</div>"+
													"<div class='theory'>评论</div>"+
													"<div class='spot zan' onclick='zan(this," +sdata[i].id + ")' data-nature='Live'><i>" + sdata[i].topnum + "</i></div>"+
													"<div class='Read one'>" + sdata[i].shownum + "</div>"+
												"</div>"+
											"</div>";
								
								$('.waterfall').append(html);
								
								for(x in sdata[i].content) {
									var li = "<li><a class='lightbox figure' href=" + sdata[i].content[x] + " rel='list" + sdata.id + "' style='background-image: url(" + sdata[i].content[x] + ");'></a></li>";
									$('#rowid' + sdata[i].id).append(li);
								}
								
							
							}
							page = data.page;
							$("#page").val(page);
						} else {
							layer.msg(data.tips);
						}
					}
				});
			});

			$('.list-left input').on('click',function(){
				var src = $(this).data("url");
				window.location.href = src;
			});
		});
	</script>
</body>
</html>