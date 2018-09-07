<?php /* vpcvcms compiled created on 2018-07-09 15:55:29
         compiled from user/left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'user/left.tpl', 15, false),)), $this); ?>
<div class="col-l">
    <div class="m-myinfo-sz">
        <a href="" class="myimg"><img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" width="100%" height="100%"></a>
        <div class="name"><?php echo $this->_tpl_vars['user']['username']; ?>
</div>
        <div class="info1">
            <span class="s1">等级：<b><?php echo $this->_tpl_vars['user']['lvname']; ?>
</b></span><i></i>
            <span class="s2">现居：<?php echo $this->_tpl_vars['user']['city']; ?>
</span>
        </div>
        <!-- <div class="btn">
            <a href="" class="guanzhu"><i></i>关注</a>
            <a href="" class="mm">私信</a>
        </div> -->
        <div class="info2"><?php echo $this->_tpl_vars['user']['autograph']; ?>
</div>
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
                    <li>
                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
">
                            <div class="img">
                                <img src="<?php echo $this->_tpl_vars['v']['avatar']; ?>
" alt="">
                            </div>
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
                <li>
                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
">
                        <div class="img">
                            <img src="<?php echo $this->_tpl_vars['vo']['avatar']; ?>
" alt="">
                        </div>
                        <span class="txt"><?php echo $this->_tpl_vars['vo']['username']; ?>
</span>
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
</div>