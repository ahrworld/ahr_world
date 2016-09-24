

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
    $('#b1 .s2_btn').click(function(){
        $('#b1 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b1 .s3_btn').click(function(){
        $('#b1 .s3').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    //選考管理
    $('#b2 .s1_btn').click(function(){
        $('#b2 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b2 .s2_btn').click(function(){
        $('#b2 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b3 .s1_btn').click(function(){
        $('#b3 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b3 .s2_btn').click(function(){
        $('#b3 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b3 .s3_btn').click(function(){
        $('#b3 .s3').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('.assess-default').click(function(){
       var abc = $(this).attr('attr');
       $('.rs_id').val(abc);
    });

});
</script>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#b1" aria-controls="b1" role="tab" data-toggle="tab">応募者管理</a></li>
        <li role="presentation"><a href="#b2" aria-controls="b2" role="tab" data-toggle="tab">選考管理</a></li>
        <li role="presentation"><a href="#b3" aria-controls="b3" role="tab" data-toggle="tab">面接管理</a></li>
    </ul>
    <!-- 応募者管理 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="b1">
            <div class="">
                <button class="btn btn-default ahr-button_5 s1_btn active">新着応募者</button>
                <button class="btn btn-default ahr-button_5 s2_btn">お気に入り登録者</button>
                <button class="btn btn-default ahr-button_5 s3_btn">保 留</button>
                <button class="btn btn-default ahr-button_5 s4_btn">足 跡</button>
            </div>
            <div style="float:right;">
                <a href="{{ url('bs_e') }}">不合格</a>
            </div>
            <div class="wrapper">
                <!-- 新応募者 -->
                <div class="s1 search">
                @foreach($Recruitment as $key => $value)
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
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default" data-toggle="modal" data-target="#assess_modal" attr="{{$value->rs_id}}" >
                            ？
                          </a>
                        </div>
                    </div>
                </div>
                 <!-- news_modal_1 modal -->
                        <div class="modal fade" id="assess_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document" style="width:415px !important;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">この応募者に対する評価:</h4>
                              </div>

                              <div class="modal-body">

                                  <div class="assess_btn" style="margin:15px; height: 100px;">
                                      <form action="{{url('/a')}}" method="POST" >
                                      {{ csrf_field() }}
                                             <input type="hidden" name="rs_id" class="rs_id" value="">
                                              <button type="submit" style="background:#00B9EF;" class="btn btn-default">A</button>
                                      </form>
                                      <form action="{{url('/b')}}" method="POST" >
                                      {{ csrf_field() }}
                                            <input type="hidden" name="rs_id" class="rs_id" value="">

                                              <button type="submit" style="background:#00B9EF;" class="btn btn-default">B</button>
                                      </form>
                                      <form action="{{url('/c')}}" method="POST" >
                                      {{ csrf_field() }}
                                            <input type="hidden" name="rs_id" class="rs_id" value="">

                                              <button type="submit" style="background:#BAE3F9;" class="btn btn-default">C</button>
                                      </form>
                                      <form action="{{url('/d')}}" method="POST" >
                                      {{ csrf_field() }}
                                                <input type="hidden" name="rs_id" class="rs_id" value="">

                                              <button type="submit" style="background:#BAE3F9;" class="btn btn-default">D</button>
                                              </form>
                                      <form action="{{url('/e')}}" method="POST" >
                                      {{ csrf_field() }}
                                            <input type="hidden" name="rs_id" class="rs_id" value="">

                                              <button type="submit" style="background:#999D9C;" class="btn btn-default">E</button>
                                      </form>
                                      <div class="tag">
                                          <span>A:面接調整へ</span>
                                          <span>B:面接調整へ</span>
                                          <span>C:檢討</span>
                                          <div>&nbsp;</div>
                                          <span>D:檢討</span>
                                          <span>E:不合格</span>
                                      </div>

                                  </div>

                              </div>


                            </div>
                          </div>
                        </div>
                        <!-- modal end -->
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

                <!-- お気に入り登錄者 -->
                <div class="s2 search none">
                @foreach($Recruitment_like as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <label class="" style="border:1px solid #ccc; padding:2px 5px; font-weight:100;"><span>{{ $value->name }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            ？
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- 保留 -->
                <div class="s3 search none">
                @foreach($Recruitment_c as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span><span>♂</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">SKILL</label><span></span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>日本語(Native),中国語(Business),英語(Communication)....</span></p>
                        </div>

                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            C
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($Recruitment_d as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>

                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            D
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

            </div>
            <!-- wrapper end -->
        </div>
        <!-- 応募者管理 tab-panel end -->

        <!-- 選考管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="b2">
            <div class="">
                <button class="btn btn-default ahr-button_5 active">面接調整中</button>
                <button class="btn btn-default ahr-button_5">逆オファー中</button>
            </div>
            <div class="wrapper">
                <div class="b2 search">
                @foreach($Recruitment_a as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>

                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            A
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($Recruitment_b as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>

                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            B
                          </a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 選考管理 tab-panel end -->
        <!-- 面接管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="b3">
            <div class="">
                <button class="btn btn-default ahr-button_5 s1_btn active">面接調整完了者</button>
                <button class="btn btn-default ahr-button_5 s2_btn">選考進行中</button>
                <button class="btn btn-default ahr-button_5 s3_btn">内定確定者</button>
            </div>
            <div class="wrapper">
                <div class="s1 search">
                @foreach($Recruitment_f as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">学部</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default" style="margin-left: 89px;">
                            A
                          </a>
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" style="width:130px;background: #00B9EF; color:#FFF;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              予約中
                              <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                            </button>
                            <ul class="dropdown-menu" style="min-width: 131px !important; border:0px;" aria-labelledby="dropdownMenu1">
                              <li>
                              <form action="{{url('/h')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 檢討中
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                              <li>
                              <form action="{{url('/h')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button type="submit" class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 面接合格
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                              <li>
                              <form action="{{url('/g')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button type="submit" class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 内定出し
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                              <li>
                              <form action="{{url('/h')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 不採用
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                            </ul>
                          </div>

                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <div class="s2 search none">
                @foreach($Recruitment_h as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">学部</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default" style="margin-left: 89px;">
                            A
                          </a>
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" style="width:130px;background: #00B9EF; color:#FFF;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              予約中
                              <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                            </button>
                            <ul class="dropdown-menu" style="min-width: 131px !important; border:0px;" aria-labelledby="dropdownMenu1">
                              <li>
                              <form action="{{url('/i')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button type="submit" class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 内定出し
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                              <li>
                              <form action="{{url('/h')}}" method="POST" >
                              {{ csrf_field() }}
                              <input type="hidden" name="rs_id" class="rs_id" value="{{ $value->rs_id }}">
                               <button class="btn btn-default dropdown-toggle" style="width:130px; background: #00B9EF; color:#FFF;">
                                 不採用
                                 <span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                               </button>
                              </form>
                              </li>
                            </ul>
                          </div>
                          <div style="width:150px; float:left;">
                                <button class="btn ahr-label-blue ahr-btn-lg" style="margin-top:8px !important;">メールBOXへ</button>
                           </div>
                        </div>

                    </div>
                </div>
                @endforeach
                </div>
                <div class="s3 search none">
                @foreach($Recruitment_i as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">学部</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px;">
                          <a href="#" class="assess-default">
                            A
                          </a>
                          <div style="width:160px; float:left;">

                            </div>
                        </div>
                    </div>
                </div>

                </style>
                @endforeach
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 面接管理 tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->

@endsection

