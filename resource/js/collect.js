/*2018-10-18   19:42:22
 * HQS
 * 
 * PC端    所有页面  的  收藏、私信、关注
 * */

function collect(id){
	var type = $("#uid").attr("data-type");//数值(1-日志，2-tv,3-游记,4-收藏)
	$(".maskLayer,.menuOption").addClass("dis_none");
    $.post("/index.php?m=api&c=Favtravel&v=collection", {
        'action':1,  //action:数值(0取消，1收藏)
        't_id':id,  //t_id:数值(日志的ID或者tv的ID或者游记的id )
        'type':type  //type:数值(1-日志，2-tv,3-游记,4-收藏)
    }, function(data){
    	layer.msg(data.tips);
    },"JSON");
}

//关注
function follows(bid, obj){
	var property = $(obj).attr("data-val");
	var fans = parseInt($(".bd .s1").text());                    //TA的
	var num = parseInt($(obj).next("p").find(".fans").text());   //首页
    $.post("/index.php?m=api&c=index&v=follow", {
        'bid':bid
    }, function(data){
    	layer.msg(data.tips);
        if(data.status == 1){
            $(obj).html('已关注');
            $(obj).css({"background-color":"#5f636d","border-color":"#5f636d"});
	        if( property == "homePage" ){
	        	$(obj).next("p").find(".fans").text(num+1);
	        }else{
	        	$(".bd .s1").text(fans+1);
	        }
        }else if(data.status == 2){
            $(obj).html('+&nbsp;关注');
            $(obj).css({"background-color":"#fa5252","border-color":"#fa5252"});
	        if( property == "homePage" ){
	        	$(obj).next("p").find(".fans").text(num-1);
	        }else{
	        	$(".bd .s1").text(fans-1);
	        }
        }
    },"JSON");
}