<!doctype html>
<!--[if gt IE 8]><!--> <html > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Web Application</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <!-- needs images, font... therefore can not be part of ui.css -->
        <link rel="stylesheet" href="{{ asset('dist/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/bower_components/weather-icons/css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/bower_components/sweetalert/dist/sweetalert.css')}}">
        <script src="{{ asset('assets/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
        <!-- end needs images -->
        <link rel="stylesheet" href="{{ asset('dist/styles/main.css')}}">

    </head>
<body >
<div class="view-container">
<div class="page-signin">

    <div class="signin-header">
        <div class="container text-center">
            <section class="logo">
                <a href="#/">AHR</a>
            </section>
        </div>
    </div>

    <div class="signin-body">
        <div class="container">
            <div class="form-container">

                <form class="form-horizontal" method="POST" action="{{ url('/login_admin') }}">
                {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       >
                                       @if ($errors->has('email'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                       @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       placeholder="password"
                                       name="password"
                                       >
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" class="form-control" name="password_confirmation"  placeholder="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary btn-lg btn-block submit_form">Log in</button>
                        </div>
                    </fieldset>
                </form>

               <!--  <section>
                    <p class="text-center"><a href="javascript:;">Forgot your password?</a></p>
                    <p class="text-center text-muted text-small">Don't have an account yet? <a href="#/page/signup">Sign up</a></p>
                </section>
                 -->
            </div>
        </div>
    </div>

</div>
</div>
</body>
</html>