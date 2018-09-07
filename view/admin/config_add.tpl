{{include file="admin/header.tpl"}}
<form action="/admin/config/add" method="post" id="scpform" name="scpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">变量名：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="" name="cfgname" />
            </td>
            <td class="vtop tips2">填写变量名，默认会加上 "{{$group}}_add_" 前缀，请勿重复</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">变量值：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="" name="config" />
            </td>
            <td class="vtop tips2">填写变量值</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">标题：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="" name="title" />
            </td>
            <td class="vtop tips2">填写标题</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">提示信息：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="" name="tips" />
            </td>
            <td class="vtop tips2">填写提示信息</td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="group" value="{{$group}}" />
    </div>
</form>
{{include file="admin/footer.tpl"}}