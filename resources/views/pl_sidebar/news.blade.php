@extends('pl_sidebar/sidebar')

@section('search')
<div class="row " style="width:620px; float:left; margin-left:50px; ">
  <div class="col-lg-12">
    <form class="search" method="POST" >
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="input-group">
      <span class="input-group-btn">
        <input type="text" class="form-control" class="company_name" name="company_name" placeholder="会社名前">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control"  class="job" name="job" placeholder="職業から選ぶ">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" name="skill" placeholder="經驗。スキル">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" name="language" placeholder="言語">
      </span>
      <span class="input-group-btn">
        <input type="text" class="form-control" name="work_site" placeholder="勤務地">
      </span>
      <span class="input-group-btn">
        <button class="btn ahr-button search_btn" style="height:34px; line-height:20px;" type="button">檢索</button>
      </span>
    </div><!-- /input-group -->

    </form>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

@endsection
@section('line_menu')
<div style="height:50px;">&nbsp;</div>
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

<!-- news_modal_1 modal -->
<div class="modal fade" id="news_modal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">応募しますか？</h4>
      </div>
      <div class="modal-body">
      <form class="form_a" action="{{url('/ttt')}}" method="POST" >
        {{ csrf_field() }}

          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="b_id" id="b_id" value="">

        <textarea name="content" class="form-control"  rows="5">ご連絡頂き、ありがとうございます。
ぜひ、「 」について、更にお話を伺えればと思っております。
お忙しいところ恐縮ですが、よろしくお願い致します。
        </textarea>
      </div>
      <div class="modal-footer rk_wrapper">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >送信する</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- news_modal_2 modal -->
<div class="modal fade" id="news_modal_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">リクエスト</h4>
      </div>

      <div class="modal-body">
      <form class="form_a" action="{{url('/message')}}" method="POST" >
        {{ csrf_field() }}
          <input type="hidden" name="id" class="m_id" value="">
          <input type="hidden" name="b_id" class="m_b_id" value="">
        <textarea name="content" class="form-control"  rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >送信する</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- news_modal_3 modal -->
<div class="modal fade" id="news_modal_3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">メールを届く</h4>
      </div>

      <div class="modal-body">
      <form class="form_a" action="{{url('/chat')}}" method="POST" >
        {{ csrf_field() }}
          <input type="hidden" name="id" class="c_id" value="">
          <input type="hidden" name="b_id" class="c_b_id" value="">
        <textarea name="content" class="form-control"  rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >送信する</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- giveup modal -->
