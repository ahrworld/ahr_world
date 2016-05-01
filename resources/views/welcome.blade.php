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

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

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
	                    <img src="{{asset('ahr/assets/img/bs_lp.jpg')}}" height="65"> 
	                </a>
	            </div>

	            <div class="collapse navbar-collapse" >
	                <!-- Left Side Of Navbar -->
	              
					<style>
					.navbar-right{
						margin-right: 0px !important;
						margin-top: 10px;
					}
					.navbar-right li{
						padding: 5px;
					}
					.btn_1{
						border-color:#E73820;
						border-color: #E73820;
						width: 120px;
						margin-top: 25px;
						border-radius: 2px;
						background: #FFF;
					}
					.btn_1 a{
						color:#E73820;
					}
					.btn_2{
						background-color:#E73820;
						height: 60px;
						font-size: 18px;
						width: 170px;
						border-radius: 9px;
					}
					.btn_2 a{
						color:#FFF;
					}

					</style>
	                <!-- Right Side Of Navbar -->
	                <ul class="nav navbar-nav navbar-right">
	                    <!-- Authentication Links -->
	                    @if (Auth::guest())
	                        <li><button type="button" class="btn btn_1"><a href="{{ url('/login') }}">sign in</a></button></li>
	                        <li><button type="button" class="btn btn_1"><a href="{{ url('/login_bs') }}">login in</a></button></li>
	                        <li><button type="button" class="btn btn_2"><a href="{{ url('/login_bs') }}">お問い合わせ</a></button></li>
	                    @else
	                        <li class="dropdown">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                {{ Auth::user()->email }}<span class="caret"></span>
	                            </a>

	                            <ul class="dropdown-menu" role="menu">
	                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
	                            </ul>
	                        </li>
	                      
	                    @endif

	                </ul>
	            </div>
       		<style>
			.banner{
				background:#00A6EA; 
				width:100%; 
				height:380px;
				padding:20px;
				min-width: 1350px;
			}
			.banner .left{
				float: left;
				color:#FFF;
				width: 900px;
			}
			.banner .left .btn-default{
				color:#00A6EA;
				margin-right: 20px;
				margin-top: 30px;
			}
			.banner .right{
				background-image: url('ahr/assets/img/bs_ban.png');
				background-position: center;
				background-size: cover;
				float: right;
				height: 360px;
				width: 380px;
				min-width: 380px;
				cursor: pointer; 
			}
			.banner .right:hover{
				background-image: url('ahr/assets/img/hover.png');
				background-position: center;
				background-size: cover;
				float: right;
				-webkit-transition: all 0.5s ease-in-out;
				transition: all 0.5s ease-in-out;
				height: 360px;
				width: 380px;
			}
			.base{
				width: 100%;
				height: 30px;
				background-color: #EAF6FD;
			}
       		</style>
            <div class="banner">
            	<div class="left">
            		<button type="button" class="btn btn-default">手間不要</button>
            		<button type="button" class="btn btn-default">時間短縮</button>
            		<button type="button" class="btn btn-default">人材確保</button>
            		<h1>グローバル採用は、最適な人材と自動マッチングで！</h1>
            		<h1>ワンクリックで世界中の人材を管理！</h1>
            	</div>
            	<div class="right">
            		
            	</div>

            </div>
            <div class="base"></div>
    </nav>

    <main>
    	
    </main>

    <footer>
    	
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
