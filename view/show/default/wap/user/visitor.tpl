<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-访客</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head> 
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>我的访客</h3>
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
        <div class="ban">
            <a href=""><img src="{{$user.cover}}" alt=""></a>
            <div class="m-user">
                <i style="background: url({{$user.avatar}}) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl><dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布TV</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="row-focus">
            <div class="wp">
                <ul class="ul-snav-yz1">
                    <li><a href="/index.php?m=wap&c=user&v=follow" class="items item1">
	    					<span style="background-image: url(/resource/m/images/ico-lb6.png)">我的关注</span>
	    				</a>
                    </li>
                    <li><a href="/index.php?m=wap&c=user&v=fans" class="items item2">
	    					<span style="background-image: url(/resource/m/images/ico-lb5.png)">我的粉丝</span>
	    				</a>
                    </li>
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=visitor" class="items item1">
	                        <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的访客</span>
	                    </a>
                    </li>
                    <li><a href="/index.php?m=wap&c=user&v=findfriends" class="items item2">
	                        <span style="background-image: url(/resource/m/images/ico-lb11.png)">查找好友</span>
	                    </a>
                    </li>
                </ul>
                <div class="so-friend">
                    <input type="submit" class="sub" id="btnSo">
                    <input type="text" class="inp" value="{{$keys}}" id="keys" placeholder="查找朋友">
                </div>
                <ul class="ul-list-yz2">
                    {{foreach from=$list item=vo}}
                    <li><div class="items">
                            <div class="img">
                                <a href="{{$vo.uid|helper:'mhref'}}"><img src="{{$vo.avatar}}" alt=""></a>
                            </div>
                            <div class="txt">
                                <h4><a href="{{$vo.uid|helper:'mhref'}}">{{$vo.username}}</a></h4>
                                <div class="con">
                                    <a href="/index.php?m=wap&c=muser&v=follow&id={{$vo.uid}}">
                						<em>{{$vo.uid|helper:'follownum'}}</em>
                						关注
                					</a>
                                    <a href="/index.php?m=wap&c=muser&v=fans&id={{$vo.uid}}">
                						<em>{{$vo.uid|helper:'fansnum'}}</em>
                						粉丝
                					</a>
                                    <a href="/index.php?m=wap&c=muser&v=visitor&id={{$vo.uid}}">
                						<em>{{$vo.uid|helper:'visitor'}}</em>
                						访客
                					</a>
                                </div>
                                <div class="btn">
                                    <a href="javascript:;" class="on" onclick="follows({{$vo.uid}},this)">{{$vo.uid|helper:'isfollow'}}</a>
                                    <a href="javascript:;" onclick="smg({{$vo.uid}})">发私信</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{/foreach}}
                </ul>
            </div>
            <!-- 页码 -->
            {{if $multipage}}
            <div class="pages" style="padding-top: 20px;padding-bottom: 20px;">
                <ul>{{foreach from=$multipage item=page}}
                    <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                    {{/foreach}}
                </ul>
            </div>
            {{/if}}
            <!-- 页码 end-->
        </div>
    </div>
    {{include file='wap/footer.tpl'}} 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $('#btnSo').click(function(){
            var keys = $('#keys').val();
            if(!keys){
                layer.msg('请输入关键字');
                return false;
            }
            window.location.href="/index.php?m=wap&c=user&v=visitor&keys=" + keys;
        });
    </script>
	<script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【 收藏、关注、私信】"></script>
</body>
</html>