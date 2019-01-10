<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<title>日志详情_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
	<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/style.css" />
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
	<link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/new_travel_detail.css" />
    <link rel="stylesheet" href="/resource/css/comment.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		<div class="wpwp">
			<div class="m_master_qm">
				<!--左侧-->
				<input type="hidden" name="uid" id="uid" data-type="1" value="" />
				<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="{{$info.id}}" data-length="38" value="travel_num" data-uid="{{$info.uid}}" data-type="1" title="共用JS区分的唯一必须值"/>
				{{if !$user}}
				<input type="hidden" name="用户是否登陆" id="userRegister" value="0" />
				{{/if}}
				<div class="col_l">
					<div class="con">
						<ul class="ul_imgtxt2_qm list_v">
							<li><div class="top">
									<div class="left">
										<a class="profilePhoto figure borderRadius50" href="/index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank" style="background-image: url({{$info.headpic}});"></a>
										<a class="botton dis_block" href="javascript:;" onclick="follows({{$info.uid}},this)">{{$item.uid|helper:'isfollows'}}</a>
									</div>
									<div class="txt p_btn">
										<div class="tit">
											<span>{{$info.addtime|date_format:'%Y-%m-%d'}}</span>
											<h3><a href="{{$info.uid|helper:'href'}}"target="_blank">{{$info.username}}</a></h3>
										</div>
										<p class="whiteSpace">{{$info.describes}}</p>
										{{if $info.picnum==2 || $info.picnum==4 || $info.picnum==6 }}
										<style type="text/css">
											{{if $info.picnum==2 }}
											.ddClass{{$info.id}} a{height: 205.5px!important;}
											{{/if}}
											{{if $info.picnum==4 }}
											.ddClass{{$info.id}} a{height: 199.5px!important;}
											{{/if}}
											.ddClass{{$info.id}}{width: 49.375%;}
											.ddClass{{$info.id}}:nth-of-type(2){margin-right: 0!important;}
											.ddClass{{$info.id}}:nth-of-type(4){margin-right: 0!important;}
											.ddClass{{$info.id}}:nth-of-type(6){margin-right: 0!important;}
										</style>
										{{else}}
										<style type="text/css">
											.ddClass{{$info.id}}{width: 32.5%;}
											.ddClass{{$info.id}}:nth-of-type(3){margin-right: 0!important;}
											.ddClass{{$info.id}}:nth-of-type(6){margin-right: 0!important;}
											.ddClass{{$info.id}}:nth-of-type(9){margin-right: 0!important;}
										</style>
										{{/if}}
										<dl class="fix">
											{{if $info.content}}
											{{foreach from=$info.content key=key item=item}}
											<dd class="ddClass{{$info.id}}">
												<a class="lightbox figure" href="{{$item}}" rel="list{{$info.id}}" style="background-image: url({{$item}});"></a>
											</dd>
											{{/foreach}}
											{{/if}}
										</dl>
										{{if $info.address}}
										<div class="location">
											<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
											<i class="Iclass">{{$info.address}}</i>
										</div>
										{{/if}}
									</div>
								</div>
								<div class="bottom">
									<div class="hideed" onclick="collect({{$info.id}})">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
									</div>
									<div class="theory"><a href="#navigation"><em class="smallIcon"></em><i class="Iclass">评论</i></a></div>
									<div class="zan" onclick="zan(this,{{$info.id}})" data-nature="subject" data-val="travel_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$info.topnum}}</i></a>
									</div>
									<div class="look"><em class="smallIcon"></em><i class="Iclass">{{$info.shownum}}</i></div>
								</div>
							</li>
						</ul>
					</div>
					
					<!--评论区-->
			        <div class="m-comment">
			        	<div class="navigation" id="navigation" data-type="1">
			        		<span class="title">点评列表</span>
			        		<p class="Button fix">
			        			<a href="javascript:;" class="press pressTime onn">按时间</a>
			        			<a href="javascript:;" class="press pressHeat">按热度</a>
			        		</p>
			        	</div>
			            
			            <!--评论框-->
			            <div class="m-publish original">
			                <div class="wp">
			                    <div class="content">
			                        <textarea class="inputBox" id="comment" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
			                        {{if !$user}} 
			                        <div class="nologin">
			                            <div class="nologinbtn">
			                                <a class="from_url" href="javascript:;">登录</a>
			                                <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
			                            </div>
			                        </div>
			                        {{/if}}
			                    </div>
			                    <a href="javascript:;" class="btn addComment">发表评论</a>
			                    <span class="numberWords commentNumWords">还可输入 <i class="Iclass" id="contentwordage">255</i> 个字</span>
			                </div>
			            </div>
			            
			            <!--评论列表-->
			            <input type="hidden" id="from_url" value="{{$from_url}}" title="登录完之后跳转回这个本来的游记" />
			            <div class="box fix" data-page="1">
			            	<ul class="ul_imgtxt4 fix" id="receptacle">
				            	{{foreach from=$comment item=vo key=k}}
				                <li><div class="details">
				                        <a class="headPortrait" href="{{$vo.uid|helper:'href'}}" style="background-image: url({{$vo.uid|helper:'avatar'}});" target="_blank"></a>
					                    <h3><a class="username_" href="{{$vo.uid|helper:'href'}}">{{$vo.uid|helper:'username'}}</a>
					                    	<em class="addtime">{{$vo.addtime}}</em>
					                    	<a class="zan" onclick="zan(this,{{$vo.id}})" data-nature="review" href="javascript:;">
					                    		<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>
					                    		<i>{{$vo.top_num}}</i>
					                    	</a>
					                    </h3>
				                    </div>
				                    <div class="substance" data-replyNum="{{$vo.count}}">
				                    	<div class="description whiteSpace">{{$vo.content}}</div>
					                    <div class="BarSubmenu">
					                    	<a class="reply replyReview" data-id="{{$vo.id}}" data-open="0" data-class="1" href="javascript:;">回复</a>
					                    </div>
					
					                    <!--回复【评论】框-->
					                    <div class="m-publish details_stair" data-tid="{{$vo.id}}">
							                <div class="wp">
							                    <div class="content">
							                        <textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
							                        {{if !$user}} 
							                        <div class="nologin">
							                            <div class="nologinbtn">
							                                <a class="from_url" href="javascript:;">登录</a>
							                                <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
							                            </div>
							                        </div>
							                        {{/if}}
							                    </div>
							                    <a class="btn ReviewComment" data-touid="{{$vo.uid}}" data-id="{{$vo.id}}" data-class="1" data-name="" href="javascript:;">发表回复</a>
							                    <span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>
							                </div>
							            </div>

							            <!--所有回复-->
							            <div class="blockquote_wrap" data-i="{{$k+1}}" data-count="{{$vo.count}}" {{if $vo.count >3 }} style="padding-bottom: 26px;" {{/if}}>
				                            {{foreach from=$vo.sub key=key item=item}}
				                            <div {{if $key <3}}class="module fix" {{else}} class="module fix dis_none"{{/if}}>
					                            <div class="comment_blockquote">
					                                <div class="comment_floor">{{$key+1}}楼</div>
					                                <div class="comment_conWrap">
					                                    <div class="comment_con">
					                                        <span class="name">{{$item.username}} </span><span class="name"><i>回复</i> {{$item.to_username}}：</span>
					                                        <span class="matter">{{$item.content}}</span>
					                                    </div>
					                                </div>
					                                <div class="BarSubmenu">
								                    	<a class="reply reply_reply" data-id="{{$item.id}}" data-open="0" data-class="2" href="javascript:;">回复</a>
								                    	<div class="leftSubmenu">
								                    		<span class="addtime">{{$item.addtime|date_format:'%Y-%m-%d %H:%M:%S'}}</span>
									                    	<a class="zan" onclick="zan(this,{{$item.id}})" data-nature="review" href="javascript:;">
									                    		<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>
									                    		<i>{{$item.top_num}}</i>
									                    	</a>
								                    	</div>
								                    </div>
				
					                                <!--回复【回复】框-->
					                                <div class="m-publish details_">
					                                    <div class="wp">
					                                        <div class="content">
					                                            <textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>
					                                            {{if !$user}}
					                                            <div class="nologin">
					                                                <div class="nologinbtn">
					                                                    <a class="from_url" href="javascript:;">登录</a>
					                                                    <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
					                                                </div>
					                                            </div>
					                                            {{/if}}
					                                        </div>
					                                        <a class="btn ReviewReview" data-touid="{{$item.uid}}" data-id="{{$vo.id}}" data-pid_sub="{{$item.id}}" data-class="2" href="javascript:;">发表回复</a>
					                                        <span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
				                            {{/foreach}}
				                            {{if $vo.count >3}}
				                            <p class="hint">还有<i class="Iclass">{{$vo.count-3}}</i>条回复，<a class="seeMore" href="javascript:;" onclick="seeMore(this)">查看更多</a></p>
				                            {{/if}}
							            </div>
				                    </div>
				                </li>
				                {{/foreach}}
				           	</ul>
							<p class="tips"></p>
			            </div>

			            <!-- 页码 -->
			            {{if $multipage}}
			            <input type="hidden" name="cur_page" id="cur_page" value="{{$page_info.cur_page}}">
			            <div class="pages ">
							<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
							<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page('pre')" data-val="上一页"></a></li>
								{{foreach from=$multipage item=page}}
								<li class="{{if $page.2}}{{$page.2}} {{/if}}li_{{$page.0}} li">
									<a href="javascript:;" onclick="turn_page('{{$page.0}}')" data-href="{{$page.1}}" data-val="{{$page.0}}">{{$page.0}}</a>
								</li>
								{{/foreach}}
								<li class="pages-next">
									<a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a>
								</li>
								<li class="pages-form">
									到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull3(this)">页
									<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
								</li>
							</ul>
						</div>
				        {{/if}}
			            <!-- 页码 end-->
			       </div>
				</div>
				
				<!--右侧-->
				<div class="col_r">
					<div class="r_box">
						<div class="r_box_title">相关动态推荐
							<span><a href="/index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank">更多</a></span>
						</div>
						<ul class="r_box_con">
							{{if $ano_info}}
							{{foreach from=$ano_info item=item key=key}}
							<li><div class="user_head">
									<a class="figure Head_portrait" href="/index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank" style="background-image: url({{$item.headpic}});"></a>
									<div class="user_info_box">
										<div class="username"><a href="/index.php?m=index&c=muser&v=index&id={{$info.uid}}" target="_blank">{{$item.username}}</a></div>
										<div class="time">{{$item.addtime}}</div>
									</div>
								</div>
								<a class="dis_block" href="/index.php?m=index&c=travel&v=travel_detail&id={{$item.id}}" target="_blank">
									<div class="user_text omit lineNumber3 whiteSpace">{{$item.describes}}</div>
									<div class="figure pic" style="background-image: url({{$item.content}});"></div>
								</a>
							</li>
							{{/foreach}}
							{{/if}}
						</ul>
					</div>
					
					<!--广告-->
					<div class="box figure borderRadius" style="background-image: url(/uploadfile/image/20181023/154028012224029.jpg);"></div>
					
					<!--热门旅游地-->
					<div class="Popular">
						<h3 class="PopularTitle">热门旅游地</h3>
						{{foreach from=$tourismlist item=vo}}
						<a class="dis_block figure pic" href="/index.php?m=index&c=index&v=star&keyword={{$vo.keyword}}" target="_blank" style="background-image: url({{$vo.pics}});">
							<span>{{$vo.title}}</span>
						</a>
						{{/foreach}}
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="h81"></div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>