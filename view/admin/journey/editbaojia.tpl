{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/article/editbaojia" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">录属ID</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <select name="aid" id="aid">
                    <option value=""></option>
                    {{foreach from=$article_list item=item key=key}}
                        <option value="{{$item.id}}" {{if $article.jid==$item.id}}selected{{/if}}>{{$item.title}}</option>
                    {{/foreach}}
                </select>    
            </td>
            <td class="vtop tips2">请填写录属ID</td>
        </tr>
        <tr><td colspan="2" class="td27">最少人数</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="minperson" value="{{$article.minperson}}" type="number" class="txt" datatype="Require" msg="请填写最少人数" />
            </td>
            <td class="vtop tips2">请填写最少人数</td>
        </tr>
        <tr><td colspan="2" class="td27">单价</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="price" value="{{$article.price}}" type="number" class="txt" datatype="Require" msg="请填写单价" />
            </td>
            <td class="vtop tips2">请填写单价</td>
        </tr>
      	<tr><td colspan="2" class="td27">日期</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="addtime" value="{{$article.addtime|date_format:'%Y-%m-%d'}}" id="test1" type="text" class="txt" datatype="Require" msg="请填写日期" />
            </td>
            <td class="vtop tips2">请填写日期</td>
        </tr>
      	<tr><td colspan="2" class="td27">状态</td></tr>
      	<tr class="noborder">
        	<td class="vtop rowform">
            <input type="radio" name="text" value="正常" {{if $article.text == '正常'}}checked="checked"{{/if}}>正常
            <input type="radio" name="text" value="截止销售" {{if $article.text == '截止销售'}}checked="checked"{{/if}}>截止销售
            <input type="radio" name="text" value="候补" {{if $article.text == '候补'}}checked="checked"{{/if}}>候补
            </td>
            <td class="vtop tips2">请选择状态</td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="edit" />
      	<input type="hidden" name="id" value="{{$article.id}}" />
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
         url: "/admin/article/editgettime",
         data: {time:datas,id:{{$article.id}}},
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