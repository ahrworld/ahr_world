<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ahr</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- social -->
    <link rel="stylesheet" href="ahr/bower_components/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="ahr/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="ahr/bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
    <link rel="stylesheet" href="assets/css/ahr.css">
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
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
        <main>

			 <div class="container" style="background:#FFF; height:100vh; margin-top:60px;">
			 	<div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="{{url('signin')}}" style="font-weight:bold; text-decoration:underline; ">新規登錄の方はこちら</a></h5></div>
				<div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body">
				  		<div class="row" style="text-align:center;">
				  		  <div class="col-md-4"></div>
				  		  <div class="col-md-4" style="padding-bottom:30px;">
				  		    <h4 style="color:#FFF; text-align:center; font-weight:bold; font-family:'微軟正黑體';">ログイン</h4>
				  			<img src="assets/img/m-icon.png" height="100"  alt=""></div>
				  		  <div class="col-md-4"></div>
				  		</div>
						<div class="row" style="width:400px;">
							    <a style="width:370px; margin:auto; margin-bottom:5px;" class="btn btn-block btn-social btn-facebook">
							        <i class="fa fa-facebook"></i> Facebookアカウントでログイン
							    </a>
							    <a style="width:370px; margin:auto; margin-bottom:20px;" class=" btn btn-block btn-social btn-google">
							        <i class="fa fa-google-plus"></i> Googleアカウントでログイン
							    </a>
						</div>
					    <form style="width:95%; margin:auto;" role="form" method="POST" action="{{ url('/login') }}">
					      {!! csrf_field() !!}
					      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					        <label for="exampleInputEmail1">Email</label>
					        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

					        @if ($errors->has('email'))
					            <span class="help-block">
					                <strong>{{ $errors->first('email') }}</strong>
					            </span>
					        @endif
					      </div>
					      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					        <label for="exampleInputPassword1">Password</label>
					        <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					      </div>

					      <div style="margin:auto; padding-top:20px; width:70%; text-align: center;">
					     	 <button type="submit" class="btn btn-info btn-lg"  style="background:#00A6EA; border-radius:0px; width:100%; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">ログイン</button>
					     	 <div style="margin-top:15px;"><a href="#" style="text-align:center; font-size:16px; text-decoration: underline;">Passwordをお忘れの方</a></div>
					      </div>
					      <div>
					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
</body>
</html>