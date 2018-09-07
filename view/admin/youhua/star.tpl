{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>达人邦</span></li>
    </ul>
</div>
<form method="post" action="/admin/youhua/morestar" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="60">用户</th>
            <th class="tdl" width="120">标题</th>
            <th class="tdl">简介</th>
            <!--<th class="tdl" width="300">图片</th>-->
            <th class="tdl" width="30">推荐</th>
            <th class="tdl" width="30">审核</th>
           	<th class="tdl" width="30">阅读数</th>
            <th class="tdl" width="30">点赞数</th>
            <th data-uname="opt">操作</th>
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
                {{$vo.uid|helper:'username'}}
            </td>
            <td class="tdl">
                {{$vo.title}}
            </td>
            <td class="tdl">
                {{$vo.describes}}
            </td>
            <!--
            <td class="tdl">
                {{foreach from=$vo.content item=v}}
                    <img src="{{$v}}" alt="" width="55">
                {{/foreach}}
            </td>
            -->
            <td class="tdl">
                <input type="checkbox" name="istop[{{$vo.id}}]" value="1"{{if $vo.istop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="status[{{$vo.id}}]" value="1"{{if $vo.status}} checked{{/if}} />
            </td>
          	<td class="tdl">
                <input type="text" size="5" name="shownum[{{$vo.id}}]" value="{{$vo.shownum}}" />
            </td>
            <td class="tdl">
                <input type="text" size="5" name="topnum[{{$vo.id}}]" value="{{$vo.topnum}}" />
            </td>
            <td class=" td-operation">
                <a class="btn btn-success btn-sm item" href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/youhua/star_edit/id/{{$vo.id}}')">编辑</a>
            </td>

        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/youhua/', 'morestar')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/youhua/', 'deletestar')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}