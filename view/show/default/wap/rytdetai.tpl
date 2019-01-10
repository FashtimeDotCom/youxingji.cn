<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$article.title}}_{{TO->cfg key="site_name" group="site" default="达人游记"}}</title>
    <meta name="description" content="{{$article.title}}" />
    <meta name="keywords" content="{{$article.title}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>达人游记</h3>
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
        {{vplist from='ad' item='adlist' tagname='waprytdetailslide'}}
        <div class="ban"><img src="{{$adlist.imgurl}}" alt="" /></div>
        {{/vplist}}
        
        <!--正文-->
        <input type="hidden" name="uid" id="uid" data-type="3" value="{{$info.uid}}" />
        <input type="hidden" id="UniqueValue" data-sign="detail" data-rid="{{$article.id}}" value="note_num" data-uid="{{$vo.uid}}" data-type="3" title="共用JS区分的唯一必须值"/>
        <div class="m-text2">
            <div class="wp">
                <h1 class="whiteSpace">{{$article.title}}</h1>
                <div class="info">
                    <span>By<em>{{$article.username}}</em></span>
                    <span>{{$article.addtime}}</span>
                    <div class="right">
                        <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i>{{$article.shownum}}</span>
                        <span class="zan" onclick="zan(this,{{$article.id}})" data-nature="subject" style="line-height: 15px;">
                        	<img class="icon_like" src="/resource/m/images/i-zan.png" />
                            <i class="Iclass">{{$article.zannum}}</i>
                        </span>
                    </div>
                </div>
                <div class="m-share">
                    <div class="bdsharebuttonbox">
                        <span>分享至</span>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    </div>
                </div>
                <div class="txt whiteSpace">{{$article.content}}</div>
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
    {{include file='wap/footer.tpl'}} 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
    	//分享
		window._bd_share_config = {
		    "common": {
		        "bdSnsKey": {},
		        "bdText": "",
		        "bdMini": "2",
		        "bdMiniList": false,
		        "bdPic": "",
		        "bdStyle": "0",
		        "bdSize": "16"
		    },
		    "share": {}
		};
    </script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
</body>
</html>