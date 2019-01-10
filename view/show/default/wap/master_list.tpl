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
    <style type="text/css">
        .ban .title{color: #f80003;font-size: 1.21rem;line-height: 2rem;font-weight: 600;}
        .ban .describe{color: #666;font-size: 0.75rem;line-height: 1.5rem;}

        .navMeun .navLi{width: 50%;float: left;line-height: 2.5rem;background: #fff;color: #999;font-size: 1.3rem;text-align: center;}
        .navMeun .on{background: #f64e4e;color: #fff;}

        .modules .hunk{background: #fff;padding: 0 3% 5% 3%;}
        .modules .hunk .title span{display: block;color: #333;}
        .modules .hunk .title .name{float: left;line-height: 4rem;font-size: 1.1rem;font-weight: 700;}
        .modules .hunk .title .name i{font-style: normal;}
        .modules .hunk .title .botton{float: right;border: 1px #999 solid;padding: 0px 4px;font-style: initial;
        							  line-height: 20px; margin-top: 12px;font-size: 0.75rem;}
		.modules .hunk .title .botton b{display: inline-block;line-height: 20px;}
        .modules .hunk a .headPortrait{margin: 0 auto;padding: 40%;}
        .modules .hunk a .description{color: #666;font-size: 0.75rem;text-align: justify;font-style: initial;
        							  line-height: 1.4rem;margin: 0.8rem auto;-webkit-line-clamp: 5;/*三列*/}
        .modules .hunk a button{display: block;color: #eb0002;font-size: 0.7rem;
								background: #fff;border-radius: 10px;line-height: 20px;margin: 0px auto;
								border: 1.5px #eb0002 solid;padding: 0px 20px;}
		
		.backdrop{padding-top: 47%;}
		/*5.5英寸   414*736尺寸的屏幕  如iPhone6 Plus、iPhone6s Plus、iPhone7 Plus、魅族MX5    1920x1080  /3★*/
		@media only screen and (max-width: 414px) {
			.backdrop{height: 193.88px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.backdrop{height: 192.75px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.backdrop{height: 192.38px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.backdrop{height: 175.5px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.backdrop{height: 168.38px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.backdrop{height: 149.63px;}
		}
    </style>
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
	    <div class="ban marginBotom">
	        <div class="backdrop figure borderRadius" style="background-image: url({{$ad.imgurl}});"></div>
	        <div class="head fix" style="padding-right: 10px;">
	            <p class="title">旅行达人聚集地</p>
	            <p class="describe fix whiteSpace">我们曾经跨过山河大海，也穿过人山人海，<br />我们是真正懂旅行的人，也希望能带你走进最美的风景。<br /> 和我们一起，用自己喜欢的方式，去探索陌生的世界！</p>
	        </div>
	    </div>
	
	    <div class="navMeun marginBotom fix">
	        <div class="navLi on" onclick="choice(0)">旅行达人</div>
	        <div class="navLi" onclick="choice(1)">达人练习生</div>
	    </div>
	
	    <input type="hidden" id="UniqueValue" data-sign="TalentState" value="modulesNum" title="共用JS区分的唯一必须值"/>
	    <div class="container fix" data-index="0">
	        <!--旅游达人  列表-->
	        <input type="hidden" name="" id="modulesNum0" title="旅游达人的总数" value="{{$total.star}}" />
	        <div class="modules fix" id="modules0" data-page="" data-nowPage="1">
	            <div class="matter">
	                {{if $star}}
	                	{{foreach from=$star item=item key=key}}
	                <div class="hunk marginBotom fix">
	                    <p class="title fix">
	                    	<span class="name">{{if $item.tag}}<i title="标签">{{$item.tag}}</i> | {{/if}}{{$item.username}}</span>
	                    	<span class="botton" onclick="follows({{$item.uid}},this)">{{$item.uid|helper:'isfollows'}}</span>
	                    </p>
	                    <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                        <div class="headPortrait figure borderRadius" style="background-image: url({{$item.avatar}});" title="头像"></div>
	                        <p class="description omit whiteSpace">{{if $item.autograph == null || $item.autograph == "" }}该用户暂无填写简介！{{else}}{{$item.autograph}}{{/if}}</p>
	                        <button>更多他的动态</button>
	                    </a>
	                </div>
	                	{{/foreach}}
	                {{/if}}
	            </div>
	            <p class="tips tips0"></p>
	        </div>
	
	        <!--达人练习生  列表-->
	        <input type="hidden" name="" id="modulesNum1" title="达人练习生的总数" value="{{$total.seed}}" />
	        <div class="modules fix dis_none" id="modules1" data-page="" data-nowPage="1">
	            <div class="matter">
	                {{if $seed}}
	                	{{foreach from=$seed key=key item=item}}
	                <div class="hunk marginBotom fix">
	                    <p class="title fix">
	                    	<span class="name">{{if $item.tag}}<i title="标签">{{$item.tag}}</i> | {{/if}}{{$item.username}}</span>
	                    	<span class="botton" onclick="follows({{$item.uid}},this)">{{$item.uid|helper:'isfollows'}}</span>
	                    </p>
	                    <a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id={{$item.uid}}">
	                        <div class="headPortrait figure borderRadius" style="background-image: url({{$item.avatar}});" title="头像"></div>
	                        <p class="description omit whiteSpace">{{if $item.autograph == null || $item.autograph == "" }}该用户暂无填写简介！{{else}}{{$item.autograph}}{{/if}}</p>
	                        <button>更多他的动态</button>
	                    </a>
	                </div>
	                	{{/foreach}}
	                {{/if}}
	            </div>
	            <p class="tips tips1"></p>
	        </div>
	    </div>
	</div>
	{{include file='wap/footer.tpl'}}
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		window.onload=function(){
		    //判断列表的总数量是否大于等于5
		    var intelligent_num = parseInt($("#modulesNum1").val());//旅游达人的总数
		    var trainee_num = parseInt($("#modulesNum2").val());//达人练习生的总数
		
		    if (intelligent_num>=5) {
		        $(".tips1").text("往下拖动查看更多！");
		    }
		    else{
		        $(".tips1").text("我也是有底线的哦~");
		    }
		    if (trainee_num>=5) {
		        $(".tips2").text("往下拖动查看更多！");
		    }
		    else{
		        $(".tips2").text("我也是有底线的哦~");
		    }
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
		
		//切换菜单
		function choice(tab){
		    $(".navLi").eq(tab).addClass("on");
		    $(".navLi").eq(tab).siblings().removeClass("on");
		    $("#modules"+tab).removeClass("dis_none");
		    $("#modules"+tab).siblings().addClass("dis_none");
		    $(".container").attr("data-index",tab);
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
		                url:'/index.php?m=api&c=index&v=master_more',
		                data:{page:page,
		                	  type:dataIndex+1},
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
		                                        '<p class="title fix">';
		                                if (data.tips[i].tag=="") {
		                                    html += '<span class="name">'+data.tips[i].username+'</span>';
		                                }
		                                else{
		                                	html += '<span class="name"><i title="标签">'+data.tips[i].tag+'</i> | '+data.tips[i].username+'</span>';
		                                }
		                                    html += '<span class="botton" onclick="follows('+data.tips[i].uid+',this)"><b>+</b>关注</span>'+
		                                        '</p>'+
		                                        '<a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].uid+'">'+
		                                			'<div class="headPortrait figure borderRadius" style="background-image: url('+data.tips[i].headpic+')" title="头像"></div>';
		                                if( data.tips[i].autograph == null || data.tips[i].autograph == "" ){
		                                    html += '<p class="description omit">该用户暂无填写简介！</p>';
			                            }
			                            else{
		                                    html += '<p class="description omit whiteSpace">'+data.tips[i].autograph+'</p>';        	
		                               } 
		                                    html += '<button>更多他的动态</button>'+
		                                        '</a>'+
		                                    '</div>';
		                        });
		                        $("#modules"+dataIndex+" .matter").append(html);
		                        $("#modules"+dataIndex).attr("data-NowPage",NowPage+1);
		                    }
		                    else{
		                        layer.msg(data.tips);
		                    }
		                },
		                complete:function(){
		                    if (NowPage+1<maxPages) {
		                        $(".tips"+dataIndex).text("往下拖动查看更多！");
		                        flag = true;
		                    }
		                    else{
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
	</script>
</body>
</html>