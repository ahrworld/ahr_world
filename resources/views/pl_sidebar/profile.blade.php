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
.photo{
background-image:url(data:image/png;base64,{{$pl_image->image_small}});
}
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
        <div role="tabpanel" class="tab-pane ahr-panel fade in active" id="p2">
            <div class="wrapper" style="margin-top:0px !important;">
           
                <!-- add 作品 -->
                <div class="panel panel-info">
                        <div class="panel-heading"><strong><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;ポートフォリオ</strong></div>
                        <div class="panel-body">
                        <form method="POST" action="{{url('/portfolio/add')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token()}}">

                             <div class="form-group" style="height: 40px;">
                                 <label for="p_title" class="col-sm-3 control-label">タイトル</label>
                                 <div class="col-sm-9">
                                  <input type="text" class="form-control" name="p_title" id="p_title" placeholder="例：ランサーズ株式会社のロゴ制作">
                                 </div>
                             </div>

                             <div class="form-group" style="height: 75px;">
                               <label for="p_content" class="col-sm-3 control-label">說明文</label>
                               <div class="col-sm-9">
                                 <textarea class="form-control" required="required" name="p_content" placeholder="例：サイトリニューアルのデザインを担当させて頂きました。画像は納品したときのトップページのデザイン案です。" name="blog_content" rows="3"></textarea>
                               </div>
                             </div>
                             <div class="form-group">
                                <label for="p_File" class="col-sm-3">ポートフォリオ画像</label>
                                <div  class="col-sm-9">
                                <input accept="image/*" type="file" id="p_File">
                                <input type="hidden" name="p_file" class="p_file">
                                <p class="help-block">Example block-level help text here.</p>
                                </div>
                             </div>
                             <div class="form-group" class="col-sm-12" style="text-align: center;">
                             <button type="submit" style="padding: 5px 45px; margin-top: 15px;" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>新增</button>
                             </div>
                        </form>
                        </div>
                </div>
        
                <style>
                  .portfolio_view{
                    padding:0px !important; 
                    background-color:#FFF !important; 
                    cursor:zoom-in;
                  }
                </style>
                <!-- show portfolio -->
                <div class="row">
                @foreach($portfolio as $value)
                <div class="col-sm-6">
                    <div class="thumbnail portfolio_view" title="{{$value->p_title}}" content="{{$value->p_content}}" data-toggle="modal" data-target="#portfolio_modal">
                        <img alt="{{$value->p_title}}" src="{{$value->p_file}}">
                        <div class="caption">
                            <h3>{{$value->p_title}}</h3>
                            <p>{{$value->p_content}}</p>
                        </div>
                    </div>    
                </div>
                @endforeach
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
        <h3 class="portfolio_title">sdsa</h3>
        <h5 class="portfolio_content">dsads</h5>
      </div>
    </div>
  </div>
</div>
@endsection

