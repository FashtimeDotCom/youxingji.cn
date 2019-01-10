<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/resource/css/user/user_index.css"/>
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<script src="/resource/js/pc_rem.js"></script>
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
	<style type="text/css">
		/*2018-12-06   13:54:41
		* HQS
		* 个人中心  主页 */
		/*列表  无内容*/
					/*日志*/
		.travel .box{height:348px;padding-top:20px;padding-left:140px;background:url(/resource/images/center/bg1.jpg) 78px 46% no-repeat}
		.travel .box .text{float: left;font-size:16px;color:#666;line-height:32px;padding-top: 84px;padding-left: 314px;}
					/*视频*/
		.tv .box{height:348px;padding-top:100px;padding-left:140px;background:url(/resource/images/center/bg2.png) 399px 46% no-repeat}
		.tv .box .text{font-size:16px;color:#666;line-height:32px}
					/*游记*/
		.note .box{height:480px;line-height:445px;text-align:center;background:url(/resource/images/s-bg1.jpg) center center no-repeat;
					-webkit-background-size:cover;background-size:cover;color:#333;font-size:30px;letter-spacing:1px;border-radius:5px;}
					/*问答*/
		.quiz .box{height:348px;padding-top:100px;padding-left:140px;background:url(/resource/images/center/bg4.png) 399px 46% no-repeat}
		.quiz .box .text{font-size:16px;color:#666;line-height:32px}


		/*列表  有内容*/
					/*日志*/
		.commonality{padding-bottom: 24px;background: #fff;
					border-left: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-bottom: 1px solid #e2e2e2;}
		.commonality .ul_box li{border-top:none!important;border-left:none!important;border-right:none!important;}
					/*问答*/
		.issue{padding-top: 30px;border-top: 1px solid #e2e2e2;;}
		.issue .ul_box li{padding-top: 0;}
		.issue .videoTitle.width100 .title{ width: 782px;}
		
		.issue .bottomToolbars .exhibition{float: right;line-height: 48px;}
		.issue .bottomToolbars .exhibition span{display: inline-block;line-height: 48px;}
		.issue .bottomToolbars .exhibition .icon_check{width: 26px;}
		.issue .bottomToolbars .exhibition .icon_like {width: 18px;}
		.issue .bottomToolbars .exhibition .icon_review{width: 18px;}
		.issue .bottomToolbars .exhibition span i{line-height: 48px;display: inline-block;font-size: 14px;}
	</style>
</head>
<body>
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="ban s1" style="background-image: url({{$user.cover}});"></div>
		<div class="row-sz pb30">
			<div class="m-nv-sz">
				<div class="wp fix">
					<ul class="fix">
						<li><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
					</ul>
				</div>
			</div>
			<div class="wp fix">
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
					{{if $user.city == '' || $user.autograph == '' || $user.city == ''}}
					<div class="m-mine-sz">
						<div class="txt">
							<span class="name">{{$user.username}}</span>，这里是你的游行迹！<br>是记录你的旅行记忆，结交各路豪杰的地盘儿。现在开启游行迹旅程！
						</div>
						<a href="/index.php?m=index&c=user&v=setting" class="btn">完善个人资料</a>
					</div>
					{{/if}}
					
					<input type="hidden" name="uid" id="uid" data-type="" value="" />
					<input type="hidden" id="UniqueValue" data-sign="my" value="centerHome" title="共用JS区分的唯一必须值" />
					
					<!--日志-->
					{{if $travel_list}}
					<div class="commonality travel">
						<ul class="ul_box">
							{{foreach from=$travel_list item=vo}}
							<li class="item_{{$vo.id}}">
								<div class="con fix">
									<div class="left">
										<a class="dis_block figure borderRadius50 headPortrait" style="background-image: url({{$user.avatar}});"></a>
										<p class="title">{{$user.username}}</p>
									</div>
									<div class="right txt">
										<div class="title">
											<p class="tit">{{$vo.title}}</p>
											<span class="date">{{$vo.addtime}}</span>
										</div>
										{{if $vo.status==1}}
											<a class="dis_block describe omit lineNumber2" href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</a>
										{{else}}
										<p class="describe omit lineNumber2">{{$vo.describes}}</p>
										{{/if}}
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
										</div>
									</div>
								</div>
								<div class="bottom">
									{{if $vo.status==1}}
									<div class="theory WidtH">
										<a href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										</a>
									{{else}}
									<div class="Areview theory WidtH">
										<em class="smallIcon"></em><i class="Iclass">评论</i>
									{{/if}}
									</div>
									<div class="zan WidtH" onclick="zan(this,{{$vo.id}})" data-sign="my" data-nature="list" data-val="travel_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$vo.topnum}}</i></a>
									</div>
									<div class="look WidtH"><em class="smallIcon"></em><i class="Iclass">{{$vo.shownum}}</i></div>
								</div>
							</li>
							{{/foreach}}
						</ul>

						<div class="more_notes"><a href="/index.php?m=index&c=user&v=index">共<strong>{{$total.travel_num}}</strong>日志 </a></div>
					</div>
					{{else}}
					<div class="m-myday-sz travel">
						<div class="top">
							<a href="/index.php?m=index&c=user&v=addtravel" class="write"><i></i>发布日志</a>
							<h3>旅行日志</h3>
						</div>
						<div class="box">
							<div class="text">用九宫格丈量这个世界 <br>用简短的255个字<br>分享旅途中的美好<br>感受行走中的点滴</div>
						</div>
					</div>
					{{/if}}

					<!--视频-->
					{{if $tv_list}}
					<div class="commonality tv">
						<ul class="ul_box">
							{{foreach from=$tv_list item=vo key=key}}
							<li class="item_{{$vo.id}}">
								<div class="con fix">
									<div class="left">
										<div class="figure borderRadius50 headPortrait" style="background-image: url({{$user.avatar}});"></div>
										<p class="title">{{$user.username}}</p>
									</div>
									<div class="right txt">
										<div class="title">
											<p class="tit">{{$vo.title}}</p>
											<span class="date">{{$vo.addtime}}</span>
										</div>
										{{if $vo.status==1}}
											<a class="dis_block describe omit lineNumber2" href="/index.php?m=index&c=index&v=tv_detail&id={{$vo.id}}">{{$vo.describes}}</a>
										{{else}}
										<p class="describe omit lineNumber2">{{$vo.describes}}</p>
										{{/if}}
										<a class="figure borderRadius cover" href="javascript:;" onclick="js_video(this)" data-src="{{$vo.url}}" style="background-image: url({{$vo.pics}});">
	        								<span class="boo"><i class="playButton"></i></span>
	        							</a>
										<div class="bottomToolbars fix">
											{{if $vo.address}}
											<div class="location">
												<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
												<i class="Iclass">{{$vo.address}}</i>
											</div>
											{{/if}}
										</div>
									</div>
								</div>
								<div class="bottom">
									{{if $vo.status==1}}
									<div class="theory WidtH">
										<a href="/index.php?m=index&c=index&v=tv_detail&id={{$vo.id}}">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										</a>
									{{else}}
									<div class="Areview theory WidtH">
										<em class="smallIcon"></em><i class="Iclass">评论</i>
									{{/if}}
									</div>
									<div class="zan WidtH" onclick="zan(this,{{$vo.id}})" data-sign="my" data-nature="list" data-val="tv_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$vo.topnum}}</i></a>
									</div>
									<div class="look WidtH"><em class="smallIcon"></em><i class="Iclass">{{$vo.shownum}}</i></div>
								</div>
							</li>
							{{/foreach}}
						</ul>
						
						<div class="more_notes"><a href="/index.php?m=index&c=user&v=tv">共<strong>{{$total.tv_num}}</strong>视频 </a></div>
					</div>
					{{else}}
					<div class="m-myday-sz tv">
						<div class="top">
							<a href="/index.php?m=index&c=user&v=addtv" class="write"><i></i>发布视频</a>
							<h3>视频</h3>
						</div>
						<div class="box">
							<div class="text">快将你旅行过程中的沿途美景 <br>街边美食分享给其他游友<br>最原创的视频<br>最暖心的旅行推荐<br>由你打造</div>
						</div>
					</div>
					{{/if}}
					
					<!--游记-->
					{{if $note_list}}
					<div class="commonality note">
						<ul class="ul_box">
							{{foreach from=$note_list key=key item=vo}}
							<li class="item_{{$vo.id}}">
								<div class="con fix">
									<div class="left">
										<div class="figure borderRadius50 headPortrait" style="background-image: url({{$user.avatar}});"></div>
										<p class="title">{{$user.username}}</p>
									</div>
									<div class="right txt">
										<div class="title">
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
						
						<div class="more_notes"><a href="/index.php?m=index&c=user&v=travel">共<strong>{{$total.note_num}}</strong>游记 </a></div>
					</div>
					{{else}}
					<div class="m-myday-sz note">
						<div class="top">
							<a href="/index.php?m=index&c=user&v=travel_note" class="write"><i></i>写游记</a>
							<h3>游记</h3>
						</div>
						<div class="box">此处还差一篇游记哦~</div>
					</div>
					{{/if}}
					
					<!--问答-->
					{{if $faq_list}}
					<div class="commonality issue" style="background: #fff;padding-bottom: 34px">
						<ul class="ul_box">
							{{foreach from=$faq_list item=vo key=key}}
							<li class="item_{{$vo.id}}">
								<div class="con fix">
									<div class="txt">
										<p class="videoTitle width100"><span class="view"></span><span class="title apostrophe">{{$vo.title}}</span></p>
										<a class="dis_block" href="/index.php?m=index&c=faq&v=res_list&id={{$vo.id}}">
											<div class="box">
												{{if $vo.thumbfile}}
												<div class="figure thumbnail borderRadius" style="background-image: url({{$vo.thumbfile}});"></div>
												{{/if}}
												<p class="videoDetails omit lineNumber4 whiteSpace">{{$vo.desc}}</p>
											</div>
											<div class="bottomToolbars fix">
												{{if $vo.address}}
												<div class="location">
													<img class="smallIcon" src="/resource/m/images/common/icon_location1.png"/>
													<i class="Iclass">{{$vo.address}}</i>
												</div>
												{{/if}}
												<p class="exhibition">
													<span class="check">
														<img class="icon_check" src="/resource/images/common/preview1.png" />
														<i class="Iclass">{{$vo.show_num}}</i>
													</span>&nbsp;&nbsp;
													<span class="like">
														<img class="icon_like" src="/resource/m/images/user/icon_faq_detail3.png" />
														<i class="Iclass" title="收藏数">{{$vo.collection_num}}</i>
													</span>&nbsp;&nbsp;
													<span class="review" title="评论">
														<img class="icon_review" src="/resource/images/common/icon_review1.png" />
														<i class="Iclass">{{$vo.response_num}}</i>
													</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</li>
							{{/foreach}}
						</ul>
						
						<div class="more_notes"><a href="/index.php?m=index&c=user&v=my_faq">共<strong>{{$total.faq_num}}</strong>问答 </a></div>
					</div>
					{{else}}
					<div class="m-myday-sz quiz">
						<div class="top">
							<a href="javascript:;" class="write"><i></i>提出问题</a>
							<h3>问答</h3>
						</div>
						<div class="box">
							<div class="text">快将你旅行过程中的沿途疑惑 <br>街边好奇分享给其他游友<br>最原创的提问<br>最详细的回答<br>由你打造</div>
						</div>
					</div>
					{{/if}}
				</div>
			</div>
		</div>
		
		<!-- 视频弹窗 -->
		<div class="m-pop1-hlg m_pop1_yz" id="m-pop1-hlg">
			<div class="con1">
        		<div class="close js-close" onclick="js_close()"><span></span></div>
        		<div class="VideoArea"></div>
			</div>
		</div>
	</div>
	
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		//我的。。。 评论按钮  因没通过审核无法跳转 
		$(".Areview").on("click",function(){
			layer.msg('暂未通过审核，无法跳转详情页！');
		});
	</script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="打开、关闭视频"></script>
</body>
</html>