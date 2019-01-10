{{include file="admin/header.tpl"}}
<script type="text/javascript" src="/resource/js/parsley.min.js"></script>


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
        <li><a href="javascript:void(0)">寻找达人</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/LookingStar/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="title" value="{{$detail.title}}" placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">图片</label>
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
                                <span style="color: red;">(187 * 175)</span>
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
                            <label class="control-label input_label">排序</label>
                            <div class="">
                                <input type="number" class="form-control input_box"  name="sort" value="{{$detail.sort}}" placeholder="排序" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">正文</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$content}}
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
                var status=$("input[name='status']").val();

                $.post("{{$_pathroot}}admin/LookingStar/save", $('#form').serialize(), function(data) {
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

    function beforeSubmit(){
        return $('#form').parsley().validate();
    }

    function change(a,id){
        var c=document.getElementById(''+id+'');
        c.value=a.value;
    }


</script>

