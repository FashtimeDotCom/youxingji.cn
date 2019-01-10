<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人游记_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/public.css" />
	<link rel="stylesheet" href="/resource/css/notelist.css" />
</head>
<body onkeydown="on_return();">
    {{include file='public/header.tpl'}} 
    <div class="main">
        <!--精选文章-->
    	<div class="theDayArticle swiper-container" id="ArticleSwiper">
    		<div class="swiper-wrapper">
				{{foreach from=$tj_list item=item key=key}}
				<a class="figure borderRadius swiper-slide poster" href="{{if $item.type==1}}/index.php?m=index&c=index&v=rytdetai&id={{$item.id}}{{else}}/index.php?m=index&c=index&v=traveldetai&id={{$item.id}}{{/if}}" style="background-image: url({{$item.top_pic}});" title="海报/封面">
					<div class="mantra">
						<span class="time">{{$item.showtime}}</span>
						<span class="describe">{{$item.title}}</span>
					</div>
				</a>
				{{/foreach}}
    		</div>
    	</div>

        <div class="cur"><div class="wp"><a href="">首页</a> &gt; <span>达人游记</span></div></div>
        
        <!--年份-->
        <div class="m-read-qm m_read_qm">
            <div class="tit">
                <div class="wp">
                    <div class="con">
                        <h3><span>{{$date_info.now.y}}</span><i></i></h3>
                        <dl><dd><a href="/index.php?m=index&c=travelnote&v=note_list&y=2018">2018</a></dd>
                        	<dd><a href="/index.php?m=index&c=travelnote&v=note_list&y=2019">2019</a></dd>
                        </dl>
                    </div>
                    <span class="data"><i id="monthNum">{{$date_info.now.m}}</i> / <i id="yearNum">{{$date_info.now.y}}</i></span>
                </div>
            </div>
        </div>
        
        <!--月份-->
        <div class="month">
            <ul class="ul_txt1_qm">
				{{foreach from=$date_info.months item=item key=key}}
					<li class="{{$item}}" data-monthNum="{{$key}}">
						<a onclick="turn_page(1,{{$date_info.now.y}},{{$key}},2)" href="javascript:;">{{$key}}月</a>
					</li>
				{{/foreach}}
            </ul>
        </div>

        <!--文章列表-->
        <input type="hidden" name="cur_page" id="cur_page" value="1">
        <div class="ArticleList">
        	<div class="bigbos">
        		<div class="box fix">
					{{foreach from=$list key=key item=item}}
					<div class="module fix">
						<a class="figure left poster borderRadius" href="javascript:void(0)" style="background-image: url({{$item.top_pic}});" title="海报/封面"></a>
						<div class="right">
							<a class="dis_block" href="{{if $item.type==1}}/index.php?m=index&c=index&v=rytdetai&id={{$item.id}}{{else}}/index.php?m=index&c=index&v=traveldetai&id={{$item.id}}{{/if}}">
								<p class="title apostrophe">{{$item.title}}</p>
								<span class="time">{{$item.showtime}}</span>
								<p class="describe omit lineNumber4 whiteSpace">{{$item.summary}}</p>
							</a>
							<div class="diamonds">
								{{if $item.address}}
								<div class="location">
									<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>
									<i class="Iclass">{{$item.address}}</i>
								</div>
								{{/if}}
								<span style="float:left;">BY&nbsp;&nbsp;</span>
								<a class="headPortrait" href="{{if $item.type==2}}/index.php?m=index&c=muser&v=index&id={{$item.uid}}{{else}}javascript:;{{/if}}" style="background-image: url({{$item.headpic}});"></a>
								&nbsp;&nbsp;<a class="name" href="{{if $item.type==2}}/index.php?m=index&c=muser&v=index&id={{$item.uid}}{{else}}javascript:;{{/if}}">{{$item.username}}</a>
								<span class="shownum"><i class="Iclass">{{$item.shownum}}</i>次浏览</span>
							</div>
						</div>
						<a class="seeMore" href="{{if $item.type==1}}/index.php?m=index&c=index&v=rytdetai&id={{$item.id}}{{else}}/index.php?m=index&c=index&v=traveldetai&id={{$item.id}}{{/if}}">查看更多</a>
					</div>
					{{/foreach}}
	        	</div>
        		<p class="tips"></p>
        	</div>

			<!-- 页码 -->
			<div class="pagination">
				{{if $multipage}}
				<div class="pages">
					<div class="amount">共<i class="Iclass" id="total_page">{{$page_info.total_page}}</i>页 / <i class="Iclass">{{$page_info.num}}</i>条</div>
					<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page('pre')" data-val="上一页"></a></li>

						{{foreach from=$multipage item=page}}
						<li class="li_{{$page.0}} {{if $page.2}}{{$page.2}} {{/if}} li">
							<a href="javascript:;" onclick="turn_page('{{$page.0}}')" data-val="{{$page.0}}">{{$page.0}}</a>
						</li>
						{{/foreach}}

						<li class="pages-next"><a href="javascript:;" onclick="turn_page('next')">下一页<i></i></a></li>

						<li class="pages-form">
							到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页
							<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" />
						</li>
					</ul>
				</div>
				{{/if}}
			</div>
			<!-- 页码 end-->
       </div>
    </div>
    {{include file='public/footer.tpl'}}
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/js/notelist.js"></script>
</body>
</html>