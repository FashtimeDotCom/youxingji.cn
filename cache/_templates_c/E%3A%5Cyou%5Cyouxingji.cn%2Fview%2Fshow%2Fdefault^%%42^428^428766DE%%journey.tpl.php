<?php /* vpcvcms compiled created on 2018-08-17 15:40:21
         compiled from wap/journey.tpl */ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->_tpl_vars['journey']['seotitle']; ?>
_独家旅行_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    <meta name="description" content="<?php echo $this->_tpl_vars['journey']['keywords']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['journey']['description']; ?>
" />
    <link rel="stylesheet" href="/resource/m/css/style.css" />
    <script src="/resource/m/js/jquery.js"></script>
    <script src="/resource/m/js/lib.js"></script>
</head>

<body class="">
    <div class="header">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <h3>独家旅行</h3>
    </div>
    <div class="mian">
        <div class="g-top">
            <div class="logo"><a href="/"><img src="/resource/m/images/logo.png" alt="" /></a></div>
            <div class="so">
                <form action="/index.php">
                    <input type="hidden" name="m" value="wap"/>
                    <input type="hidden" name="c" value="index"/>
                    <input type="hidden" name="v" value="search"/>
                    <input type="text" name="keyword" placeholder="请输入关键字" class="inp" />
                    <input type="submit" value="" class="sub" />
                </form>
            </div>
        </div>
        <div class="banner swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="javascript:;">
                        <div class="pic">
                            <img src="<?php echo $this->_tpl_vars['journey']['articlepic']; ?>
" alt="" />
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="m-pick">
            <div class="con1">
                <h3><?php echo $this->_tpl_vars['journey']['title']; ?>
</h3>
                <div class="picbox swiper-container">
                    <div class="swiper-wrapper">
                        <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="pic">
                                    <img src="<?php echo $this->_tpl_vars['vo']['imgurl']; ?>
" alt="" />
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="bot">
                <p><i style="background-image: url(/resource/m/images/q-icon49.png);"></i>旅行天数：<?php echo $this->_tpl_vars['journey']['extend']['lxts']; ?>
天</p>
                <p><i style="background-image: url(/resource/m/images/q-icon49.png);"></i>出发城市：<?php echo $this->_tpl_vars['journey']['extend']['cfcs']; ?>
</p>
                <p><i style="background-image: url(/resource/m/images/q-icon50.png);"></i>最佳季节：<?php echo $this->_tpl_vars['journey']['extend']['zjjj']; ?>
</p>
                <p><i style="background-image: url(/resource/m/images/q-icon50.png);"></i>旅行主题：<?php echo $this->_tpl_vars['journey']['extend']['lxzt']; ?>
