{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/addwriter" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="name" value="" type="text" class="txt" datatype="Require" msg="请填写名称" />
            </td>
            <td class="vtop tips2">请填写名称</td>
        </tr>
      	<tr><td colspan="2" class="td27">排序</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="sort" value="0" type="text" class="txt" datatype="Require" msg="请填写排序" />
            </td>
            <td class="vtop tips2">请填写排序，默认为 0</td>
        </tr>
        <tr><td colspan="2" class="td27">简介</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <textarea style="width:500px" name="introduction" value="" type="text" class="txt" datatype="Require" msg="请填写简介"></textarea>
            </td>
            <td class="vtop tips2">请填写简介</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27"> 
            	<a href="javascript:void(0);" class="btn active">照片（145*190）</a>
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
        <tr><td colspan="2" class="td27">性别</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="radio" name="sex" value="1" {{if $article.sex == 1}}checked="checked"{{/if}} />男
                <input type="radio" name="sex" value="0" {{if $article.sex == 0}}checked="checked"{{/if}} />女
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input name="label" value="{{$article.label}}" type="text" class="txt" datatype="Require" msg="标签" />
            </td>
            <td class="vtop tips2">多个标签用<span style="color: red;">英文</span>的',' 分割</td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="add" />
    </div>
</form>
{{include file='admin/footer.tpl'}}