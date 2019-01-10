<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>发布问题_{{TO->cfg key="site_name" group="site" default="广州游行迹新媒体科技有限公司"}}</title>
    <meta name="description" content="{{$article.title}}" />
    <meta name="keywords" content="{{$article.title}}" />
    <link rel="stylesheet" href="/resource/css/style.css" />
	<link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <link rel="stylesheet" href="/resource/css/public.css" />
    <link rel="stylesheet" href="/resource/css/set_question.css" />
</head>
<body>
	{{include file='public/header.tpl'}}
	<div class="main">
	    <div class="mainBody">
	        <div class="title">
	            <a href="/index.php?m=index&c=faq&v=index">达人问答</a> &gt; <a href="javascript:;">我要提问</a>
	        </div>
	    </div>
	    <div class="wp">
	        <div class="m-master-qm">
	        	<!--左侧正文-->
	        	<div class="col_l">
	                <p class="headline title1">问题标题：</p>
	                <input class="inp" type="text" name="" value="{{$res.title}}" id="title" maxlength="80" onkeyup="judgeIsNonNull1(event)" placeholder="标题不少于10个字" />
	                <p class="tips tips1"><span class="" id="contentwordage1">0</span> / 80字</p>
	                
	                <p class="headline title2">详细内容补充：</p>
	                <textarea class="txta1" placeholder="请输入你的问题说明，不少于10个字哦" id="describe" maxlength="1000" onkeyup="judgeIsNonNull2(event)">{{$res.describe}}</textarea>
	                <p class="tips tips2"><span class="" id="contentwordage2">0</span> / 1000字</p>
	                
	                <!--添加图片-->
					<div class="file f-pic fix" style="margin-top: 7px;">
						<a class="addImg" href="javascript:;"></a>
						<p class="tip">图片只能选择一张哦，再次选择会覆盖原来的图片</p>
					</div>
					<div class="layui-upload">
						<label><input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none"></label>
						<div class="layui-upload-list fix" id="piclist">
							{{if $res.pic != ''}}
							<div class="upic"><img src="{{$res.pic}}" class="layui-upload-img" onclick="deletepic(this)"><i class="iz layui-icon">&#xe640;</i></div>
							{{else}}
							<div class="upic"><img src="" class="layui-upload-img"></div>
							{{/if}}
						</div>
					</div>

					<p class="headline title3">选择目的地</p>
					<input type="text" class="inp" value="{{$res.nation}}" id="nation" placeholder="国家">
	                
	                <p class="headline title4">标签分类：</p>
	                <div class="tit">
						<input type="text" class="inp" id="tag" value="" maxlength="4" onkeyup="judgeIsNonNull3(event)" placeholder="每个标签最多四个字,最多三个标签,空格无效">
						<input type="button" class="btn affirm dis_none" id="affirm" value="确认添加" />
						<p class="tagTips FontSize dis_none">最多只能四个标签！可以先删掉其中一个旧标签，再增加新标签！</p>
						<div class="tagVal fix" id="tagVal" style="margin-top: 10px;"></div>
					</div>
					
					<a class="publish" id="btnAdd" data-val="web" href="javascript:;">发布问题</a>
	            </div>
	            
	            <!--右侧推荐-->
	            <div class="col_r">
	                <h3 class="title">提出问题的正确姿势：</h3>
	                <div class="case">
	                    <p class="description">1.问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以.
	                    	问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以</p>
	                    <p class="description">2.问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以.
	                    	问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以</p>
	                    <p class="description">3.问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以.
	                    	问题要【具体】、【真实】、【诚恳】，问题较多，需全面阐述时，可以</p>
	                </div>
	            </div>
	        </div>
	        <div class="h81"></div>
	    </div>
	</div>
	{{include file='public/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="/resource/js/set_question.js"></script>
</body>
</html>