<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-草稿箱</title> 
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>草稿箱</h3>
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
                        <li><a href="/index.php?m=wap&c=user&v=travel">我的日志</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=tv">我的视频</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
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
                        <div class="txt">发布视频</div>
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
            <div class="m-mydraft-yz">
                <div class="wp">
                    <div class="tit">我的草稿 {{$num}} <span>【亲爱的，你还有{{$num}}篇草稿没有完成，我们很期待你的大作哦~】</span></div>
                    <ul class="ul-pictxt-yz">
                        {{foreach from=$list item=vo}}
                        <li class="draft_d{{$vo.id}}">
                            <div class="pic"><img src="{{$vo.pic}}" alt=""></div>
                            <div class="txt">
                                <div class="tit">{{$vo.title}}</div>
                                <div class="date">{{$vo.addtime}}</div>
                                <div class="write">
                                    <a href="{{$vo.url}}" class="a1">继续写</a>
                                    <a href="javascript:;" class="a2" onclick="deleteDraft({{$vo.id}})"></a>
                                </div>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}}
    <script type="text/javascript">
        function deleteDraft(id)
        {
            $.post("/index.php?m=api&c=index&v=deletedraft", {
                'id':id
            }, function(data){
                if(data.status == 1){
                    $('.draft_d'+id).remove();
                }
            },"JSON");
        }
    </script>
</body>

</html>