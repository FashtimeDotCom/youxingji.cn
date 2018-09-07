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


<div class="middle_zone">
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">{{$pagetitle}}</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">油画</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/sketch/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" class="input_box"  name="title" value='{{$detail.title}}' placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label input_label">写生名家</label>
                            <div class="">
                                <select name="writer_id" id="writer_id" class="writer_id">
                                    <option value="">----</option>
                                    {{if $writer_list}}
                                    {{foreach from=$writer_list item=item key=key}}
                                        <option value="{{$key}}" {{if $detail.writer_id==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">出发时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box" id="depature_time" name="depature_time" value="{{$detail.depature_time|date_format:'%Y-%m-%d'}}" placeholder="出发时间" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">二级页面图片</label>
                            <div class="" style="margin-left: 200px;">
                                {{if $detail.thumbfile }}
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="" class="uploader-list" style="display: inline-block">
                                        {{if $detail.thumbfile}}
                                        <img width="120" id="imagess" src="{{$detail.thumbfile}}" />
                                        {{/if}}
                                    </div>
                                    <div id="dwed" style="display: inline-block;">选择图片</div>
                                </div>
                                <input type="hidden" id="images" name="thumbfile" value="{{$detail.thumbfile}}">
                                {{else}}
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <img width="" height="" src="" id="imagess" style="max-width: 120px" />
                                </div>
                                <input type="hidden" id="images" name="thumbfile" value="">
                                <a id="dwed">选择图片</a>
                                {{/if}}
                                <span style="color: red;">(790 * 260)</span>
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
                            <label class="control-label input_label">广告图</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list" style="display: inline-block">
                                        {{if $detail.pics}}
                                        <img width="120" src="{{$detail.pics}}" />
                                        {{/if}}
                                    </div>
                                    <div id="filePicker" style="display: inline-block;">选择图片</div>

                                </div>
                                <span style="color: red;">(1920 * 500)</span>
                                <input type="hidden" id="imgurl" name="pics" value="{{$detail.pics}}">
                                {{include file='admin/upload_single.tpl'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">描述</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$desc}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">简介</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$homecontent}}
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
                            <label class="control-label input_label">天数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="days" value="{{$detail.days}}" placeholder="天数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">价格</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="price" value="{{$detail.price}}" placeholder="价格" parsley-trigger="change">
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
        $('.writer_id').select2({
            placeholder: "请选择",
            width:'200px'
        });


        $("#save").click(function(){
            if( beforeSubmit() ){
                var title=$("input[name='title']").val();
                if(title.length=="" ){
                    layer.msg("请填写写生的标题!");
                    return false;
                }

                var writer_id=$("#writer_id").val();
                if(writer_id=="" || writer_id <=0 ){
                    layer.msg("请选择写生名师!");
                    return false;
                }

                var depature_time=$("#depature_time").val();
                if( depature_time =="" ){
                    layer.msg("请选择写生出发时间");
                    return false;
                }


                $.post("{{$_pathroot}}admin/sketch/save", $('#form').serialize(), function(data) {
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


</script>

