<?php /* vpcvcms compiled created on 2018-08-15 16:02:14
         compiled from wap/user/edittravel.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<meta name="format-detection" content="telephone=no" />
		<title>个人中心-编辑</title>
		<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
		<link rel="stylesheet" href="/resource/m/css/style.css" />
		<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="/resource/m/css/globle.css" />
		<script src="/resource/m/js/jquery.js"></script>
		<script src="/resource/m/js/lib.js"></script>
	</head>

	<body class="">
		<div class="mian">
			<div class="save-issue">
				<div class="wp">
					<a href="/index.php?m=wap&c=user&v=index" class="i-close col-l" style="background-image: url(/resource/m/images/i-close.png)"></a>
					<div class="col-r">
						<a href="javascript:;" id="btnAdd" class="i-issue" style="background-image: url(/resource/m/images/i-dh.png)">编辑</a>
					</div>
				</div>
			</div>
			<div class="g-top">
				<div class="logo">
					<a href="/"><img src="/resource/m/images/logo.png" alt="" /></a>
				</div>
				<div class="so">
					<form action="/index.php">
						<input type="hidden" name="m" value="wap" />
						<input type="hidden" name="c" value="index" />
						<input type="hidden" name="v" value="search" />
						<input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
						<input type="submit" value="" class="sub" />
					</form>
				</div>
			</div>
			<div class="row-issue">
				<ul class="ul-tab-yz1">
					<li class="on">
						<a href="javascript:;">
							<h4>编辑游记</h4>
							<p>记录您的每一个动人深刻</p>
						</a>
					</li>
				</ul>
				<div class="m-edit-yz">
					<div class="wp">
						<form>
							<div class="tit">
								<input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['title']; ?>
" id="title" placeholder="请在这里输入标题">
							</div>
							<div class="content-txt" style="overflow: auto;margin-bottom: 0px;">
								<textarea placeholder="请在此处编辑正文内容" class="txta1" id="describe"><?php echo $this->_tpl_vars['res']['describes']; ?>
</textarea>
								<p class="r num_text">可输入
									<a class="num_f" id="contentwordage">255</a>个字</p>
							</div>
							<div class="pic-video">
								<div class="file f-pic" id="chooseImage" style="margin-bottom: 7px;">
									<label style="background-image: url(/resource/m/images/i-plus.png)">
        							<em>添加图片</em>
        						</label>
								</div>
							</div>
							<input type="button" class="btn" id="uploadImage" value="上传图片" />
							<ul id="previewImage">
								<?php if ($this->_tpl_vars['did']): ?>
								<?php $_from = $this->_tpl_vars['res']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
									<li><div class="viewThumb "><img src='<?php echo $this->_tpl_vars['vo']; ?>
' /><i class="delete iz layui-icon">&#xe640;</i></div></li>
								<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				wx.config({
					debug: false,
					appId: "wx9953ad5ae1108b51",
					timestamp: '<?php echo $this->_tpl_vars['timestamp']; ?>
',
					nonceStr: '<?php echo $this->_tpl_vars['nonceStr']; ?>
',
					signature: '<?php echo $this->_tpl_vars['signature']; ?>
',
					jsApiList: [
						'chooseImage',
						'previewImage',
						'uploadImage'
					]
				});

				var limitNum = 255;
				var num = $('.txta1').val().length;
				var s = limitNum - num;
				if(s < 0) {
					$('.txta1').val(setString($('.txta1').val(), 255));
					$('#contentwordage').html(0);
					return false;
				}
				$('#contentwordage').html(s);
				$('.txta1').keyup(
					function() {
						var remain = $(this).val().length;
						if(remain > 255) {
							$('.txta1').val(setString($('.txta1').val(), 255));
							var result = 0;
						} else {
							var result = limitNum - remain;
						}
						$('#contentwordage').html(result);
					}
				);
			});

			function setString(str, len) {
				var strlen = 0;
				var s = "";
				for(var i = 0; i < str.length; i++) {
					strlen++;
					s += str.charAt(i);
					if(strlen >= len) {
						return s;
					}
				}
				return s;
			}

			})
		</script>
	</body>

</html>