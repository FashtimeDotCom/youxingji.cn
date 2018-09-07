<?php /* vpcvcms compiled created on 2018-08-09 15:29:17
         compiled from swim/mobile/roster_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>名单公布_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<link rel="stylesheet" href="/resource/m/css/style.css" />
		<script src="/resource/js/move_rem.js"></script>
		<style type="text/css">
			.login_content {
				position: relative;
				text-align: center;
				width: 10rem;
				margin: 0 auto;
			}
			
			.login_content h3 {
				font-size: 0.85rem;
				color: rgba(60, 60, 60, 1);
				line-height: 2rem;
			}
			
			.login_content h3:after,
			.login_content h3:before {
				background: #D71618;
				content: "";
				height: .1rem;
				position: absolute;
				top: 50%;
				width: 20%;
			}
			
			.login_content h3:before {
				left: 0;
			}
			
			.login_content h3:after {
				right: 0;
			}
			
			.item {
				margin-bottom: .5rem;
				background: #fff;
				padding: 0 .5rem .015rem;
			}
			
			.text {
				text-align: center;
				padding-bottom: .5rem;
			}
			
			.box {
				width: 15rem;
				background: rgba(255, 255, 255, 1);
				border-radius: 0.25rem;
				box-shadow: 0.025rem 0px 0.15rem rgba(44, 44, 44, 0.57);
				display: flex;
				margin-bottom: 0.75rem;
			}
			
			.box .box_left {
				width: 4.25rem;
				margin-right: .3rem;
				text-align: center;
				font-size: .6rem;
				color: rgba(102, 102, 102, 1);
				line-height: 1.25rem;
			}
			
			.box .box_right {
				padding: 1.25rem .5rem 0 0;
				width: 10.5rem;
				font-size: 0.65rem;
				display: -webkit-box;
				-webkit-box-orient: vertical;
				-webkit-line-clamp: 8;
				overflow: hidden;
				margin-bottom: 1.25rem;
			}
			
			.user_img {
				width: 2.875rem;
				height: 2.875rem;
				border-radius: 1.4375rem;
				margin: 0 auto;
			}
			
			.user_img img {
				width: 100%;
				border-radius: 1.4375rem;
			}
			.box .box_left input {
				width: 3rem;
				height: 0.8rem;
				background: #fff;
				color: rgba(215, 22, 24, 1);
				border-radius: 0.4rem;
				border: 1px solid rgba(215, 22, 24, 1);
			}
			.jiao {
				position: relative;
				height: 0px;
				width: 0px;
				border-top: 0px solid transparent;
				border-left: 50px solid #E33F3F;
				border-bottom: 50px solid transparent;
			}
			.num {
				position: absolute;
				top: .2rem;
				left: -1.8rem;
				font-size: 0.65rem;
				color: rgba(255, 255, 255, 1);
				line-height: 0.825rem;
			}
		</style>
		<script src="/resource/m/js/jquery.js"></script>
		<script src="/resource/m/js/lib.js"></script>
	</head>

	<body class="">
		<div class="header">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<h3>名单公布</h3>
		</div>
		<div class="mian">
			<div class="g-top">
				<div class="logo">
					<a href="/"><img src="/resource/m/images/logo.png" alt="" /></a>
				</div>
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
			<?php $_from = C::T('ad')->getList(array('tagname' => 'waprytslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
			<div class="ban">
				<a href="javascript:;">
					<img src="http://m.youxingji.cn/resource/m/images/ban2_1.jpg" alt="">
				</a>
			</div>
			<?php endforeach; endif; unset($_from); ?>
			<div class="item">
				<div class="login_content">
					<h3>项目介绍</h3>
				</div>
				<div class="text">
					你想体验异国文化之旅吗？<br /> 你想为传播中国文化贡献自己的力量吗？ <br /> 你想为自己增添一段意义非凡的经历吗？
					<br /> 这是一个真实认识与了解“一带一路”的好机会 <br /> 这是一次强化自己社会责任感，提升自己能力的锻炼 <br /> 这是一次为以后旅行甚至出版游记图书的难得经历
					<br /> 我们从不缺少出发的理由

					<br /> 而缺少一颗敢于暂别平凡生活的心 <br /> 如果有一种旅行，不必考虑苟且直奔远方 <br /> 如果有一种青春，可以在路上肆意挥洒飞扬 <br /> 如果有一次旅行机会，免费提供给你 <br /> 你会心动吗？ <br /> 这次，我们希望你是旅行路上的主角 <br /> 出发，去活出生命中每一个精彩
					<br />
				</div>
			</div>
			<div class="item">
				<div class="login_content">
					<h3>获选名单</h3>
				</div>
				<div class="box">
					<div class="box_left">
						<div class="jiao">
							<span class="num">
									1								
								</span>
						</div>
						<div class="user_img">
							<img src="http://m.youxingji.cn/uploadfile/image/20180716/201807162139595967.jpeg" />
						</div>
						<p>用户名</p>
						<p>乌里单刀大学</p>
						<input type="button" id="" value="9999票" />
					</div>
					<div class="box_right">
						亲吻过大东北浪漫的冰雪，<br /> 感受过大西北的风情、济州岛的阳光、普吉岛的海水，
						<br /> 远眺过香港凌晨四点的朝阳，
						<br /> 细嗅过台湾慢生活中的别致。
						<br /> 我想要走遍山河大海，
						<br /> 用脚步丈量世界。
						<br /> 希望这次能够透过我的眼睛，
						<br /> 让你感受到老挝这个国度的神秘和美好。
						<br />
					</div>
				</div>
				<div class="box">
					<div class="box_left">
						<div class="jiao">
							<span class="num">
									1								
								</span>
						</div>
						<div class="user_img">
							<img src="http://m.youxingji.cn/uploadfile/image/20180716/201807162139595967.jpeg" />
						</div>
						<p>用户名</p>
						<p>乌里单刀大学</p>
						<input type="button" id="" value="9999票" />
					</div>
					<div class="box_right">
						亲吻过大东北浪漫的冰雪，<br /> 感受过大西北的风情、济州岛的阳光、普吉岛的海水，
						<br /> 远眺过香港凌晨四点的朝阳，
						<br /> 细嗅过台湾慢生活中的别致。
						<br /> 我想要走遍山河大海，
						<br /> 用脚步丈量世界。
						<br /> 希望这次能够透过我的眼睛，
						<br /> 让你感受到老挝这个国度的神秘和美好。
						<br />
					</div>
				</div>
			</div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</body>

</html>