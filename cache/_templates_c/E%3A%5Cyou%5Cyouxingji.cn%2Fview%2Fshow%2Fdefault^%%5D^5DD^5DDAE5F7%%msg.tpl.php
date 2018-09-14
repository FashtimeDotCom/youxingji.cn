<?php /* vpcvcms compiled created on 2018-09-13 20:01:09
         compiled from user/msg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'user/msg.tpl', 28, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-私信</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
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
        <div class="wp">
            <div class="mian dialogue">
                <div class="th">私信消息</div>
                <div class="dia_list _j_sms_list">
                    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                    <div class="item clearfix" id="msg<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-uid="<?php echo $this->_tpl_vars['vo']['toid']; ?>
">
                        <div class="author">
                            <a href=""><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['toid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['toid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
" width="48" height="48"></a>
                        </div>
                        <div class="con _j_to_list" mid="<?php echo $this->_tpl_vars['vo']['id']; ?>
">
                            <div class="title clearfix">
                                <span>与 <a href="" class="name"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['toid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</a>的对话</span>
                                <span class="time"><?php echo $this->_tpl_vars['vo']['lastaddtime']; ?>
</span>
                            </div>
                            <p><?php echo $this->_tpl_vars['vo']['lastcontent']; ?>
</p>
                        </div>
                        <div class="tool_right">
                            <span class="delete _j_delete" mid="<?php echo $this->_tpl_vars['vo']['id']; ?>
"></span>
                            <?php if ($this->_tpl_vars['vo']['weidunum'] > 0): ?>
                            <span class="weidu _j_weidu">!</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('._j_delete').click(function(){
            var mid = $(this).attr('mid');
            $.post("/index.php?m=api&c=index&v=deletemsg", {
                'mid':mid,
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $('#msg'+mid).remove();
                }
            },"JSON");
        })
        $('._j_to_list').click(function(){
            var mid = $(this).attr('mid');
            window.location.href = '/index.php?m=index&c=user&v=msgdetail&mid=' + mid;
        })
    </script>
</body>

</html>