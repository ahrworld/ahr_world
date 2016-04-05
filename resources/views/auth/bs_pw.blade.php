@extends('bs_layout.bs_layout')

@section('main')
			 <div class="container" style="background:#FFF; height:100vh;">
				<div class="panel panel-default" style="width:50%; background:#ACDDF7 !Important; margin:50px auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body">
					    <form style="width:80%; margin:auto;">
					      <h5 style="color:#888889; text-align:center; font-size:16px; font-family:'微軟正黑體';">ご登録のE-mailアドレスを入力してください。</h5>
					      <div class="form-group">
					        <label for="exampleInputEmail1">Email</label>
					        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Emailを入力">
					      </div>

					      <div style="text-align:center; margin:auto; padding-top:20px; width:100%;">
					     	 <button type="button" class="btn btn-info btn-lg ahr-button-lg">送信</button>
					      </div>
					      <div>

					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
@endsection