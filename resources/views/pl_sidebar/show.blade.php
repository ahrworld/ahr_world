@extends('pl_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')
<style>
 .cropit-preview {
   /* You can specify preview size in CSS */
   width: 100%;
   height: 100px;
 }
 .cropit-photo {
   /* You can specify preview size in CSS */
   width: 100%;
   height: 100px;
 }
 /* this page only start */
 .panel-default{
  margin-bottom: 20px !important;
 }
 /* this page only end */
 .panel-default .default_photo{
   padding: 0px !important;
 }
 .default_photo .bs_background{
   background-position: center;
   background-size: cover;
   width:100%;
   height:150px;
   display: block;
 }
 .default_photo .bs_background .update_bt{
   position: absolute; bottom: 5px; right: 30px;
 }
 .default_photo .bs_photo{
   display: block;
   background-position: center;
   background-size: cover;
   height:100px; position: absolute; width:100px; bottom: -10px; left: 35px;
 }
 .default_photo .bs_photo .update_bt{
   position: absolute; bottom: 5px; right: 10px;
 }
</style>
<style>
  input[type="radio"],input[type="checkbox"]{
    margin: 10px !important;
    width: 16px;
    height: 16px;
  }
</style>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">

<div class="wrapper" style="margin-top:0px !important;">
<div class="s1 search">
@foreach($res as $key_r => $value_r)
<div class="panel panel-default">
    <div class="panel-body">
        <!-- photo left -->
        @if(isset($bs_image->image_small))
        <div class="img-left">
            <img height="175" src="{{ asset('ahr/busineses_img/')}}/{{$bs_image->image_small}}" alt="">
        </div>
        @else
        <div class="img-left">
            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
        </div>
        @endif
        <!-- content -->
        <div class="panel-content">
            <label style="font-size:18px;">{{$value_r->company_name}}</label>

            <p>
                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
            <p>
                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
            <p>
                <label class="label-gray">応募条件</label><span></span></p>
            <p>
                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
            <p>
                <label class="label-gray">勤務地</label><span></span></p>
        </div>
        <!-- news_modal_1 modal -->
        <div class="modal fade" id="news_modal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ID公開しますか？</h4>
              </div>

              <div class="modal-body none">
              <form class="form_a" action="{{url('/ttt')}}" method="POST" >
                {{ csrf_field() }}
                  <div class="form-group">
                  <label>メッセージ:</label>
                  <button class="btn btn-default">リクエストを送る</button>
                  <label style="color:#FF0037;">※テンプレートを使用する場合はボタンを押してください。</label>
                  </div>
                  <input type="hidden" name="id" id="id" value="">
                  <input type="hidden" name="b_id" id="b_id" value="{{$value_r->user_id}}">

                <textarea name="content" class="form-control"  rows="5">ご連絡頂き、ありがとうございます。
        ぜひ、「 」について、更にお話を伺えればと思っております。
        お忙しいところ恐縮ですが、よろしくお願い致します。
                </textarea>
              </div>
              <div class="modal-footer skype_wrapper">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary yes">Yes</button>
              </div>
              <div class="modal-footer rk_wrapper none">
                <button type="button" class="btn btn-default back" data-dismiss="modal">NO</button>
                <button type="submit" class="btn btn-primary" >送信する</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal end -->
        <div class="img-right">
            <div style="width:150px; float:left;">
                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$r_id->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_1">応募する</a>
                <a href="#" class="btn ahr-label-yellow ahr-btn-lg bt_2" attr="{{$r_id->r_id}}">お気に入り</a>
            </div>
        </div>
    </div>
</div>
@endforeach

</div>
</div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報編集</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報編集</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
        <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程編集</a></li>
    </ul>
    <!-- 企業情報 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
            <div class="wrapper">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body default_photo">
                        <div class="row">
                            <div class="col-md-12">
                                @if(isset($bs_image))
                                <div class="img-thumbnail bs_background" style=" background-image:url('{{ asset('ahr/busineses_img/')}}/{{$bs_image->image_big}}');">
                                </div>
                                <div class="img-thumbnail bs_photo" style=" background-image:url('{{ asset('ahr/busineses_img/')}}/{{$bs_image->image_small}}');">
                                </div>
                                @else
                                <div class="img-thumbnail bs_background">
                                </div>
                                <div class="img-thumbnail bs_photo">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- 2 -->
                    @foreach ($res as $task) @if($task->company_name)
                    <div style="margin:30px auto;">
                        <h4 style="font-weight:bold;">会社名:<span>{{$task->company_name}}</span></h4>
                    </div>
                    @endif @endforeach
                    <style>
                    .summary_A .image {
                        width: 130px;
                        height: 130px;
                        border: 1px solid #CCC;
                        float: left;
                        background-position: center;
                        background-size: cover;
                    }

                    .summary_A .text {
                        width: 470px;
                        float: left;
                        margin-left: 20px;
                    }
                    </style>
                    <!-- 4 -->
                    <div class="default_summary">
                        <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 57%;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <h6>■会社概要</h6>
                        <table class="table table-bordered ahr-table">
                            <tbody>
                                @foreach ($res as $task)
                                <tr>
                                    <th scope="row" width="20%">担当者氏名</th>
                                    <td>{{ $task->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">本社所在地</th>
                                    <td>{{ $task->address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">企業URL</th>
                                    <td>{{ $task->web_url }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">創業・設立</th>
                                    <td>{{ $task->set_up }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">社員国籍</th>
                                    <td>{{ $task->nationality_members }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">総従業員数</th>
                                    <td>{{ $task->member_count }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">資本金</th>
                                    <td>{{ $task->capital }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">売上高</th>
                                    <td>{{ $task->amount_of_sales }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 企業情報tab-panel end -->
        <!-- 採用情報 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
        </div>
        <!-- 採用情報 tab-panel end -->
        <!-- 企業カラー Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
            <div class="wrapper">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <!-- video -->
                            <div class="col-md-12">
                                <span class="img-thumbnail" style="width:100%; height:150px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0px !important;">
                        <div class="row">
                            <div class="col-md-12">
                                <table style="margin-bottom:20px;">
                                    <tbody>
                                        <tr>
                                            <th style="text-align:right !important; font-size:14px; padding-top:15px;">Title:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right !important; font-size:14px; padding-top:15px;">Sub Title:</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="panel-content">
                                    <label style="font-size:14px;">內容:</label>
                                    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                    <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 企業カラー tab-panel end -->
        <!-- 面接日程 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a4">
            <div class="wrapper">
                <div class="btn-group">
                    <button type="button" class="btn btn-default ahr-button_6 active">面接調整完了者</button>
                    <button type="button" class="btn btn-default ahr-button_6">選考進行中</button>
                    <button type="button" class="btn btn-default ahr-button_6">内定確定者</button>
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 面接日程 tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->
@endsection


