<?php /* vpcvcms compiled created on 2019-01-09 15:51:19
         compiled from index/login.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>登录_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
    	.bottom{vertical-align:top;margin-top:24px}
		.bottom a{display:inline-block;vertical-align:middle;width:30px;height:30px;background-repeat:no-repeat;background-position:center center}
		.bottom a:hover{opacity:.8;filter:alpha(Opacity=80);-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=80)'}
		.bottom .register{display: inline-block;width: auto;float: right;font-size: 14px;color: #d71618;}
    </style>
</head>
<body onkeydown="on_return();">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class="m-login-lb" style="background-image: url(/resource/images/bg-lb1.jpg);">
            <div class="m-login-con">
                <input type="hidden" id="from_url" name="from_url" value="<?php echo $this->_tpl_vars['from_url']; ?>
">
                <h4 class="tit">用户名密码登录</h4>
                <div class="item"><input type="text" class="inp" id="phone" placeholder="您的手机号"></div>
                <div class="item"><input type="password" class="inp" id="password" placeholder="您的密码"></div>
                <p class="y-set"></p>
                <p class="notice">忘记密码？<a href="/index.php?m=index&c=index&v=forget">点击找回</a></p>
                <input type="submit" class="sub" id="btnLogin" onClick="check()" value="登 录">

	            <div class="bottom">
	                <a href="/index.php?m=index&c=index&v=weibologin" style="background-image: url(/resource/images/icon2-qm.png);"></a>
	                <a href="/index.php?m=index&c=index&v=qqlogin" style="background-image: url(/resource/images/icon3-qm.png);"></a>
	                <a href="/index.php?m=index&c=index&v=weixinlogin" style="background-image: url(/resource/images/icon4-qm.png);"></a>
	                <a class="register" href="/index.php?m=index&c=index&v=reg">没有账号？现在注册</a>
	            </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="fd-bot">
            <div class="wp">
                <div class="fd-logo"><a href=""><img src="/resource/images/fd-logo.png" alt=""></a></div>
                <div class="addr">
                    <p>地址：广州市越秀区东风东路754号侨房大厦7楼702</p>
                    <p>广州游行迹新媒体科技有限公司 粤ICP备16091699号-1</p>
                    <p><em>*</em>本网站部分图片来自网络，若作者看到，请尽快与游行迹联系</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 返回顶部 -->
    <div class="m-float-qm">
        <a href="javascript:;" class="tel">
	        <img src="/resource/images/icon24-qm.png" alt="">
	        <div class="boximg"><img src="/resource/images/tel.png" alt=""></div>
	    </a>
        <a href="javascript:;" class="ma">
	        <img src="/resource/images/icon25-qm.png" alt="">
	        <div class="boximg"><img src="/resource/images/pic1-qm.jpg" alt=""></div>
	    </a>
        <a href="javascript:;" class="return g-top"><img src="/resource/images/icon26-qm.png" alt=""></a>
    </div>
    <!-- 返回顶部 end-->
    <script type="text/javascript">
        function checkMobile(tel) {
            var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
            if (reg.test(tel)) {
                return true;
            }else{
                return false;
            };
        }
        
        function check() {
            var phone = $('#phone').val();
            var password = $('#password').val();
            var from_url=$("#from_url").val();
            if(!checkMobile(phone)){
                $('.y-set').text('请输入正确的手机号').show();
                return false;
            }
            if(!password){
                $('.y-set').text('请输入账户密码').show();
                return false;
            }
            $('.y-set').text('').hide();
            $.post("/index.php?m=api&c=index&v=login", {
                'phone':phone,
                'password':password,
                'from_url':from_url
            }, function(data){
                $('.y-set').text(data.tips).show();
                if(data.status == 1){
                    window.location.href = "/index.php?m=index&c=user&v=home";
                }else if( data.status == 2 ){ //带来源参数登录，跳转到目标路径
                    window.location.href = from_url;
                }
            },"JSON");
        }
        
        //敲回车 跳转页面
		function on_return(){
			if(window.event.keyCode == 13){
				if(document.all('btnLogin') != null) {
					document.all('btnLogin').click();
				}
			}
		}
    </script>
</body>
</html>