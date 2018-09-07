{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>作者列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加作者','admin/youhua/addwriter')"><span>添加作者</span></li>
    </ul>
</div>
<form method="post" action="/admin/youhua/morewriter" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="60">姓名</th>
            <th class="tdl">照片</th>
            <th class="tdl">简介</th>
            <th class="tdl" width="60">显示</th>
          	<th class="tdl" width="60">推荐</th>
            <th class="tdl" width="60">名家</th>
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
                {{$vo.name}}
            </td>
            <td class="tdl">
                <img src="{{$vo.pics}}" width="100">
            </td>
            <td class="tdl">
                {{$vo.introduction}}
            </td>
          	<td class="tdl">
                <input type="checkbox" name="isshow[{{$vo.id}}]" value="1"{{if $vo.isshow}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[{{$vo.id}}]" value="1"{{if $vo.istop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="famous[{{$vo.id}}]" value="1"{{if $vo.famous}} checked{{/if}} />
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('修改作者', 'admin/youhua/editwriter/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/youhua/', 'morewriter')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/youhua/', 'deletewriter')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}