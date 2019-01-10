{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/ryt/add" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="title" value="" type="text" class="txt" datatype="Require" msg="请填写名称" />
            </td>
            <td class="vtop tips2">请填写名称</td>
        </tr>
      	<tr><td colspan="2" class="td27">关键字</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="keyword" value="" type="text" class="txt" datatype="Require" msg="请填写关键字" />
            </td>
            <td class="vtop tips2">请填写关键字</td>
        </tr>
        <tr><td colspan="2" class="td27">发布时间（一天一篇,<span style="color: red;">不设置默认为立即发布</span>）</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="show_time" value="" id="test1" type="text" class="txt" datatype="Require" msg="请选择发布时间" />
            </td>
            <td class="vtop tips2">请选择发布时间</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27">
            	<a href="javascript:void(0);" class="btn active">封面（168*120）</a>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="pics" value="">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">用户</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="username" value="" type="text" class="txt" datatype="Require" msg="请填写发布人名称" />
            </td>
            <td class="vtop tips2">请填写发布人名称</td>
        </tr>

        <tr class="noborder">
            <td class="vtop">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <img width="" height="" src="" id="imagess" style="max-width: 120px" />
                </div>
                <input type="hidden" id="images" name="top_pic" value="">
                <a id="dwed">选择图片</a><span style="color: red;">大图(尺寸1920X500)</span>
            </td>
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
        </tr>

        <tr><td colspan="2" class="td27">内容</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
            {{$content}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">首页推荐显示内容</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
            {{$homecontent}}
            </td>
        </tr>

        <tr><td colspan="2" class="td27">阅读数</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="shownum" value="{{$article.shownum}}" type="number" class="txt" datatype="Require" msg="请填写阅读数" />
            </td>
            <td class="vtop tips2">请填写阅读数</td>
        </tr>

        <tr><td colspan="2" class="td27">点赞数</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="zannum" value="{{$article.zannum}}" type="number" class="txt" datatype="Require" msg="请填写点赞数" />
            </td>
            <td class="vtop tips2">请填写点赞数</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="address" value="{{$article.address}}" type="text" class="txt" datatype="Require" msg="地址" />
            </td>
            <td class="vtop tips2">地址</td>
        </tr>


    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}
<script type="text/javascript">

var start = {
  elem: '#test1',
  format: 'YYYY-MM-DD hh:mm:ss',
  min: laydate.now(), //设定最小日期为当前日期
  max: laydate.now(+7), //最大日期
  istime: true,
  istoday: true,
  choose: function(datas){
     $.ajax({
         type: "GET",
         url: "/admin/ryt/gettime",
         data: {time:datas},
         dataType: "json",
         success: function(data){
            if(data){
                alert(datas + '已经发布过日阅潭');
                $('#test1').val('')
            }
        }
     });
  }
};

laydate(start);
</script>