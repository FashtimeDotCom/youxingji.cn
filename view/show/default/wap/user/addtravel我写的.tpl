<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<title>个人中心-发布日志</title>
	<meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
	<meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
	<link rel="stylesheet" href="/resource/m/css/style.css" />
	<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/resource/m/css/globle.css" />
	<script src="/resource/js/move_rem.js"></script>
	<script src="/resource/m/js/jquery.js"></script>
	<script src="/resource/m/js/lib.js"></script>
	<style type="text/css">
		.num_f{color: red;}
		
		#previewImage li:first-child .left{display: none;}
		#previewImage li:last-child  .right{display: none;}
		
		.viewThumb i{width: 30px;border-radius: 5px;}
		
		.viewThumb i:nth-of-type(1){left: 17%;}
		.viewThumb i:nth-of-type(2){}
		.viewThumb i:nth-of-type(3){left: 84%;}
	</style>
</head>
<body>
	<div class="mian">
		<div class="save-issue">
			<div class="wp">
				<a href="/index.php?m=wap&c=user&v=index" class="i-close col-l" style="background-image: url(/resource/m/images/i-close.png)"></a>
				<div class="col-r">
					<input type="hidden" name="did" value="{{$did}}" id="did">
					<a href="javascript:;" id="btnDraft" class="i-save" style="background-image: url(/resource/m/images/i-save.png)">保存</a>
					<em></em>
					<a href="javascript:;" id="addtravel" class="i-issue" style="background-image: url(/resource/m/images/i-dh.png)">发布</a>
				</div>
			</div>
		</div>
		<div class="g-top">
			<div class="logo">
				<a href="/"><img src="/resource/m/images/logo.png" alt="" /></a>
			</div>
			<div class="so">
				<form action="">
					<input type="text" placeholder="请输入关键字" class="inp" />
					<input type="submit" value="" class="sub sub1" />
				</form>
			</div>
		</div>
		<div class="row-issue">
			<ul class="ul-tab-yz1">
				<li class="on">
					<a href="/index.php?m=wap&c=user&v=addtravel">
						<h4>发表日志</h4>
						<p>记录您的每一个动人深刻</p>
					</a>
				</li>
				<li><a href="/index.php?m=wap&c=user&v=addtv">
						<h4>发表视频</h4>
						<p>最温馨旅行小提示</p>
					</a>
				</li>
			</ul>
			<div class="m-edit-yz">
				<div class="wp">
					<form>
						<div class="tit">
							<input type="text" class="inp" value="{{$res.title}}" id="title" placeholder="请在这里输入标题">
						</div>
						<div class="content-txt" style="overflow: auto;margin-bottom: 0px;">
							<textarea placeholder="请在此处编辑正文内容" class="txta1" id="describe" onkeyup="judgeIsNonNull1(event)">{{$res.describe}}</textarea>
							<p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
						</div>
						<div class="pic-video">
							<div class="file f-pic" id="chooseImage" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i-plus.png)">
    								<em>添加图片</em>
    							</label>
							</div>
							
							<input type="hidden" name="code" value="{{$code}}" id="code">
							<div class="file f-pic" id="openLocation" style="margin-bottom: 7px;">
								<label style="background-image: url(/resource/m/images/i_location.png)">
	    							<em>添加定位</em>
	    						</label>
							</div>
							<input type="hidden" name="address" value="{{$res.address}}" id="address" title="后台返回来的定位地址">
							<p id="Paddress" class="address">{{$res.address}}</p>
						</div>
						<input type="button" class="btn" id="uploadImage" value="上传图片" />
						<ul id="previewImage">
							
							<!--下面这个 FOR循坏 是给草稿箱用的-->
							{{if $did}}
							{{foreach from=$res.content item=vo}}
								<li><div class="viewThumb ">
										<img src='{{$vo}}' />
										<i class="iz layui-icon left">&#xe603;</i>
										<i class="iz layui-icon delete">&#xe640;</i>
	                                    <i class="iz layui-icon right">&#xe602;</i>
									</div>
								</li>
							{{/foreach}}
							{{/if}}
						</ul>
                      	<input type="checkbox" checked="">我已阅读并同意<a href="/article/hyzn">《服务协议》</a>
                      	<input type="hidden" name="did" value="{{$did}}" id="did">
					</form>
				</div>
			</div>
		</div>
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="/resource/m/js/addtravel.js"></script>
	<script type="text/javascript">


	</script>
</body>
</html>