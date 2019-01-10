//2018-11-30
//HQS
//发布问题



//控制 问题标题的长度
function judgeIsNonNull1(event){
	var value=$("#title").val();
	var x = event.which || event.keyCode;
	if( value.length <= 80 ){
		//console.log("符合80位数以内");
	}
	else{
		return $("#title").val(value.substr(0, 11));
	}
	var remain = $("#title").val().length;
	if(remain > 80){
		$('#title').val(setString($('#title').val(),80));
		$('#contentwordage1').html(remain);
	}
	else{
		$('#contentwordage1').html(remain);
	}
}

//实时监听输入框值的改动
$("#title").bind('input propertychange', function(){
	judgeIsNonNull1(event);
});

//控制 问题说明的长度
function judgeIsNonNull2(event){
	var value=$("#describe").val();
	var x = event.which || event.keyCode;
	if( value.length <= 1000 ){
		//console.log("符合1000位数以内");
	}
	else{
		return $("#describe").val(value.substr(0, 1000));
	}
	var remain = $("#describe").val().length;
	if(remain > 1000){
		$('#title').val(setString($('#describe').val(),1000));
		$('#contentwordage2').html(remain);
	}
	else{
		$('#contentwordage2').html(remain);
	}
}

//实时监听输入框值的改动
$("#describe").bind('input propertychange', function(){
	judgeIsNonNull2(event);
});

//添加封面图
$('.f-pic').click(function(){
	$('.layui-upload-button').trigger("click");
});
layui.upload({
	url: "/index.php?m=api&c=index&v=uploadpic",
	type: 'image',
	ext: 'jpg|png|jpeg|bmp',
	before: function(obj){
		$('#picslist').before('<span style="color: #d71618;" class="tips">上传中...</span>');
	},
	success: function (data) {
		$('#piclist').html('<div class="upic" onclick="deletepic(this)"><img src="'+ data.url +'" class="layui-upload-img"><i class="iz layui-icon">&#xe640;</i></div>');
	}
});
function deletepic(obj){
	$(obj).remove();
}

//监控 标签内容输入框 ，包括粘贴板
function judgeIsNonNull3(event){
	var value=$("#tag").val();
	var x = event.which || event.keyCode;
	$("#tag").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)
	if (x == 4 ) {
  		if(value !== "" ){
	      	$(".affirm").removeClass("dis_none");
	    }
  		else{
	    	$(".affirm").addClass("dis_none");
	    }
	}

	if(value !== ""){
		if( /[=，。￥？！：、……“”；（）《》～‘’〈〉——·ˉˇ¨々‖∶＂＇｀｜〃〔〕「」『』．〖〗$【】｛｝［］/,|{}_*:?^%$#@!`·~"'\\<>\[\]\%;)(&+-]/.test(value) ){
			$("#tag").val(value.replace(/[=，。￥？！：、……“”；（）《》～‘’〈〉——·ˉˇ¨々‖∶＂＇｀｜〃〔〕「」『』．〖〗$【】｛｝［］/,|{}_*:?^%$#@!`·~"'\\<>\[\]\%;)(&+-]/,""));
			return false;
		}
		if( value.length > 4 ){
    		return $("#tag").val(value.substr(0, 4));
    	}
    	$(".affirm").removeClass("dis_none");
   	}
	else{
    	$(".affirm").addClass("dis_none");
    }
}

//监控 标签内容输入框 ，包括粘贴板
$("#tag").bind('input propertychange', function(){
	judgeIsNonNull3(event);
});


//确认 添加标签
$("#affirm").on("click",function(){
	var html,value = $("#tag").val();
	var length = $("#tagVal").children().length;
	var val0 = $("#tagVal").children().eq(0).find("i").text();
	var val1 = $("#tagVal").children().eq(1).find("i").text();
	var val2 = $("#tagVal").children().eq(2).find("i").text();
	
	if(value == ""){
		layer.msg('标签内容不能为空！');
		return false;
	}else if(value.replace(/(^\s*)|(\s*$)/g, "")==""){ //判断输入的内容是否全为空格
		layer.msg('标签栏不能只输入空格！');
		return false;
	}else{
		if( length>=4 ){                         //判断是否已存在四个标签
			$(".tagTips").removeClass("dis_none");
			return false;
		} else{
			if( value == val0 || value == val1 || value == val2 ){
				layer.msg('不能输入已存在的标签！');
				return false;
			} else{
				html='<b class="sample">'+
						'<i class="Iclass">'+value+'</i>'+
						'<a class="eliminate" href="javascript:;" onclick="eliminate(this)"><img src="/resource/m/images/icon_eliminate.png"/><a>'+
					 '</b>';
				$("#tagVal").append(html);
				$("#tag").val('');
			}
		}
	}
});

//点击“X”清除标签
function eliminate(which){
	var index = $(which).parent().index();
	$("#tagVal").children().eq(index).remove();
	$(".tagTips").addClass("dis_none");
}


//发布
$('#btnAdd').click(function(){
	var title = $('#title').val();
	var describe = $('#describe').val();
	var address = $('#nation').val();
	var thumbfile = $('.layui-upload-img').attr('src');
	var tag;//标签
	
	var val = $(this).attr("data-val");
	
	if(!title){
		layer.msg('请输入标题');
		return false;
	}else if(title.length<10){
		layer.msg('问题不能少于10个字哦！');
		return false;
	}
	if(!describe){
		layer.msg('请输入问题说明');
		return false;
	}else if(describe.length<10){
		layer.msg('问题说明不能少于10个字哦！');
		return false;
	}

	var val0 = $("#tagVal").children().eq(0).find("i").text();
	var val1 = $("#tagVal").children().eq(1).find("i").text();
	var val2 = $("#tagVal").children().eq(2).find("i").text();
	if( val0!="" ){
		tag = val0;
		if( val1!="" ){
    		tag = tag+"/"+val1;
    		if( val2!="" ){
        		tag = tag+"/"+val2;
        	}
    	}
	}
	else{
		tag="";
	}
	
	$.post("/index.php?m=api&c=faq&v=save_set_faq", {
		'title':title,
		'desc':describe,
		'address':address,
		'thumbfile':thumbfile,
		'label':tag
	}, function(data){
		layer.msg(data.tips);
		if (data.status == 1) {
			setInterval(function(){
				if( val == "web" ){
					window.location.href = "/index.php?m=index&c=user&v=my_faq";
				}
				else{
					window.location.href = "/index.php?m=wap&c=user&v=my_faq";
				}
			},500);
		}
	},"JSON");
});