$(document).ready(function() {
    //顶部导航
    $('.menuBtn').append('<b></b><b></b><b></b>');
    $(".menuBtn").click(function() {
        $(this).toggleClass('open');
        $(this).siblings(".nav").stop().slideToggle();
    })

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

    //选项卡 点击切换
    $(".TAB_CLICK li").click(function() {
        var tab = $(this).parent(".TAB_CLICK");
        var con = tab.attr("id");
        var on = tab.find("li").index(this);
        $(this).addClass('on').siblings(tab.find("li")).removeClass('on');
        $(con).eq(on).show().siblings(con).hide();
    });

    $(".m-user i").click(function(e) {
        $(this).siblings('dl').slideToggle('fast');
        e.stopPropagation();
    })
    $(document).click(function() {
        $(".m-user dl").hide();
    })

});