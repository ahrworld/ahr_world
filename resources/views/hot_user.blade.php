<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- select2 -->
	<link href="{{ asset('ahr/assets/select2/css/select2.css')}}" rel="stylesheet" />
	<script src="{{ asset('ahr/assets/select2/js/select2.js')}}"></script>
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
<script>
$(document).ready(function() {
	    $(".js-example-basic-multiple").select2({
	        //closeOnSelect:false,
	        placeholder: "職種から選ぶ",
	    	maximumSelectionLength: 5
	    });
	    $(".js-example-basic-single").select2({
	        //closeOnSelect:false,
	        placeholder: "言語",
	        allowClear: true
	    });
	    $(".js-example-basic-single1").select2({
	        //closeOnSelect:false,
	        placeholder: "年齢",
	        allowClear: true
	    });
	    $(".js-example-basic-single2").select2({
	        //closeOnSelect:false,
	        placeholder: "年齢",
	        allowClear: true
	    });
});
</script>
</head>
<body data-ng-app="app" id="app" data-custom-background data-off-canvas-nav>
		<!-- header -->
		<section id="header" class="top-header" style="box-shadow: 0px 6px 10px -3px #9B9B9B;">
	        <header class="clearfix">


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
	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">おすすめ求職者</a></li>
	          	    <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">AHRおすすめ</a></li>
	          	  </ul>

	          	  <!-- おすすめ求職者 Tab panes -->
	          	  <div class="tab-content">
	          	    <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
	          	    	<div class="" style="margin:auto; width:875px;">
							<select style="width:400px;" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
							  <optgroup label="Alaskan/Hawaiian Time Zone">
							    <option value="AK">Alaska</option>
							    <option value="HI">Hawaii</option>
							  </optgroup>
							  <optgroup label="Pacific Time Zone">
							    <option value="CA">California</option>
							    <option value="NV">Nevada</option>
							    <option value="OR">Oregon</option>
							    <option value="WA">Washington</option>
							  </optgroup>
							  <optgroup label="Mountain Time Zone">
							    <option value="AZ">Arizona</option>
							    <option value="CO">Colorado</option>
							    <option value="ID">Idaho</option>
							    <option value="MT">Montana</option>
							  </optgroup>
							  <optgroup label="Central Time Zone">
							    <option value="AL">Alabama</option>
							    <option value="AR">Arkansas</option>
							    <option value="IL">Illinois</option>
							    <option value="IA">Iowa</option>
							    <option value="KS">Kansas</option>
							  </optgroup>
							  <optgroup label="Eastern Time Zone">
							    <option value="CT">Connecticut</option>
							    <option value="DE">Delaware</option>
							    <option value="FL">Florida</option>
							  </optgroup>
							</select>
							<select style="width:100px;" class="js-example-basic-single" >
							    <option value="AK">中国語</option>
							    <option value="HI">英語</option>
							    <option value="HI">日本語</option>
							    <option value="HI">ベトナム語</option>
							</select>
							<select style="width:100px;" class="js-example-basic-single1" >
							    <option value="22">20歲</option>
							    <option value="33">21歲</option>
							    <option value="HI">22歲</option>
							    <option value="HI">23歲</option>
							</select>
							<span class="ahr-mark">～</span>
							<select style="width:100px;" class="js-example-basic-single2" >
							    <option value="AK">30歲</option>
							    <option value="HI">31歲</option>
							    <option value="HI">32歲</option>
							    <option value="HI">33歲</option>
							</select>
							<button class="ahr-button">檢&nbsp;&nbsp;&nbsp;索</button>
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
	          	    </div><!-- おすすめ求職者 tab-panel end -->


					<!-- AHRおすすめ Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
	          	        <div class="" style="margin:auto; width:875px;">
							<select style="width:400px;" class="js-example-basic-multiple js-states form-control select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
							  <optgroup label="Alaskan/Hawaiian Time Zone">
							    <option value="AK">Alaska</option>
							    <option value="HI">Hawaii</option>
							  </optgroup>
							  <optgroup label="Pacific Time Zone">
							    <option value="CA">California</option>
							    <option value="NV">Nevada</option>
							    <option value="OR">Oregon</option>
							    <option value="WA">Washington</option>
							  </optgroup>
							  <optgroup label="Mountain Time Zone">
							    <option value="AZ">Arizona</option>
							    <option value="CO">Colorado</option>
							    <option value="ID">Idaho</option>
							    <option value="MT">Montana</option>
							  </optgroup>
							  <optgroup label="Central Time Zone">
							    <option value="AL">Alabama</option>
							    <option value="AR">Arkansas</option>
							    <option value="IL">Illinois</option>
							    <option value="IA">Iowa</option>
							    <option value="KS">Kansas</option>
							  </optgroup>
							  <optgroup label="Eastern Time Zone">
							    <option value="CT">Connecticut</option>
							    <option value="DE">Delaware</option>
							    <option value="FL">Florida</option>
							  </optgroup>
							</select>
							<button class="ahr-button">檢&nbsp;&nbsp;&nbsp;索</button>
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
	          	    </div><!-- AHRおすすめ tab-panel end -->

	          	  </div><!-- tab-content end -->

	        </div>
        </main>


</body>
</html>