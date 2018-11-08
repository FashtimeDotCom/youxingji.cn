<?php /* vpcvcms compiled created on 2018-11-08 16:40:48
         compiled from index/reg.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>注册_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
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
    <style>
        .verificationcode {
            display: none;
            position: fixed;
            transform: translate(-50%, -50%);
            z-index:999;
            top: 50%;
            left: 50%;
            background: #fff;
            width: 292px;
            height: 100px;
        }
        .verificationcode img {
            height: 40px;
            cursor: pointer;
            margin:25px 6px 0px 12px;
            float: left;
        }
        .verificationcode input {
            height: 40px; 
            width: 100px;
            margin:25px 6px 0px 6px;
            float: left;
            border: 1px solid #ccc;
            padding: 6px;
        }
        .verificationcode a {
            height: 40px;
            width: 64px;
            float: left; 
            margin: 25px 6px 0px 6px; 
            line-height: 40px; 
            text-align: center;
            cursor: pointer;
            background: #d71618;
            color: #fff;
            border-radius: 3px;
        }
        .verificationcode p {
            display: block;
            height: 33px;
            line-height: 33px;
            text-align: center;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 900;
            background-color: rgba(0,0,0,.5);
        }
    </style>
</head>

<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="main">
        <div class="m-login-lb" style="background-image: url(/resource/images/bg-lb1.jpg);">
            <div class="m-login-con">
                <h4 class="tit"><a href="/index.php?m=index&c=index&v=login">已经注册？马上登录</a>注册</h4>
                <div class="item">
                    <input type="text" class="inp" id="phone" placeholder="您的手机号">
                </div>
                <div class="item">
                    <input type="text" class="inp inp3" id="code" placeholder="输入验证码">
                    <input type="submit" id="btnSendCode" value="获取验证码" class="y-get">
                </div>
                <div class="item">
                    <input type="text" class="inp" id="username" placeholder="您的姓名">
                </div>
                <div class="item">
                    <input type="password" class="inp" id="pass1" placeholder="账户密码">
                </div>
                <div class="item">
                    <input type="password" class="inp" id="pass2" placeholder="确认密码">
                </div>
                <p class="y-set"></p>
                <input type="submit" class="sub sub2" id="btnRegUser" value="立即注册">
                <p class="xieyi">注册视为同意<a href="/article/yszc">《游行迹用户使用协议》</a></p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="fd-bot">
            <div class="wp">
                <div class="fd-logo"><a href=""><img src="/resource/images/fd-logo.png" alt=""></a></div>
                <div class="addr">
                    <p>地址：广州市越秀区东风东路754号侨房大厦7楼702</p>
                    <p><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_powerby','group' => 'site','default' => ""), $this);?>
 <?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_beian','group' => 'site','default' => ""), $this);?>
</p>
                    <p><em>*</em>本网站部分图片来自网络，若作者看到，请尽快与游行迹联系</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 返回顶部 -->
    <div class="m-float-qm">
        <a href="javascript:;" class="tel">
        <img src="/resource/images/icon24-qm.png" alt="">
        <div class="boximg">
            <img src="/resource/images/tel.png" alt="">
        </div>
    </a>
        <a href="javascript:;" class="ma">
        <img src="/resource/images/icon25-qm.png" alt="">
        <div class="boximg">
            <img src="/resource/images/pic1-qm.jpg" alt="">
        </div>
    </a>
        <a href="javascript:;" class="return g-top"><img src="/resource/images/icon26-qm.png" alt=""></a>
    </div>
    <!-- 返回顶部 end-->
    <div class="verificationcode">
        <img id="gdField" src="" gd="<?php echo $this->_tpl_vars['_pathroot']; ?>
<?php echo $this->_tpl_vars['_gdurl']; ?>
" onclick="reloadgd(this, true)"/> 
        <input type="text" name="txcode" value="">
        <a href="javascript:;" id="verificationlegal">确认</a>
        <p>请输入图形验证码</p>
    </div>
    <script>
        $(function(){
            reloadgd(document.getElementById('gdField'));
        });
        function reloadgd(el,f){
            if(f || !el.gdloaded){
                el.src=el.getAttribute('gd') + '?' + +new Date();
                el.style.display='inline-block';
                el.gdloaded = true;
            }
        }
        var InterValObj; //timer变量，控制时间
        var count = 60; //间隔函数，1秒执行
        var curCount; //当前剩余秒数
        function sendMessage() {
            curCount = count;
            var dealType; //验证方式
            //设置button效果，开始计时
            $("#btnSendCode").attr("disabled", "true");
            $("#btnSendCode").val("重新发送（" + curCount + "s）");
            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        }
        //timer处理函数
        function SetRemainTime() {
            if (curCount == 0) {
                window.clearInterval(InterValObj); //停止计时器
                $("#btnSendCode").removeAttr("disabled"); //启用按钮
                $("#btnSendCode").val("重新发送验证码");   
            } else {
                curCount--;
                $("#btnSendCode").val("重新发送（" + curCount + "s）");
            }
        }
        $(".m-login-con .item .y-get").click(function() {
            var phone = $('#phone').val();
            if(!checkMobile(phone)){
                $('.y-set').text('请输入正确的手机号').show();
                return false;
            }
            $('.y-set').text('').hide();
            $('body').addClass('fixme').append('<div class="overlay"></div>');
            $('.verificationcode').show();
        })
        $('#verificationlegal').click(function(){
            var phone = $('#phone').val();
            var code = $('input[name=txcode]').val()
            if(!checkMobile(phone)){
                alert('请输入正确的手机号');
                return;
            }
            if(!code){
                alert('请输入验证码');
                return;
            }
            $.post("/index.php?m=api&c=index&v=getphonecode", {
                'phone':phone,
                'code':code
            }, function(data){
                reloadgd(document.getElementById('gdField'), true);
                if(data.status == 0){
                    alert(data.tips);
                    return false;
                }else if(data.status == 1){
                    $('.overlay').remove();
                    $('input[name=txcode]').val('');
                    $('.verificationcode').hide();
                    sendMessage();
                }else if(data.status == 2){
                    alert(data.tips);
                    $('.overlay').remove();
                    $('input[name=txcode]').val('');
                    $('.verificationcode').hide();
                }
            },"JSON");
            
        });
        $("#btnRegUser").click(function(){
            var phone = $('#phone').val();
            var code = $('#code').val();
            var username = $('#username').val();
            var pass1 = $('#pass1').val();
            var pass2 = $('#pass2').val();
            if(!checkMobile(phone)){
                $('.y-set').text('请输入正确的手机号').show();
                return false;
            }
            if(!code){
                $('.y-set').text('请输入验证码').show();
                return false;
            }
            if(!username){
                $('.y-set').text('请输入姓名').show();
                return false;
            }
            if(!pass1){
                $('.y-set').text('请输入密码').show();
                return false;
            }
            if(pass1.length < 6){
                $('.y-set').text('密码长度最短6位').show();
                return false;
            }
            if(pass1 != pass2){
                $('.y-set').text('两次密码输入不一致').show();
                return false;
            }
            $('.y-set').text('').hide();
            $.post("/index.php?m=api&c=index&v=reguser", {
                'phone':phone,
                'code':code,
                'username':username,
                'pass1':pass1,
                'pass2':pass2
            }, function(data){
                $('.y-set').text(data.tips).show();
                if(data.status == 1){
                    window.location.href = "/index.php?m=index&c=index&v=login";
                }
            },"JSON");
        })
        function checkMobile(tel) {
            var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
            if (reg.test(tel)) {
                return true;
            }else{
                return false;
            };
        }
    </script>
</body>

</html>