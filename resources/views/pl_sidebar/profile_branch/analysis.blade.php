@if(isset($Analysis_answer))
<script>
  $(document).ready(function() {

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
                data: [{{$Analysis_answer->as_value_1}},{{$Analysis_answer->as_value_2}},{{$Analysis_answer->as_value_3}},{{$Analysis_answer->as_value_4}},{{$Analysis_answer->as_value_5}},{{$Analysis_answer->as_value_6}},{{$Analysis_answer->as_value_7}},{{$Analysis_answer->as_value_8}}]
              }
            ]
          };
     var myRadarChart = new Chart(ctx).Radar(radarChartData, {
         pointDot: false
     });
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
                  console.log(JSON.stringify(data));
                  $('.analysis_form').addClass('none').removeClass('animated fadeIn');
                  $('.as_view').removeClass('none').addClass('animated flash');
                  $('.as_v').attr('checked',false);
                  myRadarChart();
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
          $('.as_v').attr('checked',false);
          $('#analysis_wizard').bootstrapWizard('first');


      });
     // if
     if ($('.as_view').has() ) {
        $('.analysis_form').addClass('none');
     }else{
        return false;
     }
  });
</script>
@endif
<div class="wrapper" style="margin-top:0px !important;">
    <!-- 分析開始 -->
    <div class="panel panel-primary">
            <div class="panel-heading"><strong><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;自己分析</strong></div>
            <div class="panel-body">
                @if(isset($Analysis_answer))
                <!-- analysis_view -->
                <div class="as_view" style="text-align: center;">
                   <canvas id="analysis_view" width="400" height="400"></canvas>
                    <div class="panel-footer">
                    <a id="as_again" class="btn btn-success" role="button" style="width:50%">もう一回</a>
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