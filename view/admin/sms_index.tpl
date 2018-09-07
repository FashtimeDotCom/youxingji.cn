{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>短信列表</span></li>
    </ul>
</div>
<form method="post" action="/admin/ryt/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th class="tdl">手机号</th>
            <th class="tdl">内容</th>
            <th class="tdl">发送时间</th>
            <th class="tdl">发送ip</th>
        </tr>
        {{foreach from=$list item=vo}}
        <tr class="hover">
            <td class="tdl">
                {{$vo.tel}}
            </td>
            <td class="tdl">
                {{$vo.note}}
            </td>
            <td class="tdl">
                {{$vo.gettime}}
            </td>
            <td class="tdl">
                {{$vo.ip}}
            </td>
        </tr>
        {{/foreach}}
      	<tr>
            <td colspan="7" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}