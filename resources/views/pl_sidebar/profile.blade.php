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
       var p_url = $(this).attr('p_url');
       $('#portfolio_modal .portfolio_img').attr('src',img);
       $('#portfolio_modal .portfolio_title').html(title);
       $('#portfolio_modal .portfolio_content').html(content);
       $('#portfolio_modal .portfolio_url').html(p_url);
       $('#portfolio_modal .portfolio_url').attr('href',p_url);
    });
    // analysis_wizard

    $('#analysis_wizard').bootstrapWizard({onNext: function(tab, navigation, index) {
      $('#analysis_wizard .navbar .navbar-tab li').first().addClass('done');
      $('#analysis_wizard .navbar .navbar-tab li').eq(index).addClass('done');
      // Set the name for the next tab

    },onTabShow: function(tab, navigation, index) {
    var $total = navigation.find('li').length;
    var $current = index+1;
    var $percent = ($current/$total) * 100;
    // 判斷總數
    var count = $('.number').size();
    var done = $('.number.done.active').text();
    $('.number_count').html(count);
    $('.number_done').html(done);

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
        var status = $('.as_v:checked').map(function(){
            return {status:$(this).attr('status'), value:$(this).val()};
        }).get();
        $.ajax({
            type: "POST",
            url: "/analysis",
            async: false,
            dataType: "json",
            data: {data:status},
            success: function(data) {
                console.log(JSON.stringify(data));
                $('.analysis_form').addClass('none').removeClass('animated fadeIn');
                $('.as_view').removeClass('none').addClass('animated flash');
                // ajax
                $.ajax({
                    type: "GET",
                    url: "/view/analysis",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                      var as_value = data;

                      console.log(JSON.stringify(data['as_value_1']));
                      var ctx = $("#analysis_view").get(0).getContext("2d");
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
                                 data: [
                                 as_value['as_value_1'],
                                 as_value['as_value_2'],
                                 as_value['as_value_3'],
                                 as_value['as_value_4'],
                                 as_value['as_value_5'],
                                 as_value['as_value_6'],
                                 as_value['as_value_7'],
                                 as_value['as_value_8']
                                 ]
                               }
                             ]
                           };
                      var myRadarChart = new Chart(ctx).Radar(radarChartData, {
                          pointDot: false
                      });
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
    // analysis_again
    $('.as_view #as_again').click(function(){
        $('.analysis_form').removeClass('none').addClass('animated fadeIn');
        $('.as_view').addClass('none').removeClass('animated flash');
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
@if(isset($pl_image->image_small))

<style>

.photo{
background-image:url(data:image/png;base64,{{$pl_image->image_small}});
}


</style>
@endif
<div class="scorl" style="width:60%;  float:left; margin-left:15px;">
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#p1" aria-controls="p1" role="tab" data-toggle="tab">プロフィール</a></li>
        <li role="presentation"><a href="#p2" aria-controls="p2" role="tab" data-toggle="tab">実績・作品</a></li>
        <li role="presentation"><a href="#p3" aria-controls="p3" role="tab" data-toggle="tab">自己PR</a></li>
        <li role="presentation"><a href="#p4" aria-controls="p4" role="tab" data-toggle="tab">自己分析</a></li>
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
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p3">
            @include('pl_sidebar/profile_branch/blog')
        </div>
         <!-- 自己分析 -->
        <div role="tabpanel" class="tab-pane ahr-panel fade in" id="p4">
            @include('pl_sidebar/profile_branch/analysis')
        </div>
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->

@endsection

