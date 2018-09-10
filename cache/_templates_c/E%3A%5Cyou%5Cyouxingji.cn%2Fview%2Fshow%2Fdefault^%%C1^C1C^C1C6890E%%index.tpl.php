<?php /* vpcvcms compiled created on 2018-09-10 15:47:33
         compiled from wap/muser/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/muser/index.tpl', 58, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>TA的游记_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title> 
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
        <h3>TA的游记</h3>
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
                <img src="<?php echo $this->_tpl_vars['muser']['cover']; ?>
" alt="">
            </a>
        </div>
        <div class="row-yz">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul>
                        <li class="on"><a href="/index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的日志</a></li>
                        <li><a href="/index.php?m=wap&c=muser&v=album&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的相册</a></li>
                        <li><a href="/index.php?m=wap&c=muser&v=tv&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的视频</a></li>
                    </ul>
                </div>
            </div>
            <div class="m-myinfo-yz">
                <a href="" class="myimg"><img src="<?php echo $this->_tpl_vars['muser']['avatar']; ?>
" alt=""></a>
                <div class="name"><?php echo $this->_tpl_vars['muser']['username']; ?>
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
                    <a href="javascript:;" class="mm" onclick="smg(<?php echo $this->_tpl_vars['muser']['uid']; ?>
)">私信</a>
                </div>
                <div class="info2"><?php echo $this->_tpl_vars['muser']['autograph']; ?>
</div>
                <ul class="ul-txt-yz">
                    <li><a href="/index.php?m=wap&c=muser&v=follow&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</span>关注</a></li>
                    <li class="bd"><a href="/index.php?m=wap&c=muser&v=fans&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</a></li>
                    <li><a href="/index.php?m=wap&c=muser&v=visitor&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
"><span class="s1"><?php echo ((is_array($_tmp=$this->_tpl_vars['muser']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</span>访客</a></li>
                </ul>
            </div>
            <div class="m-artical">
                <h4>TA的游记</h4>
                <?php if ($this->_tpl_vars['list']): ?>
                <ul class="ul-imgtxt2-yz">
                    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                    <li>
                        <div class="wp">
                            <div class="txt">
                                <div class="title">
                                    <a class="tit" href="javascript:;"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
                                    <span class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                                </div>
                                <p><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
                                <dl>
                                    <?php $_from = $this->_tpl_vars['vo']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                    <dd>
                                        <a href="<?php echo $this->_tpl_vars['v']; ?>
" class="fancybox-effects-a">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['v']; ?>
" alt=""></div>
                                        </a>
                                    </dd>
                                    <?php endforeach; endif; unset($_from); ?>
                                </dl>
                                <div class="g-operation-yz">
                                    <a href="" class="look"><i></i><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</a>
                                    <a href="javascript:;" class="zan" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
"><i></i><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                <?php endif; ?>
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
                    </ul>
                </div>
                <?php endif; ?>
                <!-- 页码 end-->
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
        });
        // 视频
        $('.js-video').click(function(event) {
            var _id = $(this).attr("href");
            var _src = $(this).attr("data-src");

            $(_id).find("iframe").attr("src", _src);
            $(_id).fadeIn();
        });
        $('.js-close').click(function(event) {
            $(this).parents('.m-pop1-yz').fadeOut();
            $(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
        });
        $('.js-pop1').click(function(event) {
            /* Act on the event */
            $('.pop-pic').fadeIn();
        });
        $('.pop-pic .close').click(function() {
            $(this).parents('.m-pop1-yz').fadeOut();
        });
        $('.a-edit').click(function() {
            $(this).toggleClass('on');
        })
        $('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zan", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $(obj).toggleClass('on');
                    $(obj).html("<i></i>" + (num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
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
                    $(obj).html('<b>+</b> 关注');
                }
            },"JSON");
        }
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