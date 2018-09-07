{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/youhua/edittourism" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="title" value="{{$article.title}}" type="text" class="txt" datatype="Require" msg="请填写标题" />
            </td>
            <td class="vtop tips2">请填写标题</td>
        </tr>
        <tr><td colspan="2" class="td27">关键字</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="keyword" value="{{$article.keyword}}" type="text" class="txt" datatype="Require" msg="请填写关键字" />
            </td>
            <td class="vtop tips2">请填写关键字</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27"> 
            	<a href="javascript:void(0);" class="btn active">封面（260*180）</a>
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
{{include file='admin/footer.tpl'}}