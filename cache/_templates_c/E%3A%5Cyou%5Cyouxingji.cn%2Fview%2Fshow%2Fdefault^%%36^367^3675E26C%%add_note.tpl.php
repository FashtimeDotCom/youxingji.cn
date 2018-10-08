<?php /* vpcvcms compiled created on 2018-10-08 17:06:24
         compiled from wap/user/add_note.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-发布游记</title>
	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/m/css/common.css" />
	<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
	<script src="/resource/js/move_rem.js"></script>
	<script src="/resource/m/js/jquery.js"></script>
	<script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/m/css/note.css" />
    <style>
    	

    </style>
</head>
<body id="row_issue">
	<div class="mian">
		<div class="save-issue">
			<div class="wp">
				<a href="/index.php?m=wap&c=user&v=index" class="i-close col-l" style="background-image: url(/resource/m/images/i-close.png)"></a>
				<div class="col-r">
					<input type="hidden" name="did" value="<?php echo $this->_tpl_vars['did']; ?>
" id="did">
					<a href="javascript:;" id="btnDraft" class="i-save site-demo-layedit" data-type="text" style="background-image: url(/resource/m/images/i-save.png)">保存</a>
					<em></em>
					<a href="javascript:;" id="addnote" class="i-issue site-demo-layedit" data-type="content" style="background-image: url(/resource/m/images/i-dh.png)">发布</a>
				</div>
			</div>
		</div>
		<div class="g-top">
			<div class="logo">
				<a href="/"><img src="/resource/m/images/logo.png" alt="" /></a>
			</div>
			<div class="so">
				<form action="">
					<input type="text" placeholder="请输入关键字" class="inp" />
					<input type="submit" value="" class="sub sub1" />
				</form>
			</div>
		</div>
		<div class="row-issue">
			<ul class="ul-tab-yz1">
				<li><a href="/index.php?m=wap&c=user&v=addtv">
						<h4>发表视频</h4>
						<p>最原创的旅拍，最独特的旅行视角</p>
					</a>
				</li>
				<li class="on">
					<a href="/index.php?m=wap&c=user&v=addnote">
						<h4>发表游记</h4>
						<p>用“长篇大论”记录您的美好旅程</p>
					</a>
				</li>
			</ul>
			<div class="m-edit-yz">
				<div class="wp">
					<form>
						<div class="tit">
							<input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['title']; ?>
" id="title" placeholder="请在这里输入游记的标题">
						</div>
	
						<div class="tit" style="margin-bottom: 20px;">
							<textarea class="layui-textarea inp txta1" id="describe" placeholder="请在这里输入游记的摘要/封面描述" style="line-height: 22px;"><?php echo $this->_tpl_vars['res']['describe']; ?>
</textarea>
							<p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
						</div>
						<div class="pic-video tit">
							<div class="myfile fix">
								<div class="layui-upload-list fix" id="piclist" style="height: 100%;">
									<?php if ($this->_tpl_vars['res']['pic'] != ''): ?>
									<img class="note_bg layui-upload-img" data-default="" src="<?php echo $this->_tpl_vars['res']['pic']; ?>
">
									<?php else: ?>
									<img class="note_bg layui-upload-img" data-default="0" src="/resource/m/images/user/note_bg.jpg">
									<?php endif; ?>
								</div>
								<div class="buttonTier">
									<div class="layui-upload" style="width: 100%;height: 100%;">
										<label class="paddingNum" style="display: block; width: 100%;height: 100%;">
											<div class="lump fix">
												<input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
												<img class="note_add" src="/resource/m/images/user/note_add.png"/>
												<span class="title">设置游记头图</span>
												<span class="tips FontSize">图片建议选择尺寸大于1680px的高清大图，如相机原图</span>
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
	
						<div class="tit">
							<input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['tag']; ?>
" id="tag" placeholder="请输入标签(可选)，每个标签最多四个字，如：旅游知识/美食，用正斜杠分开">
							<p class="tagTips FontSize dis_none">标签目前最多为四个哦！</p>
						</div>

						<style>
							article{min-height: 308px;}
        					#editorContainer{min-height: 298px; border: 1px solid #e5e5e5;margin-bottom: 10px;}
        					.zxeditor-container{min-height: 296px;}
							.zxeditor-debug-switch{height: 0;opacity: 0;}
						</style>
						<!-- 内容编辑区域 -->
						<article><div id="editorContainer"></div></article>
	
						<div class="pic-video">
							<input type="hidden" name="code" value="<?php echo $this->_tpl_vars['code']; ?>
" id="code">
							<div class="file f-pic" id="openLocation" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i_location.png)">
									<em>添加定位</em>
								</label>
							</div>
							<input type="hidden" name="address" value="<?php echo $this->_tpl_vars['res']['address']; ?>
" id="address" title="后台返回来的定位地址">
							<p id="Paddress" class="address"><?php echo $this->_tpl_vars['res']['address']; ?>
</p>
						</div>
	
						<input type="checkbox" checked="">我已阅读并同意<a href="/article/hyzn">《服务协议》</a>
						<input type="hidden" name="did" value="<?php echo $this->_tpl_vars['did']; ?>
" id="did">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//控制封面描述的字数
			var limitNum = 255;
			var num = $('.txta1').val().length;
			var s = limitNum - num;
			if(s < 0) {
				$('.txta1').val(setString($('.txta1').val(), 255));
				$('#contentwordage').html(0);
				return false;
			}
			$('#contentwordage').html(s);
			$('.txta1').keyup(function(){
				var remain = $(this).val().length;
				if(remain > 255) {
					$('.txta1').val($('.txta1').val().substr(0, 255));
					var result = 0;
				} else {
					var result = limitNum - remain;
				}
				$('#contentwordage').html(result);
			});
	
			//标签  字数控制
			$('#tag').keyup(function() {
				var tag = $('#tag').val();
				var result=tag.split("/");
				if(result.length>4){
					$(".tagTips").removeClass("dis_none");
				}else{
					$(".tagTips").addClass("dis_none");
				}
			});
	
	
			//上传游记 的封面图片
			layui.upload({
				url: "/index.php?m=api&c=index&v=uploadpic",
				type: 'image',
				ext: 'jpg|png|jpeg|bmp',
				before: function(obj) {
					layer.load(); //上传loading
				},
				success: function(data) {
					var msg = data.msg;
					if(msg !== undefined) {
						layer.msg(msg);
					}
					$(".note_bg").attr("src",data.url);
					$(".note_bg").attr("data-default","1");// 判断是否 上传图片
					//上传完毕回调
					layer.closeAll('loading'); //关闭loading
					$(".lump").addClass("dis_none");
				}
			});
	
			//解密base64编码
			function Base64(){
				// private property
				_keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	
				// public method for encoding
				this.encode = function (input) {
					var output = "";
					var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
					var i = 0;
					input = _utf8_encode(input);
					while (i < input.length) {
						chr1 = input.charCodeAt(i++);
						chr2 = input.charCodeAt(i++);
						chr3 = input.charCodeAt(i++);
						enc1 = chr1 >> 2;
						enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
						enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
						enc4 = chr3 & 63;
						if (isNaN(chr2)) {
							enc3 = enc4 = 64;
						} else if (isNaN(chr3)) {
							enc4 = 64;
						}
						output = output +
								_keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
								_keyStr.charAt(enc3) + _keyStr.charAt(enc4);
					}
					return output;
				}
	
				// public method for decoding
				this.decode = function (input) {
					var output = "";
					var chr1, chr2, chr3;
					var enc1, enc2, enc3, enc4;
					var i = 0;
					input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
					while (i < input.length) {
						enc1 = _keyStr.indexOf(input.charAt(i++));
						enc2 = _keyStr.indexOf(input.charAt(i++));
						enc3 = _keyStr.indexOf(input.charAt(i++));
						enc4 = _keyStr.indexOf(input.charAt(i++));
						chr1 = (enc1 << 2) | (enc2 >> 4);
						chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
						chr3 = ((enc3 & 3) << 6) | enc4;
						output = output + String.fromCharCode(chr1);
						if (enc3 != 64) {
							output = output + String.fromCharCode(chr2);
						}
						if (enc4 != 64) {
							output = output + String.fromCharCode(chr3);
						}
					}
					output = _utf8_decode(output);
					return output;
				}
	
				// private method for UTF-8 encoding
				_utf8_encode = function (string) {
					string = string.replace(/\r\n/g,"\n");
					var utftext = "";
					for (var n = 0; n < string.length; n++) {
						var c = string.charCodeAt(n);
						if (c < 128) {
							utftext += String.fromCharCode(c);
						} else if((c > 127) && (c < 2048)) {
							utftext += String.fromCharCode((c >> 6) | 192);
							utftext += String.fromCharCode((c & 63) | 128);
						} else {
							utftext += String.fromCharCode((c >> 12) | 224);
							utftext += String.fromCharCode(((c >> 6) & 63) | 128);
							utftext += String.fromCharCode((c & 63) | 128);
						}
	
					}
					return utftext;
				}
	
				// private method for UTF-8 decoding
				_utf8_decode = function (utftext) {
					var string = "";
					var i = 0;
					var c = c1 = c2 = 0;
					while ( i < utftext.length ) {
						c = utftext.charCodeAt(i);
						if (c < 128) {
							string += String.fromCharCode(c);
							i++;
						} else if((c > 191) && (c < 224)) {
							c2 = utftext.charCodeAt(i+1);
							string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
							i += 2;
						} else {
							c2 = utftext.charCodeAt(i+1);
							c3 = utftext.charCodeAt(i+2);
							string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
							i += 3;
						}
					}
					return string;
				}
			}
	
			var code = $("#code").val();
	
			var base = new Base64();
			var result2 = base.decode(code);//调用以上方法解密
	
			wx.config({
				debug: false,
				appId: "wx9953ad5ae1108b51",
				timestamp: '<?php echo $this->_tpl_vars['timestamp']; ?>
',
				nonceStr: '<?php echo $this->_tpl_vars['nonceStr']; ?>
',
				signature: '<?php echo $this->_tpl_vars['signature']; ?>
',
				jsApiList: [
					'chooseImage',
					'previewImage',
					'uploadImage',
	
					'getNetworkType',//网络状态接口
					'checkJsApi',//使用微信内置地图查看地理位置接口
					'openLocation',
					'getLocation'
				]
			});
			var list = "<?php echo $this->_tpl_vars['res']['str_content']; ?>
".split(',');
			var index = {
				init: function() {
					var me = this;
					me.render();
					me.bind();
				},
				datas: {
					localId: [],
					serverId: [],
					imgsrc: <?php if ($this->_tpl_vars['res']['str_content']): ?>list <?php else: ?>[]<?php endif; ?>,
					host: window.location.host
				},
				render: function() {
					var me = this;
					me.openLocation = $('#openLocation');//定位
				},
				bind: function() {
					var me = this;
					me.openLocation.on('click', $.proxy(me['_openLocation'], this));//定位
				},
				_openLocation: function(e) {
					var me = this;
					var result = result2;
					//先检查网络状态
					wx.getNetworkType({
						success: function(res) {
							//alert("当前网络状态："+res.networkType);
							wx.getLocation({
								type: 'wgs84',
								success: function (res) {
									var latitude = res.latitude;// 纬度，浮点数，范围为90 ~ -90
									//lat = res.latitude;
									var longitude = res.longitude;// 经度，浮点数，范围为180 ~ -180。
									var x = res.longitude;
									var y = res.latitude;
									//alert(code);
	
									//console.log("location is lng=" + x + "  lat=" + y);
									//changCoordinate(x, y);
									//alert("location1 is lng=" + lng + "  lat=" + lat);
	
	
									var url = "http://api.map.baidu.com/geoconv/v1/?coords=" + x + "," + y + "&from=1&to=5&ak="+ result;
									$.get(url, function(data) {
										if(data.status === 0) {
											window.lng = data.result[0].x;
											window.lat = data.result[0].y;
											//console.log("location is lng=" + lng + "  lat=" + lat);
	
											$.post("/index.php?m=api&c=Location&v=get_location_info", {
												'latitude': lat,
												'longitude': lng,
												'code': code,
											}, function(data) {
												$("#address").val("");
												$("#Paddress").text("");
												if (data.code==1) {
													setInterval(function(){
														$("#address").val(data.tpis);
														$("#Paddress").text(data.tpis);
													},200);
												} else{
													layer.msg(data.tips);
												}
											}, "JSON");
										}
									}, 'jsonp');
	
									var speed = res.speed; // 速度，以米/每秒计
									var accuracy = res.accuracy; // 位置精度
								},
								cancel: function (res) {
									alert('用户拒绝授权获取地理位置');
								}
							});
						},
						fail: function(res) {
							alert(JSON.stringify(res));
						}
					});
				}
			}
			index.init();
		});
	</script>
	
	<script src="https://cdn.bootcss.com/js-polyfills/0.1.42/polyfill.min.js"></script>
	<!--exif获取照片参数插件-->
	<script src="/resource/m/demo/libs/exif.min.js"></script>
	<!--debug-->
	<script src="/resource/m/demo/libs/zx-debug.min.js"></script>
	<!--编辑器-->
	<script src="/resource/m/demo/js/zx-editor.min.js"></script>
	<script type="text/javascript">
		// 实例化 ZxEditor
		var zxEditor = new ZxEditor('#editorContainer', {
			// 编辑器固定
			fixed: false,
			// 120秒自动保存一次编辑内容
			autoSave: 20,
			imageMaxSize:5,
			//top:44
		});
		
		//防止上面的方法每次初始话富文本 自动跳转到页面的某个位置
		window.onload=function(){
			$("html, body").animate({ scrollTop: "-100px" }, {duration: 50,easing: "swing"});
		}
		
		// 初始化本地存储的数据
		function initLoaclData () {
			var data = zxEditor.storage.get('article')
			if (data) {
				if (data.cover) {
					zxEditor.addClass('has-pic', $('.cover'));
				}
				zxEditor.setContent(data.content);
			}else{
				zxEditor.setContent('<?php echo $this->_tpl_vars['res']['content']; ?>
');
			}
		}
		initLoaclData();
	
		//获取文章数据
		function getArticleData () {
			var data = {
				// 获取正文内容
				content: zxEditor.getContent()
			}
			return ((!data.content || data.content === '<p><br></p>'))
					? null
					: data;
		}
	
		//数据处理，并提交数据处理
		var url;
		function uploadBase64Images (base64Images, callback) {
			var len = base64Images.length;
			var count = 0;
			if (len === 0) {
				callback();
				return
			}
			for (var i = 0; i < len; i++) {
				_uploadHandler(base64Images[i]);
			}
	
			function _uploadHandler (data) {
				url="";
				$.ajax({
					type:"post",
					url:"/index.php?m=api&c=upload&v=base64_upload",
					async:true,
					data:{base64:data.base64},
					dataType:"json",
					success:function(res){
						if(res.status == 1){
							url=res.url;
							zxEditor.setImageSrc(data.id, url)
							// 计算图片是否上传完成
							_handleCount();
						}
					},error:function(res){
						console.log(res.tip);
					}
				});
			}
	
			function _handleCount () {
				count++
				if (count === len) {
					callback();
				}
			}
		}
		// 模拟文件上传--暂时没用处了
		function upload (blob, callback) {
			setTimeout(function () {
				callback(url);
			}, 500);
		}
	
		//编辑器外部操作
		var active = {
			content: function() {
				var content = getArticleData() || {};
				add(content);
			},
			text: function() {
				var content = getArticleData() || {};
				draft(content); //获取编辑器纯文本内容
			}
		};
		$('.site-demo-layedit').on('click', function() {
			var type = $(this).data('type');
			active[type] ? active[type].call(this) : '';
		});
	
	
		function add (con) {
			var title = $('#title').val();
			var describe = $('#describe').val();
			var did = $('#did').val();
			var oldImgUrl = parseInt($(".note_bg").attr("data-default")); //判断封面是否有上传，1 为没有上传
			var imgUrl = $('.note_bg').attr('src');
			var tag = $('#tag').val();//标签
			address = $('#address').val();//定位
	
			if(!title) {
				layer.msg('请输入游记的标题');
				return false;
			}
			if(!describe) {
				layer.msg('请输入游记的摘要/封面描述');
				return false;
			}
	
			if(oldImgUrl == 0 ) {
				layer.msg('请上传封面图片');
				return false;
			}
	
			var result=tag.split("/");
			if(result.length>4){
				$(".tagTips").removeClass("dis_none");
				return false;
			}
	
			if (!zxEditor.getContent() || zxEditor.getContent() === '<p><br></p>') {
				zxEditor.dialog.alert('请添加文章内容');
				return false;
			}
	
			if(!$("input[type='checkbox']").is(':checked')) {
				layer.msg('请选择服务协议');
				return false;
			}
	
			// 处理正文中的base64图片
			// 获取正文中的base64数据数组
			var base64Images = zxEditor.getBase64Images();
			var data = getArticleData() || {};
			// 上传base64图片数据
			uploadBase64Images(base64Images, function () {
				// 正文中有base64数据，上传替换成功后再重新获取正文内容
				if (base64Images.length) {
					data.content = zxEditor.getContent();
				}
	
				$.post("/index.php?m=api&c=TravelNote&v=save_travel_note", {
					'did':did,
					'title': title,
					'imgUrl': imgUrl,
					'tag':tag,//标签
					'content': data.content,
					'desc': describe,
					'address':address
				}, function(data) {
					if(data.status == 1) {
						layer.msg('发布成功！');
						//清除缓存
						//zxEditor.removeSave(data.content);
						//localStorage.clear();
						zxEditor.storage.remove('content', {content: data.content});
						window.location.href = "/index.php?m=wap&c=user&v=travel_note";
					}
				}, "JSON");
			});
		}
	
		//保存草稿
		function draft(con) {
			var title = $('#title').val();
			var describe = $('#describe').val();
			var oldImgUrl = parseInt($(".note_bg").attr("data-default")); //判断封面是否有上传，1 为没有上传，
			var imgUrl = $('.note_bg').attr('src');
			var list = imgUrl + '||' + con;
			var tag = $('#tag').val();//标签
			address = $('#address').val();//定位
			if(!title && !describe && oldImgUrl == 0 && !con) {
				layer.msg('不能全为空');
				return false;
			}
	
			// 处理正文中的base64图片
			// 获取正文中的base64数据数组
			var base64Images = zxEditor.getBase64Images();
			var data = getArticleData() || {};
			// 上传base64图片数据
			uploadBase64Images(base64Images, function () {
				// 正文中有base64数据，上传替换成功后再重新获取正文内容
				if (base64Images.length) {
					data.content = zxEditor.getContent();
				}
	
				list=imgUrl + '||' +encodeURI(data.content);
				$.post("/index.php?m=api&c=index&v=adddraft", {
					'title': title,
					'describe': describe,
					'tag':tag,
					'list': list,
					'type': 2,
					'address':address
				}, function(data) {
					if(data.status == 1) {
						layer.msg('保存成功！');
						//清除缓存
						//zxEditor.removeSave(data.content);
						//localStorage.clear();
						zxEditor.storage.remove('content', {content: data.content});
						window.location.href = "/index.php?m=wap&c=user&v=draft";
					}
				}, "JSON");
			});
		}
	</script>
</body>
</html>