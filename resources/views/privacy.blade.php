<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{url('ahr/assets/js/jquery.validate.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('ahr/bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <!-- datetimepicker -->
    <script src="{{ asset('ahr/bower_components/bootstrap-datepicke/js/bootstrap-datepicker.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('ahr/bower_components/bootstrap-datepicke/css/bootstrap-datepicker.css')}}">
    <!-- cropit -->
    <script src="{{ asset('ahr/bower_components/cropit/dist/jquery.cropit.js')}}"></script>
    <!-- ahr -->
    <script src="{{ asset('ahr/assets/js/ahr.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/ahr.css')}}">
    <!-- jquery step -->
	<script src="{{ asset('ahr/bower_components/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <!-- bootstrap-sweetalert -->
    <script src="{{ asset('ahr/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('ahr/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    <!-- select2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
    <!-- chart.js -->
    <script src="{{ asset('ahr/assets/js/Chart.min.js')}}"></script>
    <!-- test fily -->
    <link rel="stylesheet" href="{{ asset('ahr/assets/default_css/main.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">

</head>

<style>
	#header .clearfix .container{
		padding-left:0px !important;
	}
</style>
<body style="min-width:1260px;">

		<!-- header -->
		<section id="header" class="top-header" style="position:fixed; top:0px; width:100% margin:auto; box-shadow: 0px 6px 10px -3px #9B9B9B;">
	        <header class="clearfix" style="margin:auto; padding-left:20px;">


	            <!-- Logo -->
	            <div class="logo">
	                <a href="#/">
	                    <span><a href="#"><img src="{{ asset('assets/img/logo.png')}}" height="40"></a></span>
	                </a>
	            </div>
					<!-- <div class="top-nav">
	                <ul class="nav-right pull-right list-unstyled">
	        		    <li class="dropdown">
		    	            <a href="javascript:;" class="dropdown-toggle setting-icon"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	            </a>
		    	            <ul class="dropdown-menu with-arrow pull-right list-langs" aria-labelledby="dropdownMenu1">
		    	            	<li><a href="javascript:;">プロフィールプレビュー</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="{{ url('/setting') }}">設定</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">お役立情報</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="javascript:;">ヘルプ</a></li>
		    	            	<li class="divider"></li>
		    	            	<li><a href="{{ url('/logout') }}">ログアウト</a></li>
		    	            </ul>
		    	        </li>
	                </ul>
	            </div> -->

	        </header>
		</section>
		<!-- main -->

        <main style="width:80%; margin:50px auto; height: 100%; ">
			<div class="panel panel-default" style="padding:20px;">
            <div class="panel-heading" style="margin:10px;"><h4>プライバシーポリシー</h4></div>
            <div class="panel-body">
            	<h5>
            		AHR では、｢一秒先の創造｣という企業理念の考えのもと、インターネットメディアに関する事業を行っております。
            		個人情報を適切に取り扱うことは社会的責務であると考えております。当社では、この責務を全うするために、以下の取り組みを実施します。
            		<div>&nbsp;</div>
            		<div>&nbsp;</div>
            		当社は、個人情報が個人の重要な資産であることを認識し個人情報の取り扱いについて以下の通り方針を定めます。
            		<div>&nbsp;</div>
            		１．当社は、個人情報の取り扱いにおいて、個人情報の保護に関する法令及びその他の規範を　遵守致します。
            		<div>&nbsp;</div>
            		２．当社は、個人情報に対する不正なアクセス、個人情報の改ざん、紛失、破壊、及び漏洩などのトラブルを予防ならびに改善するため、必要かつ
            		　適切な安全対策を実施致します。
            		<div>&nbsp;</div>
            		３．個人情報を収集する際は、当社の事業活動に必要な範囲に限定し、適切に取得・利用・提供致します。また、本人の同意を事前に得ることなく
            		　利用目的の達成に必要な範囲を超えた個人情報を取り扱うことがないよう、是正措置を講じます。
            		<div>&nbsp;</div>
            		４．個人情報を取得させていただくお客様からのご意見、及び苦情については、相談窓口を設置することで対応し、迅速な対応が可能なよう体制を
            		　構築・運用いたします。
            		<div>&nbsp;</div>
            		５．当社が保有する個人情報に関して適用される法令、規範を遵守し、当社の個人情報保護方針は、継続的に見直し、改善を行います。
            		<div>&nbsp;</div>
            		具体的な個人情報の利用目的について
            		当社は、個人情報保護法に定義付けされる「個人情報取扱事業者」の立場として、お客様より収集する個人情報を、下記の利用目的の範囲内に
            		限定して取り扱いさせていただきます。
            		<div>&nbsp;</div>
            		<div>&nbsp;</div>
            		・お問合せ、お申し込み、サービスの遂行、その他ご依頼事項に対するご対応のため<br>
            		・お客様へのご案内や、情報を提供するため<br>
            		・メールマガジン等電子による定期刊行物の配信のため<br>
            		・セミナー、展示会などのイベントをご案内するため<br>
            		・アンケートなどを行い、今後のサービス発展に繋げるため<br>
            		・プレゼント、モニター応募などの抽選と、その発送のため<br>
            		・コンテストなどの受賞者へのご連絡、景品発送を行うため<br>
            		・契約履行のため<br>
            		・出版物などの物品を販売、お届けするため<br>
            		・コメント投稿、トラックバック送信など、インターネットサービスを提供するため<br>
            		・当社または記事の著者が、コメント投稿者及びトラックバック送信者とコンタクトするため<br>
            		・当社または当社とクライアント企業・スポンサー企業との協業により、個人を特定しない統計情報を
            		　作成・公表し、今後のサービスや事業の発展に活用するため<br>
            		・お客様が受信を希望した資料・メールマガジン及びセミナー等の各種申込み受け付けや
            		　ご案内を代行するため<br>
            		・不正アクセスやいたずらを防ぐため<br>
            		<div>&nbsp;</div>
            		個人情報の取り扱いについて当社は、当社が収集した個人情報を第三者に提供致しません。
            		<div>&nbsp;</div>
            		ただし、当社において、お客様が当社と異なるの企業及び団体に対して情報提供、サービス提供、商品注文、仲介、応募、接触をご依頼いただいた
            		場合や、それらの企業及び団体が関係する展示会やセミナーの申込みをされた場合などには、当該企業または団体に個人情報を開示・提供を
            		することがあります。
            		<div>&nbsp;</div>
            		<div>&nbsp;</div>
            		その他、法律に基づいて開示しなければならない場合や、当社と皆さまの権利・財産・安全などを保護または防御するために必要であると判断
            		できる場合には、個人情報を開示する場合があります。
            	</h5>
            	<div style="float:right; text-align:right;">
            		<h5>
            			2012年06月06日制定、施行<br>
            			亜細亜人材服務有限公司<br>
            			代表取締役　吉原　明<br>
            		</h5>
            	</div>
            </div>
            </div>
            </div>

        </main>

	   @include('layouts/footer')
</body>
</html>

