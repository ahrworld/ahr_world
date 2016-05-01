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
     $( ".change" ).toggle(function() {
       $(this).html('O');
     }, function() {
       $(this).html('X');
     });
    });
    </script>
    <?php
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date .' -1 week'));

    $next_date = date('Y-m-d', strtotime($date .' +1 week'));
    for($i=1;$i<=5;$i++){
        $date = date('Y-m-d', strtotime($date .'+1 day'));
        echo $date;
        for ($j=1; $j<=5 ; $j++) {
            echo "<button class='test$i$j change' type='button'>X</button>";
        }
        echo '<br>';

    }

    ?>

  <a href="?date=<?=$prev_date;?>">Previous</a>
  <a href="?date=<?=$next_date;?>">Next</a>

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
