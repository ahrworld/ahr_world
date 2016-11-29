
@extends('bs_sidebar/sidebar')
@section('line_menu')
@include('bs_sidebar/line_menu')
@endsection
@section('content')

<script>
$(document).ready(function() {
    $('.update-panel1').hover(function() {
        $('.update_bt1').toggleClass('none');
    });
    $('.update_bt1').click(function() {
        $('.default_content').addClass('none');
        $('.update_content').removeClass('none');
    });

    $('.default_summary .update_bt').click(function() {
        $('.default_summary').addClass('none');
        $('.update_summary').removeClass('none');
    });
    $('.update_summary .close_bt').click(function() {
        $('.update_summary').addClass('none');
        $('.default_summary').removeClass('none');
    });

    $('.default_summary').hover(function() {
        $('.default_summary .update_bt').toggleClass('none');
    });
    
    $('.nav-tabs li a').click(function(){
      $('body').scrollTop('500');
    });
    // 上傳作品圖轉base64
    $("#uploadBtn_blog").change(function(){
      readImage( this );
    });
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("file-1").value = this.value;
    };
});
// 上傳作品圖轉base64
function readImage(input) {
  if ( input.files && input.files[0] ) {
    var FR= new FileReader();
    FR.onload = function(e) {
      //e.target.result = base64 format picture
      $('.p_file').val(e.target.result);
    };
    FR.readAsDataURL( input.files[0] );
  }
}
</script>


<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
        <li role="presentation"><a href="{{ url('/interview/edit')}}">面接日程</a></li>
    </ul>
    <!-- 企業情報 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
            @include('bs_sidebar/profile_branch/tab1')
        </div>
        <!-- 企業情報tab-panel end -->
        <!-- 採用情報 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
           @include('bs_sidebar/profile_branch/tab2')
        </div>
        <!-- 採用情報 tab-panel end -->
        <!-- 企業カラー Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
           @include('bs_sidebar/profile_branch/tab3')
        </div>
        <!-- 企業カラー tab-panel end -->
        <!-- 面接日程 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a4">
            @include('bs_sidebar/profile_branch/tab4')
        </div>
        <!-- 面接日程 tab-panel end -->
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->

@endsection


