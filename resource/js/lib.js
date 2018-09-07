/* 
 * @Author: anchen
 * @Date:   2018-02-05 09:44:14
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-02-05 11:28:59
 */

$(document).ready(function() {
    (function() {
        // 自定义多选
        $('[role=checkbox]').each(function() {
            var input = $(this).find('input[type="checkbox"]');

            input.each(function() {
                if ($(this).attr('checked')) {
                    $(this).parents('label').addClass('checked');
                    $(this).prop("checked", true)
                }
            })

            input.change(function() {
                $(this).parents('label').toggleClass('checked');
            });
        })

    })();

    (function() {
        // 自定义单选
        $('[role=radio]').each(function() {
            var input = $(this).find('input[type="radio"]'),
                label = $(this).find('label');

            input.each(function() {
                if ($(this).attr('checked')) {
                    $(this).parents('label').addClass('checked');
                    $(this).prop("checked", true)
                }
            })

            input.change(function() {
                label.removeClass('checked');
                $(this).parents('label').addClass('checked');
                input.removeAttr('checked');
                $(this).prop("checked", true)
            })
        })
    })();

    // 选项卡 鼠标点击
    $(".TAB_CLICK .ls").click(function() {
        var tab = $(this).parent(".TAB_CLICK");
        var con = tab.attr("id");
        var on = tab.find("li").index(this);
        $(this).addClass('on').siblings(tab.find("li")).removeClass('on');
        $(con).eq(on).show().siblings(con).hide();
    });

    $(".header .hdr .user").hover(function() {
        $('dl', this).stop().slideToggle("fast");
    })

    // 返回顶部
    $('.g-top').click(function() {
        $('body,html').animate({
            'scrollTop': 0
        }, 500);
    });

    //视频弹窗
    $('.js-video').click(function(event) {
        var _id = $(this).attr("href");
      	var tid = $(this).attr("data-id");
        var _src = $(this).attr("data-src");
		$.post("/index.php?m=api&c=index&v=showtv", {
          'id':tid
        }, function(data){

        },"JSON");
        $(_id).find("iframe").attr("src", _src);
        $(_id).fadeIn();
    });
    $('.js-close').click(function(event) {
        $(this).parents('.m-pop1-hlg').fadeOut();
        $(this).parents('.m-pop1-hlg').find("iframe").attr("src", "");
    });
});