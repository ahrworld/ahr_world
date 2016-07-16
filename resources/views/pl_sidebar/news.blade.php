@extends('pl_sidebar/sidebar')
@section('line_menu')
<div class="row" style="width:60%; margin:80px  auto 30px;">
  <div class="col-lg-12">
    <form class="search" method="POST" >
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="input-group">
      <span class="input-group-btn">
        <input type="text" class="form-control" class="job" name="job" placeholder="職業から選ぶ">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="經驗。スキル">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="言語">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="勤務地">
      </span>
      <span class="input-group-btn">
        <button class="btn ahr-button search_btn" style="height:34px; line-height:20px;" type="button">檢索</button>
      </span>
    </div><!-- /input-group -->

    </form>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

@endsection
@section('content')
<style>
.ahr-label {
    background: #6BC8F2;
    margin: 0px !important;
    color: #FFF;
    padding: 3px;
    width: 70px;
    text-align: center;
    margin-right: 5px !important;
}

.panel-content p {
    margin-bottom: 5px !important;
}

.img-thumbnail {
    height: 180px !important;
}
</style>
<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業検索</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">お気に入り企業</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">面接日程</a></li>
    </ul>
    <script>
    $(document).ready(function() {

        $('.search_btn').click(function(){
            $.ajax({
                  type: "POST",
                  url: "search",
                  async: false,
                  dataType: "json",
                  data:  $('.search').serialize(),
                  success: function(data) {
                      console.log(JSON.stringify(data));
                      var listArray = new Object();
                      $.each(data, function(key, value) {
                        listArray[value.name] = value;
                        console.log(value);
                      });

                       $('.wrapper').html(moreArray);
                  },
                  error: function(data) {
                      console.log('Error:', data);
                  }
              });
        });

        $('.bt_2').click(function() {
            var r_id = $('.bt_2').attr('attr');
            $.ajax({
                  type: "POST",
                  url: "like",
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
            swal({
                title: "お気に入り",
                type: "success",
                timer:1000,
                showConfirmButton: false
            })
            setTimeout("location.reload();", 1000);

        });

        // 応募者管理
        $('#a1 .s1_btn').click(function(){
            $('#a1 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a1 .s2_btn').click(function(){
            $('#a1 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        //選考管理
        $('#a2 .s1_btn').click(function(){
            $('#a2 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a2 .s2_btn').click(function(){
            $('#a2 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a2 .s3_btn').click(function(){
            $('#a2 .s3').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a2 .s4_btn').click(function(){
            $('#a2 .s4').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
    });
    </script>
    <!-- 応募者管理 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
            <div class="">
                <button class="btn btn-default ahr-button_5 active s1_btn">企業検索</button>
                <button class="btn btn-default ahr-button_5 s2_btn">検索履歴</button>
            </div>
            <div class="wrapper">
                <!-- 企業検索 -->
                <div class="s1 search">
                @foreach($Recruitment as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <a href="{{ route('posts.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                            </a>
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            <a href="{{ route('posts.show', $value_r->r_id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>

                            <p>
                                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>{{$value_r->monthly_income}}万円～{{$value_r->annual_income}}万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span>{{$value_r->work_site}}</span></p>
                        </div>
                        <div class="img-right">

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
                                  <input type="hidden" name="b_id" id="b_id" value="">

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
                            <div style="width:150px; float:left;">
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_1" >応募する</a>
                                <a href="#" class="btn ahr-label-yellow ahr-btn-lg bt_2" attr="{{$value_r->r_id}}">お気に入り</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s1 end -->


                <!-- s2 end -->
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 応募者管理 tab-panel end -->

        <!-- 選考管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
            <div class="">
                <button class="btn btn-default ahr-button_5 active s1_btn">企業からオファー</button>
                <button class="btn btn-default ahr-button_5 s2_btn">応募した企業</button>
                <button class="btn btn-default ahr-button_5 s3_btn">お気に入り</button>
                <button class="btn btn-default ahr-button_5 s4_btn">足跡</button>
            </div>
            <div class="wrapper">
                <!-- 企業からオファー -->
                <div class="s1 search">
                @foreach($Recruitment_like as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content">

                            <a href="{{ route('posts.show', $value_r->id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>

                            <!-- <label>更新日時:<span>{{$value_r->updated_at}}</span></label> -->
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
                        <div class="img-right">
                            <div style="width:150px; float:left;">
                                <button class="btn ahr-label-blue ahr-btn-lg">応募する</button>
                                <button class="btn ahr-label-yellow ahr-btn-lg">お気に入り</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s1 end -->

                <!-- 応募した企業 -->
                <div class="s2 search none">
                @foreach($Recruitment_ofa as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content">

                            <a href="{{ route('posts.show', $value_r->id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>

                            <!-- <label>更新日時:<span>{{$value_r->updated_at}}</span></label> -->
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
                        <div class="img-right">
                            <div style="width:150px; float:left;">
                                <button class="btn ahr-label-blue ahr-btn-lg">リクエストを送る</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s2 end -->
                <!-- お気に入り -->
                <div class="s3 search none">
                @foreach($Recruitment_like as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">

                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            <a href="{{ route('posts.show', $value_r->id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>

                            <!-- <label>更新日時:<span>2015/12/11</span></label> -->
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
                        <div class="img-right">
                            <div style="width:150px; float:left;">
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->id}}">応募する</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s3 end -->
                <!-- 足跡 -->
                <div class="s4 search none">
                @foreach($Recruitment_like as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                        </div>
                        <!-- content -->
                        <div class="panel-content">

                            <a href="{{ route('posts.show', $value_r->id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>

                            <label>更新日時:<span>{{$value_r->updated_at}}</span></label>
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
                        <div class="img-right">
                            <div style="width:150px; float:left;">
                                <button class="btn ahr-label-blue ahr-btn-lg">応募する</button>
                                <button class="btn ahr-label-yellow ahr-btn-lg">お気に入り</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s4 end -->
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 選考管理 tab-panel end -->
        <!-- 面接管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
            <div class="">
                <button class="btn btn-default ahr-button_5 active">面接調整完了者</button>
                <button class="btn btn-default ahr-button_5">選考進行中</button>
                <button class="btn btn-default ahr-button_5">内定確定者</button>
            </div>
            <div class="wrapper">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 面接管理 tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
@endsection

