<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>问题详情页</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/faq_detail.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
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
			<div class="hunk question marginBotom fix">
				<div class="title fix">
					<span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"/></span>
					<span class="name omit lineNumber2">{{$faq_info.title}}</span>
				</div>
				<div class="headPortrait fix"><p class="description">{{$faq_info.desc}}</p></div>
				
				<div class="bottom fix">
					<div class="topButtom transform">
						<span class="browseNum"><i>{{$faq_info.show_num}}</i>浏览</span>&nbsp;·&nbsp;
						<span class="answerNum"><i>{{$faq_info.collection_num}}</i>收藏</span>&nbsp;·&nbsp;
						<span class="assistNum"><i>{{$faq_info.response_num}}</i>回答</span>
					</div>
					<div class="left transform fix"><img class="icon" src="/resource/m/images/user/icon_faq_detail2.png"/><span class="seat">{{$faq_info.address}}</span></div>
					<div class="right transform fix"><span class="name">{{$faq_info.username}}</span>&nbsp;问于&nbsp;<span class="time">{{$faq_info.addtime}}</span></div>
				</div>
			</div>
	    	
	    	<!--答-->
	    	<input type="hidden" name="uid" id="uid" data-type="4" value="" />
	    	<input type="hidden" name="faq_num" id="faq_num" title="回答的总数" value="{{$total}}" />
	    	<input type="hidden" id="UniqueValue" data-sign="details" value="faq_num" title="共用JS区分的唯一必须值"/>
	    	{{if $total >0 }}
	    	<!--有人回答-->
	    	<div class="modules answer marginBotom fix" id="pageCount" data-id="{{$faq_info.id}}" data-index="1" data-nowPage="1">
	    		<div class="bigTitle">
	    			<span class="left">全部问答（<i>{{$total}}</i>）</span>
	    			<p class="right"><span class="key on" id="answerHeat">按热度</span>&nbsp;|&nbsp;<span class="key" id="answerTime">按时间</span></p>
	    		</div>
	    		<div class="matter fix">
					{{foreach from=$list item=item key=key}}
					<div class="hunk fix">
						<div class="bottom fix">
							<div class="left answerLeft transform fix">
								<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url({{$item.headpic}});"></span></span>&nbsp;
								<span class="name">{{$item.username}}</span>
							</div>
							<div class="right transform fix"><span>{{$item.addtime}}</span></div>
						</div>
						<div class="substance fix">
							<div class="solution description">{{$item.content}}</div>
							<a class="readMore fix" href="/index.php?m=wap&c=faq&v=response_detail&id={{$item.id}}">
								<span class="coverage fix"></span>
								<span class="typeface">查看更多</span>
							</a>
						</div>

						<div class="bottom fix">
							<div class="topButtom transform FontSize" style="text-align: center;">
								<span class="replyNum"><i>{{$item.show_num}}</i>浏览</span>&nbsp;·&nbsp;<span class="replyNum"><i>{{$item.top_num}}</i>点赞</span>
							</div>
						</div>
					</div>
					{{/foreach}}
	    		</div>
	    	</div>
	    	<p class="tips"></p>
	    	
	    	{{else}}
	    	<!--无人回答-->
	    	<div class="modules answer marginBotom fix">
	    		<div class="bigTitle">
	    			<span class="left">全部问答（<i>{{$total}}</i>）</span>
	    			<p class="right"><span class="key on" id="answerHeat">按热度</span>&nbsp;|&nbsp;<span class="key" id="answerTime">按时间</span></p>
	    		</div>
	    		<div class="matter fix">
					<div class="hunk">
						<img class="tips" src="/resource/m/images/user/defaul_travel_bg.png"/>
						<p class="depict">这个问题还没有人回答哦！<br />赶紧寻找达人回答吧！</p>
					</div>
					{{/if}}
	    		</div>
	    	</div>
	    </div>
	</div>
	<div class="answerNav fix">
		<span class="left" onclick="collect({{$faq_info.id}})"><img src="/resource/m/images/user/icon_faq_detail3.png"/>&nbsp;收藏问题</span>
		<span class="right" id="skip" data-id="{{$faq_info.id}}"><img src="/resource/m/images/user/icon_faq_detail4.png"/>&nbsp;添加答案</span>
	</div>
	
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
    <script type="text/javascript">
    	//进入页面自动加载
		var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
		var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
		var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
		var url='/index.php?m=api&c=faq&v=response_more';
		
		//判断列表的总数量是否大于等于5
		function autoloading(UniqueValue){
			if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
				var totality = parseInt($("#"+UniqueValue).text());
			} else if (dataSign=="collect" || dataSign=="about_us" || dataSign=="details" ){  //收藏页    关于我们
				var totality = parseInt($("#"+UniqueValue).val());
			}else if (dataSign=="TalentState" ) {
				
			}

			if (totality>=5) {
				$(".tips").text("往下拖动查看更多！");
			} else{
				$(".tips").text("我也是有底线的哦~");
			}
		}
		autoloading(UniqueValue);

		//提取公共的方法
		function jointHtml(data,NowPage,maxPages){
            if(data.status == 1){
            	var html="";
            	$.each(data.tips,function(i,item){
            		html+='<div class="hunk fix">'+
								'<div class="bottom fix">'+
									'<div class="left answerLeft transform fix">'+
										'<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url('+data.tips[i].headpic+');"></span></span>&nbsp;'+
										'<span class="name">'+data.tips[i].username+'</span>'+
									'</div>'+
									'<div class="right transform fix"><span>'+data.tips[i].addtime+'</span></div>'+
								'</div>'+
								'<div class="substance fix">'+
									'<div class="solution description">'+data.tips[i].content+'</div>'+
									'<a class="readMore fix" href="/index.php?m=wap&c=faq&v=response_detail&id='+data.tips[i].id+'">'+
										'<span class="coverage fix"></span>'+
										'<span class="typeface">查看更多</span>'+
									'</a>'+
								'</div>'+
								'<div class="bottom fix">'+
									'<div class="topButtom transform" style="text-align: center;">'+
										'<span class="replyNum"><i>'+data.tips[i].show_num+'</i>浏览</span>&nbsp;·&nbsp;<span class="replyNum"><i>'+data.tips[i].top_num+'</i>点赞</span>'+
									'</div>'+
								'</div>'+
							'</div>';
               	});
           		$(".matter").append(html);
           		
           		if (maxPages>NowPage) {
            		$(".tips").text("往下拖动查看更多！");
            		flag = true;
            	}else{
            		$(".tips").text("我也是有底线的哦~");
            		flag = false;
            	}
            }
		}

        $(".key").on("click",function(){
        	var index = $(this).index();
        	$(this).addClass("on");
        	$(this).siblings().removeClass("on");
        	$("#pageCount").attr("data-index",index+1);  //类别 判断是时间还是热度
        	var dataIndex = parseInt($("#pageCount").attr("data-index"));
        	$(".matter").html("");

        	//判断列表的总数量是否大于等于5
    		var Num = parseInt($("#"+UniqueValue).val()); //回答的总数
    		var maxPages = parseInt(Math.ceil(Num/4));   //回答的最大页数
    		
    		$("#pageCount").attr("data-page",maxPages);
    		var infoID = parseInt( $("#pageCount").attr("data-id") );//问题的ID
        	
        	$.ajax({
                url:url,
                data:{page:1,
                	  type:dataIndex,
                	  faq_id:infoID },
                type:'post',
                dataType:'json',
                beforeSend:function(){
                	$(".tips").text("");
					$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
                },
                success:function( data ){
			        jointHtml(data,1,maxPages);
	                if(data.status == 1){
	                	$("#pageCount").attr("data-NowPage",1);
	                }
	                else{
	                	layer.msg(data.tips);
	                var htmll = '<div class="hunk">'+
									'<img class="tips" src="/resource/m/images/user/defaul_travel_bg.png"/>'+
									'<p class="depict">这个问题还没有人回答哦！<br />赶紧寻找达人回答吧！</p>'+
								'</div>';
		                $(".matter").html(htmll);
	                }
                }
            });
        });

		
		var scrollTop;     //获取滚动条到顶部的距离
	    var scrollHeight;  //获取文档区域高度 
	    var windowHeight;  //获取滚动条的高度
	    var flag = true;   //加载数据标志
	    $(window).scroll(function(){
	        scrollTop = $(this).scrollTop();     
	        scrollHeight = $(document).height(); 
	        windowHeight = $(this).height();
	        var e;
	        
			var dataIndex = parseInt($("#pageCount").attr("data-index"));
	        
	        //判断列表的总数量是否大于等于5
    		var Num = parseInt($("#"+UniqueValue).val());//总数
    		
    		maxPages = parseInt(Math.ceil(Num/4));//旅游达人的最大页数
    		
			var NowPage = parseInt( $("#pageCount").attr("data-nowPage") );//当前页数
    		var infoID = parseInt( $("#pageCount").attr("data-id") );//对应这个问题的ID
			var page=NowPage+1;
			
			if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
	        	if (NowPage+1<=maxPages){
		            $.ajax({
		                url:url,
		                data:{page:page,
		                	  type:dataIndex,
		                	  faq_id:infoID },
		                type:'post',
		                dataType:'json',
		                beforeSend:function(){
		                	$(".tips").text("");
							$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
		                    flag = false;
		                },
		                success:function( data ){
		                    jointHtml(data,NowPage,maxPages);
		                    if(data.status == 1){
		                    	$("#pageCount").attr("data-NowPage",NowPage+1);
		                    }
				            else{
				                layer.msg(data.tips);
				            }
		                }
		            });
		        }
	        	else{
            		$(".tips").text("我也是有底线的哦~");
            	}
	        }
	    });
	    
	    //添加答案
        $("#skip").on("click",function(){
        	var id = $(this).attr("data-id");
            $.post("index.php?m=api&c=user&v=is_login", {
            	
            }, function(data){
                if(data.status == 1){ //登录了，直接跳转
                	window.location="/index.php?m=wap&c=faq&v=response_faq&id="+id;
                }else{ //没有登录，带参数跳转到登录页
                	layer.msg(data.tips);
                	setInterval(function(){
						window.location="/index.php?m=wap&c=index&v=login&from="+"{{$from_url}}";
					},1000);
                }
            },"JSON");
        });
	</script>
</body>
</html>