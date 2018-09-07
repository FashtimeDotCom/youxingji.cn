{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>报名表</span></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/recruiting/entered" id="pform">
        <input id="input_name" type="text" name="rid" placeholder="请输入招募ID" value="{{if $rid}}{{$rid}}{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/recruiting/entered')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/recruiting/enteredmore" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
          	<th width="60">选择</th>
          	<th class="tdl">id</th>
            <th class="tdl">姓名</th>
            <th class="tdl">性别</th>
            <th class="tdl">手机</th>
            <th class="tdl">学校</th>
          	<th class="tdl">英语水平</th>
          	<th class="tdl">出生日期</th>
          	<th class="tdl">微信号</th>
          	<th class="tdl">邮箱</th>
          	<th class="tdl">是否已经办理护照</th>
          	<th class="tdl">在校活动经历</th>
          	<th class="tdl">是否有过旅行经历</th>
          	<th class="tdl">备注</th>
          	<th class="tdl">来源</th>
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
                {{$vo.sex}}
            </td>
            <td class="tdl">
                {{$vo.phone}}
            </td>
          	<td class="tdl">
                {{$vo.school}}
            </td>
          	<td class="tdl">
                {{$vo.englishlevel}}
            </td>
          	<td class="tdl">
                {{$vo.birthday}}
            </td>
          	<td class="tdl">
                {{$vo.wechat}}
            </td>
          	<td class="tdl">
                {{$vo.email}}
            </td>
          	<td class="tdl">
                {{$vo.y}}
            </td>
          	<td class="tdl">
                {{$vo.activitiesthrough}}
            </td>
          	<td class="tdl">
                {{$vo.travelexperiences}}
            </td>
          	<td class="tdl">
                {{$vo.note}}
            </td>
          	<td class="tdl">
                {{$vo.source}}
            </td>
        </tr>
        {{/foreach}}
      	<tr>
          	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/recruiting/', 'entereddelete')">删除</button>
            </td>
            <td colspan="15" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}