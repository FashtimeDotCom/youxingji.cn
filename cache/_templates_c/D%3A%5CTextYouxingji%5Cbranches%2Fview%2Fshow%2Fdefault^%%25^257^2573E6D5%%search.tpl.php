<?php /* vpcvcms compiled created on 2019-01-07 15:22:42
         compiled from index/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'index/search.tpl', 39, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>搜索结果_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
    	.whiteSpace{white-space: pre-wrap!important;word-wrap: break-word!important;*white-space:normal!important;}
    	.left-s{padding-bottom: 50px;width: 820px;}
    	.paddingBottom{padding-bottom: 10px;}
    </style>
</head>
<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
      	<div class="sj"><p>搜索结果</p></div>
      	<div class="wp lis">
          	<span>以下是为您找到“<?php echo $this->_tpl_vars['keyword']; ?>
”相关结果<?php echo $this->_tpl_vars['num']; ?>
条</span>
          	<div class="left-s">
              	<!--达人日志-->
              	<?php if ($this->_tpl_vars['star']): ?>
              	<div class="clearfix ser-title top">
                    <h2>达人日志</h2>
                  	<a href="/index.php?m=index&c=index&v=searchmore&type=star&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" class="_j_search_link" data-is-redirect="1">更多达人日志 &gt;&gt;</a>
                </div>
              	<div class="travel-notes _j_search_section paddingBottom" data-category="info">
                  <ul><?php $_from = $this->_tpl_vars['star']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                      <li><p class="clearfix">
                            	<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank" class="_j_search_link"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
                            	<span class="seg-info"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                            	<span class="seg-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</span>
                            	<span class="seg-info">浏览(<?php echo $this->_tpl_vars['vo']['shownum']; ?>
)</span>
                            	<span class="seg-info">点赞(<?php echo $this->_tpl_vars['vo']['topnum']; ?>
)</span>
                          </p>
                      </li>
                      <?php endforeach; endif; unset($_from); ?>
                  </ul>
              	</div>
              	<?php endif; ?>
              	
              	<!--达人视频-->
              	<?php if ($this->_tpl_vars['tv']): ?>
              	<div class="clearfix ser-title top">
                    <h2><a href="javascript:;" class="_j_search_link">达人视频</a></h2>
                  	<a href="/index.php?m=index&c=index&v=searchmore&type=tv&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" class="_j_search_link" data-is-redirect="1">更多达人视频 &gt;&gt;</a>
                </div>
              	<div class="travel-notes _j_search_section paddingBottom" data-category="info">
                  <ul><?php $_from = $this->_tpl_vars['tv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                      	<li><p class="clearfix">
                            	<a href="/index.php?m=index&c=muser&v=tv&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank" class="_j_search_link"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
                            	<span class="seg-info"><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                            	<span class="seg-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</span>
                            	<span class="seg-info">浏览(<?php echo $this->_tpl_vars['vo']['shownum']; ?>
)</span>
                            	<span class="seg-info">点赞(<?php echo $this->_tpl_vars['vo']['topnum']; ?>
)</span>
                          	</p>
                      	</li>
                      <?php endforeach; endif; unset($_from); ?>
                  </ul>
              	</div>
              	<?php endif; ?>
              	
              	<!--达人游记-->
              	<?php if ($this->_tpl_vars['ryt']): ?>
                <div class="clearfix ser-title">
                	<h2>达人游记</h2>
                    <a href="/index.php?m=index&c=index&v=searchmore&type=ryt&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" class="_j_search_link" data-is-redirect="1">更多达人游记 &gt;&gt;</a>
                </div>
                	<?php $_from = $this->_tpl_vars['ryt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <li><div class="flt1">
                      	<a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank" style="margin-bottom: 0px;"><img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" style="width:135px;height:85px;"></a>
                  	</div>
                  	<div class="ct-text">
                        <a href="/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" class="whiteSpace" style="display: block;" target="_blank"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a>
                        <p class="whiteSpace"><?php echo $this->_tpl_vars['vo']['content']; ?>
</p>
                        <ul class="seg-info-list clearfix">
                            <span>浏览(<?php echo $this->_tpl_vars['vo']['shownum']; ?>
)</span><span> <?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
                        </ul>
                    </div>
                </li>
                	<?php endforeach; endif; unset($_from); ?>
              	<?php endif; ?>
              	
              	<!--甄选之旅-->
              	<?php if ($this->_tpl_vars['journey']): ?>
              	<div class="clearfix ser-title top">
              		<h2>甄选之旅</h2>
                </div>
                	<?php $_from = $this->_tpl_vars['journey']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <div class="exe-packg01">
                    <ul class="clearfix">
                        <li><div class="flt1">
                                <a href="/index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank" class="_j_search_link">
                                	<img src="<?php echo $this->_tpl_vars['vo']['extend']['tjpic']; ?>
" style="width:90px;height:90px;">
                              	</a>
                            </div>
                            <div class="dwn-nr">
                              	<p class="seg-desc"><a href="/index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank" class="_j_search_link"><?php echo $this->_tpl_vars['vo']['title']; ?>
</a></p>
                                <h5><a href="/index.php?m=index&c=index&v=journeydetail&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank" class="seg-price _j_search_link">¥<?php echo $this->_tpl_vars['vo']['extend']['price']; ?>
元/位</a></h5>
                            </div>
                        </li>
                    </ul>
                </div>
                	<?php endforeach; endif; unset($_from); ?>
              	<?php endif; ?>
              	
              	<!--作家-->
              	<?php if ($this->_tpl_vars['writer']): ?>
                <div class="clearfix ser-title">
              		<h2>作家</h2>
                    <a href="/index.php?m=index&c=index&v=searchmore&type=writer&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" class="_j_search_link" data-is-redirect="1">更多作家 &gt;&gt;</a>
                </div>
                	<?php $_from = $this->_tpl_vars['writer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <li><div class="flt1">
                      	<a href="/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank" style="margin-bottom: 0px;"><img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" style="width:135px;"></a>
                  	</div>
                  	<div class="ct-text">
                        <a href="/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['vo']['name']; ?>
</a>
                        <p><?php echo $this->_tpl_vars['vo']['introduction']; ?>
</p>
                    </div>
                </li>
                	<?php endforeach; endif; unset($_from); ?>
              	<?php endif; ?>
          	</div>
          	
          	<!--用户-->
          	<?php if ($this->_tpl_vars['userlist']): ?>
          	<div class="ser-rt" style="margin-bottom: 10px;">
          		<div class="_j_search_section" data-category="user">
                    <div class="clearfix ser-title">
                        <h2><a data-is-redirect="1">用户</a></h2>
                        <a href="/index.php?m=index&c=index&v=searchmore&type=user&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" class="_j_search_link" data-is-redirect="1">更多用户 &gt;&gt;</a>
                    </div>
                    <ul class="user-list-row">
                      	<?php $_from = $this->_tpl_vars['userlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                        <li><div class="btns">
                                <a class="btn-follow _j_user_follow" href="javascript:;" onclick="follows(<?php echo $this->_tpl_vars['vo']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</a>
                                <a class="btn-msg _j_user_letter" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank">私信</a>
                            </div>
                            <span class="avatar"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank" class="_j_search_link"><img src="<?php echo $this->_tpl_vars['vo']['avatar']; ?>
" title="<?php echo $this->_tpl_vars['vo']['username']; ?>
" style="width:45px;height:45px;"></a></span>
                            <div class="base">
                                <span class="name"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
" target="_blank" class="_j_search_link"><?php echo $this->_tpl_vars['vo']['username']; ?>
</a></span>
                                <a class="grade" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'href') : smarty_modifier_helper($_tmp, 'href')); ?>
"><?php echo $this->_tpl_vars['vo']['lvname']; ?>
</a>
                            </div>
                            <div class="nums">
                                <a href="/index.php?m=index&c=muser&v=follow&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank" class="_j_search_link">关注：<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</a>
                                <a href="/index.php?m=index&c=muser&v=fans&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank" class="_j_search_link">粉丝：<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</a>
                                <a href="/index.php?m=index&c=muser&v=visitor&id=<?php echo $this->_tpl_vars['vo']['uid']; ?>
" target="_blank" class="_j_search_link">访客：<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'visitor') : smarty_modifier_helper($_tmp, 'visitor')); ?>
</a>
                            </div>
                        </li>
                      	<?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
          	</div>
          	<?php endif; ?>
      	</div>
      	<div class="wp">
            <!-- 页码 -->
            <?php if ($this->_tpl_vars['multipage']): ?>
            <div class="pages" style="text-align: left;padding-top: 20px;padding-bottom: 20px;">
            	<ul><?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
		            <li <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
		            <?php endforeach; endif; unset($_from); ?>
		            <li class="pages-form">
		            	到<input class="inp" type="text" id="pages">页<input class="btn" type="button" id="pageqr" value="确定">
		            </li>
            	</ul>
            </div>
            <?php endif; ?>
            <!-- 页码 end-->
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        function follows(bid, obj){
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

  		$('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href = "/index.php?m=index&c=index&v=search&keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=" + page;
            }
        });
  	</script>
</body>
</html>