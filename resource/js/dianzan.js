/*2018-10-17
 * HQS
 * 
 * PC端    所有页面  的点赞方法
 * */

function zan(obj,id){
	var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
	var dataSign = $("#UniqueValue").attr("data-sign"); //页面 的唯一值
	var url;
	
    var obj = $(obj);
    var nature = obj.attr("data-nature"); //判断是对 内容的点赞   或 内容的评论 、回复  
    var textNum = parseInt(obj.find("i").text());

	//这个是游记详情页的标记，
	//用于区分：1-表示公司工作人员发的游记new_rytdetail.tpl
	//          2-表示用户私人      发的游记travel_note_detail.tpl
	var discern = obj.attr("data-discern");

    if( UniqueValue == "centerHome" ){ //判断  这个点赞是否来自 个人中心主页
    	var dataSign = obj.attr('data-sign');
	    var UniqueValue = obj.attr('data-val');
    }

    //象征
    //dataSign == "my"            //个人中心 我的。。页面
    //dataSign == "his"           //个人中心 TA。。页面
    //dataSign == "collect"       //个人中心 我收藏的。。页面
    //dataSign == "detail"        //日志、视频、游记 详情页主体
    
    //性质、特征
    //nature == "list"            //个人中心 我的。。  个人中心 TA。。  个人中心 我收藏的。。等等列表页、 非详情页
    //nature == "subject"         //日志、视频、游记、问题详情页   对该日志、视频、文章
    //nature == "review"          //日志、视频、游记、问题详情页   的评论  +评论的回复
    //nature == "Live"            //行程直播 页  日志
    
    if( dataSign == "my" || dataSign == "his" || dataSign == "collect" ){//我的、TA的、我收藏的
    	console.log("2000");
    	if( nature=="list" || nature=="Live" ){
    		if( UniqueValue=="travel_num"  ){     //日志、行程直播、个人中心主页
				url="/index.php?m=api&c=index&v=zan";
			} else if( UniqueValue=="tv_num" ){  //视频
				url="/index.php?m=api&c=index&v=zantv";
			} else if( UniqueValue=="note_num" ){//游记、个人中心主页
				url="/index.php?m=api&c=index&v=zantravel";
			}
   		}
   	}
    else if( dataSign == "detail" && nature=="subject" ){    //详情页  赞该日志、文章、 回答问题：详情页
   		if( UniqueValue=="travel_num" ){     //日志
   			console.log("20");
			url="/index.php?m=api&c=index&v=zan";
		}	
		else if( UniqueValue=="note_num" ){//游记
			if( discern== 1 ){
				console.log("00");
				url='/index.php?m=api&c=index&v=zanryt';
			}
			else{
				console.log("01");
				url='/index.php?m=api&c=index&v=zantravel';
			}
		}
		else if( UniqueValue=="faq_num" ){ //回答
			url="/index.php?m=api&c=index&v=zanfaq";
		}
	}
   	else if( dataSign == "detail" && nature=="review" ){     //详情页  评论、回复
   		console.log("22");
		url="/index.php?m=api&c=comment&v=zan";
	}
	
    $.post(url, {
        'id':id
    }, function(data){
    	layer.msg(data.tips);
        if(data.status == 1){
        	obj.find("i").text(textNum+1);
        	if( dataSign == "my" || dataSign == "his" || dataSign == "collect" ){
        		if ( nature=="Live" ) {
        			obj.addClass("conversion");
        		}
        		else{
        			obj.addClass("one");
        		}
        		console.log("2");
        	}
        	else if(dataSign == "detail" ){ //详情页
        		console.log("3");
        		if( nature=="subject" ){    //详情页  日志、游记  主体（不包括视频）
        			console.log("31");
        			obj.addClass("one");
        		}
        		else{                       //详情页  评论、回复
        			console.log("32");
        			obj.find("img").attr("src","/resource/m/images/common/icon_like2.png");
        			
	        		if ( UniqueValue=="faq_num" ) {
	        			console.log("35");
	        			
	        		}
        		}
        		
	        		
        	}
        }
    },"JSON");
}