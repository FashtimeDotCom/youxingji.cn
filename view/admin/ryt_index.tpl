{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>日阅潭列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加日阅潭','admin/ryt/add')"><span>添加日阅潭</span></li>
    </ul>
</div>
<form method="post" action="/admin/ryt/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl">名称</th>
            <!--<th class="tdl">封面图</th>-->
            <th class="tdl">用户</th>
            <th class="tdl">查看数</th>
            <th class="tdl">评论数</th>
            <th class="tdl">发布时间</th>
            <th class="tdl">推荐</th>
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
            <!--
            <td class="tdl">
                <img src="{{$vo.pics}}" width="100">
            </td>
            -->
            <td class="tdl">
                {{$vo.username}}
            </td>
            <td class="tdl">
                {{$vo.shownum}}
            </td>
            <td class="tdl">
                {{$vo.commentnum}}
            </td>
            <td class="tdl">
                {{$vo.show_time}}
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[{{$vo.id}}]" value="1"{{if $vo.istop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('修改', 'admin/ryt/edit/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/ryt/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ryt/', 'delete')">删除</button>
            </td>
            <td colspan="7" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}