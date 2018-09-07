<?php /* vpcvcms compiled created on 2018-07-12 09:56:02
         compiled from admin/activity/activity_travel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <h1>筛选三级页面展示达人邦</h1>
</div>
<form method="post" action="/admin/activity/save_travel" name="lpform" id="lpform">
    <input type="hidden" id="activity_id" name="activity_id" value="<?php echo $this->_tpl_vars['activity_id']; ?>
">
    <table class="tb tb2" id="sTable">
        <tr class="header">
            <th class="tdl" width="60">编号</th>
            <th class="tdl" width="120">标题</th>
            <th class="tdl" width="30">选择</th>
            <th class="tdl" width="30">推荐<span style="color: red;">(只能一个)</span></th>
        </tr>
        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
        <tr class="hover">

            <td class="tdl">
                <?php echo $this->_tpl_vars['vo']['id']; ?>

            </td>
            <td class="tdl">
                <?php echo $this->_tpl_vars['vo']['title']; ?>

            </td>
            <td class="tdl">
                <input type="checkbox" name="select[]" value="<?php echo $this->_tpl_vars['vo']['id']; ?>
"<?php if ($this->_tpl_vars['vo']['can_do']): ?> checked<?php endif; ?> />
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[]" value="<?php echo $this->_tpl_vars['vo']['id']; ?>
"<?php if ($this->_tpl_vars['vo']['istop']): ?> checked<?php endif; ?> />
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/activity/', 'save_travel')">修改</button>
            </td>
            <td colspan="5" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>