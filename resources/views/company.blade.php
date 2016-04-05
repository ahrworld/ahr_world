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
	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">お気に入り企業</a></li>
	          	    <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">面接日程</a></li>
	          	  </ul>

	          	  <!-- お気に入り企業 Tab panes -->
	          	  <div class="tab-content">
	          	    <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
	          	    	<div class="">
	          	    		<button class="btn btn-default ahr-button_5 active">企業からオファー</button>
	          	    		<button class="btn btn-default ahr-button_5">応募した企業</button>
	          	    		<button class="btn btn-default ahr-button_5">お気に入り</button>
	          	    		<button class="btn btn-default ahr-button_5">足跡</button>
	          	    	</div>
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
	          	    	    <style>
							.ahr-label{
								background: #6BC8F2;
								margin: 0px !important;
								color:#FFF;
								padding: 3px;
								width:70px;
								text-align: center;
								margin-right: 5px !important; 
							}
							.panel-content p{
								margin-bottom: 5px !important;
							}
							.img-thumbnail{
								height: 180px !important;
							}
	          	    	    </style>
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	  		<!-- photo left -->
									<div class="img-left">
			          	    	  	  <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label style="font-size:18px;">○○企業</label>
									  	<label>更新日時:<span>2015/12/11</span></label>
									  	<p><label class="ahr-label">業種</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">仕事内容</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">応募条件</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">給与</label><span>000万円～000万円</span></p>
									    <p><label class="ahr-label">勤務地</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<div class="img-right">
								      <div style="width:150px; float:left;">
									      <button  class="btn btn-default ahr-button_6 ahr-btn-lg">リクエストを送る</button>
								      </div>
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
									  	<label style="font-size:18px;">○○企業</label>
									  	<label>更新日時:<span>2015/12/11</span></label>
									  	<p><label class="ahr-label">業種</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">仕事内容</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">応募条件</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">給与</label><span>000万円～000万円</span></p>
									    <p><label class="ahr-label">勤務地</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<div class="img-right">
								      <div style="width:150px; float:left;">
									      <button  class="btn btn-default ahr-button_6 ahr-btn-lg">リクエストを送る</button>
								      </div>
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- お気に入り企業 tab-panel end -->

					<!-- 選考管理 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
	          	    	<div class="">
	          	    		<button class="btn btn-default ahr-button_5 active">面接日程</button>
	          	    		<button class="btn btn-default ahr-button_5">選考進行中</button>
	          	    		<button class="btn btn-default ahr-button_5">内定企業</button>
	          	    		<button class="btn btn-default ahr-button_5">勤務開始報告</button>
	          	    	</div>
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	  		<!-- photo left -->
									<div class="img-left">
			          	    	  	  <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label style="font-size:18px;">○○企業</label>
									  	<label>更新日時:<span>2015/12/11</span><label class="ahr-label-2">調整中</label></label>
									  	<p><label class="ahr-label">業種</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">仕事内容</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">応募条件</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">給与</label><span>000万円～000万円</span></p>
									    <p><label class="ahr-label">勤務地</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<div class="img-right">
								      <div style="width:150px; float:left;">
									      <button  class="btn btn-default ahr-button_6 ahr-btn-lg">辞退する</button>
								      </div>
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 2 -->
		          	    	<style>
		          	    	.ahr-label-2{
								background: #23ae89;
								margin: 0px !important;
								color:#FFF;
								padding: 3px;
								width:70px;
								text-align: center;
								margin-right: 5px !important; 
								margin-left:5px !important;
							}
							.ahr-label-1{
								background: #6BC8F2;
								margin: 0px !important;
								color:#FFF;
								padding: 3px;
								width:70px;
								text-align: center;
								margin-right: 5px !important; 
								margin-left:5px !important;
							}
		          	    	</style>
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
		          	    	        <!-- photo left -->
									<div class="img-left">
			          	    	  	  <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
									</div>
									<!-- content -->
									<div class="panel-content">
									  	<label style="font-size:18px;">○○企業</label>
									  	<label>更新日時:<span>2015/12/11</span><label class="ahr-label-1">予約済み</label></label>
									  	<p><label class="ahr-label">業種</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">仕事内容</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">応募条件</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <p><label class="ahr-label">給与</label><span>000万円～000万円</span></p>
									    <p><label class="ahr-label">勤務地</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									</div>
									<div class="img-right">
								      <div style="width:150px; float:left;">
									      <button  class="btn btn-default ahr-button_6 ahr-btn-lg">辞退する</button>
								      </div>
		          	    	  		</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 選考管理 tab-panel end -->

					
	          	  </div><!-- tab-content end -->
	        </div>
        </main>

@include('layouts.footer')
