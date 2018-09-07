<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>作家列表_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>游画</h3>
    </div>
    <div class="mian" style="padding-bottom: 29px;margin-bottom: 12px;">
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
        {{vplist from='ad' item='adlist' tagname='wapscenerylide'}}
        <div class="ban">
            <a href="javascript:;">
                <img src="{{$adlist.imgurl}}" alt="" />
            </a>
        </div>
        {{/vplist}}
        <ul class="ul-imgtxt6">
            {{foreach from=$list item=vo}}
            <li>
                <div class="pic"><a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}"><img src="{{$vo.pics}}" alt="" /></a></div>
                <div class="txt">
                    <h3><a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}">{{$vo.name}}</a></h3>
                    <span>个人简介</span>
                    <p>{{$vo.introduction}}【<a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}">查看详细</a>】</p>
                </div>
            </li>
            {{/foreach}}
        </ul>
        {{if $multipage}}
        <div class="pages">
            <ul>
                {{foreach from=$multipage item=page}}
                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                {{/foreach}}
            </ul>
        </div>
        {{/if}}
    </div>
    {{include file='wap/footer.tpl'}}
</body>

</html>