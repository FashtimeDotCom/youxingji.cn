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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
  	<style>
      .nav{
      	top:45px;
      }
  	</style>
</head> 

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3><span>与 <a href="javascript:;" style="color: #d71618;">{{$msg.toid|helper:'username'}}</a> 的对话</span></h3>
    </div>
    <div class="mian" style="margin-top: 0px;">
        <div class="chat_list _j_chat_list">
          	<div class="_j_chat_lists">
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
                    </div>
                    <div class="aftr"></div>
                  </div>
                </div>
                {{/foreach}}
          	</div>
          	<div class="chat_inputs">
                <input type="text" class="chat_input">
                <a id="send">确定</a>
            </div>
        </div>
    </div>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
  	<script type="text/javascript">
        $(function(){
            //$("._j_chat_list").scrollTop( $('._j_chat_list').height() );
            $("._j_chat_list").animate({scrollTop: $('._j_chat_list').height() + 3000 + 'px'}, 1000);
        })
      	$('#send').click(function(){
        	var content = $('.chat_input').val();
          	if(content){
              $.post("/index.php?m=api&c=index&v=sendmsg", {
                'to_id':'214',
                'content':content
              }, function(data){
                if(data.status == 1){
                  $('._j_chat_lists').append('<div class="chat_message _j_msg_div receive"><div class="time" style="color: #ccc; font-size: 12px;">刚刚</div><div class="message_con clearfix _j_msg_info"><div class="author"><a href="javascript:;"><img src="{{$user.uid|helper:'avatar'}}" alt="" width="48" height="48" style="border-radius: 50%"></a></div><div class="msg _j_old_msg"><p>'+data.content+'</p><span class="operate"><a href="javascript:void(0)" class="_j_del_one_msg" data-mid="87108730">删除</a></span> <i></i></div><div class="aftr"></div></div></div>')
                  $("._j_chat_list").animate({scrollTop: $('._j_chat_list').height() + 3000 + 'px'}, 1000);
                  $('.chat_input').val('');
                }else{
                  layer.msg(data.tips);
                }
              },"JSON");
            }

        });
	</script>
</body>

</html>