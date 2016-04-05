@extends('bs_layout.bs_layout')

@section('main')
		<!-- main -->
        <main>
			 <div class="container" style="background:#FFF; height:100vh;">
				<div class="panel panel-default" style="width:50%; background:#ACDDF7 !Important; margin:50px auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body">
					    <form style="width:80%; margin:auto;">
					      <h5 style="color:#888889; text-align:center; font-size:16px; font-family:'微軟正黑體';">新規パスワードを入力ください</h5>
					      <div class="form-group">
					        <label for="exampleInputEmail1">新規Password</label>
					        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Passwordを入力">
					      </div>
					      <div class="form-group">
					        <label for="exampleInputPassword1">新規Password(確認用)</label>
					        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Passwordを入力">
					      </div>

					      <div style="text-align:center; margin:auto; padding-top:20px; width:100%;">
					     	 <button type="button" class="btn btn-info btn-lg ahr-button-lg" >變更</button>
					      </div>
					      <div>

					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
@endsection