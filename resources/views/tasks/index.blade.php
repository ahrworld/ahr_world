@extends('layouts.app')

@section('content')

    <!-- Bootstrap 樣板... -->
<button type="submit" class="btn btn-default test_ok">
                        <i class="fa fa-plus"></i> test
</button>
    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->
        @include('errors.errors')
        <!-- 新任務的表單 -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 任務名稱 -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">任務</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- 增加任務按鈕-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> 增加任務
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style>
    .caln_wrapper{
        width:900px; margin:auto;
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
    <div class="caln_wrapper">
    <div class="column">
    <a class="prev" href="<?php echo "?month=". $prev_month . "&year=" . $prev_year; ?>"><<{{$prev_month}}月</a>
    <span class="badge">{{$cYear}}年{{$title}}月</span>
    <a class="next" href="<?php echo "?month=". $next_month . "&year=" . $next_year; ?>">{{$next_month}}月>></a>
    </div>
    <script>
    $( document ).ready(function() {
     $('.change').click(function(){
        if($(this).html('O'))
        {
            $(this).html('X');
        };

     });

    });
    </script>
    <style>
    .interview .status{
        background:#FFF;　

    }
    </style>
    <table class="interview" border="1" width="100%">
             @if($blank >= 1)
                <td style="text-align:center;">
                <div style="height:19px;"><img src="{{asset('assets/img/in_th.png')}}" alt=""></div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
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
                    <td style="text-align:center; width:20px; ">
                    <div style="height:20px;"><img  src="{{asset('assets/img/in_th.png')}}" alt=""></div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                    <div style="background:#D6EEFB; padding:5px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
                    </td>
                @endif
                @if(($day_count % 7) == 6)

                <td style="background:#419ECA; text-align:center; color:#FFF; height='100' ">
                   <div style="">{{$day_num}}</div>
                   @for ($i = 0; $i < 7; $i++)
                   @if($i === 2)
                   <div class="status" style="color:#000; padding:5px 0px; border-top: 1px solid #000 !important;">
                       X
                   </div>
                   @else
                   <div class="status" style="color:#000; padding:5px 0px; border-top: 1px solid #000 !important;">
                       O
                   </div>
                   @endif

                   @endfor

                </td>



                @elseif(($day_count % 7) == 0)

                <td style="background:#DF7B9D; text-align:center; height='100'">
                   <div style="">{{$day_num}}</div>
                   @for ($i = 0; $i < 7; $i++)
                       @if($i === 2)
                       <div class="status" style="padding:5px 0px; border-top: 1px solid #000 !important;">
                           X
                       </div>
                       @else
                       <div class="status" style="padding:5px 0px; border-top: 1px solid #000 !important;">
                           O
                       </div>
                       @endif
                   @endfor
                </td>



                @else



                <td style="background:#D6EEFB; text-align:center; height='100'">
                   <div style="">{{$day_num}}</div>
                   @for ($i = 0; $i < 7; $i++)
                       @if($i === 2)
                       <div class="status" style="padding:5px 0px; border-top: 1px solid #000 !important;">
                           X
                       </div>
                       @else
                       <div class="status" style="padding:5px 0px; border-top: 1px solid #000 !important;">
                           O
                       </div>
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

                <tr>
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

                <script>
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  var token = '{{ Session::token() }}';
                  console.log(token);
                  $(document).ready(function(){
                        $('.test_ok').click(function(){

                           var bruce = $('#task-name').val();
                            $.ajax({
                                type: "GET",
                                url: "date",
                                // data: {body:$('#task-name').val(),_token:token},
                                success: function (data) {
                                    console.log(data);

                                    $('.date').html(data);
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                    alert('error');
                                }
                            });

                        });
                        $(".test_add").click(function(){
                            var count = 5;
                            for (var i = conut + 1; i <= 5; i++) {
                                var a = count;
                            };
                        });

                  });

                </script>
@endsection
