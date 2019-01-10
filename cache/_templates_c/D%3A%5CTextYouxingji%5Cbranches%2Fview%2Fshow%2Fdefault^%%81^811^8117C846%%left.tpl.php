<?php /* vpcvcms compiled created on 2019-01-02 18:52:42
         compiled from user/left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'user/left.tpl', 26, false),)), $this); ?>
<style type="text/css">
	.labelList{margin: 0 20px 18px;text-align: center;}
	.labelList .label{display: inline-block;font-size: 13px;color: #333;padding: 2px 8px;
					  border: 1px #ee4d4d solid;border-radius: 5px;}
	.labelList .label:first-child{margin-right: 10px;}
</style>
<div class="col-l">
    <div class="m-myinfo-sz">
        <div class="figure borderRadius50 myimg" href="" style="background-image: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
);"></div>
        <div class="name"><?php echo $this->_tpl_vars['user']['username']; ?>
</div>
        <div class="labelList">
            <?php if ($this->_tpl_vars['user']['tag']): ?>
            	<?php $_from = $this->_tpl_vars['user']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            		<?php if ($this->_tpl_vars['key'] <= 1): ?>
            <span class="label"><?php echo $this->_tpl_vars['item']; ?>
</span>
            		<?php endif; ?>
            	<?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </div>
        <div class="info1">
            <span class="s1">等级：<b><?php echo $this->_tpl_vars['user']['lvname']; ?>
</b></span><i></i>
            <span class="s2">现居：<?php echo $this->_tpl_vars['user']['city']; ?>
</span>
        </div>
        <div class="info2 whiteSpace" style="text-indent: 24px;">“<?php echo $this->_tpl_vars['user']['autograph']; ?>
”</div>
        <ul class="ul-txt-sz">
            <li><a href="/index.php?m=index&c=user&v=follow"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</span>关注</a></li>
            <li class="bd"><a href="/index.php?m=index&c=user&v=fans"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</a></li>
            <li><a href="/index.php?m=index&c=user&v=visitor"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</span>访客</a></li>
        </ul>
        <div class="m-guanzhu-sz">
            <div class="tit">我的关注</div>
            <div class="pic-sz m-people-sz">
                <?php $_from = $this->_tpl_vars['myfollow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <ul class="item">
                    <?php $_from = $this->_tpl_vars['vo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                    <li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
">
                            <div class="figure img" style="background-image: url(<?php echo $this->_tpl_vars['v']['avatar']; ?>
);"></div>
                            <span class="txt"><?php echo $this->_tpl_vars['v']['username']; ?>
</span>
                        </a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
        <div class="m-guanzhu-sz s2">
            <div class="tit">推荐达人</div>
            <ul class="m-people-sz">
                <?php $_from = $this->_tpl_vars['tjstar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
">
                		<div class="figure img" style="background-image: url(<?php echo $this->_tpl_vars['vo']['avatar']; ?>
);"></div>
                        <span class="txt"><?php echo $this->_tpl_vars['vo']['username']; ?>
</span>
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script type="text/javascript">
	//我的关注
	$('.pic-sz').slick({ //自定导航条
		slidesToShow: 4, //个数
		slidesToScroll: 1,
		arrows: true,
		prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
		nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
		dots: false
	});
</script>