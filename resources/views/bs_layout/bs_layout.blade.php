<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ahr</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="ahr/bower_components/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
	<script src="ahr/assets/js/ahr.js"></script>
	<!-- tag-it -->
	<link rel="stylesheet" href="{{ asset('ahr/assets/tag_it/jquery.tagit.css')}}">
	<link rel="stylesheet" href="{{ asset('ahr/assets/tag_it/tagit.ui-zendesk.css')}}">
	<script src="{{ asset('ahr/assets/tag_it/tag-it.js')}}"></script>
	<!-- select2 -->
	<link href="{{ asset('ahr/assets/select2/css/select2.css')}}" rel="stylesheet" />
	<script src="{{ asset('ahr/assets/select2/js/select2.js')}}"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="ahr/bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
    <link rel="stylesheet" href="assets/css/ahr.css">
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">
</head>
<body>
		<!-- header -->
        <header>
	    	<nav class="navbar nav-ahr">
	    	  <div class="container">
	    	    <div class="navbar-header">
		    	      <img src="assets/img/logo.png" height="40">
	    	    </div>
	    	  </div>
	    	</nav>
        </header>
		<!-- main -->
		@yield('main')
</body>
</html>