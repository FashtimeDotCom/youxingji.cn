{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-success" onclick="Controller.reload()"><span>标签列表</span></li>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/JourneyType/add')"><span>添加标签</span></li>
        &nbsp;&nbsp;
        <li class="btn btn-success" onclick="Controller.main('{{$_pathroot}}admin/JourneyType/index')"><span>分类列表</span></li>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/JourneyType/add')"><span>添加分类</span></li>
    </ul>
</div>
<form method="post" action="/admin/JourneyType/morescenery" name="lpform" id="lpform">
    <table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl">名称</th>
            <th class="tdl">排序</th>
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
                {{$vo.type_name}}
            </td>
            <td class="tdl">
                {{$vo.sort}}
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/JourneyType/edit/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/JourneyType/', 'morescenery')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/JourneyType/', 'deletescenery')">删除</button>
            </td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}
