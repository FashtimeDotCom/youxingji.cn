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
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="wp">
            <div class="back"><a style="color:#333" href="/index.php?m=index&c=user&v=msg">&lt; 返回</a></div>
            <div class="chat_window" style="margin-bottom: 30px;">
                <div class="master clearfix">
                    <i class="letter"></i>与<a href="javascript:;">{{$msg.toid|helper:'username'}}</a>的对话
                </div>
                <div class="chat_list _j_chat_list" style="min-height: 200px;max-height: 400px;">
                    {{foreach from=$list item=vo}}
                    <div class="chat_message _j_msg_div{{if $vo.isme == 1}} receive{{/if}}">
                        <div class="time" style="color: #ccc; font-size: 12px;">
                            {{$vo.addtime}}
                        </div>
                        <div class="message_con clearfix _j_msg_info">
                            <div class="author">
                                <a href="javascript:;"><img src="{{$vo.form_id|helper:'avatar'}}" alt="" width="48" height="48" style="border-radius: 50%"></a>
                            </div>
                            <div class="msg _j_old_msg">
                                <p>
                                        {{$vo.content}}
                                </p>
                                <span class="operate">
                                    <a href="javascript:void(0)" class="_j_del_one_msg" data-mid="87108730">删除</a>
                                </span>
                                <i></i>
                            </div>
                            <div class="aftr"></div>
                        </div>
                    </div>
                    {{/foreach}}

                </div>
                <div class="edit_block">
                    <div class="expression" id="_j_pluplader_btn_container_1">
                        <a title="选择表情" class="_j_expression emotion"></a>
                    </div>
                    <div class="txt">
                        <textarea name="" id="saytext" class="_j_content"></textarea>
                    </div>
                    <a class="_j_send_msg"><i class="tips">按“Enter”键发送</i></a>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
    <script type="text/javascript" src="/resource/js/jquery.qqFace.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('.emotion').qqFace({
            id : 'facebox', 
            assign:'saytext', 
            path:'/resource/arclist/' //表情存放的路径
        });
        $(function(){
            //$("._j_chat_list").scrollTop( $('._j_chat_list').height() );
            $("._j_chat_list").animate({scrollTop: $('._j_chat_list').height() + 3000 + 'px'}, 1000);
        })
        $("#saytext").keydown(function(e) {
            if(event.keyCode == "13") {
                var content = $("#saytext").val();
                if(content){
                    $.post("/index.php?m=api&c=index&v=sendmsg", {
                        'to_id':'{{$msg.toid}}',
                        'content':content
                    }, function(data){
                        if(data.status == 1){
                            $('._j_chat_list').append('<div class="chat_message _j_msg_div receive"><div class="time" style="color: #ccc; font-size: 12px;">刚刚</div><div class="message_con clearfix _j_msg_info"><div class="author"><a href="javascript:;"><img src="{{$user.uid|helper:'avatar'}}" alt="" width="48" height="48" style="border-radius: 50%"></a></div><div class="msg _j_old_msg"><p>'+data.content+'</p><span class="operate"><a href="javascript:void(0)" class="_j_del_one_msg" data-mid="87108730">删除</a></span> <i></i></div><div class="aftr"></div></div></div>')
                            $("._j_chat_list").animate({scrollTop: $('._j_chat_list').height() + 3000 + 'px'}, 1000);
                            $("#saytext").val('');
                        }else{
                            layer.msg(data.tips);
                        }
                    },"JSON");
                }
            }
        })
        var saytext= document.getElementById("saytext");  
        saytext.onkeydown = function(e){  
            send(e);
        }  
        function send(e){  
            var code;  
            if (!e) var  e = window.event;  
            if (e.keyCode) code = e.keyCode;  
            else if (e.which) code = e.which;  
            if(code==13 && window.event){  
                e.returnValue = false;  
            }else if(code==13){  
                e.preventDefault();  
            }  
          
        } 
    </script>
</body>

</html>