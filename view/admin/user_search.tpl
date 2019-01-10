{{include file="admin/header.tpl"}}
<iframe id="supportiframe"  name="supportiframe" style="display:none"></iframe>
<div class="floattop">
    <ul>
        <li class="btn btn-info">用户管理</li>
        <li class="btn btn-info" onclick="Controller.controller('添加用户','admin/user/add')">添加用户</li>
    </ul>
    <div style="margin-top: 20px;margin-bottom: 10px">
            <h3 style="color: red;display: inline-block">导入用户文件：</h3>
            <input class=""  type="file" name="file_stu" id="submit_file" />
            <div  class="" style="display: inline-block">
                <input class="btn  btn-success" id="importbtn" type="button"  value="导入" />
            </div>
            <a style="" class="btn btn-danger btn-sm item" href="javascript:;" onclick="batch_focus()">一键关注</a>
    </div>
</div>
<div class="input-append">
    <form id="pform" name="pform" method="post" action="/admin/user/search">
        <select name="type">
            <option value="email" {{if $conditions.type == 'email'}}selected{{/if}}>Email</option>
            <option value="username" {{if $conditions.type == 'username'}}selected{{/if}}>帐号</option>
            <option value="uid" {{if $conditions.type == 'uid'}}selected{{/if}}>用户ID</option>
        </select>
        <input type="text" name="keyword" placeholder="关键字" value="{{if $conditions.keyword}}{{$conditions.keyword}}{{/if}}" class="txt" onclick="this.value=''" size="8" />
        <select id="gid" name="gid">
            <option value="0">用户组</option>
            {{foreach from=$usergroups key=gid item=group}}
                <option value="{{$gid}}" {{if $conditions.gid == $gid}}selected{{/if}}>{{$group.title}}</option>
            {{/foreach}}
        </select>
        <select name="regdate">
            <option value="0">注册时间</option>
            <option value="1" {{if $conditions.regdate == 1}}selected{{/if}}>一周内</option>
            <option value="2" {{if $conditions.regdate == 2}}selected{{/if}}>两周内</option>
            <option value="3" {{if $conditions.regdate == 3}}selected{{/if}}>一月内</option>
            <option value="4" {{if $conditions.regdate == 4}}selected{{/if}}>半年内</option>
            <option value="5" {{if $conditions.regdate == 5}}selected{{/if}}>一年内</option>
            <option value="6" {{if $conditions.regdate == 6}}selected{{/if}}>一年前</option>
        </select>
        <select name="lastvisit">
            <option value="0">最后访问</option>
            <option value="1" {{if $conditions.lastvisit == 1}}selected{{/if}}>一周内</option>
            <option value="2" {{if $conditions.lastvisit == 2}}selected{{/if}}>两周内</option>
            <option value="3" {{if $conditions.lastvisit == 3}}selected{{/if}}>一月内</option>
            <option value="4" {{if $conditions.lastvisit == 4}}selected{{/if}}>半年内</option>
            <option value="5" {{if $conditions.lastvisit == 5}}selected{{/if}}>一年内</option>
            <option value="6" {{if $conditions.lastvisit == 6}}selected{{/if}}>一年前</option>
        </select>
        <select id="condition_type" name="condition_type">
            <option value="0" {{if $conditions.condition_type == 0}}selected{{/if}}>分类搜索</option>
            <option value="3" {{if $conditions.condition_type == 3}}selected{{/if}}>推荐</option>
            <option value="1" {{if $conditions.condition_type == 1}}selected{{/if}}>达人列表</option>
            <option value="2" {{if $conditions.condition_type == 2}}selected{{/if}}>练习生</option>
            <option value="4" {{if $conditions.condition_type == 4}}selected{{/if}}>tv达人</option>
            <option value="5" {{if $conditions.condition_type == 5}}selected{{/if}}>问答达人</option>
            <option value="6" {{if $conditions.condition_type == 6}}selected{{/if}}>僵尸粉</option>
        </select>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/user/search')"><i class="icon-search"></i></button>
    </form>
