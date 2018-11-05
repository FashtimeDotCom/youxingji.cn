<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-我的旅拍TV</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
        .write {position: absolute;bottom: 0px;right: 10px;z-index: 9999;}
        .write a{display:inline-block;background-repeat:no-repeat;-webkit-transition:.3s;-o-transition:.3s;transition:.3s}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>我的旅拍TV</h3>
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
                <dl><dd><a href="/index.php?m=wap&c=user&v=addtravel">发布日志</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布视频</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="row-TV">
            <div class="m-nv-yz">
                <div class="wp">
                    <ul><li><a href="/index.php?m=wap&c=user&v=travel">我的日志</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=album">我的相册</a></li>
                        <li class="on"><a href="/index.php?m=wap&c=user&v=tv">我的视频</a></li>
                        <li><a href="/index.php?m=wap&c=user&v=draft">草稿箱</a></li>
                    </ul>
                </div>
            </div>
            <ul class="ul-txtlist-yz">
                <li><a href="/index.php?m=wap&c=user&v=addtravel">
                        <i style="background-image: url(/resource/m/images/s-i1.png);"></i>
                        <div class="txt">发布日志</div>
                    </a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=addtv">
                        <i style="background-image: url(/resource/m/images/s-i2.png);"></i>
                        <div class="txt">发布视频</div>
                    </a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=follow">
                        <i style="background-image: url(/resource/m/images/s-i3.png);"></i>
                        <div class="txt">我的关注</div>
                    </a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=fans">
                        <i style="background-image: url(/resource/m/images/s-i4.png);"></i>
                        <div class="txt">我的粉丝</div>
                    </a>
                </li>
            </ul>
            {{if $list}}
            <div class="m-mytv-yz">
                {{foreach from=$list item=vo}}
                <div class="item">
                    <div class="wp">
                        <div class="date">{{$vo.days}}</div>
                        <ul class="ul-pic1-yz ul-pic1-yz2">
                            {{foreach from=$vo.list item=v}}
                            <li class="tv_t{{$v.id}}" style="position: relative;">
                                <a href="javascript:;" class="pic js-video" data-src="{{$v.url}}"  data-id="{{$v.id}}">
                                    <img src="{{$v.pics}}" alt="">
                                    <span class="bo"></span>
                                    <span class="txt">{{$v.title}}</span>
                                </a>
                                <div class="write">
                                    <a href="javascript:;" class="a2" onclick="deleteTv({{$v.id}})"><img src="/resource/images/shanchu.png" width="25"></a>
                                    <a href="/index.php?m=wap&c=user&v=edittv&id={{$v.id}}" class="a2"><img src="/resource/images/bianji.png" width="25"></a>
                                </div>
                            </li>
                            {{/foreach}}
                        </ul>
                    </div>
                </div>
                {{/foreach}}
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
        
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz" id="m-pop1-yz"><div class="con"><div class="close js-close"><span></span></div></div></div>
        <!-- end -->
    </div>
    {{include file='wap/footer.tpl'}} 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        function deleteTv(id){
            layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=index&v=deletetv", {
                        'id':id
                    }, function(data){
                        if(data.status == 1){
                            $('.tv_t'+id).remove();
                        }
                    },"JSON");
                    layer.close(index);
                }
            });
        }
    </script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
</body>
</html>