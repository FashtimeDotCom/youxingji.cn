<?php /* vpcvcms compiled created on 2018-12-27 16:32:11
         compiled from user/setting.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-设置</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
	<link rel="stylesheet" href="/resource/css/tag.css" title="和标签相关" />
</head>
<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class="ban l2" style="background-image: url(/resource/images/ban-lb1.jpg);"></div>
        <div class="wp">
            <div class="m-con-lb2">
                <div class="col-l">
                    <ul class="ul-snav">
                        <li class="on">
                            <a href="/index.php?m=index&c=user&v=setting" class="items">
								<i class="ico3"></i>
								<span>我的信息</span>
							</a>
                        </li>
                        <li><a href="/index.php?m=index&c=user&v=avatar" class="items">
								<i class="ico4"></i>
								<span>我的头像</span>
							</a>
                        </li>
                      	<li><a href="/index.php?m=index&c=user&v=cover" class="items">
								<i class="ico1"></i>
								<span>我的封面</span>
							</a>
                        </li>
                    </ul>
                </div>
                <div class="col-r">
                    <div class="m-tit-lb">
                        <h4>我的信息</h4>
                        <div class="plan">
                            <span>资料完善度</span>
                            <p class="jin"><em><?php echo $this->_tpl_vars['numerical']; ?>
%</em><i style="width: <?php echo $this->_tpl_vars['numerical']; ?>
%"></i></p>
                        </div>
                    </div>
                    <div class="m-txt-lb">
                        <table>
                            <tr><td width="90px"><span>称号：</span></td>
                                <td><input type="text" class="inp" id="username" value="<?php echo $this->_tpl_vars['user']['username']; ?>
"></td>
                            </tr>
	                        <tr><td class="td1"><span>我的标签：</span></td>
	                            <td class="td2" style="position: relative;">
	                            	<input type="text" class="inp tag" id="tag" onkeyup="judgeIsNonNull2(event)" placeholder="最多两个标签,空格无效,每个标签最多六个字,超出六个字，只保留前面六个字">
	                            	<input type="button" class="btn affirm dis_none" id="affirm" value="确认添加" />
	                            	<p class="tagTips FontSize dis_none">最多两个标签！可以先删掉其中一个旧标签，再增加新标签！</p>
	                            </td>
	                        </tr>
	                        <tr><td class="td1"><span></span></td>
	                            <td class="td2" id="tagVal" style="padding-bottom: 14px;">
	                                <?php $_from = $this->_tpl_vars['user']['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
	                                <b class="sample">
	                                    <i class="Iclass"><?php echo $this->_tpl_vars['item']; ?>
</i>
	                                    <em class="eliminate" onclick="eliminate(this)"><img src="/resource/m/images/icon_eliminate.png"/></em>
	                                </b>
	                                <?php endforeach; endif; unset($_from); ?>
	                            </td>
	                        </tr>
                            <tr><td><span>性别：</span></td>
                                <td><div class="gender" role="radio">
                                        <label<?php if ($this->_tpl_vars['user']['sex'] == 1): ?> class="checked"<?php endif; ?> data-sex="1">
        									<input type="radio" name="gender">男
        								</label>
                                        <label<?php if ($this->_tpl_vars['user']['sex'] == 0): ?> class="checked"<?php endif; ?> data-sex="0">
        									<input type="radio" name="gender">女
        								</label>
                                        <label<?php if ($this->_tpl_vars['user']['sex'] == 2): ?> class="checked"<?php endif; ?> data-sex="2">
        									<input type="radio" name="gender">保密
        								</label>
                                    </div>
                                </td>
                            </tr>
                            <tr><td><span>居住城市：</span></td>
                                <td><input type="text" class="inp" id="city" value="<?php echo $this->_tpl_vars['user']['city']; ?>
"></td>
                            </tr>
                            <tr><td><span>出生日期：</span></td>
                                <td><input type="text" class="inp" id="birthday" value="<?php echo $this->_tpl_vars['user']['birthday']; ?>
"></td>
                            </tr>
                            <tr><td><span>个人简介：</span></td>
                                <td><textarea class="area" id="autograph"><?php echo $this->_tpl_vars['user']['autograph']; ?>
</textarea></td>
                            </tr>
                            <tr><td></td>
                                <td><input type="submit" class="sub" id="btnBc" value="保存"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <script type="text/javascript">
    	//监控 标签内容输入框 ，包括粘贴板
		function judgeIsNonNull2(event){
			var value = $("#tag").val();
			var x = event.which || event.keyCode;
			if (x == 8 ) {
		  		if(value !== "" ){
			      	$(".affirm").removeClass("dis_none");
			    }
		  		else{
			    	$(".affirm").addClass("dis_none");
			    }
			}

			if(value !== ""){
				var res = /[\、\…\.\．\·\•\'\,\，\。\×\_\＿\-\−\－\—\ˉ\ˇ\々\＇\｀\‘\’\“\”\〃\¨\"\＂\｜\|\‖\(\)\（\）\〔\〕\<\>\〈\〉\《\》\「\」\『\』\〖\〗\【\】\［\］\[\]\{\}\｛\｝\/\*\＊\?\？\^\＾\+\＋\=\＝\÷\¥\￥\#\＃\@\＠\!\！\`\~\～\%\％\∶\:\：\;\；\&\＆\$\＄\£\￡\€\°\°C\°F\←\↑\→\↓\／\＼\\]/g;
				if( res.test(value) ){
					$("#tag").val(value.replace(res,""));
					return false;
				}
		    	$(".affirm").removeClass("dis_none");
			}
			else{
		    	$(".affirm").addClass("dis_none");
		    }
		}
		
		//监控 标签内容输入框 ，包括粘贴板
		$("#tag").bind('input propertychange', function(){
			judgeIsNonNull2(event);
		});
    	
    	//确认 添加标签
    	$("#affirm").on("click",function(){
    		var html,value = $("#tag").val();
    		var length = $("#tagVal").children().length;
    		var val0 = $("#tagVal").children().eq(0).find("i").text();
    		
    		if(value == ""){
    			layer.msg('标签栏不能为空！');
				return false;
    		}
    		else if(value.replace(/(^\s*)|(\s*$)/g, "")==""){ //判断输入的内容是否全为空格
				layer.msg('标签栏不能只输入空格！');
				return false;
			}
    		else{
				if( length>=2 ){                         //判断是否已存在三个标签
					$(".tagTips").removeClass("dis_none");
					return false;
				}
				else{
					if( value == val0 ){
						layer.msg('不能输入已存在的标签！');
						return false;
					}
					else{
						value = value.replace(/\s*/g,"");//去除字符串空格(空白符)
						value = value.substr(0, 6);
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
                'autograph':autograph
            }, function(data){
            	if(data == 1){
            		layer.msg("保存成功！");
            		setInterval(function(){
		            	window.location.href = window.location.href;
		            },1000);
            	}
            	else{
            		layer.msg("保存失败！");
            	}
            },"JSON");
        });
    </script>
</body>
</html>