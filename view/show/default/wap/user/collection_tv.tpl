<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的视频</title>
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
	    <h3>我收藏的视频</h3>
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
	                	<li><a href="/index.php?m=wap&c=Collection&v=collection_travel">日志</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_tv">视频</i></a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li><a href="javascript:;">问答</a></li>
	                </ul>
	            </div>
	        </div>
	        
            <input type="hidden" name="type" id="travel_num" title="总数" value="{{$total.tv_num}}"/>
	        {{if $list}}
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp">
							<p class="videoTitle">{{$item.title}}</p>
							<div class="date">{{$item.addtime}}</div>
							<p class="videoDetails">{{$item.describes}}</p>
							<div class="preview fix">
								<a href="#m-pop1-yz" class="pic js-video fix" data-src="{{$item.url}}">
									<img src="{{$item.pics}}" alt="">
									<span class="bo"></span>
								</a>
							</div>
							<div class="videoBottom">
								<span class="left"><img class="" src="/resource/m/images/common/icon_location2.png" />{{$item.address}}</span>
								<p class="right">
									<span class="check">
										<img class="" src="/resource/m/images/common/icon_check.png" data-id="{{$item.id}}" data-num="{{$item.shownum}}" />{{$item.shownum}}
									</span>&nbsp;&nbsp;
									<a class="zan" data-id="{{$item.id}}" data-num="{{$item.topnum}}" href="javascript:;">
										<span class="like">
											<img class="" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">{{$item.topnum}}</i>
										</span>
									</a>&nbsp;&nbsp;
									<a class="Areview" href="javascript:;"><span class="review"><img class="" src="/resource/m/images/common/icon_review.png" />0</span></a>
								</p>
							</div>
							<div class="pullDownMenu fix">
								<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />
								<div class="pullDownNav fix dis_none">
									<a class="cancel" href="javascript:;" onclick="deleteTv({{$item.id}})"><span>删除</span></a>
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
	                	<img class="default_bg" src="/resource/m/images/user/defaul_tv_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快增加收藏吧！</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        {{/if}}
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	    <!-- 视频弹窗 -->
	    <div class="m-pop1-yz" id="m-pop1-yz">
	        <div class="con conAmend">
	            <iframe src='' frameborder=0 'allowfullscreen'></iframe>
	            <div class="close js-close"><span></span></div>
	        </div>
	    </div>
	    <!-- end -->
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		window.onload=function(){
    		//判断列表的总数量是否大于等于5
    		var tv_num = parseInt($("#tv_num").val());
    		var maxPages = parseInt(Math.ceil(tv_num/4));//最大页数
    		$("#pageCount").attr("data-page",maxPages);
    		if (tv_num>=5) {
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
			    var tv_num = parseInt($("#tv_num").val());//总数量
			    
				var maxPages = parseInt(Math.ceil(tv_num/4));//最大页数
				var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
				var page=NowPage+1;
				
		        if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
		        	if (NowPage+1<=maxPages) {
			            $.ajax({
			                url:'/index.php?m=api&c=Favtravel&v=collection_more',
			                data:{page:page,type:2},
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
	    
	    function deleteTv(id){
	    	$(".maskLayer,.pullDownNav").addClass("dis_none");
	        layer.msg('您确定要删除吗？', {
	            btn: ['确认', '取消'],
	            yes: function (index) {
	                $.post("/index.php?m=api&c=Favtravel&v=collection", {
                        'action':0,//action:数值(0取消，1收藏)
                        't_id':id, //t_id:数值(日志的ID或者tv的ID或者游记的id )
                        'type':2  //type:数值(1-日志，2-tv,3-游记)
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