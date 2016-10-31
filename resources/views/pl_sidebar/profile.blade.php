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

  .update_1 .photo{
    background-position: center;
    background-size: cover;
    height:150px;
    width:150px;
    float: left;
  }
  .update_1 .photo .update_bt_smile{
    margin-top: 110px;
  }
  .btn_btom{
    margin-top:20px;
  }
</style>
<script>
  $(document).ready(function() {
     var ctx = $("#canvas").get(0).getContext("2d");
     var radarChartData = {
            labels: ["特定專門", "生活樣式", "挑戰客服", "奉仕貢獻", "創意創業", "安全安定", "自由自立", "縂合管理"],
            datasets: [
              {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28,48,40,19,96,27,100,100]
              }
            ]
          };
     var myRadarChart = new Chart(ctx).Radar(radarChartData, {
         pointDot: false
     });
  
    $('#myTabs a:last').click(function () {
      myRadarChart();
    });
    $('.default_summary .update_bt').click(function(){
      $('.default_summary').addClass('none');
      $('.update_summary').removeClass('none');
    });
    $('.update_summary .close_bt').click(function(){
      $('.update_summary').addClass('none');
      $('.default_summary').removeClass('none');
    });

    $('.panel-default').hover(function(){
      $(this).find(".update_bt").toggleClass('none');
    });
    
    $('.update-panel1').hover(function() {
        $('.update_bt1').toggleClass('none');
    });
    $('.update_bt1').click(function() {
        $('.default_content').addClass('none');
        $('.update_content').removeClass('none');
    });
    $(".js-example-templating").select2({
      templateResult: formatState
    });
  });
