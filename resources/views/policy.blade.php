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
			<!-- 		<div class="top-nav">
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
            <div class="panel-heading" style="margin:10px;"><h4>利用規約</h4></div>
            <div class="panel-body">
            	<h5>
            		<h4>第1条(用語の定義)</h4>

                    本利用規約における主な用語の定義は、次の各号に掲げる通りとします。<br>
                    「AHR（以下「本サービス」といいます。）」とは、Asian Human Resourcesが行うメディアコンサルティングサービスのことをいいます。<br>
                    「人財」とは、一定以上の評価基準を満たした｢優秀な人材｣のことをいいます。<br>
                    「求職者｣とは、当社が提供する「AHR」の求人情報サービス及びそれに付随するサービスの利用資格を有し、当該ウェブサイトを通して求職活動を行う個人を意味します。<br>
                    「利用契約」とは、弊社から本サービスの提供を受けるための契約をいいます。<br>
                    「契約者」とは、本利用規約に基づく利用契約を弊社と契約している方をいいます。


                    　<h4>第2条（規約の適用及び変更）</h4>
                    本利用規約は、｢利用規約｣及び、｢個人情報保護規約｣を併せて｢本規約｣といいます。<br>
                    本規約の内容は、変更する場合がございますが、その都度利用者様の皆様へご連絡致しかねます。その場合、最新の利用規約をご確認下さい。<br>
                    本利用規約が変更された場合、お客様に、変更後の利用規約について承諾を求めることがあります。

                    　<h4>第3条（本サービスの提供）</h4>
                    当社は当社が定めるの形式及び方法による、当社ウェブサイト上での情報発信提供サービス<br>
                    「AHR」に応募した求職者に対し、当社が定める方式で、メッセージを送受信し、求職者にコンタクトを行うサービス<br>
                    その他当社が定めるサービス (但し別途料金の支払が必要とされる場合があります)本サービスを利用するには、インターネットへの接続が必要です。お客様によるインターネットへの接続手段に関しては当社は一切関与致しません。<br>
                    求職者及び、求人企業に対してのアドバイス、地域情報等提供のコンサルティングサービス

                    　<h4>第4条（著作権等）</h4>
                    プログラム、サービス提供画面等、本サービスに関する一切の著作権は、全て当社に帰属します。<br>
                    お客様は、本サービスの利用契約締結に基づいて、本サービスを利用することができますが、提供される本サービスに関する著作権等の知的財産権を取得するものではありません。お客様は、本サービスの一部または全部を修正・改造、賃貸、賃借、再販売、配給することはできません。<br>

                    　<h4>第5条（利用資格）</h4>
                    20歳未満の方が本サービスの利用を申込む際には、事前に親権者の同意を得るものとします。<br>

                    　<h4>第6条（求人広告掲載の中断及び中止）</h4>
                    当社は、求人広告の掲載期間に登録企業の登録が取り消された場合、求人広告が第5条第3項各号に該当する場合、又は如何を問わず、当社が求人広告の内容を不適切と判断した場合、その他当社が必要と判断した場合には、求人広告の掲載を一時的又は永続的に中止することができるものとします。<br>
                    当社は、本条に基づく求人広告の掲載の中断又は中止により、登録企業に生じた損害について一切の責任を負わないものとし、登録企業は当社が本規約に定める対価の全額の支払を免れないものとします。<br>

                    　<h4>第7条（料金及び支払方法）</h4>
                    登録企業は、弊社の提供するあらゆるサービス利用の対価として、当社に対し、当社所定の料金及びこれに対する消費税相当額を支払うものとします。サービス利用の対価は、年間利用において当社が定める相当額を、登録企業がサービス開始前に一括で支払うものとします。<br>
                    利用料は登録完了後に、登録企業が当社所定の銀行口座に相当額を現金で振り込むものとします。その際、振込手数料その他支払に必要な費用は登録企業の負担とします。<br>
                    前条に規定される中断又は中止その他のいかなる理由によっても消滅し又は減額若しくは免除されないものとします。<br>

                    　<h4>第8条（本サービスの利用）</h4>
                    登録企業は、登録企業として有効である期間内に限り、本規約の目的の範囲内でかつ本規約に違反しない範囲内で、当社の定める方法に従い、本サービスを利用することができます。<br>
                    (1) 当社、他の登録企業、求職者又は第三者の知的財産権、肖像権、プライバシーの権利、名誉、その他の権利又は利益を侵害する行為<br>
                    (2) 犯罪行為に関連する行為又は公序良俗に反する行為<br>
                    (3) 当社が本サービス内において必要な範囲で複製、改変、送信その他の行為を行うことが他の登録企業、求職者又は第三者の知的財産権、肖像権、プライバシーの権利、名誉、その他の権利又は利益の侵害に該当することとなる情報を当社ウェブサイトに送信する行為<br>
                    (4) 反社会的勢力または反社会的活動に関する行為<br>
                    (5) コンピュータ・ウィルスその他の有害なコンピュータ・プログラムを含む情報を送信する行為<br>
                    (6) 本サービスに関し利用し得るあらゆる情報を改ざんする行為<br>
                    (7) 当社が定める一定のデータ容量以上のデータを本サービスを通じて送信する行為<br>
                    (8) 当社による本サービスの運営を妨害するおそれのある行為<br>
                    (9) 当社または求職者の同意を得ずに、求職者の個人情報を第三者に漏洩する行為<br>
                    (10) 他の登録企業、求職者又は当社に対する、営業目的でのメールの送信、その他の営業行為<br>
                    (11) 本サービスで提供する一切の情報を利用し、同等のサービスもしくは本サービスの提供する情報によって成り立つ事業を行う行為<br>
                    (12) セミナーの告知、アンケートの回答者又はモニターの募集等、求人以外の目的でメール、資料等を求職者に対して送信又は送付する行為<br>
                    (13) 求人広告に示した労働条件と異なる労働条件で求職者を雇用する行為<br>
                    (14) 当社、他の登録企業、求職者又は第三者に損害を生じさせるおそれのある目的又は方法で本サービスを利用し、又は利用しようとする行為<br>
                    (15) 法令又は当社若しくは登録企業が所属する業界団体の内部規則に違反する行為<br>
                    (16) その他、当社が不適切と判断する行為<br>
                    当社は、本サービスにおける登録企業による情報の送信行為が前項各号のいずれかに該当し、又は該当するおそれがあると当社が判断した場合、登録企業に事前に通知することなく、当該情報の全部又は一部を削除することができるものとします。当社は、本項に基づき当社が行った措置に基づき登録企業に生じた損害について一切の責任を負いません。<br>

                    <h4>第10条（本サービスの停止・中断・廃止）</h4>
                    当社は、以下の各号いずれかに該当する場合、登録企業に事前に通知することなく、本サービスの利用の全部又は一部を永久的に停止又は一時的に中断、又は廃止することができるものとします。<br>
                    (1) 本サービスに係るシステムメンテナンス及び点検又は保守作業を行う場合<br>
                    (2) システム、又は通信回線等が事故等により停止した場合<br>
                    (3) 火災、停電、天災地変、第三者の妨害行為などの不可抗力により本サービスの運営ができなくなった場合<br>
                    (4) その他、当社が停止又は中断を必要と判断した場合<br>
                    当社が、理由の如何を問わず、本サービスを停止・中断・廃止した場合、登録企業に生じた損害について一切の責任を負いません。<br>
                    <h4>第11条（権利の帰属）</h4>
                    本サービス及び当サイトに関する所有権及び知的財産権は全て当社に帰属しています。登録企業は、いかなる理由によっても当社の知的財産権を侵害するおそれのある行為 をしないものとします。
                    <h4>第12条（保証の否認・免責）</h4>
                    本サービスの内容について、当社は如何なる保証も行うものではありません。また、登録企業が当社もしくは当サイトから直接的に又は間接的に本サービス又は他の登録企業に関する情報を得た場合でも、当社は登録企業に対し本規約において如何なる保証も行うものではありません。<br>
                    当社は、本サービスの運営において、サービスの中断、変更、停止、又は利用不能、登録企業のメッセージ又は情報の削除又は消失､登録企業の登録の取消、本サービスの利用によるデータの消失又は機器の損傷又は故障、その他本サービスに関連して登録企業が被ったいかなる損害についても、賠償する責任を一切負わないものとします。<br>
                    当社サイトから他のウェブサイトへのリンク又は他のウェブサイトから当社ウェブサイトへのリンクが提供されている場合でも、当社は、当社ウェブサイト以外のウェブサイト及びそこから得られる情報に関して、理由の如何を問わず一切の責任を負わないものとします。<br>
                    登録企業は、本サービスを利用において、登録企業に適用される法令、業界団体の内部規則等に違反するか否かを自己の責任と費用に基づいて調査するものとします。
                    当社は、登録企業による「AHR」のサービス利用が、登録企業に適用のある法令、業界団体の内部規則等に適合することを何ら保証するものではありません。
                    <h4>第13条（紛争処理及び損害賠償）</h4>
                    登録企業は、本規約に違反することにより、又は本サービスの利用に関連することにより当社に損害を与えた場合、当社に対しその損害を賠償することとします。<br>
                    登録企業が、本サービスに関連して他の登録企業、求職者、その他第三者からクレームを受け又はそれらの者との間で紛争を生じた場合には、直ちにその内容を当社に通知するものとします。登録企業の費用と責任において当該クレーム又は紛争を処理し、当社からの要請に基づき、その結果を当社に報告するものとします。<br>
                    登録企業による本サービスの利用に関連し、当社が、他の登録企業その他の第三者から権利侵害その他の理由により何らかの請求を受けた場合は、登録企業は当該請求に基づき当社が当該第三者に支払を余儀なくされた金額を賠償するものとします。<br>

                    <h4>第15条（秘密保持）</h4>
                    登録企業及び当社は、本規約又は本サービスに関連して、相手方より書面、口頭若しくは記録媒体等により提供若しくは開示されたか、又は知り得えた、相手方に関する技術、営業、業務、財務又は組織に関する全ての情報 (但し、公知の事実を除く) を本サービスの目的のみに利用するとともに、相手方の書面による承諾なしに第三者に相手方の秘密情報を提供、開示又は漏洩しないものとします。
                    <h4>第16条（有効期間）</h4>
                    本規約は、登録企業と当社の間で契約が締結された日から当該登録企業の登録が取り消された日まで両社の間で有効に存続するものとします。
                    <h4>第17条（準拠法及び管轄裁判所）</h4>
                    本規約の準拠法は日本法とし、本規約に起因し又は関連する一切の紛争については、東京簡易裁判所又は東京地方裁判所を第一審の専属的合意管轄裁判所とします。
                    <h4>第18条（協議解決）</h4>
                    登録企業及び当社は、本規約に定めのない事項又は本規約の解釈に疑義が生じた場合、互いに信義誠実の原則に従って協議の上、速やかに解決を図るものとします。
            	</h5>
            </div>
            </div>
            </div>

        </main>

	   @include('layouts/footer')
</body>
</html>

