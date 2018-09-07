<?php /* vpcvcms compiled created on 2018-09-06 09:43:30
         compiled from wap/user/edittv.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" /> 
    <meta name="format-detection" content="telephone=no" />
    <title>个人中心-编辑</title>
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <link rel="stylesheet" href="/resource/js/layui/css/layui.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
    <style type="text/css">
        .upic {
            max-width: 300px;
            margin-top: 5px;
            cursor:pointer;
            margin: 0 15px 15px 0;
            position: relative;
        }
        .layui-upload-button {
            display: none;
        }
      	.upic i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 48px;
            height: 48px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            background: rgba(0,0,0,.2);
            color: #fff;
            text-align: center;
            font-size: 24px;
            line-height: 48px;
            opacity: 1;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
            -o-border-radius: 50%;
            -ms-border-radius: 50%;
            -ms-transition: all .3s;
        }
        .num_text {
            font-size: 12px;
            color: #868686;
            line-height: 20px;
        }
        .num_f {
            color: #d71618;
        }
    </style>
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
        <div class="row-issue">
            <ul class="ul-tab-yz1">
                <li class="on">
                    <a href="javascript:;">
                        <h4>编辑旅拍TV</h4>
                        <p>最温馨旅行小提示</p>
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
                            <p class="r num_text">可输入<a class="num_f" id="contentwordage">255</a>个字</p>
                        </div>
                        <div class="tit">
                            <input type="text" class="inp" value="<?php echo $this->_tpl_vars['res']['url']; ?>
" id="url" placeholder="请在这里输入优酷视频地址">
                        </div>
                        <div class="pic-video">
                            <div class="file f-pic" style="margin-bottom: 7px;">
                                <label style="background-image: url(/resource/m/images/i-plus.png)">
        							<em>添加图片</em>
        						</label>
                            </div>
                        </div>
                        <div class="layui-upload">
                            <label>
                                <input type="file" name="file" class="layui-upload-file" id="myfile" style="display:none">
                            </label>
                            <div class="layui-upload-list" id="piclist">
                                <?php if ($this->_tpl_vars['res']['pics'] != ''): ?>
                                <div class="upic"><img src="<?php echo $this->_tpl_vars['res']['pics']; ?>
" class="layui-upload-img" onclick="deletepic(this)"><i class="iz layui-icon">&#xe640;</i></div>
                                <?php else: ?>
                                <div class="upic"><img src="" class="layui-upload-img"></div style="display: none">
                                <?php endif; ?>
                            </div>
                        </div>
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
        $(document).ready(function(){
            var limitNum = 255;
            var num = $('.txta1').val().length;
            var s = limitNum - num;
            if(s < 0){
                $('.txta1').val(setString($('.txta1').val(),255));
                $('#contentwordage').html(0);
                return false;
            }
            $('#contentwordage').html(s);
            $('.txta1').keyup(
                function(){
                    var remain = $(this).val().length;
                    if(remain > 255){
                        $('.txta1').val(setString($('.txta1').val(),255));
                        var result = 0;
                    }else{
                        var result = limitNum - remain;
                    }
                    $('#contentwordage').html(result);
                }
            );
        });
        function setString(str, len) {  
            var strlen = 0;  
            var s = "";  
            for (var i = 0; i < str.length; i++) {   
                strlen++;   
                s += str.charAt(i);  
                if (strlen >= len) {  
                    return s;  
                }  
            }  
            return s;  
        }
        $('.f-pic').click(function(){
            $('.layui-upload-button').trigger("click");
        })
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
      	function deletepic(obj)
        {
            $(obj).remove();
        }
        $('#btnAdd').click(function(){
            var title = $('#title').val();
            var describe = $('#describe').val();
            var url = $('#url').val();
            var id = <?php echo $this->_tpl_vars['id']; ?>
;
            var pic = $('.layui-upload-img').attr('src');
            if(!describe){
                layer.msg('请输入描述');
                return false;
            }
            if(!url){
                layer.msg('请输入视频地址');
                return false;
            }
            if(!pic){
                layer.msg('请上传图片');
                return false;
            }
            $.post("/index.php?m=api&c=index&v=edittv", {
                'title':title,
                'url':url,
                'pic':pic,
                'id':id,
                'describe':describe
            }, function(data){
                layer.msg(data.tips);
                if (data.status == 1) {
                    window.location.href = window.location.href;
                }
            },"JSON");
        })
    </script>
</body>

</html>