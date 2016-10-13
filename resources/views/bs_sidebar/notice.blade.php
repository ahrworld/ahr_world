@extends('bs_sidebar/sidebar')
@section('line_menu')
@include('bs_sidebar/line_menu')
@endsection
@section('content')

<div tyle="background:#FFF; height:100vh;">
    <div class="mail_box_wrapper" style="width:60%;  float:left; margin-left: 20px;">
            <div class="row" style="text-align:center;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 text-left" style=" padding-left:10px !important;">
                            <!-- mail-inbox -->
                            <div class="mail-inbox">
                                <div class="btn-group" dropdown is-open="status.isopen1" style="width:100%;">
                                    <!-- reply -->
                                    <a href="{{url('/mail_box_bs')}}" style="line-height:20px; margin-bottom:15px !important;" class="btn btn-default mail-refresh">
                                        <i class="fa fa-mail-reply"></i>
                                    </a>
                                </div>
                                <!-- mail right -->
                                            <section class="panel panel-default mail-container">
                                            <div class="panel-heading"><strong><i class="fa fa-envelope-o" style="font-size: 18px;"></i></strong></div>
                                            <div class="panel-body">
                                                <div class="mail-header row">
                                                    <div class="col-md-8">
                                                        <h4 style="color:#000;">{{$notice->notice_title}}</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div>
                                                </div>
                                                <div class="mail-info">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <strong>{{$notice->company_name}}</strong>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pull-right">
                                                                2/11/14 2:11 PM
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($notice->status == 1)
                                                <div class="mail-content">
                                                    <blockquote>{{$notice->notice_content}}</blockquote>
                                                </div>
                                                @elseif($notice->status == 8)
                                                <div class="mail-content">
                                                    <blockquote>下記、ご確認をお願い致します。<br>
                                                                【日時：○月○日（○）　00:00-00:00】<br>
                                                                【SkypeID：{{$Personnel->skype_id}}】<br>
                                                                <br>
                                                                下記のＵＲＬから応募者情報をご確認頂けます。<br>
                                                                https://www.000111222333444555666<br>
                                                                <br>
                                                                日時変更や応募者へのリクエストなどは、このメールから送信頂けます。<br>
                                                                返信ボタンをクリックして、メッセージをお送りください。<br>
                                                                <br>
                                                                ★マッチング率を向上させるために、企業情報を定期的に更新しましょう★<br>
                                                                ①企業情報を編集する　https://www.000111222333444555666<br>
                                                                ②採用情報を編集する　https://www.000111222333444555666<br>
                                                                ③企業カラーを編集する　https://www.000111222333444555666<br>

                                                                ★ごリクエスト・ご相談がございましたら、ヘルプもしくは事務局までお問い合わせください★<br>
                                                                00000000@aaa.co.jp</blockquote>
                                                </div>
                                                @endif
                                                <!-- 附件 -->
                                                <!-- <div class="mail-attachments">
                                                    <p><i class="fa fa-paperclip"></i> 2 attachements | <a href="javascript:;">Save all attachements</a></p>
                                                </div> -->
                                                <div class="mail-actions">
                                                    <a href="{{url('/mail_box_bs')}}" class="btn btn-sm btn-primary">Reply <i class="fa fa-mail-reply"></i></a>
                                                </div>
                                            </div>
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


