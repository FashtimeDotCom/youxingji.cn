<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-设置</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>我的封面</h3>
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
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布TV</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="m-con-yz2">
            <div class="wp">
                <ul class="ul-snav-yz1 ul-snav-yz2">
                    <li>
                        <a href="/index.php?m=wap&c=user&v=setting" class="items item3">
                           <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的信息</span>
                        </a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=avatar" class="items item4">
                            <span style="background-image: url(/resource/m/images/ico-lb11.png)">我的头像</span>
                        </a>
                    </li>
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=cover" class="items item5">
                            <span style="background-image: url(/resource/m/images/ico-lb6.png)">我的封面</span>
                        </a>
                    </li>
                </ul>
                <div class="m-img-yz">
                    <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">更换封面</h4>
                    <div class="img">
                        <img src="{{$user.cover}}" alt="" id="coverpic">
                    </div>
                    <div class="file">
                        <label>
    						<input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
    						<em>选择图片</em>
    					</label>
                        <span>支持jpg、png、jpeg、bmp，图片大小5M以内</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}}
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        layui.upload({
            url: "/index.php?m=api&c=index&v=savecover",
            type: 'image',
            ext: 'jpg|png|jpeg|bmp',
            success: function (data) {
                layer.msg(data.tips);
                if (data.status == 1) {
                    document.getElementById('coverpic').src = data.url;
                }
            }
        });
        $(function(){
            $('.layui-upload-icon').hide();
        })
    </script>
</body>

</html>