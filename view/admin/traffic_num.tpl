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
    <p style="display: inline-block;padding-left: 20px;padding-top: 15px;font-size: 28px;font-weight: 200;">{{$pagetitle}}</p>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" type="reset" form="form">重置</button>
    <button class="btn btn-success btn-lg pull-right" style="margin-top: 30px;margin-right: 30px;background-color:#60C060;" id="save">保存</button>

    <br>
    <ol class="breadcrumb" style="display: inline-block;border: none;">
        <li><a href="javascript:void(0)" onclick="">首页</a> / </li>
        <li><a href="javascript:void(0)">网站设置</a> / </li>
        <li class="active">流量设置</li>
    </ol>
</div>


<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form class="form-horizontal group-border-dashed" action="{{$_pathroot}}admin/trafficnum/save"
                          style="border-radius: 0px;" id="form" name="form" enctype="multipart/form-data" method="post">

                        <input type="hidden" id="id" name="id" value="{{$detail.id}}">

                        <div class="form-group">
                            <label class="control-label input_label">访问数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="visit_num" value="{{$detail.visit_num}}" placeholder="访问数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">用户数</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="customer_num" value="{{$detail.customer_num}}" placeholder="用户数" parsley-trigger="change">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label input_label">平台动态</label>
                            <div class="">
                                <input type="number" class="form-control input_box" name="platform_num" value="{{$detail.platform_num}}" placeholder="平台动态" parsley-trigger="change">
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
                $.post("{{$_pathroot}}admin/TrafficNum/save", $('#form').serialize(), function(data) {
                    if( data.status==1 ){
                        layer.msg(data.msg,{icon:1},function () {
                            window.location.reload();
                        });
                    }else{
                        layer.msg(data.msg);
                    }
                },'json');
            }
        });



    })

    function beforeSubmit(){
        return $('#form').parsley().validate();
    }


</script>

