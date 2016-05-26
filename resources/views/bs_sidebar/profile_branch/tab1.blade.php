<div class="wrapper">
    <!-- 1 -->
     <div class="panel panel-default">
       <div class="panel-body default_photo">
               <div class="row">
               <!-- logo left -->
                    <!-- video -->
                    <div class="col-md-12">
                    <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 96%;">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                     @foreach ($tasks as $task)
                         <div class="img-thumbnail" style=" background-image:url('ahr/busineses_img/big{{$task->user_id}}.jpg');
                         background-position: center;  background-size: cover;
                         width:100%; height:150px;">
                         </div>
                         <div class="img-thumbnail"
                         style=" background-image:url('ahr/busineses_img/small{{$task->user_id}}.png');
                         background-position: center;  background-size: cover;
                         height:100px; position: absolute; width:100px; top: 60px; left: 35px;">
                         </div>
                     @endforeach
                    </div>
               </div>
       </div>

       <div class="panel-body update_photo none">
               <div class="row">
               <!-- logo left -->
                    <!-- video -->
                    <div class="col-md-12">
                    <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 96%;">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                       <form action="{{url('/business/image')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         <div class="form-group">

                           <input type="file" name="image_big"  multiple>
                           <p class="help-block">Example block-level help text here.</p>
                         </div>
                         <div class="form-group">
                           <label for="exampleInputFile2">File inputs</label>
                           <input name="image_small" type="file" id="exampleInputFile2">
                           <p class="help-block">Example block-level help text here.</p>
                         </div>

                         <button type="submit" class="btn btn-default">Submit</button>
                       </form>
                    </div>

               </div>
       </div>
     </div>
     <!-- 2 -->
     <div class="panel panel-default">
       <div class="panel-body update-panel1" style="padding-top: 0px !important;">
               <div class="row">
               <!-- logo left -->
                    <div class="col-md-12">
                    <a href="#" class="float-right update_bt1 none">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <h6>■会社のミッションと理念？</h6>

                      <div class="panel-content default_content">
                      @foreach ($tasks as $task)
                         <label style="font-size:13px;">国名:<span>○○○○○</span></label>
                         <label style="font-size:13px;">会社名:<span>{{$task->company_name}}</span></label>
                      @endforeach

                      </div>
                      <div class="panel-content update_content none col-md-12">
                        <form action="" method="POST">
                        {{ csrf_field() }}
                           <table class="table table-bordered">
                             <tbody>
                             @foreach ($tasks as $task)
                                 <tr>
                                   <th scope="row" align="right" width="20%">title</th>
                                   <td>
                                   <input type="text" name="work_time" class="form-control ahr-input_1" >
                                   </td>
                                 </tr>
                                 <tr>
                                   <th scope="row" align="right" width="20%">会社のミッションと理念</th>
                                   <td>
                                   <textarea name="ideal" class="form-control" rows="3"></textarea>
                                   </td>
                                 </tr>
                             @endforeach
                             </tbody>
                           </table>
                           <button type="submit" class="btn btn-primary float-right">編集完了</button>
                        </form>
                      </div>
                    </div>
              </div>
       </div>
     </div>

     <!-- 4 -->
     <div class="default_summary">
       <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 57%;">
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
       <a href="#" class="float-right close_bt">
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