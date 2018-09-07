<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>玩转明信片_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
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
        {{vplist from='ad' item='adlist' tagname='mxpslide'}}
        <div class="ban s2">
        	<img src="{{$adlist.imgurl}}"/>
        </div>
      	{{/vplist}}
        <div class="cur wow fadeInUp">
            <div class="wp">
                <a href="">首页</a> &gt; <span>玩转明信片</span>
            </div>
        </div>
        <div class="m-diy-qm wow fadeInUp">
            <div class="wp">
                <div class="pic"><a href=""><img src="/resource/images/pic1-qm.png" alt=""></a></div>
                <div class="text-qm">
                    <h3>DIY玩转明信片<em>分享你的生活点滴</em></h3>
                    <p><i></i>明信片正面任你“随心所欲”，Do it Yourself</p>
                    <p><i></i>可以分享你的旅行足迹，也可以记录你的生活点滴</p>
                    <p><i></i>明信片背面添加你的私密话语，秘密“只对你说”</p>
                </div>
            </div>
        </div>
        <div class="m-card-qm  wow fadeInUp" style="background-image: url(/resource/images/pic12-qm.jpg);">
            <div class="wp">
                <div class="pic"><a href=""><img src="/resource/images/pic2-qm.png" alt=""></a></div>
                <div class="text-qm">
                    <h3>明信片也能开口说话<em>让你的祝福更独特</em></h3>
                    <p><i></i>让明信片开口说话，告诉TA你此刻的心情</p>
                    <p><i></i>还可录制小视频，让明信片动起来</p>
                    <p><i></i>让祝福升级，最特别的祝福，送给最特别的人</p>
                </div>
            </div>
        </div>
        <div class="m-share-qm wow fadeInUp">
            <div class="wp">
                <div class="pic"><a href=""><img src="/resource/images/pic3-qm.png" alt=""></a></div>
                <div class="text-qm">
                    <h3>一键分享<em>爱与思念即刻传达</em></h3>
                    <p><i></i>微信、微博、朋友圈、QQ、短信、链接均可分享</p>
                    <p><i></i>传统的暖心祝福形式，通过线上便可即刻传达</p>
                    <p><i></i>你的爱与思念，随时随地一键分享给TA</p>
                </div>
            </div>
        </div>
        <div class="m-make-qm wow fadeInUp" style="background-image: url(/resource/images/pic13-qm.jpg);">
            <div class="wp">
                <h3>开始制作</h3>
                <div class="left">
                    <img src="/resource/images/pic14-xcx.jpg" alt="">
                </div>
                <div class="right">
                    <img src="/resource/images/pic15-qm.jpg" alt="">
                </div>
                <div class="middle">
                    <p>扫描小程序二维码和公众号二维码<br>开始制作属于你的个人明信片</p>
                    <div class="bot">
                        <a href="javascript:;" class="a1">玩转明信片小程序</a>
                        <a href="javascript:;" class="a2">玩转明信片公众号</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
</body>

</html>