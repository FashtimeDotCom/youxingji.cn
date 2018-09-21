<?php /* vpcvcms compiled created on 2018-09-19 16:03:07
         compiled from wap/user/new_tv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/user/new_tv.tpl', 53, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的视频</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/commonList.css" />
    <style type="text/css">
    	.m-pop1-yz .con{overflow: inherit;}
    	.m-pop1-yz .con iframe{overflow: hidden;}
    	.m-pop1-yz .con .close{top: -44px;}
    	.m-pop1-yz .con .close span{background: #221414 url(/resource/m/images/icon-close2.png) no-repeat center center / 68%;}
    </style>
</head>
<body class="">
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>我的视频</h3>
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
	        <a class="backdrop fix" href=""><img src="<?php echo $this->_tpl_vars['user']['cover']; ?>
" title="背景图" alt=""></a>
	        <div class="head fix">
	        	<div class="profilePhoto"><img class="" src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt=""></div>
	        	<p class="wx_name"><?php echo $this->_tpl_vars['user']['username']; ?>
</p>
	        	<p class="signature fix" title="个性签名">
	        		<span class="icon_location1"></span>
	        		<img class="icon_location2" src="/resource/m/images/common/icon_location1.png" />
	        		<span class="autograph"><?php echo $this->_tpl_vars['user']['city']; ?>
&nbsp;<?php echo $this->_tpl_vars['user']['autograph']; ?>
</span>
	        	</p>
	        	<div class="bottom fix">
	        		<p class="left"><span id="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'follownum') : smarty_modifier_helper($_tmp, 'follownum')); ?>
</span>关注</p>&nbsp;&nbsp;&nbsp;<p class="right"><span id="fans"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'fansnum') : smarty_modifier_helper($_tmp, 'fansnum')); ?>
</span>粉丝</p>
	        	</div>
	        </div>
	    </div>
	    <div class="row-TV">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=user&v=travel">日志&nbsp;<i class="Iclass" id="travel_num"><?php echo $this->_tpl_vars['total']['travel_num']; ?>
</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=user&v=tv">视频&nbsp;<i class="Iclass" id="tv_num"><?php echo $this->_tpl_vars['total']['tv_num']; ?>
</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=travel_note">游记&nbsp;<i class="Iclass" id="note_num"><?php echo $this->_tpl_vars['total']['note_num']; ?>
</i></a></li>
	                    <li><a href="javascript:;">问答&nbsp;<i class="Iclass" id="answer"><?php echo $this->_tpl_vars['total']['answer']; ?>
</i></a></li>
	                </ul>
	            </div>
	        </div>
	        <?php if ($this->_tpl_vars['list']): ?>
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item item_<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="wp fix">
							<p class="videoTitle"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
							<div class="date"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
							<p class="videoDetails"><?php echo $this->_tpl_vars['item']['describes']; ?>
</p>
							<div class="preview fix">
								<a href="#m-pop1-yz" class="pic js-video fix" data-src="<?php echo $this->_tpl_vars['item']['url']; ?>
">
									<img src="<?php echo $this->_tpl_vars['item']['pics']; ?>
" alt="">
									<span class="bo"></span>
								</a>
							</div>
							<div class="videoBottom">
								<span class="left"><img class="" src="/resource/m/images/common/icon_location2.png" /><?php echo $this->_tpl_vars['item']['address']; ?>
</span>
								<p class="right">
									<span class="check">
										<img class="" src="/resource/m/images/common/icon_check.png" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['item']['shownum']; ?>
" /><?php echo $this->_tpl_vars['item']['shownum']; ?>

									</span>&nbsp;&nbsp;
									<a class="zan" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['item']['topnum']; ?>
" href="javascript:;">
										<span class="like">
											<img class="" src="/resource/m/images/common/icon_like.png" /><i class="Iclass"><?php echo $this->_tpl_vars['item']['topnum']; ?>
</i>
										</span>
									</a>&nbsp;&nbsp;
									<a class="Areview" href="javascript:;"><span class="review"><img class="" src="/resource/m/images/common/icon_review.png" />0</span></a>
								</p>
							</div>
							<div class="pullDownMenu fix">
								<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />
								<div class="pullDownNav fix dis_none">
									<a class="collect" href="/index.php?m=wap&c=user&v=edittv&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><span>编辑</span></a>
									<a class="cancel" href="javascript:;" onclick="deleteTv(<?php echo $this->_tpl_vars['item']['id']; ?>
)"><span>删除</span></a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
	        	</div>
				<p class="tips"></p>
	        </div>
	        <?php else: ?>
	        <div class="m-mytv-yz">
	            <div class="m-myday-yz">
	                <div class="wp fix">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_tv_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">最原创的旅拍视频，最暖心的旅行推荐，由你打造</div>
	                    </div>
	                    <div class="top">
	                        <a href="/index.php?m=wap&c=user&v=addtv" class="shoot">发布视频</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	    <!-- 视频弹窗 -->
	    <div class="m-pop1-yz" id="m-pop1-yz">
	        <div class="con">
	            <iframe src='' name="myiframe" frameborder=0 'allowfullscreen' id="myiframe"></iframe>
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
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var tv_num = parseInt($("#tv_num").text());
    		var maxPages = parseInt(Math.ceil(tv_num/4));//最大页数
    		$("#pageCount").attr("data-page",maxPages);
    		if (tv_num>=5) {
    			$(".tips").text("往下拖动查看更多！");
    		} else{
    			$(".tips").text("我也是有底线的哦~");
    		}
    	}

		var scrollTop;     //获取滚动条到顶部的距离
	    var scrollHeight;  //获取文档区域高度 
	    var windowHeight;  //获取滚动条的高度
	    var flag = true;   //加载数据标志
	    $(window).scroll(function(){
	        scrollTop = $(this).scrollTop();     
	        scrollHeight = $(document).height(); 
	        windowHeight = $(this).height();
	        var e;
		    var tv_num = parseInt($("#tv_num").text());//总数量
		    
			var maxPages = parseInt(Math.ceil(tv_num/4));//最大页数
			var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
			var page=NowPage+1;
	        if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
	        	if (NowPage+1<=maxPages) {
		            $.ajax({
		                url:'index.php?m=api&c=tv&v=self_tv',
		                data:{page:page},
		                method:'post',
		                dataType:'json',
		                beforeSend:function(){
		                	$(".tips").text("");
							$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
		                    flag = false;
		                },
		                success:function( data ){
		                    if(data.status == 1){
			                	var html="";
			                	$.each(data.tips,function(i,item){
			            			html += '<div class="item item_'+ data.tips[i].id+'">'+
												'<div class="wp fix">'+
													'<p class="videoTitle">'+data.tips[i].title+'</p>'+
													'<div class="date">'+data.tips[i].addtime+'</div>'+
													'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
													'<div class="preview fix">'+
														'<a href="#m-pop1-yz" class="pic js-video fix" data-src="'+data.tips[i].url+'">'+
															'<img src="'+data.tips[i].pics+'" alt="">'+
															'<span class="bo"></span>'+
														'</a>'+
													'</div>'+
													'<div class="videoBottom">'+
														'<span class="left"><img class="" src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
														'<p class="right">'+
															'<a class="" href="javascript:;">'+
																'<span class="check">'+
																	'<img class="" src="/resource/m/images/common/icon_check.png" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].shownum+'" />'+data.tips[i].shownum+''+
																'</span>'+
															'</a>&nbsp;&nbsp;'+
															'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
																'<span class="like">'+
																	'<img class="" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
																'</span>'+
															'</a>&nbsp;&nbsp;'+
															'<a class="Areview" href="javascript:;"><span class="review"><img class="" src="/resource/m/images/common/icon_review.png" />0</span></a>'+
														'</p>'+
													'</div>'+
													'<div class="pullDownMenu fix">'+
														'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
														'<div class="pullDownNav fix dis_none">'+
															'<a class="collect" href="/index.php?m=wap&c=user&v=edittv&id='+data.tips[i].id+'"><span>编辑</span></a>'+
															'<a class="cancel" href="javascript:;" onclick="deleteTv('+data.tips[i].id+')"><span>删除</span></a>'+
														'</div>'+
													'</div>'+
												'</div>'+
											'</div>';
			                   });
			                    $(".content").append(html);
			                    $("#pageCount").attr("data-NowPage",NowPage+1);
			                    if (NowPage+1<maxPages) {
			                		$(".tips").text("往下拖动查看更多！");
			                	}else{
			                		$(".tips").text("我也是有底线的~");
			                	}
			                }else{
			                    layer.msg(data.tips);
			                }
			                commonality();
		                },
		                complete:function(){
		                    if (NowPage+1<maxPages) {
		                		$(".tips").text("往下拖动查看更多！");
		                		flag = true;
		                	}else{
		                		$(".tips").text("我也是有底线的~");
		                		flag = false;
		                	}
		                }
		            });
		        }else{
            		$(".tips").text("我也是有底线的~");
            	}
	        }
	    });
		function commonality(){
			//点击下拉
		    $('.icon_pullDown').on("click",function(){
		    	if ( $(this).next(".pullDownNav").attr("class")=="pullDownNav fix dis_none") {
		    		$(".pullDownNav").addClass("dis_none");
		    		$(this).next(".pullDownNav").removeClass("dis_none");
		    		$(".maskLayer").removeClass("dis_none");
		    	}
		    });
			
		    //点击遮罩层显示
		    $('.maskLayer').on("click",function() {
		    	$(".maskLayer,.pullDownNav").addClass("dis_none");
		    });
		    
		    //点赞
		    $('.zan').click(function() {
	            var id = $(this).attr('data-id');
	            var num = parseInt($(this).attr('data-num'));
	            var textNum = parseInt($(this).find("i").text());
	            var obj = $(this);
	            $.post("/index.php?m=api&c=index&v=zantv", {
	                'id':id
	            }, function(data){
	                if(data.status == 1){
	                	$(obj).find("img").attr("src","/resource/m/images/common/icon_like2.png");
	                    $(obj).find("i").text(num+1);
	                }else{
	                    layer.msg(data.tips);
	                }
	            },"JSON");
	            
	        });
	        //评论
	        $(".Areview").on("click",function(){
	        	layer.msg('此功能暂未开放，敬请期待！');
	        });

		    $('.js-video').click(function(event) {
		        var _id = $(this).attr("href");
		        var _src = $(this).attr("data-src");

		        $(_id).find("iframe").attr("src", _src);
		        $(_id).fadeIn();
		    });
		    
		    //关闭视频
		    $('.js-close').click(function(event){
		        $(this).parents('.m-pop1-yz').fadeOut();
		        var myiframe1 = $(this).parents('#m-pop1-yz').find("iframe").attr("src");
		        $(this).parents('#m-pop1-yz').find("iframe").attr("src", myiframe1);
		        
		        event.stopPropagation();
		    });
		}
		commonality();
		
	    function deleteTv(id){
	    	$(".maskLayer,.pullDownNav").addClass("dis_none");
	        layer.msg('您确定要删除吗？', {
	            btn: ['确认', '取消'],
	            yes: function (index) {
	                $.post("/index.php?m=api&c=index&v=deletetv", {
	                    'id':id
	                }, function(data){
	                    if(data.status == 1){
	                    	var tv_num = parseInt($("#tv_num").text());
	                    	$("#tv_num").text(tv_num-1);
	                        $('.item_'+id).remove();
	                    }
	                },"JSON");
	                layer.close(index);
	            }
	        });
	    }
	</script>
</body>
</html>