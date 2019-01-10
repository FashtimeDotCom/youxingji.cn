<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>搜索结果_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{$journey.keywords}}" />
    <meta name="keywords" content="{{$journey.description}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	a:active{ text-decoration: none; list-style-type: none; }
    	a:hover { text-decoration: none!important; list-style-type: none!important; }
		a:focus{ text-decoration: none; list-style-type: none; }
		a:focus {outline-style:none;
			-moz-outline-style: none;} 
		a:visited{ text-decoration: none; list-style-type: none; }
				
		a:active{star:expression(this.onFocus=this.blur());}
		a:focus{star:expression(this.onFocus=this.blur());}
    	
    	/*模仿朋友圈   九宫格显示    防止图片变形*/
		.figure{padding-bottom: ; /* 关键就在这里 */
				  	background-position: center;
				  	background-repeat: no-repeat;
				  	background-size: cover;}
    	/*字体超出多少行 以省略号代替  
		 * 此处 在特定的位置  加一句行数
		 * -webkit-line-clamp: 3;三列
		 * */
		.omit{display: -webkit-box!important;-webkit-box-orient: vertical;overflow: hidden;}
		.lineNumber2{-webkit-line-clamp: 2;}
		.lineNumber3{-webkit-line-clamp: 3;}
		.lineNumber4{-webkit-line-clamp: 4;}
		.lineNumber5{-webkit-line-clamp: 5;}
    	
    	
    	/*标题*/
    	.mian{margin-top: 55px;}
    	.mian .g-top{width: 100%;height:auto; padding: 10px;}
    	.mian .g-top span{line-height:20px;color: #8B8B8B;}
    	
    	/*日阅潭*/
    	.DayReadingTam li .flt1 a{margin-bottom: 0px;}
    	.DayReadingTam li .flt1 a img{width:75px;height:55px;}
    	.DayReadingTam li .ct-text a{}
    	
    	/*甄选之旅*/
    	.JourneySelection li{width: 100%!important;}
    	.JourneySelection li .flt1{margin-right: -90px;}
    	.JourneySelection li .flt1 a.preview{width:90px;height:90px;}
    	.JourneySelection li .dwn-nr{width: 100%;}
    	.JourneySelection li .dwn-nr .seg-desc{height: 60px;text-align: justify;}
    	
    	/*作家*/
    	.Writer .headPortrait{margin-bottom: 0px;width:75px;height: 75px;}
    	/*用户*/
    	.User .headPortrait{width:45px;height:45px;}
    	.fans{font-style: normal;}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>搜索结果</h3>
    </div>
    <div class="mian">
        <div class="g-top"><span>以下是为您找到“{{$keyword}}”相关结果{{$num}}条</span></div>
        
      	<!--日阅潭·游记-->
        {{if $ryt}}
        <div class="wp wryt lis DayReadingTam">
            <div class="clearfix ser-title">
              <h2><a href="javascript:;" class="_j_search_link">日阅潭</a></h2>
              <a href="/index.php?m=wap&c=index&v=searchmore&type=ryt&keyword={{$keyword}}" class="_j_search_link" data-is-redirect="1">查看更多&gt;&gt;</a>
            </div>
            {{foreach from=$ryt item=vo}}
            <li><div class="flt1">
                	<a href="/index.php?m=wap&c=index&v=rytdetai&id={{$vo.id}}" target="_blank"><img src="{{$vo.pics}}"></a>
            	</div>
            	<div class="ct-text">
                	<a class="omit lineNumber2" href="/index.php?m=wap&c=index&v=rytdetai&id={{$vo.id}}" target="_blank">{{$vo.title}}20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅20英德采风写生2天公益之旅</a>
                	<ul class="seg-info-list clearfix">
                  		<span>浏览({{$vo.shownum}})</span><span> {{$vo.addtime}}</span>
                	</ul>
            	</div>
            </li>
            {{/foreach}}
      	</div>
      	{{/if}}
      	
      	<!--独家路线·甄选之旅-->
      	{{if $journey}}
      	<div class="wp wryt lis JourneySelection">
            <div class="clearfix ser-title top">
              <h2><a href="javascript:;" class="_j_search_link">甄选之旅</a></h2>
            </div>
            {{foreach from=$journey item=vo}}
            <div class="exe-packg01">
				<ul class="clearfix">
					<li><div class="flt1">
						    <a href="/index.php?m=wap&c=index&v=journeydetail&id={{$vo.id}}" target="_blank" class="_j_search_link figure preview" style="background-image: url({{$vo.extend.tjpic}});"></a>
						</div>
						<div class="dwn-nr">
						    <p class="seg-desc">
						    	<a href="/index.php?m=wap&c=index&v=journeydetail&id={{$vo.id}}" target="_blank" class="_j_search_link omit lineNumber3">{{$vo.title}}</a>
						    </p>
						    <h5>
						    	<a href="/index.php?m=wap&c=index&v=journeydetail&id={{$vo.id}}" target="_blank" class="seg-price _j_search_link">¥{{$vo.extend.price}}元/位</a>
						    </h5>
						</div>
					</li>
				</ul>
            </div>
            {{/foreach}}
       	</div>
      	{{/if}}
      	
      	<!--达人日志-->
        {{if $star}}
      	<div class="wp wryt lis">
            <div class="clearfix ser-title top">
              <h2><a href="javascript:;" class="_j_search_link">达人日志</a></h2>
              <a href="/index.php?m=wap&c=index&v=searchmore&type=star&keyword={{$keyword}}" class="_j_search_link" data-is-redirect="1">查看更多&gt;&gt;</a>
            </div>
            <div class="travel-notes _j_search_section" data-category="info">
              <ul>
                {{foreach from=$star item=vo}}
                <li>
                  <p class="clearfix">
                    <a href="{{$vo.uid|helper:'mhref'}}" target="_blank" class="_j_search_link">{{$vo.title}}</a>
                    <span class="seg-info">{{$vo.addtime}}</span>
                    <span class="seg-info">{{$vo.uid|helper:'username'}}</span>
                    <span class="seg-info">浏览({{$vo.shownum}})</span>
                    <span class="seg-info">点赞({{$vo.topnum}})</span>
                  </p>
                </li>
                {{/foreach}}
              </ul>
            </div>
         </div>
        {{/if}}
        
      	<!--视频-->
        {{if $tv}}
      	<div class="wp wryt lis">
            <div class="clearfix ser-title top">
              <h2><a href="javascript:;" class="_j_search_link">旅拍TV</a></h2>
              <a href="/index.php?m=wap&c=index&v=searchmore&type=tv&keyword={{$keyword}}" class="_j_search_link" data-is-redirect="1">查看更多&gt;&gt;</a>
            </div>
            <div class="travel-notes _j_search_section" data-category="info">
              <ul>
                {{foreach from=$tv item=vo}}
                <li>
                  <p class="clearfix">
                    <a href="/index.php?m=wap&c=muser&v=tv&id={{$vo.uid}}" target="_blank" class="_j_search_link">{{$vo.title}}</a>
                    <span class="seg-info">{{$vo.addtime}}</span>
                    <span class="seg-info">{{$vo.uid|helper:'username'}}</span>
                    <span class="seg-info">浏览({{$vo.shownum}})</span>
                    <span class="seg-info">点赞({{$vo.topnum}})</span>
                  </p>
                </li>
                {{/foreach}}
              </ul>
            </div>
        </div>
        {{/if}}
        
      	<!--作家-->
        {{if $writer}}
      	<div class="wp wryt lis Writer">
            <div class="clearfix ser-title">
              <h2><a href="javascript:;" class="_j_search_link">作家</a></h2>
              <a href="/index.php?m=wap&c=index&v=searchmore&type=writer&keyword={{$keyword}}" class="_j_search_link" data-is-redirect="1">查看更多&gt;&gt;</a>
            </div>
            {{foreach from=$writer item=vo}}
            <li><div class="flt1">
            		<a class="figure headPortrait" href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}" target="_blank" style="background-image: url({{$vo.pics}});"></a>
            	</div>
            	<div class="ct-text">
                	<a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}" target="_blank">{{$vo.name}}</a>
                	<p>{{$vo.introduction}}</p>
            	</div>
            </li>
            {{/foreach}}
         </div>
        {{/if}}
        
        <!--达人邦·用户-->
      	{{if $userlist}}
        <div class="wp wryt lis User">
          <div class="_j_search_section" data-category="user">
            <div class="clearfix ser-title">
              <h2><a href="javascript:;" class="_j_search_link" data-is-redirect="1">用户</a></h2>
              <a href="/index.php?m=wap&c=index&v=searchmore&type=user&keyword={{$keyword}}" class="_j_search_link" data-is-redirect="1">查看更多&gt;&gt;</a>
            </div>
            <ul class="user-list-row">
              	{{foreach from=$userlist item=vo}}
              	<li><span class="avatar">
              			<a href="{{$vo.uid|helper:'mhref'}}" target="_blank" class="_j_search_link figure headPortrait" style="background-image: url({{$vo.avatar}});" title="{{$vo.username}}"></a>
              		</span>
	                <div class="base">
	                  	<span class="name"><a href="{{$vo.uid|helper:'mhref'}}" target="_blank" class="_j_search_link">{{$vo.username}}</a></span>
	                  	<a class="grade" href="{{$vo.uid|helper:'mhref'}}">{{$vo.lvname}}</a>
	                </div>
	                <div class="nums">
	                  	<a href="/index.php?m=wap&c=muser&v=follow&id={{$vo.uid}}" target="_blank" class="_j_search_link">关注：{{$vo.uid|helper:'follownum'}}</a>
	                  	<a href="/index.php?m=wap&c=muser&v=fans&id={{$vo.uid}}" target="_blank" class="_j_search_link">粉丝：<i class="fans">{{$vo.uid|helper:'fansnum'}}</i></a>
	                  	<a href="/index.php?m=wap&c=muser&v=visitor&id={{$vo.uid}}" target="_blank" class="_j_search_link">访客：{{$vo.uid|helper:'visitor'}}</a>
	                </div>
	                <div class="btns">
	                  	<a class="btn-follow _j_user_follow" href="javascript:;" onclick="follows({{$vo.uid}},this)">{{$vo.uid|helper:'isfollows'}}</a>
	                  	<a class="btn-msg _j_user_letter" href="{{$vo.uid|helper:'mhref'}}" target="_blank">私信</a>
	                </div>
              	</li>
              	{{/foreach}}
            </ul>
          </div>
        </div>
        {{/if}}
        
        <!--达人问答-->
    </div>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
   <script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】"></script>
</body>
</html>