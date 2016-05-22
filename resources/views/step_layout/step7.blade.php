<div class="tab-pane" id="tab7">
  <div>
    <label style="margin-right:7px;" class="ahr-label-default">STEP7</label>
  </div>
  <div>
    <p style="font-size:12px; color:#0094E5;">
    	<span class="color-red"></span><br>経験のあるスキルを全て選択してください。
    </p>
  </div>
  <style>
	.panel-title a:hover{
		text-decoration:none !important;
	}
	.panel-title a:focus{
		text-decoration:none !important;
	}
	.table input{
	    height: 20px;
        width: 20px;
	}
  </style>
  <!-- content -->
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			    @foreach($skill_titles as $key_title => $value_title)
			    <div class="panel panel-default">
			      <div class="panel-heading" role="tab" id="heading{{ $key_title }}" style="color:#FFF; background:#9ED8F6;">
			         <h4 class="panel-title">
                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key_title }}" aria-expanded="true" aria-controls="collapse{{ $key_title }}">
                         &nbsp;{{ $value_title->skill_title }}
                       </a>
                       <i class="fa fa-caret-up float-right"></i>
                     </h4>
			      </div>

			      <div id="collapse{{ $key_title }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key_title }}">
			        <div class="panel-body">
			            @foreach($skill_categorys as $skill_category)
			        	@if ($value_title->id == $skill_category->skill_title_id)
			        	<h5>{{ $skill_category->skill_category }}</h5>
			        	
			        	<table class="table table-bordered">
			        	<thead>
			        	<tr>
			        	<th></th>
			        	<th>経験なし</th>
			        	<th>1年未満</th>
			        	<th>1年～3年</th>
			        	<th>3年～5年</th>
			        	<th>5年以上</th>
			        	</tr>
			        	</thead>
			        	<tbody>
			        	@foreach($skill_datas as $key => $value)
			        	@if ($skill_category->id == $value->skill_category_id)
			        	<tr>
			        	<th width="30%" scope="row">{{ $value->skill_name }}</th>
			        	<td align="center"><input type="radio" name="value_{{ $key+1 }}" checked="checked"></td>
			        	<td align="center"><input type="radio" name="value_{{ $key+1 }}"></td>
			        	<td align="center"><input type="radio" name="value_{{ $key+1 }}"></td>
			        	<td align="center"><input type="radio" name="value_{{ $key+1 }}"></td>
			        	<td align="center"><input type="radio" name="value_{{ $key+1 }}"></td>
			        	</tr>
			        	@endif
			        	@endforeach
			        	</tbody>
			        	</table>
			        	@endif
			        	@endforeach
			        </div>
			      </div>
			    </div>
			    @endforeach
			  </div>
			</div>
		</div>
  </div>
</div><!-- end tab9 -->
