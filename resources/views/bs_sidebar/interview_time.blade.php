@extends('bs_sidebar/sidebar')
@section('line_menu')
@include('bs_sidebar/line_menu')
@endsection
@section('content')

 <?php
    //用ajax做inserrt
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
  
    for($i=0;$i<=10;$i++){
        $date = date('Y-m-d', strtotime($date .'+1 day'));
        echo $date;
        for ($j=1; $j<=5 ; $j++) {
            //使用if 做判斷  date = sql date
            //使用input name = XXX[]   全部存陣列
            //用status 判斷  1~5時間表
            // str_replace 過慮 status
            if ($j === 1) {
                echo "<button class='test$i$j change' data-href='$date' type='button'>O</button>";
            }else
            {
                echo "<button class='test$i$j change' data-href='$date' type='button'>X</button>";
            }
        }
        echo '<br>';
    }

    ?>
@endsection


