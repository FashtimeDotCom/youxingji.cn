<?php /* vpcvcms compiled created on 2018-07-31 14:51:39
         compiled from muser/album.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>TA的相册_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
  		.m-nv-sz ul {
  			display: flex;
  			
  		}
  		.m-nv-sz ul  li {
  			flex-grow: 1;
  			text-align: center;
  		}
  		.m-nv-sz .on:before {
  			width: 100%;
  		}
  	</style>
</head>

<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class="ban s1" style="background-image: url(<?php echo $this->_tpl_vars['muser']['cover']; ?>
);"></div>
        <div class="row-sz pb30">
            <div class="m-nv-sz">
                <div class="wp">
                    <ul>
                        <li><a href="/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的旅行日志</a></li>
                        <li class="on"><a href="/index.php?m=index&c=muser&v=album&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的相册</a></li>
                        <li><a href="/index.php?m=index&c=muser&v=tv&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的旅拍TV</a></li>
                        <li ><a href="/index.php?m=index&c=muser&v=travel_note&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
">TA的游记</a></li>
                    </ul>
                </div>
            </div>
            <div class="wp">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'muser/left.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="col-r">
                    <div class="m-mytv-sz">
                        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <div class="item">
                            <div class="date"><?php echo $this->_tpl_vars['vo']['days']; ?>
</div>
                            <ul class="ul-pic1-sz s2">
                                <?php $_from = $this->_tpl_vars['vo']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                <li>
                                    <a href="<?php echo $this->_tpl_vars['v']; ?>
" class="pic fancybox-effects-a">
        								<img src="<?php echo $this->_tpl_vars['v']; ?>
" alt="">
        							</a>
                                </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <!-- 页码 -->
                    <?php if ($this->_tpl_vars['multipage']): ?>
                    <div class="pages" style="margin-top: 10px;">
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
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=muser&v=album&id=<?php echo $this->_tpl_vars['muser']['uid']; ?>
&page=" + page;
            }
        })
    </script>
    <!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
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
    </script>
    <!-- 弹窗 end-->
</body>

</html>