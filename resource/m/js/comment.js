/*2018-10-11
 * HQS
 * 
 * 
 * 评论  + 回复   公共 JS代码
 * */


var rid=$("#UniqueValue").attr("data-rid");//文章的ID
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var url;

//进入页面直接赋值
function from_url(){
	window.from_url = $("#from_url").val();
	$(".from_url").attr("href","/index.php?m=wap&c=index&v=login&from="+from_url);
	
}
from_url();

var html2;
html2 = '<div class="nologin">'+
            '<div class="nologinbtn">'+
                '<a class="from_url" href="/index.php?m=wap&c=index&v=login&from='+from_url+'">登录</a>'+
                '<a href="/index.php?m=wap&c=index&v=reg" target="_blank">注册</a>'+
            '</div>'+
        '</div>';


//提取公共方法3
function jointly3(rid,dataType,page,length,htmll){
	$.ajax({
        url:'/index.php?m=api&c=comment&v=comment_list',
        data:{ 'rid':rid,
		        'type':dataType,  //1-日志 2-视频 3-游记 4-问答
		        'page':page,
		        'sort_type': length //排序方式,1-按发布时间，2-按照热度
	        },
        type:'post',
        dataType:'json',
        beforeSend:function(){
        	$(".tips").text("");
			$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
            flag = false;
        },
        success:function( data ){
	        if(data.status == 1){
				$.each(data.tips,function(i,item){
					htmll +='<li><div class="tit">'+
		                        '<a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id='+data.tips[i].id+'">'+
				                    '<i style="background-image: url('+data.tips[i].headpic+');"></i>'+
				                    '<h3><b class="username_{{$vo.uid}}">'+data.tips[i].username+'</b></h3>'+
				                    '<span class="addtime">'+data.tips[i].addtime+'</span>'+
				                '</a>'+
		                    '</div>'+
		                    '<div class="substance" data-replyNum="'+data.tips[i].count+'">'+
		                    	'<div class="txtt"><p>'+data.tips[i].content+'</p></div>'+
			                    '<div class="BarSubmenu">'+
			                    	'<span class="reply replyReview" data-id="'+data.tips[i].id+'" data-open="0" data-class="1">回复</span>'+
			                    	'<div class="leftSubmenu">'+
				                    	'<span class="zan" onclick="zan(this,'+data.tips[i].id+')" data-nature="review">'+
				                    		'<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>'+
				                    		'<i>'+data.tips[i].top_num+'</i>'+
				                    	'</span>'+
			                    	'</div>'+
			                    '</div>'+
			
			                    //<!--回复【评论】的文本框-->
			                    '<div class="m-publish details_stair" data-tid="'+data.tips[i].id+'">'+
					                '<div class="wp">'+
					                    '<div class="content">'+
					                        '<div class="top"><span class="emotion'+data.tips[i].id+'" onclick="emotion('+data.tips[i].id+')"></span></div>'+
					                        '<textarea id="comment'+data.tips[i].id+'" placeholder="写下您的感受......."></textarea>';
					            if(data.tips.is_login==0){
					                htmll +=html2;
					            }
					            htmll +='</div>'+
					                    '<span class="btn btnComment_Review" data-touid="'+data.tips[i].uid+'" data-id="'+data.tips[i].id+'" data-class="1" data-name="">发表回复</span>'+
					                '</div>'+
					            '</div>'+
					            
					            //<!--对应评论的所有回复-->
					            '<div class="blockquote_wrap" data-i="'+data.tips[i].lou+'" data-count="'+data.tips[i].count+'">';
					if( data.tips[i].sub != undefined || data.tips[i].sub!=[] ){
		                for ( var k=0;k<data.tips[i].sub.length;k++ ){
		                    htmll +='<div class="module fix">'+
			                            '<div class="comment_blockquote">'+
			                                '<div class="comment_conWrap">'+
			                                    '<div class="comment_con">'+
			                                        '<span class="name">'+data.tips[i].sub[k].username+' </span><span class="name"><i>回复</i> '+data.tips[i].sub[k].to_username+'：</span>'+
			                                        '<span class="matter">'+data.tips[i].sub[k].content+'</span>'+
			                                    '</div>'+
			                                '</div>'+
			                                '<div class="BarSubmenu">'+
						                    	'<span class="reply reply_reply" data-id="'+data.tips[i].sub[k].id+'" data-open="0" data-class="2">回复</span>'+
						                    	'<div class="leftSubmenu">'+
						                    		'<span class="addtime">'+data.tips[i].addtime+'</span>'+
							                    	'<span class="zan" onclick="zan(this,'+data.tips[i].sub[k].id+')" data-nature="review">'+
							                    		'<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>'+
							                    		'<i>'+data.tips[i].sub[k].top_num+'</i>'+
							                    	'</span>'+
						                    	'</div>'+
						                    '</div>'+
		
			                                //<!--回复的弹出框-->
			                                '<div class="m-publish details_">'+
			                                    '<div class="wp">'+
			                                        '<div class="content">'+
			                                            '<div class="top"><span class="emotion'+data.tips[i].sub[k].top_num+'" onclick="emotion('+data.tips[i].sub[k].top_num+')"></span></div>'+
			                                            '<textarea id="comment'+data.tips[i].sub[k].top_num+'" placeholder="写下您的感受......."></textarea>';
								            if(data.tips.is_login==0){
								                htmll +=html2;
								            }
								            htmll +='</div>'+
			                                        '<span data-touid="'+data.tips[i].sub[k].uid+'" data-id="'+data.tips[i].sub[k].id+'" data-pid_sub="'+data.tips[i].sub[k].id+'" data-class="2" class="btn btnComment_">发表回复</span>'+
			                                    '</div>'+
			                                '</div>'+
			                            '</div>'+
			                        '</div>';
		                }
		           	}
					    htmll +='</div>'+
		                    '</div>'+
		                '</li>';
	           	});
	            $("#receptacle").append(htmll);

	            replyReview();      //回复评论   弹出输入框
	            btnComment_Review();//提交对【评论】的回复
	            
	            reply_reply();      //回复回复   弹出输入框
	            btnComment_();      //提交对二级、三级回复的回复}
	        }
	        else{
	        	layer.msg( data.tips);
	        }
        },
        complete:function(){
        	$(".tips").html("");
        	$("html,body").animate({ scrollTop: $("#navigation").offset().top-92 }, {duration: 500,easing: "swing"});
        }
    });
}

