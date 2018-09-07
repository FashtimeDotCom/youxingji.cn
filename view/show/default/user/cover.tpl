<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-封面</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="wp">
            <div class="m-con-lb2">
                <div class="col-l">
                    <ul class="ul-snav">
                        <li>
                            <a href="/index.php?m=index&c=user&v=setting" class="items">
                                <i class="ico3"></i>
                                <span>我的信息</span>
                            </a>
                        </li>
                        <li>
                            <a href="/index.php?m=index&c=user&v=avatar" class="items">
                                <i class="ico4"></i>
                                <span>我的头像</span>
                            </a>
                        </li>
                      	<li class="on">
                            <a href="/index.php?m=index&c=user&v=cover" class="items">
                                <i class="ico1"></i>
                                <span>我的封面</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <style>
                    .layui-upload-icon {
                        display: none;
                    }
                </style>
                <div class="col-r">
                    <div class="m-tit-lb">
                        <h4>我的封面</h4>
                    </div>
                    <div class="m-img-lb">
                        <div class="img">
                            <img src="{{$user.cover}}" alt="" id="coverpic">
                        </div>
                        <div class="file">
                            <label>
                                <input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
        						<em>选择图片</em>
        					</label>
                            <span>支持jpg、png、jpeg、bmp，像素：1920*560</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
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