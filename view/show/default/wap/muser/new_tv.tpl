<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-TA的视频</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/commonList.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>TA的视频</h3>
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
	    <div class="ban">
	        <div class="backdrop fix"><img src="{{$muser.cover}}" title="背景图" alt=""></div>
	        <div class="head fix">
	        	<div class="profilePhoto"><div class="gaine"><a class="box figure" style="background-image: url({{$muser.avatar}});"></a></div></div>
	        	<p class="wx_name">{{$muser.username}}&nbsp;<a href="javascript:;" onclick="smg({{$muser.uid}})"><img class="icon_new1" src="/resource/m/images/common/icon_new1.png" /></a></p>
	        	<p class="signature fix" title="个性签名">
	        		<span class="icon_location1"></span>
	        		<img class="icon_location2" src="/resource/m/images/common/icon_location1.png" />
	        		<span class="autograph">{{$muser.city}}&nbsp;{{$muser.autograph}}</span>
	        	</p>
	        	<div class="bottom fix">
	        		<p class="left"><span id="attention">{{$muser.uid|helper:'follownum'}}</span>关注</p>&nbsp;&nbsp;&nbsp;<p class="right"><span id="fans">{{$muser.uid|helper:'fansnum'}}</span>粉丝</p>
	        	</div>
	        </div>
	        <div class="attentionBtn fix">
                <button class="guanzhu" onclick="follows({{$muser.uid}},this)">{{$muser.uid|helper:'isfollows'}}</button>
            </div>
	    </div>
	    
	    <input type="hidden" id="UniqueValue" data-sign="his" value="tv_num" title="共用JS区分的唯一必须值"/>
	    <input type="hidden" name="uid" id="uid" data-type="2" value="{{$muser.uid}}" />
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=muser&v=index&id={{$muser.uid}}">日志&nbsp;<i class="Iclass" id="travel_num">{{$total.travel_num}}</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=muser&v=tv&id={{$muser.uid}}">视频&nbsp;<i class="Iclass" id="tv_num">{{$total.tv_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=muser&v=travel_note&id={{$muser.uid}}">游记&nbsp;<i class="Iclass" id="note_num">{{$total.note_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=muser&v=ta_faq&id={{$muser.uid}}">问答&nbsp;<i class="Iclass" id="faq_num">{{$total.faq_num}}</i></a></li>
	                </ul>
	            </div>
	        </div>
	        
	        {{if $list}}
	        <div class="m-mytv-yz" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp fix">
							<p class="videoTitle">{{$item.title}}</p>
							<div class="date">{{$item.addtime}}</div>
							<p class="videoDetails">{{$item.describes}}</p>
							<div class="preview fix">
								<a href="#m-pop1-yz" class="pic js-video fix" data-src="{{$item.url}}">
									<img src="{{$item.pics}}" alt="">
									<span class="bo"></span>
								</a>
							</div>
							<div class="videoBottom">
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" />{{$item.address}}</span>
								<p class="right">
									<span class="check"><img src="/resource/m/images/common/icon_check.png" />{{$item.shownum}}</span>&nbsp;&nbsp;
									<a class="zan" data-id="{{$item.id}}" href="javascript:;">
										<span class="like"><img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">{{$item.topnum}}</i></span>
									</a>&nbsp;&nbsp;
									<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>
								</p>
							</div>
							<div class="pullDownMenu fix">
								<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />
								<div class="pullDownNav fix dis_none">
									<a class="collect" href="javascript:;" onclick="collect({{$item.id}})"><span>收藏</span></a>
									<a class="cancel" href="javascript:;"><span>取消</span></a>
								</div>
							</div>
						</div>
					</div>
					{{/foreach}}
	        	</div>
				<p class="tips"></p>
	        </div>
	        {{else}}
	        <div class="m-mytv-yz">
	            <div class="m-myday-yz">
	                <div class="wp fix">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_tv_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">TA还没有发布任何视频哦！</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        {{/if}}
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	    <!-- 视频弹窗 -->
	    <div class="m-pop1-yz" id="m-pop1-yz">
	        <div class="con conAmend">
	            <iframe src='' name="myiframe" frameborder=0 'allowfullscreen' id="myiframe"></iframe>
	            <div class="close js-close"><span></span></div>
	        </div>
	    </div>
	    <!-- end -->
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/m/js/common.js"></script>
</body>
</html>