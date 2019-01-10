//2018-11-23  09:38:59
//HQS

//达人问答   列表



//确认按钮搜索
function searchAffirm(){
	var searchVal = $("#search").val();
	if( searchVal == "" ){
		layer.msg('请输入要搜索的内容！');
		return false;
	}
	else if(searchVal.replace(/(^\s*)|(\s*$)/g, "")==""){
		layer.msg('搜索栏不能只输入空格！');
		return false;
	}
	
	$.ajax({
        url:'',
        data:{type:searchVal},
        method:'post',
        dataType:'json',
        success:function( data ){
            if(data.status == 1){
            	window.location="/index.php?m=index&c=index&v=login&from=";
            }
            else{
                $(".empty4").removeClass("dis_none");
                $(".tips4").addClass("dis_none");
            }
        },
        complete:function(){ }
    });
}

//敲回车 确认搜索
function on_return(){
	if(window.event.keyCode == 13){
		if(document.all('searchAffirm') != null) {
			document.all('searchAffirm').click();
		}
	}
}



//我要提问
$("#skip").on("click",function(){
	var id = $(this).attr("data-id");
    $.post("index.php?m=index&c=user&v=is_login", {
    	
    }, function(data){
        if(data.status == 1){ //登录了，直接跳转
        	window.location="/index.php?m=index&c=faq&v=set_faq";
        }else{ //没有登录，带参数跳转到登录页
        	layer.msg(data.tips);
        	setInterval(function(){
				window.location="/index.php?m=index&c=index&v=login&from="+"{{$from_url}}";
			},1000);
        }
    },"JSON");
});


//标签 更多
$(".evenMore").on("click",function(){
	var obj = $(this);
	obj.addClass("dis_none");
	obj.siblings(".label").removeClass("dis_none");
});