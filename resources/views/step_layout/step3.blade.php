<div class="tab-pane" id="tab3">
  <div>
    <label style="margin-right:7px;" class="ahr-label-default">STEP3</label>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span style="color:red;">※必須項目です</span><br>性別を選んでください。
    </p>
  </div>
  <style>
	.radio{
		width: 16px;
		height: 16px;
	}


	.sex_radio label {
	  width: 200px;
	  border-radius: 3px;
	  border: 1px solid #D1D3D4
	}

	/* hide input */
	input.radio:empty {
		margin-left: -999px;
	}

	/* style label */
	input.radio:empty ~ label {
		position: relative;
		float: left;
		line-height: 2.5em;
		text-indent: 3.25em;
	
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	input.radio:empty ~ label:before {
		position: absolute;
		display: block;
		top: 0;
		bottom: 0;
		left: 0;
		content: '';
		width: 2.5em;
		background: #D1D3D4;
		border-radius: 3px 0 0 3px;
	}

	/* toggle hover */
	input.radio:hover:not(:checked) ~ label:before {
		content:'\2714';
		text-indent: .9em;
		color: #C2C2C2;
	}

	input.radio:hover:not(:checked) ~ label {
		color: #888;
	}

	/* toggle on */
	input.radio:checked ~ label:before {
		content:'\2714';
		text-indent: .9em;
		color: #9CE2AE;
		background-color: #4DCB6D;
	}

	input.radio:checked ~ label {
		color: #777;
	}

	/* radio focus */
  </style>
  <!-- content -->
  <div class="container-fluid" style="padding: 0px !important;">
		<div class="row sex_radio">
			<div class="col-md-6">
			    <input type="radio" name="radio" id="radio1" class="ahr-button_boy radio"/>
			    <label for="radio1">男性</label>
			    <!-- <button type="button" class="btn ahr-button_boy"><img height="50" src="ahr/assets/img/boy.png" alt=""></button> -->
			</div>
			<div class="col-md-6">
			    <input type="radio" name="radio" id="radio2" class="radio"/>
			    <label for="radio2">女性</label>
			    <!-- <button type="button" class="btn ahr-button_boy"><img height="50" src="ahr/assets/img/girl.png" alt=""></button> -->
		    </div>
			<div class="col-md-12">
			  <div class="alert alert-info alert-dismissible fade in army none" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			      <h5>兵役経験について選択してください。</h5>
			      <p>
			      	  <input type="radio" name="b" class="btn btn-default" style="width:16px; height:16px; margin:10px;">無
			          <input type="radio" name="b" class="btn btn-info check" style="width:16px; height:16px; margin:10px;">済
			          <input type="radio" name="b" class="btn btn-default" style="width:16px; height:16px; margin:10px;">未
			      </p>
			      <div>&nbsp;</div>
			      <div class="datetime none">
				      <label>終了予定時間</label>
				      <input type="text" class="form-control" style="width:100px; display: inline;">
				      <span>年</span>
				      <input type="text" class="form-control" style="width:100px; display: inline;">
				      <span>月</span>
			      </div>
			  </div>
		    </div>

		</div>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span class="color-red"></span><br>あなたの性格を教えてください。
    </p>
  </div>
  <!-- content -->
  <style>
	.character{
		width: 16px;
		height: 16px;
		margin: 10px !important;
	}
  </style>
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <div>
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <input type="radio" class="character" name="character" value="熱い">熱い
				    <input type="radio" class="character" name="character" value="冷たい">冷たい
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <br>
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
				    <input type="radio" class="character" name="character" value="完ぺき主義者">完ぺき主義者
			    </div>
			  </div>
			</div>
		</div>
  </div>
</div><!-- end tab3 -->
