//22018-12-09   21：05：42
//HQS

//PC端   个人中心 我的。。。我收藏的 鼠标悬停  弹出选项菜单


// UniqueValue、dataSign、dataType三个变量在   skip.js文件
var url;

//我的。。。 评论按钮  因没通过审核无法跳转 
$(".Areview").on("click",function(){
	layer.msg('暂未通过审核，无法跳转详情页！');
});

//右侧鼠标悬停  菜单下拉
$(".IMGbox").hover(function(){
	if( $(this).children(".menuOption").attr("class")=="menuOption fix dis_none" ){
		$(this).children(".menuOption").removeClass("dis_none");
	}
},function(){
	$(this).children(".menuOption").addClass("dis_none");
});

//点击  鼠标悬停  菜单下拉隐藏
$('.cancel').on("click",function() {
	$(".menuOption").addClass("dis_none");
});

//删除
$('.deleteInfo').click(function() {
    var id = $(this).attr('data-id');
    var bg,link,character;
    if(dataSign=="my"){ //我的
        if( UniqueValue=="travel_num" ){
			url="/index.php?m=api&c=index&v=deletetravel";
			bg="travel";
			link="user&v=addtravel";
			character="旅行日志";
		}
        else if( UniqueValue=="tv_num" ){
			url="/index.php?m=api&c=index&v=deletetv";
			bg="tv";
			link="user&v=addtv";
			character="视频";
		}
		else if( UniqueValue=="note_num" ){
			url="/index.php?m=api&c=TravelNote&v=del_travel_note";
			bg="travel_note";
			link="user&v=add_note";
			character="游记";
		}
		else{
			url="/index.php?m=api&c=tv&v=delete_self_faq";
			bg="faqs";
			link="faq&v=set_faq";
			character="问答";
		}
	}
    else if(dataSign=="collect"){//收藏页
		url="/index.php?m=api&c=Favtravel&v=collection";
		if( UniqueValue=="travel_num" ){
			bg="travel";
			character="旅行日志";
		}
		else if( UniqueValue=="tv_num" ){
			bg="tv";
			character="视频";
		}
		else if( UniqueValue=="note_num" ){
			bg="travel_note";
			character="游记";
		}
		else{
			bg="faqs";
			character="问答";
		}
	}
	$(".maskLayer,.menuOption").addClass("dis_none");
    layer.msg('您确定要删除吗？', {
        btn: ['确认', '取消'],
        yes: function (index) {
        	if(dataSign=="my" ){ //我的
	            $.post(url,{ 
	            	'id':id
	            }, function(data){
	            	layer.msg(data.tips);
	            	var value = parseInt($("#"+UniqueValue).text());
	                if(data.status == 1){
	                	$("#"+UniqueValue).text(value-1);
	                    $('.item_'+id).remove();
	                    if (value-1==0) {
	                    	html ='<div class="m-myday-yz">'+
						                '<div class="wp">'+
						                	'<img class="default_bg" src="/resource/m/images/user/defaul_'+bg+'_bg.png"/>'+
						                    '<div class="bg3">'+
						                        '<div class="text">最原创的旅拍视频，最暖心的旅行推荐，由你打造</div>'+
						                    '</div>'+
						                    '<div class="top">'+
						                        '<a href="/index.php?m=wap&c='+link+'" class="shoot">发布'+character+'</a>'+
						                    '</div>'+
						                '</div>'+
						            '</div>';
	                    	$(".content").after(html);
	                    	$('.tips').remove();
	                    }else{
	                    	
	                    }
	                }
	            },"JSON");
            }
        	else if(dataSign=="collect"){//收藏页
            	$.post(url, {
            		'action':0,  //action:数值(0取消，1收藏)
                    't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id )
                    'type':dataType  //type:数值(1-日志，2-tv,3-游记,4-问答)
	            }, function(data){
	            	layer.msg(data.tips);
	                var value = parseInt($("#"+UniqueValue).val());
	                if(data.status == 1){
	                    $('.item_'+id).remove();
	                    if (value-1==0) {
						    html =  '<div class="mainTips fix">'+
										'<div class="figure preview borderRadius" style="background-image: url(/resource/m/images/user/defaul_'+bg+'_bg.png);" title="海报/封面"></div>'+
										'<div class="tip"><p class="title">你还没有收藏任何'+character+'哦！<br />快去增加收藏吧！</p></div>'+
									'</div>';
	                    	$(".content").after(html);
	                    	$('.tips').remove();
	                    }
	                }
	            },"JSON");
            }
            layer.close(index);
        }
    });
});