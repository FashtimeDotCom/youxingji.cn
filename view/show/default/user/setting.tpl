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
                        <li class="on">
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
                      	<li>
                            <a href="/index.php?m=index&c=user&v=cover" class="items">
						<i class="ico1"></i>
						<span>我的封面</span>
					</a>
                        </li>
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-tit-lb">
                        <h4>我的信息</h4>
                        <div class="plan">
                            <span>资料完善度</span>
                            <p class="jin"><em>{{$numerical}}%</em><i style="width: {{$numerical}}%"></i></p>
                        </div>
                    </div>
                    <div class="m-txt-lb">
                        <table>
                            <tr>
                                <td width="90px">
                                    <span>称号：</span>
                                </td>
                                <td>
                                    <input type="text" class="inp" id="username" value="{{$user.username}}">
                                </td>
                            </tr>
                            <tr>
                                <td><span>性别：</span></td>
                                <td>
                                    <div class="gender" role="radio">
                                        <label{{if $user.sex == 1}} class="checked"{{/if}} data-sex="1">
        									<input type="radio" name="gender">
        									男
        								</label>
                                        <label{{if $user.sex == 0}} class="checked"{{/if}} data-sex="0">
        									<input type="radio" name="gender">
        									女
        								</label>
                                        <label{{if $user.sex == 2}} class="checked"{{/if}} data-sex="2">
        									<input type="radio" name="gender">
        									保密
        								</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span>居住城市：</span></td>
                                <td>
                                    <input type="text" class="inp" id="city" value="{{$user.city}}">
                                </td>
                            </tr>
                            <tr>
                                <td><span>出生日期：</span></td>
                                <td>
                                    <input type="text" class="inp" id="birthday" value="{{$user.birthday}}">
                                </td>
                            </tr>
                            <tr>
                                <td><span>个人简介：</span></td>
                                <td>
                                    <textarea class="area" id="autograph">{{$user.autograph}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="sub" id="btnBc" value="保存">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
    <script type="text/javascript">
        $('#btnBc').click(function(){
            var username = $('#username').val();
            var sex = $('.checked').attr('data-sex');
            var city = $('#city').val();
            var birthday = $('#birthday').val();
            var autograph = $('#autograph').val();
            $.post("/index.php?m=api&c=index&v=savesetting", {
                'username':username,
                'sex':sex,
                'city':city,
                'birthday':birthday,
                'autograph':autograph
            }, function(data){
                window.location.href = window.location.href;
            },"JSON");
        })
    </script>
</body>

</html>