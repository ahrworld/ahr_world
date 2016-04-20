
@extends('bs_layout.bs_layout')

@section('main')
             <div class="container" style="background:#FFF; height:100vh; margin-top:60px;">
                <div class="panel panel-default" style="width:500px; background:#ACDDF7 !Important; margin:50px auto; padding-bottom:40px; padding-top:30px;">
                  <div class="panel-body">
                        
                        <form style="width:95%; margin:auto;" method="POST" action="{{ url('/password/reset') }}">
                          {!! csrf_field() !!}
                          <input type="hidden" name="token" value="{{ $token }}">
                          <h5 style="color:#888889; text-align:center; font-size:16px;">新規パスワードを入力ください</h5>
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label class="col-md-12 control-label">E-Mail Address</label>

                              <div class="col-md-12">
                                  <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">新規Password</label>

                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Passwordを入力">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">新規Password(確認用)</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Passwordを入力">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div style="text-align:center; margin:auto; padding-top:20px;  width:100%;">
                             <button style="margin-top:30px;" type="submit" class="btn btn-info btn-lg ahr-button-lg">送信</button>
                          </div>
                        </form>
                  </div>
                </div>
             </div>
        </main>
@endsection
