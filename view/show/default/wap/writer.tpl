<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>作家详情_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
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
        {{vplist from='ad' item='adlist' tagname='wapscenerylide'}}
        <div class="ban">
            <a href="javascript:;">
                <img src="{{$adlist.imgurl}}" alt="" />
            </a>
        </div>
        {{/vplist}}
        <div class="m-text3">
            <div class="wp">
                <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">名家档案</h4>
                <div class="top">
                    <div class="pic"><img src="{{$writer.pics}}" alt="" /></div>
                    <span>{{$writer.name}}</span>
                </div>
                <div class="txt">
                    <p><em>个人简介：</em>{{$writer.introduction}}</p>
                </div>
            </div>
        </div>
        <div class="m-hot">
            <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">个人作品集</h4>
            <div class="m-imgtxt2 swiper-container">
                <div class="swiper-wrapper">
                	{{foreach from=$scenery item=v}}
                    <div class="swiper-slide">
                        <a href="{{$v.pics}}" class="fancybox" data-title="<p><span>作品：</span>{{$v.title}}</p><p><span>尺寸：</span> {{$v.size}}</p><p><span>写生地点：</span> {{$v.place}}</p>">
                            <div class="pic"><img src="{{$v.thumbpic}}" alt=""></div>
                            <div class="txt">
                                <p><span>作品：</span>{{$v.title}}</p>
                                <p><span>尺寸：</span> {{$v.size}}</p>
                                <p><span>写生地点：</span> {{$v.place}}</p>
                            </div>
                        </a>
                    </div>
                    {{/foreach}}
                </div>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}}
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script>
        var swiper = new Swiper('.m-imgtxt2', {
            slidesPerView: 1.5
        });
    </script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script>
        $(".fancybox").fancybox({
            wrapCSS: 'fancybox-custom',
            closeClick: false,
            openEffect: 'none',
            showCloseButton: false,
            helpers: {
                title: {
                    type: 'inside'
                }
            },
            beforeLoad: function() {
                this.title = $(this.element).data('title');
            }
        });
    </script>
</body>

</html>