</p>
            </div>
        </div>
        <div class="m-txt3">
            <div class="wp">
                <h3>线路亮点</h3>
                <?php echo $this->_tpl_vars['journey']['content']; ?>

            </div>
        </div>
        <div class="m-characteristic">
            <h3 class="g-tit3">特色体验</h3>
            <div class="wp">
                <ul class="ul-imgtxt7">
                    <?php $_from = $this->_tpl_vars['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                    <li>
                        <div class="pic"><img src="<?php echo $this->_tpl_vars['vo']['pics']; ?>
" alt="" /></div>
                        <div class="txt">
                            <h4><?php echo $this->_tpl_vars['vo']['title']; ?>
： </h4>
                            <p><?php echo $this->_tpl_vars['vo']['introduction']; ?>
</p>
                        </div>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        </div>
        <div class="m-trip">
            <h3 class="g-tit3">详细行程</h3>
            <ul class="ul-imgtxt8">
                <?php $_from = $this->_tpl_vars['trip']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vo']):
?>
                <li class="<?php if ($this->_tpl_vars['k'] == 0): ?>on<?php endif; ?> <?php if ($this->_tpl_vars['count'] - $this->_tpl_vars['k'] == 1): ?>last<?php endif; ?>">
                    <div class="tit">
                        <a href="javascript:;">
                            <span>D<?php echo $this->_tpl_vars['vo']['days']; ?>
</span>
                            <h3><?php echo $this->_tpl_vars['vo']['title']; ?>
</h3>
                        </a>
                    </div>
                    <div class="txt" style="display: block;">
                        <?php echo $this->_tpl_vars['vo']['introduction']; ?>

                        <div class="picbox  swiper-container">
                            <div class="swiper-wrapper">
                                <?php $_from = $this->_tpl_vars['vo']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                <div class="swiper-slide">
                                    <a href="javascript:;">
                                        <div class="pic">
                                            <img src="<?php echo $this->_tpl_vars['v']['imgurl']; ?>
" alt="" />
                                            <span><?php echo $this->_tpl_vars['v']['title']; ?>
</span>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
        <div class="m-explain">
            <ul class="ul-txt2 TAB_CLICK" id=".tablebox">
                <li class="on"><a href="javascript:;">费用包含</a></li>
                <li><a href="javascript:;">费用不包含</a></li>
                <li><a href="javascript:;">温馨提示</a></li>
                <li><a href="javascript:;">签证说明</a></li>
            </ul>
            <div class="tablebox">
                <div class="wp">
                    <div class="m-txt4">
                        <?php echo $this->_tpl_vars['journey']['extend']['fybh']; ?>

                    </div>
                </div>
            </div>
            <div class="tablebox dn">
                <div class="wp">
                    <div class="m-txt4">
                        <?php echo $this->_tpl_vars['journey']['extend']['fybbh']; ?>

                    </div>
                </div>
            </div>
            <div class="tablebox dn">
                <div class="wp">
                    <div class="m-txt4">
                        <?php echo $this->_tpl_vars['journey']['extend']['htsm']; ?>

                    </div>
                </div>
            </div>
            <div class="tablebox dn">
                <div class="wp">
                    <div class="m-txt4">
                        <?php echo $this->_tpl_vars['journey']['extend']['qzsm']; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="h50"></div>
        <div class="fl-bot" id="nexts">
            <div class="wp">
                <span>￥<?php echo $this->_tpl_vars['journey']['extend']['price']; ?>
</span>
                <a class="btn-enroll" id="btnBook" href="javascript:;">立刻报名</a>
            </div>
        </div>
        <div class="fl-bot" id="service_book" style="display: none">
            <div class="wp">
                <a class="btn-enroll" id="btnNext" href="javascript:;">下一步</a>
            </div>
        </div>
        <input type="hidden" name="year" value="<?php echo $this->_tpl_vars['year']; ?>
" id="yearDate">
        <input type="hidden" name="month" value="<?php echo $this->_tpl_vars['month']; ?>
" id="monthDate">
        <input type="hidden" name="year" value="<?php echo $this->_tpl_vars['journey']['id']; ?>
" id="jid">
        <input type="hidden" name="year" value="<?php echo $this->_tpl_vars['journey']['title']; ?>
" id="jtitle">
        <!-- 弹窗 -->
        <div class="m-pop">
            <div class="bg"></div>
            <div class="con">
                <a href="javascript:;" class="btn-close"></a>
                <h3 class="tit"><?php echo $this->_tpl_vars['journey']['extend']['cfcs']; ?>
出发</h3>
                <div class="choose">
                    <div class="info info1">
                        <span class="sp1">成人</span>
                        <div class="number">
                            <a class="minusBtn" href="javascript:;">-</a>
                            <input type="number" value="2" class="inp js_cur_num1">
                            <a class="plusBtn" href="javascript:;">+</a>
                        </div>
                    </div>
                    <div class="info info2">
                        <div class="child">
                            <span class="sp1">儿童</span>
                            <span class="sp2">2-12岁</span>
                        </div>
                        <div class="number">
                            <a class="minusBtn minusBtn-child" href="javascript:;">-</a>
                            <input type="number" value="0" class="inp js_cur_num2">
                            <a class="plusBtn" href="javascript:;">+</a>
                        </div>
                    </div>
                </div>
                <div class="week">
                    <p>日</p>
                    <p>一</p>
                    <p>二</p>
                    <p>三</p>
                    <p>四</p>
                    <p>五</p>
                    <p>六</p>
                </div>
                <div class="calendar swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <h3 class="month cal-title"></h3>
                            <table id="pop-cal">
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="swiper-button-prev pre">上一个月</div>
                    <div class="swiper-button-next next">下一个月</div>
                </div>
            </div>
        </div>
        <!-- 弹窗 end -->
    </div>
    <script src="/resource/js/layui/lay/dest/layui.all.js"></script>
    <link rel="stylesheet" type="text/css" href="/resource/m/css/swiper.css" />
    <script type="text/javascript" src="/resource/m/js/swiper.js"></script>
    <script>
        var swiper = new Swiper('.banner', {
            slidesPerView: 1,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 5000,
                stopOnLastSlide: false,
                disableOnInteraction: true,
            }
        });
        var swiper = new Swiper('.m-pick .picbox', {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        var swiper = new Swiper('.ul-imgtxt8 .picbox', {
            slidesPerView: 2.5
        });
    </script>
    <script>
        $(".ul-imgtxt8 .tit").click(function() {
            var li = $(this).parents('li');
            li.toggleClass('on');
            if (li.hasClass('on')) {
                li.find(".txt").stop().slideDown();
            } else {
                li.find(".txt").stop().slideUp();
            }
            li.siblings('li').find(".txt").stop().slideUp();
            li.siblings('li').removeClass('on');
            // $(this).parents().find(".txt").stop().slideToggle();
            // $(this).parent().siblings('li').stop().toggleClass('on');
            // $(this).siblings('.txt').stop().slideToggle(200);
            // $(this).parent('li').stop().toggleClass('on');
            var swiper = new Swiper('.ul-imgtxt8 .picbox', {
                slidesPerView: 2.5
            });
        })

        // 弹窗
        $('.btn-enroll').click(function() {
            $('#nexts').hide();
            $('#service_book').show();
        });
        $('.btn-close').click(function() {
            $('#nexts').show();
            $('#service_book').hide();
            $('.m-pop').removeClass('show');
        });

        $(document).ready(function() {
            // 加减按钮
            $('.minusBtn').each(function() {
                var _val = $(this).next('input').val() * 1 - 1;
                if (_val > 0) {
                    $(this).removeClass('disabled');
                } else {
                    $(this).addClass('disabled');
                }
            });
            $('.minusBtn').click(function() {
                var _val = $(this).next('input').val() * 1 - 1;
                if (_val > 1) {
                    $(this).removeClass('disabled').next('input').val(_val);
                } else if (_val = 1) {
                    $(this).addClass('disabled').next('input').val(_val);
                } else {
                    $(this).addClass('disabled');
                }
            });
            $('.minusBtn-child').click(function() {
                var _val = $(this).next('input').val() * 1 - 1;
                if (_val > -1) {
                    $(this).removeClass('disabled').next('input').val(_val);
                } else {
                    $(this).addClass('disabled');
                }
            });
            $('.plusBtn').click(function() {
                var _val = $(this).prev('input').val() * 1 + 1;
                $(this).prev('input').val(_val);
                $(this).prev('input').prev('.minusBtn').removeClass('disabled');
            });
        });
        $('#btnNext').click(function() {
            var date = $('.detailCalendarChoosenDate').attr('datestring');
            var x = parseInt($('.js_cur_num1').val());
            var m = parseInt($('.js_cur_num2').val());
            if (!date) {
                layer.msg('请选择出行日期');
                return false
            }
            if (x < 1) {
                layer.msg('请选择出行人数');
                return false
            }
            layer.prompt({title: '请输入姓名！', formType: 0}, function(name, index){
                layer.close(index);
                layer.prompt({title: '请输入手机号码！', formType: 0}, function(phone, index){
                    layer.close(index);
                    layer.prompt({title: '请输入出发地点！', formType: 0}, function(address, index){
                        layer.close(index);
                        var messages = '日期：' + date + '；成人：' + x + '人；儿童：' + m + '人；来自：' + $('#jtitle').val();
                        $.post("/index.php?m=api&c=index&v=postleave", {
                            'realname': name,
                            'telephone': phone,
                            'email': address,
                            'messages': messages
                        }, function(data) {
                            layer.msg(data.tips);
                            if (data.status == 1) {
                                $('#nexts').show();
                                $('#service_book').hide();
                                $('.m-pop').removeClass('show');
                                $('#pop-cal .detailCalendarChoosenDate').removeClass('detailCalendarChoosenDate');
                            }
                        }, "JSON")
                    });
                });
            });
        });
        $('#btnBook').click(function() {
            var year = parseInt($('#yearDate').val());
            var month = parseInt($('#monthDate').val());
            $.get("/index.php?m=api&c=index&v=getcalendar", {
                'jid': $('#jid').val(),
                'year': year,
                'month': month
            }, function(data) {
                if (data['MonthModel']) {
                    ms(data);
                }
            }, "JSON")
        });
        $('.next').click(function() {
            var year = parseInt($('#yearDate').val());
            var month = parseInt($('#monthDate').val());
            var date = getNextMonth(year + '-' + month + '-1').split('-');
            $.get("/index.php?m=api&c=index&v=getcalendar", {
                'jid': $('#jid').val(),
                'year': date['0'],
                'month': date['1']
            }, function(data) {
                if (data['MonthModel']) {
                    $('.pre').show();
                    if (date['0'] <= data['EndYear'] && date['1'] <= data['EndMonth']) {
                        ms(data)
                    } else {
                        $('.next').hide()
                    }
                }
            }, "JSON")
        });
        $('.pre').click(function() {
            var year = parseInt($('#yearDate').val());
            var month = parseInt($('#monthDate').val());
            var date = getPreMonth(year + '-' + month + '-1').split('-');
            $.get("/index.php?m=api&c=index&v=getcalendar", {
                'jid': $('#jid').val(),
                'year': date['0'],
                'month': date['1']
            }, function(data) {
                if (data['MonthModel']) {
                    $('.next').show();
                    ms(data)
                } else {
                    $('.pre').hide()
                }
            }, "JSON")
        });
        function popChoosePersonDates(obj) {
            $('#pop-cal .detailCalendarChoosenDate').removeClass('detailCalendarChoosenDate');
            $(obj).addClass('detailCalendarChoosenDate')
        }
        function ms(data) {
            $('.cal-title').text(data['MonthModel']['Year'] + '年' + data['MonthModel']['Month'] + '月');
            $('#yearDate').val(data['MonthModel']['Year']);
            $('#monthDate').val(data['MonthModel']['Month']);
            $('#pop-cal').find("tbody").html('');
            $tbody = $('#pop-cal').find("tbody");
            $tr = '<tr>';
            for (var i = 1; i < data['MonthModel']['Days'].length + 1; i++) {
                if (i % 7 == 1) {
                    $tr += '</tr>'
                }
                if (data['MonthModel']['Days'][i - 1]['IsOtherMonth']) {
                    $tr += '<td><div class="day"></div></td>'
                } else {
                    if (data['MonthModel']['Days'][i - 1]['DateType'] == 0) {
                        $tr += '<td><div class="day">' + data['MonthModel']['Days'][i - 1]['Day'] + '</div></td>'
                    } else if (data['MonthModel']['Days'][i - 1]['DateType'] == 2) {
                        $tr += '<td onclick="popChoosePersonDates(this)" datestring="' + data['MonthModel']['Days'][i - 1]['DateString'] + '"><div class="day on">' + data['MonthModel']['Days'][i - 1]['Day'] + '</div><div class="txt"><p>￥' + data['MonthModel']['Days'][i - 1]['Price'] + '</p><p>' + data['MonthModel']['Days'][i - 1]['DateText'] + '</p></div></td>'
                    } else if (data['MonthModel']['Days'][i - 1]['DateType'] == 6) {
                        $tr += '<td><div class="day">' + data['MonthModel']['Days'][i - 1]['Day'] + '</div><div class="txt">' + data['MonthModel']['Days'][i - 1]['DateText'] + '</div></td>'
                    } else {
                        $tr += '<td onclick="popChoosePersonDates(this)" datestring="' + data['MonthModel']['Days'][i - 1]['DateString'] + '"><div class="day on">' + data['MonthModel']['Days'][i - 1]['Day'] + '</div><div class="txt"><p>￥' + data['MonthModel']['Days'][i - 1]['Price'] + '</p><p>' + data['MonthModel']['Days'][i - 1]['MinPerson'] + '人成团</p></div></td>'
                    }
                }
            }
            $tbody.append($tr);
            $('.m-pop').addClass('show');
        }
        function getPreMonth(date) {
            var arr = date.split('-');
            var year = arr[0];
            var month = arr[1];
            var day = arr[2];
            var days = new Date(year, month, 0);
            days = days.getDate();
            var year2 = year;
            var month2 = parseInt(month) - 1;
            if (month2 == 0) {
                year2 = parseInt(year2) - 1;
                month2 = 12
            }
            var day2 = day;
            var days2 = new Date(year2, month2, 0);
            days2 = days2.getDate();
            if (day2 > days2) {
                day2 = days2
            }
            if (month2 < 10) {
                month2 = '0' + month2
            }
            var t2 = year2 + '-' + month2 + '-' + day2;
            return t2
        }
        function getNextMonth(date) {
            var arr = date.split('-');
            var year = arr[0];
            var month = arr[1];
            var day = arr[2];
            var days = new Date(year, month, 0);
            days = days.getDate();
            var year2 = year;
            var month2 = parseInt(month) + 1;
            if (month2 == 13) {
                year2 = parseInt(year2) + 1;
                month2 = 1
            }
            var day2 = day;
            var days2 = new Date(year2, month2, 0);
            days2 = days2.getDate();
            if (day2 > days2) {
                day2 = days2
            }
            if (month2 < 10) {
                month2 = '0' + month2
            }
            var t2 = year2 + '-' + month2 + '-' + day2;
            return t2
        }
    </script>
</body>

</html>