</div>
{{if $users}}
    <form id="lpform" name="lpform" method="post" action="/admin/user/delete">
    <table class="tb tb2">
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">UID</th>
            <th class="tdl">帐号</th>
            <th>用户组</th>
            <th>排序</th>
            <th>标签</th>
            <th>注册时间</th>
            <th>练习生</th>
          	<th>推荐</th>
            <th>达人</th>
            <th>推荐tv</th>
            <th>问答达人</th>
            <th>操作</th>
        </tr>
        {{foreach from=$users item=user}}
            <tr>
                <td>
                	{{if $user.uid != '1' && $user.uid != $cuid}}
                	<input type="checkbox" name="id[]" value="{{$user.uid}}" />
                    {{/if}}
                </td>
                <td>{{$user.uid}}</td>
                <td class="tdl"><a href="javascript:void(0);" onclick="Controller.controller('修改用户', 'admin/user/edit/uid/{{$user.uid}}')">{{$user.username}}</a></td>
                <td>{{$usergroups[$user.gid].title}}</td>
                <td>{{$user.sort}}</td>
                <td>{{$user.tag}}</td>
                <td>{{$user.regtime|idate:"Y-m-d"}}</td>
                <td class="tdl">
                    <input type="checkbox" {{if $user.is_fake == 1}}disabled{{/if}} name="trainee[{{$user.uid}}]" value="1"{{if $user.trainee}} checked{{/if}} />
                </td>
              	<td class="tdl">
                    <input type="checkbox" {{if $user.is_fake == 1}}disabled{{/if}} name="weektop[{{$user.uid}}]" value="1"{{if $user.weektop}} checked{{/if}} />
                </td>
                <td class="tdl">
                    <input type="checkbox" {{if $user.is_fake == 1}}disabled{{/if}} name="startop[{{$user.uid}}]" value="1"{{if $user.startop}} checked{{/if}} />
                </td>
                <td class="tdl">
                    <input type="checkbox" {{if $user.is_fake == 1}}disabled{{/if}} name="tvtop[{{$user.uid}}]" value="1"{{if $user.tvtop}} checked{{/if}} />
                </td>
                <td class="tdl">
                    <input type="checkbox" {{if $user.is_fake == 1}}disabled{{/if}} name="is_faq_star[{{$user.uid}}]" value="1"{{if $user.is_faq_star}} checked{{/if}} />
                </td>
                <td>
                    {{if $sgid==1}}
                        <a class="btn btn-success btn-sm item" href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/user/edit/uid/{{$user.uid}}')">编辑</a>
                    <a class="btn btn-primary btn-sm item" href="/admin/user/login/uid/{{$user.uid}}" target="_blank">登陆</a>
                        {{if $user.gid == 1 && $user.uid != 1}}
                        <a href="javascript:;" onclick="Controller.controller('设置权限', 'admin/user/priv/uid/{{$user.uid}}')">权限</a>
                        {{/if}}
                    {{/if}}
                </td>
            </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/user/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/user/', 'delete')">删除</button>
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

<script type="text/javascript">
    $("#importbtn").click(function () {
        layer.load(1, {time: 3000});
        var formData = new FormData();
        formData.append("file_stu", document.getElementById("submit_file").files[0]);
        $.ajax({
            url: "/admin/user/import_file",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                var res=JSON.parse(data);
                if( parseInt(res.status)==1 ){
                    layer.msg(res.tips,{ icon:1 },function(){
                        window.location.reload();
                    });
                }else{
                    layer.msg(res.tips);
                }

            },
            error: function () {
                alert("上传失败！");
                return false;
            }
        });

    });

    function batch_focus()
    {
        layer.confirm('你确定要一键所有关注达人吗？', {
            btn: ['关注','取消'] //按钮
        }, function(){
            $.ajax({
                url:'/admin/user/focus_all',
                type:"POST",
                data:{action:'focus'},
                success:function (res) {
                    var data=JSON.parse(res);
                    if( parseInt(data.status==1) ){
                        layer.msg(data.tips,{ icon:1 },function(){

                        });
                    }else{
                        layer.msg(data.tips,{ icon:1 },function(){

                        });
                    }
                },
                error:function (res) {

                }
            });
        }, function(){

        });
    }


</script>

{{include file="admin/footer.tpl"}}