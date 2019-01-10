<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>回答详情</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    
    <script src="/resource/lightbox/jquery.min.js"></script>
	<!--lightbox开始-->
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			//这个for循环的作用：回答问题者的图片可以点击放大查看
			for(var i=0;i<$("#answerContent p img").length;i++){
				$("#answerContent p img").eq(i).before("<a class='lightbox' rel='list' href='"+"//"+window.location.host+$("#answerContent p img").eq(i).attr("src")+"'></a>");
			}
			$('.lightbox').lightbox();
		});
	</script>
    
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/faq_detail.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
    <style type="text/css">
    	.question{position: relative;padding: 3% 3% 0.5rem 3%;background: #fff;margin-bottom: 1.2rem;}
    	.question h3{width: 90%;line-height: 20px;color: #333;font-size: 1.4rem;}
    	.question .browseNum{width: 90%;font-size: 1.25rem;color: #898989;line-height: 24px;}
		.question .browseNum i{font-style: normal;font-weight: 600;color: #666;font-size: 1.25rem;padding: 0 2px;}
    	
    	.question .skip{position: absolute;top: 1.2rem;right: 0.5rem;display: block; width: 1.5rem;height: 3.5rem;}
    	.question .skip img{display: block;width: 110%;margin: 36% auto;
							transform:rotate(-90deg);
							-o-transform:rotate(-90deg); 	/* Opera */
							-ms-transform:rotate(-90deg); 	/* IE 9 */
							-moz-transform:rotate(-90deg); 	/* Firefox */
							-webkit-transform:rotate(-90deg); /* Safari 和 Chrome */}
		.answer{ margin-bottom: 1.8rem;}
		.answer .hunk .bottom{border-bottom: 1px #f2eeee solid;}
		.answer .hunk .bottom .left{line-height: 30px;margin-top: 5px;}
		.answer .hunk .bottom .left .boxes{margin-top: 6px;}
		.answer .hunk .bottom .left .grade{color: #d71618;font-weight: 600;}
		.answer .hunk .bottom .right{margin-bottom: 5px;}

		.answer .hunk .substanc{padding: 10px 0;}
		.answer .hunk .substanc p{line-height: 24px;font-size: 14px;text-align: justify;position: relative;}
		.answer .hunk .substanc p a{position: absolute;z-index: 1;display: block;width: 100%;height: 100%;}
		.answer .hunk .substanc img{padding: 10px 0;}
		
		.botton{border: 1px #f33b3b solid;padding: 0px 4px;font-style: initial;line-height: 20px; margin-top: 12px;font-size: 0.75rem;color: #fff;background: #f33b3b;}
		.botton b{display: inline-block;line-height: 20px;}

		.videoBottom div span{display: inline-block;font-size: 1.3rem;color: #666;line-height: 34px;}
		
		.videoBottom .left{float: left;}
		.videoBottom .left img{display: inline-block;margin-right: 0.2rem;vertical-align: middle;width: 1.5rem;}
		.videoBottom .left i{width: 10px;line-height: 34px;font-size: 1.3rem;}
		
		.videoBottom .right{float: right;}
		
		.maskLayer{background: rgba(0,0,0,0.5);z-index: 1000;opacity: 1;}
		.maskLayer .shade{position: fixed;top: 0;right: 0;left: 0;bottom: 0;background: transparent;opacity: 0;z-index: 1003;}
		
		.shareGuidance{position: absolute;right: 1rem;top: 2rem;border-radius: 0.3rem;z-index: 1002;border-top-right-radius: 0px;}
    	.shareGuidance .icon_share{display: block;position: absolute;top: -27px;right: 0px;width: 90px;}
    	
    	.shareGuidance .box{width: 100%;height: 100%;background: rgba(0,0,0,0.8);border-radius: 0.3rem;padding: 12px 24px;border-top-right-radius: 0px;}
    	.shareGuidance .box p{color: #fff;font-size: 0.7rem;line-height: 1.1rem;}
    	.shareGuidance .box p img{display: inline-block;}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>回答详情</h3>
	</div>
	<div class="mian">
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

	    <div class=" fix">
	    	<!--问题-->
			<div class="hunk question fix" data-id="{{$info.id}}">
				<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id={{$info.faq_id}}">
					<h3 class="name omit lineNumber2">{{$info.title}}</h3>
					<div class="browseNum fix">查看其他<i>{{$info.res_account}}</i>条回答</div>
					<div class="skip"><img src="/resource/m/images/common/icon_pullDown.png"/></div>
				</a>
			</div>
	    	
	    	<!--答-->
	    	<input type="hidden" name="uid" id="uid" data-type="4" value="{{$info.uid}}" />
	    	<input type="hidden" name="" id="answerNum" title="回答的总数" value="" />
	    	<input type="hidden" id="UniqueValue" data-sign="detail" value="faq_num" data-rid="{{$info.id}}" data-type="4" title="共用JS区分的唯一必须值"/>

	    	<div class="modules answer fix" id="answer">
				<div class="hunk fix">
					<div class="bottom fix">
						<div class="left answerLef fix">
							<span class="boxes">答&nbsp;<span class="profilePhoto figure" style="background-image: url({{$info.headpic}});"></span></span>&nbsp;
							<span class="name">{{$info.username}}</span>
							<span class="grade">{{$info.lv}}</span>
							<span class="botton" onclick="follows({{$info.uid}},this)">{{$info.uid|helper:'isfollows'}}</span>
						</div>
						<div class="right transform fix"><span>{{$info.addtime}}</span></div>
					</div>
					<div class="substanc fix" id="answerContent">{{$info.content}}</div>
					
					<div class="videoBottom fix">
						<div class="left">
							<span class="zan" onclick="zan(this,{{$info.id}})" data-nature="subject">
								<img src="/resource/m/images/common/icon_like.png"><i class="Iclass">{{$info.top_num}}</i>
							</span>&nbsp;&nbsp;
						</div>
						
						<div class="right">
							<span class="share" onclick="shareGuidance()">分享</span>&nbsp;&nbsp;
						</div>
					</div>
	    		</div>
	    	</div>
	    	
	        <!--评论区-->
	        <div class="m-comment">
	        	<div class="navigation" id="navigation" data-type="1">
	        		<span class="titleTWO">评论</span>
	        		<p class="Button fix">
	        			<span class="press pressTime onn">按时间</span>&nbsp;|&nbsp;
	        			<span class="press pressHeat">按热度</span>
	        		</p>
	        	</div>
	            
	            <!--每页-->
	            <input type="hidden" name="" id="multipage" value="{{$multipage.page}}" title="评论的总页数" />
	            <input type="hidden" name="" id="from_url" value="{{$from_url}}" title="登录完之后跳转回这个本来的游记" />
	            <div class="box fix" data-page="1">
		        	<ul class="ul-imgtxt4 fix" id="receptacle">
		            	{{foreach from=$comment item=vo key=k}}
		                <li><div class="tit">
		                        <a class="dis_block fix" href="{{$vo.uid|helper:'mhref'}}">
				                    <i style="background-image: url({{$vo.uid|helper:'avatar'}});"></i>
				                    <h3><b class="username_{{$vo.uid}}">{{$vo.uid|helper:'username'}}</b></h3>
				                    <span class="addtime">{{$vo.addtime}}</span>
				                </a>
		                    </div>
		                    <div class="substance" data-replyNum="{{$vo.count}}">
		                    	<div class="txtt">{{$vo.content}}</div>
			                    <div class="BarSubmenu">
			                    	<span class="reply replyReview" data-id="{{$vo.id}}" data-open="0" data-class="1">回复</span>
			                    	<div class="leftSubmenu">
				                    	<span class="zan" onclick="zan(this,{{$vo.id}})" data-nature="review">
				                    		<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>
				                    		<i>{{$vo.top_num}}</i>
				                    	</span>
			                    	</div>
			                    </div>
			
			                    <!--回复【评论】的文本框-->
			                    <div class="m-publish details_stair" data-tid="{{$vo.id}}">
					                <div class="wp">
					                    <div class="content">
					                        <div class="top"><span class="emotion{{$vo.id}}" onclick="emotion({{$vo.id}})"></span></div>
					                        <textarea id="comment{{$vo.id}}" placeholder="写下您的感受......."></textarea>
					                        {{if !$user}} 
					                        <div class="nologin">
					                            <div class="nologinbtn">
					                                <a class="from_url" href="javascript:;">登录</a>
			                                        <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
					                            </div>
					                        </div>
					                        {{/if}}
					                    </div>
					                    <span class="btn btnComment_Review" data-touid="{{$vo.uid}}" data-id="{{$vo.id}}" data-class="1" data-name="">发表回复</span>
					                </div>
					            </div>
					            
					            <!--对应评论的所有回复-->
					            <div class="blockquote_wrap" data-i="{{$k+1}}" data-count="{{$vo.count}}">
		                            {{foreach from=$vo.sub key=key item=item}}
		                            <div class="module fix">
			                            <div class="comment_blockquote">
			                                <div class="comment_floor">{{$key+1}}楼</div>
			                                <div class="comment_conWrap">
			                                    <div class="comment_con">
			                                        <span class="name">{{$item.username}} </span><span class="name"><i>回复</i> {{$item.to_username}}：</span>
			                                        <span class="matter">{{$item.content}}</span>
			                                    </div>
			                                </div>
			                                <div class="BarSubmenu">
						                    	<span class="reply reply_reply" data-id="{{$item.id}}" data-open="0" data-class="2">回复</span>
						                    	<div class="leftSubmenu">
						                    		<span class="addtime">{{$item.addtime|date_format:'%Y-%m-%d %H:%M:%S'}}</span>
							                    	<span class="zan" onclick="zan(this,{{$item.id}})" data-nature="review">
							                    		<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>
							                    		<i>{{$item.top_num}}</i>
							                    	</span>
						                    	</div>
						                    </div>
		
			                                <!--回复的弹出框-->
			                                <div class="m-publish details_">
			                                    <div class="wp">
			                                        <div class="content">
			                                            <div class="top"><span class="emotion{{$item.id}}" onclick="emotion({{$item.id}})"></span></div>
			                                            <textarea id="comment{{$item.id}}" placeholder="写下您的感受......."></textarea>
			                                            {{if !$user}}
			                                            <div class="nologin">
			                                                <div class="nologinbtn">
			                                                    <a class="from_url" href="javascript:;">登录</a>
			                                                    <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
			                                                </div>
			                                            </div>
			                                            {{/if}}
			                                        </div>
			                                        <span data-touid="{{$item.uid}}" data-id="{{$vo.id}}" data-pid_sub="{{$item.id}}" data-class="2" class="btn btnComment_">发表回复</span>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
		                            {{/foreach}}
					            </div>
		                    </div>
		                </li>
		                {{/foreach}}
		           	</ul>
					<p class="tips"></p>
		       	</div>
	
	            <!-- 页码 -->
	            {{if $multipage}}
		        <div class="pages" data-nowPage="1">
		            <ul id="pageComposer">
		            	{{foreach from=$multipage item=page}}
		                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a class="pageTurning" href="javascript:;" data-href="{{$page.1}}">{{$page.0}}</a></li>
		                {{/foreach}}
		            </ul>
		        </div>
		        {{/if}}
	            <!-- 页码 end-->
	            
	            <!--评论-->
	            <div class="m-publish original">
	                <div class="wp">
	                    <div class="content">
	                        <div class="top"><span class="emotion"></span></div>
	                        <textarea id="comment" placeholder="写下您的感受......."></textarea>
	                        {{if !$user}} 
	                        <div class="nologin">
	                            <div class="nologinbtn">
	                                <a class="from_url" href="javascript:;">登录</a>
	                                <a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>
	                            </div>
	                        </div>
	                        {{/if}}
	                    </div>
	                    <span class="btn btnComment">发表评论</span>
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <!--分享引导弹窗-->
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失">
	    	<div class="shareGuidance fix">
	    		<div class="box fix">
	    			<img class="icon_share" src="/resource/m/images/user/icon_share.png"/>
	    			<p class="">1.点击右上角“...”</p>
					<p class="">2.选择“<img class="" src="/resource/m/images/user/icon_share2.png" />”分享给朋友</p>
	    		</div>
			</div>
    		<div class="shade" onclick="shade()"></div>
		</div>
	</div>
	
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>

	
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
    <script type="text/javascript">
		//分享
		function shareGuidance(){
			$(".maskLayer").removeClass("dis_none");
		}
		function shade(){
			$(".maskLayer").addClass("dis_none");
		}
	</script>
</body>
</html>