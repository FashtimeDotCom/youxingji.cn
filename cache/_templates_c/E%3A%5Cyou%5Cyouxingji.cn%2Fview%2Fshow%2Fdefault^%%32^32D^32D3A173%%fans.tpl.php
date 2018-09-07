<?php /* vpcvcms compiled created on 2018-09-03 14:14:32
         compiled from wap/user/fans.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/user/fans.tpl', 86, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-粉丝</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
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
        <h3>我的粉丝</h3>
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
        <div class="ban">
            <a href="">
                <img src="<?php echo $this->_tpl_vars['user']['cover']; ?>
" alt="">
            </a>
            <div class="m-user">
                <i style="background: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl>
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布TV</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="row-focus">
            <div class="wp">
                <ul class="ul-snav-yz1">
                    <li>
                        <a href="/index.php?m=wap&c=user&v=follow" class="items item1">
    					<span style="background-image: url(/resource/m/images/ico-lb6.png)">我的关注</span>
    				</a>
                    </li>
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=fans" class="items item2">
    					<span style="background-image: url(/resource/m/images/ico-lb5.png)">我的粉丝</span>
    				</a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=visitor" class="items item1">
                        <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的访客</span>
                    </a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=findfriends" class="items item2">
                        <span style="background-image: url(/resource/m/images/ico-lb11.png)">查找好友</span>
                    </a>
                    </li>
                </ul>
                <div class="so-friend">
                    <input type="submit" class="sub" id="btnSo">
                    <input type="text" class="inp" value="<?php echo $this->_tpl_vars['keys']; ?>
" id="keys" placeholder="查找朋友">
                </div>
                <ul class="ul-list-yz2">
                    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                    <li>
                        <div class="items">
                            <div class="img">
                                <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
"><img src="<?php echo $this->_tpl_vars['vo']['avatar']; ?>
" alt=""></a>
                            </div>
                            <div class="txt">
                                <h4><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
"><?php echo $this->_tpl_vars['vo']['username']; ?>
</a></h4>
                                <div class="con">
                                    <a href="/index.php?m=wap&c=muser&v=follow&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
                						<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</em>
                						关注
                					</a>
                                    <a href="/index.php?m=wap&c=muser&v=fans&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
                						<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</em>
                						粉丝
                					</a>
                                    <a href="/index.php?m=wap&c=muser&v=visitor&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
                						<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</em>
                						访客
                					</a>
                                </div>
                                <div class="btn">
                                    <a href="javascript:;" class="on" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollow') : smarty_modifier_helper($_tmp, 'isfollow')); ?>
</a>
                                    <a href="javascript:;" onclick="smg(<?php echo $this->_tpl_vars['vo']['uid']; ?>
)">发私信</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
            <!-- 页码 -->
            <?php if ($this->_tpl_vars['multipage']): ?>
            <div class="pages" style="padding-top: 20px;padding-bottom: 20px;">
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
            <!-- 页码 end-->
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
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
            window.location.href="/index.php?m=wap&c=user&v=fans&keys=" + keys;
        })
      	function smg(uid){
        	layer.prompt({title: '请输入私信内容', formType: 2}, function(text, index){
              	layer.close(index);
                $.post("/index.php?m=api&c=index&v=sendmsg", {
                    'to_id':uid,
                    'content':text
                }, function(data){
                    layer.msg(data.tips);
                },"JSON");
            });
        }
    </script>
</body>

</html>