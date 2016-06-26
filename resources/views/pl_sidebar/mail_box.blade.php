@extends('pl_sidebar/sidebar')
@section('line_menu')
<div style="margin-top:80px;">&nbsp;</div>
@endsection
@section('content')

<div tyle="background:#FFF; height:100vh;">
    <div class="mail_box_wrapper" style="width:60%;  float:left; margin-left: 20px;">
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
                        <!-- list box -->
                        <div class="col-md-3">
                            <section class="panel panel-default mail-categories">
                                <ul class="list-group">
                                    <li class="list-group-item active list-inbox text-left">
                                        <a href="javascript:;">
                                            <i class="fa fa-inbox"></i>受信トレイ
                                            <span class="badge badge-info pull-right">{{$mail_count}}</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item list-notice text-left">
                                        <a href="javascript:;">
                                            <i class="fa fa-question-circle"></i>お知らせ
                                            <span class="badge badge-success pull-right">{{$notice_count}}</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item text-left">
                                        <a href="javascript:;">
                                            <i class="fa fa-pencil"></i>非表示メール
                                            <span class="badge badge-warning pull-right">1</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item text-left">
                                        <a href="javascript:;">
                                            <i class="fa fa-star"></i>重要
                                            <span class="badge badge-danger pull-right">3</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item text-left">
                                        <a href="javascript:;">
                                            <i class="fa fa-trash-o"></i>削除
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                        <!-- right mail -->
                        <div class="col-md-9 text-left" style=" padding-left:0px !important;">
                            <!-- mail-inbox -->
                            <div class="mail-inbox">
                                <div class="btn-group" dropdown is-open="status.isopen1" style="width:100%;">
                                    <button type="button" class="btn btn-default dropdown-toggle mail-select" dropdown-toggle style="margin-bottom:15px !important;">
                                        <label class="ui-checkbox">
                                            <input name="checkbox1" type="checkbox" value="option1"><span></span></label> <span class="caret"></span>
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
                                    <li role="presentation" class="active"><a href="#s" aria-controls="s" role="tab" data-toggle="tab">新着メール</a></li>
                                    <li role="presentation"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">重要メール</a></li>
                                </ul>
                                <div class="tab-content" style="">
                                    <div role="tabpanel" class="tab-pane active" id="s">
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
                                                <tr class="mail-unread">
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
                                                        <a href="{{ route('mail.show', $value->mail_id) }}">
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
                                    <div role="tabpanel" class="tab-pane" id="b">
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
                                </div>
                                <!-- tab end -->
                            </div>
                            <!-- mail-inbox end <-->

                            <!-- お知らせ -->
                            <!-- mail-inbox -->
                            <div class="mail-view none">
                                <div class="btn-group" dropdown is-open="status.isopen1" style="width:100%;">
                                    <button type="button" class="btn btn-default dropdown-toggle mail-select" style=" margin-bottom: 15px;" dropdown-toggle ng-disabled="disabled">
                                        <label class="ui-checkbox">
                                            <input name="checkbox1" type="checkbox" value="option1"><span></span></label> <span class="caret"></span>
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
                                    <!-- next&back -->
                                    <div class="float-right">
                                        <span style="margin-right:10px;">1-50(共有113列)</span>
                                        <button type="button" class="btn btn-default mail-back">
                                            <i class="fa fa-angle-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default mail-next">
                                            <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- mail right -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">お知らせ</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="s">
                                        <section class="panel panel-default mail-container" data-ng-controller="NotifyCtrl">
                                            <table class="table table-hover">
                                                 @foreach($notice as $value)
                                                    <tr class="mail-unread">
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
                                                        <td width="25%"><p class="company_name">{{$value->company_name}}</p></td>
                                                        <td width="32%"><p class="mail_title">{{$value->notice_title}}</td>
                                                        <td width="20%"></td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        </section>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="b">
                                        <section class="panel panel-default mail-container">
                                            <table class="table table-hover">

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
                                        </section>
                                    </div>
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


