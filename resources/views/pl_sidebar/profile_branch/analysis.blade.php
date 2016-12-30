
<script>
  $(document).ready(function() {
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
          swal({
            title: "やり直しますか?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "はい",
            cancelButtonText: "いいえ",
          },
          function(){
            $('.analysis_form').removeClass('none').addClass('animated fadeIn');
            $('.as_view').addClass('none').removeClass('animated flash');
            $('.as_v').attr('checked',false);
          });

        });
  @endif
      // analysis_wizard
      $('#analysis_wizard').bootstrapWizard({onNext: function(tab, navigation, index) {
        $('#analysis_wizard .navbar .navbar-tab li').first().addClass('done');
        $('#analysis_wizard .navbar .navbar-tab li').eq(index).addClass('done');
        // 驗證radio
        var as = $('input[name=as_radio'+index+']:checked').val();
        if(as == null) {
                  swal({
                     title: "選択してください",
                     type: "warning",
                     timer:1000,
                     showConfirmButton: false
                  });
                  return false;
        }
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
      }
     });

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
                  window.location.reload();
              },
              error: function(data) {
                  console.log('Error:', data);
              }
          });
      });


  });
</script>

<div class="wrapper" style="margin-top:0px !important;">
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
                     .analysis_ul li{
                       list-style: none;
                       margin-bottom: 10px;
                       text-align: right;
                     }
                   </style>
                   <div class="row">
                     <div class="col-xs-8">
                        <canvas id="analysis_view" width="400" height="400"></canvas>
                     </div>
                     <div class="col-xs-4">

                     <ul class="analysis_ul">
                       <li style="list-style: none;">{{ trans('analysis.an_1') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_2') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_3') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_4') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_5') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_6') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_7') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>
                       <li style="list-style: none;">{{ trans('analysis.an_8') }}&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" role="button" style="width:50%;" data-toggle="modal" data-target="#as_nice">詳細</a></li>

                     </ul>


                     </div>
                   </div>
                    <div class="panel-footer">
                      <a id="as_again" class="btn btn-success" role="button" style="width:50%;">もう一回</a>
                    </div>
                </div>
               @endif
               <form class="analysis_form" method="POST">
               <!-- 總數 -->
               <div class="float-right" style="font-weight: bold; color: #1c7ebb;">
               <span class="number_count"></span>
               /
               <span class="number_done"></span>
               </div>
               <!-- 題目 -->

               <div id="analysis_wizard">
                          <div class="navbar" style="margin-bottom: 20px !important;">
                            <div class="navbar-tab">
                                <ul style="padding:0px;">
                                @foreach($Analysis_topic as $key => $value)
                                  <li class="number">{{ $key+1 }}<a href="#tab{{$key+1}}" data-toggle="tab"></a></li>
                                @endforeach
                                </ul>
                            </div>
                          </div><!-- end navbar -->

                        <div class="tab-content">
                        @foreach($Analysis_topic as $key => $value)
                         <div class="tab-pane" id="tab{{$key+1}}">
                           <div class="panel panel-warning">
                                           <div class="panel-heading">
                                               <h3 class="panel-title"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;{{$value->topic}}</h3>
                                           </div>
                                           <div class="panel-body">
                                               <div class="dl-horizontal">
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="1"><span>Option 1</span></label>
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="2"><span>Option 2</span></label>
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="3"><span>Option 3</span></label>
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="4"><span>Option 4</span></label>
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="5"><span>Option 5</span></label>
                                                       <label class="ui-radio"><input class="as_v" status="{{$value->as_status}}" name="as_radio{{$key+1}}" type="radio" value="7"><span>Option 6</span></label>
                                               </div>
                                           </div>
                            </div>
                         </div>
                         @endforeach
                         <!-- <div class="tab-content">
                          <div class="tab-pane" id="tab1">
                            <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;dsa</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="dl-horizontal">
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="1"><span>Option 1</span></label>
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="2"><span>Option 2</span></label>
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="3"><span>Option 3</span></label>
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="4"><span>Option 4</span></label>
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="5"><span>Option 5</span></label>
                                                        <label class="ui-radio"><input class="as_v" status="1" name="as_radio1" type="radio" value="7"><span>Option 6</span></label>
                                                </div>
                                            </div>
                             </div>
                          </div> -->
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
    <!-- panel end -->
</div>

<!-- as_nice modal -->
<div class="modal fade" id="as_nice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">分析</h4>
      </div>
      <div class="modal-body">
        <pre>
            ぜひ、「 」について、更にお話を伺えればと思っております。
            お忙しいところ恐縮ですが、よろしくお願い致します。
        </pre>
      </div>
      <div class="modal-footer rk_wrapper">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >わかりました</button>
      </div>
    </div>
  </div>
</div>