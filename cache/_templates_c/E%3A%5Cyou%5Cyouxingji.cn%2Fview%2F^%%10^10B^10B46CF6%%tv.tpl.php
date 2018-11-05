<?php /* vpcvcms compiled created on 2018-10-30 15:24:44
         compiled from admin/youhua/tv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'helper', 'admin/youhua/tv.tpl', 32, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['vo']['id']; ?>
" />
            </td>
            <td class="tdl">
            	<?php echo $this->_tpl_vars['vo']['id']; ?>

            </td>
            <td class="tdl">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['vo']['uid'])) ? $this->_run_mod_handler('helper', true, $_tmp, 'username') : smarty_modifier_helper($_tmp, 'username')); ?>

            </td>
            <td class="tdl">
                <?php echo $this->_tpl_vars['vo']['title']; ?>

            </td>
            <td class="tdl">
                <img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" width="100">
            </td>
           
            <td class="tdl">
                <?php echo $this->_tpl_vars['vo']['url']; ?>

            </td>
            <td class="tdl">
                <input type="text" name="tags[<?php echo $this->_tpl_vars['vo']['id']; ?>
]" value="<?php echo $this->_tpl_vars['vo']['tags']; ?>
">
            </td>
            <td class="tdl">
                <input type="checkbox" name="istop[<?php echo $this->_tpl_vars['vo']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['vo']['istop']): ?> checked<?php endif; ?> />
            </td>
            <td class="tdl">
                <input type="checkbox" name="status[<?php echo $this->_tpl_vars['vo']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['vo']['status']): ?> checked<?php endif; ?> />
            </td>
          	<td class="tdl">
                <a href="javascript:;" onclick="Controller.controller('编辑', 'admin/youhua/edittv/id/<?php echo $this->_tpl_vars['vo']['id']; ?>
')" >编辑</a>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/youhua/', 'moretv')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/youhua/', 'deletetv')">删除</button>
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