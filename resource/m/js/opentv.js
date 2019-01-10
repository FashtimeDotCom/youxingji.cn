/*2018-10-18
 * HQS
 * 
 * 所有页面  的  打开、关闭视频
 * */


//█★★★█
//我的视频、    我收藏的视频、   TA的视频、首页、达人视频、 行程直播

function js_video(obj){
	//打开视频
	var iframe;
	var _src = $(obj).attr("data-src");
	iframe="<iframe src='"+_src+"' frameborder=0 'allowfullscreen'></iframe>";
	$('.VideoArea').css("height","100%");
	$('.VideoArea').html(iframe);
	$('.m_pop1_yz').fadeIn();
}

function js_close(){
	//关闭视频
	$('.VideoArea iframe').remove();
	$('.m_pop1_yz').fadeOut();
	event.stopPropagation();
}