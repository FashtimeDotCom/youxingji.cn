<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>作家列表_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
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
        {{vplist from='ad' item='adlist' tagname='scenerylide'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur">
            <div class="wp">
                <a href="/">首页</a> &gt; <a href="/index.php?m=index&c=index&v=scenery">游画</a> &gt; <span>名家</span>
            </div>
        </div>
        <div class="wp">
            <div class="m-master-qm">
                <div class="col-l">
                    <div class="m-so-qm">
                        <form action="">
                            <input type="text" placeholder="请输入作家姓名" class="inp">
                            <input type="submit" value="搜索" class="sub">
                        </form>
                    </div>
                    <ul class="ul-imgtxt6-qm">
                        {{foreach from=$list item=vo}}
                        <li>
                            <div class="pic"><a href="/index.php?m=index&c=index&v=writer&id={{$vo.id}}"><img src="{{$vo.pics}}" alt=""></a></div>
                            <div class="content">
                                <h3><a href="/index.php?m=index&c=index&v=writer&id={{$vo.id}}">{{$vo.name}}</a></h3>
                                <div class="info">
                                    <span><em>性别：</em>{{$vo.sex}}</span>
                                </div>
                                <div class="txt">
                                    <h3>画家简介</h3>
                                    <p>{{$vo.introduction}}【<a href="/index.php?m=index&c=index&v=writer&id={{$vo.id}}">查看详细</a>】</p>
                                </div>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                    <!-- 页码 -->
                    {{if $multipage}}
                    <div class="pages">
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
                <div class="col-r">
                    <h3 class="g-tit1-qm">推荐作品</h3>
                    <ul class="ul-imgtxt5-qm">
                        {{foreach from=$scenery item=v}}
                        <li>
                            <a href="javascript:;" class="js-pop1">
                                <div class="pic">
                                    <img class="youhua" data-title="{{$v.title}}" data-name="{{$v.name}}" data-size="{{$v.size}}" data-place="{{$v.place}}" data-src="{{$v.pics}}" src="{{$v.thumbpic}}" alt="">
                                    <span>{{$v.title}}</span>
                                </div>
                            </a>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="h81"></div>
        <!-- 弹窗 -->
        <div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
            <div class="con">
                <div class="pic">
                    <img id="wpics" src="" alt="" />
                </div>
                <div class="txt">
                    <p id="wtitle"></p>
                    <p id="wuser"></p>
                    <p id="wsize"></p>
                    <p id="wplace"></p>
                </div>
            </div>
            <div class="close"></div>
        </div>
        <!-- end -->
    </div>
    {{include file='public/footer.tpl'}}
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
    <script type="text/javascript">
        $('.youhua').click(function(event) {
            /* Act on the event */
            var src = $(this).attr('data-src');
            var title = $(this).attr('data-title');
            var name = $(this).attr('data-name');
            var size = $(this).attr('data-size');
            var place = $(this).attr('data-place');
            $('#wpics').attr('src', src);
            $('#wtitle').html("<span>作品：</span> " + title);
            $('#wuser').html("<span>作者：</span> " + name);
            $('#wsize').html("<span>尺寸：</span> " + size);
            $('#wplace').html("<span>写生地点：</span> " + place);
            $('#m-pop1-hlg2').fadeIn();
        });
        $('#m-pop1-hlg2 .close').click(function(event) {
            /* Act on the event */
            $(this).parent('.m-pop1-hlg').fadeOut();
        });
    </script>
    <script>
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=index&v=writerlist&page=" + page;
            }
        })
        $(document).ready(function() {
            $('.m-pic2-qm .slider').slick({
                dots: false,
                arrows: true,
                autoplay: false,
                slidesToShow: 1,
                autoplaySpeed: 5000,
                pauseOnHover: false,
                lazyLoad: 'ondemand'
            });
        });
    </script>
</body>

</html>