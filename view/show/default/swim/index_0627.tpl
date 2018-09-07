<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	    <meta name="renderer" content="webkit" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	    <meta name="format-detection" content="telephone=no" />
		<title>游主张</title>
		<meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
		<meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
	  	<link rel="stylesheet" href="/resource/css/style.css" />
	    <link rel="stylesheet" type="text/css" href="/resource/css/swim/main.css"/>
	    <link rel="stylesheet" type="text/css" href="/resource/css/media1280.css"  media="screen and (min-width: 1200px) and (max-width: 1299px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css"  media="screen and (min-width: 1300px) and (max-width: 1399px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css"  media="screen and (min-width: 1400px) and (max-width: 1499px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css"  media="screen and (min-width: 1500px) and (max-width: 1699px)">

	    <script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
	    
	   
	</head>
	<body>
		{{include file='public/header.tpl'}}

		<div class="main">
		{{if $info }}
		{{foreach from=$info item=item key=key}}
			<div class="item" style="background: url({{$item.img_url}}) no-repeat center center;background-size:100% 100%;">
				<div class="box">
					<div class="box-text">
						<div class="box-title">
							{{$item.name}}
						</div>
						<div class="txt">
							{{$item.desc}}
						</div>
						<div class="btn">
							<input type="button" data-url="index.php?m=index&c=index&v=recruiting&id=1" class="see" id="" value="查看更多" {{if $item.status==0}}disabled{{/if}} /><!--http://www.youxingji.cn/index.php?m=index&c=index&v=recruiting&id=1-->
							<input type="button" data-url="{{$item.sign_in_url}}" class="signup" id="" value="我要报名" {{if $item.status==0}}disabled{{/if}} />
						</div>
					</div>
					<div class="box-user">
						<div class="user-bg"></div>
						<div class="user-info">
							<div class="user-head">
								<div class="Head_portrait">
									<img src="resource/images/swim/Profile Picture.jpg"/> <!--暂时写死-->
								</div>
								<div class="user_name">
									<h1>种子选手</h1><!--暂时写死-->
									<h1>柬埔寨</h1><!--暂时写死-->
								</div>
							</div>
							<div class="user-text">
								大概每个自由的人，血液里都带着风。自18岁第一次离开家乡，到现在几乎把全中国都走遍；近十年更走出国门深度探索，至今在60多个国家留下美丽的足迹。

							</div>
							<ul class="row">
								<li><img src="/resource/images/swim/exploded view1.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view2.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view3.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view4.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view5.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view6.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view7.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view8.jpg"/></li><!--暂时写死-->
								<li><img src="/resource/images/swim/exploded view9.jpg"/></li><!--暂时写死-->
							</ul>
						</div>
						<input type="button" name="live" data-url="index.php?m=index&c=swimdetail&v=detail&act_id=1&tar_id=1&u=0" class="live" id="live" value="更多直播" style="background-image: url('/resource/images/swim/icon_xm.png');" /><!--渲染三级页面后改-->
					</div>
				</div>
				<div class="nav_item">
					<div class="swiper-container swimswiper">
					  <ul class="swiper-wrapper ">
			    			{{if $item.son}}
								{{foreach from=$item.son item=vo key=k}}
				    			<li class="swiper-slide">
									<h1>{{$vo.name}}</h1>
									<div class="img">
			                            <a  href="{{if $vo.status==0}}javascript:void(0){{else}}/index.php?m=index&c=swimdetail&v=detail&act_id={{$vo.id}}&tar_id={{$vo.target_id}}&u={{$item.user_id}}{{/if}}" target="_blank" disabled="">
			                                <img src="{{$vo.small_img_url}}"/> <!--/index.php?m=index&c=swimdetail&v=detail&act_id={{$vo.id}}&tar_id={{$vo.target_id}}-->
			                            </a>
									</div>
								</li>
								{{/foreach}}
							{{/if}}
			    		</ul>
			    		 <div class="swiper-pagination"></div>
					    <!-- Add Arrows -->
					    <div class="swiper-button-next"></div>
					    <div class="swiper-button-prev"></div>
					</div>
				</div>
				
				
			</div>
		{{/foreach}}
		{{/if}}


		</div>

		{{include file='public/footer.tpl'}}
		<script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/resource/js/lib.js"></script>
		<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
		<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
		<script type="text/javascript">
			$(".btn input").click(function() {
				var src=$(this).data("url");
				window.location.href=src;
			})
			$(".live").click(function() {
				var src=$(this).data("url");
				window.location.href=src;
			})
			
			var swiper = new Swiper('.swimswiper', {
		      	slidesPerView: 4,
		      	initialSlide :0,
		      	spaceBetween: 30,
		      	slidesPerGroup: 1,
		      	loopFillGroupWithBlank: true,
		      	loop: true,
			    pagination: {
			       el: '.swiper-pagination',
			       clickable: true,
			    },
		      	navigation: {
		        	nextEl: '.swiper-button-next',
		        	prevEl: '.swiper-button-prev',
		      	},
		    });
		</script>
	</body>
	
</html>
