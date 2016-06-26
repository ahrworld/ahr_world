<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ahr</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="ahr/bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <!-- ahr -->
    <link rel="stylesheet" href="assets/css/ahr.css">
    <script src="ahr/assets/js/ahr.js"></script>
    <!-- cropit -->
    <script src="{{ asset('ahr/bower_components/cropit/dist/jquery.cropit.js')}}"></script>
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- jquery step -->
    <script src="ahr/bower_components/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
    <!-- birthday plugin -->
	<script src="ahr/assets/js/jquery-birthday-picker.min.js"></script>
	<!-- select2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">
</head>
<script>
    function formatState (state) {
	  if (!state.id) { return state.text; }
	  
	  var $state = $(
	    '<span><img height="30" src="ahr/assets/flag/' + state.element.value.toLowerCase() + '.svg" class="img-flag" /> ' + state.text + '</span>'
	  );
	  return $state;
	};
	function del(id) {
	  $("#div"+id).remove();
	}
	$(document).ready(function() {


		// step4
		$('.school_ct .other').click(function(){
			$(".school_ct input[type='radio']").attr("checked", false);
			$('.school_ct .other_c').removeClass('none');
		});
		$(".school_ct input[type='radio']").click(function(){
			$(".school_ct .other_c").val('');
			$('.school_ct .other_c').addClass('none');
		});
		// step 5
		var id = 1;
		$('#tab5 .language_append .add').click(function(){
			$('.language_append').append($('<div class="form-inline" id="div'+ id +'"> <div class="form-group" style="margin-right:3px;"> <input type="text" class="form-control" name="language[]" placeholder="language"> </div><div class="form-group" style="margin-right:3px;"> <select class="form-control" name="languagelv[]"> <option value="3">母語</option> <option value="2">ビジネス</option> <option value="1">日常会話</option> <option value="0">初級</option> </select> </div><div class="form-group" ><a href="#" class="float-right" style="font-size:25px;" onclick="del('+id+')"> <i class="fa fa-times-circle" aria-hidden="true"></i> </a> </div></div>'));
			id++;
		});
		// step 6

		$('.number').keyup(function(){
			var moreArray = new Array();
			if ($('.number').val() == 1) {
				for (var i = 1; i <= 1; i++) {
					moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_job as $key=> $value) @if ($value_category->id==$value->exp_job_category_id) <option value="{{$value->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$value->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
					$('.exp_job_wrapper').html(moreArray.join(""));

				};
			}else if ($('.number').val() == 2) {
				for (var i = 1; i <= 2; i++) {
					moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_job as $key=> $value) @if ($value_category->id==$value->exp_job_category_id) <option value="{{$value->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$value->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
					$('.exp_job_wrapper').html(moreArray.join(""));

				};
			}else if($('.number').val() == 3){
				for (var i = 1; i <= 3; i++) {
					moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_job as $key=> $value) @if ($value_category->id==$value->exp_job_category_id) <option value="{{$value->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$value->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
					$('.exp_job_wrapper').html(moreArray.join(""));

				};
			};

			$(".js-example_add1").select2({
			   placeholder: "職種を選択してください。",
			   allowClear: true
			});
			$(".js-example_year1").select2({
			   placeholder: "年数",
			   allowClear: true
			});
			$(".js-example_add2").select2({
			   placeholder: "職種を選択してください。",
			   allowClear: true
			});
			$(".js-example_year2").select2({
			   placeholder: "年数",
			   allowClear: true
			});
			$(".js-example_add3").select2({
			   placeholder: "職種を選択してください。",
			   allowClear: true
			});
			$(".js-example_year3").select2({
			   placeholder: "年数",
			   allowClear: true
			});
		});
		// step7
		$('.in').click(function(){
			var value = $(this).val();
			$(this).parents().siblings('.in_value').val(value);
		});
		// step3 sex
		$('.ahr-button_boy').click(function(){
			$('.army').removeClass('none');
		});
		$('.ahr-button_girl').click(function(){
			$('.army').addClass('none');
		});
		$('.army .check').click(function(){
			$('.army .datetime').removeClass('none');
		});
		$('.army .no,.army .not').click(function(){
			$('.army .datetime').addClass('none');
		});
		//
    	$(".finish_sumbit").click(function(){
    	     $('.pl_form').submit();
		});
		// select2
		$(".js-example1").select2({
		   placeholder: "職種を選択してください。",
		   allowClear: true
		});
		$(".js-example2").select2({
		   placeholder: "年数",
		   allowClear: true
		});

		$(".js-example-templating").select2({
		  templateResult: formatState
		});
		$(".js-example-templating2").select2({
		  templateResult: formatState,
		  closeOnSelect : false,
		  // maximumSelectionLength: 2
		});
		$(".js-example-templating3").select2({
		  // maximumSelectionLength: 2
		});
		var $validator = $("#commentForm").validate({
		  rules: {
		    emailfield: {
		      required: true,
		      email: true,
		      minlength: 3
		    },
		    namefield: {
		      required: true,
		      minlength: 3
		    },
		    urlfield: {
		      required: true,
		      minlength: 3,
		      url: true
		    }
		  }
		});
		$("#birthdayPicker").birthdayPicker();
		$('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
			$('#rootwizard .navbar .navbar-tab li').eq(index).addClass('done');
			// Set the name for the next tab
			var $valid = $("#commentForm").valid();
  			if(!$valid) {
  				$validator.focusInvalid();
  				return false;
  			}
		},onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;

		$('#rootwizard').find('.bar').html($percent + '%');
		if($current >= $total) {
			$('#rootwizard').find('.pager .next').hide();
			$('#rootwizard').find('.pager .finish').show();
			$('#rootwizard').find('.pager .finish').removeClass('disabled');
		} else {
			$('#rootwizard').find('.pager .next').show();
			$('#rootwizard').find('.pager .finish').hide();
		}
	}});
	});
