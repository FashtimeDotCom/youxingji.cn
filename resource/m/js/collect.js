/*2018-10-18   19:42:22
 * HQS
 * 
 * 移动端    所有页面  的  收藏、私信、关注
 * */


//█★█★█★█★█★█★█★█★█★█★
//注意  说明
//█★█★
//由于    TA的视频、 行程直播 等等 页面涉及到  点击【收藏】按钮的 函数，
//所以都写在一块


//收藏     在【TA的。。。】页面
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

//关注     在【TA的。。。】页面
function follows(bid, obj){
	var fans = parseInt($(".fans").text());
    $.post("/index.php?m=api&c=index&v=follow", {
        'bid':bid
    }, function(data){
    	layer.msg(data.tips);
        if(data.status == 1){
            $(obj).html('已关注');
            $(obj).css({"background-color":"#5f636d","border-color":"#5f636d"});
            $(".fans").text(fans+1);
        }else if(data.status == 2){
            $(obj).html('+&nbsp;关注');
            $(obj).css({"background-color":"#f33b3b","border-color":"#f33b3b"});
            $(".fans").text(fans-1);
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