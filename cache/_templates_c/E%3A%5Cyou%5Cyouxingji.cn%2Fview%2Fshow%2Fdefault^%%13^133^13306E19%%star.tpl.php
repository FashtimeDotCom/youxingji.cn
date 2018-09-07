<?php /* vpcvcms compiled created on 2018-09-05 14:18:47
         compiled from wap/star.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/star.tpl', 60, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人邦_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
  	<script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/m/js/lib.js"></script>
  	<!--lightbox开始-->
  	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
  	<!--[if IE 6]>
 	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
  	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
  	<script type="text/javascript">
    	jQuery(document).ready(function($){
      		$('.lightbox').lightbox();
    	});
  	</script>
</head>

<body class="">
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>达人邦</h3>
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
        <?php $_from = C::T('ad')->getList(array('tagname' => 'wapstarlide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban">
            <a href="javascript:;">
    	        <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" />
    	    </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="m-talent">
            <?php if ($this->_tpl_vars['tjstar']['0']['username']): ?>
            <div class="row-peo">
                <div class="wp">
                    <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">本周推荐达人</h4>
                    <div class="tx">
                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tjstar']['0']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
" class="pic"><img src="<?php echo $this->_tpl_vars['tjstar']['0']['avatar']; ?>
" alt=""></a>
                        <h5><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tjstar']['0']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
"><?php echo $this->_tpl_vars['tjstar']['0']['username']; ?>
</a></h5>
                    </div>
                    <div class="txt">
                        <p><?php echo $this->_tpl_vars['tjstar']['0']['autograph']; ?>
</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row-list" style="padding-bottom: 29px;margin-bottom: 12px;">
                <div class="wp">
                    <ul class="ul-list-talent">
                        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <li>
                            <div class="item">
                                <div class="info">
                                    <span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                                    <div class="tx">
                                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
" class="pic"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
" alt=""></a>
                                        <h5><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</a></h5>
                                    </div>
                                    <div class="c"></div>
                                    <div class="txt">
                                        <p><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
                                    </div>
                                </div>
                                <dl class="list-img">
                                    <?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                    <dd><a href="<?php echo $this->_tpl_vars['v']; ?>
" class="lightbox" rel="list<?php echo $this->_tpl_vars['vo']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['v']; ?>
" alt=""></a></dd>
                                    <?php endforeach; endif; unset($_from); ?>
                                </dl>
                                <div class="other">
                                    <span class="eye-c" style="background-image: url(/resource/m/images/i-eye.png)"><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</span>
                                    <span class="zan-c zan" style="background-image: url(/resource/m/images/i-zan.png)" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
"><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</span>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
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
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
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
            $('.zan').click(function(event) {
                var id = $(this).attr('data-id');
                var num = parseInt($(this).attr('data-num'));
                var obj = $(this);
                $.post("/index.php?m=api&c=index&v=zan", {
                    'id':id
                }, function(data){
                    if(data.status == 1){ 
                        $(obj).toggleClass('on');
                        $(obj).html(num+1);
                    }else{
                        layer.msg(data.tips);
                    }
                },"JSON");
                
            });
        });
    </script>
    <!-- 弹窗 end-->
</body>

</html>