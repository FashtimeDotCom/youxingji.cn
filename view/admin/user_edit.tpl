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
        <li><a href="javascript:void(0)">用户管理</a> / </li>
        <li class="active">编辑信息</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/user/save"
                      style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                    <div class="content">
                        <h1>基本信息：</h1>
                        <input type="hidden" id="id" name="uid" value="{{$conditions.uid}}">

                        <div class="form-group">
                            <label class="control-label input_label">账号</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="username" value="{{$conditions.username}}" placeholder="账号" disabled parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">用户组</label>
                            <div class="">
                                <select name="gid" datatype="Require" msg="用户组">
                                    <option value="">请选择用户组</option>
                                    {{foreach from=$usergroups item=group key=key}}
                                    <option value="{{$key}}"{{if $conditions.gid == $key}} selected{{/if}}>{{$group.title}}</option>
                                    {{/foreach}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">姓名</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="realname" value="{{$conditions.realname}}" placeholder="姓名" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">邮箱</label>
                            <div class="">
                                <input type="email" class="form-control input_box"  name="email" value="{{$conditions.email}}" placeholder="邮箱" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">电话</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="telephone" value="{{$conditions.telephone}}" placeholder="电话" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">首页排序</label>
                            <div class="">
                                <input type="number" class="form-control input_box"  name="sort" value="{{$conditions.sort}}" placeholder="首页排序" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">后台标签</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="tag" value="{{$conditions.tag}}" placeholder="后台标签" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">注册IP</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="regIp" value="{{$conditions.regip}}" placeholder="注册IP" disabled parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">注册时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="regtime" value="{{$conditions.regtime|idate:'Y-m-d'}}" placeholder="注册时间" disabled parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">最后访问IP</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="lastip" value="{{$conditions.lastip}}" placeholder="最后访问IP" disabled parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">最后访问时间</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="lasttime" value="{{$conditions.lastvisit|idate:'Y-m-d'}}" placeholder="最后访问时间" disabled parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">推荐背景图片</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list" style="display: inline-block">
                                        {{if $conditions.bgpic}}
                                        <img width="120" src="{{$conditions.bgpic}}" />
                                        {{/if}}
                                    </div>
                                    <div id="filePicker" style="display: inline-block;">选择图片</div>
                                </div>
                                <span style="color: red;">（364*450）</span>
                                <input type="hidden" id="imgurl" name="bgpic" value="{{$conditions.bgpic}}">
                                {{include file='admin/upload_single.tpl'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">首页图</label>
                            <div class="" style="margin-left: 200px;">
                                <div id="uploader-single">
                                    <!--用来存放item-->
                                    <div id="" class="uploader-list" style="display: inline-block">
                                        <img width="120" id="imagess_1" src="{{$conditions.tjpic}}" />
                                    </div>
                                    <div id="dwed_1" style="display: inline-block;">选择图片</div>
                                </div>
                                <span style="color: red;">(210 * 430)</span>
                                <input type="hidden" id="imagess" name="tjpic" value="{{$conditions.tjpic}}">
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
                                $('#imagess').val(ret.url);
                                $('#imagess_1').attr('src',ret.url);
                            });
                        </script>


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
                $.post("{{$_pathroot}}admin/user/save", $('#form').serialize(), function(data) {
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

