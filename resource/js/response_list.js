//2018-11-27  16:39:37
//HQS

//问题详情页


//进入页面直接赋值
function from_url(){
    window.from_url = $("#from_url").val();
    $(".from_url").attr("href","/index.php?m=index&c=index&v=login&from="+from_url);
}
from_url();



//进入页面自动加载
var dataLength=$("#UniqueValue").attr("data-length"); //页面 的唯一值

function autoloading(){
    var length = $("#boxList .modules").children(".detailss").length;
    for(var i=0;i<=length;i++){
        var value = $("#boxList .modules").eq(i).children(".detailss"); //字符长度
        if( parseInt(value.height()) >=300 ){
            $("#boxList .modules").eq(i).children(".detailss").css("height","300px");
            $("#boxList .modules").eq(i).children(".readSwitch").removeClass("dis_none");
        }
        else{
            $("#boxList .modules").eq(i).children(".detailss").css("height","auto");
        }
    }
}
autoloading();


//展开全文阅读
$(".readSwitch a").on("click",function(){
    var obj = $(this);
    var dataSwitch = obj.attr("data-switch");
    var id = obj.parents(".modules").attr("id");
    if( dataSwitch == 0 ){
        obj.parent().prev(".detailss").css("height","auto");
        obj.children(".Iclass").text("收起全文");
        obj.children(".icon").removeClass("icon1").addClass("icon2");
        obj.attr("data-switch","1");
        obj.attr("href","javascript:;");
    }
    else{
        obj.parent().prev(".detailss").css("height","300px");
        obj.children(".Iclass").text("展开全文阅读");
        obj.children(".icon").removeClass("icon2").addClass("icon1");
        obj.attr("data-switch","0");
        obj.attr("href","#"+id);
    }
});


//搜索  确认按钮
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
                //window.location="/index.php?m=index&c=index&v=login&from=";
            }
            else{
                $(".empty4").removeClass("dis_none");
                $(".tips4").addClass("dis_none");
            }
        },
        complete:function(){ }
    });
}

//监控  评论内容输入框 ，包括粘贴板
function judgecomment(obj){
    var value = $(obj).val();
    var x = event.which || event.keyCode;
    if( value.length <= 255 ){
        //console.log("符合255位数以内");
    }
    else{
        return $(obj).val(value.substr(0, 255));
    }
    if( value.length > 255 ){
        $(obj).val(setString($(obj).val(),255));
    }
    $(obj).parent().next(".bottomArea").find("i").html(value.length);

}
//监控 回复框正文内容 通过粘贴板 输入
function  inputBox(){
	$(".inputBox").focus(function(){
		//监控 正文内容输入框 ，包括粘贴板
		$(this).bind('input propertychange', function(){
			judgecomment(this)
		});
	});
}
inputBox();


//监控  评论的页码内容输入框 ，包括粘贴板
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
            window.location="/index.php?m=index&c=user&v=set_question";
        }else{ //没有登录，带参数跳转到登录页
            layer.msg(data.tips);
            setInterval(function(){
                window.location="/index.php?m=index&c=index&v=login&from="+from_url;
            },1000);
        }
    },"JSON");
});

//回答问题
$(".respond").on("click",function(){
    $("html, body").animate({ scrollTop: $("#IWillAnswer").offset().top }, 1000);
});


//建立编辑器  回答问题的富文本
layui.use('layedit', function(){
    var layedit = layui.layedit;

    layedit.set({
        uploadImage: {
            url: '/index.php?m=api&c=index&v=uploadpic' //接口url
            ,type: 'post' //默认post
            ,ext: 'jpg|png|jpeg|bmp'
            ,before: function(obj){
                $('#picslist').before('<span style="color: #d71618;" class="tips">上传中...</span>');
            },
            success: function (data) {
                $('#piclist').html('<div class="upic" onclick="deletepic(this)"><img src="'+ data.url +'" class="layui-upload-img"><i class="iz layui-icon">&#xe640;</i></div>');
            }
        }
    });

    var index =layedit.build('demo', {
        height: 180
    });

    //编辑器外部操作
    var active = {
        content: function() {
            var content = layedit.getContent(index);
            add(content);
        },
        text: function() {
            var content = layedit.getContent(index);
            draft(content); //获取编辑器纯文本内容
        },
        selection: function() {
            alert(layedit.getSelection(index));
        }
    };
    //我要回答
    $('#response').on('click', function() {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });
});

