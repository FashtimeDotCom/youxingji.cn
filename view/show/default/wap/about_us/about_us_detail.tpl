<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>关于我们之标题</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <style type="text/css">
		.content{background: #fff;padding: 2% 3% 5%;}
		.content .title{font-size: 20px;color: #333;line-height: 40px;border-bottom: 1px #ddd solid;}
		.content .description{color: #5a5a5a;font-size: 0.75rem;line-height: 18px; text-align: justify;}
		.content .headPortrait img{display: block;width: 100%;}
		.marginTop{margin-top: 20px;}
    </style>
</head>
<body class="">
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>关于我们</h3>
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

        <div class="backdrop fix">
			<img src="{{$detail.thumbfile}}" title="海报/封面">
		</div>

		<div class="content marginBotom fix">
			<p class="title" title="标题">{{$detail.title}}</p>
			{{$detail.content}}
		</div>
	</div>
	{{include file='wap/footer.tpl'}}
</body>
</html>