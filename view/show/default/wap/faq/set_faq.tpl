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
							<textarea placeholder="请输入你的问题说明，不少于10个字哦" class="txta1" id="describe" maxlength="1000" onkeyup="judgeIsNonNull2(event)">{{$res.describe}}</textarea>
							<p class="r num_text"><a class="num_f" id="contentwordage2">0</a>/1000</p>
						</div>
					</div>
						

					<div class="pic-video" style="margin-top: 7px;">
						<div class="file f-pic">
							<div class="addImg"></div>
						</div>
					</div>
					<div class="layui-upload">
						<label>
							<input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
						</label>
						<div class="layui-upload-list" id="piclist">
							{{if $res.pic != ''}}
							<div class="upic"><img src="{{$res.pic}}" class="layui-upload-img" onclick="deletepic(this)"><i class="iz layui-icon">&#xe640;</i></div>
							{{else}}
							<div class="upic"><img src="" class="layui-upload-img"></div>
							{{/if}}
						</div>
					</div>

					<p class="headline">选择目的地</p>
					<div class="tit">
						<input type="text" class="inp" value="{{$res.nation}}" id="nation" placeholder="国家">
					</div>
					<p class="headline">标签</p>
					<div class="tit">
						<input type="text" class="inp" value="{{$res.label}}" id="label" placeholder="旅游知识/美食/自由行">
						<p class="tagTips FontSize dis_none">标签目前最多为四个哦！</p>
					</div>
					<button class="publish" id="btnAdd">发布问题</button>
				</div>
			</div>
		</div>
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script type="text/javascript">
		//控制 问题标题的长度
		function judgeIsNonNull1(event){
			var value=$("#title").val();
			var x = event.which || event.keyCode;
			if( value.length <= 80 ){
				//console.log("符合80位数以内");
			} else{
				return $("#title").val(value.substr(0, 11));
			}
			var remain = $("#title").val().length;
			if(remain > 80){
				$('#title').val(setString($('#title').val(),80));
				$('#contentwordage1').html(remain);
			}else{
				$('#contentwordage1').html(remain);
			}
		}
		
		//实时监听输入框值的改动
		$("#title").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
		
		//控制 问题说明的长度
		function judgeIsNonNull2(event){
			var value=$("#describe").val();
			var x = event.which || event.keyCode;
			if( value.length <= 1000 ){
				//console.log("符合1000位数以内");
			} else{
				return $("#describe").val(value.substr(0, 1000));
			}
			var remain = $("#describe").val().length;
			if(remain > 1000){
				$('#title').val(setString($('#describe').val(),1000));
				$('#contentwordage2').html(remain);
			}else{
				$('#contentwordage2').html(remain);
			}
		}
		
		//实时监听输入框值的改动
		$("#describe").bind('input propertychange', function(){
			judgeIsNonNull2(event);
		});
		
		//添加封面图
		$('.f-pic').click(function(){
			$('.layui-upload-button').trigger("click");
		});
		layui.upload({
			url: "/index.php?m=api&c=index&v=uploadpic",
			type: 'image',
			ext: 'jpg|png|jpeg|bmp',
			before: function(obj){
				$('#picslist').before('<span style="color: #d71618;" class="tips">上传中...</span>');
			},
			success: function (data) {
				$('#piclist').html('<div class="upic" onclick="deletepic(this)"><img src="'+ data.url +'" class="layui-upload-img"><i class="iz layui-icon">&#xe640;</i></div>');
			}
		});
		function deletepic(obj){
			$(obj).remove();
		}

		//标签  字数控制
		$('#label').keyup(function() {
			var label = $('#label').val();
			var result=label.split("/");
			if(result.length>4){
				$(".tagTips").removeClass("dis_none");
			}else{
				$(".tagTips").addClass("dis_none");
			}
		});
		
		//发布
		$('#btnAdd').click(function(){
			var title = $('#title').val();
			var describe = $('#describe').val();
			var address = $('#nation').val();
			var thumbfile = $('.layui-upload-img').attr('src');
			var label = $('#label').val();
			if(!title){
				layer.msg('请输入标题');
				return false;
			}else if(title.length<10){
				layer.msg('问题不能少于10个字哦！');
				return false;
			}
			if(!describe){
				layer.msg('请输入问题说明');
				return false;
			}else if(describe.length<10){
				layer.msg('问题说明不能少于10个字哦！');
				return false;
			}
	
			var result=label.split("/");
			if(result.length>4){
				$(".tagTips").removeClass("dis_none");
				return false;
			}
			
			$.post("/index.php?m=api&c=faq&v=save_set_faq", {
				'title':title,
				'desc':describe,
				'address':address,
				'thumbfile':thumbfile,
				'label':label
			}, function(data){
				layer.msg(data.tips);
				if (data.status == 1) {
					setInterval(function(){
						window.location.href = "/index.php?m=wap&c=user&v=my_faq";
					},500);
				}
			},"JSON");
		});
	</script>
</body>
</html>