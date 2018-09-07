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
        <tr><td colspan="2" class="td27">发布时间（一天一篇）</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="addtime" value="" id="test1" type="text" class="txt" datatype="Require" msg="请选择发布时间" />
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



    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}
<script type="text/javascript">

var start = {
  elem: '#test1',
  format: 'YYYY-MM-DD',
  min: '2000-06-16', //设定最小日期为当前日期
  max: laydate.now(), //最大日期
  istime: false,
  istoday: false,
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