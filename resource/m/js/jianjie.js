/*2018-10-22 20:21:38
 * HQS
 * 
 * 移动端    我的、TA的页面  简介
 * */

//进入页面自动加载
var dataLength=$("#UniqueValue").attr("data-length"); //页面 的唯一值
//var dataNature=$("#UniqueValue").attr("data-nature"); //页面 的唯一值

//获取个人中心的简介
window.characterSize = $("#synopsis").val(); //字符长度
function autoloading(){
	if( parseInt(characterSize.length) <=dataLength ){
		$(".autograph").text(characterSize);
		$(".viewMore").addClass("dis_none");
	} else{
		$(".autograph").text(characterSize.substring(0,dataLength)+"...");
		$(".viewMore").removeClass("dis_none");
	}
}
autoloading();

//查看更多
$(".viewMore").on("click",function(){
	var obj = $(this);
	var dataOpen = obj.attr("data-open");
	if( dataOpen == 0 ){
		$(".autograph").text(characterSize);
		obj.text("收起全文");
		obj.attr("data-open","1");
	} else{
		$(".autograph").text(characterSize.substring(0,dataLength)+"...");
		obj.text("查看全文");
		obj.attr("data-open","0");
	}
});