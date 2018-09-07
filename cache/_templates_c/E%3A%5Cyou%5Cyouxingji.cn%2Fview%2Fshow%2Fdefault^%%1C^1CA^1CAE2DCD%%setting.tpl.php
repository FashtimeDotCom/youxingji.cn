<?php /* vpcvcms compiled created on 2018-09-03 14:15:59
         compiled from wap/user/setting.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-设置</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head> 

<body class="">
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>我的信息</h3>
    </div>
    <div class="mian">
        <div class="g-top">
            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
            <div class="so">
                <form action="/index.php">
                    <input type="hidden" name="m" value="wap"/>
                    <input type="hidden" name="c" value="index"/>
                    <input type="hidden" name="v" value="search"/>
                    <input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
                    <input type="submit" value="" class="sub" />
                </form>
            </div>
        </div>
        <div class="ban">
            <a href="">
            <img src="<?php echo $this->_tpl_vars['user']['cover']; ?>
" alt="">
        </a>
            <div class="m-user">
                <i style="background: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl>
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布TV</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="m-con-yz2">
            <div class="wp">
                <ul class="ul-snav-yz1 ul-snav-yz2">
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=setting" class="items item3">
    					   <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的信息</span>
    				    </a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=avatar" class="items item4">
        					<span style="background-image: url(/resource/m/images/ico-lb11.png)">我的头像</span>
        				</a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=cover" class="items item5">
        					<span style="background-image: url(/resource/m/images/ico-lb6.png)">我的封面</span>
        				</a>
                    </li>
                </ul>
                <div class="m-tit-yz">
                    <div class="plan">
                        <span>资料完善度</span>
                        <p class="jin"><em><?php echo $this->_tpl_vars['numerical']; ?>
%</em><i style="width: <?php echo $this->_tpl_vars['numerical']; ?>
%"></i></p>
                    </div>
                </div>
                <div class="m-txt-yz">
                    <table>
                        <tr>
                            <td class="td1">
                                <span>称号：</span>
                            </td>
                            <td class="td2">
                                <input type="text" class="inp" id="username" value="<?php echo $this->_tpl_vars['user']['username']; ?>
">
                            </td>
                        </tr>
                        <tr>
                            <td class="td1 td3"><span>性别：</span></td>
                            <td class="td2">
                                <div class="gender" role="radio">
                                    <label<?php if ($this->_tpl_vars['user']['sex'] == 1): ?> class="checked"<?php endif; ?> data-sex="1">
							<input type="radio" name="gender">
							男
						</label>
                                    <label<?php if ($this->_tpl_vars['user']['sex'] == 0): ?> class="checked"<?php endif; ?> data-sex="0">
							<input type="radio" name="gender">
							女
						</label>
                                    <label<?php if ($this->_tpl_vars['user']['sex'] == 2): ?> class="checked"<?php endif; ?> data-sex="2">
							<input type="radio" name="gender">
							保密
						</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td1"><span>居住城市：</span></td>
                            <td class="td2">
                                <input type="text" class="inp" id="city" value="<?php echo $this->_tpl_vars['user']['city']; ?>
">
                            </td>
                        </tr>
                        <tr>
                            <td class="td1"><span>出生日期：</span></td>
                            <td class="td2">
                                <input type="text" class="inp" id="birthday" value="<?php echo $this->_tpl_vars['user']['birthday']; ?>
">
                            </td>
                        </tr>
                        <tr>
                            <td class="td1"><span>个人简介：</span></td>
                            <td class="td2">
                                <textarea class="area" id="autograph"><?php echo $this->_tpl_vars['user']['autograph']; ?>
</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="td1"></td>
                            <td class="td2">
                                <input type="submit" class="sub" id="btnBc" value="保存">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script type="text/javascript">
        $('#btnBc').click(function(){
            var username = $('#username').val();
            var sex = $('.checked').attr('data-sex');
            var city = $('#city').val();
            var birthday = $('#birthday').val();
            var autograph = $('#autograph').val();
            $.post("/index.php?m=api&c=index&v=savesetting", {
                'username':username,
                'sex':sex,
                'city':city,
                'birthday':birthday,
                'autograph':autograph
            }, function(data){
                window.location.href = window.location.href;
            },"JSON");
        })
    </script>
</body>

</html>