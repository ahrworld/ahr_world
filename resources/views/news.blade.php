<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- bootstrap -->
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <!-- ahr -->
    <script src="ahr/assets/js/ahr.js"></script>
    <link rel="stylesheet" href="assets/css/ahr.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- test fily -->
    <link rel="stylesheet" href="{{ asset('ahr/assets/default_css/main.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">

</head>
<body data-ng-app="app" id="app" data-custom-background data-off-canvas-nav>
		<!-- header -->
		<section id="header" class="top-header" style="box-shadow: 0px 6px 10px -3px #9B9B9B;">
	        <header class="clearfix">
	            <a href="#/" data-toggle-min-nav
	                         class="toggle-min"
	                         ><i class="fa fa-bars"></i></a>

	            <!-- Logo -->
	            <div class="logo">
	                <a href="#/">
	                    <span><a href="#"><img src="assets/img/logo.png" height="40"></a></span>
	                </a>
	            </div>

	            <div class="top-nav">
	                <ul class="nav-left list-unstyled">

	                    <li class="dropdown" dropdown is-open="isopenComment">
	                        <a href="javascript:;" class="dropdown-toggle member-icon" dropdown-toggle ng-disabled="disabled">
	                            <span class="badge badge-success">2</span>
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
	                            <span class="badge badge-info">3</span>
	                        </a>
	                        <div class="dropdown-menu with-arrow panel panel-default">
	                        </div>
	                    </li>
	                    <li class="dropdown" dropdown is-open="isopeBell">
	                        <a href="javascript:;" class="dropdown-toggle ie-icon" dropdown-toggle ng-disabled="disabled">
	                            <span class="badge badge-warning">3</span>
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
	        		            <li class="dropdown" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
		    	            <a href="javascript:;" class="dropdown-toggle setting-icon" dropdown-toggle ng-disabled="disabled">
		    	            </a>
		    	            <ul class="dropdown-menu with-arrow pull-right list-langs" role="menu">
		    	            	<li><a href="javascript:;">プロフィールプレビュー</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">設定</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">お役立情報</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">ヘルプ</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">ログアウト</a></li>
		    	            </ul>
		    	        </li>

	                </ul>
	            </div>
	        </header>
		</section>
		<!-- main -->
        <main style="margin-top:80px;">
	        <div class="container">
	          	  <!-- Nav tabs -->
	          	  <ul class="nav nav-tabs" role="tablist">
	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">応募者管理</a></li>
	          	    <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">選考管理</a></li>
	          	    <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">面接管理</a></li>
	          	  </ul>

	          	  <!-- 応募者管理 Tab panes -->
	          	  <div class="tab-content">
	          	    <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
	          	    	<div class="">
	          	    		<button class="btn btn-default ahr-button_5 active">新着応募者</button>
	          	    		<button class="btn btn-default ahr-button_5">お気に入り登録者</button>
	          	    		<button class="btn btn-default ahr-button_5">保 留</button>
	          	    		<button class="btn btn-default ahr-button_5">足 跡</button>
	          	    	</div>
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	  		<!-- photo left -->
									<div class="img-left">
			          	    	  	  <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label>Name:<span>○○○○○</span></label>
									  	<label>ID:<span>○○○○○</span></label>
									  	<p>最終学歴:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>学部:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>言語レベル:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>夢:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<!-- ? right -->
								    <div class="img-right">
								      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 2 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	        <!-- photo left -->
									<div class="img-left">
			          	    	  	  <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label>Name:<span>○○○○○</span></label>
									  	<label>ID:<span>○○○○○</span></label>
									  	<p>最終学歴:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>学部:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>言語レベル:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>夢:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<!-- ? right -->
								    <div class="img-right">
								      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 応募者管理 tab-panel end -->

					<!-- 選考管理 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
	          	    	<div class="">
	          	    		<button class="btn btn-default ahr-button_5 active">面接調整中</button>
	          	    		<button class="btn btn-default ahr-button_5">逆オファー中</button>
	          	    	</div>
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	  		<!-- photo left -->
									<div class="img-left">
			          	    	  	  <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label>Name:<span>○○○○○</span></label>
									  	<label>ID:<span>○○○○○</span></label>
									  	<p>最終学歴:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>学部:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>言語レベル:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>夢:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<!-- ? right -->

								    <div class="img-right">
								      <div style="width:150px; float:left;">
									      <div class="dropdown">
									        <button class="btn btn-default dropdown-toggle ahr-dropdown-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									          面接調整中
									          <span class="caret" style="float:right; margin-top:5px;"></span>
									        </button>
									        <ul class="dropdown-menu ahr-dropdown-menu" aria-labelledby="dropdownMenu1">
									          <li><a href="#">面接調整中</a></li>
									          <li role="separator" class="divider"></li>
									          <li><a href="#">早く</a></li>
									          <li role="separator" class="divider"></li>
									          <li><a href="#">NG</a></li>
									        </ul>
									      </div>
									      <button class="btn btn-default ahr-button_6 ahr-btn-lg">スケジュール公開中</button>
								      </div>
								      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 選考管理 tab-panel end -->

					<!-- 面接管理 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
	          	    	<div class="">
	          	    		<button class="btn btn-default ahr-button_5 active">面接調整完了者</button>
	          	    		<button class="btn btn-default ahr-button_5">選考進行中</button>
	          	    		<button class="btn btn-default ahr-button_5">内定確定者</button>
	          	    	</div>
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	  		<!-- photo left -->
									<div class="img-left">
			          	    	  	  <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label>Name:<span>○○○○○</span></label>
									  	<label>ID:<span>○○○○○</span></label>
									  	<p>最終学歴:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>学部:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>言語レベル:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p>夢:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<!-- ? right -->

								    <div class="img-right">
								      <div style="width:150px; float:left;">
									      <div class="dropdown">
									        <button class="btn btn-default dropdown-toggle ahr-dropdown-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									          進行中
									          <span class="caret" style="float:right; margin-top:5px;"></span>
									        </button>
									        <ul class="dropdown-menu ahr-dropdown-menu" aria-labelledby="dropdownMenu1">
									          <li><a href="#">進行中</a></li>
									          <li role="separator" class="divider"></li>
									          <li><a href="#">不採用</a></li>
									          <li role="separator" class="divider"></li>
									          <li><a href="#">內定出し</a></li>
									        </ul>
									      </div>
									      <button class="btn btn-default ahr-button_6 ahr-btn-lg">スケジュール公開中</button>
									      <button class="btn btn-default ahr-label-blue ahr-btn-lg">メールBOXへ</button>
								      </div>
								      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 面接管理 tab-panel end -->
	          	  </div><!-- tab-content end -->
	        </div>
        </main>

@include('layouts.footer')
