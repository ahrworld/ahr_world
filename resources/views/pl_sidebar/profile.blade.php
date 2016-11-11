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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var token = '{{ Session::token() }}';
  $(document).ready(function() {
     // var ctx = $("#canvas").get(0).getContext("2d");
     // var radarChartData = {
     //        labels: ["特定專門", "生活樣式", "挑戰客服", "奉仕貢獻", "創意創業", "安全安定", "自由自立", "縂合管理"],
     //        datasets: [
     //          {
     //            label: "My Second dataset",
     //            fillColor: "rgba(151,187,205,0.2)",
     //            strokeColor: "rgba(151,187,205,1)",
     //            pointColor: "rgba(151,187,205,1)",
     //            pointStrokeColor: "#fff",
     //            pointHighlightFill: "#fff",
     //            pointHighlightStroke: "rgba(151,187,205,1)",
     //            data: [28,48,40,19,96,27,100,100]
     //          }
     //        ]
     //      };
     // var myRadarChart = new Chart(ctx).Radar(radarChartData, {
     //     pointDot: false
     // });
     // 未修正
   var id = 1;
    $('.language_append .add').click(function(){
      $('.language_append').append($('<div class="form-inline" id="div'+ id +'"> <div class="form-group" style="margin-right:3px;"> <input type="text" class="form-control" name="language[]" placeholder="language"> </div><div class="form-group" style="margin-right:3px;"> <select class="form-control" name="languagelv[]"> <option value="3">母語</option> <option value="2">ビジネス</option> <option value="1">日常会話</option> <option value="0">初級</option> </select> </div><div class="form-group" ><a href="#" class="float-right" style="font-size:25px;" onclick="del('+id+')"> <i class="fa fa-times-circle" aria-hidden="true"></i> </a> </div></div>'));
      id++;
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
    // 上傳作品圖轉base64
    $("#p_File").change(function(){
      readImage( this );
    });
    $('.portfolio_view').click(function(){
       var img = $(this).find('img').attr('src');
       var title = $(this).attr('title');
       var content = $(this).attr('content');
       $('#portfolio_modal .portfolio_img').attr('src',img);
       $('#portfolio_modal .portfolio_title').html(title);
       $('#portfolio_modal .portfolio_content').html(content);
    });
    // analysis_wizard
    $('#analysis_wizard').bootstrapWizard({onNext: function(tab, navigation, index) {
      $('#analysis_wizard .navbar .navbar-tab li').eq(index).addClass('done');
      // Set the name for the next tab
     
    },onTabShow: function(tab, navigation, index) {
    var $total = navigation.find('li').length;
    var $current = index+1;
    var $percent = ($current/$total) * 100;

    $('#analysis_wizard').find('.bar').html($percent + '%');
    if($current >= $total) {
      $('#analysis_wizard').find('.pager .next').hide();
      $('#analysis_wizard').find('.pager .finish').show();
      $('#analysis_wizard').find('.pager .finish').removeClass('disabled');
    } else {
      $('#analysis_wizard').find('.pager .next').show();
      $('#analysis_wizard').find('.pager .finish').hide();
    }
    }});
    // analysis_form
    $('.analysis_form .finish_sumbit').click(function(){
        var br = $('.analysis_form').serialize();
        var s = $('.as').map(function(){
            return $(this).attr('status');
        }).get();
         $.ajax({
            type: "POST",
            url: "/analysis",
            async: false,
            dataType: "json",
            data: br,
            success: function(data) {
                console.log(JSON.stringify(data));
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
          console.log(s);
      
    });
  });
  // 上傳作品圖轉base64
  function readImage(input) {
    if ( input.files && input.files[0] ) {
      var FR= new FileReader();
      FR.onload = function(e) {
        //e.target.result = base64 format picture
        $('.p_file').val(e.target.result);
      };       
      FR.readAsDataURL( input.files[0] );
    }
  }



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

<style>
@if(isset($pl_image->image_small))

.photo{
background-image:url(data:image/png;base64,{{$pl_image->image_small}});
}

@endif
</style>

<div class="scorl" style="width:60%;  float:left; margin-left:15px;">
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#p1" aria-controls="p1" role="tab" data-toggle="tab">プロフィール</a></li>
        <li role="presentation"><a href="#p2" aria-controls="p2" role="tab" data-toggle="tab">実績・作品</a></li>
        <li role="presentation"><a href="#p3" aria-controls="p3" role="tab" data-toggle="tab">自己分析</a></li>
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
                .portfolio_view{
                  padding:0px !important; 
                  background-color:#FFF !important; 
                  cursor:zoom-in;
                }
                </style>
                <!-- ■　基本情報 -->
                @include('pl_sidebar/profile_branch/base')
                <!-- ■　語学スキル -->
                @include('pl_sidebar/profile_branch/skill')
                <!-- ■　職務経歴書 -->
                @include('pl_sidebar/profile_branch/experience')

            </div>
            <!-- wrapper end -->
        </div>
        <!-- 作品 tab-panel end -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p2">
            @include('pl_sidebar/profile_branch/portfolio')
        </div>
         <!-- 自己分析 -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p3">
<style>
  .analysis_form .number{
      list-style: none;
      float: left;
      padding: 7px 10px 7px 10px;
      margin-right: 5px;
      border-radius: 20px;
      background: #ACCFF1;
      margin-top: 20px;
      display: block;
      border: 3px double #EEE;
      color: #FFF !important;
  }
  .analysis_form .number.done{
    background: #3197FA;
  }
  .analysis_form .number.active{
    background: #FFF !important;
    border: 3px double #CCC;
    color: #000 !important;
  }
  .analysis_form .wizard{
    display: inline-block;
    padding: 5px 14px;
    background-color: #f6f6f6;
    border: 1px solid #f6f6f6;
    border-radius: 15px;
  }
  .analysis_form .wizard li a{
    background-color: #FFF !important;
    border: 1px #CCC solid;
  }
  .analysis_form .wizard li a:hover{
    background-color: #1c7ebb !important;
    color: #FFF;
  }
</style>
            <div class="wrapper" style="margin-top:0px !important;">
                <!-- 分析開始-->
                <div class="panel panel-primary">
                        <div class="panel-heading"><strong><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;自己分析</strong></div>
                        <div class="panel-body">
                           <form class="analysis_form" method="POST">
                           <div id="analysis_wizard">
                                      <div class="navbar" style="margin-bottom: 20px !important;">
                                        <div class="navbar-tab">
                                            <ul style="padding:0px;">
                                              <li class="number done">1<a href="#tab1" data-toggle="tab"></a></li>
                                              <li class="number">2<a href="#tab2" data-toggle="tab"></a></li>
                                              <li class="number">3<a href="#tab3" data-toggle="tab"></a></li>
                                              <li class="number">4<a href="#tab4" data-toggle="tab"></a></li>
                                              <li class="number">5<a href="#tab5" data-toggle="tab"></a></li>
                                              <li class="number">6<a href="#tab6" data-toggle="tab"></a></li>
                                              <li class="number">7<a href="#tab7" data-toggle="tab"></a></li>
                                            </ul>
                                        </div>
                                      </div><!-- end navbar -->

                                    <div class="tab-content">
                                     <div class="tab-pane" id="tab1">
                                       <div class="panel panel-warning">
                                                       <div class="panel-heading">
                                                           <h3 class="panel-title"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;ある分野ある分野ある分野ある分野ある分野ある分野</h3>
                                                       </div>
                                                       <div class="panel-body">
                                                           <div class="dl-horizontal">
                                                           <input type="hidden" name="status" value="a"> 
                                                                   <label class="ui-radio"><input  class="as" status="a" name="radio1" type="radio" value="1"><span>Option 1</span></label>
                                                                   <label class="ui-radio"><input  name="radio1" type="radio" value="2"><span>Option 2</span></label>
                                                                   <label class="ui-radio"><input name="radio1" type="radio" value="3"><span>Option 3</span></label>
                                                                   <label class="ui-radio"><input name="radio1" type="radio" value="4"><span>Option 4</span></label>
                                                                   <label class="ui-radio"><input name="radio1" type="radio" value="5" checked=""><span>Option 5</span></label>
                                                                   <label class="ui-radio"><input name="radio1" type="radio" value="6"><span>Option 6</span></label>
                                                           </div>
                                                       </div>
                                        </div>
                                     </div>
                                           <div class="tab-pane" id="tab2">
                                              <div class="panel panel-warning">
                                                              <div class="panel-heading">
                                                                  <h3 class="panel-title"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;ある分野ある分野ある分野ある分野ある分野ある分野</h3>
                                                              </div>
                                                              <div class="panel-body">
                                                                  <div class="dl-horizontal">
                                                                  <input type="hidden" name="status" value="b"> 
                                                                          <label class="ui-radio"><input name="radio2" type="radio" value="1"><span>Option 1</span></label>
                                                                          <label class="ui-radio"><input  class="as" status="b" name="radio2" type="radio" value="2"><span>Option 2</span></label>
                                                                          <label class="ui-radio"><input name="radio2" type="radio" value="3"><span>Option 3</span></label>
                                                                          <label class="ui-radio"><input name="radio2" type="radio" value="4"><span>Option 4</span></label>
                                                                          <label class="ui-radio"><input name="radio2" type="radio" value="5" checked=""><span>Option 5</span></label>
                                                                          <label class="ui-radio"><input name="radio2" type="radio" value="6"><span>Option 6</span></label>
                                                                  </div>
                                                              </div>
                                               </div>
                                           </div>
                                              <ul class="pager wizard">
                                                  <li class="previous first" style="display:none;"><a href="javascript:;">第一題</a></li>
                                                  <li class="previous"><a href="javascript:;"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                                                 
                                                  <li class="next"><a href="javascript:;"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                                                  <li class="next finish finish_sumbit" style="display:none;"><a href="javascript:;">分析開始</a></li>
                                              </ul>
                                           </div><!-- end tab-content -->

                                    </div><!-- end analysis_wizard -->
                                    </form>
                        </div>
                </div>
            </div>
        </div>
       <!--  <div class="panel panel-default">
        <canvas id="canvas" width="400" height="400"></canvas>
        </div> -->
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->

@endsection

