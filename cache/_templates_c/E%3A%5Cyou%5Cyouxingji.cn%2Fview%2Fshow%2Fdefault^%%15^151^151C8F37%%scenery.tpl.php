<?php /* vpcvcms compiled created on 2018-07-17 10:23:51
         compiled from index/scenery.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>游画_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_keywords ','group' => 'site ','default' => "首页 "), $this);?>
" />
    <meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => ' index_description ','group' => 'site ','default' => "首页 "), $this);?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/resource/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/resource/css/media1280.css"  media="screen and (min-width: 1200px) and (max-width: 1299px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1366.css"  media="screen and (min-width: 1300px) and (max-width: 1399px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1440.css"  media="screen and (min-width: 1400px) and (max-width: 1499px)">
	<link rel="stylesheet" type="text/css" href="/resource/css/media1680.css"  media="screen and (min-width: 1500px) and (max-width: 1699px)">
     <script src="/resource/js/pc_rem.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
   <style type="text/css">
   	 .ccc {
   	 	font-size:0.35rem;
		color:rgba(102,102,102,1);
		line-height:0.45rem !important;
   	 }
   	 #price {
   	 	color:#F52A2A ;
   	 }
   	 #price span {
   	 	color: #333;
   	 }
   </style>
    

</head>

<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main">
    <?php $_from = C::T('ad')->getList(array('tagname' => 'scenerylide'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
    <div class="ban s2" style="background-image: url(<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
);"></div>
    <?php endforeach; endif; unset($_from); ?>
    <div class="cur">
        <div class="wp">
            <a href="">首页</a> &gt; <span>游画</span>
        </div>
    </div>
    <div class="row-g3">
        <div class="wp">
            <div class="title">
                名家作品区
                <a href="/index.php?m=index&c=index&v=writerlist">
                    <span>更多</span>
                </a>
            </div>
            <i></i>
            <ul class="ul-list3-hlg">
                <?php $_from = $this->_tpl_vars['writer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vo']):
?>
                <li>
                    <div class="con">
                        <div class="top">
                            <div class="hot">
                                <a href="/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="" />
                                </a>
                            </div>
                            <div class="txt">
                                <span onclick="href('/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['vo']['id']; ?>
')"><?php echo $this->_tpl_vars['vo']['name']; ?>
</span>，<?php echo $this->_tpl_vars['vo']['introduction']; ?>

                            </div>
                        </div>
                        <dl>
                            <dt><h3 class="g-tit1-qm">作品</h3></dt>
                            <dd>
                                <?php $_from = $this->_tpl_vars['vo']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                <div class="pic">
                                    <a class="js-pop1" href="javascript:void(0)"><img class="youhua" data-title="<?php echo $this->_tpl_vars['v']['title']; ?>
" data-price="<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?>" data-name="<?php echo $this->_tpl_vars['vo']['name']; ?>
"data-price="<?php echo $this->_tpl_vars['v']['price']; ?>
" data-size="<?php echo $this->_tpl_vars['v']['size']; ?>
" data-place="<?php echo $this->_tpl_vars['v']['place']; ?>
" data-src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" data-from="<?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?>" alt="" /></a>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </dd>
                        </dl>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>

        </div>
    </div>
    <div class="row-a4 m-txt2-hlg">
        <div class="wp">
            <div class="title">
                热门作品区
                <a href="/index.php?m=index&c=index&v=hotscenery">
                    <span>更多</span>
                </a>
            </div>
            <i></i>
            <!-- <h3 class="m-tit1"><i></i></h3>-->
            <ul class="ul-txt2 ul-list4-hlg">
                <?php $_from = $this->_tpl_vars['scenery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                <li>
                    <a href="javascript:;" class="js-pop1">
                        <div class="pic"><img class="youhua" data-title="<?php echo $this->_tpl_vars['v']['title']; ?>
" data-name="<?php echo $this->_tpl_vars['v']['name']; ?>
"  data-size="<?php echo $this->_tpl_vars['v']['size']; ?>
" data-price="<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?>" data-place="<?php echo $this->_tpl_vars['v']['place']; ?>
" data-src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" data-from="<?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?>" alt=""></div>
                        <div class="txt">
                            <p><span>作品：</span><?php echo $this->_tpl_vars['v']['title']; ?>
 <span class="red">价格：<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?></span></p>
                            <p onclick="href('/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['v']['wid']; ?>
')"><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p>
                            <p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p>
                            <p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>
                            <p><span>来源：</span> <?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?></p>
                            <div class="num">
								<div class="hideed ">收藏</div>
								<div class="spot zan" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['v']['top_num']; ?>
" id="zan<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['top_num']; ?>
</div>
								<div class="Read two"><?php echo $this->_tpl_vars['v']['show_num']; ?>
</div>
							</div>
							
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
    <div class="row-g3">
        <div class="wp">
            <div class="title">
                海外作品区
                <a href="/index.php?m=index&c=index&v=foreign_list">
                    <span>更多</span>
                </a>
            </div>
            <i></i>
            <ul class="ul-txt2 ul-list4-hlg">
                <?php $_from = $this->_tpl_vars['f_scenery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                <li>
                    <a href="javascript:;" class="js-pop1">
                        <div class="pic"><img class="youhua" data-title="<?php echo $this->_tpl_vars['v']['title']; ?>
" data-name="<?php echo $this->_tpl_vars['v']['name']; ?>
" data-size="<?php echo $this->_tpl_vars['v']['size']; ?>
" data-price="<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?>" data-place="<?php echo $this->_tpl_vars['v']['place']; ?>
" data-src="<?php echo $this->_tpl_vars['v']['pics']; ?>
" src="<?php echo $this->_tpl_vars['v']['thumbpic']; ?>
" data-from="<?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?>" alt=""></div>
                        <div class="txt">
                            <p><span>作品：</span><?php echo $this->_tpl_vars['v']['title']; ?>
 <span class="red">价格：<?php if ($this->_tpl_vars['v']['price'] == 0): ?>议价<?php else: ?>￥<?php echo $this->_tpl_vars['v']['price']; ?>
<?php endif; ?></span></p>
                            <p onclick="href('/index.php?m=index&c=index&v=writer&id=<?php echo $this->_tpl_vars['v']['wid']; ?>
')"><span>作者：</span> <?php echo $this->_tpl_vars['v']['name']; ?>
</p>
                            <p><span>尺寸：</span> <?php echo $this->_tpl_vars['v']['size']; ?>
</p>
                            <p><span>写生地点：</span> <?php echo $this->_tpl_vars['v']['place']; ?>
</p>
                            <p><span>来源：</span> <?php if ($this->_tpl_vars['v']['from']): ?><?php echo $this->_tpl_vars['v']['from']; ?>
<?php else: ?>游行迹旅行网<?php endif; ?></p>
                            <div class="num">
								<div class="hideed ">收藏</div>
								<div class="spot zan" data-id="<?php echo $this->_tpl_vars['v']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['v']['top_num']; ?>
" id="zan<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['top_num']; ?>
</div>
								<div class="Read two"><?php echo $this->_tpl_vars['v']['show_num']; ?>
</div>
							</div>
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>

    <?php if ($this->_tpl_vars['sketch_list']): ?>

    <div class="row-g3">
        <div class="wp">
            <div class="title">
                名师带你去写生
            </div>
            <i style="margin-bottom: .75rem;"></i>
            <ul class="items">
                    <?php $_from = $this->_tpl_vars['sketch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>

                <li>
                    <div class="item">
                        <a target="_blank" href="index.php?m=index&c=index&v=sketch_detail&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" >
                            <div class="item_left">
                                <img src="<?php echo $this->_tpl_vars['item']['thumbfile']; ?>
" class=" img">
                            </div>
                            <div class="item_right">
                                <div class="content">
                                    <div class="product_name">
                                        <h3><?php echo $this->_tpl_vars['item']['title']; ?>
</h3>
                                        <div><?php echo $this->_tpl_vars['item']['desc']; ?>
</div>
                                        <div class="Country">越南</em>
                                        <div class="masterinfo">
                                            <div class="headpic">
                                                <img src="<?php echo $this->_tpl_vars['item']['pics']; ?>
">
                                            </div>
                                            <div class="mastertag">
                                                <div class="mastername">
                                                    名师—<?php echo $this->_tpl_vars['item']['name']; ?>

                                                </div>
                                                <ul class="tag">
                                                    <?php $_from = $this->_tpl_vars['item']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                                                        <li><?php echo $this->_tpl_vars['v']; ?>
</li>
                                                    <?php endforeach; endif; unset($_from); ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <p class="explain">
                                            <?php echo $this->_tpl_vars['item']['introduction']; ?>

                                        </p>
                                    </div>
                                </div>
                        </a>
                    </div>
                </li>

                    <?php endforeach; endif; unset($_from); ?>


            </ul>
        </div>
    </div>
 <?php endif; ?>

    <!-- 弹窗 -->
    <div class="m-pop1-hlg pop-pic" id="m-pop1-hlg2">
        <div class="con">
            <div class="pic">
                <img id="wpics" src="" alt="" />
            </div>
            <div class="txt">
                <p id="wtitle"></p>
                <p id="wuser"></p>
                <p id="wsize"></p>
                <p id="wplace"></p>
                <p id="price"></p>
                <p><span>购买热线：</span>4009-657-018</p>
                <p id="from"></p>
                <p class="ccc">购买画作，暂不提供在线支付，如有需要请拔打购买热线。</p>
            </div>
        </div>
        <div class="close"></div>
    </div>
    <!-- end -->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript">
    $('.youhua').click(function(event) {
        /* Act on the event */
        var src = $(this).attr('data-src');
        var title = $(this).attr('data-title');
        var name = $(this).attr('data-name');
        var size = $(this).attr('data-size');
        var place = $(this).attr('data-place');
        var price = $(this).data('price');
        var from=$(this).data("from");
        $('#price').html("<span>价格：</span> " + price);
        $('#wpics').attr('src', src);
        $('#wtitle').html("<span>作品：</span> " + title);
        $('#wuser').html("<span>作者：</span> " + name);
        $('#wsize').html("<span>尺寸：</span> " + size);
        $('#wplace').html("<span>写生地点：</span> " + place);
        $('#from').html("<span>来源：</span> " + from);
        $('#m-pop1-hlg2').fadeIn();
    });
//  $(".txt .num div").click(function () {
//              $(this).toggleClass('two');                
//          })
	
    $('#m-pop1-hlg2 .close').click(function(event) {
        /* Act on the event */
        $(this).parent('.m-pop1-hlg').fadeOut();
    });
    $(".num .hideed").click(function() {
		layer.msg('功能正在开发，敬请期待');
	})
    $('.zan').click(function(event) {
		var id = $(this).attr('data-id');
		var num = parseInt($(this).attr('data-num'));
		var obj = $(this);
		$.post("/index.php?m=api&c=index&v=zan_scenery", {
			'id': id
		}, function(data) {
			if(data.status == 1) {
				$('#zan' + id).html((num + 1));
				$('#zan' + id).addClass("two");
				layer.msg(data.tips);
			} else if(data.status == 2) {
				$('#zan' + id).addClass("two");
				layer.msg(data.tips);
			} else {
				layer.msg(data.tips);
			}
		}, "JSON");

	});
</script>
</body>

</html>