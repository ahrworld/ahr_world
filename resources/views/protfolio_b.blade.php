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
<style>
	
</style>
        <main style="margin-top:80px;">
	        <div class="container">
	          	  <!-- Nav tabs -->
	          	  <ul id="myTabs" class="nav nav-tabs" role="tablist">
	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">プロフィール</a></li>
	          	    <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">MY ポートフォリオ</a></li>
	          	    <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">自己紹介・分析</a></li>
	          	  </ul>

	          	  <!-- プロフィール Tab panes -->
	          	  <div class="tab-content">
	          	    <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="a1">
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
									  	<button class="btn btn-default">履歴書ダウンロード</button>
									  	<div>&nbsp;</div>
									  	<p>XXX<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
									    <button class="btn btn-default">作品情報有り</button>
									    <button class="btn btn-default">作品情報無り</button>
									    <div>&nbsp;</div>
									    <p><span class="red-color">※3か月以内に撮影した写真(〇正装、✕学生服、✕野外写真)のアップロードをお願いします。</span></p>
									</div>
									<!-- ? right -->

		          	    	  </div>
		          	    	</div>
		          	    	<!-- 2 -->
		          	    	<style>
							.user-view_table th{
								font-size:12px;
								padding-top:10px;
							}
							.user-view_table td{
								padding-top:10px;
							}
		          	    	</style>
		          	    	<!-- 3 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6 style="margin-bottom:0px !important;">■　基本情報</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table">
			          	    	  	    	<tbody>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">氏名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">英語名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">フリガナ</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">国籍</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">性別</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">生年月日</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">現住所</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">E-mail</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">電話番号</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		　　　　　
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 4 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　学歴</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table">
			          	    	  	    	<tbody>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">学位</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">最終学歴</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">専攻</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">卒業年度(予定)</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">兵役経験（男性）</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>

			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 5 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　語学スキル</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table">
			          	    	  	    	<tbody>

			          	    	  	    		<tr>
			          	    	  	    			<th width="120px"><span style="color:#000;">・母語レベル</span><br>【日本語】保持資格</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px"><span style="color:#000;">・ビジネスレベル</span><br>【日本語】保持資格</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px"><span style="color:#000;">・日常会話レベル</span><br>【日本語】保持資格</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px"><span style="color:#000;">・初級レベル</span><br>【日本語】保持資格</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 6 -->
							<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　IT/WEBスキル</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table">
			          	    	  	    	<tbody>
			          	    	  	    	    <tr>
			          	    	  	    			<th width="120px" style="color:#000;">【プログラマー】</th>
			          	    	  	    			<td></td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="250px">・実務レベル（３年以上の実務経験）</th>
			          	    	  	    			<td>：C言語・C + +・Perl</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">・中級（１～３年の実務経験）</th>
			          	    	  	    			<td>：C言語・C + +・Perl</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">・学習中（実務経験なし）</th>
			          	    	  	    			<td>：C言語・C + +・Perl</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px" style="color:#000;">【デザイナー】</th>
			          	    	  	    			<td></td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="250px">・実務レベル（３年以上の実務経験）</th>
			          	    	  	    			<td>：HTML・JavaScript・Photoshop</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">・中級（１～３年の実務経験）</th>
			          	    	  	    			<td>：HTML・JavaScript・Photoshop</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">・学習中（実務経験なし）</th>
			          	    	  	    			<td>：HTML・JavaScript・Photoshop</td>
			          	    	  	    		</tr>

			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 7 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　職務経歴書</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table">
			          	    	  	    	<tbody>
			          	    	  	    	    <tr>
			          	    	  	    			<th width="150px" style="color:#000;">【現職・最新】</th>
			          	    	  	    			<td></td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">会社名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">期間</th>
			          	    	  	    			<td>：○○○○年　○○月　～　○○○○年　○○月</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">勤務地</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">職種</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">業務内容</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">給料（NTD）/月</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px" style="color:#000;">【現職・最新】</th>
			          	    	  	    			<td></td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">会社名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">期間</th>
			          	    	  	    			<td>：○○○○年　○○月　～　○○○○年　○○月</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">勤務地</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">職種</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">業務内容</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">給料（NTD）/月</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 8 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　海外経験</h6>
			          	    	  	  <div class="panel-content" >
			          	    	  	    <table class="user-view_table" >
			          	    	  	    	<tbody>
			          	    	  	    	    <tr>
			          	    	  	    			<th width="150px" style="color:#000;">【現在・最新】</th>
			          	    	  	    			<td></td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">目的</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">機関名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">学年、学部、業務内容</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">国名・地方名</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">期間</th>
			          	    	  	    			<td>：○○○○年　○○月　～　○○○○年　○○月</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 9 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　自分の強み</h6>
			          	    	  	  <div class="panel-content" >
			          	    	  	    <table class="user-view_table" >
			          	    	  	    	<tbody>
			          	    	  	    	    <tr>
			          	    	  	    			<th colspan="2" style="color:#000;">WEBデザイナー・ディレクターとしてディーラー向けキャンペーンサイトの作成や大手ECサイトのデザイン、化粧品会社のコーポレートサイトのリニューアル案件を経験。
