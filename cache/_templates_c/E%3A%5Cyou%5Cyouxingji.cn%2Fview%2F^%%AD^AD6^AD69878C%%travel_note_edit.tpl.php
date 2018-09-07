<?php /* vpcvcms compiled created on 2018-07-25 09:57:45
         compiled from admin/travel_note/travel_note_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/travel_note/travel_note_edit.tpl', 91, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<script type="text/javascript" src="/resource/js/parsley.min.js"></script>

<link rel="stylesheet" type="text/css" href="/resource/admin/js/jquery.select2/4.0.3/css/select2.min.css"/>
<script src="/resource/admin/js/jquery.select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/resource/admin/js/jquery.select2/select2.css"/>


<style>
    .middle_zone{
        width: 100%;
        height:110px;
        background-color: white;
        margin-bottom: 40px;
    }

    .cl-mcont{
        background-color: white;
        color: inherit;
        font-size: 13px;
        font-weight: 200;
        line-height: 21px;
        padding: 15px 30px 30px 30px;
        margin-top: 0;
    }

    .form-group{
        margin: 0;
        padding: 20px 0;
        border-bottom: 1px dashed #efefef;
    }

    .input_label{
        width: 25%;
        margin-right: 20px;
        padding-top: 10px !important;
    }
    .input_box{
        width: 50%;
        height: 25px !important;
    }



</style>


<div class="middle_zone">
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;"><?php echo $this->_tpl_vars['pagetitle']; ?>
</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">日月潭</a> / </li>
        <li class="active"><?php echo $this->_tpl_vars['pagetitle']; ?>
</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/TravelNote/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="<?php echo $this->_tpl_vars['detail']['id']; ?>
">

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" disabled class="input_box"  name="title" value='<?php echo $this->_tpl_vars['detail']['title']; ?>
' placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label input_label">描述</label>
                            <div class="">
                                <textarea name="" id="" class="" cols="70" rows="10" disabled><?php echo $this->_tpl_vars['detail']['desc']; ?>
</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">发布时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box" id="addtime" name="addtime" disabled value="<?php echo ((is_array($_tmp=$this->_tpl_vars['detail']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" placeholder="出发时间" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">广告图</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list" style="display: inline-block">
                                        <img width="500" src="<?php echo $this->_tpl_vars['detail']['thumbfile']; ?>
" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">查看全文</label>
                            <div class="">
                                <a class="btn btn-success" onclick="window.open('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/TravelNote/show_detail/id/<?php echo $this->_tpl_vars['detail']['id']; ?>
');" >全文链接</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">是否推荐</label>
                            <div class="">
                                <select name="is_top" id="is_top">
                                    <?php if ($this->_tpl_vars['is_top']): ?>
                                    <?php $_from = $this->_tpl_vars['is_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['detail']['is_top'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label input_label">状态</label>
                            <div class="">
                                <select name="status" id="status" onchange="change_status()">
                                    <?php if ($this->_tpl_vars['status_list']): ?>
                                    <?php $_from = $this->_tpl_vars['status_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['detail']['status'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="remark_div" style="display: <?php if ($this->_tpl_vars['detail']['status'] != 2): ?>none<?php endif; ?>;">
                            <label class="control-label input_label">备注</label>
                            <div class="">
                                <textarea name="remark" id="remark" class="" cols="70" rows="10"><?php echo $this->_tpl_vars['detail']['remark']; ?>
</textarea>
                                <span style="color: red;">注:审核不通过填写备注!</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">阅读数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="show_num" value="<?php echo $this->_tpl_vars['detail']['show_num']; ?>
" placeholder="阅读数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">点赞数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="top_num" value="<?php echo $this->_tpl_vars['detail']['top_num']; ?>
" placeholder="点赞数" parsley-trigger="change">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
    $(function () {
        $('.writer_id').select2({
            placeholder: "请选择",
            width:'200px'
        });


        $("#save").click(function(){
            if( beforeSubmit() ){

                $.post("<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/TravelNote/save", $('#form').serialize(), function(data) {
                    if(!data.error){
                        layer.msg(data.message,{icon:1},function(){
                            window.location.reload()
                        });
                    }else{
                        layer.msg(data.error);
                    }
                },'json');
            }
        });


        var start = {
            elem: '#depature_time',
            format: 'YYYY-MM-DD',
            min: '2018-01-01', //设定最小日期为当前日期
            max: laydate.now(+730), //最大日期
            istime: false,
            istoday: false,
            choose: function(datas){

            }
        };
        laydate(start);




    })

    function beforeSubmit(){
        return $('#form').parsley().validate();
    }

    function change_status()
    {
        var status=$("#status").val();
        if( status==2 ){
            $("#remark_div").show();
        }else{
            $("#remark_div").hide();
        }
    }


</script>
