<script>

$(document).ready(function() {
        var $validator = $(".exp_form").validate({
          rules: {
            emailfield: {
              required: true,
              email: true,
              minlength: 3
            },
            namefield: {
              required: true,
              minlength: 3
            },
            urlfield: {
              required: true,
              minlength: 3,
              url: true
            }
          }
        });
        $('.number').keyup(function(){
            var moreArray = new Array();
            if ($('.number').val() == 1) {
                for (var i = 1; i <= 1; i++) {
                    moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_jobs as $key=> $values) @if ($value_category->id==$values->exp_job_category_id) <option value="{{$values->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$values->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
                    $('.exp_job_wrapper').html(moreArray.join(""));

                };
            }else if ($('.number').val() == 2) {
                for (var i = 1; i <= 2; i++) {
                    moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_jobs as $key=> $values) @if ($value_category->id==$values->exp_job_category_id) <option value="{{$values->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$values->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
                    $('.exp_job_wrapper').html(moreArray.join(""));

                };
            }else if($('.number').val() == 3){
                for (var i = 1; i <= 3; i++) {
                    moreArray.push('<div class="col-md-7"> <div class="form-group number_exp_job"> <label for="namefield">経験職種</label> <select class="js-example_add'+ i +' js-states" name="experience[]" style="width: 100%"> @foreach($exp_job_category as $key_category=> $value_category) <optgroup label="{{$value_category->category}}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; "> @foreach($exp_jobs as $key=> $values) @if ($value_category->id==$values->exp_job_category_id) <option value="{{$values->id}}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{$values->name}}</option> @endif @endforeach </optgroup> @endforeach </select> </div></div><div class="col-md-5"> <div class="form-group"> <label for="namefield">年数</label> <select class="js-example_year'+ i +' js-states" name="year[]" style="width: 100%"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> </select> </div></div><div>&nbsp;</div>');
                    $('.exp_job_wrapper').html(moreArray.join(""));

                };
            };
            $(".js-example_add1").select2({
               placeholder: "職種を選択してください。",
               allowClear: true
            });
            $(".js-example_year1").select2({
               placeholder: "年数",
               allowClear: true
            });
            $(".js-example_add2").select2({
               placeholder: "職種を選択してください。",
               allowClear: true
            });
            $(".js-example_year2").select2({
               placeholder: "年数",
               allowClear: true
            });
            $(".js-example_add3").select2({
               placeholder: "職種を選択してください。",
               allowClear: true
            });
            $(".js-example_year3").select2({
               placeholder: "年数",
               allowClear: true
            });
        });
       $('.input-daterange').datepicker({ format: "yyyy/mm/dd" });
});
</script>
<div class="panel panel-default panel_5">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_5','.panel_5_update');">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　職務経歴書</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                        @foreach($exp_job as $value)
                            <tr>
                                <th width="150px" style="color:#000;">【經歷】</th>
                                <td></td>
                            </tr>

                            <tr>
                                <th width="150px">職種</th>
                                <td>：{{ $value->name }}</td>
                            </tr>
                            <tr>
                                <th width="150px">期間</th>
                                <td>：{{ $value->year }}年</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
<!-- update -->
 <div class="panel panel-update panel_5_update none">
     <div class="panel-body" style="padding-top: 0px !important;">
          <!-- Close BUTTON -->
          <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_5_update','.panel_5');">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
          </a>

          <h6 style="margin-bottom:0px !important;">■　勤務経験</h6>
            <div class="panel-content">
            <form class="exp_form" action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
            {{ csrf_field() }}

                            <div class="col-md-12">
                              <div class="form-group" style="text-align: left; margin-top: 30px;">
                                 <input type="text" class="form-control number" name="points" min="1" max="3" style="width:70px; display: inline;" value="">
                                 <span>社</span>
                              </div>
                            </div>
                            <div class="exp_job_wrapper">
                                <div class="col-md-7">
                                  <div class="form-group number_exp_job">
                                    <label for="namefield">経験職種</label>
                                        <select class="js-exp1 js-states" name="experience[]" style="width: 100%">
                                              @foreach($exp_job_category as $key_category => $value_category)
                                                  <optgroup label="{{ $value_category->category }}" style="background: #ebebee; color: #888888; font-weight: normal; font-style: normal; ">
                                                  @foreach($exp_jobs as $key => $values)
                                                      @if ($value_category->id == $values->exp_job_category_id)
                                                            <option value="{{ $values->id }}" style="background: #ffffff; color: #000000;">&nbsp;└&nbsp;{{ $values->name }}</option>
                                                      @endif
                                                  @endforeach
                                              </optgroup>
                                              @endforeach
                                        </select>
                                  </div>
                                </div>

                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label for="namefield">年数</label>
                                        <select class="js-exp2 js-states" name="year[]" style="width: 100%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>
                                  </div>
                                </div>
                            </div>
                <button type="submit" class="btn btn-w-md btn-gap-v btn-primary  btn_btom">
                變更
                </button>
            </form>
            </div>
    </div>
