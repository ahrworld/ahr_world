@extends('bs_layout.bs_layout')

@section('main')
		<!-- main -->
        <main>
			 <div class="container" style="background:#FFF; height:100vh;">
			 	<div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="#" style="font-weight:bold; text-decoration:underline; ">新規登錄の方はこちら</a></h5></div>
				<div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body">
				  		<div class="row" style="text-align:center;">
				  		  <div class="col-md-4"></div>
				  		  <div class="col-md-4" style="padding-bottom:30px;">
				  		    <h4 style="color:#FFF; text-align:center; font-weight:bold; font-family:'微軟正黑體';">ログイン</h4>
				  			<img src="assets/img/b-icon.png" height="100"  alt=""></div>
				  		  <div class="col-md-4"></div>
				  		</div>


					    <form style="width:95%; margin:auto;">
					      <div class="form-group">
					        <label for="exampleInputEmail1">Email</label>
					        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					      </div>
					      <div class="form-group">
					        <label for="exampleInputPassword1">Password</label>
					        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					      </div>
					      <div style="text-align:center;">
					     	 <button type="button" class="btn btn-lg ahr-button-lg">Login in</button>
					     	 <div style="margin-top:15px;"><a href="#" style="font-size:16px; text-decoration: underline;">Passwordをお忘れの方はこちら</a></div>
					      </div>
					      <div>
					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
@endsection