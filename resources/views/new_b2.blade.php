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
    <!-- chart.js -->
    <script src="ahr/assets/js/Chart.min.js"></script>
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
	 var ctx = $("#canvas").get(0).getContext("2d");

     var radarChartData = {
    		  	labels: ["特定專門", "生活樣式", "挑戰客服", "奉仕貢獻", "創意創業", "安全安定", "自由自立", "縂合管理"],
    		  	datasets: [
    		  		{
    		  			label: "My First dataset",
    		  			fillColor: "rgba(220,220,220,0.2)",
    		  			strokeColor: "rgba(220,220,220,1)",
    		  			pointColor: "rgba(220,220,220,1)",
    		  			pointStrokeColor: "#fff",
    		  			pointHighlightFill: "#fff",
    		  			pointHighlightStroke: "rgba(220,220,220,1)",
    		  			data: [65,59,90,81,56,55,40,40]
    		  		},
    		  		{
    		  			label: "My Second dataset",
    		  			fillColor: "rgba(151,187,205,0.2)",
    		  			strokeColor: "rgba(151,187,205,1)",
    		  			pointColor: "rgba(151,187,205,1)",
    		  			pointStrokeColor: "#fff",
    		  			pointHighlightFill: "#fff",
    		  			pointHighlightStroke: "rgba(151,187,205,1)",
    		  			data: [28,48,40,19,96,27,100,100]
    		  		}
    		  	]
    		  };

     var myRadarChart = new Chart(ctx).Radar(radarChartData, {
         pointDot: false
     });

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
<body data-ng-app="app" id="app" data-custom-background data-off-canvas-nav>
		<!-- header -->
		<section id="header" class="top-header" style="box-shadow: 0px 6px 10px -3px #9B9B9B;">
	        <header class="clearfix">
				<div class="container">

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
	            </div> <!-- end contanier -->
	        </header>
		</section>
		<!-- main -->
<style>
	body{
		/*overflow-x: hidden;
    	overflow-y: hidden;*/
	}
	.scorl{
		/*overflow-y:scroll;
		height: 90vh;*/
	}
	.ahr-panel{

	}
</style>
        <main style="margin-top:80px;">
	        <div class="container">
				<div class="row">
				@include('left_sidebar')
				<div class="col-sm-7 scorl">

	          	  <!-- Nav tabs -->
	          	  	          	  <ul class="nav nav-tabs" role="tablist">
	          	  	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報編集</a></li>
	          	  	          	    <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報編集</a></li>
	          	  	          	    <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
	          	  	          	    <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程編集</a></li>
	          	  	          	  </ul>

	          	  	          	  <!-- プロフィール Tab panes -->
	          	  	          	  <div class="tab-content">
	          	  	          	    <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="a1">
	          	  	          	    	<div class="wrapper">

	          	  		          	    	<div class="panel panel-default">
	          	  		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
	          	  								<div class="row">
	          	  		          	    	  		<!-- logo left -->
	          	  								</div><!-- row end -->
	          	  		          	    	  </div>
	          	  		          	    	</div>
	          	  		          	    	<!-- end -->
	          	  	          	    	</div><!-- wrapper end -->
	          	  	          	    </div><!-- プロフィール tab-panel end -->

	          	  					<!-- MY ポートフォリオ Tab panes -->
	          	  	          	    <div role="tabpanel" class="tab-pane ahr-panel fade" id="a2">
	          	  	          	    	<div class="wrapper">
	          	  	          	    	</div><!-- wrapper end -->
	          	  	          	    </div><!-- MY ポートフォリオ tab-panel end -->

	          	  					<!-- 自己紹介・分析 Tab panes -->
	          	  	          	    <div role="tabpanel" class="tab-pane ahr-panel fade" id="a3">

	          	  	          	    	<div class="wrapper">
	          	  	          	    	</div><!-- wrapper end -->
	          	  	          	    </div><!-- 自己紹介・分析 tab-panel end -->
	          	  	          	  </div><!-- tab-content end -->
	          	  </div><!-- colmd9 end -->
	          	  @include('right_sidebar')
				</div><!-- row end -->
	        </div>
        </main>

<footer style="height:100px;">

</footer>

@include('layouts.footer')
