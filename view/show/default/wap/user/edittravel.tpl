<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-编辑日志</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/resource/m/css/globle.css" />
	<script src="/resource/m/js/jquery.js"></script>
	<script src="/resource/m/js/lib.js"></script>
	<style type="text/css">
		.num_f{color: red;}
	</style>
</head>
<body>
	<div class="mian">
		<div class="save-issue">
			<div class="wp">
				<a href="/index.php?m=wap&c=user&v=index" class="i-close col-l" style="background-image: url(/resource/m/images/i-close.png)"></a>
				<div class="col-r">
					<a href="javascript:;" id="addtravel" class="i-issue" style="background-image: url(/resource/m/images/i-dh.png)">发布编辑</a>
				</div>
			</div>
		</div>
		<div class="g-top">
			<div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
			<div class="so">
				<form action="/index.php">
					<input type="hidden" name="m" value="wap" />
					<input type="hidden" name="c" value="index" />
					<input type="hidden" name="v" value="search" />
					<input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
					<input type="submit" value="" class="sub sub1" />
				</form>
			</div>
		</div>
		<div class="row-issue">
			<ul class="ul-tab-yz1">
				<li class="on" style="width: 100%;">
					<a href="javascript:;">
						<h4>编辑日志</h4>
						<p>记录您的每一个动人深刻</p>
					</a>
				</li>
			</ul>
			<div class="m-edit-yz">
				<div class="wp">
					<form>
						<div class="tit">
							<input type="text" class="inp" value="{{$res.title}}" id="title" placeholder="请在这里输入标题">
						</div>
						<div class="content-txt" style="overflow: auto;margin-bottom: 0px;">
							<textarea placeholder="请在此处编辑正文内容" class="txta1" id="describe" onkeyup="judgeIsNonNull1(event)">{{$res.describes}}</textarea>
							<p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
						</div>
						<div class="pic-video">
							<div class="file f-pic" id="chooseImage" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i-plus.png)">
        							<em>添加图片</em>
        						</label>
							</div>
						
							<input type="hidden" name="code" value="{{$code}}" id="code">
							<div class="file f-pic" id="openLocation" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i_location.png)">
	    							<em>添加定位</em>
	    						</label>
							</div>
							<input type="hidden" name="Add" value="{{$res.address}}" id="address" title="后台返回来的定位地址">
							<p id="Paddress" class="address">{{$res.address}}</p>
						</div>
						<ul id="previewImage">
							{{if $res.content}}
								{{foreach from=$res.content item=vo}}
							<li><div class="viewThumb "><img src='{{$vo}}' /><i class="delete iz layui-icon">&#xe640;</i></div></li>
								{{/foreach}}
							{{/if}}
						</ul>
						<!--草稿箱的数据，如果有图片，就储存到这里-->
						<input type="hidden" name="" id="imgList" value="{{$res.str_content}}" />
						<input type="hidden" name="did" value="{{$res.id}}" id="did" title="编辑ID">
					</form>
				</div>
			</div>
		</div>
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script type="text/javascript">
		//监控 正文内容输入框 ，包括粘贴板
		function judgeIsNonNull1(event){
			var value=$("#describe").val();
			var x = event.which || event.keyCode;
			if( value.length <= 255 ){
				//console.log("符合255位数以内");
			} else{
				return $("#describe").val(value.substr(0, 255));
			}
			var remain = $("#describe").val().length;
			if(remain > 255){
				$('#describe').val(setString($('#describe').val(),255));
				$('#contentwordage').html(255-remain);
			}else{
				$('#contentwordage').html(255-remain);
			}
		}
		
		//监控 正文内容输入框 ，包括粘贴板
		$("#describe").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});

		//解密base64编码
		function Base64() {
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
			timestamp: '{{$timestamp}}',
			nonceStr: '{{$nonceStr}}',
			signature: '{{$signature}}',
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
		var imgList = $("#imgList").val();
		var list = imgList.split(',');
		if( imgList != "" ){
			var str_content = list;
		}
		else{
			var str_content = [];
		}
		
		var index = {
			init: function() {
				var me = this;
				me.render();
				me.bind();
			},
			datas: {
				localId: [],
				serverId: [],
				imgsrc: str_content,
				host: window.location.host
			},
			render: function() {
				var me = this;
				me.chooseImage = $('#chooseImage');
				me.addtravel = $('#addtravel');
				me.deleter = $('#previewImage li');
				me.openLocation = $('#openLocation');
			},
			bind: function() {
				var me = this;
				me.chooseImage.on('click', $.proxy(me['_chooseImage'], this));
				me.addtravel.on('click', $.proxy(me['_addtravel'], this));
				$("#previewImage").on('click', me.deleter, $.proxy(me['_delete'], this));
				me.openLocation.on('click', $.proxy(me['_openLocation'], this));
			},
			_chooseImage: function(e) {
				var me = this;
				var lengli = $("#previewImage li").length;
				wx.chooseImage({
					count: 9 - lengli, // 默认9
					sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
					sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
					success: function(res) {
						var localIds = res.localIds
						for(k in localIds) {
							me.datas.localId.push(localIds[k]);
						};
						var i = 0,
							length = localIds.length;

						function upload() {
							wx.uploadImage({
								localId: localIds[i],
								success: function(res) {
									i++;
									me.datas.serverId.push(res.serverId);
									if(i < length) {
										upload();
									}
								},
								fail: function(res) {
									alert(JSON.stringify(res));
								}
							});
						}
						upload();
						(function($) {
							var imglist = "";
							$.each(res.localIds, function(i, n) { //这里是显示已选择的图片  
								imglist += '<li><div class="viewThumb "><img src=' + n + '  /><i class="delete iz layui-icon">&#xe640;</i></div></li>';
							});
							$("#previewImage").append(imglist);
							var lengli = $("#previewImage li").length;
							if(lengli >= 9) {
								$('#chooseImage').hide();
							} else {
								$('#chooseImage').show();
							}
						})(jQuery);
					}
				});
			},
			_addtravel: function(e) {
				var me = this;
				var title = $('#title').val();
				did = $('#did').val();
				describe = $('#describe').val();
				address = $('#address').val();
				if(!title) {
					layer.msg('请输入标题');
					return false;
				}
				if(!describe) {
					layer.msg('请输入描述');
					return false;
				}
				if( me.datas.imgsrc[0] !="undefined" ){
					var load = layer.load();
					var data = {
						list: me.datas.serverId
					}
					$.ajax({
						url: "//" + me.datas.host + '/' + 'index.php?m=api&c=upload&v=wechat_upload',
						data: data,
						type: "POST",
						dataType: "json",
						success: function(res) {
							for (i in res.path_arr) {
								me.datas.imgsrc.push(res.path_arr[i]);
							}
							$('#chooseImage').hide();
							layer.close(load);
							$("#previewImage li i").remove();
							$("#previewImage li").unbind('click',me.deleter);
							$("#previewImage").unbind('click',me.deleter);
							$("#previewImage").off('click');
							me.deleter.unbind();

							$.post("/index.php?m=api&c=index&v=edittravel", {
								'title': title,
								'list': JSON.stringify(me.datas.imgsrc),
								'id': did,
								'describe': describe,
								'address':address
							}, function(data) {
								layer.msg(data.tips);
								if(data.status == 1) {
									setInterval(function(){
										window.location.href = '/index.php?m=wap&c=user&v=travel';
									}, 2000);
								}
							}, "JSON");
						}
					});
				}
				else{
					$.post("/index.php?m=api&c=index&v=edittravel", {
						'title': title,
						'list': JSON.stringify(me.datas.imgsrc),
						'id': did,
						'describe': describe,
						'address':address
					}, function(data) {
						layer.msg(data.tips);
						if(data.status == 1) {
							setInterval(function(){
								window.location.href = '/index.php?m=wap&c=user&v=travel';
							}, 2000);
						}
					}, "JSON");
				}
			},
			_delete: function(e) {
				e.stopPropagation();
				var me = this;
				var li = $(e.target).parents('li').index();
				me.datas.serverId.splice(li, 1);
				me.datas.localId.splice(li, 1);
				me.datas.imgsrc.splice(li, 1);
				$(e.target).parents('li').remove();
				var lengli = $("#previewImage li").length;
				if(lengli >= 9) {
					$('#chooseImage').hide();
				} else {
					$('#chooseImage').show();
				}
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
			                    console.log("location is lng=" + x + "  lat=" + y);
			                   	//changCoordinate(x, y);
			                    
			                   
								var url = "http://api.map.baidu.com/geoconv/v1/?coords=" + x + "," + y + "&from=1&to=5&ak="+ result;
			                    $.get(url, function(data) {
			                        if(data.status === 0) {
			                            window.lng = data.result[0].x;
			                            window.lat = data.result[0].y;

					                    $.post("/index.php?m=api&c=Location&v=get_location_info", {
											'latitude': lat,
											'longitude': lng,
											'code': code,
										}, function(data){
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
	</script>
</body>
</html>