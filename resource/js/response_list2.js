//2018-11-27  16:39:37
//HQS

//问题详情页



//进入页面自动加载
var dataLength=$("#UniqueValue").attr("data-length"); //页面 的唯一值
//console.log($(".modules").children(".detailss").height());

function autoloading(){
	var length = $(".modules").children(".detailss").length;
	
	for(var i=1;i<=length;i++){
		var value = $("#modules"+i).children(".detailss"); //字符长度
		if( parseInt(value.height()) >=300 ){
			$("#modules"+i).children(".detailss").css("height","300px");
			$("#modules"+i).children(".readSwitch").removeClass("dis_none");
		}
		else{
			$("#modules"+i).children(".detailss").css("height","auto");
		}
	}
}
autoloading();


//展开全文阅读
$(".readSwitch a").on("click",function(){
	var obj = $(this);
	var dataSwitch = obj.attr("data-switch");
	var id = obj.parents(".modules").attr("id");
	if( dataSwitch == 0 ){
		obj.parent().prev(".detailss").css("height","auto");
		obj.children(".Iclass").text("收起全文");
		obj.children(".icon").removeClass("icon1").addClass("icon2");
		obj.attr("data-switch","1");
		obj.attr("href","javascript:;");
	}
	else{
		obj.parent().prev(".detailss").css("height","300px");
		obj.children(".Iclass").text("展开全文阅读");
		obj.children(".icon").removeClass("icon2").addClass("icon1");
		obj.attr("data-switch","0");
		obj.attr("href","#"+id);
	}
});


//搜索  确认按钮
function searchAffirm(){
	var searchVal = $("#search").val();
	if( searchVal == "" ){
		layer.msg('请输入要搜索的内容！');
		return false;
	}
	else if(searchVal.replace(/(^\s*)|(\s*$)/g, "")==""){
		layer.msg('搜索栏不能只输入空格！');
		return false;
	}
	
	$.ajax({
        url:'',
        data:{type:searchVal},
        method:'post',
        dataType:'json',
        success:function( data ){
            if(data.status == 1){
            	window.location="/index.php?m=index&c=index&v=login&from=";
            }
            else{
                $(".empty4").removeClass("dis_none");
                $(".tips4").addClass("dis_none");
            }
        },
        complete:function(){ }
    });
}



//监控 页面内容输入框 ，包括粘贴板
function judgeIsNonNull2(event){
	var value=$("#pages").val();
	$("#pages").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)

	if(value !== ""){
		var res = /[\、\…\.\．\·\•\'\,\，\。\×\_\＿\-\−\－\—\ˉ\ˇ\々\＇\｀\‘\’\“\”\〃\¨\"\＂\｜\|\‖\(\)\（\）\〔\〕\<\>\〈\〉\《\》\「\」\『\』\〖\〗\【\】\［\］\[\]\{\}\｛\｝\/\*\＊\?\？\^\＾\+\＋\=\＝\÷\¥\￥\#\＃\@\＠\!\！\`\~\～\%\％\∶\:\：\;\；\&\＆\$\＄\£\￡\€\°\°C\°F\←\↑\→\↓\／\＼\\]/g;
		if( res.test(value) ){
			$("#pages").val(value.replace(res,""));
			return false;
		}
   	}
}

//监控 页面内容输入框 ，包括粘贴板
$("#pages").bind('input propertychange', function(){
	judgeIsNonNull2(event);
});

//监控 正文内容输入框 ，包括粘贴板
function judgecomment(event){
	var value = $(event).val();
	var x = event.which || event.keyCode;
	if( value.length <= 600 ){
		//console.log("符合600位数以内");
	}
	else{
		return $(event).val(value.substr(0, 600));
	}
	if( value.length > 600 ){
		$(event).val(setString($(event).val(),600));
	}
	$(event).parent().next(".bottomArea").find("i").html(value.length);
	
}

//监控 正文内容输入框 ，包括粘贴板
$(".comment").bind('input propertychange', function(){
	judgecomment(event);
});

//敲回车 确认搜索
function on_return(){
	if(window.event.keyCode == 13){
		if(document.all('searchAffirm') != null) {
			document.all('searchAffirm').click();
		}
	}
}

//我要提问
$("#skip").on("click",function(){
	var id = $(this).attr("data-id");
    $.post("index.php?m=index&c=user&v=is_login", {
    	
    }, function(data){
        if(data.status == 1){ //登录了，直接跳转
        	window.location="/index.php?m=index&c=user&v=set_question";
        }else{ //没有登录，带参数跳转到登录页
        	layer.msg(data.tips);
        	setInterval(function(){
				window.location="/index.php?m=index&c=index&v=login&from="+"{{$from_url}}";
			},1000);
        }
    },"JSON");
});

