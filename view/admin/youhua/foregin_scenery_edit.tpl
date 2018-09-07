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
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">海外专区作品</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">油画</a> / </li>
        <li class="active">海外专区</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/ForeignScenery/save"
                      style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                    <div class="content">
                        <h1>详细信息：</h1>
                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">画家</label>
                            <div class="">
                                <select name="wid" id="wid" class="wid">
                                    <option value="">----</option>
                                    {{if $writer_list}}
                                    {{foreach from=$writer_list item=item key=key}}
                                    <option value="{{$key}}" {{if $detail.wid==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">油画名称</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="title" value="{{$detail.title}}" placeholder="油画名称" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">缩略图</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                        <img width="" height="" src="{{$detail.thumbpic}}" id="imagess" style="max-width: 120px" />
                                </div>
                                <input type="hidden" id="images" name="thumbpic" value="{{$detail.thumbpic}}">
                                <a id="dwed">选择图片</a>
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">封面</label>
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

                                <input type="hidden" id="imgurl" name="pics" value="{{$detail.pics}}">
                                {{include file='admin/upload_single.tpl'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">油画尺寸</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="size" value="{{$detail.size}}" placeholder="油画尺寸" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">写生地点</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="place" value="{{$detail.place}}" placeholder="写生地点" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">价格</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="price" value="{{$detail.price}}" placeholder="价格" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">查看数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="show_num" value="{{$detail.show_num}}" placeholder="查看数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">点赞数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="top_num" value="{{$detail.top_num}}" placeholder="点赞数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">来源</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="from" value="{{$detail.from}}" placeholder="来源" parsley-trigger="change">
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{include file="admin/footer.tpl"}}

<script>
    $(function () {

        $("#save").click(function(){
            if( beforeSubmit() ){
                var wid=$("#wid").val();
                var title=$("input[name='title']").val();

                if( !wid ){
                    layer.msg("请选择画家");
                    return false;
                }

                if( title.length==0 ){
                    layer.msg("请先输入标题!");
                    return false;
                }

                $.post("{{$_pathroot}}admin/ForeignScenery/save", $('#form').serialize(), function(data) {
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


    })

    $('#wid').select2({
        placeholder: "请选择",
        width:'200px'
    });


    function beforeSubmit(){
        return $('#form').parsley().validate();
    }



</script>

