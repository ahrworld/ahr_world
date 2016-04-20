@extends('bs_layout.bs_layout')

@section('main')

        <main>
			 <div class="container" style="background:#FFF; height:100vh; margin-top:50px;">
			    <div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="{{url('login')}}" style="font-weight:bold; text-decoration:underline;">ログイン</a></h5></div>
				<div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:20px;">
				  <div class="panel-body">
				  		<div class="row" style="text-align:center; margin-bottom:20px;">
				  		  <div class="col-md-4"></div>
				  		  <div class="col-md-4">
				  		  	<h4 style="color:#FFF; text-align:center; font-weight:bold;">新規作成</h4>
				  			<img src="assets/img/m-icon.png" height="100"  alt=""></div>
				  		  <div class="col-md-4"></div>
				  		</div>
				
					    <form class="m_signin" style="width:95%; margin:auto;" method="POST" action="{{ url('/signin') }}">
					     {!! csrf_field() !!}
					      
					      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					          <label>ID(Email)</label>
					          <div>
					              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

					              @if ($errors->has('email'))
					                  <span class="help-block">
					                      <strong>{{ $errors->first('email') }}</strong>
					                  </span>
					              @endif
					          </div>
					      </div>
					      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					          <label>Password</label>

					          <div>
					              <input type="password" class="form-control" name="password" placeholder="Password">

					              @if ($errors->has('password'))
					                  <span class="help-block">
					                      <strong>{{ $errors->first('password') }}</strong>
					                  </span>
					              @endif
					          </div>
					      </div>
					      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					          <label class="control-label">Password 確認用</label>

					          <div>
					              <input type="password" class="form-control" name="password_confirmation" placeholder="Password">

					              @if ($errors->has('password_confirmation'))
					                  <span class="help-block">
					                      <strong>{{ $errors->first('password_confirmation') }}</strong>
					                  </span>
					              @endif
					          </div>
					      </div>
					      <div class="checkbox">
					          <label>
					            <input type="checkbox" class="Mck" style="width:15px; height:15px;"><a href="#">アカウント登録をクリックすることで、
								当サイト利用規約及びCookieの使用を含むデータに関するポリシーに
								同意するものとします。</a>
					          </label>
					      </div>
					      <div style="text-align:center;">
					     	 <button type="button" class="btn btn-info btn-lg m_signinBtn"  style="width:70%; background:#00A6EA; border-radius:0px; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">Sign in</button>
					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>

@endsection