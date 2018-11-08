{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/jscolor/jscolor.js"></script>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
        <li class="btn btn-info" tab="detail">详细信息</li>
        <li class="btn btn-info" tab="seo">优化信息</li>
        <li class="btn btn-info" tab="other">其他信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/article/{{$_postName}}" id="cpform" onsubmit="return $.checkForm(this)" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="title" value="{{$article.title}}" type="text" class="txt" datatype="Require" msg="请填写文章标题" />
            </td>
            <td class="vtop tips2">请填写标题<span info="title"></span></td>
        </tr>
        <tr><td colspan="2" class="td27">请选择栏目</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <select name="catid" datatype="Require" msg="请选择栏目" onchange="getModule(this)">
            	<option value="">请选择栏目</option>
                {{vplist from='channel' item='channel' useable='0' channel='all'}}
                <option value="{{$channel.id}}"{{if $article.catid == $channel.id}} selected{{/if}}>{{$channel.name}}({{if $channel.type == 0}}主{{elseif $channel.type == 1}}顶{{else}}底{{/if}})</option>
                {{vplist from='channel' item='child' parentid='$channel.id'}}
                <option value="{{$child.id}}"{{if $article.catid == $child.id}} selected{{/if}}>--{{$child.name}}({{if $child.type == 0}}主{{elseif $child.type == 1}}顶{{else}}底{{/if}})</option>
                {{vplist from='channel' item='childer' parentid='$child.id'}}
                <option value="{{$childer.id}}"{{if $article.catid == $childer.id}} selected{{/if}}>----{{$childer.name}}({{if $childer.type == 0}}主{{elseif $childer.type == 1}}顶{{else}}底{{/if}})</option>
                {{/vplist}}
                {{/vplist}}
                {{/vplist}}
            </select>
            </td>
            <td class="vtop tips2">请选择栏目<span info="catid"></span></td>
        </tr>

        <tr class="noborder">
            <td class="vtop rowform">
                <select name="label_id" id="label_id">
                    <option value="">----</option>
                    {{if $label_list}}
                    {{foreach from=$label_list item=item key=key}}
                    <option value="{{$key}}" {{if $article.label_id==$key}}selected{{/if}}>{{$item}}</option>
                    {{/foreach}}
                    {{/if}}
                </select>
            </td>
            <td class="vtop tips2">请选择标签<span info="catid"></span></td>
        </tr>

        <tr class="noborder">
            <td class="vtop rowform">
                <select name="type_id" id="type_id">
                    <option value="">----</option>
                    {{if $type_list}}
                    {{foreach from=$type_list item=item key=key}}
                    <option value="{{$item.id}}" {{if $article.type_id==$item.id}}selected{{/if}}>{{$item.type_name}}</option>
                    {{/foreach}}
                    {{/if}}
                </select>
            </td>
            <td class="vtop tips2">请选择分类<span info="catid"></span></td>
        </tr>

        <tr>
        	<td colspan="2" class="td27">
            	<a href="javascript:void(0);" class="btn active">详情页，顶部大图</a>
                <span style="color: red;">尺寸 1920 * 800</span>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $article.articlepic}}
                        <img width="120" height="90" src="{{$article.articlepic}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="articlepic" name="articlepic" value="{{$article.articlepic}}">
                <input type="hidden" id="articlethumb" name="articlethumb" value="{{$article.articlethumb}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>


        <tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">上传资料</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop" colspan="2">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="softfileList" class="uploader-list">
                        {{if $article.fileurl}}
                        已上传
                        {{/if}}
                    </div>
                    <div id="softfilePicker">选择文件</div>
                </div>
                <input type="hidden" id="fileurl" name="fileurl" value="{{$article.fileurl}}">
            </td>
        </tr>
        <tr><td colspan="2" class="td27">分类信息(多个联动选填)</td></tr>
        {{$classid}}
        <tr><td colspan="2" class="td27">是否显示</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="useable" value="1" {{if $article.useable == 1}}checked="checked"{{/if}} />显示
                <input type="radio" name="useable" value="0" {{if $article.useable == 0}}checked="checked"{{/if}} />不显示
            </td>
            <td class="vtop tips2">是否显示内容</td>
        </tr>
        <tr><td colspan="2" class="td27">浏览权限</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input type="radio" name="isview" value="1" {{if $article.isview == '1'}}checked="checked"{{/if}} /> 注册访问
            <input type="radio" name="isview" value="0" {{if $article.isview == '0'}}checked="checked"{{/if}} /> 开放访问
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tbody id="extends">
        {{foreach from=$extends item=extend}}
        <tr><td colspan="2" class="td27">{{$extend.comment}}</td></tr>
        <tr class="noborder">
            <td class="vtop rowform" colspan="2">
            {{if $extend.type == 'int' || $extend.type == 'tinyint' || $extend.type == 'char'}}
            <input name="{{$extend.field}}" value="{{$extend.value}}" type="text" class="txt"  />
            {{elseif $extend.type == 'varchar'}}
            <textarea rows="20" name="{{$extend.field}}">{{$extend.value}}</textarea>
            {{elseif $extend.type == 'text'}}
            {{$extend.value}} 
            {{elseif $extend.type == 'picture'}}
            <div id="uploader-single">
                <div id="fileList{{$extend.field}}" class="uploader-list">
                    <img width="120" height="90" src="{{$extend.value}}" />
                </div>
                <div id="filePicker{{$extend.field}}">选择图片</div>
                <input type="hidden" id="{{$extend.field}}" name="{{$extend.field}}" value="{{$extend.value}}">
            </div>
            <script type="text/javascript">
                var picdom{{$extend.field}} = '{{$extend.field}}';
                $list{{$extend.field}} = $('#fileList{{$extend.field}}');
                var singleuploader{{$extend.field}} = WebUploader.create({

                    // 选完文件后，是否自动上传。
                    auto: true,

                    // swf文件路径
                    swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                    // 文件接收服务端。
                    server: SITE_URL + 'admin/ajax/pic',

                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                    pick: '#filePicker{{$extend.field}}',

                    // 只允许选择图片文件。
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    },
                    fileNumLimit: 1,
                    compress: false
                });
                singleuploader{{$extend.field}}.on( 'fileQueued', function( file ) {
                    var $li{{$extend.field}} = $(
                            '<div id="' + file.id + '" class="file-item thumbnail">' +
                                '<img>' +
                                '<div class="info">' + file.name + '</div>' +
                            '</div>'
                            ),
                        $img{{$extend.field}} = $li{{$extend.field}}.find('img');


                    // $list为容器jQuery实例
                    $list{{$extend.field}}.html( $li{{$extend.field}} );

                    // 创建缩略图
                    // 如果为非图片文件，可以不用调用此方法。
                    // thumbnailWidth x thumbnailHeight 为 100 x 100
                    singleuploader{{$extend.field}}.makeThumb( file, function( error, src ) {
                        if ( error ) {
                            $img{{$extend.field}}.replaceWith('<span>不能预览</span>');
                            return;
                        }

                        $img{{$extend.field}}.attr( 'src', src );
                    }, 120, 90 );
                });
                singleuploader{{$extend.field}}.on( 'uploadProgress', function( file, percentage ) {
                    var $li{{$extend.field}} = $( '#'+file.id ),
                        $percent{{$extend.field}} = $li{{$extend.field}}.find('.progress span');

                    // 避免重复创建
                    if ( !$percent{{$extend.field}}.length ) {
                        $percent{{$extend.field}} = $('<p class="progress"><span></span></p>')
                                .appendTo( $li{{$extend.field}} )
                                .find('span');
                    }

                    $percent{{$extend.field}}.css( 'width', percentage * 100 + '%' );
                });

                // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                singleuploader{{$extend.field}}.on( 'uploadSuccess', function( file, ret ) {
                    $('#' + picdom{{$extend.field}}).val(ret.url);
                    $( '#'+file.id ).addClass('upload-state-done');
                });

                // 文件上传失败，显示上传出错。
                singleuploader{{$extend.field}}.on( 'uploadError', function( file ) {
                    var $li{{$extend.field}} = $( '#'+file.id ),
                        $error{{$extend.field}} = $li{{$extend.field}}.find('div.error');

                    // 避免重复创建
                    if ( !$error{{$extend.field}}.length ) {
                        $error{{$extend.field}} = $('<div class="error"></div>').appendTo( $li{{$extend.field}} );
                    }

                    $error{{$extend.field}}.text('上传失败');
                });

                // 完成上传完了，成功或者失败，先删除进度条。
                singleuploader{{$extend.field}}.on( 'uploadComplete', function( file ) {
                    $( '#'+file.id ).find('.progress').remove();
                });
            </script>
            {{else}}
            {{/if}}
            </td>
        </tr>
        {{/foreach}}
        </tbody>
        <tr>
            <td colspan="2" class="td27" id="uptab">
                <a href="javascript:void(0);" class="btn active">上传图片集</a>
                <a href="javascript:void(0);" class="btn">管理图片集</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop" colspan="2">
                {{$swfupload}}
                {{include file='admin/upload.tpl'}}
            </td>
        </tr>
    </table>

    <!--详细信息-->
    <table class="mtb mtb-hide" id="detail-table">
        <tr><td colspan="2" class="td27">详细内容</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform line-normal" colspan="2">
            {{$content}}
            </td>
        </tr>
    </table>

    <!--优化信息-->
    <table class="mtb mtb-hide" id="seo-table">
        <tr><td colspan="2" class="td27">tagword</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="tagword" value="{{$article.tagword}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写tagword,用","隔开</td>
        </tr>
        <tr><td colspan="2" class="td27">seotitle</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="seotitle" value="{{$article.seotitle}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写seotitle</td>
        </tr>
        <tr><td colspan="2" class="td27">Keywords</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="keywords" value="{{$article.keywords}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写Keywords</td>
        </tr>
        <tr><td colspan="2" class="td27">Description</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
                <textarea name="description" id="" cols="30" rows="10">{{$article.description}}</textarea>
            </td>
            <td class="vtop tips2">请填写Description</td>
        </tr>
    </table>

    <!--信息-->
    <table class="mtb mtb-hide" id="other-table">
        <tr><td colspan="2" class="td27">浏览数</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="shownum" value="{{$article.shownum}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写浏览数</td>
        </tr>
        <tr><td colspan="2" class="td27">评论数</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="feednum" value="{{$article.feednum}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写评论数</td>
        </tr>
        <tr><td colspan="2" class="td27">推荐数</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="bestnum" value="{{$article.bestnum}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写推荐数</td>
        </tr>
        <tr><td colspan="2" class="td27">排序</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="sort" value="{{$article.sort}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写排序</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$article.id}}" />
        <input type="hidden" name="moduleid" id="moduleid" value="{{$article.moduleid}}" />
        <!-- <input type="submit" class="btn btn-success" name="vpbtn" value="点击提交" /> -->
    </div>
