<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人邦_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
  	<script src="/resource/lightbox/jquery.min.js"></script>
    <script src="/resource/m/js/lib.js"></script>
  	<!--lightbox开始-->
  	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.css" />
  	<!--[if IE 6]>
 	<link rel="stylesheet" type="text/css" href="/resource/lightbox/jquery.lightbox.ie6.css" />
	<![endif]-->
  	<script type="text/javascript" src="/resource/lightbox/jquery.lightbox.min.js"></script>
  	<script type="text/javascript">
    	jQuery(document).ready(function($){
      		$('.lightbox').lightbox();
    	});
  	</script>
  	<style type="text/css">
  		.figure{padding-bottom: 70%; /* 关键就在这里 */
			  	background-position: center;
			  	background-repeat: no-repeat;
			  	background-size: cover;border-radius: 5px;}
  	</style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>达人邦</h3>
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
        {{vplist from='ad' item='adlist' tagname='wapstarlide'}}
        <div class="ban">
            <a href="javascript:;">
    	        <img src="{{$adlist.imgurl}}" alt="" />
    	    </a>
        </div>
        {{/vplist}}
        <div class="m-talent">
            {{if $tjstar.0.username}}
            <div class="row-peo">
                <div class="wp">
                    <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">本周推荐达人 <a href="/index.php?m=wap&c=index&v=master_list" style="float: right;">更多达人>></a></h4>
                    <div class="tx">
                        <a href="{{$tjstar.0.uid|helper:'mhref'}}" class="pic"><img src="{{$tjstar.0.avatar}}" alt=""></a>
                        <h5><a href="{{$tjstar.0.uid|helper:'mhref'}}">{{$tjstar.0.username}}</a></h5>
                    </div>
                    <div class="txt">
                        <p>{{$tjstar.0.autograph}}</p>
                    </div>
                </div>
            </div>
            {{/if}}
            <div class="row-list" style="padding-bottom: 29px;margin-bottom: 12px;">
                <div class="wp">
                    <ul class="ul-list-talent">
                        {{foreach from=$list item=vo}}
                        <li>
                            <div class="item">
                                <div class="info">
                                    <span class="date">{{$vo.addtime}}</span>
                                    <div class="tx">
                                        <a href="{{$vo.uid|helper:'mhref'}}" class="pic"><img src="{{$vo.uid|helper:'avatar'}}" alt=""></a>
                                        <h5><a href="{{$vo.uid|helper:'mhref'}}">{{$vo.uid|helper:'username'}}</a></h5>
                                    </div>
                                    <div class="c"></div>
                                    <div class="txt">
                                        <p>{{$vo.describes}}</p>
                                    </div>
                                </div>
                                <dl class="list-img list_img">
                                    {{foreach from=$vo.content item=v}}
                                    <dd><a href="{{$v}}" class="lightbox figure" rel="list{{$vo.id}}" style="background-image: url({{$v}});">
                                    		<div class="pic"></div>
                                    	</a>
                                    </dd>
                                    {{/foreach}}
                                </dl>
                                <div class="other">
                                    <span class="eye-c" style="background-image: url(/resource/m/images/i-eye.png)">{{$vo.shownum}}</span>
                                    <span class="zan-c zan" style="background-image: url(/resource/m/images/i-zan.png)" data-id="{{$vo.id}}" data-num="{{$vo.topnum}}">{{$vo.topnum}}</span>
                                </div>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
                {{if $multipage}}
                <div class="pages">
                    <ul>
                        {{foreach from=$multipage item=page}}
                        <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                        {{/foreach}}
                    </ul>
                </div>
                {{/if}}
            </div>
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
            $('.zan').click(function(event) {
                var id = $(this).attr('data-id');
                var num = parseInt($(this).attr('data-num'));
                var obj = $(this);
                $.post("/index.php?m=api&c=index&v=zan", {
                    'id':id
                }, function(data){
                    if(data.status == 1){ 
                        $(obj).toggleClass('on');
                        $(obj).html(num+1);
                    }else{
                        layer.msg(data.tips);
                    }
                },"JSON");
                
            });
        });
    </script>
    <!-- 弹窗 end-->
</body>
</html>