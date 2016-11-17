<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- bootstrap -->
    <script src="{{ asset('ahr/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <!-- ahr -->
    <script src="{{ asset('ahr/assets/js/ahr.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/ahr.css')}}">
    <!-- cropit -->
    <script src="{{ asset('ahr/bower_components/cropit/dist/jquery.cropit.js')}}"></script>
    <!-- tag-it -->
	<link rel="stylesheet" href="{{ asset('ahr/assets/tag_it/jquery.tagit.css')}}">
	<link rel="stylesheet" href="{{ asset('ahr/assets/tag_it/tagit.ui-zendesk.css')}}">
	<script src="{{ asset('ahr/assets/tag_it/tag-it.js')}}"></script>
	
	<!-- select2 -->
	<link href="{{ asset('ahr/assets/select2/css/select2.css')}}" rel="stylesheet" />
	<script src="{{ asset('ahr/assets/select2/js/select2.js')}}"></script>
    <!-- bootstrap-sweetalert -->
    <script src="{{ asset('ahr/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('ahr/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- chart.js -->
    <script src="{{ asset('ahr/assets/js/Chart.min.js')}}"></script>
    <!-- test fily -->
    <link rel="stylesheet" href="{{ asset('ahr/assets/default_css/main.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">

</head>
<script>

$(document).ready(function() {
    $('#myTabs a:last').click(function () {
		 myRadarChart();
	});
	 
});
</script>
<style>
	#header .clearfix .container{
		padding-left:0px !important;
	}
</style>
<body style="min-width:1260px;">

		<!-- header -->
		<section id="header" class="top-header" style="position:fixed; top:0px; width:100% margin:auto; box-shadow: 0px 6px 10px -3px #9B9B9B;">
	        <header class="clearfix" style="margin:auto; padding-left:20px;">

	            <!-- Logo -->
	            <div class="logo">
	                <a href="#/">
	                    <span><a href="#"><img src="{{ asset('assets/img/logo.png')}}" height="40"></a></span>
	                </a>
	            </div>

	            <div class="top-nav">
	                <ul class="nav-left list-unstyled">

	                    <li class="dropdown" dropdown is-open="isopenComment">
	                        <a href="javascript:;" class="dropdown-toggle member-icon" dropdown-toggle ng-disabled="disabled">
	                            <span class="badge badge-success"></span>
	                        </a>
	                        <div class="dropdown-menu with-arrow panel panel-default">
	                            <div class="panel-heading">
	                                You have 2 messages.
	                            </div>
	                            <ul class="list-group">
	                                <li class="list-group-item">
	                                    <a href="javascript:;" class="media">
	                                        <span class="media-left media-icon">
	                                            <span class="round-icon sm bg-info"><i class="fa fa-comment-o"></i></span>
	                                        </span>
	                                        <div class="media-body">
	                                            <span class="block">Jane sent you a message</span>
	                                            <span class="text-muted">3 hours ago</span>
	                                        </div>
	                                    </a>
	                                </li>
	                                <li class="list-group-item">
	                                    <a href="javascript:;" class="media">
	                                        <span class="media-left media-icon">
	                                            <span class="round-icon sm bg-danger"><i class="fa fa-comment-o"></i></span>
	                                        </span>
	                                        <div class="media-body">
	                                            <span class="block">Lynda sent you a mail</span>
	                                            <span class="text-muted">9 hours ago</span>
	                                        </div>
	                                    </a>
	                                </li>
	                            </ul>
	                            <div class="panel-footer">
	                                <a href="javascript:;">Show all messages.</a>
	                            </div>
	                        </div>
	                    </li>
	                    <li class="dropdown" dropdown is-open="isopenEmail">
	                        <a href="javascript:;" class="dropdown-toggle mail-icon" dropdown-toggle>
	                        	@if($notice_count > 0)
	                            <span class="badge badge-info">{{$notice_count}}</span>
	                            @endif
	                        </a>
	                        <div class="dropdown-menu with-arrow panel panel-default">
	                        </div>
	                    </li>
	                    <li class="dropdown" dropdown is-open="isopeBell">
	                        <a href="javascript:;" class="dropdown-toggle ie-icon" dropdown-toggle ng-disabled="disabled">
	                            <span class="badge badge-warning"></span>
	                        </a>
	                        <div class="dropdown-menu with-arrow panel panel-default">
	                            <div class="panel-heading">
	                                You have 3 notifications.
	                            </div>
	                            <ul class="list-group">
	                            </ul>
	                            <div class="panel-footer">
	                                <a href="javascript:;">Show all notifications.</a>
	                            </div>
	                        </div>
	                    </li>
	                </ul>
					<!-- right -->
	                <ul class="nav-right pull-right list-unstyled">
	                    <li class="dropdown langs text-normal" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
	                         <!--  <form class="navbar-form navbar-right" role="search" style="margin-top:0px;">
				    	        <div class="form-group">
				    	          <input type="text" class="form-control" placeholder="Search" style="width:100px;">
				    	        </div>
				    	        <button type="submit" class="btn btn-default">Submit</button>
				    	      </form> -->
	                    </li>
	                    <li class="dropdown" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
		    	            <a href="javascript:;" class="dropdown-toggle history-icon">
		    	            </a>
		    	        </li>
	        		    <li class="dropdown">
		    	            <a href="javascript:;" class="dropdown-toggle setting-icon"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	            </a>
		    	            <ul class="dropdown-menu with-arrow pull-right list-langs" aria-labelledby="dropdownMenu1">
		    	            	<li><a href="javascript:;">プロフィールプレビュー</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="{{ url('business/setting') }}">設定</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">お役立情報</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">ヘルプ</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="{{ url('/logout') }}">ログアウト</a></li>
		    	            </ul>
		    	        </li>
	                </ul>
	            </div>

	        </header>
		</section>
		<!-- main -->

        <main style="width:1260px; margin:50px auto;">
        		  @yield('line_menu')
				  @include('bs_sidebar/left_sidebar')
				  @yield('content')
	          	  @include('bs_sidebar/right_sidebar')
        </main>
		<style>
	    footer .line{
	   		width: 1000px;
	   	    margin:auto;
	   	    margin-top: 50px;
	   	    border-bottom: 3px solid #CCC;
	    }
	    footer ul{
			width: 1000px;
			margin: auto;
	    }
	    footer li{
	    	float: left;
	    	list-style: none;
	    	padding: 30px 65px;
	    }
		</style>
		<footer style="width:100%; float:left; margin:auto;">
		    <div class="line"></div>
		    <ul>

		    </ul>
		</footer>


</body>
</html>
