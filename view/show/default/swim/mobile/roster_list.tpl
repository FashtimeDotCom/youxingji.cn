<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>名单公布_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
		<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
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
			{{include file='wap/header.tpl'}}
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
			{{vplist from='ad' item='adlist' tagname='waprytslide'}}
			<div class="ban">
				<a href="javascript:;">
					<img src="{{$info.thumbfile}}" alt="">
				</a>
			</div>
			{{/vplist}}
			<div class="item">
				<div class="login_content">
					<h3>项目介绍</h3>
				</div>
				<div class="text">
					{{$info.desc}}
				</div>
			</div>
			<div class="item">
				<div class="login_content">
					<h3>获选名单</h3>
				</div>

				{{foreach from=$info.name_list key=key item=item}}

				<div class="box">
					<div class="box_left">
						<div class="jiao">
							<span class="num">{{$item.sort}}</span>
						</div>
						<div class="user_img">
							<a href="index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
								<img src="{{$item.headpic}}" />
							</a>
						</div>
						<p>{{$item.username}}</p>
						<p>{{$item.university}}</p>
						<input type="button" id="" value="{{$item.vote_num}}票" />
					</div>
					<div class="box_right">
						{{$item.desc}}
					</div>
				</div>

				{{/foreach}}

			</div>
		</div>
		{{include file='wap/footer.tpl'}}
	</body>

</html>