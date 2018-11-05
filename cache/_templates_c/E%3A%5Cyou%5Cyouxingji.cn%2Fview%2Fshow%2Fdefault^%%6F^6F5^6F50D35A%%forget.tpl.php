<?php /* vpcvcms compiled created on 2018-10-16 19:14:34
         compiled from wap/forget.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head> 
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>找回密码_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
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

<body class="">
    <div class="mian">
        <div class="m-login" style="background-image: url(/resource/m/images/bg-login.jpg);">
            <div class="box">
                <div class="logo">
                        <img src="/resource/m/images/logo.png" alt="" />
                    </div>
                <div class="con">
                    <h3 class="tit">找回密码</h3>
                    <input type="number" placeholder="您的手机号" id="phone" class="inp" />
                    <div class="register" id="vcode">
                        <input type="text" placeholder="输入验证码" id="code" class="inp" />
                        <input type="button" class="btn2 js-btn y-get" id="btnSendCode" value="获取验证码" />
                    </div>
                    <input type="password" placeholder="新密码" id="password" class="inp" />
                    <p class="y-set p4"></p>
                    <input type="submit" value="立刻找回" id="btnRegUser" class="btn btn1" />
                </div>
            </div>
        </div>
    </div>
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
        $(".y-get").click(function() {
            var phone = $('#phone').val();
            if(!checkMobile(phone)){
                $('.y-set').text('请输入正确的手机号').show();
                return false;
            }
            $('.y-set').text('').hide();
            $('body').addClass('fixme').append('<div class="overlay" onclick="overlay()"></div>');
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
            $.post("/index.php?m=api&c=index&v=getforgetphonecode", {
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
      	function overlay(){
          	$('.overlay').remove();
        	$('.verificationcode').hide();
        }
        $("#btnRegUser").click(function(){
            var phone = $('#phone').val();
            var code = $('#code').val();
            var password = $('#password').val();
            if(!checkMobile(phone)){
                $('.y-set').text('请输入正确的手机号').show();
                return false;
            }
            if(!code){
                $('.y-set').text('请输入验证码').show();
                return false;
            }
            if(!password){
                $('.y-set').text('请输入密码').show();
                return false;
            }
            if(password.length < 6){
                $('.y-set').text('密码长度最短6位').show();
                return false;
            }
            $('.y-set').text('').hide();
            $.post("/index.php?m=api&c=index&v=forget", {
                'phone':phone,
                'code':code,
                'password':password
            }, function(data){
                $('.y-set').text(data.tips).show();
                if(data.status == 1){
                    window.location.href = "/index.php?m=wap&c=index&v=login";
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