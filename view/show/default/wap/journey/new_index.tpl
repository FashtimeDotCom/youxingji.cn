<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>独家路线</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/path.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>独家路线</h3>
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
	
	    <div class="navMeun marginBotom fix">
	    	<div class="vessel">
				{{foreach from=$type_list key=key item=item}}
				<div class="navLi {{if $item.id==1}}on{{/if}}" onclick="choice(this,{{$item.id}})" data-amount="">{{$item.type_name}}</div>
				{{/foreach}}
	    	</div>
	    </div>
	
	    <!--正文 列表-->
	    <input type="hidden" id="UniqueValue" data-sign="TalentState" value="value" title="共用JS区分的唯一必须值"/>
	    <input type="hidden" name="第一个分类的总数" id="totality" title="总数" value="{{$num}}" />
	    <div class="modules fix" id="pageCount" data-index="1" data-nowPage="1">
	        <div class="matter" style="padding-top: 0.9rem;">
				{{if $jourbey_list}}
					{{foreach from=$jourbey_list key=key item=item}}
				<a class="dis_block hunk marginBotom fix" href="index.php?m=wap&c=index&v=journeydetail&id={{$item.id}}">
					<div class="cover figure borderRadius" style="background-image: url({{$item.articlethumb}});"></div>
					<div class="right fix">
						<p class="title omit lineNumber2">{{$item.title}}</p>
						<p class="describe">{{$item.description}}</p>
						<div class="bottom fix">
							<span class="left">
								<img src="/resource/m/images/common/icon_location2.png" />
								<i class="Iclass">{{$item.address}}</i>
							</span>
							<span class="spanRight"><i class="Iclass">{{$item.price}}</i>元/位</span>
						</div>
					</div>
				</a>
					{{/foreach}}
				{{else}}
				<!--无数据-->
				<div class="hunk marginBotom fix">
					<img src="/resource/m/images/user/defaul_tv_bg.png"/>
					<p class="dataTips">暂无数据！</p>
				</div>
				{{/if}}
	        </div>
	        <p class="tips"></p>
	   	</div>
	</div>
	{{include file='wap/footer.tpl'}}
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
	    window.onload=function(){
	        //判断列表的总数量是否大于等于5
	        var index = $("#pageCount").attr("data-index");
	        var value = parseInt($("#UniqueValue").val());
	        var num = parseInt($("#totality").val());     //总数
	        var maxPages = parseInt(Math.ceil(num/5));    //最大页数
			$(".navLi").eq(0).attr("data-amount",num);
	        if (num>=5) {
	            $(".tips").text("往下拖动查看更多！");
	        }
	        else{
	            $(".tips").text("我也是有底线的哦~");
	        }
	    }
		
        var flag = true;   //加载数据标志
	    //切换菜单
	    function choice(obj,id){
	    	var index = $(obj).index();
	        $(".navLi").eq(index).addClass("on");
	        $(".navLi").eq(index).siblings().removeClass("on");
	        $("#pageCount").attr("data-index",id);   //返回类型，方便下拉更新
	        $(".matter").html("");
	        
	        $.ajax({
                url:'/index.php?m=api&c=index&v=journey_list',
                data:{page:1,
                	  type:id},
                type:'post',
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
                            html += '<a class="dis_block hunk marginBotom fix" href="index.php?m=wap&c=index&v=journeydetail&id='+data.tips[i].id+'">'+
					                	'<div class="cover figure borderRadius" style="background-image: url('+data.tips[i].articlethumb+');"></div>'+
					                	'<div class="right fix">'+
					                		'<p class="title omit lineNumber2">'+data.tips[i].title+'</p>'+
					                		'<p class="describe omit lineNumber2">'+data.tips[i].description+'</p>'+
					                		'<div class="bottom fix">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">'+data.tips[i].address+'</i></span>'+
					                			'<span class="spanRight"><i class="Iclass">'+data.tips[i].price+'</i>元/位</span>'+
					                		'</div>'+
					                	'</div>'+
					                '</a>';
                        });
                        $(".matter").append(html);
						
						$(".navLi").eq(index).attr("data-amount",data.total);
                        $("#pageCount").attr("data-NowPage",1);
                        $("#pageCount").attr("data-index",id);
                        
                        maxPages = parseInt(Math.ceil(data.total/5));//旅游达人的最大页数
                    }
                    else{
                        layer.msg(data.tips);
                        var html1 = '<div class="hunk marginBotom fix">'+
										'<img src="/resource/m/images/user/defaul_tv_bg.png"/>'+
										'<p class="dataTips">暂无数据！</p>'+
									'</div>';
						$(".matter").html(html1);
                    }
                },
                complete:function(){
                    if (1<maxPages) {
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

        var scrollTop;     //获取滚动条到顶部的距离
        var scrollHeight;  //获取文档区域高度
        var windowHeight;  //获取滚动条的高度
        $(window).scroll(function(){
            scrollTop = $(this).scrollTop();
            scrollHeight = $(document).height();
            windowHeight = $(this).height();
            var e;

            var Index = parseInt($("#pageCount").attr("data-index"));           //分类
            var num = parseInt($(".navLi").eq(Index-1).attr("data-amount"));//当前第几个分类的总数
            var NowPage = parseInt( $("#pageCount").attr("data-nowPage") );     //当前页数
            maxPages = parseInt(Math.ceil(num/5));                              //旅游达人的最大页数
            var page=NowPage+1;
            if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
                if (NowPage+1<=maxPages){
                    $.ajax({
                        url:'/index.php?m=api&c=index&v=journey_list',
                        data:{page:page,
                        	  type:Index},
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
		                            html += '<a class="dis_block hunk marginBotom fix" href="/index.php?m=wap&c=index&v=journeydetail&id='+data.tips[i].id+'">'+
							                	'<div class="cover figure borderRadius" style="background-image: url('+data.tips[i].id+');"></div>'+
							                	'<div class="right fix">'+
							                		'<p class="title omit lineNumber2">'+data.tips[i].title+'</p>'+
							                		'<p class="describe omit lineNumber2">'+data.tips[i].description+'</p>'+
							                		'<div class="bottom fix">'+
														'<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">'+data.tips[i].address+'</i></span>'+
							                			'<span class="spanRight"><i class="Iclass">'+data.tips[i].price+'</i>元/位</span>'+
							                		'</div>'+
							                	'</div>'+
							                '</a>';
                                });
                                $(".matter").append(html);
                                $("#pageCount").attr("data-NowPage",NowPage+1);
                            }
                            else{
                                layer.msg(data.tips);
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