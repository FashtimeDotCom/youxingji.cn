
$(document).ready(function($) {
	// mobile导航
	$('.menuBtn').click(function(e) {
        $(this).toggleClass('ok');
		$('body').addClass('fixme').append('<div class="overlay"></div>');
        $(".nav-phone").slideToggle();
		$('#aside').addClass('open');
		e.stopPropagation();
	});
	$('#aside').click(function(e) {
		e.stopPropagation();
	});
	$(document).on('click touchstart',function(){
		$('#aside').removeClass('open');
		$('body').removeClass('fixme');
		$('.overlay').remove();
	});

	$('.nav-phone .v1').click(function(){
		if( $(this).next('dl').length ){
			$(this).next('dl').stop().slideToggle();
            $(this).parent("li").siblings('li').find("dl").stop().slideUp();
			return false;
		}
	});
    // 导航
    $(window).resize(function(event) {
        $(".menuBtn").removeClass('ok');
        $(".nav-phone").slideUp();
    });

	// 返回顶部
    $('.float-bar').click(function(){
           $('body,html').animate({
               scrollTop: 0
           }, 500);
       });

        $(window).scroll(function() {       
            if($(window).scrollTop() >= 100){
                $('.float-bar').fadeIn(500); 
            }else{    
                $('.float-bar').fadeOut(500);    
            }  
        });

});