//回答问题
$(".respond").on("click",function(){
	$("html, body").animate({ scrollTop: $("#IWillAnswer").offset().top }, 1000);
});


//建立编辑器
layui.use('layedit', function(){
	var layedit = layui.layedit;
	
	layedit.set({
		uploadImage: {
		    url: '/index.php?m=api&c=index&v=uploadpic' //接口url
		    ,type: 'post' //默认post
		    ,ext: 'jpg|png|jpeg|bmp'
		    ,before: function(obj){
				$('#picslist').before('<span style="color: #d71618;" class="tips">上传中...</span>');
			},
			success: function (data) {
				$('#piclist').html('<div class="upic" onclick="deletepic(this)"><img src="'+ data.url +'" class="layui-upload-img"><i class="iz layui-icon">&#xe640;</i></div>');
			}
		}
	});
	
	var index =layedit.build('demo', {
    	height: 180
	});
	
	//编辑器外部操作
	var active = {
		content: function() {
			var content = layedit.getContent(index);
			add(content);
		}
	};

	$('#response').on('click', function() {
		active[content];
	});
});

function add(con) {
	var faq_id = $("#faq_id").val();
	
	if(!con) {
		layer.msg('请输入正文');
		return false;
	}
	if(con.replace(/(^\s*)|(\s*$)/g, "")==""){
		layer.msg('正文内容不能只输入空格！');
		return false;
	}
	
	$.post("/index.php?m=api&c=faq&v=save_response_faq", {
		'faq_id':faq_id,
		'content': con
	}, function(data) {
		layer.msg(data.tips);
		if(data.status == 1) {
			window.location.href = "/index.php?m=index&c=faq&v=detail&id="+faq_id;
		}
	}, "JSON");
}



/*2018-10-11
 * HQS
 * 
 * 问题详情页
 * 
 * 评论  + 回复   开始
 * */


//评论框 获取焦点
$(".AddComment a").on("click",function(){
	var obj = $(this);
	var dataSwitch = obj.attr("data-switch");
	if( dataSwitch == 0 ){
		obj.parent().next(".m_comment").css({"overflow":"unset","height":"auto"});
		obj.parent().next(".m_comment").animate({"padding-bottom":"18px","padding-top":"15px","min-height":"153px","border":"1px #f1f1f1 solid"});

		obj.parent().next(".m_comment").children(".location").animate({"height":"14px"});

		obj.parent().next(".m_comment").children(".m_publish").find(".content textarea").animate({"height":"70px"});
		obj.parent().next(".m_comment").children(".m_publish").find(".addComment").animate({"height":"32px"});
		obj.attr("data-switch",1);

		jointly2();
	}
});


//查看更多
function seeMore(obj){
	var length =parseInt($(obj).parents(".blockquote_wrap").attr("data-count"));
	for(var i=3;i<=length;i++){
		$(obj).parents(".blockquote_wrap").children(".module").eq(i).removeClass("dis_none");
		$(obj).parents(".blockquote_wrap").children(".module").eq(i).fadeIn();
	}
	$(obj).parents(".blockquote_wrap").css({"padding-bottom":"0px"});
	$(obj).parent(".hint").addClass("dis_none").removeClass("dis_block");
	$(obj).parent(".hint i").text("");
}



var rid=$("#UniqueValue").attr("data-rid");//文章的ID
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var url;

//进入页面直接赋值
function from_url(){
	window.from_url = $("#from_url").val();
	$(".from_url").attr("href","/index.php?m=index&c=index&v=login&from="+from_url);
}
from_url();


function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img style="display: inline-block;" src="/resource/arclist/$1.gif" border="0" />');
    return str;
}



