<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>TA的访客_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
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
            <div class="m-con-lb2">
                <div class="col-l">
                    <ul class="ul-snav">
                        <li>
                            <a href="/index.php?m=index&c=muser&v=follow&id={{$muser.uid}}" class="items">
                                <i class="ico1"></i>
                                <span>TA的关注</span>
                            </a>
                        </li>
                        <li>
                            <a href="/index.php?m=index&c=muser&v=fans&id={{$muser.uid}}" class="items">
                                <i class="ico2"></i>
                                <span>TA的粉丝</span>
                            </a>
                        </li>
                        <li class="on">
                            <a href="/index.php?m=index&c=muser&v=visitor&id={{$muser.uid}}" class="items">
                                <i class="ico3"></i>
                                <span>TA的访客</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-atten-lb">
                        <div class="tit">
                            <div class="so">
                                <input type="submit" class="sub" id="btnSo">
                                <input type="text" class="inp" id="keys" placeholder="查找朋友">
                            </div>
                            <h4>TA的访客 <em>{{$muser.uid|helper:'visitor'}}</em></h4>
                        </div>
                    </div>
                    <ul class="ul-list-lb2">
                        {{foreach from=$list item=vo}}
                        <li>
                            <div class="items">
                                <div class="img">
                                    <a href="{{$vo.uid|helper:'href'}}" target="_blank"><img src="{{$vo.avatar}}" alt=""></a>
                                </div>
                                <div class="txt">
                                    <h4><a href="{{$vo.uid|helper:'href'}}" target="_blank">{{$vo.username}}</a></h4>
                                    <div class="con">
                                        <a href="/index.php?m=index&c=muser&v=follow&id={{$vo.uid}}" target="_blank">
                                            <em>{{$vo.uid|helper:'follownum'}}</em>
                                            关注
                                        </a>
                                        <a href="/index.php?m=index&c=muser&v=fans&id={{$vo.uid}}" target="_blank">
                                            <em>{{$vo.uid|helper:'fansnum'}}</em>
                                            粉丝
                                        </a>
                                        <a href="/index.php?m=index&c=muser&v=visitor&id={{$vo.uid}}" target="_blank">
                                            <em>{{$vo.uid|helper:'visitor'}}</em>
                                            访客
                                        </a>
                                    </div>
                                    <div class="btn">
                                        <a href="javascript:;" class="on" onclick="follows({{$vo.uid}},this)">{{$vo.uid|helper:'isfollow'}}</a>
                                        <a href="javascript:;" class="sq_sx" onclick="msg({{$vo.uid}},this)">发私信</a>
                                    </div>
                                    <div class="pop-privateLetter" id="msg_{{$vo.uid}}">
                                        <span class="p-close btn_eject_close _j_close">×</span>
                                        <p>给 <span>{{$vo.username}}</span> 发送消息</p>
                                        <textarea class="_j_msg_area" id="msg{{$vo.uid}}"></textarea>
                                        <div><a class="btn _j_send_button" role="button" onclick="send({{$vo.uid}},this)">发送</a></div>
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
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('#pageqr').click(function(){
            var page = $('#pages').val();
            if(page){
                window.location.href="/index.php?m=index&c=muser&v=visitor&id={{$muser.uid}}&keys={{$key}}&page=" + page;
            }
        })
        function follows(bid, obj)
        {
            $.post("/index.php?m=api&c=index&v=follow", {
                'bid':bid
            }, function(data){
                if(data.status == 0){
                    layer.msg(data.tips);
                }else if(data.status == 1){
                    $(obj).html('已关注');
                }else if(data.status == 2){
                    $(obj).html('<span>关注</span>');
                }
            },"JSON");
        }
        $('#btnSo').click(function(){
            var keys = $('#keys').val();
            if(!keys){
                layer.msg('请输入关键字');
                return false;
            }
            window.location.href="/index.php?m=index&c=muser&v=visitor&id={{$muser.uid}}&keys=" + keys;
        })
        function msg(uid, obj)
        {
            $('#msg_'+uid).show();
        }
        $('.btn_eject_close').click(function(){
            $(this).parent().hide();
        })
        function send(uid, obj)
        {
            var content = $('#msg'+uid).val();
            if(!content){
                layer.msg('请输入私信内容');
                return false;
            }
            $.post("/index.php?m=api&c=index&v=sendmsg", {
                'to_id':uid,
                'content':content
            }, function(data){
                layer.msg(data.tips);
                if(data.status == 1){
                    $('#msg'+uid).val('');
                    $(obj).parent().parent().hide();
                }
            },"JSON");
        }
    </script>
</body>

</html>