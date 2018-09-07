<div class="col-l">
    <div class="m-myinfo-sz">
        <a href="" class="myimg"><img src="{{$user.avatar}}" alt="" width="100%" height="100%"></a>
        <div class="name">{{$user.username}}</div>
        <div class="info1">
            <span class="s1">等级：<b>{{$user.lvname}}</b></span><i></i>
            <span class="s2">现居：{{$user.city}}</span>
        </div>
        <!-- <div class="btn">
            <a href="" class="guanzhu"><i></i>关注</a>
            <a href="" class="mm">私信</a>
        </div> -->
        <div class="info2">{{$user.autograph}}</div>
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