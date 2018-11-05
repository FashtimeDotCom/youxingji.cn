<?php /* vpcvcms compiled created on 2018-10-30 15:24:57
         compiled from admin/youhua/edittv.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/edittv" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="title" value="<?php echo $this->_tpl_vars['article']['title']; ?>
" type="text" class="txt" datatype="Require" msg="请填写标题" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>

        <tr><td colspan="2" class="td27">发布时间</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="addtime" id="test1" value="<?php echo $this->_tpl_vars['article']['addtime']; ?>
" type="text" class="txt" datatype="Require" msg="发布时间" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>

        <tr><td colspan="2" class="td27">描述</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px" name="describes" type="text" class="txt" datatype="Require" msg="请填写描述"><?php echo $this->_tpl_vars['article']['describes']; ?>
</textarea>
            </td>
            <td class="vtop tips2">请填写描述</td>
        </tr>
      	<tr><td colspan="2" class="td27">地址</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px;height:50px" name="url" type="text" class="txt" datatype="Require" msg="请填写地址"><?php echo $this->_tpl_vars['article']['url']; ?>
</textarea>
            </td>
            <td class="vtop tips2">请填写地址</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27"> 
            	<a href="javascript:void(0);" class="btn active">封面（280*210）</a>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                      	<?php if ($this->_tpl_vars['article']['pics']): ?>
                        <img width="120" src="<?php echo $this->_tpl_vars['article']['pics']; ?>
" />
                        <?php endif; ?>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="pics" value="<?php echo $this->_tpl_vars['article']['pics']; ?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload_single.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
    </div>
</form>

<script>
    var start = {
        elem: '#test1',
        format: 'YYYY-MM-DD hh:mm:ss',
        min: '2018-01-01', //设定最小日期为当前日期
        max: laydate.now(+730), //最大日期
        istime: true,
        istoday: true,
        choose: function(datas){

        }
    };
    laydate(start);
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>