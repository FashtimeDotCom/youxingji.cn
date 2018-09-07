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
        <li><a href="javascript:void(0)">达人邦</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/starTravelDetail/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">旅行列表</label>
                            <div class="">
                                <select name="star_travel_id" id="star_travel_id" class="star_travel_id">
                                    <option value="">----</option>
                                    {{if $sketch_list}}
                                    {{foreach from=$sketch_list item=item key=key}}
                                    <option value="{{$key}}" {{if $detail.star_travel_id==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
                                    {{/if}}
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="" style="">跟谁去</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$with_one}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">特色体验</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$feture}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">费用说明</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$cost_explain}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">签证说明</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$visa_explain}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style="">温馨提示</label>
                            <div class="" style="display: inline-block;margin-left: 12%;">
                                {{$tips}}
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
        $('.star_travel_id').select2({
            placeholder: "请选择",
            width:'200px'
        });

        $("#save").click(function(){
            if( beforeSubmit() ){
                var star_travel_id=$("#star_travel_id").val();
                if( star_travel_id=="" || star_travel_id==0 ){
                    layer.msg("请选择写生活动列表!");
                    return false;
                }

                $.post("{{$_pathroot}}admin/starTravelDetail/save", $('#form').serialize(), function(data) {
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

