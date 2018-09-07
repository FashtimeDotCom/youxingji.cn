<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的游记</title> 
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
</head> 

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>我的游记</h3>
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
            <a href="">
	        <img src="{{$user.cover}}" alt="">
	    </a>
            <div class="m-user">
                <i style="background: url({{$user.avatar}}) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl>
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布日志</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布视频</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="row-yz">
            <div class="m-nv-yz">
                <div class="wp"> 
                    <ul>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=travel">我的日志</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=tv">我的视频</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
                    </ul>
                </div>
            </div>
            <ul class="ul-txtlist-yz">
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtravel">
    					<i style="background-image: url(/resource/m/images/s-i1.png);"></i>
    					<div class="txt">发布日志</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=addtv">
    					<i style="background-image: url(/resource/m/images/s-i2.png);"></i>
    					<div class="txt">发表视频</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=follow">
    					<i style="background-image: url(/resource/m/images/s-i3.png);"></i>
    					<div class="txt">我的关注</div>
    				</a>
                </li>
                <li>
                    <a href="/index.php?m=wap&c=user&v=fans">
    					<i style="background-image: url(/resource/m/images/s-i4.png);"></i>
    					<div class="txt">我的粉丝</div>
    				</a>
                </li>
            </ul>
            {{if $user.city == '' || $user.autograph == '' || $user.city == ''}}
            <div class="m-mine-yz">
                <div class="wp">
                    <div class="txt">
                        <span class="name">{{$user.username}}</span>，这里是你的游行迹！<br>是记录你的旅行记忆，结交各路豪杰的地盘儿。现在开启游行迹旅程！
                    </div>
                    <a href="/index.php?m=wap&c=user&v=setting" class="btn">完善个人资料</a>
                </div>
            </div>
            {{/if}}
            {{if $list}}
            <div class="m-myday-yz yz1">
                <ul class="ul-imgtxt2-yz">
                    {{foreach from=$list item=vo}}
                    <li class="travel_t{{$vo.id}}">
                        <div class="wp">
                            <div class="txt">
                                <div class="title">
                                    <div class="a-edit">
                                        <div class="a-con">
                                            <a href="/index.php?m=wap&c=user&v=edittravel&id={{$vo.id}}">编辑</a>
                                            <a href="javascript:;" onclick="deleteTravel({{$vo.id}})">删除</a>
                                        </div>
                                    </div>
                                    <a class="tit" href="javascript:;">{{$vo.title}}</a>
                                    <span class="date">{{$vo.addtime}}</span>
                                </div>
                                <p>{{$vo.describes}}</p>
                                <dl>
                                    {{foreach from=$vo.content item=v}}
                                    <dd>
                                        <a href="{{$v}}" class="fancybox-effects-a">
                                            <div class="pic"><img src="{{$v}}" alt=""></div>
                                        </a>
                                    </dd>
                                    {{/foreach}}
                                </dl>
                                <div class="g-operation-yz">
                                    <a href="javascript:;" class="look"><i></i>{{$vo.shownum}}</a>
                                    <a href="javascript:;" class="zan" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}"><i></i>{{$vo.topnum}}</a>
                                    
                                    <span id="" class="SpanAddress">{{$vo.address}}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{/foreach}}
                </ul>
            </div>
            {{else}}
            <div class="m-myday-yz">
                <div class="wp">
                    <div class="top">
                        <a href="/index.php?m=wap&c=user&v=addtravel" class="write"><i></i>写日志</a>
                        <h3>我的日志</h3>
                    </div>
                    <div class="bg">
                        <div class="txt">此处还差一篇日志哦~</div>
                    </div>
                </div>
            </div>
            <div class="m-myday-yz m-myday-yz2">
                <div class="wp">
                    <div class="top">
                        <a href="/index.php?m=wap&c=user&v=addtv" class="write"><i></i>发布视频</a>
                        <h3>我的视频</h3>
                    </div>
                    <div class="bg2">
                        <div class="text">
                            留下你最原创视频 <br>这里有最原创的旅游推荐<br> 也有最温馨的旅行小贴士<br>
                        </div>
                    </div>
                </div>
            </div>
            {{/if}}
            {{if $multipage}}
            <div class="pages" style="padding-top: 20px;padding-bottom: 20px;">
                <ul>
                    {{foreach from=$multipage item=page}}
                    <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                    {{/foreach}}
                </ul>
            </div>
            {{/if}}
        </div>
    </div>
    {{include file='wap/footer.tpl'}} 
    <!-- 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });
        });
        $('.a-edit').click(function() {
            $(this).toggleClass('on');
        })
        function deleteTravel(id)
        {
            layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=index&v=deletetravel", {
                        'id':id
                    }, function(data){
                        if(data.status == 1){
                            $('.travel_t'+id).remove();
                        }
                    },"JSON");
                    layer.close(index);
                }
            });
        }
    </script>
    <!-- 弹窗 end-->
</body>

</html>