//提交  评论
$(".addComment").on("click",function(){
	var obj = $(this);
    var val = obj.parents(".m_publish").find("textarea").val();//文章的内容
	console.log(val);
    if( String(val).length <= 10 ){
    	layer.msg("评论内容不能少于10个字的长度！");
    	return false;
    }
    else if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
		layer.msg('评论内容不能只输入空格！');
		return false;
	}
	
	
    $.post('/index.php?m=api&c=comment&v=comment', {
        'content':val,
        'rid':rid,
        'type':dataType,
        'touid':0
    }, function(res){
        layer.msg(res.tips);
        if(res.status == 1){
        	var new_str=replace_em(val);
        	var html="";
            html =  '<li><div class="details">'+
							'<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'" style="background-image: url('+res.datas.headpic+');" target="_blank"></a>'+
	                        '<h3><a class="username_" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'">'+res.datas.username+'</a>'+
		                    	'<em class="addtime">'+res.datas.addtime+'</em>'+
		                    	'<span class="zan" onclick="zan(this,'+res.datas.id+')" data-nature="review">'+
		                    		'<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
		                    		'<i>0</i>'+
		                    	'</span>'+
		                    '</h3>'+
	                    '</div>'+
	                    '<div class="substance"><div class="description">'+new_str+'</div></div>'+
	                '</li>';

            obj.parents(".m_comment").find(".ul_imgtxt4").prepend(html);
			obj.parents(".m_publish").find("textarea").val("");
			obj.siblings().find("i").text("0");
			obj.parents(".m_comment").addClass("heightCommen");
//			jointly0();
        }
    },"JSON");
});

//提取公共方法0
function jointly0(){  //评论框  缩回去
	$(".original .content").animate({"border":"none","padding":"0px"});
	$("#comment").animate({scrollTop: "0px","height":"40px","line-height":"40px"});
	$(".addComment").animate({"height":"0px"});
}

//提取公共方法1
function jointly1(){
	$(".replyReview").text("回复");
    $(".replyReview").attr("data-open",0);
    $(".details_stair").animate({"opacity":"0","height":"0px","margin-bottom":"0"},100);
}
//提取公共方法2
function jointly2(){
	jointly1();
	
	$(".reply_reply").text("回复");
    $(".reply_reply").attr("data-open",0);
    $(".details_").animate({"opacity":"0","height":"0px"},100);
}

//对【评论 】进行回复   弹出输入框
function replyReview(){
	$(".replyReview").on("click",function(){
		var id = $(this).attr("data-id");
		var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = $(this).attr("data-open");
		
		jointly2();
//		jointly0();
		if( dataOpen == 0 ){//打开评论
	        if( dataClass == 1 ){//对顶级节点的回复
	        	$(this).parents(".substance").find(".details_stair").animate({"opacity":"1","height":"136px","margin-bottom":"10px"});
	        	//var username_ = $(this).parent().parent().prev().find("b").text();
	        	//$(this).parents(".substance").find(".details_stair").find(".ReviewReview").attr("data-name",username_);
	        	
	        	$(this).text("收起");
		        $(this).attr("data-open",1);
		        return false;
	        }
		}
	});
}
replyReview();

//提交对【评论】回复的内容
function ReviewComment(){
	$(".ReviewComment").on("click",function(){
		var obj = $(this);
		var ReplyNum = parseInt(obj.parent().parent().next('.blockquote_wrap').attr('data-count')); //获取这个评论的回复总数
		var id = obj.attr("data-id");//一级评论ID
		var touid=obj.attr('data-touid');//回复目标的用户ID
	    var val = obj.parents(".details_stair").find("textarea").val();//评论内容
	    var dataClass = obj.attr("data-class");
	    var dataI = parseInt($(".blockquote_wrap").attr("data-i"));
	
	    if ( val=="" ) {
	    	layer.msg("回复内容不能为空哦！");
	    }
	    else if(String(val).length <= 10){
			layer.msg('评论内容不能少于10个字的长度！');
			return false;
		}
	    else if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
			layer.msg('评论内容不能只输入空格！');
			return false;
		}
		else{
	    	if (dataClass == 1) {//提交评论
				$.ajax({
					url:"/index.php?m=api&c=comment&v=comment",
					data:{
						rid:rid,
						type: dataType,
						content: val,
						pid: id,
						pid_sub: 0,
						touid:touid
					},
					type:"POST",
					success:function (res) {
						var data=JSON.parse(res);
						if( data.status==1 ){
							layer.msg(data.tips);
							var res=data.datas;
							var new_str=replace_em(val);
							var html = '<div class="module fix">'+
											'<div class="comment_blockquote">'+
												'<div class="comment_conWrap">'+
													'<div class="comment_con"><span class="name">'+res.username+'</span> 说 ：<span class="matter">'+new_str+'</span></div>'+
												'</div>'+
												'<div class="BarSubmenu">'+
							                    	'<div class="leftSubmenu">'+
							                    		'<span class="addtime">'+res.addtime+'</span>'+
								                    	'<span class="zan" onclick="zan(this,'+res.id+')" data-nature="review">'+
								                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
								                    		'<i>0</i>'+
								                    	'</span>'+
							                    	'</div>'+
							                    '</div>'+
											'</div>'+
										'</div>';
							obj.parents(".m_publish").next(".blockquote_wrap").append(html);
							obj.parents(".m_publish").next('.blockquote_wrap').attr('data-count',parseInt(ReplyNum)+1);
							obj.parents(".details_stair").find("textarea").val('');
						}else{
							layer.msg(data.tips);
							return false;
						}
					},
					error:function (data) { }
				});
		    }
	        jointly1();
	    }
	});
}
ReviewComment();

