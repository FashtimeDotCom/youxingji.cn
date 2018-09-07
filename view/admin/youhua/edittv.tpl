{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/edittv" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="title" value="{{$article.title}}" type="text" class="txt" datatype="Require" msg="请填写标题" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>

        <tr><td colspan="2" class="td27">发布时间</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="addtime" id="test1" value="{{$article.addtime}}" type="text" class="txt" datatype="Require" msg="发布时间" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>

        <tr><td colspan="2" class="td27">描述</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px" name="describes" type="text" class="txt" datatype="Require" msg="请填写描述">{{$article.describes}}</textarea>
            </td>
            <td class="vtop tips2">请填写描述</td>
        </tr>
      	<tr><td colspan="2" class="td27">地址</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea style="width:500px;height:50px" name="url" type="text" class="txt" datatype="Require" msg="请填写地址">{{$article.url}}</textarea>
            </td>
            <td class="vtop tips2">请填写地址</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27"> 
            	<a href="javascript:void(0);" class="btn active">封面（280*210）</a>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                      	{{if $article.pics}}
                        <img width="120" src="{{$article.pics}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="pics" value="{{$article.pics}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="{{$article.id}}" />
    </div>
</form>

<script>
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
</script>

{{include file='admin/footer.tpl'}}