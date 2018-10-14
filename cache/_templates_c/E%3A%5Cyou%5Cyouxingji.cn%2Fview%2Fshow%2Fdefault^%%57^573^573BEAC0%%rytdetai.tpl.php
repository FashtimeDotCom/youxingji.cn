<?php /* vpcvcms compiled created on 2018-10-12 14:56:03
         compiled from wap/rytdetai.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/rytdetai.tpl', 67, false),)), $this); ?>
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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/rytdetai.css" />
</head>
<body>
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>日阅潭</h3>
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
        <?php $_from = C::T('ad')->getList(array('tagname' => 'waprytdetailslide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
        <div class="ban"><a href="javascript:;"><img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="" /></a></div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="m-text2">
            <div class="wp">
                <h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                <div class="info">
                    <span>By<em><?php echo $this->_tpl_vars['article']['username']; ?>
</em></span>
                    <span><?php echo $this->_tpl_vars['article']['addtime']; ?>
</span>
                    <div class="right">
                        <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i><?php echo $this->_tpl_vars['article']['shownum']; ?>
</span>
                        <span class="zan" data-id="<?php echo $this->_tpl_vars['article']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['article']['zannum']; ?>
">
                        	<i style="background-image: url(/resource/m/images/i-zan.png)"></i><?php echo $this->_tpl_vars['article']['zannum']; ?>

                        </span>
                    </div>
                </div>
                <div class="m-share">
                    <div class="bdsharebuttonbox">
                        <span>分享至</span>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    </div>
                </div>
                <div class="txt">
                    <?php echo $this->_tpl_vars['article']['content']; ?>

                </div>
            </div>
        </div>
        <div class="m-comment">
            <ul class="ul-imgtxt4">
            	<?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <li><div class="tit">
                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'mhref') : smarty_modifier_helper($_tmp, 'mhref')); ?>
">
		                    <i style="background-image: url(<?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'avatar') : smarty_modifier_helper($_tmp, 'avatar')); ?>
);"></i>
		                    <span><?php echo $this->_tpl_vars['vo']['lou']; ?>
F</span>
		                    <h3><b class="username_<?php echo $this->_tpl_vars['vo']['uid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>
</b><em><?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'lv') : smarty_modifier_helper($_tmp, 'lv')); ?>
</em></h3>
		                </a>
                    </div>
                    <div class="substance" data-replyNum="0">
                    	<div class="txtt">
	                        <p><?php echo $this->_tpl_vars['vo']['content']; ?>
</p>
	                        <span><?php echo $this->_tpl_vars['vo']['addtime']; ?>
</span>
	                    </div>
	                    
	                    <p class="reply"><span class="replyReview" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-open="0" data-class="1">回复</span></p>
	
	                    <!--回复的弹出框-->
	                    <div class="m-publish details_stair" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
			                <div class="wp">
			                    <div class="content" style="position: relative;">
			                        <div class="top" style="margin-top: 0px;">
			                            <a href="javascript:;" class="emotion" style="background-image: url(/resource/m/images/q-icon38.png);"></a>
			                        </div>
			                        <textarea id="saytext<?php echo $this->_tpl_vars['vo']['uid']; ?>
" placeholder="写下您的感受......."></textarea>
			                        <?php if (! $this->_tpl_vars['user']): ?> 
			                        <div class="nologin">
			                            <div class="nologinbtn">
			                                <a href="/index.php?m=wap&c=index&v=login" target="_blank">登陆</a>
			                                <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
			                            </div>
			                        </div>
			                        <?php endif; ?>
			                    </div>
			                    <a href="javascript:;" class="btn btnComment_Review" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-class="1" data-name="">发表回复</a>
			                </div>
			            </div>
			            
			            <!--评论下面的回复-->
			            <div class="blockquote_wrap" data-i="0">
	                        <!--<blockquote class="comment_blockquote">
	                        	<div class="comment_floor">1</div>
	                        	<div class="comment_conWrap">
	                        		<div class="comment_con"><span class="name">用户名</span><p class="matter"> 嗯嗯嗯，测试下</p></div>
	                        	</div>
	                        	<p class="reply"><span class="reply_" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
" data-open="0" data-class="2">回复</span></p>
	                        	<!--回复的弹出框-->
			                    <!--<div class="m-publish details_" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
">
					                <div class="wp">
					                    <div class="content" style="position: relative;">
					                        <div class="top" style="margin-top: 0px;">
					                            <a href="javascript:;" class="emotion" style="background-image: url(/resource/m/images/q-icon38.png);"></a>
					                        </div>
					                        <textarea id="saytext<?php echo $this->_tpl_vars['vo']['uid']; ?>
" placeholder="写下您的感受......."></textarea>
					                        <?php if (! $this->_tpl_vars['user']): ?> 
					                        <div class="nologin">
					                            <div class="nologinbtn">
					                                <a href="/index.php?m=wap&c=index&v=login" target="_blank">登陆</a>
					                                <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
					                            </div>
					                        </div>
					                        <?php endif; ?>
					                    </div>
					                    <a href="javascript:;" class="btn btnComment_" data-uid="<?php echo $this->_tpl_vars['vo']['uid']; ?>
">发表回复</a>
					                </div>
					            </div>
	                        </blockquote>-->
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
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
	                <?php endforeach; endif; unset($_from); ?>
	            </ul>
	        </div>
	        <?php endif; ?>
            <!-- 页码 end-->
            
            <!--评论-->
            <div class="m-publish">
                <div class="wp">
                    <div class="content" style="position: relative;">
                        <div class="top" style="margin-top: 0px;">
                            <a href="javascript:;" class="emotion" style="background-image: url(/resource/m/images/q-icon38.png);"></a>
                        </div>
                        <textarea id="saytext" placeholder="写下您的感受......."></textarea>
                        <?php if (! $this->_tpl_vars['user']): ?> 
                        <div class="nologin">
                            <div class="nologinbtn">
                                <a href="/index.php?m=wap&c=index&v=login" target="_blank">登陆</a>
                                <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <a href="javascript:;" class="btn btnComment">发表评论</a>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/rytdetai.js"></script>
    <!-- 分享 -->
    <script type="text/javascript">
        window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdText": "",
                "bdMini": "2",
                "bdMiniList": false,
                "bdPic": "",
                "bdStyle": "0",
                "bdSize": "16"
            },
            "share": {}
        };
        $('.emotion').qqFace({
            id : 'facebox', 
            assign:'saytext', 
            path:'/resource/arclist/' //表情存放的路径
        });
        with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
        $('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zanryt", {
                'id':id
            }, function(data){
                if(data.status == 1){ 
                    $(obj).html('<i style="background-image: url(/resource/m/images/i-zan.png)"></i>'+(num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
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