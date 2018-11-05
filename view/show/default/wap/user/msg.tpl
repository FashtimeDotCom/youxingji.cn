<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-私信</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.notNews{text-align: center;color: #ccc;line-height: 24px;margin: 12px auto;}
    	.default_bg{display: block;width: 68%;margin: 10% auto 0;}
    	
    	/*适配iPhoneX、iPhone XS 样式写法  5.8英寸 2436*1125 */
    	@media only screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3){
			.mian{max-height: 527px;}
		}
    	/*适配iPhone XS Max 样式写法  6.5英寸 2688*1242 */
		@media only screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3){
			.mian{max-height: 611px;}
		}
		/*适配iPhoneXR 样式写法  6.1英寸 1792*828 */
		@media only screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2){
			.mian{max-height: 611px;}
		}
    	/*5.5英寸   414*736尺寸的屏幕  如iPhone6 Plus、iPhone6s Plus、iPhone7 Plus、魅族MX5    1920x1080  /3★*/
		@media only screen and (max-width: 414px) {
			.mian{min-height: 455px;}
		}
		/*5.96英寸  412*732尺寸的屏幕  如谷歌Nexus 6   2K 2560x1440  /3.5★*/
		@media only screen and (max-width: 412px) {
			.mian{min-height: 447px;}
		}
		/*5.2英寸   411*731尺寸的屏幕  如 谷歌Nexus 5x   1920x1080  /2.625★*/
		@media only screen and (min-width: 376px) and (max-width: 411px) {
			.mian{min-height: 447px;}
		}
		/*4.7英寸   375*667尺寸的屏幕  如iPhone6、iPhone7、iPhone 6s   1334x750*/
		@media only screen and (min-width: 361px) and (max-width: 375px) {
			.mian{min-height: 388px;}
		}
		/*4.95英寸  360*640尺寸的屏幕  如 谷歌Nexus 5    1920x1080 /3★ */
		@media only screen and (min-width: 321px) and (max-width: 360px) {
			.mian{min-height: 338px;}
		}
		/*4.0英寸   320*568尺寸的屏幕  如iPhone5、iPhone SE   1136x640*/
		@media only screen and (max-width: 320px) {
			.mian{min-height: 264px;}
		}
    </style>
</head>
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>私信</h3>
    </div>
    <div class="mian" style="margin-top: 0px;">
    	{{if $list}}
        <div class="dia_list _j_sms_list">
            {{foreach from=$list item=vo}}
            <div class="item clearfix" id="msg{{$vo.id}}" data-uid="{{$vo.toid}}">
            	<div class="author">
                	<a href=""><img src="{{$vo.toid|helper:'avatar'}}" alt="{{$vo.toid|helper:'username'}}" width="48" height="48"></a>
            	</div>
            	<div class="con _j_to_list" mid="{{$vo.id}}">
                	<div class="title clearfix">
                  		<span>与 <a href="" class="name">{{$vo.toid|helper:'username'}}</a>的对话</span>
                  		<p>{{$vo.lastcontent}}</p>
                	</div>
                	<p>{{$vo.lastaddtime}}</p>
            	</div>
            	<div class="tool_right">
                	<span class="delete _j_delete" mid="{{$vo.id}}"></span>
                	{{if $vo.weidunum > 0}}
                	<span class="weidu _j_weidu">!</span>
                	{{/if}}
            	</div>
            </div>
            {{/foreach}}
        </div>
        {{else}}
        <style type="text/css">
        	.footer{position: absolute;left: 0;bottom: 0;width: 100%;}
        </style>
        <div class="dia_list _j_sms_list">
        	<img class="default_bg" src="/resource/m/images/user/defaul_travel_bg.png"/>
        	<p class="notNews">暂时还没有消息哦~！<br />赶紧找小伙伴聊起来吧！</p>
        </div>
        {{/if}}
    </div>
    {{include file='wap/footer.tpl'}} 
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
  	<script type="text/javascript">
        $('._j_delete').click(function(){
            var mid = $(this).attr('mid');
          	layer.msg('您确定要删除吗？', {
                btn: ['确认', '取消'],
                yes: function (index) {
                    $.post("/index.php?m=api&c=index&v=deletemsg", {
                        'mid':mid,
                    }, function(data){
                        layer.msg(data.tips);
                        if(data.status == 1){
                            $('#msg'+mid).remove();
                            html='<img class="default_bg" src="/resource/m/images/user/defaul_travel_bg.png"/>'+
        						 '<p class="notNews">暂时还没有消息哦~！<br />赶紧找小伙伴聊起来吧！</p>';
                            $("._j_sms_list").html(html);
                        }
                    },"JSON");
                    layer.close(index);
                }
            });
        });
        $('._j_to_list').click(function(){
            var mid = $(this).attr('mid');
            window.location.href = '/index.php?m=wap&c=user&v=msgdetail&mid=' + mid;
        });
    </script>
</body>

</html>