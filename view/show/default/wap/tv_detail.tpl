<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$info.title}}_{{TO->cfg key="site_name" group="site" default="达人视频"}}</title>
    <meta name="description" content="{{$info.title}}" />
    <meta name="keywords" content="{{$info.title}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/detail.css" />
    <style type="text/css">
    	.BigBox{overflow: hidden;background-color: #fff;}
		.BigBox .Video{display: block;width: 100%;}
		
		.BigBox .main{position: relative;}
		.BigBox .main .boxTop{position: relative;z-index: 2;padding: 10px 10px;border-bottom: 1.5px rgba(99, 92, 78, 0.6) solid;}
		.BigBox .main .boxTop p{color: #fff;text-align: justify;}
		.BigBox .main .boxTop .title{font-size: 1.3rem;margin-top: 10px}
		.BigBox .main .boxTop .describe{font-size: 1.2rem;margin-top: 10px}
		.BigBox .main .boxTop .boxs{margin-top: 10px;}
		.BigBox .main .boxTop .boxs .profile{width: 16%;padding-bottom: 16%;float: left;border: 1.5px #fff solid;margin-right: -16%;}
		.BigBox .main .boxTop .boxs .module{padding-left: 20%;width: 100%;float: left;}
		.BigBox .main .boxTop .boxs .module span{margin-right: 10px;color: #fff;}
		.BigBox .main .boxTop .boxs .module .name{font-size: 1.3rem;line-height: 30px;}
		.BigBox .main .boxTop .boxs .module .tag{font-size: 1.2rem;}
		.BigBox .main .botton{padding: 0 10px 15px;}
		.BigBox .main .botton p{color: #fff;position: relative;}
		.BigBox .main .botton .title{font-size: 1.3rem;line-height: 34px;margin-top: 8px;}
		.BigBox .main .botton .title .back{display: block; font-size: 1.3rem;float: right;}
		.BigBox .main .botton .slideshow .pic{padding-bottom: 55%;position: relative;border-radius: 3px;}
		.BigBox .main .botton .slideshow .pic .addtime{position: absolute;right: 0;bottom: 1rem;background: #111111;color: #bababa;}
		.BigBox .main .botton .slideshow .little_title{font-size: 0.9rem;text-align: justify;}
		.BigBox .main .botton .slideshow .little_title a{display: block;width: 100%;height: 100%;color: #fff;}
		
		.bg_blur{-webkit-filter: blur(5px) contrast(.8) brightness(.8);
	            -moz-filter: blur(5px);
	            -o-filter: blur(5px);
	            -ms-filter: blur(5px);
	            filter: blur(5px) contrast(.8) brightness(.8);}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>达人视频</h3>
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
        <input type="hidden" id="UniqueValue" data-sign="detail" data-rid="{{$info.id}}" data-length="38" value="tv_num" data-uid="{{$info.uid}}" data-type="2" title="共用JS区分的唯一必须值"/>
        <div class="BigBox">
        	<iframe class="Video" title="{{$info.title}}" src="{{$info.url}}"></iframe>
        	<div class="main fix">
            	<div class="imgBg bg_blur" style="background: url({{$info.pics}}) no-repeat top center / 200%;"></div>
            	<div class="boxTop fix">
            		<p class="title">{{$info.title}}</p>
	            	<p class="describe">{{$info.describes}}</p>
	            	<div class="boxs fix">
	            		<div class="profile figure borderRadius50" style="background-image: url({{$info.headpic}});"></div>
	            		<div class="module fix">
	            			<p class="name">{{$info.username}}</p>
	            			
	            			<input type="hidden" name="synopsis" id="synopsis" value="{{$info.autograph}}" />
	            			<p class="tag">
								<span class="autograph"></span>
								<span class="viewMore dis_none" data-open="0">查看全文</span>
							</p>
	            		</div>
	            	</div>
            	</div>
            	<div class="botton fix">
            		<p class="title">选集 <span class="back" onClick="javascript:history.back()">返回上页</span></p>
            		<div class="slideshow swiper-container" id="bannerSwiper">
						<div class="swiper-wrapper">
						{{if $tv_list}}
						{{foreach from=$tv_list item=item key=key}}
							<div class='swiper-slide'>
								<div class='pic figure' onclick="js_video(this)" data-src="{{$item.url}}" style="background-image: url({{$item.pics}});">
									<span class="bo"></span>
									<span class="addtime">{{$item.addtime|date_format:'%Y-%m-%d'}}</span>
								</div>
								<p class="little_title"><a class="dis_block omit lineNumber2" href="/index.php?m=wap&c=index&v=tv_detail&id={{$item.id}}">{{$item.title}}</a></p>
							</div>
						{{/foreach}}
						{{/if}}
						</div>
	            	</div>
            	</div>
            </div>
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
    {{include file='wap/footer.tpl'}}
    
    <!-- 视频弹窗 -->
    <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz">
    	<div class="con"><div class="close js-close" onclick="js_close()"><span></span></div><div class="VideoArea"></div></div>
    </div>
    <!-- end -->
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
	
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
		var swiper = new Swiper('#bannerSwiper', {
				slidesPerView: 2.5,//设置slider容器能够同时显示的slides数量(carousel模式)
				//loop: true,
				initialSlide: 0,//设定初始化时slide的索引
				spaceBetween: 8, //在slide之间设置距离（单位px）
			});
	</script>
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/resource/m/js/comment.js" title="评论  + 回复   公共 JS代码"></script>
</body>
</html>