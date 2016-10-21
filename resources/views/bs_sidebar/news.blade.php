
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
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = this.href.split('#');
        $('.nav a').filter('a[href="#'+target[2]+'"]').tab('show');
    })
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
    $('.assess_btn button').click(function(){
       $(this).addClass('actives').siblings('.actives').removeClass('actives');
       var status =  $(this).attr('status');
       var content = $(this).attr('content');
       var title = $(this).attr('title');
       $('#assess_modal .rs_status').val(status);
       $('#assess_modal .rs_content').text(content);
       $('#assess_modal .rs_title').val(title);
    });
    
    $('.check_button').click(function(){
        var id = $(this).attr('attr');
        var status = $(this).attr('status');
        var title = $(this).attr('title');
        var content = $(this).attr('content');
        $('#check_modal .rs_status').val(status);
        $('#check_modal .rs_id').val(id);
        $('#assess_modal .rs_title').val(title);
        $('#check_modal .modal-title').html(content);
    });
});
</script>
<style>
.assess_btn form{
    float: left;
    margin-right: 20px;
}
.assess_btn{
    text-align: center;
}
.assess_btn button{
    height: 50px;
    width: 50px;
    font-size: 30px;
    font-weight: bold;
    color: #FFF !important;
    margin: 0px 5px;

}
.assess_btn button.actives{
    animation: progress-bar-stripes 2s linear infinite !important;
    background-image: -webkit-linear-gradient(45deg, rgba(255,255,255,0.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.15) 75%, transparent 75%, transparent) !important;
    background-color: #1C7EBB !important;
    border: 1px dashed #CCC;
}
.assess_btn .tag{
    float: left;
    width: 100%;
    font-size: 12px;
    margin-top: 20px;
}
.assess_btn .tag span{
    margin-right: 10px;
}
</style>
<!-- assess_modal modal -->
<div class="modal fade" id="assess_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:415px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">この応募者に対する評価:</h4>
      </div>
      <div class="modal-body">
          <div class="assess_btn" style="margin:15px; height: 100px;">
            <button type="submit" style="background:#00B9EF;" class="btn btn-default" status="3" 
            title="企業様から評価「A」が届いています" content="この度はぜひ面接をさせていただきたいと思います。つきましては、面接時に「」について詳しくお聞かせ願いたいと思っておりますので、ご準備お願いいたします。">A</button>
            <button type="submit" style="background:#00B9EF;" class="btn btn-default" status="4" 
            title="企業様から評価「B」が届いています" content="この度はぜひ面接をさせていただきたいと思います。つきましては、面接時に「」について詳しくお聞かせ願いたいと思っておりますので、ご準備お願いいたします。">B</button>
            <button type="submit" style="background:#BAE3F9;" class="btn btn-default" status="5" 
            title="企業様から評価「C」が届いています" content="残念ながら、「」が当社の募集基準を満たしていないため、保留中とさせていただきます。「」の追加がありましたら、履歴書の更新をお願いいたします。">C</button>
            <button type="submit" style="background:#BAE3F9;" class="btn btn-default" status="6" 
            title="企業様から評価「D」が届いています" content="残念ながら、「」が当社の募集基準を満たしていないため、保留中とさせていただきます。「」の追加がありましたら、履歴書の更新をお願いいたします。">D</button>
            <button type="submit" style="background:#999D9C;" class="btn btn-default" status="7" 
            title="企業様から評価「E」が届いています" content="残念ながら、基礎情報が不足しているため、不採用とさせていただきます。基礎情報の追加がありましたら、履歴書の更新をお願いいたします。">E</button>
              <div class="tag">
                  <span>A:面接調整へ</span>
                  <span>B:面接調整へ</span>
                  <span>C:檢討</span>
                  <span>D:檢討</span>
                  <span>E:不合格</span>
              </div>
          </div>
          <form action="{{url('/assess')}}" method="POST">
            {{ csrf_field() }}
            
            <input type="hidden" name="rs_id" class="rs_id" value="">
            <input type="hidden" name="rs_status" class="rs_status" value="">
            <input type="hidden" name="rs_title" class="rs_title" value="">
            <textarea name="rs_content" class="form-control rs_content"  rows="5">
            </textarea>
            <div class="modal-footer rk_wrapper ">
            <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-primary">送信する</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->

<!-- check modal -->
<div class="modal fade" id="check_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:415px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
       <form action="{{url('/assess')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="rs_id" class="rs_id" value="">
            <input type="hidden" name="rs_status" class="rs_status" value="">
            <input type="hidden" name="rs_title" class="rs_title" value="">
            <textarea name="rs_content" class="form-control rs_content"  rows="5" style="margin:15px auto; width: 80%;"></textarea>
        <div class="modal-footer">
             <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
             <button type="submit" class="btn btn-primary">確認する</button>
        </div>
       </form>
    </div>
  </div>