//按热度、时间  切换导航
$(".press").on("click",function(){
	var length = $(this).index();
	var htmll="",page=1;
	$(this).addClass("onn");
	$(this).siblings().removeClass("onn");
	length=length+1;
	$("#navigation").attr("data-type",length);//判断当前是按时间  或按热度排列
	$("#receptacle").html(htmll);
	
	$("#pageComposer").children().eq(0).addClass("on");
    $("#pageComposer").children().eq(0).siblings().removeClass("on");
    $(".pages").attr("data-nowPage",1);
	
	jointly3(rid,dataType,page,length,htmll);
});

//输入框 【评论】  点击表情 按钮
$('.emotion').qqFace({
    id : 'facebox', 
    assign:'comment', 
    path:'/resource/arclist/' //表情存放的路径
});

//输入框 【回复】  点击表情 按钮
function emotion(id){
	var comment= 'comment'+id;
	$('.emotion'+id).qqFace({
	    id : 'facebox',
	    assign:comment, 
	    path:'/resource/arclist/' //表情存放的路径
	});
}
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];

function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img style="display: inline-block;" src="/resource/arclist/$1.gif" border="0" />');
    return str;
}








//提交  评论
$(".btnComment").on("click",function(){
    var val = $("#comment").val();//文章的内容
	var that=this;

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
        	var html;
        	var new_str=replace_em(val);
            html =  '<li><div class="tit">'+
	                        '<a class="dis_block fix" href="/index.php?m=wap&c=muser&v=index&id=224">'+
			                    '<i style="background-image: url('+res.datas.headpic+');"></i>'+
			                    '<h3><b class="username_'+res.datas.uid+'">'+res.datas.username+'</b></h3>'+
		                    	'<span class="addtime">'+res.datas.addtime+'</span>'+
			                '</a>'+
	                    '</div>'+
	                    '<div class="substance">'+
	                    	'<div class="txtt"><p>'+new_str+'</p></div>'+
	                    	'<div class="BarSubmenu">'+
		                    	'<div class="leftSubmenu">'+
			                    	'<span class="zan" onclick="zan(this,'+res.datas.id+')" data-nature="review">'+
			                    		'<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>'+
			                    		'<i>0</i>'+
			                    	'</span>'+
		                    	'</div>'+
		                    '</div>'+
		                    '<div class="m-publish details_stair" data-tid="'+rid+'">'+
				                '<div class="wp">'+
				                    '<div class="content">'+
				                        '<div class="top"><span class="emotion"></span></div>'+
				                        '<textarea id="comment'+res.datas.id+'" placeholder="写下您的感受......."></textarea>'+
				                    '</div>'+
				                    '<span class="btn btnComment_Review" data-touid="'+res.datas.uid+'" data-id="'+res.datas.id+'" data-class="1" data-name="">发表回复</span>'+
				                '</div>'+
				            '</div>'+
				            '<div class="blockquote_wrap" data-i="{{$k+1}}" data-count="{{$vo.count}}"></div>'+
	                    '</div>'+
	                '</li>';
            $(".ul-imgtxt4").prepend(html);
            emotion(res.datas.id);
			$('#comment').val('');
        }
    },"JSON");
});



//提取公共方法1
function jointly1(){
	$(".replyReview").text("回复");
    $(".replyReview").attr("data-open",0);
    $(".details_stair").animate({opacity:'0',height:'0px'},100);
}
//提取公共方法2
function jointly2(){
	jointly1();
	
	$(".reply_reply").text("回复");
    $(".reply_reply").attr("data-open",0);
    $(".details_").animate({opacity:'0',height:'0px'},100);
}

