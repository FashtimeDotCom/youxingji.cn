<?php /* vpcvcms compiled created on 2018-07-12 09:55:56
         compiled from admin/activity/activity_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;"><?php echo $this->_tpl_vars['pagetitle']; ?>
</p>
    <button class="btn btn-success pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;"
            onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/activity/add')">新增</button>
    <!--<button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;">导出</button>-->

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">游主张</a> / </li>
        <li class="active"><?php echo $this->_tpl_vars['pagetitle']; ?>
</li>
    </ol>
</div>

<div class="floattop"></div>

<?php if ($this->_tpl_vars['list']): ?>
<form id="lpform" name="lpform" method="post" action="/admin/activity/index">
    <table class="tb tb2 table table-striped">
        <tr class="header">
            <!--<th width="60">选择</th>-->
            <?php if ($this->_tpl_vars['field_list']): ?>
            <?php $_from = $this->_tpl_vars['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <th style="text-align: center;"><?php echo $this->_tpl_vars['item']; ?>
</th>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
            <th data-uname="opt">操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modules']):
?>
        <tr>
            <!--
            <td>
                <input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['modules']['id']; ?>
" />
            </td>
            -->
            <td><?php echo $this->_tpl_vars['modules']['id']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['status']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['start_time']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['end_time']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['username']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['user_id']; ?>
</td>
            <td><?php echo $this->_tpl_vars['modules']['target_name']; ?>
</td>
           <!-- <td><?php echo $this->_tpl_vars['modules']['city_list']; ?>
</td>-->
            <td><?php echo $this->_tpl_vars['modules']['type_name']; ?>
</td>
            <td class=" td-operation">
                <a class="btn btn-success btn-sm item" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/activity/edit/id/<?php echo $this->_tpl_vars['modules']['id']; ?>
')">编辑</a>
                <a class="btn btn-danger btn-sm" href="javascript:;" onclick="update_status(<?php echo $this->_tpl_vars['modules']['id']; ?>
)">废除</a>

                <?php if ($this->_tpl_vars['modules']['old_status']): ?>
                    <?php if ($this->_tpl_vars['modules']['old_status'] == 1): ?>
                        <a class="btn btn-success btn-sm item" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/activity/tv/id/<?php echo $this->_tpl_vars['modules']['id']; ?>
/user_id/<?php echo $this->_tpl_vars['modules']['user_id']; ?>
')">tv</a>
                        <a class="btn btn-primary btn-sm item" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/activity/travel/id/<?php echo $this->_tpl_vars['modules']['id']; ?>
/user_id/<?php echo $this->_tpl_vars['modules']['user_id']; ?>
')">说说</a>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>

        <tr>
            <td></td>
            <td class="tdl" colspan="2">
            </td>
            <td colspan="11" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
</form>
<?php else: ?>
<table class="tb tb2">
    <tr>
        <th class="partition" colspan="12">未找到符合条件的用户</th>
    </tr>
</table>
<?php endif; ?>


<script>
    function update_status(id)
    {
        $.post("<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/activity/update_status",{id:id}, function(data) {
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



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>