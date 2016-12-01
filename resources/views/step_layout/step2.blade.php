<div class="tab-pane" id="tab2">
  <div>
    <label style="margin-right:7px;" class="ahr-label-default">STEP2</label>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span style="color:red;">※必須項目です</span><br>住所・連絡先を入力してください。
    </p>
  </div>
  <!-- content -->
  <div class="container-fluid">
		<div class="row">

			<div class="col-md-3">
			  <div class="form-group">
			    <label for="">郵便番号<span style="color:red;">※</span></label>
			    <input type="text" name="post" class="form-control" required>
			  </div>
		    </div>
			<div class="col-md-3">
			  <div class="form-group">
			    <label for="">市町村<span style="color:red;">※</span></label>
			    <input type="text" name="city" class="form-control" required>
			  </div>
			</div>
			<div class="col-md-3">
			  <div class="form-group">
			    <label for="exampleInputName">番地<span style="color:red;">※</span></label>
			    <input type="text" name="address" class="form-control" id="exampleInputName" required>
			  </div>
		    </div>
		    <div class="col-md-3">
			  <div class="form-group">
			    <label for="">電話番号<span style="color:red;">※</span></label>
			    <input type="text" name="phone" class="form-control" id="exampleInputName" required>
			  </div>
			</div>
			<div class="col-md-3">
			  <div class="form-group">
			    <label for="">Line ID</label>
			    <input type="text" name="line_id" class="form-control" id="exampleInputName" >
			  </div>
			</div>
		    <div>&nbsp;</div>

		</div>
  </div>
  <!-- content -->
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="namefield">①国籍を選んでください。</label>
			    	<select name="country" class="js-example-templating js-states" style="width: 100%">
			    		<option value="jp">日本</option>
			    		<option value="tw">台湾</option>
			    		<option value="vn">ベトナム</option>
			    		<option value="kr">韓国</option>
			    		<option value="hk">香港</option>
			    		<option value="cn">中国</option>
			    		<option value="in">インド</option>
			    		<option value="id">インドネシア</option>
			    		<option value="my">マレーシア</option>
			    	</select>
			  </div>
			</div>

		    <div>&nbsp;</div>

		    <div class="col-md-12">
			  <div class="form-group">
			    <label for="want_country">②希望勤務地を選んでください。<span style="color:#800000;">※複数選択可能</span><span style="font-size:12px;">(PS:需求限制幾個？）</span></label>
			    	<select name="want_country" class="js-example-templating2 js-states" multiple="multiple" style="width: 100%">
			    		<option value="jp">日本</option>
			    		<option value="tw">台湾</option>
			    		<option value="vn">ベトナム</option>
			    		<option value="kr">韓国</option>
			    		<option value="hk">香港</option>
			    		<option value="cn">中国</option>
			    		<option value="in">インド</option>
			    		<option value="id">インドネシア</option>
			    		<option value="my">マレーシア</option>
			    	</select>
			  </div>
			</div>

		    <div>&nbsp;</div>


		</div>
  </div>
</div><!-- end tab1 -->