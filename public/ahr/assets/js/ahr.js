$(document).ready(function() {
		$('.bt_1').click(function(){
		    var r_id = $(this).attr('attr');
		    var b_id = $(this).attr('bs');
		    $('#id').val(r_id);
		    $('#b_id').val(b_id);
		});
		$('#news_modal_1 .skype_wrapper .yes').click(function(){
            $('#news_modal_1 .modal-body').removeClass('none');
            $('#news_modal_1 .skype_wrapper').addClass('none');
            $('#news_modal_1 .modal-header').addClass('none');
            $('#news_modal_1 .rk_wrapper').removeClass('none');
        });
        $('#news_modal_1 .rk_wrapper .back').click(function(){
            $('#news_modal_1 .skype_wrapper').removeClass('none');
            $('#news_modal_1 .modal-header').removeClass('none');
            $('#news_modal_1 .modal-body').addClass('none');
            $('#news_modal_1 .rk_wrapper').addClass('none');
        });
        $('#news_modal_1 .rk_wrapper .rk_bt').click(function(){
               var id = $(this).attr('attr');
               $.ajax({
                  type: "POST",
                  url: "ttt",
                  async: false,
                  dataType: "json",
                  data: {
                      id: id,
                      _token: token
                  },
                  success: function(data) {
                      console.log(JSON.stringify(data));
                  },
                  error: function(data) {
                      console.log('Error:', data);
                  }
              });
              swal({
                title: "成功",
                type: "success",
                timer:1000,
                showConfirmButton: false
              })
              setTimeout("location.reload();", 1000);
        });
		// business profile tab1
		$('.default_photo .bs_background').hover(function(){
		  $('.default_photo .bs_background .update_bt_big').toggleClass('none');
		});
		$('.default_photo .bs_photo').hover(function(){
		  $('.default_photo .bs_photo .update_bt_smile').toggleClass('none');
		});
		// big
		$('.default_photo .update_bt_big').click(function(){
		  $('.default_photo').addClass('none');
		  $('.update_photo_big').removeClass('none');
		});
		// smile
		$('.default_photo .update_bt_smile').click(function(){
		  $('.default_photo').addClass('none');
		  $('.update_photo_smile').removeClass('none');
		});
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
		// $('.ahr-button_2').click(function(){
		// 	$(this).addClass('active').siblings('.active').removeClass('active');
		// });
		$('.employ').click(function(){
			$(this).toggleClass('active');
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

		$('.m_signinBtn').click(function(){
			if ($('input.Mck').is(':checked')) {
				$('.m_signin').submit();
			}else{
			    return swal({
			      title: "請確認同意條款",
			      text: "請勾選同意條款!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      closeOnConfirm: false
			    })
			}
		});
		$('.b_signinBtn').click(function(){
			if ($('input.Bck').is(':checked')) {
				$('.b_signin').submit();
			}else{
			    return swal({
			      title: "請確認同意條款",
			      text: "請勾選同意條款!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      closeOnConfirm: false
			    })
			}
		});
});

