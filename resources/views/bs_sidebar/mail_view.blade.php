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
                                    <a href="{{url('/mail_box')}}" style="line-height:20px; margin-bottom:15px !important;" class="btn btn-default mail-refresh">
                                        <i class="fa fa-mail-reply"></i>
                                    </a>
                                </div>
                                
                                <!-- mail right -->
                                            <section class="panel panel-default mail-container">
                                            <div class="panel-heading"><strong><i class="fa fa-envelope-o" style="font-size: 18px;"></i></strong></div>
                                            <div class="panel-body">
                                                <div class="mail-header row">
                                                    <div class="col-md-8">
                                                        <h4 style="color:#000;">{{$mail_view->mail_title}}</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div>
                                                </div>
                                                <div class="mail-info">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <strong style="font-size: 16px;">{{$mail_view->company_name}}</strong>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pull-right">
                                                                2/11/14 2:11 PM
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-content">
                                                    <blockquote>{{$mail_view->mail_content}}</blockquote>
                                                </div>
                                                <!-- 附件 -->
                                                <!-- <div class="mail-attachments">
                                                    <p><i class="fa fa-paperclip"></i> 2 attachements | <a href="javascript:;">Save all attachements</a></p>
                                                </div> -->
                                                <div class="mail-actions">
                                                    <a href="{{url('/mail_box')}}" class="btn btn-sm btn-primary">Reply <i class="fa fa-mail-reply"></i></a>
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


