<?php /* vpcvcms compiled created on 2018-12-26 17:16:21
         compiled from index/journey.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->_tpl_vars['journey']['seotitle']; ?>
_甄选之旅_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "广州游行迹新媒体科技有限公司"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['journey']['keywords']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['journey']['description']; ?>
" />
    <link rel="stylesheet" href="/resource/css/module.css" />
    <link rel="stylesheet" href="/resource/css/module-less.css" />
    <link rel="stylesheet" href="/resource/css/style.css" />
    <script src="/resource/js/jquery.min.js"></script>
    <script src="/resource/js/lib.js"></script>
    <style type="text/css">
    	.fix{*zoom:1;}
		.fix:after{display:block; content:"clear"; height:0; clear:both; overflow:hidden; visibility:hidden;}
    	.m-reserve .inp{font-size: 18px;}
    	.m-reserve .inp2{width: 200px; }
		.m-reserve input.inp2::-webkit-outer-spin-button,
		.m-reserve input.inp2::-webkit-inner-spin-button{
   									-webkit-appearance: none !important;}
		.m-reserve input.inp2[type="number"]{-moz-appearance:textfield;}
		
		.m-reserve .col-r{width: 636px;margin-right: 60px;}
		#btnBook{display: block;margin-top: 14px;width: 80px; margin-left: 35px;}
		#detail_adultNum{display:inline;}
		#detail_adultNum .cm-num-adjust{margin-right: 25px;}
		#detail_childNum{display:inline;position:relative;}
		.service_book{text-align: center;}
		
		.mask_layer{position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; background: rgb(0, 0, 0); z-index: 999; opacity: 0.5; display: none;}
		.popBoxOrderContain{display: none;z-index: 9999;}
		.popBoxOrderContain .detailPopOrderSection li{position: relative;}
    </style>
</head>
<body>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="main">
        <div class=""><img style="width: 100%;" src="<?php echo $this->_tpl_vars['journey']['articlepic']; ?>
"/></div>
        <div class="cur">
            <div class="wp">
                <a href="">首页</a> &gt; <a href="/index.php?m=index&c=index&v=journey">甄选之旅</a> &gt; <span><?php echo $this->_tpl_vars['journey']['title']; ?>
</span>
            </div>
        </div>
        <div class="wp">
            <div class="box-prod">
                <div class="col-l">
                    <div class="m-pic2">
                        <div class="slider-for">
                            <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                            <div class="item"><img src="<?php echo $this->_tpl_vars['vo']['imgurl']; ?>
" alt=""></div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        <div class="slider-nav">
                            <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                            <div class="item"><img src="<?php echo $this->_tpl_vars['vo']['imgurl']; ?>
" alt=""></div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    </div>
                </div>
                <div class="col-r">
                    <div class="m-txt1">
                        <h4><?php echo $this->_tpl_vars['journey']['title']; ?>
</h4>
                        <div class="info">
                            <div class="price">￥<?php echo $this->_tpl_vars['journey']['extend']['price']; ?>
元/位
                          		<button type="button" class="calendar book_btn" id="btnBook">预定</button>
                          	</div>
                            <div class="txt">
                                <p>
                                    <span class="s1"><img src="/resource/images/pic030.png" alt="">旅行天数：<?php echo $this->_tpl_vars['journey']['extend']['lxts']; ?>
天</span>
                                    <span class="s2"><img src="/resource/images/pic031.png" alt="">出发城市：<?php echo $this->_tpl_vars['journey']['extend']['cfcs']; ?>
</span>
                                </p>
                                <p>
                                    <span class="s1"><img src="/resource/images/pic032.png" alt="">最佳季节：<?php echo $this->_tpl_vars['journey']['extend']['zjjj']; ?>
</span>
                                    <span class="s2"><img src="/resource/images/pic033.png" alt="">旅行主题：<?php echo $this->_tpl_vars['journey']['extend']['lxzt']; ?>
</span>
                                </p>
                            </div>
                        </div>
                        <div class="det">
                            <h5>线路亮点</h5>
                            <?php echo $this->_tpl_vars['journey']['content']; ?>

                        </div>
                    </div>
                </div>
            </div>
            <ul class="ul-txt3">
                <li class="on">特色体验</li>
            </ul>
            <ul class="ul-txt4">
                <?php $_from = $this->_tpl_vars['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <li><div class="pic"><img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt=""></div>
                    <div class="txt">
                        <h4><?php echo $this->_tpl_vars['vo']['title']; ?>
：</h4>
                        <p><?php echo $this->_tpl_vars['vo']['introduction']; ?>
</p>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <ul class="ul-txt3"><li class="on">详细行程</li></ul>
            <ul class="ul-txt5">
                <?php $_from = $this->_tpl_vars['trip']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <li class="<?php if ($this->_tpl_vars['k'] == 0): ?>on<?php endif; ?> <?php if ($this->_tpl_vars['count'] - $this->_tpl_vars['k'] == 1): ?>last<?php endif; ?>">
                    <h4><span>D<?php echo $this->_tpl_vars['vo']['days']; ?>
</span><?php echo $this->_tpl_vars['vo']['title']; ?>
</h4>
                    <?php echo $this->_tpl_vars['vo']['introduction']; ?>

                    <dl class="dl-pic2">
                        <?php $_from = $this->_tpl_vars['vo']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                        <dd>
                            <div class="con">
                                <div class="pic">
                                    <img src="<?php echo $this->_tpl_vars['v']['imgurl']; ?>
" alt="">
                                </div>
                                <div class="bg"></div>
                                <p><?php echo $this->_tpl_vars['v']['title']; ?>
</p>
                            </div>
                        </dd>
                        <?php endforeach; endif; unset($_from); ?>
                    </dl>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <ul class="ul-txt3 TAB_CLICK" id=".tabshow1">
                <li class="on">费用包含</li>
                <li>费用不包含</li>
                <li>温馨提示</li>
                <li>签证说明</li>
              	<li>签约方式</li>
            </ul>
            <div class="tabshow1">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">费用包含</h3>
                <?php echo $this->_tpl_vars['journey']['extend']['fybh']; ?>

            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">费用不包含</h3>
                <?php echo $this->_tpl_vars['journey']['extend']['fybbh']; ?>

            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">温馨提示</h3>
                <?php echo $this->_tpl_vars['journey']['extend']['htsm']; ?>

            </div>
            <div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">签证说明</h3>
                <?php echo $this->_tpl_vars['journey']['extend']['qzsm']; ?>

            </div>
          	<div class="tabshow1 dn">
                <h3 class="m-tit2"><img src="/resource/images/pic041.png" alt="">签约方式</h3>
                <?php echo $this->_tpl_vars['journey']['extend']['qyfs']; ?>

            </div>
        </div>
        <div class="m-reserve" style="background-image:url(/resource/images/bg07.jpg);">
            <div class="wp fix">
                <div class="col-l">
                    <h4>咨询热线</h4>
                    <div class="tel"><img src="/resource/images/pic050.png" alt="">4009-657-018</div>
                </div>
                <div class="col-r">
                    <h4>预约报名</h4>
                    <div class="form-group">
                      <input class="inp inp1" type="text" id="realname" placeholder="姓名">
                      <input class="inp inp2" type="number" id="telephone" placeholder="手机号码">
                      <input class="inp inp3" type="text" id="email" placeholder="出发点">
                    </div>
                    <div class="form-group"><textarea id="messages"></textarea></div>
                    <input class="sub postLeave" type="submit" value="提交">
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	<div class="mask_layer" id="mask_wrap"></div>
  	<div id="all-date" class="pop_box pop_box_self popBoxOrderContain">
        <a id="dateClose" class="close" href="javascript:;">×</a>
        <div class="headline">选择出发日期与人数</div>
        <div id="pop-cal" class="calendar_box">
            <table>
	            <caption>
	            	<a href="javascript:;" class="pre">&lt;</a><a href="javascript:;" class="next">&gt;</a><span class="cal-title">2013年7月</span>
	            </caption>
	            <thead>
		            <tr><th class="weekend"> 日 </th>
		                <th> 一 </th>
		                <th> 二 </th>
		                <th> 三 </th>
		                <th> 四 </th>
		                <th> 五 </th>
		                <th class="weekend">六</th>
		            </tr>
	            </thead>
	            <tbody></tbody>
            </table>
        </div>
        <div class="detailPopOrderSection">
            <div class="detailPopOrderRow" id="detailPop">
                <span class="detailPopOrderRowTitle">出行人数</span>
                <div id="detail_adultNum">成人：
                    <div class="cm-num-adjust">
                        <span class="cm-adjust-minus js_num_minus1">-</span>
                        <span class="cm-adjust-view js_cur_num1">2</span>
                        <span class="cm-adjust-plus js_num_plus1">+</span>
                    </div>
                </div>
                <div id="detail_childNum">儿童：
                    <div class="cm-num-adjust">
                        <span class="cm-adjust-minus js_num_minus2">-</span>
                        <span class="cm-adjust-view js_cur_num2">0</span>
                        <span class="cm-adjust-plus js_num_plus2">+</span>
                    </div>（2-12周岁）
                  	<span class="detailChildNumExceedWarning" style="display: none;">航空公司规定一个成人最多只可携带2名儿童.</span>
                </div>
            </div>
          	<div class="detailPopOrderRow service_book">
          		<li><span>您的姓名：</span><input type="text" value="" id="ContactName"></li>
              	<li><span>手机号码：</span><input type="text" value="" id="ContactPhone"></li>
              	<li><span>出发地点：</span><input type="text" value="" id="ContactEmail"></li>
              	<div style="text-align: center;">
                  	<button type="button" class="calendar book_btn" id="btnSubPre">上一步</button>
                  	<button type="button" class="calendar book_btn" id="btnSubBook">提交</button>
                </div>
          	</div>
            <div class="detailPopOrderRow" style="text-align: center;" id="nexts">
              	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['year']; ?>
" id="yearDate">
              	<input type="hidden" name="month" value="<?php echo $this->_tpl_vars['month']; ?>
" id="monthDate">
              	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['journey']['id']; ?>
" id="jid">
              	<input type="hidden" name="year" value="<?php echo $this->_tpl_vars['journey']['title']; ?>
" id="jtitle">
                <button type="button" class="calendar book_btn" id="btnNext">下一步</button>
            </div>
        </div>
    </div>
  	<script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <link rel="stylesheet" href="/resource/css/slick.css">
    <script src="/resource/js/slick.min.js"></script>
  	<script src="/resource/js/detailbm.js"></script>
    <script>
        $(document).ready(function() {
        	function checkMobile(tel) {
	            var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
	            if (reg.test(tel)) {
	                return true;
	            }else{
	                return false;
	            };
	        }
          	$('.postLeave').click(function(){
            	var realname = $('#realname').val();
              	var telephone = $('#telephone').val();
              	var email = $('#email').val();
              	var messages = $('#messages').val();
              	if(!realname){
                    layer.msg('请输入您的姓名');
                    return false;
                }
              	if(!telephone){
                    layer.msg('请输入您的手机号码');
                    return false;
                }
              	else if(!checkMobile(telephone)){
                    layer.msg('请输入正确的手机号');
	                return false;
	            }
              	if(!email){
                    layer.msg('请输入出发点');
                    return false;
                }
              	if(!messages){
                    layer.msg('请输入内容');
                    return false;
                }
              	$.post("/index.php?m=api&c=index&v=postleave", {
                    'realname':realname,
                    'telephone':telephone,
                    'email':email,
                    'messages':messages
                }, function(data){
                     layer.msg(data.tips);
                    if(data.status == 1){
                        $('#realname').val('');
                        $('#telephone').val('');
                        $('#email').val('');
                        $('#messages').val('');
                    }
                },"JSON");
            });
            $(".TAB_CLICK li").click(function() {
                var tab = $(this).parent(".TAB_CLICK");
                var con = tab.attr("id");
                var on = tab.find("li").index(this);
                $(this).addClass('on').siblings(tab.find("li")).removeClass('on');
                $(con).eq(on).show().siblings(con).hide();
            });
            $('.banner .slider').slick({
                dots: true,
                arrows: false,
                autoplay: true,
                fade: true,
                slidesToShow: 1,
                autoplaySpeed: 3000,
                pauseOnHover: false,
                cssEase: 'linear',
                lazyLoad: 'ondemand'
            });

            $('.m-pic2 .slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
              	autoplay: true,
              	autoplaySpeed: 3000,
                fade: false,
                asNavFor: '.m-pic2 .slider-nav'
            });
            $('.m-pic2 .slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.m-pic2 .slider-for',
                dots: false,
              	autoplay: true,
              	autoplaySpeed: 3000,
                arrows: true,
                focusOnSelect: true
            });
			$('.price').mouseover(function(){
            	$('.priced').show();
            });
			$('.price').mouseout(function(){
            	$('.priced').hide();
            });
        });
    </script>
</body>
</html>