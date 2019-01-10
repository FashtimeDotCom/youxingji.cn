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
    <link rel="stylesheet" href="/resource/css/public.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
    	/*导航菜单*/
		.m-nv-sz li{margin-right: 16px;width: auto!important;padding: 0 14px;}
		.m-nv-sz .on:before { width: 100%;}
		
		.ul-pictxt-sz .write .a1{float: left;}
		.ul-pictxt-sz li:hover .a2{float: left;}
		
		.mainTips{background: #fff;position: relative;padding: 30px 10px;}
		.mainTips .preview{width: 344px;height: 241px; margin: 0px 42px;;float: left;}
		.mainTips .tip{float: left;position: relative;padding-top: 78px;}
		.mainTips .tip .title{font-size: 23px;color: #666;line-height: 30px;}
    </style>
</head>
<body>
    {{include file='public/header.tpl'}}
    <div class="main">
        <div class="ban s1" style="background-image: url({{$user.cover}});"></div>
        <div class="row-sz">
            <div class="m-nv-sz">
                <div class="wp">
					<ul><li><a href="/index.php?m=index&c=user&v=index">我的日志</a></li>
						<li><a href="/index.php?m=index&c=user&v=tv">我的视频</a></li>
						<li><a href="/index.php?m=index&c=user&v=travel">我的游记</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_faq">我的问答</a></li>
						<li><a href="/index.php?m=index&c=user&v=my_order">我的订单</a></li>
						<li><a href="/index.php?m=index&c=collection&v=collection_travel">我的收藏</a></li>
						<li class="on"><a href="/index.php?m=index&c=user&v=draft">草稿箱</a></li>
					</ul>
                </div>
            </div>
            <div class="wp">
                {{include file='user/left.tpl'}}
                <div class="col-r">
                    <div class="m-mydraft-sz">
                        <div class="tit">我的草稿 <i class="Iclass quantity quantity1" style="font-size: 18px;">{{$num}}</i> 
                        	<span>【亲爱的，你还有<i class="Iclass quantity" style="font-size: ;">{{$num}}</i> 篇草稿没有完成，我们很期待你的大作哦~】</span>
                        </div>
                        {{if $list}}
                        <ul class="ul-pictxt-sz">
                            {{foreach from=$list item=vo}}
                            <li class="draft_d{{$vo.id}}">
                                <div class="pic"><img src="{{$vo.pic}}" alt=""></div>
                                <div class="txt">
                                    <div class="tit">{{$vo.title}}</div>
                                    <div class="date">{{$vo.addtime}}</div>
                                    <div class="write">
                                        <a href="{{$vo.url}}" target="_blank" class="a1">继续写</a>
                                        <a href="javascript:;" class="a2" onclick="deleteDraft({{$vo.id}})"></a>
                                    </div>
                                </div>
                            </li>
                            {{/foreach}}
                        </ul>
                        {{else}}
                        <!--无信息-->
						<div class="mainTips fix">
							<div class="preview" style="background: url(/resource/m/images/user/defaul_tv_bg.png) no-repeat center;" title="海报/封面"></div>
							<div class="tip"><p class="title">暂无草稿哦！<br />快增加发布一个吧！</p></div>
						</div>
                        {{/if}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
        function deleteDraft(id){
        	var length = $(".ul-pictxt-sz li").length;
			var quantity = parseInt($(".quantity1").text()); //草稿的数量
        	layer.msg('您确定要删除吗？', {
		        btn: ['确认', '取消'],
		        yes: function (index) {
		            $.post("/index.php?m=api&c=index&v=deletedraft",{ 
		            	'id':id
		            }, function(data){
		            	layer.msg(data.tips);
		                if(data.status == 1){
		                	$('.draft_d'+id).remove();
		                	$(".quantity").text(quantity-1);
		                    if (length-1==0) {
		                    	html ='<div class="mainTips fix">'+
											'<div class="preview" style="background: url(/resource/m/images/user/defaul_tv_bg.png) no-repeat center;" title="海报/封面"></div>'+
											'<div class="tip"><p class="title">暂无草稿哦！<br />快增加发布一个吧！</p></div>'+
										'</div>';
		                    	$(".ul-pictxt-sz").after(html);
		                    }
		                }
		            },"JSON");
		            layer.close(index);
		        }
		    });
        }
    </script>
</body>
</html>