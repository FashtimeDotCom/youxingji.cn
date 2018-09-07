{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/addtv" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="title" value="" type="text" class="txt" datatype="Require" msg="请填写标题" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>
        <tr><td colspan="2" class="td27">描述</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px" name="describes" value="" type="text" class="txt" datatype="Require" msg="请填写描述"></textarea>
            </td>
            <td class="vtop tips2">请填写描述</td>
        </tr>
      	<tr><td colspan="2" class="td27">地址</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px;height:50px" name="url" value="" type="text" class="txt" datatype="Require" msg="请填写地址"></textarea>
            </td>
            <td class="vtop tips2">请填写地址</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27"> 
            	<a href="javascript:void(0);" class="btn active">封面（280*210）</a>
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
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}