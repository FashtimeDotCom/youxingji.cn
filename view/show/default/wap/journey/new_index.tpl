<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人邦</title>
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
	    <h3>达人邦</h3>
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
	    		<div class="navLi on" id="value1" onclick="choice(this,0)" data-amount="">达人带你去旅行</div>
		        <div class="navLi" id="value2" onclick="choice(this,1)" data-amount="">名师带你去写生</div>
		        <div class="navLi" id="value3" onclick="choice(this,2)" data-amount="">佛系旅游</div>
		        <div class="navLi" id="value4" onclick="choice(this,3)" data-amount="">2佛系旅游</div>
		        <div class="navLi" id="value5" onclick="choice(this,4)" data-amount="">3佛系旅游</div>
	    	</div>
	    </div>
	
	    <!--正文 列表-->
	    <input type="hidden" id="UniqueValue" data-sign="TalentState" value="value" data-type="7" title="共用JS区分的唯一必须值"/>
	    
	    <div class="modules fix" id="pageCount" data-index="1" data-page="" data-nowPage="1">
	    	
	        <div class="matter">
	        	<!--无数据-->
	        	<div class="hunk marginBotom fix dis_none">
	        		<img src="/resource/m/images/user/defaul_tv_bg.png"/>
	        		<p class="dataTips">暂无数据！</p>
	        	</div>
	        	
	        	<!--有数据-->
	            <div class="hunk marginBotom fix">
	                <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                	<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>
	                	<div class="right fix">
	                		<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>
	                		<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>
	                		<div class="bottom fix">
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>
	                			<span class="spanRight"><i class="Iclass">28888</i>人/起</span>
	                		</div>
	                	</div>
	                </a>
	            </div>
	            <div class="hunk marginBotom fix">
	                <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                	<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>
	                	<div class="right fix">
	                		<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>
	                		<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>
	                		<div class="bottom fix">
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>
	                			<span class="spanRight"><i class="Iclass">28888</i>人/起</span>
	                		</div>
	                	</div>
	                </a>
	            </div>
	            <div class="hunk marginBotom fix">
	                <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                	<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>
	                	<div class="right fix">
	                		<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>
	                		<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>
	                		<div class="bottom fix">
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>
	                			<span class="spanRight"><i class="Iclass">28888</i>人/起</span>
	                		</div>
	                	</div>
	                </a>
	            </div>
	            <div class="hunk marginBotom fix">
	                <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                	<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>
	                	<div class="right fix">
	                		<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>
	                		<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>
	                		<div class="bottom fix">
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>
	                			<span class="spanRight"><i class="Iclass">28888</i>人/起</span>
	                		</div>
	                	</div>
	                </a>
	            </div>
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
	        var num = parseInt($("#value"+index).attr("data-amount"));//总数
	
	        var maxPages = parseInt(Math.ceil(num/4));    //最大页数

	        if (num>=5) {
	            $(".tips").text("往下拖动查看更多！");
	        }
	        else{
	            $(".tips").text("我也是有底线的哦~");
	        }
	    }
		
		function jointHtml(data,NowPage,maxPages){
			var jointHtml="";
			if(data.status == 1){
				
			}
		}
		
	    //切换菜单
	    function choice(obj,id){
	    	var index = $(obj).index();
	    	var html="";
	        $(".navLi").eq(index).addClass("on");
	        $(".navLi").eq(index).siblings().removeClass("on");
	
	        $(".matter").html("");
	        
	        $.ajax({
                url:'',
                data:{page:1,
                	  type:dataIndex,
                	  id:id},
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
                            html += '<div class="hunk marginBotom fix">'+
						                '<a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].username+'">'+
						                	'<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>'+
						                	'<div class="right fix">'+
						                		'<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>'+
						                		'<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>'+
						                		'<div class="bottom fix">'+
													'<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>'+
						                			'<span class="spanRight"><i class="Iclass">28888</i>人/起</span>'+
						                		'</div>'+
						                	'</div>'+
						                '</a>'+
						            '</div>';
                        });
                        $(".matter").append(html);

                        $("#matter").attr("data-NowPage",1);
                        if (maxPages>1) {
                            $(".tips").text("往下拖动查看更多！");
                            flag = true;
                        }
                        else{
                            $(".tips").text("我也是有底线的哦~");
                            flag = false;
                        }
                    }
                    else{
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

            var dataIndex = parseInt($(".container").attr("data-index"));

            //判断列表的总数量是否大于等于5
            var num = parseInt($("#modulesNum"+dataIndex).val());//总数

            maxPages = parseInt(Math.ceil(num/4));//旅游达人的最大页数

            var NowPage = parseInt( $("#modules"+dataIndex).attr("data-nowPage") );//当前页数

            var page=NowPage+1;

            if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
                if (NowPage+1<=maxPages){
                    $.ajax({
                        url:'',
                        data:{page:page,
                        	  type:dataIndex,
                        	  id:id},
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
								                '<a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].username+'">'+
								                	'<div class="cover figure borderRadius" style="background-image: url(/resource/m/images/pic-yz1.jpg);"></div>'+
								                	'<div class="right fix">'+
								                		'<p class="title omit lineNumber2">贝加尔湖绿叶追踪10天</p>'+
								                		'<p class="describe omit lineNumber2">巴黎-柏林-慕尼黑-新天鹅堡-慕尼黑-威尼斯-佛罗伦萨-罗马</p>'+
								                		'<div class="bottom fix">'+
															'<span class="left"><img src="/resource/m/images/common/icon_location2.png" /><i class="Iclass">俄罗斯</i></span>'+
								                			'<span class="spanRight"><i class="Iclass">28888</i>人/起</span>'+
								                		'</div>'+
								                	'</div>'+
								                '</a>'+
								            '</div>';
                                });
                                $("#matter").append(html);

                                $("#matter").attr("data-NowPage",NowPage+1);
                                if (NowPage+1<maxPages) {
                                	flag = true;
                                    $(".tips").text("往下拖动查看更多！");
                                }
                                else{
                                	flag = false;
                                    $(".tips").text("我也是有底线的哦~");
                                }
                            }
                            else{
                                layer.msg(data.tips);
                            }
                        }
                    });
                }
                else{
                    $(".tips"+dataIndex).text("我也是有底线的哦~");
                }
            }
        });
	    
	    	
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
	
	</script>
</body>
</html>