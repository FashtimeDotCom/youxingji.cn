{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/article/addtrip" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">录属ID</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="aid" value="" type="text" class="txt" datatype="Require" msg="请填写录属ID" />
            </td>
            <td class="vtop tips2">请填写录属ID</td>
        </tr>
        <tr><td colspan="2" class="td27">排序</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="sort" value="0" type="text" class="txt" datatype="Require" msg="请填写排序" />
            </td>
            <td class="vtop tips2">请填写排序，默认为 0</td>
        </tr>
      	<tr><td colspan="2" class="td27">第几天</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="days" value="0" type="text" class="txt" datatype="Require" msg="请填写第几天" />
            </td>
            <td class="vtop tips2">请填写第几天，默认为 0</td>
        </tr>
        <tr><td colspan="2" class="td27">行程</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="title" value="" type="text" class="txt" datatype="Require" msg="请填写行程" />
            </td>
            <td class="vtop tips2">请填写行程</td>
        </tr>
        <tr><td colspan="2" class="td27">介绍</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
            {{$introduction}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">图片标题（||隔开）</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <textarea name="pictitle" style="width: 350px"></textarea>
            </td>
            <td class="vtop tips2">图片标题</td>
        </tr>
        <tr>
            <td colspan="2" class="td27" id="uptab">
                <a href="javascript:void(0);" class="btn active">上传图片集</a>
                <a href="javascript:void(0);" class="btn">管理图片集</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop" colspan="2">
                {{$swfupload}}
                {{include file='admin/upload.tpl'}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}