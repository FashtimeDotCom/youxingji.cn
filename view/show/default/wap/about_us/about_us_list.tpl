<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>关于我们</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <style type="text/css">
		.ban .title{color: #d71618;font-size: 0.8rem;line-height: 24px;font-weight: 600;}
		.ban .describe{color: #666;}
		.ban .SubTitle{font-weight: 600;color: #505050;}
		.common{font-size: 0.75rem;line-height: 16px;}

		.modules .item{background: #fff;}
		.modules .item a{display: block;width: 100%;}
		.modules .item a .title{font-size: 0.9rem;-webkit-line-clamp: 3;line-height: 16px;text-align: justify;font-weight: 600;color: #333;}
		.modules .item a .time{color: #666;margin-bottom: 4px;}
		.modules .item a .headPortrait img{display: block;width: 100%;margin: 0 auto 10px;}
		.modules .item a .details{padding: 0 10px;}
		
		.modules .item a .details .description{text-align: justify;color: #666;margin: 0rem auto 0.8rem;-webkit-line-clamp: 5;/*三列*/}
		.modules .item a .details button{display: block;color: #d71618;font-size: 0.7rem;
										background: #fff;border-radius: 10px;line-height: 18px;margin: 0px auto 20px;
										border: 1px #d71618 solid;padding: 0px 20px;font-weight: 600;}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>关于我们</h3>
	</div>
	<div class="mian">
	    <div class="g-top">
	        <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="logo" /></a></div>
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
	        <div class="backdrop fix"><img src="{{$ad.imgurl}}" title="海报/封面"></div>
	        <div class="head fix">
	        	<p class="title">达人带你旅行，让你的旅行更好玩更省心</p>
	        	<p class="describe common SubTitle">推出了新主张：</p>
	        	<p class="describe common">我负责出钱，你负责出发；</p>
	        	<p class="describe common SubTitle">创造了新模式：</p>
	        	<p class="describe common">公益＋社会实践＋旅行；</p>
	        	<p class="describe common SubTitle">探索了新融合：</p>
	        	<p class="describe common">首推绘画与旅行融合的O2O模。</p>
	        	<p class="describe common SubTitle">注重表现形式有创意：</p>
	        	<p class="describe common">在互联网平台率先推出用九宫格的形式直播旅行；</p>
	        	<p class="describe common SubTitle">追求主题定为有新意：</p>
	        	<p class="describe common">着力展现旅行达人的旅行轨迹和人生感悟，塑造具有新兴价值观的旅行到适合人生达人。</p>
	        	<p class="describe common SubTitle">这就是我们——一个有态度的旅行平台。</p>
	        </div>
	    </div>
		
	    <input type="hidden" id="about_us" title="总数" value="{{$total}}" />
	    <input type="hidden" id="UniqueValue" data-sign="about_us" value="about_us" title="共用JS区分的唯一必须值"/>
    	<div class="modules fix" id="pageCount" data-index="1" data-page="" data-nowPage="1">
    		<div class="content">
				{{foreach from=$list item=item key=key}}
				<div class="item fix item_{{$item.id}}">
					<div class="wp">
						<a class="fix" href="/index.php?m=wap&c=aboutus&v=detail&id={{$item.id}}">
							<div class="headPortrait fix"><img src="{{$item.thumbfile}}" title="海报/封面"/></div>
							<div class="details fix">
								<p class="title fix omit">{{$item.title}}</p>
								<p class="time common">{{$item.addtime}}</span></p>
								<p class="description common omit">{{$item.desc}}</p>
								<button>查看更多</button>
							</div>
						</a>
					</div>
				</div>
				{{/foreach}}
    		</div>
    		<p class="tips tips1"></p>
    	</div>
	</div>
	{{include file='wap/footer.tpl'}}
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉到底部触发更新增加信息JS函数集合"></script>
</body>
</html>