<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>{{$article.title}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{$article.title}}" />
    <meta name="keywords" content="{{$article.title}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style>
    .qqFace { margin-top: 4px; background: #fff; padding: 2px; border: 1px #dfe6f6 solid; }
    .qqFace table td { padding: 0px;line-height: 28px;}
    .qqFace table td img { cursor: pointer; border: 1px #fff solid; }
    .qqFace table td img:hover { border: 1px #0066cc solid; }
    </style>

</head>

<body>
    {{include file='public/header.tpl'}} 
    <div class="main">
        {{vplist from='ad' item='adlist' tagname='rytdetailslide'}}
        <div class="ban s2" style="background-image: url({{$adlist.imgurl}});"></div>
      	{{/vplist}}
        <div class="cur">
            <div class="wp">
                <a href="">首页</a> &gt; <a href="/index.php?m=index&c=index&v=ryt">日阅潭</a> &gt; <span>{{$article.title}}</span>
            </div>
        </div>
        <div class="wp">
            <div class="m-master-qm">
                <div class="col-l">
                    <div class="m-text1-qm">
                        <h1>{{$article.title}}</h1>
                        <div class="info">
                            <span>By <em>{{$article.username}}</em></span>
                            <span>{{$article.addtime}}</span>
                            <div class="g-operation-qm">
                                <a href="javascript:;" class="look"><i></i>{{$article.shownum}}</a>|
                                <a href="javascript:;" class="zan" data-id="{{$article.id}}" data-num="{{$article.zannum}}"><i></i>{{$article.zannum}}</a>
                            </div>
                        </div>
                        <div class="txt">
                            {{$article.content}}
                        </div>
                    </div>
                    <ul class="ul-imgtxt4-qm" id="comment">
                        {{foreach from=$comment item=vo key=k}}
                        <li>
                            <div class="tit">
                                <a href="{{$vo.uid|helper:'href'}}"><i style="background-image: url({{$vo.uid|helper:'avatar'}});border-radius: 50%;background-size: 100%;"></i></a>
                                <span>{{$vo.lou}}F</span>
                                <h3>{{$vo.uid|helper:'username'}}<em>{{$vo.uid|helper:'lv'}}</em></h3>
                            </div>
                            <div class="txt">
                                <p>{{$vo.content}}</p>
                                <div class="bot">
                                    <span>{{$vo.addtime}}</span>
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
                                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}#comment">{{$page.0}}</a></li>
                            {{/foreach}}
                            <li class="pages-form">
                                到<input class="inp" type="text" id="pages">页
                                <input class="btn" type="button" id="pageqr" value="确定">
                            </li>
                        </ul>
                    </div>
                    {{/if}}
                    <!-- 页码 end-->
                    <div class="m-comment-qm">
                        <form action="">
                            <div class="content">
                                <div class="top" style="margin-top: 0px;">
                                    <a href="javascript:;" class="emotion" style="background-image: url(/resource/images/icon21-qm.png);"></a>
                                </div>
                                <textarea id="saytext" placeholder="写下您的感受......."></textarea>
                                {{if !$user}}
                                <div class="nologin">
                                    <div class="nologinbtn">
                                        <a href="/index.php?m=index&c=index&v=login" target="_blank">登录</a>
                                        <a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>
                                    </div>
                                </div>
                                {{/if}}
                            </div>
                            <a href="javascript:;" class="btn btnComment">发表评论</a>
                        </form>
                    </div>
                </div>
                <div class="col-r">
                    <h3 class="g-tit1-qm">日阅潭推荐</h3>
                    <div class="m-pic2-qm">
                        <div class="slider">
                            {{foreach from=$tjryt item=vo key=k}}
                            <div class="item">
                                <a href="/index.php?m=index&c=index&v=rytdetai&id={{$vo.id}}">
                                    <div class="pic">
                                        <img src="{{$vo.pics}}" alt="">
                                        <span>{{$vo.title}}</span>
                                    </div>
                                </a>
                            </div>
                            {{/foreach}}
                        </div>
                    </div>
                    <h3 class="g-tit1-qm">相关目录</h3>
                    <ul class="ul-txt2-qm">
                        {{foreach from=$tjlist item=vo key=k}}
                        <li>
                            <span>{{$k+1}}/</span>
                            <a href="/index.php?m=index&c=index&v=rytdetai&id={{$vo.id}}">{{$vo.title}}</a>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="h81"></div>
    </div>
    {{include file='public/footer.tpl'}}
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script>
        $(document).ready(function() {
            $('.m-pic2-qm .slider').slick({
                dots: false,
                arrows: true,
                autoplay: true,
                slidesToShow: 1,
                autoplaySpeed: 5000,
                pauseOnHover: false,
                lazyLoad: 'ondemand'
            });
        });
      	$('.zan').click(function(event) {
            var id = $(this).attr('data-id');
            var num = parseInt($(this).attr('data-num'));
            var obj = $(this);
            $.post("/index.php?m=api&c=index&v=zanryt", {
                'id':id
            }, function(data){
                if(data.status == 1){ 
                    $(obj).html('<i></i>'+(num+1));
                }else{
                    layer.msg(data.tips);
                }
            },"JSON");
            
        });
    </script>
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=index&v=rytdetai&id={{$article.id}}&page=" + page + "#comment";
            }
        })
        $('.emotion').qqFace({
            id : 'facebox', 
            assign:'saytext', 
            path:'/resource/arclist/' //表情存放的路径
        });
        $(".btnComment").click(function(){
            var str = $("#saytext").val();
            $.post("/index.php?m=api&c=index&v=comment", {
                'str':str,
                'rid':'{{$article.id}}'
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $("#saytext").val('');
                }
            },"JSON");
        });
    });

    //查看结果

    function replace_em(str){
        str = str.replace(/\</g,'&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/resource/arclist/$1.gif" border="0" />');
        return str;
    }
    </script>

</body>

</html>