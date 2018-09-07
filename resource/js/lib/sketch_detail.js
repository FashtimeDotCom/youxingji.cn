/**
 * Created by Administrator on 2016/12/2 0002.
 */
/**
 * Created by Administrator on 2016/7/9.
 */
$(document).ready(function() {
			$('.top').on('click', function() {
				$("html,body").animate({
					scrollTop: 0
				}, 500);
			});
			$("#travel").click(function(e) {
				e.stopPropagation();
				if($(this).hasClass('title_show_active')) {
					$(this).removeClass('title_show_active').siblings('div').hide();
				} else {
					$(this).addClass('title_show_active').siblings('div').show();
				}
			});

			$('.switch_btn').on('click', function(e) {
				e.stopPropagation();
				if($(this).hasClass('switch_btn_active')) {
					$('.player_star_detail').hide();
					$(this).removeClass('switch_btn_active');
					change_distance_btn();
					slide();
				} else {
					$('.player_star_detail').show();
					$(this).addClass('switch_btn_active');
					change_distance_btn();
					slide();
					$(this).hide();
				}
			});

			$('.total_cue em').on('mouseover', function() {
				$('.total_suspend,.total_cue strong').show();
			}).on('mouseout', function() {
				$('.total_suspend,.total_cue strong').hide();
			});

			$(window).on('scroll', function() {
				var scroH = $(this).scrollTop();
				if(scroH > $('.iCont_title').offset().top - 40) {
					$('.top_line').show();
					$('.top_num').css({
						'padding-top': '20px'
					});
					$('.instr_sider_top').css({
						'height': '400px'
					});
				} else {
					$('.top_line').hide();
					$('.top_num').css({
						'padding-top': 0
					});
				}
			});
			var screenWidth = $(window).width();
			if(screenWidth < 910) {
				$('.top').hide();
			} else {
				$('.top').show();
			}
			
			function toArray(str) {
				if(typeof str != "string") {
					return [];
				}
				var arr = [];
				for(var i = 0; i < str.length; i++) {
					arr.push(parseInt(str.charAt(i)));
				}
				return arr;
			}
			
			var column, windowHeight, iCont_title, bright, travel, solumn_tour, tour_cont, group_date, cost, cont_left, siderHeight;
			var columnArr = [],
				tourArr = [];

			function change_distance() {
				column = $('.column').height(); //栏目的高度
				windowHeight = $(window).height(); // 屏幕的高度

				iCont_title = $('.iCont_title').offset().top - column; //玩家亮点到顶部的距离
				bright = $('#bright').offset().top - column - 150; //;亮点呈现到顶部的距离
				solumn_tour = $('.solumn_tour').offset().top - column - 50; //玩家亮点到顶部的距离
				tour_cont = $('.tour_cont').offset().top - column - 180; //行程安排到顶部
				group_date = $('#group_date').offset().top - column - 150; //选择团旗到顶部
				cost = $('#cost').offset().top - column - 200; // 费用说明
				travel = $('#travel').offset().top - column - 250;

				cont_left = $('.instr_cont').offset().left; // 侧边栏的left
				siderHeight = $('.instr_sider').height();

				for(var i = 0; i < $('.tour_list > li').length; i++) {
					tourArr.push($('.tour_list > li').eq(i).offset().top);
				}
			}

			function change_distance_btn() {
				bright = $('#bright').offset().top - column - 150 + 60; //;亮点呈现到顶部的距离
				tour_cont = $('.tour_cont').offset().top - column - 180 + 60; //行程安排到顶部
				group_date = $('#group_date').offset().top - column - 150 + 60; //选择团旗到顶部
				cost = $('#cost').offset().top - column - 200 + 60; // 费用说明
				travel = $('#travel').offset().top - column - 250 + 60;

				tourArr.length = 0
				for(var i = 0; i < $('.tour_list > li').length; i++) {
					tourArr.push(($('.tour_list > li').eq(i).offset().top + 60));
				}
			}

			var bIsScroll = true;

			function startMove(element, target, func) {
				if(!bIsScroll) {
					return;
				}
				bIsScroll = false
				var flag = true; //假设所有运动到达终点.
				clearInterval(element.timer);
				element.timer = setInterval(function() {
					//1.取当前的属性值。
					var iCurrent = document.documentElement.scrollTop || document.body.scrollTop;
					var iSpeed = (target - iCurrent) / 30; //(目标值-当前值)/缩放系数=速度
					iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed); //速度取整
					if(iCurrent != parseInt(target)) {
						flag = false; //终止条件
						window.scrollTo(0, iCurrent + iSpeed);
					} else {
						flag = true;
					}
					if(flag) {
						clearInterval(element.timer);
						bIsScroll = true;
						if(func) {
							func();
						}
					}
				}, 10);
			}

			var slide = function() {

				for(var i = 0; i < $('.tour_list > li').length; i++) {
					$('.tour_list > li').eq(i).css({
						'height': $('.tour_list > li').eq(i).height()
					})
				}

				var siderHeight = $('.instr_sider').height();

				$('#tour_day li').click(function(e) {
					e.stopPropagation();
					startMove($(this), tourArr[$(this).index()] - 80);
				});

				function dayShow(scroT, tourArr) {
					for(var i = 0; i < $('.tour_list > li').length; i++) {
						if(scroT >= (tourArr[i] - 210)) {
							$('.tour_day').find('li').eq(i).addClass('tour_day_active').siblings().removeClass('tour_day_active');
						}
					}
				}

				columnArr = [solumn_tour, bright, tour_cont, group_date, cost];

				$('.column_hide li,.column li').click(function(e) {
					if($(this).parent().find('li').length > 6) {
						e.stopPropagation();
						startMove($(this), columnArr[$(this).index() + 1] + 50);
						
					} else {
						e.stopPropagation();
						startMove($(this), columnArr[$(this).index()] + 100);
						
					}
				});

				$('.date_sele').on('click', function() {
					startMove($(this), columnArr[3] + 50);
				});

				decideHeight($(window).scrollTop(), iCont_title, tour_cont, group_date, cost, bright,  travel);

				function decideHeight(scroH, iCont_title, tour_cont, group_date, cost, bright,travel ) {
					var misHeight = scroH - iCont_title + 11,
						scrollLeft = $(window).scrollLeft(),
						instr_cont_bottom = $('.instr_cont_bottom').offset().top,
						left_silder = cont_left + 880 + 17 - scrollLeft,
						left_nav = cont_left - scrollLeft,
						top_bottom = instr_cont_bottom - siderHeight - iCont_title - 95;

					var eqLimitSize = $('.solumn_tour').find('ul').eq(0).find('li').length == 4 ? -1 : 0;

					if(scroH < iCont_title) {
						$('.column_hide,.top').hide().attr('flag', 'true');
						$('.column').show();
						$('.instr_sider').css({
							'position': 'absolute',
							'top': 0,
							'right': 0,
							'left': '22.5rem',
						});
						$('.tour_day').hide();
					} else if(scroH >= (iCont_title + 20) && scroH < solumn_tour) {
						$('.instr_sider').css({
							'position': 'absolute',
							'top': 0,
							'right': 0,
							'left': '22.5rem',
						});
						$('.column').show();
						$('.column_hide').hide();
						$('.top').hide();
					} else if(scroH >= solumn_tour && scroH < bright) {
						$('.column_hide').css({
							'left': left_nav,
							'display': 'block'
						}).find('li').eq(0 + eqLimitSize).addClass('column_select_hide').siblings().removeClass('column_select_hide');
						$('.instr_sider').css({
							'position': 'fixed',
							'top': 0,
							'left': '31.5rem',
						});
						$('.column').hide();
						$('.column_hide').show();
						$('.top').show();
					} else if(scroH >= bright && scroH < tour_cont) {
						$('.column_hide').css({
							'left': left_nav,
							'display': 'block'
						}).find('li').eq(1 + eqLimitSize).addClass('column_select_hide').siblings().removeClass('column_select_hide');
						$('.column').hide();
						$('.instr_sider').css({
							'position': 'fixed',
							'top': 0,
							'left': '31.5rem',
						});
						if(scroH < tour_cont) {
							$('.tour_day').hide();
						}
					} else if(scroH >= tour_cont && scroH < group_date) {
						$('.column_hide').css({
							'left': left_nav,
							'display': 'block'
						}).find('li').eq(2 + eqLimitSize).addClass('column_select_hide').siblings().removeClass('column_select_hide').show();
						$('.instr_sider').css({
							'position': 'fixed',
							'top': 0,
							'left': '31.5rem',
						});
						$('.top').show();
						$('.tour_day').show().css('left', $('.instr').offset().left - $(document).scrollLeft());
						dayShow(scroH, tourArr);
					} else if(scroH >= group_date - 30 && scroH <= cost) {
						$('.tour_day').hide();
						$('.column_hide').css({
							'left': left_nav,
							'display': 'block'
						}).find('li').eq(3 + eqLimitSize).addClass('column_select_hide').siblings().removeClass('column_select_hide').show();
						//$('.instr_sider').css({'position': 'absolute', 'top': misHeight - 60, 'right': 0});
						$('.instr_sider').css({
							'position': 'fixed',
							'top': 0,
							'left': '31.5rem',
						});
						$('.top').show();
					} else if(scroH >= cost && scroH <= travel) {
						$('.column_hide').css({
							'left': left_nav,
							'display': 'block'
						}).find('li').eq(4 + eqLimitSize).addClass('column_select_hide').siblings().removeClass('column_select_hide').show();
						//$('.instr_sider').css({'position': 'absolute', 'top': misHeight - 60, 'right': 0});
						$('.instr_sider').css({
							'position': 'fixed',
							'top': 0,
							'left': '31.5rem',
						});
						$('.top').show();
					}
				}

				$(window).on('scroll', function() {
					var scroH = $(this).scrollTop();
					decideHeight(scroH, iCont_title, tour_cont, group_date, cost, bright, travel);
				});

			}

			window.onload = function() {
				change_distance();
				slide();
			};

			$(window).resize(function() {
				change_distance();
				slide();
			});
});