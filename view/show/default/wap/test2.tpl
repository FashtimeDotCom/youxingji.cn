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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style>
        .qqFace { margin-top: 4px; background: #fff; padding: 2px; border: 1px #dfe6f6 solid; }
        .qqFace table td { padding: 0px;line-height: 28px;}
        .qqFace table td img { cursor: pointer; border: 1px #fff solid; }
        .qqFace table td img:hover { border: 1px #0066cc solid; }
    </style>
</head>

<body class="">
<div class="header">
    {{include file='wap/header.tpl'}}
    <h3>日阅潭</h3>
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
    {{vplist from='ad' item='adlist' tagname='waprytdetailslide'}}
    <div class="ban">
        <a href="javascript:;">
            <img src="{{$adlist.imgurl}}" alt="" />
        </a>
    </div>
    {{/vplist}}
    <div class="m-text2">
        <div class="wp">
            <h1>{{$article.title}}</h1>
            <div class="info">
                <span>By<em>{{$article.username}}</em></span>
                <span>{{$article.addtime}}</span>
                <div class="right">
                    <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i>{{$article.shownum}}</span>
                    <span class="zan" data-id="{{$article.id}}" data-num="{{$article.zannum}}"><i style="background-image: url(/resource/m/images/i-zan.png)"></i>{{$article.zannum}}</span>
                </div>
            </div>
            <div class="m-share">
                <div class="bdsharebuttonbox">
                    <span>分享至</span>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                </div>
            </div>
            <div class="txt">
                {{$article.content}}
            </div>
        </div>
    </div>
    <div class="m-comment">
        <ul class="ul-imgtxt4">
            {{foreach from=$comment item=vo key=k}}
            <li>
                <div class="tit">
                    <a href="{{$vo.uid|helper:'mhref'}}">
                        <i style="background-image: url({{$vo.uid|helper:'avatar'}});"></i>
                        <span>{{$vo.lou}}F</span>
                        <h3>{{$vo.uid|helper:'username'}}<em>{{$vo.uid|helper:'lv'}}</em></h3>
                    </a>
                </div>
                <div class="txt">
                    <p>{{$vo.content}}</p>
                    <span>{{$vo.addtime}}</span>
                </div>
            </li>
            {{/foreach}}
        </ul>

        <div class="m-publish">
            <!--WAP版-->
            <div id="SOHUCS" sid="{{$source_id}}" ></div>
            <script id="changyan_mobile_js" charset="utf-8" type="text/javascript"
                    src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=cytIKVFKm&conf=prod_84acd83354d56f4258f7a43b366bb19d">
            </script>
        </div>
    </div>
</div>
{{include file='wap/footer.tpl'}}
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>

<!-- 分享 -->
<script>
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
    $('.zan').click(function(event) {
        var id = $(this).attr('data-id');
        var num = parseInt($(this).attr('data-num'));
        var obj = $(this);
        $.post("/index.php?m=api&c=index&v=zanryt", {
            'id':id
        }, function(data){
            if(data.status == 1){
                $(obj).html('<i style="background-image: url(/resource/m/images/i-zan.png)"></i>'+(num+1));
            }else{
                layer.msg(data.tips);
            }
        },"JSON");

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