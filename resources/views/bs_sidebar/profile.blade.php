
@extends('bs_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
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
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
});
$(function() {

    var sampleTags = [
        @foreach($skill_data as $value)
        '{{ $value->skill_name }}',
        @endforeach
    ];
    $('#myTags').tagit();

    $('#singleFieldTags1').tagit({
        availableTags: sampleTags
    });
    $('#singleFieldTags2').tagit({
        availableTags: sampleTags
    });
    $('#singleFieldTags3').tagit({
        availableTags: sampleTags
    });
    //-------------------------------
    // Preloading data in markup
    //-------------------------------
    $('#myULTags').tagit({
        availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
        // configure the name of the input field (will be submitted with form), default: item[tags]
        itemName: 'item',
        fieldName: 'tags'
    });


    var eventTags = $('#eventTags');

    var addEvent = function(text) {
        $('#events_container').append(text + '<br>');
    };

    eventTags.tagit({
        availableTags: sampleTags,
        beforeTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        afterTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        beforeTagRemoved: function(evt, ui) {
            addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        afterTagRemoved: function(evt, ui) {
            addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagClicked: function(evt, ui) {
            addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagExists: function(evt, ui) {
            addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
        }
    });

    //-------------------------------
    // Read-only
    //-------------------------------
    $('#readOnlyTags').tagit({
        readOnly: true
    });

    //-------------------------------
    // Tag-it methods
    //-------------------------------
    $('#methodTags').tagit({
        availableTags: sampleTags
    });

    //-------------------------------
    // Allow spaces without quotes.
    //-------------------------------
    $('#allowSpacesTags').tagit({
        availableTags: sampleTags,
        allowSpaces: true
    });

    //-------------------------------
    // Remove confirmation
    //-------------------------------
    $('#removeConfirmationTags').tagit({
        availableTags: sampleTags,
        removeConfirmation: true
    });

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
  background-position: center;
  background-size: cover;
  width:100%;
  height:150px;
  display: block;
}
</style>

<div class="scorl" style="width:60%; float:left; margin-left:15px;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
        <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程</a></li>
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
                                    <label>Title</label>
                                    <input type="text" name="title" required="required" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" name="sub_title" required="required" class="form-control" placeholder="Sub Title">
                            </div>
                            <div class="form-group">
                                <label>內容</label>
                                <textarea class="form-control" required="required" name="blog_content" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="fileUpload btn btn-warning">
                                    <span><i class="fa fa-picture-o"></i></span>
                                    <input id="uploadBtn" required="required" name="image" type="file" accept="image/*" class="upload" />
                                </div>
                                <input id="uploadFile" placeholder="Choose File" disabled="disabled" style="height:30px;" />
                                <button type="submit" class="btn btn-primary float-right">確認</button>
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
                                <span class="img-thumbnail blog_image" style="background-image:url('ahr/business_blog/{{$value->blog_image}}');">
                                </span>
                                <table style="margin-bottom:20px;">
                                    <tbody>
                                        <tr>
                                            <th style="text-align:right !important; font-size:14px; padding-top:15px;">{{ $value->title }}</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right !important; font-size:14px; padding-top:15px;">{{ $value->sub_title }}</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="panel-content">
                                    <label style="font-size:14px;">內容:</label>
                                    <p>{{ $value->blog_content }}</p>
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


