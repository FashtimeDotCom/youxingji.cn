<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人视频_{{TO->cfg key="site_name" group="site" default="达人视频"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/star.css" />
    <style type="text/css">
    			/*热门精选*/
    	.sift{padding: 19px 0 5px;margin-bottom: 20px;background-color: #fff;font-size: 13px;color: #666;line-height: 1.85em;}
		.sift .uiBox{margin-top: 16px;}
		.sift .uiBox a{position: relative;width: 96%;}
		.sift .uiBox a span{display: block;width: 100%; padding-bottom: 60%;border-radius: 2px;}
		.sift .uiBox a .name{ color: #fff;text-align: center;position: absolute;top:24%;width: 100%;}
		.sift .uiBox a .con{color: #666;text-align: left;line-height: 30px;}
		.ul-imgtxt2 li{margin-bottom:0;}
				/*正文*/
		.TV .ul-list-talent{position: relative;}
		.TV .ul-list-talent .item{padding-top: 0;margin-bottom:0;}
		.TV .ul-list-talent .item .con{padding: 0;padding-top: 65%;}
		.TV .ul-list-talent .item .con i{top: 38%;}

		.TV .cover{border-radius: 3px;}
		.TV .float{position: absolute;left: 3%;width: 97%;}
		.TV .float .colorSpan{color: #fff!important;font-size: 12px!important;line-height: 30px!important;}
		.TV .float .tx .portrait{width: 50px;height: 48px;float: left;margin-right: 8px;border: 1.5px #fff solid;}
		.TV .character{padding-top: 35px;}
		.TV .character .txt{padding-bottom: 0;}
		
		@media only screen and (max-width: 414px) {
			.TV .float{top: 231px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.TV .float{top: 230px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.TV .float{top: 230px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.TV .float{top: 206px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.TV .float{top: 196px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.TV .float{top: 170px;}
		}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>达人视频</h3>
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
	    {{vplist from='ad' item='adlist' tagname='wapstarlide'}}
	    <div class="ban"><div class="backdrop fix"><img src="{{$adlist.imgurl}}" title="海报/封面"></div></div>
	    {{/vplist}}
	    <div class="m-talent">
	        <!--热门精选-->
	        <div class=" sift">
	            <div class="wp">
	                <h4 class="title">精选主题</h4>
                	<div class="uiBox swiper-container" id="bannerSwiper1">
						<div class="swiper-wrapper">
							{{foreach from=$key_list item=item key=key}}
							<div class="swiper-slide">
								<a class="dis_block fix" href="/index.php?m=wap&c=index&v=tv&keyword={{$item.keyword}}">
									<span class="figure" style="background-image: url({{$item.thumbfile}});"></span>
									<p class="name">{{$item.keyword}}</p>
									<p class="con apostrophe">{{$item.title}}</p>
								</a>
							</div>
							{{/foreach}}
                		</div>
	                </div>
	            </div>
	        </div>
	        
	        <!--菜单切换-->
	        <input type="hidden" name="keyword" id="keyword" value="{{$keyword}}" />
	        <input type="hidden" name="uid" id="uid" data-type="2" value="{{$vo.uid}}" />
	        <button type="button" class="dis_none" id="tv_num" title="总数">{{$num}}</button>
	        <input type="hidden" id="UniqueValue" data-sign="his" data-type="2" value="tv_num" title="共用JS区分的唯一必须值"/>
	        <div class="notice fix">
	        	<div class="nanCut fix"><span class="press onn">最新视频</span><span class="press">热门视频</span></div>
				{{vplist from='ad' item='adlist' tagname='wap_new_star'}}
	        	<div class="fix"><img src="{{$adlist.imgurl}}"/></div>
				{{/vplist}}
	        </div>
	    	
	    	<!--正文-->
	    	<div class="main TV" id="pageCount" data-nowPage="1" data-index="1">
	    		<div class="content fix vessel">
	    			{{foreach from=$list item=vo}}
		            <div class="wp row_list">
		                <ul class="ul-list-talent ul-imgtxt2">
		                    <li><div class="item fix">
			                        <a class="dis_block con cover figure" href="/index.php?m=wap&c=index&v=tv_detail&id={{$vo.id}}" style="background-image: url({{$vo.pics}});">
			                            <i class="bo"></i>
			                        </a>
			                        <div class="info float">
			                        	<div class="tx">
			                                <a class="dis_block portrait figure borderRadius50" href="{{$vo.uid|helper:'mhref'}}" style="background-image: url({{$vo.uid|helper:'avatar'}});"></a>
			                                <h5><span class="colorSpan apostrophe">{{$vo.title}}</span></h5>
			                                <h5><span>{{$vo.uid|helper:'username'}}</span></h5>
			                           </div>
			                        </div>
			                        <div class="info character"><div class="txt"><p><a class="dis_block omit lineNumber3 whiteSpace" href="/index.php?m=wap&c=index&v=tv_detail&id={{$vo.id}}">{{$vo.describes}}</a></p></div></div>
			                        <div class="videoBottom fix">
										<div class="right">
											<span><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i>{{$vo.shownum}}</i></span>&nbsp;&nbsp;
											<span class="zan" onclick="zan(this,{{$vo.id}})" data-nature="list">
												<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i>{{$vo.topnum}}</i>
											</span>&nbsp;&nbsp;
											<span class="Areview">
												<a href="/index.php?m=wap&c=index&v=tv_detail&id={{$vo.id}}">
													<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i>0</i>
												</a>
											</span>
										</div>
										
										<div class="IMGbox fix">
											<div class="pullDownButton" onclick="pullDownButton(this)"></div>
											<div class="menuOption fix dis_none">
												<span class="collect" onclick="collect({{$vo.id}})">收藏</span>
												<span class="cancel">取消</span>
											</div>
										</div>
									</div>
			                   	</div>
			                </li>
		                </ul>
		           	</div>
			        {{/foreach}}
	    		</div>
				<p class="tips"></p>
	    	</div>
	   </div>
	</div>
	<div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	{{include file='wap/footer.tpl'}}
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		//热门精选
		var swiper1 = new Swiper('#bannerSwiper1', {
				slidesPerView:2,
				speed:300,
				autoplay : {
				    delay:3000
				},
			});
	</script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】"></script>
	<script type="text/javascript">
		//进入页面自动加载
		var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
		var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
		var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
		var url;
		var keyword=$("#keyword").val(); //这个页面必须的

		//判断列表的总数量是否大于等于5
		function autoloading(UniqueValue){
			if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
				var totality = parseInt($("#"+UniqueValue).text());
			}
			else if (dataSign=="collect" || dataSign=="about_us" ){  //收藏页    关于我们
				var totality = parseInt($("#"+UniqueValue).val());
			}
			else if (dataSign=="TalentState" ) {
				
			}

			if (totality>=5) {
				$(".tips").text("往下拖动查看更多！");
			}
			else{
				$(".tips").text("我也是有底线的哦~");
			}
		}
		autoloading(UniqueValue);
		
		//点击下拉
		function pullDownButton(obj){
			if( $(obj).next(".menuOption").attr("class")=="menuOption fix dis_none" ){
				$(".menuOption").addClass("dis_none");
				$(obj).next(".menuOption").removeClass("dis_none");
				$(".maskLayer").removeClass("dis_none");
			}
			else{
				$(".maskLayer,.menuOption").addClass("dis_none");
			}
		}
		
		function commonality(){
		    //点击遮罩层显示
		    $('.maskLayer,.cancel').on("click",function(){
		    	$(".maskLayer,.menuOption").addClass("dis_none");
		    });
		}
		commonality();

		//提取公共的方法
		function jointHtml(data,NowPage,maxPages){
			var jointHtml="";
			if(data.status == 1){
				var jointHtml="";
	        	$.each(data.tips,function(i,item){
	        		jointHtml +='<div class="wp row_list">'+
					                '<ul class="ul-list-talent ul-imgtxt2">'+
					                    '<li><div class="item fix">'+
				                            	'<a class="dis_block con cover figure" href="/index.php?m=wap&c=index&v=tv_detail&id='+data.tips[i].id+'" style="background-image: url('+data.tips[i].pics+');">'+
						                            '<i class="bo"></i>'+
						                        '</a>'+
						                        '<div class="info float">'+
						                        	'<div class="tx">'+
						                                '<a class="dis_block portrait figure borderRadius50" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].uid+'" style="background-image: url('+data.tips[i].headpic+');"></a>'+
						                                '<h5><span class="colorSpan apostrophe">'+data.tips[i].title+'</span></h5>'+
						                                '<h5><span>'+data.tips[i].username+'</span></h5>'+
						                           '</div>'+
						                        '</div>'+
						                        '<div class="info character"><div class="txt"><p><a class="dis_block omit lineNumber3 whiteSpace" href="/index.php?m=wap&c=index&v=tv_detail&id='+data.tips[i].id+'">'+data.tips[i].describes+'</a></p></div></div>'+
						                        '<div class="videoBottom fix">'+
													'<div class="right">'+
														'<span><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i>'+data.tips[i].shownum+'</i></span>&nbsp;&nbsp;'+
														'<span class="zan" onclick="zan(this,'+data.tips[i].id+')" data-id="'+data.tips[i].id+'" data-nature="list">'+
															'<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i>'+data.tips[i].topnum+'</i>'+
														'</span>&nbsp;&nbsp;'+
														'<span class="Areview">'+
															'<a href="/index.php?m=wap&c=index&v=tv_detail&id='+data.tips[i].id+'">'+
																'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i>0</i></span>'+
															'</a>'+
													'</div>'+
													'<div class="IMGbox fix">'+
														'<div class="pullDownButton" onclick="pullDownButton(this)"></div>'+
														'<div class="menuOption fix dis_none">'+
															'<span class="collect" onclick="collect('+data.tips[i].id+')">收藏</span>'+
															'<span class="cancel">取消</span>'+
														'</div>'+
													'</div>'+
												'</div>'+
						                   	'</div>'+
						                '</li>'+
					                '</ul>'+
					           	'</div>';
               	});
	            $(".content").append(jointHtml);
	            //判断有需要的   个人中心我的。。   TA的 。。   我的收藏的也。。。等等需要调用 下拉、遮罩层显示、删除 等功能 
                if( dataSign=="my" || dataSign=="his" || dataSign=="collect" ){
                	commonality();
                }
                if (NowPage+1<maxPages) {
                    $(".tips").text("往下拖动查看更多！");
                }
                else{
                    $(".tips").text("我也是有底线的哦~");
                }
	        }
			else{
	        	layer.msg(data.tips);
	        }
		}
		
		//按热度、时间  切换导航
		$(".press").on("click",function(){
			$(".content").html("");
			var length = $(this).index();
			$(this).addClass("onn");
			$(this).siblings().removeClass("onn");
			$("#pageCount").attr("data-index",length+1);
			
			var num = parseInt($("#"+UniqueValue).val());
			var maxPages = parseInt(Math.ceil(num/4));//最大页数
			var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数

			
			$(".tips").text("");
			$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
			$.post('/index.php?m=api&c=index&v=more_tv', {
		        'page':1,
		        'sort_type': $("#pageCount").attr("data-index"), //排序方式,1-按时间，2-按照热度
		        'keyword':keyword
		   }, function(data){
		        jointHtml(data,NowPage,maxPages);
                if(data.status == 1){
                	$("#pageCount").attr("data-NowPage",1);
                }
		    },"JSON");
		});
		
		//滚动到底部加载
		var scrollTop;     //获取滚动条到顶部的距离
		var scrollHeight;  //获取文档区域高度 
		var windowHeight;  //获取滚动条的高度
		var flag = true;   //加载数据标志
		$(window).scroll(function(){
		    scrollTop = $(this).scrollTop();     
		    scrollHeight = $(document).height(); 
		    windowHeight = $(this).height();
		    var e,data={};
		    
		    if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
				var num = parseInt($("#"+UniqueValue).text());//总数量
			}
		    else if (dataSign=="collect" || dataSign=="about_us" ) { //收藏页、关于我们、达人视频
				var num = parseInt($("#"+UniqueValue).val());
			}
		    
			var maxPages = parseInt(Math.ceil(num/4));//最大页数
			var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
			var page=NowPage+1;
			var user_id = $("#uid").val();//用户ID
			
		    if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
		    	if (NowPage+1<=maxPages) {
					if(dataSign=="his"){ //达人视频
						url="/index.php?m=api&c=index&v=more_tv";  //达人日志
						//传输给后台的参数
						data = {page:page,
		        				sort_type: $("#pageCount").attr("data-index"), //排序方式,1-按时间，2-按照热度
		        				keyword:keyword
		        				};
					}
		            $.ajax({
		                url:url,
		                data:data,
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
		                },
		                complete:function(){
		                    if (NowPage+1<maxPages) {
		                		$(".tips").text("往下拖动查看更多！");
		                		flag = true;
		                	}
		                    else{
		                		$(".tips").text("我也是有底线的哦~");
		                		flag = false;
		                	}
		                }
		            });
		        }
		    	else{
		    		$(".tips").text("我也是有底线的哦~");
		    	}
		    }
		});
	</script>
</body>
</html>