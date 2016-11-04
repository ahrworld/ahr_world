<div class="panel panel-default panel_5">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" >
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　職務経歴書</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                        @foreach($exp_job as $value)
                            <tr>
                                <th width="150px" style="color:#000;">【經歷】</th>
                                <td></td>
                            </tr>
                           <!--  <tr>
                                <th width="150px">会社名</th>
                                <td>：○○○○○○○</td>
                            </tr> -->
                            <tr>
                                <th width="150px">職種</th>
                                <td>：{{ $value->name }}</td>
                            </tr>
                            <tr>
                                <th width="150px">期間</th>
                                <td>：{{ $value->year }}年</td>
                            </tr>
                            <!-- <tr>
                                <th width="150px">勤務地</th>
                                <td>：○○○○○○○</td>
                            </tr> -->
                            <!-- <tr>
                                <th width="150px">業務内容</th>
                                <td>：</td>
                            </tr> -->
                            <!-- <tr>
                                <th width="150px">給料（NTD）/月</th>
                                <td>：○○○○○○○</td>
                            </tr> -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
<!-- ■　海外経験 -->
<div class="panel panel-default panel_6">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" >
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　海外経験</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                            <tr>
                                <th width="150px" style="color:#000;">【現在・最新】</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th width="150px">目的</th>
                                <td>：○○○○○○○</td>
                            </tr>
                            <tr>
                                <th width="150px">機関名</th>
                                <td>：○○○○○○○</td>
                            </tr>
                            <tr>
                                <th width="150px">学年、学部、業務内容</th>
                                <td>：○○○○○○○</td>
                            </tr>
                            <tr>
                                <th width="150px">国名・地方名</th>
                                <td>：○○○○○○○</td>
                            </tr>
                            <tr>
                                <th width="120px">期間</th>
                                <td>：○○○○年　○○月　～　○○○○年　○○月</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>