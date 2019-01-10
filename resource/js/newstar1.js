//2018-11-19   17:23:24
//HQS

//达人游记



var swiper1 = new Swiper('#cardSwiper', {
		slidesPerView: 4,
		spaceBetween: 25,
		speed: 3000,
		autoplay: {
			delay: 3000
		},
		autoplayDisableOnInteraction : false,
	});

var total_page = parseInt($("#total_page").text());                       //总页数
//选择页码
function SLEW(obj){
	var NowPage  = parseInt($(".list .box").attr("data-nowpage"));        //当前页
	var page = $(obj).text();                                   //当前选择页码
	var ParentEle =  $(obj).parent("li");                                     //他的父元素
	var li_1 = $(".li_1").children("a");
	var last = $(".last").children("a");


	if (page == NowPage && page != "上一页" && page != "下一页<i></i>" ){ //若是点击的页码等于当前页
		console.log("a");
		return false;
	}
	else{
		var firstPage = "1 ...";                   //第一页
		var totality = "... "+total_page;          //最后一页
		
		if (page>1  && page != "上一页" && page != "下一页<i></i>" ) {    //判断即将跳转的页面不是第一页，就显示上一页 按钮
			var page = parseInt(page);
			
			var length1 = ParentEle.prev().children().text();
			var length2 = ParentEle.prev().prev().children().text();
			var length3 = ParentEle.prev().prev().prev().children().text();
			var length4 = ParentEle.prev().prev().prev().prev().children().text();
			
			var nextVal1 = ParentEle.next().children().text();
			var nextVal2 = ParentEle.next().next().children().text();
			var nextVal3 = ParentEle.next().next().next().children().text();
			var nextVal4 = ParentEle.next().next().next().next().children().text();
			
			var html1 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page+1)+'</a></li>';
			var html2 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page+2)+'</a></li>';
			var html3 = html1+html2;
			
			var html5 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-2)+'</a></li>';
			var html6 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-1)+'</a></li>';
			var html55 = html5+html6;
			