</script>
<body>
		<!-- header -->
        <header>
	    	<nav class="navbar  nav-ahr">

	    	  <div class="container">
	    	    <div class="navbar-header">
		    	      <img src="assets/img/logo.png" height="40">
	    	    </div>
	    	    <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    @else
                    	<li>
                        	<h5 href="#" style="color:#FFF;padding-top: 6px; font-size: 16px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->email }}</h5>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" style="color:#FFF; font-size: 16px; margin-left:5px;"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </li>
                    @endif

               	 </ul>
	    	  </div>
	    	</nav>
        </header>
		<!-- main -->
        <main>
		<style>
		.wrapper{
			width: 80%;
			margin:auto;
		}
		.navbar-tab ul{
			float: right;
		}
		.navbar-tab li{
			list-style: none;
			float: left;
			padding: 10px;
			margin-right: 5px;
			border-radius: 20px;
			background: #ACCFF1;
			margin-top: 20px;
			display: block;
			border: 3px double #EEE;
		}
		.navbar-tab li.done{
			background: #3197FA;
		}
		.navbar-tab li.active{
			background: #FFF !important;
			border: 3px double #CCC;
		}
		#rootwizard .tab-content .tab-pane{
		}
		#rootwizard .tab-content .tab-pane .container-fluid{
			/*border: 2px solid #0094E5;*/
			padding: 20px;
		}
		#rootwizard .tab-content label.error{
			margin-bottom: 0px !important;
			color:#800000;
		}

		#rootwizard .tab-content .tab-pane{
			    height: 500px;
		}
		#rootwizard .tab-content ul.wizard{
			position: relative;
		    bottom: 300px;
		    width: 100%;
		}
		#rootwizard .tab-content li.previous{
			text-align: left;
		    float: left;
		    position: relative;
		    right: 100px;
		    width: 0;
			height: 0;
			border-style: solid;
			border-width: 30px 46.6px 30px 0;
			border-color: transparent #0094E5 transparent transparent;
			cursor: pointer;
		}
		#rootwizard .tab-content li.previous.disabled{
			display: none;
		}
		#rootwizard .tab-content li.previous:hover{
			border-color: transparent rgba(23, 187, 250, 0.98) transparent transparent;
		}
		#rootwizard .tab-content li.next{
			text-align: right;
		    float: right;
		    position: relative;
		    left: 100px;
		    width: 0;
			height: 0;
			border-style: solid;
			border-width: 30px 0 30px 46.6px;
			border-color: transparent transparent transparent #0094E5;
			cursor: pointer;
		}
		#rootwizard .tab-content li.next:hover{
			border-color: transparent transparent transparent rgba(23, 187, 250, 0.98);
		}

		</style>
			 <div class="container" style="background:#FFF; height:100%; margin-top:50px;">
				<div class="wrapper">

				<form id="commentForm" class="pl_form" action="{{url('/personnel_in')}}" method="POST">
				{{ csrf_field() }}
					<div id="rootwizard" >
						<div class="navbar">
						  <div class="navbar-tab">
									<ul>
									  	<li class="done"><a href="#tab1" data-toggle="tab"></a></li>
										<li><a href="#tab2" data-toggle="tab"></a></li>
										<li><a href="#tab3" data-toggle="tab"></a></li>
										<li><a href="#tab4" data-toggle="tab"></a></li>
										<li><a href="#tab5" data-toggle="tab"></a></li>
										<li><a href="#tab6" data-toggle="tab"></a></li>
										<li><a href="#tab7" data-toggle="tab"></a></li>
										<!-- <li><a href="#tab6" data-toggle="tab"></a></li>
										<li><a href="#tab7" data-toggle="tab"></a></li> -->
										<!-- <p class="bar" style="padding-top:25px;">%</p> -->
									</ul>
						  </div>
						</div><!-- end navbar -->

						<div class="tab-content" >
							@include('step_layout/step1')
						    @include('step_layout/step2')
							@include('step_layout/step3')
							@include('step_layout/step4')
							@include('step_layout/step5')
							@include('step_layout/step6')
							@include('step_layout/step7')
							<ul class="pager wizard" style="height: 0px;">
								<li class="previous first" style="display:none;"><a href="#">First</a></li>
								<li class="previous"></li>
							  	<li class="next"></li>
							  	<li class="next finish finish_sumbit" style="display:none;"></li>
							</ul>
						</div><!-- end tab-content -->

					</div><!-- end rootwizard -->
				  </div><!-- end wrapper -->
				</form>
			 </div>
        </main>
</body>
</html>