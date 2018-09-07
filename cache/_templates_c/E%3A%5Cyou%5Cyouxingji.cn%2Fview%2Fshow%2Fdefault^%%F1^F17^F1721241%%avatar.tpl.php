<?php /* vpcvcms compiled created on 2018-09-03 14:16:03
         compiled from wap/user/avatar.tpl */ ?>
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
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>

    <script src="/resource/js/iscroll-zoom.js"></script>
    <script src="/resource/js/hammer.js"></script>
    <script src="/resource/js/lrz.all.bundle.js"></script>
    <script src="/resource/js/jquery.photoClip.js"></script>
    <style type="text/css">
        .htmleaf-container{
            margin: 0 auto;
            text-align: center;
            overflow: hidden;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            background: #fff;
            display: none;
            z-index: 9999999;
        }

        #clipArea {
            height: 90%;
        }

        /*上传图标*/
        #file{
            height: 100%;
            width:100%;
        }
        #clipBtn{
            -webkit-appearance: none;
            border-radius: 0;
            float: right;
            height: 100%;
            width:25%;
            background: #fff;
            border: 0;
            outline: none;
            color: #D71618;
            font-size:1rem;
            z-index: 999;
            font-family: '微软雅黑';
        }
        #quxiao{
            -webkit-appearance: none;
            border-radius: 0;
            float: right;
            height: 100%;
            width:25%;
            background: #fff;
            border: 0;
            outline: none;
            color: #D71618;
            font-size:1rem;
            z-index: 999;
            font-family: '微软雅黑';
        }
        .foot-use{
            background: #fff;
            height: 10%;
            width: 100%;
        position: relative;
        }
        .uploader1 {
            -webkit-appearance: none;
            border-radius: 0;
            position: absolute;
            width: 50%;
            height: 8rem;
            cursor: default;
            height: 100%;
            float: left;
        }


        .button {
            float: left;
            height: 100%;
            display: inline-block;
            outline: 0 none;
            margin: 0;
            cursor: pointer;
            border: 0;
            width: 8rem;
            font-size:1rem;
        }

        .uploader input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            border: 0;
            padding: 0;
            margin: 0;
            height:8rem;
            width: 100%;
            cursor: pointer;
           border: solid 1px #ddd;
            opacity: 0;
        }
        .uploader1 input[type=file] {
            -webkit-appearance: none;
            border-radius: 0;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            border: 0;
            padding: 0;
            margin: 0;
            height:8rem;
            width: 50%;
            cursor: pointer;
            border: solid 1px #ddd;
            opacity: 0;
        }
        .blue .button {
            -webkit-appearance: none;
            border-radius: 0;
            color: #fff;
            background: #D71618;
            height: 100%;
            width:100%;

        }
        .data .pho_clip{
            width: 80px;
            height: 80px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 50%;
        }
    </style>
</head>

<body class="" ontouchstart="">
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>我的头像</h3>
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
            <a href="">
            <img src="<?php echo $this->_tpl_vars['user']['cover']; ?>
" alt="">
        </a>
            <div class="m-user">
                <i style="background: url(<?php echo $this->_tpl_vars['user']['avatar']; ?>
) no-repeat center center; background-size: cover; border-radius: 50%;"></i>
                <dl>
                    <dd><a href="/index.php?m=wap&c=user&v=addtravel">发布游记</a></dd>
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
                    <li>
                        <a href="/index.php?m=wap&c=user&v=setting" class="items item3">
                           <span style="background-image: url(/resource/m/images/ico-lb8.png)">我的信息</span>
                        </a>
                    </li>
                    <li class="on">
                        <a href="/index.php?m=wap&c=user&v=avatar" class="items item4">
                            <span style="background-image: url(/resource/m/images/ico-lb11.png)">我的头像</span>
                        </a>
                    </li>
                    <li>
                        <a href="/index.php?m=wap&c=user&v=cover" class="items item5">
                            <span style="background-image: url(/resource/m/images/ico-lb6.png)">我的封面</span>
                        </a>
                    </li>
                </ul>
                <div class="m-img-yz">
                    <h4 class="g-tit-yz" style="background-image: url(/resource/m/images/line-yz1.jpg)">更换头像</h4>
                    <div class="img">
                        <img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="">
                    </div>
                    <div class="file">
                        <label class="pho_clip">
    						<em>选择图片</em>
    					</label>
                        <span>支持jpg、png、jpeg、bmp，图片大小5M以内</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <article class="htmleaf-container">
        <div id="clipArea"></div>
        <div class="foot-use">
            <div class="uploader1 blue">
                <input type="button" name="file" class="button" value="打开">
                <input id="file" type="file" accept="image/*" multiple  />
            </div>
            <button id="quxiao">取消</button>
            <button id="clipBtn">截取</button>
        </div>
        <div id="view"></div>
    </article>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <script type="text/javascript">
        $(function(){
           /* $("#clipArea").photoClip({
                width: 199,
                height: 199,
                file: "#file",
                view: "#view",
                ok: "#clipBtn",
                loadStart: function() {
                    //console.log("照片读取中");
                },
                loadComplete: function() {
                    //console.log("照片读取完成");
                },
                clipFinish: function(dataURL) {
                    // console.log(dataURL);
                }
            });
            */
            var imgsource="";
            var clipArea = new bjj.PhotoClip("#clipArea", {
                size: [199, 199],
                outputSize: [640, 640],
                file: "#file",
                view: "#view",
                ok: "#clipBtn",
                loadStart: function() {
                    console.log("照片读取中");
                },
                loadComplete: function() {
                    console.log("照片读取完成");
                },
                clipFinish: function(dataURL) {
//                    console.log(dataURL);
                    imgsource=dataURL;
                }
            });


            $('#quxiao').click(function(){
                $(".htmleaf-container").fadeOut();
            });
            $(".pho_clip").click(function(){
                $(".htmleaf-container").show();
            })
            $("#clipBtn").click(function(){
                if(imgsource != ''){
                    $.ajax({
                        type: "POST",
                        url: "/index.php?m=api&c=index&v=saveavatar",
                        data: { imgPath: imgsource },
                        dataType: 'json',
                        cache: false, 
                        success: function(data) {
                            console.log(data);
                            if (data.status == 1) {
                                window.location.href = window.location.href;
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败，请检查网络后重试");
                        }
                    });
                }
                $(".htmleaf-container").hide();
            })
        });

    </script>
</body>

</html>