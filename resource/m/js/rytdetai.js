/*2018-10-11
 * HQS
 * 
 * 日阅潭、游记
 * */



//对【评论 】进行回复
$(".replyReview").click(function(){
	var uid = $(this).attr("data-uid");
	var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
	var dataOpen = $(this).attr("data-open");
	
	shrink();
	
	if ( dataOpen == 0 ) {
        if( dataClass == 1 ){
        	console.log("对评论回复打开");
        	$(this).parent().next(".details_stair").animate({opacity:'1',height:'158px'});
        	var username_ = $(this).parent().parent().prev().find("b").text();
        	console.log("第一次回复的用户名:"+username_);
        	$(this).parent().next(".details_stair").find(".btnComment_").attr("data-name",username_);
        	
        	$(this).text("收起");
	        $(this).attr("data-open",1);
	        return false;
        }
	} else{
		console.log("对评论回复关闭");
		
		shrink();
	}
});

//提交对【评论】的回复
$(".btnComment_Review").click(function(){
	var ReplyNum = parseInt($(this).parents(".substance").attr("data-replyNum")); //获取这个评论的回复总数
	var uid = $(this).attr("data-uid");
	var dataName = $(this).attr("data-name");  //要回复的对象
    var val = $(this).prev().find("textarea").val();
    var floors = $(".blockquote_wrap").children().length;
    var i=1;
    var dataClass = $(this).attr("data-class");
    var dataI = parseInt($(".blockquote_wrap").attr("data-i"));
    console.log("dataI是："+dataI);
    console.log("floors是："+floors);
    if ( val=="" ) {
    	layer.msg("回复内容不能为空哦！");
    } else{
    	if (dataClass == 1) {
    		console.log("没进来1");
    		html =  '<div class="module fix">'+
		    			'<blockquote class="comment_blockquote">'+
		                	'<div class="comment_floor">'+(ReplyNum+1)+'楼</div>'+
		                	'<div class="comment_conWrap">'+
		                		'<div class="comment_con"><span class="name0 name'+i+'">用户名'+(ReplyNum+1)+'</span>：<p class="matter">'+val+'</p></div>'+
		                	'</div>'+
		                	'<p class="reply reply1"><span class="reply_reply" data-uid="'+i+'" data-open="0" data-class="2">回复</span></p>'+
		                '</blockquote>'+
		                '<div class="m-publish details_ marginTop details_'+i+'" data-uid="'+i+'">'+
			                '<div class="wp">'+
			                    '<div class="content" style="position: relative;">'+
			                        '<div class="top" style="margin-top: 0px;">'+
			                            '<a href="javascript:;" class="emotion" style="background-image: url(/resource/m/images/q-icon38.png);"></a>'+
			                        '</div>'+
			                        '<textarea id="saytext'+i+'" placeholder="写下您的感受......."></textarea>'+
			                    '</div>'+
			                    '<a href="javascript:;" class="btn btnComment_" data-uid="'+i+'" data-class="2" data-name="">发表回复</a>'+
			                '</div>'+
			            '</div>'+
			        '</div>';
			$(this).parents().next(".blockquote_wrap").attr("data-i",dataI+1); //【对评论】每多加一个回复，对应该评论的回复总数加1
	    	$(this).parents().next(".blockquote_wrap").append(html);
	    	$(this).parents(".substance").attr("data-replyNum",ReplyNum+1);    //【对评论】每多加一个回复，对应该评论的回复总数加1
	    }

        replyReview();
//      btnComment();

        var status = 0;
        $(".reply_reply").click(function(){
			var uid = $(this).attr("data-uid");
			var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
			var dataOpen = $(this).attr("data-open");

			if( dataOpen == 0 && status==0 ){
				shrink();
		        if( dataClass == 2 ){
		        	console.log("对二回复打开");
		        	$(this).parent().parent().next(".details_").animate({opacity:'1',height:'168px'});
		        	var username_ = $(this).parent().prev().find(".name0").text();
					console.log("二级回复的用户名:"+username_);
					$(this).parent().parent().next(".details_").find(".btnComment_").attr("data-name",username_);
					
					$(this).text("收起");
			        $(this).attr("data-open",1);
			        status=1;
			        alert(dataOpen);
			        
		        }
		        return false;
			}else{
				alert(dataOpen);
				console.log("对二回复关闭");
				shrink();
				status=0;
				return false;
			}
		});
		return false;
    }
});






