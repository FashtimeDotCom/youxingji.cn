//2018-10-09  14:22:27
//HQS

//旅行际 TA的日志、视频、游记、问答

//部分的公共JS函数



//进入页面自动加载
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var url;

//判断列表的总数量是否大于等于5
function autoloading(UniqueValue){
	if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
		var totality = parseInt($("#"+UniqueValue).text());
	} else{  //收藏页
		var totality = parseInt($("#"+UniqueValue).val());
	}
	
	
	var maxPages = parseInt(Math.ceil(totality/4));//最大页数
	$("#pageCount").attr("data-page",maxPages);
	if (totality>=5) {
		$(".tips").text("往下拖动查看更多！");
	} else{
		$(".tips").text("我也是有底线的哦~");
	}
}
autoloading(UniqueValue);

//关注     在【TA的。。。】页面
function follows(bid, obj){
	var fans = parseInt($("#fans").text());
    $.post("/index.php?m=api&c=index&v=follow", {
        'bid':bid
    }, function(data){
    	layer.msg(data.tips);
        if(data.status == 1){
            $(obj).html('已关注');
            $(obj).css("background","#ccc");
            $("#fans").text(fans+1);
        }else if(data.status == 2){
            $(obj).html('<b>+</b> 关注');
            $(obj).css("background","#F33B3B");
            $("#fans").text(fans-1);
        }
    },"JSON");
}

//私信     在【TA的。。。】页面
function smg(uid){
	layer.prompt({title: '请输入私信内容', formType: 2}, function(text, index){
      	layer.close(index);
        $.post("/index.php?m=api&c=index&v=sendmsg", {
            'to_id':uid,
            'content':text
        }, function(data){
            layer.msg(data.tips);
        },"JSON");
    });
}


//收藏     在【TA的。。。】页面
function collect(id){
	var type = $("#uid").attr("data-type");//用户ID
	$(".maskLayer,.pullDownNav").addClass("dis_none");
    $.post("/index.php?m=api&c=Favtravel&v=collection", {
        'action':1,  //action:数值(0取消，1收藏)
        't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id )
        'type':type  //type:数值(1-日志，2-tv,3-游记,4-收藏)
    }, function(data){
    	layer.msg(data.tips);
    },"JSON");
}


function commonality(){
	//点击下拉
    $('.icon_pullDown').on("click",function() {
    	if( $(this).next(".pullDownNav").attr("class")=="pullDownNav fix dis_none" ){
    		$(".pullDownNav").addClass("dis_none");
    		$(this).next(".pullDownNav").removeClass("dis_none");
    		$(".maskLayer").removeClass("dis_none");
    	}
    });
	
	
	//这个为 “我的视屏”、“TA的视频” 必须的  开始
	// 打开视频  
	$('.js-video').click(function(event) {
        var _id = $(this).attr("href");
        var _src = $(this).attr("data-src");

        $(_id).find("iframe").attr("src", _src);
        $(_id).fadeIn();
    });
    
    //关闭视频
    $('.js-close').click(function(event){
        $(this).parents('.m-pop1-yz').fadeOut();
        var myiframe1 = $(this).parents('#m-pop1-yz').find("iframe").attr("src");
        $(this).parents('#m-pop1-yz').find("iframe").attr("src", myiframe1);
        
        event.stopPropagation();
    });
	//这个为 “我的视屏”、“TA的视频” 必须的 结束
	
	
    //点击遮罩层显示
    $('.maskLayer,.cancel').on("click",function() {
    	$(".maskLayer,.pullDownNav").addClass("dis_none");
    });
    
    //点赞
    $('.zan').click(function() {
        var obj = $(this);
        var id = obj.attr('data-id');
        var textNum = parseInt(obj.find("i").text());
        
        if( UniqueValue=="travel_num" ){
			url="/index.php?m=api&c=index&v=zan";
		} else if( UniqueValue=="tv_num" ){
			url="/index.php?m=api&c=index&v=zantv";
		} else if( UniqueValue=="note_num" ){
			url="/index.php?m=api&c=index&v=zantravel";
		}
        
        $.post(url, {
            'id':id
        }, function(data){
        	layer.msg(data.tips);
            if(data.status == 1){
            	obj.find("img").attr("src","/resource/m/images/common/icon_like2.png");
                obj.find("i").text(textNum+1);
            }
        },"JSON");
    });
    
    //评论 
    $(".Areview").on("click",function(){
    	layer.msg('此功能暂未开放，敬请期待！');
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
			} else if( UniqueValue=="tv_num" ){
				url="/index.php?m=api&c=index&v=deletetv";
				bg="tv";
				link="user&v=addtv";
				character="视频";
			} else if( UniqueValue=="note_num" ){
				url="/index.php?m=api&c=TravelNote&v=del_travel_note";
				bg="travel_note";
				link="user&v=add_note";
				character="游记";
			} else{
				url="/index.php?m=api&c=tv&v=delete_self_faq";
				bg="faqs";
				link="faq&v=set_faq";
				character="问答";
			}
		}else if(dataSign=="collect"){//收藏页
			url="/index.php?m=api&c=Favtravel&v=collection";
			if( UniqueValue=="travel_num" ){
				bg="travel";
			} else if( UniqueValue=="tv_num" ){
				bg="tv";
			} else if( UniqueValue=="note_num" ){
				bg="travel_note";
			} else{
				bg="faqs";
			}
		}
		$(".maskLayer,.pullDownNav").addClass("dis_none");
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
	            }else if(dataSign=="collect"){//收藏页
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
		                    	html ='<div class="m-myday-yz">'+
							                '<div class="wp">'+
							                	'<img class="default_bg" src="/resource/m/images/user/defaul_'+bg+'_bg.png"/>'+
							                    '<div class="bg3">'+
							                        '<div class="text">这里暂时没有内容噢<br />快增加收藏吧！</div>'+
							                    '</div>'+
							                '</div>'+
							            '</div>';
		                    	$(".content").after(html);
		                    	$('.tips').remove();
		                    }
		                }else{
		                    	
		                    }
		            },"JSON");
	            }
	            layer.close(index);
	        }
	    });
    });
}
commonality();



