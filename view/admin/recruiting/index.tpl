{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>招募列表</span></li>
      	<li class="btn btn-info" onclick="Controller.controller('添加','admin/recruiting/add')">添加</li>
    </ul>
</div>
<form method="post" action="/admin/recruiting/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
          	<th width="60">选择</th>
            <th class="tdl">编号</th>
            <th class="tdl">标题</th>
            <th class="tdl">PC专题模板</th>
            <th class="tdl">WAP专题模板</th>
          	<th class="tdl">报名网址</th>
          	<th class="tdl">操作</th>
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
                {{$vo.title}}
            </td>
            <td class="tdl">
                {{$vo.pc_mb}}
            </td>
            <td class="tdl">
                {{$vo.wap_mb}}
            </td>
          	<td class="tdl">
                {{$vo.url}}
            </td>
          	<td class="tdl">
              	<a href="javascript:void(0);" onclick="Controller.controller('编辑','admin/recruiting/edit/id/{{$vo.id}}')">编辑</a>
            </td>
        </tr>
        {{/foreach}}
      	<tr>
          	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/recruiting/', 'delete')">删除</button>
            </td>
            <td colspan="7" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}