</form>
{{include file='admin/footer.tpl'}}
<script type="text/javascript">
function getModule(obj){
    $.getJSON(SITE_URL + 'admin/article/module/id/' + $(obj).val() + '/aid/{{$article.id}}', {}, function(json){
        $('#moduleid').val(json.moduleid);
        $('#extends').html(json.html);
    });
}

function getSonClass(obj, objid){
    var parentid = $(obj).val();
    if(!parentid) return;
    $.getJSON(SITE_URL + 'admin/article/category/pid/' + parentid, {}, function(json){
        var html = '<select name="classid[]"><option value="">请选择</option>';
        for(var i in json){
            html += '<option value="' + json[i].id + '">' + json[i].catname + '</option>'
        }
        html += '</select>';
        $('#sonclass' + objid).html(html);
    });
}

function autoSaveData(){
    var data = $('#cpform').serialize();
    $.post(SITE_URL + 'admin/article/autosave', {data: data}, function(){});
}
{{if $_postName == 'add'}}
var autotimer = setInterval('autoSaveData()', 10000);
{{/if}}
$softlist = $('#softfileList');
var softuploader = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: SITE_URL + 'resource/webuploader/Uploader.swf',

    // 文件接收服务端。
    server: SITE_URL + 'admin/article/softupload',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#softfilePicker',

    // 只允许选择图片文件。
    accept: {
        title: 'file',
        extensions: 'doc,docx,pdf,ppt',
        mimeTypes: '.doc,.docx,.pdf,.ppt'
    },
    fileNumLimit: 1
});
softuploader.on( 'fileQueued', function( file ) {
    var $li = $(
            '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '<div class="info">' + file.name + '</div>' +
            '</div>'
            ),
        $img = $li.find('img');


    // $list为容器jQuery实例
    $softlist.html( $li );
});
softuploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<p class="progress"><span></span></p>')
                .appendTo( $li )
                .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
});

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
softuploader.on( 'uploadSuccess', function( file, ret ) {
    $('#fileurl').val(ret.url);
    $( '#'+file.id ).addClass('upload-state-done');
});

// 文件上传失败，显示上传出错。
softuploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }

    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
softuploader.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
});
</script>