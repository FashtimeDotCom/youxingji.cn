<?php /* vpcvcms compiled created on 2018-09-28 17:37:34
         compiled from wap/faq/faq_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/faq/faq_detail.tpl', 197, false),)), $this); ?>
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

	    <div class="container fix" data-index="1">
	    	<!--问题-->
			<div class="hunk question marginBotom fix">
				<div class="title fix">
					<span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"/></span>
					<span class="name omit lineNumber2">旅途中，那声怎样拍出帅气照片？</span>
				</div>
				<div class="headPortrait fix">
					<div class="thumbnail"><img src="/resource/m/images/tx-yz2.jpg" title="头像"/></div>
					<p class="description">嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。</p>
				</div>
				
				<div class="bottom fix">
					<div class="topButtom transform">
						<span class="browseNum"><i>3465654</i>浏览</span>&nbsp;·&nbsp;<span class="answerNum"><i>0</i>回答</span>&nbsp;·&nbsp;<span class="assistNum"><i>104</i>赞</span>
					</div>
					<div class="left transform fix" style="margin-left: -5px;"><img class="icon" src="/resource/m/images/user/icon_faq_detail2.png"/>中国</div>
					<div class="right transform fix"><span class="name">阿亮</span>&nbsp;问于&nbsp;<span class="time">2018-08-11</span></div>
				</div>
			</div>
	    	
	    	<!--答-->
	    	<input type="hidden" name="" id="answerNum" title="回答的总数" value="<?php echo $this->_tpl_vars['total']; ?>
" />
	    	<div class="modules answer question marginBotom fix" id="answer" data-page="" data-nowPage="1">
	    		<div class="bigTitle">
	    			<span class="left">全部问答（<i>0</i>）</span>
	    			<p class="right"><span class="key" id="answerHeat">按热度</span>&nbsp;|&nbsp;<span class="key on" id="answerTime">按时间</span></p>
	    		</div>
	    		<div class="matter fix">
	    			<!--无人回答-->
	    			<div class="hunk dis_none">
	    				<img class="tips" src="/resource/m/images/user/defaul_travel_bg.png"/>
	    				<p class="depict">这个问题还没有人回答哦！<br />赶紧寻找达人回答吧！</p>
	    			</div>
	    			
	    			<!--有人回答-->
	    			<div class="hunk fix">
						<div class="bottom fix">
							<div class="left transform fix marginLeft">
								<span class="boxes">答&nbsp;<img class="profilePhoto" src="/resource/m/images/q-pic6.jpg"/></span>&nbsp;
								
								<span class="name">阿亮</span>
							</div>
							<div class="right transform fix"><span class="time" style="margin-right: -10px;">2018-08-11</span></div>
						</div>
						<div class="substance fix">
							<div class="solution description">
								嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。
								嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。
								嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。
								嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。
								嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。
							</div>
							<a class="readMore fix" href="javascript:;">
								<span class="coverage fix"></span>
								<span class="typeface">查看更多</span>
							</a>
						</div>
						
						<div class="bottom fix"><div class="topButtom transform" style="text-align: center;"><span class="replyNum"><i>0</i>回复</span></div></div>
					</div>
	    			<div class="hunk fix">
						<div class="bottom fix">
							<div class="left transform fix marginLeft">
								<span class="boxes">答&nbsp;<img class="profilePhoto" src="/resource/m/images/q-pic6.jpg"/></span>&nbsp;
								
								<span class="name">阿亮</span>
							</div>
							<div class="right transform fix"><span class="time" style="margin-right: -10px;">2018-08-11</span></div>
						</div>
						<div class="headPortrait fix">
							<p class="solution description">嗯，关于男人自拍这件事情，我的说，我学摄影真的是为了给自己拍，从十几年前开始就是，只不过是世俗大多只能接受女人自拍，多不太能接受男人爱拍片，这是就让我觉得，我得拍出让大从都能接受的照片，不是做“娘”的事情。</p>
						</div>
						
						<div class="bottom fix"><div class="topButtom transform" style="text-align: center;"><span class="replyNum"><i>0</i>回复</span></div></div>
					</div>
	    		</div>
	    	</div>
	    	
    		
	    </div>
	</div>
	<div class="answerNav fix">
		<span class="left"><img src="/resource/m/images/user/icon_faq_detail3.png"/>&nbsp;收藏问题（1234）</span>
		<span class="right"><img src="/resource/m/images/user/icon_faq_detail4.png"/>&nbsp;添加答案</span>
	</div>
	
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var intelligent_num = parseInt($("#modulesNum1").val());//旅游达人的总数
    		var trainee_num = parseInt($("#modulesNum2").val());//达人练习生的总数
    		var num3 = parseInt($("#modulesNum3").val());//达人练习生的总数
    		
    		var maxPages1 = parseInt(Math.ceil(intelligent_num/4));//旅游达人的最大页数
    		var maxPages2 = parseInt(Math.ceil(trainee_num/4));//达人练习生的最大页数
    		var maxPages3 = parseInt(Math.ceil(num3/4));//达人练习生的最大页数
    		
    		$("#modules1").attr("data-page",maxPages1);
    		$("#modules2").attr("data-page",maxPages2);
    		$("#modules3").attr("data-page",maxPages3);
    		
    		if (intelligent_num>=5) {
    			$(".tips1").text("往下拖动查看更多！");
    		} else{
    			$(".tips1").text("我也是有底线的哦~");
    		}
    		if (trainee_num>=5) {
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
        

		function upload(){
			var scrollTop;     //获取滚动条到顶部的距离
		    var scrollHeight;  //获取文档区域高度 
		    var windowHeight;  //获取滚动条的高度
		    var flag = true;   //加载数据标志
		    $(window).scroll(function(){
		        scrollTop = $(this).scrollTop();     
		        scrollHeight = $(document).height(); 
		        windowHeight = $(this).height();
		        var e;
		        
				var dataIndex = parseInt($(".container").attr("data-index"));
		        
		        //判断列表的总数量是否大于等于5
	    		var intelligent_num = parseInt($("#modulesNum"+dataIndex).val());//总数
	    		
	    		maxPages = parseInt(Math.ceil(intelligent_num/4));//旅游达人的最大页数
	    		
				var NowPage = parseInt( $("#modules"+dataIndex).attr("data-nowPage") );//当前页数
	    		
				var page=NowPage+1;
				
				if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
		        	if (NowPage+1<=maxPages){
			            $.ajax({
			                url:'/index.php?m=api&c=index&v=master_more',
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
				                	$.each(data.tips,function(i,item){
				                		html += '<div class="hunk marginBotom fix">'+
													'<p class="title fix"><span class="name">'+data.tips[i].username+'</span><span class="botton" onclick="follows('+data.tips[i].uid+',this)"><?php echo ((is_array($_tmp='+data.tips[i].uid+')) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</span></p>'+
													'<a class="vessel fix" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].uid+'">'+
														'<div class="headPortrait fix"><img src="'+data.tips[i].headpic+'" title="头像"/></div>'+
														'<p class="description omit">'+data.tips[i].autograph+'</p>'+
														'<button>更多他的动态</button>'+
													'</a>'+
												'</div>';
				                   	});
			                   		$("#modules"+dataIndex+" .matter").append(html);
				                    
				                    $("#modules"+dataIndex).attr("data-NowPage",NowPage+1);
				                    if (NowPage+1<maxPages) {
				                		$(".tips"+dataIndex).text("往下拖动查看更多！");
				                	}else{
				                		$(".tips"+dataIndex).text("我也是有底线的哦~");
				                	}
				                }else{
				                    layer.msg(data.tips);
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
		}
		upload();
	</script>
</body>
</html>