<?php /* vpcvcms compiled created on 2018-09-18 22:17:55
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
	<style>
		.myfile{width: 100%;position: relative;overflow: hidden;}
		.myfile .note_bg{display: block;width: 100%;height: 100%; position: relative;z-index: 1;}
		.myfile .buttonTier{position: absolute;top: 0;left: 0;right: 0;bottom: 0;z-index: 2;}
		
		.paddingNum{padding-top: 19%;}
		
		.myfile .buttonTier .lump{width: 100%;}
		.myfile .buttonTier .lump .note_add{display: block;float: left;width: 40px;margin-right: 3px;}
		.myfile .buttonTier .lump span{color: #fff;text-align: left;display: block;width: 100%;}
		.myfile .buttonTier .lump .title{font-size: 14px;margin-bottom: 4px;}
		.myfile .buttonTier .lump .tips{font-size: 9px;width: 110%;
									      transform: scale(0.9);
										  -webkit-transform: scale(0.9);
									      -o-transform: scale(0.9);    /*针对能识别-webkit的opera browser设置*/}
		.lump .layui-upload-button{opacity: 0;height: 0;border: none;background: transparent;display: block;}
		
		input#tag::-webkit-input-placeholder{font-size:8px;}
		input#tag:-moz-placeholder{font-size:8px;}
		input#tag::-moz-placeholder{font-size:8px;}
		input#tag:-ms-input-placeholder{font-size:8px;}

		/*5.5英寸   414*736尺寸的屏幕  如iPhone6 Plus、iPhone6s Plus、iPhone7 Plus、魅族MX5    1920x1080  /3★*/
		@media only screen and (max-width: 414px) {
			.myfile{height: 183.68px;}
			.myfile .buttonTier .lump{padding-left: 20%;}
			.myfile .buttonTier .lump .tips{text-indent: -13px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.myfile{height: 182.55px;}
			.myfile .buttonTier .lump{padding-left: 19%;}
			.myfile .buttonTier .lump .tips{text-indent: -13px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.myfile{height: 182.18px;}
			.myfile .buttonTier .lump{padding-left: 18%;}
			.myfile .buttonTier .lump .tips{text-indent: -13px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.myfile{height: 165.38px;}
			.myfile .buttonTier .lump{padding-left: 15%;}
			.myfile .buttonTier .lump .tips{text-indent: -13px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.myfile{height: 158.29px;}
			.myfile .buttonTier .lump{padding-left: 14%;}
			.myfile .buttonTier .lump .tips{text-indent: -11px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.myfile{height: 139.63px;}
			.myfile .buttonTier .lump{padding-left: 10%;}
			.myfile .buttonTier .lump .tips{text-indent: -10px;}
		}
		
		.num_text {font-size: 12px;color: #868686;line-height: 20px;}
		.num_f {color: #d71618;}
		
		.tagTips{color: red;font-size: 9px;
					      transform: scale(0.9);
						  -webkit-transform: scale(0.9);
					      -o-transform: scale(0.9);    /*针对能识别-webkit的opera browser设置*/}
	</style>

</head>
<body>
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
												<span class="tips">图片建议选择尺寸大于1680px的高清大图，如相机原图</span>
											</div>
			                           </label>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tit">
							<input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['tag']; ?>
" id="tag" placeholder="请输入标签(可选)，每个标签最多四个字，如：旅游知识/美食，用正斜杠分开">
							<p class="tagTips dis_none">标签目前最多为四个哦！</p>
						</div>
						<!--<div class="tit">
							<textarea class="layui-textarea" id="LAY_demo1" placeholder="请发表你的游记"><?php echo $this->_tpl_vars['res']['content']; ?>
</textarea>
						</div>-->
						
					    <script src="/resource/eleditor/jquery.min.js" title="引入jQuery"></script>
					    <script src="/resource/eleditor/eleditor.min.js" title="插件核心"></script>
					    <script src="/resource/eleditor/webuploader.min.js" title="如果需要图片上传"></script>
						<!-- 内容编辑区域 -->
						<div id="article-body"></div>
						
						<script>
						/*实例化一个编辑器*/
						var artEditor = new Eleditor({
											el: '#article-body',
											upload:{
												server: '/upload.php',
												fileSizeLimit: 2
											}
										});
						</script>
						<script type="text/javascript">
							var artEditor12 = new Eleditor({
							    el: {Object}, /*编辑区域dom对象，也可以是jquery对象*/
							    upload: {Object}, /*上传配置参数，详情见《进阶-文件上传部分》*/
							    uploader: {Function}, /*用于替换编辑器自带上传逻辑，upload和uploader参数不能共存！*/
							    toolbars: {Array}, /*自定义按钮，详情见《进阶-扩展编辑器部分》*/
							    placeHolder: {String}, /*编辑器默认为空时文字*/
							})
						</script>
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
			$('.txta1').keyup(
				function() {
					var remain = $(this).val().length;
					if(remain > 255) {
						$('.txta1').val($('.txta1').val().substr(0, 255));
						var result = 0;
					} else {
						var result = limitNum - remain;
					}
					$('#contentwordage').html(result);
				}
			);
			
			//标签  字数控制
			$('#tag').keyup(function() {
				var yourString = $('#tag').val();
				var result=yourString.split("/");
				if(result.length>4){
					$(".tagTips").removeClass("dis_none");
				}else{
					for(var i=0;i<result.length;i++){
						
					}
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
			
			//构建一个默认的编辑器
//			layui.use('layedit', function() {
//				var layedit = layui.layedit,
//					$ = layui.jquery;
//				layedit.set({
//					uploadImage: {
//						url: '/index.php?m=api&c=index&v=lay_uploadpic', //接口url
//						type: 'post' //默认post
//					}
//				});
//				//构建一个默认的编辑器
//				var index = layedit.build('LAY_demo1');
//
//				//编辑器外部操作
//				var active = {
//					content: function() {
//						var content = layedit.getContent(index);
//						add(content);
//					},
//					text: function() {
//						var content = layedit.getContent(index);
//						draft(content); //获取编辑器纯文本内容
//					},
//					selection: function() {
//						alert(layedit.getSelection(index));
//					}
//				};
//
//				$('.site-demo-layedit').on('click', function() {
//					var type = $(this).data('type');
//					active[type] ? active[type].call(this) : '';
//				});
//			});

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
				
				var yourString = $('#tag').val();
				var result=yourString.split("/");
				if(result.length>4){
					$(".tagTips").removeClass("dis_none");
					return false;
				}
				
				if(!con) {
					layer.msg('请输入正文');
					return false;
				}
				
				if(!$("input[type='checkbox']").is(':checked')) {
					layer.msg('请选择服务协议');
					return false;
				}      
				$.post("/index.php?m=api&c=TravelNote&v=save_travel_note", {
					'did':did,
					'title': title,
					'imgUrl': imgUrl,
					'tag':tag,//标签
					'content': con,
					'desc': describe,
					'address':address
				}, function(data) {
					layer.msg(data.tips);
					if(data.status == 1) {
						window.location.href = "/index.php?m=wap&c=user&v=travel_note";
					}
				}, "JSON");
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
				$.post("/index.php?m=api&c=index&v=adddraft", {
					'title': title,
					'describe': describe,
					'tag':tag,
					'list': list,
					'type': 2,
					'address':address
				}, function(data) {
					layer.msg(data.tips);
					if(data.status == 1) {
						layer.msg('保存成功');
						window.location.href = "/index.php?m=wap&c=user&v=draft";
					}
				}, "JSON");
			}


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
	
	
</body>
</html>