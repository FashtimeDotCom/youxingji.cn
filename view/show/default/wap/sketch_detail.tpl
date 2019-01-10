<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>名师带你去写生_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    <meta name="description" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
    <meta name="keywords" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/m/css/sketch.css" />
    <script src="/resource/js/move_rem.js"></script>
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.padding{padding: 0 0.5rem;text-align: justify;}
    	
		.smallIcon{width: 0.8rem;display: inline-block;vertical-align: middle;margin-right: .2rem;}
		.special{float: left;margin-top: 0.2rem;}
		pre{white-space: pre-wrap!important;
			word-wrap: break-word!important;
			*white-space:normal!important;}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>名师带你去写生</h3>
	</div>
	<div class="mian">
	    <div class="g-top">
	        <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
	        <div class="so">
	            <form action="/index.php">
	                <input type="hidden" name="m" value="wap" />
	                <input type="hidden" name="c" value="index" />
	                <input type="hidden" name="v" value="search" />
	                <input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
	                <input type="submit" value="" class="sub" />
	            </form>
	        </div>
	    </div>
	    <div class="ban"><a href="javascript:;"><img src="{{$detail.pics}}" alt="" /></a></div>
	    <div class="head">
	        <div class="head_title">{{$detail.title}}</div>
	        <div class="head_text">{{$detail.content}}</div>
	    </div>
	    <div class="items">
	        <div class="items_title">跟谁去</div>
	        <div>{{$detail.with_one}}</div>
	    </div>
	    <div class="items">
	        <div class="items_title">特色体验</div>
	        <div>{{$detail.feture}}</div>
	    </div>
	    <div class="items">
	        <div class="items_title"> 行程介绍</div>
	        <ul class="item-ul">
	            {{if $detail.every_day}}
	            {{foreach from=$detail.every_day item=item key=key}}
	            <li><h4>第{{$item.sort}}天 {{$item.title}}</h4>
	                <div class="flight">
	                    <img class="smallIcon" src="/resource/m/images/travel_detail/icon_airplane.png"/>
	                    {{if $item.airport}}{{$item.airport}}{{else}}自行决定出行方式{{/if}}
	                </div>
	                <div class="diet">
	                    <img class="smallIcon" src="/resource/m/images/travel_detail/icon_breakfast.png"/>
	                    {{if $item.breakfast}}{{$item.breakfast}}{{else}}早餐、午餐、晚餐自行解决{{/if}}
	                </div>
	                <div class="sleep">
	                    <img class="smallIcon" src="/resource/m/images/travel_detail/icon_bed.png"/>
	                    {{if $item.accommodation}}{{$item.accommodation}}{{else}}无{{/if}}
	                </div>
	                <div class="Trip">
	                    <img class="smallIcon special" src="/resource/m/images/travel_detail/icon_photograph.png"/>
	                    {{$item.desc}}
	                </div>
	            </li>
	            {{/foreach}}
	            {{/if}}
	            <li class="end"> 结束</li>
	        </ul>
	    </div>
	    <div class="items">
	        <div class="items_title">费用说明</div>
	        <div class="padding">{{$detail.cost_explain}}</div>
	    </div>
	    <div class="items">
	        <div class="items_title">签证说明</div>
	        <div class="padding">{{$detail.visa_explain}}</div>
	    </div>
	    <div class="items">
	        <div class="items_title">温馨提示</div>
	        <div class="padding">{{$detail.tips}}</div>
	    </div>
	</div>
	
    <div class="h50"></div>
    <div class="fl-bot" id="nexts">
        <div class="wp">
            <span>￥{{$detail.price}}元/位</span>
            <a class="btn-enroll" id="btnBook" href="javascript:;">立刻报名</a>
        </div>
    </div>
    <div class="fl-bot" id="service_book" style="display: none">
        <div class="wp"><a class="btn-enroll" id="btnNext" href="javascript:;">下一步</a></div>
    </div>
    
    <!-- 弹窗 -->
    <!--<aside id="bg" class="bg" data-is-bind-scroll="true">-->
    <!--<aside id="bg" class="bg active">-->
    <aside id="bg" class="bg">
		<!--遮罩层-->
		<i class="bg_overlay hideAside"></i>
		
		<div class="bg_content fix dis_none">
			<div class="module_title">填写报名表</div>
			<div class="main scrollable">
				<div class="divClass fix teamName">
					<label class="labelClass" for="realname">您的姓名：</label>
					<input class="inputClass " type="text" name="" id="realname" placeholder="请输入您的姓名" value="" />
				</div>
				<div class="divClass fix teamName">
					<label class="labelClass" for="phone">手机号码：</label>
					<input class="inputClass " type="number" name="" id="phone" placeholder="请输入手机号码" value="" maxlength="11" onkeyup="judgeIsNonNull1(event)"  />
				</div>
				<div class="divClass fix teamName">
					<label class="labelClass" for="place">出发地点：</label>
					<input class="inputClass " type="text" name="" id="place" placeholder="请输入出发地点" value="" />
				</div>
			</div>
			<div class="bottomButton">
				<input type="hidden" id="sketch_id" name="sketch_id" value="{{$detail.id}}">
				<button class="found" type="button">提交</button>
				<button class="ShutDownFound" onclick="occlude(this)" type="button">取消</button>
			</div>
		</div>
	</aside>
    <!-- 弹窗 end -->
    
	{{include file='wap/footer.tpl'}}
	<link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
	<script type="text/javascript" src="/resource/m/js/swiper.js"></script>
	<script>
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
	<script src="/resource/m/js/zepto.min.js"></script>
	<script src="/resource/m/js/popup.js" type="text/javascript" charset="utf-8"></script>
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
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
	    
	    // 打开弹窗
        $('.btn-enroll').click(function() {
        	popupArise();
    		$(".bg_content").removeClass("dis_none");
            $("#nexts").addClass("dis_none");
        });
        
	    $('#btnBook').click(function() {
            var year = parseInt($('#yearDate').val());
            var month = parseInt($('#monthDate').val());
            $.get("/index.php?m=api&c=index&v=getcalendar", {
                'jid': $('#jid').val(),
                'year': year,
                'month': month
            }, function(data) {
                if (data['MonthModel']) {
                    ms(data);
                }
            }, "JSON");
        });
        $(".found").on("click",function(){
        	var realname = $("#realname").val();
        	if ( realname == "" ) {
    			layer.msg("姓名不能为空！");
    			return false;
    		}
        	
        	var phone=$('#phone').val();
	        if(!phone){
	            layer.msg('手机号码不能为空！');
	            return false;
	        }
	        var reg=/(1[3-9]\d{9}$)/;
	        if(!reg.test(phone)){
	            layer.msg('请输入正确格式的手机号码！');
	            return false;
	        }
	        
	        var place = $("#place").val();
        	if ( place == "" ) {
    			layer.msg("出发地点不能为空！");
    			return false;
    		}
        	var id = $('#sketch_id').val();//路线
        	
            $.post("index.php?m=api&c=index&v=sketch_apply",{
                'realname': realname,
                'phone': phone,
                'place': place,
                'sketch_id': id
            }, function(data) {
                layer.msg(data.tips);
                console.log(data);
                if(data.status == 1) {
                    $('#realname').val('');
                    $('#phone').val('');
                    $('#place').val('');
                    $('#sketch_id').val('');
                    popupClose();
                    $(".bg_content").addClass("dis_none");
            		$("#nexts").removeClass("dis_none");
                }
            }, "JSON");
        	
        });
        
        //监控  手机号码 输入框的变化
        function judgeIsNonNull1(event){
			var value=$("#phone").val();
			if(value !== "" ){
				if( value.length <= 11 ){
		    		console.log("符合11位数以内");
		    	} else{
		    		return $("#phone").val(value.substr(0, 11));
		    	}
		    }
		}
        
        //监控 正文内容输入框 ，包括粘贴板
		$("#phone").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
	</script>
</body>
</html>