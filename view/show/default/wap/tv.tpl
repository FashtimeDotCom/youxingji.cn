<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>达人视频_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="keywords" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.m_pop1_yz .con{overflow: initial;}
    	.m_pop1_yz .con .close{top: -44px;}
		.m_pop1_yz .con .close span{background: #221414 url(/resource/m/images/icon-close2.png) no-repeat center center / 68%;}
		
		.ul-imgtxt2 .bot .icon_like{display: inline-block;
								    vertical-align: middle;
								    width: 15px;
								    height: 15px;
								    margin-right: 5px;
								    margin-top: -2px;
								    background-repeat: no-repeat;
								    background-position: center center;
								    -webkit-background-size: 12px auto;
								    -moz-background-size: 12px auto;
								    -ms-background-size: 12px auto;
								    -o-background-size: 12px auto;
								    background-size: 12px auto;}
		.Iclass{font-style: normal;display: inline!important;}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>达人视频</h3>
    </div>
    <div class="mian" style="padding-bottom: 29px;margin-bottom: 12px;">
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
        {{vplist from='ad' item='adlist' tagname='waptvslide'}}
        <div class="ban"><img src="{{$adlist.imgurl}}" alt="海报/封面" /></div>
        {{/vplist}}
        <!--<div class="tjuser swiper-container">
            <div class="swiper-wrapper">
                {{foreach from=$tjuser item=v key=k}}
                <div class="row-peo swiper-slide">
                    <div class="wp">
                        <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">本周推荐达人</h4>
                        <div class="tx">
                            <a href="index.php?m=wap&c=muser&v=tv&id={{$v.uid}}" class="pic"><img src="{{$v.avatar}}" alt=""></a>
                            <h5><a href="{{$v.uid|helper:'mhref'}}">{{$v.username}}</a></h5>
                        </div>
                        <div class="txt"><p>{{$v.autograph}}</p></div>
                    </div>
                </div>
                {{/foreach}}
            </div>
        </div>-->
        
        <input type="hidden" id="UniqueValue" data-sign="expert_tv" value="tv_num" title="共用JS区分的唯一必须值"/>
        <div class="m-txt2">
            <div class="con swiper-container swiper-container-horizontal swiper-container-ios" style="padding-right: 0px;">
                <div class="swiper-wrapper" style="overflow-x: scroll;">
                    <div class="swiper-slide {{if $type == ''}}swiper-slide-active{{/if}}" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&keyword={{$keyword}}">全部</a></div>
                    {{foreach from=$tagslist item=vo key=k}}
                    <div class="swiper-slide {{if $type == $k}}swiper-slide-active{{/if}}" style="width: 60.4px;margin-right: 10px;"><a href="/index.php?m=wap&c=index&v=tv&type={{$k}}&keyword={{$keyword}}">{{$vo.tags}}</a></div>
                    {{/foreach}}
                </div>
            </div>
        </div>
        <div class="m-box swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <ul class="ul-imgtxt2">
                        {{foreach from=$list item=vo}}
                        <li><div class="con">
                                <div class="pic">
                                    <a href="javascript:;" class="js-video" data-src="{{$vo.url}}" data-id="{{$vo.id}}">
                                        <img src="{{$vo.pics}}" alt="" />
                                        <i></i>
                                    </a>
                                </div>
                                <div class="txt">
                                    <div class="top">
                                        <div class="img"><a href="javascript:;"><img src="{{$vo.avatar}}" alt="" /></a></div>
                                        <div class="tit">
                                            <h3><a href="javascript:;">{{$vo.title}}</a></h3>
                                            <span>{{$vo.addtime}}</span>
                                        </div>
                                    </div>
                                    <p>{{$vo.describes}}</p>
                                </div>
                            </div>
                            <div class="bot">
                                <span><i style="background-image: url(/resource/m/images/i-eye.png)"></i>{{$vo.shownum}}</span>
                                <span class="zan" data-id="{{$vo.id}}">
                                	<img class="icon_like" src="/resource/m/images/i-zan.png" />
                                	<i class="Iclass">{{$vo.topnum}}</i>
                                </span>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
        {{if $multipage}}
        <div class="pages">
            <ul>{{foreach from=$multipage item=page}}
                <li {{if $page.2}}class="{{$page.2}}"{{/if}}><a href="{{$page.1}}">{{$page.0}}</a></li>
                {{/foreach}}
            </ul>
        </div>
        {{/if}}
        
        <!-- 视频弹窗 -->
        <div class="m-pop1-yz m_pop1_yz" id="m-pop1-yz"><div class="con"><div class="close js-close"><span></span></div></div></div>
        <!-- end -->
    </div>
    {{include file='wap/footer.tpl'}}
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        var swiper1 = new Swiper('.tjuser', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            }
        });
        
        
        //点赞
        var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
        var url;
        $('.zan').click(function(event) {
            var obj = $(this);
            var id = obj.attr('data-id');
            var textNum = parseInt(obj.children("i").text());
            
            if( UniqueValue=="travel_num" ){//日志
				url="/index.php?m=api&c=index&v=zan";
			} else if( UniqueValue=="tv_num" ){//视频
				url="/index.php?m=api&c=index&v=zantv";
			} else if( UniqueValue=="note_num" ){//游记
				url="/index.php?m=api&c=index&v=zantravel";
			}else{  //问题详情页对【回答者的回答】 点赞
				
			}
            
            $.post(url, {
                'id':id
            }, function(data){
            	layer.msg(data.tips);
                if(data.status == 1){
                    obj.children("i").text(textNum+1);
                }
            },"JSON");
        });
    </script>
    <script type="text/javascript" src="/resource/m/js/dianzan.js" title="移动端    所有页面  的  【点赞】"></script>
    <script type="text/javascript" src="/resource/m/js/opentv.js" title="移动端    所有页面  的  【打开、关闭视频】"></script>
    <script type="text/javascript" src="/resource/m/js/collect.js" title="移动端    所有页面  的 【  收藏、关注、私信】"></script>
</body>
</html>