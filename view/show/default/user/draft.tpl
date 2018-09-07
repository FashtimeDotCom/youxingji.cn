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
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
</head>

<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban s1" style="background-image: url({{$user.cover}});"></div>
        <div class="row-sz">
            <div class="m-nv-sz">
                <div class="wp">
                    <ul>
							<li>
								<a href="/index.php?m=index&c=user&v=index">我的旅行日志</a>
							</li>
							
							<li>
								<a href="/index.php?m=index&c=user&v=tv">我的旅拍TV</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=travel">我的游记</a>
							</li>
							<li>
								<a href="/index.php?m=index&c=user&v=album">我的相册</a>
							</li>
							<li  class="on">
								<a href="/index.php?m=index&c=user&v=draft">草稿箱</a>
							</li>
						</ul>
                </div>
            </div>
            <div class="wp">
                {{include file='user/left.tpl'}}
                <div class="col-r">
                    <div class="m-mydraft-sz">
                        <div class="tit">我的草稿 {{$num}} <span>【亲爱的，你还有{{$num}}篇草稿没有完成，我们很期待你的大作哦~】</span></div>
                        <ul class="ul-pictxt-sz">
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
    </div>
    {{include file='public/footer.tpl'}}
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