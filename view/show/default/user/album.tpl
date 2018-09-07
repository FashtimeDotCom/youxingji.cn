<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的相册</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban s1" style="background-image: url({{$user.cover}});"></div>
        <div class="row-sz pb30">
            <div class="m-nv-sz">
                <div class="wp">
                   <ul>
							<li >
								<a href="/index.php?m=index&c=user&v=index">我的旅行日志</a>
							</li>
							
							<li>
								<a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=travel">我的游记</a>
							</li>
							<li class="on">
								<a href="/index.php?m=index&c=user&v=album">我的相册</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=draft">草稿箱</a>
							</li>
						</ul>
                </div>
            </div>
            <div class="wp">
                {{include file='user/left.tpl'}}
                <div class="col-r">
                    <div class="m-mytv-sz">
                        {{foreach from=$list item=vo}}
                        <div class="item">
                            <div class="date">{{$vo.days}}</div>
                            <ul class="ul-pic1-sz s2">
                                {{foreach from=$vo.pics item=v}}
                                <li>
                                    <a href="{{$v}}" class="pic fancybox-effects-a">
        								<img src="{{$v}}" alt="">
        							</a>
                                </li>
                                {{/foreach}}
                            </ul>
                        </div>
                        {{/foreach}}
                    </div>
                    <!-- 页码 -->
                    {{if $multipage}}
                    <div class="pages" style="margin-top: 10px;">
                        <ul>
                            {{foreach from=$multipage item=page}}
                                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                            {{/foreach}}
                            <li class="pages-form">
                                到<input class="inp" type="text" id="pages">页
                                <input class="btn" type="button" id="pageqr" value="确定">
                            </li>
                        </ul>
                    </div>
                    {{/if}}
                    <!-- 页码 end-->
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
    <script>
        $('.pic-sz').slick({ //自定导航条
            slidesToShow: 4, //个数
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
            nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
            dots: false

        });
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=user&v=album&page=" + page;
            }
        })
    </script>
    <!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });
        });
    </script>
    <!-- 弹窗 end-->
</body>

</html>