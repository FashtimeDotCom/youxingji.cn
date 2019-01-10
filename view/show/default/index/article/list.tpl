<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>独家旅行_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/journeylist.css" />
</head>
<body onkeydown="on_return();">
    {{include file='public/header.tpl'}} 
    <div class="main fix">
        {{vplist from='ad' item='adlist' tagname='pc_journey_list'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur"><div class="wp"><a href="">首页</a> &gt; <span>独家旅行</span></div></div>
        
		<!--正文-->
        <div class="content fix">
        	<!--左侧菜单-->
        	<div class="left">
        		<p class="title">主题选择</p>
        		
        		<input type="hidden" name="" id="itemType" value="{{$type}}" />
        		<div class="theme">
        			<p class="secondTitle">主题</p>
        			<div class="list">
						<a href="/index.php?m=index&c=article&v=new_list">
							<span class="sample {{if $type=='' }}one{{/if}}">全部</span>
						</a>
						{{foreach from=$type_list item=item key=key}}
						<a href="/index.php?m=index&c=article&v=new_list&type={{$item.id}}">
							<span class="sample {{if $item.id==$type}}one{{/if}}">{{$item.type_name}}</span>
						</a>
						{{/foreach}}
        			</div>
        		</div>
        		
        		<input type="hidden" name="" id="itemDay" value="{{$day}}" />
        		<div class="numberDays">
        			<p class="secondTitle">旅行天数</p>
        			<div class="list">
						<a href="/index.php?m=index&c=article&v=new_list">
							<span class="sample {{if $day==''}}one{{/if}}">全部</span>
						</a>
						{{foreach from=$travel_days item=item key=key}}
						<a href="/index.php?m=index&c=article&v=new_list&days={{$item}}">
							<span class="sample {{if $item == $day}}one{{/if}}">{{$item}}日</span>
						</a>
						{{/foreach}}
        			</div>
        		</div>
        	</div>
        	
        	<!--右侧内容列表-->
        	<div class="right">
	            <div class="box fix">
	            	{{if $list}}
					{{foreach from=$list item=item key=key}}
					<div class="module fix">
						<a class="dis_block" href="/index.php?m=index&c=index&v=journeydetail&id={{$item.id}}">
							<div class="figure poster borderRadius" style="background-image: url({{$item.articlethumb}});" title="海报/封面"></div>
							<div class="right">
								<p class="title apostrophe">{{$item.title}}</p>
								<div class="location">
									<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
									<i class="Iclass apostrophe">{{$item.address}}</i>
								</div>
								<p class="describe omit lineNumber2 whiteSpace">{{$item.cutstr}}</p>

								<p class="diamonds"><span>￥<i class="Iclass">{{$item.price}}</i></span>元/位</p>
							</div>
							<span class="seeMore">查看行程</span>
						</a>
					</div>
					{{/foreach}}
					{{else}}
					<!--无信息-->
					<div class="mainTips fix">
						<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_bg.png);" title="海报/封面"></div>
						<div class="tip"><p class="title">暂无该主题信息哦！</p></div>
					</div>
					{{/if}}
	        	</div>
	
				<!-- 页码 -->
				{{if $multipage}}
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
					<ul>{{foreach from=$multipage item=page}}
						<li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}&type={{$type}}">{{$page.0}}</a></li>
						{{/foreach}}
						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				{{/if}}
				<!-- 页码 end-->
        	</div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
		//监控 页面内容输入框 ，包括粘贴板
		function judgeIsNonNull2(event){
			var value=$("#pages").val();
			$("#pages").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)
		
			if(value !== ""){
				var res = /[\、\…\.\．\·\•\'\,\，\。\×\_\＿\-\−\－\—\ˉ\ˇ\々\＇\｀\‘\’\“\”\〃\¨\"\＂\｜\|\‖\(\)\（\）\〔\〕\<\>\〈\〉\《\》\「\」\『\』\〖\〗\【\】\［\］\[\]\{\}\｛\｝\/\*\＊\?\？\^\＾\+\＋\=\＝\÷\¥\￥\#\＃\@\＠\!\！\`\~\～\%\％\∶\:\：\;\；\&\＆\$\＄\£\￡\€\°\°C\°F\←\↑\→\↓\／\＼\\]/g;
				if( res.test(value) ){
					$("#pages").val(value.replace(res,""));
					return false;
				}
		   	}
		}
		
		//监控 页面内容输入框 ，包括粘贴板
		$("#pages").bind('input propertychange', function(){
			judgeIsNonNull2(event);
		});
		
		//跳转
		var total_page = parseInt($("#total_page").text());                       //总页数
		function check(){
			var page = $('#pages').val();//跳转
			var cur_page = $(".on a").text();   //当前页
			var itemType= $("#itemType").val(); //主题
			var itemDay = $("#itemDay").val();  //天数
			if(page){
				if (page>total_page || page<1) {
					layer.msg("不在页数范围内!");
					return false;
				}
				if( cur_page == page ){
					layer.msg("该页码已经是当前页!");
					return false;
				}
				else{
					if( itemType == "" && itemDay == "" ){ //没选择  主题、旅行天数  状态
						window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type=";
					}
					else{
						if( itemType != "" && itemDay == "" ){   //已选择 主体
							window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type="+ itemType;
						}
						else{                                    //已选择 旅行天数
							window.location.href="/index.php?m=index&c=article&v=new_list&page="+ page +"&type="+ itemDay;
						}
					}
				}
            }
		}
		
		//敲回车 跳转页面
		function on_return(){
			if(window.event.keyCode == 13){
				if(document.all('pageqr') != null) {
					document.all('pageqr').click();
				}
			}
		}
    </script>
</body>
</html>