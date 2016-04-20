@extends('bs_layout.bs_layout')

@section('main')
		<!-- main -->
        <main>
			 <div class="container" style="background:#FFF; height:100vh; margin-top:50px;">
			 	<div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="{{url('signin_bs')}}" style="font-weight:bold; text-decoration:underline; ">新規登錄の方はこちら</a></h5></div>
				<div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:40px; padding-top:30px;">
				  <div class="panel-body">
				  		<div class="row" style="text-align:center;">
				  		  <div class="col-md-4"></div>
				  		  <div class="col-md-4" style="padding-bottom:30px;">
				  		    <h4 style="color:#FFF; text-align:center; font-weight:bold; font-family:'微軟正黑體';">ログイン</h4>
				  			<img src="assets/img/b-icon.png" height="100"  alt=""></div>
				  		  <div class="col-md-4"></div>
				  		</div>

					    <form style="width:95%; margin:auto;" class="form-horizontal" role="form" method="POST" action="{{ url('/login_bs') }}">
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

                         
					     
					      <div style="text-align:center;">
					     	 <button type="submit" class="btn btn-lg ahr-button-lg">Login in</button>
					     	 <div style="margin-top:15px;"><a href="{{url('password/reset')}}" style="font-size:16px; text-decoration: underline;">Passwordをお忘れの方はこちら</a></div>
					      </div>
					      <div>
					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
@endsection