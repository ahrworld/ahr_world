@extends('layouts.app')

@section('content')

    <!-- Bootstrap 樣板... -->

<?php
    for ($i=0; $i < 2; $i++) {
        for ($j=0; $j <3 ; $j++) {
            if (($i + $j) % 2) {
                for ($k=0; $k <4 ; $k++) {
                   echo "<span>■</span>";
                   echo "<span>□</span>";
                }

            } else {
                for ($l=0; $l <4 ; $l++) {
                   echo "<span>□</span>";
                   echo "<span>■</span>";
                }

            }
            echo "<br>";
        }

    }

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
                        // Good 副作用がない
                        var arr = [1, 2, 3];
                        function double(arr) {
                          var _arr = [];
                          for(var i = 0; i < arr.length; i++) {
                            _arr.push(arr[i] * 2);
                          }
                          return _arr;
                        }
                        console.log(double(arr)); // [2, 4, 6]
                        console.log(double(arr)); // [2, 4, 6]

                        // Bad　副作用がある
                        var arr = [1, 2, 3];
                        function double(arr) {
                          for(var i = 0; i < arr.length; i++) {
                            arr[i] = arr[i] * 2;
                          }
                          return arr;
                        }
                        console.log(double(arr)); // [2, 4, 6]
                        console.log(double(arr)); // [4, 8, 12]

                  });

                </script>

@endsection
