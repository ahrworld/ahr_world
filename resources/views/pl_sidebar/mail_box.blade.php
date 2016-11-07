@extends('pl_sidebar/sidebar')
@section('line_menu')
<div style="margin-top:80px; ">&nbsp;</div>
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
 $('.delete_notice').click(function() {
        var delete_id = $('.mail-hightlight').map(function(){
              return $(this).attr('mail');
        }).get();
         if (delete_id == false) {
              swal({
                    title: "no select",
                    type: "info",
                    timer:1000,
                    showConfirmButton: false
              });
             return false;
        }
        $.ajax({
            type: "POST",
            url: "/mail_box/delete",
            async: false,
            dataType: "json",
            data: {
                delete: delete_id,
                _token: token
            },
            success: function(data) {
                console.log(JSON.stringify(data));
                swal({
                    title: "ok",
                    type: "success",
                    timer:1000,
                    showConfirmButton: false
                });
                var explode = function(){
                   window.location.reload();
                };
                setTimeout(explode, 1100);
            },
            error: function(data) {
                swal({
                    title: "error",
                    type: "error",
                    timer:1000,
                    showConfirmButton: false
                });

            }

        });

  });

});

</script>
<div tyle="background:#FFF; height:100vh;">
    <div class="mail_box_wrapper" style="width:60%;  float:left; margin-left: 20px; height:500px;">
            <div class="row" style="text-align:center;">
                <div class="col-md-12">
                    <div class="row" style="margin-left:5px;">
                        <!-- status1 -->
                        <div class="col-sm-12 label-status inbox-status">
                            <span class="color-label_1 pull-left">
                            ●<span class="font">リクエスト</span>
                            </span>
                            <span class="color-label_2 pull-left">
                            ●<span class="font">面接</span>
                            </span>
                            <span class="color-label_3 pull-left">
                            ●<span class="font">選考</span>
                            </span>
                            <span class="color-label_4 pull-left">
                            ●<span class="font">内定</span>
                            </span>
                        </div>
                        <!-- status2 -->
                        <div class="col-sm-12 label-status notice-status none">
                            <span class="color-label_5 pull-left">
                            ●<span class="font">新規</span>
                            </span>
                            <span class="color-label_2 pull-left">
                            ●<span class="font">面接</span>
                            </span>
                            <span class="color-label_4 pull-left">
                            ●<span class="font">内定</span>
                            </span>
                            <span class="color-label_6 pull-left">
                            ●<span class="font">辞退</span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <!-- right mail -->
                        <div class="col-md-12 text-left">
                            <!-- mail-inbox -->
                            <div class="mail-inbox">
                                <div class="btn-group" dropdown style="width:100%; margin-bottom: 20px;">

                                    <button type="button" class="btn btn-default dropdown-toggle mail-select"  data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" style="font-size:12px;">
                                        <li><a href="javascript:;">すべてチェック</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">選択解除</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">重要</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">非表示</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">表示</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">未読</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;">既読</a></li>
                                    </ul>
                                    <!-- refresh -->
                                    <button type="button" class="btn btn-default mail-refresh">
                                        <i class="fa fa-repeat"></i>
                                    </button>
                                    <button type="button" class="btn btn-default mail-refresh delete_notice" style="font-size: 18px !important;">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <!-- next&back -->
                                    <div class="float-right">
                                        <span style="margin-right:10px;">1-50(共有{{$mail_box->total()}}列)</span>
                                        @if($mail_box->currentPage() == $mail_box->lastPage())
                                        <a class="btn btn-default mail-back" href="{{ $mail_box->url($mail_box->currentPage()-1) }}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="disabled btn btn-default mail-next" href="{{ $mail_box->url($mail_box->currentPage()+1) }}">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        @else
                                        <a class="disabled btn btn-default mail-back" href="{{ $mail_box->url($mail_box->currentPage()-1) }}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="btn btn-default mail-next" href="{{ $mail_box->url($mail_box->currentPage()+1) }}">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <!-- mail right -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active list-inbox">
                                    <a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">
                                    <i class="fa fa-inbox"></i>&nbsp;
                                    新着メール
                                    </a>
                                    </li>
                                    <li role="presentation" class="list-notice">
                                    <a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">
                                    <i class="fa fa-question-circle"></i>&nbsp;
                                    お知らせ
                                    <!-- &nbsp;
                                    <span class="badge badge-success pull-right">{{$notice_count}}</span>  -->
                                    </a>
                                    </li>
                                    <li role="presentation">
                                    <a href="#important" aria-controls="important" role="tab" data-toggle="tab">
                                    <i class="fa fa-star"></i>&nbsp;
                                    重要
                                    </a>
                                    </li>
                                    <li role="presentation">
                                    <a href="#no_imp" aria-controls="no_imp" role="tab" data-toggle="tab">
                                    <i class="fa fa-pencil"></i>&nbsp;
                                    非表示
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="">
                                    <div role="tabpanel" class="tab-pane active" id="chat">
                                        <section class="panel panel-default mail-container" data-ng-controller="NotifyCtrl">
                                            <table class="table table-hover">
                                            <style>
                                            .mail-unread .company_name{
                                                overflow: hidden;
                                                text-overflow:ellipsis;
                                                white-space: nowrap;
                                                width: 100%;
                                            }
                                            .mail-unread .mail_title{
                                                overflow: hidden;
                                                text-overflow:ellipsis;
                                                white-space: nowrap;
                                                width: 120px;
                                            }
                                            </style>
                                            @foreach($mail_box as $value)
                                                <tr class="mail-unread" mail="{{$value->mail_id}}">
                                                    <td width="100">
                                                        <label class="ui-checkbox">
                                                            <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1">
                                                            <span style="margin-right:10px; font-size:16px; color:#D54A3C;">
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                            <span style="margin-right:10px; font-size:16px; color:#F6C356;">
                                                                <i class="fa fa-bookmark"></i>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td width="25%">
                                                        <a href="{{ route('mail_bs.show', $value->mail_id) }}">
                                                            <p class="company_name"><i class="fa fa-circle color-info"></i>
                                                            {{$value->company_name}}
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td width="32%"><p class="mail_title">{{$value->mail_title}}</td>
                                                    <td width="20%"></td>

                                                </tr>
                                            @endforeach



                                            </table>
                                        </section>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="important">
                                        <!-- <section class="panel panel-default mail-container">
                                            <table class="table table-hover">
                                                <tr class="mail-unread">
                                                    <td>
                                                        <label class="ui-checkbox">
                                                            <input name="checkbox1" type="checkbox" value="option1"><span></span></label>
                                                    </td>
                                                    <td>Jane Swift <i class="fa fa-circle color-info"></i></td>
                                                    <td>Nice to meet you</td>
                                                    <td><i class="fa fa-paperclip"></i></td>
                                                    <td>3/11/14 2:30 PM</td>
                                                    <td><i class="fa fa-star"></i></td>
                                                </tr>
                                                <tr class="mail-unread">
                                                    <td>
                                                        <label class="ui-checkbox">
                                                            <input name="checkbox1" type="checkbox" value="option1"><span></span></label>
                                                    </td>
                                                    <td>Gmail</td>
                                                    <td>Please confirm your registeration</td>
                                                    <td> </td>
                                                    <td>2/19/14 2:00 PM</td>
                                                    <td><i class="fa fa-star"></i></td>
                                                </tr>
                                            </table>
                                        </section> -->
                                    </div>
                                    <!-- お知らせ -->
                                    <div role="tabpanel" class="tab-pane" id="notice">
                                        <section class="panel panel-default mail-container" data-ng-controller="NotifyCtrl">
                                            <table class="table table-hover">
                                                 @foreach($notice as $value)
                                                    <tr class="mail-unread" mail="{{$value->id}}">
                                                        <td width="100">
                                                            <label class="ui-checkbox">
                                                                <input class="mail-checkbox" name="checkbox1" type="checkbox" value="option1">
                                                                <span style="margin-right:10px; font-size:16px; color:#D54A3C;">
                                                                                    <i class="fa fa-star"></i>
                                                                                </span>
                                                                <span style="margin-right:10px; font-size:16px; color:#F6C356;">
                                                                                    <i class="fa fa-bookmark"></i>
                                                                                </span>

                                                            </label>
                                                        </td>
                                                        <td width="20%">
                                                        <a href="{{ route('mail.show', $value->id) }}">
                                                            <p class="company_name"><i class="fa fa-circle color-label_5 pull-left"></i>
                                                            新規
                                                            </p>
                                                        </a>
                                                        </td>
                                                        <td width="32%"><p class="mail_title">
                                                        <a href="{{ route('mail.show', $value->id) }}">
                                                        {{$value->mail_title}}
                                                        </a>
                                                        </td>

                                                        <td width="20%"></td>


                                                    </tr>
                                                @endforeach

                                            </table>
                                        </section>
                                    </div>
                                    <!-- end -->
                                </div>
                                <!-- tab end -->
                            </div>
                            <!-- mail-inbox end <-->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

