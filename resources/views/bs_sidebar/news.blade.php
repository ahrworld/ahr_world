

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
    //選考管理
    $('#b2 .s1_btn').click(function(){
        $('#b2 .s1').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
    });
    $('#b2 .s2_btn').click(function(){
        $('#b2 .s2').removeClass('none').addClass('animated fadeIn').siblings('.search').addClass('none');
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
                            <label class="ahr-label_bs">応募職缺:<span>{{ $value->name }}</span></label>
                            <label class="ahr-label_bs">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <label class="ahr-label_bs">ID:<span>{{ $value->id }}</span></label>
                            <p><label class="label-gray">最終学歴</label><span>○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">学部</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">言語レベル</label><span>○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">夢</label><span>○○○○○○○○○○○○○○○○○○○</span></p>
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
                            <label class="ahr-label_bs">応募職缺:<span>{{ $value->name }}</span></label>
                            <label class="ahr-label_bs">Name:<span>{{ $value->family_name.$value->surname }}</span></label>
                            <label class="ahr-label_bs">ID:<span>{{ $value->id }}</span></label>
                            <p><label class="label-gray">最終学歴</label><span>○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">学部</label><span>○○○○○○○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">言語レベル</label><span>○○○○○○○○○○○○○○○○○○○</span></p>
                            <p><label class="label-gray">夢</label><span>○○○○○○○○○○○○○○○○○○○</span></p>
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
                                        面接調整中
                                        <span class="caret" style="float:right; margin-top:5px;"></span>
                                    </button>
                                    <ul class="dropdown-menu ahr-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">面接調整中</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">早く</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">NG</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-default ahr-button_6 ahr-btn-lg">スケジュール公開中</button>
                            </div>
                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTI4NzJiNjg0YiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Mjg3MmI2ODRiIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- 選考管理 tab-panel end -->
        <!-- 面接管理 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="b3">
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
<!-- colmd9 end -->

@endsection

