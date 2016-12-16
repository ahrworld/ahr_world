<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
    <body data-ng-app="app" id="app" data-custom-background data-off-canvas-nav>
        <!--[if lt IE 9]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div data-ng-controller="AppCtrl">
            <div data-ng-hide="isSpecificPage()" data-ng-cloak>
                <section  id="header" class="top-header">
                  <header class="clearfix">
                      <a href="#/" data-toggle-min-nav
                                   class="toggle-min"
                                   ><i class="fa fa-bars"></i></a>

                      <!-- Logo -->
                      <div class="logo">
                          <a href="#/">
                              <span>@{{main.brand}}</span>
                          </a>
                      </div>

                      <!-- needs to be put after logo to make it working-->
                      <div class="menu-button" toggle-off-canvas>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </div>

                      <div class="top-nav">
                          <ul class="nav-left list-unstyled">
                              <li class="dropdown" dropdown is-open="isopeBell">
                                  <a href="javascript:;" class="dropdown-toggle" dropdown-toggle ng-disabled="disabled">
                                      <i class="fa fa-bell-o nav-icon"></i>
                                      <span class="badge badge-warning"></span>
                                  </a>
                                  
                              </li>
                          </ul>

                          <ul class="nav-right pull-right list-unstyled">

                              <li class="dropdown text-normal nav-profile" dropdown is-open="status.isopenProfile">

                                          <a href="javascript:;" class="dropdown-toggle" dropdown-toggle ng-disabled="disabled">
                                              {{ Auth::user()->email }} <span class="caret"></span>
                                          </a>

                                          <ul class="dropdown-menu with-arrow pull-right">
                                              <li>
                                                  <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ trans('menu.logout') }}</a>
                                              </li>
                                          </ul>
                              </li>
                          </ul>
                      </div>
                  </header>
                </section>

                <aside data-ng-include=" '{{ asset('dist/app/layout/nav.php')}}' " id="nav-container"></aside>
            </div>

            <div class="view-container">

                <section data-ng-view id="content" class="animate-fade-up"></section>
            </div>
        </div>

        <script src="{{ asset('/dist/scripts/vendor.js')}}"></script>

        <script src="{{ asset('/dist/scripts/ui.js')}}"></script>

        <script src="{{ asset('/dist/scripts/app.js')}}"></script>
        <script src="{{ asset('/dist/jqx/jqwidgets/jqxcore.js')}}"></script>
        <!-- jqwidgets -->
       <link rel="stylesheet" href="{{ asset('/dist/jqx/jqwidgets/styles/jqx.base.css')}}" type="text/css" />
       <link rel="stylesheet" href="{{ asset('/dist/jqx/jqwidgets/styles/jqx.arctic.css')}}" type="text/css" />
       <link rel="stylesheet" href="{{ asset('/dist/jqx/jqwidgets/styles/jqx.metro.css')}}" type="text/css" />
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxtabs.js')}}"></script>

       <script src="{{ asset('/dist/jqx/jqwidgets/jqxdata.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxbuttons.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxscrollbar.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxlistbox.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxdropdownlist.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxmenu.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.filter.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.sort.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.edit.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.selection.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxpanel.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxcalendar.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxdatetimeinput.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.pager.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxnumberinput.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxwindow.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxinput.js')}}"></script>
       <script src="{{ asset('/dist/jqx/scripts/gettheme.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxcore.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxdata.export.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.export.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/globalization/globalize.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/globalization/globalize.culture.tw-TW.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxcheckbox.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.columnsresize.js')}}"></script>
       <script src="{{ asset('/dist/jqx/jqwidgets/jqxgrid.aggregates.js')}}"></script>
       <script src="{{ asset('/dist/jqx/scripts/demos.js')}}"></script>


    </body>
</html>