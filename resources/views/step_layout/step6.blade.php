<div class="tab-pane" id="tab6">
  <div>
    <label style="margin-right:7px;" class="ahr-label-default">STEP6</label>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span class="color-red"></span><br>主な経験職種・年数を選択してください。
    </p>
  </div>
  <!-- content -->
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="namefield" style="display:block;">勤務経験</label>
			     <input type="text" class="form-control number" name="points" min="1" max="3" style="width:70px; display: inline;" required>
			     <span>社</span>
			  </div>
			</div>

			<div class="exp_job_wrapper">
				<div class="col-md-7">
				  <div class="form-group number_exp_job">
				    <label for="namefield">経験職種</label>
				    	<select class="js-exp1 js-states" name="experience[]" style="width: 100%">
						      @foreach($exp_job_category as $key_category => $value_category)
			      		          <optgroup label="{{ $value_category->category }}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; ">
	   		      		          @foreach($exp_job as $key => $value)
	       		      		          @if ($value_category->id == $value->exp_job_category_id)
		         							<option value="{{ $value->id }}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{ $value->name }}</option>
		         					  @endif
	         					  @endforeach
	     					  </optgroup>
	     					  @endforeach
				    	</select>
				  </div>
				</div>

				<div class="col-md-5">
				  <div class="form-group">
				    <label for="namefield">年数</label>
				    	<select class="js-exp2 js-states" name="year[]" style="width: 100%">
				    		<option value="1">1</option>
				    		<option value="2">2</option>
				    		<option value="3">3</option>
				    		<option value="4">4</option>
				    		<option value="5">5</option>
				    		<option value="6">6</option>
				    		<option value="7">7</option>
				    		<option value="8">8</option>
				    		<option value="9">9</option>
				    	</select>
				  </div>
				</div>
			    <div>&nbsp;</div>
			</div>
			<!-- exp_job_wrapper -->
		</div>
  </div>
</div><!-- end tab7 -->