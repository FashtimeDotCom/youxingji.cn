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
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/activitytype/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">活动名称</label>
                            <div class="">
                                <input type="text" class="input_box"  name="name" value='{{$detail.name}}' placeholder="活动名称" parsley-trigger="change">
                            </div>
                        </div>

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
                            <label class="control-label input_label">广告图</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list" style="display: inline-block">
                                        {{if $detail.img_url}}
                                            <img width="120" src="{{$detail.img_url}}" />
                                        {{/if}}
                                    </div>
                                    <div id="filePicker" style="display: inline-block;">选择图片</div>

                                </div>
                                <span style="color: red;">(1920 * 1100)</span>
                                <input type="hidden" id="imgurl" name="pics" value="{{$detail.img_url}}">
                                {{include file='admin/upload_single.tpl'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">链接路径</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="link_url" value="{{$detail.link_url}}" placeholder="链接路径" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="" style=""></label>
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
                            <label class="control-label input_label">种子达人ID</label>
                            <div>
                                <select class="js-data-example-ajax" name="uid">
                                    {{if $detail.id}}
                                    <option value="{{$detail.user_id}}" selected>{{$detail.username}}</option>
                                    {{/if}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">报名路径</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="sign_in_url" value="{{$detail.sign_in_url}}" placeholder="报名路径" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">查看更多</label>
                            <div class="">
                                <select name="view_more" id="view_more" class="view_more">
                                    <option value="">----</option>
                                    {{if $recu_list}}
                                    {{foreach from=$recu_list item=item key=key}}
                                    <option value="{{$key}}" {{if $detail.view_more==$key}}selected{{/if}}>{{$item}}</option>
                                    {{/foreach}}
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

                $.post("{{$_pathroot}}admin/activitytype/save", $('#form').serialize(), function(data) {
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

    function beforeSubmit(){
        return $('#form').parsley().validate();
    }


</script>

