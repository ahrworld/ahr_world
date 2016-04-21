<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- social -->
    <link rel="stylesheet" href="ahr/bower_components/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="ahr/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/ahr/bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
    <link rel="stylesheet" href="/assets/css/ahr.css">
    <script src="/ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
</head>
<style>

</style>
<body>
        <!-- header -->
        <header>
            <nav class="navbar  nav-ahr">
              <div class="container-fluid">
                <div class="navbar-header">
                   <div style="margin-left:100px;">
                      <img src="assets/img/logo.png" height="40" style="margin-bottom: 10px;">
                   </div>
                </div>
              </div>
            </nav>
        </header>
        <!-- main -->
        <main>
             <div class="container" style="background:#FFF; height:100vh; margin-top:50px;">
                <div style="text-align:right; width:400px; margin:20px auto;"><h5><a href="{{url('login')}}" style="font-weight:bold; text-decoration:underline; ">ログイン</a></h5></div>
                <div class="panel panel-default" style="width:400px; background:#ACDDF7 !Important; margin:auto; padding-bottom:15px;">
                  <div class="panel-body">
                        <div class="row" style="text-align:center; margin-bottom:20px;">
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                            <h4 style="color:#FFF; text-align:center; font-weight:bold; ">新規作成</h4>
                            <img src="assets/img/m-icon.png" height="100"  alt=""></div>
                          <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="width:400px;">
                                <a href="{{ url('auth/fb')}}" style="width:370px; margin:auto; margin-bottom:10px;" class="btn btn-block btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i> FacebookアカウントでSign in
                                </a>
                                <a href="{{ url('auth/google')}}" style="width:370px; margin:auto; margin-bottom:10px;" class=" btn btn-block btn-social btn-google">
                                    <i class="fa fa-google-plus"></i> GoogleアカウントでSign in
                                </a>
                                <a href="{{ url('signin')}}" style="width:370px; margin:auto; margin-bottom:10px;" class=" btn btn-block btn-social btn-default">
                                    <i class="fa fa-envelope-o"></i> EmailアカウントでSign in
                                </a>
                        </div>
                  </div>
                </div>
             </div>
        </main>

</body>
</html>