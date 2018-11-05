<?php /* vpcvcms compiled created on 2018-10-16 11:59:46
         compiled from wap/journey/journey_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>独家旅行</title> 
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/journey_list.css" />
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
        <h3>独家旅行</h3>
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
       
       	<!--度假项目-->
       	<div class="ban1 fix">
            <a class="advertising dis_block fix" href="javascript:;">
                <img class="headPortrait" src="<?php echo $this->_tpl_vars['ad_list']['0']['imgurl']; ?>
" alt=""></a>
        </div>
        
        <!--达人带你去旅行-->
        <div class="Public tour fix">
        	<p class="moduleTitle">达人带你去旅行
				<a href="javascript:;">更多>></a>
			</p>

			<?php if ($this->_tpl_vars['star_travel']): ?>
			<?php $_from = $this->_tpl_vars['star_travel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

			<div class="box fix">
				<a class="dis_block fix" href="index.php?m=wap&c=index&v=travel_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
					<img class="poster" src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
"/>
					<p class="describe"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
					<p class="bottom">
						<span class="NATIONNAME">旅行天数</span>·
						<span class="time"><?php echo $this->_tpl_vars['item']['days']; ?>
天</span>
						<span class="cost"><?php echo $this->_tpl_vars['item']['price']; ?>
元/人起</span>
					</p>
				</a>
			</div>

			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>


        </div>
        
        <!--名家带你去写生-->
        <div class="Public sketching fix">
        	<p class="moduleTitle">名师带你去写生<a href="javascript:;">更多>></a></p>

			<?php if ($this->_tpl_vars['sketch_list']): ?>
			<?php $_from = $this->_tpl_vars['sketch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

			<div class="box fix">
				<a class="dis_block fix" href="index.php?m=wap&c=index&v=sketch_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
					<img class="poster" src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
"/>
					<p class="describe"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
					<p class="bottom">
						<span class="NATIONNAME">旅行天数</span>·
						<span class="time"><?php echo $this->_tpl_vars['item']['days']; ?>
天</span>
						<span class="cost"><?php echo $this->_tpl_vars['item']['price']; ?>
元/人起</span>
					</p>
				</a>
			</div>

			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>


        </div>
       
       	<!--独家资源-->
       	<div class="ban1 exclusive fix">
            <a class="advertising dis_block fix" href="javascript:;">
                <img class="headPortrait" src="<?php echo $this->_tpl_vars['ad_list']['1']['imgurl']; ?>
" alt=""></a>
        </div>

        <!--国家分类-->
        <div class="Public classify fix">
			<?php $_from = $this->_tpl_vars['label_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

			<div class="chunk fix">
				<p class="moduleTitle"><?php echo $this->_tpl_vars['item']['name']; ?>
<a href="javascript:;">更多>></a></p>

				<?php if ($this->_tpl_vars['item']['info']): ?>
				<?php $_from = $this->_tpl_vars['item']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
				<div class="box fix">
					<a class="dis_block fix" href="index.php?m=wap&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
						<img class="poster" src="<?php echo $this->_tpl_vars['vo']['articlethumb']; ?>
"/>
						<p class="describe"><?php echo $this->_tpl_vars['vo']['title']; ?>
</p>
						<p class="bottom">
							<span class="NATIONNAME">旅行天数</span>·
							<span class="time"><?php echo $this->_tpl_vars['vo']['lxts']; ?>
天</span>
							<span class="cost"><?php echo $this->_tpl_vars['vo']['price']; ?>
元/人起</span>
						</p>
					</a>
				</div>
				<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>

			</div>

			<?php endforeach; endif; unset($_from); ?>

        </div>
    </div>
    <script type="text/javascript">
    	
    </script>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>