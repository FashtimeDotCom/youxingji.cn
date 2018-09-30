<?php /* vpcvcms compiled created on 2018-09-30 20:07:29
         compiled from wap/faq/faq_detail.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>问题详情页</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/faq_detail.css" />
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>问题详情页</h3>
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

	    <div class="container fix">
	    	<!--问题-->
			<div class="hunk question marginBotom fix" data-id="<?php echo $this->_tpl_vars['faq_info']['id']; ?>
">
				<div class="title fix">
					<span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"/></span>
					<span class="name omit lineNumber2"><?php echo $this->_tpl_vars['faq_info']['title']; ?>
</span>
				</div>
				<div class="headPortrait fix"><p class="description"><?php echo $this->_tpl_vars['faq_info']['desc']; ?>
</p></div>
				
				<div class="bottom fix">
					<div class="topButtom transform FontSize">
						<span class="browseNum"><i><?php echo $this->_tpl_vars['faq_info']['show_num']; ?>
</i>浏览</span>&nbsp;·&nbsp;<span class="answerNum"><i><?php echo $this->_tpl_vars['total']; ?>
</i>回答</span>&nbsp;·&nbsp;<span class="assistNum"><i><?php echo $this->_tpl_vars['faq_info']['collection_num']; ?>
</i>收藏</span>
					</div>
					<div class="left transform FontSize fix" style="margin-left: -5px;"><img class="icon" src="/resource/m/images/user/icon_faq_detail2.png"/><?php echo $this->_tpl_vars['faq_info']['address']; ?>
</div>
					<div class="right transform FontSize fix"><span class="name"><?php echo $this->_tpl_vars['faq_info']['username']; ?>
</span>&nbsp;问于&nbsp;<span class="time"><?php echo $this->_tpl_vars['faq_info']['addtime']; ?>
</span></div>
				</div>
			</div>
	    	
	    	<!--答-->
	    	<input type="hidden" name="" id="answerNum" title="回答的总数" value="<?php echo $this->_tpl_vars['total']; ?>
" />
	    	<div class="modules answer marginBotom fix" id="answer" data-index="1" data-page="" data-nowPage="1">
	    		<div class="bigTitle">
	    			<span class="left">全部问答（<i><?php echo $this->_tpl_vars['total']; ?>
</i>）</span>
	    			<p class="right"><span class="key on" id="answerHeat">按热度</span>&nbsp;|&nbsp;<span class="key" id="answerTime">按时间</span></p>
	    		</div>
	    		<div class="matter fix">
					<?php if ($this->_tpl_vars['total'] > 0): ?>
					<!--有人回答-->
					<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="hunk fix">
						<div class="bottom fix">
							<div class="left transform FontSize fix marginLeft">
								<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url(<?php echo $this->_tpl_vars['item']['headpic']; ?>
);"></span></span>&nbsp;
								<span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span>
							</div>
							<div class="right transform FontSize fix"><span class="time" style="margin-right: -10px;"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</span></div>
						</div>
						<div class="substance fix">
							<div class="solution description"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
							<a class="readMore fix" href="javascript:;">
								<span class="coverage fix"></span>
								<span class="typeface">查看更多</span>
							</a>
						</div>

						<div class="bottom fix">
							<div class="topButtom transform FontSize" style="text-align: center;">
								<span class="replyNum"><i><?php echo $this->_tpl_vars['item']['show_num']; ?>
</i>浏览</span>&nbsp;·&nbsp;<span class="replyNum"><i><?php echo $this->_tpl_vars['item']['top_num']; ?>
</i>点赞</span>
							</div>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					
					<!--无人回答-->
					<?php else: ?>
					<div class="hunk">
						<img class="tips" src="/resource/m/images/user/defaul_travel_bg.png"/>
						<p class="depict">这个问题还没有人回答哦！<br />赶紧寻找达人回答吧！</p>
					</div>
					<?php endif; ?>
	    		</div>
	    	</div>
	    	<p class="tips"></p>
	    </div>
	</div>
	<div class="answerNav fix">
		<span class="left" onclick="collect(<?php echo $this->_tpl_vars['faq_info']['id']; ?>
)"><img src="/resource/m/images/user/icon_faq_detail3.png"/>&nbsp;收藏问题（<i class="collectNUM"><?php echo $this->_tpl_vars['faq_info']['collection_num']; ?>
</i>）</span>
		<span class="right"><a href="/index.php?m=wap&c=faq&v=set_faq&id=<?php echo $this->_tpl_vars['faq_info']['id']; ?>
"><img src="/resource/m/images/user/icon_faq_detail4.png"/>&nbsp;添加答案</a></span>
	</div>
	
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var answerNum = parseInt($("#answerNum").val());//回答的总数
    		var maxPages1 = parseInt(Math.ceil(answerNum/4));//回答的最大页数
    		
    		$("#answer").attr("data-page",maxPages1);
    		
    		if (answerNum>=5) {
    			$(".tips").text("往下拖动查看更多！");
    		} else{
    			$(".tips").text("没有更多信息咯~");
    		}
    	}
        
        $(".key").on("click",function(){
        	var index = $(this).index();
        	$(this).addClass("on");
        	$(this).siblings().removeClass("on");
        	$("#answer").attr("data-index",index+1);
        	$(".matter").html("");
        	buttons(index+1);
        });
		
		function buttons(tab){
			//判断列表的总数量是否大于等于5
    		var answerNum = parseInt($("#answerNum").val());//回答的总数
    		$("#answer").attr("data-nowPage",1);//当前页数
    		var maxPages = parseInt(Math.ceil(answerNum/4));//回答的最大页数
    		
    		$("#answer").attr("data-page",maxPages);
    		var $faq_info = parseInt( $(".question").attr("data-id") );//对应这个问题的ID
			$.ajax({
                url:'/index.php?m=api&c=faq&v=response_more',
                data:{page:1,type:tab,faq_id:$faq_info},
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
	                		html+='<div class="hunk fix">'+
										'<div class="bottom fix">'+
											'<div class="left transform FontSize fix marginLeft">'+
												'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>&nbsp;'+
												'<span class="name">'+data.tips[i].username+'</span>'+
											'</div>'+
											'<div class="right transform FontSize fix"><span class="time" style="margin-right: -10px;">'+data.tips[i].addtime+'</span></div>'+
										'</div>'+
										'<div class="substance fix">'+
											'<div class="solution description">'+data.tips[i].content+'</div>'+
											'<a class="readMore fix" href="javascript:;">'+
												'<span class="coverage fix"></span>'+
												'<span class="typeface">查看更多</span>'+
											'</a>'+
										'</div>'+
										'<div class="bottom fix">'+
											'<div class="topButtom transform FontSize" style="text-align: center;">'+
												'<span class="replyNum"><i>'+data.tips[i].show_num+'</i>浏览</span>&nbsp;·&nbsp;<span class="replyNum"><i>'+data.tips[i].top_num+'</i>点赞</span>'+
											'</div>'+
										'</div>'+
									'</div>';
	                   	});
                   		$(".matter").append(html);
	                    
	                    if (maxPages>1) {
	                		$(".tips").text("往下拖动查看更多！");
	                		flag = true;
	                	}else{
	                		$(".tips").text("我也是有底线的哦~");
	                		flag = false;
	                	}
	                }else{
	                    layer.msg(data.tips);
	                }
                }
            });
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
	        
			var dataIndex = parseInt($("#answer").attr("data-index"));
	        
	        //判断列表的总数量是否大于等于5
    		var answerNum = parseInt($("#answerNum").val());//总数
    		
    		maxPages = parseInt(Math.ceil(answerNum/4));//旅游达人的最大页数
    		
			var NowPage = parseInt( $("#answer").attr("data-nowPage") );//当前页数
    		var $faq_info = parseInt( $(".question").attr("data-id") );//对应这个问题的ID
			var page=NowPage+1;
			
			if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
	        	if (NowPage+1<=maxPages){
		            $.ajax({
		                url:'/index.php?m=api&c=faq&v=response_more',
		                data:{page:page,type:dataIndex,faq_id:$faq_info},
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
			                		html += '<div class="hunk fix">'+
												'<div class="bottom fix">'+
													'<div class="left transform FontSize fix marginLeft">'+
														'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>&nbsp;'+
														'<span class="name">'+data.tips[i].username+'</span>'+
													'</div>'+
													'<div class="right transform FontSize fix"><span class="time" style="margin-right: -10px;">'+data.tips[i].addtime+'</span></div>'+
												'</div>'+
												'<div class="substance fix">'+
													'<div class="solution description">'+data.tips[i].content+'</div>'+
													'<a class="readMore fix" href="javascript:;">'+
														'<span class="coverage fix"></span>'+
														'<span class="typeface">查看更多</span>'+
													'</a>'+
												'</div>'+
												'<div class="bottom fix">'+
													'<div class="topButtom transform FontSize" style="text-align: center;">'+
														'<span class="replyNum"><i>'+data.tips[i].show_num+'</i>浏览</span>&nbsp;·&nbsp;<span class="replyNum"><i>'+data.tips[i].top_num+'</i>点赞</span>'+
													'</div>'+
												'</div>'+
											'</div>';
			                   	});
		                   		$(".matter").append(html);
			                    
			                    $(".matter").attr("data-NowPage",NowPage+1);
			                    if(NowPage+1<maxPages){
			                		$(".tips").text("往下拖动查看更多！");
			                	}else{
			                		$(".tips").text("我也是有底线的哦~");
			                	}
			                }else{
			                    layer.msg(data.tips);
			                }
		                },
		                complete:function(){
		                    if (NowPage+1<maxPages) {
		                		$(".tips").text("往下拖动查看更多！");
		                		flag = true;
		                	}else{
		                		$(".tips").text("我也是有底线的哦~");
		                		flag = false;
		                	}
		                }
		            });
		        }else{
            		$(".tips").text("我也是有底线的哦~");
            	}
	        }
	    });
	    
	     //收藏
        function collect(id){
            $.post("/index.php?m=api&c=favtravel&v=collection", {
                'action':1,  //action:数值(0取消，1收藏)
                't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id
                'type':4  //type:数值(1-日志，2-tv,3-游记,4-问题
            }, function(data){
                if(data.status == 1){
                	layer.msg('收藏成功，请在个人中心查看！');
                	$(".collectNUM").text(parseInt($(".collectNUM").text())+1);
                }else{
                	layer.msg(data.tips);
                }
            },"JSON");
        }
	</script>
</body>
</html>