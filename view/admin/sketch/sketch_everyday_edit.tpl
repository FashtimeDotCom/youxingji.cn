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
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/sketchEveryday/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" class="input_box"  name="title" value='{{$detail.title}}' placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label input_label">写生标题</label>
                            <div class="">
                                <select name="sketch_id" id="sketch_id" class="sketch_id">
                                    <option value="">----</option>
                                    {{if $sketch_list}}
                                    {{foreach from=$sketch_list item=item key=key}}
                                    <option value="{{$key}}" {{if $detail.sketch_id==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">飞机</label>
                            <div class="">
                                <textarea class="" name="airport" id="airport" cols="60" rows="10">{{$detail.airport}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">早餐</label>
                            <div class="">
                                <textarea class="" name="breakfast" id="breakfast" cols="60" rows="10">{{$detail.breakfast}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">住宿</label>
                            <div class="">
                                <textarea class="" name="accommodation" id="accommodation" cols="60" rows="10">{{$detail.accommodation}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">介绍</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$desc}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">排序</label>
                            <div class="">
                                <input type="number" class="input_box"  name="sort" value='{{$detail.sort}}' placeholder="排序" parsley-trigger="change">
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
        $('.sketch_id').select2({
            placeholder: "请选择",
            width:'200px'
        });

        $("#save").click(function(){
            if( beforeSubmit() ){
                var sketch_id=$("#sketch_id").val();
                if( sketch_id=="" || sketch_id==0 ){
                    layer.msg("请选择写生活动列表!");
                    return false;
                }

                var sort=$("input[name='sort']").val();
                if( sort=="" || sort==0 ){
                    layer.msg("请填写旅程排序!");
                    return false;
                }

                $.post("{{$_pathroot}}admin/sketchEveryday/save", $('#form').serialize(), function(data) {
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


</script>

