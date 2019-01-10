<?php /* vpcvcms compiled created on 2019-01-10 18:01:18
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
    <link rel="stylesheet" href="/resource/css/public.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
    	/*导航菜单*/
		.m-nv-sz li{margin-right: 16px;width: auto!important;padding: 0 14px;}
		.m-nv-sz .on:before { width: 100%;}
		
		.ul-pictxt-sz .write .a1{float: left;}
		.ul-pictxt-sz li:hover .a2{float: left;}
		
		.mainTips{background: #fff;position: relative;padding: 30px 10px;}
		.mainTips .preview{width: 344px;height: 241px; margin: 0px 42px;;float: left;}
		.mainTips .tip{float: left;position: relative;padding-top: 78px;}
		.mainTips .tip .title{font-size: 23px;color: #666;line-height: 30px;}
    </style>
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
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li class="on"><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
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
                        <div class="tit">我的草稿 <i class="Iclass quantity quantity1" style="font-size: 18px;"><?php echo $this->_tpl_vars['num']; ?>
</i> 
                        	<span>【亲爱的，你还有<i class="Iclass quantity" style="font-size: ;"><?php echo $this->_tpl_vars['num']; ?>
</i> 篇草稿没有完成，我们很期待你的大作哦~】</span>
                        </div>
                        <?php if ($this->_tpl_vars['list']): ?>
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
" target="_blank" class="a1">继续写</a>
                                        <a href="javascript:;" class="a2" onclick="deleteDraft(<?php echo $this->_tpl_vars['vo']['id']; ?>
)"></a>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                        <?php else: ?>
                        <!--无信息-->
						<div class="mainTips fix">
							<div class="preview" style="background: url(/resource/m/images/user/defaul_tv_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">暂无草稿哦！<br />快增加发布一个吧！</p></div>
						</div>
                        <?php endif; ?>
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
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        function deleteDraft(id){
        	var length = $(".ul-pictxt-sz li").length;
			var quantity = parseInt($(".quantity1").text()); //草稿的数量
        	layer.msg('您确定要删除吗？', {
		        btn: ['确认', '取消'],
		        yes: function (index) {
		            $.post("/index.php?m=api&c=index&v=deletedraft",{ 
		            	'id':id
		            }, function(data){
		            	layer.msg(data.tips);
		                if(data.status == 1){
		                	$('.draft_d'+id).remove();
		                	$(".quantity").text(quantity-1);
		                    if (length-1==0) {
		                    	html ='<div class="mainTips fix">'+
											'<div class="preview" style="background: url(/resource/m/images/user/defaul_tv_bg.png) no-repeat center;" title="海报/封面"></div>'+
											'<div class="tip"><p class="title">暂无草稿哦！<br />快增加发布一个吧！</p></div>'+
										'</div>';
		                    	$(".ul-pictxt-sz").after(html);
		                    }
		                }
		            },"JSON");
		            layer.close(index);
		        }
		    });
        }
    </script>
</body>
</html>