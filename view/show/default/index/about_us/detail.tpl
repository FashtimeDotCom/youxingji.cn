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
	<!--<link rel="stylesheet" href="/resource/css/public.css" />-->
	<style type="text/css">
		.cur span{color: #d71618;}

		.content{width: 1200px;margin: 0px auto 87px;padding-top: 1px;}
		.content .title{color: #333;font-size: 20px;text-align: center;line-height: 88px;}
		.content .describe{line-height: 30px;color: #333;text-align: justify;}
		.content .illustration{margin: 12px auto 21px;height:400px;}
		
		/*模仿朋友圈   九宫格显示    防止图片变形*/
		.figure{padding-bottom: ; /* 关键就在这里 */
			  	background-position: center;
			  	background-repeat: no-repeat;
			  	background-size: cover;}
		.borderRadius{border-radius:0px!important;}
		
		.fix{*zoom:1;}
		.fix:after{display:block; content:"clear"; height:0; clear:both; overflow:hidden; visibility:hidden;}

	</style>
</head>
<body>
    {{include file='public/header.tpl'}} 
    <div class="main fix">
        {{vplist from='ad' item='adlist' tagname='pc_journey_list'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur"><div class="wp"><a href="">首页</a> &gt; <a href="/index.php?m=index&c=aboutus&v=index">关于我们</a> &gt; <span>{{$info.title}}</span></div></div>
        
		<!--正文-->
        <div class="content fix">
        	<h3 class="title">{{$info.title}}</h3>
        	<div>{{$info.content}}</div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
</body>
</html>