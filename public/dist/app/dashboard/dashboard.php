<div class="page page-dashboard" data-ng-controller="DashboardCtrl">

    <!-- stats -->
    <div class="row">
        <div class="col-lg-6 col-xsm-6">
            <div class="panel mini-box">
                <span class="box-icon bg-success">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="box-info">
                    <p class="size-h2">25 <span class="size-h4">%</span></p>
                    <p class="text-muted"><span data-i18n="Growth"></span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xsm-6">
            <div class="panel mini-box">
                <span class="box-icon bg-info">
                    <i class="fa fa-users"></i>
                </span>
                <div class="box-info">
                    <p class="size-h2">112</p>
                    <p class="text-muted"><span data-i18n="New users"></span></p>
                </div>
            </div>
        </div>

    </div>
    <!-- end stats -->

    <div class="row">
        <div class="col-md-8">
            <section class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> <span data-i18n="Data"></span></strong></div>
                <div class="panel-body" data-ng-controller="MorrisChartCtrl">
                    <div morris-chart
                         data-data="comboData"
                         data-type="bar"
                         data-xkey="year"
                         data-ykeys='["a", "b", "c"]'
                         data-labels='["Value A", "Value B", "Value C"]'
                         data-bar-colors='["#176799","#42A4BB","#78D6C7"]'
                         style="height: 300px;"
                         ></div>
                </div>
            </section>
        </div>
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> <span data-i18n="Data"></span></strong></div>
                <div class="panel-body"  data-ng-controller="FlotChartCtrl">
                    <div data-flot-chart
                         data-data="donutChart2.data"
                         data-options="donutChart2.options"
                         style="width: 100%; height: 300px;"
                         ></div>
                </div>
            </div>



        </div>
    </div>






</div>
