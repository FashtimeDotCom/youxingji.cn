<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我收藏的问答</title>
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
	    <h3>我收藏的问答</h3>
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
	                    <li><a href="/index.php?m=wap&c=Collection&v=collection_note">游记</a></li>
	                    <li class="on"><a href="/index.php?m=wap&c=Collection&v=collection_faq">问答</a></li>
	                </ul>
	            </div>
	        </div>
	        
	        <input type="hidden" name="type" id="faq_num" title="总数" value="{{$total.faq_num}}"/>
	        <input type="hidden" id="UniqueValue" data-sign="collect" value="faq_num" data-type="4" title="共用JS区分的唯一必须值"/>
	        {{if $list}}
	        <div class="m-mytv-yz issue" id="pageCount" data-page="" data-nowPage="1">
	        	<div class="content fix">
	        		{{foreach from=$list item=item key=key}}
					<div class="item fix item_{{$item.t_id}}">
						<div class="wp">
							{{if $item.is_delete && $item.is_delete==1}}
							<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>null</p>
							<div class="date">null</div>
							<a href="javascript:;" class="dis_block fix"><p class="videoDetails" style="color: red;">:)抱歉，此问答已被作者删除!</p></a>
							{{else}}
							<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>{{$item.title}}</p>
							<div class="date">{{$item.addtime}}</div>
							<a href="/index.php?m=wap&c=faq&v=detail&id={{$item.id}}" class="dis_block fix">
								<p class="videoDetails">{{$item.desc}}</p>
								<div class="videoBottom fix">
									{{if $item.address}}
									<span class="left"><img src="/resource/m/images/common/icon_location2.png" />{{$item.address}}</span>
									{{/if}}
									<p class="right">
										<span class="check">
											<img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass">{{$item.show_num}}</i>
										</span>&nbsp;&nbsp;
										<span class="like">
											<img class="icon_like" src="/resource/m/images/user/icon_faq_detail3.png" /><i class="Iclass" title="收藏数">{{$item.collection_num}}</i>
										</span>&nbsp;&nbsp;
										<span class="review" title="评论">
											<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">{{$item.response_num}}</i>
										</span>
									</p>
								</div>
							</a>
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
	                	<img class="default_bg" src="/resource/m/images/user/defaul_faqs_bg.png"/>
	                    <div class="bg3">
	                        <div class="text">这里暂时没有内容噢<br />快去增加收藏吧！</div>
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
	<script src="/resource/m/js/pulldownscroll.js" title="移动端下拉 底部触发增加信息"></script>
</body>
</html>