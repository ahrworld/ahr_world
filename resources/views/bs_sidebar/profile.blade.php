
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
    $('.dass').click(function(){
          var preview = document.querySelector('.img');
          var file    = document.querySelector('#uploadBtn').files[0];
          var reader  = new FileReader();

          reader.addEventListener("load", function () {
            preview.src = reader.result;
          }, false);

          if (file) {
            reader.readAsDataURL(file);
          }
    });
    $('.nav-tabs li a').click(function(){
      $('body').scrollTop('500');
    });
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("file-1").value = this.value;
    };
});


</script>
<style>
input[type="radio"],
input[type="checkbox"] {
    margin: 10px !important;
    width: 16px;
    height: 16px;
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload span{
    font-size: 13px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.blog_image{
   background-repeat: no-repeat;
   width:100%;
   height:100%;
}
pre{
    background: #FFF !important;
    border:0px !important;

}
</style>
<script>

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
            <!-- wall_blog -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form action="{{url('/business/blog')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            </div>

                                <style>
                            .dsa_s{
                                display: block;
                                background-position: center;
                                background-size: cover;
                                height:100px;
                                width:100px;
                            }
                            .kv-fileinput-caption{
                                height: 26px !important;
                            }
                            </style>
                            <div class="form-group">
                                 <div class="col-sm-3 img-thumbnail dsa_s bs_photo"></div>
                                 <textarea class="col-sm-10 text_rd" required="required" placeholder="会社の情報・雰囲気を発信すると、求職者へのリーチが10％上がります！" name="blog_content" rows="3" style="border-left:none; margin-bottom:20px; height:100px;"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="fileUpload btn btn-warning">
                                    <span><i class="fa fa-picture-o"></i></span>
                                    <input id="uploadBtn" name="image" type="file" accept="image/*" class="upload upl" />

                                </div>

                                <!-- preview image -->
                                    <div>
                                        <img class="preview" style="max-width: 150px; max-height: 150px;">
                                        <div class="size"></div>
                                    </div>
                                      <hr>
                                <div class="preview_wrapper">
                                    <pre></pre>
                                    <img class="img" src="" style="max-width: 150px; max-height: 150px;">
                                </div>
                                <button type="submit" class="btn btn-primary float-right">投槁</button>
                                <span class="float-right">&nbsp;</span>
                                <button type="button"  class="btn btn-info float-right preview_btn dass" >預覽</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="wrapper">
                @foreach($bs_blog as $value)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">

                            <!-- video -->
                            <div class="col-md-12">
                            <div class="col-sm-3 img-thumbnail dsa_s bs_photo" style="width:60px; height:60px;"></div>
                            <span style="line-height: 107px; padding-left:5px;">30分前</span>
                                <div class="panel-content" style="width:100%; font-size:18px; padding-right:50px;">
                                        <pre>{{ $value->blog_content }}</pre>
                                </div>
                                <div style="width:100%;">
                                <img src="ahr/business_blog/{{$value->blog_image}}" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- wrapper end -->
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


