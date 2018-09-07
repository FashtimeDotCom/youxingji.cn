<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>热门作品_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
		<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/css/module.css" />
		<link rel="stylesheet" href="/resource/css/module-less.css" />
		<link rel="stylesheet" href="/resource/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/detail.css" />
		<link rel="stylesheet" type="text/css" href="/resource/css/media1280.css" media="screen and (min-width: 1200px) and (max-width: 1299px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css" media="screen and (min-width: 1300px) and (max-width: 1399px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css" media="screen and (min-width: 1400px) and (max-width: 1499px)">
		<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css" media="screen and (min-width: 1500px) and (max-width: 1699px)">
		<script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
		<script src="/resource/js/jquery.min.js"></script>
		<script src="/resource/js/lib.js"></script>
	</head>

	<body>
		{{include file='public/header.tpl'}}
		<div class="main">
			{{vplist from='ad' item='adlist' tagname='scenerylide'}}
			<div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
			{{/vplist}}
			<div class="cur">
				<div class="wp">
					<a href="/">首页</a> &gt;
					<a href="/index.php?m=index&c=index&v=scenery">游画</a> &gt; <span>热门作品</span>
				</div>
			</div>
			<div class="row-a4 m-txt3-hlg" style="padding: 0px 0;">
				<div class="wp" style="padding: 0 30px 58px;">
					<ul class="ul-txt2 ul-list5-hlg">
						{{foreach from=$list item=v}}
						<li>
							<a href="javascript:;" class="js-pop1">
								<div class="pic"><img class="youhua" data-title="{{$v.title}}" data-price="{{if $v.price==0}}议价{{else}}￥{{$v.price}}{{/if}}" data-name="{{$v.name}}" data-size="{{$v.size}}" data-place="{{$v.place}}" data-src="{{$v.pics}}" src="{{$v.thumbpic}}" data-from="{{if $v.from}}{{$v.from}}{{else}}游行迹旅行网{{/if}}" alt=""></div>
								<div class="txt" style="height: 100%">
									<p><span>作品：</span>{{$v.title}} <span class="red">价格：{{if $v.price==0}}议价{{else}}￥{{$v.price}}{{/if}}</span></p>
									<p onclick="href('/index.php?m=index&c=index&v=writer&id={{$v.wid}}')"><span>作者：</span>{{$v.name}}</p>
									<p><span>尺寸：</span> {{$v.size}}</p>
									<p><span>写生地点：</span> {{$v.place}}</p>
									<p><span>来源：</span> {{if $v.from}}{{$v.from}}{{else}}游行迹旅行网{{/if}}</p>
									<div class="num">
										<div class="hideed ">收藏</div>
										<div class="spot zan" data-id="{{$v.id}}" data-num="{{$v.top_num}}" id="zan{{$v.id}}">{{$v.top_num}}</div>
										<div class="Read two">{{$v.show_num}}</div>
									</div>
								</div>
							</a>
						</li>
						{{/foreach}}
					</ul>
					<!-- 页码 -->
					{{if $multipage}}
					<div class="pages">
						<ul>
							{{foreach from=$multipage item=page}}
							<li {{if $page.2}}class="{{$page.2}}" {{/if}}>
								<a href="{{$page.1}}">{{$page.0}}</a>
							</li>
							{{/foreach}}
						</ul>
					</div>
					{{/if}}
					<!-- 页码 end-->
				</div>
			</div>
			<!-- 弹窗 -->
			<div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
				<div class="con">
					<div class="pic">
						<img id="wpics" src="" alt="" />
					</div>
					<div class="txt">
						<p id="wtitle"></p>
						<p id="wuser"></p>
						<p id="wsize"></p>
						<p id="wplace"></p>
						<p id="price"></p>
						<p><span>购买热线：</span>4009-657-018</p>
						<p id="from"></p>
						<p class="ccc">购买画作，暂不提供在线支付，如有需要请拔打购买热线。</p>
					</div>
				</div>
				<div class="close"></div>
			</div>
			<!-- end -->
		</div>
		{{include file='public/footer.tpl'}}
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
		<script type="text/javascript">
			$('.youhua').click(function(event) {
				/* Act on the event */
				var src = $(this).attr('data-src');
				var title = $(this).attr('data-title');
				var name = $(this).attr('data-name');
				var size = $(this).attr('data-size');
				var place = $(this).attr('data-place');
				var price = $(this).data('price');
				var from = $(this).data("from");
				$('#price').html("<span>价格：</span> " + price);
				$('#wpics').attr('src', src);
				$('#wtitle').html("<span>作品：</span> " + title);
				$('#wuser').html("<span>作者：</span> " + name);
				$('#wsize').html("<span>尺寸：</span> " + size);
				$('#wplace').html("<span>写生地点：</span> " + place);
				$('#from').html("<span>来源：</span> " + from);
				$('#m-pop1-hlg2').fadeIn();
			});
			$('#m-pop1-hlg2 .close').click(function(event) {
				/* Act on the event */
				$(this).parent('.m-pop1-hlg').fadeOut();
			});
			$(".num .hideed").click(function() {
				layer.msg('功能正在开发，敬请期待');
			})
			$('.zan').click(function(event) {
				var id = $(this).attr('data-id');
				var num = parseInt($(this).attr('data-num'));
				var obj = $(this);
				$.post("/index.php?m=api&c=index&v=zan_scenery", {
					'id': id
				}, function(data) {
					if(data.status == 1) {
						$('#zan' + id).html((num + 1));
						$('#zan' + id).addClass("two");
						layer.msg(data.tips);
					} else if(data.status == 2) {
						$('#zan' + id).addClass("two");
						layer.msg(data.tips);
					} else {
						layer.msg(data.tips);
					}
				}, "JSON");

			});
		</script>
	</body>

</html>