<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-私信</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>
<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="wp">
            <div class="mian dialogue">
                <div class="th">私信消息</div>
                <div class="dia_list _j_sms_list">
                    {{foreach from=$list item=vo}}
                    <div class="item clearfix" id="msg{{$vo.id}}" data-uid="{{$vo.toid}}">
                        <div class="author">
                            <a href=""><img src="{{$vo.toid|helper:'avatar'}}" alt="{{$vo.toid|helper:'username'}}" width="48" height="48"></a>
                        </div>
                        <div class="con _j_to_list" mid="{{$vo.id}}">
                            <div class="title clearfix">
                                <span>与 <a href="" class="name">{{$vo.toid|helper:'username'}}</a>的对话</span>
                                <span class="time">{{$vo.lastaddtime}}</span>
                            </div>
                            <p>{{$vo.lastcontent}}</p>
                        </div>
                        <div class="tool_right">
                            <span class="delete _j_delete" mid="{{$vo.id}}"></span>
                            {{if $vo.weidunum > 0}}
                            <span class="weidu _j_weidu">!</span>
                            {{/if}}
                        </div>
                    </div>
                    {{/foreach}}
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('._j_delete').click(function(){
            var mid = $(this).attr('mid');
            $.post("/index.php?m=api&c=index&v=deletemsg", {
                'mid':mid,
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $('#msg'+mid).remove();
                }
            },"JSON");
        })
        $('._j_to_list').click(function(){
            var mid = $(this).attr('mid');
            window.location.href = '/index.php?m=index&c=user&v=msgdetail&mid=' + mid;
        })
    </script>
</body>

</html>