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
    <script>
    $( document ).ready(function() {
     // $('.change').click(function(){
     //     $(this).html('O');
     // });

    });
    </script>

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
?>

<?php

 $date =time () ;
 //This puts the day, month, and year in seperate variables
 $day = date('d', $date) ;
 $month = date('m', $date) ;
 $year = date('Y', $date) ;
 //Here we generate the first day of the month
 $first_day = mktime(0,0,0,$cMonth, 1, $cYear) ;
 //This gets us the month name
 $title = date('F', $first_day) ;
 //Here we find out what day of the week the first day of the month falls on
 $day_of_week = date('D', $first_day) ;
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){
 case "Sun": $blank = 0; break;
 case "Mon": $blank = 1; break;
 case "Tue": $blank = 2; break;
 case "Wed": $blank = 3; break;
 case "Thu": $blank = 4; break;
 case "Fri": $blank = 5; break;
 case "Sat": $blank = 6; break;
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ;
 //Here we start building the table heads
 echo "<table border=1 width=294>";
 echo "<tr><th colspan=7> $title $year </th></tr>";
 echo "<tr><td></td><td width=42>S</td><td width=42>M</td><td
width=42>T</td><td width=42>W</td><td width=42>T</td><td
width=42>F</td><td width=42>S</td></tr>";
 //This counts the days in the week, up to 7
 $day_count = 1;
 echo "<tr>";
 //first we take care of those blank days
 while ( $blank > 0 )
 {
 echo "<td></td>";
 $blank = $blank-1;
 $day_count++;
 }
 //sets the first day of the month to 1
 $day_num = 1;

 //count up the days, untill we've done all of them in the month
 echo "<td></td>";

 while ( $day_num <= $days_in_month )
 {
 if(($day_count % 7) == 1)
 {
    echo "<td></td>";
 }
 echo "<td>  $day_num</td>";

 $day_num++;
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 echo "</tr><tr>";

 $day_count = 1;

 echo "<tr>";
 echo "<td>dsa</td></tr>";
 echo "<tr>";
 echo "<td>dsa</td></tr>";
 echo "<tr>";
 echo "<td>dsa</td></tr>";
 }
 }

 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 )
 {

 echo "<td> </td>";
 $day_count++;
 }

 echo "</tr></table>";
?>
</table>
</td>
</tr>
</table>
<a href="<?php echo "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF width:300px;">Previous</a>
<a href="<?php echo "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF width:300px;">Next</a>

    <div class="date"></div>
     <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/task/{{ $task->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                // $workdays = array();
                // $type = CAL_GREGORIAN;
                // $month = date('n'); // Month ID, 1 through to 12.
                // $year = date('Y'); // Year in 4 digit 2009 format.
                // $day_count = cal_days_in_month($type, $month, $year); // Get the amount of days

                // //loop through all days
                // for ($i = 1; $i <= $day_count; $i++) {

                //         $date = $year.'/'.$month.'/'.$i; //format date
                //         $get_name = date('l', strtotime($date)); //get week day
                //         $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

                //         //if not a weekend add day to array
                //         if($day_name != 'Sun' && $day_name != 'Sat'){
                //             $workdays[] = $i;
                //         }

                // }

                // for($i=0;$i<=5;$i++){
                //     $d=strtotime("$i day");
                //     $date = date("Y-m-d", $d);
                //     echo $date;
                //     echo '<br>';
                // }
                // $Y = date('Y')."-".date('w')."-".date('j')."-".date('D');
                // print_r($workdays);


                ?>
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
            @endif
@endsection
