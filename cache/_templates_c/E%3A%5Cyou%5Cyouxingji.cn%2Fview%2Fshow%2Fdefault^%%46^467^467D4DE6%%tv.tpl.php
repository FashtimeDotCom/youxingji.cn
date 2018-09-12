<?php /* vpcvcms compiled created on 2018-09-11 14:50:24
         compiled from wap/user/tv.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的旅拍TV</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
        .write {position: absolute;bottom: 0px;right: 10px;z-index: 9999;}
        .write a{display:inline-block;background-repeat:no-repeat;-webkit-transition:.3s;-o-transition:.3s;transition:.3s}
    </style>
</head>

<body class="">
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>我的旅拍TV</h3>
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
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布日志</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布视频</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="row-TV">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul>
                        <li><a href="/index.php?m=wap&c=user&v=travel">我的日志</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=tv">我的视频</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
                    </ul>
                </div>
            </div>
            <ul class="ul-txtlist-yz">
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtravel">
                        <i style="background-image: url(/resource/m/images/s-i1.png);"></i>
                        <div class="txt">发布日志</div>
                    </a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtv">
                        <i style="background-image: url(/resource/m/images/s-i2.png);"></i>
                        <div class="txt">发布视频</div>
                    </a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=follow">
                        <i style="background-image: url(/resource/m/images/s-i3.png);"></i>
                        <div class="txt">我的关注</div>
                    </a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=fans">
                        <i style="background-image: url(/resource/m/images/s-i4.png);"></i>
                        <div class="txt">我的粉丝</div>
                    </a>
                </li>
            </ul>
            <?php if ($this->_tpl_vars['list']): ?>
            <div class="m-mytv-yz">
                <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <div class="item">
                    <div class="wp">
                        <div class="date"><?php echo $this->_tpl_vars['vo']['days']; ?>
</div>
                        <ul class="ul-pic1-yz ul-pic1-yz2">
                            <?php $_from = $this->_tpl_vars['vo']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                            <li class="tv_t<?php echo $this->_tpl_vars['v']['id']; ?>
" style="position: relative;">
                                <a href="#m-pop1-yz" class="pic js-video" data-src="<?php echo $this->_tpl_vars['v']['url']; ?>
"  data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" alt="">
                                    <span class="bo"></span>
                                    <span class="txt"><?php echo $this->_tpl_vars['v']['title']; ?>
</span>
                                </a>
                                <div class="write">
                                    <a href="javascript:;" class="a2" onclick="deleteTv(<?php echo $this->_tpl_vars['v']['id']; ?>
)"><img src="/resource/images/shanchu.png" width="25"></a>
                                    <a href="/index.php?m=wap&c=user&v=edittv&id=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="a2"><img src="/resource/images/bianji.png" width="25"></a>
                                </div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <?php endif; ?>
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
        </div>
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
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('.js-video').click(function(event) {
            var _id = $(this).attr("href");
            var _src = $(this).attr("data-src");

            $(_id).find("iframe").attr("src", _src);
            $(_id).fadeIn();
        });
        $('.js-close').click(function(event) {
            $(this).parents('.m-pop1-yz').fadeOut();
            $(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
            event.stopPropagation();
        });
        function deleteTv(id)
        {
            layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=index&v=deletetv", {
                        'id':id
                    }, function(data){
                        if(data.status == 1){
                            $('.tv_t'+id).remove();
                        }
                    },"JSON");
                    layer.close(index);
                }
            });
        }
    </script>
</body>

</html>