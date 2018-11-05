/*2018-10-18
 * HQS
 * 
 * 移动端    所有页面  的  打开。关闭视频
 * */


//█★█★█★█
//注意  说明
//█★★★█
//由于   个人中心我的视频、    我收藏的视频、    TA的视频、首页、达人视频、 行程直播 等等 页面涉及到  点击视频按钮的 函数
//-----
//部分页面  有下拉更新等方法是   需要再次 【调用】这个方法
//-----★█★█★█★█★█★█★

function js_video(obj){
	//打开视频
	var iframe;
	var tid = $(obj).attr("data-id");
	var _src = $(obj).attr("data-src");
	iframe="<iframe src='"+_src+"' frameborder=0 'allowfullscreen'></iframe>";
	$('.VideoArea').html(iframe);
	$('.m_pop1_yz').fadeIn();
}

function js_close(){
	//关闭视频
	$('.VideoArea iframe').remove();
	$('.m_pop1_yz').fadeOut();
	event.stopPropagation();
}