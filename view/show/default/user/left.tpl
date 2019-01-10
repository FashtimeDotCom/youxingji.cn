<style type="text/css">
	.labelList{margin: 0 20px 18px;text-align: center;}
	.labelList .label{display: inline-block;font-size: 13px;color: #333;padding: 2px 8px;
					  border: 1px #ee4d4d solid;border-radius: 5px;}
	.labelList .label:first-child{margin-right: 10px;}
</style>
<div class="col-l">
    <div class="m-myinfo-sz">
        <div class="figure borderRadius50 myimg" href="" style="background-image: url({{$user.avatar}});"></div>
        <div class="name">{{$user.username}}</div>
        <div class="labelList">
            {{if $user.tag}}
            	{{foreach from=$user.tag item=item key=key}}
            		{{if $key <=1}}
            <span class="label">{{$item}}</span>
            		{{/if}}
            	{{/foreach}}
            {{/if}}
        </div>
        <div class="info1">
            <span class="s1">等级：<b>{{$user.lvname}}</b></span><i></i>
            <span class="s2">现居：{{$user.city}}</span>
        </div>
        <div class="info2 whiteSpace" style="text-indent: 24px;">“{{$user.autograph}}”</div>
        <ul class="ul-txt-sz">
            <li><a href="/index.php?m=index&c=user&v=follow"><span class="s1">{{$user.uid|helper:'follownum'}}</span>关注</a></li>
            <li class="bd"><a href="/index.php?m=index&c=user&v=fans"><span class="s1">{{$user.uid|helper:'fansnum'}}</span>粉丝</a></li>
            <li><a href="/index.php?m=index&c=user&v=visitor"><span class="s1">{{$user.uid|helper:'visitor'}}</span>访客</a></li>
        </ul>
        <div class="m-guanzhu-sz">
            <div class="tit">我的关注</div>
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
                <li><a href="{{$vo.uid|helper:'href'}}">
                		<div class="figure img" style="background-image: url({{$vo.avatar}});"></div>
                        <span class="txt">{{$vo.username}}</span>
                    </a>
                </li>
                {{/foreach}}
            </ul>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/resource/css/slick.css">
<script src="/resource/js/slick.min.js"></script>
<script type="text/javascript">
	//我的关注
	$('.pic-sz').slick({ //自定导航条
		slidesToShow: 4, //个数
		slidesToScroll: 1,
		arrows: true,
		prevArrow: '<a href="javascript:void(0);" class="prev"> </a>',
		nextArrow: '<a href="javascript:void(0);" class="next"> </a>',
		dots: false
	});
</script>