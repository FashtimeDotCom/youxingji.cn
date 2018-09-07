<?php /* vpcvcms compiled created on 2018-07-30 16:06:14
         compiled from index/travel_detail.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>达人邦_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => ""), $this);?>
</title>
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/travel_detail.css" />
		<script src="/resource/lightbox/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
		<script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
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

	<body>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="main">
			<div class="wp">
				<div class="col-l">
					<div class="con">
						<div class="item">
							<div class="user-in">
								<div class="user-head">
									<div class="Head_portrait">
										<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
">
											<img src="<?php echo $this->_tpl_vars['info']['headpic']; ?>
"></a>
									</div>
									<div class="user-info-box">
										<div class="user_name">
											<div><?php echo $this->_tpl_vars['info']['username']; ?>
</div>
											<div class="time"><?php echo $this->_tpl_vars['info']['addtime']; ?>
</div>
										</div>
										<div class="user-text"><?php echo $this->_tpl_vars['info']['describes']; ?>
</div>
									</div>
								</div>
								<ul class="row">
									<?php if ($this->_tpl_vars['info']['content']): ?>
									<?php $_from = $this->_tpl_vars['info']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
									<li>
										<a class="lightbox" href="<?php echo $this->_tpl_vars['item']; ?>
" rel="list<?php echo $this->_tpl_vars['id']; ?>
">
											<img src="<?php echo $this->_tpl_vars['item']; ?>
">
										</a>
									</li>
									<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>



								</ul>
								<div class="clear">
								</div>

							</div>
							<div class="num">
								<div class="hideed "><i></i>收藏</div>
								<div class="theory one"> <i></i>评论</div>
								<div class="spot zan" data-id="<?php echo $this->_tpl_vars['id']; ?>
" data-num="<?php echo $this->_tpl_vars['info']['topnum']; ?>
" id="zan<?php echo $this->_tpl_vars['id']; ?>
"><i></i><?php echo $this->_tpl_vars['info']['topnum']; ?>
</div>
								<div class="Read one"><i></i><?php echo $this->_tpl_vars['info']['shownum']; ?>
</div>
							</div>
						</div>
						<div class="">
							<!--评论div-->
							<div class="m-comment-qm">
								<!--PC版-->
								<div id="SOHUCS" sid="<?php echo $this->_tpl_vars['source_id']; ?>
"></div>
								<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
								<script type="text/javascript">
									window.changyan.api.config({
										appid: 'cytIKVFKm',
										conf: 'prod_84acd83354d56f4258f7a43b366bb19d'
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="col-r">
					<div class="r_box">
						<div class="r_box_title">
							相关动态推荐
							<span><a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank">更多</a></span>
						</div>
						<ul class="r_box_con">
							<?php if ($this->_tpl_vars['ano_info']): ?>
							<?php $_from = $this->_tpl_vars['ano_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

							<li>
								<div class="user_head">
									<div class="Head_portrait">
										<a href="index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['info']['uid']; ?>
" target="_blank">
											<img src="<?php echo $this->_tpl_vars['item']['headpic']; ?>
">
										</a>
									</div>
									<div class="user_info_box">
										<div><?php echo $this->_tpl_vars['item']['username']; ?>
</div>
										<div class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
									</div>

								</div>
								<div class="user_text"><a href="index.php?m=index&c=travel&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['describes']; ?>
</a></div>
								<div class="pic">
									<img src="<?php echo $this->_tpl_vars['item']['content']; ?>
"/>
								</div>
							</li>

							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>

						</ul>
					</div>
					
					<div class="r_box">
						<a href="">
							<img src="http://www.youxingji.cn/uploadfile/image/20180413/152358134768728.jpg" alt="">
						</a>
					</div>
					<div class="r_box">
						<div class="r_box_title">
							热门旅游地
						</div>
						<ul class="r_box_con">
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
				<div class="clear">

				</div>
			</div>
			<div class="h81"></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<!-- 弹窗 -->
		<link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
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
			$('#pageqr').click(function() {
				var page = $('#pages').val();
				if(page) {
					window.location.href = "/index.php?m=index&c=index&v=star&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=" + page;
				}
			})
			$('.zan').click(function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zan", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$(obj).toggleClass('on');
						$(obj).html("<i></i>" + (num + 1));
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");

			});

			//登录控制
			function cyLogin()
			{
				layer.confirm('请您先登录再进行评论!', {
					btn: ['登录','取消'] //按钮
				}, function(){
					window.open("http://www.youxingji.cn/index.php?m=index&c=index&v=login");
					setIntervalDemo();
				}, function(){

				});

			}

			function setIntervalDemo() {
				setTimeoutName = setInterval(function() {
					//查看是否登录
					$.ajax({
						type: "GET",
						url: "http://www.youxingji.cn/index.php?m=api&c=comment&v=get_userinfo&flag=true",
						success: function(res) {
							var data=JSON.parse(res);
							if( data.is_login==1 ){
								window.location.reload();
							}else{
							}
						}
					});

				}, 5000);
			}
		</script>
		<!-- 弹窗 end-->
	</body>

</html>