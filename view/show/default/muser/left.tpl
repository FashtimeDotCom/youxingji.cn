<div class="col-l">
    <div class="m-myinfo-sz">
        <a href="" class="myimg"><img src="{{$muser.avatar}}" alt="" width="100%" height="100%"></a>
        <div class="name">{{$muser.username}}</div>
        <div class="info1">
            <span class="s1">等级：<b>{{$muser.lvname}}</b></span><i></i>
            <span class="s2">现居：{{$muser.city}}</span>
        </div>
        <div class="btn">
            <a href="javascript:;" class="guanzhu" onclick="follows({{$muser.uid}},this)">{{$muser.uid|helper:'isfollows'}}</a>
            <a href="javascript:;" class="mm" onclick="msg({{$muser.uid}},this)">私信</a>
            <div class="pop-privateLetter" id="msg_{{$muser.uid}}" style="margin-left: 153px;">
                <span class="p-close btn_eject_close _j_close">×</span>
                <p>给 <span>{{$muser.username}}</span> 发送消息</p>
                <textarea class="_j_msg_area" id="msg{{$muser.uid}}"></textarea>
                <div><a class="btn _j_send_button" role="button" onclick="send({{$muser.uid}},this)" style="border: 0px;">发送</a></div>
            </div>
        </div>
        <div class="info2" style="background:none;">{{$muser.autograph}}</div>
        <ul class="ul-txt-sz"> 
            <li><a href="/index.php?m=index&c=muser&v=follow&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'follownum'}}</span>关注</a></li>
            <li class="bd"><a href="/index.php?m=index&c=muser&v=fans&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'fansnum'}}</span>粉丝</a></li>
            <li><a href="/index.php?m=index&c=muser&v=visitor&id={{$muser.uid}}"><span class="s1">{{$muser.uid|helper:'visitor'}}</span>访客</a></li>
        </ul>
        <div class="m-guanzhu-sz">
            <div class="tit">TA的关注</div>
            <div class="pic-sz m-people-sz">
                {{foreach from=$myfollow item=vo key=k}}
                <ul class="item">
                    {{foreach from=$vo item=v key=k}}
                    <li>
                        <a href="{{$v.uid|helper:'href'}}">
                            <div class="img">
                                <img src="{{$v.avatar}}" alt="">
                            </div>
                            <span class="txt">{{$v.username}}</span>
                        </a>
                    </li>
                    {{/foreach}}
                </ul>
                {{/foreach}}
            </div>
        </div>
        <div class="m-guanzhu-sz s2">
            <div class="tit">推荐达人</div>
            <ul class="m-people-sz">
                {{foreach from=$tjstar item=vo}}
                <li>
                    <a href="{{$vo.uid|helper:'href'}}">
                        <div class="img">
                            <img src="{{$vo.avatar}}" alt="">
                        </div>
                        <span class="txt">{{$vo.username}}</span>
                    </a>
                </li>
                {{/foreach}}
            </ul>
        </div>
    </div>
</div>
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript">
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
                $(obj).html('<i></i> 关注');
            }
        },"JSON");
    }
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