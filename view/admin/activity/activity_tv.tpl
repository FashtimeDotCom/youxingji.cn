{{include file='admin/header.tpl'}}
<div class="floattop">
    <h1>筛选三级页面展示TV</h1>
</div>
<form method="post" action="/admin/activity/save_tv" name="lpform" id="lpform">
    <input type="hidden" id="activity_id" name="activity_id" value="{{$activity_id}}">
    <table class="tb tb2" id="sTable">
        <tr class="header">
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="120">标题</th>
            <th class="tdl" width="30">选择</th>
            <th class="tdl" width="30">推荐<span style="color: red;">(只能一个)</span></th>
        </tr>
        {{foreach from=$list item=vo}}
        <tr class="hover">

            <td class="tdl">
                {{$vo.id}}
            </td>
            <td class="tdl">
                {{$vo.title}}
            </td>
            <td class="tdl">
                <input type="checkbox" name="select[]" value="{{$vo.id}}"{{if $vo.can_do}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[]" value="{{$vo.id}}"{{if $vo.istop}} checked{{/if}} />
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/activity/', 'save_tv')">修改</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}