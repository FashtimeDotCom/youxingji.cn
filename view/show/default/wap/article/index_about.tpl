<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$nav.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="keywords" content="{{$nav.keywords}}" />
    <meta name="description" content="{{$nav.description}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>关于我们</h3>
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
        <div class="ban">
            <a href="">
            <img src="/resource/m/images/q-ban1.jpg" alt="" />
        </a>
        </div>
        <div class="m-txt1">
            <div class="wp">
                <ul class="ul-txt1">
                    {{vplist from='channel' channel='footer' item='vo'}}
                    <li {{if $vo.id == $nav.id}}class="on"{{/if}}><a href="{{$vo.url}}">{{$vo.name}}</a></li>
                    {{/vplist}}
                </ul>
            </div>
        </div>
        <div class="m-text1">
            <div class="wp">
                <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">{{$nav.name}}</h4>
            </div>
            <div class="txt">
                {{if $nav.id == 12}}
                    <script>
                        window.location.href = "/index.php?m=wap&c=index&v=reg";
                    </script>
                {{/if}}
                {{if $nav.id == 15}}
                    <script>
                        window.location.href = "/index.php?m=wap&c=index&v=ryt";
                    </script>
                {{/if}}
                {{if $nav.id == 16}}
                    <script>
                        window.location.href = "/index.php?m=wap&c=index&v=journey";
                    </script>
                {{/if}}
                {{$nav.body}}
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}}
</body>

</html>