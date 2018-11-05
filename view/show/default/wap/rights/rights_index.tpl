<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人权益</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <style type="text/css">
    	/*
		 2018-09-05  14:3159
		 HQS
		 * */
		body{padding-top:0;background: #fbc8bb;}
		.mian{margin-top:0;}
		
		
		.modules{width: 94%;margin: 0 auto;}
		.modules .title{text-align: center;color: #e22020;font-size: 1.6rem;font-weight: 600;
						margin-top: -10px;margin-bottom: 14px;}
		.modules .block{width: 25%;float: left;}
		.modules .block .portrait{width: 60%;padding-bottom: 60%;margin: 0 auto;border-radius: 50%;}
		.modules .block .name{text-align: center;color: #901d1d;font-size: 1rem;line-height: 30px;margin-bottom: 4px;}
		
		
		.modules .issue{color: #d22929;border: 1px #cd2d35 solid; border-radius: 6px;padding: 2px 2px;text-align: center;
						font-weight: 600;font-size: 1.4rem;width: 46%;margin: 5px auto 10px;}
		
		.modules .matter h4{text-align: justify;color: #b31e1e;margin-bottom: 20px;line-height: 16px;font-size: 1rem;}
		
		.join{display: block;color: #fff;font-size: 1.1rem;background: #c12020;margin: 2px auto 20px;
			  width: 26%;border-radius: 13px;line-height: 22px;text-align: center;}
    </style>
</head>
<body>
	<div class="poster fix"><img src="/resource/m/images/rights_index.png" title="海报/封面"></div>

	<!--用户头像-->
	<div class="modules fix" style="width:100%;">
		<p class="title">达人邦</p>
		{{foreach from=$list item=item key=key}}
		<div class="block fix">
			<div class="portrait figure" style="background-image: url({{$item.headpic}});"></div>
			<p class="name apostrophe">{{$item.username}}</p>
		</div>
		{{/foreach}}

	</div>
	
	<!--如何成为达人-->
	<div class="modules">
		<p class="issue">如何成为达人</p>
		<div class="matter">
			<h4>1)必须是游行迹会员，完善个人信息和自我介绍，上传清晰的个人头像和照片，主页设置生动；</h4>
			<h4>2)具有一定的文字功底及拍摄技术（若你在某方面有特长，是某领域的佼佼者，会额外加分）；</h4>
			<h4>3)在达人帮发布至少5篇原创游记和10篇短篇游记，被推荐到首页最热专区的精品游记至少三篇；</h4>
			<h4>4)活跃度高，在平台点评数量要求30条以上；回答问题数量要在20条以上；粉丝数量200以上；游记回复数量两篇200以上；没有过不良记录；</h4>
			<h4>5)以上都集齐后旅历值达18级以上，可申请游行迹达人！</h4>
		</div>
	</div>
	
	<!--如何成为达人-->
	<div class="modules">
		<p class="issue">如何成为达人</p>
		<div class="matter">
			<h4>1、上传的有机必须包括9张图片，并且9张图片的清晰都要保证高质量，不能用网上下载的图片；</h4>
			<h4>2、文字内容要达到200字以上，内容必须有条理，不能杂乱无章或者记流水账，行文要流畅和给人强代入感；</h4>
			<h4>3、能突出景点的特别之处，发现景点不一样的地方，而不是大家写过或看过很多次的内容；</h4>
			<h4>4、被推送到网站首页。</h4>
		</div>
	</div>
	
	<!--成为达人的权益-->
	<div class="modules">
		<p class="issue">成为达人的权益</p>
		<div class="matter">
			<h4>1、达人身份认证标识；</h4>
			<h4>2、成为达人后游记优先审核；</h4>
			<h4>3、优先推荐：内容更多曝光，受邀成为达人帮分享会主讲人、访谈嘉宾，打造个人影响力；</h4>
			<h4>4、优先获得参与合作活动免费旅行的机会；</h4>
			<h4>5、旅行达人的证书；</h4>
			<h4>6、可与旅行部合作，规划旅行线路，获取收益；</h4>
			<h4>7、可享受平台独家旅行线路7折优惠。</h4>
		</div>
	</div>
	<!--<a class="join" href="javascript:;">加入我们</a>-->
	
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉到底部触发更新增加信息JS函数集合"></script>
</body>
</html>