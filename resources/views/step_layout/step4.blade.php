<div class="tab-pane" id="tab4">
  <div>
    <label style="margin-right:7px;" class="ahr-label-default">STEP4</label>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span class="color-red">※必須項目です</span><br>最終学歴を入力してください。
    </p>
  </div>
  <!-- content -->
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="">学歴<span class="color-red">※</span></label>
			    <div style="font-size:16px;">
				    <input type="radio" value="0" name="educational_status">卒業済
				    <input type="radio" value="1" name="educational_status">在学中
			    </div>
			  </div>
			</div>
			<style>
			#tab4 input[type='radio']{
				height: 15px;
				width: 20px;
			}
			</style>
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="">機関名<span class="color-red">※</span></label>
			    <div class="school_ct" style="font-size:16px;">
				    <input type="radio" value="大 学" name="educational">大 学
				    <input type="radio" value="短期大学" name="educational">短期大学
				    <input type="radio" value="専門学校" name="educational">専門学校
				    <input type="radio" value="大学院" name="educational">大学院
				    <input type="radio" value="高等学校" name="educational">高等学校
				    <button type="button" class="btn ahr-button_2 other">その他</button>
				    <input class="other_c none" type="text" name="educationals" >
			    </div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="form-group">
			    <label for="">学校名<span class="color-red">※</span></label>
			    <input type="text" name="school" class="form-control" placeholder="">
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="form-group">
			    <label for="">囯名<span class="color-red">※</span></label>
			    <input type="text" name="school_country" class="form-control" placeholder="">
			  </div>
			</div>
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="">学科<span class="color-red">※</span></label>
			    <div class="subject_ct">
				    <select name="subject" class="js-example-templating3 js-states" style="width: 100%">
			    		@foreach($subject as $value)
			    		<option value="{{$value->id}}">{{$value->subject}}</option>
			    		@endforeach
			    	</select>
			    </div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="form-group">
			    <label for="">入学年度<span class="color-red">※</span></label>
			    <div>
			    <input type="text" name="start_year" class="form-control" id="exampleInputName" placeholder="" style="width:100px; display: inline;">
			    <span>年</span>
			    <input type="text" name="start_month" class="form-control" id="exampleInputName" placeholder="" style="width:100px; display: inline;">
			    <span>月</span>
			    </div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="form-group">
			    <label for="">卒業年度<span class="color-red">※</span></label>
			    <div>
			    <input type="text" name="end_year" class="form-control" id="exampleInputName" placeholder="" style="width:100px; display: inline;">
			    <span>年</span>
			    <input type="text" name="end_month" class="form-control" id="exampleInputName" placeholder="" style="width:100px; display: inline;">
			    <span>月</span>
			    </div>
			  </div>
			</div>
		</div>
  </div>
</div><!-- end tab5 -->
