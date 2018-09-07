<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>游画_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
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
                <a href="">首页</a> &gt; <span>游画</span>
            </div>
        </div> 
        <div class="row-g3">
            <div class="wp">
                <h3 class="m-tit1">名家作品区<i></i></h3>
                <ul class="ul-list3-hlg">
                    {{foreach from=$writer item=vo}}
                    <li>
                        <div class="con">
                            <div class="top">
                                <div class="hot">
                                    <a href="/index.php?m=index&c=index&v=writer&id={{$vo.id}}">
                                    <img src="{{$vo.pics}}" alt="" />
                                </a>
                                </div>
                                <div class="txt">
                                    <span onclick="href('/index.php?m=index&c=index&v=writer&id={{$vo.id}}')">{{$vo.name}}</span>，{{$vo.introduction}}
                                </div>
                            </div>
                            <dl>
                                <dt><h3 class="g-tit1-qm">作品</h3></dt>
                                <dd>
                                    {{foreach from=$vo.list item=v}}
                                    <div class="pic">
                                        <a class="js-pop1" href="javascript:void(0)"><img class="youhua" data-title="{{$v.title}}" data-name="{{$vo.name}}" data-size="{{$v.size}}" data-place="{{$v.place}}" data-src="{{$v.pics}}" src="{{$v.thumbpic}}" alt="" /></a>
                                    </div>
                                    {{/foreach}}
                                </dd>
                            </dl>
                        </div>
                    </li>
                    {{/foreach}}
                </ul>
                <a href="/index.php?m=index&c=index&v=writerlist" class="m-btn1">查看更多</a>
            </div>
        </div>
        <div class="row-a4 m-txt2-hlg">
            <div class="wp">
                <h3 class="m-tit1">热门作品区<i></i></h3>
                <ul class="ul-txt2 ul-list4-hlg">
                    {{foreach from=$scenery item=v}}
                    <li>
                        <a href="javascript:;" class="js-pop1">
                            <div class="pic"><img class="youhua" data-title="{{$v.title}}" data-name="{{$v.name}}" data-size="{{$v.size}}" data-place="{{$v.place}}" data-src="{{$v.pics}}" src="{{$v.thumbpic}}" alt=""></div>
                            <div class="txt">
                                <p><span>作品：</span>{{$v.title}}</p>
                                <p onclick="href('/index.php?m=index&c=index&v=writer&id={{$v.wid}}')"><span>作者：</span> {{$v.name}}</p>
                                <p><span>尺寸：</span> {{$v.size}}</p>
                                <p><span>写生地点：</span> {{$v.place}}</p>
                            </div>
                        </a>
                    </li>
                    {{/foreach}}
                </ul>
              	<a href="/index.php?m=index&c=index&v=hotscenery" class="m-btn1">查看更多</a>
            </div>
        </div>
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
</body>

</html>