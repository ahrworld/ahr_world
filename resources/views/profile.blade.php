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
    <!-- fullcalendar -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.print.css">
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">

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
	          	    <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報編集</a></li>
	          	    <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報編集</a></li>
	          	    <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
	          	    <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程編集</a></li>
	          	  </ul>

	          	  <!-- 企業情報編集 Tab panes -->
	          	  <div class="tab-content">
	          	    <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-2">
			          	    	  	  <span class="img-thumbnail" style="width:100%; height:150px;"></span>
									</div>
									<!-- video -->
									<div class="col-md-10">
										<span class="img-thumbnail" style="width:100%; height:150px;"></span>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 2 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■どんな仕事をする会社？</h6>
			          	    	  	  <div class="panel-content">
									  	<label style="font-size:13px;">国名:<span>○○○○○</span></label>
									  	<label style="font-size:13px;">会社名:<span>○○○○○</span></label>
									  	<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									  </div>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 3 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
		          	    	  		<!-- logo left -->
									<div class="col-md-12">
									<h6>■会社のコンセプト・仕事の流れは？</h6>
			          	    	  	  <div class="panel-content">
			          	    	  	    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									  	<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									  </div>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 4 -->
		          	    	<h6>■会社概要<span class="red-color">※マークは必須項目です。</span></h6>
		          	    	<table class="table table-bordered ahr-table">
		          	    		<tbody>
		          	    			<tr>
		          	    			<th scope="row" width="30%">本社所在地<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">企業URL<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">社員国籍<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">創業・設立</th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">総従業員数</th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">資本金</th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">売上高</th>
		          	    			<td></td>
		          	    			</tr>
		          	    		</tbody>
		          	    	</table>
		          	    	<!-- 5 -->
		          	    	<h6>■雇用条件<span class="red-color">※マークは必須項目です。（正社員）</span></h6>
		          	    	<table class="table table-bordered ahr-table">
		          	    		<tbody>
		          	    			<tr>
		          	    			<th scope="row" width="30%">勤務地<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">勤務時間<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">給与<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">福利厚生<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">休日休暇<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">諸手当<span class="red-color">※</span></th>
		          	    			<td></td>
		          	    			</tr>
		          	    			<tr>
		          	    			<th scope="row" width="30%">教育制度</th>
		          	    			<td></td>
		          	    			</tr>
		          	    		</tbody>
		          	    	</table>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 企業情報編集 tab-panel end -->
					<!-- 採用情報編集 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
	          	    	<div class="wrapper">
	          	    	    <div class="row">
				          	    <div class="col-md-12">
	  	    	                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  	    	                     <div class="panel panel-default">
	  	    	                       <div class="panel-heading" role="tab" id="headingOne">
	  	    	                         <h4 class="panel-title">
	  	    	                           <span>1</span>
	  	    	                           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	  	    	                             Webクリエイター
	  	    	                           </a>
	  	    	                           <i class="fa fa-caret-up float-right"></i>
	  	    	                         </h4>
	  	    	                       </div>
	  	    	                       <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	  	    	                         <div class="panel-body">
	  	    	                         <table class="table table-bordered ahr-table">
	  	    	                         	<tbody>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">募集職種</th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">職務内容</th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">雇用形態<br><span style="font-size:12px;">（複数選択可）</span></th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">募集経歴<br><span style="font-size:12px;">（複数選択可）</span></th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">募集学科</th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         		<tr>
	  	    	                         		<th scope="row" width="30%">必須技能・資格</th>
	  	    	                         		<td></td>
	  	    	                         		</tr>
	  	    	                         	</tbody>
	  	    	                         </table>
	  	    	                         </div>
	  	    	                       </div>
	  	    	                     </div>
	  	    	                     <div class="panel panel-default">
	  	    	                       <div class="panel-heading" role="tab" id="headingTwo">
	  	    	                         <h4 class="panel-title">
	  	    	                           <span>2</span>
	  	    	                           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
	  	    	                             プログラマー
	  	    	                           </a>
	  	    	                           <i class="fa fa-caret-down float-right"></i>
	  	    	                         </h4>
	  	    	                       </div>
	  	    	                       <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	  	    	                         <div class="panel-body">
	  	    	                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	  	    	                         </div>
	  	    	                       </div>
	  	    	                     </div>
	  	    	                     <div class="panel panel-default">
	  	    	                       <div class="panel-heading" role="tab" id="headingThree">
	  	    	                         <h4 class="panel-title">
	  	    	                           <span>3</span>
	  	    	                           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
	  	    	                             ディレクター
	  	    	                           </a>
	  	    	                           <i class="fa fa-caret-down float-right"></i>
	  	    	                         </h4>
	  	    	                       </div>
	  	    	                       <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	  	    	                         <div class="panel-body">
	  	    	                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	  	    	                         </div>
	  	    	                       </div>
	  	    	                     </div>
	  	    	                   </div>
		  	    	            </div>
		  	    	        </div><!-- row end -->
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 採用情報編集 tab-panel end -->

					<!-- 企業カラー Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a3">

	          	    	<div class="wrapper">
	          	    	    <!-- 1 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body">
								<div class="row">
									<!-- video -->
									<div class="col-md-12">
										<span class="img-thumbnail" style="width:100%; height:150px;"></span>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
		          	    	<!-- 2 -->
		          	    	<div class="panel panel-default">
		          	    	  <div class="panel-body" style="padding-top: 0px !important;">
								<div class="row">
									<div class="col-md-12">
									<table style="margin-bottom:20px;">
										<tbody>
											<tr>
												<th style="text-align:right !important; font-size:14px; padding-top:15px;">Title:</th>
												<td ></td>
											</tr>
											<tr>
												<th style="text-align:right !important; font-size:14px; padding-top:15px;">Sub Title:</th>
												<td></td>
											</tr>
										</tbody>
									</table>
			          	    	  	  <div class="panel-content">
									  	<label style="font-size:14px;">內容:</label>
									  	<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
									  </div>
									</div>
								</div>
		          	    	  </div>
		          	    	</div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 企業カラー tab-panel end -->
					<script>
						$(document).ready(function() {

						    // page is now ready, initialize the calendar...

						    $('#calendar').fullCalendar({
						        // put your options and callbacks here
						    })

						});
					</script>
	          	    <!-- 面接日程 Tab panes -->
	          	    <div role="tabpanel" class="tab-pane ahr-panel" id="a4">

	          	    	<div class="wrapper">
	          	    	    <div id='calendar'></div>
	          	    	</div><!-- wrapper end -->
	          	    </div><!-- 面接日程 tab-panel end -->
	          	  </div><!-- tab-content end -->


	        </div>
        </main>
<footer style="height:100px;">

</footer>
@include('layouts.footer')
