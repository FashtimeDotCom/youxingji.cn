<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的游记</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/personalcenter.css" />
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>我的游记</h3>
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
	    <div class="ban figure fix">
	    	<div class="imgBg figure borderRadius bg_blur" style="background-image: url({{$user.cover}})"></div>
	        <div class="message fix">
	        	<a class="dis_block gaine figure" href="/index.php?m=wap&c=user&v=index" style="background-image: url({{$user.avatar}});"></a>
	        	<div class="rightBox{{if $user.tag}}{{else}} MarginBottom{{/if}}">
	        		<div class="wx_name fix">
	        			<span class="username">{{$user.username}}</span>
	        			<p class="location fix" title="定位"><img class="icon_location2" src="/resource/m/images/common/icon_location1.png" /><i>{{$user.city}}</i></p>
	        		</div>
        			{{if $user.tag}}
        			<p class="labelList">
						{{foreach from=$user.tag key=k item=vo }}
							{{if $k <2}}
						<span class="tag">{{$vo}}</span>
							{{/if}}
						{{/foreach}}
						</p>
					{{/if}}
	        	</div>
	        	<input type="hidden" name="synopsis" id="synopsis" value="{{$user.autograph}}" />
	        	<p class="intro fix" title="简介">
	        		<span class="autograph"></span>
	        		<span class="viewMore dis_none" data-open="0">查看全文</span>
	        	</p>
	        	<div class="statistics fix">
	        		<div class="left">
	        			<div class="boxes">
	        				<b class="attention">{{$user.uid|helper:'follownum'}}</b>
	        				<b>关注</b>
	        			</div>
	        			<div class="boxes">
	        				<b class="fans">{{$user.uid|helper:'fansnum'}}</b>
	        				<b>粉丝</b>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    
	    <!--正文-->
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=user&v=travel">日志&nbsp;<i class="Iclass" id="travel_num">{{$total.travel_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=tv">视频&nbsp;<i class="Iclass" id="tv_num">{{$total.tv_num}}</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=user&v=travel_note">游记&nbsp;<i class="Iclass" id="note_num">{{$total.note_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=user&v=my_faq">问答&nbsp;<i class="Iclass" id="faq_num">{{$total.faq_num}}</i></a></li>
	                </ul>
	            </div>
	        </div>
	        <div class="row-yz" style="margin-bottom: 11px;">
	            <ul class="ul-txtlist-yz borderNone" style="border: none;">
	                <li><a href="/index.php?m=wap&c=user&v=addtravel">
	    					<i style="background-image: url(/resource/m/images/s-i5.png);"></i>
	    					<div class="txt">发布日志</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=user&v=addtv">
	    					<i style="background-image: url(/resource/m/images/s-i2.png);"></i>
	    					<div class="txt">发布视频</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=user&v=add_note">
	    					<i style="background-image: url(/resource/m/images/s-i1.png);"></i>
	    					<div class="txt">发布游记</div>
	    				</a>
	                </li>
	                <li><a href="/index.php?m=wap&c=faq&v=set_faq">
	    					<i style="background-image: url(/resource/m/images/s-i4.png);"></i>
	    					<div class="txt">发布提问</div>
	    				</a>
	                </li>
	            </ul>
	       	</div>   
	        <input type="hidden" id="UniqueValue" data-sign="my" data-length="38" value="note_num" title="共用JS区分的唯一必须值"/>
	        {{if $list}}
	        <div class="m-mytv-yz notes" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp">
							{{if $item.status==1}}
							<!--<a class="dis_block fix" href="/index.php?m=wap&c=index&v=rytdetai&id={{$item.id}}">-->
							<a class="dis_block fix" href="javascript:;">
								<p class="videoTitle">{{$item.title}}</p>
								<div class="date">{{$item.addtime}}</div>
								<p class="videoDetails omit lineNumber3">{{$item.desc}}</p>
								<div class="preview fix"><img src="{{$item.thumbfile}}" alt=""></div>
							</a>
							{{else}}
							<p class="videoTitle">{{$item.title}}</p>
							<div class="date">{{$item.addtime}}</div>
							<p class="videoDetails Areview omit lineNumber3">{{$item.desc}}</p>
							<div class="preview fix"><img src="{{$item.thumbfile}}" alt=""></div>
							{{/if}}
							<div class="videoBottom fix">
								{{if $item.address}}
								<span class="left"><img src="/resource/m/images/common/icon_location2.png" />{{$item.address}}</span>
								{{/if}}
								{{if $item.tag}}
									{{foreach from=$item.tag key=k item=vo }}
										{{if $k <1}}
											<span class="left tag">{{$vo}}</span>
										{{/if}}
									{{/foreach}}
								{{/if}}
								<p class="right">
									<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass">{{$item.show_num}}</i></span>&nbsp;&nbsp;
									<span class="like zan" onclick="zan(this,{{$item.id}})" data-nature="list">
										<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">{{$item.top_num}}</i>
									</span>&nbsp;&nbsp;
									{{if $item.status==1}}
									<span class="review">
										<!--<a class="widthHeight" href="/index.php?m=wap&c=index&v=rytdetai&id={{$item.id}}">-->
										<a class="widthHeight" href="javascript:;">
											<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
										</a>
									{{else}}
									<span class="review Areview"><img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
									{{/if}}
									</span>
								</p>
							</div>
							
							<div class="IMGbox fix">
								<div class="pullDownButton" onclick="pullDownButton(this)"></div>
								<div class="menuOption fix dis_none">
									<a class="collect" href="/index.php?m=wap&c=user&v=edit_note&id={{$item.id}}"><span>编辑</span></a>
									<span class="deleteInfo" data-id="{{$item.id}}">删除</span>
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
	                <div class="wp">
	                	<img class="default_bg" src="/resource/m/images/user/defaul_travel_note_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">用“长篇大论”记录你的美好旅程<br />让每一个景点在你的笔下变得鲜活</div>
	                    </div>
	                    <div class="top">
	                        <a href="/index.php?m=wap&c=user&v=add_note" class="shoot">发布游记</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        {{/if}}
	    </div>
	    <div class="maskLayer dis_none" title="遮罩层，作用：下拉菜单失焦时，下拉菜单自动消失"></div>
	</div>
	{{include file='wap/footer.tpl'}}

	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/m/js/jianjie.js" title="移动端    8个页面  的  【简介】"></script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>