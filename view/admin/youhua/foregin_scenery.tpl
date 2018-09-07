{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()"><span>作品列表</span></li>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/ForeignScenery/add')"><span>添加作品</span></li>
    </ul>
</div>
<form method="post" action="/admin/ForeignScenery/morescenery" name="lpform" id="lpform">
    <table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th class="tdl">作者</th>
            <th class="tdl">名称</th>
           
            <th class="tdl">大小</th>
            <th class="tdl">地址</th>
            <th class="tdl">价格</th>
            <th class="tdl">查看数</th>
            <th class="tdl">点赞数</th>
            <th class="tdl">首页推荐</th>
            <th class="tdl">热门推荐</th>
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
                {{$vo.title}}
            </td>
           
            <td class="tdl">
                {{$vo.size}}
            </td>
            <td class="tdl">
                {{$vo.place}}
            </td>
            <td class="tdl">
                {{$vo.price}}
            </td>
            <td class="tdl">
                {{$vo.show_num}}
            </td>
            <td class="tdl">
                {{$vo.top_num}}
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[{{$vo.id}}]" value="1"{{if $vo.istop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <input type="checkbox" name="ishottop[{{$vo.id}}]" value="1"{{if $vo.ishottop}} checked{{/if}} />
            </td>
            <td class="tdl">
                <a href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/ForeignScenery/edit/id/{{$vo.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/ForeignScenery/', 'morescenery')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ForeignScenery/', 'deletescenery')">删除</button>
            </td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}
