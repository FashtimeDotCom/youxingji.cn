{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>旅游地</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加旅游地','admin/youhua/addtourism')"><span>添加旅游地</span></li>
    </ul>
</div>
<form method="post" action="/admin/youhua/moretourism" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl">标题</th>
            <th class="tdl">关键字</th>
            <th class="tdl">图片</th>
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
                {{$vo.title}}
            </td>
            <td class="tdl">
                {{$vo.keyword}}
            </td>
          	<td class="tdl">
                <img src="{{$vo.pics}}" width="100">
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('修改', 'admin/youhua/edittourism/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/youhua/', 'deletetourism')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}