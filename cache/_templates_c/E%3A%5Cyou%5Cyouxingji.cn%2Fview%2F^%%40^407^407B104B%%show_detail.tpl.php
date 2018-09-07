<?php /* vpcvcms compiled created on 2018-07-25 09:57:57
         compiled from admin/travel_note/show_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'admin/travel_note/show_detail.tpl', 120, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->_tpl_vars['article']['title']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style>
        .qqFace { margin-top: 4px; background: #fff; padding: 2px; border: 1px #dfe6f6 solid; }
        .qqFace table td { padding: 0px;line-height: 28px;}
        .qqFace table td img { cursor: pointer; border: 1px #fff solid; }
        .qqFace table td img:hover { border: 1px #0066cc solid; }
    </style>

</head>

<body>
<div class="header">
    <div class="wp">
        <div class="logo" style="margin-right: 30px;"><a href="/"><img src="/resource/images/logo.png" alt=""></a></div>
        <ul class="nav">
            <li <?php if ($this->_tpl_vars['ns'] == ''): ?>class="on"<?php endif; ?>><a href="/">首页</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'swim'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=swim&v=index">游主张</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'star'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=star">达人邦</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'tv'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=tv">旅拍TV</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'ryt'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=ryt">日阅潭</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'journey'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=journey">独家旅行</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'scenery'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=scenery">游画</a></li>
            <li <?php if ($this->_tpl_vars['ns'] == 'mxp'): ?>class="on"<?php endif; ?>><a href="/index.php?m=index&c=index&v=mxp">玩转明信片</a></li>
        </ul>
        <div class="hdr">
            <?php if ($this->_tpl_vars['user']): ?>
            <div class="user">
                <div class="pic"><a href="/index.php?m=index&c=user&v=index"><img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" id="headavatarpic" style="border-radius: 50%;vertical-align: baseline;height: 100%;width: 100%;"></a></div>
                <dl>
                    <dd><a href="/index.php?m=index&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=index&c=user&v=addtv">发布旅拍TV</a></dd>
                    <dd><a href="/index.php?m=index&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=index&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=index&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=index&c=user&v=setting">设置</a></dd>
                    <dd><a href="javascript:void(0)" onclick="logout()">退出</a></dd>
                </dl>
            </div>
            <?php if ($this->_tpl_vars['weidu'] > 0): ?>
            <div class="tx">
                <span class="lf">私信</span>
                <span class="rg weidu">!</span>
            </div>
            <script type="text/javascript">
                $('.tx').click(function(){
                    window.location.href="/index.php?m=index&c=user&v=msg";
                })
            </script>
            <?php endif; ?>
            <?php else: ?>
            <div class="left">
                <a href="/index.php?m=index&c=index&v=weibologin" style="background-image: url(/resource/images/icon2-qm.png);"></a>
                <a href="/index.php?m=index&c=index&v=qqlogin" style="background-image: url(/resource/images/icon3-qm.png);"></a>
                <a href="/index.php?m=index&c=index&v=weixinlogin" style="background-image: url(/resource/images/icon4-qm.png);"></a>
            </div>
            <div class="right">
                <a href="/index.php?m=index&c=index&v=login">登录</a> |
                <a href="/index.php?m=index&c=index&v=reg">注册</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function logout()
    {
        //退出畅言
        var img = new Image();
        img.src='http://changyan.sohu.com/api/2/logout?client_id=cytIKVFKm';
        window.location.href="/index.php?m=index&c=user&v=logout";
    }
</script>
<div class="main">
    <?php $_from = C::T('ad')->getList(array('tagname' => 'rytdetailslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
    <div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
    <?php endforeach; endif; unset($_from); ?>
    <div class="cur">
        <div class="wp">
            <a href="">首页</a> &gt; <a href="/index.php?m=index&c=index&v=ryt">日阅潭</a> &gt; <span><?php echo $this->_tpl_vars['article']['title']; ?>
</span>
        </div>
    </div>
    <div class="wp">
        <div class="m-master-qm">
            <div class="col-l">
                <div class="m-text1-qm">
                    <h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                    <div class="info">
                        <span>By <em><?php echo $this->_tpl_vars['article']['username']; ?>
</em></span>
                        <span><?php echo $this->_tpl_vars['article']['addtime']; ?>
</span>
                        <div class="g-operation-qm">
                            <a href="javascript:;" class="look"><i></i><?php echo $this->_tpl_vars['article']['show_num']; ?>
</a>|
                            <a href="javascript:;" class="zan" data-id="<?php echo $this->_tpl_vars['article']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['article']['top_num']; ?>
"><i></i><?php echo $this->_tpl_vars['article']['top_num']; ?>
</a>
                        </div>
                    </div>
                    <div class="txt">
                        <?php echo $this->_tpl_vars['article']['content']; ?>

                    </div>
                </div>
                <ul class="ul-imgtxt4-qm" id="comment">
                    <?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                    <li>
                        <div class="tit">
                            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><i style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);border-radius: 50%;background-size: 100%;"></i></a>
                            <span><?php echo $this->_tpl_vars['vo']['lou']; ?>
F</span>
                            <h3><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'lv') : smarty_modifier_helper($_tmp, 'lv')); ?>
</em></h3>
                        </div>
                        <div class="txt">
                            <p><?php echo $this->_tpl_vars['vo']['content']; ?>
</p>
                            <div class="bot">
                                <span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
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
#comment"><?php echo $this->_tpl_vars['page']['0']; ?>
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
                <div class="m-comment-qm">
                    <form action="">
                        <div class="content">
                            <div class="top" style="margin-top: 0px;">
                                <a href="javascript:;" class="emotion" style="background-image: url(/resource/images/icon21-qm.png);"></a>
                            </div>
                            <textarea id="saytext" placeholder="写下您的感受......."></textarea>
                            <?php if (! $this->_tpl_vars['user']): ?>
                            <div class="nologin">
                                <div class="nologinbtn">
                                    <a href="/index.php?m=index&c=index&v=login" target="_blank">登录</a>
                                    <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <a href="javascript:;" class="btn btnComment">发表评论</a>
                    </form>
                </div>
            </div>
            <div class="col-r">
                <h3 class="g-tit1-qm">日阅潭推荐</h3>
                <div class="m-pic2-qm">
                    <div class="slider">
                        <?php $_from = $this->_tpl_vars['tjryt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                        <div class="item">
                            <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
                                <div class="pic">
                                    <img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="">
                                    <span><?php echo $this->_tpl_vars['vo']['title']; ?>
</span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                </div>
                <h3 class="g-tit1-qm">相关目录</h3>
                <ul class="ul-txt2-qm">
                    <?php $_from = $this->_tpl_vars['tjlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                    <li>
                        <span><?php echo $this->_tpl_vars['k']+1; ?>
/</span>
                        <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="h81"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<script>
    $(document).ready(function() {
        $('.m-pic2-qm .slider').slick({
            dots: false,
            arrows: true,
            autoplay: true,
            slidesToShow: 1,
            autoplaySpeed: 5000,
            pauseOnHover: false,
            lazyLoad: 'ondemand'
        });
    });
    $('.zan').click(function(event) {
        var id = $(this).attr('data-id');
        var num = parseInt($(this).attr('data-num'));
        var obj = $(this);
        $.post("/index.php?m=api&c=index&v=zanryt", {
            'id':id
        }, function(data){
            if(data.status == 1){
                $(obj).html('<i></i>'+(num+1));
            }else{
                layer.msg(data.tips);
            }
        },"JSON");

    });
</script>
<script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
<script type="text/javascript">
    $(function(){
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['article']['id']; ?>
&page=" + page + "#comment";
            }
        })
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path:'/resource/arclist/' //表情存放的路径
        });
        $(".btnComment").click(function(){
            var str = $("#saytext").val();
            $.post("/index.php?m=api&c=index&v=comment", {
                'str':str,
                'rid':'<?php echo $this->_tpl_vars['article']['id']; ?>
'
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $("#saytext").val('');
                }
            },"JSON");
        });
    });

    //查看结果

    function replace_em(str){
        str = str.replace(/\</g,'&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/resource/arclist/$1.gif" border="0" />');
        return str;
    }
</script>

</body>

</html>