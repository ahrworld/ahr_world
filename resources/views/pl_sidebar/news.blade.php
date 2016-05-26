@extends('pl_sidebar/sidebar')
@section('line_menu')
@include('pl_sidebar/line_menu')
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var token = '{{ Session::token() }}';
    $(document).ready(function() {
        $('.bt_1').click(function() {
            var r_id = $('.bt_1').attr('attr');
            swal({
              title: "応募しますか？",
              showCancelButton: true,
              confirmButtonClass: "btn-info",
              confirmButtonText: "確認",
              cancelButtonText: "キャンセル",
              closeOnConfirm: false
            },
            function(){
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
              swal({
                title: "成功",
                type: "success",
                timer:1000,
                showConfirmButton: false
              })
              setTimeout("location.reload();", 1000);
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
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
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
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->id}}">応募する</a>
                                <a href="#" class="btn ahr-label-yellow ahr-btn-lg bt_2" attr="{{$value_r->id}}">お気に入り</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                <!-- s1 end -->

                <!-- 検索履歴 -->
                <div class="s2 search none">
                @foreach($Recruitment as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
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
                                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$value_r->id}}">応募する</a>
                                <button class="btn ahr-label-yellow ahr-btn-lg">お気に入り</button>
                            </div>
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
                @foreach($Recruitment_like as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
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
                <!-- s1 end -->

                <!-- 応募した企業 -->
                <div class="s2 search none">
                @foreach($Recruitment_ofa as $key_r => $value_r)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- photo left -->
                        <div class="img-left">
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
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
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
                            <label>更新日時:<span>2015/12/11</span></label>
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
                            <img height="500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            @foreach($BSinformation as $key_b => $value_b)
                            <label style="font-size:18px;">{{$value_b->company_name}}</label>
                            @endforeach
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
                        <!-- photo left -->
                        <div class="img-left">
                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                        <!-- content -->
                        <div class="panel-content">
                            <label>Name:<span>○○○○○</span></label>
                            <label>ID:<span>○○○○○</span></label>
                            <p>最終学歴:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p>学部:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p>言語レベル:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p>夢:<span>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                        </div>
                        <!-- ? right -->
                        <div class="img-right">
                            <div style="width:150px; float:left;">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle ahr-dropdown-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        進行中
                                        <span class="caret" style="float:right; margin-top:5px;"></span>
                                    </button>
                                    <ul class="dropdown-menu ahr-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">進行中</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">不採用</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">內定出し</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-default ahr-button_6 ahr-btn-lg">スケジュール公開中</button>
                                <button class="btn btn-default ahr-label-blue ahr-btn-lg">メールBOXへ</button>
                            </div>
                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
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

