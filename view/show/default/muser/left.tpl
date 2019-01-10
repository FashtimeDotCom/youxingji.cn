<style type="text/css">
	.labelList{margin: 0 20px 18px;text-align: center;}
	.labelList .label{display: inline-block;font-size: 13px;color: #333;padding: 2px 8px;
					  border: 1px #ee4d4d solid;border-radius: 5px;}
	.labelList .label:first-child{margin-right: 10px;}
</style>
<div class="col-l">
    <div class="m-myinfo-sz">
    	<div class="figure borderRadius50 myimg" style="background-image: url({{$muser.avatar}});"></div>
        <div class="name">{{$muser.username}}</div>
        <div class="labelList">
            {{if $muser.tag}}
            {{foreach from=$muser.tag item=item key=key}}
            {{if $key <=1}}
            <span class="label">{{$item}}</span>
            {{/if}}
            {{/foreach}}
            {{/if}}
        </div>
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
        <div class="info2" style="text-indent: 24px;">“{{$muser.autograph}}”</div>
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
                    <li><a href="{{$v.uid|helper:'href'}}">
                            <div class="figure img" style="background-image: url({{$v.avatar}});"></div>
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
    function msg(uid, obj){
        $('#msg_'+uid).show();
    }
    $('.btn_eject_close').click(function(){
        $(this).parent().hide();
    });
    function send(uid, obj){
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
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script>
    $('.pic-sz').slick({ //自定导航条
        slidesToShow: 4, //个数
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
        nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
        dots: false
    });
</script>