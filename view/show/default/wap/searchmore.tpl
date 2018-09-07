<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>搜索结果_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{$journey.keywords}}" />
    <meta name="keywords" content="{{$journey.description}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>搜索结果</h3>
    </div>
    <div class="mian" style="margin-top: 55px;">
        <div class="g-top" style="width: 100%;">
            <span style="line-height:45px;padding: 0px 10px;color: #8B8B8B;">以下是为您找到“{{$keyword}}”相关结果{{$num}}条</span>
        </div>
      	<!--日阅潭-->
      	{{if $type == 'ryt'}}
        <div class="wp wryt lis">
            {{foreach from=$list item=vo}}
            <li>
              <div class="flt1">
                <a href="/index.php?m=wap&c=index&v=rytdetai&id={{$vo.id}}" target="_blank" style="margin-bottom: 0px;"><img src="{{$vo.pics}}" style="width:75px;height:55px"></a>
              </div>
              <div class="ct-text">
                <a href="/index.php?m=wap&c=index&v=rytdetai&id={{$vo.id}}" target="_blank">{{$vo.title}}</a>
                <ul class="seg-info-list clearfix">
                  <span>浏览({{$vo.shownum}})</span><span> {{$vo.addtime}}</span>
                </ul>
              </div>
            </li>
            {{/foreach}}
      	</div>
      	{{/if}}
      	<!--达人邦-->
      	{{if $type == 'star'}}
      	<div class="wp wryt lis">
            <div class="travel-notes _j_search_section" data-category="info">
              <ul>
                {{foreach from=$list item=vo}}
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
      	<!--旅拍TV-->
      	{{if $type == 'tv'}}
      	<div class="wp wryt lis">
            <div class="travel-notes _j_search_section" data-category="info">
              <ul>
                {{foreach from=$list item=vo}}
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
      	{{if $type == 'writer'}}
      	<div class="wp wryt lis">
            {{foreach from=$list item=vo}}
            <li>
              <div class="flt1">
                <a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}" target="_blank" style="margin-bottom: 0px;"><img src="{{$vo.pics}}" style="width:75px;"></a>
              </div>
              <div class="ct-text">
                <a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}" target="_blank">{{$vo.name}}</a>
                <p>{{$vo.introduction}}</p>
              </div>
            </li>
            {{/foreach}}
         </div>
        {{/if}}
      	{{if $type == 'user'}}
        <div class="wp wryt lis">
          <!--用户-->
          <div class="_j_search_section" data-category="user">
            <ul class="user-list-row">
              {{foreach from=$list item=vo}}
              <li>
                <span class="avatar"><a href="{{$vo.uid|helper:'mhref'}}" target="_blank" class="_j_search_link"><img src="{{$vo.avatar}}" title="{{$vo.username}}" style="width:45px;height:45px;"></a></span>
                <div class="base">
                  <span class="name"><a href="{{$vo.uid|helper:'mhref'}}" target="_blank" class="_j_search_link">{{$vo.username}}</a></span>
                  <a class="grade" href="{{$vo.uid|helper:'mhref'}}">{{$vo.lvname}}</a>
                </div>
                <div class="nums">
                  <a href="/index.php?m=wap&c=muser&v=follow&id={{$vo.uid}}" target="_blank" class="_j_search_link">关注：{{$vo.uid|helper:'follownum'}}</a>
                  <a href="/index.php?m=wap&c=muser&v=fans&id={{$vo.uid}}" target="_blank" class="_j_search_link">粉丝：{{$vo.uid|helper:'fansnum'}}</a>
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
      	{{if $multipage}}
        <div class="pages" style="margin-top:20px;margin-bottom:20px;">
          <ul>
            {{foreach from=$multipage item=page}}
            <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
            {{/foreach}}
          </ul>
        </div>
        {{/if}}
    </div>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script type="text/javascript">
        function follows(bid, obj)
        {
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    $(obj).html('已关注');
                }else if(data.status == 2){
                    $(obj).html('<b>+</b> 关注');
                }
            },"JSON");
        }
    </script>
</body>

</html>