@extends('pl_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var token = '{{ Session::token() }}';
$( document ).ready(function() {

 $('.status_o').click(function() {
        var day = $(this).attr('day');
        var time = $(this).attr('time');
        var value = $(this).attr('value');
        var bs = $(this).attr('bs');
        var rs = $(this).attr('rs');
        $('.value').val(value);
        $('.bs_id').val(bs);
        $('.rs_id').val(rs);
        $('.day').html(day);
        switch (time) {
            case '0':
                $('.time').html('10:00-11:00');
                break;
            case '1':
                $('.time').html('11:00-12:00');
                break;
            case '2':
                $('.time').html('13:00-14:00');
                break;
            case '3':
                $('.time').html('14:00-15:00');
                break;
            case '4':
                $('.time').html('15:00-16:00');
                break;
            case '5':
                $('.time').html('16:00-17:00');
                break;
            case '6':
                $('.time').html('17:00-18:00');
        }
       
 });
 $('.test_time').click(function() {
        var winners_array = $('.status_o').map(function(){
              return $(this).attr('time');
        }).get();
        console.log(winners_array);
        var delect_time = $('.status_x').map(function(){
              return $(this).attr('time');
        }).get();
        $.ajax({
            type: "POST",
            url: "/interview/edit/submit",
            async: false,
            dataType: "json",
            data: {
                time: winners_array,
                delect_time : delect_time,
                _token: token
            },
            success: function(data) {
                console.log(JSON.stringify(data));
            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
  });

});
</script>
<div class="modal fade" id="schedule_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:415px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-weight: bold;">面接日程確認</h4>
      </div>

      <div class="modal-body">
          <form action="{{url('/schedule/check')}}" method="POST">
            {{ csrf_field() }}
            <h5 style="text-align:center; font-weight: bold;">日本時間</h5>
            <h5 style="text-align: center; font-weight: bold;">日期:<span class="day"></span></h5>
            <h5 style="text-align: center; font-weight: bold;">時間:<span class="time"></span></h5>
            <input type="hidden" name="value" class="value" value="">
            <input type="hidden" name="bs_id" class="bs_id" value="">
            <input type="hidden" name="rs_id" class="rs_id" value="">
            <div class="modal-footer rk_wrapper ">
            <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-primary">確認する</button>
            </div>
          </form>
      </div>
      
    
    </div>
  </div>
</div>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">

<div class="tab-content">
<div role="tabpanel" class="tab-pane ahr-panel active" style="    padding-bottom: 50px;">
<div class="panel panel-default">
<div class="panel-body">
    <?php
    $monthNames = Array("January", "February", "March", "April", "May", "June", "July",
       "August", "September", "October", "November", "December");

       if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
       if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

       $cMonth = $_REQUEST["month"];
       $cYear = $_REQUEST["year"];

       $prev_year = $cYear;
       $next_year = $cYear;
       $prev_month = $cMonth-1;
       $next_month = $cMonth+1;

       if ($prev_month == 0 ) {
           $prev_month = 12;
           $prev_year = $cYear - 1;
       }
       if ($next_month == 13 ) {
           $next_month = 1;
           $next_year = $cYear + 1;
       }


        $date =time () ;
        //This puts the day, month, and year in seperate variables
        $day = date('d', $date) ;
        $month = date('m', $date) ;
        $year = date('Y', $date) ;
        //Here we generate the first day of the month
        $first_day = mktime(0,0,0,$cMonth, 1, $cYear) ;
        //This gets us the month name
        $title = date('m', $first_day) ;
        //Here we find out what day of the week the first day of the month falls on
        $day_of_week = date('D', $first_day) ;
        //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
        switch($day_of_week){
        case "Mon": $blank = 0; break;
        case "Tue": $blank = 1; break;
        case "Wed": $blank = 2; break;
        case "Thu": $blank = 3; break;
        case "Fri": $blank = 4; break;
        case "Sat": $blank = 5; break;
        case "Sun": $blank = 6; break;
        }
        //We then determine how many days are in the current month
        $days_in_month = cal_days_in_month(0, $month, $year) ;
        $days_is_m = cal_days_in_month(0, $month, $year) ;
        //Here we start building the table heads
        $day_count = 1;
        ?>
      

      <!--   <div>
            <input type="button" class="btn btn-info ci" style="float:left; margin-top:20px; height:30px; margin-bottom:20px; margin-right:10px;" value="全圈">
             <input type="button" class="btn btn-info ai" style="float:left; margin-top:20px; height:30px; margin-bottom:20px;" value="全叉">

        </div>
 -->
    <div class="caln_wrapper">
        <div class="column">
        <a class="prev"  style="font-size: 16px; font-weight: bold;" href="<?php echo "?month=". $prev_month . "&year=" . $prev_year; ?>"><<{{$prev_month}}月</a>
        <span class="badge" style="font-size: 16px; font-weight: bold;">{{$cYear}}年{{$title}}月</span>
        <a class="next"  style="font-size: 16px; font-weight: bold;" href="<?php echo "?month=". $next_month . "&year=" . $next_year; ?>">{{$next_month}}月>></a>
        </div>
        <style>
        .interview .status{
            background:#FFF;　

        }
        .caln_wrapper{
            width:100%; margin:auto;
        }
        .caln_wrapper .column{
            width:100%; text-align:center;
            margin-bottom: 10px;
        }
        .caln_wrapper .column .prev{
            color:#FFFFFF width:300px; float:left;
        }
        .caln_wrapper .column .next{
            color:#FFFFFF width:300px; float:right;
        }
        </style>

        <table class="interview" border="1" width="100%">
                 @if($blank >= 1)
                    <td style="text-align:center;">
                    <div style="height:30px;"><img src="{{asset('assets/img/in_th.png')}}" height="30px" width="127px" alt=""></div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                    <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
                    </td>
                @endif
                @while($blank > 0)
                    <td></td>
                    <?php
                        $blank = $blank-1;
                        $day_count++;
                    ?>

                @endwhile
                <?php $day_num = 1; ?>
                @while($day_num <= $days_in_month)
                    @if(($day_count % 7) == 1)
                        <td style="text-align:center; width:20px;">
                        <div style="height:30px;"><img src="{{asset('assets/img/in_th.png')}}" height="30px" width="127px" alt=""></div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                        <div style="background:#D6EEFB; padding:6.5px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
                        </td>
                    @endif
                    @if(($day_count % 7) == 6)

                    <td style="background:#419ECA; text-align:center; color:#FFF; height='100' ">
                       <div style="height:30px; font-size:16px; font-weight:bold; line-height:30px;">{{$day_num}}</div>
                       
                       @for ($i = 0; $i < 7; $i++)
                       <?php $check = 0; ?>
                       @foreach($a as $key => $value)
                       @if($value->time == $cYear.$title.$day_num.$i)
                           <?php
                              $check = 1;
                           ?>
                          @break 
                       @endif
                       @endforeach

                       @if($check == 1)
                          <div class="status_o sta" bs="{{$res->user_id}}" rs="{{$id}}" value="{{$cYear.$title.$day_num.$i}}" day="{{$cYear.'-'.$title.'-'.$day_num}}" time="{{$i}}" data-toggle="modal" data-target="#schedule_modal"><span class="status">O</span></div>
                       @else
                         <div class="status_x sta" ><span class="status">X</span></div>
                       @endif
                      
                       @endfor
                      

                    </td>

                    <style>
                    .status{
                        background: rgba(255, 255, 255, 0) !important;
                    }
                    .status_o{
                        cursor: pointer;
                        color: #0d7b0d;
                        font-size: 16px;
                        padding:5px 0px;
                        background: #FFF;
                        border-top: 1px solid #000 !important;
                        font-weight: bold !important;
                    }
                    .status_o:hover{
                        background:#CCC;

                    }
                    .status_x{
                        color:#ccc;
                        font-size: 16px;
                        padding:5px 0px;
                        background: #FFF;
                        border-top: 1px solid #000 !important;
                        font-weight: bold !important;
                    }
                  
                    </style>

                    @elseif(($day_count % 7) == 0)

                    <td style="background:#DF7B9D; text-align:center; height='100'">
                       <div style="height:30px; font-size:16px; font-weight:bold;  line-height:30px; color:#FFF;">{{$day_num}}</div>
                       @for ($i = 0; $i < 7; $i++)
                       <?php $check = 0; ?>
                       @foreach($a as $key => $value)
                       @if($value->time == $cYear.$title.$day_num.$i)
                           <?php
                              $check = 1;
                           ?>
                          @break 
                       @endif
                       @endforeach

                       @if($check == 1)
                          <div class="status_o sta" bs="{{$res->user_id}}" rs="{{$id}}" value="{{$cYear.$title.$day_num.$i}}" day="{{$cYear.'-'.$title.'-'.$day_num}}" time="{{$i}}" data-toggle="modal" data-target="#schedule_modal"><span class="status">O</span></div>
                       @else
                         <div class="status_x sta"><span class="status">X</span></div>
                       @endif
                      
                       @endfor
                    </td>



                    @else



                    <td style="background:#D6EEFB; text-align:center; height='100'">
                       <div style="height:30px; font-size:16px; font-weight:bold;  line-height:30px; ">{{$day_num}}</div>
                       @for ($i = 0; $i < 7; $i++)
                       <?php $check = 0; ?>
                       @foreach($a as $key => $value)
                       @if($value->time == $cYear.$title.$day_num.$i)
                           <?php
                              $check = 1;
                           ?>
                          @break 
                       @endif
                       @endforeach

                       @if($check == 1)
                          <div class="status_o sta" bs="{{$res->user_id}}" rs="{{$id}}" value="{{$cYear.$title.$day_num.$i}}" day="{{$cYear.'-'.$title.'-'.$day_num}}" time="{{$i}}" data-toggle="modal" data-target="#schedule_modal"><span class="status">O</span></div>
                       @else
                         <div class="status_x sta"><span class="status">X</span></div>
                       @endif
                      
                       @endfor
                    </td>

                    @endif

                    <?php
                         $day_num++;
                         $day_count++;
                    ?>

                    @if($day_count > 7)

                     <?php $day_count = 1; ?>

                    <tr >
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>
                         <td style="border:0px;">&nbsp;</td>

                    </tr>
                    @endif


                @endwhile

                @while($day_count >1 && $day_count <=7)
                <td></td>
                <?php $day_count++; ?>
                @endwhile

        </table>
        </div>
        </div>
        </div>
        </div>
</div>
</div>
<!-- wrapper end -->
@endsection