<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人视频_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/css/public.css" />
    <style type="text/css">
		/*精选主题*/
		.PopularChoice{width: 1200px;height: 446px;margin: 0 auto;padding-top: 29px;}
		.PopularChoice .title{font-size: 35px;color: #333;line-height: 87px;}
		
		.PopularChoice .chunk{width: 100%;}
		.PopularChoice .chunk .box{width: 380px;float: left;margin-right: 30px;position: relative;}
		.PopularChoice .chunk .box:last-child{margin-right: 0;}
		.PopularChoice .chunk .box .picture{width: 380px;height: 200px;border-radius: 3px;margin-bottom: 12px;}
		.PopularChoice .chunk .box .name{color: #fff;text-align: center;position: absolute;top:35%;width: 100%;font-size: 20px;}
		.PopularChoice .chunk .box .describe{text-align: justify;font-size: 14px;color: #333;line-height: 30px;}

		/*视频列表*/
					/*标题*/
		.ul-link1-hlg li a{font-size: 22px;}
		.ul-link1-hlg li.on a{color: #c92d42!important;background: transparent;}
					
		.ul-list1-hlg .pic a{height: 100%;}
		
		.ul-list1-hlg .txt{margin-top: -60px;}
		.ul-list1-hlg .top .por{border: 3px #fff solid;}
		.ul-list1-hlg .top .desc{padding-top: 6px;}
		.ul-list1-hlg .top .p1 a{width: 100%;height: 100%;color: #333;}
		.ul-list1-hlg .top .p1 a:hover{color: #333;}
					/*点赞*/		
		.ul-list1-hlg .num div{display:inline-block;font-size:14px;color:#333;text-align:center;width:50%;line-height:46px}
		.ul-list1-hlg .num div+div{border-left:1px solid #e4e4e4;}
		.ul-list1-hlg .num div.zan a{display: block;width: 100%;height: 100%;}
		.ul-list1-hlg .num div em{display:inline-block;width:20px;height:20px;vertical-align:middle;margin-right:6px}
		.ul-list1-hlg .num div.eye em{background: url(../resource/images/icon11-qm.png) no-repeat center center;}
		.ul-list1-hlg .num div.zan em{background: url(../resource/images/icon12-qm.png) no-repeat center center;}
		.ul-list1-hlg .num div.one em{background-image:url(../resource/images/icon12-1-qm.png);}
    </style>
</head>
<body onkeydown="on_return();">
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='tvslide'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}

      	<!--精选主题-->
      	<div class="PopularChoice">
      		<p class="title">精选主题</p>
      		<div class="chunk swiper-container" id="bannerSwiper1">
				<div class="swiper-wrapper">
                    {{foreach from=$key_list item=item key=key}}
                    <div class="swiper-slide box">
                        <a class="dis_block fix" href="/index.php?m=index&c=index&v=tv&keyword={{$item.keyword}}">
                            <div class="picture figure" style="background-image: url({{$item.thumbfile}});"></div>
                            <p class="name">{{$item.keyword}}</p>
                            <p class="describe omit lineNumber2 whiteSpace">{{$item.title}}</p>
                        </a>
                    </div>
                    {{/foreach}}
				</div>
			</div>
		</div>
        
        <!--加入我们-->
        <div class="m-contact">
            <img src="/resource/images/pic2-2-hlg.jpg" alt="" />
            <div class="txt"><a href="/article/jrwm">加入我们</a></div>
        </div>
        
        <!--视频列表-->
        <input type="hidden" name="uid" id="uid" data-type="2" value="" />
		<input type="hidden" id="UniqueValue" data-sign="his" data-length="50" value="tv_num" title="共用JS区分的唯一必须值" />
        <div class="row-g2" id="tags" style="padding-top: 40px;">
            <div class="wp m-atten-lb">
                <ul class="ul-link1-hlg">
                    <li {{if $type==1}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=tv&type=1">最新发布</a></li>
                    <li {{if $type==2}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=tv&type=2">最多点击</a></li>
                </ul>
                <ul class="ul-list1-hlg">
                    {{foreach from=$list item=vo}}
                    <li><div class="con">
                            <div class="pic" style="height: 235px;">
                                <a class="dis_block figure" href="/index.php?m=index&c=index&v=tv_detail&id={{$vo.id}}" style="background-image: url({{$vo.pics}});">
	                                <span class="start"></span>
	                            </a>
                            </div>
                            <div class="txt">
                                <div class="top">
                                    <div class="name">
                                        <a class="figure por" href="/index.php?m=index&c=muser&v=tv&id={{$vo.uid}}" style="background-image: url({{$vo.headpic}});"></a>
                                        <div class="desc">
                                            <h3 class="apostrophe">{{$vo.title}}</h3>
                                            <p class="time">{{$vo.addtime|date_format:'%Y-%m-%d'}}</p>
                                        </div>
                                    </div>
                                    <p class="p1"><a class="dis_block omit lineNumber4 whiteSpace" href="/index.php?m=index&c=index&v=tv_detail&id={{$vo.id}}">{{$vo.describes}}</a></p>
                                </div>
                                <div class="num">
                                    <div class="eye"><em></em>{{$vo.shownum}}</div>
                                    <div class="zan" onclick="zan(this,{{$vo.id}})" data-sign="his" data-nature="list" data-val="tv_num">
                                    	<a href="javascript:;"><em></em><i class="Iclass">{{$vo.topnum}}</i></a>
                                    </div>
                                </div>
                            </div>
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
                        <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}#tags">{{$page.0}}</a></li>
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
    </div>
    {{include file='public/footer.tpl'}}

	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
    	//精选主题
		var swiper1 = new Swiper('#bannerSwiper1', {
				slidesPerView: 3,
				spaceBetween: 30,
				autoplay: true,//可选选项，自动滑动
				speed: 3000,
				loop: true,
			});
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
					window.location.href="/index.php?m=index&c=index&v=tv&type={{$type}}&page=" + page + "#tags";
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
    <script type="text/javascript" src="/resource/js/dianzan.js" title="点赞"></script>
</body>
</html>