//我要回答
function add(con) {
    var faq_id = $("#faq_id").val();
    if(!con) {
        layer.msg('请输入正文');
        return false;
    }
    if(con.replace(/(^\s*)|(\s*$)/g, "")==""){
        layer.msg('正文内容不能只输入空格！');
        return false;
    }

    $.post("/index.php?m=api&c=faq&v=save_response_faq", {
        'faq_id':faq_id,
        'content': con
    }, function(data) {
        layer.msg(data.tips);
        if(data.status == 1) {
            var html='<div class="modules fix" id="modules'+data.id+'">'+
		                '<div class="writer">'+
			                '<div class="left">'+
				                '<div class="figure headPortrait" style="background-image: url('+data.headpic+');"></div>'+
				                '<span class="name">'+data.username+'</span>'+
				                '<span class="time">'+data.addtime+'</span>'+
			                '</div>'+
			                '<a href="javascript:;" class="dianzan" onclick="zan(this,'+data.id+')" data-nature="subject">'+
			                	'<em></em>&nbsp;<i class="Iclass">0</i>'+
			                '</a>'+
		                '</div>'+
		                '<div class="detailss whiteSpace" title="回答的内容" style="padding-bottom: 15px;">'+data.content+'</div>'+
		                '<p class="readSwitch dis_none">'+
			                '<a href="javascript:;" data-switch="0">'+
			                	'<i class="Iclass">展开全文阅读</i><img class="icon icon1" src="/resource/m/images/user/8.png" />'+
			                '</a>'+
		                '</p>'+
	                '</div>';
            $("#boxList").prepend(html);
            $("html, body").animate({ scrollTop: $("#boxList").offset().top-50 }, {duration: 50,easing: "swing"});
        }
    }, "JSON");
}


/*2018-10-11
 * HQS
 *
 * 评论  + 回复   开始 */

//评论框 获取焦点
$(".OpenCommentList a").on("click",function(){
    var obj = $(this);
    var dataSwitch = obj.attr("data-switch");
    if( dataSwitch == 0 ){
        obj.parent().next(".m_comment").css({"overflow":"unset","height":"auto"});
        obj.parent().next(".m_comment").animate({"padding-bottom":"18px","padding-top":"15px","min-height":"153px","border":"1px #f1f1f1 solid"});
        obj.parent().next(".m_comment").children(".location").animate({"height":"14px"});
        obj.parent().next(".m_comment").children(".m_publish").find(".content textarea").animate({"height":"70px"});
        obj.parent().next(".m_comment").children(".m_publish").find(".addComment").animate({"height":"32px"});
        obj.attr("data-switch",1);
        jointly1();
    }
});


var rid=$("#UniqueValue").attr("data-rid");//问题的ID
var UniqueValue=$("#UniqueValue").val(); //页面 的唯一值
var dataType=$("#UniqueValue").attr("data-type"); //收藏页面 的分类
var userRegister = parseInt($("#userRegister").val()); //判断用户是否登陆，如果用户已登录 这个值将不存在页面

function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img style="display: inline-block;" src="/resource/arclist/$1.gif" border="0" />');
    return str;
}

//提交  评论
$(".addComment").on("click",function(){
    var obj = $(this);
    var val = obj.parents(".m_publish").find("textarea").val();//评论的内容
    var id = obj.data('id');                                 //对应 该问题的回答的ID
    if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
        layer.msg('评论内容不能只输入空格！');
        return false;
    }

    $.post('/index.php?m=api&c=comment&v=comment', {
        'content':val,
        'rid':rid,
        'type':dataType,
        'touid':0,
        'pid':id,
    }, function(res){
        layer.msg(res.tips);
        if(res.status == 1){
            var new_str=replace_em(val);
            var html="";
            html =  '<li><div class="details">'+
			                '<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'" style="background-image: url('+res.datas.headpic+');" target="_blank"></a>'+
			                '<h3><a class="username_" href="/index.php?m=index&c=muser&v=index&id='+res.datas.uid+'">'+res.datas.username+'</a>'+
				                '<a class="zan" onclick="zan(this,'+res.datas.id+')" data-nature="review">'+
				                '	<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
				                	'<i>0</i>'+
				                '</a>'+
				                '<em class="addtime">'+res.datas.addtime+'</em>'+
			                '</h3>'+
		                '</div>'+
		                '<div class="substance"><div class="description whiteSpace">'+new_str+'</div></div>'+
	                '</li>';
            $("#receptacle"+id).prepend(html);
            obj.parents(".m_publish").find("textarea").val("");
            obj.siblings().find("i").text("0");
            $(".OpenCommentList"+id).find("i").text( parseInt($(".OpenCommentList"+id).find("i").text())+1);
        }
    },"JSON");
});