var html2;
html2 = '<div class="nologin">'+
            '<div class="nologinbtn">'+
                '<a class="from_url" href="/index.php?m=index&c=index&v=login&from='+from_url+'">登录</a>'+
                '<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>'+
            '</div>'+
        '</div>';

function seeMore(obj){
	var obj = $(obj);
	var ReplyNum = parseInt(obj.parent().parent().next('.blockquote_wrap').attr('data-count')); //获取这个评论的回复总数
	var id = obj.attr("data-id");//一级评论ID
	var touid=obj.attr('data-touid');//回复目标的用户ID
    var val = obj.parents(".details_stair").find("textarea").val();//评论内容
    var dataClass = obj.attr("data-class");
    var dataI = parseInt($(".blockquote_wrap").attr("data-i"));
	
	$.ajax({
		url:"/index.php?m=api&c=comment&v=comment",
		data:{
			rid:rid,
			type: dataType,
			content: val,
			pid: id,
			pid_sub: 0,
			touid:touid
		},
		type:"POST",
		success:function (res) {
			var data=JSON.parse(res);
			if( data.status==1 ){
				layer.msg(data.tips);
				var res=data.datas;
				var new_str=replace_em(val);
				var html="";
				$.each(data.tips,function(i,item){
					htmll +='<div class="module fix">'+
	                            '<div class="comment_blockquote">'+
	                                '<div class="comment_conWrap">'+
	                                    '<div class="comment_con">'+
	                                        '<span class="name">'+data.tips[i].username+' </span><span class="name"><i>回复</i> '+data.tips[i].to_username+'：</span>'+
	                                        '<span class="matter">'+data.tips[i].content+'</span>'+
	                                    '</div>'+
	                                '</div>'+
	                                '<div class="BarSubmenu">'+
				                    	'<span class="reply reply_reply" data-id="'+data.tips[i].id+'" data-open="0" data-class="2">回复</span>'+
				                    	'<div class="leftSubmenu">'+
				                    		'<span class="addtime">'+data.tips[i].addtime+'</span>'+
					                    	'<span class="zan" onclick="zan(this,'+data.tips[i].id+')" data-nature="review">'+
					                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
					                    		'<i>'+data.tips[i].top_num+'</i>'+
					                    	'</span>'+
				                    	'</div>'+
				                    '</div>'+

	                                //<!--回复【回复】框-->
	                                '<div class="m-publish details_">'+
	                                    '<div class="wp">'+
	                                        '<div class="content">'+
	                                            '<textarea id="comment'+data.tips[i].top_num+'" placeholder="快来和大家分享你的感想吧"></textarea>';
								            if(data.tips.is_login==0){
								                htmll +=html2;
								            }
						            htmll +='</div>'+
	                                        '<span class="btn addReview ReviewReview" data-touid="'+data.tips[i].uid+'" data-id="'+data.tips[i].id+'" data-pid_sub="'+data.tips[i].id+'" data-class="2">发表回复</span>'+
	                                    '</div>'+
	                                '</div>'+
	                            '</div>'+
	                        '</div>';
				});
				
				obj.parents(".m_publish").next(".blockquote_wrap").append(html);
				obj.parents(".m_publish").next('.blockquote_wrap').attr('data-count',parseInt(ReplyNum)+1);
				obj.parents(".details_stair").find("textarea").val('');
			}else{
				layer.msg(data.tips);
				return false;
			}
		},
		error:function (data) { }
	});
}


//对回复 点击 回复    弹出输入框
function reply_reply(){
	$(".reply_reply").on("click",function(){
		var obj = $(this);
		var dataClass = obj.attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = obj.attr("data-open");
	
		jointly2();
//		jointly0();
		if( dataOpen == 0 ){
			if( dataClass == 2 ){
				obj.parent().next(".details_").animate({opacity:'1',height:'136px'});
				var username_ = obj.parent().prev().find(".name0").text();
				obj.parent().next(".details_").find(".ReviewReview").attr("data-name",username_);
	
				obj.text("收起");
				obj.attr("data-open",1);
				return false;
			}
		}
		else{
			jointly1();
	
			obj.text("回复");
			obj.attr("data-open",0);
			$(".details_").animate({opacity:'0',height:'0px'});
		}
	});
}
reply_reply();

