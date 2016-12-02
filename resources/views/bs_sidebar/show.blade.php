@extends('bs_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')
<script>
$(document).ready(function() {
  $('.portfolio_view').click(function(){
     var img = $(this).find('img').attr('src');
     var title = $(this).attr('title');
     var content = $(this).attr('content');
     var p_url = $(this).attr('p_url');
     $('#portfolio_modal .portfolio_img').attr('src',img);
     $('#portfolio_modal .portfolio_title').html(title);
     $('#portfolio_modal .portfolio_content').html(content);
     $('#portfolio_modal .portfolio_url').html(p_url);
     $('#portfolio_modal .portfolio_url').attr('href',p_url);
  });
  @if(isset($Analysis_answer))
        $('.analysis_form').addClass('none');
        var ctx = $("#analysis_view").get(0).getContext("2d");
        var radarChartData = {
               labels: ["特定專門", "生活樣式", "挑戰客服", "奉仕貢獻", "創意創業", "安全安定", "自由自立", "縂合管理"],
               datasets: [
                 {
                   label: "My Second dataset",

                   scaleSteps : 10,
                   scaleStepWidth : 500,
                   scaleStartValue : 500,
                   fillColor: "rgba(151,187,205,0.2)",
                   strokeColor: "rgba(151,187,205,1)",
                   pointColor: "rgba(151,187,205,1)",
                   pointStrokeColor: "#fff",
                   pointHighlightFill: "#fff",

                   pointHighlightStroke: "rgba(151,187,205,1)",
                   data: [{{$Analysis_answer->as_value_1}},{{$Analysis_answer->as_value_2}},{{$Analysis_answer->as_value_3}},{{$Analysis_answer->as_value_4}},{{$Analysis_answer->as_value_5}},{{$Analysis_answer->as_value_6}},{{$Analysis_answer->as_value_7}},{{$Analysis_answer->as_value_8}}]
                 }
               ]
             };
        var myRadarChart = new Chart(ctx).Radar(radarChartData, {
             scaleLineWidth :1, // 区切りの太さ(px)
             scaleOverride: true, // 区切りを絶対値で指定
             scaleSteps : 5, // 区切りの数
             scaleStepWidth : 20, // 区切りの間隔(100％がMAXのグラフなら、100/scaleSteps)
             scaleStartValue : 0, // 区切りの開始値(100%がMAXのグラフなら、0％の0)
             pointLabelFontStyle: '900', // 各項目名のスタイル類
             pointLabelFontSize: 13,
             pointLabelFontColor: '#5b4f30'
        });
        // analysis_again
        $('.as_view #as_again').click(function(){
            $('.analysis_form').removeClass('none').addClass('animated fadeIn');
            $('.as_view').addClass('none').removeClass('animated flash');
            $('.as_v').attr('checked',false);
        });
  @endif
});
</script>
<!-- modal -->

<div class="scorl" style="width:60%; float:left; margin-left:15px;">

<div class="wrapper" style="margin-top:0px !important;">
<div class="s1 search">

<div class="panel panel-default">
    <div class="panel-body">
        <!-- photo left -->
        @if(isset($pl_image->image_small))
        <div class="img-left">
            <img height="175" src="data:image/png;base64,{{$pl_image->image_small}}" alt="">
        </div>
        @else
        <div class="img-left">
            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
        </div>
        @endif
        <!-- content -->
        <div class="panel-content">
            <label class="ahr-label_bs" style="font-size:16px;">氏名:
            <span>
            {{ $res->family_name.$res->surname }}
            </span>

            @if($res->sex == 1)
            <span>♂</span>
            @else
            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
            @endif
            </label>
            <label style="font-size:18px;">{{$res->company_name}}</label>
           <!--  -->
            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $res->job_name }}</span></p>
            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $res->school }}</span></p>
            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $res->language_lv }}</span></p>
            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $res->country }}</span></p>
        </div>

        <div class="img-right">

        </div>
    </div>