//滚动到底部加载
var scrollTop;     //获取滚动条到顶部的距离
var scrollHeight;  //获取文档区域高度 
var windowHeight;  //获取滚动条的高度
var flag = true;   //加载数据标志
$(window).scroll(function(){
    scrollTop = $(this).scrollTop();     
    scrollHeight = $(document).height(); 
    windowHeight = $(this).height();
    var e,data={};
    
    if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
		var num = parseInt($("#"+UniqueValue).text());//总数量
	} else{ //收藏页
		var num = parseInt($("#"+UniqueValue).val());
	}
    
	var maxPages = parseInt(Math.ceil(num/4));//最大页数
	var NowPage = parseInt($("#pageCount").attr("data-nowPage"));//当前页数
	var page=NowPage+1;
	var user_id = $("#uid").val();//用户ID
	
    if(scrollTop + windowHeight >= scrollHeight-200 && flag == true ){
    	if (NowPage+1<=maxPages) {
			if(dataSign=="my"){ //我的
				if( UniqueValue=="travel_num" ){       //我的日志
					url="/index.php?m=api&c=tv&v=self_travel";
				} else if( UniqueValue=="tv_num" ){    //我的视频
					url="/index.php?m=api&c=tv&v=self_tv";
				} else if( UniqueValue=="note_num" ){  //我的游记
					url="/index.php?m=api&c=tv&v=self_travel_note";
				} else if( UniqueValue=="faq_num" ){   //我的问答
					url="/index.php?m=api&c=tv&v=self_faq";
				}
				//传输给后台的参数
				data={page:page};
				
			}else if(dataSign=="his"){ //TA的页面
				if( UniqueValue=="travel_num" ){//TA的日志
					url="/index.php?m=api&c=tv&v=visitor_travel";
				} else if( UniqueValue=="tv_num" ){    //TA的视频
					url="/index.php?m=api&c=tv&v=visitor_tv";
				} else if( UniqueValue=="note_num" ){  //TA的游记
					url="/index.php?m=api&c=tv&v=visitor_travel_note";
				} else if( UniqueValue=="faq_num" ){   //TA的问答
					url="/index.php?m=api&c=tv&v=visitor_faq";
				}
				//传输给后台的参数
				data={"page":page,"user_id":user_id};
				
			}else if(dataSign=="collect"){//收藏页
				url="/index.php?m=api&c=Favtravel&v=collection_more";  //我收藏的日志、视频、游记、问答
				//传输给后台的参数
				data={page:page,type:dataType};
			}
            $.ajax({
                url:url,
                data:data,
                method:'post',
                dataType:'json',
                beforeSend:function(){
                	$(".tips").text("");
					$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
                    flag = false;
                },
                success:function( data ){
			                	console.log(data);
                    if(data.status == 1){
	                	var html="";
	                	$.each(data.tips,function(i,item){
							html += '<div class="item fix item_'+ data.tips[i].id+'">'+
										'<div class="wp fix">';
                			if( UniqueValue=="travel_num" && dataSign=="my" ){//我的日志
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<ul class="ul-imgtxt2-yz">'+
												'<li><dl>';
											for ( var k=0;k<data.tips[i].content.length;k++ ){
												html+= '<dd><a href="'+data.tips[i].content[k]+'" class="figure fancybox-effects-a" style="background-image: url('+data.tips[i].content[k]+');">'+
																'<div class="pic"></div>'+
															'</a>'+
														'</dd>';
											}
		
											html+='</dl>'+
												'</li>'+
											'</ul>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like"><img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i></span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="/index.php?m=wap&c=user&v=edittravel&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<a class="deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="tv_num" && dataSign=="my" ){//我的视频
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<div class="preview fix">'+
												'<a href="#m-pop1-yz" class="pic js-video fix" data-src="'+data.tips[i].url+'">'+
													'<img src="'+data.tips[i].pics+'" alt="">'+
													'<span class="bo"></span>'+
												'</a>'+
											'</div>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like"><img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i></span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="/index.php?m=wap&c=user&v=edittv&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<a class="deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="note_num" && dataSign=="my" ){//我的游记
								var str1 = data.tips[i].tag;
								var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<a href="javascript:;" class="dis_block fix">'+
												'<p class="videoDetails">'+data.tips[i].desc+'</p>'+
												'<div class="preview fix"><img src="'+data.tips[i].pics+'" alt=""></div>'+
											'</a>'+
											'<div class="videoBottom fix">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<span class="left tag">'+str2+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].show_num+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].top_num+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].top_num+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="/index.php?m=wap&c=user&v=edit_note&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<a class="deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="faq_num" && dataSign=="my" ){//我的问答
								var str1 = data.tips[i].label;
								var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>'+data.tips[i].title+'</p>'+
											'<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id='+ data.tips[i].id+'">'+
												'<p class="videoDetails omit lineNumber4">'+data.tips[i].desc+'</p>'+
												'<div class="videoBottom fix">'+
													'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
													'<span class="left tag">'+str2+'</span>'+
													'<p class="right"><span class="check">问于&nbsp;'+data.tips[i].addtime+'</span></p>'+
												'</div>'+
											'</a>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
													'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="travel_num" && dataSign=="his" ){//TA的日志
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<ul class="ul-imgtxt2-yz">'+
												'<li><dl>';
											for ( var k=0;k<data.tips[i].content.length;k++ ){
												html+= '<dd><a href="'+data.tips[i].content[k]+'" class="figure fancybox-effects-a" style="background-image: url('+data.tips[i].content[k]+');">'+
																'<div class="pic"></div>'+
															'</a>'+
														'</dd>';
											}
		
											html+='</dl>'+
												'</li>'+
											'</ul>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="javascript:;" onclick="collect('+data.tips[i].id+')"><span>收藏</span></a>'+
													'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="tv_num" && dataSign=="his" ){    //TA的视频
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<div class="preview fix">'+
												'<a href="#m-pop1-yz" class="pic js-video fix" data-src="'+data.tips[i].url+'">'+
													'<img src="'+data.tips[i].pics+'" alt="">'+
													'<span class="bo"></span>'+
												'</a>'+
											'</div>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="javascript:;" onclick="collect('+data.tips[i].id+')"><span>收藏</span></a>'+
													'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="note_num" && dataSign=="his" ){  //TA的游记
								var str1 = data.tips[i].tag;
								var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<a href="javascript:;" class="dis_block fix">'+
												'<p class="videoDetails">'+data.tips[i].desc+'</p>'+
												'<div class="preview fix"><img src="'+data.tips[i].thumbfile+'" alt=""></div>'+
											'</a>'+
											'<div class="videoBottom fix">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<span class="left tag">'+str2+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].show_num+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].top_num+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].top_num+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="javascript:;" onclick="collect('+data.tips[i].id+')"><span>收藏</span></a>'+
													'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="faq_num" && dataSign=="his" ){   //TA的问答
								var str1 = data.tips[i].label;
								var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'">'+
												'<p class="videoDetails omit lineNumber4">'+data.tips[i].desc+'</p>'+
												'<div class="videoBottom fix">'+
													'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
													'<span class="left tag">'+str2+'</span>'+
													'<p class="right"><span class="check">问于&nbsp;'+data.tips[i].addtime+'</span></p>'+
												'</div>'+
											'</a>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect" href="javascript:;" onclick="collect('+data.tips[i].id+')"><span>收藏</span></a>'+
													'<a class="cancel" href="javascript:;"><span>取消</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
						
							} else if( UniqueValue=="travel_num" && dataSign=="collect" ){//我收藏的日志
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<ul class="ul-imgtxt2-yz">'+
												'<li><dl>';
											for ( var k=0;k<data.tips[i].content.length;k++ ){
												html+= '<dd><a href="'+data.tips[i].content[k]+'" class="figure fancybox-effects-a" style="background-image: url('+data.tips[i].content[k]+');">'+
																'<div class="pic"></div>'+
															'</a>'+
														'</dd>';
											}
		
											html+='</dl>'+
												'</li>'+
											'</ul>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="tv_num" && dataSign=="collect" ){    //我收藏的视频
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails">'+data.tips[i].describes+'</p>'+
											'<div class="preview fix">'+
												'<a href="#m-pop1-yz" class="pic js-video fix" data-src="'+data.tips[i].url+'">'+
													'<img src="'+data.tips[i].pics+'" alt="">'+
													'<span class="bo"></span>'+
												'</a>'+
											'</div>'+
											'<div class="videoBottom">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].shownum+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].topnum+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="note_num" && dataSign=="collect" ){  //我收藏的游记
								var str1 = data.tips[i].tag;
								var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<a href="'+data.tips[i].url+'" class="dis_block fix">'+
												'<p class="videoDetails">'+data.tips[i].desc+'</p>'+
												'<div class="preview fix"><img src="'+data.tips[i].pics+'" alt=""></div>'+
											'</a>'+
											'<div class="videoBottom fix">'+
												'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
												'<span class="left tag">'+str2+'</span>'+
												'<p class="right">'+
													'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].show_num+'</span>&nbsp;&nbsp;'+
													'<a class="zan" data-id="'+data.tips[i].id+'" data-num="'+data.tips[i].top_num+'" href="javascript:;">'+
														'<span class="like">'+
															'<img src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].top_num+'</i>'+
														'</span>'+
													'</a>&nbsp;&nbsp;'+
													'<a class="Areview" href="javascript:;"><span class="review"><img src="/resource/m/images/common/icon_review.png" />0</span></a>'+
												'</p>'+
											'</div>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							} else if( UniqueValue=="faq_num" && dataSign=="collect" ){   //我收藏的问答
								if( data.tips[i].is_delete && data.tips[i].is_delete==1 ){
									html += '<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>null</p>'+
											'<div class="date">null</div>'+
											'<a href="javascript:;" class="dis_block fix">'+
												'<p class="videoDetails" style="color: red;">:)抱歉，此问答已被作者删除!</p>';
								}else{
									html += '<p class="videoTitle"><span class="view fix"><img src="/resource/m/images/user/icon_faq_detail1.png"></span>'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<a href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'" class="dis_block fix">'+
												'<p class="videoDetails">'+data.tips[i].desc+'</p>'+
												'<div class="videoBottom fix">'+
													'<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>'+
													'<p class="right">'+
														'<span class="check"><img src="/resource/m/images/common/icon_check.png" />'+data.tips[i].show_num+'</span>&nbsp;&nbsp;'+
														'<span class="like">'+
															'<img src="/resource/m/images/user/icon_faq_detail3.png" /><i class="Iclass">'+data.tips[i].collection_num+'</i>'+
														'</span>&nbsp;&nbsp;'+
														'<span class="review"><img src="/resource/m/images/common/icon_review.png" />'+data.tips[i].response_num+'</span>'+
													'</p>'+
												'</div>';
								}
										
									html += '</a>'+
											'<div class="pullDownMenu fix">'+
												'<img class="icon_pullDown" src="/resource/m/images/common/icon_pullDown.png" />'+
												'<div class="pullDownNav fix dis_none">'+
													'<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
							}
	                   	});
	                    $(".content").append(html);
	                    $("#pageCount").attr("data-NowPage",NowPage+1);
	                    if (NowPage+1<maxPages) {
	                		$(".tips").text("往下拖动查看更多！");
	                	}else{
	                		$(".tips").text("我也是有底线的哦~");
	                	}
	                }else{
	                    layer.msg(data.tips);
	                }
	                commonality();
                },
                complete:function(){
                    if (NowPage+1<maxPages) {
                		$(".tips").text("往下拖动查看更多！");
                		flag = true;
                	}else{
                		$(".tips").text("我也是有底线的哦~");
                		flag = false;
                	}
                }
            });
        }else{
    		$(".tips").text("我也是有底线的哦~");
    	}
    }
});