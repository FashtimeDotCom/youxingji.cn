<?php /* vpcvcms compiled created on 2019-01-03 17:24:15
         compiled from muser/left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'muser/left.tpl', 25, false),)), $this); ?>
<style type="text/css">
	.labelList{margin: 0 20px 18px;text-align: center;}
	.labelList .label{display: inline-block;font-size: 13px;color: #333;padding: 2px 8px;
					  border: 1px #ee4d4d solid;border-radius: 5px;}
	.labelList .label:first-child{margin-right: 10px;}
</style>
<div class="col-l">
    <div class="m-myinfo-sz">
    	<div class="figure borderRadius50 myimg" style="background-image: url(<?php echo $this->_tpl_vars['muser']['avatar']; ?>
);"></div>
        <div class="name"><?php echo $this->_tpl_vars['muser']['username']; ?>
</div>
        <div class="labelList">
            <?php if ($this->_tpl_vars['muser']['tag']): ?>
            <?php $_from = $this->_tpl_vars['muser']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
            <span class="s1">等级：<b><?php echo $this->_tpl_vars['muser']['lvname']; ?>
</b></span><i></i>
            <span class="s2">现居：<?php echo $this->_tpl_vars['muser']['city']; ?>
</span>
        </div>
        <div class="btn">
            <a href="javascript:;" class="guanzhu" onclick="follows(<?php echo $this->_tpl_vars['muser']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
            <a href="javascript:;" class="mm" onclick="msg(<?php echo $this->_tpl_vars['muser']['uid']; ?>
,this)">私信</a>
            <div class="pop-privateLetter" id="msg_<?php echo $this->_tpl_vars['muser']['uid']; ?>
" style="margin-left: 153px;">
                <span class="p-close btn_eject_close _j_close">×</span>
                <p>给 <span><?php echo $this->_tpl_vars['muser']['username']; ?>
</span> 发送消息</p>
                <textarea class="_j_msg_area" id="msg<?php echo $this->_tpl_vars['muser']['uid']; ?>
"></textarea>
                <div><a class="btn _j_send_button" role="button" onclick="send(<?php echo $this->_tpl_vars['muser']['uid']; ?>
,this)" style="border: 0px;">发送</a></div>
            </div>
        </div>
        <div class="info2" style="text-indent: 24px;">“<?php echo $this->_tpl_vars['muser']['autograph']; ?>
”</div>
        <ul class="ul-txt-sz"> 
            <li><a href="/index.php?m=index&c=muser&v=follow&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</span>关注</a></li>
            <li class="bd"><a href="/index.php?m=index&c=muser&v=fans&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</a></li>
            <li><a href="/index.php?m=index&c=muser&v=visitor&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</span>访客</a></li>
        </ul>
        <div class="m-guanzhu-sz">
            <div class="tit">TA的关注</div>
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
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript">
    function msg(uid, obj){
        $('#msg_'+uid).show();
    }
    $('.btn_eject_close').click(function(){
        $(this).parent().hide();
    });
    function send(uid, obj){
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
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script>
    $('.pic-sz').slick({ //自定导航条
        slidesToShow: 4, //个数
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
        nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
        dots: false
    });
</script>