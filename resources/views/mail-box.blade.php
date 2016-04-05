@include('layouts.success_header')
<style>
	body{
		overflow-x: hidden;
    	overflow-y: hidden;
	}
</style>
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
        <main>
			 <div tyle="background:#FFF; height:100vh; ">
				<div class="panel panel-default" style="width:100%; border:0px; background:#FFF !Important; margin:auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body ahr-panel_mail">
				  		<div class="row" style="text-align:center;">
				  		  <div class="col-md-12">
				  		  	    	    <div class="row" style="margin-left:5px;">
				  		  	    	    	<!-- status1 -->
				  		  	    	    	<div class="col-sm-12 label-status inbox-status">
				  		  	    	                    <span class="fa fa-circle color-label_1 pull-left">
				  		  	    	                        <span class="font">リクエスト</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_2 pull-left">
				  		  	    	                        <span class="font">面接</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_3 pull-left">
				  		  	    	                        <span class="font">選考</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_4 pull-left">
				  		  	    	                        <span class="font">内定</span>
				  		  	    	                    </span>
				  		  	    	    	</div>
				  		  	    	    	<!-- status2 -->
				  		  	    	    	<div class="col-sm-12 label-status notice-status none">
				  		  	    	                    <span class="fa fa-circle color-label_5 pull-left">
				  		  	    	                        <span class="font">新規</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_2 pull-left">
				  		  	    	                        <span class="font">面接</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_4 pull-left">
				  		  	    	                        <span class="font">内定</span>
				  		  	    	                    </span>
				  		  	    	                    <span class="fa fa-circle color-label_6 pull-left">
				  		  	    	                        <span class="font">辞退</span>
				  		  	    	                    </span>
				  		  	    	                    
				  		  	    	    	</div>
				  		  	    	    	
				  		  	    		</div>
				  		  	    			<div class="row">
											<!-- list box -->
				  		  	    	        <div class="col-md-3" >
				  		  	    	            <section class="panel panel-default mail-categories">
				  		  	    	                <ul class="list-group">

				  		  	    	                    <li class="list-group-item active list-inbox"><a href="javascript:;">
				  		  	    	                        <i class="fa fa-inbox"></i>受信トレイ
				  		  	    	                        <span class="badge badge-info pull-right">6</span>
				  		  	    	                    </a></li>
				  		  	    	                    <li class="list-group-item list-notice"><a href="javascript:;">
				  		  	    	                        <i class="glyphicon glyphicon-exclamation-sign"></i>お知らせ
				  		  	    	                        <span class="badge badge-success pull-right">9</span>
				  		  	    	                    </a></li>
				  		  	    	                    <li class="list-group-item"><a href="javascript:;">
				  		  	    	                        <i class="fa fa-pencil"></i>非表示メール
				  		  	    	                        <span class="badge badge-warning pull-right">1</span>
				  		  	    	                    </a></li>
				  		  	    	                    <li class="list-group-item"><a href="javascript:;">
				  		  	    	                        <i class="fa fa-star"></i>重要
				  		  	    	                        <span class="badge badge-danger pull-right">3</span>
				  		  	    	                    </a></li>
				  		  	    	                    <li class="list-group-item"><a href="javascript:;">
				  		  	    	                        <i class="fa fa-trash-o"></i>削除
				  		  	    	                    </a></li>
				  		  	    	                </ul>
				  		  	    	            </section>
				  		  	    	        </div>
				  		  	    	        <!-- right mail -->
				  		  	    	        <div class="col-md-9 text-left" style=" padding-left:0px !important;">
				  		  	    	        <!-- mail-inbox -->
				  		  	    	        <div class="mail-inbox">
				  		  	    	        	<div class="btn-group" dropdown is-open="status.isopen1" style="width:100%;　margin-bottom: 15px　!important;">
				  		  	    	        	    <button type="button" class="btn btn-default dropdown-toggle mail-select" dropdown-toggle ng-disabled="disabled">
				  		  	    	        	    	<label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1"><span></span></label> <span class="caret"></span>
				  		  	    	        	    </button>
				  		  	    	        	    <ul class="dropdown-menu" role="menu" style="font-size:12px;">
				  		  	    	        	        <li><a href="javascript:;">すべてチェック</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">選択解除</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">重要</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">非表示</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">表示</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">未読</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">既読</a></li>
				  		  	    	        	    </ul>
				  		  	    	        	    <!-- refresh -->
				  		  	    	        	    <button type="button" class="btn btn-default mail-refresh">
				  		  	    	        	    	<i class="fa fa-repeat"></i>
				  		  	    	        	    </button>
				  		  	    	        	    <!-- next&back -->
				  		  	    	        	    <div class="float-right">
					  		  	    	        	    <span style="margin-right:10px;">1-50(共有113列)</span>
					  		  	    	        	    <button type="button" class="btn btn-default mail-back">
					  		  	    	        	    	<i class="fa fa-angle-left"></i>
					  		  	    	        	    </button>
					  		  	    	        	    <button type="button" class="btn btn-default mail-next">
					  		  	    	        	    	<i class="fa fa-angle-right"></i>
					  		  	    	        	    </button>
				  		  	    	        	    </div>
				  		  	    	        	</div>

												<!-- mail right -->

					  		  	    	        	<ul class="nav nav-tabs" role="tablist">
										  		  	    <li role="presentation" class="active"><a href="#s" aria-controls="s" role="tab" data-toggle="tab">新着メール</a></li>
										  		  	    <li role="presentation"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">重要メール</a></li>
										  		  	</ul>
										  		  	<div class="tab-content" style="overflow-y: scroll;height: 100vh; background:#FFF; border:1px solid 1px solid rgb(0, 148, 229);">
					  		  	   					  <div role="tabpanel" class="tab-pane active" id="s">
						  		  	    	            <section class="panel panel-default mail-container" data-ng-controller="NotifyCtrl">
						  		  	    	                <table class="table table-hover">
						  		  	    	                    <tr class="mail-unread">
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#D54A3C;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#F6C356;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#D54A3C;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#F6C356;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#CCC;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#D54A3C;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px; color:#F6C356;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td>
							  		  	    	                        <label class="ui-checkbox">
								  		  	    	                        <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" >
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-star"></i>
								  		  	    	                        </span>
								  		  	    	                        <span style="margin-right:10px; font-size:16px;">
								  		  	    	                        	<i class="fa fa-bookmark"></i>
								  		  	    	                        </span>
							  		  	    	                        </label>
						  		  	    	                        </td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                </table>
						  		  	    	            </section>
						  		  	    	          </div>
						  		  	    	          <div role="tabpanel" class="tab-pane" id="b">
							  		  	    	          <section class="panel panel-default mail-container">
							  		  	    	          	<table class="table table-hover">
							  		  	    	          	    <tr class="mail-unread">
							  		  	    	          	        <td><label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
							  		  	    	          	        <td>Jane Swift <i class="fa fa-circle color-info"></i></td>
							  		  	    	          	        <td>Nice to meet you</td>
							  		  	    	          	        <td><i class="fa fa-paperclip"></i></td>
							  		  	    	          	        <td>3/11/14 2:30 PM</td>
							  		  	    	          	        <td><i class="fa fa-star"></i></td>
							  		  	    	          	    </tr>

							  		  	    	          	    <tr class="mail-unread">
							  		  	    	          	        <td><label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
							  		  	    	          	        <td>Gmail</td>
							  		  	    	          	        <td>Please confirm your registeration</td>
							  		  	    	          	        <td> </td>
							  		  	    	          	        <td>2/19/14 2:00 PM</td>
							  		  	    	          	        <td><i class="fa fa-star"></i></td>
							  		  	    	          	    </tr>
							  		  	    	          	</table>
							  		  	    	          </section>
						  		  	    	          </div>
						  		  	    	        </div><!-- tab end -->
					  		  	    	        </div><!-- mail-inbox end <-->
					  		  	    	        <!-- お知らせ -->
					  		  	    	     <!-- mail-inbox -->
				  		  	    	        <div class="mail-view">
				  		  	    	        	<div class="btn-group" dropdown is-open="status.isopen1" style="width:100%;　  margin-bottom: 15px;">
				  		  	    	        	    <button type="button" class="btn btn-default dropdown-toggle mail-select" dropdown-toggle ng-disabled="disabled">
				  		  	    	        	    	<label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1"><span></span></label> <span class="caret"></span>
				  		  	    	        	    </button>
				  		  	    	        	    <ul class="dropdown-menu" role="menu" style="font-size:12px;">
				  		  	    	        	        <li><a href="javascript:;">すべてチェック</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">選択解除</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">重要</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">非表示</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">表示</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">未読</a></li>
				  		  	    	        	        <li class="divider"></li>
				  		  	    	        	        <li><a href="javascript:;">既読</a></li>
				  		  	    	        	    </ul>
				  		  	    	        	    <!-- refresh -->
				  		  	    	        	    <button type="button" class="btn btn-default mail-refresh">
				  		  	    	        	    	<i class="fa fa-repeat"></i>
				  		  	    	        	    </button>
				  		  	    	        	    <!-- next&back -->
				  		  	    	        	    <div class="float-right">
					  		  	    	        	    <span style="margin-right:10px;">1-50(共有113列)</span>
					  		  	    	        	    <button type="button" class="btn btn-default mail-back">
					  		  	    	        	    	<i class="fa fa-angle-left"></i>
					  		  	    	        	    </button>
					  		  	    	        	    <button type="button" class="btn btn-default mail-next">
					  		  	    	        	    	<i class="fa fa-angle-right"></i>
					  		  	    	        	    </button>
				  		  	    	        	    </div>
				  		  	    	        	</div>

												<!-- mail right -->

					  		  	    	        	<ul class="nav nav-tabs" role="tablist">
										  		  	    <li role="presentation" class="active"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">お知らせ</a></li>
										  		  	</ul>
										  		  	<div class="tab-content" style="overflow-y: scroll;height: 100vh; background:#FFF; border:1px solid 1px solid rgb(0, 148, 229);">
					  		  	   					  <div role="tabpanel" class="tab-pane active" id="s">
						  		  	    	            <section class="panel panel-default mail-container" data-ng-controller="NotifyCtrl">
						  		  	    	                <table class="table table-hover">
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1"><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Consectetur adipisicing elit.</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star active"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
						  		  	    	                        <td>John Smith <i class="fa fa-circle color-danger"></i></td>
						  		  	    	                        <td>Lorem ipsum dolor sit amet</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/15/14 5:00 AM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star active"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1"><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Consectetur adipisicing elit.</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star active"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star"></i></td>
						  		  	    	                    </tr>
																<tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span><i class="fa fa-star "></i></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
						  		  	    	                        <td>John Smith <i class="fa fa-circle color-danger"></i></td>
						  		  	    	                        <td>Lorem ipsum dolor sit amet</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/15/14 5:00 AM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star active"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1"><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Consectetur adipisicing elit.</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star active"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    <tr>
						  		  	    	                        <td><label class="ui-checkbox"><input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
						  		  	    	                        <td>no-reply</td>
						  		  	    	                        <td>Ea totam libero dignissimos dicta eos</td>
						  		  	    	                        <td> </td>
						  		  	    	                        <td>2/11/14 2:00 PM</td>
						  		  	    	                        <td class="td-star"><i class="fa fa-star"></i></td>
						  		  	    	                    </tr>
						  		  	    	                    
						  		  	    	                </table>
						  		  	    	            </section>
						  		  	    	          </div>
						  		  	    	          <div role="tabpanel" class="tab-pane" id="b">
							  		  	    	          <section class="panel panel-default mail-container">
							  		  	    	          	<table class="table table-hover">
							  		  	    	          	    <tr class="mail-unread">
							  		  	    	          	        <td><label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
							  		  	    	          	        <td>Jane Swift <i class="fa fa-circle color-info"></i></td>
							  		  	    	          	        <td>Nice to meet you</td>
							  		  	    	          	        <td><i class="fa fa-paperclip"></i></td>
							  		  	    	          	        <td>3/11/14 2:30 PM</td>
							  		  	    	          	        <td><i class="fa fa-star"></i></td>
							  		  	    	          	    </tr>

							  		  	    	          	    <tr class="mail-unread">
							  		  	    	          	        <td><label class="ui-checkbox"><input name="checkbox1" type="checkbox" value="option1" ><span></span></label></td>
							  		  	    	          	        <td>Gmail</td>
							  		  	    	          	        <td>Please confirm your registeration</td>
							  		  	    	          	        <td> </td>
							  		  	    	          	        <td>2/19/14 2:00 PM</td>
							  		  	    	          	        <td><i class="fa fa-star"></i></td>
							  		  	    	          	    </tr>
							  		  	    	          	</table>
							  		  	    	          </section>
						  		  	    	          </div>
						  		  	    	        </div><!-- tab end -->
					  		  	    	        </div><!-- mail-inbox end <-->
				
					  		  	    	       
				  		  	    	            <!-- mail view -->
				  		  	    	            <section class="panel panel-default mail-container  none">
				  		  	    	                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> View Mail</strong></div>
				  		  	    	                <div class="panel-body">
				  		  	    	                    <div class="mail-header row">
				  		  	    	                        <div class="col-md-8">
				  		  	    	                            <h3>Nice to meet you</h3>
				  		  	    	                        </div>
				  		  	    	                        <div class="col-md-4">
				  		  	    	                            <div class="pull-right">
				  		  	    	                                <a href="#/mail/compose" class="btn btn-sm btn-primary">Reply <i class="fa fa-mail-reply"></i></a>
				  		  	    	                                <a href="javascript:;" class="btn btn-sm btn-default"><i class="fa fa-print"></i></a>
				  		  	    	                                <a href="javascript:;" class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i></a>
				  		  	    	                            </div>
				  		  	    	                        </div>
				  		  	    	                    </div>
				  		  	    	                    <div class="mail-info">
				  		  	    	                        <div class="row">
				  		  	    	                            <div class="col-md-8">
				  		  	    	                                <strong>Jane Swift</strong> (jane@swift.com) to
				  		  	    	                                <strong>me</strong>
				  		  	    	                            </div>
				  		  	    	                            <div class="col-md-4">
				  		  	    	                                <div class="pull-right">
				  		  	    	                                    2/11/14 2:11 PM
				  		  	    	                                </div>
				  		  	    	                            </div>
				  		  	    	                        </div>
				  		  	    	                    </div>
				  		  	    	                    <div class="mail-content">
				  		  	    	                        <p>Quo, animi, reprehenderit, dolorem obcaecati reiciendis quasi accusamus totam alias sapiente sint tempore quam adipisci temporibus unde odit eveniet eum molestias! Esse, hic ut maxime animi et! Dolores, cum libero pariatur facere nesciunt tempore. Expedita, vel, ut illo magni quis suscipit nisi deserunt enim eaque veniam.</p>
				  		  	    	                        <blockquote>Ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, error, nulla, quia, neque est animi necessitatibus qui vero beatae quae ut laudantium facere consequuntur maiores cupiditate amet vitae magni nihil!<small>Someone famous</small></blockquote>
				  		  	    	                        <p>Officiis, tempore, unde, sint in ut neque alias ad est ex fugit odio nobis nemo dolorem aperiam labore ipsam sapiente optio nostrum perferendis ab. Molestias, </p>
				  		  	    	                        <p>sit, dolorem consequuntur vel quibusdam illum veniam veritatis vitae blanditiis officiis ducimus voluptatibus omnis cum quae tempore porro reiciendis animi dignissimos optio rem laborum eius magnam. Esse, accusantium quia deleniti fugiat commodi architecto itaque nulla in. Consequatur beatae non explicabo in qui aspernatur deleniti quas doloribus!</p>
				  		  	    	                        <p>Aperiam, veniam, quae temporibus ratione suscipit accusantium provident amet deserunt natus veritatis ipsa error accusamus saepe debitis quisquam labore facilis magnam impedit minus explicabo quidem dicta ipsam nam velit quasi esse ad culpa sequi dolorum eaque. Iste exercitationem facilis nemo aut quae! Sit?</p>
				  		  	    	                    </div>
				  		  	    	                    <div class="mail-attachments">
				  		  	    	                        <p><i class="fa fa-paperclip"></i> 2 attachements | <a href="javascript:;">Save all attachements</a></p>
				  		  	    	                    </div>
				  		  	    	                    <div class="mail-actions">
				  		  	    	                        <a href="#/mail/compose" class="btn btn-sm btn-primary">Reply <i class="fa fa-mail-reply"></i></a>
				  		  	    	                        <a href="#/mail/compose" class="btn btn-sm btn-default">Forward <i class="fa fa-mail-forward"></i></a>
				  		  	    	                    </div>
				  		  	    	                </div>
				  		  	    	            </section>
				  		  	    	            <!-- mail view end -->
				  		  	    	        </div>
				  		  	    	    </div>
				  		  	    	</div>

				  		       </div>

				  		</div>


				  </div>

			 </div>
        </main>

@include('layouts.footer')
