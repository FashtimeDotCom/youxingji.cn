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


/*
*
* This Function Is Userd To Tuan Page
* params:
*	page:target to page
*
* */
function turn_page(page){
	var curent_page=$('#cur_page').val();//当前页
	var display_page=5;
	var offset=2;//常量，分页显示前后2

	var target_page=0;
	if( page =='pre' ){//上一页
		target_page=parseInt(curent_page)-1;
	}
	else if( page=='next' ){//next
		target_page=parseInt(curent_page)+1;
	}
	else{//number
		console.log("1");
		if( page == "... "+total_page ){
			console.log("22");
			page=page.replace(/.../,'');
		}
		target_page=parseInt(page);
	}

	//traget_page == current page
	if( parseInt(curent_page) == target_page ){
		return false;
	}
	
	$(".list .boxxxxxx").html("");
	$("html,body").animate({ scrollTop: $(".totalTitle").offset().top }, {duration: 500,easing: "swing"});

	$.ajax({
		url:'/index.php?m=api&c=index&v=star_list',
		data:{page:target_page},
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
					}
					else{
						$(".main .list .box").css("min-height","370px")
					}
					html += '<div class="modules">'+
								'<a class="figure headPortrait borderRadius50" style="background-image: url('+data.tips[i].headpic+');" href="/index.php?m=index&c=muser&v=index&id='+data.tips[i].uid+'" title="头像" target="_blank"></a>'+
								'<p class="name"><a href="javascript:;">'+data.tips[i].username+'</a></p>'+
								'<p class="synopsis omit lineNumber4 whiteSpace">'+data.tips[i].autograph+'</p>'+
							'</div>';
				});
				$(".list .boxxxxxx").append(html);
				$("#cur_page").val(target_page);
				//组装分页
				multipages(target_page,total_page,display_page,offset);
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
		html +='<li class="li_'+i+' li '+class_on+'"><a href="javascript:;" onclick="turn_page('+i+')">'+i+'</a></li>';
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

//跳转
function check(){
	var page = $('#pages').val();//跳转
	var cur_page = $(".on a").text();   //当前页
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