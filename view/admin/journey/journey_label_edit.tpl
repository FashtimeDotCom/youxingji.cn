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
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">标签列表</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">甄选之旅</a> / </li>
        <li class="active">标签列表</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/JourneyLabel/save"
                      style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                    <div class="content">
                        <h1>标签信息：</h1>
                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">标签名称</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="name" value="{{$detail.name}}" placeholder="标签名称" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">图片</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list" style="display: inline-block">
                                        {{if $detail.pics}}
                                        <img width="120" src="{{$detail.pics}}" />
                                        {{/if}}
                                    </div>
                                    <div id="filePicker" style="display: inline-block;">选择图片</div>
                                    <span style="color: red;">(480*600)</span>
                                </div>

                                <input type="hidden" id="imgurl" name="pics" value="{{$detail.pics}}">
                                {{include file='admin/upload_single.tpl'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">排序</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="sort" value="{{$detail.sort}}" placeholder="排序" parsley-trigger="change">
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
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="title" value="{{$detail.title}}" placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">描述</label>
                            <div class="">
                                <textarea name="desc" id="desc" cols="60" rows="10">{{$detail.desc}}</textarea>
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
                var name=$("input[name='name']").val();

                if( name.length==0 ){
                    layer.msg("标签名称!");
                    return false;
                }

                $.post("{{$_pathroot}}admin/JourneyLabel/save", $('#form').serialize(), function(data) {
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

