<?php /* vpcvcms compiled created on 2018-10-11 14:02:45
         compiled from wap/ryt.tpl */ ?>
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
        <h3>达人游记</h3>
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
        <?php $_from = C::T('ad')->getList(array('tagname' => 'waprytslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban">
            <a href="javascript:;">
                <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" />
            </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="m-read">
            <div class="wp">
                <span class="tit"><em><?php echo $this->_tpl_vars['y']; ?>
</em>年</span>
                <div class="con">
                	<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                		<?php if ($this->_tpl_vars['month'] >= $this->_tpl_vars['k']): ?>
	                    <div class="item">
	                        <i></i>
	                        <div class="box">
	                            <h3><em><?php echo $this->_tpl_vars['k']; ?>
</em>月</h3>
	                            <ul class="ul-imgtxt3">
	                                <?php $_from = $this->_tpl_vars['vo']['time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
	                                <?php if ($this->_tpl_vars['v']['status'] == 1): ?>
	                                <li>
	                                    <div class="pic">
	                                        <a href="/index.php?m=wap&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">
			                                    <img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
			                                    <div class="txt">
			                                        <h3><?php echo $this->_tpl_vars['v']['days']; ?>
</h3>
			                                    </div>
			                                </a>
	                                    </div>
	                                </li>
	                                <?php endif; ?>
	                                <?php endforeach; endif; unset($_from); ?>
	                            </ul>
	                        </div>
	                    </div>
	                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
</body>

</html>