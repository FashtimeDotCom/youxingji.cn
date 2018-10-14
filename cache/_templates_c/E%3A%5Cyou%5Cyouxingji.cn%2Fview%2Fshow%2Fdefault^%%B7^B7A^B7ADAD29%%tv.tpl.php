<?php /* vpcvcms compiled created on 2018-10-09 14:42:26
         compiled from wap/tv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/tv.tpl', 52, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人视频_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
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
        <h3>达人视频</h3>
    </div>
    <div class="mian" style="padding-bottom: 29px;margin-bottom: 12px;">
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
        <?php $_from = C::T('ad')->getList(array('tagname' => 'waptvslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban">
            <a href="javascript:;">
                <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" />
            </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
        <!--
        <div class="tjuser swiper-container">
            <div class="swiper-wrapper">
                <?php $_from = $this->_tpl_vars['tjuser']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                <div class="row-peo swiper-slide">
                    <div class="wp">
                        <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">本周推荐达人</h4>
                        <div class="tx">
                            <a href="index.php?m=wap&c=muser&v=tv&id=<?php echo $this->_tpl_vars['v']['uid']; ?>
" class="pic"><img src="<?php echo $this->_tpl_vars['v']['avatar']; ?>
" alt=""></a>
                            <h5><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
"><?php echo $this->_tpl_vars['v']['username']; ?>
</a></h5>
                        </div>
                        <div class="txt">
                            <p><?php echo $this->_tpl_vars['v']['autograph']; ?>
</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
        -->
        <div class="m-txt2">
            <div class="con swiper-container swiper-container-horizontal swiper-container-ios" style="    padding-right: 0px;">
                <div class="swiper-wrapper" style="overflow-x: scroll;">
                    <div class="swiper-slide <?php if ($this->_tpl_vars['type'] == ''): ?>swiper-slide-active<?php endif; ?>" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
">全部</a></div>
                    <?php $_from = $this->_tpl_vars['tagslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                    <div class="swiper-slide <?php if ($this->_tpl_vars['type'] == $this->_tpl_vars['k']): ?>swiper-slide-active<?php endif; ?>" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&type=<?php echo $this->_tpl_vars['k']; ?>
&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
"><?php echo $this->_tpl_vars['vo']['tags']; ?>
</a></div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div>
        <div class="m-box swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <ul class="ul-imgtxt2">
                        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <li>
                            <div class="con">
                                <div class="pic">
                                    <a href="#m-pop1-yz" class="js-video" data-src="<?php echo $this->_tpl_vars['vo']['url']; ?>
" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
">
                                        <img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="" />
                                        <i></i>
                                    </a>
                                </div>
                                <div class="txt">
                                    <div class="top">
                                        <div class="img"><a href="javascript:;"><img src="<?php echo $this->_tpl_vars['vo']['avatar']; ?>
" alt="" /></a></div>
                                        <div class="tit">
                                            <h3><a href="javascript:;"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a></h3>
                                            <span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                                        </div>
                                    </div>
                                    <p><?php echo $this->_tpl_vars['vo']['describes']; ?>
</p>
                                </div>
                            </div>
                            <div class="bot">
                                <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i><?php echo $this->_tpl_vars['vo']['shownum']; ?>
</span>
                                <span class="zan" href="javascript:;" data-id="<?php echo $this->_tpl_vars['vo']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['vo']['topnum']; ?>
"><i style="background-image: url(/resource/m/images/i-zan.png)"></i><?php echo $this->_tpl_vars['vo']['topnum']; ?>
</span>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
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
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz" id="m-pop1-yz">
            <div class="con">
                <iframe src='' frameborder=0 'allowfullscreen'></iframe>
                <div class="close js-close"><span></span></div>
            </div>
        </div>
        <!-- end -->
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script>
        var swiper = new Swiper('.tjuser', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            }
        });
        // var galleryTop = new Swiper('.m-txt2 .con', {
        //     spaceBetween: 10,
        //     slidesPerView: 5,
        //     touchRatio: 0.2,
        //     loop: false,
        //     loopedSlides: 5,
        //     slideToClickedSlide: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next'
        //     }
        // });
        // var galleryThumbs = new Swiper('.m-box', {
        //     spaceBetween: 10,
        //     loop: true,
        //     loopedSlides: 5
        // });
        // galleryTop.controller.control = galleryThumbs;
        // galleryThumbs.controller.control = galleryTop;

        $('.js-video').click(function(event) {
            var _id = $(this).attr("href");
            var tid = $(this).attr("data-id");
            var _src = $(this).attr("data-src");
            $.post("/index.php?m=api&c=index&v=showtv", {
              'id':tid
            }, function(data){

            },"JSON");
            $(_id).find("iframe").attr("src", _src);
            $(_id).fadeIn();
        });
        $('.js-close').click(function(event) {
            $(this).parents('.m-pop1-yz').fadeOut();
            $(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
            event.stopPropagation();
        });
        $('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zantv", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $(obj).toggleClass('on');
                    $(obj).html('<i style="background-image: url(/resource/m/images/i-zan.png)"></i>' + (num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
    </script>
</body>

</html>