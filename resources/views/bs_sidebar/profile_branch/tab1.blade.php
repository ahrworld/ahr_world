<style>
 /* this page only start */
/* .panel-default{
  margin-bottom: 20px !important;
 }*/
 /* this page only end */
 .panel-default .default_photo{
   padding: 0px !important;
 }
 .default_photo .bs_background{
   background-position: center;
   background-size: cover;
   width:100%;
   height:250px;
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
@foreach ($bs_image as $value)
<style>
.bs_background{
background-image:url(data:image/png;base64,{{$value->image_big}});
}
.bs_photo{
background-image:url(data:image/png;base64,{{$value->image_small}});
}
</style>
@endforeach
<div class="wrapper">
    <!-- 1 -->
     <div class="panel-default">
       <div class="panel-body default_photo">
               <div class="row">
                    <div class="col-md-12">
                   　
                         <div class="img-thumbnail bs_background" >
                            <a href="javascript:;" class="float-right update_bt_big none">
                              <i class="fa fa-camera" aria-hidden="true"></i>
                            </a>
                         </div>
                         <div class="img-thumbnail bs_photo" >
                           <a href="javascript:;" class="float-right update_bt_smile none">
                             <i class="fa fa-camera" aria-hidden="true"></i>
                           </a>
                         </div>

                    </div>
               </div>
       </div>

       <script>
        $(document).ready(function() {

          // summary
          $('#bs_summary .summary_type_next').click(function() {
            var checked = $("input[name='summary_Type']:checked").val();
            if (checked == 1) {
              $('#bs_summary .summary_type_next,#bs_summary .select_type').addClass('none');
              $('#bs_summary .summary_submit,#bs_summary .summary_A').removeClass('none');
            }
            else if(checked == 2){
              alert('B');
            }
            else if(checked == 3){
              alert('B');
            }
          });
          $('#bs_summary .summary_submit').click(function(){
              $('.summary_form').submit();
          });

        });
       </script>

       <style>
        #image-cropper {
          overflow: hidden;
          padding:10px;
        }
        #image-cropper .column{
          float:left; width:30%;
        }
        #image-cropper .column .close{
          font-size:20px; float:right; margin-bottom: 50px;
        }
       </style>
       <!-- bakground photo -->
       <div class="panel-body update_photo_big none">
               <div class="row">
                   <div class="col-md-12">
                       <a href="javascript:;" class="float-right update_bt none" style="position: absolute; text-align: right; width: 96%;">
                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                       </a>

                       <div id="image-cropper" class="panel panel-default">
                           <a href="javascript:;" class="close" style="margin-bottom: 30px;">
                                  <i class="fa fa-times" aria-hidden="true"></i>
                           </a>
                           <div class="cropit_wrapper" style="width:100%; float:left; margin-bottom: 20px;">
                                  <div class="cropit-preview"></div>
                                  <form class="cropit_form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                   <!-- range -->
                                   <span style="font-size:18px;">
                                      <i class="fa fa-picture-o" aria-hidden="true"></i>
                                   </span>
                                   <input type="range" class="cropit-image-zoom-input" />
                                   <span style="font-size:30px;">
                                      <i class="fa fa-picture-o" aria-hidden="true"></i>
                                   </span>
                                   <input type="hidden" name="image_big" class="hidden_image_data" />
                           </div>
                           <!-- 分界點 -->
                           <div class="column_big">
                               <div class="fileUpload btn btn-info float-left" style="width:200px;">
                                   <span><i class="fa fa-picture-o"></i>&nbsp;写真を選んでください</span>
                                   <input id="uploadBtn" class="cropit-image-input upload" required="required" name="image" type="file" accept="image/*" />
                               </div>
                               <div>&nbsp;</div>
                               <button type="button" class="btn btn-primary ok-btn float-right" style="width:200px;">
                                   <span><i class="fa fa-picture-o"></i>&nbsp;確認</span>
                               </button>
                           </div>
                           </form>
                       </div>
                       <!-- image-cropper end-->
                   </div>
                   <!-- col-md-12 end-->
               </div>
       </div>
       <!-- smile photo -->
       <div class="panel-body update_photo_smile_bs none">

              <div class="row">
                  <div class="col-md-12">
                      <a href="javascript:;" class="float-right update_bt none" style="position: absolute; text-align: right; width: 96%;">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                      <div id="image-cropper" class="panel panel-default">
                          <div class="cropit_wrapper" style="width:70%; float:left;">
                                 <div class="cropit-preview"></div>
                                 <form class="cropit_form"  method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                  <!-- range -->
                                  <span style="font-size:18px;">
                                     <i class="fa fa-picture-o" aria-hidden="true"></i>
                                  </span>
                                  <input type="range" class="cropit-image-zoom-input" />
                                  <span style="font-size:30px;">
                                     <i class="fa fa-picture-o" aria-hidden="true"></i>
                                  </span>
                                  <input type="hidden" name="image_small" class="hidden_image_data" />
                          </div>
                          <!-- 分界點 -->
                          <div class="column">
                              <a href="javascript:;" class="close">
                                 <i class="fa fa-times" aria-hidden="true"></i>
                              </a>
                              <div class="fileUpload btn btn-info" style="width:200px;">
                                  <span><i class="fa fa-picture-o"></i>&nbsp;写真を選んでください</span>
                                  <input id="uploadBtn" class="cropit-image-input upload" required="required" name="image" type="file" accept="image/*" />
                              </div>
                              <div>&nbsp;</div>
                              <button type="button" class="btn btn-primary ok-btn" style="width:200px;">
                                  <span><i class="fa fa-picture-o"></i>&nbsp;確認</span>
                              </button>
                          </div>
                          </form>
                      </div>
                      <!-- image-cropper end-->
                  </div>
                  <!-- col-md-12 end-->
              </div>
       </div>

     </div>
     <!-- 2 -->
     @foreach ($tasks as $task)
     @if($task->company_name)
     <div style="margin:30px auto;">
        <h4 style="font-weight:bold;">会社名:<span>{{$task->company_name}}</span></h4>
     </div>
     @endif
     @endforeach
