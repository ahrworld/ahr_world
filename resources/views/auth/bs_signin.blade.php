@extends('bs_layout.bs_layout')

@section('main')
<style>
    .bs_login_bt{
		font-weight:bold; 
		text-decoration:underline;
	}
	.bs_login_bt:hover{
		color:#6BBAFF;
	}
</style>
		<!-- main -->
        <main>
			 <div class="container" style="background:#FFF; height:100vh; margin-top:60px;">
			    <div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="{{url('login_bs')}}" class="bs_login_bt">ログイン</a></h5></div>
				<div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:40px;">
				  <div class="panel-body">
				  		<div class="row" style="text-align:center;">
				  		  <div class="col-md-4"></div>
				  		  <div class="col-md-4">
				  		  	<h4 style="color:#FFF; text-align:center; font-weight:bold; font-family:'微軟正黑體';">新規作成</h4>
				  			<img src="assets/img/b-icon.png" height="100"  alt=""></div>
				  		  <div class="col-md-4"></div>
				  		</div>


					    <form style="width:95%; margin:auto;" class="form-horizontal" role="form" method="POST" action="{{ url('/signin_bs') }}">
                         {!! csrf_field() !!}
					      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					          <label class="col-md-12">E-Mail</label>

					          <div class="col-md-12">
					              <input type="email" class="form-control" name="email" value="{{ old('email') }}">

					              @if ($errors->has('email'))
					                  <span class="help-block">
					                      <strong>{{ $errors->first('email') }}</strong>
					                  </span>
					              @endif
					          </div>
					      </div>
					      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-12">Password</label>

                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-12">Password 確認用</label>

                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					    <div class="checkbox">
					          <label>
					            <input type="checkbox" style="width:15px; height:15px;"><a href="#">個人情報保護方針</a>，<a href="#">利用規約</a> に同意する
					          </label>
					    </div>
					    <div style="text-align:center;">
					     	 <button type="submit" class="btn btn-info btn-lg ahr-button-lg">アカウント</button>
					    </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
@endsection