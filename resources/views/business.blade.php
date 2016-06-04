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
    <link rel="stylesheet" href="assets/css/ahr.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: '小塚ゴシック Pr6N';
        }
        .navbar-header{
        	height:95px;
        }
        .bs_navbar{
        	position: fixed;
        	top: 0;
        	width: 100%;
        	height: 90px;
        	background: #FFF;
        }
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
        	display: block;
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
        	display: block;
        }
        .banner{
        	margin-top: 90px;
        	background:#00A6EA;
        	width:100%;
        	height:380px;
        	padding:20px;
        	min-width: 1150px;
        }
        .banner .left{
        	float: left;
        	color:#FFF;
        	width: 60%;
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
        	width: 35%;
        	max-width: 380px;
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
        	width: 35%;
        	max-width: 380px;
        }
        .base{
        	width: 100%;
        	height: 30px;
        	background-color: #EAF6FD;
        }

        .label-default{
        	background-color: #FFF;
        	color: #00A6EA;
        	border-radius: 2px;
        	width: 100px;
        	font-weight: 300;
        	padding: 5px 0;
        	margin:0px 5px;
        	text-align: center;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar">
			<div class="bs_navbar">
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


	                <!-- Right Side Of Navbar -->
	                <ul class="nav navbar-nav navbar-right">
	                    <!-- Authentication Links -->
	                    @if (Auth::guest())
	                        <li><button type="button" class="btn btn_1"><a href="{{ url('/signin_bs') }}">sign in</a></button></li>
	                        <li><button type="button" class="btn btn_1"><a href="{{ url('/login_bs') }}">login in</a></button></li>
	                        <li><button type="button" class="btn btn_2"><a href="{{ url('/login_bs') }}">お問い合わせ</a></button></li>
	                    @else
	                        <li><button type="button" class="btn btn_1"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></button></li>
	                        <li><button type="button" class="btn btn_2"><a href="{{ url('/login_bs') }}">お問い合わせ</a></button></li>

	                    @endif

	                </ul>
	            </div>
	           </div>
            <div class="banner">
            	<div class="left">
            		<label class="label-default">手間不要</label>
            		<label class="label-default">時間短縮</label>
            		<label class="label-default">人材確保</label>
            		<h1>グローバル採用は、最適な人材と自動マッチングで！</h1>
            		<h1>ワンクリックで世界中の人材を管理！</h1>
            	</div>
            	<div class="right">
            	</div>
            </div>
            <div class="base"></div>
    </nav>

    <main >
		<div class="background1">
			<img src="ahr/assets/img/bs_lp_bk1.png" height="500" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background2">
			<img src="ahr/assets/img/bs_lp_bk2.png" height="415">
		</div>
		<div class="base"></div>
		<div class="background3">
			<img src="ahr/assets/img/bs_lp_bk3.png" height="600" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background4">
			<img src="ahr/assets/img/bs_lp_bk4.png" height="900" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background5">
			<img src="ahr/assets/img/bs_lp_bk5.png" height="450" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background6">
			<img src="ahr/assets/img/bs_lp_bk6.png" height="550" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background7">
			<img src="ahr/assets/img/bs_lp_bk7.png" height="1800" style="margin-top:20px;">
		</div>
		<div class="base"></div>
		<div class="background8">
			<img src="ahr/assets/img/bs_lp_bk8.png" height="180" style="margin-top:0px;">
		</div>
		<div class="base"></div>
    </main>

    <footer class="bs_lp_footer">
	    	<ul>
	    		<li><a href="#">公式ブログ</a></li>
	    		<li><a href="#">ヘルプ</a></li>
	    		<li><a href="#">採用情報</a></li>
	    		<li><a href="#">規約</a></li>
	    		<li><a href="#">プライバシーポリシー</a></li>
	    		<li><a href="#">ご意見・ご要望</a></li>
	    		<li><a href="#">採用成功例</a></li>
	    		<li><a href="#">サイトマップ</a></li>　
	    		<li><a href="#">言語</a></li>　
	    	</ul>
		<p>Copyright © AHR Inc. ALL RIGHTS RESERVED.</p>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