function formatState (state) {
  if (!state.id) { return state.text; }
  
  var $state = $(
    '<span><img height="30" src="ahr/assets/flag/' + state.element.value.toLowerCase() + '.svg" class="img-flag" /> ' + state.text + '</span>'
  );
  return $state;
};
var update_panel = function(a,b){
      $(a).addClass('animated fadeOut none').removeClass('animated fadeIn');
      $(b).removeClass('animated fadeOut none').addClass('animated fadeIn');
}
</script>
@foreach ($pl_image as $value)
<style>
.photo{
background-image:url(data:image/png;base64,{{$value->image_small}});
}
</style>
@endforeach
<div class="scorl" style="width:60%;  float:left; margin-left:15px;">
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#p1" aria-controls="p1" role="tab" data-toggle="tab">プロフィール</a></li>
        <li role="presentation"><a href="#a2" aria-controls="p2" role="tab" data-toggle="tab">MY ポートフォリオ自己紹介・分析</a></li>
    </ul>
    <!-- プロフィール Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="p1">
            <div class="wrapper" style="margin-top:0px !important;">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body  update_1">
                        <!-- photo left -->

                        <div class="img-thumbnail photo">
                           <a href="javascript:;" class="float-right update_bt_smile none">
                             <i class="fa fa-camera" aria-hidden="true"></i>
                           </a>
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
                    <!-- dsa -->
                    <!-- smile photo -->
                    <div class="panel-body update_photo_smile none">

                           <div class="row">
                               <div class="col-md-12">
                                   <a href="javascript:;" class="float-right update_bt none" style="position: absolute; text-align: right; width: 96%;">
                                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                   </a>
                                   <div id="image-cropper">
                                       <div class="cropit_wrapper" style="width:70%; float:left;">
                                              <div class="cropit-preview"></div>
                                              <form class="cropit_form"  method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                               <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                               <!-- range -->
                                               <span style="font-size:18px;">
                                                  <i class="fa fa-picture-o" aria-hidden="true"></i>
                                               </span>
                                               <input type="range" class="cropit-image-zoom-input" />
                                               <span style="font-size:30px;">
                                                  <i class="fa fa-picture-o" aria-hidden="true"></i>
                                               </span>
                                               <input type="hidden" name="image_small" class="hidden_image_data" />
                                       </div>
                                       <!-- 分界點 -->
                                       <div class="column">
                                           <a href="javascript:;" class="close" style="margin-bottom:60px;">
                                              <i class="fa fa-times" aria-hidden="true"></i>
                                           </a>
                                           <div class="fileUpload btn btn-info" style="width:200px;">
                                               <span><i class="fa fa-picture-o"></i>&nbsp;写真を選んでください</span>
                                               <input id="uploadBtn" class="cropit-image-input upload" required="required" name="image" type="file" accept="image/*" />
                                           </div>
                                           <div>&nbsp;</div>
                                           <button type="button" class="btn btn-primary ok-btn" style="width:200px;">
                                               <span><i class="fa fa-picture-o"></i>&nbsp;確認</span>
                                           </button>
                                       </div>
                                       </form>
                                   </div>
                                   <!-- image-cropper end-->
                               </div>
                               <!-- col-md-12 end-->
                           </div>
                    </div>
                    <!-- small photo -->
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
                .panel-default .update_bt , .panel-update .close_bt{
                    margin-top: 10px;
                }   
                </style>
                <!-- ■　基本情報 -->
                <div class="panel panel-default panel_1">

                    <div class="panel-body" style="padding-top: 0px !important;">
                    <!-- EDIT BUTTON -->
                    <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_1','.panel_1_update');">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
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
                    <!-- ■　基本情報update -->
                     <div class="panel panel-update panel_1_update none">
                         <div class="panel-body" style="padding-top: 0px !important;">
                              <!-- Close BUTTON -->
                              <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_1_update','.panel_1');">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                              </a>

                              <h6 style="margin-bottom:0px !important;">■　基本情報</h6>
                                <div class="panel-content">
                                <form action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
                                {{ csrf_field() }}
                                    <table class="user-view_table">
                                        <tbody>
                                            <tr>
                                                <th width="80px">姓：</th>
                                                <td><input type="text" name="family_name" class="form-control ahr-input_1" value="{{ $value->family_name}}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">名：</th>
                                                <td><input type="text" name="surname" class="form-control ahr-input_1" value="{{ $value->surname}}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">英語姓：</th>
                                                <td><input type="text" name="family_name_en" class="form-control ahr-input_1" value="{{ $value->family_name_en }}"></td>
                                            </tr>
                                             <tr>
                                                <th width="80px">英語名：</th>
                                                <td><input type="text" name="surname_en" class="form-control ahr-input_1" value="{{ $value->surname_en }}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">国籍：</th>
                                                <td><select name="country" class="js-example-templating js-states" style="width: 100%">
                                                  <option value="jp">日本</option>
                                                  <option value="tw">台湾</option>
                                                  <option value="vn">ベトナム</option>
                                                  <option value="kr">韓国</option>
                                                  <option value="hk">香港</option>
                                                  <option value="cn">中国</option>
                                                  <option value="in">インド</option>
                                                  <option value="id">インドネシア</option>
                                                  <option value="my">マレーシア</option>
                                                </select>
                                                </td>
                                            </tr>
                                           <!--  <tr>
                                                <th width="80px">性別：</th>
                                                @if($value->sex === 1)
                                                <td>男</td>
                                                @endif
                                                @if($value->sex === 0)
                                                <td>女</td>
                                                @endif
                                            </tr> -->
                                            <tr>
                                                <th width="80px">生年月日</th>
                                                <td><input type="text" name="birthday" class="form-control ahr-input_1" value="{{ $value->birthday }}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">現住所*：</th>
                                                <td><input type="text" name="name" class="form-control ahr-input_1" value="{{ $value->post.$value->city.$value->address}}"></td>
                                            </tr>
                                            
                                            <tr>
                                                <th width="80px">Skype ID*：</th>
                                                <td><input type="text" name="skype_id" class="form-control ahr-input_1" value="{{ $value->skype_id }}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">Line ID*：</th>
                                                <td><input type="text" name="line_id" class="form-control ahr-input_1" value="{{ $value->line_id }}"></td>
                                            </tr>
                                            <tr>
                                                <th width="80px">電話番号*：</th>
                                                <td><input type="text" name="phone" class="form-control ahr-input_1" value="{{ $value->phone }}"></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <button type="submit" class="btn btn-w-md btn-gap-v btn-primary  btn_btom">
                                    變更
                                    </button>
                                </form>

                                </div>
                        </div>
                    </div>
                <!-- ■　学歴 -->
                <div class="panel panel-default panel_2">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                            <!-- EDIT BUTTON -->
                            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_2','.panel_2_update');">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
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
                     
                    </div>
                </div>
                <div class="panel panel-update panel_2_update none">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                            <!-- Close BUTTON -->
                            <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_2_update','.panel_2');">
                              <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                                <h6>■　学歴</h6>
                                <div class="panel-content">
                                <form action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
                                {{ csrf_field() }}
                                    <table class="user-view_table">
                                        <tbody>
                                             <tr>
                                                <th width="100px">最終学歴：</th>
                                                <td><input type="text" name="school" class="form-control ahr-input_1" value="{{ $value->school}}"></td>
                                            </tr>
                                            <tr>
                                                <th width="100px">学歴囯名：</th>
                                                <td><input type="text" name="school_country" class="form-control ahr-input_1" value="{{ $value->school_country}}"></td>
                                            </tr>
                                            <tr>
                                                <th width="100px">専攻：</th>
                                                <td><input type="text" name="subject" class="form-control ahr-input_1" value="{{ $value->subject}}"></td>
                                            </tr>
                                            <tr>
                                                <th width="100px">卒業年度(予定)：</th>
                                                <td><input type="text" name="end_year" class="form-control ahr-input_1" value="{{ $value->end_year}}"></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-w-md btn-gap-v btn-primary btn_btom">變更</button>
                                 </form>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                        @endforeach
                    </div>
                </div>
                <!-- ■　語学スキル -->
                <div class="panel panel-default panel_3">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                            <!-- EDIT BUTTON -->
                            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_3','.panel_3_update');">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
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
                <div class="panel panel-update panel_3_update none">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                            <!-- Close BUTTON -->
                            <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_3_update','.panel_3');">
                              <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
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
                <!-- ■　スキル -->
                <div class="panel panel-default panel_4">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <!-- logo left -->
                            <div class="col-md-12">
                            <!-- EDIT BUTTON -->
                            <a href="javascript:;" class="float-right update_bt none" >
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
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
                <!-- ■　職務経歴書 -->
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


            </div>
            <!-- wrapper end -->
        </div>
        <!-- プロフィール tab-panel end -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="a2">
            <div class="wrapper" style="margin-top:0px !important;">
                <!-- 1 -->
                <div class="panel panel-default">
                <canvas id="canvas" width="400" height="400"></canvas>
                </div>
            </div>
       </div>


    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->
@endsection

