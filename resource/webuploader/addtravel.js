//监控 正文内容输入框 ，包括粘贴板
function judgeIsNonNull1(obj){
	var value = $(obj).val();
	var x = event.which || event.keyCode;
	if( value.length <= 255 ){
		//console.log("符合255位数以内");
	} else{
		return $(obj).val(value.substr(0, 255));
	}
	var remain = $(obj).val().length;
	if(remain > 255){
		$(obj).val(setString($(obj).val(),255));
		$('#contentwordage').html(255-remain);
	}else{
		$('#contentwordage').html(255-remain);
	}
}
$("#describe").bind('input propertychange', function(){
	judgeIsNonNull1(this);
});



var $ = jQuery,    // just in case. Make sure it's not an other libaray.

    $wrap = $('#uploader'),

	    

	
	
    // 状态栏，包括进度和控制按钮
    $statusBar = $wrap.find('.statusBar'),

    // 文件总体选择信息。
    $info = $statusBar.find('.info'),

    // 上传按钮
    $upload = $wrap.find('.uploadBtn'),

    // 没选择文件之前的内容。
    $placeHolder = $wrap.find('.placeholder'),

    // 总体进度条
    $progress = $statusBar.find('.progress').hide(),

    // 添加的文件数量
    fileCount = 0,

    // 添加的文件总大小
    fileSize = 0,

	//系统限制上传文件的总数量
	TotalNumber = 9;
	//系统限制上传文件的总大小
	TotalSize = 200;
	//系统限制单个上传文件的大小
	SingleSize = 50;
	
    // 优化retina, 在retina下这个值是2
    ratio = window.devicePixelRatio || 1,

    // 缩略图大小
    thumbnailWidth = 110 * ratio,
    thumbnailHeight = 110 * ratio,

    // 可能有pedding, ready, uploading, confirm, done.
    state = 'pedding',

    // 所有文件的进度信息，key为file id
    percentages = {},

    supportTransition = (function(){
        var s = document.createElement('p').style,
            r = 'transition' in s ||
                  'WebkitTransition' in s ||
                  'MozTransition' in s ||
                  'msTransition' in s ||
                  'OTransition' in s;
        s = null;
        return r;
    })(),

    // WebUploader实例
    uploader;
    //给 草稿箱  进入【发布日志】  页面使用  
	if( $(".filelist").attr("data-exist") == "1" ){
		var $queue=$(".filelist1");
	}
	else{  //表示直接进入
		// 图片容器
	    var $queue = $('<ul class="filelist"></ul>').appendTo( $wrap.find('.queueList') );
	}

if ( !WebUploader.Uploader.support() ) {
    layer.msg( 'Web Uploader 不支持您的浏览器！如果你使用的是IE浏览器，请尝试升级 flash 播放器');
    throw new Error( 'WebUploader does not support the browser you are using.' );
}

// 实例化
uploader = WebUploader.create({
    pick: {
        id: '#filePicker',
        label: '点击选择图片'
    },
    dnd: '#uploader .queueList',
    paste: document.body,

    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    },

    // swf文件路径
    swf: '/webuploader/Uploader.swf',
    
    formData:{},
    
	// 是否保留头部meta信息。
	preserveHeaders: true,

    disableGlobalDnd: true,

    chunked: true, //是否要分片处理大文件上传
    server: '/index.php?m=api&c=index&v=uploadpic',
    fileNumLimit: TotalNumber,
    fileSizeLimit: TotalSize * 1024 * 1024,    // 200 M 验证文件总大小是否超出限制, 超出则不允许加入队列
    fileSingleSizeLimit: SingleSize * 1024 * 1024    // 50 M 验证单个文件大小是否超出限制, 超出则不允许加入队
});

// 添加“添加文件”的按钮，
uploader.addButton({
    id: '#filePicker2',
    label: '继续添加'
});