<div class="modal fade" id="giveup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top:150px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">辭退しますか？</h4>
      </div>

      <div class="modal-footer">
        <form action="{{url('/giveup')}}" method="POST" >
        {{ csrf_field() }}
        <input type="hidden" name="rs_id" class="rs_id" value="">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >辭退する</button>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業検索</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">選考管理</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">面接日程</a></li>
    </ul>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var token = '{{ Session::token() }}';

   (function(WIN) {
  var DAY, DEFAULT_FORMAT, HOUR, MINUTE, MONTH, SECOND, YEAR, angularApp, entry, exports, getFullTime, map, replace, time, two, unify;
  YEAR = "year";
  MONTH = "month";
  DAY = "day";
  HOUR = "hour";
  MINUTE = "minute";
  SECOND = "second";
  DEFAULT_FORMAT = "%y-%M-%d %h:%m:%s";
  map = {
    "%y": YEAR,
    "%M": MONTH,
    "%d": DAY,
    "%h": HOUR,
    "%m": MINUTE,
    "%s": SECOND
  };
  unify = function(time) {
    time -= 0;
    if (("" + time).length === 10) {
      time *= 1000;
    }
    return time;
  };
  two = function(str) {
    var s;
    s = "" + str;
    if (s.length === 1) {
      s = "0" + s;
    }
    return s;
  };
  replace = function(str, src, dst) {
    var reg;
    reg = new RegExp(src, "g");
    return str.replace(reg, dst);
  };
  getFullTime = function(time) {
    var date;
    date = new Date(unify(time));
    return {
      year: date.getFullYear(),
      month: two(date.getMonth() + 1),
      day: two(date.getDate()),
      hour: two(date.getHours()),
      minute: two(date.getMinutes()),
      second: two(date.getSeconds())
    };
  };
  time = {
    "default": function(time, format) {
      var fullTime, ret, src;
      if (format && (typeof format) !== "string") {
        throw new Error("format must be a string.");
      }
      fullTime = getFullTime(time);
      ret = format || DEFAULT_FORMAT;
      for (src in map) {
        ret = replace(ret, src, fullTime[map[src]]);
      }
      return ret;
    },
    human: function(time) {
      var ago, curTime, diff, int;
      time = unify(time);
      int = parseInt;
      curTime = +new Date();
      diff = curTime - time;
      ago = "";
      if (1000 * 60 > diff) {
        ago = "刚刚";
      } else if (1000 * 60 <= diff && 1000 * 60 * 60 > diff) {
        ago = int(diff / (1000 * 60)) + "分钟前";
      } else if (1000 * 60 * 60 <= diff && 1000 * 60 * 60 * 24 > diff) {
        ago = int(diff / (1000 * 60 * 60)) + "小时前";
      } else if (1000 * 60 * 60 * 24 <= diff && 1000 * 60 * 60 * 24 * 30 > diff) {
        ago = int(diff / (1000 * 60 * 60 * 24)) + "天前";
      } else if (1000 * 60 * 60 * 24 * 30 <= diff && 1000 * 60 * 60 * 24 * 30 * 12 > diff) {
        ago = int(diff / (1000 * 60 * 60 * 24 * 30)) + "月前";
      } else {
        ago = int(diff / (1000 * 60 * 60 * 24 * 30 * 12)) + "年前";
      }
      return ago;
    }
  };
  entry = time["default"];
  entry.human = entry.ago = time.human;
  if (typeof module !== "undefined" && module.exports) {
    return module.exports = exports = entry;
  } else if (typeof WIN["define"] === "function") {
    return define(function(require, exports, module) {
      return module.exports = exports = function() {
        return entry;
      };
    });
  } else if (typeof WIN["angular"] === "object") {
    angularApp = angular.module("binnng/time", []);
    angularApp.factory("$time", function() {
      return entry;
    });
    angularApp.filter("ago", function() {
      return function(time) {
        return entry.ago(time);
      };
    });
    angularApp.filter("date", function() {
      return function(time) {
        return entry(time, "%y年%M月%d日");
      };
    });
    return angularApp.filter("datetime", function() {
      return function(time) {
        return entry(time, DEFAULT_FORMAT);
      };
    });
  } else {
    return WIN["Time"] = entry;
  }
})(window);
 console.log(Time(1473157947, "%y年%M月%d日%h时%m分%s秒"));
    console.log(Time.human(1473157947));
    console.log(Time.ago(1473157947));
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
                      var listArray = [];
                      $.each(data, function(key, value) {
                        console.log(value);
                        listArray.push('<div class="panel panel-default"> <div class="panel-body"> <div class="img-left"> <img height="175" src="data:image/png;base64,'+value.image_small+'" alt=""> </div><div class="panel-content"> <a href="#"> <label style="font-size:18px;">'+value.company_name+'</label> </a> <p> <label class="label-gray">業種</label><span class="job_name">'+value.name+'</span></p><p> <label class="label-gray">仕事内容</label><span>'+value.content+'</span></p><p> <label class="label-gray">応募条件</label><span>'+value.need_skill+'</span></p><p><p> <label class="label-gray">言語</label><span>'+value.languagelv_name+'</span></p><p> <label class="label-gray">給与</label><span>'+value.monthly_income+'万円～'+ value.annual_income +' 万円</span></p><p> <label class="label-gray">勤務地</label><span>'+value.work_site+'</span></p></div><div class="img-right"> <div class="modal fade" id="news_modal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title" id="myModalLabel">ID公開しますか？</h4> </div><div class="modal-body none"> <form class="form_a" action="{{url('/ttt')}}" method="POST" >{{csrf_field()}}<div class="form-group"> <label>メッセージ:</label> <button class="btn btn-default">リクエストを送る</button> <label style="color:#FF0037;">※テンプレートを使用する場合はボタンを押してください。</label> </div><input type="hidden" name="id" id="id" value=""> <input type="hidden" name="b_id" id="b_id" value=""> <textarea name="content" class="form-control" rows="5">ご連絡頂き、ありがとうございます。ぜひ、「 」について、更にお話を伺えればと思っております。お忙しいところ恐縮ですが、よろしくお願い致します。 </textarea> </div><div class="modal-footer skype_wrapper"> <button type="button" class="btn btn-default" data-dismiss="modal">No</button> <button type="button" class="btn btn-primary yes">Yes</button> </div><div class="modal-footer rk_wrapper none"> <button type="button" class="btn btn-default back" data-dismiss="modal">NO</button> <button type="submit" class="btn btn-primary" >送信する</button> </div></form> </div></div></div><div style="width:150px; float:left;"> <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" data-toggle="modal" data-target="#news_modal_1" >応募する</a> <a href="#" class="btn ahr-label-yellow ahr-btn-lg bt_2">お気に入り</a> </div></div></div></div>');
                      });

                       $('#search').html(listArray);
                       swal({
                           title: "ok",
                           type: "success",
                           timer:1000,
                           showConfirmButton: false
                       });
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
                      swal({
                          title: "お気に入り",
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
                      console.log('Error:', data);
                  }
            });

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
        //面接調整
        $('#a3 .s1_btn').click(function(){
            $('#a3 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a3 .s2_btn').click(function(){
            $('#a3 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a3 .s3_btn').click(function(){
            $('#a3 .s3').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
        $('#a3 .s4_btn').click(function(){
            $('#a3 .s4').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
        });
    });
    </script>
    <style>
      .show_vi{
        cursor: pointer;
        font-size: 18px;
        display: inline-block;
        font-weight: bold;
        margin-bottom: 20px;
        margin-right: 20px;
      }

    </style>
    <div class="wrappers" ></div>
    <!-- 応募者管理 Tab panes -->
    <div class="tab-content" style="min-height: 450px;">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
            <div class="">
                <button class="btn btn-default ahr-button_5 active s1_btn">企業検索</button>
                <button class="btn btn-default ahr-button_5 s2_btn">検索履歴</button>
            </div>
            <div class="wrapper">
                <!-- 企業検索 -->
                <div id="search" class="s1 search">
                @foreach($Recruitment_ofa as $key_r => $value_r)
                <div class="panel panel-default ">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:5px; border:1px solid #CCC;">応募済み</span>
                            <p>
                                <label class="label-gray">業種</label><span class="job_name">{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>{{$value_r->monthly_income}}万円～{{$value_r->annual_income}}万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span>{{$value_r->work_site}}</span></p>
                        </div>
                        <div class="img-right">

                            <div style="width:150px; float:left;">
                             <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_message" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_2" >リクエストを送る</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @foreach($Recruitment_like as $key_r => $value_r)
                <div class="panel panel-default ">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:5px;background: #ffb61c;color: #FFF;">お気に入り</span>
                            <p>
                                <label class="label-gray">業種</label><span class="job_name">{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>{{$value_r->monthly_income}}万円～{{$value_r->annual_income}}万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span>{{$value_r->work_site}}</span></p>
                        </div>

                        <div class="img-right">

                            <div style="width:150px; float:left;">
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_1" >応募する</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                 @foreach($Recruitment as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>

                            <p>
                                <label class="label-gray">業種</label><span class="job_name">{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>{{$value_r->monthly_income}}万円～{{$value_r->annual_income}}万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span>{{$value_r->work_site}}</span></p>
                        </div>
                        <div class="img-right">

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
                <!--  檢索履歷 -->
                <div class="s2 search none">
                @foreach($history as $key => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="150" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="150" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content" style="width:70%;">

                            <a href="{{ route('business.show', $value_r->id) }}">
                            <label style="font-size:18px;">{{$value_r->company_name}}</label>
                            </a>
                            <span style="float: right; color: #b13d31;">最後觀看:{{$value_r->updated_at->format('Y年m月d日- H時:i分')}}</span>
                            <p>
                                <label class="label-gray">業種</label><span class="job_name">{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>

                                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span></span></p>
                        </div>

                    </div>
                </div>
                @endforeach
                </div>

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

                </div>
                <!-- s1 end -->

                <!-- 応募した企業 -->
                <div class="s2 search none">
                @foreach($Recruitment_ofa as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">

                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>

                            <!-- <label>更新日時:<span>{{$value_r->updated_at}}</span></label> -->
                            <p>
                                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
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
                <div class="panel panel-default ">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:5px;background: #ffb61c;color: #FFF;">お気に入り</span>
                            <p>
                                <label class="label-gray">業種</label><span class="job_name">{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>{{$value_r->monthly_income}}万円～{{$value_r->annual_income}}万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span>{{$value_r->work_site}}</span></p>
                        </div>

                        <div class="img-right">

                            <div style="width:150px; float:left;">
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_1" >応募する</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s3 end -->
                <!-- 足跡 -->
                <div class="s4 search none">

                </div>
                <!-- s4 end -->
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 選考管理 tab-panel end -->
        <!-- 面接管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
            <div class="">
                <button class="btn btn-default ahr-button_5 s1_btn active">面接日程</button>
                <button class="btn btn-default ahr-button_5 s2_btn">選考進行中</button>
                <button class="btn btn-default ahr-button_5 s3_btn">内定企業</button>
            </div>
            <div class="wrapper">
                <!-- 面接日程 -->
                <div class="s1 search">
                @foreach($Recruitment_a as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:4px 15px; background:#F0844A; color: #FFF;">日程決定</span>

                            <p>
                                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span></span></p>
                        </div>
                        <div class="img-right">
                            <div style="width:160px; float:left;">
                                      <a href="{{ route('schedule.show', $value_r->r_id) }}" class="btn ahr-label-blue ahr-btn-lg">スケジュールを選ぶ</a>
                                      <button type="button" class="btn ahr-label-yellow ahr-btn-lg giveup" attr="{{$value_r->r_id}}" data-toggle="modal" data-target="#giveup">辞退する</button>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- 選考進行中 -->
                <div class="s2 search none">
                  <!-- 解決空白狀況 -->
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-body" style="height: 300px;">
                          </div>
                      </div>
                    </div>
                  </div> -->
                @foreach($Recruitment_check as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:4px 15px; border: 1px #2ec1cc solid; color: #2ec1cc;">進行中</span>

                            <p>
                                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span></span></p>
                        </div>
                        <div class="img-right">
                            <div style="width:160px; float:left;">
                                <a href="javascript:;" class="btn ahr-label-blue ahr-btn-lg bt_chat" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_3">メールBOXへ</a>
                                <form action="{{url('/g')}}" method="POST" >
                                      {{ csrf_field() }}
                                      <input type="hidden" name="rs_id" class="rs_id" value="{{$value_r->r_id}}">
                                      <button type="button" class="btn ahr-label-yellow ahr-btn-lg giveup" attr="{{$value_r->r_id}}" data-toggle="modal" data-target="#giveup">辞退する</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- 內定企業 -->
                <div class="s3 search none">
                @foreach($Recruitment_ok as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <?php $check = 0; $ok;?>
                        @foreach($bs_image as $va)
                        @if($va->user_id == $value_r->user_id)
                        <?php
                              $check = 1;
                              $ok = $va->image_small;
                           ?>
                          @break
                        @endif
                        @endforeach
                        @if($check == 1)
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="data:image/png;base64,{{$ok}}" alt="">
                        </a>
                        </div>
                        @else
                        <div class="img-left">
                        <a href="{{ route('business.show', $value_r->r_id) }}">
                            <img height="175" src="{{ asset('assets/img/b-icon-c.png')}}" alt="" style="opacity: 0.5;">
                        </a>
                        </div>
                        @endif
                        <!-- content -->
                        <div class="panel-content">
                            <a class="show_vi" href="{{ route('business.show', $value_r->r_id) }}">
                            {{$value_r->company_name}}
                            </a>
                            <span style="padding:4px 15px; color: #FFF; background: #0094e5;">內定</span>

                            <p>
                                <label class="label-gray">業種</label><span>{{$value_r->name}}</span></p>
                            <p>
                                <label class="label-gray">仕事内容</label><span>{{$value_r->content}}</span></p>
                            <p>
                                <label class="label-gray">応募条件</label><span>{{$value_r->need_skill}}</span></p>
                            <p>
                                <label class="label-gray">言語</label><span>{{$value_r->languagelv_name}}</span></p>
                            <p>
                                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
                            <p>
                                <label class="label-gray">勤務地</label><span></span></p>
                        </div>
                        <div class="img-right">
                            <div style="width:160px; float:left;">
                                      <button class="btn ahr-label-blue ahr-btn-lg">內定報告する</button>
                                      <a href="javascript:;" class="btn ahr-label-blue ahr-btn-lg bt_chat" attr="{{$value_r->r_id}}" bs="{{$value_r->user_id}}" data-toggle="modal" data-target="#news_modal_3">メールBOXへ</a>
                                      <form action="{{url('/g')}}" method="POST" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="rs_id" class="rs_id" value="{{$value_r->r_id}}">
                                            <button type="button" class="btn ahr-label-yellow ahr-btn-lg giveup" attr="{{$value_r->r_id}}" data-toggle="modal" data-target="#giveup">辞退する</button>
                                      </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 面接管理 tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
@endsection

