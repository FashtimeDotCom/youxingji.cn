<?php /* vpcvcms compiled created on 2018-08-15 15:49:37
         compiled from wap/vote/vote_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>活动投票_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => ""), $this);?>
</title>
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<link rel="stylesheet" href="/resource/m/css/tp.css" />
		<script src="/resource/js/move_rem.js"></script>
		<style type="text/css">
			html body {
				margin: 0;
				padding: 0;
				background: #ffe7a2;
			}
			
			article {
				width: 100%;
				position: relative;
			}
			
			img {
				display: block;
				width: 100%;
			}
			
			article nav {
				width: 5.5rem;
				height: 1.375rem;
				margin: 1rem auto;
			}
			
			.item nav {
				width: 5.5rem;
				height: 1.375rem;
				margin: 1rem auto;
			}
			
			article section {
				width: 13rem;
				margin: 0 auto;
				background: rgba(0, 0, 0, .5);
				border-radius: .3rem;
				padding: .5rem 0.75rem;
				font-size: 0.6rem;
				color: rgba(255, 255, 255, 1);
				line-height: 1rem;
			}
			
			article section .text {
				padding-bottom: .5rem;
				border-bottom: 1px solid #fff;
			}
			
			article section .Sponsor {
				padding-top: .5rem;
			}
			
			article ul {
				margin: 0.625rem auto;
				display: flex;
				width: 12.875rem;
			}
			
			article ul li {
				text-align: center;
				font-size: 0.6rem;
				color: rgba(255, 255, 255, 1);
				line-height: 1.5rem;
				width: 6.125rem;
			}
			
			article ul li:last-child {
				background: #EF585C;
				border-radius: 0 .1rem .1rem 0;
				position: relative;
			}
			
			article ul li:last-child div {
				position: absolute;
				height: 0px;
				width: 0px;
				border-top: 0px solid transparent;
				border-left: 1rem solid #D5494D;
				border-bottom: 1.5rem solid transparent;
			}
			
			article ul li:first-child {
				background: #D5494D;
				border-radius: .1rem 0 0 .1rem;
			}
			
			.item {
				margin-bottom: .5rem;
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
				box-shadow: 0px .1rem .3rem 0px rgba(44, 44, 44, 0.57);
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
				position: relative;
			}
			
			.user_img i {
				position: absolute;
				top: -.85rem;
				left: 1rem;
				width: 1.2rem;
				height: 0.9rem;
			}
			
			.user_img i img {
				border: none;
			}
			
			.user_img img {
				border: 2px solid #FFB102;
				width: 100%;
				border-radius: 1.4375rem;
			}
			
			.box .box_left p {
				height: 0.8rem;
				background: #fff;
				color: rgba(215, 22, 24, 1);
				border-radius: 0.4rem;
				text-align: center;
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
			
			.box .box_left .tpbtn {
				margin: .5rem auto;
				width: 3.375rem ;
				height: 1.3rem;
				background: #FE6C60;
				color: #fff;
				opacity: 0.97 ;
				border-radius: .45rem ;
				box-shadow: 0px 2px 6px 0px rgba(44, 44, 44, 0.45) ;
			}
			.user_name {
				margin-right:  .2rem;
				
			}
			.box_right  div {
				margin-bottom: .3rem;
			}
			
		</style>
	</head>

	<body class="">
		<article>
			<img src="/resource/images/ban1-1-hlg.jpg" />
		</article>
		<article>
			<nav>
				<img src="/resource/m/images/tp/tp@1x.png" />
			</nav>
			<section class="">
				<div class="text">
					1.内容内容内容内容内容内容内容内容 2.内容内容内容内容内容内容内容内容内容内容内容内容 3.内容内容内容内容 3.内容内容内容内容
				</div>
				<div class="Sponsor">
					主办方：游行迹、中润药业
				</div>
			</section>
		</article>
		<article>
			<ul class="">
				<li>投票人数：50000</li>
				<li>
					<div class="jiao">

					</div>访问量：50000</li>
			</ul>
			<div class="item">
				<nav>
					<img src="/resource/m/images/tp/tp@2x.png" />
				</nav>
				<div class="box">
					<div class="box_left">
						<div class="jiao">
							<span class="num">
									1								
								</span>
						</div>
						<div class="user_img">
							<img src="http://m.youxingji.cn/uploadfile/image/20180716/201807162139595967.jpeg" />
							<i><img src="/resource/m/images/tp/icon.png"/></i>
						</div>
						<input type="button" class="tpbtn" value="投票" />
						<p>9999票</p>
					</div>
					<div class="box_right">
						<div><span class="user_name">用户名</span>广西民族大学旅游管理专业 </div>
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
							<i><img src="/resource/m/images/tp/icon.png"/></i>
						</div>
						<input type="button" class="tpbtn" value="投票" />
						<p>9999票</p>
					</div>
					<div class="box_right">
						<div><span class="user_name">用户名</span>广西民族大学旅游管理专业 </div>

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

		</article>
	</body>

</html>