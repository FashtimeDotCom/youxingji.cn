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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>玩转明信片</h3>
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
        {{vplist from='ad' item='adlist' tagname='wapmxpslide'}}
        <div class="ban">
            <a href="javascript:;">
                <img src="{{$adlist.imgurl}}" alt="" />
            </a>
        </div>
        {{/vplist}}
        <div class="m-diy">
            <h3 class="g-tit2">DIY玩转明信片<em>分享你的生活点滴</em></h3>
            <div class="picbox swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="javascript:;">
                            <div class="pic">
                                <img src="/resource/m/images/m01.jpg" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="javascript:;">
                            <div class="pic">
                                <img src="/resource/m/images/m02.jpg" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="javascript:;">
                            <div class="pic">
                                <img src="/resource/m/images/m03.jpg" alt="" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wp">
                <div class="g-text">
                    <p><i></i>明信片正面任你“随心所欲”，Do it Yourself</p>
                    <p><i></i>可以分享你的旅行足迹，也可以记录你的生活点滴</p>
                    <p><i></i>明信片背面添加你的私密话语，秘密“只对你说”</p>
                </div>
            </div>
        </div>
        <div class="m-card">
            <div class="wp">
                <h3 class="g-tit2">明信片也能开口说话<em>让你的祝福更独特</em></h3>
                <div class="pic"><a href="javascript:;"><img src="/resource/m/images/q-pic14.jpg" alt=""></a></div>
                <div class="g-text">
                    <p><i></i>让明信片开口说话，告诉TA你此刻的心情</p>
                    <p><i></i>还可录制小视频，让明信片动起来</p>
                    <p><i></i>让祝福升级，最特别的祝福，送给最特别的人</p>
                </div>
            </div>
        </div>
        <div class="m-sharebox">
            <div class="wp">
                <h3 class="g-tit2">一键分享<em>爱与思念即刻传达</em></h3>
                <div class="share">
                    <div class="bdsharebuttonbox">
                        <a href="javascript:;" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a>
                        <a href="javascript:;" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a href="javascript:;" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                        <a href="javascript:;" class="bds_fx" data-cmd="fx" title="分享到飞信"></a>
                        <a href="javascript:;" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="javascript:;" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a>
                    </div>
                </div>
                <div class="g-text">
                    <p><i></i>微信、微博、朋友圈、QQ、短信、链接均可分享</p>
                    <p><i></i>传统的暖心祝福形式，通过线上便可即刻传达</p>
                    <p><i></i>你的爱与思念，随时随地一键分享给TA</p>
                </div>
            </div>
        </div>
        <div class="m-make">
            <div class="wp">
                <h3 class="g-tit2">开始制作</h3>
                <p>扫描公众号二维码开始制作属于你的个人明信片</p>
                <div class="pic"><img src="/resource/m/images/q-pic15.jpg" alt="" /></div>
                <a href="http://diy.playpostcard.com" class="btn">快速制作</a>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}} 
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script>
        var swiper = new Swiper('.m-diy .picbox', {
            slidesPerView: 1.5
        });
    </script>
    <!-- 分享 -->
   <!--<script>
        window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdText": "",
                "bdMini": "2",
                "bdMiniList": false,
                "bdPic": "",
                "bdStyle": "0",
                "bdSize": "16"
            },
            "share": {}
        };
        with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>-->
</body>

</html>