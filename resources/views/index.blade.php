<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- bootstrap -->
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="{{ asset('ahr/assets/js/ahr.js')}}"></script>
    <!-- test fily -->
    <link rel="stylesheet" href="{{ asset('ahr/assets/default_css/main.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!-- ahr -->
    <style>
        body {
            font-family: '小塚ゴシック Pr6N';
        }
        .navbar-header{
        	height:95px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar">

	            <div class="navbar-header">

	                <!-- Collapsed Hamburger -->
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
	                    <span class="sr-only">Toggle Navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>

	                <!-- Branding Image -->
	                <a class="navbar-brand" href="{{ url('/') }}">
	                    <img src="{{asset('ahr/assets/img/user_lp.png')}}" height="65">
	                </a>
	            </div>

	            <div class="collapse navbar-collapse" >
	                <!-- Left Side Of Navbar -->

					<style>
					.navbar{
						position: fixed;
						top: 0px;
						width: 100%;
					}
					.navbar-collapse{
						background: #00A7EA;

					}
					.navbar-right{
						margin-right: 0px !important;
						margin-top: 10px;
					}
					.navbar-right li{
						padding: 5px;
					}
					.user_lp_btn1{
						width: 150px;
						height: 50px;
						margin-top: 10px;
						border-radius: 5px;
					}
					.user_lp_blog{
						font-size: 18px;
						color: #FFF;
						margin: 10px 10px 0px 10px;
					}
					</style>
	                <!-- Right Side Of Navbar -->
	                <ul class="nav navbar-nav navbar-right">
	                    <!-- Authentication Links -->
	                    @if (Auth::guest())
	                    	<li><a class="user_lp_blog" href="#">{{ trans('menu.blog') }}</a></li>
	                        <li><button type="button" class="btn btn-default user_lp_btn1"><a href="{{ url('/login') }}" style="padding: 20px 40px;">{{ trans('menu.login') }}</a></button></li>
	                        <li><button type="button" class="btn btn-default user_lp_btn1"><a href="{{ url('/register') }}" style="padding: 20px 20px;">{{ trans('menu.register') }}</a></button></li>
	                    @else
	                        <li><button type="button" class="btn btn-default user_lp_btn1"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ trans('menu.logout') }}</a></button></li>
	                    @endif

	                </ul>
	            </div>
    </nav>
<style>
	.user_lp_main{
		margin-top: 150px;
	}
	.user_lp_main .wrapper{
		width: 100%;
		margin: auto;
		text-align: center;
	}
	.user_lp_main .label1{
		margin-top: 30px;
		font-size: 30px;
		font-weight: 100;
		color: #000;
	}
	.user_lp_main .label1 span{
		font-size: 35px;
		border-bottom: 5px solid #D2312B;
	}
	.user_lp_main .div1{
		margin-top: 50px;
		width: 80%;
		margin:auto;
		margin-bottom: 300px;
	}
	.user_lp_main .div1 .left{
		float: left;
		text-align: right;
	}
	.user_lp_main .div1 .right{
		float: left;
		text-align: right;
	}
</style>
    <main class="user_lp_main">
    	<div class="wrapper">
    		<label class="label1"><span>グローバル人材</span> として <span>グローバル就職・転職</span> をしよう！</label>
    			<h3>今日から気軽に始める、ライフワークとしての就職・転職活動</h3>
    			<img src="{{ asset('ahr/assets/img/2.png')}}" height="300" style="margin-top:80px;">
    		<div>
    			<img src="{{ asset('ahr/assets/img/user_lp_test.png')}}" height="400" style="margin-top:80px;">
			</div>
   		</div>
    </main>



    @include('layouts/footer')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>
</html>
