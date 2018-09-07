{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.controller('添加','admin/article/addbaojia')"><span>添加</span></li>
    </ul>
</div>
<form method="post" action="/admin/article/morebaojia" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="160">录属</th>
            <th class="tdl" width="60">最少人数</th>
            <th class="tdl" width="100">单价</th>
            <th class="tdl" width="60">日期</th>
          	<th class="tdl" width="60">状态</th>
            <th class="tdl" width="60">操作</th>
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
                {{$vo.lstitle}}（ID：{{$vo.jid}}）
            </td>
            <td class="tdl">
                {{$vo.minperson}}人
            </td>
            <td class="tdl">
                ￥{{$vo.price}}
            </td>
            <td class="tdl">
                {{$vo.addtime}}
            </td>
          	<td class="tdl">
                {{$vo.text}}
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('修改', 'admin/article/editbaojia/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'deletebaojia')">删除</button>
            </td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}