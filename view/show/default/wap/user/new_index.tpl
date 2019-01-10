<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心</title> 
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script> 
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.ban .content p{text-align: center;font-size: 0.9rem;}
		.ban .content p i{font-style: normal;}
		.ban .content .wx_name{font-size: 0.7rem;font-weight: 600;}
		.ban .content .wx_name img{display: inline-block;width: 3%;}
		.ban .content .middle{margin: 0.5rem auto;}
		.ban .content .middle .grade{padding-right: 1rem;}
		.ban .content .middle .grade i{color: #D60F11;}
		.ban .content .middle .dwell{padding-left: 0.5rem;border-left: 1px #d6d6d6 solid;}
		.ban .content .signature{margin: 0 auto 2rem;width: 92%;text-indent: 1.4rem;}

    	.labelList{margin: 0 20px 0.3rem;text-align: center;}
		.labelList .tag{display: inline-block;font-size: 0.7rem;color: #333;padding: 2px 8px;
						  border: 1px #ee4d4d solid;border-radius: 5px;}
		.labelList .tag:first-child{margin-right: 10px;}
		
		.ul-txtlist-yz .txt{font-size: 0.9rem;}
		
		.level p{font-size: 1rem;}
		.whiteSpace{white-space: pre-wrap!important;
						word-wrap: break-word!important;
						*white-space:normal!important;}
    </style>
</head> 
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>个人中心</h3>
    </div>
    <div class="mian">
        <div class="g-top">
            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="logo" /></a></div>
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
        <div class="ban ban1">
            <div class="dis_block fix">
		        <img class="headPortrait" src="{{$user.avatar}}" alt="">
		    </div>
		    <div class="content fix">
		    	<p class="wx_name">{{$user.username}}</p>
		    	<p class="middle">
		    		<span class="grade">等级：<i>{{$user.lvname}}</i></span> 
		    		<span class="dwell">现居：<i>{{$user.city}}</i></span>
		    	</p>
		    	{{if $user.tag}}
		    	<p class="labelList">
					{{foreach from=$user.tag key=k item=vo }}
						{{if $k <2}}
					<span class="tag">{{$vo}}</span>
						{{/if}}
					{{/foreach}}
				</p>
				{{/if}}
		    	<p class="signature whiteSpace" title="个性签名">{{$user.autograph}}</p>
		    </div>
		    <ul class="ul-txtlist-yz ClassUL">
                <li><a href="/index.php?m=wap&c=user&v=follow">
    					<i>{{$user.uid|helper:'follownum'}}</i>
    					<div class="txt">关注</div>
    				</a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=fans">
    					<i>{{$user.uid|helper:'fansnum'}}</i>
    					<div class="txt">粉丝</div>
    				</a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=visitor">
    					<i>{{$user.uid|helper:'visitor'}}</i>
    					<div class="txt">访客</div>
    				</a>
                </li>
        	</ul>
        </div>
        <div class="row-yz">
            <div class="m-nv-yz" style="border-bottom: none;">
                <a class="dis_block fix" href="index.php?m=wap&c=user&v=msg">
	                <p class="level news">
	                	<img class="" src="/resource/m/images/user/0.png"/>消息
	                	<img class="RightArrows" src="/resource/m/images/user/8.png" />
                        {{if $msg_total}}
                            <span class="amount">{{$msg_total}}</span>
                        {{/if}}
	                </p>
	            </a>
            </div>
        </div>
        <div class="row-yz" style="margin-bottom: 11px;">
            <ul class="ul-txtlist-yz borderNone" style="border: none;">
                <li><a href="/index.php?m=wap&c=user&v=addtravel">
    					<i style="background-image: url(/resource/m/images/s-i5.png);"></i>
    					<div class="txt">发布日志</div>
    				</a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=addtv">
    					<i style="background-image: url(/resource/m/images/s-i2.png);"></i>
    					<div class="txt">发布视频</div>
    				</a>
                </li>
                <li><a href="/index.php?m=wap&c=user&v=add_note">
    					<i style="background-image: url(/resource/m/images/s-i1.png);"></i>
    					<div class="txt">发布游记</div>
    				</a>
                </li>
                <li><a href="/index.php?m=wap&c=faq&v=set_faq">
    					<i style="background-image: url(/resource/m/images/s-i4.png);"></i>
    					<div class="txt">发布提问</div>
    				</a>
                </li>
            </ul>
        </div>
        <div class="row-yz">
            <div class="m-nv-yz heightAuto" style="border-bottom: none;">
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=travel">
	                	<img class="" src="/resource/m/images/user/1.png"/>
	                	<p class="">我的日志<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=tv">
	                	<img class="" src="/resource/m/images/user/2.png"/>
	                	<p class="">我的视频<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=travel_note">
	                	<img class="" src="/resource/m/images/user/3.png"/>
	                	<p class="">我的游记<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=my_faq">
	                	<img class="" src="/resource/m/images/user/4.png"/>
	                	<p class="">我的问答<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=collection&v=collection_travel">
	                	<img class="" src="/resource/m/images/user/5.png"/>
	                	<p class="">我的收藏<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=draft">
	                	<img class="" src="/resource/m/images/user/6.png"/>
	                	<p class="">草稿箱<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
                <div class="level">
                	<a class="dis_block fix" href="/index.php?m=wap&c=user&v=setting">
	                	<img class="" src="/resource/m/images/user/7.png"/>
	                	<p class="">设置<img class="RightArrows" src="/resource/m/images/user/8.png" /></p>
                	</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	window.onload=function(){
    		//判断个人中心 【个性签名】内容的长度，如果长度不足够，说明此标签的高度小于17px,字体居中
    		var signature= parseInt($(".signature").get(0).offsetHeight);
    		if (signature <= 17 ) {
    			$(".signature").css("text-align","center");
    		} else{
    			$(".signature").css("text-align","justify");
    		}
    	}
    </script>
    {{include file='wap/footer.tpl'}}
</body>
</html>