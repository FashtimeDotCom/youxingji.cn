{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>评论列表</span></li>
    </ul>
</div>
<form method="post" action="/admin/ryt/morecomment" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl">隶属</th>
            <th class="tdl">用户</th>
            <th class="tdl">内容</th>
            <th class="tdl">审核</th>
            <th class="tdl">时间</th>
        </tr>
        {{foreach from=$list item=vo}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$vo.id}}" />
            </td>
            <td class="tdl">
            	{{$vo.id}}
            </td>
            <td class="tdl">
                {{$vo.rid}}
            </td>
            <td class="tdl">
                {{$vo.uid|helper:'username'}}
            </td>
            <td class="tdl">
                {{$vo.content}}
            </td>
            <td class="tdl">
                <input type="checkbox" name="status[{{$vo.id}}]" value="1"{{if $vo.status}} checked{{/if}} />
            </td>
          	<td class="tdl">
                {{$vo.addtime|date_format:'%Y-%m-%d'}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/ryt/', 'morecomment')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ryt/', 'deletecomment')">删除</button>
            </td>
            <td colspan="7" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}