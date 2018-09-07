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
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="cur">
            <div class="wp">
                首页 &gt; <span>{{$nav.name}}</span>
            </div>
        </div>
        <div class="wp">
            <div class="m-con-lb2 other">
                <div class="col-l">
                    <ul class="ul-snav snav2">
                        {{vplist from='channel' channel='footer' item='vo'}}
                        <li {{if $vo.id == $nav.id}}class="on"{{/if}}>
                            <a href="{{$vo.url}}" class="items">
        						<span>{{$vo.name}}</span>
        					</a>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-txt-lb2">
                        <h3 class="tit"><span>{{$nav.name}}</span></h3>
                        <div class="con">
                          	{{if $nav.id == 12}}
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=reg";
                                </script>
                          	{{/if}}
                          	{{if $nav.id == 15}}
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=ryt";
                                </script>
                          	{{/if}}
                          	{{if $nav.id == 16}}
                          		<script>
                                  	window.location.href = "/index.php?m=index&c=index&v=journey";
                                </script>
                          	{{/if}}
                            {{$nav.body}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
</body>
</html>