//对【回复】回复进行回复
function reply_(){
	$(".reply_reply").click(function(){
		var uid = $(this).attr("data-uid");
		var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
		var dataOpen = $(this).attr("data-open");
		
		shrink();
		
		if ( dataOpen == 0 ) {
	        if( dataClass == 2 ){
	        	console.log("对二回复打开");
	        	$(this).parent().parent().next(".details_").animate({opacity:'1',height:'158px'});
	        	var username_ = $(this).parent().prev().find(".name0").text();
				console.log("二级回复的用户名::"+username_);
				$(this).parent().parent().next(".details_").find(".btnComment_").attr("data-name",username_);
				
				$(this).text("收起");
		        $(this).attr("data-open",1);
		        return false;
	        }
		} else{
			console.log("对二回复关闭");
			
			shrink();
		}
	});
}

//提交回复
function btnComment(){
	$(".btnComment_").click(function(){
		var uid = $(this).attr("data-uid");
		var dataName = $(this).attr("data-name");  //要回复的对象
	    var val = $(this).prev().find("textarea").val();
	    var floors = $(".blockquote_wrap").children().length;
	    var i=1;
	    var dataClass = $(this).attr("data-class");
	    var dataI = parseInt($(".blockquote_wrap").attr("data-i"));
	    console.log("dataI是："+dataI);
	    if ( val=="" ) {
	    	layer.msg("回复内容不能为空哦！");
	    } else{
	    	if (dataClass == 2) {
		    	console.log("进来了吧？2");
	    		html =  '<div class="module fix">'+
			    			'<blockquote class="comment_blockquote">'+
			                	'<div class="comment_floor">'+(dataI+1)+'楼</div>'+
			                	'<div class="comment_conWrap">'+
			                		'<div class="comment_con"><span class="name0">用户名'+(dataI+1)+'</span>回复<span class="name">'+dataName+'</span><p class="matter">：'+val+'</p></div>'+
			                	'</div>'+
			                	'<p class="reply reply1"><span class="reply_reply" data-uid="'+(i+1)+'" data-open="0" data-class="2">回复</span></p>'+
			                '</blockquote>'+
			                '<div class="m-publish details_ marginTop details_'+(i+1)+'" data-uid="'+(i+1)+'">'+
				                '<div class="wp">'+
				                    '<div class="content" style="position: relative;">'+
				                        '<div class="top" style="margin-top: 0px;">'+
				                            '<a href="javascript:;" class="emotion" style="background-image: url(/resource/m/images/q-icon38.png);"></a>'+
				                        '</div>'+
				                        '<textarea id="saytext'+(i+1)+'" placeholder="写下您的感受......."></textarea>'+
				                    '</div>'+
				                    '<a href="javascript:;" class="btn btnComment_" data-uid="'+(i+1)+'" data-class="2" data-name="">发表回复</a>'+
				                '</div>'+
				            '</div>'+
				        '</div>';
			    console.log("floors是:"+floors);
			    $(".blockquote_wrap").attr("data-i",dataI+1);
		    	$(".blockquote_wrap").children().eq(floors-1).after(html);
		    }
	        console.log("i是："+i);
	        
    		shrink();

	        $(".reply_reply").click(function(){
				var uid = $(this).attr("data-uid");
				var dataClass = $(this).attr("data-class");  //1 为对文章的评论进行回复     2 为对 回复 进行回复
				var dataOpen = $(this).attr("data-open");
				
				shrink();
				
				if ( dataOpen == 0 ) {
			        if( dataClass == 2 ){
			        	console.log("对二回复打开");
			        	$(this).parent().parent().next(".details_").animate({opacity:'1',height:'168px'});
			        	var username_ = $(this).parent().prev().find(".name0").text();
						console.log("二级回复的用户名:"+username_);
						$(this).parent().parent().next(".details_").find(".btnComment_").attr("data-name",username_);
						
						$(this).text("收起");
				        $(this).attr("data-open",1);
				        return false;
				        console.log("开了222222油罐？？？");
			        }
				} else{
					console.log("对二回复关闭");
					
					shrink();
					return false;
				}
			});
	        btnComment();
	    }
	    
	//          $.post("/index.php?m=api&c=index&v=comment", {
	//              'str':str,
	//              'rid':'{{$article.id}}'
	//          }, function(data){
	//              layer.msg(data.tips);
	//              if(data.status == 1){
	//                  $("#saytext").val('');
	//              }
	//          },"JSON");
	
	});
}
btnComment();

//收缩回复框
function shrink(){
	$(".reply_reply").text("回复");
    $(".reply_reply").attr("data-open",0);
    $(".details_").animate({opacity:'0',height:'0px'},10);
    
    replyReview();
}

function replyReview(){
	$(".replyReview").text("回复");
    $(".replyReview").attr("data-open",0);
    $(".details_stair").animate({opacity:'0',height:'0px'},10);
}
