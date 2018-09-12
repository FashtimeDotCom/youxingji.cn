<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>独家旅行</title> 
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/journey_list.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
</head> 
<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>独家旅行</h3>
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
       
       	<!--度假项目-->
       	<div class="ban1 fix">
            <a class="advertising dis_block fix" href="javascript:;">
                <img class="headPortrait" src="{{$ad_list.0.imgurl}}" alt=""></a>
        </div>
        
        <!--达人带你去旅行-->
        <div class="Public tour fix">
        	<p class="moduleTitle">达人带你去旅行
				<a href="javascript:;">更多>></a>
			</p>

			{{if $star_travel}}
			{{foreach from=$star_travel item=item key=key}}

			<div class="box fix">
				<a class="dis_block fix" href="index.php?m=wap&c=index&v=travel_detail&id={{$item.id}}">
					<img class="poster" src="{{$item.thumbfile}}"/>
					<p class="describe">{{$item.title}}</p>
					<p class="bottom">
						<span class="NATIONNAME">旅行天数</span>·
						<span class="time">{{$item.days}}天</span>
						<span class="cost">{{$item.price}}元/人起</span>
					</p>
				</a>
			</div>

			{{/foreach}}
			{{/if}}


        </div>
        
        <!--名家带你去写生-->
        <div class="Public sketching fix">
        	<p class="moduleTitle">名师带你去写生<a href="javascript:;">更多>></a></p>

			{{if $sketch_list}}
			{{foreach from=$sketch_list item=item key=key}}

			<div class="box fix">
				<a class="dis_block fix" href="index.php?m=wap&c=index&v=sketch_detail&id={{$item.id}}">
					<img class="poster" src="{{$item.thumbfile}}"/>
					<p class="describe">{{$item.title}}</p>
					<p class="bottom">
						<span class="NATIONNAME">旅行天数</span>·
						<span class="time">{{$item.days}}天</span>
						<span class="cost">{{$item.price}}元/人起</span>
					</p>
				</a>
			</div>

			{{/foreach}}
			{{/if}}


        </div>
       
       	<!--独家资源-->
       	<div class="ban1 exclusive fix">
            <a class="advertising dis_block fix" href="javascript:;">
                <img class="headPortrait" src="{{$ad_list.1.imgurl}}" alt=""></a>
        </div>

        <!--国家分类-->
        <div class="Public classify fix">
			{{foreach from=$label_list item=item key=key}}

			<div class="chunk fix">
				<p class="moduleTitle">{{$item.name}}<a href="javascript:;">更多>></a></p>

				{{if $item.info}}
				{{foreach from=$item.info key=k item=vo}}
				<div class="box fix">
					<a class="dis_block fix" href="index.php?m=wap&c=index&v=journeydetail&id={{$vo.id}}">
						<img class="poster" src="{{$vo.articlethumb}}"/>
						<p class="describe">{{$vo.title}}</p>
						<p class="bottom">
							<span class="NATIONNAME">旅行天数</span>·
							<span class="time">{{$vo.lxts}}天</span>
							<span class="cost">{{$vo.price}}元/人起</span>
						</p>
					</a>
				</div>
				{{/foreach}}
				{{/if}}

			</div>

			{{/foreach}}

        </div>
    </div>
    <script type="text/javascript">
    	
    </script>
    {{include file='wap/footer.tpl'}}
</body>
</html>