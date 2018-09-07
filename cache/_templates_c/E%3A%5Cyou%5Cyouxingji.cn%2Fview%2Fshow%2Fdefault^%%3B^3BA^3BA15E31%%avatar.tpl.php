<?php /* vpcvcms compiled created on 2018-07-13 10:52:06
         compiled from user/avatar.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-头像</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
  	<link rel="stylesheet" href="/resource/cropper/css/cropper.min.css">
    <link rel="stylesheet" href="/resource/cropper/css/ImgCropping.css">
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
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
                        <li>
                            <a href="/index.php?m=index&c=user&v=setting" class="items">
                                <i class="ico3"></i>
                                <span>我的信息</span>
                            </a>
                        </li>
                        <li class="on">
                                    <a href="/index.php?m=index&c=user&v=avatar" class="items">
                                <i class="ico4"></i>
                                <span>我的头像</span>
                            </a>
                        </li>
                      	<li>
                            <a href="/index.php?m=index&c=user&v=cover" class="items">
                                <i class="ico1"></i>
                                <span>我的封面</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <style>
                    .layui-upload-icon {
                        display: none;
                    }
                </style>
                <div class="col-r">
                    <div class="m-tit-lb">
                        <h4>我的头像</h4>
                    </div>
                    <div class="m-img-lb">
                        <div class="img">
                            <img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" id="avatarpic">
                        </div>
                        <div class="file">
                            <label>
                                <button id="replaceImg" class="l-btn" style="background: #000;border: 0;">更换头像</button>
        					</label>
                            <span>支持jpg、png、jpeg、bmp，图片大小5M以内</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  	<!--图片裁剪框 start-->
    <div style="display: none" class="tailoring-container">
        <div class="black-cloth" onclick="closeTailor(this)"></div>
        <div class="tailoring-content">
                <div class="tailoring-content-one">
                    <label title="上传图片" for="chooseImg" class="l-btn choose-btn">
                        <input type="file" accept="image/jpg,image/jpeg,image/png" name="file" value="" id="chooseImg" class="hidden" onchange="selectImg(this)">
                        选择图片
                    </label>
                    <div class="close-tailoring"  onclick="closeTailor(this)">×</div>
                </div>
                <div class="tailoring-content-two">
                    <div class="tailoring-box-parcel">
                        <img id="tailoringImg">
                    </div>
                    <div class="preview-box-parcel">
                        <p>图片预览：</p>
                        <div class="square previewImg"></div>
                        <div class="circular previewImg"></div>
                    </div>
                </div>
                <div class="tailoring-content-three">
                    <button class="l-btn cropper-reset-btn">复位</button>
                    <button class="l-btn cropper-rotate-btn">旋转</button>
                    <button class="l-btn cropper-scaleX-btn">换向</button>
                    <button class="l-btn sureCut" id="sureCut">确定</button>
                </div>
            </div>
    </div>
    <!--图片裁剪框 end-->

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	<script src="/resource/cropper/js/cropper.min.js"></script>
  	<script>
        //弹出框水平垂直居中
        (window.onresize = function () {
            var win_height = $(window).height();
            var win_width = $(window).width();
            if (win_width <= 768){
                $(".tailoring-content").css({
                    "top": (win_height - $(".tailoring-content").outerHeight())/2,
                    "left": 0
                });
            }else{
                $(".tailoring-content").css({
                    "top": (win_height - $(".tailoring-content").outerHeight())/2,
                    "left": (win_width - $(".tailoring-content").outerWidth())/2
                });
            }
        })();

        //弹出图片裁剪框
        $("#replaceImg").on("click",function () {
            $(".tailoring-container").toggle();
        });
        //图像上传
        function selectImg(file) {
            if (!file.files || !file.files[0]){
                return;
            }
            var reader = new FileReader();
            reader.onload = function (evt) {
                var replaceSrc = evt.target.result;
                //更换cropper的图片
                $('#tailoringImg').cropper('replace', replaceSrc,false);//默认false，适应高度，不失真
            }
            reader.readAsDataURL(file.files[0]);
        }
        //cropper图片裁剪
        $('#tailoringImg').cropper({
            aspectRatio: 1/1,//默认比例
            preview: '.previewImg',//预览视图
            guides: false,  //裁剪框的虚线(九宫格)
            autoCropArea: 0.8,  //0-1之间的数值，定义自动剪裁区域的大小，默认0.8
            movable: true, //是否允许移动图片
            dragCrop: true,  //是否允许移除当前的剪裁框，并通过拖动来新建一个剪裁框区域
            movable: true,  //是否允许移动剪裁框
            resizable: true,  //是否允许改变裁剪框的大小
            zoomable: true,  //是否允许缩放图片大小
            mouseWheelZoom: true,  //是否允许通过鼠标滚轮来缩放图片
            touchDragZoom: true,  //是否允许通过触摸移动来缩放图片
            rotatable: true,  //是否允许旋转图片
            crop: function(e) {
                // 输出结果数据裁剪图像。
            }
        });
        //旋转
        $(".cropper-rotate-btn").on("click",function () {
            $('#tailoringImg').cropper("rotate", 45);
        });
        //复位
        $(".cropper-reset-btn").on("click",function () {
            $('#tailoringImg').cropper("reset");
        });
        //换向
        var flagX = true;
        $(".cropper-scaleX-btn").on("click",function () {
            if(flagX){
                $('#tailoringImg').cropper("scaleX", -1);
                flagX = false;
            }else{
                $('#tailoringImg').cropper("scaleX", 1);
                flagX = true;
            }
            flagX != flagX;
        });

        //裁剪后的处理
        $("#sureCut").on("click",function () {
            if ($("#tailoringImg").attr("src") == null ){
                alert("请先选择图片");
            }else{
                var cas = $('#tailoringImg').cropper('getCroppedCanvas');//获取被裁剪后的canvas
                var base64url = cas.toDataURL('image/png'); //转换为base64地址形式
				$.ajax({
                    type: "POST",
                    url: "/index.php?m=api&c=index&v=saveavatar",
                    data: { imgPath: base64url },
                  	dataType: 'json',
                    cache: false, 
                    success: function(data) {
                      	console.log(data);
                      	if (data.status == 1) {
                            document.getElementById('avatarpic').src = data.url;
                            document.getElementById('headavatarpic').src = data.url;
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                      	alert("上传失败，请检查网络后重试");
                    }
                });
                //关闭裁剪框
                closeTailor();
            }
        });
        //关闭裁剪框
        function closeTailor() {
            $(".tailoring-container").toggle();
        }
    </script>

</body>

</html>