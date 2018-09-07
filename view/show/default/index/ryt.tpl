<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人游记_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='rytslide'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur">
            <div class="wp">
                <a href="">首页</a> &gt; <span>达人游记</span>
            </div>
        </div>
        <div class="m-read-qm">
            <div class="tit">
                <div class="wp">
                    <div class="con">
                        <h3><span>{{$y}}</span><i></i></h3>
                        <dl>
                            <dd><a href="/index.php?m=index&c=index&v=ryt&y=2018">2018</a></dd>
                        </dl>
                    </div>
                    <span class="data">{{$y}}</span>
                </div>
            </div>
            <div class="wp">
                <ul class="ul-txt1-qm TAB_CLICK" id=".tabcon">
                    {{foreach from=$list item=vo key=k}}
                        {{if $year == $y}}
                            {{if $month >= $k}}
                                <li class="ls {{if $month == $k}}on{{/if}}"><a href="javascript:;">{{$k}}</a></li>
                            {{else}}
                                <li class="no"><a href="javascript:;">{{$k}}</a></li>
                            {{/if}}
                        {{else}}
                            <li class="ls {{if $k == 1}}on{{/if}}"><a href="javascript:;">{{$k}}</a></li>
                        {{/if}}
                    {{/foreach}}
                </ul>
            </div>
            {{foreach from=$list item=vo key=k}}
                {{if $year == $y}}
                <div class="tabcon {{if $month != $k}}dn{{/if}}">
                {{else}}
                <div class="tabcon {{if $k != 1}}dn{{/if}}">
                {{/if}}
                    <div class="top">
                        <div class="wp">
                            <span class="s1">SUN</span>
                            <span class="s2">MON</span>
                            <span class="s3">TUE</span>
                            <span class="s4">WED</span>
                            <span class="s5">THU</span>
                            <span class="s6">FRI</span>
                            <span class="s7">SAT</span>
                        </div>
                    </div>
                    <div class="wp">
                        <ul class="ul-imgtxt3-qm">
                            {{foreach from=$vo.table item=v key=k}}
                            <li>
                                <div class="pic"></div>
                            </li>
                            {{/foreach}}
                            {{foreach from=$vo.time item=v key=k}}
                                {{if $v.status == 0}}
                                    <li>
                                        <div class="pic">
                                            <i class="icon1">{{$v.days}}</i>
                                        </div>
                                    </li>
                                {{else}}
                                    <li>
                                        <div class="pic">
                                            <a href="/index.php?m=index&c=index&v=rytdetai&id={{$v.id}}">
                                            <img src="{{$v.pics}}" alt="">
                                            <i>{{$v.days}}</i>
                                            <div class="txt">
                                                <span>{{$v.keyword}}</span>
                                            </div>
                                        </a>
                                        </div>
                                    </li>
                                {{/if}}
                            {{/foreach}}
                            {{foreach from=$vo.other item=v key=k}}
                            <li>
                                <div class="pic"></div>
                            </li>
                            {{/foreach}}
                        </ul>
                    </div>
                </div>
            {{/foreach}}
        </div>
        <div class="h81"></div>
    </div>
    {{include file='public/footer.tpl'}}
    <script>
        $(".m-read-qm .con h3").click(function() {
            $(this).next("dl").stop().slideToggle("fast");
        })
    </script>
</body>

</html>