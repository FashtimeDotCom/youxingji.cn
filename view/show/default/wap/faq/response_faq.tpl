<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>我要回答</title>
    <meta name="keywords" content="{{TO->cfg key=" index_keywords " group="site " default="首页 "}}" />
    <meta name="description" content="{{TO->cfg key=" index_description " group="site " default="首页 "}}" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/m/css/common.css" />
    <link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <script src="/resource/js/move_rem.js"></script>
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style>
    	article{min-height: 308px;}
        #editorContainer{min-height: 298px; border: 1px solid #e5e5e5;margin-bottom: 10px;}
        .zxeditor-container{min-height: 296px;}
        .zxeditor-debug-switch{height: 0;opacity: 0;}
        .zxeditor-container .zxeditor-toolbar-wrapper{position: inherit!important;}

        .publish{display: block;width: 100%;margin: 22px auto 14px;color: #fff;border: none;
				 font-size: 14px;text-align: center;line-height: 30px;background: #f75b5d;border-radius: 2px;}
        .nav{top: 45px;}
        .wp{padding-top: 22px;}
        .row-issue{margin-top: 45px;}
        .issueTile{background: #f5f5f5;height: auto;min-height: 45px;padding: 10px 0;}
        .issueTile p{line-height: 20px;color: #666;width: 94%;margin: 0 auto;text-align: justify;}
    </style>
</head>
<body>
	<div class="header">
	    {{include file='wap/header.tpl'}}
	    <h3>达人问答-我要回答</h3>
	</div>
	<div class="mian">
	    <div class="row-issue">
	        <div class="m-edit-yz">
	            <div class="issueTile">
	                <p class="title whiteSpace">{{$info.title}}</p>
	            </div>
	            <div class="wp">
	                <!-- 内容编辑区域 -->
	                <input type="hidden" name="" id="faq_id" value="{{$faq_id}}" />
	                <article><div id="editorContainer"></div></article>
	                <button class="publish" id="btnAdd">回答</button>
	            </div>
	        </div>
	    </div>
	</div>
	{{include file='wap/footer.tpl'}}
	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
	<script src="https://cdn.bootcss.com/js-polyfills/0.1.42/polyfill.min.js"></script>
	<!--exif获取照片参数插件-->
	<script src="/resource/m/demo/libs/exif.min.js"></script>
	<!--debug-->
	<script src="/resource/m/demo/libs/zx-debug.min.js"></script>
	<!--编辑器-->
	<script src="/resource/m/demo/js/zx-editor.min.js"></script>
	<script type="text/javascript">
	    // 实例化 ZxEditor
	    var zxEditor = new ZxEditor('#editorContainer', {
	        // 编辑器固定
	        fixed: false,
	        // 120秒自动保存一次编辑内容
	        autoSave: 20,
	        imageMaxSize:5,
	        //top:44
	    });
	
	    // 初始化本地存储的数据
	    function initLoaclData () {
	        var data = zxEditor.storage.get('article')
	        if (data) {
	            if (data.cover) {
	                zxEditor.addClass('has-pic', $('.cover'));
	            }
	            zxEditor.setContent(data.content);
	        }else{
	            zxEditor.setContent('{{$res.content}}');
	        }
	    }
	    initLoaclData();
	
	    //获取文章数据
	    function getArticleData () {
	        var data = {
	            // 获取正文内容
	            content: zxEditor.getContent()
	        }
	        return ((!data.content || data.content === '<p><br></p>'))
	                ? null
	                : data;
	    }
	
	    //数据处理，并提交数据处理
	    var url;
	    function uploadBase64Images (base64Images, callback) {
	        var len = base64Images.length;
	        var count = 0;
	        if (len === 0) {
	            callback();
	            return
	        }
	        for (var i = 0; i < len; i++) {
	            _uploadHandler(base64Images[i]);
	        }
	
	        function _uploadHandler (data) {
	            url="";
	            $.ajax({
	                type:"post",
	                url:"/index.php?m=api&c=upload&v=base64_upload",
	                async:true,
	                data:{base64:data.base64},
	                dataType:"json",
	                success:function(res){
	                    if(res.status == 1){
	                        url=res.url;
	                        zxEditor.setImageSrc(data.id, url)
	                        // 计算图片是否上传完成
	                        _handleCount();
	                    }
	                },error:function(res){
	                    console.log(res.tip);
	                }
	            });
	        }
	
	        function _handleCount () {
	            count++
	            if (count === len) {
	                callback();
	            }
	        }
	    }
	    // 模拟文件上传--暂时没用处了
	    function upload (blob, callback) {
	        setTimeout(function () {
	            callback(url);
	        }, 500);
	    }
	
	    //提交回答的内容
	    $('#btnAdd').on('click', function() {
	        // 处理正文中的base64图片
	        // 获取正文中的base64数据数组
	        var base64Images = zxEditor.getBase64Images();
	        var data = getArticleData() || {};
	        var faq_id = $("#faq_id").val();
	
	        if( $(".zxeditor-content-wrapper p").text() == "" ){
	            layer.msg('回答内容不能为空！');
	            return false;
	        }
	        else if($(".zxeditor-content-wrapper p").text().replace(/(^\s*)|(\s*$)/g, "")==""){
				layer.msg('回答内容不能只输入空格！');
				return false;
			}
	        else{
	            //上传base64图片数据
	            uploadBase64Images(base64Images, function () {
	                // 正文中有base64数据，上传替换成功后再重新获取正文内容
	                if (base64Images.length) {
	                    data.content = zxEditor.getContent();
	                }
	
	                $.post("/index.php?m=api&c=faq&v=save_response_faq", {
	                	'faq_id':faq_id,
	                    'content': data.content,
	                }, function(data) {
	                    if(data.status == 1) {
	                        layer.msg('发布成功！');
	                        //清除缓存
	                        //zxEditor.removeSave(data.content);
	                        //localStorage.clear();
	                        zxEditor.storage.remove('content', {content: data.content});
	                        window.location.href = "/index.php?m=wap&c=faq&v=detail&id="+faq_id;
	                    }
	                }, "JSON");
	            });
	        }
	    });
	</script>
</body>
</html>