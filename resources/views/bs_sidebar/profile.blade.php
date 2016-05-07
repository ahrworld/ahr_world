
@extends('bs_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')
<style>
  .close_bt ,.update_bt , .update_bt1,.update_bt2{
    font-size:25px; color:#1c7ebb;
  }
  .close_bt:hover ,.update_bt:hover ,.update_bt1:hover,.update_bt2:hover{
    color:#1C46BB;
  }
  
  .update_content{
    margin-left: 0px !important;
  }
</style>
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

</script>
<style>
  
</style>
<div class="scorl" style="width:1000px; float:left; margin-left:15px;">
                 <!-- Nav tabs -->
                 <ul class="nav nav-tabs" role="tablist">
                   <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報編集</a></li>
                   <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報編集</a></li>
                   <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
                   <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程編集</a></li>
                 </ul>
                 <!-- 企業情報編集 Tab panes -->
                 <div class="tab-content">
                   <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
                    <div class="wrapper">
                        <!-- 1 -->
                         <div class="panel panel-default">
                           <div class="panel-body default_photo">
                                   <div class="row">
                                   <!-- logo left -->
                                        <!-- video -->
                                        <div class="col-md-12">
                                        <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 933px;">
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
                                        <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 933px;">
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
                           <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 953px;">
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
                   </div><!-- 企業情報編集 tab-panel end -->
                    <!-- 採用情報編集 Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
                    <div class="wrapper">
                        <div class="row">
                          <div class="col-md-12">
                             <div class="panel-group" id="accordion" role="tablist" >
                              @foreach ($recruitments as $key => $recruitment)
                               <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="heading{{ $key }}">
                                   <a style="float:left; height:30px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                                     <h4 class="panel-title" style="height:18px;">
                                       <span>{{ $key+1 }}</span>
                                       <a style="float:left; width:90%; height: 27px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                                         {{ $recruitment->name }}
                                       </a>
                                       <i class="fa fa-caret-down float-right"></i>
                                     </h4>
                                   </a>
                                 </div>
                                 <div id="collapse{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key }}">
                                   <div class="panel-body">
                                   <table class="table table-bordered ahr-table">
                                        <tbody>
                                             <tr>
                                             <th scope="row" width="20%">募集職種</th>
                                             <td>{{ $recruitment->name }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">職務内容</th>
                                             <td>{{ $recruitment->content }}</td>
                                             </tr>
                                             <tr>
                                            
                                             <th scope="row" width="20%">雇用形態</th>
                                             <td>
                                             @foreach ($employments as $key => $value)
                                             @if ($recruitment->id == $value->recruitments_id)
                                             {{ $value->employment_name }}<br>
                                             @endif
                                             @endforeach
                                             </td>
                                             
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">募集経歴</th>
                                             <td>
                                             @foreach ($experiences as $key => $value)
                                             @if ($recruitment->id == $value->recruitments_id)
                                                 {{$value->experiences_name}}<br>
                                             @endif
                                             @endforeach
                                             </td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">募集学科</th>
                                             <td>{{ $recruitment->subject }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">語学・母語レベル</th>
                                             <td>
                                             @foreach ($languagelvs as $key => $value)
                                             @if ($recruitment->id == $value->recruitments_id)
                                             {{ $value->languagelv_name }}<br>
                                             @endif
                                             @endforeach
                                             </td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">必須技能・資格</th>
                                             <td>{{ $recruitment->need_skill }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">あれば嬉しい技能・資格</th>
                                             <td>{{ $recruitment->if_skill }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">その他の技能・資格</th>
                                             <td>{{ $recruitment->other_skill }}</td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   <h6>■雇用条件</h6>
                                   <table class="table table-bordered ahr-table">
                                        <tbody>
                                             <tr>
                                             <th scope="row" width="20%">勤務地</th>
                                             <td>{{ $recruitment->work_site }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">勤務時間</th>
                                             <td>{{ $recruitment->work_time }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">給与</th>
                                             <td>月收 {{ $recruitment->annual_income }} 円 <br>年收 {{ $recruitment->monthly_income }} 円</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">ボーナス</th>
                                             <td>{{ $recruitment->bonus }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">福利厚生</th>
                                             <td>{{ $recruitment->holiday }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">休日休暇</th>
                                             <td>{{ $recruitment->welfare }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">諸手当</th>
                                             <td>{{ $recruitment->allowances }}</td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="20%">教育制度</th>
                                             <td>{{ $recruitment->education }}</td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   </div>
                                 </div>
                               </div>
                               @endforeach

                               <div style="text-align:right;"><label class="add add_all" style="width:30px; height:30px;"></label></div>
                             </div>
                           </div>
                       </div><!-- row end -->
                    </div><!-- wrapper end -->
                   </div><!-- 採用情報編集 tab-panel end -->

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

