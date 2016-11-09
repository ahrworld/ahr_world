

@extends('bs_sidebar/sidebar')
@section('line_menu')
@include('bs_sidebar/line_menu')
@endsection
@section('content')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var token = '{{ Session::token() }}';
$(document).ready(function() {
    $('.bt_1').click(function() {
        var r_id = $('.bt_1').attr('attr');
        $.ajax({
            type: "POST",
            url: "ttt",
            async: false,
            dataType: "json",
            data: {
                id: r_id,
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
    // 応募者管理
    $('#b1 .s1_btn').click(function(){
        $('#b1 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
});
</script>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#b1" aria-controls="b1" role="tab" data-toggle="tab">応募者管理</a></li>
        <li role="presentation"><a href="{{url('/news_b2#b2')}}">選考管理</a></li>
        <li role="presentation"><a href="{{url('/news_b2#b3')}}">面接管理</a></li>
    </ul>
    <!-- 応募者管理 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="b1">
            <div style="float:right;">
                <a href="">不合格</a>
            </div>
            <div class="wrapper">
                <!-- 新応募者 -->
                <div class="s1 search">
                @foreach($Recruitment_e as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->surname.$value->family_name }}</span></label>
                           <!--  <label class="" style="border:1px solid #ccc; padding:5px;"><span>{{ $value->name }}</span></label>
 -->
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">学部</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default" data-toggle="modal" data-target="#assess_modal" attr="{{$value->rs_id}}" >
                            E
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <style>
                .assess_btn form{
                    float: left;
                    margin-right: 20px;
                }
                .assess_btn button{
                    height: 50px;
                    width: 50px;
                    font-size: 30px;
                    font-weight: bold;
                    color: #FFF !important;
                }
                .assess_btn .tag{
                    float: left;
                    width: 100%;
                    font-size: 14px;
                    margin-top: 20px;
                }
                .assess_btn .tag span{
                    margin-right: 20px;
                }
                </style>




            </div>
            <!-- wrapper end -->
        </div>
        <!-- 応募者管理 tab-panel end -->


    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->

@endsection

