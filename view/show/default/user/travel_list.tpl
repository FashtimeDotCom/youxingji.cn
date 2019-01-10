<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-我的游记</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
	<script src="/resource/js/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/centershare.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz">
				<div class="wp">
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li class="on"><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
					</ul>
				</div>
			</div>
			<div class="wp">
                {{include file='user/left.tpl'}}
                <div class="col-r">
					<!--发布 菜单-->
					<div class="m-txtlist-sz">
						<ul class="ul_list">
							<li class="addtravel">
								<a class="dis_block" href="/index.php?m=index&c=user&v=addtravel">
									<i ></i><div class="txt">发布旅行日志</div>
								</a>
							</li>
							<li class="addtv">
								<a class="dis_block" href="/index.php?m=index&c=user&v=addtv">
									<i ></i><div class="txt">发布视频</div>
								</a>
							</li>
							<li class="travel_note">
								<a class="dis_block" href="/index.php?m=index&c=user&v=travel_note">
									<i ></i><div class="txt">发布游记</div>
								</a>
							</li>
							<li class="follow">
								<a class="dis_block" href="/index.php?m=index&c=user&v=set_question">
									<i ></i><div class="txt">发布提问</div>
								</a>
							</li>
						</ul>
					</div>
					
					<!--正文列表-->
					<input type="hidden" id="UniqueValue" data-sign="my" value="note_num" data-type="3" title="共用JS区分的唯一必须值" />
					<input type="hidden" name="type" id="note_num" title="总数" value="{{$total.note_num}}"/>
					<div class="content">
						{{if $list}}
						<div class="commonality note">
							<ul class="ul_box">
								{{foreach from=$list item=vo key=key}}
								<li class="item_{{$vo.id}}">
									<div class="con fix">
										<div class="left">
											<div class="figure borderRadius50 headPortrait" style="background-image: url({{$user.avatar}});"></div>
											<p class="title">{{$user.username}}</p>
										</div>
										<div class="right txt">
											<div class="title">
												<div class="IMGbox fix">
													<div class="pullDownButton"></div>
													<div class="menuOption fix dis_none">
														<a class="select compile" href="/index.php?m=index&c=user&v=edit_travel_note&id={{$vo.id}}">编辑</a>
														<a class="select handle deleteInfo" data-id="{{$vo.id}}" href="javascript:;">删除</a>
														<a class="select cancel" href="javascript:;">取消</a>
													</div>
												</div>
												<p class="tit">{{$vo.title}}</p>
												<span class="date">{{$vo.addtime}}</span>
											</div>
											
											{{if $vo.status==1}}
											<a class="dis_block" href="/index.php?m=index&c=index&v=traveldetai&id={{$vo.id}}">
												<p class="describe omit lineNumber2">{{$vo.desc}}</p>
												<div class="figure borderRadius cover" style="background-image: url({{$vo.thumbfile}});"></div>
											</a>
											{{else}}
											<p class="describe omit lineNumber2">{{$vo.desc}}</p>
											<div class="figure borderRadius cover" style="background-image: url({{$vo.thumbfile}});"></div>
											{{/if}}
											<div class="bottomToolbars fix">
												{{if $vo.address}}
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
													<i class="Iclass">{{$vo.address}}</i>
												</div>
												{{/if}}
												{{if $vo.tag}}
													{{foreach from=$vo.tag key=k item=tag }}
														{{if $k <1}}
												<span class="tag">{{$tag}}</span>
														{{/if}}
													{{/foreach}}
												{{/if}}
											</div>
										</div>
									</div>
									<div class="bottom">
										{{if $vo.status==1}}
										<div class="theory WidtH">
											<a href="/index.php?m=index&c=index&v=traveldetai&id={{$vo.id}}">
												<em class="smallIcon"></em><i class="Iclass">评论</i>
											</a>
										{{else}}
										<div class="Areview theory WidtH">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										{{/if}}
										</div>
										<div class="zan WidtH" onclick="zan(this,{{$vo.id}})" data-sign="my" data-nature="list" data-val="note_num">
											<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$vo.top_num}}</i></a>
										</div>
										<div class="look WidtH"><em class="smallIcon"></em><i class="Iclass">{{$vo.show_num}}</i></div>
									</div>
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
							<div class="preview" style="background: url(/resource/m/images/user/defaul_travel_note_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">你还没有发布过任何游记哦！<br />快增加发布一个吧！</p></div>
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