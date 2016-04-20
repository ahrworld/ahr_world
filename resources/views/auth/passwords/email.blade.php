@extends('bs_layout.bs_layout')

@section('main')
             <div class="container" style="background:#FFF; height:100vh; margin-top:60px;">
                <div class="panel panel-default" style="width:500px; background:#ACDDF7 !Important; margin:50px auto; padding-bottom:40px; padding-top:30px;">
                  <div class="panel-body">
                        
                        <form style="width:95%; margin:auto;" method="POST" action="{{ url('/password/email') }}">
                          {!! csrf_field() !!}
                          
                          <h5 style="color:#888889; text-align:center; font-size:16px;">ご登録のE-mailアドレスを入力してください。</h5>
                          @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                          @endif
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Emailを入力">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div style="text-align:center; margin:auto; padding-top:20px; width:100%;">
                             <button type="submit" class="btn btn-info btn-lg ahr-button-lg">送信</button>
                          </div>
                          <div>

                          </div>
                        </form>
                  </div>
                </div>
             </div>
        </main>
@endsection
