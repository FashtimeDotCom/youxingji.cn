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
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" href="/resource/css/slick.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='tvslide'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur">
            <div class="wp">
                <a href="/">首页</a> &gt; <span>达人视频</span>
            </div>
        </div>
        <div class="row-g1">
            <div class="wp">
              	<h3 class="m-tit1">本周推荐达人<i></i></h3>
                <div class="m-scroll-hlg" style="margin-top: 40px;">
                    {{foreach from=$tjuser item=v key=k}}
                    <div class="item">
                        <a class="pic" href="{{$v.uid|helper:'href'}}">
                            <img src="{{$v.bgpic}}" alt="" />
                            <div class="con">
                                <div class="top">
                                    <div class="por">
                                        <img src="{{$v.avatar}}" alt="" />
                                    </div>
                                    <h3>{{$v.username}}</h3>
                                </div>
                                <div class="txt">
                                    <!-- <h4>她的故事</h4> -->
                                    <p>{{$v.autograph}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{/foreach}}
                </div>
            </div>
        </div>
        <div class="m-contact">
            <img src="/resource/images/pic2-2-hlg.jpg" alt="" />
            <div class="txt">
                <p></p>
                <!--<p>每一份工作，每一段生活，都是一次大开眼界的考验<br>在游行迹，定制旅行师会根据您与同行人的年龄、兴趣、愿望和时间为您进行定制行程</p>-->
                <a href="/article/jrwm">加入我们</a>
            </div>
        </div>
        <div class="row-g2" id="tags">
            <div class="wp m-atten-lb">
              	<div class="so" style="float: none;margin: 0 auto; margin-bottom: 20px; border-radius: 20px;">
                    <input type="submit" class="sub" id="btnSo">
                    <input type="text" class="inp" value="{{$keyword}}" id="keys" placeholder="查找">
                </div>
                <ul class="ul-link1-hlg">
                    <li {{if $type == ''}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=tv&keyword={{$keyword}}#tags">全部</a></li>
                    {{foreach from=$tagslist item=vo key=k}}
                    <li {{if $type == $k}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=tv&type={{$k}}&keyword={{$keyword}}#tags">{{$vo.tags}}</a></li>
                    {{/foreach}}
                </ul>
                <ul class="ul-list1-hlg">
                    {{foreach from=$list item=vo}}
                    <li>
                        <div class="con">
                            <div class="pic">
                                <a class="js-video" href="#m-pop1-hlg" data-src="{{$vo.url}}" data-id="{{$vo.id}}">
                                <img src="{{$vo.pics}}" alt="" />
                                <span class="start"></span>
                            </a>
                            </div>
                            <div class="txt">
                                <div class="top">
                                    <div class="name">
                                        <div class="por">
                                            <img src="{{$vo.avatar}}" alt="" />
                                        </div>
                                        <div class="desc">
                                            <h3>{{$vo.title}}</h3>
                                            <p class="time">{{$vo.addtime}}</p>
                                        </div>
                                    </div>
                                    <p class="p1">{{$vo.describes}}</p>
                                </div>
                                <div class="num">
                                    <a href="javascript:;" class="eye"><em></em>{{$vo.shownum}}</a>
                                    <a class="zan" href="javascript:;" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}"><em></em>{{$vo.topnum}}</a>
                                </div>
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
                            <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}#tags">{{$page.0}}</a></li>
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
        <!-- 视频弹窗 -->
        <div class="m-pop1-hlg" id="m-pop1-hlg">
            <div class="con1">
                <iframe src='' frameborder=0 'allowfullscreen'></iframe>
                <div class="close js-close"></div>
            </div>
        </div>
        <!-- end -->
    </div>
    {{include file='public/footer.tpl'}}
    <script src="/resource/js/slick.min.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('.m-scroll-hlg').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            centerMode: false
        });
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=index&v=tv&type={{$type}}&page=" + page + "#tags";
            }
        })
        $('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zantv", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $(obj).toggleClass('on');
                    $(obj).html("<em></em>" + (num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
      	$('#btnSo').click(function(){
            var keys = $('#keys').val();
            if(!keys){
                layer.msg('请输入关键字');
                return false;
            }
            window.location.href="/index.php?m=index&c=index&v=tv&type={{$type}}&keyword=" + keys + "#tags";
        })

    </script>
</body>

</html>