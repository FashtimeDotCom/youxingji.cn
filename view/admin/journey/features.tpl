{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.controller('添加','admin/article/addfeatures')"><span>添加</span></li>
    </ul>
</div>
<form method="post" action="/admin/article/morefeatures" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="160">录属</th>
            <th class="tdl" width="60">名称</th>
            <th class="tdl" width="100">图片</th>
            <th class="tdl" width="460">介绍</th>
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
                {{$vo.lstitle}}（ID：{{$vo.aid}}）
            </td>
            <td class="tdl">
                {{$vo.title}}
            </td>
            <td class="tdl">
                <img src="{{$vo.pics}}" width="100">
            </td>
            <td class="tdl">
                {{$vo.introduction}}
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('修改', 'admin/article/editfeatures/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'deletefeatures')">删除</button>
            </td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}