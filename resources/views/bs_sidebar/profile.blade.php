
@extends('bs_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')

<script>
  $(document).ready(function() {
    $('.default_photo').hover(function(){
      $('.default_photo .update_bt').toggleClass('none');
    });
    $('.default_photo .update_bt').click(function(){
      $('.default_photo').addClass('none');
      $('.update_photo').removeClass('none');
    });

    $('.update-panel1').hover(function(){
      $('.update_bt1').toggleClass('none');
    });
    $('.update_bt1').click(function(){
      $('.default_content').addClass('none');
      $('.update_content').removeClass('none');
    });


    $('.default_summary .update_bt').click(function(){
      $('.default_summary').addClass('none');
      $('.update_summary').removeClass('none');
    });
    $('.update_summary .close_bt').click(function(){
      $('.update_summary').addClass('none');
      $('.default_summary').removeClass('none');
    });

    $('.default_summary').hover(function(){
      $('.default_summary .update_bt').toggleClass('none');
    });
  });
      $(function(){

          var sampleTags = [
          @foreach ($skill_data as $value)
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
  input[type="radio"],input[type="checkbox"]{
    margin: 10px !important;
    width: 16px;
    height: 16px;
  }
</style>
<div class="scorl" style="width:1000px; float:left; margin-left:15px;">
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
                    @include('bs_sidebar/profile_branch/tab1')
                   </div><!-- 企業情報tab-panel end -->

                    <!-- 採用情報 Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
                    @include('bs_sidebar/profile_branch/tab2')
                   </div><!-- 採用情報 tab-panel end -->

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
                                                       <td ></td>
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
                    </div><!-- wrapper end -->
                   </div><!-- 企業カラー tab-panel end -->
                   <!-- 面接日程 Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a4">

                    <div class="wrapper">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default ahr-button_6 active">面接調整完了者</button>
                          <button type="button" class="btn btn-default ahr-button_6">選考進行中</button>
                          <button type="button" class="btn btn-default ahr-button_6">内定確定者</button>
                        </div>
                    </div><!-- wrapper end -->
                   </div><!-- 面接日程 tab-panel end -->
                 </div><!-- tab-content end -->
</div><!-- colmd9 end -->
@endsection

