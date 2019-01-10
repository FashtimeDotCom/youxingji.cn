<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的收藏日志</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<!--lightbox开始-->
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.lightbox').lightbox();
		});
	</script>
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/centershare.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/collection.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz">
				<div class="wp">
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的旅行日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li class="on"><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
					</ul>
				</div>
			</div>
			<div class="wp">
				{{include file='user/left.tpl'}}
				<div class="col-r">
					<!--二级导航-->
					<div class="m_mine_sz">
						<p class="title">我的收藏（<span>共<i class="Iclass">{{$total.travel_num+$total.tv_num+$total.note_num+$total.faq_num}}</i>条</span>）</p>
						<div class="secondaryMenu fix">
							<a class="option on" href="javascript:;">日志收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_tv">视频收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_note">游记收藏</a>
							<a class="option" href="/index.php?m=index&c=collection&v=collection_faq">问答收藏</a>
							<div class="hunt">
								<input type="text" name="" id="" value="" placeholder="查看我的收藏" />
								<a class="verify" href="javascript:;"></a>
							</div>
						</div>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="collect" value="travel_num" data-type="1" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="travel_num" title="总数" value="{{$total.travel_num}}"/>
					<div class="content">
						{{if $list}}
						<div class="commonality">
							<ul class="ul_box">
								{{foreach from=$list item=vo}}
								<li class="item_{{$vo.t_id}}">
									{{if $vo.is_delete && $vo.is_delete==1}}
									<div class="con fix">
										<div class="IMGbox fix">
											<div class="pullDownButton"></div>
											<div class="menuOption fix dis_none">
												<a class="select handle deleteInfo" data-id="{{$vo.t_id}}" href="javascript:;">删除</a>
												<a class="select cancel" href="javascript:;">取消</a>
											</div>
										</div>
										<p class="nullTitle paddingLeft">温馨提示</p>
										<p class="nullDetails paddingLeft">抱歉，此内容已被原作者删除!</p>
									</div>
									{{else}}
									<div class="con fix">
										<div class="left">
											<a class="dis_block figure borderRadius50 headPortrait" style="background-image: url({{$vo.headpic}});" href="/index.php?m=index&c=muser&v=index&id={{$vo.uid}}"></a>
											<a class="title" href="/index.php?m=index&c=muser&v=index&id={{$vo.uid}}">{{$vo.username}}</a>
										</div>
										<div class="right txt">
											<div class="title">
												<div class="IMGbox fix">
													<div class="pullDownButton"></div>
													<div class="menuOption fix dis_none">
														<a class="select handle deleteInfo" data-id="{{$vo.t_id}}" href="javascript:;">删除</a>
														<a class="select cancel" href="javascript:;">取消</a>
													</div>
												</div>
												<p class="tit">{{$vo.title}}</p>
												<span class="date">{{$vo.addtime}}</span>
											</div>
											<a class="dis_block describe omit lineNumber2" href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</a>
											<dl class="fix">
												{{if $vo.picnum==2 || $vo.picnum==4 || $vo.picnum==6 }}
												<style type="text/css">
													{{if $vo.picnum==2 }}
													.ddClass{{$vo.id}} a{height: 205.5px!important;}
													{{/if}}
													{{if $vo.picnum==4 }}
													.ddClass{{$vo.id}} a{height: 199.5px!important;}
													{{/if}}
													.ddClass{{$vo.id}}{width: 49.375%;}
													.ddClass{{$vo.id}}:nth-of-type(2){margin-right: 0!important;}
													.ddClass{{$vo.id}}:nth-of-type(4){margin-right: 0!important;}
													.ddClass{{$vo.id}}:nth-of-type(6){margin-right: 0!important;}
												</style>
												{{else}}
												<style type="text/css">
													.ddClass{{$vo.id}}{width: 32.5%;}
													.ddClass{{$vo.id}}:nth-of-type(3){margin-right: 0!important;}
													.ddClass{{$vo.id}}:nth-of-type(6){margin-right: 0!important;}
													.ddClass{{$vo.id}}:nth-of-type(9){margin-right: 0!important;}
												</style>
												{{/if}}
												{{foreach from=$vo.content item=v}}
												<dd class="ddClass{{$vo.id}}">
													<a class="lightbox figure" href="{{$v}}" rel="list{{$vo.id}}" style="background-image: url({{$v}});"></a>
												</dd>
												{{/foreach}}
											</dl>
											<div class="bottomToolbars fix">
												{{if $vo.address}}
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
													<i class="Iclass">{{$vo.address}}</i>
												</div>
												{{/if}}
												<span class="collectTime">收藏于 <i class="Iclass">{{$vo.collect_time}}</i></span>
											</div>
										</div>
									</div>
									<div class="bottom">
										<div class="hideed1"><em class="smallIcon"></em><i class="Iclass">已收藏</i></div>
										<div class="theory">
											<a href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										</div>
										<div class="zan" onclick="zan(this,{{$vo.id}})" data-sign="my" data-nature="list" data-val="travel_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$vo.topnum}}</i></a>
										</div>
										<div class="look"><em class="smallIcon"></em><i class="Iclass">{{$vo.shownum}}</i></div>
									</div>
									{{/if}}
								</li>
								{{/foreach}}
							</ul>
							<!-- 页码 -->
							{{if $multipage}}
							<div class="pages">
								<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
								<ul>{{foreach from=$multipage item=page}}
									<li {{if $page.2}}class="{{$page.2}}" {{/if}}>
										<a href="{{$page.1}}">{{$page.0}}</a>
									</li>
									{{/foreach}}
									<li class="pages-form">
										到<input class="inp" type="text" id="pages" onkeyup="judgeIsNonNull2(event)" />页
										<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
									</li>
								</ul>
							</div>
							{{/if}}
							<!-- 页码 end-->
						</div>
						{{else}}
						<!--无信息-->
						<div class="mainTips fix">
							<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_travel_bg.png);" title="海报/封面"></div>
							<div class="tip"><p class="title">你还未收藏任何日志哦！<br />快增加收藏吧！</p></div>
						</div>
						{{/if}}
					</div>
				</div>
			</div>
		</div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<script src="/resource/js/skip.js" title="页码跳转"></script>
    <script src="/resource/js/pulldownscroll.js" title="右侧下拉菜单"></script>
</body>
</html>