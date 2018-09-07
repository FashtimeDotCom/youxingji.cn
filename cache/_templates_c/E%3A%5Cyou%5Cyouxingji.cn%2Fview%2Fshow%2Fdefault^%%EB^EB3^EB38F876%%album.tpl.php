<?php /* vpcvcms compiled created on 2018-09-05 17:46:31
         compiled from wap/user/album.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的相册</title>
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
        <h3>我的相册</h3>
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
        <div class="row-TV">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul>
                        <li><a href="/index.php?m=wap&c=user&v=travel">我的游记</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=tv">我的旅拍TV</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
                    </ul>
                </div>
            </div>
            <ul class="ul-txtlist-yz">
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtravel">
    					<i style="background-image: url(/resource/m/images/s-i1.png);"></i>
    					<div class="txt">发布游记</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtv">
    					<i style="background-image: url(/resource/m/images/s-i2.png);"></i>
    					<div class="txt">发布旅拍TV</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=follow">
    					<i style="background-image: url(/resource/m/images/s-i3.png);"></i>
    					<div class="txt">我的关注</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=fans">
    					<i style="background-image: url(/resource/m/images/s-i4.png);"></i>
    					<div class="txt">我的粉丝</div>
    				</a>
                </li>
            </ul>
            <?php if ($this->_tpl_vars['list']): ?>
            <div class="m-mytv-yz">
            	<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <div class="item">
                    <div class="wp">
                        <div class="date"><?php echo $this->_tpl_vars['vo']['days']; ?>
</div>
                        <ul class="ul-pic1-yz ul-pic1-yz3">
                        	<?php $_from = $this->_tpl_vars['vo']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                            <li>
                                <a href="<?php echo $this->_tpl_vars['v']; ?>
" class="pic fancybox-effects-a">
                                    <img src="<?php echo $this->_tpl_vars['v']; ?>
" alt="">
                                </a>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['multipage']): ?>
            <div class="pages" style="padding-top: 20px;padding-bottom: 20px;">
                <ul>
                    <?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
                    <li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });
        });
    </script>
</body>

</html>