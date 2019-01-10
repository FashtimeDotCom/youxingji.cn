<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人邦_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/new_star.css" />
</head>
<body onkeydown="on_return();">
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='starlide'}}
        <div class="ban" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}

		<p class="totalTitle">已有 <span class="amount">{{$page_info.num}}</span> 人跻身达人邦</p>
		<input type="hidden" name="cur_page" id="cur_page" value="{{$page_info.cur_page}}">
		
        <!--达人列表-->
        <div class="list fix">
        	<div class="box fix" data-nowpage="1">
        		<div class="boxxxxxx fix">
        			{{foreach from=$list key=key item=item}}
					<div class="modules">
						<a class="figure headPortrait borderRadius50" style="background-image: url({{$item.headpic}})
								;" href="{{$item.uid|helper:'href'}}" title="头像" target="_blank"></a>
						<p class="name"><a href="{{$item.uid|helper:'href'}}">{{$item.username}}</a></p>
						<p class="synopsis omit lineNumber4 whiteSpace">{{$item.autograph}}</p>
					</div>
					{{/foreach}}
        		</div>
				<p class="tips"></p>
        	</div>
			
	        <!-- 页码 -->
			<div class="pagination">
				{{if $multipage}}
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
					<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page('pre')" data-val="上一页"></a></li>

						{{foreach from=$multipage item=page}}
						<li class="{{if $page.2}}{{$page.2}} {{/if}}li_{{$page.0}} li">
							<a href="javascript:;" onclick="turn_page('{{$page.0}}')" data-val="{{$page.0}}">{{$page.0}}</a>
						</li>
						{{/foreach}}

						<li class="pages-next">
							<a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a>
						</li>

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

		<!--达人聚集地-->
		<div class="gatheringPlace">
			<div class="box">
				<p class="title">
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
					达人<i class="Iclass">聚集地</i>
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
				</p>
				<p class="secondTitle"><span>我们正在寻找这样的你</span></p>
				<div class="card swiper-container" id="cardSwiper">
					<div class="swiper-wrapper ">
						{{foreach from=$looking_list item=item key=key}}
						<div class="swiper-slide modules">
							<p class="cardTitle apostrophe">{{$item.title}}</p>
							<div class="describe omit whiteSpace">{{$item.content}}</div>
							<div class="figure ico" style="background-image: url({{$item.thumbfile}});"></div>
						</div>
						{{/foreach}}
					</div>
				</div>
			</div>
		</div>

		<!--达人权益-->
		<div class="equities">
			<div class="box">
				<p class="title">
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
					达人<i class="Iclass">权益</i>
					<span class="sidelights">
						<em class="titbit1 rotate"></em>
						<em class="titbit2"></em>
						<em class="titbit3 rotate"></em>
						<em class="titbit4 rotate"></em>
						<em class="titbit5"></em>
					</span>
				</p>
				<div class="card">
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/1.png);"></div>
						<p class="cardTitle">加冕达人标识</p>
						<p class="cardTitle">令你与众不同</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/2.png);"></div>
						<p class="cardTitle">尊享独家旅行</p>
						<p class="cardTitle">折扣优惠体验</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/3.png);"></div>
						<p class="cardTitle">享受中国演艺联盟</p>
						<p class="cardTitle">门票折扣优惠体验</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/4.png);"></div>
						<p class="cardTitle">享受人物专访</p>
						<p class="cardTitle">连续报道机会</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/5.png);"></div>
						<p class="cardTitle">享受摄影画册出版</p>
						<p class="cardTitle">旅行游记出版机会</p>
					</div>
					<div class="modules">
						<div class="figure borderRadius50 ico" style="background-image: url(/resource/images/new_star/6.png);"></div>
						<p class="cardTitle">更多机会</p>
						<p class="cardTitle">敬请期待</p>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/newstar.js"></script>
</body>
</html>