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

<!--
<script type="text/javascript">
    $(function () {
        $('#tribe_staff').select2({
            minimumInputLength: 0,
            ajax:{
                url:"admin/activity/check_user",
                dataType:'json',
                data:function(term,page){
                    return {
                        key: term
                    }
                },
                results: function(data, page) {
                    return { results: data };
                }
            },
            cache: true
        });
    })
</script>
-->

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
                <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/target/save"
                      style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                <div class="content">
                        <h1>详细信息：</h1>
                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">目的地</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="name" value="{{$detail.name}}" placeholder="活动名称" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">描述</label>
                            <div class="">
                                <textarea class="" name="desc" id="desc" cols="60" rows="10">{{$detail.desc}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="title" value="{{$detail.title}}" placeholder="标题" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">所属大学</label>
                            <div class="">
                                <input type="text" class="form-control input_box" name="university" value="{{$detail.university}}" placeholder="所属大学" parsley-trigger="change">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label input_label">三级页面广告图</label>
                        <div class="" style="margin-left: 200px;">
                            <div id="uploader-single">
                                <!--用来存放item-->
                                <div id="fileList" class="uploader-list" style="display: inline-block">
                                    {{if $detail.ad_img_url}}
                                    <img width="120" src="{{$detail.ad_img_url}}" />
                                    {{/if}}
                                </div>
                                <div id="filePicker" style="display: inline-block;">选择图片</div>
                            </div>
                            <span style="color: red;">(1920 * 690)</span>
                            <input type="hidden" id="imgurl" name="ad_img_url" value="{{$detail.ad_img_url}}">
                            {{include file='admin/upload_single.tpl'}}
                        </div>
                    </div>

                    </div>


             {{if $detail.id}}
                    <div class="content" style="margin-top: 20px;">
                        <h1>站点信息：</h1>

                        <div class="form-group" num="1">
                            <input type="hidden" name="info_1" id="info_1" value="{{$city_list[0].id}}">

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">分站点名</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="name_1" value="{{$city_list[0].city}}" placeholder="分站点名" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">站点描述</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="desc_1" value="{{$city_list[0].desc}}" placeholder="站点描述" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label input_label">图片1 </label>
                                <div class="" style="margin-left: 200px;">
                                    <div id="uploader-single">
                                        <!--用来存放item-->
                                        <div id="" class="uploader-list" style="display: inline-block">
                                                <img width="120" id="imagess_1" src="{{$city_list[0].img_url}}" />
                                        </div>
                                        <div id="dwed_1" style="display: inline-block;">选择图片</div>
                                    </div>
                                    <span style="color: red;">(971 * 591)</span>
                                    <input type="hidden" id="images_1" name="tab_img_1" value="{{$city_list[0].img_url}}">
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
                                    pick: '#dwed_1',

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
                                    $('#images_1').val(ret.url);
                                    $('#imagess_1').attr('src',ret.url);
                                });
                            </script>

                        </div>

                        <div class="form-group" num="2">
                            <input type="hidden" name="info_2" id="info_2" value="{{$city_list[1].id}}">

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">分站点名</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="name_2" value="{{$city_list[1].city}}" placeholder="分站点名" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">站点描述</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="desc_2" value="{{$city_list[1].desc}}" placeholder="站点描述" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label input_label">图片2</label>
                                <div class="" style="margin-left: 200px;">
                                    <div id="uploader-single">
                                        <!--用来存放item-->
                                        <div id="" class="uploader-list" style="display: inline-block">
                                            <img width="120" id="imagess_2" src="{{$city_list[1].img_url}}" />
                                        </div>
                                        <div id="dwed_2" style="display: inline-block;">选择图片</div>
                                    </div>
                                    <span style="color: red;">(971 * 591)</span>
                                    <input type="hidden" id="images_2" name="tab_img_2" value="{{$city_list[1].img_url}}">
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
                                    pick: '#dwed_2',

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
                                    $('#images_2').val(ret.url);
                                    $('#imagess_2').attr('src',ret.url);
                                });
                            </script>

                        </div>


                        <div class="form-group" num="3">
                            <input type="hidden" name="info_3" id="info_3" value="{{$city_list[2].id}}">

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">分站点名</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="name_3" value="{{$city_list[2].city}}" placeholder="分站点名" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group" style="border-bottom: none;">
                                <label class="control-label input_label">站点描述</label>
                                <div class="">
                                    <input type="text" class="form-control input_box"  name="desc_3" value="{{$city_list[2].desc}}" placeholder="站点描述" parsley-trigger="change">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label input_label">图片3</label>
                                <div class="" style="margin-left: 200px;">
                                    <div id="uploader-single">
                                        <!--用来存放item-->
                                        <div id="" class="uploader-list" style="display: inline-block">
                                            <img width="120" id="imagess_3" src="{{$city_list[2].img_url}}" />
                                        </div>
                                        <div id="dwed_3" style="display: inline-block;">选择图片</div>
                                    </div>
                                    <span style="color: red;">(971 * 591)</span>
                                    <input type="hidden" id="images_3" name="tab_img_3" value="{{$city_list[2].img_url}}">
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
                                    pick: '#dwed_3',

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
                                    $('#images_3').val(ret.url);
                                    $('#imagess_3').attr('src',ret.url);
                                });
                            </script>

                        </div>

                    </div>
                {{/if}}
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



                $.post("{{$_pathroot}}admin/target/save", $('#form').serialize(), function(data) {
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
            max: laydate.now(+30), //最大日期
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
            max: laydate.now(+30), //最大日期
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

