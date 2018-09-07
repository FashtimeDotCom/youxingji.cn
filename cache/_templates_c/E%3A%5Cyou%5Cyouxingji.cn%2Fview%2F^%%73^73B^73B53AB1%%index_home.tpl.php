<?php /* vpcvcms compiled created on 2018-07-12 09:55:49
         compiled from admin/index_home.tpl */ ?>
<div class="home-pannel">
	<div class="os-t">系统信息</div>
    <table class="table" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td class="w100">服务器</td>
            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?>
 <?php echo $this->_tpl_vars['phpversion']; ?>
</td>
        </tr>
        <tr><td>PHP 版本</td><td><?php echo $this->_tpl_vars['serverinfo']; ?>
</td></tr>
        <tr><td>上传许可</td><td><?php echo $this->_tpl_vars['fileupload']; ?>
</td></tr>
        <tr><td>数据库版本</td><td><?php echo $this->_tpl_vars['dbversion']; ?>
</td></tr>
        <tr><td>当前数据库占用</td><td><?php echo $this->_tpl_vars['dbsize']; ?>
</td></tr>
        <tr><td>主机名</td><td><?php echo $_SERVER['SERVER_NAME']; ?>
(<?php echo $_SERVER['SERVER_ADDR']; ?>
:<?php echo $_SERVER['SERVER_PORT']; ?>
)</td></tr>
        <tr><td>magic_quote_gpc</td><td><?php echo $this->_tpl_vars['magic_quote_gpc']; ?>
</td></tr>
        <tr><td>allow_url_fopen</td><td><?php echo $this->_tpl_vars['allow_url_fopen']; ?>
</td></tr>
        <?php if ($this->_tpl_vars['stat']): ?>
        <tr><td>今日访问：</td><td><?php echo $this->_tpl_vars['visits']; ?>
</td></tr>
        <tr><td>今日IP：</td><td><?php echo $this->_tpl_vars['ip']; ?>
</td></tr>
        <?php else: ?>
        <tr><td colspan="2">没有开启访问列表 <a href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/basic')">点击开启</a></td></tr>
        <?php endif; ?>
    </table>
</div>
<script type="text/javascript">
$(function(){
    resizeTeam();
    $(window).resize(function(){
        resizeTeam();
    });
})

function resizeTeam(){
    $('.home-team li').css('width', ($(window).width() - 240) / 3);
    $('.home-team').show();
}
</script>