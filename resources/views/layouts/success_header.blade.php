<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <title>ahr</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- bootstrap -->
    <script src="ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <!-- ahr -->
    <script src="ahr/assets/js/ahr.js"></script>
    <link rel="stylesheet" href="assets/css/ahr.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- test fily -->
    <link rel="stylesheet" href="{{ asset('fily/styles/main.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
    <!-- needs images, font... therefore can not be part of ui.css -->
    <link rel="stylesheet" href="{{ asset('fily/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fily/bower_components/weather-icons/css/weather-icons.min.css')}}">
</head>
<body data-ng-app="app" id="app" data-custom-background data-off-canvas-nav>
<!-- header -->
        <section id="header" class="top-header" style="box-shadow: 0px 6px 10px -3px #9B9B9B;">
            <header class="clearfix">
                <div class="container">

                <!-- Logo -->
                <div class="logo">
                    <a href="#/">
                        <span><a href="#"><img src="assets/img/logo.png" height="40"></a></span>
                    </a>
                </div>

                <div class="top-nav">
                    <ul class="nav-left list-unstyled">

                        <li class="dropdown" dropdown is-open="isopenComment">
                            <a href="javascript:;" class="dropdown-toggle member-icon" dropdown-toggle ng-disabled="disabled">
                                <span class="badge badge-success">2</span>
                            </a>
                            <div class="dropdown-menu with-arrow panel panel-default">
                                <div class="panel-heading">
                                    You have 2 messages.
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="javascript:;" class="media">
                                            <span class="media-left media-icon">
                                                <span class="round-icon sm bg-info"><i class="fa fa-comment-o"></i></span>
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Jane sent you a message</span>
                                                <span class="text-muted">3 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="javascript:;" class="media">
                                            <span class="media-left media-icon">
                                                <span class="round-icon sm bg-danger"><i class="fa fa-comment-o"></i></span>
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Lynda sent you a mail</span>
                                                <span class="text-muted">9 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="panel-footer">
                                    <a href="javascript:;">Show all messages.</a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown" dropdown is-open="isopenEmail">
                            <a href="javascript:;" class="dropdown-toggle mail-icon" dropdown-toggle>
                                <span class="badge badge-info">3</span>
                            </a>
                            <div class="dropdown-menu with-arrow panel panel-default">
                            </div>
                        </li>
                        <li class="dropdown" dropdown is-open="isopeBell">
                            <a href="javascript:;" class="dropdown-toggle ie-icon" dropdown-toggle ng-disabled="disabled">
                                <span class="badge badge-warning">3</span>
                            </a>
                            <div class="dropdown-menu with-arrow panel panel-default">
                                <div class="panel-heading">
                                    You have 3 notifications.
                                </div>
                                <ul class="list-group">
                                </ul>
                                <div class="panel-footer">
                                    <a href="javascript:;">Show all notifications.</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- right -->
                    <ul class="nav-right pull-right list-unstyled">
                                    <li><form id="languages" action="language" method="post">
                                    {{ csrf_field() }}
                                          <select name="locale" class="form-control" onchange="this.form.submit()">
                                           <option value="" disabled selected>言語</option>
                                            <option value="jp">日本</option>
                                            <option value="tw">繁體中文</option>
                                            <option value="en">English</option>
                                          </select>
                                    </form>
                                    </li>　
                        <li class="dropdown langs text-normal" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
                             <!--  <form class="navbar-form navbar-right" role="search" style="margin-top:0px;">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Search" style="width:100px;">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                              </form> -->
                        </li>
                        <li class="dropdown" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
                            <a href="javascript:;" class="dropdown-toggle history-icon">
                            </a>
                        </li>
                                <li class="dropdown" dropdown is-open="status.isopenLang" data-ng-controller="LangCtrl">
                            <a href="javascript:;" class="dropdown-toggle setting-icon" dropdown-toggle ng-disabled="disabled">
                            </a>
                            <ul class="dropdown-menu with-arrow pull-right list-langs" role="menu">
                                <li><a href="javascript:;">プロフィールプレビュー</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">設定</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">お役立情報</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">ヘルプ</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">ログアウト</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                </div> <!-- end contanier -->
            </header>
        </section>