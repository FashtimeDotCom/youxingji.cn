<?php /* vpcvcms compiled created on 2018-08-06 13:45:14
         compiled from wap/login.tpl */ ?>
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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="mian">
        <div class="m-login" style="background-image: url(/resource/m/images/bg-login.jpg);">
            <div class="box"> 
                <div class="con">
                    <div class="logo">
                        <img src="/resource/m/images/logo.png" alt="" />
                    </div>
                    <h3 class="tit">登录</h3>
                    <input type="number" placeholder="您的手机号" id="phone" class="inp" />
                    <input type="password" placeholder="您的密码" id="password" class="inp" />
                    <div class="forget">忘记密码？<a href="/index.php?m=wap&c=index&v=forget">点击找回</a></div>
                    <input type="submit" value="登录" id="btnLogin" class="btn btn1" />
                    <a href="/index.php?m=wap&c=index&v=reg"><input type="submit" value="快速注册" class="btn btn2" /></a>
                    <div class="choose">
                        <p class="p1">你还可以选择第三方直接登录</p>
                        <a href="/index.php?m=wap&c=index&v=weibologin" class="link1" style="background-image: url(/resource/m/images/sina.png);"></a>
                        <a href="/index.php?m=wap&c=index&v=qqlogin" class="link1" style="background-image: url(/resource/m/images/qq.png);"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('#btnLogin').click(function(){
            var phone = $('#phone').val();
            var password = $('#password').val();
            if(!checkMobile(phone)){
                layer.msg('请输入正确的手机号');
                return false;
            }
            if(!password){
                layer.msg('请输入账户密码');
                return false;
            }
            $('.y-set').text('').hide();
            $.post("/index.php?m=api&c=index&v=login", {
                'phone':phone,
                'password':password
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    window.location.href = "/index.php?m=wap&c=user&v=index";
                }
            },"JSON");
        });
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