//2018-11-19   17:23:24
//HQS

//达人游记


//精选文章
var swiper1 = new Swiper('#ArticleSwiper', {
	speed: 3000,
	autoplay: {
		delay: 3000
	},
	loop: true,
});


//年份选择 下拉列表
$(".m-read-qm .con h3").click(function() {
    $(this).next("dl").stop().slideToggle("fast");
});


//月份、翻页共用方法
function turn_page(page){
    var yearNum  = arguments[1]?arguments[1]:parseInt($("#yearNum").text());     //获取当前年份
    var monthNum = arguments[2]?arguments[2]:parseInt($("#monthNum").text());    //获取当前月份
	var type=arguments[3]?arguments[3]:1;  //类型：1-页码    2-月份切换页
    var cur_page = $("#cur_page").val();   //当前页
	var total_page = parseInt($("#total_page").text());
	cur_page = parseInt(cur_page);
	
	var display_page=5;
	var offset=2;//常量，分页显示前后2

	var target_page=0;
	if( page =='pre' ){//上一页
		target_page=parseInt(cur_page)-1;
	}
	else if( page=='next' ){//next
		target_page = cur_page+1;
	}
	else{//number
		if( page == "... "+total_page ){
			page=page.replace(/.../,'');
		}
		target_page=parseInt(page);
	}

	if( type==1 && parseInt(cur_page) == target_page ){
		return false;
	}
	
	$(".ArticleList .box").html("");
	
	$.ajax({
		url:'/index.php?m=api&c=travelnote&v=get_list',
        data:{  'year':yearNum,
        		'month':monthNum,
		        'page':target_page,
				'type':type
	    	},
		method:'post',
		dataType:'json',
		beforeSend:function(){
			$(".tips").text("");
			$(".tips").html('<img class="loading" src="/resource/m/images/common/loading.gif"/>');
			
			$("#monthNum").text(monthNum);
			$('ul.ul_txt1_qm li').removeClass('on');
			$('ul.ul_txt1_qm li[data-monthnum='+monthNum+']').addClass('on');
			$('#cur_page').val(1);
		},
		success:function( data ){
			if(data.status == 1){
				var html="";
				$.each(data.tips,function(i,item){
					if(i>=4){
						$(".main .list .box").css("min-height","740px")
					}
					else{
						$(".main .list .box").css("min-height","370px")
					}
					html += '<div class="module fix">'+
								'<a class="figure left poster borderRadius" href="/index.php?m=index&c=index&v=rytdetai&id='+data.tips[i].id+'" style="background-image: url('+data.tips[i].top_pic+');" title="海报/封面"></a>'+
								'<div class="right">'+
									'<a class="dis_block" href="/index.php?m=index&c=index&v=rytdetai&id='+data.tips[i].id+'">'+
										'<p class="title apostrophe">'+data.tips[i].title+'</p>'+
										'<span class="time">'+data.tips[i].showtime+'</span>'+
										'<p class="describe omit lineNumber4 whiteSpace">'+data.tips[i].summary+'</p>'+
									'</a>'+
									'<div class="diamonds">';
							if( data.tips[i].address !='' && data.tips[i].address !=null ){ //判断用户 有没有加 定位地址
								html += '<div class="location">'+
											'<img class="smallIcon" src="/resource/m/images/common/icon_location2.png"/>'+
											'<i class="Iclass">'+data.tips[i].address+'</i>'+
										'</div>';
							}
								html += '<span style="float:left;">BY&nbsp;&nbsp;</span>';
										
							if( data.tips[i].type == 2 ){
								html += '<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'" style="background-image: url('+data.tips[i].headpic+');"></a>&nbsp;&nbsp;'+ 
										'<a class="name" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'">'+data.tips[i].username+'</a>';
							}
							else{
								html += '<a class="headPortrait" href="javascript:;" style="background-image: url('+data.tips[i].headpic+');"></a>&nbsp;&nbsp;'+
										'<a class="name" href="javascript:;">'+data.tips[i].username+'</a>';
							}	
								html += '<span class="shownum"><i class="Iclass">'+data.tips[i].shownum+'</i>次浏览</span>'+
									'</div>'+
								'</div>'+
								'<a class="seeMore" href="/index.php?m=index&c=index&v=rytdetai&id='+data.tips[i].id+'">查看更多</a>'+
							'</div>';
				});
				$(".ArticleList .box").append(html);
				$("#cur_page").val(target_page);
				
				//组装分页
				if( type==1 ){  //表示页码间的翻页
					multipages(target_page,total_page,display_page,offset);
				}
				else{           //表示月份的切换，重新组装【整个】页码
					//清除旧的页码
					$('div.pages').remove();
					
					var new_html="";
					if( data.multipage.length ){//>10
						new_html += '<div class="pages">'+
										'<div class="amount">共<i class="Iclass" id="total_page">'+data.total_page+'</i>页 / <i class="Iclass">'+data.num+'</i>条</div>'+
										'<ul><li class="pages-prev dis_none"><a href="javascript:;" onclick="turn_page(\'pre\')" data-val="上一页"></a></li>';
							for( var i=0;i<data.multipage.length;i++ ){
								new_html += '<li class="li_'+data.multipage[i][0]+' li ';
								if( data.multipage[i][2] ){
									new_html += data.multipage[i][2];
								}
									new_html += '"><a href="javascript:;" onclick="turn_page('+data.multipage[i][0]+')" data-val="'+data.multipage[i][0]+'">'+data.multipage[i][0]+'</a> </li>';
							}
								new_html += '<li class="pages-next"><a href="javascript:;" onclick="turn_page(\'next\')">下一页<i></i></a></li>'+
											'<li class="pages-form">到<input class="inp pageJump_text" type="number" id="pages" onkeyup="judgeIsNonNull2(event)">页 ' +
												'<input class="btn" type="button" id="pageqr" value="确定" onClick="check()" /> </li>'+
										'</ul>'+
									'</div>';
						$('div.pagination').append(new_html);
					}
				}
				$("html,body").animate({ scrollTop: $(".cur").offset().top }, {duration: 500,easing: "swing"});
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

//组装分页
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
		html +='<li class="li_'+i+' '+class_on+' li"><a href="javascript:;" onclick="turn_page('+i+')">'+i+'</a></li>';
		class_on="";
	}

	if( to < total_page ){
		html +='<li class="li_'+total_page+' li"><a href="javascript:;" onclick="turn_page('+total_page+')">'+total_page+'..</a></li>';
	}

	$('li.li').remove();
	$('.pages-prev').after(html);
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

//确定   跳转页面
function check(){
	var page = $('#pages').val();//跳转
	var cur_page = $("#cur_page").val();   //当前页
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