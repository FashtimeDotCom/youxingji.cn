<?php /* vpcvcms compiled created on 2018-10-12 17:52:14
         compiled from wap/faq/faq_list.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人问答-问题列表</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/faq_list.css" />
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>达人问答</h3>
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
	    <div class="ban marginBotom">
	        <div class="backdrop fix">
				<img src="<?php echo $this->_tpl_vars['ad']['imgurl']; ?>
" title="海报">
			</div>
	    </div>
	    
	    <div class="navMeun marginBotom fix">
	    	<div class="navLi on" onclick="choice(0)">热门问答</div>
	    	<div class="navLi" onclick="choice(1)">最新问答</div>
	    	<div class="navLi" onclick="choice(2)">待回答问题</div>
	    </div>
	    
	    <div class="container fix" data-index="1">
	    	<!--热门问答  列表-->
	    	<input type="hidden" name="" id="modulesNum1" title="热门问答的总数" value="<?php echo $this->_tpl_vars['total']['hot']; ?>
" />
	    	<div class="modules fix" id="modules1" data-page="" data-nowPage="1">
	    		<?php if ($this->_tpl_vars['list']): ?>
	    		<div class="matter1 fix">
					<?php if ($this->_tpl_vars['list'][0]): ?>
					<?php $_from = $this->_tpl_vars['list'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="hunk marginBotom fix">
						<a class="vessel fix" href="/index.php?m=wap&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<p class="title fix"><span class="name omit lineNumber2 maxWidth"><?php echo $this->_tpl_vars['item']['title']; ?>
</span><span class="botton" title="标签"><?php echo $this->_tpl_vars['item']['label'][0]; ?>
</span></p>
							<div class="headPortrait fix">
								<?php if ($this->_tpl_vars['item']['thumbfile']): ?>
								<div class="thumbnail"><img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
"/></div>
								<?php endif; ?>
								<p class="description omit"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
							</div>
							<div class="bottom fix">
								<div class="left FontSize marginLeft fix">
									<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span></span>
									<span class="name omit lineNumber2"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>
									<div class="right fix">
										<div class="fix"><span class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</span></div>
										<div class="fix">
											<span class="browseNum"><?php echo $this->_tpl_vars['item']['show_num']; ?>
浏览</span>&nbsp;·&nbsp;<span class="assistNum"><?php echo $this->_tpl_vars['item']['response_num']; ?>
回答数</span>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
	    		</div>
	    		
	    		<!--问达人-->
	    		<div class="asking fix">
	    			<p class="title">问达人</p>
	    			<div class="swiper-container" id="bannerSwiper1">
						<div class="swiper-wrapper">
							<?php if ($this->_tpl_vars['star_list']): ?>
							<?php $_from = $this->_tpl_vars['star_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="swiper-slide">
								<div class="pic fix"><span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span></div>
								<p class="name apostrophe"><?php echo $this->_tpl_vars['item']['username']; ?>
</p>
								<p class="creative FontSize"></p>
								<a class="check" href="/index.php?m=wap&c=muser&v=ta_faq&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">查看问答</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</div>
					</div>
	    		</div>
	    		
	    		<div class="matter2 fix">
					<?php if ($this->_tpl_vars['list'][1]): ?>
					<?php $_from = $this->_tpl_vars['list'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="hunk marginBotom fix">
						<a class="vessel fix" href="/index.php?m=wap&c=faq&v=detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
							<p class="title fix"><span class="name omit lineNumber2 maxWidth"><?php echo $this->_tpl_vars['item']['title']; ?>
</span><span class="botton" title="标签"><?php echo $this->_tpl_vars['item']['label'][0]; ?>
</span></p>
							<div class="headPortrait fix">
								<?php if ($this->_tpl_vars['item']['thumbfile']): ?>
								<div class="thumbnail"><img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
"/></div>
								<?php endif; ?>
								<p class="description omit"><?php echo $this->_tpl_vars['item']['desc']; ?>
</p>
							</div>
							<div class="bottom fix">
								<div class="left FontSize marginLeft fix">
									<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span></span>
									<span class="name omit lineNumber2"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>
									
									<div class="right fix">
										<div class="fix"><span class="time"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</span></div>
										<div class="fix">
											<span class="browseNum"><?php echo $this->_tpl_vars['item']['show_num']; ?>
浏览</span>&nbsp;·&nbsp;<span class="assistNum"><?php echo $this->_tpl_vars['item']['response_num']; ?>
回答数</span>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
	    		</div>
	    		<div class="matter fix"></div>
	    		<p class="tips tips1"></p>
	    		
	    		<?php else: ?>
	    		<!--问达人-->
	    		<div class="asking fix">
	    			<p class="title">问达人</p>
	    			<div class="swiper-container" id="bannerSwiper1">
						<div class="swiper-wrapper">
							<?php if ($this->_tpl_vars['star_list']): ?>
							<?php $_from = $this->_tpl_vars['star_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<div class="swiper-slide">
								<div class="pic fix"><span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span></div>
								<p class="name apostrophe"><?php echo $this->_tpl_vars['item']['username']; ?>
</p>
								<p class="creative FontSize"></p>
								<a class="check" href="/index.php?m=wap&c=muser&v=ta_faq&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">查看问答</a>
							</div>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</div>
					</div>
	    		</div>
	    		
	    		<div class="empty1 fix">
	    			<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	    			<p class="tipsButtom">暂无信息</p>
	    		</div>
	    		<?php endif; ?>
	    	</div>
	    	
	    	<!--最新问答  列表-->
	    	<input type="hidden" name="" id="modulesNum2" title="最新问答的总数" value="<?php echo $this->_tpl_vars['total']['new']; ?>
" />
	    	<div class="modules fix faq_list dis_none" id="modules2" data-page="" data-nowPage="1">
	    		<div class="matter2 fix"></div>
	    		<div class="matter fix"></div>
	    		<div class="empty2 fix dis_none">
	    			<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	    			<p class="tipsButtom">暂无信息</p>
	    		</div>
	    		<p class="tips tips2"></p>
	    	</div>
	    	
	    	<!--待回答问题  列表-->
	    	<input type="hidden" name="" id="modulesNum3" title="待回答问题的总数" value="<?php echo $this->_tpl_vars['total']['waiting']; ?>
" />
	    	<div class="modules fix faq_list dis_none" id="modules3" data-page="" data-nowPage="1">
	    		<div class="matter3 fix"></div>
	    		<div class="matter fix"></div>
	    		<div class="empty3 fix dis_none">
	    			<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	    			<p class="tipsButtom">暂无信息</p>
	    		</div>
	    		<p class="tips tips3"></p>
	    	</div>
	    </div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var num1 = parseInt($("#modulesNum1").val());//旅游达人的总数
    		var num2 = parseInt($("#modulesNum2").val());//达人练习生的总数
    		var num3 = parseInt($("#modulesNum3").val());//达人练习生的总数
    		
    		var maxPages1 = parseInt(Math.ceil(num1/4));//旅游达人的最大页数
    		var maxPages2 = parseInt(Math.ceil(num2/4));//达人练习生的最大页数
    		var maxPages3 = parseInt(Math.ceil(num3/4));//达人练习生的最大页数
    		
    		$("#modules1").attr("data-page",maxPages1);
    		$("#modules2").attr("data-page",maxPages2);
    		$("#modules3").attr("data-page",maxPages3);
    		
    		if (num1>=5) {
    			$(".tips1").text("往下拖动查看更多！");
    		} else{
    			$(".tips1").text("我也是有底线的哦~");
    		}
    		if (num2>=5) {
    			$(".tips2").text("往下拖动查看更多！");
    		} else{
    			$(".tips2").text("我也是有底线的哦~");
    		}
    		if (num3>=5) {
    			$(".tips3").text("往下拖动查看更多！");
    		} else{
    			$(".tips3").text("我也是有底线的哦~");
    		}
    	}
        
        var swiper1 = new Swiper('#bannerSwiper1', {
				slidesPerView: 2.5,
				spaceBetween : 10,//在slide之间设置距离（单位px）
				observer:true, //当改变swiper的样式（例如隐藏/显示）或者修改swiper的子元素时，自动初始化swiper
    			observeParents:true,//将observe应用于Swiper的父元素。当Swiper的父元素变化时，例如window.resize，Swiper更新
				//loop: true,
				autoplay: {
					delay: 3000,
					stopOnLastSlide: false,//设置为true，当切换到最后一个slide时停止自动切换。（loop模式下无效）。
					disableOnInteraction: true,//用户操作swiper之后，是否禁止autoplay。默认为true：停止
				}
			});
        
        var flag = true;   //加载数据标志
        //切换菜单
        function choice(tab){
        	$(".navLi").eq(tab).addClass("on");
        	$(".navLi").eq(tab).siblings().removeClass("on");
        	
        	$(".container .modules").eq(tab).removeClass("dis_none");
        	$(".container .modules").eq(tab).siblings().addClass("dis_none");
        	
        	$(".container").attr("data-index",tab+1);
        	
        	flag = true;   //加载数据标志
        	

        	var num = parseInt($("#modulesNum"+(tab+1)).val());//总数
    		var NowPage = parseInt( $("#modules"+(tab+1)).attr("data-nowPage") );//当前页数
	    	maxPages = parseInt(Math.ceil(num/4));//旅游达人的最大页数
	    	if( NowPage<=maxPages ){//判断是否已到达最大页数，防止点击切换重复请求
	    		if( tab == 1 || tab == 2 ){
	    			$("#modules"+(tab+1)+" .matter"+(tab+1)).html("");
	        		tapTotoggle(tab+1);
	        	}
	    	}
	        	
        }
		
		function tapTotoggle(tab){
	        //判断列表的总数量是否大于等于5
    		var num = parseInt($("#modulesNum"+tab).val());//总数
    		var NowPage = parseInt( $("#modules"+tab).attr("data-nowPage") );//当前页数
	    	maxPages = parseInt(Math.ceil(num/4));//旅游达人的最大页数
			
			$.ajax({
                url:'/index.php?m=api&c=faq&v=get_more',
                data:{page:NowPage,type:tab},
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
			        		html += '<div class="hunk marginBotom fix">'+
										'<a class="vessel fix" href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'">'+
											'<p class="title fix"><span class="name omit lineNumber2">'+data.tips[i].title+'</span></p>'+
											'<div class="headPortrait fix">'+
												'<div class="thumbnail"><img src="'+data.tips[i].thumbfile+'"/></div>'+
												'<p class="description omit">'+data.tips[i].desc+'</p>'+
											'</div>'+
											'<div class="bottom fix">'+
												'<div class="left FontSize marginLeft fix">'+
													'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>'+
													'<span class="name omit lineNumber2">'+data.tips[i].username+'</span>'+
													'<div class="right fix">'+
														'<div class="fix"><span class="time">'+data.tips[i].addtime+'</span></div>'+
														'<div class="fix">'+
															'<span class="browseNum">'+data.tips[i].show_num+'浏览</span>&nbsp;·&nbsp;<span class="assistNum">'+data.tips[i].response_num+'回答数</span>'+
														'</div>'+
													'</div>'+
												'</div>'+
											'</div>'+
										'</a>'+
									'</div>';
			           	});
			           	$("#modules"+tab+" .matter"+tab).append(html);
	                    if (NowPage+1<maxPages) {
	                		$(".tips"+tab).text("往下拖动查看更多！");
	                	}else{
	                		$(".tips"+tab).text("我也是有底线的哦~");
	                	}
	                }else{
	                    //layer.msg(data.tips);
	                    $(".empty"+tab).removeClass("dis_none");
	                    $(".tips"+tab).addClass("dis_none");
	                }
                },
                complete:function(){
                    if (NowPage+1<=maxPages) {
                		$(".tips"+tab).text("往下拖动查看更多！");
                		flag = true;
                	}else{
                		$(".tips"+tab).text("我也是有底线的哦~");
                		flag = false;
                	}
                }
            });
		}

		var scrollTop;     //获取滚动条到顶部的距离
	    var scrollHeight;  //获取文档区域高度 
	    var windowHeight;  //获取滚动条的高度
	    
	    $(window).scroll(function(){
	        scrollTop = $(this).scrollTop();     
	        scrollHeight = $(document).height(); 
	        windowHeight = $(this).height();
	        var e;
	        
			var dataIndex = parseInt($(".container").attr("data-index"));
	        
	        //判断列表的总数量是否大于等于5
    		var num1 = parseInt($("#modulesNum"+dataIndex).val());//总数
    		
    		maxPages = parseInt(Math.ceil(num1/4));//旅游达人的最大页数
    		
			var NowPage = parseInt( $("#modules"+dataIndex).attr("data-nowPage") );//当前页数
    		
			var page=NowPage+1;
			if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
	        	if (NowPage+1<=maxPages){
		            $.ajax({
		                url:'/index.php?m=api&c=faq&v=get_more',
		                data:{page:page,type:dataIndex},
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
			                	if (dataIndex==1) {
			                		$.each(data.tips,function(i,item){
				                		var label = data.tips[i].label;
				                		var str2=label.substring(0,label.indexOf("/"));
				                		html += '<div class="hunk marginBotom fix">'+
													'<a class="vessel fix" href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'">'+
														'<p class="title fix"><span class="name omit lineNumber2 maxWidth">'+data.tips[i].title+'</span><span class="botton" title="标签">'+str2+'</span></p>'+
														'<div class="headPortrait fix">'+
															'<div class="thumbnail"><img src="'+data.tips[i].thumbfile+'"/></div>'+
															'<p class="description omit">'+data.tips[i].desc+'</p>'+
														'</div>'+
														'<div class="bottom fix">'+
															'<div class="left FontSize marginLeft fix">'+
																'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>'+
																'<span class="name">'+data.tips[i].username+'</span>'+
																
																'<div class="right fix">'+
																	'<div class="fix"><span class="time">'+data.tips[i].addtime+'</span></div>'+
																	'<div class="fix">'+
																		'<span class="browseNum">'+data.tips[i].show_num+'浏览</span>&nbsp;·&nbsp;<span class="assistNum">'+data.tips[i].response_num+'回答数</span>'+
																	'</div>'+
																'</div>'+
															'</div>'+
														'</div>'+
													'</a>'+
												'</div>';
				                   	});
				                   	
			                	} else{
			                		$.each(data.tips,function(i,item){
						        		html += '<div class="hunk marginBotom fix">'+
													'<a class="vessel fix" href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'">'+
														'<p class="title fix"><span class="name omit lineNumber2">'+data.tips[i].title+'</span></p>'+
														'<div class="headPortrait fix">'+
															'<div class="thumbnail"><img src="'+data.tips[i].thumbfile+'"/></div>'+
															'<p class="description omit">'+data.tips[i].desc+'</p>'+
														'</div>'+
														'<div class="bottom fix">'+
															'<div class="left FontSize marginLeft fix">'+
																'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>'+
																'<span class="name omit lineNumber2">'+data.tips[i].username+'</span>'+
																'<div class="right fix">'+
																	'<div class="fix"><span class="time">'+data.tips[i].addtime+'</span></div>'+
																	'<div class="fix">'+
																		'<span class="browseNum">'+data.tips[i].show_num+'浏览</span>&nbsp;·&nbsp;<span class="assistNum">'+data.tips[i].response_num+'回答数</span>'+
																	'</div>'+
																'</div>'+
															'</div>'+
														'</div>'+
													'</a>'+
												'</div>';
						           	});
			                	}
			                	$("#modules"+dataIndex+" .matter").append(html);
				                $("#modules"+dataIndex).attr("data-NowPage",NowPage+1);
		                   		
			                    if (NowPage+1<maxPages) {
			                		$(".tips"+dataIndex).text("往下拖动查看更多！");
			                	}else{
			                		$(".tips"+dataIndex).text("我也是有底线的哦~");
			                	}
			                }else{
			                    //layer.msg(data.tips);
			                }
		                },
		                complete:function(){
		                    if (NowPage+1<maxPages) {
		                		$(".tips"+dataIndex).text("往下拖动查看更多！");
		                		flag = true;
		                	}else{
		                		$(".tips"+dataIndex).text("我也是有底线的哦~");
		                		flag = false;
		                	}
		                }
		            });
		        }else{
            		$(".tips"+dataIndex).text("我也是有底线的哦~");
            	}
	        }
	    });
	</script>
</body>
</html>