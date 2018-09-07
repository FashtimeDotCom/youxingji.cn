<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>{{$info.title}}</title>
		<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
		<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
		<link rel="stylesheet" href="/resource/m/css/tp.css" />
		<script src="/resource/js/move_rem.js"></script>
		<style type="text/css">
			html body {
				margin: 0;
				padding: 0;
				background: #ffe7a2;
			}
			
			article {
				width: 100%;
				position: relative;
			}
			
			img {
				display: block;
				width: 100%;
			}
			
			article nav {
				width: 5.5rem;
				height: 1.375rem;
				margin: 1rem auto;
			}
			
			.item nav {
				width: 5.5rem;
				height: 1.375rem;
				margin: 1rem auto;
			}
			
			article section {
				width: 13rem;
				margin: 0 auto;
				background: rgba(0, 0, 0, .5);
				border-radius: .3rem;
				padding: .5rem 0.75rem;
				font-size: 0.6rem;
				color: rgba(255, 255, 255, 1);
				line-height: 1rem;
			}
			
			article section .text {
				padding-bottom: .5rem;
				border-bottom: 1px solid #fff;
			}
			
			article section .Sponsor {
				padding-top: .5rem;
			}
			
			article ul {
				margin: 0.625rem auto;
				display: flex;
				width: 12.875rem;
			}
			
			article ul li {
				text-align: center;
				font-size: 0.6rem;
				color: rgba(255, 255, 255, 1);
				line-height: 1.5rem;
				width: 6.125rem;
			}
			
			article ul li:last-child {
				background: #EF585C;
				border-radius: 0 .1rem .1rem 0;
				position: relative;
			}
			
			article ul li:last-child div {
				position: absolute;
				height: 0px;
				width: 0px;
				border-top: 0px solid transparent;
				border-left: 1rem solid #D5494D;
				border-bottom: 1.5rem solid transparent;
			}
			
			article ul li:first-child {
				background: #D5494D;
				border-radius: .1rem 0 0 .1rem;
			}
			
			.item {
				margin-bottom: .5rem;
				padding: 0 .5rem .015rem;
			}
			
			.text {
				text-align: center;
				padding-bottom: .5rem;
			}
			
			.box {
				width: 15rem;
				background: rgba(255, 255, 255, 1);
				border-radius: 0.25rem;
				box-shadow: 0px .1rem .3rem 0px rgba(44, 44, 44, 0.57);
				display: flex;
				margin-bottom: 0.75rem;
			}
			
			.box .box_left {
				width: 4.25rem;
				margin-right: .3rem;
				text-align: center;
				font-size: .6rem;
				color: rgba(102, 102, 102, 1);
				line-height: 1.25rem;
			}
			
			.box .box_right {
				padding: 1.25rem .5rem 0 0;
				width: 10.5rem;
				font-size: 0.65rem;
				display: -webkit-box;
				-webkit-box-orient: vertical;
				-webkit-line-clamp: 8;
				overflow: hidden;
				margin-bottom: 1.25rem;
			}
			
			.user_img {
				width: 2.875rem;
				height: 2.875rem;
				border-radius: 1.4375rem;
				margin: 0 auto;
				position: relative;
			}
			
			.user_img i {
				position: absolute;
				top: -.85rem;
				left: 1rem;
				width: 1.2rem;
				height: 0.9rem;
			}
			
			.user_img i img {
				border: none;
			}
			
			.user_img img {
				border: 2px solid #FFB102;
				width: 100%;
				border-radius: 1.4375rem;
			}
			
			.box .box_left p {
				height: 0.8rem;
				background: #fff;
				color: rgba(215, 22, 24, 1);
				border-radius: 0.4rem;
				text-align: center;
			}
			
			.jiao {
				position: relative;
				height: 0px;
				width: 0px;
				border-top: 0px solid transparent;
				border-left: 50px solid #E33F3F;
				border-bottom: 50px solid transparent;
			}
			
			.num {
				position: absolute;
				top: .2rem;
				left: -1.8rem;
				font-size: 0.65rem;
				color: rgba(255, 255, 255, 1);
				line-height: 0.825rem;
			}
			
			.box .box_left .tpbtn {
				margin: .5rem auto;
				width: 3.375rem ;
				height: 1.3rem;
				background: #f54545;
				color: #fff;
				opacity: 0.97 ;
				border-radius: .45rem ;
				box-shadow: 0px 2px 6px 0px rgba(44, 44, 44, 0.45) ;
			}
			.user_name {
				margin-right:  .2rem;
				
			}
			.box_right  div {
				margin-bottom: .3rem;
			}

			.date-tiem-span,.date-s-span{
				display: inline-block;
				font-size:18px;
				width:36px;
				height:30px;
				line-height:30px;
				text-align: center;
				color:#fff;
				border-radius:5px;
			}
			.date-tiem-span{
				background:#333;
			}
			.date-s-span{ background:#f00;
			}
			.data-show-box{line-height:30px;}
			input[type="button"], input[type="submit"], input[type="reset"] {
				-webkit-appearance: none;
			}
		</style>
	</head>

	<body class="">
		<input type="hidden" id="code" value="{{$code}}">
		<article>
			<img src="{{$info.thumbfile}}" />
		</article>
		<article>
			<nav>
				<img src="/resource/m/images/tp/tp@1x.png" />
			</nav>
			<section class="">
				<div class="text">
					{{$info.activity_rules}}
				</div>
				<div class="Sponsor">
					主办方：{{$info.sponsor}}
				</div>
				<div class="Sponsor">
					<span style="color: red;letter-spacing: 10px;">活动倒计时</span>
				</div>
				<div class="data-show-box" id="dateShow1">
					<span class="date-tiem-span d">00</span>天
					<span class="date-tiem-span h">00</span>时
					<span class="date-tiem-span m">00</span>分
					<span class="date-s-span s">00</span>秒
				</div>
			</section>
		</article>
		<article>
			<ul class="">
				<li>总投票数：<span id="total">{{$info.vote_total}}</span></li>
				<li>
					<div class="jiao">

					</div>候选人数：{{$info.player_num}}</li>
			</ul>
			<div class="item">
				<nav>
					<img src="/resource/m/images/tp/tp@2x.png" />
				</nav>

				{{if $info.name_list}}
				{{foreach from=$info.name_list key=key item=item}}

				<div class="box">
					<div class="box_left">
						<div class="jiao">
							<span class="num">{{$key+1}}</span>
						</div>
						<div class="user_img">
							<img src="{{$item.headpic}}" />
							<i><img src="/resource/m/images/tp/icon.png"/></i>
						</div>
						<input type="button" class="tpbtn" value="投票" onclick="vote({{$item.vote_id}},{{$item.uid}})" />
						<p><span id="total_{{$item.uid}}">{{$item.vote_num}}</span>票</p>
					</div>
					<div class="box_right">
						<div><span class="user_name">{{$item.username}}</span>{{$item.university}} </div>
						{{$item.desc}}
					</div>
				</div>

				{{/foreach}}
				{{/if}}

			</div>

		</article>
		<script type="text/javascript" src="/resource/js/jquery1.8.min.js"></script>
		<script type="text/javascript" src="/resource/js/leftTime.min.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
		<script type="text/javascript">
			var num=1;
			$(function(){
				//日期倒计时
				$.leftTime("{{$info.end_time}}",function(d){
					if(d.status){
						var $dateShow1=$("#dateShow1");
						$dateShow1.find(".d").html(d.d);
						$dateShow1.find(".h").html(d.h);
						$dateShow1.find(".m").html(d.m);
						$dateShow1.find(".s").html(d.s);
					}
				});

				//微信配置
				wx.config({
					debug: false,
					appId: "wx9953ad5ae1108b51",
					timestamp: '{{$timestamp}}',
					nonceStr: '{{$nonceStr}}',
					signature: '{{$signature}}',
					jsApiList: [
						'onMenuShareTimeline',
						'onMenuShareAppMessage'
					]
				});

				wx.ready(function () {
					//分享给朋友接口
					wx.onMenuShareAppMessage({
						title: "{{$info.title}}",
						desc: "{{$info.wechat_desc}}",
						link: "{{$sharesUrl}}",
						imgUrl: "{{$_pathroot}}{{$info.thumbfile}}",
						trigger: function (res) {
//							alert('用户点击发送给朋友');
						},
						success: function (res) {
//							alert('已分享');
						},
						cancel: function (res) {
//							alert('已取消');
						},
						fail: function (res) {
							alert(JSON.stringify(res));
						}
					});

					//分享到朋友圈
					wx.onMenuShareTimeline({
						title: "{{$info.title}}",
						link: "{{$sharesUrl}}",
						imgUrl: "{{$_pathroot}}{{$info.thumbfile}}",
						trigger: function (res) {
							// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
//							alert('用户点击分享到朋友圈');
						},
						success: function (res) {
//							alert('已分享');
						},
						cancel: function (res) {
//							alert('已取消');
						},
						fail: function (res) {
							alert(JSON.stringify(res));
						}
					});


				});

			});

			function vote(vote_id,uid){
				$(".tpbtn").attr("disabled",true);

				//获取投票人的识别码
				var code=$("#code").val();

				//第一次级的过滤单次页面3+票
				if( num >3 ){
					alert('一天只能投3次票哦 :)');
					return;
				}

				//异步投票
				var url="{{$_pathroot}}/index.php?m=api&c=vote&v=index";
				$.ajax({
					type:"POST",
					url:url,
					data:{code:code,vote_id:vote_id,uid:uid},
					success:function (res) {
						var data=JSON.parse(res);
						if( parseInt(data.status)==1 ){
							var total=parseInt($("#total").text());
							total++;
							$("#total").text(total);

							//个人总票数+1
							var per_total=parseInt($("#total_"+uid).text());
							per_total++;
							$("#total_"+uid).text(per_total);
							alert(data.tips);
							$(".tpbtn").removeAttr("disabled");
						}else{
							alert(data.tips);
//							$(".tpbtn").removeAttr("disabled");
						}
					},
					error:function (res) {
						alert(data.tips);
						$(".tpbtn").removeAttr("disabled");
					}
				});
				num++;
			}


		</script>
	</body>

</html>