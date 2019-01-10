//2018-12-13  17：17：08
//HQS

//页码 确认按钮跳转、敲回车跳转


var UniqueValue=$("#UniqueValue").val();          //页面 的唯一值
var dataSign=$("#UniqueValue").attr("data-sign"); //页面 的唯一标记
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var uid = $("#uid").val();                        //TA的帐号唯一ID


var total_page = parseInt($("#total_page").text());                       //总页数
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
    var page = $('#pages').val();
    var cur_page = $(".pages .on a").text();            //当前页
    var sort = $(".secondaryMenu").attr("data-page");   //我的问答/TA的问答  区分：我的提问、我的回答
    var Link1,Link2,Link3;
    if( dataType == "1" ){
    	Link1 = "index";           //我的日志
    	Link2 = "index";           //TA的
    	Link3 = "travel";          //我收藏的
    }
    else if( dataType == "2" ){
    	Link1 = "tv";           //我的视频
    	Link2 = "tv";           //TA的
    	Link3 = "tv";           //我收藏的
    }
    else if( dataType == "3" ){
    	Link1 = "travel";           //我的游记
    	Link2 = "travel_note";           //TA的
    	Link3 = "note";           //我收藏的
    }
    else{
    	Link1 = "my_faq";           //我的问答
    	Link2 = "ta_faq";           //TA的
    	Link3 = "faq";           //我收藏的
    }
    
    if(page){
    	if (page>total_page || page<1) {
			layer.msg("不在页数范围内!");
			return false;
		}
		if( cur_page == page ){
			layer.msg("该页码已经是当前页!");
			return false;
		}
		else{
			if( dataSign == "my" ){
				if( dataType == "4" ){
					window.location.href="/index.php?m=index&c=user&v="+Link1+"&type="+sort+"&page=" + page;
				}
				else{
					window.location.href="/index.php?m=index&c=user&v="+Link1+"&page=" + page;
				}
			}
			else if( dataSign == "his" ){
				if( dataType == "4" ){
					window.location.href="/index.php?m=index&c=muser&v="+Link2+"&type="+sort+"&id="+uid+"&page=" + page;
				}
				else{
					window.location.href="/index.php?m=index&c=muser&v="+Link2+"&id="+uid+"&page=" + page;
				}
				
			}
			else if( dataSign == "collect" ){
				window.location.href="/index.php?m=index&c=collection&v=collection_"+Link3+"&page=" + page;
			}
			
		}
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

