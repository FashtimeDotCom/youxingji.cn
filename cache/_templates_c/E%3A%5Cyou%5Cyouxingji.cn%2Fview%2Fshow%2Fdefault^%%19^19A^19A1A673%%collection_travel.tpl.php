<?php /* vpcvcms compiled created on 2018-09-21 18:13:36
         compiled from wap/user/collection_travel.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的日志</title>
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
    	/*.pullDownMenu{z-index: 1003;}
    	
    	.maskLayer{z-index: 1000;}
    	.shareGuidance{position: absolute;right: 1rem;top: 2rem;border-radius: 0.3rem;z-index: 1002;
    					border-top-right-radius: 0px;}
    	.shareGuidance .icon_share{display: block;position: absolute;top: -27px;right: 0px;
    								width: 90px;}
    	
    	.shareGuidance .box{width: 100%;height: 100%;background: rgba(0,0,0,0.8);border-radius: 0.3rem;padding: 12px 24px;border-top-right-radius: 0px;}
    	.shareGuidance .box p{color: #fff;font-size: 0.7rem;line-height: 1.1rem;}
    	.shareGuidance .box p img{display: inline-block;}*/
    </style>
</head>
<body>
	<div class="header">
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <h3>我收藏的日志</h3>
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
	    
	    <div class="row-TV">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_travel">日志</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_tv">视频</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li><a href="javascript:;">问答</a></li>
	                </ul>
	            </div>
	        </div>
            
            <input type="hidden" name="type" id="travel_num" title="总数" value="<?php echo $this->_tpl_vars['total']['travel_num']; ?>
"/>
	        <?php if ($this->_tpl_vars['list']): ?>
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<div class="item fix item_<?php echo $this->_tpl_vars['item']['id']; ?>
">
						<div class="wp">
							<p class="videoTitle"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>
							<div class="date"><?php echo $this->_tpl_vars['item']['addtime']; ?>
</div>
							<p class="videoDetails"><?php echo $this->_tpl_vars['item']['describes']; ?>
</p>
							<ul class="ul-imgtxt2-yz">
								<li><dl>
		                                <?php $_from = $this->_tpl_vars['item']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
		                                <dd><a href="<?php echo $this->_tpl_vars['v']; ?>
" class="figure fancybox-effects-a" style="background-image: url(<?php echo $this->_tpl_vars['v']; ?>
);">
		                                        <div class="pic"></div>
		                                    </a>
		                                </dd>
		                                <?php endforeach; endif; unset($_from); ?>
		                           	</dl>
								</li>
							</ul>
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
									<!--<a class="collect dis_none" onclick="shareGuidance(<?php echo $this->_tpl_vars['item']['id']; ?>
)" id="shareGuidance<?php echo $this->_tpl_vars['item']['id']; ?>
"><span>分享</span></a>-->
									<a class="cancel" href="javascript:;" onclick="deleteTravel(<?php echo $this->_tpl_vars['item']['id']; ?>
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
	                <div class="wp">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_travel_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快增加收藏吧！</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失">
	    <!--<div class="maskLayer" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失">-->
	    	<!--分享引导弹窗-->
	    	<!--<div class="shareGuidance fix dis_none">
	    		<div class="box fix">
	    			<img class="icon_share" src="/resource/m/images/user/icon_share.png"/>
	    			<p class="">1.点击右上角“...”</p>
					<p class="">2.选择“<img class="" src="/resource/m/images/user/icon_share2.png" />”分享给朋友</p>
	    		</div>
			</div>-->
	    </div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });
        });
    </script>
    
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var travel_num = parseInt($("#travel_num").val());
    		var maxPages = parseInt(Math.ceil(travel_num/4));//最大页数
    		$("#pageCount").attr("data-page",maxPages);
    		if (travel_num>=5) {
    			$(".tips").text("往下拖动查看更多！");
    			scrollView();
    		} else{
    			$(".tips").text("我也是有底线的哦~");
    		}
    	}
		
		function scrollView(){
			var scrollTop;     //获取滚动条到顶部的距离
		    var scrollHeight;  //获取文档区域高度 
		    var windowHeight;  //获取滚动条的高度
		    var flag = true;   //加载数据标志
		    $(window).scroll(function(){
		        scrollTop = $(this).scrollTop();     
		        scrollHeight = $(document).height(); 
		        windowHeight = $(this).height();
		        var e;
			    var travel_num = parseInt($("#travel_num").val());//总数量
			    
				var maxPages = parseInt(Math.ceil(travel_num/4));//最大页数
				var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
				var page=NowPage+1;
				
		        if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
		        	if (NowPage+1<=maxPages) {
			            $.ajax({
			                url:'/index.php?m=api&c=Favtravel&v=collection_more',
			                data:{page:page,type:1},
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
				            			html += '<div class="item fix item_'+ data.tips[i].id+'">'+
													'<div class="wp">'+
														'<p class="videoTitle">'+data.tips[i].title+'</p>'+
														'<div class="date">'+data.tips[i].addtime+'</div>'+
														'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
														'<ul class="ul-imgtxt2-yz">'+
															'<li><dl>';
														for ( var k=0;k<data.tips[i].content.length;k++ ){
															html+= '<dd><a href="'+data.tips[i].content[k]+'" class="figure fancybox-effects-a" style="background-image: url('+data.tips[i].content[k]+');">'+
																			'<div class="pic"></div>'+
																		'</a>'+
																	'</dd>';
														}
					
														html+='</dl>'+
															'</li>'+
														'</ul>'+
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
																//'<a class="collect dis_none" onclick="shareGuidance(<?php echo $this->_tpl_vars['item']['id']; ?>
)" id="shareGuidance'+data.tips[i].id+'"><span>分享</span></a>'
																'<a class="cancel" href="javascript:;" onclick="deleteTravel('+data.tips[i].id+')"><span>删除</span></a>'+
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
				                		$(".tips").text("我也是有底线的哦~");
				                	}
				                }else{
				                    //layer.msg(data.tips);
				                }
				                commonality();
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
		}
		scrollView();
		
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
				$(".maskLayer").css("opacuty","0");
		    	$(".maskLayer,.shareGuidance,.pullDownNav").addClass("dis_none");
		    });
		    
		    //点赞
		    $('.zan').click(function() {
	            var id = $(this).attr('data-id');
	            var num = parseInt($(this).attr('data-num'));
	            var textNum = parseInt($(this).find("i").text());
	            var obj = $(this);
	            $.post("/index.php?m=api&c=index&v=zan", {
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
		}
		commonality();

	    $('.js-video').click(function(event) {
	        var _id = $(this).attr("href");
	        var _src = $(this).attr("data-src");
	
	        $(_id).find("iframe").attr("src", _src);
	        $(_id).fadeIn();
	    });
	    $('.js-close').click(function(event) {
	        $(this).parents('.m-pop1-yz').fadeOut();
	        $(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
	        event.stopPropagation();
	    });

		function shareGuidance(id){
			$(".pullDownNav").addClass("dis_none");
			$(".maskLayer").css("opacity","1");
			$(".shareGuidance").removeClass("dis_none");
		}

        function deleteTravel(id){
        	$(".maskLayer,.pullDownNav").addClass("dis_none");
            layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=Favtravel&v=collection", {
                        'action':0,  //action:数值(0取消，1收藏)
                        't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id )
                        'type':1  //type:数值(1-日志，2-tv,3-游记)
                    }, function(data){
                        if(data.status == 1){
                        	layer.msg('已删除本条收藏！');
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