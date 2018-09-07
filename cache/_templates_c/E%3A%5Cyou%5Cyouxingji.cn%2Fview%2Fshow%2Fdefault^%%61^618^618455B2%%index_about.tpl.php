<?php /* vpcvcms compiled created on 2018-07-17 11:18:27
         compiled from article/index_about.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->_tpl_vars['nav']['seotitle']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="keywords" content="<?php echo $this->_tpl_vars['nav']['keywords']; ?>
" />
    <meta name="description" content="<?php echo $this->_tpl_vars['nav']['description']; ?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="cur">
            <div class="wp">
                首页 &gt; <span><?php echo $this->_tpl_vars['nav']['name']; ?>
</span>
            </div>
        </div>
        <div class="wp">
            <div class="m-con-lb2 other">
                <div class="col-l">
                    <ul class="ul-snav snav2">
                        <?php $_from = C::T('channel')->getList(array('channel' => 'footer'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <li <?php if ($this->_tpl_vars['vo']['id'] == $this->_tpl_vars['nav']['id']): ?>class="on"<?php endif; ?>>
                            <a href="<?php echo $this->_tpl_vars['vo']['url']; ?>
" class="items">
        						<span><?php echo $this->_tpl_vars['vo']['name']; ?>
</span>
        					</a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-txt-lb2">
                        <h3 class="tit"><span><?php echo $this->_tpl_vars['nav']['name']; ?>
</span></h3>
                        <div class="con">
                          	<?php if ($this->_tpl_vars['nav']['id'] == 12): ?>
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=reg";
                                </script>
                          	<?php endif; ?>
                          	<?php if ($this->_tpl_vars['nav']['id'] == 15): ?>
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=ryt";
                                </script>
                          	<?php endif; ?>
                          	<?php if ($this->_tpl_vars['nav']['id'] == 16): ?>
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=journey";
                                </script>
                          	<?php endif; ?>
                            <?php echo $this->_tpl_vars['nav']['body']; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>