//二级、三级提交回复的内容
function ReviewReview(){
		$(".ReviewReview").on("click",function(){
		var obj = $(this);
		var uid = obj.attr("data-uid");
		var id = obj.attr("data-id");//一级评论ID
		var touid=obj.attr('data-touid');//回复目标的用户ID
		var pid_sub=obj.attr('data-pid_sub');
		var val = obj.prev().find("textarea").val();
		var dataClass = obj.attr("data-class");
		var dataI = parseInt($(".blockquote_wrap").attr("data-i"));
		var ReplyNum = parseInt(obj.parents('.blockquote_wrap').attr('data-count'));
		
		if ( val=="" ) {
			layer.msg("回复内容不能为空哦！");
		}
		else if(String(val).length <= 10){
			layer.msg('评论内容不能少于10个字的长度！');
			return false;
		}
		else if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
			layer.msg('评论内容不能只输入空格！');
			return false;
		}
		else{
			if (dataClass == 2) {
				$.ajax({
					url: "/index.php?m=api&c=comment&v=comment",
					data: {
						rid: rid,
						type: dataType,
						content: val,
						pid: id,
						pid_sub: pid_sub,
						touid: touid
					},
					type:"POST",
					success:function (res) {
						var data=JSON.parse(res);
						if( data.status==1 ){
							layer.msg(data.tips);
							var res = data.datas;
							var new_str=replace_em(val);
							var html =  '<div class="module fix">'+
											'<div class="comment_blockquote">'+
												'<div class="comment_conWrap">'+
													'<div class="comment_con"><span class="name name0">'+res.username+'</span> <span class="name"><i>回复</i> '+res.to_username+'：</span><span class="matter"> ：'+new_str+'</span></div>'+
												'</div>'+
												'<div class="BarSubmenu">'+
							                    	'<div class="leftSubmenu">'+
							                    		'<span class="addtime">'+res.addtime+'</span>'+
								                    	'<span class="zan" onclick="zan(this,'+res.id+')" data-nature="review">'+
								                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
								                    		'<i>0</i>'+
								                    	'</span>'+
							                    	'</div>'+
							                    '</div>'+
											'</div>'+
										'</div>';
							obj.parents().next(".blockquote_wrap").attr("ReplyNum",ReplyNum+1);
							
							obj.parents('.blockquote_wrap').append(html);
							obj.prev().find("textarea").val('');
						}
						else{
							layer.msg(data.tips);
							return false;
						}
					},
					error:function (res) { }
				});
			}
			jointly2();
//			jointly0();
		}
	});
}
ReviewReview();



//翻页
$(".pageTurning").on("click",function(){
	var length = $("#navigation").attr("data-type"); //判断当前是按时间  或按热度排列
	var htmll="",page;

	var nowPage = parseInt($(".pages").attr("data-nowPage")); //获取当前页码
	var atPresent = $(this).text();       //当前点击的页码
	
	if(parseInt(atPresent)==nowPage){
		return false;
	}
	else{
		
		var index = $("#pageComposer .on").index();
		
		if(atPresent=="上一页"){
			page=parseInt(nowPage)-1;
			
			$("#pageComposer").children("li").eq(index-1).addClass("on");
	        $("#pageComposer").children("li").eq(index-1).siblings().removeClass("on");
	        $(".pages").attr("data-nowPage",page);
		}
		else if(atPresent=="下一页"){
			var examine = parseInt($(this).parent().prev().find("a").text());
			if(nowPage == examine){
				return false;
			}
			else{
				page=parseInt(nowPage)+1;
				$(".pages").attr("data-nowPage",page);
				$("#pageComposer").children("li").eq(index+1).addClass("on");
		        $("#pageComposer").children("li").eq(index+1).siblings().removeClass("on");
			}
		}
		else{
			page=parseInt(atPresent);
			$(this).parent("li").addClass("on");
	        $(this).parent("li").siblings().removeClass("on");
	        $(".pages").attr("data-nowPage",page);
		}
		$("#receptacle").html(htmll);
		jointly3(rid,dataType,page,length,htmll);
	}
});
//评论功能   结束