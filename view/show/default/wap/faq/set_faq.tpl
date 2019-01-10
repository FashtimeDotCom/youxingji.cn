<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-发布问题</title>
	<meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
	<meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
	<script src="/resource/m/js/jquery.js"></script>
	<script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/m/css/common.css" />
	<style type="text/css">
		.upic{cursor:pointer;margin: 0 15px 15px 0;position: relative;}
		.layui-upload-button{display: none;}
		.upic i{position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				width: 48px;
				height: 48px;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				border-radius: 50%;
				background: rgba(0,0,0,.2);
				color: #fff;
				text-align: center;
				font-size: 24px;
				line-height: 48px;
				opacity: 1;
				-webkit-transition: all .3s;
				-moz-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
				-o-border-radius: 50%;
				-ms-border-radius: 50%;
				-ms-transition: all .3s;}
		.num_text{font-size: 12px;color: #868686;line-height: 20px;padding-right: 6px;}
		.num_f{color: #d71618;}

		.row-issue{margin: 48px auto 0px;}
		.m-edit-yz{margin-bottom: 0;padding-bottom: 1px;}
		.wp{padding-top: 20px;}
		.m-edit-yz .tit .inp,.m-edit-yz textarea{border:none;background: #f5f5f5;}
		#title{width: 90%;}
		.m-edit-yz textarea{height: 200px;padding: 7px 10px 0px;}

		.m-edit-yz .file .addImg{ display: inline-block;width:40px;height: 40px;
			background: url(/resource/m/images/user/icon_addimg.png) no-repeat center center / 100%;}

		.headline{margin-bottom: 6px;font-size: 12px;clear: both;}
		.m-edit-yz .tit .inp,.m-edit-yz textarea{font-size: 12px;}

		input#title::-webkit-input-placeholder, textarea::-webkit-input-placeholder {color: #949494;}
		input#title:-moz-placeholder, textarea:-moz-placeholder{ color:#949494;}
		input#title::-moz-placeholder, textarea::-moz-placeholder{ color:#949494;}
		input#title:-ms-input-placeholder, textarea:-ms-input-placeholder{ color:#949494;}

		.publish{display: block;width: 100%;margin: 22px auto 14px;color: #fff;border: none;
				 font-size: 14px;text-align: center;line-height: 30px;background: #f75b5d;
				 border-radius: 2px;}
		.nav{top: 45px;}
		
		.location1{position: absolute;top: 10px;right: 6px;}
	</style>
	<link rel="stylesheet" href="/resource/m/css/tag.css" title="和标签相关" />
</head>
<body>
	<div class="header">
		{{include file='wap/header.tpl'}}
		<h3>达人问答-发布问题</h3>
	</div>
	<div class="mian">
		<div class="row-issue">
			<div class="m-edit-yz">
				<div class="wp">
					<div class="tit" style="background: #f5f5f5;position: relative;">
						<input type="text" class="inp" value="{{$res.title}}" id="title" maxlength="80" onkeyup="judgeIsNonNull1(event)" placeholder="请输入你的问题，不少于10个字哦">
						<p class="r num_text location1"><a class="num_f" id="contentwordage1">0</a>/80</p>
					</div>

					<p class="headline">问题说明</p>
					<div class="coverage fix" style="background: #f5f5f5;">
						<div class="content-txt" style="overflow: auto;margin-bottom: 0px;">
							<textarea placeholder="请输入你的问题说明，不少于10个字哦" class="txta1" id="describe" maxlength="1000" onkeyup="judgeIsNonNull2(event)"></textarea>
							<p class="r num_text"><a class="num_f" id="contentwordage2">0</a>/1000</p>
						</div>
					</div>

					<div class="file f-pic" style="margin-top: 7px;">
						<div class="addImg"></div>
					</div>
					<div class="layui-upload">
						<label>
							<input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
						</label>
						<div class="layui-upload-list" id="piclist"></div>
					</div>

					<p class="headline">选择目的地</p>
					<div class="tit">
						<input type="text" class="inp" value="{{$res.nation}}" id="nation" placeholder="国家">
					</div>
					<p class="headline">标签</p>
					<div class="tit" style="position: relative;">
						<input type="text" class="inp" id="tag" value="" maxlength="4" onkeyup="judgeIsNonNull3(event)" placeholder="每个标签最多四个字,最多三个标签,空格无效">
						<input type="button" name="" class="btn affirm dis_none" id="affirm" value="确认添加" />
						<p class="tagTips FontSize dis_none">最多只能四个标签！可以先删掉其中一个旧标签，再增加新标签！</p>
						<div class="tagVal fix" id="tagVal" style="margin-top: 10px;"></div>
					</div>
					<button class="publish" id="btnAdd" data-val="mobile">发布问题</button>
				</div>
			</div>
		</div>
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/js/set_question.js"></script>
</body>
</html>