<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人视频_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>达人视频</h3>
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
        {{vplist from='ad' item='adlist' tagname='waptvslide'}}
        <div class="ban">
            <a href="javascript:;">
                <img src="{{$adlist.imgurl}}" alt="" />
            </a>
        </div>
        {{/vplist}}
        <!--
        <div class="tjuser swiper-container">
            <div class="swiper-wrapper">
                {{foreach from=$tjuser item=v key=k}}
                <div class="row-peo swiper-slide">
                    <div class="wp">
                        <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">本周推荐达人</h4>
                        <div class="tx">
                            <a href="index.php?m=wap&c=muser&v=tv&id={{$v.uid}}" class="pic"><img src="{{$v.avatar}}" alt=""></a>
                            <h5><a href="{{$v.uid|helper:'mhref'}}">{{$v.username}}</a></h5>
                        </div>
                        <div class="txt">
                            <p>{{$v.autograph}}</p>
                        </div>
                    </div>
                </div>
                {{/foreach}}
            </div>
        </div>
        -->
        <div class="m-txt2">
            <div class="con swiper-container swiper-container-horizontal swiper-container-ios" style="    padding-right: 0px;">
                <div class="swiper-wrapper" style="overflow-x: scroll;">
                    <div class="swiper-slide {{if $type == ''}}swiper-slide-active{{/if}}" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&keyword={{$keyword}}">全部</a></div>
                    {{foreach from=$tagslist item=vo key=k}}
                    <div class="swiper-slide {{if $type == $k}}swiper-slide-active{{/if}}" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&type={{$k}}&keyword={{$keyword}}">{{$vo.tags}}</a></div>
                    {{/foreach}}
                </div>
            </div>
        </div>
        <div class="m-box swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <ul class="ul-imgtxt2">
                        {{foreach from=$list item=vo}}
                        <li>
                            <div class="con">
                                <div class="pic">
                                    <a href="#m-pop1-yz" class="js-video" data-src="{{$vo.url}}" data-id="{{$vo.id}}">
                                        <img src="{{$vo.pics}}" alt="" />
                                        <i></i>
                                    </a>
                                </div>
                                <div class="txt">
                                    <div class="top">
                                        <div class="img"><a href="javascript:;"><img src="{{$vo.avatar}}" alt="" /></a></div>
                                        <div class="tit">
                                            <h3><a href="javascript:;">{{$vo.title}}</a></h3>
                                            <span>{{$vo.addtime}}</span>
                                        </div>
                                    </div>
                                    <p>{{$vo.describes}}</p>
                                </div>
                            </div>
                            <div class="bot">
                                <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i>{{$vo.shownum}}</span>
                                <span class="zan" href="javascript:;" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}"><i style="background-image: url(/resource/m/images/i-zan.png)"></i>{{$vo.topnum}}</span>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
        {{if $multipage}}
        <div class="pages">
            <ul>
                {{foreach from=$multipage item=page}}
                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                {{/foreach}}
            </ul>
        </div>
        {{/if}}
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz" id="m-pop1-yz">
            <div class="con">
                <iframe src='' frameborder=0 'allowfullscreen'></iframe>
                <div class="close js-close"><span></span></div>
            </div>
        </div>
        <!-- end -->
    </div>
    {{include file='wap/footer.tpl'}}
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script>
        var swiper = new Swiper('.tjuser', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            }
        });
        // var galleryTop = new Swiper('.m-txt2 .con', {
        //     spaceBetween: 10,
        //     slidesPerView: 5,
        //     touchRatio: 0.2,
        //     loop: false,
        //     loopedSlides: 5,
        //     slideToClickedSlide: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next'
        //     }
        // });
        // var galleryThumbs = new Swiper('.m-box', {
        //     spaceBetween: 10,
        //     loop: true,
        //     loopedSlides: 5
        // });
        // galleryTop.controller.control = galleryThumbs;
        // galleryThumbs.controller.control = galleryTop;

        $('.js-video').click(function(event) {
            var _id = $(this).attr("href");
            var tid = $(this).attr("data-id");
            var _src = $(this).attr("data-src");
            $.post("/index.php?m=api&c=index&v=showtv", {
              'id':tid
            }, function(data){

            },"JSON");
            $(_id).find("iframe").attr("src", _src);
            $(_id).fadeIn();
        });
        $('.js-close').click(function(event) {
            $(this).parents('.m-pop1-yz').fadeOut();
            $(this).parents('#m-pop1-yz').find("iframe").attr("src", "");
            event.stopPropagation();
        });
        $('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zantv", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $(obj).toggleClass('on');
                    $(obj).html('<i style="background-image: url(/resource/m/images/i-zan.png)"></i>' + (num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
    </script>
</body>

</html>