// 当有文件添加进来时执行，负责view的创建
function addFile( file ){
    var $li = $('<li id="' + file.id + '">' +
	                '<p class="title">' + file.name + '</p>' +
	                '<p class="imgWrap"></p>'+
	                '<p class="progress"><span></span></p>' +
                '</li>' ),

        $btns = $('<div class="file-panel">' +
	                '<span class="cancel">删除</span>' +
	                '<span class="rotateRight">向右旋转</span>' +
	                '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
        $prgress = $li.find('p.progress span'),
        $wrap = $li.find( 'p.imgWrap' ),
        $info = $('<p class="error"></p>'),

        showError = function( code ) {
            switch( code ) {
                case 'exceed_size':
                    text = '文件大小超出';
                    break;

                case 'interrupt':
                    text = '上传暂停';
                    break;

                default:
                    text = '上传失败，请重试';
                    break;
            }
            $info.text( text ).appendTo( $li );
        };

    if( file.getStatus() === 'invalid' ){
        showError( file.statusText );
    }
    else{
        // @todo lazyload
        $wrap.text( '预览中' );
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $wrap.text( '不能预览' );
                return;
            }
            var img = $('<img src="'+src+'">');
            $wrap.empty().append( img );
        }, thumbnailWidth, thumbnailHeight );

        percentages[ file.id ] = [ file.size, 0 ];
        file.rotation = 0;
    }

    file.on('statuschange', function( cur, prev ) {
        if ( prev === 'progress' ) {
            $prgress.hide().width(0);
        }
        else if ( prev === 'queued' ) {
            $li.off( 'mouseenter mouseleave' );
            $btns.remove();
        }

        // 成功
        if ( cur === 'error' || cur === 'invalid' ) {
            //console.log( file.statusText );
            showError( file.statusText );
            percentages[ file.id ][ 1 ] = 1;
        }
        else if ( cur === 'interrupt' ) {
            showError( 'interrupt' );
        }
        else if ( cur === 'queued' ) {
            percentages[ file.id ][ 1 ] = 0;
        }
        else if ( cur === 'progress' ) {
            $info.remove();
            $prgress.css('display', 'block');
        }
        else if ( cur === 'complete' ) {
            $li.append( '<span class="success"></span><input type="hidden" name="" id="Img' + file.id + '" value="" />' );
        }

        $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
    });

    $li.on( 'mouseenter', function() {
        $btns.stop().animate({height: 30});
    });

    $li.on( 'mouseleave', function() {
        $btns.stop().animate({height: 0});
    });

    $btns.on( 'click', 'span', function() {
        var index = $(this).index(),
            deg;

        switch ( index ) {
            case 0:
                uploader.removeFile( file );
                return;
            case 1:
                file.rotation += 90;
                break;
            case 2:
                file.rotation -= 90;
                break;
        }

        if ( supportTransition ) {
            deg = 'rotate(' + file.rotation + 'deg)';
            $wrap.css({
                '-webkit-transform': deg,
                '-mos-transform': deg,
                '-o-transform': deg,
                'transform': deg
            });
        }
        else{
            $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
            // use jquery animate to rotation
            // $({
            //     rotation: rotation
            // }).animate({
            //     rotation: file.rotation
            // }, {
            //     easing: 'linear',
            //     step: function( now ) {
            //         now = now * Math.PI / 180;

            //         var cos = Math.cos( now ),
            //             sin = Math.sin( now );

            //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
            //     }
            // });
        }
    });

    $li.appendTo( $queue );
}

// 负责view的销毁/删除其中的图片
function removeFile( file ) {
    var $li = $('#'+file.id);

    delete percentages[ file.id ];
    updateTotalProgress();
    $li.off().find('.file-panel').off().end().remove();
}

function updateTotalProgress() {
    var loaded = 0,
        total = 0,
        spans = $progress.children(),
        percent;

    $.each( percentages, function( k, v ){
        total += v[ 0 ];
        loaded += v[ 0 ] * v[ 1 ];
    });

    percent = total ? loaded / total : 0;

    spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
    spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
    updateStatus();
}

function updateStatus(){
    var text = '', stats;

    if ( state === 'ready' ) {
        text = '选中' + fileCount + '张图片，共' +WebUploader.formatSize( fileSize ) + '。';
    }
    else if ( state === 'confirm' ) {
        stats = uploader.getStats();
        if ( stats.uploadFailNum ) {
            text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
        }

    }
    else{
        stats = uploader.getStats();
        text = '共' + fileCount + '张（' +WebUploader.formatSize( fileSize )  +'），已上传' + stats.successNum + '张';

        if ( stats.uploadFailNum ) {
            text += '，失败' + stats.uploadFailNum + '张';
        }
    }

    $info.html( text );
}

