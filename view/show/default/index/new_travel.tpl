<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>达人日志_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
	<meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/css/module.css" />
	<link rel="stylesheet" href="/resource/css/module-less.css" />
	<link rel="stylesheet" href="/resource/css/style.css" />
	<script src="/resource/lightbox/jquery.min.js"></script>
	<script src="/resource/js/lib.js"></script>
	<!--lightbox开始-->
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.lightbox').lightbox();
		});
	</script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/new_travel.css" />
</head>
<body onkeydown="on_return();">
	{{include file='public/header.tpl'}}
	<div class="main">
		{{vplist from='ad' item='adlist' tagname='pc_new_star'}}
		<div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
		{{/vplist}}
		<div class="cur"><div class="wp"><a href="/">首页</a> &gt; <span>达人日志{{if $keyword}}【{{$keyword}}】{{/if}}</span></div></div>
		<div class="wp">
			<div class="m-master-qm">
				<!--左侧列表-->
				<div class="col-l col_l">
					<div class="menu fix">
						<a class="button {{if $type==1}}onn{{/if}}" href="/index.php?m=index&c=travel&v=travel_list&type=1">最新旅行日志</a>
						<a class="button {{if $type==2}}onn{{/if}}" href="/index.php?m=index&c=travel&v=travel_list&type=2">热门旅行日志</a>
						<a class="ReleaseLog" href="/index.php?m=index&c=user&v=addtravel">发布旅行日志</a>
					</div>
					
					<input type="hidden" name="uid" id="uid" data-type="1" value="" />
					<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="travel_num" title="共用JS区分的唯一必须值" />
					<div class="con">
						<ul class="ul-imgtxt2-qm list_v">
							{{foreach from=$list item=vo}}
							<li><div class="top">
									<div class="left">
										<a class="profilePhoto figure borderRadius50" href="{{$vo.uid|helper:'href'}}" target="_blank" style="background-image: url({{$vo.uid|helper:'avatar'}});"></a>
										<a class="botton dis_block" href="javascript:;" onclick="follows({{$vo.uid}},this)">{{$item.uid|helper:'isfollows'}}</a>
									</div>
										
									<div class="txt p_btn">
										<div class="tit">
											<span>{{$vo.addtime}}</span>
											<h3><a href="{{$vo.uid|helper:'href'}}"target="_blank">{{$vo.uid|helper:'username'}}</a></h3>
										</div>
										<p><a class="dis_block omit lineNumber3 whiteSpace" href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">{{$vo.describes}}</a></p>
										{{if $vo.picnum==2 || $vo.picnum==4 || $vo.picnum==6 }}
										<style type="text/css">
											{{if $vo.picnum==2 }}
											.ddClass{{$vo.id}} a{height: 205.5px!important;}
											{{/if}}
											{{if $vo.picnum==4 }}
											.ddClass{{$vo.id}} a{height: 199.5px!important;}
											{{/if}}
											.ddClass{{$vo.id}}{width: 49.375%;}
											.ddClass{{$vo.id}}:nth-of-type(2){margin-right: 0!important;}
											.ddClass{{$vo.id}}:nth-of-type(4){margin-right: 0!important;}
											.ddClass{{$vo.id}}:nth-of-type(6){margin-right: 0!important;}
										</style>
										{{else}}
										<style type="text/css">
											.ddClass{{$vo.id}}{width: 32.5%;}
											.ddClass{{$vo.id}}:nth-of-type(3){margin-right: 0!important;}
											.ddClass{{$vo.id}}:nth-of-type(6){margin-right: 0!important;}
											.ddClass{{$vo.id}}:nth-of-type(9){margin-right: 0!important;}
										{{/if}}
										</style>
										<dl>{{foreach from=$vo.content item=v}}
											<dd class="ddClass{{$vo.id}}">
												<a class="lightbox figure" href="{{$v}}" rel="list{{$vo.id}}" style="background-image: url({{$v}});"></a>
											</dd>
											{{/foreach}}
										</dl>
										<div class="location">
											{{if $vo.address}}
											<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
											<i class="Iclass">{{$vo.address}}</i>
											{{/if}}
										</div>
									</div>
								</div>
								<div class="bottom">
									<div class="hideed" onclick="collect({{$vo.id}})">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">收藏</i></a>
									</div>
									<div class="theory">
										<a href="/index.php?m=index&c=travel&v=travel_detail&id={{$vo.id}}">
											<em class="smallIcon"></em><i class="Iclass">评论</i>
										</a>
									</div>
									<div class="zan" onclick="zan(this,{{$vo.id}})" data-sign="his" data-nature="list" data-val="travel_num">
										<a href="javascript:;"><em class="smallIcon"></em><i class="Iclass">{{$vo.topnum}}</i></a>
									</div>
									<div class="look"><em class="smallIcon"></em><i class="Iclass">{{$vo.shownum}}</i></div>
								</div>
							</li>
							{{/foreach}}
						</ul>

						<!-- 页码 -->
						{{if $multipage}}
						<div class="pages">
							<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
							<ul>
								{{foreach from=$multipage item=page}}
								<li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}&type={{$type}}">{{$page.0}}</a></li>
								{{/foreach}}
								<li class="pages-form">
									到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
									<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
								</li>
							</ul>
						</div>
						{{/if}}
						<!-- 页码 end-->
					</div>
				</div>
				
				<!--右侧内容-->
				<div class="col-r col_r">
					{{if $tjstar.0.username}}
					<h3 class="g-tit1-qm">本周推荐达人</h3>
					<div class="m-pic1-qm">
						<div class="pic">
							<a href="{{$tjstar.0.uid|helper:'href'}}"><img src="{{$tjstar.0.avatar}}" alt=""></a>
						</div>
						<span>{{$tjstar.0.username}}</span>
						<p class="whiteSpace" style="text-align: justify;">{{$tjstar.0.autograph}}</p>
					</div>
					{{/if}}
					
					<!--广告-->
					<div class="box figure borderRadius" style="background-image: url(/uploadfile/image/20181023/154028012224029.jpg);"></div>
					
					<h3 class="g-tit1-qm">热门旅游地</h3>
					<ul class="ul-imgtxt1-qm">
						{{foreach from=$tourismlist item=vo}}
						<li>
							<a href="/index.php?m=index&c=index&v=star&keyword={{$vo.keyword}}">
								<div class="pic">
									<img src="{{$vo.pics}}" alt="">
									<span>{{$vo.title}}</span>
								</div>
							</a>
						</li>
						{{/foreach}}
					</ul>
				</div>
			</div>
		</div>
		<div class="h81"></div>
	</div>
	
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script type="text/javascript">
		var total_page = parseInt($("#total_page").text());                       //总页数
		//监控 页面内容输入框 ，包括粘贴板
		function judgeIsNonNull2(event){
			var value=$("#pages").val();
			$("#pages").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)

			if(value !== ""){
				var res = /[\、\…\.\．\·\•\'\,\，\。\×\_\＿\-\−\－\—\ˉ\ˇ\々\＇\｀\‘\’\“\”\〃\¨\"\＂\｜\|\‖\(\)\（\）\〔\〕\<\>\〈\〉\《\》\「\」\『\』\〖\〗\【\】\［\］\[\]\{\}\｛\｝\/\*\＊\?\？\^\＾\+\＋\=\＝\÷\¥\￥\#\＃\@\＠\!\！\`\~\～\%\％\∶\:\：\;\；\&\＆\$\＄\£\￡\€\°\°C\°F\←\↑\→\↓\／\＼\\]/g;
				if( res.test(value) ){
					$("#pages").val(value.replace(res,""));
					return false;
				}
		   	}
		}
		
		//监控 页面内容输入框 ，包括粘贴板
		$("#pages").bind('input propertychange', function(){
			judgeIsNonNull2(event);
		});
    	
    	//确定   跳转页面
        function check(){
            var page = $('#pages').val();
            var cur_page = $(".pages .on a").text();   //当前页
            if(page){
            	if (page>total_page || page<1) {
					layer.msg("不在页数范围内!");
					return false;
				}
				if( cur_page == page ){
					layer.msg("该页码已经是当前页!");
					return false;
				}
				else{
					window.location.href="/index.php?m=index&c=travel&v=travel_list&type={{$type}}&page=" + page + "#tags";
				}
            }
        }
        
        //敲回车 跳转页面
		function on_return(){
			if(window.event.keyCode == 13){
				if(document.all('pageqr') != null) {
					document.all('pageqr').click();
				}
			}
		}
	</script>
	<script type="text/javascript" src="/resource/js/collect.js" title="收藏、关注、私信"></script>
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>