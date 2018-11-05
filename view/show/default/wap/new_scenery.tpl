<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>游画_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <script src="/resource/js/move_rem.js"></script>
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>游画</h3>
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
	    {{vplist from='ad' item='adlist' tagname='wapscenerylide'}}
	    <div class="ban">
	        <a href="javascript:;">
	            <img src="{{$adlist.imgurl}}" alt="" />
	        </a>
	    </div>
	    {{/vplist}}
	    <div class="m-works">
	        <h3 class="m-title">名家作品区<a href="/index.php?m=wap&c=index&v=writerlist"><span>更多</span></a></h3>
	        <ul class="ul-imgtxt5">
	            {{foreach from=$writer item=vo}}
	            <li>
	                <div class="top">
	                    <div class="pic"><a href="/index.php?m=wap&c=index&v=writer&id={{$vo.id}}"><img src="{{$vo.pics}}" alt="" /></a></div>
	                    <div class="txt">
	                        <p><em>{{$vo.name}}</em>，{{$vo.introduction}}</p>
	                    </div>
	                </div>
	                <div class="bot">
	                    <h4 class="g-tit-yz">作品</h4>
	                    <div class="picbox swiper-container">
	                        <div class="swiper-wrapper">
	                            {{foreach from=$vo.list item=v}}
	                            <div class="swiper-slide">
	                                <a href="{{$v.pics}}" class="fancybox" data-title="<p><span>作品：</span>{{$v.title}}</p><p><span>作者：</span> {{$vo.name}}</p><p><span>尺寸：</span> {{$v.size}}</p><p><span>写生地点：</span> {{$v.place}}</p>">
	                                    <div class="pic">
	                                        <img src="{{$v.thumbpic}}" alt="" />
	                                    </div>
	                                </a>
	                            </div>
	                            {{/foreach}}
	                        </div>
	                        <div class="swiper-button-next" style="background: rgba(31, 31, 31, .3) url(/resource/icon/icon_index.png) no-repeat;"></div>
	    					<div class="swiper-button-prev" style="background: rgba(31, 31, 31, .3) url(/resource/icon/icon_index.png) no-repeat;"></div>
	                    </div>
	                </div>
	            </li>
	            {{/foreach}}
	        </ul>
	    </div>
	    <div class="m-hot">
	    	<h3 class="m-title">热门作品区<a href="/index.php?m=wap&c=index&v=writerlist"><span>更多</span></a></h3>
	        <div class="m-imgtxt2 swiper-container">
	            <div class="swiper-wrapper">
	                {{foreach from=$scenery item=v}}
	                <div class="swiper-slide">
	                    <a href="{{$v.pics}}" class="fancybox" data-title="<p><span>作品：</span>{{$v.title}}</p><p><span>作者：</span> {{$v.name}}</p><p><span>尺寸：</span> {{$v.size}}</p><p><span>写生地点：</span> {{$v.place}}</p>">
	                        <div class="pic"><img src="{{$v.thumbpic}}" alt=""></div>
	                        <div class="txt">
	                            <p><span>作品：</span>{{$v.title}}</p>
	                            <p><span>作者：</span> {{$v.name}}</p>
	                            <p><span>尺寸：</span> {{$v.size}}</p>
	                            <p><span>写生地点：</span> {{$v.place}}</p>
	                        </div>
	                    </a>
	                </div>
	                {{/foreach}}
	                <div class="swiper-slide">
	                    <a href="/index.php?m=wap&c=index&v=hotscenery">
	                        <div class="g-more2">
	                            <span>查看更多游画<i></i></span>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="m-hot">
	    	<h3 class="m-title">海外作品区<a href="/index.php?m=wap&c=index&v=writerlist"><span>更多</span></a></h3>
	        <div class="m-imgtxt2 swiper-container">
	            <div class="swiper-wrapper">
	                {{foreach from=$fore_scenery item=v}}
	                <div class="swiper-slide">
	                    <a href="{{$v.pics}}" class="fancybox" data-title="<p><span>作品：</span>{{$v.title}}</p><p><span>作者：</span> {{$v.name}}</p><p><span>尺寸：</span> {{$v.size}}</p><p><span>写生地点：</span> {{$v.place}}</p>">
	                        <div class="pic"><img src="{{$v.thumbpic}}" alt=""></div>
	                        <div class="txt">
	                            <p><span>作品：</span>{{$v.title}}</p>
	                            <p><span>作者：</span> {{$v.name}}</p>
	                            <p><span>尺寸：</span> {{$v.size}}</p>
	                            <p><span>写生地点：</span> {{$v.place}}</p>
	                        </div>
	                    </a>
	                </div>
	                {{/foreach}}
	                <div class="swiper-slide">
	                    <a href="/index.php?m=wap&c=index&v=hotscenery">
	                        <div class="g-more2">
	                            <span>查看更多游画<i></i></span>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	    {{if $sketch_list}}
	
	    <div class="m-hot">
	    	<h3 class="m-title">大师带你去写生<a href="/index.php?m=wap&c=index&v=writerlist"><span>更多</span></a></h3>
	        {{foreach from=$sketch_list item=item key=key}}
	        <div class="m-item">
	            <div class="m-item-img">
	                <img src="{{$item.thumbfile}}"/>
	            </div>
	            <div class="m-item-text">
	                <h3>{{$item.title}}</h3>
	                {{$item.desc}}
	            </div>
	        </div>
	        {{/foreach}}
	    </div>
	    {{/if}}
	</div>
	{{include file='wap/footer.tpl'}}
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script type="text/javascript">
	    var swiper1 = new Swiper('.m-works .picbox', {
	        slidesPerView: 2,
	        spaceBetween: 30,
	    });
	    var swiper2 = new Swiper('.m-imgtxt2', {
	        slidesPerView: 1.5
	    });
	</script>
	<link rel="stylesheet" type="text/css" href="/resource/m/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="/resource/m/js/jquery.fancybox.js"></script>
	<script type="text/javascript">
	    $(".fancybox").fancybox({
	        wrapCSS: 'fancybox-custom',
	        closeClick: false,
	        openEffect: 'none',
	        showCloseButton: false,
	        helpers: {
	            title: {
	                type: 'inside'
	            }
	        },
	        beforeLoad: function() {
	            this.title = $(this.element).data('title');
	        }
	    });
	</script>
</body>
</html>