<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-TA的问答</title>
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
	    <h3>TA的问答</h3>
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
	    	<div class="imgBg figure borderRadius bg_blur" style="background-image: url({{$muser.cover}})"></div>
	        <div class="message fix">
	        	<a class="dis_block gaine figure" href="/index.php?m=wap&c=user&v=index" style="background-image: url({{$muser.avatar}});"></a>
	        	<div class="rightBox{{if $muser.tag}}{{else}} MarginBottom{{/if}}">
	        		<div class="wx_name fix">
	        			<span class="username">{{$muser.username}}</span>
	        			<p class="location fix" title="定位"><img class="icon_location2" src="/resource/m/images/common/icon_location1.png" /><i>{{$muser.city}}</i></p>
	        		</div>
        			{{if $muser.tag}}
        			<p class="labelList">
						{{foreach from=$muser.tag key=k item=vo}}
							{{if $k <2}}
						<span class="tag">{{$vo}}</span>
							{{/if}}
						{{/foreach}}
						</p>
					{{/if}}
	        	</div>
	        	<input type="hidden" name="synopsis" id="synopsis" value="{{$muser.autograph}}" />
	        	<p class="intro fix" title="简介">
	        		<span class="autograph"></span>
	        		<span class="viewMore dis_none" data-open="0">查看全文</span>
	        	</p>
	        	<div class="statistics fix">
	        		<div class="left">
	        			<div class="boxes">
	        				<b class="attention">{{$muser.uid|helper:'follownum'}}</b>
	        				<b>关注</b>
	        			</div>
	        			<div class="boxes">
	        				<b class="fans">{{$muser.uid|helper:'fansnum'}}</b>
	        				<b>粉丝</b>
	        			</div>
	        		</div>
		        	<div class="right">
		        		<button class="button private" onclick="smg({{$muser.uid}})">私信</button>
		        		<button class="button attention" onclick="follows({{$muser.uid}},this)">{{$muser.uid|helper:'isfollows'}}</button>
		        	</div>
	        	</div>
	        </div>
	    </div>

	    <!--正文-->
	    <input type="hidden" name="uid" id="uid" data-type="4" value="{{$muser.uid}}" />
	    <input type="hidden" id="UniqueValue" data-sign="his" data-length="38" value="faq_num" title="共用JS区分的唯一必须值"/>
	    <div class="row-TV">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=muser&v=index&id={{$muser.uid}}">日志&nbsp;<i class="Iclass" id="travel_num">{{$total.travel_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=muser&v=tv&id={{$muser.uid}}">视频&nbsp;<i class="Iclass" id="tv_num">{{$total.tv_num}}</i></a></li>
	                    <li><a href="/index.php?m=wap&c=muser&v=travel_note&id={{$muser.uid}}">游记&nbsp;<i class="Iclass" id="note_num">{{$total.note_num}}</i></a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=muser&v=ta_faq&id={{$muser.uid}}">问答&nbsp;<i class="Iclass" id="faq_num">{{$total.faq_num}}</i></a></li>
	                </ul>
	            </div>
	        </div>

	        {{if $list}}
	        <div class="m-mytv-yz issue" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp fix">
							<p class="headline"><img class="view" src="/resource/m/images/user/icon_faq_detail1.png"><span class="substance">{{$item.title}}</span></p>
							<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id={{$item.id}}">
								<p class="videoDetails omit lineNumber4">{{$item.desc}}</p>
								<div class="videoBottom fix">
									{{if $item.address}}
									<span class="left"><img src="/resource/m/images/common/icon_location1.png" /><h4>{{$item.address}}</h4></span>
									{{/if}}
									{{if $item.label}}
										{{foreach from=$item.label key=k item=vo }}
											{{if $k <1}}
									<span class="left tag">{{$vo}}</span>
											{{/if}}
										{{/foreach}}
									{{/if}}
									<div class="divRight">
										<span class="check">{{$muser.username}}问于</span>
										<span class="check">{{$item.addtime}}</span>
									</div>
								</div>
							</a>
							<div class="IMGbox fix">
								<div class="pullDownButton" onclick="pullDownButton(this)"></div>
								<div class="menuOption fix dis_none">
									<span class="collect" onclick="collect({{$item.id}})">收藏</span>
									<span class="cancel">取消</span>
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
	                	<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">TA还没有发布任何问答哦！</div>
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
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>