<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>关于我们_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<style type="text/css">
		/*2018-11-16  11:36:38
		 * HQS 
		 * 
		 * 游行迹   达人日志列表页
		 * */
		
		*{font-size: 14px;}
		
		.main{position: relative;}
		
		/*说明*/
		.explain{width: 1200px; margin: -304px auto 0;height: 819px;}
		.explain .title{height: 140px;line-height: 140px;text-align: center;font-size: 44px;color: #fff;font-weight: 600;
						width: 100%;margin: 0 auto;text-shadow:2px 2px 8px #000;}
		.explain .title i{font-size: 44px;height: 140px;}
		
		.explain .box{height: 679px;padding: 28px 45.5px;width: 100%;margin: 0 auto;
					-webkit-box-shadow: 0 0 7px 3px #c1c1c1;
					-moz-box-shadow: 0 0 7px 3px #c1c1c1;
					box-shadow: 0 0 7px 3px #c1c1c1;
					background: #fff url(/resource/images/about_us/bg.png) no-repeat bottom right;}
		
		.explain .box .describe{colo: #666;line-height: 31px;text-align: justify;font-size: 16px;margin-bottom: 40px;}
		.explain .box .subtitle{color: #666;font-size: 20px;line-height: 20px;margin: 0px auto 35px;text-align: left;font-weight: 600;}
		.widtH{width: 50%;display: inline-block;}
		
		
		/*正文列表*/
		.mainBody{width: 1200px;margin: 0px auto;}
		.mainBody .title{font-size: 24px;text-align: center;color: #d71618;margin: 53px auto 23px;font-weight: 600;}
		
		.mainBody .box .module{position: relative;margin-top: 36px;margin-bottom: 55px;}
		.mainBody .box .module .linellae{width: 1px;background: #858585;position: absolute;left: 46px;}
		.mainBody .box .module .linellae.top{top: -65px;height: 80px;}
		.mainBody .box .module .linellae.bottom{top: 40px;height: 51px;}
		.mainBody .box .module:first-child .top{display: none;}
		
		
		.mainBody .box .module .articleTitle{line-height: 22px;padding-left: 58px;position: relative;}
		.mainBody .box .module .articleTitle em{display: inline-block; width: 15px;height: 15px;border-radius: 50%;background: #c92d42;
												position: absolute;top: 25px;left: 39px;}
		.mainBody .box .module .articleTitle span{font-size: 24px;color: #333;}
		.mainBody .box .module .time{line-height: 57px;color: #666;padding-left: 58px;font-size: 18px;margin-bottom: 8px;}
		
		.mainBody .box .module .cover{height: 399px;position: relative;}
		.mainBody .box .module .cover .describe{background: rgba(0,0,0,0.2);width: 345px;height: 286px;color: #fff;
												position: absolute;top: 0;right: 92px;padding: 23px 19px;line-height: 30px;font-size: 16px;}
		.mainBody .box .module .cover .describe span{display: inline-block;width: 282px;-webkit-line-clamp: 8;}
		
		.pagination{width: 1200px;margin: 0px auto 36px;}
		
		.pagination .pages .amount{display: inline-block;color: #999;margin-right: 10px;}
		.pagination .pages li a:hover,.pages li.on a{background-color:#d71618;}
		
		.pagination .pages .pages-form .btn{background: -webkit-linear-gradient(#fefffe, #f0f1f0); /* Safari 5.1 - 6.0 */
											background: -o-linear-gradient(#fefffe, #f0f1f0); /* Opera 11.1 - 12.0 */
											background: -moz-linear-gradient(#fefffe, #f0f1f0); /* Firefox 3.6 - 15 */
											background: linear-gradient(#fefffe, #f0f1f0); /* æ ‡å‡†çš„è¯­æ³• */}
		.pagination .pages .pages-form .btn:hover{background:#d71618;}
	</style>
</head>
<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='pc_aboutus_list'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        
        <!--说明-->
        <div class="explain">
        	<p class="title fix"><i class="Iclass">555,333</i>人用游行迹出行</p>
        	<div class="box fix">
        		<p class="describe">这是一个“三新二意”的旅行互动平台。推出了新主张：我负责出钱，你负责出发；创造了新模式：公益＋社会实践＋旅行；探索了新融合：首推绘画与旅行融合的O2O模式。注重表现形式有创意：在互联网平台率先推出用九宫格的形式直播旅行；</p>
        		<p class="subtitle">关于游行迹</p>
        		<p class="describe">这是一个“三新二意”的旅行互动平台。推出了新主张：我负责出钱，你负责出发；创造了新模式：公益＋社会实践＋旅行；探索了新融合：首推绘画与旅行融合的O2O模式。注重表现形式有创意：在互联网平台率先推出用九宫格的形式直播旅行；</p>
        		<p class="describe">追求主题定位有新意：着力展现旅行达人的旅行轨迹和人生感悟，塑造具有新型价值观的旅行导师和人生达人。</p>
        		<p class="describe widtH">这就是我们——一个有态度的旅行平台。</p>
				<p class="describe widtH">前路漫漫，完美的旅程源于你我的默契；</p>
				<p class="describe widtH">前程无限，品牌的锻造在于你我的配合。</p>
				<p class="describe widtH">欢迎您，请与我们共同成长——</p>
        	</div>
        </div>

        <!--正文列表-->
        <div class="mainBody">
        	<p class="title">“游行迹”大事件</p>
            <div class="box fix">
				{{foreach from=$list item=item key=key}}
				<div class="module fix">
					<a class="dis_block fix" href="/index.php?m=index&c=aboutus&v=detail&id={{$item.id}}">
						<div class="linellae top"></div>
						<div class="linellae bottom"></div>
						<p class="articleTitle"><em></em><span class="titleName">{{$item.title}}</span></p>
						<p class="time">{{$item.addtime}}</p>
						<div class="figure borderRadius cover" style="background-image: url({{$item.thumbfile}});">
							<p class="describe omit">{{$item.describes}}</p>
						</div>
					</a>
				</div>
				{{/foreach}}
        	</div>

			<!-- 页码 -->
			<div class="pagination fix">
				{{if $multipage}}
				<div class="pages">
					<div class="amount">共<i class="Iclass">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
					<ul>
						{{foreach from=$multipage item=page}}
						<li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
						{{/foreach}}
						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				{{/if}}
			</div>
			<!-- 页码 end-->
       </div>
    </div>
    {{include file='public/footer.tpl'}}
</body>
</html>