function setState( val ){
    var file, stats;

    if( val === state ){
        return;
    }

    $upload.removeClass( 'state-' + state );
    $upload.addClass( 'state-' + val );
    state = val;

    switch ( state ) {
        case 'pedding':
            $placeHolder.removeClass( 'element-invisible' );
            $queue.parent().removeClass('filled');
            $queue.hide();
            $statusBar.addClass( 'element-invisible' );
            uploader.refresh();
            break;

        case 'ready':
            $placeHolder.addClass( 'element-invisible' );
            $( '#filePicker2' ).removeClass( 'element-invisible');
            $queue.parent().addClass('filled');
            $queue.show();
            $statusBar.removeClass('element-invisible');
            uploader.refresh();
            break;

        case 'uploading':
            $( '#filePicker2' ).addClass( 'element-invisible' );
            $progress.show();
            $upload.text( '暂停上传' );
            break;

        case 'paused':
            $progress.show();
            $upload.text( '继续上传' );
            break;

        case 'confirm':
            $progress.hide();
            $upload.text( '开始上传' ).addClass( 'disabled' );

            stats = uploader.getStats();
            if ( stats.successNum && !stats.uploadFailNum ) {
                setState( 'finish' );
                return;
            }
            break;
        case 'finish':
            stats = uploader.getStats();
            if ( stats.successNum ) {
        		layer.msg( '上传成功！' );
            } else {
                // 没有成功的图片，重设
                state = 'done';
                location.reload();
            }
            break;
    }
    updateStatus();
}

//上传过程中触发，携带上传进度
uploader.onUploadProgress = function( file, percentage ) {
    var $li = $('#'+file.id),
        $percent = $li.find('.progress span');

    $percent.css( 'width', percentage * 100 + '%' );
    percentages[ file.id ][ 1 ] = percentage;
    updateTotalProgress();
};

uploader.onUploadSuccess = function( file, response ) {
    $('#Img'+file.id).val(response.url);
};

uploader.onFileQueued = function( file ) {

    fileCount++;
    fileSize += file.size;

    if ( fileCount === 1 ) {
        $placeHolder.addClass( 'element-invisible' );
        $statusBar.show();
    }
    var Orientation = 0;
    var fileExif = file.source.source;
    var fileName = fileExif.name;
    var newFile = null;
    //图片方向角
    var rFilter = /^(image\/jpeg|image\/png|image\/jpg|image\/gif|image\/jpe)$/i; // 检查图片格式
    if (rFilter.test(file.type) && file.source.source !== undefined) {
        //console.log("旋转开始");
        EXIF.getData(file.source.source, function() {
            Orientation = EXIF.getTag(this, 'Orientation');
            if (fileExif && Orientation > 1) {
                //获取照片方向角属性，用户旋转控制
                var oReader = new FileReader();
                oReader.readAsDataURL(fileExif);

                oReader.onload = function(e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function() {
                        var expectWidth = this.naturalWidth;
                        var expectHeight = this.naturalHeight;

                        var canvas = document.createElement("canvas");
                        var ctx = canvas.getContext("2d");
                        canvas.width = expectWidth;
                        canvas.height = expectHeight;
                        ctx.drawImage(this, 0, 0, expectWidth, expectHeight);
                        var base64 = null;
                        //修复ios
                        if (navigator.userAgent.match(/iphone/i)) {
                            console.log('iphone');
                            if(Orientation != "" && Orientation != 1){
                                switch(Orientation){
                                    case 6:
                                        rotateImg(this,'left',canvas);
                                        break;
                                    case 8:
                                        rotateImg(this,'right',canvas);
                                        break;
                                    case 3:
                                        rotateImg(this,'right',canvas);//转两次
                                        rotateImg(this,'right',canvas);
                                        break;
                                }
                            }
                            base64 = canvas.toDataURL(fileExif.type, 1);
                        }
                        else if (navigator.userAgent.match(/Android/i)) {// 修复android
                            var encoder = new JPEGEncoder();
                            base64 = encoder.encode(ctx.getImageData(0, 0, expectWidth, expectHeight), 80);
                        }
                        else{
                            if(Orientation != "" && Orientation != 1){
                                switch(Orientation){
                                    case 6:
                                        rotateImg(this,'left',canvas);
                                        break;
                                    case 8:
                                        rotateImg(this,'right',canvas);
                                        break;
                                    case 3:
                                        rotateImg(this,'right',canvas);//转两次
                                        rotateImg(this,'right',canvas);
                                        break;
                                }
                            }
                            base64 = canvas.toDataURL(fileExif.type, 1);
                        }
                        var baseFile = dataURLtoFile(base64, fileName);
                        newFile = baseFile;
                        file.source.source = newFile;
                        addFile(file);
                        setState('ready');
                        updateTotalProgress();
                    };
                };
            }
            else {
                addFile( file );
                setState( 'ready' );
                updateTotalProgress();
            }
        });
    }
    else {
        addFile( file );
        setState( 'ready' );
        updateTotalProgress();
    }

    function dataURLtoFile(dataurl, filename) { //将base64转换为文件
        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename,{
            type: mime
        });
    }

    function rotateImg(img, direction,canvas) {
        //alert(img);
        //最小与最大旋转方向，图片旋转4次后回到原方向
        var min_step = 0;
        var max_step = 3;
        //var img = document.getElementById(pid);
        if (img == null)return;
        //img的高度和宽度不能在img元素隐藏后获取，否则会出错
        var height = img.height;
        var width = img.width;
        //var step = img.getAttribute('step');
        var step = 2;
        if (step == null) {
            step = min_step;
        }
        if (direction == 'right') {
            step++;
            //旋转到原位置，即超过最大值
            step > max_step && (step = min_step);
        } else {
            step--;
            step < min_step && (step = max_step);
        }
        //旋转角度以弧度值为参数
        var degree = step * 90 * Math.PI / 180;
        var ctx = canvas.getContext('2d');
        switch (step) {
            case 0:
                canvas.width = width;
                canvas.height = height;
                ctx.drawImage(img, 0, 0);
                break;
            case 1:
                canvas.width = height;
                canvas.height = width;
                ctx.rotate(degree);
                ctx.drawImage(img, 0, -height);
                break;
            case 2:
                canvas.width = width;
                canvas.height = height;
                ctx.rotate(degree);
                ctx.drawImage(img, -width, -height);
                break;
            case 3:
                canvas.width = height;
                canvas.height = width;
                ctx.rotate(degree);
                ctx.drawImage(img, -width, 0);
                break;
        }
    }

};


