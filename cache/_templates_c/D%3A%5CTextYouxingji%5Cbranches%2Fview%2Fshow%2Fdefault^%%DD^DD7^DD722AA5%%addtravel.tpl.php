<?php /* vpcvcms compiled created on 2019-01-10 18:22:51
         compiled from user/addtravel.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-发布日志</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" href="/resource/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/resource/webuploader/webuploader.css">
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" type="text/css" href="/resource/css/addtravel.css"/>
</head>
<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="wp">
        	<!--菜单-->
           	<ul class="ul-tab-lb1">
				<li class="on">
					<a href="/index.php?m=index&c=user&v=addtravel">
						<h4>发表日志</h4><p>用九宫格定格您的每一个动人时刻</p>
					</a>
				</li>
				<li><a href="/index.php?m=index&c=user&v=addtv">
						<h4>发表视频</h4><p>最原创的旅拍，最独特的旅行视角</p>
					</a>
				</li>
				<li><a href="/index.php?m=index&c=user&v=travel_note">
						<h4>发表游记</h4><p>用”长篇大论“记录您的美好旅程</p>
					</a>
				</li>
				<li><a href="/index.php?m=index&c=user&v=set_question">
						<h4>发表问题</h4><p>用文字 记录您旅程的疑问与好奇</p>
					</a>
				</li>
			</ul>

			<!--正文填写内容-->
            <div class="m-con-lb1">
                <div class="col-l">
                    <div class="m-edit-lb">
                        <div class="tit"><input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['title']; ?>
" id="title" placeholder="请在这里输入标题"></div>
                        <div class="tit">
                            <textarea type="text" class="inp txta1" id="describe" placeholder="请在这里输入描述" onkeyup="judgeIsNonNull1(this)"><?php echo $this->_tpl_vars['res']['describe']; ?>
</textarea>
                          	<p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
                        </div>
                        
                        <!-- /.webuploader 上传方法 -->
						<div class="page-body">
							<div id="post-container" class="container">
							    <div class="page-container">
									<div id="uploader" class="wu-example">
									    <div class="queueList">
									        <div id="dndArea" class="placeholder<?php if ($this->_tpl_vars['res']['content']['0'] != ''): ?> element-invisible<?php endif; ?>">
									            <div id="filePicker"></div>
									            <p>或将照片拖到这里，单次最多可选<i class="Iclass">9</i>张</p>
									        </div>
									        <?php if ($this->_tpl_vars['res']['content']['0'] != '' || $this->_tpl_vars['res']['content']['1'] != ''): ?>
									        <ul class="filelist filelist1" data-exist="1">
									        	<input type="hidden" name="" id="" value="<?php echo $this->_tpl_vars['res']['content']; ?>
" />
									        	<!--下面这个 FOR循坏 是给草稿箱用的-->
                                    			<?php $_from = $this->_tpl_vars['res']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
									        	<li id="WU_FILE_<?php echo $this->_tpl_vars['k']; ?>
" class="state-complete">
									        		<p class="title">2.png</p>
									        		<p class="imgWrap"><img src="<?php echo $this->_tpl_vars['vo']; ?>
"></p>
									        		<p class="progress"><span></span></p>
									        		<div class="file-panel" style="height: 0px;">
									        			<span class="cancel">删除</span><span class="rotateRight">向右旋转</span><span class="rotateLeft">向左旋转</span>
									        		</div>
									        	</li>
                                    			<?php endforeach; endif; unset($_from); ?>
									        </ul>
									        <?php endif; ?>
									    </div>
									    <div class="statusBar" style="display:none;">
									        <div class="progress">
									            <span class="text">0%</span>
									            <span class="percentage"></span>
									        </div><div class="info"></div>
									        <div class="btns">
									            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
									        </div>
									    </div>
									</div>
							    </div>
							</div>
						</div>
                        
                        <div class="layui-upload dis_none">
                        	<button type="button" class="layui-btn" id="layui_upload_icon"><i class="layui-icon">&#xe67c;</i>上传图片</button>

                            <blockquote class="layui-elem-quote layui-quote-nm" id="picslist" style="margin-top: 10px;<?php if ($this->_tpl_vars['res']['content']['0'] == ''): ?>display:none;<?php endif; ?>padding-bottom: 0px;width: 524px;padding-right: 0px;">
                                <div class="layui-upload-list" id="piclist">
                                	
                                	<!--下面这个 FOR循坏 是给草稿箱用的-->
                                    <?php $_from = $this->_tpl_vars['res']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                                    <div class="upic">
                                    	<img src="<?php echo $this->_tpl_vars['vo']; ?>
" class="layui-upload-img">
                                    	<i class="iz layui-icon left">&#xe603;</i>
                                    	<i class="iz layui-icon" onclick="deletepic(this)">&#xe640;</i>
                                    	<i class="iz layui-icon right">&#xe602;</i>
                                    </div>
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                            </blockquote>
                        </div>
                        <br>
                        <div class="fabu">
							<input type="hidden" name="did" value="<?php echo $this->_tpl_vars['did']; ?>
" id="did" title="草稿箱的ID">
							<input type="submit"  class="subbtn" id="btnAdd" value="发布">
							<input type="button"  class="sub" onclick="javascript:window.history.back(-1);" value="取消" />
							<input type="button" class="sub"  id="btnDraft" value="保存草稿" />
							<div class="xieyi">
								<label><input type="checkbox" checked>我已阅读并同意<a href="/article/hyzn">《游行迹协议》</a></label>
							</div>
						</div>
                    </div>
                </div>
                
                <!--右侧轮播-->
                <div class="col-r">
                    <div class="m-list-lb1">
                        <div class="tit">热门推荐</div>
                        <div class="m-pic2-qm">
                            <div class="slider">
                                <?php $_from = C::T('ad')->getList(array('tagname' => 'addtravel'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
                                <div class="item">
                                    <a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
" target="_blank">
                                        <div class="pic">
                                            <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" alt="">
                                            <span><?php echo $this->_tpl_vars['adlist']['adname']; ?>
</span>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        </div>
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
    <!--轮播 开始-->
  	<link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
  	<script type="text/javascript">
        $('.m-pic2-qm .slider').slick({
	        dots: false,
	        arrows: true,
	        autoplay: true,
	        slidesToShow: 1,
	        autoplaySpeed: 5000,
	        pauseOnHover: false,
	        lazyLoad: 'ondemand'
	    });
    </script>
    <!--轮播结束-->

    <script src="/resource/layui/layui.all.js"></script>
    <script type="text/javascript">
//  	//监控 正文内容输入框 ，包括粘贴板
//		function judgeIsNonNull1(obj){
//			var value = $(obj).val();
//			var x = event.which || event.keyCode;
//			if( value.length <= 255 ){
//				//console.log("符合255位数以内");
//			} else{
//				return $(obj).val(value.substr(0, 255));
//			}
//			var remain = $(obj).val().length;
//			if(remain > 255){
//				$(obj).val(setString($(obj).val(),255));
//				$('#contentwordage').html(255-remain);
//			}else{
//				$('#contentwordage').html(255-remain);
//			}
//		}
//		//监控 正文内容输入框 ，包括粘贴板
//		$("#describe").bind('input propertychange', function(){
//			judgeIsNonNull1(event);
//		});
console.log(<?php echo $this->_tpl_vars['res']['content']['id']; ?>
);
    </script>
    <script src="/resource/js/exif.min.js" title="校正图片方向"></script>
    <script type="text/javascript" src="/resource/webuploader/webuploader.js"></script>
    <script src="/resource/webuploader/addtravel.js"></script>
</body>
</html>