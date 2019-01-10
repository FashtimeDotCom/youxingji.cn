//22018-10-18   14:19:20
//HQS

//这个JS文件 ，是游行迹  移动端。页面  所有 涉及到  下拉 滚动到页面底部操作    触发更新的增加信息的公共函数集合



//进入页面自动加载
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var url;


//判断列表的总数量是否大于等于5
function autoloading(UniqueValue){
	if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
		var totality = parseInt($("#"+UniqueValue).text());
	} else if (dataSign=="collect" || dataSign=="about_us") {  //收藏页    关于我们
		var totality = parseInt($("#"+UniqueValue).val());
	}else if (dataSign=="TalentState" ) {
		
	}

	if (totality>=5) {
		$(".tips").text("往下拖动查看更多！");
	} else{
		$(".tips").text("我也是有底线的哦~");
	}
}
autoloading(UniqueValue);


function commonality(){
    //点击遮罩层显示
    $('.maskLayer,.cancel').on("click",function() {
    	$(".maskLayer,.menuOption").addClass("dis_none");
    });
    
    
    //评论 
    $(".Areview").on("click",function(){
    	layer.msg('暂未通过审核，无法跳转详情页！');
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

//点击下拉
function pullDownButton(obj){
	if( $(obj).next(".menuOption").attr("class")=="menuOption fix dis_none" ){
		$(".menuOption").addClass("dis_none");
		$(obj).next(".menuOption").removeClass("dis_none");
		$(".maskLayer").removeClass("dis_none");
	}else{
		$(".maskLayer,.menuOption").addClass("dis_none");
	}
}


//滚动到底部加载
var scrollTop;     //获取滚动条到顶部的距离
var scrollHeight;  //获取文档区域高度 
var windowHeight;  //获取滚动条的高度
var flag = true;   //加载数据标志
var htmlDelete ='<p class="nullTitle">null</p>'+
				'<p class="nullDetails">:)抱歉，此内容已被原作者删除!</p>';
$(window).scroll(function(){
    scrollTop = $(this).scrollTop();     
    scrollHeight = $(document).height(); 
    windowHeight = $(this).height();
    var e,data={};
    
    if (dataSign=="my" || dataSign=="his") {  //我的 。。。  TA的。。。
		var num = parseInt($("#"+UniqueValue).text());//总数量
	}
	else if (dataSign=="collect" || dataSign=="about_us") { //收藏页
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
			}
			else if(dataSign=="his"){ //TA的页面
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
			}
			else if(dataSign=="collect"){//收藏页
				url="/index.php?m=api&c=Favtravel&v=collection_more";  //我收藏的日志、视频、游记、问答
				//传输给后台的参数
				data={page:page,type:dataType};
			}
			else if(dataSign=="about_us"){ //关于我们
				url="/index.php?m=api&c=aboutus&v=get_more";  //我收藏的日志、视频、游记、问答
				//传输给后台的参数
				data={page:page};
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
                    if(data.status == 1){
	                	var html="";
	                	$.each(data.tips,function(i,item){
							html += '<div class="item fix item_'+ data.tips[i].id+'">'+
										'<div class="wp fix">';
                			if( UniqueValue=="travel_num" ){   //日志
                				if( dataSign=="collect" && data.tips[i].is_delete && data.tips[i].is_delete==1 ){   //我收藏的日志  //用户的日志已被原作者删除
									html += htmlDelete;
								}
                				else {                     															//我的日志 、 TA的日志
                					if(data.tips[i].status=="1"){ //判断是否有通过审核
									html += '<a class="dis_block fix" href="/index.php?m=wap&c=index&v=star_detail&id='+data.tips[i].id+'">'+
												'<p class="videoTitle">'+data.tips[i].title+'</p>'+
												'<div class="date">'+data.tips[i].addtime+'</div>'+
												'<p class="videoDetails omit lineNumber3">'+data.tips[i].describes+'</p>'+
											'</a>';
									}
									else{
                					html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails Areview omit lineNumber3">'+data.tips[i].describes+'</p>';
									}
									html += '<ul class="ul-imgtxt2-yz">'+
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
											'<div class="videoBottom fix">';
									if( data.tips[i].address !='' && data.tips[i].address !=null ){ //判断用户 有没有加 定位地址
										html += '<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>';
									}
										html += '<p class="right">'+
													'<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass">'+data.tips[i].shownum+'</i></span>&nbsp;&nbsp;'+
													'<span class="like zan" onclick="zan(this,'+data.tips[i].id+')" data-id="'+data.tips[i].id+'" data-nature="list">'+
														'<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
													'</span>&nbsp;&nbsp;';
										if(data.tips[i].status=="1"){
											html += '<span class="review">'+
														'<a class="widthHeight" href="/index.php?m=wap&c=index&v=star_detail&id='+data.tips[i].id+'">'+
															'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>'+
														'</a>';
										}
										else{
											html += '<span class="Areview review">'+
														'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>';
										}
											html += '</span>'+
												'</p>'+
											'</div>';
								}
									html += '<div class="IMGbox fix">'+
												'<div class="pullDownButton" onclick="pullDownButton(this)"></div>'+
												'<div class="menuOption fix dis_none">';
										if( dataSign=="my" ){             //我的日志 
											html += '<a class="collect" href="/index.php?m=wap&c=user&v=edittravel&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<span class="deleteInfo" data-id="'+data.tips[i].id+'">删除</span>';
										}
										else if( dataSign=="his" ){       //TA的日志
											html += '<span class="collect" onclick="collect('+data.tips[i].id+')">收藏</span>'+
													'<span class="cancel">取消</span>';
										}
										else if( dataSign=="collect" ){   //我收藏的日志
											html += '<a class="collect deleteInfo" href="javascript:;" data-id="'+data.tips[i].id+'"><span>删除</span></a>'+
													'<span class="cancel">取消</span>';
										}
										html += '</div>'+
											'</div>';
							}
                			
                			else if( UniqueValue=="tv_num" ){  //视频
                				if( dataSign=="collect" && data.tips[i].is_delete && data.tips[i].is_delete==1 ){   //我收藏的视频  //用户的视频 已被原作者删除
									html += htmlDelete;
								}
								else{
									if(data.tips[i].status=="1"){ //判断是否有通过审核
									html += '<a class="dis_block fix" href="/index.php?m=wap&c=index&v=tv_detail&id='+data.tips[i].id+'">'+
												'<p class="videoTitle">'+data.tips[i].title+'</p>'+
												'<div class="date">'+data.tips[i].addtime+'</div>'+
												'<p class="videoDetails omit lineNumber3">'+data.tips[i].describes+'</p>'+
											'</a>';
									}
									else{
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails Areview omit lineNumber3">'+data.tips[i].describes+'</p>';
									}
									html += '<div class="preview fix">'+
												'<span class="pic figure vessel borderRadius js-video fix" onclick="js_video(this)" data-src="'+data.tips[i].url+'" style="background-image: url('+data.tips[i].pics+');">'+
													'<span class="bo"></span>'+
												'</span>'+
											'</div>'+
											'<div class="videoBottom fix">';
									if( data.tips[i].address !='' && data.tips[i].address !=null ){ //判断用户 有没有加 定位地址
										html += '<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>';
									}
										html += '<p class="right">'+
													'<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass">'+data.tips[i].shownum+'</i></span>&nbsp;&nbsp;'+
													'<span class="like zan" onclick="zan(this,'+data.tips[i].id+')" data-id="'+data.tips[i].id+'" data-nature="list">'+
														'<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].topnum+'</i>'+
													'</span>&nbsp;&nbsp;';
										if(data.tips[i].status=="1"){
											html += '<span class="review">'+
														'<a class="widthHeight" href="/index.php?m=wap&c=index&v=tv_detail&id='+data.tips[i].id+'">'+
															'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>'+
														'</a>';
										}
										else{
											html += '<span class="Areview review">'+
														'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>';
										}
											html += '</span>'+
												'</p>'+
											'</div>';
								}
									html += '<div class="IMGbox fix">'+
												'<div class="pullDownButton" onclick="pullDownButton(this)"></div>'+
												'<div class="menuOption fix dis_none">';
										if( dataSign=="my" ){          //我的视频
											html += '<a class="collect" href="/index.php?m=wap&c=user&v=edittv&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<span class="deleteInfo" data-id="'+data.tips[i].id+'">删除</span>';
										}
										else if( dataSign=="his" ){    //TA的视频
											html += '<span class="collect" onclick="collect('+data.tips[i].id+')">收藏</span>'+
													'<span class="cancel">取消</span>';
										}
										else if( dataSign=="collect" ){//我的视频
											html += '<span class="collect deleteInfo" data-id="'+data.tips[i].id+'">删除</span>'+
													'<span class="cancel">取消</span>';
										}
												
										html += '</div>'+
											'</div>';
							}
                			
							else if( UniqueValue=="note_num" ){//游记
								if( dataSign=="collect" && data.tips[i].is_delete && data.tips[i].is_delete==1 ){   //我收藏的游记  //用户的游记已被原作者删除
									html += htmlDelete;
								}
								else{
									var str1 = data.tips[i].tag;
									if(str1 !=null){var str2=str1.substring(0,str1.indexOf("/") );}
									if(data.tips[i].status=="1"){ //判断是否有通过审核
									//html += '<a class="dis_block fix" href="/index.php?m=wap&c=index&v=rytdetai&id='+data.tips[i].id+'">'+
									html += '<a class="dis_block fix" href="javascript:;">'+
												'<p class="videoTitle">'+data.tips[i].title+'</p>'+
												'<div class="date">'+data.tips[i].addtime+'</div>'+
												'<p class="videoDetails omit lineNumber3">'+data.tips[i].desc+'</p>'+
												'<div class="preview fix"><img src="'+data.tips[i].thumbfile+'" alt=""></div>'+
											'</a>';
									}
									else{
									html += '<p class="videoTitle">'+data.tips[i].title+'</p>'+
											'<div class="date">'+data.tips[i].addtime+'</div>'+
											'<p class="videoDetails Areview omit lineNumber3">'+data.tips[i].desc+'</p>'+
											'<div class="preview fix"><img src="'+data.tips[i].thumbfile+'" alt=""></div>';
									}
									html += '<div class="videoBottom fix">';
									if( data.tips[i].address !='' && data.tips[i].address !=null  ){ //判断用户 有没有加 定位地址
										html += '<span class="left"><img src="/resource/m/images/common/icon_location2.png" />'+data.tips[i].address+'</span>';
									}		
									if( data.tips[i].tag !='' && str2 !='' && str2 !=undefined ){ //判断用户 有没有加 标签
										html += '<span class="left tag">'+str2+'</span>';
									}		
										html += '<p class="right">'+
													'<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" /><i class="Iclass">'+data.tips[i].show_num+'</i></span>&nbsp;&nbsp;'+
													'<span class="like zan" onclick="zan(this,'+data.tips[i].id+')" data-id="'+data.tips[i].id+'" data-nature="list">'+
														'<img class="icon_like" src="/resource/m/images/common/icon_like.png" /><i class="Iclass">'+data.tips[i].top_num+'</i>'+
													'</span>&nbsp;&nbsp;';
										if(data.tips[i].status=="1"){
											html += '<span class="review">'+
														//'<a class="widthHeight" href="/index.php?m=wap&c=index&v=rytdetai&id='+data.tips[i].id+'">'+
														'<a class="widthHeight" href="javascript:;">'+
															'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>'+
														'</a>';
										}
										else{
											html += '<span class="review Areview">'+
														'<img class="icon_review" src="/resource/m/images/common/icon_review.png" /><i class="Iclass">0</i>';
										}	
											html += '</span>'+
												'</p>'+
											'</div>';
								}
									html += '<div class="IMGbox fix">'+
												'<div class="pullDownButton" onclick="pullDownButton(this)"></div>'+
												'<div class="menuOption fix dis_none">';
										if( dataSign=="my" ){          //我的游记
											html += '<a class="collect" href="/index.php?m=wap&c=user&v=edit_note&id='+data.tips[i].id+'"><span>编辑</span></a>'+
													'<span class="deleteInfo" data-id="'+data.tips[i].id+'">删除</span>';
										}
										else if( dataSign=="his" ){    //TA的游记
											html += '<span class="collect" onclick="collect('+data.tips[i].id+')">收藏</span>'+
													'<span class="cancel">取消</span>';
										}
										else if( dataSign=="collect" ){//我收藏的视频
											html += '<span class="collect deleteInfo" data-id="'+data.tips[i].id+'">删除</span>'+
													'<span class="cancel">取消</span>';
										}
													
										html += '</div>'+
											'</div>';
							}
							
							else if( UniqueValue=="faq_num" ){//我的问答
								if( dataSign=="collect" && data.tips[i].is_delete && data.tips[i].is_delete==1 ){   //我收藏的问答  //用户的问答 已被原作者删除
									html += htmlDelete;
								}
								else{
									var str1 = data.tips[i].label;
									var str2=str1.substring(0,str1.indexOf("/") );
									html += '<p class="headline"><img class="view" src="/resource/m/images/user/icon_faq_detail1.png"><span class="substance">'+data.tips[i].title+'</span></p>'+
											'<a class="dis_block fix" href="/index.php?m=wap&c=faq&v=detail&id='+data.tips[i].id+'">'+
												'<p class="videoDetails omit lineNumber4">'+data.tips[i].desc+'</p>'+
												'<div class="videoBottom fix">';
										if( data.tips[i].address !='' && data.tips[i].address !=null ){ //判断用户 有没有加 定位地址
											html += '<span class="left"><img src="/resource/m/images/common/icon_location1.png" /><h4>'+data.tips[i].address+'</h4></span>';
										}
									if( dataSign=="my" || dataSign=="his" ){
										if( str1!="" && str2=="" ){
											str2=str1;
										}
										
										if( data.tips[i].label !='' && str2 !='' ){ //判断用户 有没有加 标签
											html += '<span class="left tag">'+str2+'</span>';
										}
											html += '<p class="divRight">'+
														'<span class="check">'+data.tips[i].username+'问于</span>'+
														'<span class="check">'+data.tips[i].addtime+'</span>'+
													'</p>';
									}
									else if( dataSign=="collect" ){
											html += '<p class="right">'+
														'<span class="check"><img class="icon_check" src="/resource/m/images/common/icon_check.png" />'+data.tips[i].show_num+'</span>&nbsp;&nbsp;'+
														'<span class="like">'+
															'<img class="icon_review" src="/resource/m/images/user/icon_faq_detail3.png" /><i class="Iclass">'+data.tips[i].collection_num+'</i>'+
														'</span>&nbsp;&nbsp;'+
														'<span class="review"><img class="icon_review" src="/resource/m/images/common/icon_review.png" />'+data.tips[i].response_num+'</span>'+
													'</p>';
									}
										html += '</div>'+
											'</a>';
								}
									html += '<div class="IMGbox fix">'+
												'<div class="pullDownButton" onclick="pullDownButton(this)"></div>'+
												'<div class="menuOption fix dis_none">';
										if( dataSign=="my" || dataSign=="collect" ){ //我的问答 、我收藏的问答
											html += '<span class="collect deleteInfo" data-id="'+data.tips[i].id+'">删除</span>'+
													'<span class="cancel">取消</span>';
										}
										else if( dataSign=="his" ){    //TA的问答
											html += '<span class="collect" onclick="collect('+data.tips[i].id+')">收藏</span>'+
													'<span class="cancel">取消</span>';
										}
										html += '</div>'+
											'</div>';
							}
							
							else if( UniqueValue=="about_us" && dataSign=="about_us" ){   //关于我们
									html += '<a class="fix" href="/index.php?m=wap&c=aboutus&v=detail&id='+data.tips[i].id+'">'+
												'<div class="headPortrait fix"><img src="'+data.tips[i].thumbfile+'" title="海报/封面"/></div>'+
												'<div class="details fix">'+
													'<p class="title fix omit">'+data.tips[i].title+'</p>'+
													'<p class="time common">'+data.tips[i].addtime+'</span></p>'+
													'<p class="description omit">'+data.tips[i].desc+'</p>'+
													'<button>查看更多</button>'+
												'</div>'+
											'</a>';
							}
								html += '</div>'+
									'</div>';
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
	                
	                //判断有需要的   个人中心我的。。   TA的 。。   我的收藏的也。。。等等需要调用 下拉、遮罩层显示、删除 等功能 
	                if( dataSign=="my" || dataSign=="his" || dataSign=="collect" ){
	                	commonality();
	                }
	                
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