//			console.log("length1:"+length1+"，length2:"+length2+"，length3:"+length3+"，length4:"+length4+"，nextVal1:"+nextVal1);
			console.log("length1:"+length1+"，nextVal1:"+nextVal1+"，nextVal2:"+nextVal2+"，nextVal3:"+nextVal3+"，nextVal4:"+nextVal4+"，last.text():"+last.text()+"，total_page:"+total_page);
			if ( page == total_page ) {      //点击  最后一页  例子：...5
				console.log("01");
				$(".pages-prev").removeClass("dis_none");
				$(".pages-next").addClass("dis_none");                    //隐藏下一页按钮
				$(".list .box").attr("data-nowpage",total_page);
				page=total_page;
			}
			else{
				console.log("02");
				$(".pages-prev").removeClass("dis_none");
				$(".pages-next").removeClass("dis_none");                 //显示下一页按钮
				$(".list .box").attr("data-nowpage",page);
				
				
				if( total_page>=6 ){                                      //判断总页数是否大于等于6
					console.log("03");
					if( total_page==6 ){                                  //判断总页数是否等于6
						console.log("040000");
						if( page>=4 ){                                    //判断点击的页码是不是大于等于4
							console.log("04");
							li_1.text(firstPage);
						}
						else{
							console.log("05");
							li_1.text("1");
							last.text(totality);
						}
						if( total_page-page<=2 ){                         //判断点击的页码被总页数减去是否等于2
							console.log("06");
							last.text(total_page);
						}
						else{
							console.log("07");
						}
					}
					else{                                                 //判断总页数是否大于6
						console.log("09--");
						if( page>=4 && total_page-page>=3 ){              //判断点击页码是否大于等于4  以及 总页数 减去 点击页码是否大于等于3
							console.log("08");
							if( length1 == firstPage ){
								console.log("081");
								ParentEle.before(html55);
								if(  nextVal1 == page+1 && nextVal2 == page+2 && nextVal3 == page+3 && nextVal4 == total_page && last.text() == total_page ){
									ParentEle.next().next().next().remove();      //比如：1... 4 5 6 7 8  点的是4，删掉7
									last.text(totality);
								}
								else{
									ParentEle.next().next().next().next().remove();       //比如：1... 6 7 8 9 10 ...12  点的是6，删掉9、10
									ParentEle.next().next().next().remove();
									last.text(totality);
								}
									
							}
							else{
								console.log("082");
								if( page == 4 && li_1.text() == 1 ){
									console.log("0820");
									ParentEle.next().after(html2);                //比如：1 2 3 4 5 ...12  点的是4
								}
								else{
									if( page == 5 && li_1.text() == 1 ){
										console.log("08241");
										ParentEle.prev().prev().prev().remove();   //比如：1... 6 7 8 9 10 ...12  点的是10，删掉6
										
										ParentEle.after(html3);
									}
									else{
										if( length1 == parseInt(page-1) && length2 == firstPage && last.text() == totality ){
											console.log("08211");
											ParentEle.prev().before(html5);
											
											ParentEle.next().next().next().remove();          //比如：1... 6 7 8 9 10 ...12  点的是7，删掉10
										}
										else if( length1 == parseInt(page-1) && length2 == firstPage && last.text() == total_page ){
											console.log("08212");
											
											ParentEle.prev().before(html5);                   //比如：1... 6 7 8 9 10   点的是7
										}
										else if( length1 == parseInt(page-1) && length2 == parseInt(page-2) && length3 == firstPage ){
											console.log("0822");
											ParentEle.next("li").after(html2);			      //比如：1... 6 7 8 9 10 ...12  点的是8
										}
										else if( length1 == parseInt(page-1) && length2 == parseInt(page-2) && length3 == parseInt(page-3) && length4 == firstPage && nextVal1 == parseInt(page+1) && nextVal2 == totality ){
											console.log("0823");
											ParentEle.prev().prev().prev().remove();          //比如：1... 6 7 8 9 10 ...12  点的是9，删掉6
											ParentEle.next().after(html2);                    //比如：1... 2 3 4 5 ...12  点的是5
										}
										else if( length1 == parseInt(page-1) && length2 == parseInt(page-2) && length3 == parseInt(page-3) && length4 == parseInt(page-4) && nextVal1 == totality ){
											console.log("0824");
											
											ParentEle.prev().prev().prev().prev().remove();   //比如：1... 6 7 8 9 10 ...12  点的是10，删掉6
											ParentEle.prev().prev().prev().remove();          //比如：1... 6 7 8 9 10 ...12  点的是10，删掉7
											
											ParentEle.after(html3);
										}
										else{
											console.log("0826");
											if( length1 == parseInt(page-1) && length2 == parseInt(page-2) && length3 == parseInt(page-3) && length4 == firstPage && nextVal1 == totality ){
												console.log("08261");
												
												ParentEle.prev().prev().prev().prev().remove();//比如：1... 6 7 8 9 10 ...12  点的是10，删掉6
												ParentEle.prev().prev().prev().remove();       //比如：1... 6 7 8 9 10 ...12  点的是10，删掉7
												
												ParentEle.after(html3);
											}
										}
									}
								}
								li_1.text(firstPage);
								last.text(totality);
							}
							
							
						}
						else{                                             //判断点击页码是否大于等于4  ,以及 总页数 减去 点击页码小于3
							console.log("09001111");
							if( length1 == firstPage && nextVal1 == page+1 && nextVal2 == page+2 && nextVal3 == page+3 && nextVal4 == total_page && last.text() == total_page ){
								console.log("0900");
								if(  page == 3 && li_1.text() == 1 ){
									console.log("09001");
									ParentEle.prev().prev().prev().remove();       //比如：1... 3 4 5 6 7  点的是3，删掉6
								
									ParentEle.before(html6);
									ParentEle.next().next().next().remove();       //比如：1... 2 3 4 5 6 ...7  点的是3，删掉6
									
									li_1.text("1");
									last.text(totality);
								} else{
									console.log("09002");
									if( page == 3 && li_1.text() == firstPage ){   //比如：1... 3 4 5 6 7  点的是3，删掉6
										console.log("090021-----");
										ParentEle.next().next().next().remove();
										li_1.text("1");
										ParentEle.before(html6);
										last.text(totality);
									}
									else{
										console.log("090022-----");
										ParentEle.prev().prev().prev().remove();       //比如：1... 4 5 6 7 8  点的是4，删掉7
									
										ParentEle.before(html3);
										last.text(totality);
									}
								}
							}
							
							//console.log("page-1:"+(page-1),"firstPage:"+firstPage,"nextVal1:"+(page+1),"nextVal2:"+(page+2),"nextVal3:"+(page+3),"nextVal4:"+nextVal4,"last.text():"+last.text());
							if( length1 == page-1 && length2 == firstPage && nextVal1 == page+1 && nextVal2 == page+2 && nextVal3 == page+3 && nextVal4 == total_page && last.text() == total_page ){
								console.log("0901");
								
								//ParentEle.prev().prev().prev().remove();       //比如：1... 4 5 6 7 8  点的是5，

								ParentEle.prev().before(html5);    //比如：1... 4 5 6 7 8  点的是5，
								last.text(totality);
							}
							
							if( page == 2 && $(".on").children().text() == 4 ){
								console.log("092");
								ParentEle.next().next().next().next().remove();
							}
							
							if( page == 2 && length1 == firstPage ){       //比如：1... 2 3 4 5 6 ...7  点的是2，删掉6
								console.log("092");
								li_1.text(1);
								ParentEle.next().next().next().next().remove();
							}
							
							
							if( total_page-page<=2 ){                      //判断点击的页码被总页数减去是否等于2
								console.log("093");
								console.log( "total_page-page:"+(total_page-page)+"，nextVal1:"+nextVal1+"，last.text():"+(last.text()) );
								if(total_page-page==2 && nextVal1 == totality ){
									console.log("0931");
										
//									if(  ){
										ParentEle.prev().prev().prev().prev().remove();          //比如：1... 2 3 4 5 6 ...8  点的是6，删掉2、3
										ParentEle.prev().prev().prev().remove();
										ParentEle.after(html1);
//									}
//									else{
//										ParentEle.prev().prev().prev().remove();          //比如：1... 3 4 5 6 7 ...12  点的是6，删掉3
//										ParentEle.after(html1);
//									}
								}
								
								
								else if(total_page-page==2 && nextVal1 == page+1 && last.text() == totality ){
									console.log("0932");
									ParentEle.prev().prev().prev().remove();          //比如：1... 3 4 5 6 7 ...12  点的是6，删掉3
									                                                  //比如：1... 4 5 6 7 8  点的是6
									
								}
								else if( total_page-page==1 && nextVal1 == total_page ){
									console.log("0933");
									//ParentEle.prev().prev().prev().prev().remove();          //比如：1... 3 4 5 6 7 ...12  点的是6，删掉3
									//ParentEle.after(html1);
								}
								//ParentEle.prev().prev().prev().prev().remove();   //比如：1... 6 7 8 9 10 ...12  点的是10，删掉6
								
								last.text(total_page);
								
								li_1.text(firstPage);
							}
							else{
								console.log("要计算的另外情况")
								          //比如：1... 3 4 5 6 7 ...12  点的是6，删掉3
							}
						}
					}
				}
			}
			ParentEle.addClass("on");
			ParentEle.siblings().removeClass("on");
		}
		else if( page==1 || page == firstPage ) {                         //隐藏上一页按钮   点击的是第一页
			console.log("7");
			$(".pages-prev").addClass("dis_none");
			$(".list .box").attr("data-nowpage",1);
			ParentEle.addClass("on");
			ParentEle.siblings().removeClass("on");
			if( total_page>=6 ){
				var html5 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(1+1)+'</a></li>';
				var html6 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(1+2)+'</a></li>';
				var html7 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(1+3)+'</a></li>';
				var html8 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(1+4)+'</a></li>';
				var html9 = html5+html6+html7+html8;1
				
				if( page==1 ){
					console.log("71");
					
				}
				else if( page == firstPage && last.text() == total_page ){//比如：1... 4 5 6 7 8  点的是1，删掉4、5、6、7
					console.log("72");
					
					ParentEle.next().next().next().next().remove();
					ParentEle.next().next().next().remove();
					ParentEle.next().next().remove();
					ParentEle.next().remove();
					
					//删掉之后再重新加回来
					ParentEle.after(html9);
					
					last.text(totality);
				}
				else if( page == firstPage && last.text() == totality ){//比如：1... 4 5 6 7 8  ...12  点的是1，删掉4、5、6、7、8
					console.log("72");
					
					ParentEle.next().next().next().next().next().remove();
					ParentEle.next().next().next().next().remove();
					ParentEle.next().next().next().remove();
					ParentEle.next().next().remove();
					ParentEle.next().remove();
					
					
					
					//删掉之后再重新加回来
					ParentEle.before(html9);
				}
			}
			
			li_1.text("1");
			
			$(".pages-next").removeClass("dis_none");                     //显示下一页按钮
		}
		else if( page == totality ){                                      //点击最后一页
			console.log("77");
			$(".pages-prev").removeClass("dis_none");
			$(".pages-next").addClass("dis_none");                        //隐藏下一页按钮
			$(".list .box").attr("data-nowpage",total_page);
			page=total_page;
			ParentEle.addClass("on");
			ParentEle.siblings().removeClass("on");
			
			
			if(total_page>=6){
				console.log("771");
				var html5 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-4)+'</a></li>';
				var html6 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-3)+'</a></li>';
				var html7 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-2)+'</a></li>';
				var html8 = '<li><a href="javascript:;" onclick="SLEW(this)">'+parseInt(page-1)+'</a></li>';
				var html9 = html5+html6+html7+html8;

				if( li_1.text() == 1 ){                                                   //比如：1 2 3 4 5 ...12  点的是12，删掉3、4、5、6、7
					console.log("7711");
					ParentEle.prev().prev().prev().prev().remove();
					ParentEle.prev().prev().prev().remove();
					ParentEle.prev().prev().remove();
					ParentEle.prev().remove();
					
					//删掉之后再重新加回来
					ParentEle.before(html9);
				}
				else{                                                     //比如：1... 3 4 5 6 7 ...12  点的是12，删掉3、4、5、6、7
					console.log("7712");
					ParentEle.prev().prev().prev().prev().prev().remove();
					ParentEle.prev().prev().prev().prev().remove();
					ParentEle.prev().prev().prev().remove();
					ParentEle.prev().prev().remove();
					ParentEle.prev().remove();
					
					//删掉之后再重新加回来
					ParentEle.before(html9);
				}
			}
			li_1.text(firstPage);
			last.text(total_page);
		}
		else if( page== "上一页" ){
			console.log("8");
			if( NowPage > 2 ){
				console.log("81");
				$(".list .box").attr("data-nowpage",NowPage-1);
				page=NowPage-1;
			}
			else{
				console.log("82");
				$(".pages-prev").addClass("dis_none");
				$(".list .box").attr("data-nowpage",1);
				page=1;
			}
			$(".pages .on").removeClass("on").prev("li").addClass("on");
			$(".pages-next").removeClass("dis_none");                     //显示下一页按钮
			if( total_page>=6 ){
				if( NowPage<=4 ){
					console.log("83");
					li_1.text("1");
					last.text(totality);
				}
				else{
					console.log("83");
					li_1.text(firstPage);
					if( total_page-NowPage<=2 ){
						last.text(total_page);
					}
					else{
						last.text(totality);
					}
				}
			}
			else{
				console.log("84");
			}
		}
		else if( page == "下一页<i></i>" ){
			console.log("9");
			if( NowPage+1 == total_page ){
				console.log("91");
				$(".pages-next").addClass("dis_none");                    //隐藏下一页按钮
				$(".list .box").attr("data-nowpage",total_page);
				page=total_page;
			}
			else if( NowPage == total_page ){
				return false;
			}
			else{
				console.log("93");
				$(".pages-prev").removeClass("dis_none");                 //显示上一页按钮
				$(".list .box").attr("data-nowpage",NowPage+1);
				page=NowPage+1;
			}
			$(".pages .on").removeClass("on").next("li").addClass("on");
			
			if( total_page>=6 ){
				console.log("NowPage:"+NowPage);
				if( NowPage+1<4 ){
					console.log("94");
					li_1.text("1");
					last.text(totality);
				}
				else{
					li_1.text(firstPage);
					if( total_page-NowPage<=2 ){
						console.log("95");
						last.text(total_page);
					}
					else{
						console.log("96");
						last.text(totality);
					}
					
				}
					
			}
			else{
				console.log("84");
			}
		}
	}
	
	$(".list .boxxxxxx").html("");
	$("html,body").animate({ scrollTop: $(".totalTitle").offset().top }, {duration: 500,easing: "swing"});
	$.ajax({
        url:'/index.php?m=api&c=index&v=star_list',
        data:{page:page},
        method:'post',
        dataType:'json',
        beforeSend:function(){
        	$(".tips").text("");
			$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
        },
        success:function( data ){
            if(data.status == 1){
            	var html="";
            	
				$.each(data.tips,function(i,item){
					if(i>=4){
	            		$(".main .list .box").css("min-height","740px")
	            	} else{
	            		$(".main .list .box").css("min-height","370px")
	            	}
	        		html += '<div class="modules">'+
				            	'<a class="figure headPortrait borderRadius50" style="background-image: url('+data.tips[i].headpic+');" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'" title="头像"></a>'+
								'<p class="name"><a href="javascript:;" onclick="SLEW(this)">'+data.tips[i].username+'</a></p>'+
								'<p class="synopsis omit lineNumber4">'+data.tips[i].autograph+'</p>'+
							'</div>';
	           	});
	           	$(".list .boxxxxxx").append(html);
            }
            else{
                layer.msg(data.tips);
            }
        },
        complete:function(){
        	$(".tips").text("");
        }
    });
}

