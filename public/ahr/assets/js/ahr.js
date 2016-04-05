$(document).ready(function() {
	    // list-inbox
		$('.list-inbox').click(function(){
			$('.label-status').addClass('none');
			$('.inbox-status').removeClass('none').addClass('animated fadeIn');
			$('.mail-compose').addClass('none');
			$('.mail-view').addClass('none');
			$('.mail-inbox').removeClass('none').addClass('animated fadeIn');
		});
		// list-mail
		$('.list-mail').click(function(){
			$('.label-status').addClass('none');
			$('.mail-status').removeClass('none').addClass('animated fadeIn');
			$('.mail-inbox').addClass('none');
			$('.mail-view').addClass('none');
			$('.mail-compose').removeClass('none').addClass('animated fadeIn');
		});
		// list-notice
		$('.list-notice').click(function(){
			$('.label-status').addClass('none');
			$('.notice-status').removeClass('none').addClass('animated fadeIn');
			$('.mail-compose').addClass('none');
			$('.mail-inbox').addClass('none');
			$('.mail-view').removeClass('none').addClass('animated fadeIn');
		});

		$('.list-group li').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
		//
		// $('.checkbox5').click(function(){
		// 	if($('.checkbox5').is(':checked')) {
		// 	    $(this).parentsUntil("table").find('tr').addClass('mail-hightlight');
		// 	} else {
		// 	    $('.mail-container .table-hover tr').removeClass('mail-hightlight');
		// 	};
		// });
		$('.mail-checkbox').click(function(){
			$(this).parents('tr').toggleClass('mail-hightlight');
		});
		$('.td-star').click(function(){
			$(this).find('i').toggleClass('active');
		});
		// bs_info button
		$('.ahr-button_2').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
		$('.ahr-button_3').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
		$('.ahr-button_4').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
		$('.ahr-button_5').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
		$('.ahr-button_6').click(function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
		});
});

