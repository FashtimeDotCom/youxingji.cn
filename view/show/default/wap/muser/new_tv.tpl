<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-TA的视频</title>
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
	    <h3>TA的视频</h3>
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
	        <div class="backdrop fix"><img src="{{$muser.cover}}" title="背景图" alt=""></div>
	        <div class="head fix">
	        	<div class="profilePhoto"><div class="gaine"><a class="box figure" style="background-image: url({{$muser.avatar}});"></a></div></div>
	        	<p class="wx_name">{{$muser.username}}&nbsp;<a href="javascript:;" onclick="smg({{$muser.uid}})"><img class="icon_new1" src="/resource/m/images/common/icon_new1.png" /></a></p>
	        	<p class="signature fix" title="个性签名">
	        		<span class="icon_location1"></span>
	        		<img class="icon_location2" src="/resource/m/images/common/icon_location1.png" />
	        		<span class="autograph">{{$muser.city}}&nbsp;{{$muser.autograph}}</span>
	        	</p>
	        	<div class="bottom fix">
	        		<p class="left"><span id="attention">{{$muser.uid|helper:'follownum'}}</span>关注</p>&nbsp;&nbsp;&nbsp;<p class="right"><span id="fans">{{$muser.uid|helper:'fansnum'}}</span>粉丝</p>
	        	</div>
	        </div>
	        <div class="attentionBtn fix">
                <button class="guanzhu" onclick="follows({{$muser.uid}},this)">{{$muser.uid|helper:'isfollows'}}</button>
            </div>
	    </div>
	    
	    <input type="hidden" name="uid" id="uid" value="{{$muser.uid}}" />
	    <div class="row-TV">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=muser&v=index&id={{$muser.uid}}">日志&nbsp;<i class="Iclass" id="travel_num">{{$total.travel_num}}</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=muser&v=tv&id={{$muser.uid}}">视频&nbsp;<i class="Iclass" id="tv_num">{{$total.tv_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=muser&v=travel_note&id={{$muser.uid}}">游记&nbsp;<i class="Iclass" id="note_num">{{$total.note_num}}</i></a></li>
	                    <li><a href="javascript:;">问答&nbsp;<i class="Iclass" id="answer">{{$total.answer}}</i></a></li>
	                </ul>
	            </div>
	        </div>
	        {{if $list}}
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item item_{{$item.id}}">
						<div class="wp fix">
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
									<a class="collect" href="javascript:;" onclick="collect({{$item.id}})"><span>收藏</span></a>
									<a class="cancel" href="javascript:;"><span>取消</span></a>
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
	                <div class="wp fix">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_tv_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">最原创的旅拍视频，最暖心的旅行推荐，由你打造</div>
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
	            <iframe src='' name="myiframe" frameborder=0 'allowfullscreen' id="myiframe"></iframe>
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
			var user_id = $("#uid").val();
			
	        if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
	        	if (NowPage+1<=maxPages) {
		            $.ajax({
		                url:'index.php?m=api&c=tv&v=visitor_tv',
		                data:{"page":page,"user_id":user_id},
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
															'<a class="collect" href="javascript:;" onclick="collect('+data.tips[i].id+')"><span>收藏</span></a>'+
															'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
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
		    $('.maskLayer,.cancel').on("click",function() {
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
		
        //收藏
        function collect(id){
        	$(".maskLayer,.pullDownNav").addClass("dis_none");
            $.post("/index.php?m=api&c=Favtravel&v=collection", {
                'action':1,  //action:数值(0取消，1收藏)
                't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id )
                'type':2  //type:数值(1-日志，2-tv,3-游记)
            }, function(data){
                if(data.status == 1){
                	layer.msg('收藏成功，请在个人中心查看！');
                }else{
                	layer.msg(data.tips);
                }
            },"JSON");
        }
        
        //关注
        function follows(bid, obj){
        	var fans = parseInt($("#fans").text());
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    layer.msg('关注成功！');
                    $(obj).html('已关注');
                    $(obj).css("background","#ccc");
                    $("#fans").text(fans+1);
                }else if(data.status == 2){
                	layer.msg('已取消关注！');
                    $(obj).css("background","#F33B3B");
                    $("#fans").text(fans-1);
                    $(obj).html('<b>+</b> 关注');
                }
            },"JSON");
        }
        
        //私信
        function smg(uid){
        	layer.prompt({title: '请输入私信内容', formType: 2}, function(text, index){
              	layer.close(index);
                $.post("/index.php?m=api&c=index&v=sendmsg", {
                    'to_id':uid,
                    'content':text
                }, function(data){
                    layer.msg(data.tips);
                },"JSON");
            });
        }
	</script>
</body>
</html>