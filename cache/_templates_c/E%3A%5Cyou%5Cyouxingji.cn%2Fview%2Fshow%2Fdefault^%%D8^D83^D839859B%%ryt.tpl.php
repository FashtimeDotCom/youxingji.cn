<?php /* vpcvcms compiled created on 2018-09-05 14:05:14
         compiled from index/ryt.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人游记_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
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
</head>

<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="main">
        <?php $_from = C::T('ad')->getList(array('tagname' => 'rytslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
      	<?php endforeach; endif; unset($_from); ?>
        <div class="cur">
            <div class="wp">
                <a href="">首页</a> &gt; <span>达人游记</span>
            </div>
        </div>
        <div class="m-read-qm">
            <div class="tit">
                <div class="wp">
                    <div class="con">
                        <h3><span><?php echo $this->_tpl_vars['y']; ?>
</span><i></i></h3>
                        <dl>
                            <dd><a href="/index.php?m=index&c=index&v=ryt&y=2018">2018</a></dd>
                        </dl>
                    </div>
                    <span class="data"><?php echo $this->_tpl_vars['y']; ?>
</span>
                </div>
            </div>
            <div class="wp">
                <ul class="ul-txt1-qm TAB_CLICK" id=".tabcon">
                    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                        <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['y']): ?>
                            <?php if ($this->_tpl_vars['month'] >= $this->_tpl_vars['k']): ?>
                                <li class="ls <?php if ($this->_tpl_vars['month'] == $this->_tpl_vars['k']): ?>on<?php endif; ?>"><a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a></li>
                            <?php else: ?>
                                <li class="no"><a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="ls <?php if ($this->_tpl_vars['k'] == 1): ?>on<?php endif; ?>"><a href="javascript:;"><?php echo $this->_tpl_vars['k']; ?>
</a></li>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['y']): ?>
                <div class="tabcon <?php if ($this->_tpl_vars['month'] != $this->_tpl_vars['k']): ?>dn<?php endif; ?>">
                <?php else: ?>
                <div class="tabcon <?php if ($this->_tpl_vars['k'] != 1): ?>dn<?php endif; ?>">
                <?php endif; ?>
                    <div class="top">
                        <div class="wp">
                            <span class="s1">SUN</span>
                            <span class="s2">MON</span>
                            <span class="s3">TUE</span>
                            <span class="s4">WED</span>
                            <span class="s5">THU</span>
                            <span class="s6">FRI</span>
                            <span class="s7">SAT</span>
                        </div>
                    </div>
                    <div class="wp">
                        <ul class="ul-imgtxt3-qm">
                            <?php $_from = $this->_tpl_vars['vo']['table']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                            <li>
                                <div class="pic"></div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php $_from = $this->_tpl_vars['vo']['time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                                <?php if ($this->_tpl_vars['v']['status'] == 0): ?>
                                    <li>
                                        <div class="pic">
                                            <i class="icon1"><?php echo $this->_tpl_vars['v']['days']; ?>
</i>
                                        </div>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <div class="pic">
                                            <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">
                                            <img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
                                            <i><?php echo $this->_tpl_vars['v']['days']; ?>
</i>
                                            <div class="txt">
                                                <span><?php echo $this->_tpl_vars['v']['keyword']; ?>
</span>
                                            </div>
                                        </a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php $_from = $this->_tpl_vars['vo']['other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                            <li>
                                <div class="pic"></div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <div class="h81"></div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script>
        $(".m-read-qm .con h3").click(function() {
            $(this).next("dl").stop().slideToggle("fast");
        })
    </script>
</body>

</html>