</div>
<!-- modal end -->
<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#b1" aria-controls="b1" role="tab" data-toggle="tab">応募者管理</a></li>
        <li role="presentation"><a href="#b2" aria-controls="b2" role="tab" data-toggle="tab">選考管理</a></li>
        <li role="presentation"><a href="#b3" aria-controls="b3" role="tab" data-toggle="tab">面接管理</a></li>
    </ul>
    <style>
        .ahr-button_bs{
            width: 120px !important;;
            font-size: 12px !important;;
            padding: 6px !important;
            margin: 0px auto !important;;
            box-shadow: -3px 3px 5px -1px #E0E0E0 !important;;
            border: 1px solid #CCC !important;;
            background: #FFF !important;
        }
        .ahr-button_bs:hover{
            background: #F1F3F5 !important;
        }
        .lis.active .ahr-button_bs{
            background: #d5d7d9 !important;
            border-color: #adadad !important;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
             box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
        }
        .lis{
            margin-right: 5px;
        }
        .s{
            border:none !important;
        }
        
    </style>
    <!-- 応募者管理 Tab panes -->
    <div class="tab-content">
        
        @include('bs_sidebar/new_branch/tab1')
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
                         <?php $check = 0; $ok;?>
                        @foreach($Recruitment_img as $va)
                        @if($va->u_id == $value->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break 
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                            <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                        </div>
                        @else
                        <div class="img-left">
                            <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">氏名:
                            <span>{{ $value->family_name.$value->surname }}</span>
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
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
                         <?php $check = 0; $ok;?>
                        @foreach($Recruitment_img as $va)
                        @if($va->u_id == $value->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break 
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                            <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                        </div>
                        @else
                        <div class="img-left">
                            <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">氏名:
                            <span>{{ $value->family_name.$value->surname }}</span>
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
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
                <button class="btn btn-default ahr-button_5 s4_btn">勤務開始報告</button>
            </div>
            <div class="wrapper animated fadeIn">
                <div class="s1 search">
                @foreach($Recruitment_f as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:0px !important;">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($Recruitment_img as $va)
                        @if($va->u_id == $value->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break 
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                            <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                        </div>
                        @else
                        <div class="img-left">
                            <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">氏名:
                            <span>{{ $value->family_name.$value->surname }}</span>
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
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
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="5" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【檢討中】メッセージが届いています。" content="檢討中ですか？">檢討中<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
                              </li>
                              <li>
                               <button type="button" class="btn btn-default dropdown-toggle check_button" status="9" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【面接合格】メッセージが届いています。" content="面接合格ですか？">面接合格<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
                              </li>
                              <li>
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="10" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【內定出し】メッセージが届いています。" content="內定出しですか？">内定出し<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
                              </li>
                              <li>
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="7" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【不採用】メッセージが届いています。" content="不採用ですか？">不採用<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
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
                        <?php $check = 0; $ok;?>
                        @foreach($Recruitment_img as $va)
                        @if($va->u_id == $value->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break 
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                            <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                        </div>
                        @else
                        <div class="img-left">
                            <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">氏名:
                            <span>{{ $value->family_name.$value->surname }}</span>
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                            <p><label class="label-gray" style="width:80px;">学部</label><span>{{ $value->school }}</span></p>
                            <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                            <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right" style="margin:15px 0px;">
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
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="5" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【檢討中】メッセージが届いています。" content="檢討中ですか？">檢討中<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
                              </li>
                              <li>
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="10" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【內定出し】メッセージが届いています。" content="內定出しですか？">内定出し<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
                              </li>
                              <li>
                              <button type="button" class="btn btn-default dropdown-toggle check_button" status="7" style="width:130px; background: #00B9EF; color:#FFF;"  data-toggle="modal" data-target="#check_modal" attr="{{$value->rs_id}}" title="面接調整【不採用】メッセージが届いています。" content="不採用ですか？">不採用<span class="caret" style="float:right; margin-top:4px; color:#FFF;"></span>
                              </button>
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
                         <?php $check = 0; $ok;?>
                        @foreach($Recruitment_img as $va)
                        @if($va->u_id == $value->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break 
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                            <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                        </div>
                        @else
                        <div class="img-left">
                            <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="margin:15px 0px 0px 15px;">
                            <label class="ahr-label_bs" style="font-size:16px;">氏名:
                            <span>{{ $value->family_name.$value->surname }}</span>
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
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

