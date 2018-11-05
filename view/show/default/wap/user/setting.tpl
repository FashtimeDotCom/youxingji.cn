<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-设置</title>
    <meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
    <meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
    	.Iclass{font-style: normal;}
    	.dis_none{display: none!important;}
    	.tally{margin-bottom: 5px!important;}
    	
    	.FontSize{font-size: 12px;transform: scale(0.9);
								-webkit-transform: scale(0.9);
						    	-o-transform: scale(0.9);    /*针对能识别-webkit的opera browser设置*/}
	    .tagTips{color: red;}
    </style>
	<link rel="stylesheet" href="/resource/m/css/tag.css" title="和标签相关" />
</head> 
<body>
    <div class="header">
        {{include file='wap/header.tpl'}}
        <h3>我的信息</h3>
    </div>
    <div class="mian">
        <div class="g-top">
            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
            <div class="so">
                <form action="/index.php">
                    <input type="hidden" name="m" value="wap"/>
                    <input type="hidden" name="c" value="index"/>
                    <input type="hidden" name="v" value="search"/>
                    <input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
                    <input type="submit" value="" class="sub" />
                </form>
            </div>
        </div>
        <div class="ban">
            <a href=""><img src="{{$user.cover}}" alt=""></a>
            <div class="m-user">
                <i style="background: url({{$user.avatar}}) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl><dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=addtv">发布TV</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=follow">我的关注</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=msg">我的私信</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=fans">我的粉丝</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=setting">设置</a></dd>
                    <dd><a href="/index.php?m=wap&c=user&v=logout">退出</a></dd>
                </dl>
            </div>
        </div>
        <div class="m-con-yz2">
            <div class="wp">
                <ul class="ul-snav-yz1 ul-snav-yz2">
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=setting" class="items item3">
    					   <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的信息</span>
    				    </a>
                    </li>
                    <li><a href="/index.php?m=wap&c=user&v=avatar" class="items item4">
        					<span style="background-image: url(/resource/m/images/ico-lb11.png)">我的头像</span>
        				</a>
                    </li>
                    <li><a href="/index.php?m=wap&c=user&v=cover" class="items item5">
        					<span style="background-image: url(/resource/m/images/ico-lb6.png)">我的封面</span>
        				</a>
                    </li>
                </ul>
                <div class="m-tit-yz">
                    <div class="plan">
                        <span>资料完善度</span>
                        <p class="jin"><em>{{$numerical}}%</em><i style="width: {{$numerical}}%"></i></p>
                    </div>
                </div>
                <div class="m-txt-yz">
                    <table>
                        <tr><td class="td1"><span>称号：</span></td>
                            <td class="td2">
                                <input type="text" class="inp" id="username" value="{{$user.username}}">
                            </td>
                        </tr>
                        <tr><td class="td1 td3"><span>性别：</span></td>
                            <td class="td2">
                                <div class="gender" role="radio">
                                    <label{{if $user.sex == 1}} class="checked"{{/if}} data-sex="1">
										<input type="radio" name="gender">男</label>
			                        <label{{if $user.sex == 0}} class="checked"{{/if}} data-sex="0">
										<input type="radio" name="gender">女</label>
			                        <label{{if $user.sex == 2}} class="checked"{{/if}} data-sex="2">
										<input type="radio" name="gender">保密</label>
                                </div>
                            </td>
                        </tr>
                        <tr><td class="td1"><span>我的标签：</span></td>
                            <td class="td2" style="position: relative;">
                            	<input type="text" class="inp tally" id="tag" value="" maxlength="8" onkeyup="judgeIsNonNull1(event)" placeholder="每个标签最多六个字,最多两个,空格无效">
                            	<input type="button" name="" class="btn affirm dis_none" id="affirm" value="确认添加" />
                            	<p class="tagTips FontSize dis_none">最多两个标签！可以先删掉其中一个旧标签，再增加新标签！</p>
                            </td>
                        </tr>
                        <tr><td class="td1"><span></span></td>
                            <td class="td2" id="tagVal">
                                {{foreach from=$tag_list item=item key=key}}
                                <b class="sample">
                                    <i class="Iclass">{{$item}}</i>
                                    <em class="eliminate" onclick="eliminate(this)"><img src="/resource/m/images/icon_eliminate.png"/></em>
                                </b>
                                {{/foreach}}
                            </td>
                        </tr>
                        <tr><td class="td1"><span>居住城市：</span></td>
                            <td class="td2"><input type="text" class="inp" id="city" value="{{$user.city}}"></td>
                        </tr>
                        <tr><td class="td1"><span>出生日期：</span></td>
                            <td class="td2"><input type="text" class="inp" id="birthday" value="{{$user.birthday}}"></td>
                        </tr>
                        <tr><td class="td1"><span>个人简介：</span></td>
                            <td class="td2"><textarea class="area" id="autograph">{{$user.autograph}}</textarea></td>
                        </tr>
                        <tr><td class="td1"></td>
                            <td class="td2"><input type="submit" class="sub" id="btnBc" value="保存"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{include file='wap/footer.tpl'}}
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
    	//监控 标签内容输入框 ，包括粘贴板
		function judgeIsNonNull1(event){
			var value=$("#tag").val();
			var x = event.which || event.keyCode;
			$("#tag").val(value.replace(/\s*/g,""));//去除字符串空格(空白符)
			if (x == 8 ) {
		  		if(value !== "" ){
			      	$(".affirm").removeClass("dis_none");
			    }else{
			    	$(".affirm").addClass("dis_none");
			    }
			}

			if(value !== ""){
				if( /[=，。￥？！：、……“”；（）《》～‘’〈〉——·ˉˇ¨々‖∶＂＇｀｜〃〔〕「」『』．〖〗$【】｛｝［］/,|{}_*:?^%$#@!`·~"'\\<>\[\]\%;)(&+-]/.test(value) ){
					$("#tag").val(value.replace(/[=，。￥？！：、……“”；（）《》～‘’〈〉——·ˉˇ¨々‖∶＂＇｀｜〃〔〕「」『』．〖〗$【】｛｝［］/,|{}_*:?^%$#@!`·~"'\\<>\[\]\%;)(&+-]/,""));
					return false;
				}
				if( value.length > 6 ){
		    		return $("#tag").val(value.substr(0, 6));
		    	}
		    	$(".affirm").removeClass("dis_none");
		   }else{
		    	$(".affirm").addClass("dis_none");
		    }
		}
		
		//监控 标签内容输入框 ，包括粘贴板
		$("#tag").bind('input propertychange', function(){
			judgeIsNonNull1(event);
		});
    	
    	//确认 添加标签
    	$("#affirm").on("click",function(){
    		var html,value = $("#tag").val();
    		var length = $("#tagVal").children().length;
    		var val0 = $("#tagVal").children().eq(0).find("i").text();
    		
    		if(value == ""){
    			layer.msg('标签栏不能为空！');
				return false;
    		}else if(value.replace(/(^\s*)|(\s*$)/g, "")==""){ //判断输入的内容是否全为空格
				layer.msg('标签栏不能只输入空格！');
				return false;
			}else{
				if( length>=2 ){                         //判断是否已存在三个标签
					$(".tagTips").removeClass("dis_none");
					return false;
				} else{
					if( value == val0 ){
						layer.msg('不能输入已存在的标签！');
						return false;
					} else{
						html='<b class="sample">'+
								'<i class="Iclass">'+value+'</i>'+
								'<em class="eliminate" onclick="eliminate(this)"><img src="/resource/m/images/icon_eliminate.png"/><em>'+
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
    	
    	//保存
        $('#btnBc').click(function(){
            var username = $('#username').val();
            
    		var val0 = $("#tagVal").children().eq(0).find("i").text();
    		var val1 = $("#tagVal").children().eq(1).find("i").text();
        	if( val0!="" ){
        		tag = val0;
        		if( val1!="" && val1!= val0 ){
	        		tag = tag+"/"+val1;
	        	}
        	}
        	else{ tag=""; }
            
            var sex = $('.checked').attr('data-sex');
            var city = $('#city').val();
            var birthday = $('#birthday').val();
            var autograph = $('#autograph').val();
            $.post("/index.php?m=api&c=index&v=savesetting", {
                'username':username,
                'sex':sex,
                'tag':tag,
                'city':city,
                'birthday':birthday,
                'autograph':autograph,
            }, function(data){
                window.location.href = window.location.href;
            },"JSON");
        })
    </script>
</body>
</html>