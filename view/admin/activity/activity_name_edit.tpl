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
                url: '/admin/ActivityVoteName/check_user',
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
        <li><a href="javascript:void(0)">投票结果</a> / </li>
        <li class="active">{{$pagetitle}}</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/activityVoteName/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">投票数</label>
                            <div class="">
                                <input type="number" class="form-control input_box"  name="vote_num" value="{{$detail.vote_num}}" placeholder="投票数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">排序</label>
                            <div class="">
                                <input type="number" class="form-control input_box"  name="sort" value="{{$detail.sort}}" placeholder="排序" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">所属大学</label>
                            <div class="">
                                <input type="text" class="form-control input_box"  name="university" value="{{$detail.university}}" placeholder="所属大学" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label input_label">用户</label>
                                <div>
                                    <select class="js-data-example-ajax" name="uid">
                                        {{if $detail.id}}
                                            <option value="{{$detail.uid}}" selected>{{$detail.username}}</option>
                                        {{/if}}
                                    </select>
                                </div>
                        </div>

                        <input type="hidden" name="vote_id" value="{{$vote_id}}">

                        <div class="form-group">
                            <label class="control-label input_label">简介</label>
                            <div>
                                <textarea name="desc" id="desc" cols="30" rows="10">{{$detail.desc}}</textarea>
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

                $.post("{{$_pathroot}}admin/activityVoteName/save", $('#form').serialize(), function(data) {
                    if(!data.error){
                        layer.msg(data.message,{icon:1},function(){
                            window.location.reload();
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

    function change(a,id){
        var c=document.getElementById(''+id+'');
        c.value=a.value;
    }


</script>