//确定   跳转页面
function check(){
    var page = $('#pages').val();
    if (page>total_page || page<1) {
    	layer.msg("不在页数范围内!");
    }
    else{
    	$(".list .boxxxxxx").html("");
		$("html,body").animate({ scrollTop: $(".totalTitle").offset().top }, {duration: 500,easing: "swing"});
		
    	$.ajax({
	        url:'/index.php?m=api&c=index&v=star_list',
	        data:{page:page},
	        method:'post',
	        dataType:'json',
	        beforeSend:function(){
	        	$(".tips").text("");
				$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
	        },
	        success:function( data ){
	            if(data.status == 1){
	            	var html="";
					$.each(data.tips,function(i,item){
		        		html += '<div class="modules">'+
					            	'<a class="figure headPortrait borderRadius50" style="background-image: url('+data.tips[i].headpic+');" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'" title="头像"></a>'+
									'<p class="name"><a href="javascript:;" onclick="SLEW(this)">'+data.tips[i].username+'</a></p>'+
									'<p class="synopsis omit lineNumber4">'+data.tips[i].autograph+'</p>'+
								'</div>';
		           	});
		           	$(".list .boxxxxxx").append(html);
	            }
	            else{
	                layer.msg(data.tips);
	            }
	        },
	        complete:function(){
	        	$(".tips").text("");
	        }
	    });
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