<div class="page" data-ng-controller="FlotChartCtrl">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Realtime Chart</h3>
        </div>
        <div class="panel-body" data-ng-controller="FlotChartCtrlRealtime">
            <div data-flot-chart-realtime
                 data-type="realtime"
                 style="width: 100%; height: 300px;"
                 ></div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Line and Area Chart</h3>
                </div>
                <div class="panel-body">
                    <div data-flot-chart
                         data-data="area.data"
                         data-options="area.options"
                         style="width: 100%; height: 300px;"
                         ></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Stacked Bar Chart</h3>
                </div>
                <div class="panel-body">
                    <div data-flot-chart
                         data-data="barChart.data"
                         data-options="barChart.options"
                         style="width: 100%; height: 300px;"
                         ></div>
                </div>
            </div>            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pie Chart</h3>
                </div>
                <div class="panel-body">
                    <div data-flot-chart
                         data-data="pieChart.data"
                         data-options="pieChart.options"
                         style="width: 100%; height: 300px;"
                         ></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Donut Chart</h3>
                </div>
                <div class="panel-body">
                    <div data-flot-chart
                         data-data="donutChart.data"
                         data-options="donutChart.options"
                         style="width: 100%; height: 300px;"
                         ></div>
                </div>
            </div>            
        </div>
    </div>

</div>