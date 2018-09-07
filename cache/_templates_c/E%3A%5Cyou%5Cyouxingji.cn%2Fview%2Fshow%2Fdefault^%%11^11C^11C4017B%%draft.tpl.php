<?php /* vpcvcms compiled created on 2018-08-15 16:03:29
         compiled from wap/user/draft.tpl */ ?>
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
        <h3>草稿箱</h3>
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
        <div class="row-yz">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul>
                        <li><a href="/index.php?m=wap&c=user&v=index">我的游记</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=tv">我的旅拍TV</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
                    </ul>
                </div>
            </div>
            <ul class="ul-txtlist-yz">
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtravel">
                        <i style="background-image: url(/resource/m/images/s-i1.png);"></i>
                        <div class="txt">发布游记</div>
                    </a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtv">
                        <i style="background-image: url(/resource/m/images/s-i2.png);"></i>
                        <div class="txt">发布旅拍TV</div>
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
            <div class="m-mydraft-yz">
                <div class="wp">
                    <div class="tit">我的草稿 <?php echo $this->_tpl_vars['num']; ?>
 <span>【亲爱的，你还有<?php echo $this->_tpl_vars['num']; ?>
篇草稿没有完成，我们很期待你的大作哦~】</span></div>
                    <ul class="ul-pictxt-yz">
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
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script type="text/javascript">
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