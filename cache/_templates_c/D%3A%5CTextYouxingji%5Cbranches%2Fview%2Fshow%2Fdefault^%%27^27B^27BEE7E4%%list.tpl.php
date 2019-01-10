<?php /* vpcvcms compiled created on 2018-12-28 14:38:28
         compiled from index/travel_note/list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人游记_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/notelist.css" />
</head>
<body onkeydown="on_return();">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="main">
        <!--精选文章-->
    	<div class="theDayArticle swiper-container" id="ArticleSwiper">
    		<div class="swiper-wrapper">
				<?php $_from = $this->_tpl_vars['tj_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<a class="figure borderRadius swiper-slide poster" href="<?php if ($this->_tpl_vars['item']['type'] == 1): ?>/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php endif; ?>" style="background-image: url(<?php echo $this->_tpl_vars['item']['top_pic']; ?>
);" title="海报/封面">
					<div class="mantra">
						<span class="time"><?php echo $this->_tpl_vars['item']['showtime']; ?>
</span>
						<span class="describe"><?php echo $this->_tpl_vars['item']['title']; ?>
</span>
					</div>
				</a>
				<?php endforeach; endif; unset($_from); ?>
    		</div>
    	</div>

        <div class="cur"><div class="wp"><a href="">首页</a> &gt; <span>达人游记</span></div></div>
        
        <!--年份-->
        <div class="m-read-qm m_read_qm">
            <div class="tit">
                <div class="wp">
                    <div class="con">
                        <h3><span><?php echo $this->_tpl_vars['date_info']['now']['y']; ?>
</span><i></i></h3>
                        <dl><dd><a href="/index.php?m=index&c=travelnote&v=note_list&y=2018">2018</a></dd>
                        	<dd><a href="/index.php?m=index&c=travelnote&v=note_list&y=2019">2019</a></dd>
                        </dl>
                    </div>
                    <span class="data"><i id="monthNum"><?php echo $this->_tpl_vars['date_info']['now']['m']; ?>
</i> / <i id="yearNum"><?php echo $this->_tpl_vars['date_info']['now']['y']; ?>
</i></span>
                </div>
            </div>
        </div>
        
        <!--月份-->
        <div class="month">
            <ul class="ul_txt1_qm">
				<?php $_from = $this->_tpl_vars['date_info']['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<li class="<?php echo $this->_tpl_vars['item']; ?>
" data-monthNum="<?php echo $this->_tpl_vars['key']; ?>
">
						<a onclick="turn_page(1,<?php echo $this->_tpl_vars['date_info']['now']['y']; ?>
,<?php echo $this->_tpl_vars['key']; ?>
,2)" href="javascript:;"><?php echo $this->_tpl_vars['key']; ?>
月</a>
					</li>
				<?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>

        <!--文章列表-->
        <input type="hidden" name="cur_page" id="cur_page" value="1">
        <div class="ArticleList">
        	<div class="bigbos">
        		<div class="box fix">
					<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="module fix">
						<a class="figure left poster borderRadius" href="javascript:void(0)" style="background-image: url(<?php echo $this->_tpl_vars['item']['top_pic']; ?>
);" title="海报/封面"></a>
						<div class="right">
							<a class="dis_block" href="<?php if ($this->_tpl_vars['item']['type'] == 1): ?>/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php endif; ?>">
								<p class="title apostrophe"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
								<span class="time"><?php echo $this->_tpl_vars['item']['showtime']; ?>
</span>
								<p class="describe omit lineNumber4 whiteSpace"><?php echo $this->_tpl_vars['item']['summary']; ?>
</p>
							</a>
							<div class="diamonds">
								<?php if ($this->_tpl_vars['item']['address']): ?>
								<div class="location">
									<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
									<i class="Iclass"><?php echo $this->_tpl_vars['item']['address']; ?>
</i>
								</div>
								<?php endif; ?>
								<span style="float:left;">BY&nbsp;&nbsp;</span>
								<a class="headPortrait" href="<?php if ($this->_tpl_vars['item']['type'] == 2): ?>/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
<?php else: ?>javascript:;<?php endif; ?>" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></a>
								&nbsp;&nbsp;<a class="name" href="<?php if ($this->_tpl_vars['item']['type'] == 2): ?>/index.php?m=index&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
<?php else: ?>javascript:;<?php endif; ?>"><?php echo $this->_tpl_vars['item']['username']; ?>
</a>
								<span class="shownum"><i class="Iclass"><?php echo $this->_tpl_vars['item']['shownum']; ?>
</i>次浏览</span>
							</div>
						</div>
						<a class="seeMore" href="<?php if ($this->_tpl_vars['item']['type'] == 1): ?>/index.php?m=index&c=index&v=rytdetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>/index.php?m=index&c=index&v=traveldetai&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php endif; ?>">查看更多</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
	        	</div>
        		<p class="tips"></p>
        	</div>

			<!-- 页码 -->
			<div class="pagination">
				<?php if ($this->_tpl_vars['multipage']): ?>
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page"><?php echo $this->_tpl_vars['page_info']['total_page']; ?>
</i>页 / <i class="Iclass"><?php echo $this->_tpl_vars['page_info']['num']; ?>
</i>条</div>
					<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page('pre')" data-val="上一页"></a></li>

						<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
						<li class="li_<?php echo $this->_tpl_vars['page']['0']; ?>
 <?php if ($this->_tpl_vars['page']['2']): ?><?php echo $this->_tpl_vars['page']['2']; ?>
 <?php endif; ?> li">
							<a href="javascript:;" onclick="turn_page('<?php echo $this->_tpl_vars['page']['0']; ?>
')" data-val="<?php echo $this->_tpl_vars['page']['0']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a>
						</li>
						<?php endforeach; endif; unset($_from); ?>

						<li class="pages-next"><a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a></li>

						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<!-- 页码 end-->
       </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/notelist.js"></script>
</body>
</html>