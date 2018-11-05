<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>TA的旅拍TV_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
        .write {position: absolute;bottom: 0px;right: 10px;z-index: 9999;}
        .write a{display:inline-block;background-repeat:no-repeat;-webkit-transition:.3s;-o-transition:.3s;transition:.3s}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>TA的旅拍TV</h3>
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
        <div class="ban"><a href=""><img src="{{$muser.cover}}" alt=""></a></div>
        <div class="row-TV">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul><li><a href="/index.php?m=wap&c=muser&v=index&id={{$muser.uid}}">TA的日志</a></li>
                        <li><a href="/index.php?m=wap&c=muser&v=album&id={{$muser.uid}}">TA的相册</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=muser&v=tv&id={{$muser.uid}}">TA的视频</a></li>
                    </ul>
                </div>
            </div>
            <div class="m-myinfo-yz">
                <a href="" class="myimg"><img src="{{$muser.avatar}}" alt=""></a>
                <div class="name">{{$muser.username}}</div>
                <div class="info1">
                    <span class="s1">等级：<b>{{$muser.lvname}}</b></span><i></i>
                    <span class="s2">现居：{{$muser.city}}</span>
                </div>
                <div class="btn">
                    <a href="javascript:;" class="guanzhu" onclick="follows({{$muser.uid}},this)">{{$muser.uid|helper:'isfollows'}}</a>
                    <a href="javascript:;" class="mm" onclick="smg({{$muser.uid}})">私信</a>
                </div>
                <div class="info2">{{$muser.autograph}}</div>
                <ul class="ul-txt-yz">
                    <li><a href="/index.php?m=wap&c=muser&v=follow&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'follownum'}}</span>关注</a></li>
                    <li class="bd"><a href="/index.php?m=wap&c=muser&v=fans&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'fansnum'}}</span>粉丝</a></li>
                    <li><a href="/index.php?m=wap&c=muser&v=visitor&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'visitor'}}</span>访客</a></li>
                </ul>
            </div>
            {{if $list}}
            <div class="m-mytv-yz">
                {{foreach from=$list item=vo}}
                <div class="item">
                    <div class="wp">
                        <div class="date">{{$vo.days}}</div>
                        <ul class="ul-pic1-yz ul-pic1-yz2">
                            {{foreach from=$vo.list item=v}}
                            <li class="tv_t{{$v.id}}" style="position: relative;">
                                <a href="javascript:;" class="pic js-video" data-src="{{$v.url}}"  data-id="{{$v.id}}">
                                    <img src="{{$v.pics}}" alt="">
                                    <span class="bo"></span>
                                    <span class="txt">{{$v.title}}</span>
                                </a>
                            </li>
                            {{/foreach}}
                        </ul>
                    </div>
                </div>
                {{/foreach}}
            </div>
            {{/if}}
            {{if $multipage}}
            <div class="pages" style="padding-top: 20px;padding-bottom: 20px;">
                <ul>{{foreach from=$multipage item=page}}
                    <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                    {{/foreach}}
                </ul>
            </div>
            {{/if}}
        </div>
        
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz"><div class="con"><div class="close js-close"><span></span></div></div></div>
        <!-- end -->
    </div>
    {{include file='wap/footer.tpl'}} 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
    <script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
</body>
</html>