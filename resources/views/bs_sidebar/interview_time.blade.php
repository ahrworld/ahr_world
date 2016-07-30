@extends('bs_sidebar/sidebar')
@section('line_menu')
@include('bs_sidebar/line_menu')
@endsection
@section('content')
<script>
function myFunction() {
    if($(this).html('X')){
        $(this).html('O');
        $(this).removeClass('status_x');
        $(this).addClass('status_o');
    }else{
        $(this).html('X');
        $(this).removeClass('status_o');
        $(this).addClass('status_x');
    }

}
$( document ).ready(function() {
  $('.ci').click(function(){
        $('.status').html('X');
        $('.status').removeClass('status_o');
        $('.status').addClass('status_x');

 });
  $('.ai').click(function(){
        $('.status').html('O');
        $('.status').removeClass('status_x');
        $('.status').addClass('status_o');

 });
 $('.status_o').click(function(){
     $('.status_o').mouseover(function(){
        $(this).html('X');
        $(this).removeClass('status_o');
        $(this).addClass('status_x');
     });

 });
 $('.status_x').click(function(){
  $('.status_x').mouseover(function(){

        $(this).html('O');
        $(this).removeClass('status_x');
        $(this).addClass('status_o');
        });

 });

});
</script>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">
<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" ><a href="{{ url('profile_b2#a2')}}">企業情報</a></li>
        <li role="presentation"><a href="{{ url('profile_b2')}}">採用情報</a></li>
        <li role="presentation"><a href="{{ url('profile_b2')}}">企業カラー</a></li>
        <li role="presentation" class="active"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程</a></li>
</ul>
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
        <div　style="margin-bottom:150px;">
            <label style="line-height: 23px;" class="radio-inline">
              <input  type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 台湾時間
            </label>
            <label  style="line-height: 23px;" class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked="">　日本時間
            </label>
            <label  style="line-height: 23px;" class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> ベトナム時間
            </label>
            <label style="line-height: 10px; float:right;" class="radio-inline">
        <input type="button" class="btn btn-primary" style="float:right; margin-top:20px; height:30px; margin-bottom:20px;" value="更改">

            </label>
        </div>

        <div>
            <input type="button" class="btn btn-info ci" style="float:left; margin-top:20px; height:30px; margin-bottom:20px; margin-right:10px;" value="全圈">
             <input type="button" class="btn btn-info ai" style="float:left; margin-top:20px; height:30px; margin-bottom:20px;" value="全叉">

        </div>

    <div class="caln_wrapper">
        <div class="column">
        <a class="prev" href="<?php echo "?month=". $prev_month . "&year=" . $prev_year; ?>"><<{{$prev_month}}月</a>
        <span class="badge">{{$cYear}}年{{$title}}月</span>
        <a class="next" href="<?php echo "?month=". $next_month . "&year=" . $next_year; ?>">{{$next_month}}月>></a>
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
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                    <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
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
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">10:00-11:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">11:00-12:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">13:00-14:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">14:00-15:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">15:00-16:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">16:00-17:00</div>
                        <div style="background:#D6EEFB; padding:17px 0px; border-top: 1px solid #000 !important;">17:00-18:00</div>
                        </td>
                    @endif
                    @if(($day_count % 7) == 6)

                    <td style="background:#419ECA; text-align:center; color:#FFF; height='100' ">
                       <div style="height:30px; font-size:16px; font-weight:bold; line-height:30px;">{{$day_num}}</div>
                       @for ($i = 0; $i < 7; $i++)
                       @if($i === 2)
                       <div class="status status_o">
                           O
                       </div>
                       @else
                       <div class="status status_x">
                           X
                       </div>
                       @endif

                       @endfor

                    </td>

                    <style>
                    .status_o{
                        cursor: pointer;
                        color: #0d7b0d;
                        font-size: 16px;
                        padding:15px 0px;
                        background: #FFF;
                        border-top: 1px solid #000 !important;
                        font-weight: bold !important;
                    }
                    .status_o:hover{
                        background:#CCC;

                    }
                    .status_x{
                        cursor: pointer;
                        color:#ccc;
                        font-size: 16px;
                        padding:15px 0px;
                        background: #FFF;
                        border-top: 1px solid #000 !important;
                        font-weight: bold !important;
                    }
                    .status_x:hover{
                        background: #7accf8;
                        color:#000;
                    }
                    </style>

                    @elseif(($day_count % 7) == 0)

                    <td style="background:#DF7B9D; text-align:center; height='100'">
                       <div style="height:30px; font-size:16px; font-weight:bold;  line-height:30px; color:#FFF;">{{$day_num}}</div>
                       @for ($i = 0; $i < 7; $i++)
                           @if($i === 2)
                           <div class="status status_o">
                               O
                           </div>
                           @else
                           <div class="status status_x">
                               X
                           </div>
                           @endif
                       @endfor
                    </td>



                    @else



                    <td style="background:#D6EEFB; text-align:center; height='100'">
                       <div style="height:30px; font-size:16px; font-weight:bold;  line-height:30px; ">{{$day_num}}</div>
                       @for ($i = 0; $i < 7; $i++)
                           @if($i === 2)
                           <div class="status status_o">
                               O
                           </div>
                           @else
                           <div class="status status_x">
                               X
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