uploader.onFileDequeued = function( file ) {
    fileCount--;
    fileSize -= file.size;

    if ( !fileCount ) {
        setState( 'pedding' );
    }

    removeFile( file );
    updateTotalProgress();

};

uploader.on( 'all', function( type ) {
    var stats;
    switch( type ) {
        case 'uploadFinished':
            setState( 'confirm' );
            break;

        case 'startUpload':
            setState( 'uploading' );
            break;

        case 'stopUpload':
            setState( 'paused' );
            break;

    }
});

uploader.onError = function( code ){
	if( code == "Q_EXCEED_NUM_LIMIT" ){
		layer.msg( '错误提示: 上传数量可能超过'+TotalNumber+'张限制！' );
	}
	else if( code == "F_EXCEED_SIZE" ){
		layer.msg( '错误提示: 选择上传的图片中，其中单个文件大小可能超出'+SingleSize+'M限制！' );
	}
	else if( code == "Q_EXCEED_SIZE_LIMIT" ){
		layer.msg( '错误提示: 上传的全部图片，总大小可能超出'+TotalSize+'M限制！' );
	}
	else if( code == "F_DUPLICATE" ){
		layer.msg( '错误提示: 无法上传相同的图片，该图片可能已存在！' );
	}
    else{
    	layer.msg( 'Eroor: ' + code );
    }
};

$upload.on('click', function(){
    if( $(this).hasClass( 'disabled' ) ){
        return false;
    }

    if( state === 'ready' ){
        uploader.upload();
    }
    else if( state === 'paused' ){
        uploader.upload();
    }
    else if( state === 'uploading' ){
        uploader.stop();
    }
});

$info.on( 'click', '.retry', function(){
    uploader.retry();
});

$info.on( 'click', '.ignore', function(){
    layer.msg( 'todo' );
});

$upload.addClass( 'state-' + state );
updateTotalProgress();


//发布日志
$('#btnAdd').click(function(){
    var title = $('#title').val();
    var did = $('#did').val();
    var describe = $('#describe').val();
	var length = $('.state-complete').length;
    var list = [];
    for (var i = 0; i < length; i++) {
        list[i] = $('.state-complete').eq(i).find("input").val();
    }
    if(!describe){
        layer.msg('请输入描述');
        return false;
    }
    if(!list[0]){
        layer.msg('请先上传图片');
        return false;
    }
    if(!$("input[type='checkbox']").is(':checked')){
        layer.msg('请选择服务协议');
        return false;
    }
    $.post("/index.php?m=api&c=index&v=addtravel", {
        'title':title,
        'list':JSON.stringify(list),
        'did':did,
        'describe':describe
    }, function(data){
        layer.msg(data.tips);
        if (data.status == 1) {
            //window.location.href = '/index.php?m=index&c=user&v=index';
        }
    },"JSON");
});

//保存日志 草稿
$('#btnDraft').click(function(){
    var title = $('#title').val();
    var describe = $('#describe').val();
	var length = $('.state-complete').length;
    var list = [];
    for (var i = 0; i < length; i++) {
        list[i] = $('.state-complete').eq(i).find("img").attr("src");
    }
    $.post("/index.php?m=api&c=index&v=adddraft", {
        'title':title,
        'list':JSON.stringify(list),
        'type':0,
        'describe':describe
    }, function(data){
        layer.msg(data.tips);
        if (data.status == 1) {
            //window.location.href = '/index.php?m=index&c=user&v=draft';
        }
    },"JSON");
});