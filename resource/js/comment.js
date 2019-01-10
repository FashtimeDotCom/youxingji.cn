/*2018-10-11
 * HQS
 * 
 * 【PC端】
 * 日志、视频、游记详情页 
 * 
 * 评论  + 回复   公共 JS代码
 * */


//评论框 获取焦点   日志详情页、视频详情页
$("#comment").focus(function(){
	if($(".original .content").height()==40){
		$(".original .content").animate({"border":"1px #e0dede solid","padding":"10px"});
		$(this).animate({"height":"70px","line-height":"22px"});
		$(".addComment,.commentNumWords").animate({"height":"32px"});
		jointly2();
	}
});
//监控 回复框正文内容  通过键盘输入
function judgeIsNonNull2(obj){
	var value=$(obj).val();
	var x = event.which || event.keyCode;
	if( value.length <= 255 ){
		//console.log("符合255位数以内");
	}
	else{
		return $(obj).val(value.substr(0, 255));
	}
	var remain = $(obj).val().length;
	if(remain > 255){
		$(obj).val(setString($(obj).val(),255));
		$(obj).parent(".content").siblings(".numberWords").find("i").html(255-remain);
	}
	else{
		$(obj).parent(".content").siblings(".numberWords").find("i").html(255-remain);
	}
}
//监控 回复框正文内容 通过粘贴板 输入
function  inputBox(){
	$(".inputBox").focus(function(){
		//监控 正文内容输入框 ，包括粘贴板
		$(this).bind('input propertychange', function(){
			judgeIsNonNull2(this)
		});
	});
}
inputBox();



var rid=$("#UniqueValue").attr("data-rid");//文章的ID
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var userRegister = parseInt($("#userRegister").val()); //判断用户是否登陆，如果用户已登录 这个值将不存在页面
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
	var uid = $("#uid").attr("data-uid");
    var val = $("#comment").val();//文章的内容
	var obj = $(this);
	
    if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
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
            html =  '<li><div class="details">'+
							'<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'" style="background-image: url('+res.datas.headpic+');" target="_blank"></a>'+
	                        '<h3><a class="username_" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'">'+res.datas.username+'</a>'+
		                    	'<em class="addtime">'+res.datas.addtime+'</em>'+
		                    	'<a class="zan" onclick="zan(this,'+res.datas.id+')" data-nature="review" href="javascript:;">'+
		                    		'<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
		                    		'<i>0</i>'+
		                    	'</a>'+
		                    '</h3>'+
	                    '</div>'+
	                    '<div class="substance"><div class="description whiteSpace">'+new_str+'</div></div>'+
	                '</li>';
            $(".ul_imgtxt4").prepend(html);
			$('#comment').val('');
			jointly0();
			obj.next().find("i").text(255);
        }
    },"JSON");
});

