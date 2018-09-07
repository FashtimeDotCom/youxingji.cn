{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/article/addfeatures" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">录属ID</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="aid" value="" type="text" class="txt" datatype="Require" msg="请填写录属ID" />
            </td>
            <td class="vtop tips2">请填写录属ID</td>
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
            	<a href="javascript:void(0);" class="btn active">图片（400*235）</a>
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
        <tr><td colspan="2" class="td27">介绍</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
            {{$introduction}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}