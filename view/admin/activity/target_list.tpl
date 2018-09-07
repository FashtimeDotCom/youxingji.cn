{{include file="admin/header.tpl"}}

<style>
    .middle_zone{
        width: 100%;
        height:110px;
        background-color: white;
        margin-bottom: 40px;
    }

    .select{
        width:160px;
        border: 1px solid #bbb;
        height:28px;
    }

    .keyword{
        margin-left: 10px;
        border-radius: 3px;
        border: 1px solid #bbb;
    }


</style>
<div class="middle_zone">
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">{{$pagetitle}}</p>
    <button class="btn btn-success pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;"
            onclick="Controller.main('{{$_pathroot}}admin/target/add')">新增</button>
    <!--<button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;">导出</button>-->

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">游主张</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>

<div class="floattop"></div>

{{if $list}}
<form id="lpform" name="lpform" method="post" action="/admin/target/index">
    <table class="tb tb2 table table-striped">
        <tr class="header">
            <!--<th width="60">选择</th>-->
            {{if $field_list}}
            {{foreach item=item key=key from=$field_list}}
            <th style="text-align: center;">{{$item}}</th>
            {{/foreach}}
            {{/if}}
            <th data-uname="opt">操作</th>
        </tr>
        {{foreach from=$list item=modules}}
        <tr>
            <!--
            <td>
                <input type="checkbox" name="id[]" value="{{$modules.id}}" />
            </td>
            -->
            <td>{{$modules.id}}</td>
            <td>{{$modules.name}}</td>
            <td>{{$modules.desc}}</td>
            <td>{{$modules.title}}</td>
            <td>{{$modules.city_list}}</td>
            <td class=" td-operation">
                <a class="btn btn-success btn-sm item" href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/target/edit/id/{{$modules.id}}')">编辑</a>
                <a class="btn btn-danger btn-sm" href="javascript:;" onclick="update_status({{$modules.id}})">废除</a>
            </td>
        </tr>
        {{/foreach}}

        <tr>
            <td></td>
            <td class="tdl" colspan="2">
            </td>
            <td colspan="11" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{else}}
<table class="tb tb2">
    <tr>
        <th class="partition" colspan="12">未找到符合条件的用户</th>
    </tr>
</table>
{{/if}}


<script>
    function update_status(id)
    {
        $.post("{{$_pathroot}}admin/target/update_status",{id:id}, function(data) {
            if(!data.error){
                layer.msg(data.message,{icon:1},function(){
                    window.location.reload()
                });
            }else{
                layer.msg(data.error);
            }
        },'json');
    }

</script>



{{include file="admin/footer.tpl"}}