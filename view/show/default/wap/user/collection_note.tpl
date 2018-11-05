<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的游记</title>
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
	    <h3>我收藏的游记</h3>
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
	    <div class="row-TV minHeight">
	        <div class="m-nv-yz">
	            <div class="wp fix">
	                <ul class="fix">
	                	<li><a href="/index.php?m=wap&c=Collection&v=collection_travel">日志</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_tv">视频</a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_faq">问答</a></li>
	                </ul>
	            </div>
	        </div>
	        
	        <input type="hidden" id="UniqueValue" data-sign="collect" value="note_num" data-type="3" title="共用JS区分的唯一必须值"/>
            <input type="hidden" name="type" id="note_num" title="总数" value="{{$total.note_num}}"/>
	        {{if $list}}
	        <div class="m-mytv-yz notes" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.id}}">
						<div class="wp">
							{{if $item.is_delete && $item.is_delete==1}}
							<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>null</p>
							<div class="date">null</div>
							<a href="javascript:;" class="dis_block fix"><p class="videoDetails" style="color: red;">:)抱歉，此问答已被作者删除!</p></a>
							{{else}}
							<!--<a class="dis_block fix" href="/index.php?m=wap&c=index&v=rytdetai&id={{$item.id}}">-->
							<a class="dis_block fix" href="javascript:;">
								<p class="videoTitle">{{$item.title}}</p>
								<div class="date">{{$item.addtime}}</div>
								<p class="videoDetails">{{$item.desc}}</p>
								<div class="preview fix"><img src="{{$item.thumbfile}}" alt=""></div>
							</a>

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
									<span class="review">
										<!--<a class="widthHeight" href="/index.php?m=wap&c=index&v=rytdetai&id={{$item.id}}">-->
										<a class="widthHeight" href="javascript:;">
											<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>
										</a>
									</span>
								</p>
							</div>
							{{/if}}
							<div class="IMGbox fix">
								<div class="pullDownButton" onclick="pullDownButton(this)"></div>
								<div class="menuOption fix dis_none">
									<span class="collect deleteInfo" data-id="{{$item.id}}">删除</span>
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
	                	<img class="default_bg" src="/resource/m/images/user/defaul_travel_note_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快增加收藏吧！</div>
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
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉到底部触发更新增加信息JS函数集合"></script>
</body>
</html>