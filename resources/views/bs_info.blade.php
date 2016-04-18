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
		</script>
		<script>
		    $(function(){
		        var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];

		        //-------------------------------
		        // Minimal
		        //-------------------------------
		        $('#myTags').tagit();

		        // singleFieldTags2 is an INPUT element, rather than a UL as in the other
		        // examples, so it automatically defaults to singleField.
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

		        //-------------------------------
		        // Tag events
		        //-------------------------------
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
		<!-- main -->
        <main style="margin-top:50px;">
			 <div class="container" style="background:#FFF; height:100%;">
				<div class="wrapper">
					<div id="rootwizard">
						<div class="navbar">
						  <div class="navbar-inner">
						    <div style="width:85%; margin:10px auto;">
						    	<h3 style="color: #rgba(88, 86, 86, 0.59); font-weight:bold; font-family:'微軟正黑體'; float:left;">企業情報登錄</h3>
								<ul class="ul-label">
									<li><a href="#tab1" data-toggle="tab" class="btn btn-default">1</a></li>
								  	<li><a href="#tab2" data-toggle="tab" class="btn btn-default">2</a></li>
								</ul>
						   </div>
						  </div>
						</div>
						<!-- tab-content -->
						<div class="tab-content" style="margin:10px auto; width:85%;">
						    <div class="tab-pane" id="tab1">
						      <div class="row">
						      	<div class="col-md-12">
							      	<form class="form_a" action="{{url('/business_a')}}" method="POST" >
							      	{{ csrf_field() }}
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
								      		     	<select class="form-control select-language">
								      		     	@foreach ($Languages as $Language)
								      		     	  <option>{{ $Language->language }}</option>
								      		     	@endforeach
								      		     	</select>
								      		     </td>

							      		     </tr>
							      		   </table>
							      		</div>

							      		<div class="panel panel-default">
							      		   <table class="table table-bordered">
							      		     <tbody>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">企業サイトURL<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" class="form-control ahr-input_1">
								      		     </td>
							      		     </tr>

							      		     <tr>
								      		     <th scope="row" align="right" width="170px">本社所在地<span class="color-red">※</span></th>
								      		     <td>
								      		     	<input type="text" class="form-control ahr-input_1">
								      		     </td>
							      		     </tr>
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
								      		     	<button type="button" class="btn ahr-button_2">日本人</button>
								      		     	<button type="button" class="btn ahr-button_2">台灣人</button>
								      		     	<button type="button" class="btn ahr-button_2">ベトナム人</button>
								      		     	<button type="button" class="btn ahr-button_2">囯籍問わず</button>
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">面接方法<span class="color-red">※</span></th>
								      		     <td>
								      		     	<button type="button" class="btn ahr-button_2">Skype面接</button>
								      		     	<button type="button" class="btn ahr-button_2">現地面接</button>
								      		     	<button type="button" class="btn ahr-button_2">採用囯面接</button>
								      		     </td>
							      		     </tr>
							      		     <tr>
								      		     <th scope="row" align="right" width="170px">選考プロセス<span class="color-red">※</span></th>
								      		     <td>
								      		     	<select class="form-control select-button">
								      		     	  <option>書內選考</option>
								      		     	</select>

								      		     	<div class="revision_1">
								      		     		<i class="fa fa-caret-right"></i>
								      		     	</div>

								      		     	<select class="form-control select-button">
								      		     	  <option>一次面試</option>
								      		     	</select>

								      		     	<div class="revision_1">
								      		     		<i class="fa fa-caret-right"></i>
								      		     	</div>

								      		     	<select class="form-control select-button">
								      		     	  <option>內定</option>
								      		     	</select>
								      		     </td>
							      		     </tr>
							      		   </table>
							      		</div>
							      	</form>
						      	</div>
						      </div><!-- row end -->
						    </div><!-- tab1 end -->

						    <div class="tab-pane" id="tab2">
					             <div class="row">
					             	<div class="col-md-12">
					       	      	<form action="#">
					       	      		<div class="panel panel-default">
					       	      		   <table class="table table-bordered">
					       	      		     <tbody>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th>
					       		      		     <td>
						       		      		       <select class="select11" style="width:100%;" >
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
					       		      		     <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th>
					       		      		     <td>
					       		      		     	<input type="text" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       	      		     	 <th scope="row" align="right" width="170px">
										      		     雇用形態
										      		     <span class="color-red">※</span>
										      		     <p>（複数選択可）</p>
								      		     </th>
					       		      		     <td>
					       		      		     	<button type="button" class="btn ahr-button_3">正社員(外国人歓迎</button>
								      		     	<button type="button" class="btn ahr-button_3">インターンシップ生</button>
								      		     	<button type="button" class="btn ahr-button_3">アルバイト</button>
								      		     	<button type="button" class="btn ahr-button_3">正社員(新卒)</button>
								      		     	<button type="button" class="btn ahr-button_3">正社員(第二新卒)</button>
								      		     	<button type="button" class="btn ahr-button_3">正社員(中途採用)</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       	      		     	 <th scope="row" align="right" width="170px">
										      		     募集経歴
										      		     <span class="color-red">※</span>
										      		     <p>（複数選択可）</p>
								      		     </th>
					       		      		     <td style="padding-top:15px;">
					       		      		     	<button type="button" class="btn ahr-button_2">大 学</button>
								      		     	<button type="button" class="btn ahr-button_2">短期大学</button>
								      		     	<button type="button" class="btn ahr-button_2">専門学校</button>
								      		     	<button type="button" class="btn ahr-button_2">大学院</button>
								      		     	<button type="button" class="btn ahr-button_2">高等学校</button>
								      		     	<button type="button" class="btn ahr-button_2">不問</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">理想人物像</th>
					       		      		     <td>
					       		      		     	<textarea class="form-control" rows="3"></textarea>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th>
					       		      		     <td>
					       		      		       <select class="select22" style="width:100%;" multiple="multiple" >
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
					       		      		     	<div style="width:100%;">
						       		      		     	<select class="form-control" style="width:100px; float:left; margin-right:5px;">
			      		         							    <option value="AZ">日本語</option>
			      		         							    <option value="CO">中囯語</option>
			      		         							    <option value="ID">英語</option>
			      		         							    <option value="ID">ベトナム語</option>
						       		      		        </select>
						       		      		     	<select class="form-control" style="width:100px; float:left; margin-right:5px;">
			      		         							    <option value="AZ">ビジネス</option>
			      		         							    <option value="CO">日常会話</option>
			      		         							    <option value="ID">母語</option>
						       		      		        </select>
					       		      		        </div>
					       		      		        <div style="width:100%; height: 40px;">
					       		      		      	    <label class="add" style="top:7px !important;"></label>
					       		      		        </div>
													<div class="append"></div>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">必須技能・資格</th>
					       		      		     <td>
					       		      		        <input name="tags" id="singleFieldTags1" value="PHP, JAVA">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th>
					       		      		     <td>
													<input name="tags" id="singleFieldTags2" value="ORACLE">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">その他の技能・資格</th>
					       		      		     <td>
					       		      		     	<input name="tags" id="singleFieldTags3" value="文書管理">
					       		      		     </td>
					       	      		     </tr>
					       	      		   </table>
					       	      		</div>
										<h3 style="color: #585656; font-weight:bold; font-family:'微軟正黑體'; margin-top:50px;">雇用基本条件</h3>
					       	      		<div class="panel panel-default" style="margin-bottom:5px !important;">
					       	      		   <table class="table table-bordered">
					       	      		     <tbody>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">勤務地（複数記入可）</th>
					       		      		     <td>
					       		      		     	<input type="text" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">年收</th>
					       		      		     <td>
					       		      		     	<input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;">
					       		      		     	<select class="form-control" style="width:100px; float:left; margin-right:20px;">
			      		         							    <option value="AZ">円</option>
			      		         							    <option value="CO">元</option>
			      		         							    <option value="ID">米ドル</option>
						       		      		    </select>
					       		      		     	<div style="width:50px; float:left;">月收</div>
					       		      		     	<input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;">
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
					       		      		     <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">ボーナス</th>
					       		      		     <td>
					       		      		     	<input type="text" class="form-control ahr-input_1">
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">休日休暇</th>
					       		      		     <td>
					       		      		     <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">福利厚生</th>
					       		      		     <td>
												 <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり
												 </label>
												 <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし
												 </label>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">諸手当</th>
					       		      		     <td>
					       		      		     <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり
												 </label>
												 <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし
												 </label>
					       		      		     </td>
					       	      		     </tr>
					       	      		     <tr>
					       		      		     <th scope="row" align="right" width="20%">教育制度</th>
					       		      		     <td>
					       		      		     <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり
												 </label>
												 <label class="radio-inline">
												   <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし
												 </label>
					       		      		     </td>
					       	      		     </tr>
					       	      		   </table>
					       	      		</div>
										<div style="text-align:right;"><label class="add add_all" style="width:30px; height:30px;"></label></div><!-- add button -->
					       	      	</form>
					             	</div>
					             </div><!-- row end -->
					             <div class="push_all" style="margin-top:30px;"></div>
						    </div><!-- tab2 end -->
						    <script>
						    $(document).ready(function() {
						    	$(".select11").select2({
						    	  closeOnSelect: true
						    	});
						    	$(".select22").select2({
						    	  maximumSelectionLength: 5,
						    	});
						    	$('.language .add').click(function(){
						    		$('.language .append').append('<div class="adddiv" style="width:100%; height:40px;"> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">日本語</option> <option value="CO">中囯語</option> <option value="ID">英語</option> <option value="ID">ベトナム語</option> </select> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">ビジネス</option> <option value="CO">日常会話</option> <option value="ID">母語</option> </select><label class="cancel" style="display: block; line-height: 30px; cursor: pointer; color:#8D8D8D;">✕</label> </div>');
						    	});
						    	$(".cancel").click(function(){
						    		$(this).parent("div").hide();
						    	});
						    	$(".add_all").click(function(){
						    		$('.push_all').append('<div class="row"> <div class="col-md-12"> <form action="#"> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th> <td> <select class="select11" style="width:100%;" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="170px"> 雇用形態 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td> <button type="button" class="btn ahr-button_3">正社員(外国人歓迎</button> <button type="button" class="btn ahr-button_3">インターンシップ生</button> <button type="button" class="btn ahr-button_3">アルバイト</button> <button type="button" class="btn ahr-button_3">正社員(新卒)</button> <button type="button" class="btn ahr-button_3">正社員(第二新卒)</button> <button type="button" class="btn ahr-button_3">正社員(中途採用)</button> </td></tr><tr> <th scope="row" align="right" width="170px"> 募集経歴 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td style="padding-top:15px;"> <button type="button" class="btn ahr-button_2">大 学</button> <button type="button" class="btn ahr-button_2">短期大学</button> <button type="button" class="btn ahr-button_2">専門学校</button> <button type="button" class="btn ahr-button_2">大学院</button> <button type="button" class="btn ahr-button_2">高等学校</button> <button type="button" class="btn ahr-button_2">不問</button> </td></tr><tr> <th scope="row" align="right" width="20%">理想人物像</th> <td> <textarea class="form-control" rows="3"></textarea> </td></tr><tr> <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th> <td> <select class="select22" style="width:100%;" multiple="multiple" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">語学・母語レベル</th> <td class="language"> <div style="width:100%;"> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">日本語</option> <option value="CO">中囯語</option> <option value="ID">英語</option> <option value="ID">ベトナム語</option> </select> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">ビジネス</option> <option value="CO">日常会話</option> <option value="ID">母語</option> </select> </div><div style="width:100%; height: 40px;"> <label class="add" style="top:7px !important;"></label> </div><div class="append"></div></td></tr><tr> <th scope="row" align="right" width="20%">必須技能・資格</th> <td> <input name="tags" id="singleFieldTags1" value="PHP, JAVA"> </td></tr><tr> <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th> <td><input name="tags" id="singleFieldTags2" value="ORACLE"> </td></tr><tr> <th scope="row" align="right" width="20%">その他の技能・資格</th> <td> <input name="tags" id="singleFieldTags3" value="文書管理"> </td></tr></table> </div><h3 style="color: #585656; font-weight:bold; font-family:"微軟正黑體"; margin-top:50px;">雇用基本条件</h3> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">勤務地（複数記入可）</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">年收</th> <td> <input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> <div style="width:50px; float:left;">月收</div><input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> </td></tr><tr> <th scope="row" align="right" width="20%">勤務時間</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button> </td></tr><tr> <th scope="row" align="right" width="20%">ボーナス</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">休日休暇</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button> </td></tr><tr> <th scope="row" align="right" width="20%">福利厚生</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">諸手当</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">教育制度</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr></table> </div></form> </div></div>');
						    	});
								$(".finish_sumbit").click(function(){
									$('.form_a').submit();
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
							  	<li class="next finish" ><a class="finish_sumbit" href="javascript:;">完了</a></li>
							</ul>
						</div>
					</div><!--rootwizard end-->
				</div>
			 </div>
        </main>
        <div>&nbsp;</div>
@endsection