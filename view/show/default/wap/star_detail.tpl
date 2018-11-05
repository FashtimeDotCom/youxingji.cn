<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>日志详情_{{TO->cfg key="site_name" group="site" default="日志详情"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <!--lightbox开始-->
    <link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
    <![endif]-->
    <script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.lightbox').lightbox();
        });
    </script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/star.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>日志详情</h3>
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
	    
    	<!--正文-->
    	<input type="hidden" name="uid" id="uid" data-type="1" value="{{$info.uid}}" />
		<input type="hidden" id="UniqueValue" data-sign="detail" data-rid="{{$info.id}}" data-length="38" value="travel_num" data-uid="{{$info.uid}}" data-type="1" title="共用JS区分的唯一必须值"/>
        <div class="wp row_list">
            <ul class="ul-list-talent">
                <div class="item fix">
                    <div class="info">
                    	<div class="tx">
                            <a class="pic figure borderRadius50" href="{{$info.uid|helper:'mhref'}}" style="background-image: url({{$info.headpic}});"></a>
                            <h5><span>{{$info.username}}</span></h5>
                            <span class="time">{{$info.addtime|date_format:'%Y-%m-%d %H:%M:%S'}}</span>
                            <span class="botton" onclick="follows({{$info.uid}},this)">{{$info.uid|helper:'isfollows'}}</span>
                       	</div>
                        <div class="txt"><p>{{$info.describes}}</p></div>
                    </div>
                    <dl class="list-img list_img">
						{{foreach from=$info.content item=item key=key}}
						<dd><a href="{{$item}}" class="lightbox figure borderRadius" rel="list{{$info.id}}" style="background-image: url({{$item}});"></a></dd>
						{{/foreach}}
					</dl>
                    <div class="videoBottom fix">
                    	{{if $info.address}}
						<span class="left" title="标签"><img src="/resource/m/images/common/icon_location2.png" />{{$info.address}}</span>
						{{/if}}

						<div class="right">
							<span><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i>{{$info.shownum}}</i></span>&nbsp;&nbsp;
							<span class="zan" onclick="zan(this,{{$info.id}})" data-nature="subject">
								<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i>{{$info.topnum}}</i>
							</span>&nbsp;&nbsp;
						</div>
						
						<div class="IMGbox fix">
							<div class="pullDownButton" onclick="pullDownButton(this)"></div>
							<div class="menuOption fix dis_none">
								<span class="collect" onclick="collect({{$info.id}})">收藏</span>
								<span class="cancel">取消</span>
							</div>
						</div>
					</div>
               	</div>
            </ul>
       	</div>
	
		<!--评论区-->
        <div class="m-comment">
        	<div class="navigation" id="navigation" data-type="1">
        		<span class="title">评论</span>
        		<p class="Button fix">
        			<span class="press pressTime onn">按时间</span>
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
	                    	<div class="txtt"><p>{{$vo.content}}</p></div>
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
	<div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	{{include file='wap/footer.tpl'}}
	
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】">

	</script><script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
	<script type="text/javascript">
		//点击下拉
		function pullDownButton(obj){
			if( $(obj).next(".menuOption").attr("class")=="menuOption fix dis_none" ){
				$(".menuOption").addClass("dis_none");
				$(obj).next(".menuOption").removeClass("dis_none");
				$(".maskLayer").removeClass("dis_none");
			}else{
				$(".maskLayer,.menuOption").addClass("dis_none");
			}
		}
		
	    //点击遮罩层显示
	    $('.maskLayer,.cancel').on("click",function() {
	    	$(".maskLayer,.menuOption").addClass("dis_none");
	    });
	</script>
</body>
</html>