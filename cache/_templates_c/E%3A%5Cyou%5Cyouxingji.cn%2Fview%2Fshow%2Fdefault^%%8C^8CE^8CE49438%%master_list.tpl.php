<?php /* vpcvcms compiled created on 2018-09-21 15:15:43
         compiled from wap/master_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'wap/master_list.tpl', 129, false),)), $this); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人列表页</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <style type="text/css">
    	/*2018-09-20
		 HQS
		 
		 移动端  达人列表页
		
		 * */
		
		.tips{text-align: center;color: #ccc;margin: 0px auto 10px;}
		.loading{margin: 0 auto;display: block;width: 5%;}
		
		.marginBotom{margin-bottom: 0.8rem;}
		
		.ban .head{background: #fff;padding: 10px 0px 10px 10px;}
		.ban .title{color: #f80003;font-size: 0.8rem;line-height: 24px;font-weight: 600;}
		.ban .describe{color: #666;font-size: 0.6rem;line-height: 16px;}
		
		.navMeun .navLi{width: 50%;float: left;line-height: 33px;background: #fff;color: #999;
				text-align: center;}
		.navMeun .on{background: #f64e4e;color: #fff;}
		
		
		.container .modules .hunk{background: #fff;padding: 3% 3% 5% 3%;}
		.container .modules .hunk .title{height: 29.6px;}
		.container .modules .hunk .title span{display: block;color: #999;}
		.container .modules .hunk .title .name{float: left;line-height: 30px;font-size: 0.8rem;font-weight: 600;}
		.container .modules .hunk .title .botton{float: right;border: 1px #999 solid;padding: 1px 4px;margin-top: 5px;font-size: 0.6rem;}
		
		.vessel{display: block;width: 100%;}
		.container .modules .hunk a .headPortrait{overflow: hidden;}
		.container .modules .hunk a .headPortrait img{display: block;width: 100%;margin: 0 auto;}
		
		.container .modules .hunk a .description{color: #666;font-size: 0.6rem;line-height: 16px;margin: 0.8rem auto;-webkit-line-clamp: 5;/*三列*/}
		.container .modules .hunk a button{display: block;color: #eb0002;font-size: 0.7rem;line-height: 24px;
									background: #fff;border-radius: 10px;line-height: 20px;margin: 0px auto;
									border: 1.5px #eb0002 solid;padding: 0px 20px;}
		
		.backdrop{overflow: hidden;}
		/*5.5英寸   414*736尺寸的屏幕  如iPhone6 Plus、iPhone6s Plus、iPhone7 Plus、魅族MX5    1920x1080  /3★*/
		@media only screen and (max-width: 414px) {
			.backdrop{max-height: 193.88px;}
			.headPortrait{max-height: 228.41px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.backdrop{max-height: 192.75px;}
			.headPortrait{max-height: 227.09px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.backdrop{max-height: 192.38px;}
			.headPortrait{max-height: 226.65px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.backdrop{max-height: 175.5px;}
			.headPortrait{max-height: 206.76px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.backdrop{max-height: 168.38px;}
			.headPortrait{max-height: 198.36px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.backdrop{max-height: 149.63px;}
			.headPortrait{max-height: 176.28px;}
		}
    </style>
</head>
<body class="">
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>达人列表页</h3>
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
	        <div class="head fix">
	        	<p class="title">达人带你旅行，让你的旅行更好玩更省心</p>
	        	<p class="describe fix">他们曾走遍山川湖海，看过大千世界，<br />
	        		现在会为你设计行程，落实预订、解决问题，<br />
	        		他们是真正懂旅行的人，也希望能带你走进最美的风景。
	        	</p>
	        </div>
	    </div>
	    
	    <div class="navMeun marginBotom fix">
	    	<div class="navLi on" onclick="choice(0)">旅游达人</div>
	    	<div class="navLi" onclick="choice(1)">达人练习生</div>
	    </div>
	    
	    <div class="container fix" data-index="1">
	    	<!--旅游达人  列表-->
	    	<input type="hidden" name="" id="modulesNum1" title="旅游达人的总数" value="<?php echo $this->_tpl_vars['total']['star']; ?>
" />
	    	<div class="modules fix" id="modules1" data-page="" data-nowPage="1">
	    		<div class="matter">
					<?php if ($this->_tpl_vars['star']): ?>
					<?php $_from = $this->_tpl_vars['star']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="hunk marginBotom fix">
						<p class="title fix"><span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span><span class="botton" onclick="follows(<?php echo $this->_tpl_vars['item']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</span></p>
						<a class="vessel fix" href="/index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
							<div class="headPortrait fix"><img src="<?php echo $this->_tpl_vars['item']['avatar']; ?>
" title="头像"/></div>
							<p class="description omit"><?php echo $this->_tpl_vars['item']['autograph']; ?>
</p>
							<button>更多他的动态</button>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
	    		</div>
	    		<p class="tips tips1"></p>
	    	</div>
	    	
	    	<!--达人练习生  列表-->
	    	<input type="hidden" name="" id="modulesNum2" title="达人练习生的总数" value="<?php echo $this->_tpl_vars['total']['seed']; ?>
" />
	    	<div class="modules fix dis_none" id="modules2" data-page="" data-nowPage="1">
	    		<div class="matter">
					<?php if ($this->_tpl_vars['seed']): ?>
					<?php $_from = $this->_tpl_vars['seed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="hunk marginBotom fix">
						<p class="title fix"><span class="name"><?php echo $this->_tpl_vars['item']['username']; ?>
</span><span class="botton" onclick="follows(<?php echo $this->_tpl_vars['item']['uid']; ?>
,this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'isfollows') : smarty_modifier_helper($_tmp, 'isfollows')); ?>
</span></p>
						<a class="vessel fix" href="/index.php?m=wap&c=muser&v=index&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
">
							<div class="headPortrait fix"><img src="<?php echo $this->_tpl_vars['item']['avatar']; ?>
" title="头像"/></div>
							<p class="description omit"><?php echo $this->_tpl_vars['item']['autograph']; ?>
</p>
							<button>更多他的动态</button>
						</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
	    		</div>
	    		<p class="tips tips2"></p>
	    	</div>
	    </div>
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
    		var intelligent_num = parseInt($("#modulesNum1").val());//旅游达人的总数
    		var trainee_num = parseInt($("#modulesNum2").val());//达人练习生的总数
    		
    		var maxPages1 = parseInt(Math.ceil(intelligent_num/4));//旅游达人的最大页数
    		var maxPages2 = parseInt(Math.ceil(trainee_num/4));//达人练习生的最大页数
    		
    		$("#modules1").attr("data-page",maxPages1);
    		$("#modules2").attr("data-page",maxPages2);
    		
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
    	}
        
        //切换菜单
        function choice(tab){
        	$(".navLi").eq(tab).addClass("on");
        	$(".navLi").eq(tab).siblings().removeClass("on");
        	
        	$(".container .modules").eq(tab).removeClass("dis_none");
        	$(".container .modules").eq(tab).siblings().addClass("dis_none");
        	
        	$(".container").attr("data-index",tab+1);
        	upload();
        }
        
        //关注
        function follows(bid, obj){
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    layer.msg('关注成功！');
                    $(obj).html('已关注');
                }else if(data.status == 2){
                	layer.msg('已取消关注！');
                    $(obj).html('<b>+</b> 关注');
                }
            },"JSON");
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