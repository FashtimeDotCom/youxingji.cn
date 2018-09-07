{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>旅拍TV</span></li>
      	 <li class="btn btn-info" onclick="Controller.controller('添加TV','admin/youhua/addtv')"><span>添加TV</span></li>
    </ul>
</div>
<form method="post" action="/admin/youhua/moretv" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="60">用户</th>
            <th class="tdl" width="120">标题</th>
            <th class="tdl" width="100">封面</th>
            
            <th class="tdl" width="200">视频</th>
            <th class="tdl" width="100">标签(用于前台分类)</th>
            <th class="tdl" width="30">推荐</th>
            <th class="tdl" width="30">审核</th>
          	<th class="tdl" width="30">操作</th>
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
                <img src="{{$vo.pics}}" width="100">
            </td>
           
            <td class="tdl">
                {{$vo.url}}
            </td>
            <td class="tdl">
                <input type="text" name="tags[{{$vo.id}}]" value="{{$vo.tags}}">
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[{{$vo.id}}]" value="1"{{if $vo.istop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="status[{{$vo.id}}]" value="1"{{if $vo.status}} checked{{/if}} />
            </td>
          	<td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('编辑', 'admin/youhua/edittv/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/youhua/', 'moretv')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/youhua/', 'deletetv')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}