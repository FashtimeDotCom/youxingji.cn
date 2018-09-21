<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的游记</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/commonList.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>我收藏的游记</h3>
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
	                	<li><a href="/index.php?m=wap&c=Collection&v=collection_travel">日志</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_tv">视频</a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li><a href="javascript:;">问答</a></li>
	                </ul>
	            </div>
	        </div>
	        
            <input type="hidden" name="type" id="travel_num" title="总数" value="{{$total.note_num}}"/>
	        {{if $list}}
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp">
							<p class="videoTitle">{{$item.title}}</p>
							<div class="date">{{$item.addtime}}</div>
							<a href="" class="dis_block fix">
								<p class="videoDetails">{{$item.desc}}</p>
								<div class="preview fix"><img src="{{$item.thumbfile}}" alt=""></div>
							</a>

							<div class="videoBottom fix">
								<span class="left"><img class="" src="/resource/m/images/common/icon_location2.png" />{{$item.address}}</span>
								{{if $item.tag}}
									{{foreach from=$item.tag key=k item=vo }}
										{{if $k <2}}
											<span class="left tag">{{$vo}}</span>
										{{/if}}
									{{/foreach}}
								{{/if}}
								<p class="right">
									<span class="check">
										<img class="" src="/resource/m/images/common/icon_check.png" data-id="{{$item.id}}" data-num="{{$item.show_num}}" />{{$item.show_num}}
									</span>&nbsp;&nbsp;
									<a class="zan" data-id="{{$item.id}}" data-num="{{$item.top_num}}" href="javascript:;">
										<span class="like">
											<img class="" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">{{$item.top_num}}</i>
										</span>
									</a>&nbsp;&nbsp;
									<a class="Areview" href="javascript:;"><span class="review"><img class="" src="/resource/m/images/common/icon_review.png" />0</span></a>
								</p>
							</div>
							
							<div class="pullDownMenu fix">
								<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />
								<div class="pullDownNav fix dis_none">
									<a class="cancel" href="javascript:;" onclick="deleteNote({{$item.id}})"><span>删除</span></a>
								</div>
							</div>
						</div>
					</div>
					{{/foreach}}
	        	</div>
				<p class="tips"></p>
	       	</div>
	        {{else}}
	        <div class="m-mytv-yz">
	            <div class="m-myday-yz">
	                <div class="wp">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_travel_note_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快增加收藏吧！</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        {{/if}}
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	</div>
	{{include file='wap/footer.tpl'}}
	
	<!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var note_num = parseInt($("#note_num").val());
    		var maxPages = parseInt(Math.ceil(note_num/4));//最大页数
    		$("#pageCount").attr("data-page",maxPages);
    		if (note_num>=5) {
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
			    var note_num = parseInt($("#note_num").val());//总数量
			    
				var maxPages = parseInt(Math.ceil(note_num/4));//最大页数
				var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
				var page=NowPage+1;
				
		        if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
		        	if (NowPage+1<=maxPages) {
			            $.ajax({
			                url:'/index.php?m=api&c=Favtravel&v=collection_more',
			                data:{page:page,type:3},
			                method:'post',
			                dataType:'json',
			                beforeSend:function(){
			                	$(".tips").text("");
								$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
			                    flag = false;
			                },
			                success:function( data ){
			                	console.log(data);
			                    if(data.status == 1){
				                	var html="";
				                	$.each(data.tips,function(i,item){
				            			html += '<div class="item fix item_'+ data.tips[i].id+'">'+
													'<div class="wp">'+
														'<p class="videoTitle">'+data.tips[i].title+'</p>'+
														'<div class="date">'+data.tips[i].addtime+'</div>'+
														'<a href="'+data.tips[i].url+'" class="dis_block fix">'+
															'<p class="videoDetails">'+data.tips[i].desc+'</p>'+
															'<div class="preview fix"><img src="'+data.tips[i].pics+'" alt=""></div>'+
														'</a>'+
														'<div class="videoBottom fix">'+
															'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
															'<p class="right">'+
																'<span class="check">'+
																	'<img" src="/resource/m/images/common/icon_check.png" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].show_num+'" />'+data.tips[i].show_num+''+
																'</span>'+
																'</a>&nbsp;&nbsp;'+
																'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].top_num+'" href="javascript:;">'+
																	'<span class="like">'+
																		'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].top_num+'</i>'+
																	'</span>'+
																'</a>&nbsp;&nbsp;'+
																'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
															'</p>'+
														'</div>'+
														'<div class="pullDownMenu fix">'+
															'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
															'<div class="pullDownNav fix dis_none">'+
																'<a class="cancel" href="javascript:;" onclick="deleteNote('+data.tips[i].id+')"><span>删除</span></a>'+
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
				                    layer.msg(data.tips);
				                }
				                commonality();
			                },
			                complete:function(data){
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
		    	$(".maskLayer,.pullDownNav").addClass("dis_none");
		    });
		    
		    //点赞
		    $('.zan').click(function() {
	            var id = $(this).attr('data-id');
	            var num = parseInt($(this).attr('data-num'));
	            var textNum = parseInt($(this).find("i").text());
	            var obj = $(this);
	            $.post("/index.php?m=api&c=index&v=zantravel", {
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

        function deleteNote(id){
        	$(".maskLayer,.pullDownNav").addClass("dis_none");
            layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=Favtravel&v=collection", {
                        'action':0,//action:数值(0取消，1收藏)
                        't_id':id, //t_id:数值(日志的ID或者tv的ID或者游记的id )
                        'type':3   //type:数值(1-日志，2-tv,3-游记)
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