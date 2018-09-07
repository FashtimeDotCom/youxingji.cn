{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/addscenery" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">作者编号</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="wid" value="" type="text" class="txt" datatype="Require" msg="请填写作者编号" />
            </td>
            <td class="vtop tips2">请填写作者编号</td>
        </tr>
        <tr><td colspan="2" class="td27">名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="title" value="" type="text" class="txt" datatype="Require" msg="请填写名称" />
            </td>
            <td class="vtop tips2">请填写名称</td>
        </tr>
      	<tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">缩略图（380*270）</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <img width="" height="" src="" id="imagess" style="max-width: 120px" />
                </div>
                <input type="hidden" id="images" name="thumbpic" value="">
                <a id="dwed">选择图片</a>
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
                pick: '#dwed',

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
            	<a href="javascript:void(0);" class="btn active">封面（790*565）</a>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="pics" value="">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">尺寸</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="size" value="" type="text" class="txt" datatype="Require" msg="请填写尺寸" />
            </td>
            <td class="vtop tips2">请填写尺寸</td>
        </tr>
        <tr><td colspan="2" class="td27">地址</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="place" value="" type="text" class="txt" datatype="Require" msg="请填写地址" />
            </td>
            <td class="vtop tips2">请填写地址</td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}