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
	
	$(document).ready(function() {
		// step6
		var count = 0;
		$('.language_lo .add').click(function(){
			count++;
			$('.push').append('<div id=" b '+ count +'"class="language_lo"><button type="button" class="btn ahr-button_2">日本語</button> <button type="button" class="btn ahr-button_2">英語</button> <button type="button" class="btn ahr-button_2">中囯語</button> <button type="button" class="btn ahr-button_2">ベトナム語</button> <button type="button" class="btn ahr-button_2 other">その他</button> <input class="other_c none" type="text" style="padding:5px 0px" name="name" > <label class="add"></label> </div>');
		});
		$('.language_lo .other').click(function(){
			$('.language_lo .other_c').removeClass('none');
		});
		$('.language_lo button:not(".other")').click(function(){
			$('.language_lo .other_c').addClass('none');
		});
		// step5
		$('.school_ct .other').click(function(){
			$('.school_ct .other_c').removeClass('none');
		});
		$('.school_ct button:not(".other")').click(function(){
			$('.school_ct .other_c').addClass('none');
		});
		// step3 sex
		$('.ahr-button_boy').click(function(){
			$('.army').removeClass('none');
		});
		$('.army .check').click(function(){
			$('.army .datetime').removeClass('none');
		});
		// select2
		$(".js-example").select2({
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
                        <li class="dropdown">
                            <a href="{{ url('/logout') }}" style="color:#FFF; font-size: 16px;"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
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

				<form id="commentForm">
					<div id="rootwizard" >
						<div class="navbar">
						  <div class="navbar-tab">
									<ul>
									  	<li class="done"><a href="#tab1" data-toggle="tab"></a></li>
										<li><a href="#tab2" data-toggle="tab"></a></li>
										<li><a href="#tab3" data-toggle="tab"></a></li>
										<li><a href="#tab5" data-toggle="tab"></a></li>
										<li><a href="#tab6" data-toggle="tab"></a></li>
										<li><a href="#tab7" data-toggle="tab"></a></li>
										<li><a href="#tab9" data-toggle="tab"></a></li>
										<!-- <p class="bar" style="padding-top:25px;">%</p> -->
									</ul>
						  </div>
						</div><!-- end navbar -->

						<div class="tab-content" >
							@include('step_layout/step1')
						    @include('step_layout/step2')
							@include('step_layout/step3')
							@include('step_layout/step5')
							@include('step_layout/step6')
							@include('step_layout/step7')
						
							@include('step_layout/step9')

							<ul class="pager wizard">
								<li class="previous first" style="display:none;"><a href="#">First</a></li>
								<li class="previous"></li>
								<li class="next last" style="display:none;"><a href="#">Last</a></li>
							  	<li class="next"></li>
							</ul>
						</div><!-- end tab-content -->
					</div><!-- end rootwizard -->
				  </div><!-- end wrapper -->
				</form>
			 </div>
        </main>
</body>
</html>