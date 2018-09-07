<?php /* vpcvcms compiled created on 2018-07-25 17:05:19
         compiled from user/draft.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-草稿箱</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
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
        <div class="ban s1" style="background-image: url(<?php echo $this->_tpl_vars['user']['cover']; ?>
);"></div>
        <div class="row-sz">
            <div class="m-nv-sz">
                <div class="wp">
                    <ul>
							<li>
								<a href="/index.php?m=index&c=user&v=index">我的旅行日志</a>
							</li>
							
							<li>
								<a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=travel">我的游记</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=album">我的相册</a>
							</li>
							<li  class="on">
								<a href="/index.php?m=index&c=user&v=draft">草稿箱</a>
							</li>
						</ul>
                </div>
            </div>
            <div class="wp">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'user/left.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="col-r">
                    <div class="m-mydraft-sz">
                        <div class="tit">我的草稿 <?php echo $this->_tpl_vars['num']; ?>
 <span>【亲爱的，你还有<?php echo $this->_tpl_vars['num']; ?>
篇草稿没有完成，我们很期待你的大作哦~】</span></div>
                        <ul class="ul-pictxt-sz">
                            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                            <li class="draft_d<?php echo $this->_tpl_vars['vo']['id']; ?>
">
                                <div class="pic"><img src="<?php echo $this->_tpl_vars['vo']['pic']; ?>
" alt=""></div>
                                <div class="txt">
                                    <div class="tit"><?php echo $this->_tpl_vars['vo']['title']; ?>
</div>
                                    <div class="date"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</div>
                                    <div class="write">
                                        <a href="<?php echo $this->_tpl_vars['vo']['url']; ?>
" class="a1">继续写</a>
                                        <a href="javascript:;" class="a2" onclick="deleteDraft(<?php echo $this->_tpl_vars['vo']['id']; ?>
)"></a>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
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
        function deleteDraft(id)
        {
            $.post("/index.php?m=api&c=index&v=deletedraft", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $('.draft_d'+id).remove();
                }
            },"JSON");
        }
    </script>
</body>

</html>