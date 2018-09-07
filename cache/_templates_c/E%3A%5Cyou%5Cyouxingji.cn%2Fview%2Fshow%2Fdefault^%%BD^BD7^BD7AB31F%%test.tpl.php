<?php /* vpcvcms compiled created on 2018-07-24 15:20:27
         compiled from index/test.tpl */ ?>
<!DOCTYPE html>
<!-- saved from url=(0047)http://www.jq22.com/demo/diyUpload201712150034/ -->
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/resource/css/globle.css">
		<script src="/resource/js/jquery-1.10.2.js"></script>
		<script src="/resource/js/jquery.min.js"></script>
	</head>

	<body class="" style="">
		<div style="padding: 100px;">
			<ul class="upload-ul clearfix">
				<li class="upload-pick">
					<div class="webuploader-container clearfix" id="goodsUpload"></div>
				</li>
			</ul>
			<p>
				<a class="upload-btn" href="javascript:;">提交</a>
			</p>
		</div>
		<script src="/resource/js/webuploader.min.js"></script>
		<script src="/resource/js/Upload.js"></script>
		<script>
			$(function() {
				//上传图片
				var $tgaUpload = $('#goodsUpload').diyUpload({
					url: '/index.php?m=api&c=index&v=uploadpic',
					success: function(data) {
					},
					error: function(err) {
					},
					buttonText: '',
					accept: {
						title: "Images",
						extensions: 'gif,jpg,jpeg,bmp,png'
					},
					fileNumLimit: 9,
					thumb: {
						width: 120,
						height: 90,
						quality: 100,
						allowMagnify: true,
						crop: true,
						type: "image/jpeg"
					},
					compress: {
						quality: 70,
						compressSize: 524288
					}
				});

			});
		</script>

	</body>

</html>