//提取公共方法1
function jointly1(){
    $(".replyReview").text("回复");
    $(".replyReview").attr("data-open",0);
    $(".details_stair").animate({"opacity":"0","height":"0px","margin-bottom":"0"},100);
}

//对【评论 】进行回复   弹出输入框
function replyFunction(obj){
    var id = $(obj).attr("data-id");
    var dataOpen = $(obj).attr("data-open");
    jointly1();
    if( dataOpen == 0 ){//打开评论
        $(obj).parents(".substance").find(".details_stair").animate({"opacity":"1","height":"136px","margin-bottom":"10px"});
        $(obj).text("收起");
        $(obj).attr("data-open",1);
        return false;
    }
}
replyFunction();

//提交对【评论】回复的内容
function ReviewComment(){
    $(".ReviewComment").on("click",function(){
        var obj = $(this);
        var id = obj.attr("data-id");//一级评论ID
        var touid = obj.attr('data-touid');//回复目标的用户ID
        var val = obj.parents(".details_stair").find("textarea").val();//评论内容

        if ( val=="" ) {
            layer.msg("回复内容不能为空哦！");
        }
        else if(val.replace(/(^\s*)|(\s*$)/g, "")==""){
            layer.msg('评论内容不能只输入空格！');
            return false;
        }
        else{
            $.ajax({
                url:"/index.php?m=api&c=comment&v=comment",
                data:{
                    rid:rid,
                    type: dataType,
                    content: val,
                    pid: id,
                    pid_sub: 0,
                    touid:touid
                },
                type:"POST",
                success:function (res) {
                    var data=JSON.parse(res);
                    if( data.status==1 ){
                        layer.msg(data.tips);
                        var res=data.datas;
                        var new_str=replace_em(val);
                        var html="";
			            html =  '<li><div class="details">'+
						                '<a class="headPortrait" href="/index.php?m=index&c=muser&v=index&id='+res.uid+'" style="background-image: url('+res.headpic+');" target="_blank"></a>'+
						                '<h3><a class="username_" href="/index.php?m=index&c=muser&v=index&id='+res.uid+'">'+res.username+'</a>'+
						                	' 对 <a class="username_" href="javascipt:;">'+res.to_username+'</a> 说：'+
							                '<a class="zan" onclick="zan(this,'+res.id+')" data-nature="review">'+
							                '	<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
							                	'<i>0</i>'+
							                '</a>'+
							                '<em class="addtime">'+res.addtime+'</em>'+
						                '</h3>'+
					                '</div>'+
					                '<div class="substance"><div class="description whiteSpace">'+new_str+'</div></div>'+
				                '</li>';
				        $("#receptacle"+id).prepend(html);
				        obj.parents(".m-publish").find("textarea").val("");
				        obj.siblings().find("i").text("0");
				        $(".OpenCommentList").find("i").text( parseInt($(".OpenCommentList"+id).find("i").text())+1);
                    }else{
                        layer.msg(data.tips);
                        return false;
                    }
                },
                error:function (data) { }
            });
            jointly1();
        }
    });
}
ReviewComment();

var html2;
html2 = '<div class="nologin">'+
		    '<div class="nologinbtn">'+
		    	'<a class="from_url" href="/index.php?m=index&c=index&v=login&from='+from_url+'">登录</a>'+
		    	'<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>'+
		    '</div>'+
	    '</div>';

