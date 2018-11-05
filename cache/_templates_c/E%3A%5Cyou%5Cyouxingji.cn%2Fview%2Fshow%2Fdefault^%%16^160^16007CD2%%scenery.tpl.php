<?php /* vpcvcms compiled created on 2018-10-18 18:12:30
         compiled from wap/scenery.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>游画_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>
<body>
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>游画</h3>
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
        <?php $_from = C::T('ad')->getList(array('tagname' => 'wapscenerylide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban">
            <a href="javascript:;">
                <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" />
            </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="m-works">
            <h3 class="g-tit1">名家作品区</h3>
            <ul class="ul-imgtxt5">
                <?php $_from = $this->_tpl_vars['writer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <li>
                    <div class="top">
                        <div class="pic"><a href="/index.php?m=wap&c=index&v=writer&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="" /></a></div>
                        <div class="txt">
                            <p><em><?php echo $this->_tpl_vars['vo']['name']; ?>
</em>，<?php echo $this->_tpl_vars['vo']['introduction']; ?>
</p>
                        </div>
                    </div>
                    <div class="bot">
                        <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">作品</h4>
                        <div class="picbox swiper-container">
                            <div class="swiper-wrapper">
                                <?php $_from = $this->_tpl_vars['vo']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                <div class="swiper-slide">
                                     <a href="<?php echo $this->_tpl_vars['v']['pics']; ?>
" class="fancybox" data-title="<p><span>作品：</span><?php echo $this->_tpl_vars['v']['title']; ?>
</p><p><span>作者：</span> <?php echo $this->_tpl_vars['vo']['name']; ?>
</p><p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p><p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>">
                                        <div class="pic">
                                            <img src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" alt="" />
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <a href="/index.php?m=wap&c=index&v=writerlist" class="g-more1">查看更多</a>
        </div>
        <div class="m-hot">
            <h3 class="g-tit1">热门作品区</h3>
            <div class="m-imgtxt2 swiper-container">
                <div class="swiper-wrapper">
                    <?php $_from = $this->_tpl_vars['scenery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                    <div class="swiper-slide">
                        <a href="<?php echo $this->_tpl_vars['v']['pics']; ?>
" class="fancybox" data-title="<p><span>作品：</span><?php echo $this->_tpl_vars['v']['title']; ?>
</p><p><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p><p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p><p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>">
                            <div class="pic"><img src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" alt=""></div>
                            <div class="txt">
                                <p><span>作品：</span><?php echo $this->_tpl_vars['v']['title']; ?>
</p>
                                <p><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p>
                                <p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p>
                                <p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                    <div class="swiper-slide">
                        <a href="/index.php?m=wap&c=index&v=hotscenery">
                            <div class="g-more2">
                                <span>查看更多游画<i></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script type="text/javascript">
        var swiper1 = new Swiper('.m-works .picbox', {
            slidesPerView: 2.5
        });
        var swiper2 = new Swiper('.m-imgtxt2', {
            slidesPerView: 1.5
        });
    </script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(".fancybox").fancybox({
            wrapCSS: 'fancybox-custom',
            closeClick: false,
            openEffect: 'none',
            showCloseButton: false,
            helpers: {
                title: {
                    type: 'inside'
                }
            },
            beforeLoad: function() {
                this.title = $(this.element).data('title');
            }
        });
    </script>
</body>
</html>