企画 / 提案書作成 / サイト構成 / ワイヤーラフの作成や、WEBデザイン（一部コーディング）など、幅広い経験を積んできました。
直接取引の案件も多く、顧客担当としてクライアントの窓口となり、案件全体のコントロールも行いました。</th>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【スキル】使用ツール／環境</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【使用ソフト】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【勤務先会社名】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="150px">【雇用形態】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【事業内容】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【業務内容】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">【トピックス】</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 10 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■　将来の夢・目標</h6>
			          	    	  	  <div class="panel-content" >
			          	    	  	    <table class="user-view_table" >
			          	    	  	    	<tbody>
			          	    	  	    	    <tr>
			          	    	  	    			<th colspan="2" style="color:#000;">WEBデザイナー・ディレクターとしてディーラー向けキャンペーンサイトの作成や大手ECサイトのデザイン、化粧品会社のコーポレートサイトのリニューアル案件を経験。
企画 / 提案書作成 / サイト構成 / ワイヤーラフの作成や、WEBデザイン（一部コーディング）など、幅広い経験を積んできました。
直接取引の案件も多く、顧客担当としてクライアントの窓口となり、案件全体のコントロールも行いました。</th>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- end -->
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- プロフィール tab-panel end -->

					<!-- MY ポートフォリオ Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel fade" id="a2">
	          	    	<div class="wrapper">
		          	    	<!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									  <h6>■　作品</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <table class="user-view_table" >
			          	    	  	    	<tbody>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">URL</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">Title</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="120px">說明</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									   <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
			          	    	  	      <iframe style="padding:20px;" class="embed-responsive-item" src="https://www.youtube.com/embed/PEyvQXSLVgg"></iframe>
			          	    	  	   </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- end -->
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- MY ポートフォリオ tab-panel end -->

					<!-- 自己紹介・分析 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel fade" id="a3">

	          	    	<div class="wrapper">
		          	    	<!-- 2 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
									<div class="col-md-12">
										<h6>■　自己分析「○○○○」タイプです。</h6>
										<div style="width:400px; margin:auto;">
											<canvas id="canvas" height="500" width="500"></canvas>
										</div>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 3 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
									<div class="col-md-12">
									<h6>■ ブログ</h6>
			          	    	  	  <div class="panel-content" >
			          	    	  	    <table class="user-view_table" >
			          	    	  	    	<tbody>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">Title</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		<tr>
			          	    	  	    			<th width="170px">Sub Title</th>
			          	    	  	    			<td>：○○○○○○○</td>
			          	    	  	    		</tr>
			          	    	  	    		 <tr>
			          	    	  	    			<td colspan="2" style="color:#000;">
			          	    	  	    			○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○
			          	    	  	    			○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○
			          	    	  	    			</td>
			          	    	  	    		</tr>
			          	    	  	    	</tbody>
			          	    	  	    </table>
									  </div>
									</div>
								</div><!-- row end -->
		          	    	  </div>
		          	    	</div>
		          	    	<!-- end -->
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 自己紹介・分析 tab-panel end -->
	          	  </div><!-- tab-content end -->
	          
	        </div>
        </main>

<footer style="height:100px;">

</footer>

@include('layouts.footer')
