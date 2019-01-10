<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>TA的问答_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
	<script src="/resource/js/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/centershare.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/faqcenter.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="ban s1" style="background-image: url({{$muser.cover}});"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz">
				<div class="wp">
					<ul><li><a href="/index.php?m=index&c=muser&v=index&id={{$muser.uid}}">TA的日志</a></li>
						<li><a href="/index.php?m=index&c=muser&v=tv&id={{$muser.uid}}">TA的视频</a></li>
						<li><a href="/index.php?m=index&c=muser&v=travel_note&id={{$muser.uid}}">TA的游记</a></li>
						<li class="on"><a href="/index.php?m=index&c=muser&v=ta_faq&id={{$muser.uid}}">TA的问答</a></li>
					</ul>
				</div>
			</div>
			<div class="wp">
                {{include file='muser/left.tpl'}}
                <div class="col-r">
					<!--二级导航-->
					<div class="m_mine_sz">
						<div class="secondaryMenu fix" data-page="{{if $type==1}}1{{else}}2{{/if}}">
							<a class="option {{if $type==1}}on{{/if}}" href="/index.php?m=index&c=muser&v=ta_faq&id={{$muser.uid}}&type=1">TA的提问</a>
							<a class="option {{if $type==2}}on{{/if}}" href="/index.php?m=index&c=muser&v=ta_faq&id={{$muser.uid}}&type=2">TA的回答</a>
							<div class="hunt">
								<input type="text" name="" id="" value="" placeholder="查看TA的问答" />
								<a class="verify" href="javascript:;"></a>
							</div>
						</div>
					</div>
					
					<!--正文列表-->
					<input type="hidden" name="uid" id="uid" data-type="3" value="{{$muser.uid}}" />
					<input type="hidden" id="UniqueValue" data-sign="his" value="faq_num" data-type="4" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="faq_num" title="总数" value="{{$page_info.num}}"/>
					<div class="content">
						{{if $list}}
						<div class="commonality issue myIssue">
							<div class="box fix" data-nowpage="1">
								<ul class="ul_box">
									{{foreach from=$list item=vo key=key}}
									<li class="item_{{$vo.id}}">
										<div class="con fix">
											<a class="dis_block fix" href="/index.php?m=index&c=faq&v=res_list&id={{$vo.id}}">
												<p class="videoTitle"><span class="title apostrophe{{if $type==1}} WidtHh{{/if}}">{{$vo.title}}</span></p>
												<div class="box">
													{{if $vo.thumbfile}}
													<div class="figure thumbnail borderRadius" style="background-image: url({{$vo.thumbfile}});"></div>
													{{/if}}
													<p class="videoDetails omit lineNumber4">{{$vo.desc}}</p>
												</div>
												<div class="bottomToolbars fix">
													{{if $vo.address}}
													<div class="location">
														<img class="smallIcon" src="/resource/m/images/common/icon_location1.png"/>
														<i class="Iclass">{{$vo.address}}</i>
													</div>
													{{/if}}
													<p class="exhibition">
														{{if $type==1}}
														提问于 <span class="check">{{$vo.addtime}}</span>
														{{else}}
														回答于 <span class="check">{{$vo.response_time}}</span>
														{{/if}}
													</p>
												</div>
											</a>
										</div>
									</li>
									{{/foreach}}
								</ul>
								<p class="tips2"></p>
        					</div>
							
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
							<div class="preview" style="background: url(/resource/m/images/user/defaul_faqs_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">你还没有发布过任何问题哦！<br />赶紧去发布一个吧！</p></div>
						</div>
						{{/if}}
					</div>
				</div>
			</div>
		</div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/collect.js" title="收藏"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
	<script src="/resource/js/skip.js" title="页码跳转"></script>
</body>
</html>