<style type="text/css">
	.logo a{width: 90%!important;}
	.nav li a{padding: 0 12px!important;}
	
	.header .hdr .left{float: left;}
	.header .hdr .user{float: right;}
	
	.search{width: 170px;
		    height: 26px;color: #666;
		    padding: 0px 0px;margin-top: 30px;
		    background: url(../images/bg01.png);
		    border-radius: 2px;border: 1px #d8d8d8 solid;}
	.search form{line-height: 24px;}
	.search form input{display: inline-block;}
	.search form .inp{padding-left: 5px;line-height: 24px;}
	.search form .sub{width: 26px;height: 24px;float: right;
				 	  background: url(/resource/images/common/seek.png) no-repeat center center / 64%;}
</style>
<div class="header">
    <div class="wp">
        <div class="logo" style="margin-right: 7px;"><a href="/"><img src="/resource/images/logo.png" alt=""></a></div>
        <ul class="nav">
            <li {{if $ns == ''}}class="on"{{/if}}><a href="/">首页</a></li>
            <li {{if $ns == 'swim'}}class="on"{{/if}}><a href="/index.php?m=index&c=swim&v=index">免费游</a></li>
            <li {{if $ns == 'lsit'}}class="on"{{/if}}><a href="javascript:;">达人邦</a></li>
            <li {{if $ns == 'star'}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=star">达人日志</a></li>
            <li {{if $ns == 'tv'}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=tv">达人视频</a></li>
            <li {{if $ns == 'ryt'}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=ryt">达人游记</a></li>
            <li {{if $ns == 'faq'}}class="on"{{/if}}><a href="javascript:;">达人问答</a></li>
            <li {{if $ns == 'daren'}}class="on"{{/if}}><a href="javascript:;">如何达人</a></li>
            <li {{if $ns == 'journey'}}class="on"{{/if}}><a href="/index.php?m=index&c=index&v=journey">独家旅行</a></li>
        </ul>
        <div class="hdr">
        	<div class="left">
            	<div class="search">
					<form action="index.php">
						<input type="hidden" name="m" value="index">
						<input type="hidden" name="c" value="index">
						<input type="hidden" name="v" value="search">
						<input class="inp" type="text" name="keyword" placeholder="请输入关键字">
						<input class="sub" type="submit" value="">
					</form>
				</div>
           </div>
            {{if $user}}
	            <div class="user">
	                <div class="pic">
	                	<a href="/index.php?m=index&c=user&v=index">
	                		<img src="{{$user.avatar}}" alt="" id="headavatarpic" style="border-radius: 50%;vertical-align: baseline;height: 100%;width: 100%;">
	                	</a>
	                </div>
	                <dl><dd><a href="/index.php?m=index&c=user&v=addtravel">发布游记</a></dd>
	                    <dd><a href="/index.php?m=index&c=user&v=addtv">发布旅拍TV</a></dd>
	                    <dd><a href="/index.php?m=index&c=user&v=follow">我的关注</a></dd>
	                    <dd><a href="/index.php?m=index&c=user&v=msg">我的私信</a></dd>
	                    <dd><a href="/index.php?m=index&c=user&v=fans">我的粉丝</a></dd>
	                    <dd><a href="/index.php?m=index&c=user&v=setting">设置</a></dd>
	                    <dd><a href="javascript:void(0)" onclick="logout()">退出</a></dd>
	                </dl>
	            </div>
	            	{{if $weidu > 0}}
	            <div class="tx">
	                <span class="lf">私信</span><span class="rg weidu">!</span>
	            </div>
	            <script type="text/javascript">
	                $('.tx').click(function(){
	                    window.location.href="/index.php?m=index&c=user&v=msg";
	                });
	            </script>
            	{{/if}}

            {{else}}
            <div class="right">
                <a href="/index.php?m=index&c=index&v=login">登录</a> |
                <a href="/index.php?m=index&c=index&v=reg" style="color: #3d4c63;">注册</a>
            </div>
            {{/if}}
        </div>
    </div>
</div>

<script>
    function logout(){
        //退出畅言
        var img = new Image();
        img.src='http://changyan.sohu.com/api/2/logout?client_id=cytIKVFKm';
        window.location.href="/index.php?m=index&c=user&v=logout";
    }
</script>