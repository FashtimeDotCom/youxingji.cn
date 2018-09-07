<?php /* vpcvcms compiled created on 2018-08-06 16:47:41
         compiled from wap/test.tpl */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			html {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
				-webkit-user-select: none;
				user-select: none;
			}
			
			body {
				line-height: 1.6;
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				background-color: #f1f0f6;
			}
			
			* {
				margin: 0;
				padding: 0;
			}
			
			button {
				font-family: inherit;
				font-size: 100%;
				margin: 0;
				*font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
			ul,
			ol {
				padding-left: 0;
				list-style-type: none;
			}
			
			a {
				text-decoration: none;
			}
			
			.label_box {
				background-color: #ffffff;
			}
			
			.label_item {
				padding-left: 15px;
			}
			
			.label_inner {
				padding-top: 10px;
				padding-bottom: 10px;
				min-height: 24px;
				position: relative;
			}
			
			.label_inner:before {
				content: " ";
				position: absolute;
				left: 0;
				top: 0;
				width: 200%;
				height: 1px;
				border-top: 1px solid #ededed;
				-webkit-transform-origin: 0 0;
				transform-origin: 0 0;
				-webkit-transform: scale(0.5);
				transform: scale(0.5);
				top: auto;
				bottom: -2px;
			}
			
			.lbox_close {
				position: relative;
			}
			
			.lbox_close:before {
				content: " ";
				position: absolute;
				left: 0;
				top: 0;
				width: 200%;
				height: 1px;
				border-top: 1px solid #ededed;
				-webkit-transform-origin: 0 0;
				transform-origin: 0 0;
				-webkit-transform: scale(0.5);
				transform: scale(0.5);
			}
			
			.lbox_close:after {
				content: " ";
				position: absolute;
				left: 0;
				top: 0;
				width: 200%;
				height: 1px;
				border-top: 1px solid #ededed;
				-webkit-transform-origin: 0 0;
				transform-origin: 0 0;
				-webkit-transform: scale(0.5);
				transform: scale(0.5);
				top: auto;
				bottom: -2px;
			}
			
			.lbox_close .label_item:last-child .label_inner:before {
				display: none;
			}
			
			.btn {
				display: block;
				margin-left: auto;
				margin-right: auto;
				padding-left: 14px;
				padding-right: 14px;
				font-size: 18px;
				text-align: center;
				text-decoration: none;
				overflow: visible;
				/*.btn_h(@btnHeight);*/
				height: 42px;
				border-radius: 5px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				color: #ffffff;
				line-height: 42px;
				-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
			}
			
			.btn.btn_inline {
				display: inline-block;
			}
			
			.btn_primary {
				background-color: #04be02;
			}
			
			.btn_primary:not(.btn_disabled):visited {
				color: #ffffff;
			}
			
			.btn_primary:not(.btn_disabled):active {
				color: rgba(255, 255, 255, 0.9);
				background-color: #039702;
			}
			
			button.btn {
				width: 100%;
				border: 0;
				outline: 0;
				-webkit-appearance: none;
			}
			
			button.btn:focus {
				outline: 0;
			}
			
			.wxapi_container {
				font-size: 16px;
			}
			
			h1 {
				font-size: 14px;
				font-weight: 400;
				line-height: 2em;
				padding-left: 15px;
				color: #8d8c92;
			}
			
			.desc {
				font-size: 14px;
				font-weight: 400;
				line-height: 2em;
				color: #8d8c92;
			}
			
			.wxapi_index_item a {
				display: block;
				color: #3e3e3e;
				-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
			}
			
			.wxapi_form {
				background-color: #ffffff;
				padding: 0 15px;
				margin-top: 30px;
				padding-bottom: 15px;
			}
			
			h3 {
				padding-top: 16px;
				margin-top: 25px;
				font-size: 16px;
				font-weight: 400;
				color: #3e3e3e;
				position: relative;
			}
			
			h3:first-child {
				padding-top: 15px;
			}
			
			h3:before {
				content: " ";
				position: absolute;
				left: 0;
				top: 0;
				width: 200%;
				height: 1px;
				border-top: 1px solid #ededed;
				-webkit-transform-origin: 0 0;
				transform-origin: 0 0;
				-webkit-transform: scale(0.5);
				transform: scale(0.5);
			}
			
			.btn {
				margin-bottom: 15px;
			}
		</style>
	</head>

	<body>
		<div class="boxTitle loadPic"><button id="loadPic">上传图片</button></div>
	</body>
	<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script type="text/javascript">
		wx.config({
			debug: true,
			appId: "wx9953ad5ae1108b51",
			timestamp: '<?php echo $this->_tpl_vars['timestamp']; ?>
',
			nonceStr: '<?php echo $this->_tpl_vars['nonceStr']; ?>
',
			signature: '<?php echo $this->_tpl_vars['signature']; ?>
',
			jsApiList: [
				'checkJsApi',
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'onMenuShareQQ',
				'onMenuShareWeibo',
				'onMenuShareQZone',
				'hideMenuItems',
				'showMenuItems',
				'hideAllNonBaseMenuItem',
				'showAllNonBaseMenuItem',
				'translateVoice',
				'startRecord',
				'stopRecord',
				'onVoiceRecordEnd',
				'playVoice',
				'onVoicePlayEnd',
				'pauseVoice',
				'stopVoice',
				'uploadVoice',
				'downloadVoice',
				'chooseImage',
				'previewImage',
				'uploadImage',
				'downloadImage',
				'getNetworkType',
				'openLocation',
				'getLocation',
				'hideOptionMenu',
				'showOptionMenu',
				'closeWindow',
				'scanQRCode',
				'chooseWXPay',
				'openProductSpecificView',
				'addCard',
				'chooseCard',
				'openCard'
			]
		});
		wx.ready(function() {
			var images = {
				localId: [],
				serverId: []
			};
			if(isWechatBrow() === "wechat") {
				/*如果是微信浏览器,就注入微信jssdk*/
				//拍照或从手机相册中选图接口
				wx.chooseImage({
					count: 9, //设置一次能选择的图片的数量 
					sizeType: ['original', 'compressed'], //指定是原图还是压缩,默认二者都有
					sourceType: ['album', 'camera'], //可以指定来源是相册还是相机,默认二者都有
					success: function(res) { //微信返回了一个资源对象 
						　　　　　　　　　 //res.localIds 是一个数组　保存了用户一次性选择的所有图片的信息　 　　　　　　　　
						images.localId = res.localIds; //把图片的路径保存在images[localId]中--图片本地的id信息，用于上传图片到微信浏览器时使用
						her.upNum += res.localIds.length;
						ulLoadToWechat(0); //把这些图片上传到微信服务器  一张一张的上传
					}
				});
			} else {
				alert('请在微信打开')
				//把上传图片的按钮换成input type=file
			}
			//上传图片到微信
			function ulLoadToWechat(i) {
				length = images.localId.length; //本次要上传所有图片的数量
				wx.uploadImage({
					localId: images.localId[i], //图片在本地的id
					success: function(res) { //上传图片到微信成功的回调函数   会返回一个媒体对象  存储了图片在微信的id
						images.serverId.push(res.serverId);

						her.pic = wxImgDown(res.serverId);
						//上传成功后 后台立马把图片从微信服务器上下载下来，返回图片在本地服务器上的信息
						（
						具体内容和后台协调： 这里返回的信息有图片的url和图片在本地服务器中的id）

						her.iid.push(her.pic.id); //把图片在本地服务器中的id专门保存到一个数组当中

						her.sum++;
						if(her.sum <= 5) {
							//                creatImg(her.pic.thumdfile);//缩略图
							creatImg(her.pic.newpath, her.pic.id); //原图  创建img便签  将用户选择的图片显示在页面中
						} else {
							alert('最多只能选择5张图片');
						}
						i++;

						if(i < length) {
							ulLoadToWechat(i);
						}

					},
					fail: function(res) {
						alert(JSON.stringify(res));
					}
				});
			};
			//创建img的方法
			function creatImg(path, id) {
				if(her.sum <= 5) {

					var imgdiv = document.createElement('div');
					imgdiv.className = "imgParent";

					var img = document.createElement('img');
					img.className += "ppp";
					$(img).attr('data-id', id); //给每个img添加一个data-id属性,值为该图片在数据库中的id
					img.src = path;

					//创建 删除小按钮  定位在了每张图片的左上角
					var delPicA = document.createElement('a');
					delPicA.innerHTML = 'X';
					delPicA.className = "delPicAC";
					$(delPicA).attr('data-id', id);

					$(imgdiv).append(delPicA);

					$(imgdiv).append(img);
					$('.picPreview').append(imgdiv);

				} else {
					alert('最多只能选择5张图片');
				}

				her.srcArr.push(path);
			}
			//下载上传到微信上的图片
			function wxImgDown(sid) {
				$.ajax({ //后台下载
					type: "POST",
					url: "/wechat/wxImgDown",
					data: {
						sid: sid
					},
					dataType: "json",
					async: false,
					success: function(rel) {
						if(rel.state) {
							//alert(rel.data);//获得图片信息
							//                alert(rel.data.id);//图片在服务器上的id
							//                alert(rel.data.thumdfile);//图片在服务器上的
							her.arrPic = rel.data; //是个数组
							//                iid=rel.data.id;
						} else {
							her.arrPic.thumdfile = false;
							alert('上传图片错误');
						}
					},
					erro: function(jqXHR) {
						alert(jqXHR);
					}
				}).done(function(arrPic) {
					return her.arrPic;
				});
				return her.arrPic; //返回一个数组  保存图片在本地服务器中的信息（url，id）
			}

			//用户选好图片后,点击图片进行预览
			$('.picPreview').on('click', 'img', function() {
				//调用预览图片的接口
				wx.previewImage({
					current: this.src, //当前显示图片的http连接
					urls: her.srcArr //需要预览图片的http连接列表
				});
			});
			//用户点击X 删除图片
			$('.picPreview').on('click', 'a', function() {
				var id = $(this).attr('data-id'); //每张图片上都有一个自定义属性保存了图片在后台中的id
				if(confirm("确定删除这张图片吗?")) {
					//删除要传后台中img的id 的数组中的数据
					for(var i = 0; i < her.iid.length; i++) {
						if(her.iid[i] == id) {
							her.iid.splice(i, 1);
						}
					}
					//删除预览
					$(this).parent().remove();
				}
			});
			//确定发表提问  获得用户发表的内容
			function publishAsk() {
				var title = $('#ua-title').val();
				var question = $('#ua-question').val();
				var uimg = [];
				var eid = $('#eid').attr('data-id');
				for(var i = 0; i < her.iid.length; i++) {
					uimg.push(her.iid[i]); //只用向后台传图片在本地服务器上的id
				}

				function sc() {
					$.ajax({
						type: "POST",
						url: "/expert/require",
						data: {
							title: title,
							question: question,
							img: uimg,
							eid: eid
						},
						dataType: "json",
						async: false,
						success: function(data) {
							if(data.state) {
								$('.askEBox').css('display', 'none');
								alert("恭喜你,发表成功");
								history.go(0);
							}
						},
						erro: function() {
							alert('发表失败,请联系管理员');
						}
					});
				}
				if((title == "") || (question == "")) {
					alert('问题主题和问题描述必须填写!');
				} else {
					if(her.iid.length == 0) {
						if(confirm('上传图片有助于行家更好的解决你的问题~')) {
							return;
						} else {
							sc();
						}
					} else { //已经选择了图片
						sc();
					}
				}
			};

		});

		wx.error(function(res) {
			alert(res.errMsg);
		});
	</script>

</html>