</div>
<!-- ■　海外経験 -->
<div class="panel panel-default panel_6">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_6','.panel_6_update');">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　海外経験</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                        @if(isset($abroad_exp))
                            <tr>
                                <th width="150px" style="color:#000;">【現在・最新】</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th width="150px">目的：</th>
                                <td>{{$abroad_exp->main}}</td>
                            </tr>
                            <tr>
                                <th width="150px">機関名：</th>
                                <td>{{$abroad_exp->gear}}</td>
                            </tr>
                            <tr>
                                <th width="150px">学年、学部、業務内容：</th>
                                <td>{{$abroad_exp->content}}</td>
                            </tr>
                            <tr>
                                <th width="150px">国名・地方名：</th>
                                <td>{{$abroad_exp->place}}</td>
                            </tr>
                            <tr>
                                <th width="120px">期間：</th>
                                <td>{{$abroad_exp->gotime}}　～　{{$abroad_exp->backtime}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>

<!-- update -->
<div class="panel panel-update panel_6_update none">
     <div class="panel-body" style="padding-top: 0px !important;">
          <!-- Close BUTTON -->
          <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_6_update','.panel_6');">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
          </a>

          <h6 style="margin-bottom:0px !important;">■　海外経験</h6>
            <div class="panel-content">
            <form class="exp_form" action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
            {{ csrf_field() }}
                <table class="user-view_table">
                    <tbody>
                        @if(isset($abroad_exp))
                        <tr>
                            <th width="80px">目的:</th>
                            <td><input type="text" name="main" class="form-control ahr-input_1" value="{{ $abroad_exp->main}}"></td>
                        </tr>
                        <tr>
                            <th width="80px">機関名:</th>
                            <td><input type="text" name="gear" class="form-control ahr-input_1" value="{{ $abroad_exp->gear}}"></td>
                        </tr>
                        <tr>
                            <th width="80px">学年、学部、業務内容:</th>
                            <td><input type="text" name="content" class="form-control ahr-input_1" value="{{ $abroad_exp->content }}"></td>
                        </tr>
                         <tr>
                            <th width="80px">国名・地方名:</th>
                            <td><input type="text" name="place" class="form-control ahr-input_1" value="{{ $abroad_exp->place }}"></td>
                        </tr>
                        <tr>
                            <th width="80px">期間:</th>
                            <td><div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start" value="{{ $abroad_exp->gotime }}"/>
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="end" value="{{ $abroad_exp->backtime }}"/>
                        </div></td>
                        </tr>
                        @else
                        <tr>
                            <th width="80px">目的:</th>
                            <td><input type="text" name="main" class="form-control ahr-input_1" ></td>
                        </tr>
                        <tr>
                            <th width="80px">機関名:</th>
                            <td><input type="text" name="gear" class="form-control ahr-input_1" ></td>
                        </tr>
                        <tr>
                            <th width="80px">学年、学部、業務内容:</th>
                            <td><input type="text" name="content" class="form-control ahr-input_1" ></td>
                        </tr>
                         <tr>
                            <th width="80px">国名・地方名:</th>
                            <td><input type="text" name="place" class="form-control ahr-input_1" ></td>
                        </tr>
                        <tr>
                            <th width="80px">期間:</th>
                            <td><div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="end" />
                        </div></td>
                        </tr>
                         @endif
                         <style>
                             .datepicker-dropdown{
                                 top:1597px !important;
                             }
                         </style>
                    </tbody>

                </table>

                <button type="submit" class="btn btn-w-md btn-gap-v btn-primary  btn_btom">
                變更
                </button>
            </form>
            </div>
    </div>
</div>