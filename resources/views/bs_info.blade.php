@extends('bs_layout.bs_layout')

@section('main')
		<script>
			$(document).ready(function() {
			  	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
			  			var $total = navigation.find('li').length;
			  			var $current = index+1;
			  			var $percent = ($current/$total) * 100;
			  			$('#rootwizard').find('.bar').css({width:$percent+'%'});
			  			// If it's the last tab then hide the last button and show the finish instead
			  			if($current >= $total) {
			  				$('#rootwizard').find('.pager .next').hide();
			  				$('#rootwizard').find('.pager .finish').show();
			  				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			  			} else {
			  				$('#rootwizard').find('.pager .next').show();
			  				$('#rootwizard').find('.pager .finish').hide();
			  			}
			  	}});

			});

		    $(function(){

		        var sampleTags = [
		        @foreach ($skill_data as $value)
			    '{{ $value->skill_name }}',
			    @endforeach
		        ];
		        $('#myTags').tagit();

		        $('#singleFieldTags1').tagit({
		            availableTags: sampleTags
		        });
		        $('#singleFieldTags2').tagit({
		            availableTags: sampleTags
		        });
		        $('#singleFieldTags3').tagit({
		            availableTags: sampleTags
		        });
		        //-------------------------------
		        // Preloading data in markup
		        //-------------------------------
		        $('#myULTags').tagit({
		            availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
		            // configure the name of the input field (will be submitted with form), default: item[tags]
		            itemName: 'item',
		            fieldName: 'tags'
		        });


		        var eventTags = $('#eventTags');

		        var addEvent = function(text) {
		            $('#events_container').append(text + '<br>');
		        };

		        eventTags.tagit({
		            availableTags: sampleTags,
		            beforeTagAdded: function(evt, ui) {
		                if (!ui.duringInitialization) {
		                    addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
		                }
		            },
		            afterTagAdded: function(evt, ui) {
		                if (!ui.duringInitialization) {
		                    addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
		                }
		            },
		            beforeTagRemoved: function(evt, ui) {
		                addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
		            },
		            afterTagRemoved: function(evt, ui) {
		                addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
		            },
		            onTagClicked: function(evt, ui) {
		                addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
		            },
		            onTagExists: function(evt, ui) {
		                addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
		            }
		        });

		        //-------------------------------
		        // Read-only
		        //-------------------------------
		        $('#readOnlyTags').tagit({
		            readOnly: true
		        });

		        //-------------------------------
		        // Tag-it methods
		        //-------------------------------
		        $('#methodTags').tagit({
		            availableTags: sampleTags
		        });

		        //-------------------------------
		        // Allow spaces without quotes.
		        //-------------------------------
		        $('#allowSpacesTags').tagit({
		            availableTags: sampleTags,
		            allowSpaces: true
		        });

		        //-------------------------------
		        // Remove confirmation
		        //-------------------------------
		        $('#removeConfirmationTags').tagit({
		            availableTags: sampleTags,
		            removeConfirmation: true
		        });

		    });

		</script>
		<style>

		input[type="radio"],input[type="checkbox"]{
			margin: 10px !important;
			width: 16px;
			height: 16px;
		}
		</style>
		<!-- main -->
        <main style="margin-top:50px;">
			 <div class="container" style="background:#FFF; height:100%;">
				<div class="wrapper">
					<div id="rootwizard">
						<div class="navbar">
						  <div class="navbar-inner">
						    <div style="width:85%; margin:10px auto;">
						    	<h3 style="color: #rgba(88, 86, 86, 0.59); font-weight:bold;  float:left;">企業情報登錄</h3>
								<ul class="ul-label">
									<li><a href="#tab1" data-toggle="tab" class="btn btn-default">1</a></li>
								  	<li><a href="#tab2" data-toggle="tab" class="btn btn-default">2</a></li>
								</ul>
						   </div>
						  </div>
						</div>
						<!-- tab-content -->
						<form class="form_a" action="{{url('/business_a')}}" method="POST" >
					    {{ csrf_field() }}
						<div class="tab-content" style="margin:10px auto; width:85%;">
						    <div class="tab-pane" id="tab1">
						      <div class="row">
						      	<div class="col-md-12">

							      		<div class="panel panel-default">
							      		   <table class="table table-bordered">
							      		     <tbody>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">企業名<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" name="company_name" class="form-control ahr-input_1">
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">担当者氏名<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" name="name" class="form-control ahr-input_1">
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">使用言語の選択<span class="color-red">※</span></th>
								      		     <td>
								      		     	<select class="select-language" name="user_language_id">
								      		     	@foreach ($Languages as $Language)
								      		     	  <option value="{{ $Language->id }}">{{ $Language->language }}</option>
								      		     	@endforeach
								      		     	</select>
								      		     </td>
							      		     </tr>
							      		     </tbody>
							      		   </table>
							      		</div>

							      		<div class="panel panel-default">
							      		   <table class="table table-bordered">
							      		     <tbody>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">企業サイトURL<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" class="form-control ahr-input_1" name="web_url">
								      		     </td>
							      		     </tr>

							      		     <tr>
								      		     <th scope="row" align="right" width="170px">本社所在地<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" class="form-control ahr-input_1" name="address">
								      		     </td>
							      		     </tr>
							      		     </tbody>
							      		   </table>
							      		</div>
							      		<div class="panel panel-default">
							      		   <table class="table table-bordered">
							      		     <tbody>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">
										      		     採用枠
										      		     <span class="color-red">※</span>
										      		     <p>（複数選択可）</p>
								      		     </th>
								      		     <td style="padding-top:15px;">
								      		     	<input type="checkbox"  name="employ[]" value="日本人">日本人
								      		     	<input type="checkbox"  name="employ[]" value="台灣人">台灣人
								      		     	<input type="checkbox"  name="employ[]" value="ベトナム人">ベトナム人
								      		     	<input type="checkbox"  name="employ[]" value="囯籍問わず">囯籍問わず
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">面接方法<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="radio" name="interview" value="Skype面接">Skype面接
								      		     	<input type="radio" name="interview" value="現地面接">現地面接
								      		     	<input type="radio" name="interview" value="採用囯面接">採用囯面接
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">選考プロセス<span class="color-red">※</span></th>
								      		     <td>
								      		        <!-- 優化時value要更換成ID -->
								      		     	<select class="select-button" name="test_process1">
								      		     	  <option value="応募">応募</option>
								      		     	  <option value="書內選考">書內選考</option>
								      		     	</select>

								      		     	<div class="revision_1">
								      		     		<i class="fa fa-caret-right"></i>
								      		     	</div>

								      		     	<select class="select-button" name="test_process2">
								      		     	  <option value="一次面接">一次面接</option>
								      		     	  <option value="二次面接">二次面接</option>
								      		     	</select>

								      		     	<div class="revision_1">
								      		     		<i class="fa fa-caret-right"></i>
								      		     	</div>
								      		     	<select class="select-button" name="test_process3">
								      		     	  <option value="内定">内定</option>
								      		     	  <option value="適性試験">適性試験</option>
								      		     	  <option value="課題">課題</option>
								      		     	  <option value="最終面接">最終面接</option>
								      		     	</select>
								      		     </td>
							      		     </tr>
							      		     </tbody>
							      		   </table>
							      		</div>
						      	</div>

						      </div><!-- row end -->
						    </div><!-- tab1 end -->

						    <div class="tab-pane" id="tab2">
					             <div class="row">
					             	<div class="col-md-12">

					       	      		<div class="panel panel-default">
					       	      		   <table class="table table-bordered">
					       	      		     <tbody>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th>
					       		      		     <td>
						       		      		       <!-- <select class="select11" name="recruitment_name" style="width:100%;" > -->
						       		      		          <div class="body" style="max-height: 300px; overflow-y: scroll;"><dl><dt>【技術系(システム・ネットワーク)】</dt><dd><a href="# └ システム開発（オープン・WEB・モバイル）" id="exp_job_type0_190100" data-value="190100">&nbsp;└&nbsp;システム開発（オープン・WEB・モバイル）</a><a href="# └ システム開発（汎用）" id="exp_job_type0_190110" data-value="190110">&nbsp;└&nbsp;システム開発（汎用）</a><a href="# └ システム開発（制御・組み込み）" id="exp_job_type0_190120" data-value="190120">&nbsp;└&nbsp;システム開発（制御・組み込み）</a><a href="# └ プロジェクトマネージャー・リーダー" id="exp_job_type0_190130" data-value="190130">&nbsp;└&nbsp;プロジェクトマネージャー・リーダー</a><a href="# └ パッケージ開発" id="exp_job_type0_190140" data-value="190140">&nbsp;└&nbsp;パッケージ開発</a><a href="# └ ネットワーク・サーバ設計・構築" id="exp_job_type0_190150" data-value="190150">&nbsp;└&nbsp;ネットワーク・サーバ設計・構築</a><a href="# └ 運用・保守・監視・技術サポート" id="exp_job_type0_190160" data-value="190160">&nbsp;└&nbsp;運用・保守・監視・技術サポート</a><a href="# └ ITコンサルタント・プリセールス" id="exp_job_type0_190170" data-value="190170">&nbsp;└&nbsp;ITコンサルタント・プリセールス</a><a href="# └ 社内情報システム" id="exp_job_type0_190180" data-value="190180">&nbsp;└&nbsp;社内情報システム</a><a href="# └ その他システム関連" id="exp_job_type0_190190" data-value="190190">&nbsp;└&nbsp;その他システム関連</a></dd><dt>【クリエイティブ系(Web)】</dt><dd><a href="# └ Webプロデューサー・Webディレクター" id="exp_job_type0_160100" data-value="160100">&nbsp;└&nbsp;Webプロデューサー・Webディレクター</a><a href="# └ Webデザイナー・HTMLコーダー" id="exp_job_type0_160110" data-value="160110">&nbsp;└&nbsp;Webデザイナー・HTMLコーダー</a><a href="# └ Webコンテンツ企画・Web編集" id="exp_job_type0_160120" data-value="160120">&nbsp;└&nbsp;Webコンテンツ企画・Web編集</a></dd><dt>【クリエイティブ系(ゲーム・マルチメディア)】</dt><dd><a href="# └ プロデューサー・ディレクター・プランナー" id="exp_job_type0_170100" data-value="170100">&nbsp;└&nbsp;プロデューサー・ディレクター・プランナー</a><a href="# └ ゲームプログラマー" id="exp_job_type0_170110" data-value="170110">&nbsp;└&nbsp;ゲームプログラマー</a><a href="# └ CGデザイナー" id="exp_job_type0_170120" data-value="170120">&nbsp;└&nbsp;CGデザイナー</a><a href="# └ その他ゲーム・マルチメディア関連" id="exp_job_type0_170130" data-value="170130">&nbsp;└&nbsp;その他ゲーム・マルチメディア関連</a></dd><dt>【クリエイティブ系(広告・アパレル・その他)】</dt><dd><a href="# └ 広告・出版・印刷関連クリエイティブ職" id="exp_job_type0_180100" data-value="180100">&nbsp;└&nbsp;広告・出版・印刷関連クリエイティブ職</a><a href="# └ アパレル関連クリエイティブ職" id="exp_job_type0_180110" data-value="180110">&nbsp;└&nbsp;アパレル関連クリエイティブ職</a></dd><dt>【企画・マーケティング系】</dt><dd><a href="# └ 経営企画・事業企画・経営管理職" id="exp_job_type0_110100" data-value="110100">&nbsp;└&nbsp;経営企画・事業企画・経営管理職</a><a href="# └ マーケ・販促・商品企画・宣伝・PR" id="exp_job_type0_110110" data-value="110110">&nbsp;└&nbsp;マーケ・販促・商品企画・宣伝・PR</a><a href="# └ Webマーケティング・SEO・SEM" id="exp_job_type0_110120" data-value="110120">&nbsp;└&nbsp;Webマーケティング・SEO・SEM</a><a href="# └ カスタマーサポート・ユーザーサポート" id="exp_job_type0_110130" data-value="110130">&nbsp;└&nbsp;カスタマーサポート・ユーザーサポート</a></dd><dt>【営業系】</dt><dd><a href="# └ 営業・企画営業（法人対象）" id="exp_job_type0_100100" data-value="100100">&nbsp;└&nbsp;営業・企画営業（法人対象）</a><a href="# └ 営業・企画営業（個人対象）" id="exp_job_type0_100110" data-value="100110">&nbsp;└&nbsp;営業・企画営業（個人対象）</a><a href="# └ ルートセールス・内勤営業" id="exp_job_type0_100120" data-value="100120">&nbsp;└&nbsp;ルートセールス・内勤営業</a><a href="# └ 海外営業" id="exp_job_type0_100130" data-value="100130">&nbsp;└&nbsp;海外営業</a><a href="# └ セールスエンジニア・技術営業" id="exp_job_type0_100140" data-value="100140">&nbsp;└&nbsp;セールスエンジニア・技術営業</a><a href="# └ MR、MS" id="exp_job_type0_100150" data-value="100150">&nbsp;└&nbsp;MR、MS</a><a href="# └ 営業マネージャー・営業企画" id="exp_job_type0_100160" data-value="100160">&nbsp;└&nbsp;営業マネージャー・営業企画</a><a href="# └ テレマーケティング・コールセンター関連" id="exp_job_type0_100170" data-value="100170">&nbsp;└&nbsp;テレマーケティング・コールセンター関連</a><a href="# └ その他営業関連" id="exp_job_type0_100180" data-value="100180">&nbsp;└&nbsp;その他営業関連</a></dd><dt>【管理系】</dt><dd><a href="# └ 広報・IR" id="exp_job_type0_120100" data-value="120100">&nbsp;└&nbsp;広報・IR</a><a href="# └ 財務・会計・経理" id="exp_job_type0_120110" data-value="120110">&nbsp;└&nbsp;財務・会計・経理</a><a href="# └ 人事・総務" id="exp_job_type0_120120" data-value="120120">&nbsp;└&nbsp;人事・総務</a><a href="# └ 特許・知的財産・法務" id="exp_job_type0_120130" data-value="120130">&nbsp;└&nbsp;特許・知的財産・法務</a><a href="# └ 購買・資材調達・物流・貿易事務" id="exp_job_type0_120140" data-value="120140">&nbsp;└&nbsp;購買・資材調達・物流・貿易事務</a></dd><dt>【事務・アシスタント系】</dt><dd><a href="# └ 一般事務・営業事務・秘書・通訳・翻訳" id="exp_job_type0_130100" data-value="130100">&nbsp;└&nbsp;一般事務・営業事務・秘書・通訳・翻訳</a><a href="# └ その他受付・企画・事務関連" id="exp_job_type0_130110" data-value="130110">&nbsp;└&nbsp;その他受付・企画・事務関連</a></dd><dt>【サービス系人材/店舗/医療・福祉、他】</dt><dd><a href="# └ キャリアコンサルタント・コーディネイター" id="exp_job_type0_140100" data-value="140100">&nbsp;└&nbsp;キャリアコンサルタント・コーディネイター</a><a href="# └ MD・バイヤー・店舗開発・SV" id="exp_job_type0_140110" data-value="140110">&nbsp;└&nbsp;MD・バイヤー・店舗開発・SV</a><a href="# └ 店長・販売・店舗管理" id="exp_job_type0_140120" data-value="140120">&nbsp;└&nbsp;店長・販売・店舗管理</a><a href="# └ 医療・福祉・介護関連" id="exp_job_type0_140130" data-value="140130">&nbsp;└&nbsp;医療・福祉・介護関連</a><a href="# └ その他サービス関連" id="exp_job_type0_140140" data-value="140140">&nbsp;└&nbsp;その他サービス関連</a></dd><dt>【専門系金融/不動産/コンサル/士業、他】</dt><dd><a href="# └ 金融関連営業職" id="exp_job_type0_150100" data-value="150100">&nbsp;└&nbsp;金融関連営業職</a><a href="# └ 金融関連専門職" id="exp_job_type0_150110" data-value="150110">&nbsp;└&nbsp;金融関連専門職</a><a href="# └ 不動産関連専門職" id="exp_job_type0_150120" data-value="150120">&nbsp;└&nbsp;不動産関連専門職</a><a href="# └ コンサルタント・その他専門職" id="exp_job_type0_150130" data-value="150130">&nbsp;└&nbsp;コンサルタント・その他専門職</a></dd><dt>【技術系(電気・電子・機械・半導体)】</dt><dd><a href="# └ 回路・システム・半導体設計" id="exp_job_type0_200100" data-value="200100">&nbsp;└&nbsp;回路・システム・半導体設計</a><a href="# └ 組込み・制御設計電子機器・精密機器" id="exp_job_type0_200110" data-value="200110">&nbsp;└&nbsp;組込み・制御設計電子機器・精密機器</a><a href="# └ 組込み・制御設計自動車・各種機械" id="exp_job_type0_200120" data-value="200120">&nbsp;└&nbsp;組込み・制御設計自動車・各種機械</a><a href="# └ 機械・機構設計電子機器・精密機器" id="exp_job_type0_200130" data-value="200130">&nbsp;└&nbsp;機械・機構設計電子機器・精密機器</a><a href="# └ 機械・機構設計自動車・各種機械" id="exp_job_type0_200140" data-value="200140">&nbsp;└&nbsp;機械・機構設計自動車・各種機械</a><a href="# └ 生産技術・プロセス開発" id="exp_job_type0_200150" data-value="200150">&nbsp;└&nbsp;生産技術・プロセス開発</a><a href="# └ 品質・生産管理電気・電子・機械・半導体" id="exp_job_type0_200160" data-value="200160">&nbsp;└&nbsp;品質・生産管理電気・電子・機械・半導体</a><a href="# └ その他電気・電子・機械・半導体技術関連" id="exp_job_type0_200170" data-value="200170">&nbsp;└&nbsp;その他電気・電子・機械・半導体技術関連</a></dd><dt>【技術系(医療・化学・食品・化粧品)】</dt><dd><a href="# └ 医療・医薬系関連" id="exp_job_type0_210100" data-value="210100">&nbsp;└&nbsp;医療・医薬系関連</a><a href="# └ 化粧品・食品・化学関連" id="exp_job_type0_210110" data-value="210110">&nbsp;└&nbsp;化粧品・食品・化学関連</a></dd><dt>【建築・土木・プラント系】</dt><dd><a href="# └ 施工管理" id="exp_job_type0_220100" data-value="220100">&nbsp;└&nbsp;施工管理</a><a href="# └ 測量・設計・積算" id="exp_job_type0_220110" data-value="220110">&nbsp;└&nbsp;測量・設計・積算</a><a href="# └ その他建築・土木・プラント関連" id="exp_job_type0_220120" data-value="220120">&nbsp;└&nbsp;その他建築・土木・プラント関連</a></dd></dl></div>
						       		      			   <!--</select> -->
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th>
					       		      		     <td>
					       		      		     	<input type="text" name="content" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       	      		     	 <th scope="row" align="right" width="170px">
										      		     雇用形態
										      		     <span class="color-red">※</span>
										      		     <p>（複数選択可）</p>
								      		     </th>
					       		      		     <td>
					       		      		     	<input type="checkbox" name="employment[]" value="正社員(外国人歓迎)">正社員(外国人歓迎)
								      		     	<input type="checkbox" name="employment[]" value="インターンシップ生">インターンシップ生
								      		     	<input type="checkbox" name="employment[]" value="アルバイト">アルバイト
								      		     	<input type="checkbox" name="employment[]" value="正社員(新卒)">正社員(新卒)
								      		     	<input type="checkbox" name="employment[]" value="正社員(第二新卒)">正社員(第二新卒)
								      		     	<br>
								      		     	<input type="checkbox" name="employment[]" value="正社員(中途採用)">正社員(中途採用)
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       	      		     	 <th scope="row" align="right" width="170px">
										      		     募集経歴
										      		     <span class="color-red">※</span>
										      		     <p>（複数選択可）</p>
								      		     </th>
					       		      		     <td style="padding-top:15px;">
					       		      		     	<input type="checkbox" name="experience[]" value="大 学">大 学
								      		     	<input type="checkbox" name="experience[]" value="短期大学">短期大学
								      		     	<input type="checkbox" name="experience[]" value="専門学校">専門学校
								      		     	<input type="checkbox" name="experience[]" value="大学院">大学院
								      		     	<input type="checkbox" name="experience[]" value="高等学校">高等学校
								      		     	<input type="checkbox" name="experience[]" value="不問">不問
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">理想人物像</th>
					       		      		     <td>
					       		      		     	<textarea name="ideal" class="form-control" rows="3"></textarea>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th>
					       		      		     <td>
					       		      		       <select  name="subject" class="select22" style="width:100%;" multiple="multiple" >
					       		      		          <optgroup label="Mountain Time Zone">
		      		         							    <option value="AZ">Arizona</option>
		      		         							    <option value="CO">Colorado</option>
		      		         							    <option value="ID">Idaho</option>
		      		         							    <option value="MT">Montana</option>
		      		         							  </optgroup>
		      		         							  <optgroup label="Central Time Zone">
		      		         							    <option value="AL">Alabama</option>
		      		         							    <option value="AR">Arkansas</option>
		      		         							    <option value="IL">Illinois</option>
		      		         							    <option value="IA">Iowa</option>
		      		         							    <option value="KS">Kansas</option>
		      		         							  </optgroup>
					       		      		       </select>
					       		      		     </td>
					       	      		     </tr>

					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">語学・母語レベル</th>
					       		      		     <td class="language">
					       		      		     	<div style="width:100%;"  class="append">
						       		      		     	<select class="form-control" name="language[]" style="width:100px; float:left; margin-right:5px;">
			      		         							    <option value="日本語">日本語</option>
			      		         							    <option value="中囯語">中囯語</option>
			      		         							    <option value="英語">英語</option>
			      		         							    <option value="ベトナム語">ベトナム語</option>
						       		      		        </select>
						       		      		     	<select class="form-control" name="languagelv[]" style="width:100px; float:left; margin-right:5px;">
			      		         							    <option value="ビジネス">ビジネス</option>
			      		         							    <option value="日常会話">日常会話</option>
			      		         							    <option value="母語">母語</option>
						       		      		        </select>
						       		      		        <div  style="width:100%;">
						       		      		        	  <label class="add" style="top:7px !important;"></label>
						       		      		        </div>
					       		      		        </div>

					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">必須技能・資格</th>
					       		      		     <td>
					       		      		        <input name="need_skill" id="singleFieldTags1" value="PHP, JAVA">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th>
					       		      		     <td>
													<input name="if_skill" id="singleFieldTags2" value="ORACLE">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">その他の技能・資格</th>
					       		      		     <td>
					       		      		     	<input name="other_skill" id="singleFieldTags3" value="文書管理">
					       		      		     </td>
					       	      		     </tr>
					       	      		     </tbody>
					       	      		   </table>
					       	      		</div>
										<h3 style="color: #585656; font-weight:bold;  margin-top:50px;">雇用基本条件</h3>
					       	      		<div class="panel panel-default" style="margin-bottom:5px !important;">
					       	      		   <table class="table table-bordered">
					       	      		     <tbody>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">勤務地（複数記入可）</th>
					       		      		     <td>
					       		      		     	<input name="site" type="text" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">年收</th>
					       		      		     <td>
					       		      		     	<input name="annual_income" type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;">
					       		      		     	<select class="form-control" style="width:100px; float:left; margin-right:20px;">
			      		         							    <option value="AZ">円</option>
			      		         							    <option value="CO">元</option>
			      		         							    <option value="ID">米ドル</option>
						       		      		    </select>
					       		      		     	<div style="width:50px; float:left;">月收</div>
					       		      		     	<input name="monthly_income" type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;">
					       		      		     	<select class="form-control" style="width:100px; float:left; margin-right:20px;">
			      		         							    <option value="AZ">円</option>
			      		         							    <option value="CO">元</option>
			      		         							    <option value="ID">米ドル</option>
						       		      		    </select>
					       		      		     </td>

					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">勤務時間</th>
					       		      		     <td>
					       		      		     <input type="text" name="work_time" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">ボーナス</th>
					       		      		     <td>
					       		      		     	<input type="text" name="bonus" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">休日休暇</th>
					       		      		     <td>
					       		      		     <input type="text" name="holiday" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">福利厚生</th>
					       		      		     <td>
												   <input type="radio" name="welfare" id="inlineRadio1" value="1"> あり

												   <input type="radio" name="welfare" id="inlineRadio2" value="0"> なし
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">諸手当</th>
					       		      		     <td>

												   <input type="radio" name="allowances" id="inlineRadio1" value="1"> あり

												   <input type="radio" name="allowances" id="inlineRadio2" value="0"> なし
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">教育制度</th>
					       		      		     <td>
												   <input type="radio" name="education" id="inlineRadio1" value="1"> あり
												   <input type="radio" name="education" id="inlineRadio2" value="0"> なし
					       		      		     </td>
					       	      		     </tr>
					       	      		     </tbody>
					       	      		   </table>
					       	      		</div>
										<div style="text-align:right;"><label class="add add_all" style="width:30px; height:30px;"></label></div><!-- add button -->
					             	</div>
					             </div><!-- row end -->
					             <div class="push_all" style="margin-top:30px;"></div>


						    </div><!-- tab2 end -->
						    </form>
						    <script>
						    $.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        }
						    });
						    var token = '{{ Session::token() }}';
						    $(document).ready(function(e) {
						    	$('.language .add').click(function(){
						    		$('.language .append').append($('<select class=form-control name=language[] style=width:100px;float:left;margin-right:5px><option value=日本語>日本語<option value=中囯語>中囯語<option value=英語>英語<option value=ベトナム語>ベトナム語</select><select class=form-control name=languagelv[] style=width:100px;margin-right:5px><option value=ビジネス>ビジネス<option value=日常会話>日常会話<option value=母語>母語</select>'));
						    	});
						    	$(".select11").select2({
						    	  closeOnSelect: true
						    	});
						    	$(".select22").select2({
						    	  maximumSelectionLength: 5,
						    	});

						    	$(".finish_sumbit").click(function(){
										$('.form_a').submit();
								});

						    	$(".cancel").click(function(){
						    		$(this).parent("div").hide();
						    	});
						    	$(".add_all").click(function(){
						    		$('.push_all').append('<div class="row"> <div class="col-md-12"> <form action="#"> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th> <td> <select class="select11" style="width:100%;" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="170px"> 雇用形態 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td> <button type="button" class="btn ahr-button_3">正社員(外国人歓迎</button> <button type="button" class="btn ahr-button_3">インターンシップ生</button> <button type="button" class="btn ahr-button_3">アルバイト</button> <button type="button" class="btn ahr-button_3">正社員(新卒)</button> <button type="button" class="btn ahr-button_3">正社員(第二新卒)</button> <button type="button" class="btn ahr-button_3">正社員(中途採用)</button> </td></tr><tr> <th scope="row" align="right" width="170px"> 募集経歴 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td style="padding-top:15px;"> <button type="button" class="btn ahr-button_2">大 学</button> <button type="button" class="btn ahr-button_2">短期大学</button> <button type="button" class="btn ahr-button_2">専門学校</button> <button type="button" class="btn ahr-button_2">大学院</button> <button type="button" class="btn ahr-button_2">高等学校</button> <button type="button" class="btn ahr-button_2">不問</button> </td></tr><tr> <th scope="row" align="right" width="20%">理想人物像</th> <td> <textarea class="form-control" rows="3"></textarea> </td></tr><tr> <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th> <td> <select class="select22" style="width:100%;" multiple="multiple" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">語学・母語レベル</th> <td class="language"> <div style="width:100%;"> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">日本語</option> <option value="CO">中囯語</option> <option value="ID">英語</option> <option value="ID">ベトナム語</option> </select> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">ビジネス</option> <option value="CO">日常会話</option> <option value="ID">母語</option> </select> </div><div style="width:100%; height: 40px;"> <label class="add" style="top:7px !important;"></label> </div><div class="append"></div></td></tr><tr> <th scope="row" align="right" width="20%">必須技能・資格</th> <td> <input name="tags" id="singleFieldTags1" value="PHP, JAVA"> </td></tr><tr> <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th> <td><input name="tags" id="singleFieldTags2" value="ORACLE"> </td></tr><tr> <th scope="row" align="right" width="20%">その他の技能・資格</th> <td> <input name="tags" id="singleFieldTags3" value="文書管理"> </td></tr></table> </div><h3 style="color: #585656; font-weight:bold;  margin-top:50px;">雇用基本条件</h3> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">勤務地（複数記入可）</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">年收</th> <td> <input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> <div style="width:50px; float:left;">月收</div><input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> </td></tr><tr> <th scope="row" align="right" width="20%">勤務時間</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button> </td></tr><tr> <th scope="row" align="right" width="20%">ボーナス</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">休日休暇</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button> </td></tr><tr> <th scope="row" align="right" width="20%">福利厚生</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">諸手当</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">教育制度</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr></table> </div></form> </div></div>');

						    	});


						    });
						    </script>
						    <style>
							.wizard li a{
								font-size: 18px;
							}
							.ul-label{
								margin-top: 15px !important;
							}
						    </style>
							<ul class="pager wizard">
								<!-- <li class="previous"><a href="#">Previous</a></li> -->
							  	<li class="next"><a href="#">完了して次に進む</a></li>
							  	<li class="next finish" ><a href="#" class="finish_sumbit">完了</a></li>
							</ul>
						</div>
					</div><!--rootwizard end-->
				</div>
			 </div>
        </main>
        <div>&nbsp;</div>
@endsection