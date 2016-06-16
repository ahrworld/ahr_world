@extends('pl_sidebar/sidebar')
@section('line_menu')
@include('pl_sidebar/line_menu')
@endsection
@section('content')
<style>
  .close_bt ,.update_bt , .update_bt1,.update_bt2{
    font-size:25px; color:#1c7ebb;
  }
  .close_bt:hover ,.update_bt:hover ,.update_bt1:hover,.update_bt2:hover{
    color:#1C46BB;
  }

  .update_content{
    margin-left: 0px !important;
  }
</style>
<script>
  $(document).ready(function() {
    $('.default_photo').hover(function(){
      $('.default_photo .update_bt').toggleClass('none');
    });
    $('.default_photo .update_bt').click(function(){
      $('.default_photo').addClass('none');
      $('.update_photo').removeClass('none');
    });

    $('.update-panel1').hover(function(){
      $('.update_bt1').toggleClass('none');
    });
    $('.update_bt1').click(function(){
      $('.default_content').addClass('none');
      $('.update_content').removeClass('none');
    });


    $('.default_summary .update_bt').click(function(){
      $('.default_summary').addClass('none');
      $('.update_summary').removeClass('none');
    });
    $('.update_summary .close_bt').click(function(){
      $('.update_summary').addClass('none');
      $('.default_summary').removeClass('none');
    });

    $('.default_summary').hover(function(){
      $('.default_summary .update_bt').toggleClass('none');
    });
  });

</script>

<div class="scorl" style="width:60%;  float:left; margin-left:15px;">
    <!-- プロフィール Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="a1">
            <div class="wrapper">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            <button class="btn btn-default">履歴書ダウンロード</button>
                            <div>&nbsp;</div>
                            @foreach($personnels as $value)
                            <p><span>{{ $value->character }}</span></p>
                            @endforeach
                            <div>&nbsp;</div>
                            <p><span class="red-color">※3か月以内に撮影した写真(〇正装、✕学生服、✕野外写真)のアップロードをお願いします。</span></p>
                        </div>
                        <!-- ? right -->
                    </div>
                </div>
                <!-- 2 -->
                <style>
                .user-view_table th {
                    font-size: 12px;
                    padding-top: 10px;
                }

                .user-view_table td {
                    padding-top: 10px;
                }
                </style>
                <!-- 3 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                                @foreach($personnels as $value)
                                <h6 style="margin-bottom:0px !important;">■　基本情報</h6>
                                <div class="panel-content">
                                    <table class="user-view_table">
                                        <tbody>
                                            <tr>
                                                <th width="80px">氏名</th>
                                                <td>：{{ $value->family_name.$value->surname}}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">英語名</th>
                                                <td>：{{ $value->family_name_en.$value->surname_en }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">国籍</th>
                                                <td>：{{ $value->country }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">性別</th>
                                                @if($value->sex === 1)
                                                <td>：男</td>
                                                @endif
                                                @if($value->sex === 0)
                                                <td>：女</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th width="80px">生年月日</th>
                                                <td>：{{ $value->birthday }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">現住所*</th>
                                                <td>：{{ $value->post.$value->city.$value->address}}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">E-mail*</th>
                                                <td>：{{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">Skype ID*</th>
                                                <td>：{{ $value->skype_id }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">Line ID*</th>
                                                <td>：{{ $value->line_id }}</td>
                                            </tr>
                                            <tr>
                                                <th width="80px">電話番号*</th>
                                                <td>：{{ $value->phone }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                <!-- 4 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                                <h6>■　学歴</h6>
                                <div class="panel-content">
                                    <table class="user-view_table">
                                        <tbody>
                                            <tr>
                                                <th width="100px">最終学歴</th>
                                                <td>：{{ $value->school}}</td>
                                            </tr>
                                            <tr>
                                                <th width="100px">学歴囯名</th>
                                                <td>：{{ $value->school_country}}</td>
                                            </tr>
                                            <tr>
                                                <th width="100px">専攻</th>
                                                <td>：{{ $value->subject}}</td>
                                            </tr>
                                            <tr>
                                                <th width="100px">卒業年度(予定)</th>
                                                <td>：{{ $value->end_year}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                        @endforeach
                    </div>
                </div>
                <!-- 5 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                                <h6>■　語学スキル</h6>
                                <div class="panel-content">
                                    <table class="user-view_table">
                                        <tbody>
                                            @foreach($languagelv as $value)
                                            @if($value->lv == 3)
                                            <tr>
                                                <th width="100px"><span style="color:#000;">・母語レベル</span>
                                                <td>：
                                                {{ $value->languagelv_name }}
                                                </td>
                                            </tr>
                                            @endif
                                            @if($value->lv == 2)
                                            <tr>
                                                <th width="100px"><span style="color:#000;">・ビジネスレベル</span>
                                                <td>：
                                                {{ $value->languagelv_name }}
                                                </td>
                                            </tr>
                                            @endif
                                            @if($value->lv == 1)
                                            <tr>
                                                <th width="100px"><span style="color:#000;">・日常会話レベル</span>
                                                <td>：
                                                {{ $value->languagelv_name }}
                                                </td>
                                            </tr>
                                            @endif
                                            @if($value->lv == 0)
                                            <tr>
                                                <th width="100px"><span style="color:#000;">・初級レベル</span>
                                                <td>：
                                                {{ $value->languagelv_name }}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </div>
                <!-- 6 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                                <h6>■　スキル</h6>
                                <div class="panel-content">
                                    <table class="user-view_table">
                                        <tbody>

                                           <!--  <tr>
                                                <th width="400px" style="color:#000;">{{ $value->skill_category }}</th>
                                                <td></td>
                                            </tr> -->
                                        @foreach($per_skill as $value)
                                            <tr>
                                                <th width="160px">・{{ $value->skill_name }}</th>
                                                @if($value->year == 1)
                                                <td>：1年未滿</td>
                                                @endif
                                                @if($value->year == 2)
                                                <td>：1年～3年</td>
                                                @endif
                                                @if($value->year == 3)
                                                <td>：3年～5年</td>
                                                @endif
                                                @if($value->year == 4)
                                                <td>：5年以上</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </div>
                <!-- 7 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
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
                <!-- 8 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
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


            </div>
            <!-- wrapper end -->
        </div>
        <!-- プロフィール tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->
@endsection