//提取公共方法0
function jointly0(){  //评论框  缩回去
	$(".original .content").animate({"border":"none","padding":"0px"});
	$("#comment").animate({scrollTop: "0px","height":"40px","line-height":"40px"});
	$(".addComment,.commentNumWords").animate({"height":"0px"});
}

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
		jointly0();
		if( dataOpen == 0 ){//打开评论
	        if( dataClass == 1 ){//对顶级节点的回复
	        	$(this).parent().next(".details_stair").animate({opacity:'1',height:'136px'});
	        	var username_ = $(this).parent().parent().prev().find("b").text();
	        	$(this).parent().next(".details_stair").find(".ReviewReview").attr("data-name",username_);
	        	
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
	    var val = obj.prev().find("textarea").val();//评论内容
	    var dataClass = obj.attr("data-class");
	    var dataI = parseInt($(".blockquote_wrap").attr("data-i"));

	    if ( val=="" ) {
	    	layer.msg("回复内容不能为空哦！");
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
								                    	'<a class="zan" onclick="zan(this,'+res.id+')" data-nature="review" href="javascript:;">'+
								                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
								                    		'<i>0</i>'+
								                    	'</a>'+
							                    	'</div>'+
							                    '</div>'+
											'</div>'+
										'</div>';
							obj.parents().next(".blockquote_wrap").append(html);
							obj.parent().parent().next('.blockquote_wrap').attr('data-count',parseInt(ReplyNum)+1);
							obj.prev().find("textarea").val('');
							obj.next().find("i").text(255);
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
ReviewComment();

//对回复 点击 回复    弹出输入框
function reply_reply(){
	$(".reply_reply").on("click",function(){
		var obj = $(this);
		var uid = obj.attr("data-uid");
		var dataClass = obj.attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = obj.attr("data-open");
	
		jointly2();
		jointly0();
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
								                    	'<a class="zan" onclick="zan(this,'+res.id+')" data-nature="review" href="javascript:;">'+
								                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
								                    		'<i>0</i>'+
								                    	'</a>'+
							                    	'</div>'+
							                    '</div>'+
											'</div>'+
										'</div>';
							obj.parents().next(".blockquote_wrap").attr("ReplyNum",ReplyNum+1);
							
							obj.parents('.blockquote_wrap').append(html);
							obj.prev().find("textarea").val('');
							obj.next().find("i").text(255);
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
			jointly0();
		}
	});
}
ReviewReview();

var dataExist = parseInt($("#cur_page").attr("data-exist"));            //判断评论是否足够多，而出现 翻页使用的 页码器
var total_page = parseInt($("#total_page").text());                     //评论总页数

var html2;
html2 = '<div class="nologin">'+
            '<div class="nologinbtn">'+
                '<a class="from_url" href="/index.php?m=index&c=index&v=login&from='+from_url+'">登录</a>'+
                '<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>'+
            '</div>'+
        '</div>';

//提取公共方法3
function jointly3(rid,dataType,target_page,length,htmll,display_page,offset){
	$.ajax({
        url:'/index.php?m=api&c=comment&v=comment_list',
        data:{ 'rid':rid,
		        'type':dataType,  //1-日志 2-视频 3-游记 4-问答
		        'page':target_page,
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
					htmll +='<li><div class="details">'+
									'<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'" style="background-image: url('+data.tips[i].headpic+');" target="_blank"></a>'+
			                        '<h3><a class="username_" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'">'+data.tips[i].username+'</a>'+
				                    	'<em class="addtime">'+data.tips[i].addtime+'</em>'+
				                    	'<a class="zan" onclick="zan(this,'+data.tips[i].id+')" data-nature="review" href="javascript:;">'+
				                    		'<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
				                    		'<i>'+data.tips[i].top_num+'</i>'+
				                    	'</a>'+
				                    '</h3>'+
			                    '</div>'+
			                    '<div class="substance" data-replyNum="'+data.tips[i].count+'">'+
			                    	'<div class="description whiteSpace">'+data.tips[i].content+'</div>'+
				                    '<div class="BarSubmenu"><a class="reply replyReview" data-id="'+data.tips[i].id+'" data-open="0" data-class="1" href="javascript:;">回复</a></div>'+
				
				                    //<!--回复【评论】框-->
				                    '<div class="m-publish details_stair" data-tid="'+data.tips[i].id+'">'+
						                '<div class="wp">'+
						                    '<div class="content">'+
						                        '<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>';
								            if( userRegister == 0 ){//判断用户是否登陆，没有登录则有遮罩层挡住输入框
								                htmll +=html2;
								            }
						            htmll +='</div>'+
						                    '<a class="btn ReviewComment" data-touid="'+data.tips[i].uid+'" data-id="'+data.tips[i].id+'" data-class="1" data-name="" href="javascript:;">发表回复</a>'+
						                    '<span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>'+
						                '</div>'+
						            '</div>';
						            
						            //<!--所有回复-->
						            if( data.tips[i].count > 3 ){
						            	var paddingBottom = "paddingBottom";
						            }
						    htmll +='<div class="blockquote_wrap '+paddingBottom+'" data-i="'+data.tips[i].lou+'" data-count="'+data.tips[i].count+'">';
						if( data.tips[i].sub != undefined || data.tips[i].sub!=[] ){//判断 回复的数组不等于undefined，也不等于空数组[]
							if( data.tips[i].sub.length>3 ){//判断 回复的总条数是否大于三条，是则隐藏超出三条的
								var length =3;
								var htmlllll='<p class="hint dis_block">还有<i class="Iclass">'+(data.tips[i].count-3)+'</i>条回复，<a class="seeMore" href="javascript:;" onclick="seeMore(this)">查看更多</a></p>';
							}
							else{
								var length =data.tips[i].sub.length;
								var htmlllll="";
							}
			                for ( var k=0;k<data.tips[i].sub.length;k++ ){
			                	if ( k>=3 ) {
			                		var clas = "dis_none";
			                	}
			                	else{
			                		var clas = "";
			                	}
			                    htmll +='<div class="module fix '+clas+'">'+
				                            '<div class="comment_blockquote">'+
				                            	'<div class="comment_floor">'+(k+1)+'楼</div>'+
				                                '<div class="comment_conWrap">'+
				                                    '<div class="comment_con">'+
				                                        '<span class="name">'+data.tips[i].sub[k].username+' </span><span class="name"><i>回复</i> '+data.tips[i].sub[k].to_username+'：</span>'+
				                                        '<span class="matter">'+data.tips[i].sub[k].content+'</span>'+
				                                    '</div>'+
				                                '</div>'+
				                                '<div class="BarSubmenu">'+
							                    	'<a class="reply reply_reply" data-id="'+data.tips[i].sub[k].id+'" data-open="0" data-class="2" href="javascript:;">回复</a>'+
							                    	'<div class="leftSubmenu">'+
							                    		'<span class="addtime">'+data.tips[i].addtime+'</span>'+
								                    	'<a class="zan" onclick="zan(this,'+data.tips[i].sub[k].id+')" data-nature="review" href="javascript:;">'+
								                    		'<img class="icon_like2" src="/resource/m/images/common/icon_like.png"/>'+
								                    		'<i>'+data.tips[i].sub[k].top_num+'</i>'+
								                    	'</a>'+
							                    	'</div>'+
							                    '</div>'+
	
				                                //<!--回复【回复】框-->
				                                '<div class="m-publish details_">'+
				                                    '<div class="wp">'+
				                                        '<div class="content">'+
				                                            '<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgeIsNonNull2(this)"></textarea>';
											            if( userRegister == 0 ){//判断用户是否登陆，没有登录则有遮罩层挡住输入框
											                htmll +=html2;
											            }
									            htmll +='</div>'+
				                                        '<a class="btn ReviewReview" data-touid="'+data.tips[i].sub[k].uid+'" data-id="'+data.tips[i].sub[k].id+'" data-pid_sub="'+data.tips[i].sub[k].id+'" data-class="2" href="javascript:;">发表回复</a>'+
				                                        '<span class="numberWords">还可输入 <i class="Iclass">255</i> 个字</span>'+
				                                    '</div>'+
				                                '</div>'+
				                            '</div>'+
				                        '</div>';
			                }
			           	}
						    	htmll +=htmlllll;
						    htmll +='</div>'+
			                    '</div>'+
			                '</li>';
	           	});
	            $("#receptacle").append(htmll);
				$("#cur_page").val(target_page);
				//组装分页
				multipages(target_page,total_page,display_page,offset);

	            replyReview();      //回复评论   弹出输入框
	            ReviewComment();    //提交对【评论】的回复
	            
	            reply_reply();      //回复回复   弹出输入框
	            ReviewReview();     //提交对二级、三级回复的回复
	            inputBox();         //监控文本输入框粘贴板
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
	var htmll="";
	$(this).addClass("onn");
	$(this).siblings().removeClass("onn");
	length=length+1;
	$("#navigation").attr("data-type",length);//判断当前是按时间  或按热度排列
	$("#receptacle").html(htmll);
	
	$("#pageComposer").children().eq(0).addClass("on");
    $("#pageComposer").children().eq(0).siblings().removeClass("on");
	
	var target_page=1; //组装分页器的第一页
	var display_page=5;
	var offset=2;//常量，分页显示前后2
	jointly3(rid,dataType,1,length,htmll,display_page,offset);
});


//翻页
function turn_page(page){
	var curent_page=$('#cur_page').val();//当前页
	var display_page=5;
	var offset=2;//常量，分页显示前后2

	var target_page=0;
	
	var length = $("#navigation").attr("data-type"); //判断当前是按时间  或按热度排列
	var htmll="";
	
	if( page =='pre' ){//上一页
		target_page=parseInt(curent_page)-1;
	}
	else if( page=='next' ){//下一页
		target_page=parseInt(curent_page)+1;
	}
	else{//number
		if( page == "... "+total_page ){
			page=page.replace(/.../,'');
		}
		target_page=parseInt(page);
	}

	//选择页面  等于  当前页
	if( parseInt(curent_page) == target_page ){
		return false;
	}
	$("#receptacle").html(htmll);
	jointly3(rid,dataType,target_page,length,htmll,display_page,offset);
}

//组装分页 页码器
function multipages(target_page,total_page,standar_page,offset){
	var from=0;
	var to=0;

	if( total_page < standar_page ){
		from=1;
		to=total_page;
	}
	else{
		from=target_page - offset;
		to=from + standar_page -1;
		if ( from < 1) {
			from =1;
			to = from + standar_page - 1;
		}
		else if (to > total_page) {
			from = total_page - standar_page + 1;
			to = total_page;
		}
	}

	if( target_page >1 ){
		$(".pages-prev").removeClass('dis_none');
	}
	else{
		$(".pages-prev").addClass('dis_none');
	}

	if( target_page >= total_page ){
		$('.pages-next').addClass('dis_none');
	}
	else{
		$('.pages-next').removeClass('dis_none');
	}

	var html="";
	var class_on="";
	if( from >1 ){
		html +='<li class="li_1 li"><a href="javascript:;" onclick="turn_page(1)">1..</a></li>';
	}

	for( var i=from; i<=to;i++ ){
		if( i == target_page ){
			class_on='on';
		}
		html +='<li class="li_'+i+' li '+class_on+'"><a href="javascript:;" onclick="turn_page('+i+')">'+i+'</a></li>';
		class_on="";
	}

	if( to < total_page ){
		html +='<li class="li_'+total_page+' li"><a href="javascript:;" onclick="turn_page('+total_page+')">..'+total_page+'</a></li>';
	}

	$('li.li').remove();
	$('.pages-prev').after(html);
}

//监控  页码框输入框 ，包括粘贴板
function judgeIsNonNull3(event){
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
	judgeIsNonNull3(event);
});

//跳转
function check(){
	var page = $('#pages').val();//跳转
	var cur_page = $(".li.on a").text();   //当前页
	if (page>total_page || page<1) {
		layer.msg("不在页数范围内!");
		return false;
	}
	if( cur_page == page ){
		layer.msg("该页码已经是当前页!");
		return false;
	}
	else{
		turn_page(page);
	}
}


//敲回车 跳转页面
function on_return(){
	if(window.event.keyCode == 13){
		if(document.all('pageqr') != null) {
			document.all('pageqr').click();
		}
	}
}

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

//查看更多评论回复
//function seeMore(obj,id){
//  var obj = $(obj);
//  var dataList = parseInt(obj.attr("data-list"));                       //点击“查看更多”按钮的次数，从1开始
//  var count = parseInt($("#return"+id).text());               //获取这个回答的评论总数
//  var page = parseInt($("#receptacle"+id).attr("data-page")); //获取这个回答评论的当前页数
//
//	if( dataList == 1 ){
//		var length = $("#receptacle"+id).children("li").length;
//	    for(var i=3;i<=length;i++){
//	        $("#receptacle"+id).children("li.module").eq(i).removeClass("dis_none");
//	    }
//	    if( count>10 ){//判断剩余的评论总是是否大于10条
//	    	$("#return"+id).text(count-7);
//	    	$("#receptacle"+id).attr("data-page",page+1);
//	    	obj.attr("data-list",dataList+1);
//	    }
//	    else{
//	    	obj.parent(".hint").addClass("dis_none");
//			$("#return"+id).text("");
//	    }
//	}
//	else{
//		$.ajax({
//	        url:"/index.php?m=api&c=Comment&v=get_comment_page_list",
//	        data:{
//	            id:rid,    //当前该问题的ID
//	            pid: id,   //当前该回答的ID
//	            page: page,//页数
//	        },
//	        type:"POST",
//	        success:function (res){
//	            var res = JSON.parse(res);
//	            if( res.status==0 ){
//	                var htmll="";
//	                $.each(res.data,function(i,item){
//	                    htmll +='<li class="module fix">'+
//                                  '<div class="details">'+
//                                      '<a class="headPortrait" href="index.php?m=index&c=muser&v=index&id='+res.data[i].uid+'" style="background-image: url('+res.data[i].headpic+');" target="_blank"></a>'+
//                                      '<h3><a class="username_" href="index.php?m=index&c=muser&v=index&id='+res.data[i].uid+'">'+res.data[i].username+'</a> ';
//                              if( res.data[i].touid != 0 ){
//									htmll +='对 <span class="username_" href="javascipt:;">'+res.data[i].to_username+'</span> 说：';
//                              }
//                                  htmll +='<a class="zan" onclick="zan(this,'+res.data[i].id+')" data-nature="review" href="javascript:;">'+
//												'<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
//												'<i>'+res.data[i].top_num+'</i>'+
//											'</a>'+
//                                          '<em class="addtime">'+res.data[i].addtime+'</em>'+
//                                      '</h3>'+
//                                  '</div>'+
//                                  '<div class="substance">'+
//                                      '<div class="description whiteSpace">'+res.data[i].content+'</div>'+
//                                      '<div class="BarSubmenu">'+
//                                          '<a class="reply replyReview" onclick="replyFunction(this)" href="javascript:;" data-id="'+res.data[i].id+'" data-open="0">回复</a>'+
//                                      '</div>'+
//                                      //<!--回复【评论】框-->
//					                    '<div class="m-publish details_stair" data-tid="'+res.data[i].id+'">'+
//							                '<div class="wp">'+
//							                    '<div class="content">'+
//							                        '<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>';
//						                if( userRegister == 0 ){//判断用户是否登陆，没有登录则有遮罩层挡住输入框
//							                htmll +='<div class="nologin">'+
//													    '<div class="nologinbtn">'+
//													    	'<a class="from_url" href="/index.php?m=index&c=index&v=login&from='+from_url+'">登录</a>'+
//													    	'<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>'+
//													    '</div>'+
//												    '</div>';
//									    }
//							            htmll +='</div>'+
//							                    '<div class="bottomArea fix">'+
//								                    '<a class="btn ReviewComment" data-touid="'+res.data[i].uid+'" data-id="'+res.data[i].pid+'" data-name="'+res.data[i].username+'" href="javascript:;">回复评论</a>'+
//								                    '<span class="wordLimit"><i class="Iclass">0</i> /255字</span>'+
//							                    '</div>'+
//							                '</div>'+
//							            '</div>'+
//									'</div>'+
//								'</li>';
//	                });
//					$("#receptacle"+id).append(htmll);
//			    	$("#receptacle"+id).attr("data-page",page+1);
//	                if( count-10 <= 0 ){
//	                	$("#return"+id).text("0");
//	                	obj.addClass("dis_none");
//	                }
//	                else{
//	                	$("#return"+id).text(count-10);
//	                }
//			    	obj.attr("data-list",dataList+1);
//			    	replyFunction(obj);
//			    	ReviewComment();
//	            }
//	            else{
//	                layer.msg(res.msg);
//	                return false;
//	            }
//	        },
//	        error:function (data) { }
//	    });
//	}
//}