</div>

</div>
</div>
<!--  -->
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#p1" aria-controls="p1" role="tab" data-toggle="tab">プロフィール</a></li>
        <li role="presentation"><a href="#p2" aria-controls="p2" role="tab" data-toggle="tab">実績・作品</a></li>
        <li role="presentation"><a href="#p3" aria-controls="p3" role="tab" data-toggle="tab">自己PR</a></li>
        <li role="presentation"><a href="#p4" aria-controls="p4" role="tab" data-toggle="tab">自己分析</a></li>
    </ul>
    <!-- プロフィール Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="p1">
            <div  id="dsa" class="wrapper dsadwrwqrwq" style="margin-top:0px !important;">
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
                                            <!-- <tr>
                                                <th width="80px">Skype ID</th>
                                                <td>：{{ $value->skype_id }}</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach
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
                                @foreach($personnels as $value)
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
                                    @endforeach
                                </div>
                            </div>
                            <!-- row end -->

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
                    <!-- ■　スキル -->
                    <div class="panel panel-default panel_4">
                        <div class="panel-body" style="padding-top: 0px !important;">
                            <div class="row">
                                <!-- logo left -->
                                <div class="col-md-12">
                                <!-- EDIT BUTTON -->
                                <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_4','.panel_4_update');">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                    <h6>■　スキル</h6>
                                    <div class="panel-content">
                                        <table class="user-view_table">
                                            <tbody>

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
                    <div class="panel panel-default panel_4_1">
                        <div class="panel-body" style="padding-top: 0px !important;">
                            <div class="row">
                                <!-- logo left -->
                                <div class="col-md-12">
                                <!-- EDIT BUTTON -->
                                <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_4_1','.panel_4_1_update');">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                    <h6>■　資格/免許</h6>
                                    <div class="panel-content">
                                        <table class="user-view_table">
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->
                        </div>
                    </div>
                    <div class="panel panel-default panel_5">
                        <div class="panel-body" style="padding-top: 0px !important;">
                            <div class="row">
                                <!-- logo left -->
                                <div class="col-md-12">
                                <!-- EDIT BUTTON -->
                                <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_5','.panel_5_update');">
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

                                                <tr>
                                                    <th width="150px">職種</th>
                                                    <td>：{{ $value->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">期間</th>
                                                    <td>：{{ $value->year }}年</td>
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
                    <!-- ■　海外経験 -->
                    @if(isset($abroad_exp))
                    <div class="panel panel-default panel_6">
                        <div class="panel-body" style="padding-top: 0px !important;">
                            <div class="row">
                                <!-- logo left -->
                                <div class="col-md-12">
                                <!-- EDIT BUTTON -->
                                <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_6','.panel_6_update');">
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
                                                    <th width="150px">目的：</th>
                                                    <td>{{$abroad_exp->main}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">機関名：</th>
                                                    <td>{{$abroad_exp->gear}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">学年、学部、業務内容：</th>
                                                    <td>{{$abroad_exp->content}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="150px">国名・地方名：</th>
                                                    <td>{{$abroad_exp->place}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="120px">期間：</th>
                                                    <td>{{$abroad_exp->gotime}}　～　{{$abroad_exp->backtime}}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->
                        </div>
                    </div>
                    @endif

            <!-- wrapper end -->
        </div>
        </div>
        <!-- 作品 tab-panel end -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p2">
              <!-- show portfolio -->
              <div class="row">
              @foreach($portfolio as $value)
              <div class="col-sm-6">
                  <div class="thumbnail portfolio_view" title="{{$value->p_title}}" content="{{$value->p_content}}" p_url="{{$value->p_url}}" data-toggle="modal" data-target="#portfolio_modal">
                      <img alt="{{$value->p_title}}" src="{{$value->p_file}}">
                      <div class="caption">
                          <h3>{{$value->p_title}}</h3>
                          <p>{{$value->p_content}}</p>
                          <p><a href="{{$value->p_url}}" style="color:#1c7ebb;">{{$value->p_url}}</a></p>
                      </div>
                  </div>
              </div>
              @endforeach
              </div>

              <!-- portfolio_modal -->
              <div class="modal fade" id="portfolio_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">ポートフォリオ</h4>
                    </div>
                    <div class="modal-body">
                      <img src="" alt="" class="portfolio_img" width="100%">
                      <h3 class="portfolio_title"></h3>
                      <h5 class="portfolio_content"></h5>
                      <h5><a href="" style="color:#1c7ebb;" class="portfolio_url"></a></h5>

                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- 自己PR -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p3">
              <div class="wrapper">
                    @foreach($pl_blog as $value)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <!-- video -->
                                <div class="col-md-12">
                                <div class="col-sm-3 img-thumbnail dsa_s photo" style="width:60px; height:60px;"></div>
                                <a href="javascritp:;" class="blog_name">{{ $value->surname.$value->family_name }}</a>
                                <span class="blog_time">{{ $value->created_at }}</span>
                                    <div class="panel-content" style="width:100%; font-size:25px; padding-right:50px;">
                                            <pre style="font-size: 16px;">{{ $value->blog_content }}</pre>
                                    </div>
                                    <div style="width:100%;">
                                    <img src="{{$value->blog_image}}" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

              </div>
        </div>
         <!-- 自己分析 -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p4">
              <!-- 分析開始 -->
              <div class="panel panel-primary">
                      <div class="panel-heading"><strong><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;自己分析</strong></div>
                      <div class="panel-body">
                          @if(isset($Analysis_answer))
                          <!-- analysis_view -->
                          <div class="as_view" style="text-align: center;">
                             <style>
                               .as_nice_content{
                                overflow : hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 10;
                                -webkit-box-orient: vertical;
                                word-break: break-all;
                               }
                             </style>
                             <div class="row">
                               <div class="col-xs-8">
                                  <canvas id="analysis_view" width="400" height="400"></canvas>
                               </div>
                               <div class="col-xs-4">
                                  <h3 class="as_nice_title">特定專門</h3>
                                  <h6 class="as_nice_content">dsadwqdwqdwqdwqdwqdwqdwqdwqdwdsadsadsadsadsasdadsadsadsadsadsadsaqdwewqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrqrwqrwqrwqrwqrwqrwqrwqqdwqdwqdwqdsadwqdwqdwqdwqdwqdwqdwqdwqdwdsadsadsadsadsasdadsadsadsadsadsadsaqdwewqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrwqrqrwqrwqrwqrwqrwqrwqrwqqdwqdwqdwq</h6>
                                  <a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a>
                               </div>
                             </div>
                          </div>
                         @endif
                      </div>
              </div>
              <!-- panel end -->
        </div>
    </div>
    <!-- tab-content end -->
</div>



</div>

@if(isset($pl_image->image_small))
<style>
.photo{
background-image:url(data:image/png;base64,{{$pl_image->image_small}});
}
</style>
@endif
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
.portfolio_view{
  padding:0px !important;
  background-color:#FFF !important;
  cursor:zoom-in;
}

input[type="radio"],
input[type="checkbox"] {
    margin: 10px !important;
    width: 16px;
    height: 16px;
}

.blog_image{
   background-repeat: no-repeat;
   width:100%;
   height:100%;
}
pre{
    background: #FFF !important;
    border:0px !important;

}
/*blog*/
 .dsa_s{
     display: block;
     background-position: center;
     background-size: cover;
     height:100px;
     width:100px;
 }
 .kv-fileinput-caption{
     height: 26px !important;
 }
 .blog_name{
     line-height: 40px;
     padding-left: 5px;
     float: left;
     color: rgba(28, 126, 187, 0.79);
     height: 0px;
     font-size: 21px;
 }
 .blog_time{
     line-height: 107px; padding-left:5px; float: left; height: 0px;
 }
</style>
@endsection


