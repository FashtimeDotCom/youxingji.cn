{{include file="admin/header.tpl"}}
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

<script>
    $(function () {
        $('.js-data-example-ajax').select2({
            ajax: {
                url: '/admin/user/check_user',
                dataType: 'json',
                processResults: function (data, params) {
                    return {
                        results: data
                    };
                }
            }
        });
    })
</script>

<div class="middle_zone">
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">{{$pagetitle}}</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">活动管理</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/activity/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">活动名称</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="name" value="{{$detail.name}}" placeholder="活动名称" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">二级页面图片</label>
                            <div class="" style="margin-left: 200px;">
                                {{if $detail.small_img_url }}
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="" class="uploader-list" style="display: inline-block">
                                        {{if $detail.small_img_url}}
                                        <img width="120" id="imagess" src="{{$detail.small_img_url}}" />
                                        {{/if}}
                                    </div>
                                    <div id="dwed" style="display: inline-block;">选择图片</div>
                                </div>
                                <input type="hidden" id="images" name="small_img" value="{{$detail.small_img_url}}">
                                {{else}}
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <img width="" height="" src="" id="imagess" style="max-width: 120px" />
                                </div>
                                <input type="hidden" id="images" name="small_img" value="">
                                <a id="dwed">选择图片</a>
                                {{/if}}
                                <span style="color: red;">(307 * 198)</span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var singleuploaders = WebUploader.create({

                                // 选完文件后，是否自动上传。
                                auto: true,

                                // swf文件路径
                                swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                                // 文件接收服务端。
                                server: SITE_URL + 'admin/ajax/pic',

                                // 选择文件的按钮。可选。
                                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                                pick: '#dwed',

                                // 只允许选择图片文件。
                                accept: {
                                    title: 'Images',
                                    extensions: 'gif,jpg,jpeg,bmp,png',
                                    mimeTypes: 'image/*'
                                },
                                fileNumLimit: 1,
                                compress: false
                            });
                            singleuploaders.on( 'uploadSuccess', function( file, ret ) {
                                $('#images').val(ret.url);
                                $('#imagess').attr('src',ret.url);
                            });
                        </script>

                        <div class="form-group">
                            <label class="control-label input_label">开始时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box" id="start_time" name="start_time" value="{{$detail.start_time|date_format:'%Y-%m-%d'}}" placeholder="开始时间" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">结束时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box" id="end_time" name="end_time" value="{{$detail.end_time|date_format:'%Y-%m-%d'}}" placeholder="结束时间" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">所属活动</label>
                            <div class="">
                                <select name="type_id" id="type_id" class="type_id">
                                    <option value="">----</option>
                                    {{if $type_list}}
                                    {{foreach from=$type_list item=item key=key}}
                                    <option value="{{$key}}" {{if $detail.type_id==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">目的地</label>
                            <div class="">
                                <select name="target_id" id="target_id" class="target_id">
                                    <option value="">----</option>
                                    {{if $target_list}}
                                        {{foreach from=$target_list item=item key=key}}
                                            <option value="{{$key}}" {{if $detail.target_id==$key}}selected{{/if}}>{{$item}}</option>
                                        {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">状态</label>
                            <div class="">
                                <select name="status" id="status">
                                    {{if $status_list}}
                                        {{foreach from=$status_list item=item key=key}}
                                            <option value="{{$key}}" {{if $detail.status==$key}}selected{{/if}}>{{$item}}</option>
                                        {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">种子达人ID</label>
                            <div>
                                <select class="js-data-example-ajax" name="user_id">
                                    {{if $detail.id}}
                                    <option value="{{$detail.user_id}}" selected>{{$detail.username}}</option>
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{include file="admin/footer.tpl"}}

<script>
    $(function () {

        $("#save").click(function(){
            if( beforeSubmit() ){
                var name=$("input[name='name']").val();
                var start_time=$("#start_time").val();
                var end_time=$("#end_time").val();
                var target_id=$("#target_id").val();
                var user_id=$("input[name='user_id']").val();

                if( name=="" ){
                    layer.msg("活动名称不能为空!");
                    return false;
                }

                if( start_time=="" ){
                    layer.msg("开始时间不能为空!");
                    return false;
                }

                if( end_time=="" ){
                    layer.msg("结束时间不能为空!");
                    return false;
                }

                var temp={{if $detail.id}}1{{else}}0{{/if}};
                if( temp==0 ){
                    if( target_id=="" ){
                        layer.msg("请先选择旅游目的地!");
                        return false;
                    }

                    if( user_id=="" || user_id==0 ){
                        layer.msg("必须绑定一个种子达人!");
                        return false;
                    }
                }



                $.post("{{$_pathroot}}admin/activity/save", $('#form').serialize(), function(data) {
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
            elem: '#start_time',
            format: 'YYYY-MM-DD',
            min: '2018-01-01', //设定最小日期为当前日期
            max: laydate.now(+730), //最大日期
            istime: false,
            istoday: false,
            choose: function(datas){

            }
        };
        laydate(start);

        var end = {
            elem: '#end_time',
            format: 'YYYY-MM-DD',
            min: '2018-01-01', //设定最小日期为当前日期
            max: laydate.now(+730), //最大日期
            istime: false,
            istoday: false,
            choose: function(datas){

            }
        };
        laydate(end);

    })

    $('.target_id').select2({
        placeholder: "请选择",
        width:'200px'
    });


    function beforeSubmit(){
        return $('#form').parsley().validate();
    }

    function change(a,id){
        var c=document.getElementById(''+id+'');
        c.value=a.value;
    }


</script>

