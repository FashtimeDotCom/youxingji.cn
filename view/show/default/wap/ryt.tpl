 <!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>日阅潭_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>日阅潭</h3>
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
        {{vplist from='ad' item='adlist' tagname='waprytslide'}}
        <div class="ban">
            <a href="javascript:;">
                <img src="{{$adlist.imgurl}}" alt="" />
            </a>
        </div>
        {{/vplist}}
        <div class="m-read">
            <div class="wp">
                <span class="tit"><em>{{$y}}</em>年</span>
                <div class="con">
                	{{foreach from=$list item=vo key=k}}
                		{{if $month >= $k}}
	                    <div class="item">
	                        <i></i>
	                        <div class="box">
	                            <h3><em>{{$k}}</em>月</h3>
	                            <ul class="ul-imgtxt3">
	                                {{foreach from=$vo.time item=v key=k}}
	                                {{if $v.status == 1}}
	                                <li>
	                                    <div class="pic">
	                                        <a href="/index.php?m=wap&c=index&v=rytdetai&id={{$v.id}}">
			                                    <img src="{{$v.pics}}" alt="">
			                                    <div class="txt">
			                                        <h3>{{$v.days}}</h3>
			                                    </div>
			                                </a>
	                                    </div>
	                                </li>
	                                {{/if}}
	                                {{/foreach}}
	                            </ul>
	                        </div>
	                    </div>
	                    {{/if}}
                    {{/foreach}}
                </div>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}} 
</body>

</html>