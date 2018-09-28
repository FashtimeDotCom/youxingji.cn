<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="renderer" content="webkit" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	    <meta name="format-detection" content="telephone=no" />
		<title>免费游</title>

		<link rel="stylesheet" type="text/css" href="/resource/m/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/resource/css/swim/m.css"/>
		<script src="/resource/js/move_rem.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
	<div class="header">
        	{{include file='wap/header.tpl'}}
        	<h3>免费游</h3>
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
        </div>
        <div class="main">
		{{if $info}}
			{{foreach from=$info item=item key=key}}
			<div class="item">
				<div class="banner">
					<a href="{{if $item.status==0}}javascript:void(0){{else}}{{$item.link_url}}{{/if}}">
					<img src="{{$item.img_url}}"/>
					<div class="img_name">
						{{$item.name}}
					</div>
					</a>
				</div>
				<div class="d-nav">
					<div data-url="{{if $item.status==0}}javascript:void(0){{else}}{{$item.sign_in_url}}{{/if}}">
						<div class="nav-img-box"><img src="/resource/images/swim/mobile/y_06.jpg"/></div>
							<div>我要报名</div>
					</div>
					<div data-url = "{{if $item.living}}/index.php?m=wap&c=swim&v=roster_list&activity_id={{$item.living.activity_id}}{{else}}javascript:void(0){{/if}}">
						<a><div class="nav-img-box"><img src="/resource/images/swim/mobile/y_08.jpg"/></div>
							<div>名单公布</div></a>
					</div>
					<div data-url="{{if $item.living}}/index.php?m=wap&c=swimdetail&v=detail&act_id={{$item.living.activity_id}}&tar_id={{$item.living.target_id}}&u={{$item.user_id}}{{else}}javascript:void(0){{/if}}">
						<a><div class="nav-img-box"><img src="/resource/images/swim/mobile/y_10.jpg"/></div>
							<div>行程直播</div></a>
					</div>
				</div>
				<div class="title-nav">
					<div class="title">
						{{if $item.id==2}}
						更多精彩直播
						{{else}}
						更多精彩活动
						{{/if}}
					</div>
					
					<div class="swiper-container">
						<ul id="list" class="swiper-wrapper">
							{{if $item.son}}
								{{foreach from=$item.son item=vo key=k}}
									<li class="swiper-slide " data-url ="{{if $vo.status==0}}javacript:void(0){{else}}/index.php?m=wap&c=swimdetail&v=detail&act_id={{$vo.id}}&tar_id={{$vo.target_id}}&u={{$vo.user_id}}{{/if}}">
										<div class="list-img-box"><img src="{{$vo.small_img_url}}"/></div>
										<span class="txt-next {{if $vo.status==0}} list-img-box-bg{{/if}}" >{{$vo.name}}</span>
									</li>
								{{/foreach}}
							{{/if}}
						</ul>
					</div>
				</div>
			</div>
			{{/foreach}}
		{{/if}}
        </div>
   		{{include file='wap/footer.tpl'}}
    <script src="/resource/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script type="text/javascript">
    	$("#list li").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		})
    	$(".d-nav div").click(function() {
			var src=$(this).data("url");
			window.location.href=src;
		})
    	var swiper = new Swiper('.swiper-container', {
	      	slidesPerView: 5,
	      	initialSlide :0,
	      	spaceBetween: 30,
	      	slidesPerGroup: 1,
	      	loopFillGroupWithBlank: true,
	      	loop: true,
	    });
    </script>
	</body>
</html>
