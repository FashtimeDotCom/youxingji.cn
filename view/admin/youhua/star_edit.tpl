{{include file="admin/header.tpl"}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
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
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">达人日志</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">达人邦</a> / </li>
        <li class="active">日志</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/youhua/star_save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">标题</label>
                            <div class="">
                                <span>{{$detail.title}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">达人</label>
                            <div class="">
                                <span>{{$detail.username}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">发布时间</label>
                            <div class="">
                                <input name="addtime" value="{{$detail.addtime}}" id="test1" type="text" class="txt" datatype="Require" msg="" />
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
                var addtime=$("input[name='addtime']").val();

                if( addtime=="" ){
                    layer.msg("发布时间不能为空!");
                    return false;
                }

                $.post("{{$_pathroot}}admin/youhua/star_save", $('#form').serialize(), function(data) {
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
            elem: '#test1',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: '2018-01-01', //设定最小日期为当前日期
            max: laydate.now(+730), //最大日期
            istime: true,
            istoday: true,
            choose: function(datas){

            }
        };
        laydate(start);

    })

    function beforeSubmit(){
        return $('#form').parsley().validate();
    }



</script>

