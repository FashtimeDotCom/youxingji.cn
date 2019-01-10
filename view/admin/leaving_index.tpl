{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()">在线预约</li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/leaving/index" id="pform">
        <select name="status">
            <option value="">请选择处理状态</option>
            <option value="1" {{if $conditions.status == 1}} selected{{/if}}>未处理</option>
            <option value="2" {{if $conditions.status == 2}} selected{{/if}}>已处理</option>
        </select>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/leaving/index')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/leaving/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">姓名</th>
            <th>电话</th>
            <th>目的地</th>
            <th>留言</th>
            <th>时间</th>
            <th>是否处理</th>
            <th>处理时间</th>
            <th>处理人</th>
            <th>操作</th>
        </tr>
        {{foreach from=$leavings item=leaving}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$leaving.id}}" />
            </td>
            <td class="tdl">
                {{$leaving.realname}}
            </td>
            <td class="td25">
                {{$leaving.telephone}}
            </td>
            <td class="td25">
                {{$leaving.email}}
            </td>
            <td class="td25">
                {{$leaving.message}}
            </td>
            <td class="td25">
                {{$leaving.addtime|date_format:'%Y-%m-%d'}}
            </td>
            <td class="td25">
                {{if $leaving.status == 1}}
                未处理
                {{else}}
                已处理
                {{/if}}
            </td>
            <td class="td25">{{$leaving.edit_time|date_format:'%Y-%m-%d %H:%M:%S'}}</td>
            <td class="td25">{{$leaving.edit_user_name}}</td>
            <td class="td25">
                {{if $leaving.status != 2}}
                    <button name="" class="btn btn-primary" onclick="handle({{$leaving.id}})" type="button">处理</button>
                {{/if}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/leaving/', 'delete')">删除</button>
            </td>
            <td colspan="9" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}
<script >
    function handle(id) {
        layer.confirm('确认处理该条数据吗？', {
          btn: ['确认','取消']
        }, function(){
            $.ajax({
                type:'post',
                url:'/admin/leaving/handle',
                data:{id:id},
                dataType:'json',
                success:function(obj) {
                    layer.msg(obj.msg);
                    if (obj.ret == 1) {
                        setTimeout(function() {
                            window.location.reload();
                        },1000)
                    } else {

                    }
                }
            })
        });
    }
</script>