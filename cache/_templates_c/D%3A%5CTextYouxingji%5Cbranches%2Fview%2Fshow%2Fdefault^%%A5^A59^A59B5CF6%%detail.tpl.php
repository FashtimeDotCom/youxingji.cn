<?php /* vpcvcms compiled created on 2019-01-02 18:30:46
         compiled from swim/detail.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>达人种子招募令</title>
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/swim/aman.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">

	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<script src="resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
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
		.whiteSpace{white-space: pre-wrap!important;word-wrap: break-word!important;*white-space:normal!important;}
		.dis_block{display: block!important;}
		/*模仿朋友圈   九宫格显示    防止图片变形*/
		.figure{padding-bottom: ; /* 关键就在这里 */
			  	background-position: center;
			  	background-repeat: no-repeat;
			  	background-size: cover;}
		
		.Head_portrait a{height: 100%;margin-right: 10px;}
		.borderRadius50{border-radius:50%!important;}
		.Iclass{font-style: normal;}
		
		.user-head div a:hover{color: #5876a2;}
		
		.num div .smallIcon{display:inline-block;vertical-align:middle;margin-top:-3px;margin-right:5px}
		.num div{flex-grow: 1;text-align: center;padding-left: .8rem;line-height: .7rem;border-right: 1px solid   #E5E5E5;}
		.num div:last-child{border: none;}
		
		.num .theory1 a{display: inline-block;width: 100%;height: 100%;}
		
		.num .hideed1 .smallIcon{width:0.35rem;height: 0.35rem;background:url(/resource/images/common/icon_like1.png) no-repeat center center / 100%;}
		.num .theory1 .smallIcon{width:0.35rem;height: 0.35rem;background:url(/resource/images/common/icon_review1.png) no-repeat center center / 100%;}
		.num .zan1 .smallIcon{width:0.4rem;height: 0.4rem;background:url(/resource/images/common/icon_dianzan1.png) no-repeat center center / 100%;}
		.num .look1 .smallIcon{width:0.5rem;height: 0.5rem;background:url(/resource/images/common/preview2.png) no-repeat center center / 100%;}
		.num .look1 i{color: #d71618;}
		
		.num .zan1.conversion .smallIcon{background-image:url(/resource/images/common/icon_dianzan2.png);}
		.num .zan1.conversion i{color: #d71618;}
		
		.num .hideed1:hover a,
		.num .zan1:hover a,
		.num .theory1:hover a{color:#d71618;}

		.num .hideed1:hover .smallIcon{background-image:url(/resource/images/common/icon_like2.png);}
		.num .zan1:hover    .smallIcon{background-image:url(/resource/images/common/icon_dianzan2.png);}
		.num .theory1:hover .smallIcon{background-image:url(/resource/images/common/icon_review2.png);}
		/*行程路线*/
		.itinerary .user-info>div{width: 50%;float: left;}
		.itinerary .user-info>div .txt{display: -webkit-box!important;-webkit-box-orient: vertical;overflow: hidden;-webkit-line-clamp: 3;}
	</style>
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<input type="hidden" name="activity_id" id="activity_id" value="<?php echo $this->_tpl_vars['activity_id']; ?>
">
	<input type="hidden" name="page" id="page" value="2" />
	<div class="main">
		<div class="banner"><img src="<?php echo $this->_tpl_vars['detail_info']['ad_img_url']; ?>
" /></div>
		<div><div class="title" style="text-align: center;width: auto;">达人种子招募令</div></div>
		
		<!--行程路线-->
		<div class="items itinerary">
			<div class="line"><div class="line_title">行程路线</div></div>
			<div class="box">
				<div class="img-info">
					<div class="content"><img src="<?php echo $this->_tpl_vars['target_info'][0]['img_url']; ?>
" id="img-src" /></div>
					<div class="list">
						<?php if ($this->_tpl_vars['target_info']): ?>
							<?php $_from = $this->_tpl_vars['target_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kk'] => $this->_tpl_vars['items']):
?>
						<div class="list-box">
							<img src="<?php echo $this->_tpl_vars['items']['img_url']; ?>
" alt="<?php echo $this->_tpl_vars['items']['city']; ?>
" data-desc="<?php echo $this->_tpl_vars['items']['desc']; ?>
" />
						</div>
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="user-info">
					<div class="info-left">
						<h1>目的地介绍</h1>
						<div class="txt whiteSpace"><?php echo $this->_tpl_vars['detail_info']['desc']; ?>
</div>
					</div>
					<div class="info-right">
						<div class="user-logo">
							<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
"><img src="<?php echo $this->_tpl_vars['detail_info']['avatar']; ?>
" /></a>
						</div>
						<div class="txt">
							<p><?php echo $this->_tpl_vars['detail_info']['university']; ?>
 <?php echo $this->_tpl_vars['detail_info']['username']; ?>
</p>
							<p class="txt whiteSpace"><?php echo $this->_tpl_vars['detail_info']['desccibes']; ?>
</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<input type="hidden" name="uid" id="uid" data-type="1" value="" />
		<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="travel_num" title="共用JS区分的唯一必须值" />
		<!--行程直播-->
		<?php if ($this->_tpl_vars['travel_info']): ?>
		<div class="items">
			<div class="line"><div class="line_title">行程直播</div></div>
			<div class="container">
				<div class="waterfall">
					<div class="tip">
						<div class="tips">最新动态</div>
						<div class="clear"></div>
					</div>
					<div class="blank"></div>
					<?php if ($this->_tpl_vars['travel_info']): ?>
						<?php $_from = $this->_tpl_vars['travel_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item">
						<div class="user-in">
							<div class="user-head">
								<div class="Head_portrait">
									<a class="dis_block figure borderRadius50" href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['detail_info']['user_id']; ?>
" style="background-image: url(<?php echo $this->_tpl_vars['item']['avatar']; ?>
);"></a>
								</div>
								<div class="user-info-box">
									<div class="user_name">
										<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
										<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
									</div>
									<div class="user-text"><a class="whiteSpace" href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['describes']; ?>
</a></div>
								</div>
							</div>
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
								<div class="hideed1" onclick="collect(<?php echo $this->_tpl_vars['item']['id']; ?>
)">
									<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
								</div>
								<div class="theory1">
									<a href="/index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
										<em class="smallIcon"></em><i class="Iclass">评论</i>
									</a>
								</div>
								<div class="zan1" onclick="zan(this,<?php echo $this->_tpl_vars['item']['id']; ?>
)" data-sign="his" data-nature="Live" data-val="travel_num">
									<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['item']['topnum']; ?>
</i></a>
								</div>
								<div class="look1"><em class="smallIcon"></em><i class="Iclass"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</i></div>
							</div>
						</div>
					</div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<div class="Load"><div class="load-tips">加载更多</div></div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<!--达人游记-->
		<?php if ($this->_tpl_vars['travel_log']): ?>
		<div class="items" style="height: 23.875rem;">
			<div class="line"><div class="line_title">达人游记</div></div>
			<div class="warp">
				<div class="warp-img"><img src="resource/images/swim/bg1.png" /></div>
				<div class="list">
					<div class="list-item">
						<div class="list-left">
							<div>金边 <span>Phnom Penh</span></div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" data-url="" id="" value="查看详情" />
						</div>
						<div class="list-right"><img src="resource/images/swim/exploded view1.jpg" /></div>
						<div class="clear"></div>
					</div>
					<div class="list-item">
						<div class="list-left">
							<div>金边 <span>Phnom Penh</span></div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" id="" value="查看详情" />
						</div>
						<div class="list-right"><img src="resource/images/swim/exploded view1.jpg" /></div>
						<div class="clear"></div>
					</div>
					<div class="list-item">
						<div class="list-left">
							<div>金边 <span>Phnom Penh</span></div>
							<p>金边，柬埔寨王国的首都，柬埔寨最大城市</p>
							<input type="button" id="" value="查看详情" />
						</div>
						<div class="list-right">
							<img src="http://www.youxingji.cn/uploadfile/image/20180605/152818640766573.jpg" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="warp-bg"></div>
			<div class="clear"></div>
		</div>
		<?php endif; ?>
		
		<!--达人视频-->
		<?php if ($this->_tpl_vars['tv_info']): ?>
		<div class="items">
			<div class="line"><div class="line_title">达人视频</div></div>
			<div class="video-box">
				<ul class="ul-pic1">
					<?php if ($this->_tpl_vars['tv_info']): ?>
						<?php $_from = $this->_tpl_vars['tv_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<li><a href="javascript:;" onclick="js_video(this)" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
">
							<img src="<?php echo $this->_tpl_vars['item']['pics']; ?>
" alt="">
							<div class="txt">
								<h4><?php echo $this->_tpl_vars['item']['title']; ?>
</h4>
								<i></i>
							</div>
						</a>
					</li>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>

		<!-- 视频弹窗 -->
        <div class="m-pop1-hlg m_pop1_yz" id="m-pop1-hlg">
        	<div class="con1">
        		<div class="close js-close" onclick="js_close()"><span></span></div>
        		<div class="VideoArea"></div>
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
		$(function(){
			//行程路线  图片切换
			$(".list-box").click(function() {
				$(this).each(function() {
					var src = $(this).children("img").attr("src");
					var City = $(this).children("img").attr("alt");
					var desc = $(this).children("img").data("desc");
					$("#img-src").attr('src', src);
				});
			});

			//行程直播  加载更多
			$(".load-tips").click(function() {
				var page = $("#page").val();
				var id = $("#activity_id").val();
				$.ajax({
					type: "post",
					url: "/index.php?m=api&c=swim&v=get_more",
					data: {
						page: page,
						activity_id: id
					},
					dataType: 'json',
					async: false,
					success: function(res){
						console.log(res);
						if(res.status == 1) {
							var Html="";
							$.each(res.data,function(i,item){
								Html += '<div class="item">'+
											'<div class="user-in">'+
												'<div class="user-head">'+
													'<div class="Head_portrait">'+
														'<a class="dis_block figure borderRadius50" href="/index.php?m=index&c=muser&v=index&id='+res.data[i].uid+'" style="background-image: url('+res.data[i].avatar+');"></a>'+
													'</div>'+
													'<div class="user-info-box">'+
														'<div class="user_name">'+
															'<div>'+res.data[i].username+'</div>'+
															'<div class="time">'+res.data[i].addtime+'</div>'+
														'</div>'+
														'<div class="user-text"><a class="whiteSpace" href="/index.php?m=index&c=travel&v=travel_detail&id='+res.data[i].id+'">'+res.data[i].describes+'</a></div>'+
													'</div>'+
												'</div>'+
												'<ul class="row">';
										for ( var k=0;k<res.data[i].content.length;k++ ){
											Html += '<li><a class="lightbox" href='+res.data[i].content[k]+' rel="list'+res.data[i].id+'"><img src='+res.data[i].content[k]+' /></a></li>';
										}
										Html += '</ul>'+
												'<div class="clear"></div>'+
												'<div class="num">'+
													'<div class="hideed1" onclick="collect('+res.data[i].id+')">'+
														'<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>'+
													'</div>'+
													'<div class="theory1">'+
														'<a href="/index.php?m=index&c=travel&v=travel_detail&id='+res.data[i].id+'">'+
															'<em class="smallIcon"></em><i class="Iclass">评论</i>'+
														'</a>'+
													'</div>'+
													'<div class="zan1" onclick="zan(this,'+res.data[i].id+')" data-sign="his" data-nature="Live" data-val="travel_num">'+
														'<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">'+res.data[i].topnum+'</i></a>'+
													'</div>'+
													'<div class="look1"><em class="smallIcon"></em><i class="Iclass">'+res.data[i].shownum+'</i></div>'+
												'</div>'+
											'</div>'+
										'</div>';
							});
							$('.waterfall').append(Html);
							page = res.page;
							$("#page").val(page);
						}
						else{
							layer.msg(res.tips);
						}
					}
				});
			});

			//达人游记  点击内容   跳转详情
			$(document).on('click','.list-left input',function(){
				var src = $(this).data("url");
				window.location.href = src;
			});
		});
	</script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="打开、关闭视频"></script>
</body>
</html>