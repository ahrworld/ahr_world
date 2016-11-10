$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var token = '{{ Session::token() }}';

$(document).ready(function() {
// 過場動畫
$("#fakeLoader").fakeLoader({
             timeToHide:300, //Time in milliseconds for fakeLoader disappear
             zIndex:999, // Default zIndex
             spinner:"spinner2",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7' 
             bgColor:"#0094e5", //Hex, RGB or RGBA colors
});
// 修正tabs連結
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 
// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
		$('.bt_1').click(function(){
		    var r_id = $(this).attr('attr');
		    var b_id = $(this).attr('bs');
		    $('#id').val(r_id);
		    $('#b_id').val(b_id);
		});
		$('.bt_message').click(function(){
		    var r_id = $(this).attr('attr');
		    var b_id = $(this).attr('bs');
		    $('.m_id').val(r_id);
		    $('.m_b_id').val(b_id);
		});
		$('.giveup').click(function(){
		    var rs_id = $(this).attr('attr');
		    $('.rs_id').val(rs_id);
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

	    // list-inbox
		$('.list-inbox').click(function(){
			$('.label-status').addClass('none');
			$('.inbox-status').removeClass('none').addClass('animated fadeIn');
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



		// business profile tab1  ****image update
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
		// big close
		$('.update_photo_big #image-cropper .close').click(function(){
		  $('.update_photo_big').addClass('none');
		  $('.default_photo').removeClass('none');
		});
		// smile
		$('.default_photo .update_bt_smile').click(function(){
		  $('.default_photo').addClass('none');
		  $('.update_photo_smile').removeClass('none');
		});

		// smile close  business and user
		$('.update_photo_smile #image-cropper .column .close').click(function(){
		  $('.update_photo_smile').addClass('none');
		  $('.default_photo').removeClass('none');
		  $('.update_1').removeClass('none');
		});

		// user profile tab1 image update
		$('.update_1 .photo').hover(function(){
		  $('.update_1 .photo .update_bt_smile').toggleClass('none');
		});
		$('#p1 .update_1 .update_bt_smile').click(function(){
		  $('#p1 .update_1').addClass('none');
		  $('#p1 .update_photo_smile').removeClass('none');
		});
		// end user

		// cropit
		$('.update_photo_big #image-cropper').cropit({
		  imageBackground: true,
		  imageBackgroundBorderWidth: 30 // Width of background border
		});
		$('.update_photo_smile #image-cropper').cropit({
		  imageBackground: true,
		  imageBackgroundBorderWidth: 30 // Width of background border
		});
		// Handle rotation
		$('.rotate-cw-btn').click(function() {
		  $('#image-cropper').cropit('rotateCW');
		});
		$('.rotate-ccw-btn').click(function() {
		  $('#image-cropper').cropit('rotateCCW');
		});
		$('.update_photo_big #image-cropper .ok-btn').click(function() {
		  var imageData = $('.update_photo_big #image-cropper').cropit('export');
		  $('.update_photo_big #image-cropper .hidden_image_data').val(imageData);
		  $.ajax({
		      type: "POST",
		      url: "/business/image_big",
		      async: false,
		      dataType: "json",
		      data:  $('.update_photo_big #image-cropper .cropit_form').serialize(),
		      success: function(data) {
		           console.log(JSON.stringify(data));
		           setTimeout("location.reload();", 1000);
		           swal({
		               title: "完成",
		               type: "success",
		               timer:1000,
		               showConfirmButton: false
		           })
		           setTimeout("location.reload();", 1000);
		      },
		      error: function(data) {
		          console.log('Error:', data);

		      }
		  });
		});
		$('.update_photo_smile_bs #image-cropper .ok-btn').click(function() {
		  var imageData = $('.update_photo_smile #image-cropper').cropit('export');
		  $('.update_photo_smile #image-cropper .hidden_image_data').val(imageData);
		  $.ajax({
		      type: "POST",
		      url: "/business/image_small",
		      async: false,
		      dataType: "json",
		      data:  $('.update_photo_smile #image-cropper .cropit_form').serialize(),
		      success: function(data) {
		           console.log(JSON.stringify(data));
		           swal({
		               title: "完成",
		               type: "success",
		               timer:1000,
		               showConfirmButton: false
		           })
		           setTimeout("location.reload();", 1000);
		      },
		      error: function(data) {
		          console.log('Error:', data);

		      }
		  });
		});
		$('#p1 .update_photo_smile #image-cropper .ok-btn').click(function() {
		  var imageData = $('#p1 .update_photo_smile #image-cropper').cropit('export');
		  $('#p1 .update_photo_smile #image-cropper .hidden_image_data').val(imageData);

		  $.ajax({
		      type: "POST",
		      url: "/image_small",
		      async: false,
		      dataType: "json",
		      data:  $('#p1 .update_photo_smile #image-cropper .cropit_form').serialize(),
		      success: function(data) {
		           swal({
		               title: "完成",
		               type: "success",
		               timer:1000,
		               showConfirmButton: false
		           })
		           $('.update_photo_smile').addClass('none');
		           $('.update_1').removeClass('none');
		           $('.photo').css('background-image','url(' + "data:image/png;base64," + data['image_small'] + ')');
		           // setTimeout("location.reload();", 1000);
		      },
		      error: function(data) {
		          console.log('Error:', data);

		      }
		  });
		});
		/////  image update end

});

