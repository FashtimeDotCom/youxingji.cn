 <!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>热门作品_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>
<body>
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
        <div class="m-hot">
            <h3 class="g-tit1">热门作品区</h3>
            <div class="m-imgtxt2 swiper-container">
                <div class="swiper-wrapper">
                    {{foreach from=$list item=v}}
                    <div class="swiper-slide">
                        <a href="{{$v.pics}}" class="fancybox" data-title="<p><span>作品：</span>{{$v.title}}</p><p><span>作者：</span> {{$v.name}}</p><p><span>尺寸：</span> {{$v.size}}</p><p><span>写生地点：</span> {{$v.place}}</p>">
                            <div class="pic"><img src="{{$v.thumbpic}}" alt=""></div>
                            <div class="txt">
                                <p><span>作品：</span>{{$v.title}}</p>
                                <p><span>作者：</span> {{$v.name}}</p>
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
        var swiper1 = new Swiper('.m-works .picbox', {
            slidesPerView: 2.5
        });
        var swiper2 = new Swiper('.m-imgtxt2', {
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