<style>
  .summary_A .image{
    width:130px; height:130px; border:1px solid #CCC; float:left;
    background-position: center;
    background-size: cover;
  }
  .summary_A .text{
    width: 470px;
    float: left;
    margin-left: 20px;
  }
</style>
    <!-- type_A -->
     @foreach ($bs_summary_A as $value_summary)
     @if($value_summary->summary_title)
     <div class="panel panel-default summary_A">
       <div class="panel-body update-panel1" style="padding-top: 0px !important;">
           <div class="row">
                   <div class="col-md-12">
                        <div class="form-group" style="margin:20px auto;">
                           <h4>■{{$value_summary->summary_title}}</h4>
                        </div>
                        <div class="panel-content default_content">
                           <div class="form-group">
                               <div class="image" style="background-image:url('ahr/busineses_img/{{$value_summary->image}}');
                               ">
                               </div>

                               <div class="text">
                                 <h5>{{$value_summary->summary}}</h5>
                               </div>

                           </div>
                        </div>
                   </div>
           </div>
           <!-- row end -->
       </div>
     </div>
     @endif
     @endforeach

     <div style="text-align:right;">
        <label class="add add_recruitment"  data-toggle="modal" data-target="#bs_summary" style="width:30px; height:30px;"></label>
     </div>
     <!-- 4 -->
     <div class="default_summary">
       <a href="javascript:;" class="float-right update_bt none" >
         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
       </a>
       <h6>■会社概要</h6>
       <table class="table table-bordered ahr-table">
            <tbody>
             @foreach ($tasks as $task)
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
     <!-- update_summary -->
     <div class="update_summary none">
       <a href="javascript:;" class="float-right close_bt">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
       </a>
       <h6>■会社概要<span class="red-color">※マークは必須項目です。</span></h6>
       <form action="{{url('/business/update')}}" method="POST" style="padding-bottom:40px;">
       {{ csrf_field() }}
       <table class="table table-bordered ahr-table">
            <tbody>
             @foreach ($tasks as $task)
                 <tr>
                 <th scope="row" width="20%">担当者氏名<span class="red-color">※</span></th>
                 <td><input type="text" name="name" class="form-control ahr-input_1" value="{{ $task->name }}"></td>
                 </tr>
                 <tr>
                 <th scope="row" width="20%">本社所在地<span class="red-color">※</span></th>
                 <td><input type="text" name="address" class="form-control ahr-input_1" value="{{ $task->address }}"></td>
                 </tr>
                 <tr>
                 <th scope="row" width="20%">企業URL</th>
                 <td><input type="text" name="web_url" class="form-control ahr-input_1" value="{{ $task->web_url }}"></td>
                 </tr>
                 <tr>
                 <th scope="row" width="20%">創業・設立</th>
                 <td><input type="text" name="set_up" class="form-control ahr-input_1" value="{{ $task->set_up }}"></td>
                 </tr>

                 <tr>
                 <th scope="row" width="20%">社員国籍</th>
                 <td><input type="text" name="nationality_members" class="form-control ahr-input_1" value="{{ $task->nationality_members }}"></td>
                 </tr>
                 <th scope="row" width="20%">総従業員数</th>
                 <td><input type="text" name="member_count" class="form-control ahr-input_1" value="{{ $task->member_count }}"></td>
                 </tr>
                 <tr>
                 <th scope="row" width="20%">資本金</th>
                 <td><input type="text" name="capital" class="form-control ahr-input_1" value="{{ $task->capital }}"></td>
                 </tr>
                 <tr>
                 <th scope="row" width="20%">売上高</th>
                 <td><input type="text" name="amount_of_sales" class="form-control ahr-input_1" value="{{ $task->amount_of_sales }}"></td>
                 </tr>
            @endforeach
            </tbody>
       </table>
       <button type="submit" class="btn btn-primary float-right">編集完了</button>
       </form>
     </div>
