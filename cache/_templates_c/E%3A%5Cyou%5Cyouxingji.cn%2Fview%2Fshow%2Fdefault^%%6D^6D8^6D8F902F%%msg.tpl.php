<?php /* vpcvcms compiled created on 2018-09-20 10:16:38
         compiled from wap/user/msg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/user/msg.tpl', 31, false),)), $this); ?>
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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.notNews{text-align: center;color: #ccc;line-height: 24px;margin: 12px auto;}
    	.default_bg{display: block;width: 68%;margin: 10% auto 0;}
    </style>
</head>
<body>
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>私信</h3>
    </div>
    <div class="mian" style="margin-top: 0px;">
    	<?php if ($this->_tpl_vars['list']): ?>
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
                  		<p><?php echo $this->_tpl_vars['vo']['lastcontent']; ?>
</p>
                	</div>
                	<p><?php echo $this->_tpl_vars['vo']['lastaddtime']; ?>
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
        <?php else: ?>
        <style type="text/css">
        	.footer{position: absolute;left: 0;bottom: 0;width: 100%;}
        </style>
        <div class="dia_list _j_sms_list">
        	<img class="default_bg" src="/resource/m/images/user/defaul_travel_bg.png"/>
        	<p class="notNews">暂时还没有消息哦~！<br />赶紧找小伙伴聊起来吧！</p>
        </div>
        <?php endif; ?>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
  	<script type="text/javascript">
        $('._j_delete').click(function(){
            var mid = $(this).attr('mid');
          	layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=index&v=deletemsg", {
                        'mid':mid,
                    }, function(data){
                        layer.msg(data.tips);
                        if(data.status == 1){
                            $('#msg'+mid).remove();
                            $("._j_sms_list").html('<p class="notNews">暂时还没有消息哦~！<br />赶紧找小伙伴聊起来吧！</p>');
                        }
                    },"JSON");
                    layer.close(index);
                }
            });
        });
        $('._j_to_list').click(function(){
            var mid = $(this).attr('mid');
            window.location.href = '/index.php?m=wap&c=user&v=msgdetail&mid=' + mid;
        });
    </script>
</body>

</html>