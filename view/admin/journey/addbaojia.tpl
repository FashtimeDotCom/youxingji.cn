{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/article/addbaojia" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">录属ID</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="aid" value="" type="number" class="txt" datatype="Require" msg="请填写录属ID" />
            </td>
            <td class="vtop tips2">请填写录属ID</td>
        </tr>
        <tr><td colspan="2" class="td27">最少人数</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="minperson" value="1" type="number" class="txt" datatype="Require" msg="请填写最少人数" />
            </td>
            <td class="vtop tips2">请填写最少人数</td>
        </tr>
        <tr><td colspan="2" class="td27">单价</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="price" value="" type="number" class="txt" datatype="Require" msg="请填写单价" />
            </td>
            <td class="vtop tips2">请填写单价</td>
        </tr>
      	<tr><td colspan="2" class="td27">日期</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="addtime" value="" id="test1" type="text" class="txt" datatype="Require" msg="请填写日期" />
            </td>
            <td class="vtop tips2">请填写日期</td>
        </tr>
      	<tr><td colspan="2" class="td27">状态</td></tr>
      	<tr class="noborder">
        	<td class="vtop rowform">
            <input type="radio" name="text" value="正常" checked="checked">正常
            <input type="radio" name="text" value="截止销售">截止销售
            <input type="radio" name="text" value="候补">候补
            </td>
            <td class="vtop tips2">请选择状态</td>
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
  max: '2020-06-16', //最大日期
  istime: false,
  istoday: false,
  choose: function(datas){
     $.ajax({
         type: "GET",
         url: "/admin/article/gettime",
         data: {time:datas},
         dataType: "json",
         success: function(data){
            if(data){
                alert(datas + '已经添加过');
                $('#test1').val('')
            }
        }
     });
  }
};

laydate(start);
</script>