</div><!-- wrapper end -->



<!-- Modal -->
<div class="modal fade" id="bs_summary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">■会社のミッションと理念？</h4>
      </div>

      <div class="modal-body">
        <div class="select_type">
            <!-- Type A -->
            <input type="radio" value="1" name="summary_Type">Type A
            <div class="panel panel-default">
              <div class="panel-body update-panel1" style="padding-top: 0px !important;">
                  <div class="row">
                      <!-- logo left -->
                        <div class="col-md-12">
                           <h6>title</h6>
                           <div class="panel-content default_content">
                              <div class="image" style="width:20%; height:150px; margin-right:20px; border:1px solid #CCC; float:left;"></div>
                              <div class="summary">
                              <p>
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                              </p>
                              </div>
                           </div>
                        </div>
                  </div>
                  <!-- row end -->
              </div>
            </div>
            <!-- Type B -->
            <input type="radio" value="2" name="summary_Type">Type B
            <div class="panel panel-default">
              <div class="panel-body update-panel1" style="padding-top: 0px !important;">
                  <div class="row">
                      <!-- logo left -->
                        <div class="col-md-12">
                           <h6>title</h6>
                           <div class="panel-content default_content">
                                <div class="summary">
                                <p>
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                </p>
                                </div>
                            </div>
                        </div>
                  </div>
                  <!-- row end -->
              </div>
            </div>
            <!-- Type C -->
            <input type="radio" value="3" name="summary_Type">Type C
            <div class="panel panel-default">
              <div class="panel-body update-panel1" style="padding-top: 0px !important;">
                  <div class="row">
                      <!-- logo left -->
                        <div class="col-md-12">
                           <h6>top</h6>
                           <div class="panel-content default_content">
                              <div>
                                <div class="image" style="width:31%; height:150px; margin-bottom:20px; margin-right:2%; border:1px solid #CCC; float:left;"></div>
                                <div class="image" style="width:31%; height:150px; margin-right:2%; border:1px solid #CCC; float:left;"></div>
                                <div class="image" style="width:31%; height:150px; margin-right:2%; border:1px solid #CCC; float:left;"></div>
                              </div>
                              <div class="summary">
                               <p>
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                                </p>
                              </div>
                           </div>
                        </div>
                  </div>
                  <!-- row end -->
              </div>
            </div>
        </div>
        <!-- summary_A -->
        <div class="summary_A none">
            <div class="panel panel-default">
              <div class="panel-body update-panel1" style="padding-top: 0px !important;">
                  <div class="row">
                      <!-- logo left -->
                       <form class="summary_form" action="{{url('/business/summary')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                       {{ csrf_field() }}
                          <div class="col-md-12">
                               <div class="form-group" style="margin:20px auto;">
                                  <input type="text" name="summary_title" class="form-control" placeholder="title">
                               </div>
                               <div class="panel-content default_content">
                                  <div class="form-group">
                                      <div class="col-sm-2 image" style="height:130px;border:1px solid #CCC;">
                                       <input type="file" name="summary_image"  multiple>
                                      </div>
                                      <div class="col-sm-10">
                                        <textarea name="summary" class="form-control" rows="6"></textarea>
                                      </div>
                                  </div>
                               </div>
                          </div>
                        </form>
                  </div>
                  <!-- row end -->
              </div>
            </div>
          </div>

      </div>
      <!-- modal body end -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
        <button type="button" class="btn btn-primary summary_type_next">完了して次へ</button>
        <button type="submit" class="btn btn-primary none summary_submit">完了</button>
      </div>

    </div>
  </div>
</div>
<!-- modal end -->