//查看更多评论回复
function seeMore(obj,id){
    var obj = $(obj);
    var dataList = parseInt(obj.attr("data-list"));                       //点击“查看更多”按钮的次数，从1开始
    var count = parseInt($("#return"+id).text());               //获取这个回答的评论总数
    var page = parseInt($("#receptacle"+id).attr("data-page")); //获取这个回答评论的当前页数

	if( dataList == 1 ){
		var length = $("#receptacle"+id).children("li").length;
	    for(var i=3;i<=length;i++){
	        $("#receptacle"+id).children("li.module").eq(i).removeClass("dis_none");
	    }
	    if( count>10 ){//判断剩余的评论总是是否大于10条
	    	$("#return"+id).text(count-7);
	    	$("#receptacle"+id).attr("data-page",page+1);
	    	obj.attr("data-list",dataList+1);
	    }
	    else{
	    	obj.parent(".hint").addClass("dis_none");
			$("#return"+id).text("");
	    }
	}
	else{
		$.ajax({
	        url:"/index.php?m=api&c=Comment&v=get_comment_page_list",
	        data:{
	            id:rid,    //当前该问题的ID
	            pid: id,   //当前该回答的ID
	            page: page,//页数
	        },
	        type:"POST",
	        success:function (res){
	            var res = JSON.parse(res);
	            if( res.status==0 ){
	                var htmll="";
	                $.each(res.data,function(i,item){
	                    htmll +='<li class="module fix">'+
                                    '<div class="details">'+
                                        '<a class="headPortrait" href="index.php?m=index&c=muser&v=index&id='+res.data[i].uid+'" style="background-image: url('+res.data[i].headpic+');" target="_blank"></a>'+
                                        '<h3><a class="username_" href="index.php?m=index&c=muser&v=index&id='+res.data[i].uid+'">'+res.data[i].username+'</a> ';
                                if( res.data[i].touid != 0 ){
									htmll +='对 <span class="username_" href="javascipt:;">'+res.data[i].to_username+'</span> 说：';
                                }
                                    htmll +='<a class="zan" onclick="zan(this,'+res.data[i].id+')" data-nature="review" href="javascript:;">'+
												'<img class="icon_like1" src="/resource/m/images/common/icon_like.png"/>'+
												'<i>'+res.data[i].top_num+'</i>'+
											'</a>'+
                                            '<em class="addtime">'+res.data[i].addtime+'</em>'+
                                        '</h3>'+
                                    '</div>'+
                                    '<div class="substance">'+
                                        '<div class="description whiteSpace">'+res.data[i].content+'</div>'+
                                        '<div class="BarSubmenu">'+
                                            '<a class="reply replyReview" onclick="replyFunction(this)" href="javascript:;" data-id="'+res.data[i].id+'" data-open="0">回复</a>'+
                                        '</div>'+
                                        //<!--回复【评论】框-->
					                    '<div class="m-publish details_stair" data-tid="'+res.data[i].id+'">'+
							                '<div class="wp">'+
							                    '<div class="content">'+
							                        '<textarea class="inputBox" placeholder="快来和大家分享你的感想吧" onkeyup="judgecomment(this)"></textarea>';
						                if( userRegister == 0 ){//判断用户是否登陆，没有登录则有遮罩层挡住输入框
							                htmll +='<div class="nologin">'+
													    '<div class="nologinbtn">'+
													    	'<a class="from_url" href="/index.php?m=index&c=index&v=login&from='+from_url+'">登录</a>'+
													    	'<a href="/index.php?m=index&c=index&v=reg" target="_blank">注册</a>'+
													    '</div>'+
												    '</div>';
									    }
							            htmll +='</div>'+
							                    '<div class="bottomArea fix">'+
								                    '<a class="btn ReviewComment" data-touid="'+res.data[i].uid+'" data-id="'+res.data[i].pid+'" data-name="'+res.data[i].username+'" href="javascript:;">回复评论</a>'+
								                    '<span class="wordLimit"><i class="Iclass">0</i> /255字</span>'+
							                    '</div>'+
							                '</div>'+
							            '</div>'+
									'</div>'+
								'</li>';
	                });
					$("#receptacle"+id).append(htmll);
			    	$("#receptacle"+id).attr("data-page",page+1);
	                if( count-10 <= 0 ){
	                	$("#return"+id).text("0");
	                	obj.addClass("dis_none");
	                }
	                else{
	                	$("#return"+id).text(count-10);
	                }
			    	obj.attr("data-list",dataList+1);
			    	replyFunction(obj);
			    	ReviewComment();
	            }
	            else{
	                layer.msg(res.msg);
	                return false;
	            }
	        },
	        error:function (data) { }
	    });
	}
}
//评论功能   结束