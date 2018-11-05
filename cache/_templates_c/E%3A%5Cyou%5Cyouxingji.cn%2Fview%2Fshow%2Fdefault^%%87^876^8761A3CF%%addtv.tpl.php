<?php /* vpcvcms compiled created on 2018-10-29 09:59:09
         compiled from wap/user/addtv.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" /> 
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-发布视频</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
        .upic {
            max-width: 300px;
            margin-top: 5px;
            cursor:pointer;
            margin: 0 15px 15px 0;
            position: relative;
        }
        .layui-upload-button {
            display: none;
        }
      	.upic i {
            position: absolute;
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
            -ms-transition: all .3s;
        }
        .num_text {
            font-size: 12px;
            color: #868686;
            line-height: 20px;
        }
        .num_f {
            color: #d71618;
        }
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
                    <a href="javascript:;" id="btnDraft" class="i-save" style="background-image: url(/resource/m/images/i-save.png)">保存</a>
                    <em></em>
                    <a href="javascript:;" id="btnAdd" class="i-issue" style="background-image: url(/resource/m/images/i-dh.png)">发布</a>
                </div>
            </div>
        </div>
        <div class="g-top">
            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
            <div class="so">
                <form action="">
                    <input type="text" placeholder="请输入关键字" class="inp" />
                    <input type="submit" value="" class="sub" />
                </form>
            </div>
        </div>
        <div class="row-issue">
            <ul class="ul-tab-yz1">
                <li><a href="/index.php?m=wap&c=user&v=addtravel">
                        <h4>发表日志</h4>
                        <p>记录您的每一个动人深刻</p>
                    </a>
                </li>
                <li class="on">
                    <a href="/index.php?m=wap&c=user&v=addtv">
                        <h4>发表视频</h4>
                        <p>最温馨旅行小提示</p>
                    </a>
                </li>
            </ul>
            <div class="m-edit-yz">
                <div class="wp">
                    <form>
                        <div class="tit">
                            <input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['title']; ?>
" id="title" placeholder="请在这里输入标题">
                        </div>
                        <div class="content-txt" style="overflow: auto;margin-bottom: 0px;">
                            <textarea placeholder="请在此处编辑正文内容" class="txta1" id="describe" onkeyup="judgeIsNonNull1(event)"><?php echo $this->_tpl_vars['res']['describe']; ?>
</textarea>
                            <p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
                        </div>
                        <div class="tit">
                            <input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['url']; ?>
" id="url" placeholder="请在这里输入优酷视频地址">
                        </div>
                        <div class="pic-video">
                            <div class="file f-pic" style="margin-bottom: 7px;">
                                <label style="background-image: url(/resource/m/images/i-plus.png)">
        							<em>添加图片</em>
        						</label>
                            </div>
							
							<input type="hidden" name="code" value="<?php echo $this->_tpl_vars['code']; ?>
" id="code">
							<div class="file" id="openLocation" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i_location.png)">
	    							<em>添加定位</em>
	    						</label>
							</div>
							<input type="hidden" name="address" value="<?php echo $this->_tpl_vars['res']['address']; ?>
" id="address" title="后台返回来的定位地址">
							<p id="Paddress" class="address"><?php echo $this->_tpl_vars['res']['address']; ?>
</p>
                        </div>
                        <div class="layui-upload">
                            <label>
                                <input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
                            </label>
                            <div class="layui-upload-list" id="piclist">
                                <?php if ($this->_tpl_vars['res']['pic'] != ''): ?>
                                <div class="upic"><img src="<?php echo $this->_tpl_vars['res']['pic']; ?>
" class="layui-upload-img" onclick="deletepic(this)"><i class="iz layui-icon">&#xe640;</i></div>
                                <?php else: ?>
                                <div class="upic"><img src="" class="layui-upload-img"></div style="display: none">
                                <?php endif; ?>
                            </div>
                        </div>
                      	<label>
                          	<input type="checkbox" checked="">我已阅读并同意<a href="/article/hyzn">《服务协议》</a>
                      	</label>
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
		
    	
        $(document).ready(function(){
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
					me.openLocation = $('#openLocation');
				},
				bind: function() {
					var me = this;
					me.openLocation.on('click', $.proxy(me['_openLocation'], this));
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
        
        $('.f-pic').click(function(){
            $('.layui-upload-button').trigger("click");
        })
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
        //发布
        $('#btnAdd').click(function(){
            var title = $('#title').val();
            var describe = $('#describe').val();
            var url = $('#url').val();
            var did = $('#did').val();
            var pic = $('.layui-upload-img').attr('src');
            var address = $('#address').val();
            if(!describe){
                layer.msg('请输入描述');
                return false;
            }
            if(!url){
                layer.msg('请输入视频地址');
                return false;
            }
            if(!pic){
                layer.msg('请上传图片');
                return false;
            }
          	if(!$("input[type='checkbox']").is(':checked')){
                layer.msg('请选择服务协议');
                return false;
            }
            $.post("/index.php?m=api&c=index&v=addtv", {
                'title':title,
                'url':url,
                'pic':pic,
                'did':did,
                'describe':describe,
                'address':address
            }, function(data){
                layer.msg(data.tips);
                if (data.status == 1) {
                    //window.location.href = "/index.php?m=wap&c=user&v=tv";
                }
            },"JSON");
        })
      	function deletepic(obj){
            $(obj).remove();
        }
        //保存草稿
        $('#btnDraft').click(function(){
            var title = $('#title').val();
            var url = $('#url').val();
            var describe = $('#describe').val();
            var pic = $('.layui-upload-img').attr('src');
            var list = pic + '||' + url;
            var address = $('#address').val();
            $.post("/index.php?m=api&c=index&v=adddraft", {
                'title':title,
                'list':list,
                'type':1,
                'describe':describe,
                'address':address
            }, function(data){
                layer.msg(data.tips);
                if (data.status == 1) {
                    window.location.href = "/index.php?m=wap&c=user&v=draft";
                }
            },"JSON");
        })
    </script>
</body>
</html>