//对【评论 】进行回复   弹出输入框
function replyReview(){
	$(".replyReview").on("click",function(){
		var id = $(this).attr("data-id");
		var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = $(this).attr("data-open");
		
		jointly2();
		
		if( dataOpen == 0 ){//打开评论
	        if( dataClass == 1 ){//对顶级节点的回复
	        	$(this).parent().next(".details_stair").animate({opacity:'1',height:'158px'});
	        	var username_ = $(this).parent().parent().prev().find("b").text();
	        	$(this).parent().next(".details_stair").find(".btnComment_").attr("data-name",username_);
	        	
	        	$(this).text("收起");
		        $(this).attr("data-open",1);
		        return false;
	        }
		}
		else{//关闭评论
			jointly2();
		}
	});
}
replyReview();

//提交对【评论】回复的内容
function btnComment_Review(){
	$(".btnComment_Review").on("click",function(){
		var obj = $(this);
		var ReplyNum = parseInt(obj.parent().parent().next('.blockquote_wrap').attr('data-count')); //获取这个评论的回复总数
		var id = obj.attr("data-id");//一级评论ID
		var touid=obj.attr('data-touid');//回复目标的用户ID
	    var val = obj.prev().find("textarea").val();//评论内容
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
												'<div class="comment_floor">'+(ReplyNum+1)+'楼</div>'+
												'<div class="comment_conWrap">'+
													'<div class="comment_con"><span class="name">'+res.username+'</span> 说 ：<span class="matter">'+new_str+'</span></div>'+
												'</div>'+
												'<div class="BarSubmenu">'+
							                    	'<div class="leftSubmenu">'+
							                    		'<span class="addtime">'+res.addtime+'</span>'+
								                    	'<span class="zan" onclick="zan(this,'+res.id+')" data-nature="review">'+
								                    		'<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>'+
								                    		'<i>0</i>'+
								                    	'</span>'+
							                    	'</div>'+
							                    '</div>'+
												'<div class="m-publish details_ marginTop details_" data-uid="'+res.uid+'">'+
													'<div class="wp">'+
														'<div class="content">'+
															'<div class="top"><span class="emotion"></span></div>'+
															'<textarea id="comment'+res.uid+'" placeholder="写下您的感受......."></textarea>'+
														'</div>'+
														'<span class="btn btnComment_" data-touid="'+res.uid+'" data-id="'+id+'" data-pid_sub="'+res.id+'" data-class="2" data-name="">发表回复</span>'+
													'</div>'+
												'</div>'+
											'</div>'+
										'</div>';
							obj.parents().next(".blockquote_wrap").append(html);
							obj.parent().parent().next('.blockquote_wrap').attr('data-count',parseInt(ReplyNum)+1);
							obj.prev().find("textarea").val('');
							emotion(res.id);
						}else{
							layer.msg(data.tips);
							return false;
						}
					},
					error:function (data) { }
				})
		    }
	        jointly1();
	    }
	});
}
btnComment_Review();




//对回复 点击 回复    弹出输入框
function reply_reply(){
	$(".reply_reply").on("click",function(){
		var obj = $(this);
		var uid = obj.attr("data-uid");
		var dataClass = obj.attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = obj.attr("data-open");
	
		jointly2();
	
		if( dataOpen == 0 ){
			if( dataClass == 2 ){
				obj.parent().next(".details_").animate({opacity:'1',height:'168px'});
				var username_ = obj.parent().prev().find(".name0").text();
				obj.parent().next(".details_").find(".btnComment_").attr("data-name",username_);
	
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
function btnComment_(){
		$(".btnComment_").on("click",function(){
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
												'<div class="comment_floor">'+(ReplyNum+1)+'楼</div>'+
												'<div class="comment_conWrap">'+
													'<div class="comment_con"><span class="name name0">'+res.username+'</span> <span class="name"><i>回复</i> '+res.to_username+'：</span><span class="matter"> ：'+new_str+'</span></div>'+
												'</div>'+
												'<div class="BarSubmenu">'+
							                    	'<div class="leftSubmenu">'+
							                    		'<span class="addtime">'+res.addtime+'</span>'+
								                    	'<span class="zan" onclick="zan(this,'+res.id+')" data-nature="review">'+
								                    		'<img class="icon_like" src="/resource/m/images/common/icon_review1.png"/>'+
								                    		'<i>0</i>'+
								                    	'</span>'+
							                    	'</div>'+
							                    '</div>'+
												'<div class="m-publish details_ marginTop details_" data-uid="">'+
													'<div class="wp">'+
														'<div class="content">'+
															'<div class="top"><span class="emotion"></span></div>'+
															'<textarea id="comment'+res.uid+'" placeholder="写下您的感受......."></textarea>'+
														'</div>'+
														'<span class="btn btnComment_" data-uid="" data-class="2" data-name="">发表回复</span>'+
													'</div>'+
												'</div>'+
											'</div>'+
										'</div>';
							obj.parents().next(".blockquote_wrap").attr("ReplyNum",ReplyNum+1);
							
							obj.parents('.blockquote_wrap').append(html);
							obj.prev().find("textarea").val('');
							emotion(res.id);
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
		}
	});
}
btnComment_();




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