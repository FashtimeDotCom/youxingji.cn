<?php /* vpcvcms compiled created on 2018-09-12 16:07:36
         compiled from user/visitor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'user/visitor.tpl', 59, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-关注</title>
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
            <div class="m-con-lb2">
                <div class="col-l">
                    <ul class="ul-snav">
                        <li>
                            <a href="/index.php?m=index&c=user&v=follow" class="items">
        						<i class="ico1"></i>
        						<span>我的关注</span>
        					</a>
                        </li>
                        <li>
                            <a href="/index.php?m=index&c=user&v=fans" class="items">
        						<i class="ico2"></i>
        						<span>我的粉丝</span>
        					</a>
                        </li>
                        <li class="on">
                            <a href="/index.php?m=index&c=user&v=visitor" class="items">
                                <i class="ico3"></i>
                                <span>我的访客</span>
                            </a>
                        </li>
                      	<li>
                            <a href="/index.php?m=index&c=user&v=findfriends" class="items">
                                <i class="ico4"></i>
                                <span>查找好友</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-atten-lb">
                        <div class="tit">
                            <div class="so">
                                <input type="submit" class="sub" id="btnSo">
                                <input type="text" class="inp" id="keys" placeholder="查找朋友">
                            </div>
                            <h4>我的访客 <em><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</em></h4>
                        </div>
                    </div>
                    <ul class="ul-list-lb2">
                        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <li>
                            <div class="items">
                                <div class="img">
                                    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['vo']['avatar']; ?>
" alt=""></a>
                                </div>
                                <div class="txt">
                                    <h4><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank"><?php echo $this->_tpl_vars['vo']['username']; ?>
</a></h4>
                                    <div class="con">
                                        <a href="/index.php?m=index&c=muser&v=follow&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank">
                                            <em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</em>
                                            关注
                                        </a>
                                        <a href="/index.php?m=index&c=muser&v=fans&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank">
                                            <em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</em>
                                            粉丝
                                        </a>
                                        <a href="/index.php?m=index&c=muser&v=visitor&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank">
                                            <em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</em>
                                            访客
                                        </a>
                                    </div>
                                    <div class="btn">
                                        <a href="javascript:;" class="on" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollow') : smarty_modifier_helper($_tmp, 'isfollow')); ?>
</a>
                                        <a href="javascript:;" class="sq_sx" onclick="msg(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)">发私信</a>
                                    </div>
                                    <div class="pop-privateLetter" id="msg_<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
                                        <span class="p-close btn_eject_close _j_close">×</span>
                                        <p>给 <span><?php echo $this->_tpl_vars['vo']['username']; ?>
</span> 发送消息</p>
                                        <textarea class="_j_msg_area" id="msg<?php echo $this->_tpl_vars['vo']['uid']; ?>
"></textarea>
                                        <div><a class="btn _j_send_button" role="button" onclick="send(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)">发送</a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <!-- 页码 -->
                    <?php if ($this->_tpl_vars['multipage']): ?>
                    <div class="pages">
                        <ul>
                            <?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
                                <li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
                            <?php endforeach; endif; unset($_from); ?>
                            <li class="pages-form">
                                到<input class="inp" type="text" id="pages">页
                                <input class="btn" type="button" id="pageqr" value="确定">
                            </li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <!-- 页码 end-->
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
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=user&v=visitor&keys=<?php echo $this->_tpl_vars['key']; ?>
&page=" + page;
            }
        })
        function follows(bid, obj)
        {
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    $(obj).html('已关注');
                }else if(data.status == 2){
                    $(obj).html('<span>关注</span>');
                }
            },"JSON");
        }
        $('#btnSo').click(function(){
            var keys = $('#keys').val();
            if(!keys){
                layer.msg('请输入关键字');
                return false;
            }
            window.location.href="/index.php?m=index&c=user&v=visitor&keys=" + keys;
        })
        function msg(uid, obj)
        {
            $('#msg_'+uid).show();
        }
        $('.btn_eject_close').click(function(){
            $(this).parent().hide();
        })
        function send(uid, obj)
        {
            var content = $('#msg'+uid).val();
            if(!content){
                layer.msg('请输入私信内容');
                return false;
            }
            $.post("/index.php?m=api&c=index&v=sendmsg", {
                'to_id':uid,
                'content':content
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $('#msg'+uid).val('');
                    $(obj).parent().parent().hide();
                }
            },"JSON");
        }
    </script>
</body>

</html>