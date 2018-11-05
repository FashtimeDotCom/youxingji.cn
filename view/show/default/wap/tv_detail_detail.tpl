<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>视频详情_{{TO->cfg key="site_name" group="site" default="视频详情"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/star.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
    <style type="text/css">
    	.video{width: 100%;padding-bottom: 50%;position: relative;}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>视频详情</h3>
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
        <div class="wp row_list">
            <ul class="ul-list-talent">
                <div class="item fix">
                    <div class="info">
                    	<div class="tx">
                            <a class="pic figure borderRadius50" href="{{$vo.uid|helper:'mhref'}}" style="background-image: url(/resource/m/images/tx-yz3.jpg);"></a>
                            <h5><span>六道佩恩</span></h5>
                            <span class="time">2018-07-16 17:36:26</span>
                            <span class="botton" onclick="follows({{$vo.uid}},this)">{{$vo.uid|helper:'isfollows'}}</span>
                       	</div>
                        <div class="txt"><p>金边皇宫富丽堂皇，镶嵌的金铂在阳光的照耀下熠熠生辉，攻略上写的皇宫开放时间是上午8点到下午5点，但实际的开放时间为上午8点到10点，下午2点到5点。由于我们10点才到，所以错过了开放时间，只能在外墙欣赏，实在是有些遗憾。皇宫对面有一个小广场，广场上有许多的鸽子，如果有兴趣的游行迹er，可以选择去广场散散步，喂喂鸽子哟！</p></div>
                    </div>
                    <div href="/uploadfile/image/20180717/153180886387701.jpg" class="video figure borderRadius" data-src="{{$item.url}}" onclick="js_video(this)" style="background-image: url(/uploadfile/image/20180717/153180886387701.jpg);">
                    	<span class="bo"></span>
                    </div>
                    
                    <div class="videoBottom fix">
                    	{{if $vo.address}}
						<span class="left" title="标签"><img src="/resource/m/images/common/icon_location2.png" />{{$vo.address}}</span>
						{{/if}}

						<div class="right">
							<span><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i>{{$vo.shownum}}</i></span>&nbsp;&nbsp;
							<span class="zan" onclick="zan(this,{{$vo.id}})" data-nature="list">
								<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i>{{$vo.topnum}}</i>
							</span>&nbsp;&nbsp;
							<span class="Areview"><img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i>0</i></span>
						</div>
						
						<div class="IMGbox fix">
							<div class="pullDownButton" onclick="pullDownButton(this)"></div>
							<div class="menuOption fix dis_none">
								<span class="collect" onclick="collect({{$vo.id}})">收藏</span>
								<span class="cancel">取消</span>
							</div>
						</div>
					</div>
               	</div>
            </ul>
       	</div>
	
		<!--评论区-->
		<input type="hidden" id="UniqueValue" data-sign="particulars" data-rid="{{$info.id}}" data-length="38" value="travel_num" data-uid="{{$info.uid}}" data-type="2" title="共用JS区分的唯一必须值"/>
        <div class="m-comment">
        	<div class="navigation">
        		<span class="title">评论</span>
        		<p class="Button fix">
        			<span class="press pressTime onn">按时间</span>
        			<span class="press pressHeat">按热度</span>
        		</p>
        	</div>
            
            <!--每页-->
            <input type="hidden" name="" id="multipage" value="{{$multipage.page}}" title="评论的总页数" />
            <input type="hidden" name="" id="from_url" value="{{$from_url}}" title="登录完之后跳转回这个本来的游记" />
            <input type="hidden" name="" id="user" value="{{$user}}" title="判断是否有登录" />
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
		                    		<span class="floor">{{$vo.lou}}F</span>
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
				                                <a class="from_url" href="javascript:;" target="_blank">登录</a>
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
		                            <blockquote class="comment_blockquote">
		                                <div class="comment_floor">{{$key+1}}楼</div>
		                                <div class="comment_conWrap">
		                                    <div class="comment_con">
		                                        <!--<span class="name">{{$item.username}}：</span>-->
		                                        <span class="name">{{$item.username}} </span><span class="name"><i>回复</i> {{$item.to_username}}：</span>
		                                        <span class="matter">{{$item.content}}</span>
		                                    </div>
		                                </div>
		                                <div class="BarSubmenu">
					                    	<span class="reply reply_reply" data-id="{{$item.id}}" data-open="0" data-class="2">回复</span>
					                    	<div class="leftSubmenu">
						                    	<span class="zan" onclick="zan(this,{{$item.id}})" data-nature="writeBack">
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
		                            </blockquote>
		                        </div>
	                            {{/foreach}}
				            </div>
	                    </div>
	                </li>
	                {{/foreach}}
	           	</ul>
            </div>
	            
            
            <!-- 页码 -->
            {{if $multipage}}
	        <div class="pages">
	            <ul>{{foreach from=$multipage item=page}}
	                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a class="pageTurning" href="{{$page.1}}">{{$page.0}}</a></li>
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
                                <a class="from_url" href="javascript:;" target="_blank">登录</a>
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
	<!-- 视频弹窗 -->
    <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz">
    	<div class="con"><div class="close js-close" onclick="js_close()"><span></span></div><div class="VideoArea"></div></div>
    </div>
    <!-- end -->
	<script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
	
	<script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】">

	</script><script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
</body>
</html>