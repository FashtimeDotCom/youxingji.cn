{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/recruiting/add" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">招募名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="title" value="" type="text" class="txt" datatype="Require" msg="请填写招募名称" />
            </td>
            <td class="vtop tips2">请填写招募名称</td>
        </tr>
      	<tr><td colspan="2" class="td27">报名网址</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="url" value="" type="text" class="txt" datatype="Require" msg="请填写报名网址" />
            </td>
            <td class="vtop tips2">请填写报名网址</td>
        </tr>
      	<tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">宣传banner</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <img width="" height="" src="" id="imagess" style="max-width: 120px" />
                </div>
                <input type="hidden" id="images" name="banner" value="">
                <a id="banner">选择图片</a>
            </td>
            <script type="text/javascript">
                var singleuploaders = WebUploader.create({

                // 选完文件后，是否自动上传。
                auto: true,

                // swf文件路径
                swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                // 文件接收服务端。
                server: SITE_URL + 'admin/ajax/pic',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#banner',

                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                },
                fileNumLimit: 1,
                compress: false
            });
            singleuploaders.on( 'uploadSuccess', function( file, ret ) {
                $('#images').val(ret.url);
                $('#imagess').attr('src',ret.url);
            });
            </script>
        </tr> 
        <tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">PC专题模板</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="pc_mbs" class="uploader-list">
                        
                    </div>
                </div>
                <input type="hidden" id="pc_mb" name="pc_mb" value="">
                <a id="dwed">选择模板</a>
            </td>
            <script type="text/javascript">
                var singleuploaders = WebUploader.create({

                // 选完文件后，是否自动上传。
                auto: true,

                // swf文件路径
                swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                // 文件接收服务端。
                server: SITE_URL + 'admin/article/mb',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#dwed',

                // 只允许选择tpl文件。
                accept: {
                    title: 'file',
                    extensions: 'tpl',
                    mimeTypes: '.tpl'
                },
                fileNumLimit: 1,
                compress: false
            });
            singleuploaders.on( 'uploadSuccess', function( file, ret ) {
                $('#pc_mbs').html(ret.url);
                $('#pc_mb').val(ret.url);
            });
            </script>
        </tr> 
      	<tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">WAP专题模板</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="wap_mbs" class="uploader-list">
                        
                    </div>
                </div>
                <input type="hidden" id="wap_mb" name="wap_mb" value="">
                <a id="wapdwed">选择模板</a>
            </td>
            <script type="text/javascript">
                var singleuploaders = WebUploader.create({

                // 选完文件后，是否自动上传。
                auto: true,

                // swf文件路径
                swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                // 文件接收服务端。
                server: SITE_URL + 'admin/article/mb',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#wapdwed',

                // 只允许选择tpl文件。
                accept: {
                    title: 'file',
                    extensions: 'tpl',
                    mimeTypes: '.tpl'
                },
                fileNumLimit: 1,
                compress: false
            });
            singleuploaders.on( 'uploadSuccess', function( file, ret ) {
                $('#wap_mbs').html(ret.url);
                $('#wap_mb').val(ret.url);
            });
            </script>
        </tr> 
      	<tr><td colspan="2" class="td27">申请说明（报名页面显示）</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
            {{$instructions}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}